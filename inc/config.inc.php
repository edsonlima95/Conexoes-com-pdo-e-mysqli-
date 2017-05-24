<?php

function __autoload($class) {

    $dir = 'crudGenerico';

    if (file_exists("{$dir}/{$class}.php")):
        require_once "{$dir}/{$class}.php";
    else:
        die("Erro ao incluir a classe");
    endif;
}
