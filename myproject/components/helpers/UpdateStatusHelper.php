<?php
class UpdateStatusHelper extends CComponent
{
public static function UpdateStatus()
{
  
    $modifier = new EMongoModifier();
    $modifier->addModifier('status', 'set', "applied");
    $criteria = new EMongoCriteria();
    $criteria->addCond("status","==","pending");
    ApplicationCollection::model()->updateAll($modifier, $criteria);
  
}

}