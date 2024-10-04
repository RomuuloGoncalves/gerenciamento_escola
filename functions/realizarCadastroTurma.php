<?php
session_start();
require '../Controllers/TurmaTabela.php';
require '../lib/conn.php';

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
    $_SESSION['erros'] = $erros; // Armazena os erros na sessão
    $_SESSION['dados'] = $_POST; // Armazena os dados preenchidos para não perder
    header("Location: ../pages/cadastroTurma.php"); // Redireciona para o formulário
    exit; // Encerra o script após o redirecionamento
} else {
    $turma = new Turma();
    $turma->nome_turma = $nome;
    $turma->ano = $data;
    $turma->numero_vagas = $vagas;
    $turma->desc_turma = $descricao;
    $resultadoCadastro = $turma->cadastrarTurma();
    }
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="2;url=../pages/cadastroTurma.php"> 
    <title>Cadastro de Aluno</title>
    <link rel="stylesheet" href="../assets/style/feedbackAcoes.css">
</head>

<body>
    <div class="container">
        <h1>Aluno Cadastrado com Sucesso!</h1>
        <p>Você será redirecionado para o formulário de cadastro em 2 segundos.</p>
    </div>
</body>

</html>