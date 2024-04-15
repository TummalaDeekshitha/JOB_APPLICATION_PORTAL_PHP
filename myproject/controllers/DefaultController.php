<?php
use app\helpers\MailHelper;
require_once('//data/live/protected/modules/project/components/helpers/MailHelper.php');
class defaultController extends Controller
{
    public function actionIndex(){
        $st=MailHelper::sendMail("mshivaprasad0101@gmail.com","Php Mail Test","just for mail test in php");
        echo $st;exit;
        $this->render('index');
    }
}