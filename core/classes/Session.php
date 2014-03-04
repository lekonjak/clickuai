<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Session
 *
 * @author Álvaro Paçó
 */
class Session {

    public function __construct() {
        //Set variables Session
        $this->snet        = $_SESSION['net'];
        $this->spass       = $_SESSION['pass'];
        $this->slogin      = $_SESSION['login'];
        $this->scode       = $_SESSION['code'];
        $this->sacctype    = $_SESSION['acctype'];
        $this->sname       = $_SESSION['name'];
        $this->slevel      = $_SESSION['level'];
        $this->suid        = $_SESSION['uid'];
        $this->sgid        = $_SESSION['gid'];
        $this->spermission = $_SESSION['permission'];
        $this->live        = $_SESSION['live'];
    }

    public function DestroySession(){
        $_SESSION['net'] = "off";
        unset($_SESSION['login']);
        unset($_SESSION['code']);
        unset($_SESSION['acctype']);
        unset($_SESSION['level']);
        unset($_SESSION['uid']);
        unset($_SESSION['gid']);
        unset($_SESSION['pass']);
        unset($_SESSION['net']);
        unset($_SESSION['live']);
        unset($this->snet);
        unset($this->spass);
        unset($this->slogin);
        unset($this->scode);
        unset($this->sacctype);
        unset($this->sname);
        unset($this->slevel);
        unset($this->suid);
        unset($this->sgid);
        unset($this->spermission);
        unset($this->live);
        
        if(session_destroy()){
            return 1;
        }
    }
    
    public function isExpirate(){
        if(isset($_SESSION['live'])){
            if($_SESSION['live']<=date('F j, Y H:i')){ header("Location: logout.php");}
        }
    }
}
?>
