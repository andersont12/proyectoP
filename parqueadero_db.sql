-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2024 a las 22:42:57
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
('bna701', 'CARRO', 'ford', 1005851543, '2024-09-10 08:49:26', '2024-09-10 08:50:03'),
('ygu13f', 'moto', 'benelli', 1022431392, '2024-09-06 18:41:33', '2024-09-06 18:42:36');

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

--
-- Volcado de datos para la tabla `tb_clientes`
--

INSERT INTO `tb_clientes` (`id_cliente`, `nombre_cliente`, `nit_ci_cliente`, `placa_auto`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'ana', '53897833', 'ygu13f', '2024-08-22 11:50:54', NULL, NULL, '1'),
(2, 'anderson', '1022431392', 'bna701', '2024-08-22 11:58:02', NULL, NULL, '1'),
(3, 'sebastian', '1234', 'asd43e', '2024-08-22 12:32:13', NULL, NULL, '1'),
(4, 'sebastian', '1234', 'asds43', '2024-08-22 12:34:21', NULL, NULL, '1'),
(5, 'jeank', '1022431392', 'asd12e', '2024-08-22 12:34:44', NULL, NULL, '1'),
(6, 'cristo', '53897833', 'qwe43r', '2024-08-22 12:35:57', NULL, NULL, '1'),
(7, 'omar', '1290', 'zyq024', '2024-08-24 11:26:12', NULL, NULL, '1'),
(8, 'omar', '1024356932', 'asd12q', '2024-08-24 10:30:27', NULL, NULL, '1'),
(9, 'omar', '1024356932', 'asd34e', '2024-08-26 03:25:27', NULL, NULL, '1'),
(10, 'andres', '1022456987', 'jhg65k', '2024-08-30 11:38:32', NULL, NULL, '1');

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

--
-- Volcado de datos para la tabla `tb_facturaciones`
--

INSERT INTO `tb_facturaciones` (`id_facturacion`, `id_informacion`, `nro_factura`, `id_cliente`, `fecha_factura`, `fecha_ingreso`, `hora_ingreso`, `fecha_salida`, `hora_salida`, `tiempo`, `cuviculo`, `detalle`, `precio`, `cantidad`, `total`, `monto_total`, `monto_literal`, `user_sesion`, `qr`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, NULL, NULL, '1', NULL, '2024-08-22', '10:50', '2024-08-22', '10:51', '0 días con 0 horas con 1 minutos ', '1', 'Servicio de parqueo de 0 días con 0 horas con 1 minutos ', NULL, NULL, NULL, NULL, NULL, NULL, 'Factura realizada por el sistema de paqueo, al cliente ana con CI/NIT:\n 53897833 con el vehiculo con número de placa ygu13f y esta factura se genero en\n   a hr: 10:51', '2024-08-22 10:51:16', NULL, NULL, '1'),
(2, NULL, NULL, '2', NULL, '2024-08-22', '10:57', '2024-08-22', '10:58', '0 días con 0 horas con 1 minutos ', '1', 'Servicio de parqueo de 0 días con 0 horas con 1 minutos ', NULL, NULL, NULL, NULL, NULL, NULL, 'Factura realizada por el sistema de paqueo, al cliente anderson con CI/NIT:\n 1022431392 con el vehiculo con número de placa bna701 y esta factura se genero en\n   a hr: 10:58', '2024-08-22 10:58:10', NULL, NULL, '1'),
(3, NULL, NULL, '4', NULL, '2024-08-22', '11:34', '2024-08-22', '11:34', '0 días con 0 horas con 0 minutos ', '2', 'Servicio de parqueo de 0 días con 0 horas con 0 minutos ', NULL, NULL, NULL, NULL, NULL, NULL, 'Factura realizada por el sistema de paqueo, al cliente sebastian con CI/NIT:\n 1234 con el vehiculo con número de placa asds43 y esta factura se genero en\n   a hr: 11:34', '2024-08-22 11:34:31', NULL, NULL, '1'),
(4, NULL, NULL, '6', NULL, '2024-08-22', '11:35', '2024-08-23', '18:39', '1 días con 7 horas con 4 minutos ', '3', 'Servicio de parqueo de 1 días con 7 horas con 4 minutos ', NULL, NULL, NULL, NULL, NULL, NULL, 'Factura realizada por el sistema de paqueo, al cliente cristo con CI/NIT:\n 53897833 con el vehiculo con número de placa qwe43r y esta factura se genero en\n   a hr: 18:39', '2024-08-23 06:39:26', NULL, NULL, '1'),
(5, NULL, NULL, '7', NULL, '2024-08-24', '10:25', '2024-08-24', '10:37', '0 días con 0 horas con 12 minutos ', '3', 'Servicio de parqueo de 0 días con 0 horas con 12 minutos ', NULL, NULL, NULL, NULL, NULL, NULL, 'Factura realizada por el sistema de paqueo, al cliente omar con CI/NIT:\n 1290 con el vehiculo con número de placa zyq024 y esta factura se genero en\n   a hr: 10:37', '2024-08-24 10:37:56', NULL, NULL, '1'),
(6, NULL, NULL, '8', NULL, '2024-08-23', '21:06', '2024-08-24', '21:35', '1 días con 0 horas con 29 minutos ', '3', 'Servicio de parqueo de 1 días con 0 horas con 29 minutos ', NULL, NULL, NULL, NULL, NULL, NULL, 'Factura realizada por el sistema de paqueo, al cliente omar con CI/NIT:\n 1024356932 con el vehiculo con número de placa asd12q y esta factura se genero en\n   a hr: 21:35', '2024-08-24 09:35:45', NULL, NULL, '1'),
(7, NULL, NULL, '9', NULL, '2008-01-01', '14:23', '2024-08-26', '14:36', '6082 días con 0 horas con 13 minutos ', '4', 'Servicio de parqueo de 6082 días con 0 horas con 13 minutos ', NULL, NULL, NULL, NULL, NULL, NULL, 'Factura realizada por el sistema de paqueo, al cliente omar con CI/NIT:\n 1024356932 con el vehiculo con número de placa asd34e y esta factura se genero en\n   a hr: 14:36', '2024-08-26 02:36:43', NULL, NULL, '1'),
(8, NULL, NULL, '8', NULL, '2024-08-23', '21:06', '2024-08-30', '16:30', '6 días con 19 horas con 24 minutos ', '3', 'Servicio de parqueo de 6 días con 19 horas con 24 minutos ', NULL, NULL, NULL, NULL, NULL, NULL, 'Factura realizada por el sistema de paqueo, al cliente omar con CI/NIT:\n 1024356932 con el vehiculo con número de placa asd12q y esta factura se genero en\n   a hr: 16:30', '2024-08-30 04:30:26', NULL, NULL, '1'),
(9, NULL, NULL, '10', NULL, '2024-08-30', '22:38', '2024-08-30', '22:45', '0 días con 0 horas con 7 minutos ', '5', 'Servicio de parqueo de 0 días con 0 horas con 7 minutos ', NULL, NULL, NULL, NULL, NULL, NULL, 'Factura realizada por el sistema de paqueo, al cliente andres con CI/NIT:\n 1022456987 con el vehiculo con número de placa jhg65k y esta factura se genero en\n   a hr: 22:45', '2024-08-30 10:45:25', NULL, NULL, '1'),
(10, NULL, NULL, '5', NULL, '2024-08-22', '11:34', '2024-09-03', '19:32', '12 días con 7 horas con 58 minutos ', '2', 'Servicio de parqueo de 12 días con 7 horas con 58 minutos ', NULL, NULL, NULL, NULL, NULL, NULL, 'Factura realizada por el sistema de paqueo, al cliente jeank con CI/NIT:\n 1022431392 con el vehiculo con número de placa asd12e y esta factura se genero en\n   a hr: 19:32', '2024-09-03 07:32:41', NULL, NULL, '1'),
(11, NULL, NULL, '5', NULL, '2024-09-06', '11:48', '2024-09-07', '07:34', '0 días con 19 horas con 46 minutos ', '2', 'Servicio de parqueo de 0 días con 19 horas con 46 minutos ', NULL, NULL, NULL, NULL, NULL, NULL, 'Factura realizada por el sistema de paqueo, al cliente jeank con CI/NIT:\n 1022431392 con el vehiculo con número de placa asd12e y esta factura se genero en\n   a hr: 07:34', '2024-09-07 07:34:58', NULL, NULL, '1'),
(12, NULL, NULL, '1', NULL, '2024-08-22', '11:32', '2024-09-07', '07:40', '15 días con 20 horas con 8 minutos ', '1', 'Servicio de parqueo de 15 días con 20 horas con 8 minutos ', NULL, NULL, NULL, NULL, NULL, NULL, 'Factura realizada por el sistema de paqueo, al cliente ana con CI/NIT:\n 53897833 con el vehiculo con número de placa ygu13f y esta factura se genero en\n   a hr: 07:40', '2024-09-07 07:40:16', NULL, NULL, '1'),
(13, NULL, NULL, '10', NULL, '2024-09-07', '07:44', '2024-09-07', '07:45', '0 días con 0 horas con 1 minutos ', '1', 'Servicio de parqueo de 0 días con 0 horas con 1 minutos ', NULL, NULL, NULL, NULL, NULL, NULL, 'Factura realizada por el sistema de paqueo, al cliente andres con CI/NIT:\n 1022456987 con el vehiculo con número de placa jhg65k y esta factura se genero en\n   a hr: 07:45', '2024-09-07 07:45:02', NULL, NULL, '1'),
(14, NULL, NULL, '1', NULL, '2024-09-07', '05:24', '2024-09-07', '08:24', '0 días con 3 horas con 0 minutos ', '1', 'Servicio de parqueo de 0 días con 3 horas con 0 minutos ', NULL, NULL, NULL, NULL, NULL, NULL, 'Factura realizada por el sistema de paqueo, al cliente ana con CI/NIT:\n 53897833 con el vehiculo con número de placa ygu13f y esta factura se genero en\n   a hr: 08:24', '2024-09-07 08:24:44', NULL, NULL, '1'),
(15, NULL, NULL, '1', NULL, '2024-09-07', '05:24', '2024-09-07', '08:27', '0 días con 3 horas con 3 minutos ', '1', 'Servicio de parqueo de 0 días con 3 horas con 3 minutos ', NULL, NULL, NULL, NULL, NULL, NULL, 'Factura realizada por el sistema de paqueo, al cliente ana con CI/NIT:\n 53897833 con el vehiculo con número de placa ygu13f y esta factura se genero en\n   a hr: 08:27', '2024-09-07 08:27:14', NULL, NULL, '1'),
(16, NULL, NULL, '1', NULL, '2024-09-07', '05:32', '2024-09-07', '08:32', '0 días con 3 horas con 0 minutos ', '1', 'Servicio de parqueo de 0 días con 3 horas con 0 minutos ', '0', '1', '0', '0', 'CERO CON 00/100 Bs.', NULL, 'Factura realizada por el sistema de paqueo, al cliente ana con CI/NIT:\n 53897833 con el vehiculo con número de placa ygu13f y esta factura se genero en\n   a hr: 08:32', '2024-09-07 08:32:44', NULL, NULL, '1'),
(17, NULL, NULL, '1', NULL, '2024-09-07', '05:32', '2024-09-07', '08:36', '0 días con 3 horas con 4 minutos ', '1', 'Servicio de parqueo de 0 días con 3 horas con 4 minutos ', '0', '1', '0', '0', 'CERO CON 00/100 Bs.', NULL, 'Factura realizada por el sistema de paqueo, al cliente ana con CI/NIT:\n 53897833 con el vehiculo con número de placa ygu13f y esta factura se genero en\n   a hr: 08:36', '2024-09-07 08:36:11', NULL, NULL, '1'),
(18, NULL, NULL, '1', NULL, '2024-09-07', '23:57', '2024-09-07', '14:58', '0 días con 8 horas con 59 minutos ', '1', 'Servicio de parqueo de 0 días con 8 horas con 59 minutos ', '0', '1', '0', '0', 'CERO CON 00/100 Bs.', NULL, 'Factura realizada por el sistema de paqueo, al cliente ana con CI/NIT:\n 53897833 con el vehiculo con número de placa ygu13f y esta factura se genero en\n   a hr: 14:58', '2024-09-07 02:58:16', NULL, NULL, '1'),
(19, NULL, NULL, '1', NULL, '2024-09-07', '11:58', '2024-09-07', '14:58', '0 días con 3 horas con 0 minutos ', '1', 'Servicio de parqueo de 0 días con 3 horas con 0 minutos ', '3000', '1', '3000', '3000', 'TRES MIL CON 00/100 Bs.', NULL, 'Factura realizada por el sistema de paqueo, al cliente ana con CI/NIT:\n 53897833 con el vehiculo con número de placa ygu13f y esta factura se genero en\n   a hr: 14:58', '2024-09-07 02:58:52', NULL, NULL, '1'),
(20, NULL, NULL, '9', NULL, '2024-09-07', '11:58', '2024-09-07', '15:17', '0 días con 3 horas con 19 minutos ', '1', 'Servicio de parqueo de 0 días con 3 horas con 19 minutos ', '3000', '1', '3000', '3000', 'TRES MIL CON', NULL, 'Factura realizada por el sistema de paqueo, al cliente omar con CI/NIT:\n 1024356932 con el vehiculo con número de placa asd34e y esta factura se genero en\n   a hr: 15:17', '2024-09-07 03:17:43', NULL, NULL, '1'),
(21, NULL, NULL, '1', NULL, '2024-09-07', '11:58', '2024-09-07', '15:18', '0 días con 3 horas con 20 minutos ', '1', 'Servicio de parqueo de 0 días con 3 horas con 20 minutos ', '3000', '1', '3000', '3000', 'TRES MIL CON', NULL, 'Factura realizada por el sistema de paqueo, al cliente ana con CI/NIT:\n 53897833 con el vehiculo con número de placa ygu13f y esta factura se genero en\n   a hr: 15:18', '2024-09-07 03:18:08', NULL, NULL, '1'),
(22, NULL, NULL, '1', NULL, '2024-09-07', '12:18', '2024-09-07', '15:19', '0 días con 3 horas con 1 minutos ', '1', 'Servicio de parqueo de 0 días con 3 horas con 1 minutos ', '3000', '1', '3000', '3000', 'TRES MIL', NULL, 'Factura realizada por el sistema de paqueo, al cliente ana con CI/NIT:\n 53897833 con el vehiculo con número de placa ygu13f y esta factura se genero en\n   a hr: 15:19', '2024-09-07 03:19:01', NULL, NULL, '1'),
(23, NULL, NULL, '9', NULL, '2024-09-07', '12:18', '2024-09-07', '15:19', '0 días con 3 horas con 1 minutos ', '1', 'Servicio de parqueo de 0 días con 3 horas con 1 minutos ', '3000', '1', '3000', '3000', 'TRES MIL Pesos', NULL, 'Factura realizada por el sistema de paqueo, al cliente omar con CI/NIT:\n 1024356932 con el vehiculo con número de placa asd34e y esta factura se genero en\n   a hr: 15:19', '2024-09-07 03:19:28', NULL, NULL, '1'),
(24, NULL, NULL, '1', NULL, '2024-09-09', '13:09', '2024-09-09', '15:10', '0 días con 2 horas con 1 minutos ', '1', 'Servicio de parqueo de 0 días con 2 horas con 1 minutos ', '0', '1', '0', '0', 'CERO', NULL, 'Factura realizada por el sistema de paqueo, al cliente ana con CI/NIT:\n 53897833 con el vehiculo con número de placa ygu13f y esta factura se genero en\n   a hr: 15:10', '2024-09-09 03:10:05', NULL, NULL, '1'),
(25, NULL, NULL, '1', NULL, '2024-09-09', '19:09', '2024-09-09', '15:11', '0 días con 3 horas con 58 minutos ', '1', 'Servicio de parqueo de 0 días con 3 horas con 58 minutos ', '0', '1', '0', '0', 'CERO', NULL, 'Factura realizada por el sistema de paqueo, al cliente ana con CI/NIT:\n 53897833 con el vehiculo con número de placa ygu13f y esta factura se genero en\n   a hr: 15:11', '2024-09-09 03:11:08', NULL, NULL, '1'),
(26, NULL, NULL, '1', NULL, '2024-09-09', '07:09', '2024-09-09', '15:11', '0 días con 8 horas con 2 minutos ', '1', 'Servicio de parqueo de 0 días con 8 horas con 2 minutos ', '0', '1', '0', '0', 'CERO', NULL, 'Factura realizada por el sistema de paqueo, al cliente ana con CI/NIT:\n 53897833 con el vehiculo con número de placa ygu13f y esta factura se genero en\n   a hr: 15:11', '2024-09-09 03:11:32', NULL, NULL, '1'),
(27, NULL, NULL, '1', NULL, '2024-09-09', '11:12', '2024-09-09', '15:12', '0 días con 4 horas con 0 minutos ', '1', 'Servicio de parqueo de 0 días con 4 horas con 0 minutos ', '88', '1', '88', '88', 'OCHENTA Y OCHO PESOS', NULL, 'Factura realizada por el sistema de paqueo, al cliente ana con CI/NIT:\n 53897833 con el vehiculo con número de placa ygu13f y esta factura se genero en\n   a hr: 15:12', '2024-09-09 03:12:15', NULL, NULL, '1'),
(28, NULL, NULL, '10', NULL, '2024-09-10', '06:51', '2024-09-10', '08:51', '0 días con 2 horas con 0 minutos ', '1', 'Servicio de parqueo de 0 días con 2 horas con 0 minutos ', '34', '1', '34', '34', 'TREINTA Y CUATRO PESOS', NULL, 'Factura realizada por el sistema de paqueo, al cliente andres con CI/NIT:\n 1022456987 con el vehiculo con número de placa jhg65k y esta factura se genero en\n   a hr: 08:51', '2024-09-10 08:51:44', NULL, NULL, '1'),
(29, NULL, NULL, '2', NULL, '2024-09-10', '08:53', '2024-09-10', '09:20', '0 días con 0 horas con 27 minutos ', '1', 'Servicio de parqueo de 0 días con 0 horas con 27 minutos ', '0', '1', '0', '0', 'CERO', NULL, 'Factura realizada por el sistema de paqueo, al cliente anderson con CI/NIT:\n 1022431392 con el vehiculo con número de placa bna701 y esta factura se genero en\n   a hr: 09:20', '2024-09-10 09:20:35', NULL, NULL, '1'),
(30, NULL, NULL, '8', NULL, '2024-09-10', '10:41', '2024-09-10', '12:06', '0 días con 1 horas con 25 minutos ', '1', 'Servicio de parqueo de 0 días con 1 horas con 25 minutos ', '6543', '1', '6543', '6543', 'SEIS MIL QUINIENTOS CUARENTA Y TRES PESOS', NULL, 'Factura realizada por el sistema de paqueo, al cliente omar con CI/NIT:\n 1024356932 con el vehiculo con número de placa asd12q y esta factura se genero en\n   a hr: 12:06', '2024-09-10 12:06:36', NULL, NULL, '1'),
(31, NULL, NULL, '6', NULL, '2024-09-10', '12:01', '2024-09-10', '15:36', '0 días con 3 horas con 35 minutos ', '3', 'Servicio de parqueo de 0 días con 3 horas con 35 minutos ', '3', '1', '3', '3', 'TRES PESOS', NULL, 'Factura realizada por el sistema de paqueo, al cliente cristo con CI/NIT:\n 53897833 con el vehiculo con número de placa qwe43r y esta factura se genero en\n   a hr: 15:36', '2024-09-10 03:36:31', NULL, NULL, '1'),
(32, NULL, NULL, '1', NULL, '2024-09-10', '09:08', '2024-09-10', '15:36', '0 días con 6 horas con 28 minutos ', '2', 'Servicio de parqueo de 0 días con 6 horas con 28 minutos ', '6', '1', '6', '6', 'SEIS PESOS', NULL, 'Factura realizada por el sistema de paqueo, al cliente ana con CI/NIT:\n 53897833 con el vehiculo con número de placa ygu13f y esta factura se genero en\n   a hr: 15:36', '2024-09-10 03:36:52', NULL, NULL, '1'),
(33, NULL, NULL, '2', NULL, '2024-09-10', '09:37', '2024-09-10', '15:38', '0 días con 6 horas con 1 minutos ', '2', 'Servicio de parqueo de 0 días con 6 horas con 1 minutos ', '6', '1', '6', '6', 'SEIS PESOS', NULL, 'Factura realizada por el sistema de paqueo, al cliente anderson con CI/NIT:\n 1022431392 con el vehiculo con número de placa bna701 y esta factura se genero en\n   a hr: 15:38', '2024-09-10 03:38:16', NULL, NULL, '1'),
(34, NULL, NULL, '2', NULL, '2024-09-10', '09:37', '2024-09-10', '15:42', '0 días con 6 horas con 5 minutos ', '2', 'Servicio de parqueo de 0 días con 6 horas con 5 minutos ', '6000', '1', '6000', '6000', 'SEIS MIL PESOS', NULL, 'Factura realizada por el sistema de paqueo, al cliente anderson con CI/NIT:\n 1022431392 con el vehiculo con número de placa bna701 y esta factura se genero en\n   a hr: 15:42', '2024-09-10 03:42:02', NULL, NULL, '1');

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
(1, '1', 'OCUPADO', '', '2024-08-22 10:50:41', '2024-09-10 03:37:19', NULL, '1'),
(2, '2', 'LIBRE', '', '2024-08-22 10:58:58', '2024-09-10 03:42:02', NULL, '1'),
(3, '3', 'LIBRE', '', '2024-08-22 11:35:46', '2024-09-10 03:36:31', NULL, '1'),
(4, '4', 'LIBRE', '', '2024-08-24 10:34:23', '2024-08-26 03:36:43', NULL, '1'),
(5, '5', 'LIBRE', '', '2024-08-26 02:39:34', '2024-08-30 11:45:25', NULL, '1'),
(6, '6', 'LIBRE', 'Observación por defecto', '2024-08-30 20:34:07', NULL, NULL, '1'),
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
(24, '24', 'HORAS', '24000', '2024-09-10 03:36:02', NULL, NULL, '1');

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

--
-- Volcado de datos para la tabla `tb_tickets`
--

INSERT INTO `tb_tickets` (`id_ticket`, `nombre_cliente`, `nit_ci`, `placa_auto`, `cuviculo`, `fecha_ingreso`, `hora_ingreso`, `estado_ticket`, `user_sesion`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'ana', '53897833', 'YGU13F', '1', '2024-08-22', '10:50', 'LIBRE', NULL, '2024-08-22 10:50:54', NULL, NULL, '1'),
(2, 'anderson', '1022431392', 'BNA701', '1', '2024-08-22', '10:57', 'LIBRE', NULL, '2024-08-22 10:58:02', NULL, NULL, '1'),
(3, 'sebastian', '1234', 'ASD43E', '-1', '2024-08-22', '11:31', 'OCUPADO', NULL, '2024-08-22 11:32:13', NULL, NULL, '1'),
(4, 'ana', '53897833', 'YGU13F', '1', '2024-08-22', '11:32', 'LIBRE', NULL, '2024-08-22 11:33:02', NULL, NULL, '1'),
(5, 'anderson', '1022431392', 'BNA701', '-1', '2024-08-22', '11:32', 'LIBRE', NULL, '2024-08-22 11:33:36', NULL, NULL, '1'),
(6, 'sebastian', '1234', 'ASDS43', '2', '2024-08-22', '11:34', 'LIBRE', NULL, '2024-08-22 11:34:21', NULL, NULL, '1'),
(7, 'jeank', '1022431392', 'ASD12E', '2', '2024-08-22', '11:34', 'LIBRE', NULL, '2024-08-22 11:34:44', NULL, NULL, '1'),
(8, 'cristo', '53897833', 'QWE43R', '3', '2024-08-22', '11:35', 'LIBRE', NULL, '2024-08-22 11:35:57', NULL, NULL, '1'),
(9, 'omar', '1290', 'ZYQ024', '3', '2024-08-24', '10:25', 'LIBRE', NULL, '2024-08-24 10:26:12', NULL, NULL, '1'),
(10, 'omar', '1024356932', 'ASD12Q', '3', '2024-08-23', '21:06', 'LIBRE', NULL, '2024-08-24 09:30:27', NULL, NULL, '1'),
(11, 'omar', '1024356932', 'ASD12Q', '3', '2024-08-23', '21:06', 'LIBRE', NULL, '2024-08-24 09:36:02', NULL, NULL, '1'),
(12, 'omar', '1024356932', 'ASD34E', '4', '2008-01-01', '14:23', 'LIBRE', NULL, '2024-08-26 02:25:27', NULL, NULL, '1'),
(13, 'andres', '1022456987', 'JHG65K', '5', '2024-08-30', '22:38', 'LIBRE', NULL, '2024-08-30 10:38:32', NULL, NULL, '1'),
(14, 'jeank', '1022431392', 'ASD12E', '2', '2024-09-06', '11:48', 'LIBRE', NULL, '2024-09-06 11:48:41', NULL, NULL, '1'),
(15, 'andres', '1022456987', 'JHG65K', '1', '2024-09-07', '07:44', 'LIBRE', NULL, '2024-09-07 07:44:38', NULL, NULL, '1'),
(16, 'ana', '53897833', 'YGU13F', '1', '2024-09-07', '05:24', 'LIBRE', NULL, '2024-09-07 08:24:39', NULL, NULL, '1'),
(17, 'ana', '53897833', 'YGU13F', '1', '2024-09-07', '05:24', 'LIBRE', NULL, '2024-09-07 08:27:06', NULL, NULL, '1'),
(18, 'ana', '53897833', 'YGU13F', '1', '2024-09-07', '05:32', 'LIBRE', NULL, '2024-09-07 08:32:38', NULL, NULL, '1'),
(19, 'ana', '53897833', 'YGU13F', '1', '2024-09-07', '05:32', 'LIBRE', NULL, '2024-09-07 08:35:58', NULL, NULL, '1'),
(20, 'ana', '53897833', 'YGU13F', '1', '2024-09-07', '23:56', 'OCUPADO', NULL, '2024-09-07 02:56:50', NULL, '2024-09-07 02:57:17', '0'),
(21, 'ana', '53897833', 'YGU13F', '1', '2024-09-07', '23:57', 'LIBRE', NULL, '2024-09-07 02:57:38', NULL, NULL, '1'),
(22, 'ana', '53897833', 'YGU13F', '1', '2024-09-07', '11:58', 'LIBRE', NULL, '2024-09-07 02:58:45', NULL, NULL, '1'),
(23, 'omar', '1024356932', 'ASD34E', '1', '2024-09-07', '11:58', 'LIBRE', NULL, '2024-09-07 03:17:38', NULL, NULL, '1'),
(24, 'ana', '53897833', 'YGU13F', '1', '2024-09-07', '11:58', 'LIBRE', NULL, '2024-09-07 03:18:02', NULL, NULL, '1'),
(25, 'ana', '53897833', 'YGU13F', '1', '2024-09-07', '12:18', 'LIBRE', NULL, '2024-09-07 03:18:52', NULL, NULL, '1'),
(26, 'omar', '1024356932', 'ASD34E', '1', '2024-09-07', '12:18', 'LIBRE', NULL, '2024-09-07 03:19:22', NULL, NULL, '1'),
(27, 'ana', '53897833', 'YGU13F', '1', '2024-09-09', '13:09', 'LIBRE', NULL, '2024-09-09 03:09:38', NULL, NULL, '1'),
(28, NULL, NULL, 'YGU13F', '1', '2024-09-09', '19:09', 'LIBRE', NULL, '2024-09-09 03:10:59', NULL, NULL, '1'),
(29, 'ana', '53897833', 'YGU13F', '1', '2024-09-09', '07:09', 'LIBRE', NULL, '2024-09-09 03:11:26', NULL, NULL, '1'),
(30, 'ana', '53897833', 'YGU13F', '1', '2024-09-09', '11:12', 'LIBRE', NULL, '2024-09-09 03:12:09', NULL, NULL, '1'),
(31, 'andres', '1022456987', 'JHG65K', '1', '2024-09-10', '06:51', 'LIBRE', NULL, '2024-09-10 08:51:20', NULL, NULL, '1'),
(32, 'anderson', '1022431392', 'BNA701', '1', '2024-09-10', '08:53', 'LIBRE', NULL, '2024-09-10 08:53:35', NULL, NULL, '1'),
(33, 'ana', '53897833', 'YGU13F', '2', '2024-09-10', '09:08', 'LIBRE', NULL, '2024-09-10 09:08:41', NULL, NULL, '1'),
(34, 'omar', '1024356932', 'ASD12Q', '1', '2024-09-10', '10:41', 'LIBRE', NULL, '2024-09-10 10:41:37', NULL, NULL, '1'),
(35, 'cristo', '53897833', 'QWE43R', '3', '2024-09-10', '12:01', 'LIBRE', NULL, '2024-09-10 12:02:03', NULL, NULL, '1'),
(36, 'ana', '53897833', 'YGU13F', '1', '2024-09-10', '15:37', 'OCUPADO', NULL, '2024-09-10 03:37:19', NULL, NULL, '1'),
(37, 'anderson', '1022431392', 'BNA701', '2', '2024-09-10', '09:37', 'LIBRE', NULL, '2024-09-10 03:38:10', NULL, NULL, '1'),
(38, 'anderson', '1022431392', 'BNA701', '2', '2024-09-10', '09:37', 'LIBRE', NULL, '2024-09-10 03:38:55', NULL, NULL, '1');

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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tb_facturaciones`
--
ALTER TABLE `tb_facturaciones`
  MODIFY `id_facturacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `tb_mapeos`
--
ALTER TABLE `tb_mapeos`
  MODIFY `id_map` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tb_precios`
--
ALTER TABLE `tb_precios`
  MODIFY `id_precio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tb_tickets`
--
ALTER TABLE `tb_tickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
