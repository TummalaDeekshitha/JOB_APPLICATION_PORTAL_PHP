<?php
class JobDetails extends EMongoEmbeddedDocument
{
    public $salary;
    public $location;
    public $description;

    public function rules()
    {
        return array(
            ["salary,location,description", "safe"],
            ["salary,location,description", "required"],
            array('salary', 'numerical', 'integerOnly' => true),
            array('salary', 'validateGreaterThanZero'),
        );
    }
    public function validateGreaterThanZero($attribute, $params)
    {
        if ($this->$attribute <= 0) {
            $this->addError($attribute, ucfirst($attribute) . ' must be greater than zero.');
        }
    }
    public function embeddedDocuments()
    {
        return array(
            'salary' => 'salary',
            'location' => 'location',
            'description' => 'description',

        );
    }

}