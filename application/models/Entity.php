<?php

abstract class Application_Model_Entity implements Application_Model_IEntity {
    
    public function __construct() {
        Logger::info(__METHOD__);
       $this->init(); 
    }
    
    public function init() {}
}
