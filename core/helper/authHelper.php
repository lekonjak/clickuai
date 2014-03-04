<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of authHelper
 *
 * @author alvaro
 */
class authHelper extends MysqliDatabase {
    protected $db, $sessionHelper, $redirHelper, $tableName, $userController, $userColumn, $passColumn, 
              $user, $pass, $loginController = 'index', $loginAction = 'index', $logoutController = 'index', $logoutAcion = 'index'; 
    
      public  function __construct() {
          $this->db = new MysqliDatabase('',true);
          $this->sessionHelper = new sessionHelper();
          $this->redirHelper   = new redirHelper();
          return $this;
      }
      
      public function getSessionHelper() {
          return $this->sessionHelper;
      }

      public function setSessionHelper($sessionHelper) {
          $this->sessionHelper = $sessionHelper;
      }

      public function getRedirHelper() {
          return $this->redirHelper;
      }

      public function setRedirHelper($redirHelper) {
          $this->redirHelper = $redirHelper;
      }

      public function getTableName() {
          return $this->tableName;
      }

      public function setTableName($tableName) {
          $this->tableName = $tableName;
      }

      public function getUserController() {
          return $this->userController;
      }

      public function setUserController($userController) {
          $this->userController = $userController;
      }
      
      public function getUserColumn() {
          return $this->userColumn;
      }

      public function getPassColumn() {
          return $this->passColumn;
      }
      
      public function setUserColumn($userColumn) {
          $this->userColumn = $userColumn;
      }

      public function setPassColumn($passColumn) {
          $this->passColumn = $passColumn;
      }

      public function getUser() {
          return $this->user;
      }

      public function setUser($user) {
          $this->user = $user;
      }

      public function getPass() {
          return $this->pass;
      }

      public function setPass($pass) {
          $this->pass = $pass;
      }

      public function getLoginController() {
          return $this->loginController;
      }

      public function setLoginController($loginController) {
          $this->loginController = $loginController;
      }

      public function getLogoutController() {
          return $this->logoutController;
      }
      
      public function setLogoutControllerAction( $controller,$action ){
          $this->logoutController = $controller;
          $this->logoutAcion     = $action;
          return $this;
      }
      
      public function setLoginControllerAction( $controller,$action ){
          $this->loginController = $controller;
          $this->loginAction     = $action;
          return $this;
      }

      public function setLogoutController($logoutController) {
          $this->logoutController = $logoutController;
      }

      public function getLogoutAcion() {
          return $this->logoutAcion;
      }

      public function setLogoutAcion($logoutAcion) {
          $this->logoutAcion = $logoutAcion;
      }
      
      public function login(){
          $obj = new Model();
          $obj->db = new MysqliDatabase('',true);
          $obj->_table = $this->tableName;
          $inst = "SELECT * FROM `users` us LEFT JOIN `users_more` u_mo ON(us.id = u_mo.uid) LEFT JOIN `users_address` u_ad ON(u_mo.address_id = u_ad.id) LEFT JOIN `users_group` u_gr ON(u_mo.group_id = u_gr.id) WHERE us.login = '".$this->user."' AND us.pass = '".$this->pass."' LIMIT 1";
          $sql  = $this->db->query($inst);
          if( count($sql) > 0 ){
              $result = $sql->fetch_array();
              $this->sessionHelper->creatSession ('userId', $result['id']);
              $this->sessionHelper->creatSession ('userAuth', true);
              $this->sessionHelper->creatSession('userData', serialize($result));
          }else{
            die("Usuário naum existe");
          }
          return true;
      }
      
      public function logout(){
          $this->sessionHelper->removeSession ('userAuth');
          $this->sessionHelper->removeSession('userData');
          $this->sessionHelper->removeSession('LAST_LOGIN');
          //$this->redirHelper->goToControllerAction( $this->logoutController, $this->logoutAction );
          if( $this->sessionHelper->removeSession ('userAuth') && $this->sessionHelper->removeSession('userData') ):
              return true;
          else:
              return false;
          endif;
      }
      
      public function checkLogin( $act ){
          
          switch( $act ){
              case 'redir':
                  if( !$this->sessionHelper->checkSession("userAuth") ):
                      if( $this->redirHelper->getCurrentController() != $this->loginController || $this->redirHelper->getCurrentAction() != $this->loginAction):
                          $this->redirHelper->goToControllerAction($this->loginController, $this->loginAction);
                      endif;
                  else:
                      return true;
                  endif;
                  break;
              case 'stop':
                  if( !$this->sessionHelper->checkSession("userAuth") ):
                      exit();
                  endif;
                  break;
              default:
                  if( !$this->sessionHelper->checkSession("userAuth") ):
                      return false;
                  else:
                      return true;
                  endif;
          }
      }
      
      public function userData($key){
          $data = $this->sessionHelper->selectSession("userData");
          return $data[$key];
      }

}

?>
