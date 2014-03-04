        <script type="text/javascript">
            $(function() {
                //find all form with class jqtransform and apply the plugin
                $("form.jqtransform").jqTransform();
            });
        </script>
        <div id="menu" style="width: 900px; margin-left: auto; margin-right: auto; text-align: center;">
            <a style=" font-size: smaller; color: #333333;">Software desenvolvido por Hmidia.com</a>
        </div>
        <script type="text/javascript">
        function updateNota(id ,uid, eid, tipo, valor, id_periodo, field)
        {
            $.post('<?php echo ROOT.'desempenho/updateNota'; ?>',{id: id, uid: uid, eid: eid, tipo: tipo, valor: valor, pid: id_periodo},function(data){ 
                if(data == '0')
                {   
                    $("input[id$='"+field+"']").attr("class", "notupdated");
                }else
                {
                    $("input[id$='"+field+"']").attr("class", "updated");
                }
                
            });
        };
        </script>
        <?php if( isset($msg) ){ ?>
        <script type="text/javascript">
        (function(){
            $( "#dialog-message" ).dialog({
                modal: true,
                buttons: {
                    Ok: function() {
                        $( this ).dialog( "close" );
                    }
                }
            });
        })();
        </script>
        <?php } ?>
    </body>
</html>