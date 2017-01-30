<?php
namespace frontend\models;

use yii\base\Model;
use common\models\Customer;

/**
 * Signup form
 */
class CustomerSignupForm extends Model
{
    public $customer_username;
    public $email;
    public $password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['customer_username', 'trim'],
            ['customer_username', 'required','message'=>'Tên đăng nhập không được để trống'],
            ['customer_username', 'unique', 'targetClass' => '\common\models\Customer', 'message' => 'Tên Username đã bị trùng.'],
            ['customer_username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required','message'=>'Email không được để trống'],
            ['email', 'email','message'=>'Email không đúng định dạng'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Customer', 'message' => 'Email này đã tồn tại.'],

            ['password', 'required','message'=>'Mật khẩu không được để trống'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $customer = new Customer();
        $customer->customer_username = $this->customer_username;
        $customer->email = $this->email;
        $customer->setPassword($this->password);
        $customer->generateAuthKey();
        
        return $customer->save() ? $customer : null;
    }
}
