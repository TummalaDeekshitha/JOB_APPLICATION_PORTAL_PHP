<?php
class SignupHelper extends CComponent {

    public static function Signup($model, $test = false){

    if ($test || $model->validate()) {
        $model2=new Signupcolls();
        $model2->name=$model->name;
        $model2->email=$model->email;
        $model2->password=password_hash($model->password, PASSWORD_DEFAULT);
        if($model2->save()){
         return true;
        }
      }
      return false;
      
    }

}