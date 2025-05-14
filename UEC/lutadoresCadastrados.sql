-- Active: 1747178249272@@127.0.0.1@3306@mysql

CREATE DATABASE IF NOT EXISTS lutadoresDB;
USE lutadoresDB;

-- Criação da tabela de lutadores
CREATE TABLE lutadores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    nacionalidade VARCHAR(50) NOT NULL,
    idade INT NOT NULL,
    altura DECIMAL(4,2) NOT NULL, -- em metros
    peso DECIMAL(5,2) NOT NULL,   -- em kg
    categoria VARCHAR(30) NOT NULL,
    vitorias INT DEFAULT 0,
    derrotas INT DEFAULT 0,
    empates INT DEFAULT 0
);