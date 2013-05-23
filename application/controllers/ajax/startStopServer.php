<?php 
$logger->info('_REQUEST = ' . print_r($_REQUEST, true));

$id = $_REQUEST['id']; 
$action = $_REQUEST['action']; 

$logger->info('id = ' . $id);
$logger->info('action = ' . $action);

$serverRec = new ServerRec();   // only update coumns that change
$serverRec->id = $id;

switch ($action) {
    case 'Stop':
        $stop = TRUE;
        $start = FALSE;
        break;
    case 'Start':
        $stop = FALSE;
        $start = TRUE;
        break;
    case 'Restart':
        $stop = TRUE;
        $start = TRUE;
        break;
}

$current = date("Y-m-d H:i:s", time());

if ($stop) {
    $serverRec->status = 'Stopped';
    $serverRec->lastStop = $current;
}
if ($start) {
    $serverRec->status = 'Running';
    $serverRec->lastStart = $current;
}

$serverRec->save();
$success = true;

echo json_encode( array("success" => $success) );
