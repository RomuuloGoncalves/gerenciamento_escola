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

    <title>Cadastrar Aluno</title>
</head>

<body>
    <header>
        <div class="voltar">
            <a href="../index.php">

                <!-- <img src="../assets/imgs/voltar.png" alt="voltar"> -->
                <label>VOLTAR</label>
            </a>
        </div>
    </header>

    <div class="container">
        <div id="title">Cadastrar Aluno</div>
        <form action="../functions/realizarCadastroAluno.php" method="POST">
            <div class="campo">
                <label class="label_formulario" for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo isset($dados['nome']) ? $dados['nome'] : ''; ?>">
                <span class="erro"><?php echo isset($erros['nome']) ? $erros['nome'] : ''; ?></span>
            </div>

            <div class="campo">
                <label class="label_formulario" for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" value="<?php echo isset($dados['cpf']) ? $dados['cpf'] : ''; ?>">
                <span class="erro"><?php echo isset($erros['cpf']) ? $erros['cpf'] : ''; ?></span>
            </div>

            <div class="campo">
                <label class="label_formulario" for="data_nascimento">Data de Nascimento:</label>
                <input type="date" id="data_nascimento" name="data_nascimento" value="<?php echo isset($dados['data_nascimento']) ? $dados['data_nascimento'] : ''; ?>">
                <span class="erro"><?php echo isset($erros['data_nascimento']) ? $erros['data_nascimento'] : ''; ?></span>
            </div>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>

</html>