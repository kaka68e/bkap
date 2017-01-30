<?php

namespace frontend\models;

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
 * @property integer $updated_at
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
            [['id_customer', 'total', 'status', 'created_at'], 'integer'],
            [['customer_name', 'mobile', 'address', 'email', 'customer_ship', 'mobile_ship', 'address_ship', 'email_ship', 'id_payment', 'id_deliver', 'total', 'created_at', 'date_buy_created', 'date_buy_updated'], 'required'],
            [['date_buy_created', 'date_buy_updated'], 'safe'],
            [['customer_name', 'customer_ship'], 'string', 'max' => 100],
            [['mobile', 'mobile_ship', 'id_payment', 'id_deliver'], 'string', 'max' => 20],
            [['address', 'address_ship', 'request'], 'string', 'max' => 255],
            [['email', 'email_ship'], 'string', 'max' => 120],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'id_customer' => 'Id Customer',
            'customer_name' => 'Customer Name',
            'mobile' => 'Mobile',
            'address' => 'Address',
            'email' => 'Email',
            'customer_ship' => 'Customer Ship',
            'mobile_ship' => 'Mobile Ship',
            'address_ship' => 'Address Ship',
            'email_ship' => 'Email Ship',
            'request' => 'Request',
            'id_payment' => 'Id Payment',
            'id_deliver' => 'Id Deliver',
            'total' => 'Total',
            'status' => 'Status',
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
}
