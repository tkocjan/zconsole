<?php
//add {action_name}-help.phtml in script dir and HelpPlugin will find it
class ServersController extends Zend_Controller_Action
{
    public function init()
    {
        $this->view->activeLink = 'servers';
    }

    public function serversAction()
    {                
        if ($this->getParam('items') === null)
            $selRows=array();
        else
            $selRows=$this->getParam('items');
        
        $viewData = new stdClass;
        $viewData->selRowsJS = json_encode($selRows);
        
        $this->view->viewData = $viewData;
        
        //below works for no module, don't know about w/module
        //$viewData->help = $this->view->render('servers/servers-help.phtml');

        //$this->render();    // must go first
        //$this->render('servers-help', 'help');        
    }
    
    public function manageAction() {
        include PORTABLE_METHOD;
        
        $logger->debug("allParams=" .  print_r($this->getAllParams(), true) );
        
        // manage must have serverId
        if ( !$this->hasParam('serverId') || $this->getParam('serverId') == -1 ) 
            throw new Zend_Controller_Action_Exception(
                    'manageAction requires serverId to be specified');

        $serverInfo = new ServerInfo($this->getParam('serverId'));
        $logger->debug("serverInfo = " .  print_r($serverInfo, true) );
        $viewData = $serverInfo;
        
        $this->setCosts($viewData);
        
        $this->view->viewData = $viewData;
    }

    public function createAction() {
        include PORTABLE_METHOD;

        $codeNames = array();
        foreach ($appCfg->serverTypes as $serverType) {
            $codeNames[] = $serverType->codeName;
        }
        
        $serverTypesJS = array();
        foreach ($appCfg->serverTypes as $serverType) {
            $serverTypeJS = new stdClass;
            $serverTypeJS->codeName = $serverType->codeName;
            $serverTypeJS->serverCost = $serverType->serverCost;
            $serverTypesJS[] = $serverTypeJS;
        }
        
        $viewData = new stdClass;
        $viewData->codeNamesJS = json_encode($codeNames);
        $viewData->serverTypesJS = json_encode($serverTypesJS);
        $logger->info('servers: create: codenamesJS='.$viewData->codeNamesJS);
        $logger->info('servers: create: serverTypesJS='.$viewData->serverTypesJS);
        
        $this->view->viewData = $viewData;        
    }

    public function loadServerDetailsAction() {
        global $app_path, $app_images, $logger;
        
        $logger->info(__METHOD__.':entry');
                
        $this->_helper->layout->disableLayout();
        
        $serverInfo = new ServerInfo($_REQUEST['serverId']);
        $viewData = $serverInfo;
        
        $this->setCosts($viewData);
        /*
        $diskCost = $serverInfo->hosterType->diskCost * $serverInfo->serverRec->diskSize;
        $serverCost = $serverInfo->serverType->serverCost;
        $monthTotal = $serverCost + $diskCost;
        $hourTotal = $monthTotal / MONTH_HOURS;
        $viewData->diskCost = $diskCost;      // format???
        $viewData->serverCost = $serverCost;
        $viewData->monthTotal = $monthTotal;
        $viewData->hourTotal = $hourTotal;
         * 
         */
        
        $logger->debug("viewData = " . print_r($viewData, true) );        
        
        $this->view->viewData = $viewData;
    }

    public function loadCloneDialogAction() {
        global $app_path, $app_images, $logger;
        
        $logger->info(__METHOD__.':entry');
        
        $this->_helper->layout->disableLayout();
        
        $serverInfo = new ServerInfo($_REQUEST['serverId']);
        $viewData = $serverInfo;
        $viewData->cloneName = $serverInfo->serverRec->serverName.' (1)';
        $publicDNS = $serverInfo->serverRec->publicDNS;
        $viewData->cloneDNS = $publicDNS.'-1';
        
        $this->view->viewData = $viewData;
    }

    public function setCosts($viewData) {
        include PORTABLE_METHOD;
        
        $diskCost = $viewData->hosterType->diskCost * $viewData->serverRec->diskSize;
        $serverCost = $viewData->serverType->serverCost;
        $monthTotal = $serverCost + $diskCost;
        $hourTotal = $monthTotal / MONTH_HOURS;
        $viewData->diskCost = sprintf('$%.2f', $diskCost);
        $viewData->serverCost = sprintf('$%.2f', $serverCost);
        $viewData->monthTotal = sprintf('$%.2f', $monthTotal);
        $viewData->hourTotal = sprintf('$%.2f', $hourTotal);
    }

    /*
    public function preDispatch()
    {
        include PORTABLE_METHOD;
        
        $req = $this->getRequest();
        
        $view = $this->view;
        $paths = $view->getAllPaths();
        $logger->info(':paths='.print_r($paths, true));
        
        $path = Zend_Layout::getMvcInstance()->getViewScriptPath();
        $logger->info(':path='.$path);
        
        $suffix = Zend_Layout::getMvcInstance()->getViewSuffix();
        $logger->info(':suffix='.$suffix);
        
        $ctlrName = $req->getControllerName();
        if (strtolower($ctlrName) == 'error')
            return;
        $logger->info(':ctlrName='.$ctlrName);
        
        $helpName = $ctlrName.'/'.$req->getActionName().'.phtml';
        $logger->info(':helpName='.$helpName);
        $scriptName = $req->getControllerName().'/'.$req->getActionName().'.phtml';        
        $scriptPath = $view->getScriptPath($scriptName);
        $logger->info(':scriptPath='.print_r($scriptPath, true));
    }
     * 
     */
}
