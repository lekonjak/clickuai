<?php
class common extends Controller{
    private $data;
    
	public function init(){
	}

	public function index(){
        $this->data = array();
        if(isset($_SESSION['msg'])){
            $this->smarty->assign('msg', $_SESSION['msg']);
            unset($_SESSION['msg']);
        }
        
        $this->smarty->assign('form_action', ROOT.'search');
        $this->smarty->display('common/index.tpl');
	}
    
    /*public function login(){
        require_once 'core/libs/facebook/facebook.class.php';
        
        $id = $this->getAppId(); // facebook applicationh ID.
        $sec = $this->getAppSecret(); // facebook application secrate.
        $callback = $this->getRedirectUri(); // call back url ie http://www.example.com/abc.php/
        $permission = "0"; // 0 for all class custome permission or explain ur permission like offline_status, email,sms etc http://developers.facebook.com/docs/authentication/permissions.
        $facebook = new facebook_login($id,$sec,$callback,$permission);

        if(is_array($facebook->FBLogin())){
            print_r($facebook->FBLogin());
        }else{
            echo $facebook->FBLogin();
        }
        echo $facebook->InformationInfo();
    }
    
    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        session_write_close();
        setcookie(session_name(),'',0,'/');
        session_regenerate_id(true);
    }
    
    public function getAppId(){
        return $this->appId;
    }
    
    public function getAppSecret(){
        return $this->appSecret;
    }
    
    public function getRedirectUri(){
        return $this->redirectUri;
    }
    
    public function setAppId($str){
        $this->appId = $str;
    }
    
    public function setAppSecret($str){
        $this->appSecret = $str;
    }
    
    public function setRedirectUri($str){
        $this->redirectUri = $str;
    }*/
}
?>
