<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "reviewproduct".
 *
 * @property integer $reviewproduct_id
 * @property integer $id_customer
 * @property integer $id_product
 * @property string $customer_name
 * @property string $customer_email
 * @property string $content
 * @property integer $rating
 * @property integer $parent_review_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Customer $idCustomer
 * @property Product $idProduct
 */
class Reviewproduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reviewproduct';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_customer', 'id_product', 'customer_name', 'customer_email', 'content', 'created_at', 'updated_at'], 'required','message'=>'{attribute} không được để trống'],
            [['id_customer', 'id_product', 'rating', 'parent_review_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['customer_name', 'customer_email'], 'string', 'max' => 100],
            [['content'], 'string', 'max' => 255],
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
            'reviewproduct_id' => 'Mã Đánh giá SP',
            'id_customer' => 'Mã Khách Hàng',
            'id_product' => 'Sản Phẩm',
            'customer_name' => 'Tên Khách Hàng',
            'customer_email' => 'Email Khách Hàng',
            'content' => 'Nội dung',
            'rating' => 'Xếp Hạng',
            'parent_review_id' => 'Mã Đánh giá SP Cha',
            'status' => 'Kích Hoạt',
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
