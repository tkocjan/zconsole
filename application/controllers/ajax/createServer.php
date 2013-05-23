<?php 
$server = $_REQUEST['server'];
$logger->info( 'server = ' . print_r($server, true) );

//$serverName = $_REQUEST['serverName']; 
//$logger->info('serverName = ' . $serverName);
//$publicDNS = $_REQUEST['publicDNS'];
//$logger->info('publicDNS = ' . $publicDNS);
$ns = new Zend_Session_Namespace('Default');
$customerId = $ns->userId;
$logger->info('customerId = ' . $customerId);

//get the first for a template
$serverRec = new ServerRec( 1, NULL, FALSE );
$logger->debug( 'createServer: '.print_r($serverRec, true) );
unset($serverRec->id);

$serverRec->active = 1;
$serverRec->customerId = $customerId;
$serverRec->serverName = $server['name'];
$serverRec->publicDNS = $server['server_domain_name_attributes']['name'];

/*
$osType = new OSType( array('osTypeNum'=>$server['base_image_id']) );
$logger->info( 'osType = ' . print_r($osType, true) );
$serverRec->osTypeId = $osType->id;
*/

$osType = $appService->getOneFromArrayBy($appCfg->osTypes, 
        array('osTypeNum'=>$server['base_image_id']) );
$logger->info( 'osType = ' . print_r($osType, true) );
$serverRec->osTypeId = $osType->id;

$serverType = $appService->getOneFromArrayBy($appCfg->serverTypes, 
        array('codeName'=>$server['flavor_id']) );
$logger->info( 'serverType = ' . print_r($serverType, true) );
$serverRec->serverTypeId = $serverType->id;

$serverRec->diskSize = $server['disk_size'];

$serverRec->notes = '';
$serverRec->status = 'Running';
$serverRec->lastBackup = DATEZERO;
$current = date("Y-m-d H:i:s", time());
$serverRec->dateCreated = $current;
$serverRec->lastStart = $current;
$serverRec->lastStop = $current;

$logger->debug('createServer: before save: serverRec = ' . print_r($serverRec, true) );

$serverRec->save();

$logger->debug('createServer: after save: serverRec = ' . print_r($serverRec, true) );

$success = true;

echo json_encode( array("success" => $success) );
