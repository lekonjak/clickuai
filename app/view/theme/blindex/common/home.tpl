<!-- Cabe�alho -->
<div align="center" style="height:150px;top:0px;">
    <div align="center" style="margin-left:150px; margin-top: 10px; height:150px; width:384px;">
        <a href="index.php"><img src="<?php echo $img_path; ?>logo.png" border="0" alt="Nano" height="110" /></a>
    </div>
</div>
<!-- Corpo -->
<div id="loginbox">
    <form action="<?php echo $action; ?>" method="post" name="" id="">
        <div>
            <h1>Acesso ao Sistema</h1>
            <small>Utilize seu número de contrato para login.</small>
        </div>
        <div>
            <table>
                <tr>
                    <td><label><input name="login"  value="Login" onfocus="value=''" onblur='if(this.value!=""){ $("#forbiden").show(); }' type="text" size="35"/></label></td>
                </tr>
                <tr>
                    <td><label><input name="pass" value="senha" onfocus="value=''" type="password" size="35"/></label></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Entrar"/>
                        <div id="forbiden"><a onclick="setRepassUrl()"><span>Esqueceu a senha?</span></a></div>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>
<br />