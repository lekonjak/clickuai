<?php
class timelineModel extends Model{
	private $mod_prefix;
    private $mod_templates;
    public $db;

    public function __construct($ConnectionString = '', $ThrowExceptions = true) {
        $this->db = new MysqliDatabase($ConnectionString, $ThrowExceptions);
        $this->mod_prefix = '';
    }

    public function Comments($kwargs){
        if(isset($kwargs['id'])){
            $id = $kwargs['id'];
            $query = "select e_c.contentComment as contentComment, e_c.datetimeComment as datetimeComment, e_c.latitude as latitude, e_c.longitude as longitude, u.nameUser as nameUser, u.IPaddress IPaddress from `events_comments` e_c Left Join `users` u on(u.idUser = e_c.idUser) Left Join `users_profile` u_p on(u_p.idUser = e_c.idUser) where `idEvent` = '{$id}' group by e_c.idComment order by datetimeComment desc;";
            
            try{
                $result = $this->db->query($query);
            }catch(ThrowExceptions $e){
                echo $e->mssql_get_last_message();
            }
        }else{
            $result = NULL;
        }
        return $result;
    }
    
    public function postComment($idUser, $idEvent, $comment){
        $lat = $_SESSION['lat'];
        $lon = $_SESSION['lon'];
        $datetime = date('Y-m-d H:i:s');
        
        $query = "insert into `events_comments` set `contentComment` = '{$comment}', `datetimeComment` = '{$datetime}', `idEvent` = '{$idEvent}', `idUser` = '{$idUser}', `latitude` = '{$lat}', `longitude` = '{$lon}' ";
            
        try{
            $result = $this->db->query($query);
        }catch(ThrowExceptions $e){
            echo $e->mssql_get_last_message();
        }
        if($result){
            echo "postou";
            return TRUE;
        }else{
            echo "Não foi possivel postar.";
            return FALSE;
        }
        return FALSE;
    }

    public function getPosts($begin){
        if(isset($begin)){
            $query = "select e_c.contentComment as contentComment, e_c.datetimeComment as datetimeComment, e_c.latitude as latitude, e_c.longitude as longitude, u.nameUser as nameUser, u.IPaddress IPaddress from `events_comments` e_c Left Join `users` u on(u.idUser = e_c.idUser) Left Join `users_profile` u_p on(u_p.idUser = e_c.idUser) where e_c.datetimeComment > '{$begin}' order by idComment asc;";
            try{
            $result = $this->db->query($query);
            }catch(ThrowExceptions $e){
                echo $e->mssql_get_last_message();
            }
            return $result;   
        }
    }
}
?>