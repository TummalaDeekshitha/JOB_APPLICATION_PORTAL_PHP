<?php
use app\helpers\Mailhelper;
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once "/data/live/protected/modules/myproject/components/helpers/Mailhelper.php";
class AdminController extends CController{
  public $layout=false;
  public function beforeAction($action)
    {
      $action=yii::app()->controller->action->id;
      
      if($action=="index" || $action="signin")
      {
        return true;
      }


      else if(isset(Yii::app()->request->cookies['jwtToken']))
      {
        $token=Yii::app()->request->cookies['jwtToken']->value;
        $decoded = JWT::decode($token, new Key(Yii::app()->params['secretKey'], Yii::app()->params["algorithm"]));
       if(isset($decoded->data->email) ){
        if($decoded->data->role=="admin" ){
          return true;
        }
      }
      
    }
    return false;
  }

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
               $cookie=new CHttpCookie("jwtToken",$token);
              yii::app()->request->cookies['jwtToken']=$cookie;

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
    $cookie=Yii::app()->request->cookies["jwtToken"];
    $cookie->expire=time()-3600;
    Yii::app()->request->cookies['jwtToken'] = $cookie;
    unset(Yii::app()->request->cookies["jwtToken"]);
   
    $this->redirect("/myproject/index");
  }

}
     
    


