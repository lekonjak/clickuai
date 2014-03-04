{literal}
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
                            $.post('{/literal}{$facebook_getUserData_url}{literal}',{facebook: data},function(callback){ 
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

    {/literal}
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="/"><h1>PartyU</h1></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
              {if isset($username)}
                <a class="navbar-brand navbar-right" href="{$home}/facebook/logout"><h2>Sair (<smal>{$username}</smal>)</h2></a>
              {else}
              	{literal}  
    <fb:login-button  size="large" show-faces="true" width="300" max-rows="2" perms="email, publish_stream, read_stream, offline_access,user_birthday,user_location,read_friendlists,sms" onlogin='window.location="facebook/login";'>Login com o FaceBook</fb:login-button>
              {/literal}
              {/if}
          </ul>
        </div>
      </div>
    </div>
