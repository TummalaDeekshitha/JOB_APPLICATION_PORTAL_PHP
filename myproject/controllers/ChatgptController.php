<?php 
class ChatgptController extends Controller{
public $layout=FALSE;
public function actionIndex(){

 $this->render("chatgpt");
}
public function actionMessage()
{   
    if(Yii::app()->request->isAjaxRequest){
        if(Yii::app()->request->getPost('message')){
          $message=Yii::app()->request->getPost('message');
          $res = ChatgptHelper::getChat($message);
          echo($res);
          json_encode(['response'=>$res]);
        }
    }
}

}