<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Model
 *
 * @author Desktop
 */
class Model extends MysqliDatabase{
    public $conn;
    public $db;
    public $sys_prefix;

    public function __construct() {
        $this->db = new MysqliDatabase('',true);
        $this->sys_prefix = $this->getSysPrefix();
    }
    
    public function creat( $table , array $data ){
        
        $keys = "`".implode('`, `', array_keys($data))."`";
        $vals = "'".implode("', '", array_values($data))."'";
        
        return $this->query("INSERT INTO `{$table}` ({$keys}) VALUES ({$vals})");
    }
    
    public function read($sql){
        $store = $this->db->query($sql,MYSQLI_USE_RESULT);
        return $store;
    }
    
    public function update($table,array $data, $where){
        
        $sql = "UPDATE `{$table}` SET ";
        
        foreach($data as $key=>$val){
            $fields[] = "{$key} = '{$val}'";
        }
        $sql .= implode(', ', $fields);
        
        $sql .= " WHERE ".$where;
        
        return $this->query($sql);
    }
    
    public function delete($table,$where){
        $sql = "DELETE FROM `{$table}` WHERE {$where};";
        return $this->query($sql);
    }
    
    public function getGroupPermissions($gid){
        $query = $this->db->query("select `permissions` from `users_group` where id = '".$gid."'");
        $result = $query->fetch_assoc();
        return $result['permissions'];
    }
    
    public function getSysPrefix(){
        $query = $this->db->query("select `value` from `settings` where `type` = 'config' and `key` = 'config_system_prefix'");
        if($query){
            $execute = $query->fetch_assoc();
            return $execute['value'];
        }else{
            return '';
        }
    }
    
    public function getSystemName(){
        $query = $this->db->query("select `value` from `settings` where `type` = 'config' and `key` = 'config_system_name'");
        $execute = $query->fetch_assoc();
        return $execute['value'];
    }
}

?>
