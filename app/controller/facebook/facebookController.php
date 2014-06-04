<?php
class facebook extends Controller{
	protected $db;
    
	public function init(){
        // CODE    
	}

	public function index(){
		$this->data = array();
        $this->smarty->display('common/index.tpl');
	}
    
    public function login(){
        $redir = new redirHelper();
        $_SESSION['msg'] = '<div class="alert alert-success">Bem-vindo ao Party-U ;)</div>';
        $redir->go(ROOT);
    }
    
    public function getUserData(){
        if(isset($_POST['facebook']) && !isset($_SESSION['userName'])){
            $facebook = $_POST['facebook'];
            if(isset($facebook)){
                $_SESSION['userName'] = $facebook['name'];
                $db_user = $this->model('user/user');
                if(!$User){
                    $db_user->create($facebook);
                    $User = $db_user->getUserByUsername($facebook['name']);
                    $_SESSION['userData'] = $db_user->getUserByUsername($facebook['name']);
                }else{
                    $User = $db_user->getUserByUsername($facebook['name']);
                    $_SESSION['userData'] = $User;
                }
            }
        }
    }
    
    public function logout(){
        
        // Destroy de session
        unset($_SESSION['userName']);
        unset($_SESSION['userData']);
        session_start();
        session_unset();
        session_destroy();
        session_write_close();
        setcookie(session_name(),'',0,'/');
        session_regenerate_id(true);
        
        // Redirect to Home page
        $redir = new redirHelper();
        $redir->go(ROOT);
    }
    
    public function getAppId(){
        return $this->appId;
    }
    
    public function getAppSecret(){
        return $this->appSecret;
    }
    
    public function getRedirectUri(){
        return $this->edirectUri;
    }
    
    public function setAppId($str){
        $this->appId = $str;
    }
    
    public function setAppSecret($str){
        $this->appSecret = $str;
    }
    
    public function setRedirectUri($str){
        $this->redirectUri = $str;
    }
}
?>
