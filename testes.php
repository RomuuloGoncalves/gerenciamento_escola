<?php
include './Controllers/AlunoTabela.php';
include './lib/conn.php';

$alunos = new Aluno();
$resultado = $alunos->listarAlunos(); // Chama o método que retorna os alunos

var_dump($resultado);
