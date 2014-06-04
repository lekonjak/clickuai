<div id="main-content">
    <form name="form" class="jqtransform" action="<?php echo $form_action; ?>" method="post">
        <div class="rowElem">
            <table>
                <thead>
                    <tr>
                        <td colspan="2">
                            Preencha o campo com seu e-mail de cadastro. O sistema irá enviar uma nova senha para seu e-mail.
                        </td>
                    </tr>
                </thead>
                <tr>
                    <td width="60"><?php echo $email_field; ?>:</td><td align="left"><input type="text" name="email" value="" /></td>
                </tr>
            </table>
        </div>
        <div class="rowElem">
            <input type="submit" value="Enviar" /> <input type="button" value="Voltar" onclick="history.back();"
        </div>
    </form>
</div>