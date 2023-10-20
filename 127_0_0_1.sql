-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Fev-2019 às 10:00
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetophp`
--
CREATE DATABASE IF NOT EXISTS `projetophp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `projetophp`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcoesutilizadores`
--

CREATE TABLE `funcoesutilizadores` (
  `id_user` int(11) NOT NULL,
  `funcao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcoesutilizadores`
--

INSERT INTO `funcoesutilizadores` (`id_user`, `funcao`) VALUES
(12, 'DONO'),
(14, 'O RICO'),
(15, 'Vira Milho'),
(16, 'Antoninho'),
(17, 'Almeidinha'),
(18, 'CarlÃ£o do CamiÃ£o'),
(19, 'Churrasco'),
(20, 'O RICO'),
(21, 'PANUCO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `foto_perfil` text,
  `nivel_acesso` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id`, `username`, `password`, `nome`, `foto_perfil`, `nivel_acesso`) VALUES
(12, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrador', 'b4997165a27d7dccff8e59a369ad512d.png', 0),
(14, 'panisgas01', '81dc9bdb52d04dc20036dbd8313ed055', 'Diogo Francisco', 'ca83f809926d56b5ee9b7cc2a8cc4db7.jpg', 1),
(15, 'birtmas', '81dc9bdb52d04dc20036dbd8313ed055', 'Virtor Hugo Cardinali', '8453969208ef164e508345c3ea0528d9.jpg', 1),
(16, 'antonio', '81dc9bdb52d04dc20036dbd8313ed055', 'AntÃ³nio Soares', 'ce1b88d5a3c3a726f1218119dcc9105f.jpg', 1),
(17, 'almeida0202', '81dc9bdb52d04dc20036dbd8313ed055', 'Bernardo Almeida', 'a7696a425b9b4c41de9986231d16b860.jpg', 1),
(18, 'carlinhos', '81dc9bdb52d04dc20036dbd8313ed055', 'Carlos Andrade', 'f342aad1f18f5ac6f4b1c1592d22bc33.jpg', 1),
(19, 'frango', '81dc9bdb52d04dc20036dbd8313ed055', 'Frango Assado', '02e7e725b0ab6adef402703fdce4f924.jpg', 1),
(20, 'panisgas02', '81dc9bdb52d04dc20036dbd8313ed055', 'Ivo Lopes', 'f0dc2d026e4a1df8b55580e70c6e426e.jpg', 1),
(21, 'chefe', '97e5d9029ad967d5b2031e2b095e756a', 'O CHEFE', 'da9fbea50c6a711bf1d529a3dcc61d49.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `funcoesutilizadores`
--
ALTER TABLE `funcoesutilizadores`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
