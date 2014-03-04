<?php /* Smarty version Smarty-3.1.14, created on 2014-03-04 14:36:30
         compiled from "/var/www/clickuai/app/view/theme/smarty/common/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3899493053160f1e229dd6-63002253%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95ddc52e34c5aa8e92707b0695d0274dd5b88cd2' => 
    array (
      0 => '/var/www/clickuai/app/view/theme/smarty/common/header.tpl',
      1 => 1393953818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3899493053160f1e229dd6-63002253',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'facebook_getUserData_url' => 0,
    'username' => 0,
    'home' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53160f1e278cb5_16976273',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53160f1e278cb5_16976273')) {function content_53160f1e278cb5_16976273($_smarty_tpl) {?>
    <div id="fb-root"></div>
          <script>
            window.fbAsyncInit = function()
            {
                FB.init
                ({
                    appId   : '690327257652727',
                    session : null,
                    status  : true, // check login status
                    cookie  : true, // enable cookies to allow the server to access the session
                    xfbml   : true // parse XFBML
                });
                FB.Event.subscribe('auth.authResponseChange', function(response) {
                    if (response.status === 'connected') {
                        console.log(response.status);
                        FB.api('/me', function(data) {
                            $.post('<?php echo $_smarty_tpl->tpl_vars['facebook_getUserData_url']->value;?>
',{facebook: data},function(callback){ 
                                console.log(callback);
                                if(callback=='postou'){
                                    //alert(callback);
                                }
                            });
                        });
                    } else if (response.status === 'not_authorized') {
                        facebookLogin();
                    }else{
                        facebookLogin();
                    }
                });
            };
          
            (function(){
                var e = document.createElement('script');
                e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
                e.async = true;
                document.getElementById('fb-root').appendChild(e);
            }());
            function facebookLogin(){
                FB.login(function(response) {
                    if (response.authResponse) {
                       console.log('Welcome!  Fetching your information.... ');
                       FB.api('/me', function(response) {
                            alert(response.name);
                            console.log('Good to see you, ' + response.name + '.');
                        });
                    } else {
                        console.log('User cancelled login or did not fully authorize.');
                    }
                }, {scope: 'email, publish_stream, read_stream, offline_access,user_birthday,user_location,read_friendlists,sms'});
            }
    </script>

    
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="/"><h1>PartyU</h1></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
              <?php if (isset($_smarty_tpl->tpl_vars['username']->value)){?>
                <a class="navbar-brand navbar-right" href="<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
/facebook/logout"><h2>Sair (<smal><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</smal>)</h2></a>
              <?php }else{ ?>
              	  
    <fb:login-button  size="large" show-faces="true" width="300" max-rows="2" perms="email, publish_stream, read_stream, offline_access,user_birthday,user_location,read_friendlists,sms" onlogin='window.location="facebook/login";'>Login com o FaceBook</fb:login-button>
              
              <?php }?>
          </ul>
        </div>
      </div>
    </div>
<?php }} ?>