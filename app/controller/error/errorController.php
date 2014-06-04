<?php
class error extends Controller{
    protected $module, $db, $redir, $session;
    
    public function init() {
        $this->module = get_class();
        $this->redir = new redirHelper();
        $this->session = new sessionHelper();
        
    }
    
    public function not_found(){
        
        $this->data = array();
        $this->view('error/not_found',$this->data);
     
    }
    
    public function forbidden(){
        $this->data = array();
        $this->view('error/forbidden',$this->data);
    }
    
}
?>
