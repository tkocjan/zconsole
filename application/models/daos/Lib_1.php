<?php
class Lib
{    
    public static function secureConnection() {
        if (!isset($_SERVER['HTTPS'])) {
            $url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            die(header("Location: " . $url));
        }
    }
    
    public static function findObjectInArray($objArray, $conditions) {
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
?>
