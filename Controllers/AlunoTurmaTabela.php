<?php
require '../lib/conn.php';

class AlunoTurma {
    public $id_aluno;
    public $id_turma;

    public function inserirAlunoTurma() {
        global $conn;
    
        $sqlInsertAluno = 'INSERT INTO alunos_turmas (id_aluno, id_turma) VALUES (:id_aluno, :id_turma)';
    
        $sqlInsertAluno = $conn->prepare($sqlInsertAluno);
    
        try {
            $sqlInsertAluno->bindValue(":id_aluno", $this->id_aluno);
            $sqlInsertAluno->bindValue(":id_turma", $this->id_turma);
            $sqlInsertAluno->execute();
            
            return true;
        } catch (PDOException $e) {
            return "Erro ao cadastrar alunos na turma: " . $e->getMessage();
        }
    }
    

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

    public function selecionarAlunosForaTurma($id_turma) {
        global $conn;
    
        $sqlSelectAlunosForaTurma = "SELECT *
                                    FROM alunos
                                    WHERE id_aluno NOT IN (
                                        SELECT id_aluno
                                        FROM alunos_turmas
                                        WHERE id_turma = :id_turma
                                    )";

    
        $select = $conn->prepare($sqlSelectAlunosForaTurma);
    
        try {
            $select->bindValue(":id_turma", $id_turma);
            $select->execute();
            $resultado = $select->fetchAll(PDO::FETCH_OBJ);
    
            return $resultado;
        } catch (PDOException $e) {
            return "Erro ao selecionar alunos fora da turma: " . $e->getMessage();
        }
    }
    
}
