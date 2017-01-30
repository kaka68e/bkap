<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $category_id
 * @property string $category_name
 * @property string $category_slug
 * @property integer $parent_id
 * @property string $image
 * @property string $description
 * @property integer $order_by
 * @property string $meta_keyword
 * @property string $meta_description
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_name','category_slug', 'created_at', 'updated_at'], 'required','message'=>'{attribute} không được để trống'],
            [['parent_id', 'order_by', 'status', 'created_at', 'updated_at'], 'integer'],
            [['category_name', 'category_slug'], 'string', 'max' => 100],
            [['image', 'description', 'meta_keyword', 'meta_description'], 'string', 'max' => 255],
            [['category_name'], 'unique','message'=>'{attribute} đã tồn tại'],
            [['category_slug'], 'unique','message'=>'{attribute} đã tồn tại'],
            [['order_by'], 'unique','message'=>'{attribute} đã tồn tại'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Mã Danh Mục',
            'category_name' => 'Tên Danh Mục',
            'category_slug' => 'Đường Dẫn Đẹp',
            'parent_id' => 'Danh Mục Cha',
            'image' => 'Hình Ảnh',
            'description' => 'Miêu Tả',
            'order_by' => 'Thứ Tự Hiển Thị',
            'meta_keyword' => 'Meta Keyword',
            'meta_description' => 'Meta Description',
            'status' => 'Kích Hoạt',
            'created_at' => 'Ngày Tạo',
            'updated_at' => 'Ngày Cập Nhật',
        ];
    }

    /* Hàm này sẽ sử dụng kĩ thuật đệ quy để lấy ra danh sách thể loại để hiển thị trong From nhập
    */
    private $_cate1 = [];

    public function getCategoryParent1($parent = 0,$level = '')
    {
        $this->_cate1[0] = 'Root';
        $data = Category::find()->where(['parent_id' => $parent,'status' => '1'])->all();
        $level .= '-----| ';
        if ($data) {
            foreach ($data as $item) {
                if ($item->parent_id == 0) {
                    $level = '';
                }
                $this->_cate1[$item->category_id] = $level.$item->category_name;
                $this->getCategoryParent1($item->category_id,$level);
            }
        }
        return $this->_cate1;
    }


    /**
    * Lấy ra danh sách thể loai để đưa vào form nhập trong Product
    */

    private $_cate2 = [];

    public function getCategoryParent2($parent = 0,$level = '')
    {
        $data = Category::find()->where(['parent_id' => $parent,'status' => '1'])->all();
        $level .= '-----|';
        if ($data) {
            foreach ($data as $item) {
                if ($item->parent_id == 0) {
                    $level = '';
                }
                $this->_cate2[$item->category_id] = $level.$item->category_name;
                $this->getCategoryParent2($item->category_id,$level);
            }
        }
        return $this->_cate2;
    }


    /**
    * Lấy da danh mục ở frontend
    */

    public $allCateF = [];

    public function getAllCategoryF($parent = 0)
    {
        $data = Category::find()->where(['parent_id'=>$parent,'status'=>'1'])->all();
        if ($data) {
            foreach ($data as $item) {
                $this->allCateF[$item->category_id] = $item->category_name;
            }
        }
        return $this->allCateF;
    }

    /**
    * Lấy da danh mục ở frontend theo kiểu AsArray
    */

    public function getAllCategoryArray($parent = 0)
    {
        $data = Category::find()->where(['parent_id'=>$parent,'status'=>'1'])->asArray()->all();
        return $data;
    }


    /**
    * Lấy ra tên của danh mục khi có category_id
    */

    public function getCategoryNameByCategoryID($category_id)
    {
       $data = Category::find()->where(['category_id'=>$category_id,'status'=>'1'])->one();
       return $data->category_name;
    }
}
