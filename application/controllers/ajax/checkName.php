<?php 
$form = $_GET['form']; 
$serverId = $_GET['serverId']; 
$field = $_GET['field']; 
$value = $_GET['value'];
$ns = new Zend_Session_Namespace('Default');
$customerId = $ns->userId;

$logger->info("form = " . $form);
$logger->info("serverId = " . $serverId);
$logger->info("field = " . $field);
$logger->info("value = " . $value);
$logger->info("customerId = " . $customerId);

if ($field == "serverName") {
    $error = "Name already taken";
    //unique for customerId
    $qualifier = array("customerId" => $customerId, "serverName" => $value);
}
else {
    $error = "Domain Name already taken";
    //unique for all recs
    $qualifier = array("publicDNS" => $value);    
}

$serverRec = new ServerRec($qualifier);
$logger->info("serverRec = " . print_r($serverRec, true));
if ( !isset($serverRec->id) )
    $error = "";    // unique name, no conflict
else {
    if ($form == 'rename' && $serverRec->id == $serverId)
        $error = "";    // no change, no conflict
}

echo json_encode( array("field" => $field, "error" => $error) );
?>