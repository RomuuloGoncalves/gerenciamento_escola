<?php
require '../lib/conn.php';

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

    public function selecionarTurmaID($id){
        global $conn;

        $sqlSelectTurma = "SELECT * FROM turmas WHERE id_turma = :id";
        $select = $conn -> prepare($sqlSelectTurma);
        
        
        try {
            $select -> bindValue(":id", $id);
            $resultado = $select -> execute();
            $resultado = $select->fetch(PDO::FETCH_OBJ);
            
            return $resultado;
        } catch (PDOException $e) {
            return "Erro ao excluir turma: " . $e->getMessage();
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

    public function editarTurma($id) {
        global $conn;
    
        $sqlUpdateTurma = "UPDATE turmas SET nome_turma = :nome, ano = :ano, numero_vagas = :vagas, desc_turma = :desc_turma WHERE id_turma = :id";
        $update = $conn->prepare($sqlUpdateTurma);
    
        try {
            $update->bindValue(":id", $id);
            $update->bindValue(':nome', $this->nome_turma);
            $update->bindValue(':ano', $this->ano);
            $update->bindValue(':vagas', $this->numero_vagas);
            $update->bindValue(':desc_turma', $this->desc_turma);
            
            $resultado = $update->execute();
            
            return $resultado;
        } catch (PDOException $e) {
            return "Erro ao editar turma: " . $e->getMessage();
        }
    }

    public function excluirTurma($id){
        global $conn;

        $sqlDeleteTurmas = "DELETE FROM turmas WHERE id_turma = :id";
        $delete = $conn -> prepare($sqlDeleteTurmas);
        
        
        try {
            $delete -> bindValue(":id", $id);
            $resultado = $delete -> execute();
            
            return $resultado;
        } catch (PDOException $e) {
            return "Erro ao excluir turma: " . $e->getMessage();
        }
    }

    public function excluirRegistrosAssociados($id) {
        global $conn;
    
        $sqlDeleteAssociados = "DELETE FROM alunos_turmas WHERE id_turma = :id";
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