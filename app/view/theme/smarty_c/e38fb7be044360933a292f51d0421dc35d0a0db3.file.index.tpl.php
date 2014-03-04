<?php /* Smarty version Smarty-3.1.14, created on 2013-11-29 14:07:50
         compiled from "/var/www/pratyu/app/view/theme/smarty/event/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:98803411352730f9504b038-15462628%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e38fb7be044360933a292f51d0421dc35d0a0db3' => 
    array (
      0 => '/var/www/pratyu/app/view/theme/smarty/event/index.tpl',
      1 => 1385737872,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '98803411352730f9504b038-15462628',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_52730f95161837_81851997',
  'variables' => 
  array (
    'event' => 0,
    'logedUserName' => 0,
    'eventId' => 0,
    'comments' => 0,
    'i' => 0,
    'comment' => 0,
    'get_posts_url' => 0,
    'post_location_url' => 0,
    'posturl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52730f95161837_81851997')) {function content_52730f95161837_81851997($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/pratyu/core/libs/Smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="app/view/theme/smarty/assets/ico/favicon.png">
    <link rel="stylesheet" type="text/css" href="app/view/theme/smarty/css/default.css" />
    <link rel="stylesheet" type="text/css" href="app/view/theme/smarty/css/component.css" />
    <script src="app/view/theme/smarty/js/modernizr.custom.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <title>PartyU - Eventos</title>
    <link href="app/view/theme/smarty/dist/css/bootstrap.css" rel="stylesheet">
    <link href="app/view/theme/smarty/css/starter-template.css" rel="stylesheet">
  </head>

  <body>
    <?php echo $_smarty_tpl->getSubTemplate ("common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div style="margin-top: 40px;">
	
    </div>

    <div class="container">
      <div class="main">
        <?php if ($_smarty_tpl->tpl_vars['event']->value!=null){?>
        <h1><?php echo $_smarty_tpl->tpl_vars['event']->value->titleEvent;?>
</h1> <time class="cbp_tmtime" datetime="<?php echo $_smarty_tpl->tpl_vars['event']->value->startEvent;?>
"><span>Começa em <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value->startEvent);?>
</span> <span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value->startEvent,"%H:%M");?>
</span></time>
        <ul class="cbp_tmtimeline">
          <li>
            <div class="cbp_tmicon cbp_tmicon-phone"></div>
            <div class="cbp_tmlabel">
              <h2><a style="color:#FFF" href=""><?php echo $_smarty_tpl->tpl_vars['logedUserName']->value;?>
</a></h2>
              <p>
              <textarea name="comment" id="comment" class="form-control" rows="1" placeholder='Deixe seu comentáro para que mais pessoas possam saber sobre o evento!!!'></textarea>
              <button type="submit" onclick="postCommentOnTimeLine(<?php echo $_smarty_tpl->tpl_vars['eventId']->value;?>
)" class="btn btn-default">
              <span class="glyphicon glyphicon-comment"></span>
              </button>
              
              </p>
            </div>
          </li>
          <li class="head"></li>
          <?php if ($_smarty_tpl->tpl_vars['comments']->value!=null){?>
          <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?>
          <?php if (!isset($_smarty_tpl->tpl_vars['comment'])) $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable(null);while ($_smarty_tpl->tpl_vars['comment']->value = $_smarty_tpl->tpl_vars['comments']->value->fetch_object()){?>
            <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
          <li>
            <time class="cbp_tmtime" datetime="<?php echo $_smarty_tpl->tpl_vars['comment']->value->datetimeComment;?>
"><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['comment']->value->datetimeComment);?>
</span> <span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['comment']->value->datetimeComment,"%H:%M");?>
</span></time>
            <div class="cbp_tmicon cbp_tmicon-phone"></div>
            <div class="cbp_tmlabel">
              <h2><a style="color:#FFF" href=""><?php echo utf8_encode($_smarty_tpl->tpl_vars['comment']->value->nameUser);?>
</a></h2>
              <p><?php echo $_smarty_tpl->tpl_vars['comment']->value->contentComment;?>
</p>
              <?php if ($_smarty_tpl->tpl_vars['comment']->value->latitude&&$_smarty_tpl->tpl_vars['comment']->value->longitude){?>
              <p><button type="submit" onclick="showMap(<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['comment']->value->latitude;?>
,<?php echo $_smarty_tpl->tpl_vars['comment']->value->longitude;?>
);" class="btn btn-default">
              <span class="glyphicon glyphicon-map-marker"></span></button>
              <div id="mapholder<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" style="height: 0px; width: 100%;"></div></p>
              <?php }?>
            </div>
          </li>
          <?php }?>
          <?php }?>
        </ul>
          <?php }else{ ?>
            <h1>
                Não há registros de atividades para este evento. <a href="">Crie seu evento agora mesmo!</a>
            </h1>
          <?php }?>
      </div>
    </div>

    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/app/view/theme/smarty/assets/js/jquery.js"></script>
    <script src="/app/view/theme/smarty/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        
        setInterval(function () {
          navigator.geolocation.getCurrentPosition(showPosition);
          getPosts();
          // Do something every 2 seconds
        }, 2000);

        $( document ).ready(function() {
          navigator.geolocation.getCurrentPosition(showPosition);
        });

        function getPosts(){
          $.get('<?php echo $_smarty_tpl->tpl_vars['get_posts_url']->value;?>
', function( data ){ 
            if(data!=''){
              var html = data; 
              $('.head').prepend(html);
              delete html;
             // $('li:first').removeClass("head");
            }else{
            }
          });
        }

        function getLocation()
        {
          if (navigator.geolocation)
          {
            navigator.geolocation.getCurrentPosition(showPosition);
          }else{}
        }

        function showPosition(position){
            $.post('<?php echo $_smarty_tpl->tpl_vars['post_location_url']->value;?>
',{lat: position.coords.latitude, lon: position.coords.longitude},function(data){
                        console.log(position.coords.latitude, position.coords.longitude);
                    });
        };

        function showMap(index, lat, lon)
        {
            latlon=new google.maps.LatLng(lat, lon);
            mapholder=document.getElementById('mapholder'+index);
            if($('#mapholder'+index).height() >= 1){
              $('#mapholder'+index).height('0px');  
            }else{
              $('#mapholder'+index).height('300px');
            }
            var myOptions={
                center:latlon,
                zoom:14,
                mapTypeId:google.maps.MapTypeId.ROADMAP,
                mapTypeControl:false,
                navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
            };
            var map=new google.maps.Map(document.getElementById("mapholder"+index),myOptions);
            var marker=new google.maps.Marker({position:latlon,map:map,title:"Você está aqui"});
        }

        function postCommentOnTimeLine(eventId){
            var valueComment = document.getElementById('comment');
            if(valueComment.value != ""){
              $.post('<?php echo $_smarty_tpl->tpl_vars['posturl']->value;?>
',{comment: valueComment.value, id: eventId},function(data){ 
                      if(data=='postou'){
                          getPosts();
                      }else{
                          alert(data);
                      }
              });
            };
        };
    </script>
    
  </body>
</html>
<?php }} ?>