<?php
class userModel extends Model{
	private $mod_prefix;
    private $mod_templates;
    public $db;

    public function __construct($ConnectionString = '', $ThrowExceptions = true) {
        $this->db = new MysqliDatabase($ConnectionString, $ThrowExceptions);
        $this->mod_prefix = '';
    }

    public function getUserByUsername($username){
        if(isset($username)){
            $username = utf8_decode($username);
            $query = "select * from `users` where `nameUser` = '{$username}';";
            
            try{
                $result = $this->db->query($query);
            }catch(ThrowExceptions $e){
                echo $e->mssql_get_last_message();
            }
            if($result){
                $result = $result->fetch_object();
            }
        }else{
            $result = NULL;
        }
        return $result;
    }
    
    public function create($data){
        $query = "insert into users set `nameUser` = '".utf8_decode($data['name'])."', passuser = '".md5($data['name'])."', mailUser = '".$data['email']."', created = NOW(), IPaddress = '".$_SERVER['REMOTE_ADDR']."';";
        
        try{
            $result = $this->db->query($query);
        }catch(ThrowExceptions $e){
            echo $e->mssql_get_last_message();
        }
        return $result;
    }
}
?>