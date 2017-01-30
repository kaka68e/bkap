<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "deliver".
 *
 * @property string $deliver_id
 * @property string $deliver_name
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Deliver extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deliver';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deliver_id', 'deliver_name', 'created_at', 'updated_at'], 'required','message'=>'{attribute} không được để trống'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['deliver_id'], 'string', 'max' => 20],
            [['deliver_name'], 'string', 'max' => 100],
            [['deliver_id'], 'unique','message'=>'{attribute} đã bị trùng'],
            [['deliver_name'], 'unique','message'=>'{attribute} đã bị trùng'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'deliver_id' => 'Mã PT Vận Chuyển',
            'deliver_name' => 'Tên PT Vận Chuyển',
            'status' => 'Kích Hoạt',
            'created_at' => 'Ngày Tạo',
            'updated_at' => 'Ngày Cập Nhật',
        ];
    }

    /**
    * Lấy da danh sách vận chuyển
    */

    public function getAllDelive()
    {
        $deliver = [];
        $data = Deliver::find()->where(['status' => '1'])->all();
        foreach ($data as $item) {
            $deliver[$item->deliver_id] = $item->deliver_name;
        }
        return $deliver;
    }
}
