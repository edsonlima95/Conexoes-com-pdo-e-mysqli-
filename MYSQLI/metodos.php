<?php


class metodos extends conexao
{

    public function insert($tabela, array $dados)
    {
        $campos = implode(', ', array_keys($dados));
        $valores = "'" . implode("', '", array_values($dados)) . "'";

        echo $query = "INSERT INTO {$tabela} ({$campos}) VALUES ({$valores})";

        $result = parent::Conn()->query($query);

        return $result;
    }

    public function select($tabela, $cond = null)
    {

        $result = parent::Conn()->query("SELECT * FROM {$tabela} {$cond}");

        $dados = array();

        while ($res = mysqli_fetch_assoc($result)) {
            foreach ($res as $key => $val):
                $res[$key] = utf8_encode($val);
            endforeach;
            array_push($dados, $res);
        }

        unset($result);

        return $dados;
    }

}