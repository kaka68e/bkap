<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "wishlist".
 *
 * @property integer $id_customer
 * @property integer $id_product
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Customer $idCustomer
 * @property Product $idProduct
 */
class Wishlist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wishlist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_customer', 'id_product', 'created_at', 'updated_at'], 'required'],
            [['id_customer', 'id_product', 'status', 'created_at', 'updated_at'], 'integer'],
            [['id_customer'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['id_customer' => 'customer_id']],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['id_product' => 'product_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_customer' => 'Khách Hàng',
            'id_product' => 'Sản Phẩm',
            'status' => 'Trạng Thái',
            'created_at' => 'Ngày Tạo',
            'updated_at' => 'Ngày Cập Nhật',
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
    public function getIdProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'id_product']);
    }
}
