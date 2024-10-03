<?php
include '../Controllers/AlunoTurmaTabela.php';
include '../lib/conn.php';

session_start(); 

if (isset($_GET['id'])) {
    $id_turma = (int) $_GET['id'];
    $alunosNaTurma = new AlunoTurma();

    var_dump($id_turma);
    
    $alunos = $alunosNaTurma->selecionarAlunosTurma($id_turma);
    var_dump($alunos);

    $_SESSION['alunos'] = $alunos;
    
    header('Location: ../pages/realizarChamada.php?id='.$id_turma);
} else {
    $_SESSION['erro'] = "Nenhuma turma foi selecionada!";
    header('Location: ../pages/realizarChamada.php');
}
