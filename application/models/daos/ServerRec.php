<?php
class ServerRec extends Dao
{    
    public function __construct($qualifier = null, $onlyActive = true) {
        parent::__construct($qualifier, $onlyActive);
    }
    
    public function getObjectArray($qualifier=array(), $paging=null, $onlyActive = true) {
        return parent::getObjectArray($qualifier, $paging, $onlyActive);
    }
}
?>