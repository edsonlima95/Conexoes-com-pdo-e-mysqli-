<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexao
 *
 * @author edson
 */
class Conexao {

    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbsa = 'test';

    public function conexao() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbsa}";
            $options = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'];
            $conexao = new PDO($dsn, $this->user, $this->password, $options);
        } catch (Exception $e) {
            echo "Error ao tenta conectar {$e->getMessage()}";
        }
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexao;
    }

}
