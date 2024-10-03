<?php
session_start();
include '../lib/conn.php';
include '../Controllers/ChamadaTabela.php';  
include '../Controllers/AlunoTurmaTabela.php';  
include '../Controllers/PresencaTabela.php';
include '../Controllers/PresencaChamadaTabela.php';

$erros = [];

// Verifica se a turma foi selecionada
if (!isset($_POST['id_turma']) || empty($_POST['id_turma'])) {
    $erros[] = "Turma não selecionada.";
} else {
    $id_turma = intval($_POST['id_turma']);
}

// Coleta as presenças
$presencas = isset($_POST['presenca']) ? $_POST['presenca'] : [];

if (empty($presencas)) {
    $erros[] = "Nenhuma presença foi registrada.";
}

// Se houver erros, redireciona
if (!empty($erros)) {
    $_SESSION['erros'] = $erros;
    $_SESSION['dados'] = $_POST;
    header("Location: ../pages/realizarChamada.php?id=$id_turma");
    exit;
} 

$alunoController = new AlunoTurma(); 
$alunos = $alunoController->selecionarAlunosTurma($id_turma);

$presencaIDs = []; // Array para armazenar os IDs das presenças

// Insere a presença
foreach ($alunos as $aluno) {
    $idAluno = intval($aluno->id_aluno);
    $alunoPresente = isset($presencas[$idAluno]) && $presencas[$idAluno] === 'presente' ? 1 : 0;

    $presenca = new Presenca();
    $presenca->id_aluno_presenca = $idAluno;
    $presenca->aluno_presente = $alunoPresente;

    $idPresenca = $presenca->adicionarPresenca(); // Insere a presença
    if (is_numeric($idPresenca)) {
        $presencaIDs[$idAluno] = $idPresenca; // Armazena o ID da presença
    } else {
        $_SESSION['erros'][] = $idPresenca; // Captura o erro ao inserir
    }
}

// Insere a chamada
$chamada = new Chamada();
$chamada->id_turma_chamada = $id_turma; // Define o ID da turma
$idChamada = $chamada->adicionarChamada(); // Insere a chamada e obtém o ID
if (!is_numeric($idChamada)) {
    $_SESSION['erros'][] = $idChamada; // Captura o erro ao inserir chamada
}

// Insere a relação de presença e chamada
foreach ($presencaIDs as $idAluno => $idPresenca) {
    $presencaChamada = new PresencaChamada();
    $presencaChamada->id_presenca = $idPresenca; // Define o ID da presença
    $presencaChamada->id_chamada = $idChamada; // Define o ID da chamada
    
    $idPresencaChamada = $presencaChamada->adicionarPresencaChamada(); // Insere a relação
    if (!is_numeric($idPresencaChamada)) {
        $_SESSION['erros'][] = $idPresencaChamada; // Captura o erro ao inserir a relação
    }
}

// Verifica se ocorreram erros e redireciona se necessário
if (!empty($_SESSION['erros'])) {
    header("Location: ../pages/realizarChamada.php?id=$id_turma");
    exit;
}

$_SESSION['idChamada'] = $idChamada;
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
        <p>Você será redirecionado para o relatório de chamada em 2 segundos.</p>
    </div>
</body>

</html>
