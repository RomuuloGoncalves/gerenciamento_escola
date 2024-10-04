<?php
require '../Controllers/TurmaTabela.php';
require '../lib/conn.php';

$turmas = new Turma();
$resultado = $turmas->listarTurmas();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/style/default.css">
  <link rel="stylesheet" href="../assets/style/consultas.css">
  <link rel="stylesheet" href="../assets/style/header.css">
  <title>Consultar Turmas</title>
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
    <input type="text" id="pesquisaInput" onkeyup="filtrarTabela()" placeholder="Pesquisar por nome...">
    <table id="tabelas_consultas">
      <thead>
        <tr>
          <td scope="col">#id</td>
          <td scope="col">Nome</td>
          <td scope="col">Vagas</td>
          <td scope="col">Data</td>
          <td scope="col">Descrição</td>
          <td scope="col">Editar</td>
          <td scope="col">Excluir</td>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($resultado as $turma): ?>
          <tr>
            <td><?= $turma->id_turma; ?></td>
            <td><?= $turma->nome_turma; ?></td>
            <td><?= $turma->numero_vagas; ?></td>
            <td><?= $turma->ano; ?></td>
            <td><?= $turma->desc_turma; ?></td>
            <td>
              <div class="icones">
                <a href="../pages/editarTurma.php?id=<?= $turma->id_turma; ?>">
                  <img src="../assets/imgs/editar.png" alt="">
                </a>
              </div>
            </td>
            <td>
              <div class="icones">
                <a href="../functions/realizarExclusaoTurma.php?id=<?= $turma->id_turma; ?>">
                  <img src="../assets/imgs/excluir.png" alt="">
                </a>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>

      </tbody>
    </table>
  </main>

  <script src="../assets/js/script.js"></script>
</body>

</html>