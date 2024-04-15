<?php
use app\helpers\MailHelper;
require_once('/data/live/protected/modules/myproject/components/helpers/Mailhelper.php');
require_once('/data/live/protected/modules/myproject/components/helpers/CurlHelper.php');
class defaultController extends Controller
{
    public function actionIndex(){
// $url='https://fakestoreapi.com/products/1';
$url='http://3.110.217.66/insert/';
// $url='http://3.110.217.66/read/';
        // $response=CurlHelper::curl($url,"GET",[],null,[],'application/json');
         $dataToInsert = array(
            "name"=> 'Shivprasad',
            "age"=> 21,
            "email"=> 'nani@example.com'
         );
        // $jsonString = json_encode($dataToInsert);
        // echo($jsonString);exit;
        $response=CurlHelper::curl($url,"POST",$dataToInsert,null,[],'application/json');

        var_dump(($response));exit;
        // $modifier = new EMongoModifier();
        // $modifier->addModifier('email', 'set', 'karthik@gmail.com');
        // $criteria = new EMongoCriteria();
        // $criteria->addCond('email','==', 'karthik@gmai.com');
         
        // // update all matched documents using the modifiers
        // Jobs::model()->updateAll($modifier, $criteria); 

        // exit;
        $st=MailHelper::sendMail("mshivaprasad0101@gmail.com","Php Mail Test","just for mail test in php");
        echo $st;exit;
        $this->render('index');
    }
}