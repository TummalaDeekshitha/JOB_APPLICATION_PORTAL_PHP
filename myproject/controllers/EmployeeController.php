<?php

use MongoDB\BSON\ObjectId;

class EmployeeController extends Controller
{
    /**
     * Declares class-based actions.
     */
    // public $layout = 'main';
    public $layout = 'hello';

    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }


    public function actionIndex()
    {
        if (!(Yii::app()->session["empInfo"]["token"])) {
            $this->redirect(array("/myproject"));
        }
        // $this->render('signupform',array('model'=>Employee::model()));
        $this->render(
            'index',
        );
    }

    public function actionHome()
    {

        if (!(Yii::app()->session["empInfo"]["token"])) {
            $this->redirect(array("/myproject"));
        }
        // echo "in the home action if";

        $this->layout = 'employeelayout';
        echo Yii::app()->session["empInfo"]["email"];
        $val = base64_decode(Yii::app()->session["empInfo"]["token"]);
        $model = Employee::model()->findByAttributes(array("email" => $val));
        $this->render(
            'home',
            array("data" => $model)
        );
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }


    public function actionSignin()
    {

        $model = new EmployeeSignin();
        if (isset($_POST['EmployeeSignin'])) {
            $response = EmployeeHelper::signin();
            if ($response['fun']) {
                $this->render(
                    $response['fun'],
                    array(
                        'model' => $response['model'],
                        "message" => $response['message']
                    )
                );
            } else {
                $this->redirect("/myproject/employee/home");
            }
            return;
        }
        $this->render(
            'signin',
            array(
                'model' => $model,
            )
        );
    }


    public function actionJobs()
    {
        if (!(Yii::app()->session["empInfo"]["token"])) {
            $this->redirect(array("/myproject"));
        }
        $this->redirect("/myproject/jobs/addjob");
    }

    public function actionDelete()
    {
        if (!(Yii::app()->session["empInfo"]["token"])) {
            $this->redirect(array("/myproject"));
        }
        $this->redirect("/myproject/jobs/delete");
    }

    public function actionMyapplicants()
    {
        if (!(Yii::app()->session["empInfo"]["token"])) {
            $this->redirect(array("/myproject"));
        }
        $this->layout = "employeelayout";
        $applications = EmployeeHelper::Myapplicants();
        $this->render("applicants", array('applications' => $applications));
    }



    public function actionPosts()
    {
        if (!(Yii::app()->session["empInfo"]["token"])) {
            $this->redirect(array("/myproject"));
        }
        $this->layout = 'employeelayout';
        $model = EmployeeHelper::posts();
        $this->render(
            'posts',
            array(
                'jobs' => $model,
                'model' => Jobs::model(),
            )
        );
    }

    /**
     * Displays the contact page
     */

    public function actionSignup()
    {
        $forming = new Employee;
        if (isset($_POST['Employee'])) {
            if (EmployeeHelper::signup()) {
                $this->redirect(
                    '/myproject/employee/home',
                );
                return;
            }
        }
        $this->render(
            'signup',
            array(
                'model' => $forming,
            )
        );
    }

    public function actionLogout()
    {
        Yii::app()->session->destroy();
        $this->redirect(array("/myproject"));
    }
}
