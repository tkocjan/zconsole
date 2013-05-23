<?php
class Application_Service_AppService {
    
    public static function getOneFromArrayBy($objArray, $conditions) {
        foreach($objArray as $obj) {
            $match = TRUE;
            foreach ($conditions as $property=>$value) {
                if ($obj->$property != $value) {
                    $match = FALSE;
                    break;
                }
            }
            if ($match)
                return $obj;
        }
        
        return FALSE;
    }
}
