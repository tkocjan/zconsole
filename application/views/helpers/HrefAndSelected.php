<?php
/**
 * HrefAndSelected view helper
 *
 */
class Zend_View_Helper_HrefAndSelected extends Zend_View_Helper_Abstract
{   
    //public $view;   //this is set by abstract
    
    function hrefAndSelected($link) {
        include PORTABLE_METHOD;
        
        $s = "href='$app_path/$link'";

        if (isset($this->view->activeLink) && $this->view->activeLink == $link)
            $s .= ' class="selected"';

        return $s;
    }
}
