<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of backupHelper
 *
 * @author alvaro
 */
class backupHelper {
    /*     * ********** */
    /* Variables */
    /*     * ********** */

    var $etiqueta;                // First part of generated filename 
    var $dir_origen;            // Source directory (add a slash at the end) 
    var $dir_destino;            // Destination directory 
    var $fich_destino;        // Generated filename 
    var $bd_host;                    // DB host 
    var $bd_usr;                    // DB username 
    var $bd_clave;                // DB password 
    var $bd_nombre;                // Name of database name to be saved 
    var $error;                        // Last error happened 
    var $fecha;                    // Date
    var $hora;                    // Hour
    var $desfase = 2;        // Time lag

    /*     * ***************** */
    /* Setter public functions */
    /*     * ***************** */

    public function set_etiqueta($valor) {
        $this->etiqueta = $valor;
    }

    public function set_dir_origen($valor) {
        $this->dir_origen = $valor;
    }

    public function set_dir_destino($valor) {
        $this->dir_destino = $valor;
    }

    public function set_bd_host($valor) {
        $this->bd_host = $valor;
    }

    public function set_bd_usr($valor) {
        $this->bd_usr = $valor;
    }

    public function set_bd_clave($valor) {
        $this->bd_clave = $valor;
    }

    public function set_bd_nombre($valor) {
        $this->bd_nombre = $valor;
    }

    /*     * ***************** */
    /* Getter public functions */
    /*     * ***************** */

    public function get_error() {
        return $this->error;
    }

    /*     * **************************** */
    /* Function inicializar ()     */
    /* --------------------------- */
    /* Initializes some variables. */
    /*     * **************************** */

    public function inicializar() {
        $this->error = "";
        $this->fich_destino = $this->dir_destino . "/" . $this->etiqueta . "_" . $this->hora_bd() .
                "_" . $this->fecha_bd();
    }

    /*     * ***************************************************** */
    /* Function backup_files ()                             */
    /* ---------------------------------------------------- */
    /* Compresses specified directory, generates a file and */
    /* forces its download.                                 */
    /*     * ***************************************************** */

    public function backup_files() {
        $this->inicializar();
        $fich_destino = $this->fich_destino . ".zip";

        $zip = new zipHelper();
        $this->make_archive($this->dir_origen, $zip);
        if (!$zip->addFile($zip->getZippedfile(), $fich_destino)) {
            $this->error = "<p>Error writing file $fich_destino</p>";
            $res = false;
        } else {
            $zip->forceDownload($fich_destino);
            // Deletes the file (doesn't work without write permissions) 
            chmod($fich_destino, 0777);
            @unlink($fich_destino);
            $res = true;
        }
        return $res;
    }

    /*     * ******************************************************** */
    /* Function make_archive ()                                */
    /* ------------------------------------------------------- */
    /* Browse recursively a directory and compress every file. */
    /*     * ******************************************************** */

    public function make_archive($dir, &$zip, $extdir = "") {
        if (is_dir($dir)) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file != "." && $file != "..") {
                        $c = 0;
                        $dir_zip = substr($dir, $c);
                        if (is_dir($dir . $file)) {
                            $zip->addDirectory($dir_zip . $file);
                            $this->make_archive($dir . $file . "/", $zip, $extdir . $file . "/");
                        } else {
                            $fileContents = file_get_contents($dir . $file);
                            $zip->addFile($fileContents, $dir_zip . $file);
                        }
                    }
                }
                closedir($dh);
            }
        }
        return true;
    }

    /*     * ************************************************************ */
    /* Funciton backup_mysql ()                                    */
    /* ----------------------------------------------------------- */
    /* Dumps the specified DB into a file and forces its download. */
    /*     * ************************************************************ */

    public function backup_mysql() {
        $this->inicializar();
        $fich_destino = $this->fich_destino . ".dmp";
        $mysql = new dumpHelper($this->bd_host, $this->bd_usr, $this->bd_clave);
        $mysql->setDBHost($this->bd_host, $this->bd_usr, $this->bd_clave);
        if (!$mysql->save_sql($mysql->dumpDB($this->bd_nombre), $fich_destino)) {
            $this->error = "<p>Error writing file $fich_destino</p>";
            $res = false;
        } else {
            $mysql->download_sql($fich_destino);
            // Deletes the file (doesn't work without write permissions) 
            chmod($fich_destino, 0777);
            @unlink($fich_destino);
            $res = true;
        }
        return $res;
    }

    /*     * ***************** */
    /* Setter Time public functions */
    /*     * ***************** */

    // Sets date
    public function set_fecha($valor) {
        $this->fecha = $valor;
    }

    // Sets hour
    public function set_hora($valor) {
        $this->hora = $valor;
    }

    // Sets time lag
    public function set_desfase($valor) {
        $this->desfase = $valor;
    }

    /*     * ********************************************** */
    /* Functions get_dia (), get_mes (), get_anyo () */
    /* --------------------------------------------- */
    /* Returns date in parts.                        */
    /*     * ********************************************** */

    public function get_dia($ceros = true) {
        $res = substr($this->fecha, 6, 2);
        if ($ceros == true)
            $res = $this->ceros($res, 2, 0);
        return $res;
    }

    public function get_mes($ceros = true) {
        $res = substr($this->fecha, 4, 2);
        if ($ceros == true)
            $res = $this->ceros($res, 2, 0);
        return $res;
    }

    public function get_anyo($ceros = true) {
        $res = substr($this->fecha, 0, 4);
        if ($ceros == true)
            $res = $this->ceros($res, 4, 0);
        return $res;
    }

    /*     * ************************************* */
    /* Functions get_hora (), get_minuto () */
    /* ------------------------------------ */
    /* Returns hour in parts.               */
    /*     * ************************************* */

    public function get_hora($ceros = true) {
        $res = substr($this->hora, 0, 2);
        if ($ceros == true)
            $res = $this->ceros($res, 2, 0);
        return $res;
    }

    public function get_minuto($ceros = true) {
        $res = substr($this->hora, 2, 2);
        if ($ceros == true)
            $res = $this->ceros($res, 2, 0);
        return $res;
    }

    /*     * ********************** */
    /* Function fecha ()     */
    /* --------------------- */
    /* Returns current date  */
    /* in dd/mm/yyyy format. */
    /*     * ********************** */

    public function fecha() {
        $dia = $this->ceros(trim(gmdate("j", time() + (3600 * $this->desfase))), 2, 0);
        $mes = $this->ceros(trim(gmdate("n", time() + (3600 * $this->desfase))), 2, 0);
        $anyo = trim(gmdate("Y", time() + (3600 * $this->desfase)));
        $fecha = $dia . '/' . $mes . '/' . $anyo;
        return $fecha;
    }

    /*     * ********************* */
    /* Function hora ()     */
    /* -------------------- */
    /* Returns current hour */
    /* in hh:mm format.     */
    /*     * ********************* */

    public function hora() {
        return gmdate("H:i", time() + (3600 * $this->desfase));
    }

    /*     * ****************************************** */
    /* Function ceros ()                         */
    /* ----------------------------------------- */
    /* Adds $num zeros in the side of $cad       */
    /* specified by $izq_dr (0: left, 1: right). */
    /*     * ****************************************** */

    public function ceros($cad, $num, $izq_dr) {
        if ($izq_dr == 0)
            while (strlen($cad) < $num)
                $cad = "0" . $cad;
        else
            while (strlen($cad) < $num)
                $cad .= "0";
        return $cad;
    }

    /*     * *************************************** */
    /* Function fecha_bd ()                   */
    /* -------------------------------------- */
    /* Returns a date in yyyymmdd format.     */
    /* If you don't specify the $f parameter, */
    /* it takes $this->fecha instead.         */
    /*     * *************************************** */

    public function fecha_bd($f = "") {
        if ($f == "")
            $f = $this->fecha();
        $p1 = strpos($f, "/");
        $p2 = strpos($f, "/", $p1 + 1);
        $d = substr($f, 0, $p1);                 // Día
        $m = substr($f, $p1 + 1, $p2 - $p1 - 1); // Mes
        $a = substr($f, $p2 + 1);                // Año
        return $a . $m . $d;
    }

    /*     * ****************************************** */
    /* Function hora_bd ()                       */
    /* ----------------------------------------- */
    /* Returns an hour in hhmm format.           */
    /* If you don't specify the $hora parameter, */
    /* it takes $this->hora instead.             */
    /*     * ****************************************** */

    public function hora_bd($hora = "") {
        if ($hora == "")
            $hora = $this->hora();
        $p = strpos($hora, ":");
        $h = substr($hora, 0, $p);  // Hora
        $m = substr($hora, $p + 1); // Minuto
        return $h . $m;
    }

    /*     * ************************************** */
    /* Function fecha_ed ()                  */
    /* ------------------------------------- */
    /* Returns $f date in dd/mm/yyyy format. */
    /* $f must have aaaammdd format          */
    /*     * ************************************** */

    public function fecha_ed($f) {
        $d = substr($f, 6);    // Día
        $m = substr($f, 4, 2); // Mes
        $a = substr($f, 0, 4); // Año
        $m = intval($m);
        $m = $this->texto_mes($m);
        return $d . "/" . $m . "/" . $a;
    }

    /*     * ************************************ */
    /* Function hora_ed ()                 */
    /* ----------------------------------- */
    /* Returns $hora hour in hh:mm format. */
    /* $hora must have hhmm format.        */
    /*     * ************************************ */

    public function hora_ed($hora) {
        $hora = $this->ceros($hora, 4, 0);
        $h = substr($hora, 0, 2); // Hora
        $m = substr($hora, 2);    // Minuto
        if ($h == 24)
            $h = "0";
        return $h . ":" . $m;
    }

    /*     * ******************************** */
    /* Function texto_mes ()           */
    /* ------------------------------- */
    /* Returns the first three letters */
    /* of the month specified by $mes. */
    /*     * ******************************** */

    public function texto_mes($mes) {
        $arr_meses = split(",", "JAN,FEB,MAR,APR,MAY,JUN,JUL,AUG,SEP,OCT,NOV,DEC");
        return $arr_meses[$mes - 1];
    }

}

?>
