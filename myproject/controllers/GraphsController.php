<?php
class GraphsController extends CController{
    public $layout="graphlayout";
    public function actionShowCompanywiseDistribution()
    {
        $this->render("graph1");
    }

    public function actionGraphOne($category, $timerange)
{
    $response=GraphHelper::GraphOne($category,$timerange);
    
   echo  json_encode($response);
    
}
public function actionApplicationTrends()
{
  $this->render("graph2");
    
}



public function actionGraphTwo($category, $timeRange)
{
   $response=GraphHelper::GraphTwo($category,$timeRange);
   echo json_encode($response);
}


public function actionShowSearchDistribution()
{
    $this->render("graph3");
}
public function actionGraphThree($category, $timerange)
{
    $response=GraphHelper::GraphThree($category,$timerange);
    
   echo  json_encode($response);
    
}

}