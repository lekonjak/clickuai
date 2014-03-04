<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of redirHelper
 *
 * @author alvaro
 */
class redirHelper {
    
    protected $parameters = array();
    
    public function go( $url ){
        header("Location: ".$url);
    }
    
    public function setUrlParameter( $name , $value){
        $this->parameters[$name] = $value;
        return $this->parameters;
    }

    protected function getUrlParameters(){
        $params = '';
        foreach ( $this->parameters as $name => $value ){
            $params .= $name.'/'.$value.'/';
        }
        return $params;
    }
    
    public function getCurrentAction(){
        global $start;
        return $start->_action;
    }
    
    public function getCurrentController(){
        global $start;
        return $start->_controller;
    }
    
    public function goToController( $controller ){
        $this->go($controller.'/teste/'.$this->getUrlParameters());
    }
    
    public function goToAction( $action ){
        $this->go( $this->getCurrentController() . '/' . $action . '/' . $this->getUrlParameters());
    }
    
    public function goToControllerAction( $controller , $action ){
        $this->go( $controller . '/' . $action . '/' . $this->getUrlParameters());
    }
    
    public function goToIndex(){
        $this->go($this->goToController('index'));
    }
    
    public function goToUrl( $url ){
        $this->go( $url );
    }
    
}

?>
