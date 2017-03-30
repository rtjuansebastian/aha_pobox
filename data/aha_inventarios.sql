-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2017 at 01:29 PM
-- Server version: 10.0.29-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aha_inventarios`
--

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nit` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `razon_social` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `extension` varchar(4) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `contacto` varchar(12) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `rol` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`id`, `nit`, `razon_social`, `telefono`, `extension`, `contacto`, `direccion`, `rol`) VALUES
(1, '9003355297', 'Centro Internacional de Entrenamiento S.A ', ' (2)372826', '155', '1', 'Calle 18 # 122- Casa 3 Cali', 2),
(2, '8600703011', 'Cruz Roja Colombiana Seccional Cundinamarca y Bogotá', '7460909', '623', '2', 'Carrera 68 # 68B -', 2),
(3, '8300988781', 'Fundación Colombiana del Corazón', '5230012', '', '3', 'Calle 127 # 16 A 76 Of 502', 2),
(4, '9002506228', 'Fundación Reanimación', '', '', '4', 'Calle 22 B # 1 - 29 Los Cisnes Pie de Cuesta, Santander', 2),
(5, '8050184897', 'Fundación Salmamandra', '(2)3728266', '155', '1', 'Calle 18 # 122- Casa 3 Cali ', 2),
(6, '8600518534', 'Fundación Universitaria de Ciencias de la Salud - FUCS', '3538100', '3535', '5', 'Calle 10 # 18 - 75', 2),
(7, '8600383744', 'Fundación Universitaria Juan N Corpas', '6622222', '411', '6', 'Carrera 111 # 159 A - 61', 2),
(8, '8600073861', 'Universidad de los Andes - Centro de Simulación ', '3394949', '3803', '7', 'Carrera 7 # 116 05 Piso 3 ', 2),
(9, '8600073861', 'Universidad de los Andes - Librería', '3394949', '3617', '8', 'CRA 1 No 19 - 27  Ed, Aulas ', 2),
(10, '8600077593', 'Universidad del Rosario', '2970200', '3172', '9', 'Carrera 7 No. 12B-41 piso 7', 2),
(11, '8000921985', 'Universidad Mariana ', '(2)7314923', '', '10', 'Calle 18 # 34 - 104 Pasto', 2),
(12, '8000034651', 'Virrey Solis IPS S.A', '', '', '11', 'Carrera 67 # 4G 68 ', 2),
(13, '9000000000', 'P.O Box Internacional Ltda', '7427942', '101', '1121890219', 'CR 62 No.103-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `empresas_roles`
--

CREATE TABLE `empresas_roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `empresas_roles`
--

INSERT INTO `empresas_roles` (`id`, `rol`) VALUES
(1, 'Proveedor'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Table structure for table `inventarios`
--

CREATE TABLE `inventarios` (
  `id` int(11) NOT NULL,
  `empresa` int(11) NOT NULL,
  `producto` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `ingreso_salida` char(1) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `inventarios`
--

INSERT INTO `inventarios` (`id`, `empresa`, `producto`, `cantidad`, `fecha`, `ingreso_salida`) VALUES
(1, 1, '15-2300', 10, '2017-02-24', 'I'),
(2, 1, '15-2300', 8, '2017-02-25', 'S'),
(3, 2, '15-2301', 5, '2017-02-24', 'I'),
(4, 2, '15-2301', 5, '2017-02-25', 'I'),
(5, 1, '15-2301', 20, '2017-02-25', 'I'),
(6, 1, '15-2300', 16, '2017-02-27', 'I'),
(7, 1, '15-2301', 40, '2017-02-27', 'I'),
(8, 1, '15-2301', 4, '2017-02-27', 'S'),
(9, 1, '15-2301', 46, '2017-02-27', 'S'),
(10, 1, '15-2300', 17, '2017-02-28', 'S'),
(11, 1, '15-2301', 6, '2017-02-27', 'S'),
(12, 1, '15-2308', 4, '2017-03-24', 'I'),
(13, 1, '90-2303US', 7, '2017-03-24', 'I'),
(14, 13, '15-2300', 20, '2017-03-30', 'I'),
(15, 13, '15-2301', 20, '2017-03-30', 'I'),
(16, 13, '15-2307', 20, '2017-03-30', 'I'),
(17, 13, '15-2308', 20, '2017-03-30', 'I'),
(18, 13, '15-2314', 20, '2017-03-30', 'I'),
(19, 13, '15-2315', 20, '2017-03-30', 'I'),
(20, 13, '90-1075', 20, '2017-03-30', 'I'),
(21, 13, '15-2300', 10, '2017-03-31', 'S'),
(22, 13, '15-2307', 12, '2017-03-31', 'S'),
(23, 13, '15-2308', 20, '2017-03-31', 'S'),
(24, 13, '15-2314', 5, '2017-03-31', 'S'),
(25, 13, '15-2315', 18, '2017-03-31', 'S'),
(26, 13, '90-1075', 9, '2017-03-31', 'S'),
(27, 13, '15-2300', 30, '2017-03-30', 'I'),
(28, 13, '15-2301', 25, '2017-03-30', 'I'),
(29, 13, '15-2307', 17, '2017-03-30', 'I'),
(30, 13, '15-2308', 29, '2017-03-30', 'I'),
(31, 13, '15-2314', 46, '2017-03-30', 'I'),
(32, 13, '15-2315', 80, '2017-03-30', 'I'),
(33, 13, '15-2300', 25, '2017-02-23', 'S'),
(34, 13, '15-2301', 38, '2017-02-23', 'S'),
(35, 13, '15-2307', 24, '2017-02-23', 'S'),
(36, 13, '15-2308', 10, '2017-02-23', 'S'),
(37, 13, '15-2314', 43, '2017-02-23', 'S'),
(38, 13, '15-2315', 78, '2017-02-23', 'S'),
(39, 13, '90-1075', 9, '2017-02-23', 'S'),
(40, 1, '90-2322US', 50, '2017-03-30', 'I'),
(41, 1, '15-2300', 1, '2017-03-30', 'I'),
(42, 1, '15-2314', 1, '2017-03-30', 'I'),
(43, 1, '15-2301', 11, '2017-03-30', 'I'),
(44, 1, '15-2315', 14, '2017-03-30', 'I'),
(45, 1, '15-2301', 4, '2017-03-30', 'I'),
(46, 1, '15-2307', 6, '2017-03-30', 'I'),
(47, 7, '15-2300', 10, '2017-03-30', 'I'),
(48, 7, '90-2322US', 8, '2017-03-30', 'I'),
(49, 10, '15-2300', 1, '2017-03-30', 'I'),
(50, 10, '15-2301', 1, '2017-03-30', 'I'),
(51, 13, '15-2300', 15, '2017-03-30', 'I'),
(52, 13, '15-2301', 58, '2017-03-30', 'I'),
(53, 13, '15-2314', 45, '2017-03-30', 'I'),
(54, 13, '90-1075', 35, '2017-03-30', 'I'),
(55, 13, '90-2303US', 26, '2017-03-30', 'I'),
(56, 13, '90-2307US', 33, '2017-03-30', 'I'),
(57, 13, '15-2300', 25, '2017-01-28', 'S'),
(58, 13, '15-2301', 63, '2017-01-28', 'S'),
(59, 13, '15-2307', 1, '2017-01-28', 'S'),
(60, 13, '15-2308', 16, '2017-01-28', 'S'),
(61, 13, '15-2314', 8, '2017-01-28', 'S'),
(62, 13, '15-2315', 4, '2017-01-28', 'S'),
(63, 13, '90-1075', 25, '2017-01-28', 'S'),
(64, 13, '90-2303US', 20, '2017-01-28', 'S'),
(65, 13, '90-2307US', 30, '2017-01-28', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `numero_pedido` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `empresa` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`numero_pedido`, `fecha`, `empresa`, `estado`) VALUES
(1, '2017-02-24', 1, 3),
(2, '2017-02-26', 1, 3),
(3, '2017-02-26', 1, 3),
(4, '2017-02-26', 1, 3),
(5, '2017-02-28', 1, 3),
(6, '2017-02-28', 1, 3),
(7, '2017-03-01', 1, 3),
(9, '2017-03-24', 7, 3),
(10, '2017-03-27', 10, 3),
(11, '2017-03-30', 13, 3),
(12, '2017-02-16', 13, 3),
(13, '2017-01-13', 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pedidos_estados`
--

CREATE TABLE `pedidos_estados` (
  `id` int(11) NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `pedidos_estados`
--

INSERT INTO `pedidos_estados` (`id`, `estado`) VALUES
(1, 'solicitado'),
(2, 'confirmado'),
(3, 'entregado'),
(4, 'En proceso');

-- --------------------------------------------------------

--
-- Table structure for table `pedidos_productos`
--

CREATE TABLE `pedidos_productos` (
  `pedido` int(11) NOT NULL,
  `producto` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `pedidos_productos`
--

INSERT INTO `pedidos_productos` (`pedido`, `producto`, `cantidad`) VALUES
(1, '15-2300', 15),
(1, '15-2301', 40),
(2, '90-2322US', 50),
(3, '15-2300', 1),
(3, '15-2314', 1),
(4, '90-2325US', 30),
(5, '15-2308', 4),
(5, '90-2303US', 7),
(6, '15-2301', 11),
(6, '15-2315', 14),
(7, '15-2301', 4),
(7, '15-2307', 6),
(9, '15-2300', 10),
(9, '90-2322US', 8),
(10, '15-2300', 1),
(10, '15-2301', 1),
(11, '15-2300', 20),
(11, '15-2301', 20),
(11, '15-2307', 20),
(11, '15-2308', 20),
(11, '15-2314', 20),
(11, '15-2315', 20),
(11, '90-1075', 20),
(12, '15-2300', 30),
(12, '15-2301', 25),
(12, '15-2307', 17),
(12, '15-2308', 29),
(12, '15-2314', 46),
(12, '15-2315', 80),
(13, '15-2300', 15),
(13, '15-2301', 58),
(13, '15-2314', 45),
(13, '90-1075', 35),
(13, '90-2303US', 26),
(13, '90-2307US', 33);

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `referencia` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `titulo` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `version` varchar(250) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`referencia`, `titulo`, `version`) VALUES
('15-2300', 'Basic Life Support (BLS) Instructor Course Completion Card', '2015'),
('15-2301', 'Basic Life Support (BLS) Provider Course Completion Card (Spanish)', 'actualizada 2015 version 2015'),
('15-2307', 'eBook Edition: Basic Life Support (BLS) Provider Manual (Spanish)', ''),
('15-2308', 'Basic Life Support (BLS) Provider Manual (Spanish)', 'actualizada 2015-version 2015'),
('15-2314', 'Advanced Cardiovascular Life Support (ACLS) Course Completion Card (3-Card Sheet, Spanish)', 'version 2015'),
('15-2315', 'Advanced Cardiovascular Life Support (ACLS) Provider Manual -(Spanish)', 'actualizada Dic 2016-version 2015'),
('90-1075', 'ACLS For Experienced Providers (ACLS EP) Manual And Resource Text', ''),
('90-2303US', 'Basic Life Support (BLS) For Healthcare Providers Student Manual (Spanish)', 'version 2010'),
('90-2307US', 'Advanced Cardiovascular Life Support (ACLS) Provider Manual -(Spanish)', 'version 2010'),
('90-2313US ', 'Heartsaver First Aid CPR AED Student Workbook (Spanish)', ''),
('90-2319US  ', 'Advanced Cardiovascular Life Support (ACLS) Course Completion Card (3-Card Sheet, Spanish)', 'version 2010'),
('90-2321US', 'Basic Life Support (BLS) For Healthcare Providers Course Completion Card (3-Card Sheet, Spanish)', 'version 2010'),
('90-2322US', 'Heartsaver First Aid CPR AED Course Completion Card (3-Card Sheet, Spanish)', ''),
('90-2325US', 'Pediatric Advanced Life Support (PALS) Course Completion Card (3-Card Sheet, Spanish) (Spanish)', ''),
('90-2326US', 'Pediatric Advanced Life Support (PALS) Provider Manual-(Spanish)', '');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `cedula` varchar(12) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `celular` varchar(10) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`cedula`, `nombre`, `email`, `celular`, `password`, `empresa`) VALUES
('1', 'Felipe Quintero', 'felipe.quintero', '3128432384', '$2y$11$KhUAJ.8LCesSJXJVouuRsORGsTfKqryYMk.zBLPC19A2IMQL/31xS', 1),
('10', 'Lenny Johanna Torres', 'lenny.torres', NULL, '$2y$11$KhUAJ.8LCesSJXJVouuRsORGsTfKqryYMk.zBLPC19A2IMQL/31xS', 11),
('11', 'Juan Pablo Duran', 'juan.duran', '3125190588', '$2y$11$KhUAJ.8LCesSJXJVouuRsORGsTfKqryYMk.zBLPC19A2IMQL/31xS', 12),
('1121890219', 'Juan Sebastian Rodriguez Tovar', 'rtjuansebastian@gmail.com', '3197888886', '$2y$11$wMhTd5OaLl3GCJ.GQ4Tpge.HEwf4Bq7fMpVFLVMRmaZ52KLLcb8OS', 13),
('2', 'Adriana Ramírez', 'adriana.ramirez', NULL, '$2y$11$KhUAJ.8LCesSJXJVouuRsORGsTfKqryYMk.zBLPC19A2IMQL/31xS', 2),
('3', 'Julie Malagon', 'julie.malagon', '3214683676', '$2y$11$KhUAJ.8LCesSJXJVouuRsORGsTfKqryYMk.zBLPC19A2IMQL/31xS', 3),
('4', 'Yenny Ordonñez', 'Yenny.ordonñez', '3168745882', '$2y$11$KhUAJ.8LCesSJXJVouuRsORGsTfKqryYMk.zBLPC19A2IMQL/31xS', 4),
('5', 'Sandra Aguilera', 'sandra.aguilera', '3107861432', '$2y$11$KhUAJ.8LCesSJXJVouuRsORGsTfKqryYMk.zBLPC19A2IMQL/31xS', 6),
('6', 'Néstor Andrés Cháves', 'nestor.chaves', '3213648939', '$2y$11$KhUAJ.8LCesSJXJVouuRsORGsTfKqryYMk.zBLPC19A2IMQL/31xS', 7),
('7', 'Martha Solano', 'martha.solano', NULL, '$2y$11$KhUAJ.8LCesSJXJVouuRsORGsTfKqryYMk.zBLPC19A2IMQL/31xS', 8),
('8', 'Gina Morales', 'gina.morales', NULL, '$2y$11$KhUAJ.8LCesSJXJVouuRsORGsTfKqryYMk.zBLPC19A2IMQL/31xS', 9),
('9', 'Dayse Katiuska Gaona', 'dayse.gaona', '3115610773', '$2y$11$KhUAJ.8LCesSJXJVouuRsORGsTfKqryYMk.zBLPC19A2IMQL/31xS', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol` (`rol`),
  ADD KEY `contacto` (`contacto`);

--
-- Indexes for table `empresas_roles`
--
ALTER TABLE `empresas_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventarios`
--
ALTER TABLE `inventarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresa` (`empresa`),
  ADD KEY `producto` (`producto`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`numero_pedido`),
  ADD KEY `empresa` (`empresa`),
  ADD KEY `estado` (`estado`);

--
-- Indexes for table `pedidos_estados`
--
ALTER TABLE `pedidos_estados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  ADD PRIMARY KEY (`pedido`,`producto`),
  ADD KEY `producto` (`producto`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`referencia`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cedula`),
  ADD KEY `empresa` (`empresa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `empresas_roles`
--
ALTER TABLE `empresas_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `inventarios`
--
ALTER TABLE `inventarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `numero_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pedidos_estados`
--
ALTER TABLE `pedidos_estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `empresas_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `empresas_roles` (`id`),
  ADD CONSTRAINT `empresas_ibfk_2` FOREIGN KEY (`contacto`) REFERENCES `usuarios` (`cedula`);

--
-- Constraints for table `inventarios`
--
ALTER TABLE `inventarios`
  ADD CONSTRAINT `inventarios_ibfk_1` FOREIGN KEY (`empresa`) REFERENCES `empresas` (`id`),
  ADD CONSTRAINT `inventarios_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `productos` (`referencia`);

--
-- Constraints for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`empresa`) REFERENCES `empresas` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`estado`) REFERENCES `pedidos_estados` (`id`);

--
-- Constraints for table `pedidos_productos`
--
ALTER TABLE `pedidos_productos`
  ADD CONSTRAINT `pedidos_productos_ibfk_1` FOREIGN KEY (`pedido`) REFERENCES `pedidos` (`numero_pedido`),
  ADD CONSTRAINT `pedidos_productos_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `productos` (`referencia`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`empresa`) REFERENCES `empresas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
