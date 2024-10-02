<?php
include '../lib/conn.php';

class AlunoTurma {

    public function selecionarAlunosTurma($id_turma) {
        global $conn;

        $sqlSelectAlunoTurma = "SELECT * FROM alunos INNER JOIN alunos_turmas ON alunos.id_aluno = alunos_turmas.id_aluno WHERE alunos_turmas.id_turma = :id_turma";

        $select = $conn->prepare($sqlSelectAlunoTurma);

        try {
            $select->bindValue(":id_turma", $id_turma);
            $select->execute();
            $resultado = $select->fetchAll(PDO::FETCH_OBJ);
            
            return $resultado;
        } catch (PDOException $e) {
            return "Erro ao selecionar alunos da turma: " . $e->getMessage();
        }
    }
}
