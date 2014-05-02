<?php /* Smarty version Smarty-3.1.14, created on 2014-04-30 23:37:56
         compiled from "/var/www/clickuai/app/view/theme/smarty/common/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155033257953160f1dee8a80-51308629%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc91b2821606e999a2863778c5494b74a1739038' => 
    array (
      0 => '/var/www/clickuai/app/view/theme/smarty/common/index.tpl',
      1 => 1398911868,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155033257953160f1dee8a80-51308629',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53160f1e222a63_47857478',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53160f1e222a63_47857478')) {function content_53160f1e222a63_47857478($_smarty_tpl) {?>﻿<!DOCTYPE html>
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
    <link rel="stylesheet" type="text/css" href="app/view/theme/smarty/css/token-input.css" />
    <script src="app/view/theme/smarty/js/modernizr.custom.js"></script>
    <title>PartyU</title>
    <link href="app/view/theme/smarty/dist/css/bootstrap.css" rel="stylesheet">
    <link href="app/view/theme/smarty/css/starter-template.css" rel="stylesheet">
  </head>

  <body>
    <div class="body">
      <form role="form" name="search" id="search-form" action="" method="post">
        <div class="form-group">
          <label>Pesquisar</label>
          <input type="text" class="form-control" id="search-field" name="qsearch" placeholder="Pesquisar">
        </div>
      </form>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="app/view/theme/smarty/assets/js/jquery.js"></script>
    <script src="app/view/theme/smarty/dist/js/bootstrap.min.js"></script>
    <script src="app/view/theme/smarty/js/typeahead.bundle.js"></script>
    <script src="app/view/theme/smarty/js/jquery.tokeninput.js"></script>
    
    <script type="text/javascript">
    $(document).ready(function () {
        $("#search-field").tokenInput("async/qcomplete");
    });
    </script>
    
  </body>
</html>
<?php }} ?>