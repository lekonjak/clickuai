<?php include("../../conf.php"); ?>
<?php require_once("../../".MYSQLI_DRIVER); ?>
<?php
class Autentication extends MysqliDatabase {
    private $login;
    private $pass;
    private $userData;
    private $acctype;
    private $data;
    private $firstLogin;
    
    public function __construct($ConnectionString=null, $ThrowExceptions = true) {
        parent::__construct($ConnectionString, $ThrowExceptions);
    }
    protected function validateLogin ($login, $pass){
        
        if(!isset($login) || $login === '' ){
            throw new Exception('Por favor, preencha o campo login');
        }
        
        //Remove White Spaces
        $login = trim($login);
        $pass  = trim($pass);
        
        //Add Slashes ' " / \
        $login = (!get_magic_quotes_gpc()) ? addslashes($login) : $login;
        $pass  = (!get_magic_quotes_gpc()) ? addslashes($pass)  : $pass;

        $this->login = $login;
        $this->pass  = $pass;
    }
    
    protected function checkLogin()
    {
        $query   = "select * from users where login = '".$this->login."' and pass = '".md5($this->pass)."';";
        $exec    = $this->query($query) or die(mysql_error());
        
        if($exec->num_rows < 1)
        {
            $query = "SELECT * FROM users where login = '". $this->login . "';";
            $exec = $this->query($query) or die (mysql_error());
            if ($exec->num_rows >= 1)
            {
                $res = $exec->fetch_assoc();
                if ($res['pass'] == md5($res['login']))
                {
                    $this->firstLogin = true;
                    $this->userData = $res;
                }
                else throw new Exception('Usuário e/ou senha incorretos');
            }
            else throw new Exception('Usuário e/ou senha incorretos');
        }
        else
        {
            $this->userData = $exec->fetch_assoc();
        }
        $exec->close();
    }

    protected function getAcctype(){
        
        $queryAcctype   = "select * from acctype where type_id = '".$this->userData['acctype']."';";
        $execAcctype    = $this->query($queryAcctype) or die(mysql_error());
        $resultAcctype  = $execAcctype->fetch_assoc();
        
        $this->acctype = array('acctype'    => $resultAcctype['type_id'],
                                'level'      => $resultAcctype['level'],
                            'permission' => $resultAcctype['permission']);
        
        $execAcctype->close();
    }
    
    protected function getUsersMore(){
        
        $query    = "select * from users_more where code = '".$this->login."' and acctype_id = '".$this->acctype['acctype']."';";
        $exec     = $this->query($query) or die(mysql_error());
        $this->data = $exec->fetch_assoc();
        $exec->close();
    }
    
    public function initialize ($login, $pass)
    {
        
        try
        {
            $this->validateLogin($login, $pass);
            $this->checkLogin();
        }
        catch (Exception $e)
        {
            throw $e;
        }
        
        $this->getAcctype();
        $this->getUsersMore();
    }
    
    public function firstTime(){
        if($this->firstLogin === true){
             session_start();
             $_SESSION['login']   = $this->login;
             $_SESSION['pass']    = $this->pass;
             $_SESSION['acctype'] = $acctype;
             $_SESSION['name']    = $fname." ".$lname;
            
             return 1;
        }
        return 0;
    }
    
    public function startSession(){
        $this->setLastLogin();
        session_start();
        $_SESSION['login']   = $this->login;
        if ($this->firstLogin != true)
        {
            $_SESSION['code']    = $this->data['code'];
            $_SESSION['acctype'] = $this->acctype['acctype'];
            $_SESSION['level']   = $this->acctype['level'];
            $_SESSION['permission'] = $this->acctype['permission'];
            $_SESSION['name']    = $this->data['firstname']." ".$this->userData['lastname'];
            $_SESSION['uid']     = $this->data['uid'];
            $_SESSION['fname']   = $this->data['firstname'];
            $_SESSION['lname']   = $this->data['lastname'];
            $_SESSION['gid']     = $this->data['group_id'];
            //Set the time section
            $_SESSION['live']    = date('F j, Y H:i', mktime(date('H'), date('i') + 59, date('s'), date('n'), date('j'), date('Y')));
            $_SESSION['net']     = 1;
        }
        else
        {
            $_SESSION['name'] = $this->userData['firstname'] . ' ' . $this->userData['lastname'];
        }
    }
    
    public function setLastLogin(){
        $query    = "update users set last_login = NOW(), last_ip = '".$_SERVER["REMOTE_ADDR"]."' where login = '".$this->login."';";
        $exec     = $this->query($query) or die(mysql_error());
        return 1;
    }
}
?>