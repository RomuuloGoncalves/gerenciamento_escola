<?php
include '../lib/conn.php';

class Chamada {
    public $id_chamada;
    public $id_aluno_chamada;
    public $id_turma_chamada;
    public $aluno_presente;
    public $data_chamada;

    public function adicionarChamada() {
        global $conn;

        $sqlInsertChamada = 'INSERT INTO chamadas (id_aluno_chamada, id_turma_chamada, aluno_presente) VALUES (:id_aluno, :id_turma, :presenca)';
        $sqlInsertChamada = $conn->prepare($sqlInsertChamada);

        try {
            $sqlInsertChamada->bindValue(':id_aluno', $this->id_aluno_chamada);
            $sqlInsertChamada->bindValue(':id_turma', $this->id_turma_chamada);
            $sqlInsertChamada->bindValue(':presenca', $this->aluno_presente);
            $sqlInsertChamada->execute();
            return $this->id_chamada; 
            return true;
        } catch (PDOException $e) {
            return "Erro ao cadastrar chamda: " . $e->getMessage();
        }
    }
    
}