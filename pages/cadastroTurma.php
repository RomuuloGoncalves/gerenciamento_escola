<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/default.css">
    <link rel="stylesheet" href="../assets/style/cadastro.css">
    <title>Cadastrar Aluno</title>
</head>

<body>
    <div class="container">
        <div id="title">Cadastrar Turma</div>
        <form action="cadastrar_turma.php" method="POST">
            <div class="campo">
                <label for="nome_turma">Nome da turma:</label>
                <input type="text" id="nome_turma" name="nome_turma">
            </div>

            <div class="campo">
                <label for="vagas">Número de vagas:</label>
                <input type="number" id="vagas" name="vagas">
            </div>

            <div class="campo">
                <label for="data">Data:</label>
                <input type="date" id="data" name="data">
            </div>

            <div class="campo">
                <label for="data_nascimento">Descrição</label>
                <textarea id="data_nascimento" rows="5" name="data_nascimento"> </textarea>
            </div>

            <button type="submit">Cadastrar</button>
        </form>
    </div>

</body>

</html>