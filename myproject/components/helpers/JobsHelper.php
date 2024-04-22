<?php

use app\helpers\MailHelper;

require_once('/data/live/protected/modules/myproject/components/helpers/MailHelper.php');

class JobsHelper
{
    public static function addjob()
    {
        $model = new Jobs();
        $path = $_FILES['Jobs']['tmp_name']['logo'];

        $s3Object = new S3Helper();
        $link = $s3Object->upload($path, "image/jpeg");
        $model->attributes = $_POST['Jobs']; //['AddForm'];
        $model->openings = intval($model->openings);
        $model->totalApplications = intval($model->totalApplications);
        $model->details->attributes = $_POST['JobDetails'];
        $model->details->salary = intval($model->details->salary);
        $model->logo = $link;
        $model->companyName = Yii::app()->session['empInfo']["companyName"];
        $tokenvalue = (Yii::app()->session['empInfo']['token']);
        $model->email = base64_decode($tokenvalue);
        $response = $model->save();
        if (!$response) {
            $errors = $model->errors;
        } else {
            unset($_POST['Jobs']);
            $errors = null;
        }

        return [$response, $errors];
    }

    public static function updateApplication()
    {
        $id = new MongoDB\BSON\ObjectID((string) $_POST["id"]);
        var_dump($id);
        $data = ApplicationCollection::model()->findByAttributes(array('_id' => $id));
        if ($data === null) {
            return null;
        }
        $data->status = $_POST["uStatus"];
        // var_dump($data);exit;
        $st = $data->update(['status'], true); //update is commented for testing
        // var_dump($st);exit;
        MailHelper::sendMail($data->email, "Application Status", strtoupper($_POST["uStatus"]));
        if ($st) {
            $id = new MongoDB\BSON\ObjectID((string) $_POST["jid"]);
            // $criteria = new EMongoCriteria();
            $doc = Jobs::model()->findByAttributes(array("_id" => $id));
            $doc->openings = $doc->openings - 1;
            // var_dump( $doc->openings);
            $doc->update(['openings'], true); //update is commented for testing

            // $modifier = new EMongoModifier();
            // $modifier->addModifier('openings', 'inc', -1);
            // $criteria->addCond('_id', '==', $id);
            // $status = ;//Jobs::model()->updateAll($modifier, $criteria);//update is commented for testing

        }
        // Delete the model
        // $data->delete();
        // Redirect to the index page or any other page
        unset($_POST["id"]);
        return $st;
    }
    public static function deletejob()
    {

        $id = new MongoDB\BSON\ObjectID((string) $_POST["id"]);
        $data = Jobs::model()->findByAttributes(array('_id' => $id));
        if ($data !== null) {
            $data->isAvailable = false;
            $data->openings = 0;
            $data->update(['isAvailable', 'openings'], true /* <- second parameter indicates to use partial update mechanism */);
            $modifier = new EMongoModifier();
            $modifier->addModifier('status', 'set', 'rejected');
            $criteria = new EMongoCriteria();
            $criteria->addCond('jobid', '==', (string) $_POST["id"]);
            $criteria->addCond('status', '==', 'applied');
            ApplicationCollection::model()->updateAll($modifier, $criteria);
        }
        unset($_POST["id"]);
        return true;
    }
}
