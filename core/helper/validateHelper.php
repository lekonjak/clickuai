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
class validateHelper {

    public function validPOSTFilter($_post = null) {
        if (isset($_post) && $_post != null && $_post != ''):
            return $_post;
        else:
            return false;
        endif;
    }

    public function validGETFilter($_get = null) {
        if (isset($_get) && $_get != null && $_get != ''):
            return $_get;
        else:
            return false;
        endif;
    }

    public function validInt($_int) {
        $value = trim($_int);
        if (is_int($value)):
            return $value;
        else:
            return false;
        endif;
    }
    
    public function validEstrutura($pid,$did,$fid,$gid){
        
        if(isset($pid) && isset($did) && isset($fid) && isset($gid)){
            return TRUE;
        }else{
            return FALSE;
        }
        
    }

    public function Email($email) {
        // Define uma função que poderá ser usada para validar e-mails usando regexp
        $conta = "^[a-zA-Z0-9\._-]+@";
        $domino = "[a-zA-Z0-9\._-]+.";
        $extensao = "([a-zA-Z]{2,4})$";

        $pattern = $conta . $domino . $extensao;

        if (ereg($pattern, $email))
            return true;
        else
            return false;
    }
    
    public function Password($pass,$repass = null){
        
        if(isset($repass)){
            if($repass == $pass){
                
            }else{
                return $this->lang['USER_PASS_REPASS_DONT_MATCH'];
            }
        }
        
        if(isset($pass) && strlen($pass) >= 6){
            return false;
        }else{
            return $this->lang['VERY_SHORT_PASS'];
        }
    }

}

?>
