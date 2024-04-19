<?php
class UserTracking extends EMongoDocument
{
    public $_id;
    public $email;
    public $jobName;
    public $companyName;
    public $category;
    public $location;
   public $jobid;
   public $date;

    public function rules()
    {
        return array(
           
           array('email,jobName,companyName,category,location,jobid','required')
           
        );
    }
    public function beforeSave(){
       
     $this->date=new MongoDate(time());
     return true;
    }
    // public function getMongoDBComponent(){
    //     return Yii::app()->mongodbMp;
    // }
    public function getCollectionName()
    {
        return 'UserTracking';
    }
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
    
}