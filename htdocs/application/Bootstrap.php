<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initRegisterControllerPlugins() {
        $this->bootstrap('frontcontroller');
        $front = $this->getResource('frontcontroller');
        $front->registerPlugin(new Syntra_Controller_Plugin_Translate());
        $front->registerPlugin(new Syntra_Controller_Plugin_Navigation());
        //$front->registerPlugin(new Syntra_Auth_Acl());
        //$front->registerPlugin(new Syntra_Auth_Auth());
    }
    
    public function _initDbAdapter() {
        $this->bootstrap('db'); //komt uit application.ini wat begint met resource
        $db = $this->getResource('db');
        //Maak een soort van globale variabele
        Zend_Registry::set('db', $db);
    }

}

