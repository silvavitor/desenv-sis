-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Nov-2022 às 00:15
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `adscarteiras`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carteira`
--

CREATE TABLE `carteira` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `descricao` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `carteira`
--

INSERT INTO `carteira` (`id`, `id_cliente`, `descricao`) VALUES
(1, 1, 'Teste 1'),
(2, 2, '123'),
(4, 1, 'teste 2'),
(5, 1, 'teste 3'),
(6, 1, 'teste4'),
(7, 1, 'teste 6');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carteira_acoes`
--

CREATE TABLE `carteira_acoes` (
  `id` int(11) NOT NULL,
  `id_carteira` int(11) NOT NULL,
  `acao` varchar(20) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `porcentagem_objetivo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `carteira_acoes`
--

INSERT INTO `carteira_acoes` (`id`, `id_carteira`, `acao`, `quantidade`, `porcentagem_objetivo`) VALUES
(1, 1, 'acao1', 123, 25),
(2, 1, 'acao2', 123101, 30),
(3, 1, 'acao3', 4256, 45),
(6, 4, 'aaaa', 0, 33),
(7, 4, 'bbbb', 0, 33),
(8, 4, 'ccccc', 0, 34),
(9, 5, 'aaa', 0, 25),
(10, 5, 'bbb', 0, 25),
(11, 5, 'ccc', 0, 25),
(12, 5, 'ddd', 0, 25),
(13, 6, 'fff', 0, 25),
(14, 6, 'ddd', 0, 35),
(15, 6, 'fasa', 0, 40),
(16, 7, 'asd', 0, 25),
(17, 7, 'fgh', 0, 25),
(18, 7, 'hyt', 0, 25),
(19, 7, 'hhhh', 0, 25);

-- --------------------------------------------------------

--
-- Estrutura da tabela `operacoes`
--

CREATE TABLE `operacoes` (
  `id` int(11) NOT NULL,
  `id_carteira` int(11) NOT NULL,
  `id_acao` int(11) NOT NULL,
  `lado` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `operacoes`
--

INSERT INTO `operacoes` (`id`, `id_carteira`, `id_acao`, `lado`, `quantidade`, `data`) VALUES
(11, 1, 2, 1, 123123, NULL),
(12, 1, 1, 1, 123, NULL),
(13, 1, 3, 1, 5555, NULL),
(14, 1, 3, 2, 1111, NULL),
(15, 1, 3, 2, 200, NULL),
(20, 1, 2, 2, 22, '0000-00-00 00:00:00'),
(21, 1, 3, 1, 12, '2022-11-09 20:13:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `id_analista` int(11) NOT NULL,
  `token` varchar(100) NOT NULL,
  `usada` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `token`
--

INSERT INTO `token` (`id`, `id_analista`, `token`, `usada`) VALUES
(1, 1, '123', '2022-10-26'),
(2, 1, '124', NULL),
(3, 1, '125', '2022-10-26'),
(5, 7, '586636', NULL),
(6, 7, '584375', '2022-11-09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
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
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `tipo`, `nome`, `sobrenome`, `rg`, `cpf`, `endereco`, `celular`, `email`, `senha`, `id_token`) VALUES
(1, 1, 'VITOR', 'DA SILVA', '3213213213', '', 'asdasddasads', '42142214', 'a@a.com', '1234', 5),
(7, 2, 'token', 'token', 'token', '', 'token', 'token', 'token@token.com', 'token', 0),
(8, 1, 'Gelson', 'da Luz', '4845656564', '', 'asdsaasd', '556165156156', 'gelson@teste.com', '12345', 6);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carteira`
--
ALTER TABLE `carteira`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `carteira_acoes`
--
ALTER TABLE `carteira_acoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `operacoes`
--
ALTER TABLE `operacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carteira`
--
ALTER TABLE `carteira`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `carteira_acoes`
--
ALTER TABLE `carteira_acoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `operacoes`
--
ALTER TABLE `operacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
