-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 01:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujc_teatro`
--

-- --------------------------------------------------------

--
-- Table structure for table `bilhete`
--

CREATE TABLE `bilhete` (
  `codigo` int(11) NOT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `data_compra` datetime DEFAULT NULL,
  `tipo_bilhete` varchar(50) DEFAULT NULL,
  `quantidade` int(11) NOT NULL,
  `espectador_id` int(11) DEFAULT NULL,
  `evento_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bilhete`
--

INSERT INTO `bilhete` (`codigo`, `estado`, `data_compra`, `tipo_bilhete`, `quantidade`, `espectador_id`, `evento_id`) VALUES
(1, 'pago', '2022-11-02 14:03:41', 'normal', 2, 14, 3),
(2, 'pago', '2022-11-02 14:03:41', 'normal', 2, 14, 2),
(3, 'pago', '2022-11-02 14:03:41', 'normal', 2, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `espectador`
--

CREATE TABLE `espectador` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `telefone` varchar(100) DEFAULT NULL,
  `espectador_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `evento`
--

CREATE TABLE `evento` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fim` time DEFAULT NULL,
  `data_evento` date DEFAULT NULL,
  `numero_bilhete` int(100) DEFAULT NULL,
  `local_evento` varchar(200) DEFAULT NULL,
  `promotor` varchar(200) DEFAULT NULL,
  `cartaz` varchar(100) DEFAULT NULL,
  `valor_evento` double DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evento`
--

INSERT INTO `evento` (`codigo`, `nome`, `hora_inicio`, `hora_fim`, `data_evento`, `numero_bilhete`, `local_evento`, `promotor`, `cartaz`, `valor_evento`, `admin_id`) VALUES
(1, 'Os Resistentes da Towen', '18:30:18', '20:00:18', '2022-11-18', 100, 'Cine teatro Gungu, Maputo, Mozambique', 'Gilberto Mendes', NULL, 350, 1),
(2, 'O Profeta', '18:30:18', '20:00:18', '2022-11-18', 100, 'Cine teatro Gungu, Maputo, Mozambique', 'Gilberto Mendes', NULL, 350, 1),
(3, 'Mulheres de fibra', '18:30:18', '20:00:18', '2022-11-18', 100, 'Cine teatro Gungu, Maputo, Mozambique', 'Gilberto Mendes', NULL, 350, 1);

-- --------------------------------------------------------

--
-- Table structure for table `utilizador`
--

CREATE TABLE `utilizador` (
  `codigo` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `perfil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilizador`
--

INSERT INTO `utilizador` (`codigo`, `email`, `senha`, `perfil`) VALUES
(1, 'emuculo25@gmail.com', 'elio1234', 'admin'),
(14, 'emuculo00@gmail.com', '$2a$10$i.Yq..8IdOwUqzL0c0YQ2OaB8SGt2P4uCDq2ANAobS7aa4NFF1Jcu', 'espectador');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bilhete`
--
ALTER TABLE `bilhete`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `evento_id` (`evento_id`),
  ADD KEY `bilhete_ibfk_2` (`espectador_id`);

--
-- Indexes for table `espectador`
--
ALTER TABLE `espectador`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `espectador_id` (`espectador_id`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bilhete`
--
ALTER TABLE `bilhete`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `espectador`
--
ALTER TABLE `espectador`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bilhete`
--
ALTER TABLE `bilhete`
  ADD CONSTRAINT `bilhete_ibfk_1` FOREIGN KEY (`evento_id`) REFERENCES `evento` (`codigo`),
  ADD CONSTRAINT `bilhete_ibfk_2` FOREIGN KEY (`espectador_id`) REFERENCES `utilizador` (`codigo`);

--
-- Constraints for table `espectador`
--
ALTER TABLE `espectador`
  ADD CONSTRAINT `espectador_ibfk_1` FOREIGN KEY (`espectador_id`) REFERENCES `utilizador` (`codigo`);

--
-- Constraints for table `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `utilizador` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
