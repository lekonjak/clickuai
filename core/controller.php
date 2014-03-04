<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Controller
 *
 * @author Desktop
 */
class Controller extends System {

    public $_css_path;
    public $_img_path;
    public $_js_path;
    public $valid;
    public $lang;

    public function init() {
        //THIS ACTION WILL PERFORMERED IF THE CHILD CLASS DONT´VE A ACTION CALLED init();
        if(!isset($this->_lang)){
            $this->_lang = 'PtBr';
        }
    }

    protected function view($path, $data = null) {
        header('Content-Type: text/html; charset=utf-8');
        $vars = explode('/', $path);

        $data['template_path'] = 'app/view/theme/' . $this->getTheme();
        $data['css_path'] = $this->getCssUrl();
        $data['img_path'] = $this->getImgUrl();
        $data['js_path'] = $this->getJsUrl();
        $data['controller'] = $vars[0];
        $data['view'] = $vars[1];

        if (is_array($data) && count($data) > 0)
            extract($data, EXTR_PREFIX_SAME, 'p');

        return require_once 'app/view/theme/' . $this->getTheme() . '/index.php';
        exit();
    }

    protected function model($path) {
        $vars = explode('/', $path);
        $model = $vars[1] . 'Model';
        require_once 'app/model/' . $vars[0] . '/' . $vars[1] . 'Model.php';
        return new $model();
    }

    public function getTheme() {
        return 'default';
    }

    public function getLang() {
        
        // NOTE: this correction is necessary to many-to-many controllers
        if(!isset($this->_lang)){
            $this->_lang = 'PtBr';
        }
        
        $language = new $this->_lang;
        $this->lang = $language->getKeys();
    }

    public function getCssUrl() {
        return ROOT . "app/view/theme/" . $this->getTheme() . "/css/";
    }

    public function getImgUrl() {
        return ROOT . "app/view/theme/" . $this->getTheme() . "/img/";
    }

    public function getUrlParams() {
        $string = '';
        $array_keys = array_keys($this->_params);
        foreach ($array_keys as $key) {
            $string = '/' . $key . '/' . $this->_params[$key] . '/';
        }
        return $string;
    }

    public function getPermissions($gid) {

        $db = new Model();
        $permissions = $db->getGroupPermissions($gid);

        $permissions_arr = explode(';', $permissions);

        $result = array();
        foreach ($permissions_arr as $value) {
            $vars = explode('/', $value);
            if (isset($vars[0])) {
                $result['controllers'][] = $vars[0];
            }
            if (isset($vars[1])) {
                $result['actions'][] = $vars[1];
            } else {
                $result['actions'][] = NULL;
            }
        }

        return $result;
    }

    public function checkPermission($str) {
        $session = new sessionHelper();

        $result = FALSE;

        $allowed = array(
            'common',
            'login',
            'cpanel',
            'error'
        );

        $permission = explode('/', $str);
        $permission_controller = $permission[0];
        $permission_action = $permission[1];

        if ($session->checkSession('userAuth')) {
            $userData = unserialize($_SESSION['userData']);
            $permissions = $this->getPermissions($userData['group_id']);
        }
        //var_dump($permissions);
        $controllers = $permissions['controllers'];
        $actions = $permissions['actions'];

        if (in_array('*', $controllers, TRUE)) {
            return true;
        }

        if (in_array($permission_controller, $allowed, TRUE)) {
            return true;
        }

        foreach ($controllers as $key => $value) {
            if ($value == $permission_controller && $actions[$key] == $permission_action):
                return true;
            endif;
        }

        if ($permission_action == '*' || $permission_action = '') {
            foreach ($controllers as $key => $value) {
                if ($value == $permission_controller && $actions[$key] == '*' || $value == $permission_controller && $actions[$key] == '' && $value == $permission_controller && $actions[$key] == NULL):
                    $result = in_array($permission_controller, $controllers, TRUE);
                endif;
            }
        }

        unset($permission_action);
        unset($permission_controller);
        return $result;
    }

    public function checkGroupPermission($str, $gid) {
        $result = false;

        $permission = explode('/', $str);
        $permission_controller = $permission[0];
        $permission_action = $permission[1];

        $permissions = $this->getPermissions($gid);

        if (in_array('*', $permissions['controller'], TRUE)) {
            return true;
        }

        foreach ($permissions['controller'] as $key => $value) {
            if ($value == $permission_controller && $permissions['action'][$key] == '*'):
                return true;
            endif;
        }

        if ($permission_action == '*') {
            foreach ($permissions['controller'] as $key => $value) {
                if ($value == $permission_controller && $permissions['action'][$key] == '*'):
                    $result = in_array($permission_controller, $permissions['controller'], TRUE);
                endif;
            }
        }else {
            if (isset($permissions['controller'])) {
                $result = in_array($permission_controller, $permissions['controller'], TRUE);
            }
            if (isset($permissions['action'])) {
                $result = in_array($permission_action, $permissions['action'], TRUE);
            }
        }

        return $result;
    }

    public function getJsUrl() {
        return ROOT . "app/view/theme/" . $this->getTheme() . "/js/";
    }

    public function setCssUrl() {
        $this->_img_path = ROOT . "app/view/theme/" . $this->getTheme() . "/css/";
    }

    public function setImgUrl() {
        $this->_img_path = ROOT . "app/view/theme/" . $this->getTheme() . "/img/";
    }

    public function setJsUrl() {
        $this->_img_path = ROOT . "app/view/theme/" . $this->getTheme() . "/js/";
    }

    public function objectToArray($object) {
        $arr = array();
        for ($i = 0; $i < count($object); $i++) {
            $arr[] = get_object_vars($object[$i]);
        }
        return $arr;
    }

    public function phptopdf_url($source_url, $save_directory, $save_filename) {
        $API_KEY = 'b500wm3gsdkwwrjxd';
        $url = 'http://phptopdf.com/urltopdf.php?key=' . $API_KEY . '&url=' . urlencode($source_url);
        $resultsXml = file_get_contents(($url));
        file_put_contents($save_directory . $save_filename, $resultsXml);
    }

    public function phptopdf_html($html, $save_directory, $save_filename) {
        $API_KEY = 'b500wm3gsdkwwrjxd';
        $postdata = http_build_query(
                array(
                    'html' => $html,
                    'key' => $API_KEY
                )
        );

        $opts = array('http' =>
            array(
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );

        $context = stream_context_create($opts);


        $resultsXml = file_get_contents('http://phptopdf.com/htmltopdf.php', false, $context);
        file_put_contents($save_directory . $save_filename, $resultsXml);
    }

    public function getPdf($url, $name) {

        $this->phptopdf_url($url, 'data/pdf/', $name);

        return ROOT . 'data/pdf/' . $name;
    }

    public function PassGen($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false) {
        /**
         * Função para gerar senhas aleatórias
         *
         * @author    Álvaro Paçó
         *
         * @param integer $tamanho Tamanho da senha a ser gerada
         * @param boolean $maiusculas Se terá letras maiúsculas
         * @param boolean $numeros Se terá números
         * @param boolean $simbolos Se terá símbolos
         *
         * @return string A senha gerada
         * // Gera uma senha com 10 carecteres: letras (min e mai), números
            $senha = geraSenha(10);
            // gfUgF3e5m7

            // Gera uma senha com 9 carecteres: letras (min e mai)
            $senha = geraSenha(9, true, false);
            // BJnCYupsN

            // Gera uma senha com 6 carecteres: letras minúsculas e números
            $senha = geraSenha(6, false, true);
            // sowz0g

            // Gera uma senha com 15 carecteres de números, letras e símbolos
            $senha = geraSenha(15, true, true, true);
            // fnwX@dGO7P0!iWM
         */
        $lmin = 'abcdefghijklmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $simb = '!@#$%*-';
        $retorno = '';
        $caracteres = '';

        $caracteres .= $lmin;
        if ($maiusculas)
            $caracteres .= $lmai;
        if ($numeros)
            $caracteres .= $num;
        if ($simbolos)
            $caracteres .= $simb;

        $len = strlen($caracteres);
        for ($n = 1; $n <= $tamanho; $n++) {
            $rand = mt_rand(1, $len);
            $retorno .= $caracteres[$rand - 1];
        }
        return $retorno;
    }

}

?>
