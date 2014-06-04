<?php
class commonModel extends Model{
	private $mod_prefix;
    private $mod_templates;
    public $db;

    public function __construct($ConnectionString = '', $ThrowExceptions = true) {
        $this->db = new MysqliDatabase($ConnectionString, $ThrowExceptions);
        $this->mod_prefix = '';
    }

    public function Events($kwargs){
    	if(isset($kwargs['id'])){
    		$id = $kwargs['id'];
    		$query = "select * from `events` where `id` = '{$id}' order by startEvent asc, endEvent asc, titleEvent asc;";
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
    	return $result;
    }
}
?>