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
        require './conexao.php';

        $readP = new conexao();
        $read = "SELECT * FROM cart";
        $res = $readP->conexao()->prepare($read);
        $res->fetchAll(PDO::FETCH_ASSOC);
        $res->execute();
        foreach ($res as $result):
            echo '<ul>
                <li>'.$result[nome].'</li>
                <li>'.$result[qtd].'</li>
            </ul>';
        endforeach;
        ?>
    </body>
</html>
