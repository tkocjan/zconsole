<?php
class Application_Plugin_ControllerPlugin extends Zend_Controller_Plugin_Abstract
{    
    public function routeShutdown(Zend_Controller_Request_Abstract $req) {
        Logger::info(__METHOD__.': entry');
        
        $this->checkAuth($req);
    }

    public function preDispatch(Zend_Controller_Request_Abstract $req) {
        Logger::info(__METHOD__.
            'Request: module='.$req->getModuleName().
            ' controller='.$req->getControllerName().
            ' action='.$req->getActionName()
        );

        //$this->setupHelpFilePre($req);
    }

    public function postDispatch(Zend_Controller_Request_Abstract $req) {
        Logger::info(__METHOD__.': entry');
        $this->setupUserEmail($req);
        $this->setupHelpFile($req);
        //$view->activeLink is unset
    }
    
    protected function checkAuth(Zend_Controller_Request_Abstract $req) {
        include PORTABLE_METHOD;
        
        Logger::info(__METHOD__.': entry');
        
        if (!DO_AUTH) {
            $ns = new Zend_Session_Namespace('Default');
            $ns->userId = 1;
            return;
        }
        
        //Logger::info(__METHOD__.': action='.$req->getActionName());
        
        $action = $req->getActionName();
        if ($action == 'login' || $action == 'sign-in' || $action == 'logout')
            return;
        
        $ns = new Zend_Session_Namespace('Default');
        //foreach ($ns as $index => $value)
        //    Logger::info(__METHOD__.': Default Session: '.$index.'='.$value);
        if (!isset($ns->userId))
            $this->_response->setRedirect($app_path.'/login');
    }
    
    public function setupUserEmail(Zend_Controller_Request_Abstract $req) {
        include PORTABLE_METHOD;
        
        Logger::info(__METHOD__.': entry');
        Logger::info(__METHOD__.': header: '.headers_sent($file, $line) );
        Logger::info(__METHOD__.': file: '.$file);
        Logger::info(__METHOD__.': line: '.$line);
        $ns = new Zend_Session_Namespace('Default');
        $view =  Zend_Layout::getMvcInstance()->getView();
        $view->userEmail = $ns->userEmail;
        Logger::info(__METHOD__.': exit');
    }
    
    public function setupHelpFile(Zend_Controller_Request_Abstract $req) {
        include PORTABLE_METHOD;
        
        Logger::info(__METHOD__.': entry');
        
        //find if -help.phtml file exists and put full path in 
        //  $view->helpPath for layout to access, 
        //  if doesn't exist then don't set
        $ctlrName = $req->getControllerName();
        if (strtolower($ctlrName) == 'error')
            return;
        
        $helpFile = $ctlrName.'/'.$req->getActionName().'-help.phtml';
        //error_log('helpFile='.print_r($helpFile, true));
        $view =  Zend_Layout::getMvcInstance()->getView();
        $helpFile = $view->getScriptPath($helpFile);
        //error_log('helpFile='.print_r($helpFile, true));
        
        if ($helpFile === false) {
            //error_log('helpFile=false');
            //$view->helpFile is unset
            return;
        }
        
        //$layout = Zend_Layout::getMvcInstance();
        $view->helpFile = $helpFile;  //$layout->helpPath doesn't work, 
                                      //  $this in layout.phtml is Zend_View
    }
    
    /*
    public function getHelpFilePre(Zend_Controller_Request_Abstract $req)
    {
        include PORTABLE_METHOD;
        
        $view = Zend_Layout::getMvcInstance()->getView();
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
        $scriptName = $ctlrName.'/'.$req->getActionName().'.phtml';        
        $scriptPath = $view->getScriptPath($scriptName);
        $logger->info(':scriptPath='.print_r($scriptPath, true));
    }
     * 
     */    
}
