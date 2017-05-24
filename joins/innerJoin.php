<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /*
        SELECT column_name(s)
        FROM table1
        INNER JOIN table2 ON table1.column_name = table2.column_name;
        */
        require 'conexao.php';
        
        $cadastra = new conexao();
        
        echo '<h1>INNER JOIN</h1>';
        
        $query = "SELECT compra.valor, cliente.nome FROM cliente INNER JOIN compra ON compra.id_user = cliente.id";
        
        $executa = $cadastra->conexao()->prepare($query);
        
        $executa->execute();
        
        echo '<pre>';
        print_r($executa->fetchAll(PDO::FETCH_ASSOC));
        echo '<hr>';
        
        $query2 = "SELECT cidade.nome, estado.uf FROM estado INNER JOIN cidade ON cidade.id_estado = estado.id";
        $executa2 = $cadastra->conexao()->prepare($query2);
        
        $executa2->execute();
        
        echo '<pre>';
        print_r($executa2->fetchAll(PDO::FETCH_ASSOC));
        echo '<hr>';
        ?>
    </body>
</html>
