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

        $queryRead = "SELECT * FROM Cliente ORDER BY nome ASC";

        $read = $conn->conexao()->prepare($queryRead);

        $read->execute();

        if ($read->rowCount() > 0):
            $result = $read->fetchAll(PDO::FETCH_ASSOC);
            echo '<table width="700px;" border="1" cellpadding="4" cellspacing="0">
                <tr>
                <th>id</th>
                <th>nome</th>
                <th>idade</th>
                <th>data</th>
                <th>editar</th>
                <th>excluir</th>
            </tr>';
            foreach ($result as $r):
                echo '   
            <tbody>
                <tr>
                    <td>' . $r['id'] . '</td>
                    <td>' . $r['nome'] . '</td>
                    <td>' . $r['idade'] . '</td>
                    <td>' . $r['data'] . '</td>
                    <td><a href="update.php?editar=' . $r['id'] . '">Editar</a></td>
                    <td><a href="Edit.php?excluir=' . $r['id'] . '">Excluir</a></td>
                </tr>
            </tbody>';
            endforeach;
            echo '</table>';
        endif;
        ?>
    </body>
</html>
