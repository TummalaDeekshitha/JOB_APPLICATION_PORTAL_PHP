<?php

class Signupcolls extends EMongoDocument  {
	public $_id;
	public $name;
	public $email;
	public $password;
	

	public function getCollectionName() {
		return 'signupcolls';
	}

	public function primaryKey()
   {
       return 'email';
   }
	public function indexes() {
		return [
			'email'=>[
				'key'=>[
					'email'=>EMongoCriteria::SORT_ASC,
				],
				'unique'=>true
			]
		];
	}
	// public function getMongoDBComponent(){
    //     return Yii::app()->mongodbMp;
    // }
public function beforeSave()
{
    if($this->isNewRecord)
    {
        $this->email = strtolower($this->email);
        $this->password= password_hash($this->password, PASSWORD_DEFAULT);
    }
    
    return true;

}
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
        if (!$this->isNewRecord) {

            return parent::beforeSave();
        }
        $email = strtolower($this->$attribute);
        $existingUser =Signupcolls::model()->findByPk($email);
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

public static function model($className = __CLASS__) {
		return parent::model($className);
	}

}


