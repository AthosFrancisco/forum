-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Jul-2018 às 17:26
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pergunta`
--

CREATE TABLE `pergunta` (
  `id` int(10) NOT NULL,
  `id_autor` int(10) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `corpo` text NOT NULL,
  `data_postagem` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `resposta`
--

CREATE TABLE `resposta` (
  `id` int(10) NOT NULL,
  `id_autor` int(10) NOT NULL,
  `id_pergunta` int(10) NOT NULL,
  `corpo` text NOT NULL,
  `data_postagem` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `tipo` enum('Comum','Moderador','Administrador') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `tipo`) VALUES
(1, 'teste', 'teste@gmail.com', '202cb962ac59075b964b07152d234b70', 'Comum'),
(2, 'Athos', 'athos@gmail.com', '1d7f7abc18fcb43975065399b0d1e48e', 'Comum'),
(3, 'Rubens', 'rubens@gmail.com', '1d7f7abc18fcb43975065399b0d1e48e', 'Comum'),
(4, 'Pedro', 'pedro@gmail.com', '1c9ac0159c94d8d0cbedc973445af2da', 'Comum'),
(5, 'Roi', 'roi@gmail.com', '1c9ac0159c94d8d0cbedc973445af2da', 'Comum'),
(6, 'Gabriel', 'gabriel@hotmail.com', '1c9ac0159c94d8d0cbedc973445af2da', 'Comum'),
(7, 'Rui', 'rui@hotmail.com', '8e329668b8d41a8d535fe04d328cce0e', 'Comum'),
(8, 'Rainaia', 'rainaia@gmail.com', '502e4a16930e414107ee22b6198c578f', 'Comum'),
(9, 'Roi', 'roi@gmail.com', 'c52f1bd66cc19d05628bd8bf27af3ad6', 'Comum'),
(10, 'rr', 'rr@gmail.com', '68053af2923e00204c3ca7c6a3150cf7', 'Comum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pergunta`
--
ALTER TABLE `pergunta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_autor` (`id_autor`);

--
-- Indexes for table `resposta`
--
ALTER TABLE `resposta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_autor` (`id_autor`),
  ADD KEY `id_pergunta` (`id_pergunta`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pergunta`
--
ALTER TABLE `pergunta`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resposta`
--
ALTER TABLE `resposta`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pergunta`
--
ALTER TABLE `pergunta`
  ADD CONSTRAINT `pergunta_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `resposta`
--
ALTER TABLE `resposta`
  ADD CONSTRAINT `resposta_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `resposta_ibfk_2` FOREIGN KEY (`id_pergunta`) REFERENCES `pergunta` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
