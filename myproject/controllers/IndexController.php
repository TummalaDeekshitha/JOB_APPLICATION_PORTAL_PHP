<?php

use \Firebase\JWT\JWT;
use Firebase\JWT\Key;
// use Google\Service\CertificateAuthorityService\ObjectId;

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

        if (isset(Yii::app()->request->cookies["jwtToken"])) {
            $token = Yii::app()->request->cookies["jwtToken"]->value;
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
            $this->redirect(array("/myproject/employee/home"));
            return;
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
    //     $date=new DateTime();
    //     $date2=$date->format('y-m-d');
    //     $m=$date->format("m");
    //     $y=$date->format("y");
    //     if($m==1)
    //     {
    //         $y -=1;
    //         $m=12;
    //     }
    //     else{
    //         $m -=1;
    //     }
    //     $gro = ['$group' => ['_id' => ['month' => ['$month' => ['$toDate' => '$appliedDate']], 'year' => ['$year' => ['$toDate' => '$appliedDate']]], 'count' => ['$sum' => 1]]];
    //     $mat=[
    //         '$match'=>[
    //            "_id.month"=>$m+1
    //         ]
    //         ];
    //     $model=ApplicationCollection::model()->startAggregation()
    //     ->addStage($gro)
    //     ->addStage($mat)
    //     ->aggregate();  
    // var_dump($model);



    // }
 
    
}
