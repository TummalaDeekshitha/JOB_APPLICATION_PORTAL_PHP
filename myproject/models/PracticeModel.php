<?php 
class PracticeModel extends EMongoDocument
{
    public $_id;
    public $name;
    public $logo;
    public $password;
    public $companyDetails;

    public function getcollectionName()
    {
        return "practiceModel";
    }
    // public function embeddedDocuments(){
    //     return array(
    //      "companyDetails"=>"PracticeModelEmbedded"
    //     );

    // }
    public function Behaviours()
    {
        return array(
            "mybehav"=>array(
                "class"=>"ext.YiiMongoSuit.extra.EEmbeddedArraysBehaviour",
                "arrayPropertyName"=>"companyDetails",
                "arrayDocClassName"=>"PracticeArrayEmbedded"

            ),

        );
    }
    
    public function rules()
    {
        return array(
            array("name,logo,password","required"),
            array('name,logo,password',"safe")
        );
    }
    public function attributeLabels()
    {
        return array(
            "name"=>"Name",
            "logo"=>"Upload Profile"
        );
    }
public static function model($className=__CLASS__)
{
    return parent::model($className);
}
}