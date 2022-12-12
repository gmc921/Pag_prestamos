-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2021 a las 19:31:42
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prestamos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `RFC` varchar(13) NOT NULL,
  `contrasena` varchar(15) NOT NULL,
  `Nombre` varchar(15) NOT NULL,
  `ap_Paterno` varchar(15) NOT NULL,
  `ap_Materno` varchar(15) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `RFC` varchar(13) NOT NULL,
  `pais` varchar(15) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `municipio` varchar(15) NOT NULL,
  `codigo_postal` int(8) NOT NULL,
  `calle` varchar(20) NOT NULL,
  `colonia` varchar(20) NOT NULL,
  `no_interior` int(3) NOT NULL,
  `no_exterior` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_bancaria`
--

CREATE TABLE `info_bancaria` (
  `rfc` varchar(13) NOT NULL,
  `no_tarjeta` varchar(20) NOT NULL,
  `cvd` int(3) NOT NULL,
  `caducidad` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencias`
--

CREATE TABLE `referencias` (
  `RFC` varchar(13) NOT NULL,
  `nombre_1` varchar(15) NOT NULL,
  `apellido_m1` varchar(15) NOT NULL,
  `apellido_p1` varchar(15) NOT NULL,
  `telefono_1` double NOT NULL,
  `nombre_2` varchar(15) NOT NULL,
  `apellido_m2` varchar(15) NOT NULL,
  `apellido_p2` varchar(15) NOT NULL,
  `telefono_2` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_abonos`
--

CREATE TABLE `reg_abonos` (
  `id_abono` int(5) NOT NULL,
  `id_prestamo` int(5) NOT NULL,
  `RFC` varchar(15) NOT NULL,
  `cant_abonada` int(6) NOT NULL,
  `cant_deuda` int(6) NOT NULL,
  `fecha_abonada` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_prestamos`
--

CREATE TABLE `reg_prestamos` (
  `id_prestamo` int(5) NOT NULL,
  `RFC` varchar(13) NOT NULL,
  `total` int(6) NOT NULL,
  `tipo_pago` varchar(15) NOT NULL,
  `tasa_interes` varchar(5) NOT NULL,
  `cantidad_pagar` double(8,2) NOT NULL,
  `fecha_prestamo` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo`
--

CREATE TABLE `trabajo` (
  `RFC` varchar(13) NOT NULL,
  `nombre_empresa` varchar(20) NOT NULL,
  `telefono` double NOT NULL,
  `codigo_postal` int(8) NOT NULL,
  `puesto` varchar(20) NOT NULL,
  `salario` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`RFC`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD UNIQUE KEY `RFC` (`RFC`);

--
-- Indices de la tabla `info_bancaria`
--
ALTER TABLE `info_bancaria`
  ADD KEY `rfc` (`rfc`);

--
-- Indices de la tabla `referencias`
--
ALTER TABLE `referencias`
  ADD UNIQUE KEY `RFC` (`RFC`);

--
-- Indices de la tabla `reg_abonos`
--
ALTER TABLE `reg_abonos`
  ADD PRIMARY KEY (`id_abono`),
  ADD KEY `id_prestamo` (`id_prestamo`),
  ADD KEY `RFC` (`RFC`);

--
-- Indices de la tabla `reg_prestamos`
--
ALTER TABLE `reg_prestamos`
  ADD PRIMARY KEY (`id_prestamo`),
  ADD KEY `RFC` (`RFC`);

--
-- Indices de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD UNIQUE KEY `RFC` (`RFC`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reg_abonos`
--
ALTER TABLE `reg_abonos`
  MODIFY `id_abono` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `reg_prestamos`
--
ALTER TABLE `reg_prestamos`
  MODIFY `id_prestamo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD CONSTRAINT `domicilio_ibfk_1` FOREIGN KEY (`RFC`) REFERENCES `clientes` (`RFC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `info_bancaria`
--
ALTER TABLE `info_bancaria`
  ADD CONSTRAINT `info_bancaria_ibfk_1` FOREIGN KEY (`rfc`) REFERENCES `clientes` (`RFC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `referencias`
--
ALTER TABLE `referencias`
  ADD CONSTRAINT `referencias_ibfk_1` FOREIGN KEY (`RFC`) REFERENCES `clientes` (`RFC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reg_abonos`
--
ALTER TABLE `reg_abonos`
  ADD CONSTRAINT `reg_abonos_ibfk_1` FOREIGN KEY (`id_prestamo`) REFERENCES `reg_prestamos` (`id_prestamo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reg_abonos_ibfk_2` FOREIGN KEY (`RFC`) REFERENCES `reg_prestamos` (`RFC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reg_prestamos`
--
ALTER TABLE `reg_prestamos`
  ADD CONSTRAINT `reg_prestamos_ibfk_1` FOREIGN KEY (`RFC`) REFERENCES `clientes` (`RFC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD CONSTRAINT `trabajo_ibfk_1` FOREIGN KEY (`RFC`) REFERENCES `clientes` (`RFC`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
