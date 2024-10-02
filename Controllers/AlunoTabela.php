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

    public function excluirAluno($id){
        global $conn;

        $sqlDeleteAluno = "DELETE FROM alunos WHERE id_aluno = :id";
        $delete = $conn -> prepare($sqlDeleteAluno);
        
        
        try {
            $delete -> bindValue(":id", $id);
            $resultado = $delete -> execute();
            
            return $resultado;
        } catch (PDOException $e) {
            return "Erro ao excluir aluno: " . $e->getMessage();
        }
    }

    public function excluirRegistrosAssociados($id) {
        global $conn;
    
        $sqlDeleteAssociados = "DELETE FROM alunos_turmas WHERE id_aluno = :id";
        $deleteAssociados = $conn->prepare($sqlDeleteAssociados);
        $deleteAssociados->bindValue(":id", $id);
        
        try {
            return $deleteAssociados->execute();
        } catch (PDOException $e) {
            echo "Erro ao excluir registros associados: " . $e->getMessage();
            return false;
        }
    }
    
}