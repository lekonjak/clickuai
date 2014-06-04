<?php
class common extends Controller{
// Common Admin Controller Class
	protected $db;

	public function init(){
        //$this->db = $this->model('common/common');
        
	}

	public function index(){
		echo "Hello World!";
		# create Tito
		/*$user = Users::create(array(
			'username' => 'Tito',
		 	'password' => sha1("alabesco"),
		 	'group_id' => '1',
		 	'state' => '1')
		);*/
		
		$user = new User();
		$user->username = 'Tito';
		$user->password = sha1("alabesco");
		$user->group_id = '1';
		$user->state 	= '1';
		try{
			$user->save();
		}catch(Exception $e){
			//echo 'Message: ' .$e->getMessage();
		}

		# read Tito
		$user = User::find_by_username('Tito');
		echo $user->password;
		# update Tito
		# $user->name = 'Tito Jr';
		# $user->save();
	 
		# delete Tito
		#$user->delete();
		$this->smarty->display('common/main.tpl');
	}
}

?>