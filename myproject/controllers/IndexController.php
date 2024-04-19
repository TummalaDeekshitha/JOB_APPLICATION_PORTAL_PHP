<?php

use \Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Google\Service\CertificateAuthorityService\ObjectId;

class IndexController extends Controller
{
   public $layout = FALSE;
//    public $defaultAction="view";

    // public function actionIndex()
    // {
      
    //     $obj =new MyBehaviour();
    //     $this->attachBehavior("bh1",$obj);
    //     echo $this->Hello();
        
    // }
    public function actionIndex()

    {

        if (Yii::app()->session['jwtToken']) {
            $token = Yii::app()->session['jwtToken'];
            $decoded = JWT::decode($token, new Key(Yii::app()->params['secretKey'], Yii::app()->params["algorithm"]));
            if (isset($decoded->data->email)) {
                if ($decoded->data->role == "user") {

                    $this->redirect("/myproject/about");
                    return;
                } else if ($decoded->data->role == "admin") {
                    $this->redirect("/myproject/admin/about");
                    return;
                }
            }
        }
        if ((Yii::app()->session["empInfo"]["token"])) {
            $this->redirect(array("/myproject/employee"));
        }

        return $this->render("index");
    }

    // public function  actionGetData()
    // {
    //     $result = CurlHelper::curl("http://13.233.67.119/getData", "GET", [], null, [], "application/json");
    //     print_r($result);
    // }
    // public function actionCount()
    // {
    //     $maxsize=ini_get("post_max_size");
    
    // }
 
    
}
