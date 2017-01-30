<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "orderitem".
 *
 * @property integer $id_order
 * @property integer $id_product
 * @property integer $product_price
 * @property integer $product_quantity
 * @property integer $product_total
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Order $idOrder
 * @property Product $idProduct
 */
class Orderitem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orderitem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_order', 'id_product', 'product_price', 'product_quantity', 'product_total', 'created_at', 'updated_at'], 'required'],
            [['id_order', 'id_product', 'product_price', 'product_quantity', 'product_total', 'status', 'created_at', 'updated_at'], 'integer'],
            [['id_order'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['id_order' => 'order_id']],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['id_product' => 'product_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_order' => 'Mã Đơn Hàng',
            'id_product' => 'Mã Sản Phẩm',
            'product_price' => 'Giá Sản Phẩm',
            'product_quantity' => 'Số Lượng',
            'product_total' => 'Thành Tiền',
            'status' => 'Trạng Thái',
            'created_at' => 'Ngày Tạo',
            'updated_at' => 'Ngày Cập Nhật',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdOrder()
    {
        return $this->hasOne(Order::className(), ['order_id' => 'id_order']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'id_product']);
    }
}
