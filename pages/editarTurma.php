<?php

require '../Controllers/TurmaTabela.php';
require '../lib/conn.php';

session_start();
$id = isset($_GET['id']) ? (int) $_GET['id'] : (int) $_SESSION['id_turma'];

$erros = isset($_SESSION['erros']) ? $_SESSION['erros'] : [];
$dados = isset($_SESSION['dados']) ? $_SESSION['dados'] : [];
session_unset();
$turma = new Turma();

$resultado = $turma->selecionarTurmaID($id);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/default.css">
    <link rel="stylesheet" href="../assets/style/cadastro.css">
    <link rel="stylesheet" href="../assets/style/header.css">

    <title>Editar Turma</title>
</head>

<body>
    <header>
        <div class="voltar">
            <a href="../index.php">
                <label>VOLTAR</label>
            </a>
        </div>
    </header>

    <div class="container">
        <div id="title">Editar Turma</div>
        <form action="../functions/realizarEdicaoTurma.php" method="POST">
            <input type="hidden" id="id" name="id" value="<?php echo $resultado->id_turma; ?>">

            <div class="campo">
                <label class="label_formulario" for="nome">Nome da turma:</label>
                <input type="text" id="nome" name="nome" value="<?php echo $resultado->nome_turma; ?>" placeholder="Nome da turma">
                <span class="erro"><?php echo isset($erros['nome']) ? $erros['nome'] : ''; ?></span>
            </div>

            <div class="campo">
                <label class="label_formulario" for="ano">Ano:</label>
                <input type="date" id="data" name="data" value="<?php echo $resultado->ano; ?>" placeholder="Ano da turma">
                <span class="erro"><?php echo isset($erros['ano']) ? $erros['ano'] : ''; ?></span>
            </div>

            <div class="campo">
                <label class="label_formulario" for="vagas">Número de vagas:</label>
                <input type="number" id="vagas" name="vagas" value="<?php echo $resultado->numero_vagas; ?>" placeholder="Número de vagas">
                <span class="erro"><?php echo isset($erros['vagas']) ? $erros['vagas'] : ''; ?></span>
            </div>

            <div class="campo">
                <label class="label_formulario" for="descricao">Descrição:</label>
                <textarea id="descricao" rows="5" name="descricao" placeholder="Descrição da turma"><?php echo $resultado->desc_turma; ?></textarea>
                <span class="erro"><?php echo isset($erros['descricao']) ? $erros['descricao'] : ''; ?></span>
            </div>

            <button type="submit">Atualizar</button>
        </form>
    </div>

</body>

</html>