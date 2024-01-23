drop schema if exists biblioteca;
create schema biblioteca;
use biblioteca;

-- Criação da tabela autor
CREATE TABLE if not exists autor (
    autor_id INT PRIMARY KEY NOT NULL unique AUTO_INCREMENT,
    nome_autor VARCHAR(100) NOT NULL
);

-- Criação da tabela livro
CREATE TABLE if not exists livro (
    livro_id INT PRIMARY KEY  NOT NULL unique AUTO_INCREMENT,
    titulo VARCHAR(200) NOT NULL,
    autor_id INT,
	qtd INT,
    FOREIGN KEY (autor_id) REFERENCES autor(autor_id)
);

-- Criação da tabela usuário
CREATE TABLE if not exists usuario (
    usuario_id INT PRIMARY KEY NOT NULL unique AUTO_INCREMENT,
    nome_usuario VARCHAR(100) NOT NULL
);

-- Criação da tabela empréstimo
CREATE TABLE if not exists emprestimo (
    emp_id INT PRIMARY KEY NOT NULL unique AUTO_INCREMENT,
    livro_id INT,
    usuario_id INT,
    data_emp DATE,
    data_devolucao DATE,
    FOREIGN KEY (livro_id) REFERENCES livro(livro_id),
    FOREIGN KEY (usuario_id) REFERENCES usuario(usuario_id)
  
);

INSERT INTO usuario (nome_usuario) VALUES
('Alice Brown'),
('Charlie Davis'),
('Eva White');
INSERT INTO autor (nome_autor) VALUES
('John Doe'),
('Jane Smith'),
('Bob Johnson');


drop trigger if exists atualizar_qtd_livro;
----------------------- Trigger para atualizar a quantidade e verificar se é zero-------------------------------------
DELIMITER //

CREATE TRIGGER atualizar_qtd_livro
AFTER INSERT ON emprestimo
FOR EACH ROW
BEGIN
    UPDATE livro
    SET qtd = qtd - 1
    WHERE livro_id = NEW.livro_id;

    IF (SELECT qtd FROM livro WHERE livro_id = NEW.livro_id) = 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'A quantidade disponível do livro '; -- || CAST(NEW.livro_id AS CHAR) || ' atingiu zero.';
    END IF;
END //

DELIMITER ;

drop trigger if exists verificar_data_devolucao;
-- Criação de trigger que verifica a data de empréstimo e devolução ----------------------------------------------
DELIMITER //

CREATE TRIGGER verificar_data_devolucao
BEFORE INSERT ON emprestimo
FOR EACH ROW
BEGIN
    IF NEW.data_devolucao < NEW.data_emp THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'A data de devolução não pode ser anterior à data de empréstimo.';
    END IF;
END //

DELIMITER ;


-- Inserção de dados na tabela autor
--INSERT INTO autor (nome_autor) VALUES
--('John Doe'),
--('Jane Smith'),
--('Bob Johnson');

-- Inserção de dados na tabela livro
--INSERT INTO livro (livro_id, titulo, autor_id, qtd) VALUES
--(101, 'Aventuras na Biblioteca', 1,2),
--(102, 'Segredos dos Livros', 2,3),
--(103, 'O Mundo dos Códigos', 3,5);

-- Inserção de dados na tabela usuário
--INSERT INTO usuario (nome_usuario) VALUES
--('Alice Brown'),
--('Charlie Davis'),
--('Eva White');

-- Inserção de dados na tabela empréstimo
--INSERT INTO emprestimo (emp_id, livro_id, usuario_id, data_emp, data_devolucao) VALUES
--(10001, 101, 1001, '2024-01-15', '2024-02-01'),
--(--10002, 102, 1002, '2024-01-20', '2024-02-10'),
--(10003, 103, 1003, '2024-02-01', '2024-02-20');

/* Procedure que forma um protocolo de empréstimo*/

DELIMITER //

CREATE PROCEDURE inserir_emprestimo(
    IN livro_id INT,
    IN usuario_id INT,
    -- IN resp_emp_id INT,
    IN data_emp DATE,
    IN data_devolucao DATE
)
BEGIN
    DECLARE novo_emprestimo_id INT;
    
    -- Gera o novo emprestimo_id baseado na data e sequência numérica
    SELECT IFNULL(MAX(emp_id), 0) + 1 INTO novo_emprestimo_id FROM emprestimo;
    SET novo_emprestimo_id = CONCAT(YEAR(data_emp), LPAD(MONTH(data_emp), 2, '0'), LPAD(DAY(data_emp), 2, '0'), LPAD(novo_emprestimo_id, 5, '0'));
    
    -- Insere o novo empréstimo
    INSERT INTO emprestimo (emp_id, livro_id, usuario_id, data_emp, data_devolucao)
    VALUES (novo_emprestimo_id, livro_id, usuario_id, data_emp, data_devolucao);
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE devolver_livro(
    IN emprestimo_id INT
)
BEGIN
    DECLARE livro_id_devolvido INT;
    
    -- Obtém o livro associado ao empréstimo
    SELECT livro_id INTO livro_id_devolvido FROM emprestimo WHERE emp_id = emprestimo_id;
    
    -- Atualiza a quantidade do livro
    UPDATE livro SET qtd = qtd + 1 WHERE livro_id = livro_id_devolvido;
    
    -- Deleta o registro de empréstimo
    DELETE FROM emprestimo WHERE emp_id = emprestimo_id;
END //

DELIMITER ;




select * from emprestimo;

-- chamadas para criar o emprestimo e devolver o livro:
-- CALL inserir_emprestimo(102, 1001, 1002, '2024-01-15', '2024-02-01');
-- CALL devolver_livro(10001);



DELIMITER //

CREATE TRIGGER subtrair_livro_on_emprestimo
BEFORE INSERT ON emprestimo
FOR EACH ROW
BEGIN
    DECLARE qtd_disponivel INT;

    -- Obtém a quantidade disponível do livro
    SELECT qtd INTO qtd_disponivel FROM livro WHERE livro_id = NEW.livro_id;

    -- Verifica se há quantidade disponível para empréstimo
    IF qtd_disponivel > 0 THEN
        -- Atualiza a quantidade do livro
        UPDATE livro SET qtd = qtd - 1 WHERE livro_id = NEW.livro_id;
    ELSE
        -- Cancela o empréstimo
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Não há quantidade disponível para empréstimo.';
    END IF;
END //

DELIMITER ;

DELIMITER //

CREATE PROCEDURE realizar_emprestimo(IN livro_id_param INT, IN usuario_id_param INT, IN data_emp_param DATE, IN data_devolucao_param DATE)
BEGIN
    DECLARE qtd_disponivel INT;

    -- Obtém a quantidade disponível do livro
    SELECT qtd INTO qtd_disponivel FROM livro WHERE livro_id = livro_id_param;

    -- Verifica se há quantidade disponível para empréstimo
    IF qtd_disponivel > 0 THEN
        -- Insere o novo empréstimo
        INSERT INTO emprestimo (livro_id, usuario_id, data_emp, data_devolucao)
        VALUES (livro_id_param, usuario_id_param, data_emp_param, data_devolucao_param);

        -- Atualiza a quantidade do livro
        UPDATE livro SET qtd = qtd - 1 WHERE livro_id = livro_id_param;

        SELECT 'Empréstimo realizado com sucesso.' AS mensagem;
    ELSE
        SELECT 'Não há quantidade disponível para empréstimo.' AS mensagem;
    END IF;
END //

DELIMITER ;
