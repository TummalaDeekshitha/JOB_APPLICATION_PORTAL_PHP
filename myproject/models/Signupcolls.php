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
	public function getMongoDBComponent(){
        return Yii::app()->mongodbMp;
    }
public function beforeSave()
{
    
    $this->email = strtolower($this->email);
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

public static function model($className = __CLASS__) {
		return parent::model($className);
	}

}


// 12:22] Attadeep Ashok Jambhulkar
// <?php
// // require_once('./protected/modules/workWheels/models/Bookings.php');
// require('/data/live/protected/modules/workWheels/models/Bookings.php');
 
// use MongoDB\BSON\ObjectId;
// use Mockery\Adapter\Phpunit\MockeryTestCase;
// use PHPMailer\PHPMailer\PHPMailer;
 
// class BookingsTest extends MockeryTestCase
// {
//     private $mongoMock;
 
//     protected function setUp(): void
//     {
//         $this->mongoMock = new MongoMock;
   
//         parent::setUp();
//     }
 
//     protected function tearDown(): void
//     {
//         $this->mongoMock->close();
      
//         Mockery::close();
//         parent::tearDown();
//     }
 
//     public function testValidEmail()
//     {
//         $booking = new Bookings();
//         $booking->phone = 8956343653;
//         $booking->locationInput = 'xyv';
//         $booking->time = '10:30 AM';
//         $booking->latitude = 14.32;
//         $booking->longitude = 13.532;
//         $booking->returnTrip = 0;
//         $booking->email = 'test@example.com';
//         $this->assertFalse($booking->validate(), 'Non-Darwinbox email should fail validation');
 
//         $booking->email = 'test@darwinbox.io';
 
//         $this->assertTrue($booking->validate(), 'Darwinbox email should pass validation');
//     }
//     public function testValidPhoneNumber()
//     {
//         $booking = new Bookings();
//         $booking->phone = 8956343653;
//         $booking->locationInput = 'xyv';
//         $booking->time = '10:30 AM';
//         $booking->latitude = 14.32;
//         $booking->longitude = 13.532;
//         $booking->returnTrip = 0;
//         $booking->email = 'test@darwinbox.io';
//         $this->assertTrue($booking->validate(), 'Valid phone number should pass validation');
 
//         $booking->phone = '12345';
//         $this->assertFalse($booking->validate(), 'Invalid phone number should fail validation');
//     }
//     public function testFutureDate()
//     {
//         $booking = new Bookings();
//         $booking->phone = 8956343653;
//         $booking->locationInput = 'xyv';
//         $booking->time = '10:30 AM';
//         $booking->latitude = 14.32;
//         $booking->longitude = 13.532;
//         $booking->returnTrip = 0;
//         $booking->email = 'test@darwinbox.io';
//         $booking->date = date('Y-m-d', strtotime('+1 day'));
//         $this->assertTrue($booking->validate(), 'Future date should pass validation');
 
//         $booking->date = date('Y-m-d', strtotime('-1 day'));
//         $this->assertFalse($booking->validate(), 'Past date should fail validation');
//     }
 
//     public function testmodel(){
//         $booking = Bookings::model()->getAttributes();
//         $this->assertIsArray($booking);
//     }
 
//     public function testAttributeLables(){
//         $email_label = Bookings::model()->getAttributeLabel('email');
//         $phone_label = Bookings::model()->getAttributeLabel('phone');
//         $time_label = Bookings::model()->getAttributeLabel('time');
//         $date_label = Bookings::model()->getAttributeLabel('date');
//         $latitude_label = Bookings::model()->getAttributeLabel('latitude');
//         $longitude_label = Bookings::model()->getAttributeLabel('longitude');
//         $this->assertEquals($email_label,'Email Address');
//         $this->assertEquals($phone_label,'Phone Number');
//         $this->assertEquals($time_label,'Select Time');
//         $this->assertEquals($date_label,'Select Date');
//         $this->assertEquals($latitude_label,'Latitude');
//         $this->assertEquals($longitude_label,'Longitude');
//     }
 
//     public function testBeforeSave(){
//         $booking = new Bookings();
//         $booking->phone = 8956343653;
//         $booking->locationInput = 'xyv';
//         $booking->time = '10:30 AM';
//         $booking->latitude = 14.32;
//         $booking->longitude = 13.532;
//         $booking->returnTrip = 0;
//         $booking->email = 'test@darwinbox.io';
//         $booking->date = date('Y-m-d', strtotime('+1 day'));
//         $result = $booking->beforeSave();
//         $this->assertTrue($result);
      
//     }
 
//     public function testBeforeSaveForPreExistingDoc(){
//         $booking = Bookings::model()->findByPk(new ObjectId('660d8627581aa842520aa169'));
//         $result =   $booking->beforeSave();
//         $this->assertTrue($result);
//     }
// // }