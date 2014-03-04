<?php /* Smarty version Smarty-3.1.14, created on 2013-11-29 01:43:22
         compiled from "/var/www/pratyu/app/view/theme/smarty/common/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18092309935269e1c21ffb38-14079558%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae55779ab036e0d9648b525b8dc14153ad092166' => 
    array (
      0 => '/var/www/pratyu/app/view/theme/smarty/common/index.tpl',
      1 => 1385695552,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18092309935269e1c21ffb38-14079558',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5269e1c2251d51_72775303',
  'variables' => 
  array (
    'msg' => 0,
    'session' => 0,
    'event' => 0,
    'form_action' => 0,
    'events' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5269e1c2251d51_72775303')) {function content_5269e1c2251d51_72775303($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/var/www/pratyu/core/libs/Smarty/plugins/modifier.date_format.php';
?>﻿<!DOCTYPE html>
<html lang="en" class="no-js" xmlns:fb="http://www.facebook.com/2008/fbml">
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
    <title>PartyU</title>
    <link href="app/view/theme/smarty/dist/css/bootstrap.css" rel="stylesheet">
    <link href="app/view/theme/smarty/css/starter-template.css" rel="stylesheet">
  </head>

  <body>
    <?php echo $_smarty_tpl->getSubTemplate ("common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div style="margin-top: 40px;"></div>
    <div class="container">
      <div class="main">
        <br />
        <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)){?>
          <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

        <?php }?>
        <h1>Próximos Eventos</h1>
        <ul class="cbp_tmtimeline">
          <?php if (isset($_smarty_tpl->tpl_vars['session']->value['userName'])){?>
          <li>
            <time class="cbp_tmtime" datetime="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value->startEvent);?>
"><span></span> <span></span></time>
            <div class="cbp_tmicon cbp_tmicon-phone"></div>
            <div class="cbp_tmlabel">
              <h2><a style="color:#FFF" href="event?eventId=<?php echo $_smarty_tpl->tpl_vars['event']->value->idEvent;?>
">Anuncie o seu evento</a> <div>
                    <p><button type="submit" onclick="$('#form').toggle();" class="btn btn-default"><span class="glyphicon glyphicon-certificate"></span> Criar</button></p>
                  </div></h2>
              <div class="form-group col-md-12" style="display:none;" id="form">
                <form name="create_event" method="post" action="<?php echo $_smarty_tpl->tpl_vars['form_action']->value;?>
">
                    <p><input type="text" value="" placeholder="Um título para seu evento..." name="titleEvent" class="form-control"/></p>
                    <p><textarea name="descriptionEvent" class="form-control" placeholder="Descrição do evento..."></textarea></p>
                    <p><input type="text" name="addressEvent" value="" placeholder="Endereço do envento..." class="form-control" /></p>
                    <div>
                        <div class="col-md-6"><label>Início: </label><input type="datetime-local" name="startEvent" class="form-control" /></div>
                        <div class="col-md-6"><label>Término: </label><input type="datetime-local" name="endEvent" class="form-control" /></div>
                    </div>
                    <br />
                    <br />
                    <p><button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-ok-sign"></span> Criar</button></p>
                </form>
              </div>
            </div>
          </li>
          <?php }?>
          <?php if (!isset($_smarty_tpl->tpl_vars['event'])) $_smarty_tpl->tpl_vars['event'] = new Smarty_Variable(null);while ($_smarty_tpl->tpl_vars['event']->value = $_smarty_tpl->tpl_vars['events']->value->fetch_object()){?>
          <li>
            <time class="cbp_tmtime" datetime="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value->startEvent);?>
"><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value->startEvent);?>
</span> <span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value->startEvent);?>
</span></time>
            <div class="cbp_tmicon cbp_tmicon-phone"></div>
            <div class="cbp_tmlabel">
              <h2><a style="color:#FFF" href="event?eventId=<?php echo $_smarty_tpl->tpl_vars['event']->value->idEvent;?>
"><?php echo $_smarty_tpl->tpl_vars['event']->value->titleEvent;?>
</a></h2>
              <p><?php echo $_smarty_tpl->tpl_vars['event']->value->descriptionEvent;?>
</p>
            </div>
          </li>
          <?php }?>
        </ul>
      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="app/view/theme/smarty/assets/js/jquery.js"></script>
    <script src="app/view/theme/smarty/dist/js/bootstrap.min.js"></script>
  </body>
</html>
<?php }} ?>