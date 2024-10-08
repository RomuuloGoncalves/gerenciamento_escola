<?php
require '../Controllers/AlunoTurmaTabela.php';
require '../lib/conn.php';

session_start(); 

if (isset($_GET['id'])) {
    $id_turma = (int) $_GET['id'];
    $alunosNaTurma = new AlunoTurma();
    $alunos = $alunosNaTurma->selecionarAlunosForaTurma($id_turma);

    $_SESSION['alunos'] = $alunos;
    header('Location: ../pages/realizarMatricula.php?id='.$id_turma);
} else {
    $_SESSION['erro'] = "Nenhuma turma foi selecionada!";
    header('Location: ../pages/realizarMatricula.php');
}
