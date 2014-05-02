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
    <link rel="stylesheet" type="text/css" href="app/view/theme/smarty/css/token-input.css" />
    <script src="app/view/theme/smarty/js/modernizr.custom.js"></script>
    <title>PartyU</title>
    <link href="app/view/theme/smarty/dist/css/bootstrap.css" rel="stylesheet">
    <link href="app/view/theme/smarty/css/starter-template.css" rel="stylesheet">
  </head>

  <body>
    <div class="body">
      <div class="index-search-box">
        <form role="form" name="search" id="search-form" action="" method="post">
          <div class="form-group">
            <input type="text" class="form-control" id="search-field" name="qsearch" placeholder="Pesquisar">
          </div>
        </form>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="app/view/theme/smarty/assets/js/jquery.js"></script>
    <script src="app/view/theme/smarty/dist/js/bootstrap.min.js"></script>
    <script src="app/view/theme/smarty/js/typeahead.bundle.js"></script>
    <script src="app/view/theme/smarty/js/jquery.tokeninput.js"></script>
    {literal}
    <script type="text/javascript">
    $(document).ready(function () {
        $("#search-field").tokenInput("async/qcomplete");
    });
    </script>
    {/literal}
  </body>
</html>
