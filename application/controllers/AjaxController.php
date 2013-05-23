<?php

class AjaxController extends Zend_Controller_Action
{
    protected $_logger;
    
    public function init()
    {
        include PORTABLE_METHOD;

        $this->_logger = $logger;
        
        //entire controller
        $this->_helper->viewRenderer->setNoRender(true);
        //Zend_Layout::getMvcInstance()->disableLayout();
        $this->_helper->layout->disableLayout();
    }

    public function preDispatch()
    {
        include PORTABLE_METHOD;

        //assume json, need to set explicitly when retuning xml
        header('Content-Type: application/json');
    }

    public function getServersGridAction()
    {        
        include PORTABLE_METHOD;
        include 'ajax/getServersGrid.php';
    }

    public function checkNameAction() {
        include PORTABLE_METHOD;
        include('ajax/checkName.php');
    }

    public function updateNamesAction() {
        include PORTABLE_METHOD;
        include('ajax/updateNames.php');
    }

    public function startStopServerAction() {
        include PORTABLE_METHOD;
        include('ajax/startStopServer.php');
    }

    public function deleteServersAction() {
        include PORTABLE_METHOD;
        include('ajax/deleteServers.php');
    }

    public function cloneServerAction() {
        include PORTABLE_METHOD;
        include('ajax/cloneServer.php');
    }

    public function createServerAction() {
        include PORTABLE_METHOD;
        include('ajax/createServer.php');
    }
}
