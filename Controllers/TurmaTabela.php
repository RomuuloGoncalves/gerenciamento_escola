<?php
include '../lib/conn.php';

class Turma{
    public $id_turma;
    public $ano;
    public $numero_vagas;
    public $desc_turma;

    public function listarTurmas(){
        global $conn;

        $sqlSelectTurmas = 'SELECT * FROM turmas';
        $sqlSelectTurmas = $conn->prepare($sqlSelectTurmas);
        $sqlSelectTurmas->execute();
        $resultado = $sqlSelectTurmas->fetchAll(PDO::FETCH_OBJ); 
        return $resultado;
    }
}