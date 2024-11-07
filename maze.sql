-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 07-Nov-2024 às 10:58
-- Versão do servidor: 8.3.0
-- versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `maze`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `batas`
--

DROP TABLE IF EXISTS `batas`;
CREATE TABLE IF NOT EXISTS `batas` (
  `id_bata` int NOT NULL AUTO_INCREMENT,
  `id_utilizador` int NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `n_colaborador` int NOT NULL,
  `centro_custos` int NOT NULL,
  `departamento` int NOT NULL,
  `tamanho` varchar(10) NOT NULL,
  `cor` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `quantidade` int NOT NULL,
  `estado` int NOT NULL,
  `data` date NOT NULL,
  `admissao` int NOT NULL,
  PRIMARY KEY (`id_bata`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `batas`
--

INSERT INTO `batas` (`id_bata`, `id_utilizador`, `nome`, `n_colaborador`, `centro_custos`, `departamento`, `tamanho`, `cor`, `quantidade`, `estado`, `data`, `admissao`) VALUES
(1, 0, 'teste', 123, 321, 2, 'xxl', 'azulescuro', 3, 3, '0000-00-00', 0),
(2, 1, 'Valter Correia Vasconcelos', 3772667, 57070, 5, 'm', 'cinzento', 2, 2, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `botas`
--

DROP TABLE IF EXISTS `botas`;
CREATE TABLE IF NOT EXISTS `botas` (
  `id_bota` int NOT NULL AUTO_INCREMENT,
  `id_utilizador` int NOT NULL,
  `n_colaborador` int NOT NULL,
  `nome` varchar(50) NOT NULL,
  `centro_custos` int NOT NULL,
  `departamento` int NOT NULL,
  `tamanho` int NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `estado` int NOT NULL,
  `data` date NOT NULL,
  `admissao` int NOT NULL,
  PRIMARY KEY (`id_bota`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `botas`
--

INSERT INTO `botas` (`id_bota`, `id_utilizador`, `n_colaborador`, `nome`, `centro_custos`, `departamento`, `tamanho`, `tipo`, `estado`, `data`, `admissao`) VALUES
(1, 1, 1234567, 'Paulinha', 57070, 2, 39, 'Sandália', 2, '2024-10-18', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE IF NOT EXISTS `departamentos` (
  `id_departamento` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_departamento`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `departamentos`
--

INSERT INTO `departamentos` (`id_departamento`, `nome`) VALUES
(2, 'MOE1'),
(3, 'MOE2'),
(5, 'MOE4'),
(6, 'MFE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `linhas`
--

DROP TABLE IF EXISTS `linhas`;
CREATE TABLE IF NOT EXISTS `linhas` (
  `id_linha` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `centro_custos` int NOT NULL,
  `internal_order` bigint NOT NULL,
  PRIMARY KEY (`id_linha`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `linhas`
--

INSERT INTO `linhas` (`id_linha`, `nome`, `centro_custos`, `internal_order`) VALUES
(1, 'FA-L35', 57023, 57002003303),
(2, 'FA-L72', 57067, 57002005580),
(3, 'THT-2', 57023, 57002003312);

-- --------------------------------------------------------

--
-- Estrutura da tabela `materiais`
--

DROP TABLE IF EXISTS `materiais`;
CREATE TABLE IF NOT EXISTS `materiais` (
  `id_material` int NOT NULL AUTO_INCREMENT,
  `part_number` varchar(30) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `localizacao` varchar(30) NOT NULL,
  PRIMARY KEY (`id_material`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `materiais`
--

INSERT INTO `materiais` (`id_material`, `part_number`, `descricao`, `localizacao`) VALUES
(1, 'F.01U.353.202', 'Retentores', 'R2E4P3'),
(5, 'F.01U.303.404', 'Motores', 'R1P2E3'),
(6, 'F.01U.123.456', 'Lampada', 'A7G4F5');

-- --------------------------------------------------------

--
-- Estrutura da tabela `material_linha`
--

DROP TABLE IF EXISTS `material_linha`;
CREATE TABLE IF NOT EXISTS `material_linha` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_material` int NOT NULL,
  `id_linha` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `material_linha`
--

INSERT INTO `material_linha` (`id`, `id_material`, `id_linha`) VALUES
(29, 6, 2),
(27, 5, 3),
(26, 1, 1),
(28, 6, 3),
(32, 5, 13),
(33, 13, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notas`
--

DROP TABLE IF EXISTS `notas`;
CREATE TABLE IF NOT EXISTS `notas` (
  `id_nota` int NOT NULL AUTO_INCREMENT,
  `id_pedido` int NOT NULL,
  `id_utilizador` int NOT NULL,
  `nota` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id_nota`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `notas`
--

INSERT INTO `notas` (`id_nota`, `id_pedido`, `id_utilizador`, `nota`, `data`) VALUES
(45, 20, 1, 'so ha 2 em stock', '2024-10-16'),
(44, 20, 1, 'testeste', '2024-10-16'),
(43, 19, 1, 'querias', '2024-10-10'),
(42, 19, 1, 'para ontem', '2024-10-10'),
(41, 16, 1, 'testar123123123', '2024-10-08'),
(39, 2, 1, 'teste2', '2024-10-08'),
(38, 2, 1, 'Teste', '2024-10-08'),
(40, 2, 1, 'testar2', '2024-10-08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id_pedido` int NOT NULL AUTO_INCREMENT,
  `id_utilizador` int NOT NULL,
  `id_linha` int NOT NULL,
  `data` date NOT NULL,
  `lista` json NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_utilizador`, `id_linha`, `data`, `lista`, `estado`) VALUES
(9, 1, 1, '2024-09-26', '{\"0\": {\"id\": \"1\", \"qty\": \"2\"}, \"1\": {\"id\": \"5\", \"qty\": \"2\"}}', 2),
(2, 1, 2, '2024-09-25', '{\"0\": {\"id\": \"1\", \"qty\": \"5\"}, \"1\": {\"id\": \"5\", \"qty\": \"2\"}}', 3),
(3, 1, 2, '2024-09-25', '{\"0\": {\"id\": \"1\", \"qty\": \"3\"}, \"1\": {\"id\": \"6\", \"qty\": \"4\"}}', 3),
(6, 1, 3, '2024-09-25', '{\"0\": {\"id\": \"1\", \"qty\": \"2\"}, \"1\": {\"id\": \"5\", \"qty\": \"2\"}}', 2),
(10, 1, 2, '2024-09-30', '{\"0\": {\"id\": \"1\", \"qty\": \"3\"}, \"1\": {\"id\": \"5\", \"qty\": \"12\"}}', 2),
(12, 1, 3, '2024-10-04', '{\"0\": {\"id\": \"5\", \"qty\": \"3\"}}', 1),
(13, 1, 2, '2024-10-04', '{\"0\": {\"id\": \"5\", \"qty\": \"1\"}, \"1\": {\"id\": \"1\", \"qty\": \"3\"}}', 1),
(14, 1, 1, '2024-10-04', '{\"0\": {\"id\": \"1\", \"qty\": \"123\"}}', 1),
(19, 1, 13, '2024-10-10', '{\"0\": {\"id\": \"13\", \"qty\": \"10\"}}', 2),
(16, 1, 1, '2024-10-04', '{\"0\": {\"id\": \"1\", \"qty\": \"2\"}}', 2),
(17, 1, 1, '2024-10-04', '{\"0\": {\"id\": \"1\", \"qty\": \"123\"}}', 1),
(18, 1, 2, '2024-10-04', '{\"0\": {\"id\": \"5\", \"qty\": \"2\"}}', 1),
(20, 1, 1, '2024-10-16', '{\"0\": {\"id\": \"1\", \"qty\": \"4\"}}', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

DROP TABLE IF EXISTS `utilizadores`;
CREATE TABLE IF NOT EXISTS `utilizadores` (
  `id_utilizador` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `cat` int NOT NULL,
  `win_user` varchar(10) NOT NULL,
  `n_colaborador` int NOT NULL,
  `email` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_utilizador`),
  UNIQUE KEY `n colaborador` (`n_colaborador`) USING BTREE,
  UNIQUE KEY `win_user` (`win_user`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id_utilizador`, `nome`, `cat`, `win_user`, `n_colaborador`, `email`) VALUES
(1, 'Bruno Onofre', 3, 'ONB1OVR', 34942457, 'bruno.onofre@pt.bosch.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
