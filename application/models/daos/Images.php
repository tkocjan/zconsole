<?php
class Images
{
    protected static $instance = null;
    
    public static function getInstance() {
        if (is_null(self::$instance))
                self::$instance = new self;
        
        return self::$instance;
    }
    
    protected function __construct() {
        global $app_path;
        $GLOBALS['logger']->debug( 'Images: construct: app_path='.$app_path );

        $this->infoIcon = $app_path . '/images/fff-icons/information.png';
        $this->helpIcon = $app_path . '/images/fff-icons/help.png';
        $this->noteIcon = $app_path . '/images/fff-icons/note.png';
        $this->serverIcon = $app_path . '/images/fff-icons/server.png';
        $this->pencilIcon = $app_path . '/images/fff-icons/pencil.png';
        $this->waitingIcon = $app_path . '/images/preloader-icon.gif';
        $this->statusIcon = Array(
            'Stopped' => $app_path . '/images/icons/status_red.gif',
            'Running' => $app_path . '/images/icons/status_green.gif',
            'New' => $app_path . '/images/icons/status_grey.gif',
            'Processing' => $app_path . '/images/preloader-icon.gif',
            'Deleted' => $app_path . '/images/icons/status_grey.gif',
            'Failed' => $app_path . '/images/icons/status_red.gif',
            'Unknown' => $app_path . '/images/icons/status_grey.gif',
        );
        $this->osIconPath = $app_path . '/images/icons';
        $this->flagIconPath = $app_path . '/images/fff-icons/flags';
        $this->flagLogoPath = $app_path . '/images/logo-cloud';
        $this->hosterIconPath = $app_path . '/images/logo-target';
        $this->serverImagePath = $app_path . '/images';
        $this->appImagePath = $app_path . '/images/logo-app';
        $this->authPath = $app_path . '/images/auth_icons';
        $this->imagePath = $app_path . '/images';
    }
/*   
    var $this->noteIcon = 'images/fff-icons/note.png';
    var $this->serverIcon = 'images/fff-icons/server.png';
    var statusIcon = Array(
        'Stopped' => 'images/icons/status_red.gif',
        'Running' => 'images/icons/status_green.gif');
    var osIconPath = 'images/icons';
    var flagIconPath = 'images/fff-icons/flags';
    var hosterIconPath = 'images/logo-target';
    var serverImagePath = '/images';
*/
}

?>