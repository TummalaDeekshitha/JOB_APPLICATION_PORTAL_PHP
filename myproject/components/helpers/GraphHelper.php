<?php
class GraphHelper 
{
public static function GraphOne($category,$timerange)
{
   $startDate=TimeHelper::startDate($timerange);
    
    $startStage = [
        '$match' => [
            'category' =>$category,
            'postedTime' => ['$gte' => new MongoDate($startDate->getTimestamp())]
        ]
    ];
    
    $groupStage = [
        '$group' => [
            '_id' => ['$toLower' => '$companyName'],
            'count' => ['$sum' => 1]
        ]
    ];
    
    $sortStage = ['$sort' => ['_id' => 1]];
    
    $result = Jobs::model()
        ->startAggregation()
        ->addStage($startStage)
        ->addStage($groupStage)
        ->addStage($sortStage)
        ->aggregate();
    
    
        $x=0;
        $labels = [];
        $documentCounts = [];
        
        
            foreach ($result['result'] as $doc) {
                
                    $labels[] = $doc['_id']; // Company names
                    $documentCounts[] = $doc['count']; // Document counts
                } 
                
            
        
        
        
            $response = array(
                'labels' => $labels,
                'documentCounts' => $documentCounts
            );
             return $response;
            
      
        }


public  static function GraphTwo($category, $timeRange)
{
    $startDate=TimeHelper::startDate($timeRange);
    
       

        $startStage = [
            '$match' => [
                'category' => $category,
                'appliedDate' => ['$gte' => new MongoDate($startDate->getTimestamp())]
            ]
        ];

        $groupStage = [
            '$group' => [
                '_id' => ['$dateToString' => ['format' => '%Y-%m-%d', 'date' => '$appliedDate']],
                'count' => ['$sum' => 1]
            ]
        ];

        $sortStage = ['$sort' => ['_id' => 1]];

        $result = ApplicationCollection::model()
            ->startAggregation()
            ->addStage($startStage)
            ->addStage($groupStage)
            ->addStage($sortStage)
            ->aggregate();

       $x=0;
        $labels = [];
        $documentCounts = [];
        
        
            foreach ($result['result'] as $doc) {
               
                    $labels[] = $doc['_id']; // Company names
                    $documentCounts[] = $doc['count']; // Document counts
                } 
            
        
        
            $response = array(
                'labels' => $labels,
                'documentCounts' => $documentCounts
            );
             return $response;
            
        }
        public static function GraphThree($category, $timerange)
        {
            $startDate = TimeHelper::startDate($timerange);
        
            $startStage = [
                '$match' => [
                    'category' => $category,
                    'date' => ['$gte' => new MongoDate($startDate->getTimestamp())]
                ]
            ];
            $groupStage = [
                '$group' => [
                    '_id' => ['$toLower' => '$jobName'],
                    'count' => ['$sum' => 1]
                ]
            ];
            $sortStage = [
                '$sort' => ['count' => -1] // Correcting sort stage
            ];
            $limitStage = [
                '$limit' => 10
            ];
        
            $result = UserTracking::model()->startAggregation()
                ->addStage($startStage)
                ->addStage($groupStage)
                ->addStage($sortStage)
                ->addStage($limitStage)
                ->aggregate();
        
            // Check if result is empty or null
            // if (!$result || empty($result['result'])) {
            //     // Return empty response or handle as needed
            //     return ['labels' => [], 'documentCounts' => []];
            // }
        
            $labels = [];
            $documentCounts = [];
            foreach ($result['result'] as $doc) {
                $labels[] = $doc['_id'];
                $documentCounts[] = $doc['count'];
            }
        
            return [
                "labels" => $labels,
                "documentCounts" => $documentCounts
            ];
        }
        
        
    }



