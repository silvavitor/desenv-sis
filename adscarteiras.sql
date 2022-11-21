-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Nov-2022 às 02:23
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 7.4.30

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
(1, 'MNDL3', 'Acessórios'),
(2, 'TECN3', 'Acessórios'),
(3, 'VIVA3', 'Acessórios'),
(4, 'AGRO3', 'Agricultura'),
(5, 'AGXY3', 'Agricultura'),
(6, 'APTI3', 'Agricultura'),
(7, 'APTI4', 'Agricultura'),
(8, 'CTCA3', 'Agricultura'),
(9, 'FRTA3', 'Agricultura'),
(10, 'GRAO3', 'Agricultura'),
(11, 'LAND3', 'Agricultura'),
(12, 'RAIZ4', 'Agricultura'),
(13, 'SLCE3', 'Agricultura'),
(14, 'SOJA3', 'Agricultura'),
(15, 'TESA3', 'Agricultura'),
(16, 'TTEN3', 'Agricultura'),
(17, 'ASAI3', 'Alimentos'),
(18, 'CRFB3', 'Alimentos'),
(19, 'GMAT3', 'Alimentos'),
(20, 'PCAR3', 'Alimentos'),
(21, 'CAML3', 'Alimentos Diversos'),
(22, 'JOPA3', 'Alimentos Diverso'),
(23, 'JOPA4', 'Alimentos Diversos'),
(24, 'MDIA3', 'Alimentos Diversos'),
(25, 'ODER3', 'Alimentos Diversos'),
(26, 'ODER4', 'Alimentos Diversos'),
(27, 'LCAM3', 'Aluguel de Carros'),
(28, 'MOVI3', 'Aluguel de Carros'),
(29, 'MSRO3', 'Aluguel de Carros'),
(30, 'RENT3', 'Aluguel de Carros'),
(31, 'VAMO3', 'Aluguel de Carros'),
(32, 'TASA3', 'Armas e Munições'),
(33, 'TASA4', 'Armas e Munições'),
(34, 'PMAM3', 'Artefatos de Cobre'),
(35, 'FBMC3', 'Artefatos de Ferro e Aço'),
(36, 'FBMC4', 'Artefatos de Ferro e Aço'),
(37, 'MGEL3', 'Artefatos de Ferro e Aço'),
(38, 'MGEL4', 'Artefatos de Ferro e Aço'),
(39, 'PATI3', 'Artefatos de Ferro e Aço'),
(40, 'PATI4', 'Artefatos de Ferro e Aço'),
(41, 'TKNO3', 'Artefatos de Ferro e Aço'),
(42, 'TKNO4', 'Artefatos de Ferro e Aço'),
(43, 'SMFT3', 'Atividades Esportivas'),
(44, 'LEVE3', 'Automóveis e Motocicletas'),
(45, 'MYPK3', 'Automóveis e Motocicletas'),
(46, 'PLAS11', 'Automóveis e Motocicletas'),
(47, 'PLAS3', 'Automóveis e Motocicletas'),
(48, 'BSEV3', 'Açucar e Alcool'),
(49, 'JALL3', 'Açucar e Alcool'),
(50, 'SMTO3', 'Açucar e Alcool'),
(51, 'ABCB4', 'Bancos'),
(52, 'BAZA3', 'Bancos'),
(53, 'BBAS3', 'Bancos'),
(54, 'BBDC3', 'Bancos'),
(55, 'BBDC4', 'Bancos'),
(56, 'BEES3', 'Bancos'),
(57, 'BEES4', 'Bancos'),
(58, 'BGIP3', 'Bancos'),
(59, 'BGIP4', 'Bancos'),
(60, 'BIDI11', 'Bancos'),
(61, 'BIDI3', 'Bancos'),
(62, 'BIDI4', 'Bancos'),
(63, 'BMEB3', 'Bancos'),
(64, 'BMEB4', 'Bancos'),
(65, 'BMGB4', 'Bancos'),
(66, 'BMIN3', 'Bancos'),
(67, 'BMIN4', 'Bancos'),
(68, 'BNBR3', 'Bancos'),
(69, 'BPAC11', 'Bancos'),
(70, 'BPAC3', 'Bancos'),
(71, 'BPAC5', 'Bancos'),
(72, 'BPAN12', 'Bancos'),
(73, 'BPAN4', 'Bancos'),
(74, 'BPAR3', 'Bancos'),
(75, 'BRBI11', 'Bancos'),
(76, 'BRIV3', 'Bancos'),
(77, 'BRIV4', 'Bancos'),
(78, 'BRSR3', 'Bancos'),
(79, 'BRSR5', 'Bancos'),
(80, 'BRSR6', 'Bancos'),
(81, 'BSLI3', 'Bancos'),
(82, 'BSLI4', 'Bancos'),
(83, 'ITSA3', 'Bancos'),
(84, 'ITSA4', 'Bancos'),
(85, 'ITUB3', 'Bancos'),
(86, 'ITUB4', 'Bancos'),
(87, 'MODL11', 'Bancos'),
(88, 'MODL3', 'Bancos'),
(89, 'MODL4', 'Bancos'),
(90, 'NUBR33', 'Bancos'),
(91, 'PINE10', 'Bancos'),
(92, 'PINE3', 'Bancos'),
(93, 'PINE4', 'Bancos'),
(94, 'PINE9', 'Bancos'),
(95, 'RPAD3', 'Bancos'),
(96, 'RPAD5', 'Bancos'),
(97, 'RPAD6', 'Bancos'),
(98, 'SANB11', 'Bancos'),
(99, 'SANB3', 'Bancos'),
(100, 'SANB4', 'Bancos'),
(101, 'BMKS3', 'Bicicletas'),
(102, 'ESTR3', 'Brinquedos e Jogos'),
(103, 'ESTR4', 'Brinquedos e Jogos'),
(104, 'TOYB3', 'Brinquedos e Jogos'),
(105, 'TOYB4', 'Brinquedos e Jogos'),
(106, 'ALPA3', 'Calçados'),
(107, 'ALPA4', 'Calçados'),
(108, 'CAMB3', 'Calçados'),
(109, 'GRND3', 'Calçados'),
(110, 'VULC3', 'Calçados'),
(111, 'BAUH3', 'Carnes e Derivados'),
(112, 'BAUH4', 'Carnes e Derivados'),
(113, 'BEEF3', 'Carnes e Derivados'),
(114, 'BRFS3', 'Carnes e Derivados'),
(115, 'JBSS3', 'Carnes e Derivados'),
(116, 'MNPR3', 'Carnes e Derivados'),
(117, 'MRFG3', 'Carnes e Derivados'),
(118, 'ABEV3', 'Cervejas e Refrigerantes'),
(119, 'INTB3', 'Computadores e Equipamentos'),
(120, 'ITEC3', 'Computadores e Equipamentos'),
(121, 'MLAS3', 'Computadores e Equipamentos'),
(122, 'POSI3', 'Computadores e Equipamentos'),
(123, 'AZEV3', 'Construção Pesada'),
(124, 'AZEV4', 'Construção Pesada'),
(125, 'APER1', 'Corretoras de Seguros e Resseguros'),
(126, 'APER3', 'Corretoras de Seguros e Resseguros'),
(127, 'WIZS3', 'Corretoras de Seguros e Resseguros'),
(128, 'ALLD3', 'Eletrodomésticos'),
(129, 'MGLU3', 'Eletrodomésticos'),
(130, 'VIIA3', 'Eletrodomésticos'),
(131, 'WHRL3', 'Eletrodomésticos'),
(132, 'WHRL4', 'Eletrodomésticos'),
(133, 'MTIG3', 'Embalagens'),
(134, 'MTIG4', 'Embalagens'),
(135, 'RANI3', 'Embalagens'),
(136, 'AESB3', 'Energia Elétrica'),
(137, 'AESO3', 'Energia Elétrica'),
(138, 'AFLT3', 'Energia Elétrica'),
(139, 'ALUP11', 'Energia Elétrica'),
(140, 'ALUP3', 'Energia Elétrica'),
(141, 'ALUP4', 'Energia Elétrica'),
(142, 'AURE3', 'Energia Elétrica'),
(143, 'CBEE3', 'Energia Elétrica'),
(144, 'CEBR3', 'Energia Elétrica'),
(145, 'CEBR5', 'Energia Elétrica'),
(146, 'CEBR6', 'Energia Elétrica'),
(147, 'CEEB3', 'Energia Elétrica'),
(148, 'CEEB5', 'Energia Elétrica'),
(149, 'CEEB6', 'Energia Elétrica'),
(150, 'CEED3', 'Energia Elétrica'),
(151, 'CEED4', 'Energia Elétrica'),
(152, 'CEPE3', 'Energia Elétrica'),
(153, 'CEPE5', 'Energia Elétrica'),
(154, 'CEPE6', 'Energia Elétrica'),
(155, 'CESP3', 'Energia Elétrica'),
(156, 'CESP5', 'Energia Elétrica'),
(157, 'CESP6', 'Energia Elétrica'),
(158, 'CLSC3', 'Energia Elétrica'),
(159, 'CLSC4', 'Energia Elétrica'),
(160, 'CMIG3', 'Energia Elétrica'),
(161, 'CMIG4', 'Energia Elétrica'),
(162, 'COCE3', 'Energia Elétrica'),
(163, 'COCE5', 'Energia Elétrica'),
(164, 'COCE6', 'Energia Elétrica'),
(165, 'COMR3', 'Energia Elétrica'),
(166, 'CPFE3', 'Energia Elétrica'),
(167, 'CPLE11', 'Energia Elétrica'),
(168, 'CPLE3', 'Energia Elétrica'),
(169, 'CPLE5', 'Energia Elétrica'),
(170, 'CPLE6', 'Energia Elétrica'),
(171, 'CSRN3', 'Energia Elétrica'),
(172, 'CSRN5', 'Energia Elétrica'),
(173, 'CSRN6', 'Energia Elétrica'),
(174, 'EEEL3', 'Energia Elétrica'),
(175, 'EEEL4', 'Energia Elétrica'),
(176, 'EGIE3', 'Energia Elétrica'),
(177, 'EKTR3', 'Energia Elétrica'),
(178, 'EKTR4', 'Energia Elétrica'),
(179, 'ELET3', 'Energia Elétrica'),
(180, 'ELET5', 'Energia Elétrica'),
(181, 'ELET6', 'Energia Elétrica'),
(182, 'EMAE3', 'Energia Elétrica'),
(183, 'EMAE4', 'Energia Elétrica'),
(184, 'ENBR3', 'Energia Elétrica'),
(185, 'ENEV3', 'Energia Elétrica'),
(186, 'ENGI11', 'Energia Elétrica'),
(187, 'ENGI12', 'Energia Elétrica'),
(188, 'ENGI3', 'Energia Elétrica'),
(189, 'ENGI4', 'Energia Elétrica'),
(190, 'ENMT3', 'Energia Elétrica'),
(191, 'ENMT4', 'Energia Elétrica'),
(192, 'EQPA3', 'Energia Elétrica'),
(193, 'EQPA5', 'Energia Elétrica'),
(194, 'EQPA6', 'Energia Elétrica'),
(195, 'EQPA7', 'Energia Elétrica'),
(196, 'EQTL3', 'Energia Elétrica'),
(197, 'GEPA3', 'Energia Elétrica'),
(198, 'GEPA4', 'Energia Elétrica'),
(199, 'GPAR3', 'Energia Elétrica'),
(200, 'LIGT3', 'Energia Elétrica'),
(201, 'LIPR3', 'Energia Elétrica'),
(202, 'MEGA3', 'Energia Elétrica'),
(203, 'NEOE3', 'Energia Elétrica'),
(204, 'POWE3', 'Energia Elétrica'),
(205, 'REDE3', 'Energia Elétrica'),
(206, 'RNEW11', 'Energia Elétrica'),
(207, 'RNEW3', 'Energia Elétrica'),
(208, 'RNEW4', 'Energia Elétrica'),
(209, 'STKF3', 'Energia Elétrica'),
(210, 'TAEE11', 'Energia Elétrica'),
(211, 'TAEE3', 'Energia Elétrica'),
(212, 'TAEE4', 'Energia Elétrica'),
(213, 'TRPL3', 'Energia Elétrica'),
(214, 'TRPL4', 'Energia Elétrica'),
(215, 'SOND3', 'Engenharia Consultiva'),
(216, 'SOND5', 'Engenharia Consultiva'),
(217, 'SOND6', 'Engenharia Consultiva'),
(218, 'TCNO3', 'Engenharia Consultiva'),
(219, 'TCNO4', 'Engenharia Consultiva'),
(220, 'BALM3', 'Equipamentos'),
(221, 'BALM4', 'Equipamentos'),
(222, 'LMED3', 'Equipamentos'),
(223, 'LUPA11', 'Equipamentos e Serviços'),
(224, 'LUPA12', 'Equipamentos e Serviços'),
(225, 'LUPA3', 'Equipamentos e Serviços'),
(226, 'OPCT3', 'Equipamentos e Serviços'),
(227, 'OSXB3', 'Equipamentos e Serviços'),
(228, 'ALSC3', 'Exploração de Imóveis'),
(229, 'ALSO3', 'Exploração de Imóveis'),
(230, 'BRML3', 'Exploração de Imóveis'),
(231, 'BRPR3', 'Exploração de Imóveis'),
(232, 'CORR3', 'Exploração de Imóveis'),
(233, 'CORR4', 'Exploração de Imóveis'),
(234, 'GSHP3', 'Exploração de Imóveis'),
(235, 'HBRE3', 'Exploração de Imóveis'),
(236, 'HBTS3', 'Exploração de Imóveis'),
(237, 'HBTS5', 'Exploração de Imóveis'),
(238, 'HBTS6', 'Exploração de Imóveis'),
(239, 'IGBR3', 'Exploração de Imóveis'),
(240, 'IGTA3', 'Exploração de Imóveis'),
(241, 'IGTI11', 'Exploração de Imóveis'),
(242, 'IGTI3', 'Exploração de Imóveis'),
(243, 'LHER3', 'Exploração de Imóveis'),
(244, 'LHER4', 'Exploração de Imóveis'),
(245, 'LOGG3', 'Exploração de Imóveis'),
(246, 'MULT3', 'Exploração de Imóveis'),
(247, 'SCAR3', 'Exploração de Imóveis'),
(248, 'SYNE3', 'Exploração de Imóveis'),
(249, 'CCRO3', 'Exploração de Rodovias'),
(250, 'ECOR3', 'Exploração de Rodovias'),
(251, 'TPIS3', 'Exploração de Rodovias'),
(252, 'CSAN3', 'Exploração. Refino e Distribuição'),
(253, 'DMMO11', 'Exploração. Refino e Distribuição'),
(254, 'DMMO3', 'Exploração. Refino e Distribuição'),
(255, 'ENAT3', 'Exploração. Refino e Distribuição'),
(256, 'OGXP3', 'Exploração. Refino e Distribuição'),
(257, 'PETR3', 'Exploração. Refino e Distribuição'),
(258, 'PETR4', 'Exploração. Refino e Distribuição'),
(259, 'PRIO3', 'Exploração. Refino e Distribuição'),
(260, 'RECV3', 'Exploração. Refino e Distribuição'),
(261, 'RPMG3', 'Exploração. Refino e Distribuição'),
(262, 'RRRP3', 'Exploração. Refino e Distribuição'),
(263, 'UGPA3', 'Exploração. Refino e Distribuição'),
(264, 'VBBR3', 'Exploração. Refino e Distribuição'),
(265, 'FHER3', 'Fertilizantes e Defensivos'),
(266, 'NUTR3', 'Fertilizantes e Defensivos'),
(267, 'VITT3', 'Fertilizantes e Defensivos'),
(268, 'CATA3', 'Fios e Tecidos'),
(269, 'CATA4', 'Fios e Tecidos'),
(270, 'CEDO3', 'Fios e Tecidos'),
(271, 'CEDO4', 'Fios e Tecidos'),
(272, 'CTKA3', 'Fios e Tecidos'),
(273, 'CTKA4', 'Fios e Tecidos'),
(274, 'CTNM3', 'Fios e Tecidos'),
(275, 'CTNM4', 'Fios e Tecidos'),
(276, 'CTSA3', 'Fios e Tecidos'),
(277, 'CTSA4', 'Fios e Tecidos'),
(278, 'DOHL3', 'Fios e Tecidos'),
(279, 'DOHL4', 'Fios e Tecidos'),
(280, 'ECPR3', 'Fios e Tecidos'),
(281, 'ECPR4', 'Fios e Tecidos'),
(282, 'PTNT3', 'Fios e Tecidos'),
(283, 'PTNT4', 'Fios e Tecidos'),
(284, 'SGPS3', 'Fios e Tecidos'),
(285, 'TEKA3', 'Fios e Tecidos'),
(286, 'TEKA4', 'Fios e Tecidos'),
(287, 'TXRX3', 'Fios e Tecidos'),
(288, 'TXRX4', 'Fios e Tecidos'),
(289, 'G2DI33', 'Gestão de Recursos e Investimentos'),
(290, 'GPIV33', 'Gestão de Recursos e Investimentos'),
(291, 'PPLA11', 'Gestão de Recursos e Investimentos'),
(292, 'TRPN3', 'Gestão de Recursos e Investimentos'),
(293, 'CEGR3', 'Gás'),
(294, 'CGAS3', 'Gás'),
(295, 'CGAS5', 'Gás'),
(296, 'PASS3', 'Gás'),
(297, 'PASS5', 'Gás'),
(298, 'PASS6', 'Gás'),
(299, 'MOAR3', 'Holdings Diversificadas'),
(300, 'PEAB3', 'Holdings Diversificadas'),
(301, 'PEAB4', 'Holdings Diversificadas'),
(302, 'SIMH3', 'Holdings Diversificadas'),
(303, 'SPRI3', 'Holdings Diversificadas'),
(304, 'SPRI5', 'Holdings Diversificadas'),
(305, 'SPRI6', 'Holdings Diversificadas'),
(306, 'HOOT3', 'Hotelaria'),
(307, 'HOOT4', 'Hotelaria'),
(308, 'AVLL3', 'Incorporações'),
(309, 'CALI3', 'Incorporações'),
(310, 'CALI4', 'Incorporações'),
(311, 'CRDE3', 'Incorporações'),
(312, 'CURY3', 'Incorporações'),
(313, 'CYRE3', 'Incorporações'),
(314, 'DIRR3', 'Incorporações'),
(315, 'EVEN3', 'Incorporações'),
(316, 'EZTC3', 'Incorporações'),
(317, 'GFSA3', 'Incorporações'),
(318, 'HBOR3', 'Incorporações'),
(319, 'INNT3', 'Incorporações'),
(320, 'JFEN3', 'Incorporações'),
(321, 'JHSF3', 'Incorporações'),
(322, 'KLAS3', 'Incorporações'),
(323, 'LAVV3', 'Incorporações'),
(324, 'MDNE3', 'Incorporações'),
(325, 'MELK3', 'Incorporações'),
(326, 'MRVE3', 'Incorporações'),
(327, 'MTRE3', 'Incorporações'),
(328, 'PDGR3', 'Incorporações'),
(329, 'PLPL3', 'Incorporações'),
(330, 'RDNI3', 'Incorporações'),
(331, 'RSID3', 'Incorporações'),
(332, 'TCSA3', 'Incorporações'),
(333, 'TEGA3', 'Incorporações'),
(334, 'TEND3', 'Incorporações'),
(335, 'TRIS3', 'Incorporações'),
(336, 'VIVR3', 'Incorporações'),
(337, 'BBRK3', 'Intermediação Imobiliária'),
(338, 'LPSB3', 'Intermediação Imobiliária'),
(339, 'DXCO3', 'Madeira'),
(340, 'EUCA3', 'Madeira'),
(341, 'EUCA4', 'Madeira'),
(342, 'MAGG3', 'Materiais Diversos'),
(343, 'SNSY3', 'Materiais Diversos'),
(344, 'SNSY5', 'Materiais Diversos'),
(345, 'SNSY6', 'Materiais Diversos'),
(346, 'EMBR3', 'Material Aeronáutico e de Defesa'),
(347, 'EPAR3', 'Material de Transporte'),
(348, 'MMAQ3', 'Material de Transporte'),
(349, 'MMAQ4', 'Material de Transporte'),
(350, 'RBNS11', 'Material de Transporte'),
(351, 'WLMM3', 'Material de Transporte'),
(352, 'WLMM4', 'Material de Transporte'),
(353, 'FRAS3', 'Material Rodoviário'),
(354, 'MWET3', 'Material Rodoviário'),
(355, 'MWET4', 'Material Rodoviário'),
(356, 'POMO3', 'Material Rodoviário'),
(357, 'POMO4', 'Material Rodoviário'),
(358, 'RAPT3', 'Material Rodoviário'),
(359, 'RAPT4', 'Material Rodoviário'),
(360, 'RCSL3', 'Material Rodoviário'),
(361, 'RCSL4', 'Material Rodoviário'),
(362, 'RSUL1', 'Material Rodoviário'),
(363, 'RSUL2', 'Material Rodoviário'),
(364, 'RSUL3', 'Material Rodoviário'),
(365, 'RSUL4', 'Material Rodoviário'),
(366, 'TUPY3', 'Material Rodoviário'),
(367, 'BIOM12', 'Medicamentos e Outros Produtos'),
(368, 'BIOM3', 'Medicamentos e Outros Produtos'),
(369, 'BLAU3', 'Medicamentos e Outros Produtos'),
(370, 'BPHA3', 'Medicamentos e Outros Produtos'),
(371, 'DMVF3', 'Medicamentos e Outros Produtos'),
(372, 'GBIO33', 'Medicamentos e Outros Produtos'),
(373, 'HYPE3', 'Medicamentos e Outros Produtos'),
(374, 'NRTQ3', 'Medicamentos e Outros Produtos'),
(375, 'OFSA3', 'Medicamentos e Outros Produtos'),
(376, 'PFRM3', 'Medicamentos e Outros Produtos'),
(377, 'PGMN3', 'Medicamentos e Outros Produtos'),
(378, 'PNVL3', 'Medicamentos e Outros Produtos'),
(379, 'RADL3', 'Medicamentos e Outros Produtos'),
(380, 'VVEO3', 'Medicamentos e Outros Produtos'),
(381, 'AURA33', 'Minerais Metálicos'),
(382, 'BRAP3', 'Minerais Metálicos'),
(383, 'BRAP4', 'Minerais Metálicos'),
(384, 'CBAV3', 'Minerais Metálicos'),
(385, 'CMIN3', 'Minerais Metálicos'),
(386, 'MMXM11', 'Minerais Metálicos'),
(387, 'MMXM3', 'Minerais Metálicos'),
(388, 'VALE3', 'Minerais Metálicos'),
(389, 'SHUL3', 'Motores . Compressores e Outros'),
(390, 'SHUL4', 'Motores . Compressores e Outros'),
(391, 'WEGE3', 'Motores . Compressores e Outros'),
(392, 'MTSA3', 'Máq. e Equip. Construção e Agrícolas'),
(393, 'MTSA4', 'Máq. e Equip. Construção e Agrícolas'),
(394, 'STTR3', 'Máq. e Equip. Construção e Agrícolas'),
(395, 'AERI3', 'Máq. e Equip. Industriais'),
(396, 'ARML3', 'Máq. e Equip. Industriais'),
(397, 'BDLL3', 'Máq. e Equip. Industriais'),
(398, 'BDLL4', 'Máq. e Equip. Industriais'),
(399, 'EALT3', 'Máq. e Equip. Industriais'),
(400, 'EALT4', 'Máq. e Equip. Industriais'),
(401, 'FRIO3', 'Máq. e Equip. Industriais'),
(402, 'INEP3', 'Máq. e Equip. Industriais'),
(403, 'INEP4', 'Máq. e Equip. Industriais'),
(404, 'KEPL3', 'Máq. e Equip. Industriais'),
(405, 'MILS3', 'Máq. e Equip. Industriais'),
(406, 'NORD3', 'Máq. e Equip. Industriais'),
(407, 'PTCA11', 'Máq. e Equip. Industriais'),
(408, 'PTCA3', 'Máq. e Equip. Industriais'),
(409, 'ROMI3', 'Máq. e Equip. Industriais'),
(410, 'UCAS3', 'Móveis'),
(411, 'WSON33', 'Não Classificados'),
(412, 'ATOM3', 'Outros'),
(413, 'CCXC3', 'Outros'),
(414, 'CMSA3', 'Outros'),
(415, 'CMSA4', 'Outros'),
(416, 'FIGE3', 'Outros'),
(417, 'FIGE4', 'Outros'),
(418, 'BLUT3', 'Outros'),
(419, 'BLUT4', 'Outros'),
(420, 'MAPT3', 'Outros'),
(421, 'MAPT4', 'Outros'),
(422, 'PPAR3', 'Outros'),
(423, 'FIBR3', 'Papel e Celulose'),
(424, 'KLBN11', 'Papel e Celulose'),
(425, 'KLBN3', 'Papel e Celulose'),
(426, 'KLBN4', 'Papel e Celulose'),
(427, 'MSPA3', 'Papel e Celulose'),
(428, 'MSPA4', 'Papel e Celulose'),
(429, 'NEMO3', 'Papel e Celulose'),
(430, 'NEMO5', 'Papel e Celulose'),
(431, 'NEMO6', 'Papel e Celulose'),
(432, 'SUZB3', 'Papel e Celulose'),
(433, 'BRKM3', 'Petroquímicos'),
(434, 'BRKM5', 'Petroquímicos'),
(435, 'BRKM6', 'Petroquímicos'),
(436, 'DEXP3', 'Petroquímicos'),
(437, 'DEXP4', 'Petroquímicos'),
(438, 'ELEK3', 'Petroquímicos'),
(439, 'ELEK4', 'Petroquímicos'),
(440, 'BOBR3', 'Produtos de Limpeza'),
(441, 'BOBR4', 'Produtos de Limpeza'),
(442, 'NTCO3', 'Produtos de Uso Pessoal'),
(443, 'AMER3', 'Produtos Diversos'),
(444, 'ESPA3', 'Produtos Diversos'),
(445, 'HCBR3', 'Produtos Diversos'),
(446, 'LAME3', 'Produtos Diversos'),
(447, 'LAME4', 'Produtos Diversos'),
(448, 'LJQQ3', 'Produtos Diversos'),
(449, 'LLBI3', 'Produtos Diversos'),
(450, 'LLBI4', 'Produtos Diversos'),
(451, 'PETZ3', 'Produtos Diversos'),
(452, 'SBFG3', 'Produtos Diversos'),
(453, 'SLED12', 'Produtos Diversos'),
(454, 'SLED3', 'Produtos Diversos'),
(455, 'SLED4', 'Produtos Diversos'),
(456, 'ETER3', 'Produtos para Construção'),
(457, 'HAGA3', 'Produtos para Construção'),
(458, 'HAGA4', 'Produtos para Construção'),
(459, 'PTBL3', 'Produtos para Construção'),
(460, 'AHEB3', 'Produção de Eventos e Shows'),
(461, 'AHEB5', 'Produção de Eventos e Shows'),
(462, 'AHEB6', 'Produção de Eventos e Shows'),
(463, 'SHOW3', 'Produção de Eventos e Shows'),
(464, 'CNSY3', 'Produção e Difusão de Filmes e Programas'),
(465, 'DOTZ3', 'Programas de Fidelização'),
(466, 'MPLU3', 'Programas de Fidelização'),
(467, 'BMOB3', 'Programas e Serviços'),
(468, 'BRQB3', 'Programas e Serviços'),
(469, 'CASH3', 'Programas e Serviços'),
(470, 'ENJU3', 'Programas e Serviços'),
(471, 'IFCM3', 'Programas e Serviços'),
(472, 'LVTC3', 'Programas e Serviços'),
(473, 'LWSA3', 'Programas e Serviços'),
(474, 'MBLY3', 'Programas e Serviços'),
(475, 'MOSI3', 'Programas e Serviços'),
(476, 'NGRD3', 'Programas e Serviços'),
(477, 'NINJ3', 'Programas e Serviços'),
(478, 'PDTC3', 'Programas e Serviços'),
(479, 'QUSW3', 'Programas e Serviços'),
(480, 'SQIA3', 'Programas e Serviços'),
(481, 'TOTS3', 'Programas e Serviços'),
(482, 'TRAD3', 'Programas e Serviços'),
(483, 'WEST3', 'Programas e Serviços'),
(484, 'ELMD3', 'Publicidade e Propaganda'),
(485, 'CRPG3', 'Químicos Diversos'),
(486, 'CRPG5', 'Químicos Diversos'),
(487, 'CRPG6', 'Químicos Diversos'),
(488, 'UNIP3', 'Químicos Diversos'),
(489, 'UNIP5', 'Químicos Diversos'),
(490, 'UNIP6', 'Químicos Diversos'),
(491, 'IRBR3', 'Resseguradoras'),
(492, 'BKBR3', 'Restaurante e Similares'),
(493, 'MEAL3', 'Restaurante e Similares'),
(494, 'BBSE3', 'Seguradoras'),
(495, 'BRGE11', 'Seguradoras'),
(496, 'BRGE12', 'Seguradoras'),
(497, 'BRGE3', 'Seguradoras'),
(498, 'BRGE5', 'Seguradoras'),
(499, 'BRGE6', 'Seguradoras'),
(500, 'BRGE7', 'Seguradoras'),
(501, 'BRGE8', 'Seguradoras'),
(502, 'CSAB3', 'Seguradoras'),
(503, 'CSAB4', 'Seguradoras'),
(504, 'CXSE3', 'Seguradoras'),
(505, 'PSSA3', 'Seguradoras'),
(506, 'SULA11', 'Seguradoras'),
(507, 'SULA3', 'Seguradoras'),
(508, 'SULA4', 'Seguradoras'),
(509, 'AALR3', 'Serv.Méd.Hospit..Análises e Diagnósticos'),
(510, 'ADHM3', 'Serv.Méd.Hospit..Análises e Diagnósticos'),
(511, 'DASA3', 'Serv.Méd.Hospit..Análises e Diagnósticos'),
(512, 'FLRY3', 'Serv.Méd.Hospit..Análises e Diagnósticos'),
(513, 'GNDI3', 'Serv.Méd.Hospit..Análises e Diagnósticos'),
(514, 'HAPV3', 'Serv.Méd.Hospit..Análises e Diagnósticos'),
(515, 'KRSA3', 'Serv.Méd.Hospit..Análises e Diagnósticos'),
(516, 'MATD3', 'Serv.Méd.Hospit..Análises e Diagnósticos'),
(517, 'ODPV3', 'Serv.Méd.Hospit..Análises e Diagnósticos'),
(518, 'ONCO3', 'Serv.Méd.Hospit..Análises e Diagnósticos'),
(519, 'PACF3', 'Serv.Méd.Hospit..Análises e Diagnósticos'),
(520, 'PARD3', 'Serv.Méd.Hospit..Análises e Diagnósticos'),
(521, 'QUAL3', 'Serv.Méd.Hospit..Análises e Diagnósticos'),
(522, 'RDOR3', 'Serv.Méd.Hospit..Análises e Diagnósticos'),
(523, 'PORT3', 'Serviços de Apoio e Armazenagem'),
(524, 'PSVM11', 'Serviços de Apoio e Armazenagem'),
(525, 'STBP3', 'Serviços de Apoio e Armazenagem'),
(526, 'ALPK3', 'Serviços Diversos'),
(527, 'ATMP3', 'Serviços Diversos'),
(528, 'BBML3', 'Serviços Diversos'),
(529, 'DTCY3', 'Serviços Diversos'),
(530, 'DTCY4', 'Serviços Diversos'),
(531, 'FLEX3', 'Serviços Diversos'),
(532, 'GGPS3', 'Serviços Diversos'),
(533, 'PRNR3', 'Serviços Diversos'),
(534, 'SEQL3', 'Serviços Diversos'),
(535, 'VLID11', 'Serviços Diversos'),
(536, 'VLID3', 'Serviços Diversos'),
(537, 'ANIM3', 'Serviços Educacionais'),
(538, 'BAHI3', 'Serviços Educacionais'),
(539, 'COGN3', 'Serviços Educacionais'),
(540, 'CSED3', 'Serviços Educacionais'),
(541, 'SEDU3', 'Serviços Educacionais'),
(542, 'SEER3', 'Serviços Educacionais'),
(543, 'YDUQ3', 'Serviços Educacionais'),
(544, 'B3SA3', 'Serviços Financeiros Diversos'),
(545, 'BOAS3', 'Serviços Financeiros Diversos'),
(546, 'CIEL3', 'Serviços Financeiros Diversos'),
(547, 'CLSA3', 'Serviços Financeiros Diversos'),
(548, 'CSUD3', 'Serviços Financeiros Diversos'),
(549, 'GETT11', 'Serviços Financeiros Diversos'),
(550, 'GETT3', 'Serviços Financeiros Diversos'),
(551, 'GETT4', 'Serviços Financeiros Diversos'),
(552, 'CSNA3', 'Siderurgia'),
(553, 'FESA3', 'Siderurgia'),
(554, 'FESA4', 'Siderurgia'),
(555, 'GGBR3', 'Siderurgia'),
(556, 'GGBR4', 'Siderurgia'),
(557, 'GOAU3', 'Siderurgia'),
(558, 'GOAU4', 'Siderurgia'),
(559, 'USIM3', 'Siderurgia'),
(560, 'USIM5', 'Siderurgia'),
(561, 'USIM6', 'Siderurgia'),
(562, 'CRIV3', 'Soc. Crédito e Financiamento'),
(563, 'CRIV4', 'Soc. Crédito e Financiamento'),
(564, 'FNCN3', 'Soc. Crédito e Financiamento'),
(565, 'MERC3', 'Soc. Crédito e Financiamento'),
(566, 'MERC4', 'Soc. Crédito e Financiamento'),
(567, 'AMAR11', 'Tecidos. Vestuário e Calçados'),
(568, 'AMAR3', 'Tecidos. Vestuário e Calçados'),
(569, 'ARZZ3', 'Tecidos. Vestuário e Calçados'),
(570, 'CEAB3', 'Tecidos. Vestuário e Calçados'),
(571, 'CGRA3', 'Tecidos. Vestuário e Calçados'),
(572, 'CGRA4', 'Tecidos. Vestuário e Calçados'),
(573, 'GUAR3', 'Tecidos. Vestuário e Calçados'),
(574, 'LLIS3', 'Tecidos. Vestuário e Calçados'),
(575, 'LREN3', 'Tecidos. Vestuário e Calçados'),
(576, 'SOMA3', 'Tecidos. Vestuário e Calçados'),
(577, 'BRIT3', 'Telecomunicações'),
(578, 'DESK3', 'Telecomunicações'),
(579, 'FIQE3', 'Telecomunicações'),
(580, 'OIBR3', 'Telecomunicações'),
(581, 'OIBR4', 'Telecomunicações'),
(582, 'TELB3', 'Telecomunicações'),
(583, 'TELB4', 'Telecomunicações'),
(584, 'TIMS3', 'Telecomunicações'),
(585, 'VIVT3', 'Telecomunicações'),
(586, 'AZUL4', 'Transporte Aéreo'),
(587, 'GOLL11', 'Transporte Aéreo'),
(588, 'GOLL12', 'Transporte Aéreo'),
(589, 'GOLL2', 'Transporte Aéreo'),
(590, 'GOLL3', 'Transporte Aéreo'),
(591, 'GOLL4', 'Transporte Aéreo'),
(592, 'RAIL3', 'Transporte Ferroviário'),
(593, 'RLOG3', 'Transporte Ferroviário'),
(594, 'VSPT3', 'Transporte Ferroviário'),
(595, 'VSPT4', 'Transporte Ferroviário'),
(596, 'HBSA3', 'Transporte Hidroviário'),
(597, 'LOGN3', 'Transporte Hidroviário'),
(598, 'LUXM3', 'Transporte Hidroviário'),
(599, 'LUXM4', 'Transporte Hidroviário'),
(600, 'JSLG3', 'Transporte Rodoviário'),
(601, 'TGMA3', 'Transporte Rodoviário'),
(602, 'HETA3', 'Utensílios Domésticos'),
(603, 'HETA4', 'Utensílios Domésticos'),
(604, 'NAFG3', 'Utensílios Domésticos'),
(605, 'NAFG4', 'Utensílios Domésticos'),
(606, 'HGTX3', 'Vestuário'),
(607, 'TFCO4', 'Vestuário'),
(608, 'CVCB3', 'Viagens e Turismo'),
(609, 'AMBP3', 'Água e Saneamento'),
(610, 'CASN3', 'Água e Saneamento'),
(611, 'CASN4', 'Água e Saneamento'),
(612, 'CSMG3', 'Água e Saneamento'),
(613, 'IGSN3', 'Água e Saneamento'),
(614, 'ORVR3', 'Água e Saneamento'),
(615, 'SAPR11', 'Água e Saneamento'),
(616, 'SAPR3', 'Água e Saneamento'),
(617, 'SAPR4', 'Água e Saneamento'),
(618, 'SBSP3', 'Água e Saneamento');

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
(2, 3, '802263', '2022-11-14'),
(3, 3, '204666', '2022-11-16'),
(4, 3, '907559', '2022-11-16'),
(5, 3, '759152', '2022-11-16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `emailSec` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `id_token` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `tipo`, `nome`, `emailSec`, `email`, `senha`, `id_token`) VALUES
(1, 1, '', 'teste', 'a@a.com', '1234', 1),
(3, 2, '', 'analista', 'analista@teste.com', '123', 0),
(4, 1, '', 'teste', 'teste@teste.com', 'teste', 2),
(5, 1, 'giovani', 'h@h.com', 'g@g.com', '123', 3),
(6, 1, 'teste de campos', 'g@ggg.com', 'teste@123.com', 'teste', 4),
(7, 1, 'teste FInal', 'teste2@final2.com', 'teste@final.com', 'teste', 5);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
