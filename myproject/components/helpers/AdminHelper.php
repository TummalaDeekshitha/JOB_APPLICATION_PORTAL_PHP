<?php

class AdminHelper
{
    public static function getEmployeeDetails()
    {
        $criteria =new EMongoCriteria();
        $criteria->role("!=","admin");
        $models=Employee::model()->findAll($criteria);
        $arr=[];
        foreach($models as $model)
        {
         $arr[]=$model->getAttributes();
        }
        return $arr;
    }
    public static function sendStatus($email,$msg,$status)
    {
        $modifier=new EMongoModifier();
        $modifier->addModifier("eligibility","set",$status);
        $criteria=new EMongoCriteria();
        $criteria->email("==",$email);
        if(Employee::model()->updateAll($modifier,$criteria)){
        if(MailHelper::sendMail($email,"JobForge",$msg))
        {
            return true;

        }
        
       
    }
        
 return false;
        

    }
}