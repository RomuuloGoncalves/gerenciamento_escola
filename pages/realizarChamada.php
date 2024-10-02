<?php
include '../Controllers/TurmaTabela.php';
include '../Controllers/AlunoTabela.php';
include '../lib/conn.php';

$turmas = new Turma();
$resultadoTurmas = $turmas->listarTurmas();

session_start();
$alunos = isset($_SESSION['alunos']) ? $_SESSION['alunos'] : [];

session_unset();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style/default.css">
    <link rel="stylesheet" href="../assets/style/chamada.css">
    <link rel="stylesheet" href="../assets/style/consultas.css">
    <link rel="stylesheet" href="../assets/style/header.css">

    <title>Cadastrar Aluno</title>
</head>

<body>
    <header>
        <div class="voltar">
            <a href="../index.php">
                <label>VOLTAR</label>
            </a>
        </div>
    </header>

    <main>
        <form id="formSelect" action="../functions/selecionarTurmaChamada.php" method="GET">
            <label for="turma">Escolha uma turma para realizar a chamada:</label>

            <select name="id" id="turma">
                <?php
                foreach ($resultadoTurmas as $turma) {
                ?>
                    <option value="<?= $turma->id_turma ?>"><?= $turma->nome_turma ?></option>
                <?php
                }
                ?>
            </select>
            <button type="submit">Selecionar</button>
        </form>

        <?php if (!empty($alunos)) { ?>
            <table>
                <thead>
                    <tr>
                        <td scope="col">Nome</td>
                        <td scope="col">Data de Nascimento</td>
                        <td scope="col">Presença</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($alunos as $aluno) {
                    ?>
                        <tr>
                            <td><?= $aluno->nome_aluno ?></td>
                            <td><?= $aluno->data_nasc ?></td>
                            <td class="checkbox_centro">
                                <input class="checkbox" type="checkbox" name="presenca[<?= $aluno->id_aluno ?>]" value="presente">
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>

            </table>
        <?php } else { ?>
            <p>Nenhum aluno encontrado para essa turma.</p>
        <?php } ?>
    </main>
</body>

</html>