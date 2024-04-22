<?php

use app\helpers\MailHelper;

require_once('/data/live/protected/modules/myproject/components/helpers/MailHelper.php');
require_once('/data/live/protected/modules/myproject/components/helpers/CurlHelper.php');
class defaultController extends Controller
{
    public function actionIndex()
    {
        var_dump($_COOKIE['session']);
        $url = 'http://3.110.217.66/insert/';
        $url='http://3.110.217.66/read/';
        $response=CurlHelper::curl($url,"GET",[],null,[],'application/json');
        $dataToInsert = array(
            "name" => 'Shivprasad',
            "age" => 21,
            "email" => 'nani@example.com'
        );
        
        // $response = CurlHelper::curl($url, "POST", $dataToInsert, null, [], 'application/json');

        var_dump(($response));
        exit;
        $this->render('index');
    }

    public function actionChange()
    {
        $res = CronHelper::availabilityCheck();
        var_dump($res);
        exit;
    }

    public function actionHishiv()
    {
        $res = Yii::app()->cache->executeCommand('set', ['nani', 45, "EX", 60]);
        print_r(Yii::app()->cache->executeCommand("get", ['nani']));

        $session_id = Yii::app()->session->getSessionID();
        // echo '------------------------------------' . $session_id . "\n";
        $result = Yii::app()->cache->executeCommand('get', ["session::{$session_id}"]);
        // echo strlen($result);
        var_dump($result);
    }
    public function actionHello()
    {
        var_dump(CronHelper::rejectApplications());
        exit;
    }
}
