DROP DATABASE IF EXISTS gerenciamento_escola;
CREATE DATABASE gerenciamento_escola;      
USE gerenciamento_escola;

DROP TABLE IF EXISTS alunos;
CREATE TABLE alunos (
    id_aluno INT PRIMARY KEY NOT NULL,
    nome_aluno VARCHAR(100) NOT NULL,
    cpf_aluno VARCHAR(11) NOT NULL,
    data_nasc DATE
);

DROP TABLE IF EXISTS turmas;
CREATE TABLE turmas (
    id_turma INT PRIMARY KEY NOT NULL,
    ano INT NOT NULL,
    numero_vagas INT NOT NULL,
    desc_turma VARCHAR(100)
);

DROP TABLE IF EXISTS alunos_turmas;
CREATE TABLE alunos_turmas (
    id_aluno INT NOT NULL,
    id_turma INT NOT NULL,
    data_matricula DATE,
    FOREIGN KEY (id_aluno) REFERENCES alunos(id_aluno),
    FOREIGN KEY (id_turma) REFERENCES turmas(id_turma)
);

-- Inserindo 20 alunos
INSERT INTO alunos (id_aluno, nome_aluno, cpf_aluno, data_nasc) VALUES
(1, 'Ana Silva', '12345678901', '2005-05-15'),
(2, 'Bruno Oliveira', '12345678902', '2006-06-20'),
(3, 'Carlos Santos', '12345678903', '2005-07-30'),
(4, 'Daniela Costa', '12345678904', '2004-08-10'),
(5, 'Eduardo Lima', '12345678905', '2006-09-25'),
(6, 'Fernanda Pereira', '12345678906', '2005-10-05'),
(7, 'Gustavo Almeida', '12345678907', '2006-11-15'),
(8, 'Helena Martins', '12345678908', '2005-12-20'),
(9, 'Igor Rodrigues', '12345678909', '2004-01-30'),
(10, 'Juliana Ferreira', '12345678910', '2005-02-10'),
(11, 'Lucas Almeida', '12345678911', '2006-03-20'),
(12, 'Mariana Soares', '12345678912', '2005-04-05'),
(13, 'Nicolas Rocha', '12345678913', '2006-05-15'),
(14, 'Olívia Dias', '12345678914', '2005-06-30'),
(15, 'Paulo Souza', '12345678915', '2006-07-20'),
(16, 'Rafaela Gomes', '12345678916', '2005-08-15'),
(17, 'Samuel Mendes', '12345678917', '2006-09-10'),
(18, 'Tatiane Martins', '12345678918', '2005-10-25'),
(19, 'Vinícius Lima', '12345678919', '2006-11-05'),
(20, 'Yasmin Santos', '12345678920', '2005-12-15');

-- Inserindo 20 turmas
INSERT INTO turmas (id_turma, ano, numero_vagas, desc_turma) VALUES
(1, 2024, 30, 'Turma A - 1º Ano'),
(2, 2024, 30, 'Turma B - 1º Ano'),
(3, 2024, 25, 'Turma A - 2º Ano'),
(4, 2024, 25, 'Turma B - 2º Ano'),
(5, 2024, 20, 'Turma A - 3º Ano'),
(6, 2024, 20, 'Turma B - 3º Ano'),
(7, 2024, 15, 'Turma A - 4º Ano'),
(8, 2024, 15, 'Turma B - 4º Ano'),
(9, 2024, 10, 'Turma A - 5º Ano'),
(10, 2024, 10, 'Turma B - 5º Ano'),
(11, 2024, 30, 'Turma C - 1º Ano'),
(12, 2024, 30, 'Turma D - 1º Ano'),
(13, 2024, 25, 'Turma C - 2º Ano'),
(14, 2024, 25, 'Turma D - 2º Ano'),
(15, 2024, 20, 'Turma C - 3º Ano'),
(16, 2024, 20, 'Turma D - 3º Ano'),
(17, 2024, 15, 'Turma C - 4º Ano'),
(18, 2024, 15, 'Turma D - 4º Ano'),
(19, 2024, 10, 'Turma C - 5º Ano'),
(20, 2024, 10, 'Turma D - 5º Ano');

-- Inserindo 20 matrículas de alunos em turmas
INSERT INTO alunos_turmas (id_aluno, id_turma, data_matricula) VALUES
(1, 1, '2024-01-10'),
(2, 1, '2024-01-11'),
(3, 2, '2024-01-12'),
(4, 2, '2024-01-13'),
(5, 3, '2024-01-14'),
(6, 3, '2024-01-15'),
(7, 4, '2024-01-16'),
(8, 4, '2024-01-17'),
(9, 5, '2024-01-18'),
(10, 5, '2024-01-19'),
(11, 1, '2024-01-20'),
(12, 2, '2024-01-21'),
(13, 3, '2024-01-22'),
(14, 4, '2024-01-23'),
(15, 5, '2024-01-24'),
(16, 6, '2024-01-25'),
(17, 7, '2024-01-26'),
(18, 8, '2024-01-27'),
(19, 9, '2024-01-28'),
(20, 10, '2024-01-29');
