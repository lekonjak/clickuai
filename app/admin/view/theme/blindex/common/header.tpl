<html xmlns="http://www.w3.org/1999/xhtml" lang="pt" xml:lang="pt-br">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard I Admin Panel</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
        $(function(){
            $('.column').equalHeight();
        });
    </script>
    <script>
	$(function() {
              $( "#accordion" ).accordion({
                      collapsible: true
              });
              $( "#selectable" ).selectable();
              $( ".Jui button:first" ).button({
                  icons: {
                      primary: "ui-icon-locked"
                  },
                  text: false
              });
              $( "#datepicker" ).datepicker({
                    numberOfMonths: 3,
                    showButtonPanel: true
              });
              $( "#datepicker2" ).datepicker({
                numberOfMonths: 3,
                showButtonPanel: true
              });
              $( "#radio" ).buttonset();
	});
        $(function() {
            $( "#tabs" ).tabs();
        });
	$(function() {
		$( "#check" ).button({
                        icons: {
                        primary: "ui-icon-gear",
                        secondary: "ui-icon-triangle-1-s"
                    },
                    text: false
                });
		$( "#format" ).buttonset();
	});
    </script>
</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.html">Sistema Nano</a></h1>
			<h2 class="section_title">Painel de Controles</h2><div class="btn_view_site"><a href="http://www.medialoot.com">View Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>John Doe (<a href="#">3 Messages</a>)</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.html">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
		</div>
	</section><!-- end of secondary bar -->
        <table style=" width: 900px; margin-left: auto; margin-right: auto;" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td bgcolor="#0099FF" align="left">
                    <div id="menu">
                        <ul class="menu">
                            <li><a href="<?php echo ROOT.'cpanel/index'; ?>" class="parent"><span>Início</span></a></li>
                            <li><a href="#" class="parent"><span>Conta</span></a>
                                <div><ul>
                                        <li><a href="<?php echo ROOT.'users/user_profile'; ?>" class="parent"><span>Dados</span></a></li>
                                        <li><a href="<?php echo ROOT.'users/user_pass_form'; ?>" class="parent"><span>Alterar Senha</span></a></li>
                                    </ul></div>
                            </li>
                            <li><a href="#" class="parent"><span>Módulos</span></a>
                                <div>
                                    <?php if($this->checkPermission('desempenho/index')){ ?>
                                    <ul>
                                        <li><a href="<?php echo ROOT.'desempenho/index'; ?>" class="parent"><span>Desempenho Curricular</span></a>
                                            <?php if($this->checkPermission('desempenho/estruturas')){ ?>
                                            <div><ul>
                                                    <?php if($this->checkPermission('desempenho/notasManager')){ ?><li><a href="<?php echo ROOT.'desempenho/notasManager'; ?>"><span>Gerenciar Notas</span></a></li><?php } ?>
                                                    <li><a href="<?php echo ROOT.'desempenho/estruturas'; ?>"><span>Gerenciar Estruturas</span></a></li>
                                                </ul>
                                            </div>
                                            <?php } ?>
                                        </li>
                                    </ul>
                                    <?php } ?>
                                    <?php if($this->checkPermission('financeiro/*')){ ?>
                                    <ul>
                                        <li><a href="<?php echo ROOT.'financeiro/index'; ?>" class="parent"><span>Financeiro</span></a></li>
                                    </ul>
                                    <?php } ?>
                                </div>
                            </li>
                            <?php if($this->checkPermission('cpanel/*')){ ?>
                            <li><a href="#"><span>Sistema</span></a>
                                <div><ul>
                                        <?php if($this->checkPermission('cpanel/settings')){ ?>
                                        <li><a href="<?php echo ROOT.'cpanel/settings'; ?>"><span>Configurações</span></a></li>
                                        <?php } ?>
                                        <?php if($this->checkPermission('users/*')){ ?>
                                        <li><a href="<?php echo ROOT.'users/index'; ?>"><span>Usuários</span></a></li>
                                            <?php if($this->checkPermission('users/groups')){ ?><li><a href="<?php echo ROOT.'users/groups'; ?>"><span>Grupos</span></a></li><?php } ?>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </li>
                            <?php } ?>
                            <li>
                                <a href="#"><span class="last">Help</span></a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
        </table>
        </div>
        <?php } ?>
