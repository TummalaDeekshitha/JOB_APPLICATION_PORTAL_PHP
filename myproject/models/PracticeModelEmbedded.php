<?php
 class PracticeModelEmbedded extends EMongoEmbeddedDocument
 {
    public $shift;
    public $company;
    public function rules()
    {
      return array(
        array("shift,company","required"),
array("shift,company","safe"),
      );
    }
    
 }