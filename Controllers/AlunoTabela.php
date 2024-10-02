<?php
include '../lib/conn.php';

class Aluno {
    public $nome;
    public $id_aluno;
    public $nome_aluno;
    public $cpf_aluno;
    public $data_nasc;
    // private $conn;


    public function __construct() {
        // $this->conn = $conn;
    }

    public function cadastrar() {

    }

    public function listarAlunos() {
        global $conn;

        $sqlSelectAlunos = 'SELECT * FROM alunos';
        $sqlSelectAlunos = $conn->prepare($sqlSelectAlunos);
        $sqlSelectAlunos->execute();
        $resultado = $sqlSelectAlunos->fetchAll(PDO::FETCH_ASSOC); 
        return $resultado;
    }

    public function deletarAluno() {
        
    }
}