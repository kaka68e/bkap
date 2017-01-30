<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property string $payment_id
 * @property string $payment_name
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['payment_id', 'payment_name', 'created_at', 'updated_at'], 'required','message'=>'{attribute} không được để trống'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['payment_id'], 'string', 'max' => 20],
            [['payment_name'], 'string', 'max' => 100],
            [['payment_id'], 'unique','message'=>'{attribute} đã bị trùng'],
            [['payment_name'], 'unique','message'=>'{attribute} đã bị trùng'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'payment_id' => 'Mã Phương Thức Thanh Toán',
            'payment_name' => 'Tên Phương Thức Thanh Toán',
            'status' => 'Kích Hoạt',
            'created_at' => 'Ngày Tạo',
            'updated_at' => 'Ngày Cập Nhật',
        ];
    }

    /**
    * Lấy da danh sách thanh toán
    */

    public function getAllPayment()
    {
        $payment = [];
        $data = Payment::find()->where(['status' => '1'])->all();
        foreach ($data as $item) {
            $payment[$item->payment_id] = $item->payment_name;
        }
        return $payment;
    }
}
