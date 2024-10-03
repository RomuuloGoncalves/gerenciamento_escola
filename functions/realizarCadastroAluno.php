<?php
session_start();
require './validarCPF.php';
include '../Controllers/AlunoTabela.php';
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

if (!validaCPF($cpf) && !$erros['cpf']) {
    $erros['cpf'] = "CPF inválido.";
} else {
    $cpf = preg_replace('/[^0-9]/is', '', $cpf);
}

if (!empty($erros)) {
    $_SESSION['erros'] = $erros; // Armazena os erros na sessão
    $_SESSION['dados'] = $_POST; // Armazena os dados preenchidos para não perder
    header("Location: ../pages/cadastroAluno.php"); // Redireciona para o formulário
    exit; // Encerra o script após o redirecionamento
} else {

    $aluno = new Aluno();
    $aluno->nome_aluno = $nome;
    $aluno->cpf_aluno = $cpf;
    $aluno->data_nasc = $data_nascimento;
    $aluno->cadastrarAluno();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="2;url=../pages/cadastroAluno.php"> 
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