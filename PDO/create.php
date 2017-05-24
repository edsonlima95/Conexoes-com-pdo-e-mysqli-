<?php
require './Conexao.php';
require './metodos.php';

$conn = new Conexao();

$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($post) && $post['enviar']):
    
    $nome = htmlspecialchars($post['nome']);
    $idade = htmlspecialchars($post['idade']);
    $data = ($post['data']);
    $date = metodos::timeStamp($data);

    $query = "INSERT INTO Cliente (nome,idade,data) VALUES (?,?,?)";

    $create = $conn->conexao()->prepare($query);

    $create->bindParam(1, $nome, PDO::PARAM_STR);
    $create->bindParam(2, $idade, PDO::PARAM_INT);
    $create->bindParam(3, $date);

    $create->execute();

    if ($create):
        echo "Cadastrado com sucesso";
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
    <input type="text" name="data" value="- -">

    <input type="submit" name="enviar" value="ok"><br><br>
    <a href="update.php?editar=">editar</a><br>
    <a href="crudGenerico.php?excluir=">Excluir</a>
</form>