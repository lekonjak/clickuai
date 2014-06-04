<?php
class event extends Controller{
	protected  $db, $request;

	public function init(){
        //$_SESSION['userName'] = 'Antonio';
        if($_SESSION['userName']){
            $db_user = $this->model('user/user');
            if(isset($_SESSION['userName'])){
                $this->User = $db_user->getUserByUsername($_SESSION['userName']);
            }else{
                $this->User = $db_user->getUserByUsername("Anon");
            }
            $this->db = $this->model('event/event');
            if($_POST || $_GET){
                if($_POST){
                    $this->request = $_POST;
                }else{
                    $this->request = $_GET;
                }
            }else{
                $this->request = false;
            }
        }else{
            // Redirect to Home page
            $redir = new redirHelper();
            $_SESSION['msg'] = '<div class="alert alert-danger">Desculpe! Faça uma conta no Facebook e volte novamente.</div>';
            $redir->go(ROOT);
        }
	}

	public function index(){
		$this->data = array();
		if($this->request!=false){
			if(isset($this->request['eventId'])){
				$eventId = $this->request['eventId'];
			}else{
				$eventId = NULL;
			}
            $_SESSION['idEvent'] = $eventId;
		}
        
        if(isset($_SESSION['userName'])){
            $this->smarty->assign('username', $_SESSION['userName']);
        }

		$event =  $this->db->Event($eventId);
		$comments = $this->db->Comments(array('id' => $eventId));
        $this->smarty->assign('event', $event);
        $this->smarty->assign('eventId', $eventId);
	    $this->smarty->assign('home', ROOT."common/");
	    $this->smarty->assign('header', ROOT."view/theme/smarty/event/header.tpl");
        $this->smarty->assign('comments', $comments);
        if(isset($_SESSION['userName'])){
            $this->smarty->assign('logedUserName', $_SESSION['userName']);
        }
        $this->smarty->assign('posturl', ROOT."event/postCommentOnTimeLine");
        $this->smarty->assign('post_location_url', ROOT."event/registerPositionOnSession");
        $this->smarty->assign('get_posts_url', ROOT."event/getPosts");
        $this->smarty->display('event/index.tpl');
	}
    
    public function create(){
        if(isset($this->request) && !empty($this->request)){
            $data = array();
            $data = $this->request;
            
            if(isset($this->User->idUser)){
                $data['idUser'] = $this->User->idUser;
                $data['creatorEvent'] = $this->User->idUser;
                $try = $this->db->create($data);
                if($try){
                    $_SESSION['msg'] = '<div class="alert alert-success">Evento criado!</div>';
                }else{
                    $_SESSION['msg'] = '<div class="alert alert-danger">Desculpe! Houve um erro na criação do evento.</div>';
                }
            }
        }
        header("Location: ".ROOT."common/index");
    }
    
    public function postCommentOnTimeLine(){
        if(isset($_SESSION['userName'])){
            $db = $this->model('event/timeline');
            $user_db = $this->model('user/user');
            
            $user = $user_db->getUserByUsername($_SESSION['userName']);
            if($user->idUser && isset($_POST['id']) && isset($_POST['comment'])){
                if($db->postComment($user->idUser, $_POST['id'], $_POST['comment'])){
                    return 'postou';
                }else{
                    return "erro aqui";
                }
            }else{
                echo "Problemas na validação de dados{ idUser: ".$user->idUser." idEvent: ".$_POST['id']." comment: ".$_POST['comment'];
            }
        }else{
            echo "Sem seção ativa: ".$_SESSION['userName'];
        }
    }

    public function registerPositionOnSession(){
        if(isset($_POST)){
            $_SESSION['lat'] = $_POST['lat'];
            $_SESSION['lon'] = $_POST['lon'];
            return true;
        }
        else{
            return false;
        }
    }

    public function getPosts(){
        $db = $this->model('event/timeline');
        $stamp = time();
        $localtime = new DateTime();
        $diff = $localtime;
        date_add($diff, date_interval_create_from_date_string('2 seconds'));
        $localtime = $localtime->format('Y-m-d H:i:s');
        $diff = $diff->format('Y-m-d H:i:s');

        $data = $db->getPosts($localtime);
        $html = '';
        if ($data != NULL){
            $i = 11;
            while ($row = $data->fetch_object()) {
                $diff = $localtime;
                if($diff >= $localtime){
                    $date = date("F j, o", strtotime($row->datetimeComment));
                    $time = date("H:i", strtotime($row->datetimeComment));
                    $html = '<li>
                        <time class="cbp_tmtime" datetime="'.$date.'"><span>'.$date.'</span> <span>'.$time.'</span></time>
                        <div class="cbp_tmicon cbp_tmicon-phone"></div>
                        <div class="cbp_tmlabel">
                          <h2><a style="color:#FFF" href="'.$row->nameUser.'">'.$row->nameUser.'</a></h2>
                          <p>'.$row->contentComment.'</p>
                          <p><button type="submit" onclick="showMap(\'_postedNow_'.$i.'\','.$row->latitude.','.$row->longitude.');" class="btn btn-default">
                          <span class="glyphicon glyphicon-map-marker"></span></button>
                          <div id="mapholder_postedNow_'.$i.'" style="height: 0px; width: 100%;"></div></p>
                        </div>
                      </li>';
                    $i++;
                  }else{
                  }
            }
            unset($data);
            echo $html;
        }else{
            echo $html;
        }

    }
    
    public function removeTimeLineComment(){
        //if(isset($_POST['commentId')){}
    }
}
?>
