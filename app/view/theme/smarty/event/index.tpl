<!DOCTYPE html>
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
    {include file="common/header.tpl"}
    <div style="margin-top: 40px;">
	
    </div>

    <div class="container">
      <div class="main">
        {if $event ne NULL}
        <h1>{$event->titleEvent}</h1> <time class="cbp_tmtime" datetime="{$event->startEvent}"><span>Começa em {$event->startEvent|date_format}</span> <span>{$event->startEvent|date_format:"%H:%M"}</span></time>
        <ul class="cbp_tmtimeline">
          <li>
            <div class="cbp_tmicon cbp_tmicon-phone"></div>
            <div class="cbp_tmlabel">
              <h2><a style="color:#FFF" href="">{$logedUserName}</a></h2>
              <p>
              <textarea name="comment" id="comment" class="form-control" rows="1" placeholder='Deixe seu comentáro para que mais pessoas possam saber sobre o evento!!!'></textarea>
              <button type="submit" id="postComment" onmousedown="postCommentOnTimeLine({$eventId})" class="btn btn-default">
              <span class="glyphicon glyphicon-comment"></span>
              </button>
              
              </p>
            </div>
          </li>
          <li class="head"></li>
          {if $comments != NULL}
          {$i = 0}
          {while $comment = $comments->fetch_object()}
            {$i = $i + 1}
          <li>
            <time class="cbp_tmtime" datetime="{$comment->datetimeComment}"><span>{$comment->datetimeComment|date_format}</span> <span>{$comment->datetimeComment|date_format:"%H:%M"}</span></time>
            <div class="cbp_tmicon cbp_tmicon-phone"></div>
            <div class="cbp_tmlabel">
              <h2><a style="color:#FFF" href="">{utf8_encode($comment->nameUser)}</a></h2>
              <p>{$comment->contentComment}</p>
              {if $comment->latitude && $comment->longitude}
              <p><button type="submit" onclick="showMap({$i},{$comment->latitude},{$comment->longitude});" class="btn btn-default">
              <span class="glyphicon glyphicon-map-marker"></span></button>
              <div id="mapholder{$i}" style="height: 0px; width: 100%;"></div></p>
              {/if}
            </div>
          </li>
          {/while}
          {/if}
        </ul>
          {else}
            <h1>
                Não há registros de atividades para este evento. <a href="">Crie seu evento agora mesmo!</a>
            </h1>
          {/if}
      </div>
    </div>

    {literal}
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
          $.get('{/literal}{$get_posts_url}{literal}', function( data ){ 
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
            $.post('{/literal}{$post_location_url}{literal}',{lat: position.coords.latitude, lon: position.coords.longitude},function(data){
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
            $('#postComment').disabled = true;
            if(valueComment.value != ""){
              $.post('{/literal}{$posturl}{literal}',{comment: valueComment.value, id: eventId},function(data){ 
                      if(data=='postou'){
                          //getPosts();
                          $('#postComment').disabled = false;
                      }else{
                          alert(data);
                      }
              });
            };
        };
    </script>
    {/literal}
  </body>
</html>
