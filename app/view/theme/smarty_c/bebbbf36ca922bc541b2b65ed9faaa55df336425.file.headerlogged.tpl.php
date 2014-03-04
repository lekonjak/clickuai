<?php /* Smarty version Smarty-3.1.14, created on 2013-11-21 00:31:12
         compiled from "/var/www/pratyu/app/view/theme/smarty/common/headerlogged.tpl" */ ?>
<?php /*%%SmartyHeaderCode:688693852528d70701fc714-25035993%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bebbbf36ca922bc541b2b65ed9faaa55df336425' => 
    array (
      0 => '/var/www/pratyu/app/view/theme/smarty/common/headerlogged.tpl',
      1 => 1385001053,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '688693852528d70701fc714-25035993',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'home' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_528d707020a6f8_95864352',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528d707020a6f8_95864352')) {function content_528d707020a6f8_95864352($_smarty_tpl) {?>
  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
"><h1>PartyU</h1></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
		<a class="navbar-brand navbar-right" href="#"><h2>Sair</h2></a> <!--colocar referência para ir ao perfil-->
              	<a class="navbar-brand navbar-right" href="#"><h2>Perfil</h2></a> <!--colocar referência para ir ao perfil-->
          </ul>
        </div>
      </div>
    </div>

  </body>
</html>
<?php }} ?>