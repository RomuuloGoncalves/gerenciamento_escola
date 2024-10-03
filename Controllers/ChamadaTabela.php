<?php
include '../lib/conn.php';

class Chamada {
    public $id_chamada;
    public $id_turma_chamada;

    public function adicionarChamada() {
        global $conn;

        $sqlInsertChamada = 'INSERT INTO chamadas (id_turma_chamada) VALUES (:id_turma)';
        $stmt = $conn->prepare($sqlInsertChamada);

        try {
            $stmt->bindValue(':id_turma', $this->id_turma_chamada);
            $stmt->execute();
            return $conn->lastInsertId();
        } catch (PDOException $e) {
            return "Erro ao cadastrar chamada: " . $e->getMessage();
        }
    }
}
?>
