<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "province".
 *
 * @property string $province_id
 * @property string $province_name
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Province extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'province';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['province_id', 'province_name', 'created_at', 'updated_at'], 'required','message'=>'{attribute} không được để trống'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['province_id'], 'string', 'max' => 20],
            [['province_name'], 'string', 'max' => 100],
            [['province_id'], 'unique','message'=>'{attribute} đã bị trùng'],
            [['province_name'], 'unique','message'=>'{attribute} đã bị trùng'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'province_id' => 'Mã Tỉnh Thành',
            'province_name' => 'Tên Tỉnh Thành',
            'status' => 'Kích Hoạt',
            'created_at' => 'Ngày Tạo',
            'updated_at' => 'Ngày Cập Nhật',
        ];
    }

    /**
    * Lấy ra danh sách Tỉnh thành
    */

    public function getAllProvince()
    {
        $province = [];
        $data = Province::find()->where(['status' => '1'])->all();
        if ($data) {
            foreach ($data as $item) {
               $province[$item->province_id] = $item->province_name;
            }
        }
        return $province;
    }


    /**
    * Danh sách tỉnh thành có [0] = Null để Insert trong Form Customer
    */

    public function getAllProvince1()
    {
        $province1 = [];
        $province1[''] = "CHọn tỉnh thành";
        $data = Province::find()->where(['status' => '1'])->all();
        if ($data) {
            foreach ($data as $item) {
               $province1[$item->province_id] = $item->province_name;
            }
        }
        return $province1;
    }
}

