<?php
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Google\Service\CertificateAuthorityService\ObjectId;
class IndexController extends Controller{
    public $layout="emptylayout";
    public function actionIndex()

    {
        
         if(Yii::app()->session['jwtToken']){
            $token=Yii::app()->session['jwtToken'];
            $decoded = JWT::decode($token, new Key(Yii::app()->params['secretKey'], Yii::app()->params["algorithm"]));
            if(isset($decoded->data->email) ){
                if($decoded->data->role=="user"){

                    $this->redirect("/myproject/about");
                    return;
                }
                else if($decoded->data->role=="admin"){
                    $this->redirect("/myproject/admin/about");
                    return;
                }
        
        }
        
    }

        return $this->render("index");
    }

    public function  actionGetData()
    {
       $result= CurlHelper::curl("http://13.233.67.119/getData","GET",[],null,[],"application/json");
      print_r($result);
    }
    public function actionCount(){
$count=ApplicationCollection::model()->count();
var_dump($count);
    }
}
