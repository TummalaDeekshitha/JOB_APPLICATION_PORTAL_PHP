<?php
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;
class AboutController extends CController{

    public function filters()
    {
    // 'AuthFilter-"index,jobs"',
      return array(
        'AuthFilter',
      );
    }
    public function filterAuthFilter($filterChain)
  {
    $filter = new AuthFilter();
    $filter->filter($filterChain);
  }

    public $layout="aboutpagelayout";
    public function actionIndex()
    {
        
     $username=Yii::app()->user->getState("username");
    
     return $this->render("about",array("username" =>$username ));
    }
   
    
    public function actionJobs($company=Null,$job=Null,$location=Null,$salary=Null,$category=NUll)
    {
        

        $result=AboutHelper::Jobs($company,$job,$location,$salary,$category);
        $pages = $result['pages'];
        $arr = $result['jobs'];
        $this->render("jobs", array(
                "jobdata" => $arr,
                "category" => $category,
                "pages" => $pages,
                "companyName"=>$company,
                "jobName"=>$job,
                "location"=>$location,
                "salary"=>$salary
            ));
        
    }
    public function actionUsertracking()
    {
        
        if(Yii::app()->request->isAjaxRequest){
    {
        $jobId = Yii::app()->request->getPost('jobId');
        $token=Yii::app()->request->cookies['jwtToken']->value;
        if ($jobId !== null  && $token ) {
        $decoded = JWT::decode($token, new Key(Yii::app()->params['secretKey'], Yii::app()->params["algorithm"]));
         $useremail=$decoded->data->email;
         $jobid =trim($jobId['$oid']);
        
        $status=AboutHelper::addUserTrack($jobid,$useremail);
        if($status){
            echo "Success";
            

        }
        else{
           
            echo "Failed";
        }
    }
}
    }}


    
     public function actionApplicationform($jobid)
     {

        $model=new ApplicationCollection();
        $this->render("applicationform",array("jobid"=>$jobid,"model"=>$model));
     }
    public function actionApplicationformsubmit()
{
    if (isset($_POST["ApplicationCollection"])) {
        $model = new ApplicationCollection();
        $model->attributes = $_POST['ApplicationCollection'];
        $tempFilePath = $_FILES['ApplicationCollection']['tmp_name']['resume'];
        $jobid = isset($_POST['job_id']) ? trim($_POST['job_id']) : null;
        $model->jobid=new MongoDB\BSON\ObjectId ($jobid);
        $model->resume=$tempFilePath;
        if (!$model->validate()) {
            $this->render("applicationform",
             array(
                "jobid" => $jobid,
                "model" => $model,

            )
        );
            return;
        }
        

        // Check if the user has already applied for this job
        $existingRecord = ApplicationCollection::model()->findByAttributes(array('email' => $model->email, 'jobid' => $model->jobid));
        if ($existingRecord) {
            $this->render("successpage",array("status"=>"applied"));
            return;
        }
         else {
        if (is_uploaded_file($tempFilePath)) {
            $path=$_FILES['ApplicationCollection']['tmp_name']['resume'];
            $s3Object = new S3Helper();
            $url = $s3Object->upload($path);
                // $s3Helper = new S3helper();
                // $url = $s3Helper->putObject($_FILES['ApplicationCollection']['name']['resume'], $tempFilePath);
            $model->resume = $url;
            } else {
                $this->render("successpage",array("status"=>"error"));
                return;
            }
            $model->status = "pending";
            
            
            if ($model->save()) {
                $this->render("successpage",array("status"=>"success"));
                return;
    
            } 
            else {
                $this->render("successpage",array("status"=>"error"));
                return;
            }

            
        }
    }
}
public function actionViewapplications()
{
    $email = Yii::app()->user->getState("email");

    
    $criteria = new EMongoCriteria;

   
    $criteria->addCond('email', '==', $email);

   
    $criteria->sort('appliedDate', EMongoCriteria::SORT_DESC);
    $applications = ApplicationCollection::model()->findAll($criteria);

    $this->render('yourapplications', array("applications" => $applications));
}

public function actionApplicationDetails()
{

    if(Yii::app()->request->isAjaxRequest){
        {
            $jobId=Yii::app()->request->getPost('JobId');
            $jobId=$jobId['$oid'];
            $application=AboutHelper::applicationDetails($jobId);

            if($application){

                 echo json_encode($application);
             }                       
            else{
               echo "Failed";
            }

        }

}

}

public function actionAtlaSearch()
{

   
    if(Yii::app()->request->isAjaxRequest) {
        $query = Yii::app()->request->getPost("query");
        

        $startStage = 
                  ['$search' => ['index' => 'default', 
                           'compound' => 
                           ['should' => 
                              [[
                              'autocomplete' => ['path' => 'companyName', 'query' => '/' . $query . '/i']], 
                              ['autocomplete' => ['path' => 'jobTitle', 'query' => '/' . $query . '/i']]
                              ],
                             'minimumShouldMatch' => 1
                            ]
                         ]
                    ]
        ;
        $matchStage=[
            '$match'=>[
              "email"=> Yii::app()->user->getState("email")
            ]
            ];
        $sortStage = [
            '$sort' => [
                'appliedDate' => -1
            ]
        ];
        
        if (!empty($query) && strlen($query) > 2) {
        $result =ApplicationCollection::model()
            ->startAggregation()
            ->addStage($startStage)
            ->addStage($matchStage)
            ->addStage($sortStage)
            ->aggregate();
 }
 else{
    $result =ApplicationCollection::model()
    ->startAggregation()
    // ->addStage($startStage)
    ->addStage($matchStage)
    ->addStage($sortStage)
    ->aggregate();
 }

        if ($result !== null) {
           echo  json_encode($result["result"]);
        } else {
            echo json_encode(['error' => 'No results found']);
        }
    }
}
public function actionFetchJobs()
{
    if(Yii::app()->request->isAjaxRequest){
        {
            $category=Yii::app()->request->getPost('category');
            $jobs=AboutHelper::fetchJobs($category);

            if($jobs)
            {
               echo json_encode($jobs);
            }
            else
            {
                echo "Failed";
            }
 }
}
}
// public function actionFilterJobs()
// {
//     if(Yii::app()->request->isAjaxRequest){
//         {
//             $category=Yii::app()->request->getPost('category');
//             $company=Yii::app()->request->getPost('company');
//             $jobTitle=Yii::app()->request->getPost('job');
//             $location=Yii::app()->request->getPost('location');
//             $salary=Yii::app()->request->getPost('salary');
//             $selectedJobs=AboutHelper::fetchJobs($category,$jobTitle,$company,$location,$salary);
//             if($selectedJobs)
//             {
//                 echo json_encode($selectedJobs);
//             }
//             else
//             {
//                 echo "error";
//             }
//         }
// }
// }


public function actionPagejobs()
{
    if(Yii::app()->request->isAjaxRequest){
        {
            $category=Yii::app()->request->getPost('category');
            $company=Yii::app()->request->getPost('company');
            $jobTitle=Yii::app()->request->getPost('job');
            $location=Yii::app()->request->getPost('location');
            $salary=Yii::app()->request->getPost('salary');
            $pageNo=Yii::app()->request->getPost('pageNumber');
            $selectedJobs=AboutHelper::fetchJobs($category,$jobTitle,$company,$location,$salary,(int)$pageNo);
            if(count($selectedJobs)>0)
            {
                echo json_encode($selectedJobs);
            }
            else
            {
                echo "empty";
            }


        }
}
}
}









