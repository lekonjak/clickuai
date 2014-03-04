<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users
 *Álvaro Paçó
 */
class Users extends MysqliDatabase {
    
    private $sys_prefix = "";

    public function __construct($ConnectionString, $ThrowExceptions = true) {
        parent::__construct($ConnectionString, $ThrowExceptions);
        $mysqli = new MysqliDatabase('',true);
    }

    public function getUserData($uid){
        $query = $this->query("select u.*, um.*, adr.*, city.name as city, zone.zone_name as state, country.countries_name as country from ".$sys_prefix."users as u left join ".$sys_prefix."users_more as um on(um.uid = u.id) left join ".$sys_prefix."address as adr on(adr.id = um.address_id) left join ".$sys_prefix."city as city on(city.city_id = adr.city_id) left join ".$sys_prefix."states as zone on(zone.zone_id = adr.state_id) left join ".$sys_prefix."countries as country on(country.countries_id = adr.country_id) where u.id = '".$uid."';");
        return $query->fetch_assoc();
    }

    public function getGroupData($uid){
        $query = $this->query("select um.uid, um.group_id, grp.*, ms.master_serie as master_serie, ms.title as master_title, ms.value as master_value, sl.title as slave_title, sl.value as slave_value, att.title as attribute_title, att.value as attribute_value from ".$sys_prefix."users_more as um left join `".$sys_prefix."group` as grp on(grp.id = um.group_id) left join ".$sys_prefix."master as ms on(ms.id = grp.master_id) left join ".$sys_prefix."slave as sl on(sl.id = grp.slave_id) left join ".$sys_prefix."attribute as att on(att.id = grp.attribute) where um.uid = '".$uid."';");
        return $query->fetch_assoc();
    }
    
    public function setProfilePhoto($photo,$uid){
        $query = $this->query("update ".$sys_prefix."users_more set photo = '".$photo."' where uid = '".$uid."'");
    }
}
?>
