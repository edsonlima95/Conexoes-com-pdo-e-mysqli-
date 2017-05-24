<?php

class conection {

    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbsa = 'cadastro';

    public function conectar() {

        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbsa}";
            $options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"];
            $conexao = new PDO($dsn, $this->user, $this->password, $options);
        } catch (Exception $e) {
            echo "Erro ao tentar conectar {$e->getMessage()}";
        }

        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexao;
    }

}

?>