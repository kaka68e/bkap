<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property string $supplier_id
 * @property string $supplier_name
 * @property string $mobile
 * @property string $id_province
 * @property string $address
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Province $idProvince
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['supplier_id', 'supplier_name', 'mobile', 'id_province', 'address', 'created_at', 'updated_at'], 'required','message'=>'{attribute} không được để trống'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['supplier_id', 'mobile', 'id_province'], 'string', 'max' => 20],
            [['supplier_name'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 150],
            [['supplier_id'], 'unique','message'=>'{attribute} đã bị trùng'],
            [['supplier_name'], 'unique','message'=>'{attribute} đã bị trùng'],
            [['id_province'], 'exist', 'skipOnError' => true, 'targetClass' => Province::className(), 'targetAttribute' => ['id_province' => 'province_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'supplier_id' => 'Mã Nhà Cung Cấp',
            'supplier_name' => 'Tên Nhà Cung Cấp',
            'mobile' => 'Số Điện Thoại',
            'id_province' => 'Tỉnh Thành',
            'address' => 'Địa Chỉ',
            'status' => 'Kích Hoạt',
            'created_at' => 'Ngày Tạo',
            'updated_at' => 'Ngày Cập Nhật',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProvince()
    {
        return $this->hasOne(Province::className(), ['province_id' => 'id_province']);
    }


     /**
    * Lấy ra danh sách nhà cung cấp
    */

    public function getAllSupplier()
    {
        $supplier = [];
        $data = Supplier::find()->where(['status' => '1'])->all();
        if ($data) {
            foreach ($data as $item) {
               $supplier[$item->supplier_id] = $item->supplier_name;
            }
        }
        return $supplier;
    }
}
