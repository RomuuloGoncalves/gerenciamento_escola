<?php
session_start();
require '../lib/conn.php';
require '../Controllers/AlunoTurmaTabela.php';

$erros = [];

if (!isset($_POST['id_turma']) || empty($_POST['id_turma'])) {
    $erros[] = "Turma não selecionada.";
} else {
    $id_turma = intval($_POST['id_turma']);
}

$alunosSelecionados = isset($_POST['id_aluno']) ? $_POST['id_aluno'] : [];

if (empty($alunosSelecionados)) {
    $erros[] = "Nenhum aluno foi selecionado para adicionar à turma.";
}

if (!empty($erros)) {
    $_SESSION['erros'] = $erros;
    $_SESSION['dados'] = $_POST;
    header("Location: ../pages/realizarMatricula.php?id=$id_turma");
    exit;
}

$alunoTurma = new AlunoTurma();

foreach ($alunosSelecionados as $id_aluno) {
    $alunoTurma->id_aluno = intval($id_aluno);
    $alunoTurma->id_turma = $id_turma;
    $resultado = $alunoTurma->inserirAlunoTurma();
    if (!$resultado) {
        $_SESSION['erros'][] = "Erro ao cadastrar aluno com ID: $id_aluno na turma.";
    }
}

if (!empty($_SESSION['erros'])) {
    header("Location: ../pages/realizarMatricula.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="2;url=../pages/realizarMatricula.php"> 
    <title>Matricular aluno</title>
    <link rel="stylesheet" href="../assets/style/feedbackAcoes.css">
</head>

<body>
    <div class="container">
        <h1>Matrícula realizada com sucesso!</h1>
        <p>Você será redirecionado para o relatório de chamada em 2 segundos.</p>
    </div>
</body>

</html>
