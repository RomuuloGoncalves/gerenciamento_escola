<?php
session_start();
include '../Controllers/ChamadaTabela.php';  
include '../Controllers/AlunoTurmaTabela.php';  
include '../lib/conn.php';

$erros = [];

if (!isset($_POST['id_turma'])) {
    $erros[] = "Turma não selecionada.";
} else {
    $id_turma = intval($_POST['id_turma']);
}

$presencas = isset($_POST['presenca']) ? $_POST['presenca'] : [];

if (empty($presencas)) {
    $erros[] = "Nenhuma presença foi registrada.";
}

// Verifica os valores das presenças
foreach ($presencas as $idAluno => $presenca) {
    $idAluno = intval($idAluno);
    if (!in_array($presenca, ['presente', 'ausente'])) {
        $erros[$idAluno] = "Valor inválido para presença do aluno $idAluno.";
    }
}

if (!empty($erros)) {
    $_SESSION['erros'] = $erros;
    $_SESSION['dados'] = $_POST;
    header("Location: ../pages/realizarChamada.php");
    exit;
} else {
    $chamada = new Chamada();

    $alunoController = new AlunoTurma(); 
    $alunos = $alunoController->selecionarAlunosTurma($id_turma);

    foreach ($alunos as $aluno) {
        $idAluno = intval($aluno->id_aluno);
        $alunoPresente = isset($presencas[$idAluno]) && $presencas[$idAluno] === 'presente' ? 1 : 0;

        $chamada->id_aluno_chamada = $idAluno;
        $chamada->id_turma_chamada = $id_turma;
        $chamada->aluno_presente = $alunoPresente;

        $resultado = $chamada->adicionarChamada();  
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="2;url=../pages/relatorioChamada.php">
    <title>Chamada Concluída</title>
    <link rel="stylesheet" href="../assets/style/feedbackAcoes.css">
</head>

<body>
    <div class="container">
        <h1>Chamada realizada com sucesso!</h1>
        <p>Você será redirecionado para o formulário de chamada em 2 segundos.</p>
    </div>
</body>

</html>
