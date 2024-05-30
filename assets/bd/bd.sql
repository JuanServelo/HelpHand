DROP DATABASE IF EXISTS HelpHand;
CREATE database HelpHand;
USE HelpHand;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE Especialidade (
    Descricao TEXT DEFAULT NULL,
    Nome_espec VARCHAR(100) UNIQUE NOT NULL,
    ID_Espec INT PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE Colaborador (
    Data_nasc DATE NOT NULL,
    CPF VARCHAR(15) NOT NULL,
    ID_Colaborador INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100) NOT NULL,
    teste VARCHAR(100),
    Foto MEDIUMBLOB DEFAULT NULL,
    Email VARCHAR(100) NOT NULL,
    Senha VARCHAR(100) NOT NULL,
    Nota INT DEFAULT 5 NOT NULL,
    Telefone VARCHAR(18) NOT NULL,
    Genero ENUM ('Masculino', 'Feminino', 'Outro') NOT NULL,
    Descricao TEXT DEFAULT NULL,
    UNIQUE (Email, CPF)
);

CREATE TABLE Usuario (
    Nome VARCHAR(100) NOT NULL,
    Telefone VARCHAR(18) NOT NULL,
    Genero ENUM('Masculino', 'Feminino', 'Outros') NOT NULL,
    Data_nasc DATE NOT NULL,
    ID_Usuario INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Senha VARCHAR(100) NOT NULL,
    CPF VARCHAR(14) NOT NULL,
    teste VARCHAR(100),
    Nota INT DEFAULT 5 NOT NULL,
    Foto MEDIUMBLOB DEFAULT NULL,
    Tipo_User ENUM('Usuario', 'Administrador') DEFAULT 'Usuario' NOT NULL,
    UNIQUE (Email, CPF)
);

CREATE TABLE Especialista (
    fk_Colaborador_ID_Colaborador INT,
    fk_Especialidade_ID_Espec INT
);

CREATE TABLE Servico (
    fk_Colaborador_ID_Colaborador INT,
    fk_Usuario_ID_Usuario INT,
    fk_Endereco_ID_Endereco INT,
    Data_Servico DATE NOT NULL,
    Status_Servico ENUM('Analise', 'Finalizado', 'Em progresso', 'Cancelado') NOT NULL,
    Avaliacao INT DEFAULT NULL,
    Valor FLOAT NOT NULL DEFAULT 0.00,
    Descricao TEXT,
    ID_Servico INT PRIMARY KEY AUTO_INCREMENT
);

CREATE TABLE Comentario (
	ID_Comentario INT PRIMARY KEY AUTO_INCREMENT,
    fk_Colaborador_ID_Colaborador INT,
    fk_Usuario_ID_Usuario INT,
    Data_comentario DATE NOT NULL,
    Texto TEXT DEFAULT NULL
);

CREATE TABLE Endereco (
    Endereco VARCHAR(100) NOT NULL,
    Cidade VARCHAR(100) NOT NULL,
    Estado VARCHAR(100) NOT NULL,
    CEP VARCHAR(100) NOT NULL,
    ID_Endereco INT PRIMARY KEY AUTO_INCREMENT
);
 
ALTER TABLE Especialista ADD CONSTRAINT FK_Especialista_1
    FOREIGN KEY (fk_Colaborador_ID_Colaborador)
    REFERENCES Colaborador (ID_Colaborador)
    ON DELETE SET NULL;
 
ALTER TABLE Especialista ADD CONSTRAINT FK_Especialista_2
    FOREIGN KEY (fk_Especialidade_ID_Espec)
    REFERENCES Especialidade (ID_Espec)
    ON DELETE SET NULL;
 
ALTER TABLE Servico ADD CONSTRAINT FK_Servico_1
    FOREIGN KEY (fk_Colaborador_ID_Colaborador)
    REFERENCES Colaborador (ID_Colaborador)
    ON DELETE SET NULL;
 
ALTER TABLE Servico ADD CONSTRAINT FK_Servico_2
    FOREIGN KEY (fk_Usuario_ID_Usuario)
    REFERENCES Usuario (ID_Usuario)
    ON DELETE SET NULL;
    
ALTER TABLE Servico ADD CONSTRAINT FK_Servico_3
    FOREIGN KEY (fk_Endereco_ID_Endereco)
    REFERENCES Endereco (ID_Endereco);
 
ALTER TABLE Comentario ADD CONSTRAINT FK_Comentario_1
    FOREIGN KEY (fk_Colaborador_ID_Colaborador)
    REFERENCES Colaborador (ID_Colaborador)
    ON DELETE SET NULL;
 
ALTER TABLE Comentario ADD CONSTRAINT FK_Comentario_2
    FOREIGN KEY (fk_Usuario_ID_Usuario)
    REFERENCES Usuario (ID_Usuario)
    ON DELETE SET NULL;

CREATE TABLE UserLog (
ID_log INT AUTO_INCREMENT PRIMARY KEY,
Operation CHAR(6) NOT NULL, 
ChangeDate DATETIME NOT NULL, 
UserName VARCHAR(20) NOT NULL, 
OldID_User INT NULL, 
NewID_User INT NULL, 
OldCPF VARCHAR(14) NULL,
NewCPF VARCHAR(11) NULL,
OldUser VARCHAR(100) NULL, 
NewUser VARCHAR(100) NULL, 
OldData_Nasc DATE NULL, 
NewData_Nasc DATE NULL, 
OldGenero ENUM('Masculino', 'Feminino', 'Outro') NULL, 
NewGenero ENUM('Masculino', 'Feminino', 'Outro') NULL, 
OldTelefone VARCHAR(18) NULL,
NewTelefone VARCHAR(18) NULL,
OldEmail VARCHAR(100) NULL,
NewEmail VARCHAR(100) NULL,
OldNota INT NULL,
NewNota INT NULL,
OldFoto MEDIUMBLOB NULL,
NewFoto MEDIUMBLOB NULL,
OldSenha VARCHAR(100) NULL,
NewSenha VARCHAR(100) NULL,
OldTipo ENUM('Usuario', 'Administrador') NULL,
NewTipo ENUM('Usuario', 'Administrador') NULL
);

DROP TRIGGER IF EXISTS UserLogInsert;
DELIMITER $$
CREATE TRIGGER UserLogInsert
AFTER INSERT -- A Trigger dispara após o INSERT
ON Usuario
FOR EACH ROW
BEGIN
INSERT INTO -- Insere registro na tabela AutorLog
UserLog (Operation, ChangeDate, UserName, NewID_User, NewUser, NewCPF, NewData_Nasc, NewGenero, NewNota, NewTelefone, NewEmail, NewSenha, NewFoto, NewTipo)
SELECT 'Insert', NOW(), CURRENT_USER(), NEW.ID_Usuario, NEW.Nome, NEW.CPF, NEW.Data_Nasc, NEW.Genero, NEW.Nota, NEW.Telefone, NEW.Email, New.Senha, New.Foto, New.Tipo_User;
END $$
DELIMITER ;

DROP TRIGGER IF EXISTS UserLogDelete;
DELIMITER $$
CREATE TRIGGER UserLogDelete
AFTER DELETE -- A Trigger dispara após o DELETE
ON Usuario
FOR EACH ROW
BEGIN
INSERT INTO
UserLog (Operation, ChangeDate, UserName, OldID_User, OldUser, OldCPF, OldData_Nasc, OldGenero, OldNota, OldTelefone, OldEmail, OldSenha, OldFoto, OldTipo)
SELECT 'Delete', NOW(), CURRENT_USER(), OLD.ID_Usuario, OLD.Nome, OLD.CPF, OLD.Data_Nasc, OLD.Genero, OLD.Nota, OLD.Telefone, OLD.Email, OLD.Senha, OLD.Foto, OLD.Tipo_User;
END $$
DELIMITER ;

DROP TRIGGER IF EXISTS UserLogUpdate;
DELIMITER $$
CREATE TRIGGER UserLogUpdate
AFTER UPDATE -- A Trigger dispara após o UPDATE
ON Usuario
FOR EACH ROW
BEGIN
INSERT INTO
UserLog (Operation, ChangeDate, UserName, OldID_User, NewID_User, OldUser, NewUser, OldCPF, NewCPF, OldData_Nasc, NewData_Nasc, OldGenero, NewGenero, OldNota, NewNota, OldTelefone, NewTelefone, OldEmail, NewEmail, OldSenha, NewSenha, OldFoto, NewFoto, OldTipo, NewTipo)
SELECT 'Update', NOW(), CURRENT_USER(), OLD.ID_Usuario, NEW.ID_Usuario, OLD.Nome, NEW.Nome, OLD.CPF, NEW.CPF, OLD.Data_Nasc, NEW.Data_Nasc, OLD.Genero,  NEW.Genero, OLD.Nota, NEW.Nota, OLD.Telefone, NEW.Telefone, OLD.Email, NEW.Email, OLD.Senha, New.Senha, OLD.Foto, NEW.Foto, OLD.Tipo_User, NEW.Tipo_User;
END $$
DELIMITER ;

INSERT INTO Endereco (Endereco, Cidade, Estado, CEP) VALUES ('teste','teste','teste','teste');
select * from Servico;
select * from Endereco;
UPDATE usuario SET Tipo_User = 'Administrador' WHERE Email = 'Admin@HelpHand.com';
DELETE FROM Usuario WHERE ID_Usuario = 4;
SELECT * FROM UserLog;
UPDATE usuario SET Senha = '$senhaCriptografada' WHERE Email = 'Admin@HelpHand.com';
COMMIT;