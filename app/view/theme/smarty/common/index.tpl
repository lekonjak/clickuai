<!DOCTYPE html>
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
    {include file="common/header.tpl"}
    <div style="margin-top: 40px;"></div>
    <div class="container">
      <div class="main">
        <br />
        {if isset($msg)}
          {$msg}
        {/if}
        <h1>Próximos Eventos</h1>
        <ul class="cbp_tmtimeline">
          {if isset($session['userName'])}
          <li>
            <time class="cbp_tmtime" datetime="{$event->startEvent|date_format}"><span></span> <span></span></time>
            <div class="cbp_tmicon cbp_tmicon-phone"></div>
            <div class="cbp_tmlabel">
              <h2><a style="color:#FFF" href="event?eventId={$event->idEvent}">Anuncie o seu evento</a> <div>
                    <p><button type="submit" onclick="$('#form').toggle();" class="btn btn-default"><span class="glyphicon glyphicon-certificate"></span> Criar</button></p>
                  </div></h2>
              <div class="form-group col-md-12" style="display:none;" id="form">
                <form name="create_event" method="post" action="{$form_action}">
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
          {/if}
          {while $event = $events->fetch_object()}
          <li>
            <time class="cbp_tmtime" datetime="{$event->startEvent|date_format}"><span>{$event->startEvent|date_format}</span> <span>{$event->startEvent|date_format}</span></time>
            <div class="cbp_tmicon cbp_tmicon-phone"></div>
            <div class="cbp_tmlabel">
              <h2><a style="color:#FFF" href="event?eventId={$event->idEvent}">{$event->titleEvent}</a></h2>
              <p>{$event->descriptionEvent}</p>
            </div>
          </li>
          {/while}
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
