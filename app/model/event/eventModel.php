<?php
class eventModel extends Model{
	private $mod_prefix;
    private $mod_templates;
    public $db;

    public function __construct($ConnectionString = '', $ThrowExceptions = true) {
        $this->db = new MysqliDatabase($ConnectionString, $ThrowExceptions);
        $this->mod_prefix = '';
    }

    public function Event($kwargs){
    	if(isset($kwargs['id'])){
    		$id = $kwargs['id'];
    		$query = "select * from `events` where `idEvent` = '{$id}' order by startEvent asc, endEvent asc, titleEvent asc;";
    		try{
    			$result = $this->db->query($query);
    		}catch(ThrowExceptions $e){
    			echo $e->mssql_get_last_message();
    		}
    	}else{
    		$query = "select * from `events` order by startEvent asc, endEvent asc, titleEvent asc;";
    		try{
    			$result = $this->db->query($query);
    		}catch(ThrowExceptions $e){
    			echo $e->mssql_get_last_message();
    		}
    	}
    	return $result->fetch_object();
    }

    public function Comments($kwargs){
        if(isset($kwargs['id'])){
            $id = $kwargs['id'];
            $query = "select e_c.contentComment as contentComment, e_c.datetimeComment as datetimeComment, e_c.latitude as latitude, e_c.longitude as longitude, u.nameUser as nameUser, u.IPaddress IPaddress from `events_comments` e_c Left Join `users` u on(u.idUser = e_c.idUser) Left Join `users_profile` u_p on(u_p.idUser = e_c.idUser) where `idEvent` = '{$id}' order by datetimeComment desc;";
            
            try{
                $result = $this->db->query($query);
            }catch(ThrowExceptions $e){
                $result = FALSE;
                die($e->mssql_get_last_message());
            }
        }else{
            $result = FALSE;
        }
        return $result;
    }
    
    public function create($data){
        
        $title = ucfirst($data['titleEvent']);
        $desc  = ucfirst($data['descriptionEvent']);
        $address = ucwords($data['addressEvent']);
        
        $query = "insert into `events` set `idUser` = '{$data['idUser']}', `titleEvent` = '{$title}', `descriptionEvent` = '{$desc}', `startEvent` = '{$data['startEvent']}', `endEvent`  = '{$data['endEvent']}', `addressEvent` = '{$address}', `creatorEvent` = '{$data['creatorEvent']}'";
            
        try{
            $result = $this->db->query($query);
        }catch(ThrowExceptions $e){
            echo $e->mssql_get_last_message();
        }
        
        return $result;
    }
}
?>