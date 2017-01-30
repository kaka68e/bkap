<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "categorypost".
 *
 * @property integer $categorypost_id
 * @property string $categorypost_name
 * @property string $categorypost_slug
 * @property integer $parent_id
 * @property string $image
 * @property string $description
 * @property integer $order_by
 * @property string $meta_keyword
 * @property string $meta_description
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Post[] $posts
 */
class Categorypost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categorypost';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categorypost_name', 'categorypost_slug', 'created_at', 'updated_at'], 'required'],
            [['parent_id', 'order_by', 'status', 'created_at', 'updated_at'], 'integer'],
            [['categorypost_name', 'categorypost_slug'], 'string', 'max' => 100],
            [['image', 'description', 'meta_keyword', 'meta_description'], 'string', 'max' => 255],
            [['categorypost_name'], 'unique'],
            [['categorypost_slug'], 'unique'],
            [['order_by'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'categorypost_id' => 'Mã Thể loại Tin Tức',
            'categorypost_name' => 'Tên Thể loại Tin Tức',
            'categorypost_slug' => 'Categorypost Slug',
            'parent_id' => 'Danh mục cha',
            'image' => 'Hình ảnh',
            'description' => 'Miêu tả',
            'order_by' => 'Sắp xếp',
            'meta_keyword' => 'Meta Keyword',
            'meta_description' => 'Meta Description',
            'status' => 'Kích hoạt',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày cập nhật',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['id_categorypost' => 'categorypost_id']);
    }


     /* Hàm này sẽ sử dụng kĩ thuật đệ quy để lấy ra danh sách thể loại để hiển thị trong From nhập
    */
    private $_catepost1 = [];

    public function getCategoryPostParent1($parent = 0,$level = '')
    {
        $this->_catepost1[0] = 'Root';
        $data = Categorypost::find()->where(['parent_id' => $parent,'status' => '1'])->all();
        $level .= '-----| ';
        if ($data) {
            foreach ($data as $item) {
                if ($item->parent_id == 0) {
                    $level = '';
                }
                $this->_catepost1[$item->categorypost_id] = $level.$item->categorypost_name;
                $this->getCategoryPostParent1($item->categorypost_id,$level);
            }
        }
        return $this->_catepost1;
    }


    private $_catepost2 = [];

    public function getCategoryPostParent2($parent = 0,$level = '')
    {
        $data = Categorypost::find()->where(['parent_id' => $parent,'status' => '1'])->all();
        $level .= '-----| ';
        if ($data) {
            foreach ($data as $item) {
                if ($item->parent_id == 0) {
                    $level = '';
                }
                $this->_catepost2[$item->categorypost_id] = $level.$item->categorypost_name;
                $this->getCategoryPostParent2($item->categorypost_id,$level);
            }
        }
        return $this->_catepost2;
    }
}
