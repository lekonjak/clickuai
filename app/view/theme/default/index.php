<?php
if ( !isset($header) ){
    if(file_exists('common/header.tpl')){
    	include('common/header.tpl');
    }
}else{
    include($controller . '/'.$header);
}
if (include($controller . '/' . $view . '.tpl')){
}else{
    echo $this->lang['VIEW_NOT_EXIST'];
}
if (!isset($footer)){
	if(file_exists('common/footer.tpl')){
    	include('common/footer.tpl');
	}
}elseif( isset($footer) ){
    include($controller . '/'.$footer);
}
?>
