<?php

namespace backend\models;
use backend\models\Orderitem;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $order_id
 * @property integer $id_customer
 * @property string $customer_name
 * @property string $mobile
 * @property string $address
 * @property string $email
 * @property string $customer_ship
 * @property string $mobile_ship
 * @property string $address_ship
 * @property string $email_ship
 * @property string $request
 * @property string $id_payment
 * @property string $id_deliver
 * @property integer $total
 * @property integer $status
 * @property integer $created_at
 * @property string $date_buy_created
 * @property string $date_buy_updated
 *
 * @property Customer $idCustomer
 * @property Deliver $idDeliver
 * @property Payment $idPayment
 * @property Orderitem[] $orderitems
 * @property Product[] $idProducts
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_customer', 'total', 'status', 'created_at','mobile','mobile_ship'], 'integer'],
            [['customer_name', 'mobile', 'address', 'email', 'customer_ship', 'mobile_ship', 'address_ship', 'email_ship', 'id_payment', 'id_deliver', 'total', 'created_at'], 'required', 'message' => '{attribute} không được để trống'],
            [['date_buy_created', 'date_buy_updated'], 'safe'],
            [['customer_name', 'customer_ship'], 'string', 'max' => 100],
            [['mobile', 'mobile_ship', 'id_payment', 'id_deliver'], 'string', 'max' => 20],
            [['address', 'address_ship', 'request'], 'string', 'max' => 255],
            [['email', 'email_ship'], 'string', 'max' => 120],
            [['email', 'email_ship'], 'email', 'message' => '{attribute} không đúng định dạng Email'],
            [['id_customer'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['id_customer' => 'customer_id']],
            [['id_deliver'], 'exist', 'skipOnError' => true, 'targetClass' => Deliver::className(), 'targetAttribute' => ['id_deliver' => 'deliver_id']],
            [['id_payment'], 'exist', 'skipOnError' => true, 'targetClass' => Payment::className(), 'targetAttribute' => ['id_payment' => 'payment_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Mã Đơn Hàng',
            'id_customer' => 'Khách Hàng',
            'customer_name' => 'Tên KH Đặt',
            'mobile' => 'SĐT KH Đặt',
            'address' => 'Địa chỉ KH Đặt',
            'email' => 'Email KH Đặt',
            'customer_ship' => 'Tên KH Nhận',
            'mobile_ship' => 'SĐT KH Nhận',
            'address_ship' => 'Địa Chỉ KH Nhận',
            'email_ship' => 'Email KH Nhận',
            'request' => 'Yêu Cầu',
            'id_payment' => 'PT Thanh Toán',
            'id_deliver' => 'PT Vận Chuyển',
            'total' => 'Tổng Tiền',
            'status' => 'Trạng Thái',
            'created_at' => 'Created At',
            'date_buy_created' => 'Date Buy Created',
            'date_buy_updated' => 'Date Buy Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCustomer()
    {
        return $this->hasOne(Customer::className(), ['customer_id' => 'id_customer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDeliver()
    {
        return $this->hasOne(Deliver::className(), ['deliver_id' => 'id_deliver']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPayment()
    {
        return $this->hasOne(Payment::className(), ['payment_id' => 'id_payment']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderitems()
    {
        return $this->hasMany(Orderitem::className(), ['id_order' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProducts()
    {
        return $this->hasMany(Product::className(), ['product_id' => 'id_product'])->viaTable('orderitem', ['id_order' => 'order_id']);
    }

    /**
    * Thêm chi tiết các Order item của Order
    */
    public function addOrderItem($id)
    {
        $flag = true;
        $session = Yii::$app->session;
        $cartStore = $session['cart'];
        // echo '<pre>';
        // print_r($cartStore);die();
        // echo '</pre>';
        foreach ($cartStore as $item) {
            $oderitem = new Orderitem();
            $oderitem->id_order = $id;
            $oderitem->id_product = $item->product_id;
            $oderitem->product_price = $item->price_real;
            $oderitem->product_quantity = $item->quantity_user;
            $oderitem->product_total = $item->price_real*$item->quantity_user;
            $oderitem->status = '1';
            $time = time();
            $oderitem->created_at = $time;
            $oderitem->updated_at = $time;
            if (!$oderitem->save()) {
               $flag = false;
            }
        }
        return $flag;
    }

}
