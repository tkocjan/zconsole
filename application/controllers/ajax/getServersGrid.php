<?php
$ns = new Zend_Session_Namespace('Default');
$customerId = $ns->userId;

// Get the requested page. By default grid sets this to 1. 
$page = $_GET['page']; 
 
// get how many rows we want to have into the grid - rowNum parameter in the grid 
$limit = $_GET['rows'];
if (empty($limit))
    $limit='0';
 
// get index row - i.e. user click to sort. At first time sortname parameter -
// after that the index from colModel 
$sidx = $_GET['sidx']; 
 
// sorting order - at first time sortorder 
$sord = $_GET['sord'];

$logger->info( 'getServersGrid: page = ' . $page );
$logger->info( 'getServersGrid: rows = ' . $limit );
$logger->info( 'getServersGrid: sidx = ' . $sidx );
$logger->info( 'getServersGrid: sord = ' . $sord );

$paging = new stdClass;
$paging->page = $page;
$paging->limit = $limit;
$paging->sidx = $sidx;
$paging->sord = $sord;

//$serverRec = new ServerRec();
//$serverRecs = $serverRec->getObjectArray( array('customerId'=>$customerId), $paging );

$serverRecs = $domainService->findManyBy(
    'ServerRec', array('customerId'=>$customerId), $paging, true);

$logger->debug( 'getServersGrid: serverRecs='.print_r($serverRecs, true) );

// we should set the appropriate header information. Do not forget this.
//ob_end_clean();
header('Content-type: application/xml;charset=utf-8');
 
$s  = '<?xml version="1.0" encoding="utf-8"?>'.PHP_EOL;
$s .= '<rows>'.PHP_EOL;
//$s .= '<page>1</page>'.PHP_EOL;
//$s .= '<total>1</total>'.PHP_EOL;
//$s .= '<records>20</records>'.PHP_EOL;
echo $s;

foreach ($serverRecs as $serverRec) {
    $logger->debug('getting ServerInfo: id='.$serverRec->id);
    $serverInfo = new ServerInfo($serverRec->id);
    $logger->debug( print_r($serverInfo, true) );
    $s = "<row id='{$serverRec->id}'>".PHP_EOL;
    
    // Name cell
    if (empty($serverRec->notes) )
        $note = '';
    else {
        $note = " <img align='absmiddle' title='{$serverRec->notes}' src='{$app_images->noteIcon}'".
        " class='tooltip_icon' alt='Note'> ";
    }
    $s .= createCell(
        " <img align='absmiddle' src='{$app_images->serverIcon}' alt='Server'> {$serverRec->serverName}".$note);
    
    // Status cell
    $s .= createCell(
        " <img align='absmiddle' src='{$app_images->statusIcon[$serverRec->status]}'". //class='state_icon' ".
        " alt='Status'> {$serverRec->status}" );
    
    // Op Sys
    $s .= createCell(
        " <img align='absmiddle' title='{$serverInfo->osType->longName}' ".
        " src='{$app_images->osIconPath}/{$serverInfo->osType->iconFilename}' alt='{$serverInfo->osType->shortName}'> ".
        " {$serverInfo->osType->shortName}");
        
    // Server Type
    $s .= createCell(" {$serverInfo->serverType->shortName}");
        
    // Server Location
    $s .= createCell(
        " <img align='absmiddle' src='{$app_images->flagIconPath}/{$serverInfo->locationType->iconFilename}'". 
        " alt='{$serverInfo->locationType->shortName}'> {$serverInfo->locationType->longName}");
    
    // Cloud Account
    $s .= createCell(
        " <img src='{$app_images->hosterIconPath}/{$serverInfo->hosterType->iconFilename}'".
        " alt='{$serverInfo->hosterType->hosterName}'> {$serverInfo->cloudAccountRec->cloudAccountName}");

    $s .= '</row>'.PHP_EOL; 
    echo $s;
}

echo '</rows>'.PHP_EOL; 

function createCell($data) {
    return('<cell><![CDATA['.$data .']]></cell>'.PHP_EOL);    
}

?>