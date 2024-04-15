<?php
 
class EmployeeSignin extends CFormModel
{   public $email;
    public $password;
    // private $_identity;
    public $rememberMe = false;
 
    public function rules()
    {
        return array(
            array('password, email', 'required'),
            array('email', 'email'),
        );
    }
 
    public function attributeLabels()
    {
        return array(
            'email' => 'Email',
            'password' => 'Password',
        );
    }
 
}
 