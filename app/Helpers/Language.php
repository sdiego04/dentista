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
    $string['user_not_found'] =  'Nenhum usuario encontrado!';
    $string['consult_success'] = 'Consulta realizada com sucesso!';

    return $string;
}


?>