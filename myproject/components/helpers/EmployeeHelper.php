<?php
use app\helpers\MailHelper;
require_once('/data/live/protected/modules/myproject/components/helpers/Mailhelper.php');

class EmployeeHelper
{
    public static function Signup()
    {
        if (isset($_POST['Employee'])) {//['AddForm']
            $modell = new Employee();
            $path = $_FILES['Employee']['tmp_name']['profile'];
            $s3Object = new S3Helper();
            $link = $s3Object->upload($path, "image/jpeg");
            $modell->attributes = $_POST['Employee'];//['AddForm'];
            $modell->profile = $link;


            $response = $modell->save();
            if ($response) {
                MailHelper::sendMail($_POST['Employee']['email'], "Signup", "Signup Success");

            } else {
                MailHelper::sendMail($_POST['Employee']['email'], "Signup", "Signup failed");

            }
            unset($_POST['Employee']);
        }
        return $response;
    }

    public static function Myapplicants()
    {
        $criteria = new EMongoCriteria;
        $criteria->addCond('email', '==', base64_decode((Yii::app()->session["empInfo"]["token"])));
        $distinctValues = Jobs::model()->findAll($criteria);
        $jobIds = array_map(function ($id) {
            return ((string) $id["_id"]);
        }, $distinctValues);

        $criteria = new EMongoCriteria;
        $criteria = [
            'jobid' => ['$in' => $jobIds],
            'status' => "applied",
        ];
        if (isset($_POST['selectCategory']) && ($_POST['selectCategory'] == "software" || $_POST['selectCategory'] == "core")) {

            $criteria['category'] = $_POST['selectCategory'];
            unset($_POST['selectCategory']);

        }
        $applications = ApplicationCollection::model()->findAllByAttributes($criteria);
        return $applications;
    }

    public static function signin()
    {
        $model = new EmployeeSignin();
        $model->attributes = $_POST["EmployeeSignin"];
        if ($model->validate()) {
            $mdl = Employee::model()->findByAttributes(array('email' => $_POST["EmployeeSignin"]["email"]));
            if ($mdl && $mdl["password"] === base64_encode($_POST['EmployeeSignin']['password'])) {
                if ($mdl["eligibility"]) {
                    $encodedEmail = base64_encode($mdl['email']);
                    $companyName = $mdl["companyName"];
                    Yii::app()->session['empInfo'] = array(
                        'companyName' => $companyName,//['result'][0]['companyName'],
                        'token' => $encodedEmail
                    );
                    Mailhelper::sendMail($_POST['EmployeeSignin']['email'], "Signin", "Signin Success");
                    unset($_POST['EmployeeSignin']);

                    return 1;
                } else {
                    Mailhelper::sendMail($_POST['EmployeeSignin']['email'], "Signin", "Admin not yet approved you.");

                    unset($_POST['EmployeeSignin']);

                    return array(
                        'fun' => 'signin',
                        'model' => $model,
                        "message" => 'Admin not yet approved you.'
                    );
                }
            } elseif ($mdl) {
                MailHelper::sendMail($_POST['EmployeeSignin']['email'], "Signin", 'Incorrect password');

                unset($_POST['EmployeeSignin']);
                return array(
                    'fun' => 'signin',
                    'model' => $model,
                    "message" => 'Incorrect password'
                );
            } else {
                MailHelper::sendMail($_POST['EmployeeSignin']['email'], "Signup", "User not found please signup.");
                unset($_POST['EmployeeSignin']);
                return array(
                    'fun' => 'signup',
                    'model' => Employee::model(),
                    "message" => 'User not found please signup.'
                );
            }

        } else {
            return array(
                'fun' => 'signin',
                'model' => $model,
                "message" => 'Email is not in proper format.'
            );

        }
    }
    public static function posts()
    {
        $model = new Jobs;
        $criteria = new EMongoCriteria;
        $criteria = ['email' => base64_decode(Yii::app()->session['empInfo']["token"]), "isAvailable" => true];
        if (isset($_POST['selectCategory']) && ($_POST['selectCategory'] == "software" || $_POST['selectCategory'] == "core")) {
            $criteria['category'] = $_POST['selectCategory'];
            unset($_POST['selectCategory']);

        }
        $model = $model->findAllByAttributes($criteria);
        return $model;
    }
}