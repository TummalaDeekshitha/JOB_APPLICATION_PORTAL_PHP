<?php
class LogoutController extends Controller{
    public $layout='signinsignuplayout';
    public function actionIndex()
    {
        
        // $email=Yii::app()->session["jwtToken"];
        Yii::app()->user->logout();
        $cookie=yii::app()->request->cookies["jwtToken"];
        $cookie->expire=time()-3600;
        Yii::app()->request->cookies['jwtToken'] = $cookie;
        unset( Yii::app()->request->cookies['jwtToken']);
        
        $cookie=yii::app()->request->cookies["jwtToken"]->value;
       
        $this->redirect("/myproject/index");
      
    }
}