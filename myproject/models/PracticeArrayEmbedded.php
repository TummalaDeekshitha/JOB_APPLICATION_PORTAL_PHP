<?php 
class PracticeArrayEmbedded extends EMongoEmbeddedDocument
{
    public $shift;
    public $companyName;
    public function rules()
    {
        return array(
              array("shift,companyName","required") ,
              array("shift,companyName","safe")
        );
    }
}