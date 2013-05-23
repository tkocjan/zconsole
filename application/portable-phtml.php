<?php
    include PORTABLE_METHOD;
    //$app_path = $this->baseUrl();
    //define('DNS_ZONE', 'abidimi.com');
    //define('SERVICE_NAME', 'Abidimi');
    
    //extract($this->getVars());
    if (isset($this->viewData))
        $viewData = $this->viewData;
    else
        $viewData = new stdClass;    
