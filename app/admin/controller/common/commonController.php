<?php
class common extends Controller{
// Common Admin Controller Class
	protected $db;

	public function init(){
        //$this->db = $this->model('common/common');
        
	}

	public function index(){
		echo "Hello World!";
	}
}

?>