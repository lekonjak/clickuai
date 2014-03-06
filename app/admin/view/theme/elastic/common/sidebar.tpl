<aside id="sidebar" class="column">
    <form class="quick_search">
        <input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
    </form>
    <hr/>
    <h3>Painel de Controles</h3>
    <h3>Sua Conta</h3>
    <ul class="toggle">
        <li class="icn_profile"><a href="<?php echo ROOT.'users/user_profile'; ?>" class="parent"><span>Dados</span></a></li>
        <li class="icn_security"><a href="<?php echo ROOT.'users/user_pass_form'; ?>" class="parent"><span>Alterar Senha</span></a></li>
    </ul>
    <h3>Módulos</h3>
    <ul class="toggle">
        <?php if($this->checkPermission('desempenho/index')){ ?>
        <li class="icn_edit_article"><a href="<?php echo ROOT.'desempenho/notasManager'; ?>"><span>Gerenciar Notas</span></a></li><?php } ?>
        <li class="icn_view_users"><a href="<?php echo ROOT.'desempenho/estruturas'; ?>"><span>Gerenciar Estruturas</span></a></li>
        <?php } ?>
        <?php if($this->checkPermission('financeiro/*')){ ?>
        <li class="icn_tags"><a href="<?php echo ROOT.'financeiro/index'; ?>" class="parent"><span>Financeiro</span></a></li>
        <?php } ?>
    </ul>
    <h3>Configurações</h3>
    <ul class="toggle">
        <?php if($this->checkPermission('cpanel/settings')){ ?>
        <li class="icn_settings"><a href="<?php echo ROOT.'cpanel/settings'; ?>"><span>Opções</span></a></li>
        <?php } ?>
        <?php if($this->checkPermission('users/*')){ ?>
        <li class="icn_add_user"><a href="<?php echo ROOT.'users/index'; ?>"><span>Usuários</span></a></li>
        <li class="icn_categories"><a href="<?php echo ROOT.'users/groups'; ?>"><span>Grupos</span></a></li>
        <?php } ?>
    </ul>
    <h3>Suporte</h3>
    <ul class="toggle">
        <li class="icn_photo"><a href="#">E-mail</a></li>
        <li class="icn_audio"><a href="#">Chat</a></li>
        <li class="icn_jump_back"><a href="#">Logout</a></li>
    </ul>

    <footer>
        <hr />
        <p><strong>Copyright &copy; 2011 ScalaSoft</strong></p>
        <p>Theme by <a href="http://www.scalasoft.com.br">ScalaSoft.com.br</a></p>
    </footer>
</aside><!-- end of sidebar -->