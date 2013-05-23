<?php 
$serverId = $_REQUEST['serverId']; 
$serverName = $_REQUEST['serverName']; 
$publicDNS = $_REQUEST['publicDNS'];
$ns = new Zend_Session_Namespace('Default');
$customerId = $ns->userId;

$logger->info('serverId = ' . $serverId);
$logger->info('serverName = ' . $serverName);
$logger->info('publicDNS = ' . $publicDNS);
$logger->info('customerId = ' . $customerId);

$serverRec = new ServerRec($serverId);
unset($serverRec->id);
$serverRec->serverName = $serverName;
$serverRec->publicDNS = $publicDNS;
$serverRec->notes = '';
$serverRec->status = 'Running';
$serverRec->lastBackup = DATEZERO;
$current = date("Y-m-d H:i:s", time());
$serverRec->dateCreated = $current;
$serverRec->lastStart = $current;
$serverRec->lastStop = $current;

$logger->info('cloneServer: before save: serverRec = ' . print_r($serverRec, true) );

$serverRec->save();

$logger->info('cloneServer: after save: serverRec = ' . print_r($serverRec, true) );

$success = true;

echo json_encode( array("success" => $success) );
?>