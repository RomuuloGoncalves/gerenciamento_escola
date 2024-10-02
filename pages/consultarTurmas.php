<?php
include '../Controllers/TurmaTabela.php';
include '../lib/conn.php';

$turmas = new Turma();
$resultado = $turmas->listarTurmas(); // Chama o método que retorna os alunos

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/style/default.css">
  <link rel="stylesheet" href="../assets/style/consultarAlunos.css">
  <title>Consultar Turmas</title>
</head>

<body>
  <main>
    <table>
      <thead>
        <tr>
          <td scope="col">#id</td>
          <td scope="col">Descrição</td>
          <td scope="col">Vagas</td>
          <td scope="col">Data</td>
          <td scope="col">Editar</td>
          <td scope="col">Excluir</td>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($resultado as $turma) {
        ?>
          <tr>
            <td><?= $turma->id_turma ?></td>
            <td><?= $turma->desc_turma ?></td>
            <td><?= $turma->numero_vagas ?></td>
            <td><?= $turma->ano ?></td>
            <td>
              <div class="icones">

                <img src="../assets/imgs/editar.png" alt="">
              </div>
            </td>

            <td>
              <div class="icones">
                <img src="../assets/imgs/excluir.png" alt="">
              </div>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </main>
</body>

</html>