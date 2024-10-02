<?php
include '../Controllers/AlunoTabela.php';
include '../lib/conn.php';

$alunos = new Aluno();
$resultado = $alunos->listarAlunos();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/style/default.css">
  <link rel="stylesheet" href="../assets/style/consultas.css">
  <link rel="stylesheet" href="../assets/style/header.css">

  <title>Consultar alunos</title>
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
                <a href="../functions/realizarExclusaoAluno.php?id=<?= $aluno->id_aluno ?>">
                  <img src="../assets/imgs/editar.png" alt="">
                </a>
              </div>
            </td>

            <td>
              <div class="icones">
              <a href="../functions/realizarExclusaoAluno.php?id=<?= $aluno->id_aluno ?>">
                <img src="../assets/imgs/excluir.png" alt="">
              </a>
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