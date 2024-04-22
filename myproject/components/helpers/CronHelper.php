<?php


class CronHelper
{
    public static function availabilityCheck()
    {
        $modifier = new EMongoModifier();
        // replace field1 value with 'new value'
        $modifier->addModifier('isAvailable', 'set', false);

        // prepare search to find documents
        $criteria = new EMongoCriteria();
        $criteria->addCond('openings', '<=', 0);
        $criteria->addCond('isAvailable', '==', true);
        $status = Jobs::model()->updateAll($modifier, $criteria);

        return $status;
    }

    public static function rejectApplications()
    {
        $data = ApplicationCollection::model()
            ->startAggregation()
            ->match(['status' => 'applied'])
            ->addStage(['$lookup' => ['from' => 'jobs', 'localField' => 'jobid', 'foreignField' => '_id', 'as' => 'job']])
            ->addStage(['$unwind' => '$job'])
            ->match(['job.isAvailable' => false])
            ->project(['_id' => 1, 'jobid' => 1, 'status' => 1, 'email' => 1])
            ->aggregate();

        foreach ($data['result'] as $doc) {
            $id = new MongoDB\BSON\ObjectID((string) $doc['_id']);

            $document = ApplicationCollection::model()->findByAttributes(array("_id" => $id));
            $document->status = "rejected";
            $document->update(['status'], true); //update is commented for testing
            $emailContent = "
<html>
<head>
  <title>Your Email Subject</title>
</head>
<body style='font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333;'>
  <div style='max-width: 600px; margin: 0 auto; padding: 20px; background-color: #fff; border-radius: 5px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);'>
    <h1>Hello $document->name,</h1>
    <p style='font-size: 16px; line-height: 1.6;'>We will get back to you.</p>
  </div>
</body>
</html>
";
            MailHelper::sendMail($document->email, "Application Status", $emailContent);
        }

        return $data['result'];
        
    }
}
