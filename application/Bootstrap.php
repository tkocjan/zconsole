<?php
//include APPLICATION_PATH.'/models/Images.php';

define('FORCE_SSL', false);
define('DO_AUTH', true);
define('LOG_PATH', ini_get('error_log'));

define('PORTABLE_METHOD', APPLICATION_PATH.'/portable-method.php');
define('PORTABLE_PHTML', APPLICATION_PATH.'/portable-phtml.php');

define("MONTH_HOURS", 720);
define('DATEZERO', '0000-00-00 00:00:00');
define('SERVICE_NAME', 'Abidimi');
define('SERVICE_URL', 'http://www.abidimi.com');
define('DNS_ZONE', '.abidimi.com');

define('DB_INTERFACE', 'DbPdoMySql');
define('DB_HOSTNAME', 'localhost');
define('DB_PORT', '3306');
define('DB_DATABASE', 'console');
define('DB_USERNAME', 'app');
if ($_SERVER['HTTP_HOST'] == 'www.local') {
    define('DB_PASSWORD', 'password');
}
else {
    define('DB_PASSWORD', 'timpfx');
}

$logger = null;
$app_path = null;
$app_images = null;
$appCfg = null;
$appService = null;
$domainService = null;

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    /**
     * @var Zend_Log
     */
    protected $_logger;

    protected $_front;
    
    protected function _initForceSSL() {
        if (!FORCE_SSL)
            return;
        
        if ( strstr($_SERVER['REQUEST_URI'], '/ajax/') )
            return;
        if (!isset($_SERVER['HTTPS'])) {
            header('Location: https://' . $_SERVER['HTTP_HOST'] .
                $_SERVER['REQUEST_URI']);
            error_log('Redirecting to https');
            exit();
        }
    }
    
    /**
     * Setup the logging
     */
    protected function _initLogging()
    {
        global $logger;
        
        $this->getFront();  //init front: $this->bootstrap('frontController');
        $logger = new Zend_Log();
/*
        $writer = 'production' == $this->getEnvironment() ?
			new Zend_Log_Writer_Stream(
                            realpath(APPLICATION_PATH . '/../data/logs/app.log')) :
			new Zend_Log_Writer_Firebug();
 * 
 */
	$writer = new Zend_Log_Writer_Stream(LOG_PATH);
        $logger->addWriter($writer);
        
        if ('production' == $this->getEnvironment())
            $filter = new Zend_Log_Filter_Priority(Zend_Log::CRIT);
        else
            $filter = new Zend_Log_Filter_Priority(Zend_Log::INFO);
                    
        $logger->addFilter($filter);

        $this->_logger = $logger;
        Zend_Registry::set('log', $logger);
        
        //$logger->info('REQUEST_URI='.$_SERVER['REQUEST_URI']);
    }
    
    protected function _initGlobals() {
        // set global $app_path, $domainService, $appapp_images, $appCfg
        include PORTABLE_METHOD;
        
        $front = $this->getFront();
        $request=new Zend_Controller_Request_Http();    // need for baseUrl
        $front->setRequest($request);
        $app_path = $front->getBaseUrl();
        $logger->debug(__METHOD__.': app_path='.$app_path);
        
        Zend_Loader_Autoloader::getInstance()->setFallbackAutoloader(true);
        
        $appService = new Application_Service_AppService();
        $domainService = new Application_Service_DomainService();

        $app_images = Images::getInstance();
        $logger->debug( 'Bootstrap: app_images='. print_r($app_images, true) );
        
        $appCfg = AppConfig::getInstance();
        $logger->debug( 'Bootstrap: appCfg='. print_r($appCfg, true) );
    }
    
    protected function getFront() {
        if (!isset($this->_front)) {
            $this->bootstrap('FrontController');
            $this->_front = $this->getResource('FrontController');
        }
        return $this->_front;
    }
    
}
