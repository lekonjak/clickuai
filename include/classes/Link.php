<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of link
 *
 * @author Ávaro Paçó
 */
class Link extends mysqli {
    private $host  = 'localhost';
    private $user  = 'root';
    private $pass  = '71528860';
    private $base  = 'nano';
    private $query;


    public function __construct() {
        // Conect to Data Base
        $mysqli = new mysqli($this->host, $this->user, $this->pass, $this->base);

        // Check for true connection
        if (mysqli_connect_errno()) {
            die('Não foi possível conectar-se ao banco de dados: ' . mysqli_connect_error());
            exit();
        }

    }
}
?>
