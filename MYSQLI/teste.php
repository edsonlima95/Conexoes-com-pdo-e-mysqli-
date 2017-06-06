<?php

require 'conexao.php';
require 'metodos.php';

//$read = new conexao();

$read = new metodos();
$dados = array(
    "nome" =>"edson"
);

$read->insert('teste', $dados);
