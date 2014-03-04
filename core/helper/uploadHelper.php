<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of uploadHelper
 *
 * @author alvaro
 */
class uploadHelper {
    protected $path = 'uploaded', $file, $filename, $filetmpname;
    
    public function setPath( $path ){
        $this->path = $path;
    }
    
    public function setFile( $file ){
        $this->file = $file;
        $this->setFileName();
        $this->setFileTmpName();
    }
    
    public function getFileName() {
        return $this->filename;
    }

    public function setFileName() {
        $this->filename = $this->file['name'];
    }

    public function getFileTmpname() {
        return $this->filetmpname;
    }

    public function setFileTmpname() {
        $this->filetmpname = $this->file['tmp_name'];
    }
    
    public function upload(){
        if(move_uploaded_file($this->filetmpname, $_SERVER["DOCUMENT_ROOT"] . $this->path . $this->filename))
                return true;
        else
            return false;
    }


}

?>
