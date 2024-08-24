-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-08-2024 a las 19:05:13
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
-- Estructura de tabla para la tabla `tbl_vehiculos`
--

CREATE TABLE `tbl_vehiculos` (
  `placa` varchar(11) NOT NULL,
  `vehi_tipo` varchar(45) NOT NULL,
  `vehi_marca` varchar(45) NOT NULL,
  `cedula` int(11) NOT NULL,
  PRIMARY KEY (placa)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_vehiculos`
--

INSERT INTO `tbl_vehiculos` (`placa`, `vehi_tipo`, `vehi_marca`, `cedula`) VALUES
('KTU-22G', 'moto', 'benelli', 1),
('ygu13f', 'moto', 'benelli', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(255) DEFAULT NULL,
  `nit_ci_cliente` varchar(255) DEFAULT NULL,
  `placa_auto` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  PRIMARY KEY (id_cliente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_clientes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_facturaciones`
--

CREATE TABLE `tb_facturaciones` (
  `id_facturacion` int(11) NOT NULL AUTO_INCREMENT,
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
  `estado` varchar(10) DEFAULT NULL,
  PRIMARY KEY (id_facturacion)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_mapeos`
--

CREATE TABLE `tb_mapeos` (
  `id_map` int(11) NOT NULL AUTO_INCREMENT,
  `nro_espacio` varchar(255) DEFAULT NULL,
  `estado_espacio` varchar(255) DEFAULT NULL,
  `obs` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL,
  PRIMARY KEY (id_map)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_mapeos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tickets`
--

CREATE TABLE `tb_tickets` (
  `id_ticket` int(11) NOT NULL AUTO_INCREMENT,
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
  `estado` varchar(10) DEFAULT NULL,
  PRIMARY KEY (id_ticket)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_tickets`
--

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
  `codigo_verificacion` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cedula`, `nombre`, `usuario`, `clave`, `perfil`, `foto`, `estado`, `ultimo_login`, `fechanacimiento`, `email`, `telefono`, `codigo_verificacion`) VALUES
(1, 'prueba', 'prueba', '81dc9bdb52d04dc20036dbd8313ed055', 'Administrador', '', 1, '2024-08-13 14:16:25', NULL, NULL, NULL, '0'),
(2, 'pruebax', 'prueba2', '12345', 'vigilante', '', 1, '2024-06-12 18:33:00', NULL, NULL, NULL, '0'),
(3, 'prueba1', 'prueba1', '12345', 'vigilante', '', 1, '0000-00-00 00:00:00', NULL, NULL, NULL, '0'),
(45, 'PRUEBA', 'PRUEBA7', '151bde48d7e8f2a52410059ce10ab80f', 'Vigilante', '', 1, '2024-08-21 12:00:42', NULL, 'caa@c.com', NULL, '1205'),
(123, 'ADMIN', 'ADMIN', '1234', 'Administrador', '', 1, '2024-08-13 10:21:39', NULL, NULL, NULL, '0'),
(2147483647, 'prueba', 'pruebados', 'a925576942e94b2ef57a066101b48876', 'Administrador', '', 0, '0000-00-00 00:00:00', NULL, NULL, NULL, '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
