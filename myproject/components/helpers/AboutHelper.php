<?php
class AboutHelper extends CComponent {
    public static function addUserTrack($jobid, $useremail)
    {
       
        
        $existingModel = UserTracking::model()->findByAttributes(['email' => $useremail,'jobid'=>$jobid]);
        $model = new UserTracking();
        $model->email = $useremail;
        if ($existingModel == null) {
            
            $job=Jobs::model()->findByPk($jobid);
        
            $model->jobid= $jobid;
            $model->jobName=$job->jobTitle;
            $model->category=$job->category;
            $model->companyName=$job->companyName;
            $model->location=$job->details->location;
            
            if ($model->save()!=Null) {
                return true;
            } 
        }
        return false;
    }
   
    
    public static function jobs($company=Null,$job=Null,$location=Null,$salary=Null,$category=NUll)
    {
        $today = new MongoDate(strtotime(date('Y-m-d')));
            $criteria=new EMongoCriteria();
            
            $criteria->openings("greater",0);
            $criteria->category("==",$category);
            $criteria->lastDate(">=",$today);
            if (!empty($company)) {
                $criteria->companyName("==", $company);
            }
            
            if (!empty($job)) {
                $criteria->jobTitle("==", $job);
            }
            
            if (!empty($location)) {
                $criteria->addCond("details.location", "==", $location);
            }
            
            if (!empty($salary)) {
                $criteria->addCond("details.salary", "greater", (int)$salary);
            }
        
           $totalCount = Jobs::model()->count($criteria);
           $pagesize=6;
            // Adjust the offset based on the current page
            $criteria->limit($pagesize);
            $totalPages = ceil($totalCount / $pagesize);
            
    
            $docs = Jobs::model()->findAll($criteria);
            $arr=[];
            foreach($docs as $doc){
                $arr[]=$doc->getAttributes();
            }
            
            return ['pages' => $totalPages, 'jobs' => $arr];
            
    }
    public static function applicationDetails($jobId)
    {
       
     $application=Jobs::model()->findByAttributes(array("_id"=> new MongoDB\BSON\ObjectId ($jobId)));
     
     $application= $application->getAttributes();
     $application['lastDate'] = date('Y-m-d', $application['lastDate']->sec);
     return $application;

    }

    public static function fetchJobs($category = null, $jobTitle = null, $companyName = null,$location=null,$salary=null,$pageNo=Null)
    {
        // Constructing the criteria for the query
        $criteria = array(
            "lastDate" => ['$gte' => new MongoDate()],
            "openings" => ['$gt' => 0]
        );
        if (!empty(trim($category))) {
            $criteria["category"] = trim($category);
        }
        
        if (!empty(trim($jobTitle))) {
            $criteria["jobTitle"] = trim($jobTitle);
        }
        
        if (!empty(trim($companyName))) {
            $criteria["companyName"] = trim($companyName);
        }
        
        if(!empty(trim($location))) {
            $criteria["details.location"] = trim($location);
        }
        
        if(!empty(trim($salary))) {
            $salary = (int) trim($salary);
            $criteria["details.salary"] = ['$gte' => $salary];
        }
        
    if ($pageNo !== null) {
        // Determine the number of items per page
        $pageSize = 6;
        $offset = ($pageNo - 1) * $pageSize;
        $stagematch=[
            '$match'=>$criteria
        ];
        $limit=[
            '$limit'=>6
        ];
        $skip=[
            '$skip'=>$offset
        ]
        ;
        $jobs = Jobs::model()->startAggregation()
        ->addStage($stagematch)
        ->addStage($skip)
        ->addStage(($limit))
        ->aggregate();

        $jobs=$jobs["result"];
        $result = [];
        foreach ($jobs as $job) {
            
            $job['lastDate'] = date('Y-m-d', $job['lastDate']->sec);
            $result[] = $job;
        }
    
        return $result;

    } else {
        // Fetch all jobs without pagination
        $jobs = Jobs::model()->findAllByAttributes($criteria);
    
     
    
        // Formatting and returning results
        $result = [];
        foreach ($jobs as $job) {
            $jobAttributes = $job->getAttributes();
            $jobAttributes['lastDate'] = date('Y-m-d', $jobAttributes['lastDate']->sec);
            $result[] = $jobAttributes;
        }
    
        return $result;
    }
    }
    

    
}
