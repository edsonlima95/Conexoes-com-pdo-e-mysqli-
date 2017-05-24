<?php

class conexao
{

    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $table = 'cadastro';

    public function Conn (){

        $conn = new mysqli($this->host, $this->user, $this->password, $this->table);

        return $conn;
    }


}


