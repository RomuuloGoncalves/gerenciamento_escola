<?php
include '../Controllers/AlunoTabela.php';
include '../lib/conn.php';
session_start();
$idChamada = (int) $_SESSION['idChamada'];
// $idChamada = 25;
// session_unset(); 


$alunos = new Aluno();
$resultado = $alunos->listarAlunosComPresenca($idChamada);
// var_dump($resultado)
;?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/style/default.css">
  <link rel="stylesheet" href="../assets/style/consultas.css">
  <link rel="stylesheet" href="../assets/style/header.css">
  <title>Relartório de Presença</title>

  <style>
    h1 {
      margin: 20px 50px -30px 50px;
    }
  </style>
</head>

<body>
  <header>
    <div class="voltar">
      <a href="../index.php">
        <label>VOLTAR</label>
      </a>
    </div>
  </header>

  <h1>Relatório da Chamada</h1>
  <main>
    <table id="tabelas_consultas">
      <thead>
        <tr>
          <td scope="col">#id</td>
          <td scope="col">Nome</td>
          <td scope="col">Presença</td>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($resultado as $aluno) {
        ?>
          <tr>
            <td><?= $aluno->id_aluno ?></td>
            <td><?= $aluno->nome_aluno ?></td>
            <td><?= $aluno->aluno_presente ? 'Presente' : 'Ausente' ?></td> 
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </main>
</body>

</html>