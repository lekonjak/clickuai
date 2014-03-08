<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of system
 *
 * @author alvaro
 */
class system {

    private $_url;
    private $_vars;
    private $_db;
    private $_admin_access;
    public $_action;
    public $_controller;
    public $_lang;
    public $_params;
    public $_appurlself;
    public $_urlself;
    public $_name;
    public $smarty;

    public function __construct() {
        $this->_db = new Model();
        $this->setUrl();
        $this->checkIfAdminAccessRequest();
        $this->setUrlSelf();
        $this->setVars();
        $this->setController();
        $this->setLang();
        $this->setSystemName();
        $this->setAction();
        $this->setParams();
        $this->setSmarty();
    }

    private function checkIfAdminAccessRequest(){
        // Checking if try access admin Area
        $this->_admin_access = strripos($this->_url, DIR_ADMIN);
        // Changing url selfs
        if($this->_admin_access === false){
            $this->_appurlself = 'app';
        }else{
            $this->_appurlself = 'app/admin';
        }
    }

    private function setLang() {
        $this->_lang = 'PtBr';
    }

    private function setUrl() {
        $_GET['url'] = (isset($_GET['url']) ? $_GET['url'] : 'common/index');
        $this->_url = $_GET['url'];
    }

    private function setUrlSelf() {
        $this->_urlself = $this->_appurlself."/controller/" . $this->_url;
    }

    private function setVars() {
        $this->_vars = explode('/', $this->_url);
    }

    private function setController() {
        if($this->_admin_access === false){
            $this->_controller = $this->_vars[0];
        }else{
            $this->_controller = $this->_vars[1];
        }
    }
    
    private function setSystemName(){
        $this->_name = $this->_db->getSystemName();
    }

    private function setAction() {
        if($this->_admin_access === false){
            $act = (!isset($this->_vars[1]) || $this->_vars[1] == null ? $this->_action = 'index' : $this->_action = $this->_vars[1]);
        }else{
                $act = (!isset($this->_vars[2]) || $this->_vars[2] == null ? $this->_action = 'index' : $this->_action = $this->_vars[2]);          
        }
        $this->_action = $act;
    }

    private function setParams() {
        unset($this->_vars[0], $this->_vars[1], $this->_vars[2]);
        if (end($this->_vars) == null)
            array_pop($this->_vars);
        $i = 0;
        if ($this->_vars) {
            foreach ($this->_vars as $val) {
                if ($i % 2 == 0) {
                    $keys[] = $val;
                } else {
                    $vals[] = $val;
                }
                ++$i;
            }
        } else {
            $keys = array();
            $vals = array();
        }

        if (isset($keys) && isset($vals) && count($keys) == count($vals) && !empty($keys) && !empty($vals))
            $this->_params = array_combine($keys, $vals);
        else
            $this->_params = array();
    }

    public function setSmarty(){
        //Setup for Smarty

        if(!is_object($this->smarty)){
            $this->smarty = new Smarty();    
            // Change User/Admin area
            if($this->_admin_access === false){
                $this->smarty->setTemplateDir(SMARTY_TEMPLATE);
                $this->smarty->setCompileDir(SMARTY_TEMPLATE_C);
                $this->smarty->setCacheDir(SMARTY_CACHE);
                $this->smarty->setConfigDir(SMARTY_CONFIG);
            }else{
                $this->smarty->setTemplateDir(SMARTY_TEMPLATE_ADMIN);
                $this->smarty->setCompileDir(SMARTY_TEMPLATE_ADMIN_C);
                $this->smarty->setCacheDir(SMARTY_CACHE_ADMIN);
                $this->smarty->setConfigDir(SMARTY_CONFIG_ADMIN);
            }
            $this->smarty->assign('home', ROOT);
        }
    }

    public function removeParameter($parameter) {
        $this->_params[$parameter] = null;
        unset($this->_params[$parameter]);
    }

    public function removeParams() {
        unset($this->_params);
    }

    public function run() {
        $redir = new redirHelper();
        $controller_path = $this->_appurlself. CONTROLLER . $this->_controller . "/" . $this->_controller . "Controller.php";
        if (!file_exists($controller_path)):
            //$redir->go(ROOT . 'error/not_found');
        else:
            require_once $controller_path;

            $app = new $this->_controller();

            $app->getLang();

            if (!method_exists($app, $this->_action))
                $redir->go(ROOT . 'error/not_found');

            $act = $this->_action;

            $app->init();

            $app->$act();
        endif;
    }

    public function getParam($name) {
        if ($name != NULL):
            if (array_key_exists($name, $this->_params)):
                return $this->_params[$name];
            else:
                return false;
            endif;
        else:
            return $this->_params;
        endif;
    }

    public function get_lang() {
        return $this->_lang;
    }

    public function get_url() {
        return $this->_url;
    }

    public function get_vars() {
        return $this->_vars;
    }

    public function get_action() {
        return $this->_action;
    }

    public function get_controller() {
        return $this->_controller;
    }

    public function get_params() {
        return $this->_params;
    }

}

?>
