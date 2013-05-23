<?php
class LoginController extends Zend_Controller_Action {
    public function init() {
        $this->_helper->layout->setLayout('login-layout');
    }

    public function loginAction() {
        $ns = new Zend_Session_Namespace('Default');
        unset($ns->userId);
        unset($ns->userEmail);
        $email = $this->getRequest()->getCookie('userEmail');
        Logger::info(__METHOD__.': email='.$email);
        if (empty($email))
            $email = '';
        $viewData = new stdClass();
        $viewData->email = $email;
        $this->view->viewData = $viewData;
        
        //$user = new User();
        //$user->get(1);
    }

    public function signInAction() {
        include PORTABLE_METHOD;
        
        $userParams = $_REQUEST['user'];
        Logger::info(__METHOD__.': userParams='.print_r($userParams, true));

        setcookie('userEmail', $userParams['email'],  time()+60*60*24*365);
        
        //check user & password ok
        $userRecArray = $domainService->findManyBy('UserRec', 
                array('email' => $userParams['email']) );
        Logger::info(__METHOD__.': userRecArray='.print_r($userRecArray, true));
        
        if (count($userRecArray) == 0)
            $this->redirect('/login');

        $userRec = reset($userRecArray);

        $encryptPassword = sha1($userParams['password'].$userRec->salt);
        Logger::info(__METHOD__.': $encryptPassword='.$encryptPassword);
        
        if ($userRec->password != $encryptPassword)
            $this->redirect('/login');
        
        Logger::info(__METHOD__.': user and password match');
        $ns = new Zend_Session_Namespace('Default');
        $ns->userId = $userRec->id;
        $ns->userEmail = $userRec->email;
 
        //better down here, but easier at top for wrong login
        //setcookie('userEmail', $userRec->email,  time()+60*60*24*365);
        
        //$this->redirect('/', array('prependBase' => true));
        $this->redirect('');
    }
    
    public function logoutAction() {
        Logger::info(__METHOD__);
        $this->redirect('/login');
    }
}
