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
      
        <a href="c.php?id=1">Link1</a>
        <a href="c.php?id=2" id="2">Link2</a>
        <a href="c.php?id=3" id="3">Link3</a>
        <a href="cr.php" target="_blank">Ver</a>
  
        <?php
        require './conexao.php';
        $read = new conexao();
        session_start();
        $id = $_GET['id'];
        if ($id):
            $q = "SELECT * FROM cart WHERE id_prod = {$id}";
            $e = $read->conexao()->prepare($q);
            $e->execute();
            $res = $e->fetchAll(PDO::FETCH_ASSOC)[0];

            if (!$res):
                $arr = array("id" => $id, "qt" => 1, "nome" => "tv");
                $insert = "INSERT INTO cart (id_prod, qtd, nome) VALUES (:id,:qt, :nome)";
                $i = $read->conexao()->prepare($insert);
//                $i->bindValue(':id', $id);
//                $i->bindValue(':qt', 1);
//                $i->bindValue(':nome', 'telefone');
                $i->execute($arr);
            else:
                
                $update = "UPDATE cart SET id_prod = :id, qtd = :qt WHERE id_prod = {$id}";
                $i = $read->conexao()->prepare($update);
                $i->bindValue(':id', $id);
                $i->bindValue(':qt', $res['qtd'] + 1);
                $i->execute();

            endif;
        endif;
        ?>
        <script src="assets/js/jquery.js" type="text/javascript"></script>
        <script>
        </script>
    </body>
</html>
