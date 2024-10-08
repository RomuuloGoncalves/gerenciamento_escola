DROP DATABASE IF EXISTS gerenciamento_escola;
CREATE DATABASE gerenciamento_escola;      
USE gerenciamento_escola;

DROP TABLE IF EXISTS alunos;
CREATE TABLE alunos (
    id_aluno INT AUTO_INCREMENT PRIMARY KEY,
    nome_aluno VARCHAR(100) NOT NULL,
    cpf_aluno CHAR(11) NOT NULL,
    data_nasc DATE
);

DROP TABLE IF EXISTS turmas;
CREATE TABLE turmas (
    id_turma INT AUTO_INCREMENT PRIMARY KEY,
    nome_turma VARCHAR(100) NOT NULL,
    ano DATE NOT NULL,
    numero_vagas INT NOT NULL,
    desc_turma VARCHAR(100)
);

DROP TABLE IF EXISTS alunos_turmas;
CREATE TABLE alunos_turmas (
    id_aluno INT NOT NULL,
    id_turma INT NOT NULL,
    data_matricula DATE,
    FOREIGN KEY (id_aluno) REFERENCES alunos(id_aluno) ON DELETE CASCADE,
    FOREIGN KEY (id_turma) REFERENCES turmas(id_turma) ON DELETE CASCADE
);

DROP TABLE IF EXISTS presencas;
CREATE TABLE presencas (
    id_presenca INT AUTO_INCREMENT PRIMARY KEY,
    id_aluno_presenca INT NOT NULL,
    aluno_presente BOOLEAN DEFAULT 1,
    FOREIGN KEY (id_aluno_presenca) REFERENCES alunos(id_aluno) ON DELETE CASCADE
);

DROP TABLE IF EXISTS chamadas;
CREATE TABLE chamadas (
    id_chamada INT AUTO_INCREMENT PRIMARY KEY,
    id_turma_chamada INT NOT NULL,
    data_chamada TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_turma_chamada) REFERENCES alunos_turmas(id_turma) ON DELETE CASCADE
);

DROP TABLE IF EXISTS presenca_chamada;
CREATE TABLE presenca_chamada (
    id_presenca_chamada INT AUTO_INCREMENT PRIMARY KEY,
    id_presenca INT NOT NULL,
    id_chamada INT NOT NULL,
    FOREIGN KEY (id_presenca) REFERENCES presencas(id_presenca) ON DELETE CASCADE,
    FOREIGN KEY (id_chamada) REFERENCES chamadas(id_chamada) ON DELETE CASCADE
);

-- Inserindo 20 alunos
INSERT INTO alunos (nome_aluno, cpf_aluno, data_nasc) VALUES
('Ana Silva', '78133674050', '2005-05-15'),
('Bruno Oliveira', '48949871041', '2006-06-20'),
('Carlos Santos', '75157234082', '2005-07-30'),
('Daniela Costa', '99187149052', '2004-08-10'),
('Eduardo Lima', '28965003083', '2006-09-25'),
('Fernanda Pereira', '96717585099', '2005-10-05'),
('Gustavo Almeida', '35742626045', '2006-11-15'),
('Helena Martins', '81497549035', '2005-12-20'),
('Igor Rodrigues', '05819025059', '2004-01-30'),
('Juliana Ferreira', '40792993039', '2005-02-10'),
('Lucas Almeida', '36830927005', '2006-03-20'),
('Mariana Soares', '97411471046', '2005-04-05'),
('Nicolas Rocha', '91468651013', '2006-05-15'),
('Olívia Dias', '94680870001', '2005-06-30'),
('Paulo Souza', '36246722075', '2006-07-20'),
('Rafaela Gomes', '95844399013', '2005-08-15'),
('Samuel Mendes', '19705492034', '2006-09-10'),
('Tatiane Martins', '28742491061', '2005-10-25'),
('Vinícius Lima', '19348867008', '2006-11-05'),
('Yasmin Santos', '14978870038', '2005-12-15');

-- Inserindo 20 turmas
INSERT INTO turmas (nome_turma, ano, numero_vagas, desc_turma) VALUES
('Turma A - 1º Ano', '2023-01-01', 30, 'Turma A - 1º Ano'),
('Turma B - 1º Ano', '2023-01-01', 30, 'Turma B - 1º Ano'),
('Turma A - 2º Ano', '2023-01-01', 25, 'Turma A - 2º Ano'),
('Turma B - 2º Ano', '2023-01-01', 25, 'Turma B - 2º Ano'),
('Turma A - 3º Ano', '2023-01-01', 20, 'Turma A - 3º Ano'),
('Turma B - 3º Ano', '2023-01-01', 20, 'Turma B - 3º Ano'),
('Turma A - 4º Ano', '2023-01-01', 15, 'Turma A - 4º Ano'),
('Turma B - 4º Ano', '2023-01-01', 15, 'Turma B - 4º Ano'),
('Turma A - 5º Ano', '2023-01-01', 10, 'Turma A - 5º Ano'),
('Turma B - 5º Ano', '2023-01-01', 10, 'Turma B - 5º Ano');

-- Inserindo 20 matrículas de alunos em turmas
INSERT INTO alunos_turmas (id_aluno, id_turma, data_matricula) VALUES
(1, 1, '2023-08-01'),
(2, 1, '2023-08-02'),
(3, 2, '2023-08-03'),
(4, 2, '2023-08-04'),
(5, 3, '2023-08-05'),
(6, 3, '2023-08-06'),
(7, 4, '2023-08-07'),
(8, 4, '2023-08-08'),
(9, 5, '2023-08-09'),
(10, 5, '2023-08-10'),
(11, 1, '2023-08-11'),
(12, 2, '2023-08-12'),
(13, 3, '2023-08-13'),
(14, 4, '2023-08-14'),
(15, 5, '2023-08-15'),
(16, 6, '2023-08-16'),
(17, 7, '2023-08-17'),
(18, 8, '2023-08-18'),
(19, 9, '2023-08-19'),
(20, 10, '2023-08-20');
