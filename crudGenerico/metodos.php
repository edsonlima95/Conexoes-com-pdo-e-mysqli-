<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of prof
 *
 * @author edson
 */
class metodos extends conection {
    /* ###############################
      FUNCTION CREATE
     * ############################## */

    public function create($tabela, array $dados) {

        $campos = implode(', ', array_keys($dados));
        $valores = "'" . implode("', '", array_values($dados)) . "'";
        $queryCreate = "INSERT INTO {$tabela} ({$campos}) VALUES ({$valores})";

        $create = parent::conectar()->prepare($queryCreate);

        $create->execute();

        if ($create->rowCount() > 0):
            return true;
        endif;
    }

    /* ###############################
      FUNCTION READ
     * ############################## */

    public function read($tabela,$campos = null, $cond = null) {
       
        $queryRead = "SELECT {$campo} FROM {$tabela} {$cond}";

        $read = parent::conectar()->prepare($queryRead);

        $read->execute();

        if ($read->rowCount() > 0):
            return $read->fetchAll(PDO::FETCH_ASSOC);
        else:
            return false;
        endif;
    }
     //Executa uma query informada no parametro.
    public function queryExecute($query) {
        $result = parent::conectar()->prepare($query);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /* ###############################
      FUNCTION UPDATE
     * ############################## */

    public function update($tabela, array $dados, $cond) {
        foreach ($dados as $campos => $values):
            $places [] = $campos . '=' . "'$values'";
        endforeach;
        $res = implode(', ', $places);

        $queryUpdate = "UPDATE {$tabela} SET {$res} {$cond}";

        $update = parent::conectar()->prepare($queryUpdate);

        $update->execute();

        if ($update->rowCount() > 0):
            return true;
        endif;
    }

    /* ###############################
      FUNCTION DELETE
     * ############################## */

    public function delete($tabela, $cond) {

        $queryDelete = "DELETE FROM {$tabela} {$cond}";

        $delete = parent::conectar()->prepare($queryDelete);

        $delete->execute();

        if ($delete->rowCount() > 0):
            return true;
        endif;
    }

}
