<?php
class LogoutController extends Controller{
    public $layout='signinsignuplayout';
    public function actionIndex()
    {
        
        $email=Yii::app()->session["jwtToken"];
       
        
        $y=Yii::app()->user->getstate("username");
        Yii::app()->user->logout();
        $this->redirect("/myproject/index");
      
    }
}