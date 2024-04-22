<?php
class SignupHelper {

    public static function Signup($model, $test = false){

    if ($test || $model->validate()) {
        $model2=new Signupcolls();
        $model2->name=$model->name;
        $model2->email=strToLower($model->email);
        $model2->password=$model->password;
        if($model2->save()){
         return true;
        }
      }
      return false;
      
    }

}