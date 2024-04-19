<?php 
class PracticeController extends CController
{
    public $layout="signinsignuplayout";
    public function actionIndex(){
        $model=new  PracticeModel();
        $this->render("CActive",array("model"=>$model));
    }
    public function actionformSubmit()
    {
        if(isset($_POST["PracticeModel"]))
        {
          $model=new PracticeModel;
          $model->attributes=$_POST["PracticeModel"];
          $model2=new PracticeArrayEmbedded();
          $model2->attributes=$_POST["PracticeArrayEmbedded"][0];
          //foreach($_POST["PracticeArrayEmbedded] as $data)
          //$model2=new PracticeArrayEmbedded();
          //$model2->attributes=$data
          //$model->companyDEtails[0]=$model2
         $model->companyDetails[0]=$model2;
          if($model2->Validate()){
        if( $model->validate())
          {
            $model->save();
          }
        }
          
        }

    }

    // public function actionGraph(){
    //   $date=new DateTime();
    //  $grpstage=[
    //   $group=>[
    //     "_id"=>[
    //     "monthApplied"=>[$month=>[$toDate=>$AppliedDate]],
    //     "ApplicationYear"=>[$year=>[$toDate=>$AppliedDate]]
    //     ]
    //   ]
    //  ]
    
    // }
    public function actionAjaxreq()
    {
      // if(yii::app()->request->isAjaxRequest())
      // {
      //   $pg=Yii::app()->request->getPost("pageNo");
      $pg=1;
      $model=Jobs::model()->findAll();
      $count=count($model);
      $criteria=new EMongoCriteria();
      $criteria->sort("lastDate",1);
      $criteria->offset(($pg-1)*1);
      $criteria->limit(2);
      $model=Jobs::model()->findAll($criteria);

      $this->render("ajaxPractice",array("count"=>$count,"model"=>$model));
    // }
}
public function actionAjax()
    {
      // if(yii::app()->request->isAjaxRequest())
      // {
        $pg=Yii::app()->request->getPost("pg");
     $pg=(int)$pg;
      $model=Jobs::model()->findAll();
      $count=count($model);
      $criteria=new EMongoCriteria();
      $criteria->sort("lastDate",1);
      $criteria->offset(($pg-1)*1);
      $criteria->limit(2);
      $model=Jobs::model()->findAll($criteria);

    echo json_encode($model);
    // }

}
}
