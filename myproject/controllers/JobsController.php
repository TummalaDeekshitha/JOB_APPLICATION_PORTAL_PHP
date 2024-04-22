<?php
require_once ('protected/modules/myproject/components/helpers/S3Helper.php');
class JobsController extends Controller
{
    /**
     * Declares class-based actions.
     */
    public $layout = 'main';
    
    public function beforeAction($action)
    {
        if (!(Yii::app()->session["empInfo"]["token"])) {
            $this->redirect(array("/myproject"));
        }
        return true;
    }
    
    public function actionIndex()
    {
        $this->redirect(array("/myproject/employee/home"));
    }

    public function actionUpdateApplication()
    {
        if (!empty($_POST) && isset($_POST["id"])) {
            $response = JobsHelper::updateApplication();
        }
        $this->redirect('/myproject/employee/myapplicants');

    }


    public function actionAddJob()
    {
        $this->layout = false;//"employeelayout";
        $model = new Jobs();

        if (isset($_POST['Jobs'])) {//['AddForm']
            $response = JobsHelper::addjob();
            // var_dump($response);exit;
            if ($response[0]) {
                $this->redirect('/myproject/employee/posts');
            } else {
                $this->render(
                    'addJob',
                    array(
                        'model' => $model,
                        'error' => $response[1],
                    )
                );
                return;
            }
        }
        $this->render(
            'addJob',
            array(
                'model' => $model,
            )
        );

    }

    public function actionCancel()
    {
        $this->redirect(array('/myproject/employee/home'));
    }

    // public function actionUpdate()
    // {

    //     if (isset($_POST['Jobs'])) {
    //         $response = JobsHelper::updatejob();
    //         if ($response) {
    //             $this->redirect('/myproject/jobs/');
    //         }
    //     }
    //     $this->render(
    //         'addJob',
    //         array(
    //             'model' => Jobs::model(),
    //         )
    //     );
    // }

    public function actionDelete()
    {
        $this->layout = false;
        if (!empty($_POST) && isset($_POST["id"])) {
            JobsHelper::deletejob();
        } else {
            echo "No id passed";
        }
        $this->redirect('/myproject/employee/posts');

    }

}