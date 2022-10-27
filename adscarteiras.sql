-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 10:42 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adscarteiras`
--

-- --------------------------------------------------------

--
-- Table structure for table `carteira`
--

CREATE TABLE `carteira` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `descricao` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carteira`
--

INSERT INTO `carteira` (`id`, `id_cliente`, `descricao`) VALUES
(1, 1, 'Teste 1'),
(2, 2, '123');

-- --------------------------------------------------------

--
-- Table structure for table `carteira_acoes`
--

CREATE TABLE `carteira_acoes` (
  `id` int(11) NOT NULL,
  `id_carteira` int(11) NOT NULL,
  `acao` varchar(20) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `porcentagem_objetivo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carteira_acoes`
--

INSERT INTO `carteira_acoes` (`id`, `id_carteira`, `acao`, `quantidade`, `porcentagem_objetivo`) VALUES
(1, 1, 'acao1', 0, 25),
(2, 1, 'acao2', 0, 30),
(3, 1, 'acao3', 0, 45);

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `id_analista` int(11) NOT NULL,
  `token` varchar(100) NOT NULL,
  `usada` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `id_analista`, `token`, `usada`) VALUES
(1, 1, '123', '2022-10-26'),
(2, 1, '124', NULL),
(3, 1, '125', '2022-10-26'),
(5, 7, '586636', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `rg` varchar(10) NOT NULL,
  `cpf` varchar(25) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `celular` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `id_token` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `tipo`, `nome`, `sobrenome`, `rg`, `cpf`, `endereco`, `celular`, `email`, `senha`, `id_token`) VALUES
(1, 1, 'VITOR', 'DA SILVA', '3213213213', '', 'asdasddasads', '42142214', 'a@a.com', '1234', 5),
(7, 2, 'token', 'token', 'token', '', 'token', 'token', 'token@token.com', 'token', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carteira`
--
ALTER TABLE `carteira`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carteira_acoes`
--
ALTER TABLE `carteira_acoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carteira`
--
ALTER TABLE `carteira`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carteira_acoes`
--
ALTER TABLE `carteira_acoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
