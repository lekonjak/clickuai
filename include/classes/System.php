<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SYSTEM
 *
 * @author center
 */
class System {
    
    public function explodeAction($str){
        stripcslashes($str);
        $data = explode('/',$str);
        return $data;
    }
    
    public function setPath($route, $act=null, $mod=null){
        $path = $route.".php?mod=".$mod."&act=".$act;
        $vars = array('path'   => $path,
                      'route'  => $route,
                      'module' => $mod,
                      'act'    => $act);
        return $vars;
    }
}

?>
