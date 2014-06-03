<?php
class search extends Controller{
    // Class to make search process
    
    public function init(){
	}
    
    public function index(){
        $this->data = array();
        if(isset($_SESSION['msg'])){
            $this->smarty->assign('msg', $_SESSION['msg']);
            unset($_SESSION['msg']);
        }
        
        // Getting results
        if(isset($_POST['qsearch'])){
            $qsearch = $_POST['qsearch'];
            var_dump($qsearch);
            foreach ($qsearch as $key => $value) {
                $result = QSearchs::find_by_query_search($value);

                var_dump($result);
            }  
        }
        
        $this->smarty->assign('form_action', ROOT.'search');
        $this->smarty->display('search/index.tpl');
    }
}
?>