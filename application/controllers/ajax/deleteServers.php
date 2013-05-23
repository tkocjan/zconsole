<?php 
$logger->info('_REQUEST = ' . print_r($_REQUEST, true));

$serverIds = $_REQUEST['serverIds']; 

$logger->info('serverIds = ' . print_r($serverIds, true));

foreach ($serverIds as $serverId) {
    $serverRec = new ServerRec($serverId);
    $serverRec->active = 0;     //FALSE did not work

    $serverRec->save();    
}

$success = true;

echo json_encode( array("success" => $success) );
