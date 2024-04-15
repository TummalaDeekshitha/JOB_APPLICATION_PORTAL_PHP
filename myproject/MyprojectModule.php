<?php
class MyprojectModule extends CWebModule{
    public function init(){
        $this->setImport(array(
            'application.modules.myproject.models.*',
            'application.modules.myproject.components.*',
            'application.modules.myproject.components.helpers.*',
            'ext.YiiMongoDbSuite.*',
            'application.modules.myproject.modules.*',
            'application.filters.*',
            'application.modules.myproject.controllers.filters.*'
        ));
        $this->defaultController = 'index';
    }
}