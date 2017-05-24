<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script src="dt/jquery-3.1.1.min.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
        <?php
        require './inc/config.inc.php';
       
        $read = new metodos();
        
        $result = $read->read('clientes');

        foreach ($result as $r):
            echo '<pre>';
            print_r($r);
        endforeach;
       
        ?>
    </body>
</html>
