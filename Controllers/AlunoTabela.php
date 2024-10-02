<?php
include '../lib/conn.php';

class Aluno {
    public $id_aluno;
    public $nome_aluno;
    public $cpf_aluno;
    public $data_nasc;
    // private $conn;


    public function __construct() {
        // $this->conn = $conn;
        // $this->nome_aluno = $nome;
        // $this->cpf_aluno = $cpf;
        // $this->data_nasc = $data_nasc;
    }

    public function cadastrarAluno() {
        global $conn;
    
        $sqlInsertAluno = 'INSERT INTO alunos (nome_aluno, cpf_aluno, data_nasc) VALUES (:nome, :cpf, :data_nascimento)';
        $sqlInsertAluno = $conn->prepare($sqlInsertAluno);
        
        try {
            $sqlInsertAluno->bindValue(':nome', $this->nome_aluno);
            $sqlInsertAluno->bindValue(':cpf', $this->cpf_aluno);
            $sqlInsertAluno->bindValue(':data_nascimento', $this->data_nasc);
            $sqlInsertAluno->execute();
            
            return "Aluno cadastrado com sucesso!";
        } catch (PDOException $e) {
            return "Erro ao cadastrar aluno: " . $e->getMessage();
        }
    }
    
    

    public function listarAlunos() {
        global $conn;

        $sqlSelectAlunos = 'SELECT * FROM alunos';
        $sqlSelectAlunos = $conn->prepare($sqlSelectAlunos);
        $sqlSelectAlunos->execute();
        $resultado = $sqlSelectAlunos->fetchAll(PDO::FETCH_OBJ); 
        return $resultado;
    }

    public function deletarAluno() {
        
    }
}