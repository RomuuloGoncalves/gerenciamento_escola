<?php
include '../Controllers/TurmaTabela.php';
include '../lib/conn.php';

$id = (int) $_GET["id"];

$turma = new Turma();

// Excluir registros associados
$turma->excluirRegistrosAssociados($id);

// Excluir aluno
$resultado = $turma->excluirTurma($id);

if ($resultado) {
?>
    <!DOCTYPE html>
    <html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="refresh" content="2;url=../pages/consultarTurmas.php">
        <title>Excluir Turma</title>
        <link rel="stylesheet" href="../assets/style/feedbackAcoes.css">
    </head>

    <body>
        <div class="container">
            <h1>Turma excluido com Sucesso!</h1>
            <p>Você será redirecionado para a listagem em 2 segundos.</p>
        </div>
    </body>

    </html>

<?php
}
?>