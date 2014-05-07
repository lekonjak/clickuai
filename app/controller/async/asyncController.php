<?php
class async extends Controller{
	protected $db;
	public function init(){
        //init function
    }

    public function qcomplete(){
        if(isset($_GET['q'])){
            $q = $_GET['q'];
            $json = array();
            try {
                $results = QSearchs::find('all', array('conditions' => "query_search LIKE '%$q%' order by `counter` desc"));
                foreach ($results as $key => $value) {
                    $json[] = array('id' => $value->id, 'name' => $value->query_search);
                }
            } catch (Exception $e) {
                $json = array('id' => '', 'name' => ''); 
                throw new Exception("Error Processing Request", 1);
            }
            echo json_encode($json);
        }
    }
}
?>
