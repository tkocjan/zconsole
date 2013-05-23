<?php
class NewsController extends Zend_Controller_Action
{
    public function init()
    {
        $this->view->activeLink = 'news';
    }

    public function newsAction()
    {
    }        
}
