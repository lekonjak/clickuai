<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of authHelper
 *
 * @author alvaro
 */
class paginationHelper {
    private $currentPage; 
    private $totalRegs; 
    private $maxRowsXPage; 
     
    /** 
     *    __construct() 
     *  Params: 
     *    $maxRowsXPage: number of records to show 
     *  $currentPage: Page to show 
     */ 
    public function __construct($maxRowsXPage,$currentPage = 0){ 
        $this->maxRowsXPage = $maxRowsXPage; 
        $this->currentPage = ($currentPage >= 0) ? $currentPage : 0; 
    } 
    /** 
     * Number of records of array 
     */ 
     public function setTotalRegs($countArray){ 
         $this->totalRegs = $countArray; 
    } 
    /** 
     * set Max number of records to show in a page 
     */ 
    public function setMaxRowsXPage($maxRows){ 
        $this->maxRowsXPage = $maxRows; 
    } 
    /** 
     * set current page 
     */ 
     public function setCurrentPage($n_page){ 
         $this->currentPage = $n_page; 
     } 
    /** 
     * Return the last reg to paginate 
     * 
     */ 
     public function getLastReg() 
     { 
         if ($this->getTotalPages() > ($this->currentPage + 1)){ 
            return ($this->getIniReg() + $this->maxRowsXPage); 
         } 
            return $this->getTotalRegs(); 
     } 
     /** 
      * return current page 
      */ 
     public function getCurrentPage(){ 
         return $this->currentPage; 
     } 
     /**  
      * Return number of first register to paginate 
      */ 
     public function getIniReg(){ 
         return ($this->currentPage < 0)? 0: ($this->currentPage * $this->maxRowsXPage); 
     } 
     /** 
      * Return total number of items of array 
      */ 
     public function getTotalRegs(){ 
         return $this->totalRegs; 
     } 
     /** 
      * Return total number of pages 
      */ 
      public function getTotalPages(){ 
          return ceil($this->getTotalRegs() / $this->maxRowsXPage); 
      }
      
      public function getNextPage($params = null){
          //Get the URL Prams like url=controller/action?param1=1&...
          $qstr   = explode("&",$_SERVER['QUERY_STRING']);
          $arr = array();
          //Remove Duplicate keys
          $arr = $this->removeDuplicateKeys($qstr);
          //Remove url key like url=controller/action
          unset($arr['url']);
          //Remove Page Param
          unset($arr['page']);
          //Creat a link full of params
          $str = $this->mergeParamsToLink($arr);
          if($this->getCurrentPage() < $this->getTotalPages()-1){
            $page = $this->getCurrentPage()+1;
            if(empty($str)){
                return ROOT.$params.'?page='.$page;
            }else{
                return ROOT.$params.'?'.$str.'&page='.$page;
            }
          }else{
              return $this->getTotalPages()-1;
          }
      }
      public function getPrevPage($params){
          //Get the URL Prams like url=controller/action?param1=1&...
          $qstr   = explode("&",$_SERVER['QUERY_STRING']);
          $arr = array();
          //Remove Duplicate keys
          $arr = $this->removeDuplicateKeys($qstr);
          //Remove url key like url=controller/action
          unset($arr['url']);
          //Remove Page Param
          unset($arr['page']);
          //Creat a link full of params
          $str = $this->mergeParamsToLink($arr);
          if($this->getCurrentPage() < $this->getTotalPages()+1){
            $page = $this->getCurrentPage()-1;
            if(empty($str)){
                return ROOT.$params.'?page='.$page;
            }else{
                return ROOT.$params.'?'.$str.'&page='.$page;
            }
          }else{
              return $this->getTotalPages()-1;
          }
      }
      
      public function removeDuplicateKeys($arr){
          $params = array();
          foreach($arr as $value){
              $param = explode("=",$value);
              if(isset($param[0]) && isset($param[1])){
                  $params[$param[0]] = $param[1];
              }
              unset($param);
          }
          
          $u_arr = array_unique($params);
          return $u_arr;
      }
      
      public function mergeParamsToLink($arr){
          $params = array();
          
          $keys = array_keys($arr);
          
          foreach( $keys as $key ){
              $params[] = $key.'='.$arr[$key];
          }
          $link = implode("&",$params);
          return $link;
      }
}

?>
