<?php

class AdminSigninForm extends CFormModel
{
    public $_id;
    public $email;
    public $password;
   

    public function rules()
    {
        return array(
            array('password, email', 'required'),
            array('email', 'email'),
           
            array('password', 'authenticate'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'email' => 'Email',
            'password' => 'Password',
           
        );
    }
    public function authenticate()
    {
       // Find the user based on email and password
$user = Employee::model()->findByAttributes(["email" => $this->email]);

// If user is found and password matches
if ($user !== null && $user->password ===base64_encode($this->password)) {
    // Check if the user has admin role
    if ($user->role === "admin") {
        return true; // User is authenticated and has admin role
    } else {
        $this->addError('password', "You are not eligible"); // User is not admin
    }
} else {
    $this->addError('password', "Invalid Credentials"); // User not found or password incorrect
}


    }
}