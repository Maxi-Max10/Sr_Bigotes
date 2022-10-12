-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2021 at 03:55 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sr_bigotes`
--

-- --------------------------------------------------------

--
-- Table structure for table `citas`
--

CREATE TABLE `citas` (
  `id_citas` int(5) NOT NULL,
  `fecha_creado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cliente_id` int(5) NOT NULL,
  `empleado_id` int(2) NOT NULL,
  `hora_comienzo` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hora_fin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cancelado` tinyint(1) NOT NULL DEFAULT 0,
  `razon_cancelacion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `citas`
--

INSERT INTO `citas` (`id_citas`, `fecha_creado`, `cliente_id`, `empleado_id`, `hora_comienzo`, `hora_fin`, `cancelado`, `razon_cancelacion`) VALUES
(10, '2021-02-06 13:40:00', 11, 3, '2021-02-08 09:30:00', '2021-02-08 09:50:00', 0, NULL),
(11, '2021-03-20 08:22:00', 12, 3, '2021-03-22 06:00:00', '2021-03-22 06:20:00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barber_admin`
--

CREATE TABLE `barber_admin` (
  `admin_id` int(5) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nombre_completo` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barber_admin`
--

INSERT INTO `barber_admin` (`admin_id`, `usuario`, `email`, `nombre_completo`, `password`) VALUES
(1, 'maxiald1', 'neonalderete19@gmail.com', 'Maximiliano Alderte', '1832b2d0aadad73c8bc765ca176ca2cdcaa78374');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `cliente_id` int(5) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `celular` varchar(30) NOT NULL,
  `client_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`cliente_id`, `nombre`, `apellido`, `celular`, `client_email`) VALUES
(1, 'Daniel', 'Ramo', '261-7893791', 'daniel_ramo@gmail.com'),
(2, 'Violeta', 'Rivera', '261-3275825','violeta_rivera@yahoo.com'),
(3, 'Kevín', 'Adriani', '261-3435556','kevinadriani@gmail.com'),
(4, 'Hugo', 'Maldonado', '261-7346655', 'hugomaldonado123@gmail.com'),
(5, 'Iris', 'Fernadez', '263-4308303', 'irisfernadez@gmail.com'),
(7, 'Analia', 'Lorenzo', '2622-0103929', 'analia.lorenzo@gmail.com'),
(8, 'Victor', 'Lema', '261-3300303', 'victor_le@yahoo.com'),
(11, 'Laura', 'Villalba', '261-1323223', 'laura_998@yahoo.com'),
(12, 'Romina', 'Toro', '261-3567890', 'romi_toro@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `empleado_id` int(2) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `celular` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`empleado_id`, `nombre`, `apellido`, `celular`, `email`) VALUES
(1, 'RJ\r\n', 'Casillan', '', ''),
(2, 'K\r\n', 'Fades', '', ''),
(3, 'Santino\r\n', 'Tesoro', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `horario_empleados`
--

CREATE TABLE `horario_empleados` (
  `id` int(5) NOT NULL,
  `empleado_id` int(2) NOT NULL,
  `id_dia` tinyint(1) NOT NULL,
  `desde_hora` time NOT NULL,
  `hasta_hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `horario_empleados`
--

INSERT INTO `horario_empleados` (`id`, `empleado_id`, `id_dia`, `desde_hora`, `hasta_hora`) VALUES
(29, 3, 1, '09:00:00', '18:00:00'),
(30, 3, 7, '09:00:00', '17:00:00'),
(33, 1, 1, '09:00:00', '18:00:00'),
(34, 1, 2, '15:00:00', '22:00:00'),
(35, 1, 3, '09:00:00', '18:00:00'),
(36, 1, 4, '00:00:00', '20:00:00'),
(37, 1, 7, '09:00:00', '18:00:00'),
(38, 2, 1, '09:00:00', '17:00:00'),
(39, 2, 6, '09:00:00', '18:00:00'),
(40, 2, 7, '09:00:00', '18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

CREATE TABLE `servicios` (
  `servicio_id` int(5) NOT NULL,
  `nombre_servicio` varchar(50) NOT NULL,
  `descripcion_servicio` varchar(255) NOT NULL,
  `precio_servicio` decimal(6,2) NOT NULL,
  `duracion_servicio` int(5) NOT NULL,
  `id_categoria` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `servicios`
--

INSERT INTO `servicios` (`servicio_id`, `nombre_servicio`, `descripcion_servicio`, `precio_servicio`, `duracion_servicio`, `id_categoria`) VALUES
(1, 'Corte de cabello', 'Este peluquero es una persona que su ocupacion principal es cortar y afeitar', '500', 20, 4),
(2, 'Estilo de cabello', 'Este peluquero es especialiista de cortes con estilos modernos y clasicos ', '700', 25, 4),
(3, 'Lavado de cabello', 'Este peluquero es encargado de diagnosticar el tipo de pelo para tener un buen lavado', '500', 10, 4),
(4, 'Afeitadado de barba', 'Este barbero tiene por oficio afeitar, cortar y arreglar la barba, el bigote de los hombres…', '500', 20, 2),
(5, 'Recorte de barba', 'Este barbero que tiene por oficio afeitar, cortar y arreglar la barba, el bigote de los hombres…', '450', 15, 2),
(6, 'Afeitado suave', 'Este barbero tiene por oficio afeitar, cortar y arreglar la barba, el bigote de los hombres…', '400', 20, 2),
(7, 'Lavado de barba', 'Este barbero esta especializado en usar producto segun tipo de barbas', '500', 15, 3),
(8, 'Limpieza facial', 'Este barbero se encarga de nutrir, hidratar y conseguir que el vello facial luzca perfecto. ', '650', 20, 3),
(9, 'Perfilado de barba', 'Este barbero esta encargado de diseñar una perfecta línea de cuello para una nueva barba', '700', 20, 3);
-- --------------------------------------------------------

--
-- Table structure for table `servicio_reservado`
--

CREATE TABLE `servicio_reservado` (
  `id_citas` int(5) NOT NULL,
  `servicio_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `servicio_reservado`
--

INSERT INTO `servicio_reservado` (`id_citas`, `servicio_id`) VALUES
(10, 9),
(11, 9);

-- --------------------------------------------------------

--
-- Table structure for table `categoria_servicios`
--

CREATE TABLE `categoria_servicios` (
  `id_categoria` int(2) NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria_servicios`
--

INSERT INTO `categoria_servicios` (`id_categoria`, `nombre_categoria`) VALUES
(2, 'Afeitado'),
(3, 'Mascarilla'),
(4, 'Otro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_citas`),
  ADD KEY `FK_cliente_cita` (`cliente_id`),
  ADD KEY `FK_empleado_cita` (`empleado_id`);

--
-- Indexes for table `barber_admin`
--
ALTER TABLE `barber_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `usuario` (`usuario`,`email`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cliente_id`),
  ADD UNIQUE KEY `client_email` (`client_email`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`empleado_id`);

--
-- Indexes for table `horario_empleados`
--
ALTER TABLE `horario_empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_emp` (`empleado_id`);

--
-- Indexes for table `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`servicio_id`),
  ADD KEY `FK_servicio_categoria` (`id_categoria`);

--
-- Indexes for table `servicio_reservado`
--
ALTER TABLE `servicio_reservado`
  ADD PRIMARY KEY (`id_citas`,`servicio_id`),
  ADD KEY `FK_SB_servicio` (`servicio_id`);

--
-- Indexes for table `categoria_servicios`
--
ALTER TABLE `categoria_servicios`
  ADD PRIMARY KEY (`id_categoria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `citas`
--
ALTER TABLE `citas`
  MODIFY `id_citas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `barber_admin`
--
ALTER TABLE `barber_admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cliente_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `empleado_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `horario_empleados`
--
ALTER TABLE `horario_empleados`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `servicios`
--
ALTER TABLE `servicios`
  MODIFY `servicio_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categoria_servicios`
--
ALTER TABLE `categoria_servicios`
  MODIFY `id_categoria` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `FK_cliente_cita` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`cliente_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_empleado_cita` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`empleado_id`) ON DELETE CASCADE;

--
-- Constraints for table `horario_empleados`
--
ALTER TABLE `horario_empleados`
  ADD CONSTRAINT `FK_emp` FOREIGN KEY (`empleado_id`) REFERENCES `empleados` (`empleado_id`) ON DELETE CASCADE;

--
-- Constraints for table `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `FK_servicio_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria_servicios` (`id_categoria`) ON DELETE CASCADE;

--
-- Constraints for table `servicio_reservado`
--
ALTER TABLE `servicio_reservado`
  ADD CONSTRAINT `FK_SB_cita` FOREIGN KEY (`id_citas`) REFERENCES `citas` (`id_citas`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_SB_servicio` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`servicio_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_cita` FOREIGN KEY (`id_citas`) REFERENCES `citas` (`id_citas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
