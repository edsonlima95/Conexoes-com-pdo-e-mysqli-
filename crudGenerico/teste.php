<?php
require 'conection.php';
require 'metodos.php';
$read = new metodos();

$resu = $read->read('clientes');

foreach ($resu as $r):
    echo '<pre>';
    var_dump($r);
endforeach;