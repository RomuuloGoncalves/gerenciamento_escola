<?php
session_start();
include '../Controllers/TurmaTabela.php';
include '../lib/conn.php';

$erros = [];

if (empty($_POST)) {
    $erros[] = "Dados vazios";
}

foreach ($_POST as $indice => $valor) {
    $valor = trim(strip_tags($valor));
    $$indice = $valor;
    if (empty($valor)) {
        $erros[$indice] = "Campo $indice em branco.";
    }
}
if (isset($data)) {
    $dataFormatada = DateTime::createFromFormat('Y-m-d', $data);
    if (!$dataFormatada || $dataFormatada->format('Y-m-d') !== $data) {
        $erros['data'] = "Data inválida.";
    }
}

if (!empty($erros)) {
    $_SESSION['erros'] = $erros; 
    $_SESSION['dados'] = $_POST; 
    $_SESSION['id_aluno'] = $id; 

    header("Location: ../pages/cadastroTurma.php");
    header("Location: ../pages/editarTurma.php?id=$id"); 

    exit; 
} else {
    $turma = new Turma();
    $turma->nome_turma = $nome;
    $turma->ano = $data;
    $turma->numero_vagas = $vagas;
    $turma->desc_turma = $descricao;
    $resultadoAtualizacao = $turma->editarTurma($id);
    }
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="2;url=../pages/consultarTurmas.php"> 
    <title>Editar Turma</title>
    <link rel="stylesheet" href="../assets/style/feedbackAcoes.css">
</head>

<body>
    <div class="container">
        <h1>Turma atualizada com Sucesso!</h1>
        <p>Você será redirecionado para o formulário de cadastro em 2 segundos.</p>
    </div>
</body>

</html>