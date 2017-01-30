<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $customer_id
 * @property string $customer_username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $id_province
 * @property string $address
 * @property string $fullname
 * @property string $image
 * @property string $mobile
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Province $idProvince
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required','message'=>'{attribute} không được để trống'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['customer_username', 'password_hash', 'password_reset_token', 'email', 'address', 'image'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['id_province', 'mobile'], 'string', 'max' => 20],
            [['fullname'], 'string', 'max' => 100],
            [['customer_username'], 'unique'],
            [['email'], 'unique'],
            [['email'], 'email'],
            [['password_reset_token'], 'unique'],
            [['id_province'], 'exist', 'skipOnError' => true, 'targetClass' => Province::className(), 'targetAttribute' => ['id_province' => 'province_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => 'Mã Khách Hàng',
            'customer_username' => 'Username Khách Hàng ',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'id_province' => 'Tỉnh Thành',
            'address' => 'Địa Chỉ',
            'fullname' => 'Họ và Tên',
            'image' => 'Hình Ảnh',
            'mobile' => 'Số Điện Thoại',
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
}
