<?php
class Application_Service_DomainService {
    
    public function findOne($dataObj, $id = null, $onlyActive = false) {
        return new $dataObj($id, $onlyActive);
    }
    
    public function findManyBy($dataObj, $qualifier, $paging = null, $onlyActive = false) {
        $obj = new $dataObj();
        return $obj->getObjectArray($qualifier, $paging, $onlyActive);
    }
    
    public function findAll($dataObj, $paging = null, $onlyActive = false) {
        $obj = new $dataObj();
        return $obj->getObjectArray(null, $paging, $onlyActive);
    }
}
