<?php
class SignupformController extends Controller
{
  public $layout='signinsignuplayout';
    public function actionIndex()
    { 
        $model = new Signupcolls(); // Create a new instance of Signupform model
        $this->render('signupform', array('model' => $model)); // Pass the model to the view
    }
    public function actionSignup()
     {
        if (isset($_POST["Signupcolls"])) {
            $attributes= $_POST["Signupcolls"];
            $model=new Signupcolls();
           
            $model->attributes=$attributes;
           
            $b=SignupHelper::Signup($model);
            
              if($b==true){
               $this->redirect('/myproject/signinform');
              }
              else if($b==false) {
               
               $this->render('signupform', array('model' => $model,'message'=>"enter correct details"));
                return;
              }
                
            } 
            else {
              $model = new Signupcolls();
              $this->render('signupform', array('model' => $model));
            }
        }
    }

