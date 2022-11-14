-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Nov-2022 às 00:12
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
-- Estrutura da tabela `acoes`
--

CREATE TABLE `acoes` (
  `id` int(11) NOT NULL,
  `papel` varchar(10) NOT NULL,
  `segmento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `acoes`
--

INSERT INTO `acoes` (`id`, `papel`, `segmento`) VALUES
(1, 'RRRP3', ''),
(2, 'ALPA4', ''),
(3, 'ABEV3', ''),
(4, 'AMER3', ''),
(5, 'ARZZ3', ''),
(6, 'ASAI3', ''),
(7, 'AZUL4', ''),
(8, 'B3SA3', ''),
(9, 'BPAN4', ''),
(10, 'BBSE3', ''),
(11, 'BRML3', ''),
(12, 'BBDC3', ''),
(13, 'BBDC4', ''),
(14, 'BRAP4', ''),
(15, 'BBAS3', ''),
(16, 'BRKM5', ''),
(17, 'BRFS3', ''),
(18, 'BPAC11', ''),
(19, 'CRFB3', ''),
(20, 'CCRO3', ''),
(21, 'CMIG4', ''),
(22, 'CIEL3', ''),
(23, 'COGN3', ''),
(24, 'CPLE6', ''),
(25, 'CSAN3', ''),
(26, 'CPFE3', ''),
(27, 'CMIN3', ''),
(28, 'CVCB3', ''),
(29, 'CYRE3', ''),
(30, 'DXCO3', ''),
(31, 'ECOR3', ''),
(32, 'ELET3', ''),
(33, 'ELET6', ''),
(34, 'EMBR3', ''),
(35, 'ENBR3', ''),
(36, 'ENGI11', ''),
(37, 'ENEV3', ''),
(38, 'EGIE3', ''),
(39, 'EQTL3', ''),
(40, 'EZTC3', ''),
(41, 'FLRY3', ''),
(42, 'GGBR4', ''),
(43, 'GOAU4', ''),
(44, 'GOLL4', ''),
(45, 'NTCO3', ''),
(46, 'SOMA3', ''),
(47, 'HAPV3', ''),
(48, 'HYPE3', ''),
(49, 'IGTI11', ''),
(50, 'IRBR3', ''),
(51, 'ITSA4', ''),
(52, 'ITUB4', ''),
(53, 'JBSS3', ''),
(54, 'KLBN11', ''),
(55, 'RENT3', ''),
(56, 'LWSA3', ''),
(57, 'LREN3', ''),
(58, 'MGLU3', ''),
(59, 'MRFG3', ''),
(60, 'CASH3', ''),
(61, 'BEEF3', ''),
(62, 'MRVE3', ''),
(63, 'MULT3', ''),
(64, 'PCAR3', ''),
(65, 'PETR3', ''),
(66, 'PETR4', ''),
(67, 'PRIO3', ''),
(68, 'PETZ3', ''),
(69, 'POSI3', ''),
(70, 'QUAL3', ''),
(71, 'RADL3', ''),
(72, 'RAIZ4', ''),
(73, 'RDOR3', ''),
(74, 'RAIL3', ''),
(75, 'SBSP3', ''),
(76, 'SANB11', ''),
(77, 'SMTO3', ''),
(78, 'CSNA3', ''),
(79, 'SLCE3', ''),
(80, 'SULA11', ''),
(81, 'SUZB3', ''),
(82, 'TAEE11', ''),
(83, 'VIVT3', ''),
(84, 'TIMS3', ''),
(85, 'TOTS3', ''),
(86, 'UGPA3', ''),
(87, 'USIM5', ''),
(88, 'VALE3', ''),
(89, 'VIIA3', ''),
(90, 'VBBR3', ''),
(91, 'WEGE3', ''),
(92, 'YDUQ3', '');

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
(2, 2, '123'),
(5, 1, 'Teste');

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
(55, 0, 'VALE3', 100, 30),
(56, 0, 'BBAS3', 500, 70),
(60, 5, 'ASAI3', 0, 80),
(61, 5, 'RRRP3', 0, 20);

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
(1, 0, 55, 1, 200, '2022-11-14 19:07:59'),
(2, 0, 56, 1, 500, '2022-11-14 19:08:07'),
(3, 0, 55, 2, -100, '2022-11-14 19:08:12'),
(4, 5, 57, 1, 220, '2022-11-14 19:15:16'),
(5, 5, 58, 1, 150, '2022-11-14 19:15:22'),
(6, 5, 57, 2, -20, '2022-11-14 19:15:26');

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
(1, 3, '335966', NULL),
(2, 3, '802263', '2022-11-14');

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
  `id_token` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `tipo`, `nome`, `sobrenome`, `rg`, `cpf`, `endereco`, `celular`, `email`, `senha`, `id_token`) VALUES
(1, 1, 'teste', 'sobrenome', '1234123412', '12312312312', 'Rua teste', '51 9 99999999', 'a@a.com', '1234', 1),
(3, 2, 'analista', 'analista', '777777777', '777777777777', 'aaaaaaa', '2231231231', 'analista@teste.com', '123', 0),
(4, 1, 'teste', 'teste', '111111', '', 'asdasdasd', '111111', 'teste@teste.com', 'teste', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acoes`
--
ALTER TABLE `acoes`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de tabela `acoes`
--
ALTER TABLE `acoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de tabela `carteira`
--
ALTER TABLE `carteira`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `carteira_acoes`
--
ALTER TABLE `carteira_acoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `operacoes`
--
ALTER TABLE `operacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
