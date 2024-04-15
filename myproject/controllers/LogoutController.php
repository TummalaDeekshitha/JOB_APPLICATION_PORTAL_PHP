<?php
class LogoutController extends Controller{
    public $layout='signinsignuplayout';
    public function actionIndex()
    {
        
        $email=Yii::app()->session["jwtToken"];
        var_dump(Yii::app()->session["jwtToken"]);
        
        $y=Yii::app()->user->getstate("username");
        Yii::app()->user->logout();
        echo $email;
        $this->redirect("/myproject/index");
      
    }
}