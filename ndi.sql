-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Dez-2018 às 02:05
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ndi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivos`
--

CREATE TABLE `arquivos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `rg` int(10) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `curso` varchar(45) NOT NULL,
  `ano` int(11) NOT NULL,
  `turma` int(11) NOT NULL,
  `duracao` varchar(45) NOT NULL,
  `area` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `unidade` varchar(45) NOT NULL,
  `box` varchar(45) NOT NULL,
  `prateleira` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `arquivos`
--

INSERT INTO `arquivos` (`id`, `tipo`, `cpf`, `rg`, `nome`, `curso`, `ano`, `turma`, `duracao`, `area`, `cidade`, `unidade`, `box`, `prateleira`) VALUES
(1, 'registro', '05512249592', 1382881789, 'Leonardo Pedreira de Alvarenga', 'Tec em info', 2017, 55223, 'hoje', 'ti', 'salvador', 'dendezeiros', '11223', '22222'),
(2, 'registro', '00463579550', 0, 'ODEMIR JESUS DOS REIS', 'CALDERARIA', 2006, 0, '2007', 'CULINARIA', 'SALVADOR', 'DENDEZEIROS', 'A1', '1'),
(3, 'registro', '07177844520', 0, 'ERIVELTON RIBEIRO DE OLIVEIRA', 'MECANICA GERAL', 1966, 0, '1970', 'AUTOMOTIVA', 'SALVADOR', 'DENDEZEIROS', 'F5', '23'),
(4, 'certificado', '01712289527', 123456789, 'JOAO CARLOS DE FREITAS BARRETO', 'OPERADOR DE EMPILHADEIRA', 2009, 0, '2010', 'FABRICA', 'SALVADOR', 'DENDEZEIROS', '', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` text NOT NULL,
  `email` varchar(45) NOT NULL,
  `login` text NOT NULL,
  `senha` text NOT NULL,
  `adm` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `login`, `senha`, `adm`) VALUES
(1, 'Administrador', 'pfc.ndi2018@gmail.com', 'admin', 'admin', 1),
(2, 'Leo', 'leo.alvarenga08@hotmail.com', 'leo', 'leo123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
