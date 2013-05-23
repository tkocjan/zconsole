<?php
class BackupsController extends Zend_Controller_Action
{
    public function init()
    {
        $this->view->activeLink = 'backups';
    }

    public function backupsAction()
    {
    }        
}
