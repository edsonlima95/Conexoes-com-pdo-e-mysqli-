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
        require './Conexao.php';
        require './metodos.php';

        $conn = new Conexao();

        //Pega o id da url para excluir.
        $id = filter_input(INPUT_GET, 'excluir', FILTER_DEFAULT);

        $deletarQuery = "DELETE FROM Cliente WHERE id = :id";

        $delete = $conn->conexao()->prepare($deletarQuery);

        $delete->bindParam(":id", $id);

        $delete->execute();

        if ($delete):
            echo 'Deletado com sucesso';
        endif;
        ?>
        <a href="read.php">Voltar</a>
    </body>
</html>
