<?php
class ApplicationCollection extends EMongoDocument {
    public $name;
    public $email;
    public $companyName;
    public $jobTitle;
    public $phoneno;
    public $category;
    public $coverletter;
	public $resume;
    public $appliedDate;
    public $status;
    public $jobid;
    
    public function getCollectionName() {
        return 'applicationcollection'; // Replace with your MongoDB collection name
    }

    public function rules()
{
    return array(
        array('name, email, phoneno, coverletter,resume', 'required'),
        array('name, email, phoneno, coverletter, resume', 'safe'),
        array('email', 'MyCustomValidator'), 
        array('phoneno', 'match', 'pattern' => '/^\d{10}$/', 'message' => 'Phone number must be 10 digits.'),
        array('email', 'email'),
        array('appliedDate', 'default', 'value' => new MongoDate(time())),
    );
}

public function MyCustomValidator($attribute,$params)
{
    $y=Signupcolls::model()->findByAttributes(["email"=>$this->email]);
    if(!$y)
    {
        $this->addError('email', "The email you provided is not registered. Please ensure you have entered the correct email address ");
    }
    return ;

}

    public function beforeSave()
    {
        
        try{
            if ($this->isNewRecord) {
               
                $model=Jobs::model()->findByAttributes(["_id"=> new \MongoDB\BSON\ObjectId($this->jobid) ]);
                $this->category=$model->category;
                $this->jobTitle=$model->jobTitle;
                $this->companyName=$model->companyName;
            }
        }
        catch(Exception $e){
            return false;
        }
        return true;

    }
  
    public function attributeLabels() {
        return array(
            // Define attribute labels for form fields
            'name' => 'Full Name',
            'email' => 'Email',
            'companyname' => 'Company Name',
            'jobname' => 'Job Name',
            'phoneno' => 'Phone Number',
            'category' => 'Category',
            'coverletter' => 'Cover Letter',
            'resume' => 'Resume',
            'appliedDate' => 'Applied Date',
            'status' => 'Status',
        );
    }
    public static function model($className = __CLASS__) {
		return parent::model($className);
	}
}
