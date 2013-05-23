<?php
class AB_Log {
    static function info($method='noMethod', $msg='Entry') {
        global $logger;
        $logger->info($method.': '.$msg);
    }
    
    static function debug($method='noMethod', $msg='Entry') {
        global $logger;
        $logger->debug($method.': '.$msg);
    }
}
