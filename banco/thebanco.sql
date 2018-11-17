-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Nov-2018 às 21:35
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thebanco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialidade`
--

CREATE TABLE `especialidade` (
  `idesp` int(11) NOT NULL,
  `especialidade` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `especialidade`
--

INSERT INTO `especialidade` (`idesp`, `especialidade`, `status`, `data_cadastro`, `data_alteracao`) VALUES
(1, 'Clinico Geral', 'Ativo', '2018-11-16 19:29:01', '0000-00-00 00:00:00'),
(2, 'Geriatra', 'Ativo', '2018-11-16 19:29:07', '0000-00-00 00:00:00'),
(3, 'Pediatra', 'Ativo', '2018-11-16 19:29:14', '0000-00-00 00:00:00'),
(4, 'Ortopedista', 'Ativo', '2018-11-16 19:29:20', '0000-00-00 00:00:00'),
(5, 'Oncologista', 'Ativo', '2018-11-16 19:29:26', '0000-00-00 00:00:00'),
(6, 'Cirurgião Geral', 'Ativo', '2018-11-16 19:29:33', '0000-00-00 00:00:00'),
(7, 'Gastrologista', 'Ativo', '2018-11-16 19:29:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cns` varchar(20) DEFAULT NULL,
  `nome_mae` varchar(100) DEFAULT NULL,
  `endereco` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id`, `nome`, `sexo`, `data_nascimento`, `cns`, `nome_mae`, `endereco`, `telefone`, `status`, `data_cadastro`, `data_alteracao`) VALUES
(4, 'Luan Francisco Guimarães Guedes', 'Masculino', '2018-11-15', '898003402802769', 'Lucélia Guimarães de Souza', 'Rua Grã-Bretanha', '4488261838', 'Ativo', '2018-11-16 18:25:38', '0000-00-00 00:00:00'),
(5, 'Luan Francisco Guimarães Guedes', 'Masculino', '2018-11-15', '898003402802769', 'Lucélia Guimarães de Souza', 'Rua Grã-Bretanha', '4488261838', 'Ativo', '2018-11-16 18:26:47', '0000-00-00 00:00:00'),
(6, 'Luan Francisco Guimarães Guedes', 'Masculino', '1999-12-22', '898003402802769', 'Lucélia Guimarães de Souza', 'Rua Grã-Bretanha, 21', '4488261838', 'Ativo', '2018-11-17 15:08:52', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `profissional`
--

CREATE TABLE `profissional` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cns` varchar(50) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `idespecialidade` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_alteracao` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `profissional`
--

INSERT INTO `profissional` (`id`, `nome`, `sexo`, `data_nascimento`, `cns`, `telefone`, `idespecialidade`, `status`, `data_cadastro`, `data_alteracao`) VALUES
(1, 'Luan Francisco Guimarães Guedes', 'Masculino', '2018-11-10', '898003402802769', '4488261838', 6, 'Ativo', '2018-11-16 19:44:08', '0000-00-00 00:00:00'),
(2, 'Luan Francisco Guimarães Guedes', 'Masculino', '1999-12-22', '898003402802769', '4488261838', 5, 'Ativo', '2018-11-17 15:14:48', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `especialidade`
--
ALTER TABLE `especialidade`
  ADD PRIMARY KEY (`idesp`);

--
-- Indexes for table `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profissional`
--
ALTER TABLE `profissional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idespecialidade` (`idespecialidade`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `especialidade`
--
ALTER TABLE `especialidade`
  MODIFY `idesp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profissional`
--
ALTER TABLE `profissional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `profissional`
--
ALTER TABLE `profissional`
  ADD CONSTRAINT `profissional_ibfk_1` FOREIGN KEY (`idespecialidade`) REFERENCES `especialidade` (`idesp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
