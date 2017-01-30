<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $product_id
 * @property string $product_name
 * @property string $product_slug
 * @property string $image
 * @property integer $price_push_up
 * @property integer $price_real
 * @property integer $quantity
 * @property string $start_sale
 * @property string $end_sale
 * @property integer $id_category
 * @property string $id_supplier
 * @property string $meta_keyword
 * @property string $meta_description
 * @property string $tags
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Category $idCategory
 * @property Supplier $idSupplier
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $quantity_user;
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_name', 'product_slug', 'price_push_up', 'price_real', 'quantity', 'id_category', 'id_supplier', 'created_at', 'updated_at'], 'required','message'=>'{attribute} không được để trống'],
            [['price_push_up', 'price_real', 'quantity', 'id_category', 'status', 'created_at', 'updated_at'], 'integer'],
            [['start_sale', 'end_sale'], 'safe'],
            [['meta_description'], 'string'],
            [['product_name', 'product_slug'], 'string', 'max' => 100],
            [['image', 'meta_keyword', 'tags'], 'string', 'max' => 255],
            [['id_supplier'], 'string', 'max' => 20],
            [['product_name'], 'unique','message'=>'{attribute} đã bị trùng'],
            [['product_slug'], 'unique','message'=>'{attribute} đã bị trùng'],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['id_category' => 'category_id']],
            [['id_supplier'], 'exist', 'skipOnError' => true, 'targetClass' => Supplier::className(), 'targetAttribute' => ['id_supplier' => 'supplier_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Mã Sản Phẩm',
            'product_name' => 'Tên Sản Phẩm',
            'product_slug' => 'Product Slug',
            'image' => 'Hình Ảnh',
            'price_push_up' => 'Giá Bị Đẩy Lên',
            'price_real' => 'Giá Thực Sự',
            'quantity' => 'Số Lượng',
            'start_sale' => 'Bắt Đầu Giảm Giá',
            'end_sale' => 'Kết Thúc Giảm Giá',
            'id_category' => 'Danh Mục SP',
            'id_supplier' => 'Nhà Cung Cấp',
            'meta_keyword' => 'Miêu tả ngắn',
            'meta_description' => 'Miêu tả chi tiết',
            'tags' => 'Tags',
            'status' => 'Kích Hoạt',
            'created_at' => 'Ngày Tạo',
            'updated_at' => 'Ngày Cập Nhật',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderitems()
    {
        return $this->hasMany(Orderitem::className(), ['id_product' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdOrders()
    {
        return $this->hasMany(Order::className(), ['order_id' => 'id_order'])->viaTable('orderitem', ['id_product' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'id_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSupplier()
    {
        return $this->hasOne(Supplier::className(), ['supplier_id' => 'id_supplier']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviewproducts()
    {
        return $this->hasMany(Reviewproduct::className(), ['id_product' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWishlists()
    {
        return $this->hasMany(Wishlist::className(), ['id_product' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCustomers()
    {
        return $this->hasMany(Customer::className(), ['customer_id' => 'id_customer'])->viaTable('wishlist', ['id_product' => 'product_id']);
    }

    /**
    * Lấy ra danh sách sản phẩm dựa vào product_id
    */

    public function getProductByIdCategory($id_category)
    {
        $data = Product::find()->asArray()->where(['id_category'=>$id_category,'status' => '1'])->all();
        return $data;
    }

    /**
    * Lấy random product
    */

    public function getAllProduct()
    {
        // $data = Product::find()->asArray()->orderBy(['rand()' => SORT_DESC])->all();  bản gốc
        $data = Product::find()->where(['status'=>1])->asArray()->all();
        return $data;
    }
}
