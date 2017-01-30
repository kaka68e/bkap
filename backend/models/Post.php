<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $post_id
 * @property string $post_name
 * @property string $post_slug
 * @property string $image
 * @property string $description
 * @property string $content
 * @property string $meta_keyword
 * @property string $meta_description
 * @property integer $total_view
 * @property integer $id_categorypost
 * @property integer $status
 * @property string $date_created_at
 * @property string $date_updated_at
 *
 * @property Categorypost $idCategorypost
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_name', 'post_slug', 'id_categorypost', 'date_created_at', 'date_updated_at'], 'required'],
            [['content'], 'string'],
            [['total_view', 'id_categorypost', 'status'], 'integer'],
            [['date_created_at', 'date_updated_at'], 'safe'],
            [['post_name', 'post_slug'], 'string', 'max' => 100],
            [['image', 'description', 'meta_keyword', 'meta_description'], 'string', 'max' => 255],
            [['post_name'], 'unique'],
            [['post_slug'], 'unique'],
            [['id_categorypost'], 'exist', 'skipOnError' => true, 'targetClass' => Categorypost::className(), 'targetAttribute' => ['id_categorypost' => 'categorypost_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Mã bài viết',
            'post_name' => 'Tên bài viết',
            'post_slug' => 'Slug',
            'image' => 'Hình ảnh bìa',
            'description' => 'Miêu tả',
            'content' => 'Nội dung',
            'meta_keyword' => 'Meta Keyword',
            'meta_description' => 'Meta Description',
            'total_view' => 'Tổng lượt xem',
            'id_categorypost' => 'Thể loại bài viết',
            'status' => 'Kích hoạt',
            'date_created_at' => 'Date tạo',
            'date_updated_at' => 'Date cập nhật',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategorypost()
    {
        return $this->hasOne(Categorypost::className(), ['categorypost_id' => 'id_categorypost']);
    }
}
