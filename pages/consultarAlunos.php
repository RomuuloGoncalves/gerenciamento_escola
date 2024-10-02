<?php
include '../Controllers/AlunoTabela.php';
include '../lib/conn.php';

$alunos = new Aluno();
$resultado = $alunos->listarAlunos(); // Chama o método que retorna os alunos

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/style/default.css">
  <link rel="stylesheet" href="../assets/style/consultarAlunos.css">
  <title>Consultar alunos</title>
</head>

<body>
  <main>
    <table>
      <thead>
        <tr>
          <td scope="col">#id</td>
          <td scope="col">Nome</td>
          <td scope="col">CPF</td>
          <td scope="col">Data de Nascimento</td>
          <td scope="col">Editar</td>
          <td scope="col">Excluir</td>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($resultado as $aluno) {
        ?>
          <tr>
            <td><?= $aluno->id_aluno ?></td>
            <td><?= $aluno->nome_aluno ?></td>
            <td><?= $aluno->cpf_aluno ?></td>
            <td><?= $aluno->data_nasc ?></td>
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