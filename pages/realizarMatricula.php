<?php
require '../Controllers/TurmaTabela.php';
require '../Controllers/AlunoTabela.php';
require '../lib/conn.php';

$turmas = new Turma();
$resultadoTurmas = $turmas->listarTurmas();

session_start();
$alunos = isset($_SESSION['alunos']) ? $_SESSION['alunos'] : [];
$id_turma = (int) $_GET['id'];
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

    <title>Realizar Chamada</title>
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
        <form id="formSelect" action="../functions/selecionarAlunosForaTurma.php" method="GET">
            <label for="turma">Escolha uma turma para adicionar mais alunos:</label>

            <select name="id" id="turma">
                <option selected>Selecionar</option>

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
            <input type="text" id="pesquisaInput" onkeyup="filtrarTabela()" placeholder="Pesquisar por nome...">

            <form id="realizarChamada" action="../functions/matricularAlunoTurma.php" method="POST">
                <input type="hidden" name="id_turma" value="<?= $id_turma ?>">
                <table id="tabelas_consultas">
                    <thead>
                        <tr>
                            <td scope="col">#id</td>
                            <td scope="col">Nome</td>
                            <td scope="col">CPF</td>
                            <td scope="col">Matricular</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($alunos as $aluno) {
                        ?>
                            <tr>
                                <td><?= $aluno->id_aluno ?></td>
                                <td><?= $aluno->nome_aluno ?></td>
                                <td><?= $aluno->cpf_aluno ?></td>
                                <td class="checkbox_centro">
                                    <input class="checkbox" type="checkbox" name="id_aluno[]" value="<?= $aluno->id_aluno ?>">
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <button type="submit">Finalizar</button>
            </form>

        <?php } else { ?>
            <p>Nenhum aluno encontrado para essa turma.</p>
        <?php } ?>
    </main>

    <script src="../assets/js/script.js"></script>
</body>

</html>