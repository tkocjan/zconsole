<?php
class AppConfig
{
    protected static $instance = null;
    //const CACHE_CONFIG_KEY = 'infConsoleConfig';
    
    public static function getInstance() {
        if (is_null(self::$instance))
                self::$instance = new self;
        return self::$instance;
    }
    
    protected function __construct() {
        include PORTABLE_METHOD;
        /*
        $cache = Cache::factory();

        //$cache->un_set(self::CACHE_CONFIG_KEY);

        if ( $ca = $cache->get(self::CACHE_CONFIG_KEY) ) {
            Logger::debug('Config: got cache: ca='.print_r($ca, true) );
            foreach ($ca as $key=>$value) {
                $this->$key = $value;
            }
            Logger::debug('Config: got cache: $this='.print_r($this, true) );
            return;
        }
        
        Logger::info('Config: setting cache');
         * 
         */
        $ca = array();
/*        
        $dao = new HosterType();
        $ca['hosterTypes'] = $this->hosterTypes =  $dao->getObjectArray();
        $dao = new AppType();
        $ca['appTypes'] = $this->appTypes =  $dao->getObjectArray();
        $dao = new ServerType();
        $ca['serverTypes'] = $this->serverTypes =  $dao->getObjectArray();
        $dao = new OsType();
        $ca['osTypes'] = $this->osTypes =  $dao->getObjectArray();
        $dao = new LocationType();
        $ca['locationTypes'] = $this->locationTypes =  $dao->getObjectArray();
*/        
        $ca['hosterTypes'] = $this->hosterTypes =  
            $domainService->findAll('HosterType');
        $ca['appTypes'] = $this->appTypes =
            $domainService->findAll('AppType');
        $ca['serverTypes'] = $this->serverTypes =  
            $domainService->findAll('ServerType');
        $ca['osTypes'] = $this->osTypes =
            $domainService->findAll('OsType');
        $ca['locationTypes'] = $this->locationTypes =
            $domainService->findAll('LocationType');
        
        $logger->debug('Config: $this='.print_r($this, true) );
                
        //$cache->set(self::CACHE_CONFIG_KEY, $ca, 120);
    }    
}
