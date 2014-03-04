<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pt-br
 *
 * @author alvaro
 */
class PtBr {
    
    public function getKeys(){
        $keys = array();
        //System
        $keys['SYSTEM_NAME'] = 'Sistema Nano';
        $keys['SYSTEM_REPASS'] = 'Renovação de Senha de Usuário';
        $keys['LAST_LOGIN']  = "Último acesso";
        
        //General
        $keys['VIEW_NOT_EXIST'] = "A View chamada não existe ou não carregou!";
        $keys['VIEW_WELCOME']   = "Bem-vindo ao Nano. Sou o Console de avisos e vou te manter informado sobre a navegação.";
        $keys['ERROR_DB_INSERT'] = "Não foi possível gravas os dados.";
        
        //DATABASE ACTIONS
        $keys['ESTRUTURA_CREAT_SUCCESSFULLY']  = "Nova estrutura criada.";
        $keys['ESTRUTURA_CREAT_ERROR']         = "Error ao tentar criar nova estrutura.";
        $keys['ESTRUTURA_UPDATE_SUCCESSFULLY'] = "Estrutura alterada.";
        $keys['ESTRUTURA_UPDATE_ERROR']        = "Error ao tentar atualizar a estrutura.";
        $keys['ESTRUTURA_REMOVE_SUCCESSFULLY'] = "Estrutura removida.";
        $keys['ESTRUTURA_REMOVE_ERROR']        = "Error ao tentar remover a estrutura.";
        $keys['DISCIPLINA_CREAT_SUCCESS']      = "Nova Disciplina criada com sucesso.";
        $keys['DISCIPLINA_CREAT_ERROR']        = "Erro ao tentar criar nova Disciplina.";
        $keys['DISCIPLINA_UPDATE_SUCCESSFULLY']= "Disciplina atualizada com sucesso.";
        $keys['DISCIPLINA_UPDATE_ERROR']       = "Erro ao tentar atualizar a Disciplina.";
        $keys['DISCIPLINA_REMOVE_SUCCESSFULLY']= "Disciplina desabilitada com succeso.";
        $keys['DISCIPLINA_REMOVE_ERROR']       = "Erro ao tentar desabilitar a disciplina.";
        
        //USERS DATA
        $keys['USER_LOGIN_ERROR'] =  "Erro ao tentar acessar o sistema. Verifique seus dados de usuário e senha. Caso não consiga se logar, tente a ferramenta de recuperação de senha ou entre em contato com oadministrador do sistema.";
        $keys['USER_ADD_SUCCESS'] =  "Usuário criado.";
        $keys['USER_ADD_ERROR'] =  "Erro ao tentar criar usuário.";
        $keys['USER_UPDATE_SUCCESS'] =  "Usuário atualizado.";
        $keys['USER_ALREADY_EXIST']  = "O Usuário %s já existe.";
        $keys['USER_UPDATE_ERROR'] =  "Erro ao tentar atualizar os dados do Usuário.";
        $keys['USER_REMOVE_SUCCESS'] =  "Usuário removido.";
        $keys['USER_REMOVE_ERROR'] =  "Erro ao tentar remover os dados do Usuário.";
        $keys['USER_REPASS_SUCCESS'] =  "Sua Senha foi renovada com sucesso. Você deve receber um e-mail contendo a nova senha. Se você não recebeu esse e-mail, verifique sua caixa de spans ou entre em contato com o administrador do sistema.";
        $keys['USER_UPDATE_PASS_SUCCESS'] =  "Sua Senha foi atualizada com sucesso.";
        $keys['USER_UPDATE_PASS_ERROR'] =  "Sua Senha não pode ser atualizada. Tente novamente mais tarde.";
        $keys['USER_REPASS_ERROR'] =  "Erro. Verifique o e-mail digitado.";
        $keys['USER_STATUS_ENABLED']  = "Habilitado";
        $keys['USER_STATUS_DISABLED'] = "Desabilitado";
        $keys['USER_STATUS_SELECT']   = "Ambos";
        $keys['USER_PASS_REPASS_DONT_MATCH'] = "A Senha que você digitou não coincide com a Confirmação de Senha! Verifique se digitou corretamente e tente novamente.";
        
        //GROUP DATA
        $keys['GROUP_SUCCESS_CREATED'] = "Grupo criado com sucesso.";
        $keys['GROUP_ID_NOT_EXIST']    = "Chave do grupo não encontrada!";
        
        //FIELDS DATA
        $keys['USER_EMAIL_FIELD'] = 'E-mail';
        $keys['GROUP_COMBOBOX']   = 'Grupo...';
        $keys['ALL_FIELDS_ARE_NECESSARIES'] = 'É necessário preencher todos os campos!';
        $keys['VERY_SHORT_PASS']  = 'A senha que você digitou é curta demais. Sua senha deve possuir no mínimo 6 caracteres!';         
        
        //FORM FIELDS
        $keys['FORM_CODE'] = "Código";
        $keys['FORM_DISCIPLINA'] = "Disciplina";
        $keys['FORM_GROUPS']     = "Grupos";
        $keys['FORM_TITULO']     = "Título";
        $keys['FORM_STATUS']     = "Status";
        $keys['FORM_BASE']       = "Base de ensino (Nacional ou Diversificada)";
        $keys['FORM_TOTAL']      = "Total";
        $keys['FORM_TOTAL_CARGA_HORARIA'] = "Total Carga Horária";
        $keys['FORM_CARGA_HORARIA_SEMANAL'] = "Carga horária total semanal";
        $keys['FORM_TOTAL_GERAL_ENSINO_MEDIO'] = "Total geral do Ensino Médio";
        $keys['FORM_BASE_NACIONAL']       = "Base Nacional";
        $keys['FORM_BASE_DIVERSIFICADA'] = "Base Diversificada";
        $keys['FORM_ESTRUTURAS_INSCRITAS']     = "Estruturas Inscritas";
        
        //EMAIL
        $keys['REPASS_SUBJECT'] = "Nano - Renovação de Senha";
        $keys['REPASS_EMAIL_BODY'] = 'Olá %s.<br/> O sistema recebeu um pedido de renovação de senha para sua conta. Foi gerada uma nova senha para você:<br /> Seu Código: %s<br /> Sua nova senha: %s.<br /> Para efetuar o login acesse o painel de controles do sistema. Qualquer dúvida entre em contato: %s.';
        $keys['REPASS_EMAIL_FAIL'] = 'Houve uma tentativa de renovação de senha para seu login (%s). Se não foi você quem solicitou a renovação de senha, entre em contato com o administrador do sistema.';
        $keys['USER_REPASS_ERROR'] = ' Falha ao tentar enviar uma mensagem para seu e-mail.';
        
        //Days of Week
        $keys['SUNDAY'] = 'Domingo';
        $keys['MONDAY'] = 'Segunda-feira';
        $keys['TUESDAY'] = 'Terça-feira';
        $keys['WEDNESDAY'] = 'Quarta-feira';
        $keys['THURSDAY'] = 'quinta-feira';
        $keys['FRIDAY'] = 'Sexta-feira';
        $keys['SATURDAY'] = 'Sábado';
        
        //Repeat options
        $keys['DAILY'] = 'Diariamente';
        $keys['WEEKLY'] = 'Semanalmente';
        $keys['MONTHLY'] = 'Mensalmente';
        
        //Validate functions
        $keys['NOT_VALIDATE_CODE'] = "O campo de contrato não esta correto.";
        $keys['NOT_VALIDATE_FIRSTNAME'] = "O Primeiro nome esta vazio. É necessário preenche-lo.";
        $keys['NOT_VALIDATE_LASTNAME'] = "O Segundo nome esta vazio. É necessário preenche-lo.";
        $keys['NOT_VALIDATE_EMAIL'] = "O campo de E-mail esta vazio. É necessário preenche-lo.";
        $keys['NOT_VALIDATE_GROUP'] = "O campo de Grupo esta vazio. É necessário preenche-lo.";
        $keys['NOT_VALIDATE_ESTRUTURA'] = "Há erros no preenchimento dos campos. Verifique e tente novamente.";
        $keys['ALREADY_EXIST'] = "Já Existe";
        $keys['ALREADY_EXIST_GROUP'] = "O grupo já Existe";
        $keys['ALREADY_EXIST_CODE'] = "Este código já pertence a um usuário.";
        $keys['ALREADY_EXIST_EMAIL'] = "Este e-mail já pertence a um usuário.";
        $keys['ALREADY_EXIST_ESTRUTURA'] = "Estrutura já existe. Tente edita-lá!";
        $keys['DONT_EXIST_ESTRUTURA'] = "A estrutura não existe. Por favor, crie primeiro.";
        
        //ATTEMPTS
        $keys['ATTEMPT_USER_ERROR'] = wordwrap("Aviso: este usuário alertou para um possível erro em sua conta. Verifique os dados.", 20, "<br />\n");
        $keys['ATTEMPT_USER_CONFLICT'] = wordwrap("Aviso: este usuário esta em conflito com %s. verifique os dados e faça uma atualização", 20, "<br />\n");
        $keys['ATTEMPT_USER_EMPTY']    = wordwrap("Aviso: este usuário possui campos que precisam ser preenchidos. Ele não poderá utilizar o sistema corretamente!", 20,"<br />\n");
        $keys['ATTEMPT_USER_EMPTY_CODE']    = wordwrap("Aviso: este usuário esta sem código ou seu código esta errado. Ele não poderá utilizar o sistema corretamente!", 20,"<br />\n");
        $keys['ATTEMPT_USER_EMPTY_ACCTYPE'] = wordwrap("Aviso: o tipo de conta de usuário parace estar errado ou com valor nulo. Ele não poderá utilizar o sistema corretamente!", 20,"<br />\n");
        $keys['ATTEMPT_USER_EMPTY_GROUP']    = wordwrap("Aviso: o Grupo a que este usuário pertece parece estar errado ou nulo. Ele não poderá utilizar o sistema corretamente!", 20,"<br />\n");
        $keys['ATTEMPT_ESTRUTURAS_PID_REFACTORY'] = wordwrap("Aviso: pode haver algum erro com essa estrutura. Talvez o professor adequado seja %s. Corrijá o se houver erro.", 20, "<br />\n");
        $keys['ACCOUNT_ATTEMPT_BUTTON'] = "Sinalizar Conta com Erro";
        
        //BACKUP
        $keys['BACKUP_ERROR'] = "Erro ao tentar efetuar backup!";
        $keys['BACKUP_SUCCESS'] = "Novo backup criado."; 
        
        //Escape
        $keys['ESCAPE'] = "##";
        
        return $keys;
    }
}
?>
