<?php
session_start(); // Inicie a sessão para acessar os erros
$erros = isset($_SESSION['erros']) ? $_SESSION['erros'] : [];
$dados = isset($_SESSION['dados']) ? $_SESSION['dados'] : [];
session_unset(); // Limpa os erros após acessar os erros
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/default.css">
    <link rel="stylesheet" href="../assets/style/cadastro.css">
    <link rel="stylesheet" href="../assets/style/header.css">

    <title>Cadastrar Turma</title>
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
        <div id="title">Cadastrar Turma</div>
        <form action="../functions/realizarCadastroTurma.php" method="POST">
            <div class="campo">
                <label class="label_formulario" for="nome">Nome da turma:</label>
                <input type="text" id="nome" name="nome" value="<?php echo isset($dados['nome']) ? $dados['nome'] : ''; ?>">
                <span class="erro"><?php echo isset($erros['nome']) ? $erros['nome'] : ''; ?></span>
            </div>

            <div class="campo">
                <label class="label_formulario" for="vagas">Número de vagas:</label>
                <input type="number" id="vagas" name="vagas" value="<?php echo isset($dados['vagas']) ? $dados['vagas'] : ''; ?>">
                <span class="erro"><?php echo isset($erros['vagas']) ? $erros['vagas'] : ''; ?></span>
            </div>

            <div class="campo">
                <label class="label_formulario" for="data">Data:</label>
                <input type="date" id="data" name="data" value="<?php echo isset($dados['data']) ? $dados['data'] : ''; ?>">
                <span class="erro"><?php echo isset($erros['data']) ? $erros['data'] : ''; ?></span>
            </div>

            <div class="campo">
                <label class="label_formulario" for="descricao">Descrição</label>
                <textarea id="descricao" rows="5" name="descricao"><?php echo isset($dados['descricao']) ? $dados['descricao'] : ''; ?></textarea>
                <span class="erro"><?php echo isset($erros['descricao']) ? $erros['descricao'] : ''; ?></span>
            </div>

            <button type="submit">Cadastrar</button>
        </form>
    </div>

</body>

</html>