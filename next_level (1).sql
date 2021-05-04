-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 12:40 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `next_level`
--

-- --------------------------------------------------------

--
-- Table structure for table `conteudo`
--

CREATE TABLE `conteudo` (
  `id_conteudo` int(11) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `data` datetime NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conteudo`
--

INSERT INTO `conteudo` (`id_conteudo`, `imagem`, `titulo`, `descricao`, `data`, `url`) VALUES
(24, 'logo.jpg', 'Lucão carregando na ranked', 'Lucão carregando na ranked', '2021-05-01 00:00:00', 'GIghVuXG00Y'),
(25, 'logo0.jpg', 'AAA', 'aAA', '2021-05-01 00:00:00', 'vNTR4P_NSRM'),
(26, 'Capturar.JPG', 'Live 24h', 'Musiquinha CHILL', '2021-05-01 12:00:00', '21qNxnCS8WU');

-- --------------------------------------------------------

--
-- Table structure for table `conteudoaluno`
--

CREATE TABLE `conteudoaluno` (
  `id` int(11) NOT NULL,
  `id_conteudo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `dtcadastro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conteudoaluno`
--

INSERT INTO `conteudoaluno` (`id`, `id_conteudo`, `id_usuario`, `dtcadastro`) VALUES
(14, 24, 1, '2021-05-01 12:02:54'),
(15, 25, 5, '2021-05-01 12:19:02'),
(16, 25, 1, '2021-05-01 12:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `perfil` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `perfil`) VALUES
(1, 'Aluno'),
(2, 'Professor'),
(3, 'Admin'),
(4, 'Tester');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `dt_nasc` date NOT NULL,
  `estado` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `perfil` int(11) NOT NULL,
  `genero` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `telefone`, `dt_nasc`, `estado`, `cidade`, `perfil`, `genero`, `email`, `senha`, `data_cadastro`) VALUES
(1, 'Lucas Eduardo Ionashiro Giannone', '(15) 99121-8008', '2001-06-23', 'São Paulo', 'Sorocaba', 4, 'Masculino', 'lucas@nlevel.com', '927270911025b459e8ff33f89ae07242', '2021-04-16 20:12:18'),
(2, 'Victor da Silva Cano', '(15) 98819-4946', '1111-01-01', 'São Paulo', 'Sorocaba', 1, 'Masculino', 'vitordasilvacano@outlook.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-04-19 17:19:55'),
(5, 'Luiz Renan', '(15) 98816-6433', '1991-08-19', 'São Paulo', 'Sorocaba', 4, 'Masculino', 'luiz.renandeassis@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-04-20 20:17:15'),
(6, 'Gustavo', '(15) 98133-9873', '2001-01-07', 'São Paulo', 'Sorocaba', 1, 'Masculino', 'guutavares2013@gmail.com', '2f37dc6f963086e81a27c095634e37a2', '2021-04-20 20:53:36'),
(7, 'Spritenator', '(51) 96382-931', '1111-01-01', 'Rio Grande do Sul', 'Jacuizinho', 1, 'Masculino', 'spritenator@nlevel.com', '41512188dcd13fb087845190528f0a69', '2021-04-20 23:05:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conteudo`
--
ALTER TABLE `conteudo`
  ADD PRIMARY KEY (`id_conteudo`);

--
-- Indexes for table `conteudoaluno`
--
ALTER TABLE `conteudoaluno`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conteudo`
--
ALTER TABLE `conteudo`
  MODIFY `id_conteudo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `conteudoaluno`
--
ALTER TABLE `conteudoaluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
