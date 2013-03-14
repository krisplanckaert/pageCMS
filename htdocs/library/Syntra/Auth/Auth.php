<?php

class Syntra_Auth_Auth extends Zend_Controller_Plugin_Abstract
{
    public function preDispatch(\Zend_Controller_Request_Abstract $request) 
    {
        $loginController = 'User';
        $loginAction     = 'Login';   
        $locale          = Zend_Registry::get('Zend_Locale');
        $auth            = Zend_Auth::getInstance();
        
        //if user is not logged in and is not requesting the login page
        // - redirect to login page
        
        if(!$auth->hasIdentity() 
                && $request->getControllerName() != $loginController
                && $request->getActionName() != $loginAction) {
            $redirector = Zend_Controller_Action_HelperBroker::getStaticHelper('redirector');
            $redirector->gotoUrl('/nl_BE/login');
        }
        
        if($auth->hasIdentity()) {
            die('Hello user *wave*');
        }
    }
}

?>
