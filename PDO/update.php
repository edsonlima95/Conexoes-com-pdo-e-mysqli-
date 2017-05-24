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

        $id = filter_input(INPUT_GET, 'editar', FILTER_DEFAULT);
        $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        $conn = new Conexao();

        if (isset($post) && $post['enviar']):

            $nome = htmlspecialchars($post['nome']);
            $idade = htmlspecialchars($post['idade']);
            $data = ($post['data']);
            $date = metodos::timeStamp($data);

            $queryUpdate = "UPDATE Cliente SET nome = :nome WHERE id = :id";

            $update = $conn->conexao()->prepare($queryUpdate);

            $update->bindParam(":id", $id);
            $update->bindParam(":nome", $nome);
            $update->bindParam(":idade", $idade);
            $update->bindParam(":data", $date);

            $update->execute();

            if ($update):
                echo 'Atualizado com sucesso';
            endif;

        endif;
        ?>
        <form action="" method="post">
            <label>Nome</label>
            <input type="text" name="nome">
            <br><br>
            <label>idade</label>
            <input type="text" name="idade">
            <br><br>
            <label>data</label>
            <input type="text" name="data">
            <input type="submit" name="enviar" value="ok"><br></br>
        </form>
    </body>
</html>
