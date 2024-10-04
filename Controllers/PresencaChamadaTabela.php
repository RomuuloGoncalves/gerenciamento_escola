<?php
require '../lib/conn.php';

class PresencaChamada
{
    public $id_presenca_chamada;
    public $id_presenca;
    public $id_chamada;

    public function adicionarPresencaChamada()
    {
        global $conn;

        $sqlInsertPresencaChamada = 'INSERT INTO presenca_chamada (id_presenca, id_chamada) VALUES (:id_presenca, :id_chamada)';
        $sqlInsertPresencaChamada = $conn->prepare($sqlInsertPresencaChamada);

        try {
            $sqlInsertPresencaChamada->bindValue(':id_presenca', $this->id_presenca);
            $sqlInsertPresencaChamada->bindValue(':id_chamada', $this->id_chamada);
            $sqlInsertPresencaChamada->execute();
            
            return $conn->lastInsertId(); 
        } catch (PDOException $e) {
            return "Erro ao cadastrar relação de presença e chamada: " . $e->getMessage();
        }
    }
}
