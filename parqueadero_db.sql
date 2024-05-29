-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2024 a las 01:53:08
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parqueadero_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_isla`
--

CREATE TABLE `tbl_isla` (
  `id_isla` int(11) NOT NULL,
  `placa` varchar(11) DEFAULT NULL,
  `estado` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_isla`
--

INSERT INTO `tbl_isla` (`id_isla`, `placa`, `estado`) VALUES
(1, NULL, '0'),
(2, NULL, '0'),
(3, NULL, '0'),
(4, NULL, '0'),
(5, NULL, '0'),
(6, NULL, '0'),
(7, NULL, '0'),
(8, NULL, '0'),
(9, NULL, '0'),
(10, NULL, '0'),
(11, NULL, '0'),
(12, NULL, '0'),
(13, NULL, '0'),
(14, NULL, '0'),
(15, NULL, '0'),
(16, NULL, '0'),
(17, NULL, '0'),
(18, NULL, '0'),
(19, NULL, '0'),
(20, NULL, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_vehiculos`
--

CREATE TABLE `tbl_vehiculos` (
  `placa` varchar(11) NOT NULL,
  `vehi_tipo` varchar(45) NOT NULL,
  `vehi_marca` varchar(45) NOT NULL,
  `cedula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_vehiculos`
--

INSERT INTO `tbl_vehiculos` (`placa`, `vehi_tipo`, `vehi_marca`, `cedula`) VALUES
('KTU-22G', 'MOTO', 'AKT', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cedula` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `usuario` text NOT NULL,
  `clave` text NOT NULL,
  `perfil` text NOT NULL,
  `foto` text NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cedula`, `nombre`, `usuario`, `clave`, `perfil`, `foto`, `estado`, `ultimo_login`, `fechanacimiento`, `email`, `telefono`) VALUES
(1, 'prueba', 'prueba', '1234', 'administrador', '', 1, '2024-04-23 18:08:49', NULL, NULL, NULL),
(2, 'prueba', 'prueba2', '1234', 'vigilante', '', 1, '0000-00-00 00:00:00', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_isla`
--
ALTER TABLE `tbl_isla`
  ADD PRIMARY KEY (`id_isla`),
  ADD KEY `placa` (`placa`);

--
-- Indices de la tabla `tbl_vehiculos`
--
ALTER TABLE `tbl_vehiculos`
  ADD PRIMARY KEY (`placa`),
  ADD KEY `cedula` (`cedula`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cedula`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_isla`
--
ALTER TABLE `tbl_isla`
  ADD CONSTRAINT `tbl_isla_ibfk_1` FOREIGN KEY (`placa`) REFERENCES `tbl_vehiculos` (`placa`);

--
-- Filtros para la tabla `tbl_vehiculos`
--
ALTER TABLE `tbl_vehiculos`
  ADD CONSTRAINT `tbl_vehiculos_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `usuarios` (`cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
