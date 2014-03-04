<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of sessionHelper
 *
 * @author alvaro
 */
class sessionHelper {
    
    public function __construct() {
    }
    
    public function creatSession( $name,$value ){
        $_SESSION[$name] = $value;
        return $this;
    }
    
    public function getSession( $name ){ 
        return $_SESSION[$name];
    }
    
    public function removeSession( $name ){
        unset( $_SESSION[$name] );
        return $this;
    }
    
    public function checkSession( $name ){
        return isset( $_SESSION[$name] );
    }
    
    public function selectSession( $name ){
        return $_SESSION[$name];
    }
    
}

?>
