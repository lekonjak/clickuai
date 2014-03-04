<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of loader
 *
 * @author Álvaro Paçó
 */
class Loader {
    public $path;
    
    public function __construct() {
        $this->path = dirname(dirname(__FILE__));
        spl_autoload_register(array($this, 'autoload'));
    }

    private function autoload($className) {
        if (file_exists($this->path.'/core/helper/' . $className . '.php')) {
            try {
                require_once 'core/helper/' . $className . '.php';
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        } elseif (file_exists($this->path.'/core/languages/' . $className . '.php')) {
            try {
                require_once 'core/languages/' . $className . '.php';
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        } elseif (file_exists($this->path.'/app/controller/' . $className . '.php')) {
            echo 'entra';
            try {
                require_once '/app/controller/' . $className . '.php';
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
        }
    }

}

?>
