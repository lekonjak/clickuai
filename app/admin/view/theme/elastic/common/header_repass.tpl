<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt" xml:lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title> Painel de Controles</title>
        <link rel="stylesheet" href="<?php echo $css_path; ?>jquery.jgrowl.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo $css_path; ?>styles.css" type="text/css" />
        <link type="text/css" href="<?php echo $css_path; ?>menu.css" rel="stylesheet" />
        <link type='text/css' href='<?php echo $css_path; ?>tabbedContent.css' rel='stylesheet'  />
        <link type="text/css" href="<?php echo $css_path; ?>cupertino/jquery-ui-1.9.0.custom.css" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo $css_path; ?>jqtransform.css" type="text/css" media="all" />
        <script type="text/javascript" src="<?php echo $js_path; ?>jquery.jcountdown1.3"></script>
        <script type="text/javascript" src="<?php echo $js_path; ?>jquery-1.8.2.js"></script>
        <script type="text/javascript" src="<?php echo $js_path; ?>jquery-ui-1.9.0.custom.js"></script>
        <script type="text/javascript" src="<?php echo $js_path; ?>jquery.validate.min.js"></script>
        <script type="text/javascript" src="<?php echo $js_path; ?>jquery.jgrowl.js"></script>
        <script type="text/javascript" src="<?php echo $js_path; ?>jquery.flot.js"></script>
        <script type="text/javascript" src="<?php echo $js_path; ?>jquery.jqtransform.js" ></script>
        <script type="text/javascript" src="<?php echo $js_path; ?>tabbedContent.js" ></script>
        <script type="text/javascript">

// In case you don't have firebug...
if(typeof console === "undefined") {
console = { log: function() { } };
}

(function($){

$(document).ready(function(){
//On Document Ready

//Validate
    $("#form").validate({  
        // Define as regras  
        rules:{
            code:{  
                // campoNome será obrigatório (required) e terá tamanho mínimo (minLength)  
                required: true, minlength: 2, remote: 'nano/users/checkCode' 
            }, 
            fname:{  
                // campoNome será obrigatório (required) e terá tamanho mínimo (minLength)  
                required: true, minlength: 2  
            },  
            email:{  
                // campoEmail será obrigatório (required) e precisará ser um e-mail válido (email)  
                required: true, email: true, remote: 'nano/users/checkEmail'
            }  
        },  
        // Define as mensagens de erro para cada regra  
        messages:{  
            code:{  
                required: "Digite o Código para o usuário",  
                minLength: "O código deve conter, no mínimo, 2 caracteres e ser único."  
            },
            fname:{  
                required: "Digite o seu nome",  
                minLength: "O seu nome deve conter, no mínimo, 2 caracteres."  
            },  
            email:{  
                required: "Digite o seu e-mail para contato",  
                email: "Digite um e-mail válido."  
            }
        }  
    });
///////////////////////////////

<?php if($controller == 'cpanel' && $view == 'index'){ ?>
$.jGrowl("<?php echo $this->lang['VIEW_WELCOME']; ?>", { life: 3000 });
<?php } ?>
});

///Countdown
$("#time").countdown({date:"<?php echo date('F j, Y'); ?>"}); //Just date
$("#time").countdown({date:"<?php echo date('F j, Y H:i'); ?>"}); //Date and Time (in 24 hour format)

//More options
$("#time").countdown({
date: "<?php echo $live; ?>",
onChange: function( event, timer ){
},
onComplete: function( event ){

$(this).html("Seção Expirada");
$(location).attr('href',"logout");
},
minus: false, //defaults to false anyway
leadingZero: true
});
})(jQuery);
        </script>
        <script>
    function UpdateTableHeaders() {
                $(".persist-area").each(function() {

                    var el             = $(this),
                        offset         = el.offset(),
                        scrollTop      = $(window).scrollTop(),
                        floatingHeader = $(".floatingHeader", this)

                    if ((scrollTop > offset.top) && (scrollTop < offset.top + el.height())) {
                        floatingHeader.css({
                            "visibility": "visible"
                        });
                    } else {
                        floatingHeader.css({
                            "visibility": "hidden"
                        });      
                    };
                });
                }

                // DOM Ready      
                $(function() {

                var clonedHeaderRow;

                $(".persist-area").each(function() {
                    clonedHeaderRow = $(".persist-header", this);
                    clonedHeaderRow
                        .before(clonedHeaderRow.clone())
                        .css("width", clonedHeaderRow.width())
                        .addClass("floatingHeader");

                });

                $(window)
                    .scroll(UpdateTableHeaders)
                    .trigger("scroll");

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
        <?php if( isset($msg) ){ ?>
        <script>
            // In case you don't have firebug...
            if(typeof console === "undefined") {
                console = { log: function() { } };
            }

        (function($){

        $(document).ready(function(){
                    // Horizontal Sliding Tabs demo
                    $('div#st_horizontal').slideTabs({  			
                                        // Options  			
                                        contentAnim: 'slideH',
                                        contentAnimTime: 600,
                                        contentEasing: 'easeInOutExpo',
                                        tabsAnimTime: 300,
                                        autoHeight: true
                                });	    
                    $.jGrowl("<?php echo $msg; ?>", { sticky: true });
                });
        })(jQuery);
        
        </script>
        <?php } ?>
    </head>
    <body bottommargin="0" topmargin="0" rightmargin="0" leftmargin="0">
        
    <?php if( isset($msg) ){ ?>
    <div id="dialog-message" title="Aviso">
        <p>
            <?php echo $msg; ?>
        </p>
    </div>
    <?php } ?>
        <div style="width: 900px; height:73px; margin-left: auto; margin-right: auto; margin-top: 10px; text-align: left;">
            <div style="width: 200px; height:73px; float: left;">
                <a href="index"><img src='<?php echo $img_path."logo_cabecalho.png"; ?>' alt="Logo Nano" width="200"  /></a>
            </div>
        </div>
