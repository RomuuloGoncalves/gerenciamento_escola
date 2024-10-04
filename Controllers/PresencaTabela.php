<?php
require '../lib/conn.php';

class Presenca {
    public $id_presenca;
    public $id_aluno_presenca;
    public $aluno_presente;

    public function adicionarPresenca() {
        global $conn;

        $sqlInsertPresenca = 'INSERT INTO presencas (id_aluno_presenca, aluno_presente) VALUES (:id_aluno, :presenca)';
        $stmt = $conn->prepare($sqlInsertPresenca);

        try {
            $stmt->bindValue(':id_aluno', $this->id_aluno_presenca);
            $stmt->bindValue(':presenca', $this->aluno_presente);
            $stmt->execute();
            return $conn->lastInsertId(); 
        } catch (PDOException $e) {
            return "Erro ao cadastrar presença: " . $e->getMessage();
        }
    }
}
?>
