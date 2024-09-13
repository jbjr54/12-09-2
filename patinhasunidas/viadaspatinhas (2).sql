-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/09/2024 às 15:52
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `viadaspatinhas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_adocao`
--

CREATE TABLE `tb_adocao` (
  `ID` int(10) NOT NULL,
  `FOTO_ADOCAO` varchar(50) NOT NULL,
  `NOME` varchar(30) NOT NULL,
  `ESPECIE` varchar(30) NOT NULL,
  `RACA` varchar(30) NOT NULL,
  `SEXO` varchar(20) NOT NULL,
  `DTA_NASC` date NOT NULL,
  `CARACT` varchar(500) NOT NULL,
  `SAUDE` varchar(500) NOT NULL,
  `TUTOR_EMAIL` varchar(40) NOT NULL,
  `TUTOR_CELL` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_adocao`
--

INSERT INTO `tb_adocao` (`ID`, `FOTO_ADOCAO`, `NOME`, `ESPECIE`, `RACA`, `SEXO`, `DTA_NASC`, `CARACT`, `SAUDE`, `TUTOR_EMAIL`, `TUTOR_CELL`) VALUES
(8, 'lulinha.jpg', 'eatgdzj', 'zdzdjdzt', 'zdftjzdxftj', 'MACHO', '2024-03-19', 'zdjdzj', 'zdtjtdfj', 'gzsdh@dh.com', 13224355),
(10, 'Oww6_2tS_400x400.jpg', 'ZUBU', 'Macaco', '-', 'MACHO', '2011-06-24', 'Preto com pelo branco', 'bom', 'tutordozubu@gmail.com', 12345678),
(11, 'magna.jpg', 'Magna', 'Gato', 'Vira-Lata', 'FEMEA', '2024-09-10', 'chhdhd', 'sdgzdh', 'jbarbosajr16@gmail.com', 12345678),
(12, 'dilma.jpg', 'rherh', 'ztjrtj', 'zstjztj', 'FEMEA', '2024-09-05', 'sxftkmrfxkm', 'ztjrftkmfkm', 'jbarbosajr16@gmail.com', 12345678),
(13, 'Oww6_2tS_400x400.jpg', 'rherh', 'ztjrtj', 'zstjztj', 'FEMEA', '2004-08-24', 'sxftkmrfxkm', 'ztjrftkmfkm', 'jbarbosajr16@gmail.com', 12345678);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_encontre`
--

CREATE TABLE `tb_encontre` (
  `ID` int(10) NOT NULL,
  `FOTO_ENCONT` varchar(50) NOT NULL,
  `NOME` varchar(30) NOT NULL,
  `ESPECIE` varchar(30) NOT NULL,
  `RACA` varchar(30) NOT NULL,
  `SEXO` varchar(20) NOT NULL,
  `DTA_NASC` date NOT NULL,
  `CARACT` varchar(500) NOT NULL,
  `SAUDE` varchar(500) NOT NULL,
  `DESAP` varchar(500) NOT NULL,
  `TUTOR_EMAIL` varchar(40) NOT NULL,
  `TUTOR_CELL` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_encontre`
--

INSERT INTO `tb_encontre` (`ID`, `FOTO_ENCONT`, `NOME`, `ESPECIE`, `RACA`, `SEXO`, `DTA_NASC`, `CARACT`, `SAUDE`, `DESAP`, `TUTOR_EMAIL`, `TUTOR_CELL`) VALUES
(1, 'OIP (2).jpg', 'SRHXFJ', 'FGHXFJ', 'XFJXF', 'MACHO', '2024-09-19', 'XFYKXYFKX', 'ZDJTJZ', '', 'aliso@gmail.com', 12345678),
(2, 'OIP.jpg', 'MOURA SANTOS', 'FGHXFJ', 'XFJXF', 'MACHO', '2024-09-19', 'XFYKXYFKX', 'ZDJTJZ', 'XFYKXKXF', 'moura@gmail.com', 12345678),
(4, 'th.jpg', 'SRHXFJ', 'FGHXFJ', 'XFJXF', 'MACHO', '2000-02-12', 's\rhsrhrdh', 'wegwsgh', '342134', 'aliso@gmail.com', 12345678);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_adocao`
--
ALTER TABLE `tb_adocao`
  ADD PRIMARY KEY (`ID`);

--
-- Índices de tabela `tb_encontre`
--
ALTER TABLE `tb_encontre`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_adocao`
--
ALTER TABLE `tb_adocao`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tb_encontre`
--
ALTER TABLE `tb_encontre`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
