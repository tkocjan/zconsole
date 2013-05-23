<?php
class ServerInfo extends Dao
{
    protected function populate($conditional, $returnArray = FALSE, $paging=NULL) {
        include PORTABLE_METHOD;
        
        //$logger->debug("conditional=" . print_r($conditional, true) );
        
        $serverRec = new ServerRec($conditional);
        $this->serverRec = $serverRec;        
        $this->cloudAccountRec = new CloudAccountRec($serverRec->cloudAccountId);
/*       
        $this->hosterType = new HosterType($this->cloudAccountRec->hosterTypeId);
        $this->appType = new AppType($serverRec->appTypeId);
        $this->serverType = new ServerType($serverRec->serverTypeId);
        $this->osType = new OSType($serverRec->osTypeId);
        $this->locationType = new LocationType($serverRec->locationTypeId);
*/
        $this->hosterType = $appCfg->hosterTypes[$this->cloudAccountRec->hosterTypeId];
        $this->appType = $appCfg->appTypes[$serverRec->appTypeId];
        $this->serverType = $appCfg->serverTypes[$serverRec->serverTypeId];
        $this->osType = $appCfg->osTypes[$serverRec->osTypeId];
        $this->locationType = $appCfg->locationTypes[$serverRec->locationTypeId];
        
        //$logger->debug('ServerInfo: $this = ' . print_r($this, true) );
    }
    
    public function save() {die("Can't call ServerInfo::save!");}
    protected function create() {die("Can't call ServerInfo::create!");}
    protected function update() {die("Can't call ServerInfo::update!");}
}