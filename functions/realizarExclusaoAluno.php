<?php
include '../Controllers/AlunoTabela.php';
include '../lib/conn.php';

$id = (int) $_GET["id"];

$aluno = new Aluno();

$aluno->excluirRegistrosAssociados($id);
$resultado = $aluno->excluirAluno($id);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="2;url=../pages/consultarAlunos.php">
    <title>Excluir Aluno</title>
    <link rel="stylesheet" href="../assets/style/feedbackAcoes.css">
</head>

<body>
    <div class="container">
        <h1>Aluno excluido com Sucesso!</h1>
        <p>Você será redirecionado para a listagem em 2 segundos.</p>
    </div>
</body>

</html>