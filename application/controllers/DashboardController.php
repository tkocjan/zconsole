<?php

class DashboardController extends Zend_Controller_Action
{
    public function init()
    {
        $this->view->activeLink = 'dashboard';
    }

    public function dashboardAction()
    {
        // action body
    }
}
