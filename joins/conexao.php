<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conexao
 *
 * @author Edson Lima
 */
class conexao {

    /** @var PDO * */
    private $conexao;
    private $localhost = 'localhost';
    private $pass = '';
    private $user = 'root';
    private $db = 'joins';
    

    public function conexao() {
        $dns = "mysql:host={$this->localhost};dbname={$this->db}";
        $opt = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"];
        $this->conexao = new PDO($dns, $this->user, $this->pass, $opt);
        return $this->conexao;
    }
}
