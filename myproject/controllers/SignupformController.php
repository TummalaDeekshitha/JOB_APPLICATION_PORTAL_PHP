<?php
class SignupformController extends Controller
{
  public $layout='signinsignuplayout';
    public function actionIndex()
    { 
        $model = new Signupform(); // Create a new instance of Signupform model
        $this->render('signupform', array('model' => $model)); // Pass the model to the view
    }
    public function actionSignup()
     {
        if (isset($_POST["Signupform"])) {
            $attributes= $_POST["Signupform"];
            $model=new Signupform();
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
              $model = new Signupform();
              $this->render('signupform', array('model' => $model));
            }
        }
    }

