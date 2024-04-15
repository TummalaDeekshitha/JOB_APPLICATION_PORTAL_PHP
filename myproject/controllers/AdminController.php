<?php
use app\helpers\Mailhelper;
require_once "/data/live/protected/modules/myproject/components/helpers/Mailhelper.php";
class AdminController extends CController{
  public $layout=FALSE;
  // public function filters()
  //   {
  //     return array(
  //       'AdminFilter ',
  //     );
  //   }
  //   public function filterAdminFilter($filterChain)
  // {
  //   $action = Yii::app()->controller->action->id;
 
  //   // Skip applying the filter if the action is 'code'
  //   if ($action !== 'Index' && $action !== 'Signin') {
  //     $filter = new AdminFilter();
  //     $filter->filter($filterChain);
  //   }
  //   else {
  //     // Call the next filter in the chain
  //     $filterChain->run();
  //   }
  // }
    public function actionIndex()
    {
        $model= new AdminSigninForm();
       $this->render("adminSigninForm",array("model"=>$model));
        
    }
    public function actionSignin()
    {
        $model=new AdminSigninForm();
        if(isset($_POST["AdminSigninForm"]))
        {
           $model->attributes=$_POST["AdminSigninForm"];
           if($model->validate())
           {   
              
               $payload = array('email' => $model->email,'role'=>"admin");
               $token = Yii::app()->jwt->encode($payload);
               echo $token;
               
               Yii::app()->session["jwtToken"]=$token;

             $this->redirect("/myproject/admin/about");
             }
             else{
               $this->redirect("/myproject/admin");
             }
           }
           else {
           $this->render('adminSigninForm', array('model' => $model));
          }
        }

     
  public function actionAbout()
  {
     $arr=AdminHelper::getEmployeeDetails();

     $this->render("adminAbout",array("employeeDetails"=>$arr));
  }
  public function actionRemoveemployer($email)
  {
    if(isset($email))
    {
      
      $s=AdminHelper::sendStatus($email,"sorry...Your permission got removed by admin",false);
      $arr=AdminHelper::getEmployeeDetails();
      if($s)
      {
      
      $this->render("adminAbout",array("employeeDetails"=>$arr));
      }
 else{
  $this->render("adminAbout",array("employeeDetails"=>$arr,"status"=>"something went wrong please try again"));
 }

    }
  }
  public function actionAddemployer($email)
  {
    if(isset($email))
    {
      
      $s=AdminHelper::sendStatus($email,"Hurray...you got permissions to post the jobs ",true);
      $arr=AdminHelper::getEmployeeDetails();
      if($s)
      {
      
      $this->render("adminAbout",array("employeeDetails"=>$arr));
      }
 else{
  $this->render("adminAbout",array("employeeDetails"=>$arr,"status"=>"something went wrong please try again"));
 }

    }
  }
  public function actionLogout()
  {
    Yii::app()->session->destroy();
    $this->redirect("/myproject/admin");
  }

}
     
    


