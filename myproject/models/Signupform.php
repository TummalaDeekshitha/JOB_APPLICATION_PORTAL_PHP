<?php
class Signupform extends CFormModel
{  public $_id;
    public $name;
    public $email;
    public $password;
    
    public function rules()
    {
        return array(
            array('name, email, password', 'required'),
            array('name, email, password, _id', 'safe'),
            array('email', 'email'), // Ensure that the email is a valid email address format
            array('email', 'uniqueEmail'), // Ensure email is unique
            array(
                'password', 'match',  'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',
                'message' => 'Password should contain at least one uppercase letter, one lowercase letter, one number, and one special character.'
            ),
        );
    }
    public function uniqueEmail($attribute)
    {   
        $email = strtolower($this->$attribute);
        $existingUser =Signupcolls::model()->findByAttributes(array('email' =>$email));
        if ($existingUser !== null) {
            $this->addError($attribute, 'This email is already registered.');
            return false;
        }
        return true;
    }
  
    public function attributeLabels()
    {
        return array(
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        );
    }
    
}
