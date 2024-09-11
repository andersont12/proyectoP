-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2024 a las 04:29:04
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

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
-- Estructura de tabla para la tabla `tbl_vehiculos`
--

CREATE TABLE `tbl_vehiculos` (
  `placa` varchar(11) NOT NULL,
  `vehi_tipo` varchar(45) NOT NULL,
  `vehi_marca` varchar(45) NOT NULL,
  `cedula` int(11) NOT NULL,
  `ultimo_ingreso` datetime DEFAULT NULL,
  `ultima_salida` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_vehiculos`
--

INSERT INTO `tbl_vehiculos` (`placa`, `vehi_tipo`, `vehi_marca`, `cedula`, `ultimo_ingreso`, `ultima_salida`) VALUES
('bna701', 'CARRO', 'ford', 1005851543, '2024-09-10 08:49:26', '2024-09-10 16:13:22'),
('ygu13f', 'MOTO', 'benelli', 1022431392, '2024-09-06 18:41:33', '2024-09-10 16:13:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(255) DEFAULT NULL,
  `nit_ci_cliente` varchar(255) DEFAULT NULL,
  `placa_auto` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_facturaciones`
--

CREATE TABLE `tb_facturaciones` (
  `id_facturacion` int(11) NOT NULL,
  `id_informacion` varchar(255) DEFAULT NULL,
  `nro_factura` varchar(255) DEFAULT NULL,
  `id_cliente` varchar(255) DEFAULT NULL,
  `fecha_factura` varchar(255) DEFAULT NULL,
  `fecha_ingreso` varchar(255) DEFAULT NULL,
  `hora_ingreso` varchar(255) DEFAULT NULL,
  `fecha_salida` varchar(255) DEFAULT NULL,
  `hora_salida` varchar(255) DEFAULT NULL,
  `tiempo` varchar(255) DEFAULT NULL,
  `cuviculo` varchar(255) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `precio` varchar(255) DEFAULT NULL,
  `cantidad` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `monto_total` varchar(255) DEFAULT NULL,
  `monto_literal` varchar(255) DEFAULT NULL,
  `user_sesion` varchar(255) DEFAULT NULL,
  `qr` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_mapeos`
--

CREATE TABLE `tb_mapeos` (
  `id_map` int(11) NOT NULL,
  `nro_espacio` varchar(255) DEFAULT NULL,
  `estado_espacio` varchar(255) DEFAULT NULL,
  `obs` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_mapeos`
--

INSERT INTO `tb_mapeos` (`id_map`, `nro_espacio`, `estado_espacio`, `obs`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, '1', 'OCUPADO', '', '2024-08-22 10:50:41', '2024-09-10 07:05:47', NULL, '1'),
(2, '2', 'LIBRE', '', '2024-08-22 10:58:58', '2024-09-10 06:57:54', NULL, '1'),
(3, '3', 'LIBRE', '', '2024-08-22 11:35:46', '2024-09-10 07:00:02', NULL, '1'),
(4, '4', 'LIBRE', '', '2024-08-24 10:34:23', '2024-09-10 04:33:56', NULL, '1'),
(5, '5', 'LIBRE', '', '2024-08-26 02:39:34', '2024-08-30 11:45:25', NULL, '1'),
(6, '6', 'LIBRE', 'Observación por defecto', '2024-08-30 20:34:07', '2024-09-10 04:36:26', NULL, '1'),
(7, '7', 'LIBRE', 'Observación por defecto', '2024-08-31 07:40:32', NULL, NULL, '1'),
(8, '8', 'LIBRE', 'Observación por defecto', '2024-08-31 08:37:36', NULL, NULL, '1'),
(9, '9', 'LIBRE', 'Observación por defecto', '2024-09-06 11:38:28', NULL, NULL, '1'),
(10, '10', 'LIBRE', 'Observación por defecto', '2024-09-06 11:38:30', NULL, NULL, '1'),
(11, '10', 'LIBRE', 'Observación por defecto', '2024-09-06 11:38:32', NULL, NULL, '1'),
(16, '10', 'LIBRE', 'Observación por defecto', '2024-09-06 11:38:42', NULL, NULL, '1'),
(17, '10', 'LIBRE', 'Observación por defecto', '2024-09-06 18:43:49', NULL, NULL, '1'),
(18, '10', 'LIBRE', 'Observación por defecto', '2024-09-06 18:44:01', NULL, NULL, '1'),
(19, '10', 'LIBRE', 'Observación por defecto', '2024-09-06 18:44:05', NULL, NULL, '1'),
(20, '10', 'LIBRE', 'Observación por defecto', '2024-09-07 07:36:51', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_precios`
--

CREATE TABLE `tb_precios` (
  `id_precio` int(11) NOT NULL,
  `cantidad` varchar(255) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `precio` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_precios`
--

INSERT INTO `tb_precios` (`id_precio`, `cantidad`, `detalle`, `precio`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, '1', 'HORAS', '1000', '2024-09-07 03:36:25', '2024-09-10 16:39:02', NULL, '1'),
(2, '2', 'HORAS', '2000', '2024-09-09 08:23:01', '2024-09-10 16:39:06', NULL, '1'),
(3, '3', 'HORAS', '3000', '2024-09-09 10:56:35', '2024-09-10 16:39:10', NULL, '1'),
(4, '4', 'HORAS', '4000', '2024-09-10 03:32:22', '2024-09-10 16:39:13', NULL, '1'),
(5, '5', 'HORAS', '5000', '2024-09-10 03:32:32', '2024-09-10 16:39:17', NULL, '1'),
(6, '6', 'HORAS', '6000', '2024-09-10 03:33:22', '2024-09-10 16:39:22', NULL, '1'),
(7, '7', 'HORAS', '7000', '2024-09-10 03:33:28', '2024-09-10 16:39:31', NULL, '1'),
(8, '8', 'HORAS', '8000', '2024-09-10 03:33:41', NULL, NULL, '1'),
(9, '9', 'HORAS', '9000', '2024-09-10 03:33:48', NULL, NULL, '1'),
(10, '10', 'HORAS', '10000', '2024-09-10 03:34:00', NULL, NULL, '1'),
(11, '11', 'HORAS', '11000', '2024-09-10 03:34:06', NULL, NULL, '1'),
(12, '12', 'HORAS', '12000', '2024-09-10 03:34:15', '2024-09-10 16:41:02', NULL, '1'),
(13, '13', 'HORAS', '13000', '2024-09-10 03:34:24', '2024-09-10 16:41:07', NULL, '1'),
(14, '14', 'HORAS', '14000', '2024-09-10 03:34:30', '2024-09-10 16:41:13', NULL, '1'),
(15, '15', 'HORAS', '15000', '2024-09-10 03:34:57', '2024-09-10 16:41:17', NULL, '1'),
(16, '16', 'HORAS', '16000', '2024-09-10 03:35:03', '2024-09-10 16:41:21', NULL, '1'),
(17, '17', 'HORAS', '17000', '2024-09-10 03:35:10', '2024-09-10 16:41:30', NULL, '1'),
(18, '18', 'HORAS', '18000', '2024-09-10 03:35:15', '2024-09-10 16:41:34', NULL, '1'),
(19, '19', 'HORAS', '19000', '2024-09-10 03:35:22', '2024-09-10 16:41:38', NULL, '1'),
(20, '20', 'HORAS', '20000', '2024-09-10 03:35:36', '2024-09-10 16:41:42', NULL, '1'),
(21, '21', 'HORAS', '21000', '2024-09-10 03:35:42', '2024-09-10 16:41:47', NULL, '1'),
(22, '22', 'HORAS', '22000', '2024-09-10 03:35:48', '2024-09-10 16:41:52', NULL, '1'),
(23, '23', 'HORAS', '23000', '2024-09-10 03:35:53', '2024-09-10 16:41:56', NULL, '1'),
(24, '24', 'HORAS', '24000', '2024-09-10 03:36:02', NULL, NULL, '1'),
(25, '0', 'HORAS', '1000', '2024-09-10 06:56:12', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tickets`
--

CREATE TABLE `tb_tickets` (
  `id_ticket` int(11) NOT NULL,
  `nombre_cliente` varchar(255) DEFAULT NULL,
  `nit_ci` varchar(255) DEFAULT NULL,
  `placa_auto` varchar(255) DEFAULT NULL,
  `cuviculo` varchar(255) DEFAULT NULL,
  `fecha_ingreso` varchar(255) DEFAULT NULL,
  `hora_ingreso` varchar(255) DEFAULT NULL,
  `estado_ticket` varchar(255) DEFAULT NULL,
  `user_sesion` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `telefono` varchar(20) DEFAULT NULL,
  `codigo_verificacion` varchar(5) DEFAULT NULL,
  `ultimo_cierre_sesion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cedula`, `nombre`, `usuario`, `clave`, `perfil`, `foto`, `estado`, `ultimo_login`, `fechanacimiento`, `email`, `telefono`, `codigo_verificacion`, `ultimo_cierre_sesion`) VALUES
(1, 'prueba', 'prueba', '0391393dc1fffa3708b60efc4b3cea92', 'Administrador', '', 1, '2024-09-09 14:58:14', NULL, 'anderzontm12@gmail.com', '9874563', '5708', NULL),
(2, 'pruebax', 'prueba2', '12345', 'vigilante', '', 0, '2024-06-12 18:33:00', NULL, NULL, NULL, '0', NULL),
(3, 'prueba', 'prueba1', '25d55ad283aa400af464c76d713c07ad', 'Vigilante', '', 0, '2024-08-26 14:48:35', NULL, 'prueba1@gmail.com', '9874563', '0', NULL),
(123, 'ADMIN', 'ADMIN', '1234', 'Administrador', '', 0, '2024-08-13 10:21:39', NULL, NULL, NULL, '0', NULL),
(1022431392, 'Vigilante', 'PruebaVigilante', 'd6d80a1f48e3c2fe54105fd65792a1ca', 'Vigilante', '', 1, '2024-08-31 08:40:17', NULL, 'cristofertrian@gmail.com', '9874509', NULL, NULL),
(2147483647, 'anderson', 'ander', '191b07a7d7e78f29744cc0ad884cfea8', 'Administrador', '', 0, '0000-00-00 00:00:00', NULL, 'llubock12@gmail.com', '9874563', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_vehiculos`
--
ALTER TABLE `tbl_vehiculos`
  ADD PRIMARY KEY (`placa`);

--
-- Indices de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `tb_facturaciones`
--
ALTER TABLE `tb_facturaciones`
  ADD PRIMARY KEY (`id_facturacion`);

--
-- Indices de la tabla `tb_mapeos`
--
ALTER TABLE `tb_mapeos`
  ADD PRIMARY KEY (`id_map`);

--
-- Indices de la tabla `tb_precios`
--
ALTER TABLE `tb_precios`
  ADD PRIMARY KEY (`id_precio`);

--
-- Indices de la tabla `tb_tickets`
--
ALTER TABLE `tb_tickets`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_facturaciones`
--
ALTER TABLE `tb_facturaciones`
  MODIFY `id_facturacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_mapeos`
--
ALTER TABLE `tb_mapeos`
  MODIFY `id_map` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tb_precios`
--
ALTER TABLE `tb_precios`
  MODIFY `id_precio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `tb_tickets`
--
ALTER TABLE `tb_tickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
