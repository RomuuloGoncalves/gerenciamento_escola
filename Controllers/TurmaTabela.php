<?php
include '../lib/conn.php';

class Turma{
    public $id_turma;
    public $nome_turma;
    public $ano;
    public $numero_vagas;
    public $desc_turma;

    public function cadastrarTurma() {
        global $conn;
    
        $sqlInsertTurma = 'INSERT INTO turmas (nome_turma, ano, numero_vagas, desc_turma) VALUES (:nome, :ano, :vagas, :desc_turma)';
        $sqlInsertTurma = $conn->prepare($sqlInsertTurma);
    
        try {
            $sqlInsertTurma->bindValue(':nome', $this->nome_turma);
            $sqlInsertTurma->bindValue(':ano', $this->ano);
            $sqlInsertTurma->bindValue(':vagas', $this->numero_vagas);
            $sqlInsertTurma->bindValue(':desc_turma', $this->desc_turma);
            $sqlInsertTurma->execute();
            
            return true;
        } catch (PDOException $e) {
            return "Erro ao cadastrar turma: " . $e->getMessage();
        }
    }
    
    

    public function listarTurmas(){
        global $conn;

        $sqlSelectTurmas = 'SELECT * FROM turmas';
        $sqlSelectTurmas = $conn->prepare($sqlSelectTurmas);
        $sqlSelectTurmas->execute();
        $resultado = $sqlSelectTurmas->fetchAll(PDO::FETCH_OBJ); 
        return $resultado;
    }
}