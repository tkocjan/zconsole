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

$serverRec = new ServerRec();
$serverRec->id = $serverId;
$serverRec->serverName = $serverName;
$serverRec->publicDNS = $publicDNS;

$serverRec->save();
$success = true;

echo json_encode( array("success" => $success) );
?>