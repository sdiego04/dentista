<?php

function get_string(string $word):string
{   
    $arraystring = getString();
    if (!array_key_exists($word, $arraystring)) {
       throw new Exception("string de idioma nao encontrado", 1);
    }

    return $arraystring[$word];
}


function getString(){
    //---- BEGIN GENERIC ---
    $string['success:registration'] = "Cadastro realizado com sucesso!";
    $string['success:consult'] = "Consulta realizada com sucesso!";
    $string['success:inative'] = "Inativado com sucesso!";
    $string['success:active'] = "Ativado com sucesso!";
    $string['warning:not_consult'] = "Nenhum registro encontrado!";
    $string['required:params'] = "Ha parametros faltando!";
    //---- END GENERIC 

    //---- BEGIN USER ------
    $string['user_not_found'] =  'Nenhum usuario encontrado!';
    $string['consult_success'] = 'Consulta realizada com sucesso!';
    $string['warning:user_exist'] = 'Usuario ja existe, favor entrar em contato com o suporte';
    $string['error:require_send_params'] = 'Erro ao enviar os parametros obrigatorios';
    $string['error:inative_user'] = 'Houve um erro ao inativar o usuario, favor entrar em contato com o suporte';
    $string['error:activate_user'] = 'Houve um erro ao ativar o usuario, favor entrar em contato com o suporte';
    $string['error:save_user'] = 'Houve um erro ao salvar, favor entrar em contato com o suporte';
    $string['success:inative_user'] = 'Usuario inativado com sucesso!';
    $string['success:activate_user'] = 'Usuario ativado com sucesso!';
    $string['success:save_user'] = 'Usuario salvo com sucesso!';
    //---- END USER ------

    return $string;
}


?>