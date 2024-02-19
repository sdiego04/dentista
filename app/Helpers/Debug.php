<?php


function debug($param, int $die = 1): void
{
    if($die != 1 && $die != 0){
        throw new Exception("Parametro invalido", 1);
    }

    if($die == 0){
        print_r('<pre>');
        var_dump($param);  
        print_r('<pre>');
    }
    
    if($die == 1){
        print_r('<pre>');
        var_dump($param);
        print_r('<pre>');
        die;
    }
}

?>