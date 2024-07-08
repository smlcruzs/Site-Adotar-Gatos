CREATE DATABASE login;
USE login;
CREATE TABLE gatologin
(
  id_usuario int AUTO_INCREMENT PRIMARY KEY,
	nome varchar(30),
  email varchar(250),
  senha varchar(250),
 
 
)
ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
