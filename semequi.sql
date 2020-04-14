-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2020 a las 16:54:30
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `semequi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adm_areas`
--

CREATE TABLE `adm_areas` (
  `id` int(11) NOT NULL,
  `clientes_id` int(11) NOT NULL,
  `cod_area` varchar(20) COLLATE utf32_spanish2_ci NOT NULL,
  `nombre_area` varchar(40) COLLATE utf32_spanish2_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `adm_areas`
--

INSERT INTO `adm_areas` (`id`, `clientes_id`, `cod_area`, `nombre_area`, `updated_at`, `created_at`) VALUES
(33, 25, '1', 'PERSONAL', '2020-04-04 10:02:26', '2020-04-04 10:02:26'),
(34, 26, 'AR - 3', 'ADMINISTRACION', '2020-04-04 19:16:40', '2020-04-04 19:16:40'),
(35, 26, 'AR - 4', 'CONTABILIDAD', '2020-04-04 19:16:57', '2020-04-04 19:16:57'),
(36, 26, 'AR - 5', 'SEGURIDAD', '2020-04-04 19:43:45', '2020-04-04 19:43:45'),
(37, 27, '1', 'PERSONAL', '2020-04-05 22:35:54', '2020-04-05 22:35:54'),
(38, 28, '1', 'PERSONAL', '2020-04-05 23:02:02', '2020-04-05 23:02:02'),
(39, 29, '1', 'PERSONAL', '2020-04-05 23:02:28', '2020-04-05 23:02:28'),
(40, 30, '1', 'PERSONAL', '2020-04-05 23:04:03', '2020-04-05 23:04:03'),
(41, 31, '1', 'PERSONAL', '2020-04-05 23:05:46', '2020-04-05 23:05:46'),
(42, 32, '1', 'PERSONAL', '2020-04-05 23:25:08', '2020-04-05 23:25:08'),
(43, 33, '1', 'PERSONAL', '2020-04-05 23:29:50', '2020-04-05 23:29:50'),
(44, 34, '1', 'PERSONAL', '2020-04-05 23:33:27', '2020-04-05 23:33:27'),
(45, 35, '1', 'PERSONAL', '2020-04-05 23:34:03', '2020-04-05 23:34:03'),
(46, 36, '1', 'PERSONAL', '2020-04-05 23:35:35', '2020-04-05 23:35:35'),
(47, 26, 'AR - 6', 'RECURSOS HUMANOS', '2020-04-06 09:16:06', '2020-04-06 09:16:06'),
(48, 26, 'AR - 7', 'INFORMATICA', '2020-04-06 09:18:22', '2020-04-06 09:18:22'),
(49, 37, '1', 'PERSONAL', '2020-04-06 17:03:38', '2020-04-06 17:03:38'),
(50, 38, '1', 'PERSONAL', '2020-04-06 17:04:51', '2020-04-06 17:04:51'),
(51, 26, 'AR - 8', 'DIRECCION', '2020-04-06 17:07:48', '2020-04-06 17:07:48'),
(52, 39, '1', 'PERSONAL', '2020-04-09 06:52:21', '2020-04-09 06:52:21'),
(53, 40, '1', 'PERSONAL', '2020-04-09 06:56:33', '2020-04-09 06:56:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adm_clase_equipo`
--

CREATE TABLE `adm_clase_equipo` (
  `id_clase_equipo` bigint(20) NOT NULL COMMENT 'id de la tabla',
  `nom_clase_equipo` varchar(255) NOT NULL COMMENT 'nombre de la clase de equipo definido por el usuario',
  `des_clase_equipo` varchar(255) NOT NULL,
  `activo` bit(1) DEFAULT NULL COMMENT 'indica si la clase de equipo esta activa o no',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `adm_clase_equipo`
--

INSERT INTO `adm_clase_equipo` (`id_clase_equipo`, `nom_clase_equipo`, `des_clase_equipo`, `activo`, `updated_at`, `created_at`) VALUES
(22, 'MONITOR 20\'\'', 'PANTALLA LCD', b'1', '2020-04-04 10:44:39', '2020-04-04 10:44:39'),
(23, 'DISPOSITIVO DE ENTRADA', 'COMPUTO', b'1', '2020-04-04 10:45:08', '2020-04-04 10:45:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adm_clientes`
--

CREATE TABLE `adm_clientes` (
  `id` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `cod_cliente` varchar(40) COLLATE utf32_spanish2_ci NOT NULL,
  `nom_cliente` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `nit_cliente` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `tipo_cliente` varchar(30) COLLATE utf32_spanish2_ci NOT NULL,
  `dir_cliente` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `tel_cliente` varchar(20) COLLATE utf32_spanish2_ci DEFAULT NULL,
  `cel_cliente` varchar(20) COLLATE utf32_spanish2_ci DEFAULT NULL,
  `correo_cliente` varchar(50) COLLATE utf32_spanish2_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf32_spanish2_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `adm_clientes`
--

INSERT INTO `adm_clientes` (`id`, `id_municipio`, `cod_cliente`, `nom_cliente`, `nit_cliente`, `tipo_cliente`, `dir_cliente`, `tel_cliente`, `cel_cliente`, `correo_cliente`, `status`, `updated_at`, `created_at`) VALUES
(25, 1, 'CL - 13', 'DIONIS ENRRIQUE', '15725557', 'NATURAL', 'MARHUANTA', NULL, NULL, NULL, 'ACTIVO', '2020-04-04 11:01:17', '2020-04-04 10:02:26'),
(26, 1, 'CL - 14', 'LOS CRIOLLITOS', '54450354', 'JURIDICO', 'LA PARAGUA', '02856597412', NULL, NULL, 'ACTIVO', '2020-04-04 11:01:36', '2020-04-04 10:03:46'),
(27, 2, 'CL - 15', 'DIODIMAR HERNANDEZ', '30123456', 'NATURAL', 'MARHUANTA', '04258741236', '024158963214', 'DIODI_HER_04@HOTMAIL.COM', 'ACTIVO', '2020-04-05 22:35:53', '2020-04-05 22:35:53'),
(28, 1, 'CL - 16', 'DILCIA VASQUEZ', '13156829', 'NATURAL', 'MARHUANTA', NULL, NULL, NULL, 'ACTIVO', '2020-04-05 23:02:02', '2020-04-05 23:02:02'),
(29, 1, 'CL - 16', 'DILCIA VASQUEZ', '13156829', 'NATURAL', 'MARHUANTA', NULL, NULL, NULL, 'INACTIVO', '2020-04-07 15:46:25', '2020-04-05 23:02:28'),
(30, 1, 'CL - 16', 'DILCIA VASQUEZ', '13156829', 'NATURAL', 'MARHUANTA', NULL, NULL, NULL, 'ACTIVO', '2020-04-05 23:04:02', '2020-04-05 23:04:02'),
(31, 1, 'CL - 17', 'DIOHANNI', '32458745', 'NATURAL', 'MARHUANTA', NULL, NULL, NULL, 'ACTIVO', '2020-04-05 23:05:46', '2020-04-05 23:05:46'),
(32, 1, 'CL - 17', 'LEUDYS GIMON', '11556411', 'NATURAL', 'LAS MOREAS', NULL, NULL, NULL, 'ACTIVO', '2020-04-05 23:25:08', '2020-04-05 23:25:08'),
(33, 1, 'CL - 17', 'MARIA AGUILERA', '1254789', 'NATURAL', 'BARRIO ANGOSTURA', NULL, NULL, NULL, 'ACTIVO', '2020-04-05 23:29:50', '2020-04-05 23:29:50'),
(34, 1, 'CL - 18', 'RAUL FLORES', '5846546', 'NATURAL', 'BARRIO ANGOSTURA', NULL, NULL, NULL, 'ACTIVO', '2020-04-05 23:33:27', '2020-04-05 23:33:27'),
(35, 1, 'CL - 19', 'YESENIA VASQUEZ', '15742896', 'NATURAL', 'BLOQUES DE LA PARAGUA', NULL, NULL, NULL, 'ACTIVO', '2020-04-05 23:34:03', '2020-04-05 23:34:03'),
(36, 1, 'CL - 20', 'MELVIS FLORES', '14789541', 'NATURAL', 'BARRIO ANGOSTURA', NULL, NULL, NULL, 'ACTIVO', '2020-04-05 23:35:35', '2020-04-05 23:35:35'),
(37, 1, 'CL - 21', 'JESUS VASQUEZ', '25423945', 'NATURAL', 'MARHUANTA', NULL, NULL, NULL, 'ACTIVO', '2020-04-06 17:03:38', '2020-04-06 17:03:38'),
(38, 1, 'CL - 22', 'LARRY FLORES', '15725557', 'NATURAL', 'BARRIO ANGOSTURA', NULL, NULL, NULL, 'ACTIVO', '2020-04-06 17:04:51', '2020-04-06 17:04:51'),
(39, 1, 'CL - 23', 'ADRIAN PEREZ', '25789412', 'NATURAL', 'MARHUANTA', NULL, NULL, NULL, 'ACTIVO', '2020-04-09 06:52:21', '2020-04-09 06:52:21'),
(40, 1, 'CL - 24', 'DANIEL PEREZ', '26870778', 'NATURAL', 'MARHUANTA', NULL, NULL, NULL, 'ACTIVO', '2020-04-09 06:56:33', '2020-04-09 06:56:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adm_consecutivo`
--

CREATE TABLE `adm_consecutivo` (
  `id_adm_consecutivo` bigint(20) NOT NULL COMMENT 'id de la tabla',
  `prefijo_doc` varchar(10) DEFAULT NULL COMMENT 'letras que se ante ponen al numero del documento. por ejemplo FV factura de venta OS orden de trabajo etc',
  `nom_consecutivo` varchar(255) DEFAULT NULL COMMENT 'descripcin de a que documento se aplicara este consecutivo',
  `num_ini` decimal(10,0) DEFAULT NULL COMMENT 'numero a partir del cual inicia el rango',
  `num_actual` decimal(10,0) DEFAULT NULL COMMENT 'numero donde va la secuencia',
  `num_final` decimal(10,0) DEFAULT NULL COMMENT 'numero final de la secuencia',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `adm_consecutivo`
--

INSERT INTO `adm_consecutivo` (`id_adm_consecutivo`, `prefijo_doc`, `nom_consecutivo`, `num_ini`, `num_actual`, `num_final`, `updated_at`, `created_at`) VALUES
(4, 'ORD', 'ORDEN', '100', '110', '99999', '2020-04-13 21:22:15', '2020-03-28 02:27:25'),
(5, 'FAC', 'FACTURACION', '1', '7', '99999', '2020-04-14 15:11:34', '2020-03-28 02:27:59'),
(6, 'COT', 'COTIZACION', '1', '53', '99999', '2020-04-13 23:36:55', '2020-03-29 01:19:26'),
(7, 'CL', 'CLIENTES', '1', '25', '99999', '2020-04-09 06:56:33', '2020-03-29 01:32:14'),
(8, 'EQ', 'EQUIPOS', '1', '4', '99999', '2020-04-04 10:45:37', '2020-03-29 18:41:52'),
(9, 'AR', 'AREAS', '1', '9', '99999', '2020-04-06 17:07:48', '2020-04-03 02:11:30'),
(10, 'IT', 'ITEMS', '1', '12', '99999', '2020-04-13 18:47:19', '2020-04-03 04:59:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adm_dep_muncipio`
--

CREATE TABLE `adm_dep_muncipio` (
  `id_adm_dep_muncipio` bigint(20) NOT NULL COMMENT 'id de la tabla',
  `id_departamento` decimal(10,0) NOT NULL COMMENT 'id del departamento',
  `cod_departamento` varchar(255) DEFAULT NULL COMMENT 'codigo del departamento',
  `nom_departamento` varchar(255) DEFAULT NULL COMMENT 'nombre del departamento',
  `id_muncipio` decimal(10,0) DEFAULT NULL COMMENT 'id del municipio',
  `cod_municipio` varchar(255) DEFAULT NULL COMMENT 'codigo del municipio',
  `nom_muncipio` varchar(255) DEFAULT NULL COMMENT 'nombre del municipio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Almacena departamentos y muncipios del pais NO REQUIERE CRUD';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adm_empresa`
--

CREATE TABLE `adm_empresa` (
  `id_empresa` int(11) NOT NULL COMMENT 'identificador de la empresa auto generado o el ultimo mas 1',
  `id_municipio` int(11) NOT NULL COMMENT 'id del municipio donde esta ubicada la empresa',
  `cod_empresa` varchar(255) DEFAULT NULL COMMENT 'codigo de la empresa definido por el administrador',
  `nit_empresa` varchar(255) NOT NULL COMMENT 'numero de identificador tributario',
  `nom_empresa` varchar(255) NOT NULL COMMENT 'nombre de la empresa',
  `dir_empresa` varchar(255) DEFAULT NULL COMMENT 'direccion de la empresa',
  `tel_empresa` varchar(255) DEFAULT NULL COMMENT 'telefono de la empresa',
  `cel_empresa` varchar(255) DEFAULT NULL COMMENT 'celular de la empresa ',
  `mail` varchar(255) DEFAULT NULL COMMENT 'correo de la empresa',
  `logo` varchar(255) DEFAULT NULL COMMENT 'logotipo de la empresa',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `adm_empresa`
--

INSERT INTO `adm_empresa` (`id_empresa`, `id_municipio`, `cod_empresa`, `nit_empresa`, `nom_empresa`, `dir_empresa`, `tel_empresa`, `cel_empresa`, `mail`, `logo`, `updated_at`, `created_at`) VALUES
(4, 1, '123', '3321', 'REPARACIONES DIO', 'wqdq', '02850956065', '042494285241', 'sadcASD@gmail.com', 'Hydrangeas.jpg', '2020-04-13 07:47:59', '2020-04-13 06:20:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adm_equipo`
--

CREATE TABLE `adm_equipo` (
  `id_equipo` bigint(20) NOT NULL COMMENT 'identificador del equipo',
  `id_clase_equipo` bigint(20) NOT NULL,
  `cod_equipo` varchar(255) DEFAULT NULL COMMENT 'codigo del equipo definido por el usuario',
  `nom_equipo` varchar(255) DEFAULT NULL COMMENT 'nombre del equipo',
  `marca` varchar(255) DEFAULT NULL COMMENT 'marca del equipo',
  `caracteristica_equipo` text DEFAULT NULL COMMENT 'caracteristicas del equipo',
  `activo` bit(1) DEFAULT NULL COMMENT 'indica si el equipo esta activo o  no',
  `obs_equipo` text DEFAULT NULL COMMENT 'observaciones del equipo',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `adm_equipo`
--

INSERT INTO `adm_equipo` (`id_equipo`, `id_clase_equipo`, `cod_equipo`, `nom_equipo`, `marca`, `caracteristica_equipo`, `activo`, `obs_equipo`, `updated_at`, `created_at`) VALUES
(8, 23, 'EQ - 3', 'MONITOR 20\"', 'HP', 'LCD', b'1', 'NADA', '2020-04-04 11:03:09', '2020-04-04 10:45:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adm_item`
--

CREATE TABLE `adm_item` (
  `id_item` bigint(20) NOT NULL COMMENT 'id de la tabla',
  `cod_item` varchar(255) DEFAULT NULL COMMENT 'codigo del item ',
  `nom_item` varchar(255) DEFAULT NULL COMMENT 'nombre del item',
  `precio_compra` float DEFAULT NULL COMMENT 'valor del item',
  `precio_venta` float DEFAULT NULL,
  `servicio` bit(1) DEFAULT NULL COMMENT 'indica si es un servicio en TRUE y FALSE para productos',
  `activo` bit(1) DEFAULT NULL COMMENT 'indica si el item esta activo o no por defecto al crearlo es TRUE',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla de donde se almacenan los productos y servicios.';

--
-- Volcado de datos para la tabla `adm_item`
--

INSERT INTO `adm_item` (`id_item`, `cod_item`, `nom_item`, `precio_compra`, `precio_venta`, `servicio`, `activo`, `updated_at`, `created_at`) VALUES
(8, 'IT - 1', 'MANTENIMIENTO CORRECTIVO', NULL, 25, b'1', b'1', '2020-04-04 11:32:04', '2020-04-03 05:13:00'),
(9, 'IT - 1', 'MANTENIMIENTO PREVENTIVO', NULL, 30, b'1', b'1', '2020-04-04 11:32:58', '2020-04-03 05:14:53'),
(10, 'IT - 2', 'REBALING', NULL, 45, b'1', b'1', '2020-04-04 11:33:16', '2020-04-03 05:16:08'),
(11, 'IT - 3', 'LAVADO QUIMICO', NULL, 80, b'1', b'1', '2020-04-04 11:33:28', '2020-04-03 05:17:01'),
(12, 'IT - 4', 'REPARACION DE CORNETAS', NULL, 20, b'1', b'1', '2020-04-04 11:33:39', '2020-04-03 05:18:12'),
(13, 'IT - 5', 'REPARACION DE PANTALLA', 40, 70, b'1', b'1', '2020-04-04 11:21:21', '2020-04-04 11:21:21'),
(18, 'IT - 6', 'MANTENIMIENTO TV', 2000, 4000, b'1', b'1', '2020-04-06 09:50:54', '2020-04-06 09:50:54'),
(19, 'IT - 7', 'REPARACION DE CONDENSADORES', 10000, 20000, b'1', b'1', '2020-04-06 17:43:23', '2020-04-06 17:43:23'),
(20, 'IT - 8', '42', 1, 111, b'1', b'1', '2020-04-08 10:12:02', '2020-04-08 10:12:02'),
(21, 'IT - 9', 'CACXASCDASC', 10, 5, b'1', b'1', '2020-04-09 03:05:18', '2020-04-09 03:05:18'),
(22, 'IT - 10', 'MANTENIMIENTO PRUEBA', 10, 20, b'1', b'1', '2020-04-09 23:47:49', '2020-04-09 23:47:49'),
(23, 'IT - 11', 'PRUEBA PRUEBA', 10, 70, b'1', b'1', '2020-04-13 18:47:19', '2020-04-13 18:47:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `id_cotizacion` int(11) NOT NULL,
  `cod_cotizacion` varchar(20) COLLATE utf32_spanish2_ci NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `total` varchar(20) COLLATE utf32_spanish2_ci NOT NULL,
  `estado` varchar(20) COLLATE utf32_spanish2_ci NOT NULL,
  `forma_pago` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `observacion` varchar(255) COLLATE utf32_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`id_cotizacion`, `cod_cotizacion`, `cliente_id`, `total`, `estado`, `forma_pago`, `observacion`, `updated_at`, `created_at`) VALUES
(15, 'COT - 11', 25, '60', 'ANULADA', '', NULL, '2020-04-04 15:13:00', '2020-04-04 10:47:04'),
(16, 'COT - 13', 26, '170', 'PENDIENTE', '', NULL, '2020-04-04 19:23:24', '2020-04-04 19:23:24'),
(17, 'COT - 14', 26, '175', 'PROCESADA/FACTURA', '', NULL, '2020-04-06 18:16:46', '2020-04-04 20:02:30'),
(18, 'COT - 15', 25, '160', 'PROCESADA/FACTURA', '', NULL, '2020-04-06 19:26:12', '2020-04-05 03:49:53'),
(19, 'COT - 16', 26, '120', 'PENDIENTE', '', NULL, '2020-04-07 10:40:03', '2020-04-07 10:40:03'),
(20, 'COT - 16', 26, '120', 'PENDIENTE', '', NULL, '2020-04-07 10:42:03', '2020-04-07 10:42:03'),
(21, 'COT - 17', 26, '160', 'PENDIENTE', '', NULL, '2020-04-07 10:44:09', '2020-04-07 10:44:09'),
(22, 'COT - 18', 26, '80', 'PENDIENTE', '', NULL, '2020-04-10 01:16:42', '2020-04-10 01:16:42'),
(23, 'COT - 18', 26, '80', 'PENDIENTE', '', NULL, '2020-04-10 01:18:37', '2020-04-10 01:18:37'),
(24, 'COT - 18', 26, '80', 'PENDIENTE', '', NULL, '2020-04-10 01:21:18', '2020-04-10 01:21:18'),
(25, 'COT - 19', 25, '45', 'PENDIENTE', '', NULL, '2020-04-10 01:34:22', '2020-04-10 01:34:22'),
(26, 'COT - 19', 25, '45', 'PENDIENTE', '', NULL, '2020-04-10 01:37:02', '2020-04-10 01:37:02'),
(27, 'COT - 20', 34, '80', 'PENDIENTE', '', NULL, '2020-04-10 01:58:05', '2020-04-10 01:58:05'),
(28, 'COT - 20', 34, '80', 'PENDIENTE', '', NULL, '2020-04-10 01:58:09', '2020-04-10 01:58:09'),
(29, 'COT - 21', 26, '80', 'PENDIENTE', '', NULL, '2020-04-11 22:35:47', '2020-04-11 22:35:47'),
(30, 'COT - 22', 34, '80', 'PENDIENTE', '', NULL, '2020-04-11 18:38:49', '2020-04-11 18:38:49'),
(31, 'COT - 23', 31, '20', 'PENDIENTE', '', NULL, '2020-04-13 14:31:38', '2020-04-13 14:31:38'),
(32, 'COT - 23', 31, '20', 'PENDIENTE', '', NULL, '2020-04-13 15:55:48', '2020-04-13 15:55:48'),
(33, 'COT - 23', 25, '45', 'PENDIENTE', '', NULL, '2020-04-13 15:57:04', '2020-04-13 15:57:04'),
(34, 'COT - 23', 25, '45', 'PENDIENTE', '', NULL, '2020-04-13 15:59:08', '2020-04-13 15:59:08'),
(35, 'COT - 24', 26, '25', 'PENDIENTE', '', NULL, '2020-04-13 16:00:06', '2020-04-13 16:00:06'),
(36, 'COT - 25', 25, '80', 'PENDIENTE', '', NULL, '2020-04-13 16:01:20', '2020-04-13 16:01:20'),
(37, 'COT - 25', 25, '80', 'PENDIENTE', '', NULL, '2020-04-13 16:01:25', '2020-04-13 16:01:25'),
(38, 'COT - 25', 25, '20', 'PENDIENTE', '', NULL, '2020-04-13 16:02:05', '2020-04-13 16:02:05'),
(39, 'COT - 25', 28, '25', 'PENDIENTE', '', NULL, '2020-04-13 16:07:35', '2020-04-13 16:07:35'),
(40, 'COT - 26', 39, '20', 'PROCESADA/FACTURA', '', NULL, '2020-04-13 22:49:01', '2020-04-13 16:13:51'),
(41, 'COT - 27', 39, '4020', 'PENDIENTE', '', NULL, '2020-04-13 16:30:58', '2020-04-13 16:30:58'),
(42, 'COT - 28', 26, '40', 'PENDIENTE', '', NULL, '2020-04-13 16:33:10', '2020-04-13 16:33:10'),
(43, 'COT - 29', 31, '45', 'PROCESADA/ORDEN', '', NULL, '2020-04-13 21:21:18', '2020-04-13 16:39:20'),
(44, 'COT - 30', 39, '45', 'PENDIENTE', '', NULL, '2020-04-13 16:41:03', '2020-04-13 16:41:03'),
(45, 'COT - 31', 39, '45', 'PENDIENTE', '', NULL, '2020-04-13 16:51:23', '2020-04-13 16:51:23'),
(46, 'COT - 32', 28, '25', 'PENDIENTE', '', NULL, '2020-04-13 16:52:22', '2020-04-13 16:52:22'),
(47, 'COT - 33', 32, '30', 'PENDIENTE', '', NULL, '2020-04-13 17:00:15', '2020-04-13 17:00:15'),
(48, 'COT - 34', 32, '30', 'PENDIENTE', '', NULL, '2020-04-13 17:01:20', '2020-04-13 17:01:20'),
(49, 'COT - 35', 29, '80', 'PENDIENTE', '', NULL, '2020-04-13 17:07:55', '2020-04-13 17:07:55'),
(50, 'COT - 36', 34, '45', 'PENDIENTE', '', NULL, '2020-04-13 17:11:42', '2020-04-13 17:11:42'),
(51, 'COT - 37', 27, '20', 'PROCESADA/FACTURA', '', NULL, '2020-04-13 22:41:10', '2020-04-13 17:19:06'),
(52, 'COT - 37', 28, '105', 'PENDIENTE', '', NULL, '2020-04-13 17:19:52', '2020-04-13 17:19:52'),
(53, 'COT - 37', 28, '20', 'PENDIENTE', '', NULL, '2020-04-13 17:20:33', '2020-04-13 17:20:33'),
(54, 'COT - 38', 27, '30', 'PROCESADA/FACTURA', '', NULL, '2020-04-13 22:44:19', '2020-04-13 17:25:41'),
(55, 'COT - 39', 28, '20', 'PENDIENTE', '', NULL, '2020-04-13 17:27:57', '2020-04-13 17:27:57'),
(56, 'COT - 39', 32, '80', 'PENDIENTE', '', NULL, '2020-04-13 17:28:25', '2020-04-13 17:28:25'),
(57, 'COT - 39', 26, '40', 'PENDIENTE', '', NULL, '2020-04-13 17:30:14', '2020-04-13 17:30:14'),
(58, 'COT - 40', 26, '120', 'PENDIENTE', '', NULL, '2020-04-13 17:30:55', '2020-04-13 17:30:55'),
(59, 'COT - 41', 26, '80', 'PENDIENTE', '', NULL, '2020-04-13 17:33:58', '2020-04-13 17:33:58'),
(60, 'COT - 42', 28, '45', 'PENDIENTE', '', NULL, '2020-04-13 18:42:38', '2020-04-13 18:42:38'),
(61, 'COT - 42', 25, '80', 'PENDIENTE', '', NULL, '2020-04-13 18:43:39', '2020-04-13 18:43:39'),
(62, 'COT - 43', 26, '100', 'PENDIENTE', '', NULL, '2020-04-13 18:50:06', '2020-04-13 18:44:15'),
(63, 'COT - 44', 28, '25', 'PENDIENTE', '', NULL, '2020-04-13 19:29:44', '2020-04-13 19:29:44'),
(64, 'COT - 45', 32, '30', 'PENDIENTE', '', NULL, '2020-04-13 19:33:02', '2020-04-13 19:33:02'),
(65, 'COT - 46', 25, '30', 'PENDIENTE', '', NULL, '2020-04-13 19:46:21', '2020-04-13 19:46:21'),
(66, 'COT - 47', 25, '30', 'PENDIENTE', '', NULL, '2020-04-13 19:53:10', '2020-04-13 19:53:10'),
(67, 'COT - 48', 28, '45', 'PENDIENTE', '', NULL, '2020-04-13 20:00:35', '2020-04-13 20:00:35'),
(68, 'COT - 49', 25, '70', 'PROCESADA/ORDEN', '', NULL, '2020-04-13 21:20:19', '2020-04-13 20:05:21'),
(69, 'COT - 50', 28, '4000', 'PENDIENTE', '', NULL, '2020-04-13 20:07:00', '2020-04-13 20:07:00'),
(70, 'COT - 51', 27, '30', 'PROCESADA/FACTURA', 'EFECTIVO', 'PRUEBA DE OBSERVACION', '2020-04-14 15:11:33', '2020-04-13 23:24:05'),
(71, 'COT - 52', 32, '25', 'PENDIENTE', 'EFECTIVO', 'RD 576', '2020-04-13 23:36:55', '2020-04-13 23:36:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `nom_departamento` varchar(40) COLLATE utf32_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nom_departamento`) VALUES
(1, 'PASTO'),
(3, 'PRUEBA'),
(4, 'PRUEBA 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_cotizacion`
--

CREATE TABLE `detalles_cotizacion` (
  `id_detalle_cotizacion` int(11) NOT NULL,
  `cotizacion_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `equipo_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `valor_unitario` varchar(40) COLLATE utf32_spanish2_ci NOT NULL,
  `valor_total` varchar(40) COLLATE utf32_spanish2_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `detalles_cotizacion`
--

INSERT INTO `detalles_cotizacion` (`id_detalle_cotizacion`, `cotizacion_id`, `cantidad`, `area_id`, `equipo_id`, `item_id`, `valor_unitario`, `valor_total`, `updated_at`, `created_at`) VALUES
(18, 15, 2, 0, 8, 9, '30', '60', '2020-04-04 10:47:05', '2020-04-04 10:47:05'),
(19, 16, 2, 0, 8, 10, '45', '90', '2020-04-04 19:23:24', '2020-04-04 19:23:24'),
(20, 16, 1, 0, 8, 11, '80', '80', '2020-04-04 19:23:25', '2020-04-04 19:23:25'),
(21, 17, 2, 34, 8, 9, '30', '60', '2020-04-04 20:02:30', '2020-04-04 20:02:30'),
(22, 17, 1, 35, 8, 10, '45', '45', '2020-04-04 20:02:30', '2020-04-04 20:02:30'),
(23, 17, 1, 36, 8, 13, '70', '70', '2020-04-04 20:02:30', '2020-04-04 20:02:30'),
(24, 18, 2, 33, 8, 11, '80', '160', '2020-04-05 03:49:55', '2020-04-05 03:49:55'),
(25, 19, 1, 35, 8, 12, '30', '30', '2020-04-07 10:40:03', '2020-04-07 10:40:03'),
(26, 19, 1, 35, 8, 13, '90', '90', '2020-04-07 10:40:03', '2020-04-07 10:40:03'),
(27, 20, 1, 35, 8, 12, '30', '30', '2020-04-07 10:42:04', '2020-04-07 10:42:04'),
(28, 20, 1, 35, 8, 13, '90', '90', '2020-04-07 10:42:04', '2020-04-07 10:42:04'),
(29, 21, 1, 34, 8, 12, '40', '40', '2020-04-07 10:44:09', '2020-04-07 10:44:09'),
(30, 21, 1, 34, 8, 13, '120', '120', '2020-04-07 10:44:10', '2020-04-07 10:44:10'),
(31, 22, 1, 36, 8, 11, '80', '80', '2020-04-10 01:16:42', '2020-04-10 01:16:42'),
(32, 23, 1, 36, 8, 11, '80', '80', '2020-04-10 01:18:38', '2020-04-10 01:18:38'),
(33, 24, 1, 36, 8, 11, '80', '80', '2020-04-10 01:21:18', '2020-04-10 01:21:18'),
(34, 25, 1, 33, 8, 10, '45', '45', '2020-04-10 01:34:22', '2020-04-10 01:34:22'),
(35, 26, 1, 33, 8, 10, '45', '45', '2020-04-10 01:37:02', '2020-04-10 01:37:02'),
(36, 27, 1, 44, 8, 11, '80', '80', '2020-04-10 01:58:05', '2020-04-10 01:58:05'),
(37, 28, 1, 44, 8, 11, '80', '80', '2020-04-10 01:58:09', '2020-04-10 01:58:09'),
(38, 29, 1, 35, 8, 11, '80', '80', '2020-04-11 22:35:48', '2020-04-11 22:35:48'),
(39, 30, 1, 44, 8, 11, '80', '80', '2020-04-11 18:38:50', '2020-04-11 18:38:50'),
(40, 33, 1, 33, 8, 10, '45', '45', '2020-04-13 15:57:04', '2020-04-13 15:57:04'),
(41, 34, 1, 33, 8, 10, '45', '45', '2020-04-13 15:59:08', '2020-04-13 15:59:08'),
(42, 35, 1, 34, 8, 8, '25', '25', '2020-04-13 16:00:06', '2020-04-13 16:00:06'),
(43, 38, 1, 33, 8, 12, '20', '20', '2020-04-13 16:02:05', '2020-04-13 16:02:05'),
(44, 39, 1, 38, 8, 8, '25', '25', '2020-04-13 16:07:35', '2020-04-13 16:07:35'),
(45, 40, 1, 52, 8, 12, '20', '20', '2020-04-13 16:13:51', '2020-04-13 16:13:51'),
(46, 41, 1, 52, 8, 12, '20', '20', '2020-04-13 16:30:58', '2020-04-13 16:30:58'),
(47, 41, 1, 52, 8, 18, '4000', '4000', '2020-04-13 16:30:58', '2020-04-13 16:30:58'),
(48, 42, 1, 48, 8, 12, '40', '40', '2020-04-13 16:33:10', '2020-04-13 16:33:10'),
(49, 43, 1, 41, 8, 10, '45', '45', '2020-04-13 16:39:20', '2020-04-13 16:39:20'),
(50, 44, 1, 52, 8, 10, '45', '45', '2020-04-13 16:41:04', '2020-04-13 16:41:04'),
(51, 45, 1, 52, 8, 10, '45', '45', '2020-04-13 16:51:23', '2020-04-13 16:51:23'),
(52, 46, 1, 38, 8, 8, '25', '25', '2020-04-13 16:52:22', '2020-04-13 16:52:22'),
(53, 47, 1, 42, 8, 9, '30', '30', '2020-04-13 17:00:15', '2020-04-13 17:00:15'),
(54, 48, 1, 42, 8, 9, '30', '30', '2020-04-13 17:01:20', '2020-04-13 17:01:20'),
(55, 49, 1, 39, 8, 11, '80', '80', '2020-04-13 17:07:55', '2020-04-13 17:07:55'),
(56, 50, 1, 44, 8, 10, '45', '45', '2020-04-13 17:11:42', '2020-04-13 17:11:42'),
(57, 51, 1, 37, 8, 12, '20', '20', '2020-04-13 17:19:06', '2020-04-13 17:19:06'),
(58, 52, 1, 38, 8, 8, '25', '25', '2020-04-13 17:19:52', '2020-04-13 17:19:52'),
(59, 52, 1, 38, 8, 11, '80', '80', '2020-04-13 17:19:52', '2020-04-13 17:19:52'),
(60, 53, 1, 38, 8, 12, '20', '20', '2020-04-13 17:20:33', '2020-04-13 17:20:33'),
(61, 54, 1, 37, 8, 9, '30', '30', '2020-04-13 17:25:42', '2020-04-13 17:25:42'),
(62, 55, 1, 38, 8, 12, '20', '20', '2020-04-13 17:27:58', '2020-04-13 17:27:58'),
(63, 56, 1, 42, 8, 11, '80', '80', '2020-04-13 17:28:25', '2020-04-13 17:28:25'),
(64, 57, 1, 48, 8, 12, '40', '40', '2020-04-13 17:30:14', '2020-04-13 17:30:14'),
(65, 58, 1, 48, 8, 13, '120', '120', '2020-04-13 17:30:55', '2020-04-13 17:30:55'),
(66, 59, 1, 36, 8, 11, '80', '80', '2020-04-13 17:33:58', '2020-04-13 17:33:58'),
(67, 60, 1, 38, 8, 10, '45', '45', '2020-04-13 18:42:38', '2020-04-13 18:42:38'),
(68, 61, 1, 37, 8, 11, '80', '80', '2020-04-13 18:43:39', '2020-04-13 18:43:39'),
(70, 62, 1, 36, 8, 22, '20', '20', '2020-04-13 18:50:06', '2020-04-13 18:50:06'),
(71, 63, 1, 38, 8, 8, '25', '25', '2020-04-13 19:29:44', '2020-04-13 19:29:44'),
(72, 64, 1, 42, 8, 9, '30', '30', '2020-04-13 19:33:02', '2020-04-13 19:33:02'),
(73, 65, 1, 33, 8, 9, '30', '30', '2020-04-13 19:46:21', '2020-04-13 19:46:21'),
(74, 66, 1, 33, 8, 9, '30', '30', '2020-04-13 19:53:10', '2020-04-13 19:53:10'),
(75, 67, 1, 38, 8, 10, '45', '45', '2020-04-13 20:00:35', '2020-04-13 20:00:35'),
(76, 68, 1, 33, 8, 13, '70', '70', '2020-04-13 20:05:21', '2020-04-13 20:05:21'),
(77, 69, 1, 38, 8, 18, '4000', '4000', '2020-04-13 20:07:01', '2020-04-13 20:07:01'),
(78, 70, 1, 37, 8, 9, '30', '30', '2020-04-13 23:24:05', '2020-04-13 23:24:05'),
(79, 71, 1, 42, 8, 8, '25', '25', '2020-04-13 23:36:55', '2020-04-13 23:36:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_factura`
--

CREATE TABLE `detalles_factura` (
  `id` int(11) NOT NULL,
  `factura_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `cantidad` varchar(20) COLLATE utf32_spanish2_ci NOT NULL,
  `equipo_id` int(11) NOT NULL,
  `valor_unitario` varchar(20) COLLATE utf32_spanish2_ci NOT NULL,
  `valor_total` varchar(20) COLLATE utf32_spanish2_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `detalles_factura`
--

INSERT INTO `detalles_factura` (`id`, `factura_id`, `item_id`, `area_id`, `cantidad`, `equipo_id`, `valor_unitario`, `valor_total`, `updated_at`, `created_at`) VALUES
(26, 5, 1, 0, '2', 1, '64.5', '129', '2020-04-04 09:27:50', '2020-04-04 09:27:50'),
(27, 5, 8, 0, '2', 1, '25', '50', '2020-04-04 09:27:50', '2020-04-04 09:27:50'),
(28, 6, 12, 0, '5', 1, '20', '100', '2020-04-04 09:36:24', '2020-04-04 09:36:24'),
(29, 6, 8, 0, '3', 2, '25', '75', '2020-04-04 09:36:24', '2020-04-04 09:36:24'),
(30, 6, 2, 0, '2', 1, '23.9', '47.8', '2020-04-04 09:36:24', '2020-04-04 09:36:24'),
(31, 6, 4, 0, '4', 3, '12', '48', '2020-04-04 09:36:24', '2020-04-04 09:36:24'),
(32, 6, 8, 0, '2', 1, '25', '50', '2020-04-04 09:36:24', '2020-04-04 09:36:24'),
(33, 7, 12, 0, '5', 1, '20', '100', '2020-04-04 09:37:52', '2020-04-04 09:37:52'),
(34, 7, 8, 0, '3', 2, '25', '75', '2020-04-04 09:37:52', '2020-04-04 09:37:52'),
(35, 7, 2, 0, '2', 1, '23.9', '47.8', '2020-04-04 09:37:52', '2020-04-04 09:37:52'),
(36, 7, 4, 0, '4', 3, '12', '48', '2020-04-04 09:37:52', '2020-04-04 09:37:52'),
(37, 7, 8, 0, '2', 1, '25', '50', '2020-04-04 09:37:52', '2020-04-04 09:37:52'),
(38, 8, 12, 0, '5', 1, '20', '100', '2020-04-04 09:38:51', '2020-04-04 09:38:51'),
(39, 8, 8, 0, '3', 2, '25', '75', '2020-04-04 09:38:51', '2020-04-04 09:38:51'),
(40, 8, 2, 0, '2', 1, '23.9', '47.8', '2020-04-04 09:38:51', '2020-04-04 09:38:51'),
(41, 8, 4, 0, '4', 3, '12', '48', '2020-04-04 09:38:51', '2020-04-04 09:38:51'),
(42, 8, 8, 0, '2', 1, '25', '50', '2020-04-04 09:38:51', '2020-04-04 09:38:51'),
(43, 9, 12, 0, '5', 1, '20', '100', '2020-04-04 09:39:36', '2020-04-04 09:39:36'),
(44, 9, 8, 0, '3', 2, '25', '75', '2020-04-04 09:39:36', '2020-04-04 09:39:36'),
(45, 9, 2, 0, '2', 1, '23.9', '47.8', '2020-04-04 09:39:36', '2020-04-04 09:39:36'),
(46, 9, 4, 0, '4', 3, '12', '48', '2020-04-04 09:39:37', '2020-04-04 09:39:37'),
(47, 9, 8, 0, '2', 1, '25', '50', '2020-04-04 09:39:37', '2020-04-04 09:39:37'),
(48, 10, 12, 0, '5', 1, '20', '100', '2020-04-04 09:40:11', '2020-04-04 09:40:11'),
(49, 10, 8, 0, '3', 2, '25', '75', '2020-04-04 09:40:11', '2020-04-04 09:40:11'),
(50, 10, 2, 0, '2', 1, '23.9', '47.8', '2020-04-04 09:40:11', '2020-04-04 09:40:11'),
(51, 10, 4, 0, '4', 3, '12', '48', '2020-04-04 09:40:11', '2020-04-04 09:40:11'),
(52, 10, 8, 0, '2', 1, '25', '50', '2020-04-04 09:40:11', '2020-04-04 09:40:11'),
(53, 11, 9, 0, '2', 8, '30', '60', '2020-04-06 17:55:21', '2020-04-06 17:55:21'),
(54, 12, 9, 0, '2', 8, '30', '60', '2020-04-06 18:00:20', '2020-04-06 18:00:20'),
(55, 12, 10, 0, '1', 8, '45', '45', '2020-04-06 18:00:20', '2020-04-06 18:00:20'),
(56, 12, 13, 0, '1', 8, '70', '70', '2020-04-06 18:00:21', '2020-04-06 18:00:21'),
(57, 12, 11, 0, '2', 8, '80', '160', '2020-04-06 18:00:21', '2020-04-06 18:00:21'),
(58, 12, 10, 0, '1', 8, '45', '45', '2020-04-06 18:00:21', '2020-04-06 18:00:21'),
(59, 12, 10, 0, '1', 8, '45', '45', '2020-04-06 18:00:21', '2020-04-06 18:00:21'),
(60, 12, 11, 0, '2', 8, '80', '160', '2020-04-06 18:00:21', '2020-04-06 18:00:21'),
(61, 12, 13, 0, '3', 8, '70', '210', '2020-04-06 18:00:21', '2020-04-06 18:00:21'),
(62, 12, 18, 0, '1', 8, '4000', '4000', '2020-04-06 18:00:21', '2020-04-06 18:00:21'),
(63, 14, 9, 3, '2', 8, '30', '60', '2020-04-06 18:03:30', '2020-04-06 18:03:30'),
(64, 14, 10, 4, '1', 8, '45', '45', '2020-04-06 18:03:30', '2020-04-06 18:03:30'),
(65, 15, 9, 34, '2', 8, '30', '60', '2020-04-06 18:16:46', '2020-04-06 18:16:46'),
(66, 15, 10, 35, '1', 8, '45', '45', '2020-04-06 18:16:46', '2020-04-06 18:16:46'),
(67, 15, 13, 36, '1', 8, '70', '70', '2020-04-06 18:16:46', '2020-04-06 18:16:46'),
(68, 15, 11, 34, '2', 8, '80', '160', '2020-04-06 18:16:46', '2020-04-06 18:16:46'),
(69, 15, 10, 34, '1', 8, '45', '45', '2020-04-06 18:16:46', '2020-04-06 18:16:46'),
(70, 15, 10, 34, '1', 8, '45', '45', '2020-04-06 18:16:46', '2020-04-06 18:16:46'),
(71, 15, 11, 34, '2', 8, '80', '160', '2020-04-06 18:16:46', '2020-04-06 18:16:46'),
(72, 15, 13, 34, '3', 8, '70', '210', '2020-04-06 18:16:46', '2020-04-06 18:16:46'),
(73, 15, 18, 34, '1', 8, '4000', '4000', '2020-04-06 18:16:46', '2020-04-06 18:16:46'),
(74, 15, 10, 34, '2', 8, '45', '90', '2020-04-06 19:19:51', '2020-04-06 19:19:51'),
(75, 16, 11, 33, '2', 8, '80', '160', '2020-04-06 19:26:11', '2020-04-06 19:26:11'),
(76, 16, 11, 33, '2', 8, '80', '160', '2020-04-06 19:26:11', '2020-04-06 19:26:11'),
(77, 16, 13, 33, '1', 8, '70', '70', '2020-04-06 19:26:12', '2020-04-06 19:26:12'),
(78, 17, 11, 33, '2', 8, '80', '160', '2020-04-06 19:26:49', '2020-04-06 19:26:49'),
(79, 17, 11, 33, '2', 8, '80', '160', '2020-04-06 19:26:49', '2020-04-06 19:26:49'),
(80, 17, 13, 33, '1', 8, '70', '70', '2020-04-06 19:26:49', '2020-04-06 19:26:49'),
(81, 20, 11, 33, '2', 8, '80', '160', '2020-04-06 19:29:51', '2020-04-06 19:29:51'),
(82, 20, 11, 33, '2', 8, '80', '160', '2020-04-06 19:29:51', '2020-04-06 19:29:51'),
(83, 20, 13, 33, '1', 8, '70', '70', '2020-04-06 19:29:51', '2020-04-06 19:29:51'),
(84, 21, 11, 33, '2', 8, '80', '160', '2020-04-06 19:30:25', '2020-04-06 19:30:25'),
(85, 21, 11, 33, '2', 8, '80', '160', '2020-04-06 19:30:25', '2020-04-06 19:30:25'),
(86, 21, 13, 33, '1', 8, '70', '70', '2020-04-06 19:30:25', '2020-04-06 19:30:25'),
(87, 22, 11, 33, '2', 8, '80', '160', '2020-04-06 19:32:34', '2020-04-06 19:32:34'),
(88, 22, 11, 33, '2', 8, '80', '160', '2020-04-06 19:32:34', '2020-04-06 19:32:34'),
(89, 22, 13, 33, '1', 8, '70', '70', '2020-04-06 19:32:34', '2020-04-06 19:32:34'),
(90, 23, 11, 33, '2', 8, '80', '160', '2020-04-06 19:32:50', '2020-04-06 19:32:50'),
(91, 23, 11, 33, '2', 8, '80', '160', '2020-04-06 19:32:50', '2020-04-06 19:32:50'),
(92, 23, 13, 33, '1', 8, '70', '70', '2020-04-06 19:32:50', '2020-04-06 19:32:50'),
(93, 24, 11, 33, '2', 8, '80', '160', '2020-04-06 19:33:36', '2020-04-06 19:33:36'),
(94, 24, 11, 33, '2', 8, '80', '160', '2020-04-06 19:33:36', '2020-04-06 19:33:36'),
(95, 24, 13, 33, '1', 8, '70', '70', '2020-04-06 19:33:36', '2020-04-06 19:33:36'),
(96, 25, 11, 34, '2', 8, '80', '160', '2020-04-06 19:38:10', '2020-04-06 19:38:10'),
(97, 26, 12, 37, '1', 8, '20', '20', '2020-04-13 22:41:10', '2020-04-13 22:41:10'),
(98, 27, 9, 37, '1', 8, '30', '30', '2020-04-13 22:44:19', '2020-04-13 22:44:19'),
(99, 28, 9, 37, '1', 8, '30', '30', '2020-04-13 22:44:21', '2020-04-13 22:44:21'),
(100, 29, 12, 52, '1', 8, '20', '20', '2020-04-13 22:49:01', '2020-04-13 22:49:01'),
(101, 30, 9, 37, '1', 8, '30', '30', '2020-04-14 15:11:33', '2020-04-14 15:11:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_orden_servicio`
--

CREATE TABLE `detalles_orden_servicio` (
  `id` int(11) NOT NULL,
  `orden_servicio_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `equipo_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor_unitario` varchar(20) COLLATE utf32_spanish2_ci NOT NULL,
  `valor_total` varchar(20) COLLATE utf32_spanish2_ci NOT NULL,
  `completo` tinyint(1) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `detalles_orden_servicio`
--

INSERT INTO `detalles_orden_servicio` (`id`, `orden_servicio_id`, `item_id`, `area_id`, `equipo_id`, `cantidad`, `valor_unitario`, `valor_total`, `completo`, `updated_at`, `created_at`) VALUES
(31, 21, 9, 0, 8, 2, '30', '60', 0, '2020-04-04 10:49:59', '2020-04-04 10:49:59'),
(32, 22, 10, 0, 8, 2, '45', '90', 0, '2020-04-06 09:54:14', '2020-04-06 09:54:14'),
(33, 23, 10, 0, 8, 2, '45', '90', 0, '2020-04-06 09:56:26', '2020-04-06 09:56:26'),
(34, 24, 10, 0, 8, 2, '45', '90', 0, '2020-04-06 09:57:03', '2020-04-06 09:57:03'),
(35, 25, 10, 0, 8, 2, '45', '90', 0, '2020-04-06 10:00:59', '2020-04-06 10:00:59'),
(36, 26, 10, 0, 8, 2, '45', '90', 0, '2020-04-06 10:01:18', '2020-04-06 10:01:18'),
(37, 28, 11, 34, 8, 2, '80', '160', 0, '2020-04-06 10:16:58', '2020-04-06 10:16:58'),
(38, 28, 10, 34, 8, 1, '45', '45', 0, '2020-04-06 10:16:58', '2020-04-06 10:16:58'),
(39, 28, 10, 34, 8, 1, '45', '45', 0, '2020-04-06 16:08:45', '2020-04-06 16:08:45'),
(40, 28, 11, 34, 8, 2, '80', '160', 0, '2020-04-06 16:08:45', '2020-04-06 16:08:45'),
(41, 28, 13, 34, 8, 3, '70', '210', 0, '2020-04-06 16:08:45', '2020-04-06 16:08:45'),
(42, 28, 18, 34, 8, 1, '4000', '4000', 0, '2020-04-06 16:36:13', '2020-04-06 16:36:13'),
(43, 29, 10, 43, 8, 2, '45', '90', 1, '2020-04-07 09:42:06', '2020-04-06 21:20:11'),
(44, 30, 9, 34, 8, 2, '30', '60', 1, '2020-04-07 09:28:51', '2020-04-07 03:52:25'),
(45, 30, 11, 34, 8, 1, '80', '80', 0, '2020-04-07 09:28:51', '2020-04-07 03:52:25'),
(46, 32, 11, 44, 8, 1, '80', '80', 0, '2020-04-08 04:01:23', '2020-04-08 04:01:23'),
(47, 33, 18, 44, 8, 3, '4000', '12000', 0, '2020-04-08 04:04:19', '2020-04-08 04:04:19'),
(48, 34, 18, 38, 8, 1, '4000', '4000', 0, '2020-04-13 21:18:18', '2020-04-13 21:18:18'),
(49, 35, 13, 3, 8, 1, '70', '70', 0, '2020-04-13 21:20:19', '2020-04-13 21:20:19'),
(50, 35, 13, 3, 8, 1, '70', '70', 0, '2020-04-13 21:20:19', '2020-04-13 21:20:19'),
(51, 36, 10, 4, 8, 1, '45', '45', 0, '2020-04-13 21:21:18', '2020-04-13 21:21:18'),
(52, 37, 11, 41, 8, 1, '80', '80', 0, '2020-04-13 21:22:14', '2020-04-13 21:22:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

CREATE TABLE `facturacion` (
  `id_facturacion` int(11) NOT NULL,
  `clientes_id` int(11) NOT NULL,
  `cod_factura` varchar(20) COLLATE utf32_spanish2_ci NOT NULL,
  `total` varchar(20) COLLATE utf32_spanish2_ci NOT NULL,
  `estado` varchar(20) COLLATE utf32_spanish2_ci NOT NULL,
  `forma_pago` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `observacion` varchar(255) COLLATE utf32_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `facturacion`
--

INSERT INTO `facturacion` (`id_facturacion`, `clientes_id`, `cod_factura`, `total`, `estado`, `forma_pago`, `observacion`, `updated_at`, `created_at`) VALUES
(11, 26, 'FAC - 1', '4795', 'PENDIENTE', '', NULL, '2020-04-06 17:55:21', '2020-04-06 17:55:21'),
(12, 26, 'FAC - 1', '4795', 'PENDIENTE', '', NULL, '2020-04-06 18:00:20', '2020-04-06 18:00:20'),
(13, 26, 'FAC - 1', '4795', 'PENDIENTE', '', NULL, '2020-04-06 18:01:14', '2020-04-06 18:01:14'),
(14, 26, 'FAC - 1', '4795', 'PENDIENTE', '', NULL, '2020-04-06 18:03:30', '2020-04-06 18:03:30'),
(15, 26, 'FAC - 1', '4885', 'PENDIENTE', '', NULL, '2020-04-06 19:19:07', '2020-04-06 18:16:46'),
(16, 25, 'FAC - 1', '390', 'PENDIENTE', '', NULL, '2020-04-06 19:26:11', '2020-04-06 19:26:11'),
(17, 25, 'FAC - 1', '390', 'PENDIENTE', '', NULL, '2020-04-06 19:26:48', '2020-04-06 19:26:48'),
(18, 25, 'FAC - 1', '390', 'PENDIENTE', '', NULL, '2020-04-06 19:27:44', '2020-04-06 19:27:44'),
(19, 25, 'FAC - 1', '390', 'PENDIENTE', '', NULL, '2020-04-06 19:29:32', '2020-04-06 19:29:32'),
(20, 25, 'FAC - 1', '390', 'PENDIENTE', '', NULL, '2020-04-06 19:29:51', '2020-04-06 19:29:51'),
(21, 25, 'FAC - 1', '390', 'PENDIENTE', '', NULL, '2020-04-06 19:30:25', '2020-04-06 19:30:25'),
(22, 25, 'FAC - 1', '390', 'PENDIENTE', '', NULL, '2020-04-06 19:32:34', '2020-04-06 19:32:34'),
(23, 25, 'FAC - 1', '390', 'PENDIENTE', '', NULL, '2020-04-06 19:32:50', '2020-04-06 19:32:50'),
(24, 25, 'FAC - 1', '390', 'PENDIENTE', '', NULL, '2020-04-06 19:33:36', '2020-04-06 19:33:36'),
(25, 26, 'FAC - 2', '160', 'PENDIENTE', '', NULL, '2020-04-06 19:38:10', '2020-04-06 19:38:10'),
(26, 27, 'FAC - 3', '20', 'PENDIENTE', '', NULL, '2020-04-13 22:41:10', '2020-04-13 22:41:10'),
(27, 27, 'FAC - 4', '30', 'PENDIENTE', '', NULL, '2020-04-13 22:44:19', '2020-04-13 22:44:19'),
(28, 27, 'FAC - 4', '30', 'PENDIENTE', '', NULL, '2020-04-13 22:44:20', '2020-04-13 22:44:20'),
(29, 39, 'FAC - 5', '20', 'PENDIENTE', '', NULL, '2020-04-13 22:49:01', '2020-04-13 22:49:01'),
(30, 27, 'FAC - 6', '30', 'PENDIENTE', 'EFECTIVO', NULL, '2020-04-14 15:11:33', '2020-04-14 15:11:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fac_cliente`
--

CREATE TABLE `fac_cliente` (
  `id_empresa` bigint(20) NOT NULL COMMENT 'identificador de la empresa adm_empresa',
  `id_cliente` bigint(20) NOT NULL COMMENT 'id del cliente',
  `id_municipio` bigint(20) DEFAULT NULL COMMENT 'id del munipio donde queda ubicada la empresa',
  `cod_cliente` varchar(255) DEFAULT NULL COMMENT 'codigo del cliente definido por el usuario final',
  `nom_cliente` varchar(255) DEFAULT NULL COMMENT 'nombre del cliente',
  `dir_cliente` varchar(255) DEFAULT NULL COMMENT 'direccion del cliente',
  `tel_cliente` varchar(255) DEFAULT NULL COMMENT 'telefono del cliente',
  `cel_cliente` varchar(255) DEFAULT NULL COMMENT 'celular del cliente',
  `mail_cliente` varchar(255) DEFAULT NULL COMMENT 'correo electronico del cliente',
  `activo` bit(1) DEFAULT NULL COMMENT 'indica si el cliente esta activo o no por default esta en TRUE en su creacion',
  `tipo_cliente` bit(1) DEFAULT NULL COMMENT 'indicador si el clientes es persona natural = true y persona juridica = false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fac_cliente_area`
--

CREATE TABLE `fac_cliente_area` (
  `id_cliente` bigint(10) NOT NULL,
  `id_area` bigint(10) NOT NULL,
  `cod_area` varchar(20) DEFAULT NULL COMMENT 'codigo del area definido',
  `nom_area` varchar(255) DEFAULT '0' COMMENT 'nombre de area de la empresa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fac_factura_detalle`
--

CREATE TABLE `fac_factura_detalle` (
  `id_fac_factura_enc` bigint(20) NOT NULL COMMENT 'id de la factura para relacionarla',
  `id_fac_factura_detalle` bigint(20) NOT NULL COMMENT 'id del detalle ',
  `consecutivo_factura` decimal(10,0) NOT NULL COMMENT 'consecutivo del item en la factura',
  `id_adm_item` bigint(20) DEFAULT NULL COMMENT 'id del item que se va a facturar puede servicio o articulo',
  `valor_item` float DEFAULT NULL COMMENT 'valor de cada item y la sumatoria debera ser igual al total de la factura'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fac_factura_enc`
--

CREATE TABLE `fac_factura_enc` (
  `id_fac_factura_enc` bigint(20) NOT NULL COMMENT 'id de la tabla',
  `id_cliente` bigint(20) NOT NULL COMMENT 'id del cliente que se va a facturar',
  `fec_factura` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp() COMMENT 'fecha de la factura',
  `valor_factura` float NOT NULL DEFAULT 0 COMMENT 'valor total de la factura',
  `obs_factura` text DEFAULT NULL COMMENT 'observacion de la factura ',
  `anulada` bit(1) DEFAULT NULL COMMENT 'indicador si la factura fue anulada',
  `pagada` bit(1) DEFAULT NULL COMMENT 'indica si la factura ya fue pagada ',
  `id_ope_orden_trabajo` bigint(20) DEFAULT NULL COMMENT 'orden de trabajo si existe se relacion por el cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fac_tarifario`
--

CREATE TABLE `fac_tarifario` (
  `id_tarifario` decimal(10,0) NOT NULL COMMENT 'identificador de la tabla',
  `cod_tarifario` varchar(255) DEFAULT NULL COMMENT 'codigo del tarifario ',
  `nom_tarifario` varchar(255) DEFAULT NULL COMMENT 'nombre del tarifario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fac_tarifario_cliente`
--

CREATE TABLE `fac_tarifario_cliente` (
  `id_fac_tarifario_item_cliente` bigint(20) NOT NULL COMMENT 'identificador de la tabla',
  `id_cliente` bigint(20) NOT NULL DEFAULT 0 COMMENT 'identificador del cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fac_tarifario_item`
--

CREATE TABLE `fac_tarifario_item` (
  `id_fac_tarifario_item` decimal(10,0) NOT NULL COMMENT 'identificador de la tabla',
  `id_fac_tarifario` decimal(10,0) NOT NULL COMMENT 'identificador del tarifario',
  `id_item` decimal(10,0) NOT NULL COMMENT 'id del item ',
  `precio_item` float NOT NULL DEFAULT 0 COMMENT 'precio del item '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla donde se almacena y relaciona los items con las tarifas que se les dan a los clientes';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` int(11) NOT NULL,
  `departamento_id` int(11) NOT NULL,
  `nom_municipio` varchar(40) COLLATE utf32_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `departamento_id`, `nom_municipio`) VALUES
(1, 1, 'MARINO'),
(2, 3, 'PERTENECE P'),
(3, 4, 'PERTENECE P2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newtable`
--

CREATE TABLE `newtable` (
  `id_adm_dep_muncipio` bigint(20) NOT NULL COMMENT 'id de la tabla',
  `id_departamento` decimal(10,0) NOT NULL COMMENT 'id del departamento',
  `cod_departamento` varchar(255) DEFAULT NULL COMMENT 'codigo del departamento',
  `nom_departamento` varchar(255) DEFAULT NULL COMMENT 'nombre del departamento',
  `id_muncipio` decimal(10,0) DEFAULT NULL COMMENT 'id del municipio',
  `cod_municipio` varchar(255) DEFAULT NULL COMMENT 'codigo del municipio',
  `nom_muncipio` varchar(255) DEFAULT NULL COMMENT 'nombre del municipio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Almacena departamentos y muncipios del pais NO REQUIERE CRUD' ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones_orden`
--

CREATE TABLE `observaciones_orden` (
  `id` int(11) NOT NULL,
  `detalle_orden_id` int(11) NOT NULL,
  `observacion` varchar(255) COLLATE utf32_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `observaciones_orden`
--

INSERT INTO `observaciones_orden` (`id`, `detalle_orden_id`, `observacion`) VALUES
(2, 45, 'NO HABÍA MATERIAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ope_cliente_equipo`
--

CREATE TABLE `ope_cliente_equipo` (
  `id_ope_equipo_cli` bigint(20) NOT NULL COMMENT 'id de la tabla',
  `id_cliente` bigint(20) NOT NULL COMMENT 'id del cliente',
  `id_equipo` bigint(20) NOT NULL COMMENT 'id del equipo',
  `id_area` bigint(20) NOT NULL COMMENT 'id del area donde esta ubicado el equipo',
  `serial_equipo` varchar(255) DEFAULT NULL COMMENT 'serial del equipo',
  `obs_equipo` text DEFAULT NULL COMMENT 'observacion del equipo',
  `foto_equipo` blob DEFAULT NULL COMMENT 'foto del equipo',
  `persona_acargo` varchar(255) DEFAULT NULL COMMENT 'persona a cargo del equipo',
  `placa_inv` varchar(255) DEFAULT NULL COMMENT 'numero de placa de inventario que le tenga asignado el cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla donde se almacena los equipos que tiene el cliente y el area donde esta ubicado.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ope_cotizacion_cliente`
--

CREATE TABLE `ope_cotizacion_cliente` (
  `id_cotizacion_cliente` bigint(20) NOT NULL COMMENT 'id de la tabla',
  `id_cliente` bigint(20) DEFAULT NULL COMMENT 'id del cliente. se incluye este campo porque se puede dar la situacion que el cliente pida cotizacion de un servicio o producto nuevo que no tenga asociado.',
  `num_cotizacion` varchar(255) NOT NULL COMMENT 'numero de la cotizacion definida por el cliente debe tener el encabezado los datos de la empresa + COTIZACION No. #####',
  `id_ope_equipo_cli` bigint(20) DEFAULT NULL COMMENT 'identificador del cliente ',
  `obs_cotizacion` text DEFAULT NULL COMMENT 'campo donde se podra escribir lo que desee el usuario y sobre todo cuando el cliente quiera un servicio o producto nuevo que no tenga asociado.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ope_orden_trabajo`
--

CREATE TABLE `ope_orden_trabajo` (
  `id_ope_orden_trabajo` bigint(20) NOT NULL COMMENT 'id de la tabla',
  `id_cliente` bigint(20) NOT NULL COMMENT 'id del cliente',
  `fec_crea_orden_trabajo` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp() COMMENT 'fecha en que se crea la orden de trabajo',
  `fec_atencion_orden_trabajo` varchar(255) DEFAULT NULL COMMENT 'fecha de cierre o cuando se finalizo o atendio la orden de trabajo',
  `obs_orden_trabajo` text DEFAULT NULL COMMENT 'observacion de la orden de trabajo',
  `anulado` bit(1) DEFAULT NULL COMMENT 'indica si la orden de trabajo fue analuda o no',
  `facturado` bit(1) DEFAULT NULL COMMENT 'indica si fue facturado o no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ope_orden_trabajo_detalle`
--

CREATE TABLE `ope_orden_trabajo_detalle` (
  `id_ope_orden_trabajo_detalle` bigint(20) NOT NULL COMMENT 'id de la tabla',
  `num_item` decimal(10,0) NOT NULL COMMENT 'indica el orden en que se mostraran en el pdf',
  `id_ope_cliente_equipo` bigint(20) DEFAULT NULL COMMENT 'id del equipo que tiene el cliente',
  `id_item` bigint(20) DEFAULT NULL COMMENT 'id del servicio o articulo para tener los precios de este para ese cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Almacena el encabezado de las ordenes de trabajo.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_servicio`
--

CREATE TABLE `orden_servicio` (
  `id` int(11) NOT NULL,
  `clientes_id` int(11) NOT NULL,
  `tecnico_id` int(11) NOT NULL,
  `cod_orden` varchar(20) COLLATE utf32_spanish2_ci NOT NULL,
  `total` double NOT NULL,
  `estado` varchar(20) COLLATE utf32_spanish2_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `orden_servicio`
--

INSERT INTO `orden_servicio` (`id`, `clientes_id`, `tecnico_id`, `cod_orden`, `total`, `estado`, `updated_at`, `created_at`) VALUES
(21, 25, 3, 'COT - 12', 60, 'PENDIENTE', '2020-04-04 10:49:59', '2020-04-04 10:49:59'),
(22, 26, 3, 'ORD - 100', 90, 'PENDIENTE', '2020-04-06 09:54:14', '2020-04-06 09:54:14'),
(23, 26, 3, 'ORD - 100', 90, 'PENDIENTE', '2020-04-06 09:56:26', '2020-04-06 09:56:26'),
(24, 26, 3, 'ORD - 100', 90, 'PENDIENTE', '2020-04-06 09:57:03', '2020-04-06 09:57:03'),
(25, 26, 3, 'ORD - 100', 90, 'PENDIENTE', '2020-04-06 10:00:59', '2020-04-06 10:00:59'),
(26, 26, 3, 'ORD - 100', 90, 'PENDIENTE', '2020-04-06 10:01:18', '2020-04-06 10:01:18'),
(27, 26, 3, 'ORD - 101', 205, 'PENDIENTE', '2020-04-06 10:14:56', '2020-04-06 10:14:56'),
(28, 26, 3, 'ORD - 101', 4620, 'PROCESADA/FACTURA', '2020-04-06 18:16:46', '2020-04-06 10:16:58'),
(29, 33, 3, 'ORD - 102', 90, 'COMPLETADA', '2020-04-07 09:42:06', '2020-04-06 21:20:11'),
(30, 26, 3, 'ORD - 103', 140, 'COMPLETADA', '2020-04-07 09:28:51', '2020-04-07 03:52:25'),
(31, 34, 3, 'ORD - 104', 80, 'PENDIENTE', '2020-04-08 03:51:08', '2020-04-08 03:51:08'),
(32, 34, 3, 'ORD - 104', 80, 'PENDIENTE', '2020-04-08 04:01:23', '2020-04-08 04:01:23'),
(33, 34, 5, 'ORD - 105', 12000, 'PENDIENTE', '2020-04-08 04:04:19', '2020-04-08 04:04:19'),
(34, 28, 3, 'ORD - 106', 4000, 'PENDIENTE', '2020-04-13 21:18:18', '2020-04-13 21:18:18'),
(35, 25, 3, 'ORD - 107', 140, 'PENDIENTE', '2020-04-13 21:20:19', '2020-04-13 21:20:19'),
(36, 31, 3, 'ORD - 108', 45, 'PENDIENTE', '2020-04-13 21:21:18', '2020-04-13 21:21:18'),
(37, 31, 141, 'ORD - 109', 80, 'PENDIENTE', '2020-04-13 21:22:14', '2020-04-13 21:22:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_area_equipo`
--

CREATE TABLE `rel_area_equipo` (
  `id` int(11) NOT NULL,
  `areas_id` int(11) NOT NULL,
  `equipos_id` int(11) NOT NULL,
  `serial` varchar(20) COLLATE utf32_spanish2_ci DEFAULT NULL,
  `placa` varchar(20) COLLATE utf32_spanish2_ci DEFAULT NULL,
  `descripcion` varchar(100) COLLATE utf32_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `rel_area_equipo`
--

INSERT INTO `rel_area_equipo` (`id`, `areas_id`, `equipos_id`, `serial`, `placa`, `descripcion`, `updated_at`, `created_at`) VALUES
(16, 33, 8, '2541', '12547', 'Pantalla partida', '2020-04-04 10:46:44', '2020-04-04 10:46:44'),
(17, 34, 8, '2541', NULL, NULL, '2020-04-04 19:20:08', '2020-04-04 19:20:08'),
(18, 35, 8, '2541', NULL, NULL, '2020-04-04 19:21:16', '2020-04-04 19:21:16'),
(19, 36, 8, '12356', NULL, NULL, '2020-04-04 19:43:59', '2020-04-04 19:43:59'),
(20, 48, 8, '2541', NULL, NULL, '2020-04-06 09:30:18', '2020-04-06 09:30:18'),
(21, 47, 8, '132345', NULL, NULL, '2020-04-06 09:33:45', '2020-04-06 09:33:45'),
(22, 42, 8, '2541', NULL, NULL, '2020-04-06 09:42:52', '2020-04-06 09:42:52'),
(23, 33, 8, '21', '321', NULL, '2020-04-06 17:09:54', '2020-04-06 17:09:54'),
(24, 43, 8, '1235', NULL, NULL, '2020-04-06 21:20:03', '2020-04-06 21:20:03'),
(25, 44, 8, '1235', NULL, NULL, '2020-04-08 03:50:22', '2020-04-08 03:50:22'),
(26, 52, 8, '2541', NULL, NULL, '2020-04-10 01:23:35', '2020-04-10 01:23:35'),
(27, 38, 8, '2541', NULL, NULL, '2020-04-13 14:06:29', '2020-04-13 14:06:29'),
(28, 39, 8, '2541', NULL, NULL, '2020-04-13 14:16:15', '2020-04-13 14:16:15'),
(29, 37, 8, '12356', NULL, NULL, '2020-04-13 14:29:36', '2020-04-13 14:29:36'),
(30, 41, 8, '1235', NULL, NULL, '2020-04-13 14:31:25', '2020-04-13 14:31:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nom_rol` varchar(20) COLLATE utf32_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf32_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nom_rol`, `descripcion`) VALUES
(1, 'TECNICO', 'SE ENCARGA DE EJECUTAR LAS ORDENES DE SERVICIO(EDIT)'),
(2, 'ADMINISTRADOR', 'ADMINISTRADOR'),
(3, 'OPERADOR', 'OPERADOR'),
(4, 'PRUEBA', 'PRUEBA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas_clientes`
--

CREATE TABLE `tarifas_clientes` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `precio_venta` double NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `tarifas_clientes`
--

INSERT INTO `tarifas_clientes` (`id`, `item_id`, `cliente_id`, `precio_venta`, `updated_at`, `created_at`) VALUES
(2, 12, 26, 30, '2020-04-07 10:42:04', '2020-04-07 10:42:04'),
(3, 13, 26, 90, '2020-04-07 10:42:04', '2020-04-07 10:42:04'),
(4, 12, 26, 40, '2020-04-07 10:44:09', '2020-04-07 10:44:09'),
(5, 13, 26, 120, '2020-04-07 10:44:10', '2020-04-07 10:44:10'),
(6, 11, 26, 80, '2020-04-10 01:16:43', '2020-04-10 01:16:43'),
(7, 11, 26, 80, '2020-04-10 01:18:38', '2020-04-10 01:18:38'),
(8, 11, 26, 80, '2020-04-10 01:21:18', '2020-04-10 01:21:18'),
(9, 10, 25, 45, '2020-04-10 01:34:22', '2020-04-10 01:34:22'),
(10, 10, 25, 45, '2020-04-10 01:37:02', '2020-04-10 01:37:02'),
(11, 11, 34, 80, '2020-04-10 01:58:05', '2020-04-10 01:58:05'),
(12, 11, 34, 80, '2020-04-10 01:58:09', '2020-04-10 01:58:09'),
(13, 11, 26, 80, '2020-04-11 22:35:48', '2020-04-11 22:35:48'),
(14, 11, 34, 80, '2020-04-11 18:38:50', '2020-04-11 18:38:50'),
(15, 10, 25, 45, '2020-04-13 15:57:05', '2020-04-13 15:57:05'),
(16, 10, 25, 45, '2020-04-13 15:59:08', '2020-04-13 15:59:08'),
(17, 8, 26, 25, '2020-04-13 16:00:06', '2020-04-13 16:00:06'),
(18, 12, 25, 20, '2020-04-13 16:02:05', '2020-04-13 16:02:05'),
(19, 8, 28, 25, '2020-04-13 16:07:35', '2020-04-13 16:07:35'),
(20, 12, 39, 20, '2020-04-13 16:13:51', '2020-04-13 16:13:51'),
(21, 12, 39, 20, '2020-04-13 16:30:58', '2020-04-13 16:30:58'),
(22, 18, 39, 4000, '2020-04-13 16:30:58', '2020-04-13 16:30:58'),
(23, 12, 26, 40, '2020-04-13 16:33:10', '2020-04-13 16:33:10'),
(24, 10, 31, 45, '2020-04-13 16:39:20', '2020-04-13 16:39:20'),
(25, 10, 39, 45, '2020-04-13 16:41:04', '2020-04-13 16:41:04'),
(26, 10, 39, 45, '2020-04-13 16:51:23', '2020-04-13 16:51:23'),
(27, 8, 28, 25, '2020-04-13 16:52:22', '2020-04-13 16:52:22'),
(28, 9, 32, 30, '2020-04-13 17:00:15', '2020-04-13 17:00:15'),
(29, 9, 32, 30, '2020-04-13 17:01:20', '2020-04-13 17:01:20'),
(30, 11, 29, 80, '2020-04-13 17:07:55', '2020-04-13 17:07:55'),
(31, 10, 34, 45, '2020-04-13 17:11:42', '2020-04-13 17:11:42'),
(32, 12, 27, 20, '2020-04-13 17:19:06', '2020-04-13 17:19:06'),
(33, 8, 28, 25, '2020-04-13 17:19:52', '2020-04-13 17:19:52'),
(34, 11, 28, 80, '2020-04-13 17:19:52', '2020-04-13 17:19:52'),
(35, 12, 28, 20, '2020-04-13 17:20:33', '2020-04-13 17:20:33'),
(36, 9, 27, 30, '2020-04-13 17:25:42', '2020-04-13 17:25:42'),
(37, 12, 28, 20, '2020-04-13 17:27:58', '2020-04-13 17:27:58'),
(38, 11, 32, 80, '2020-04-13 17:28:25', '2020-04-13 17:28:25'),
(39, 12, 26, 40, '2020-04-13 17:30:14', '2020-04-13 17:30:14'),
(40, 13, 26, 120, '2020-04-13 17:30:56', '2020-04-13 17:30:56'),
(41, 11, 26, 80, '2020-04-13 17:33:58', '2020-04-13 17:33:58'),
(42, 10, 28, 45, '2020-04-13 18:42:38', '2020-04-13 18:42:38'),
(43, 11, 25, 80, '2020-04-13 18:43:39', '2020-04-13 18:43:39'),
(44, 11, 26, 80, '2020-04-13 18:44:15', '2020-04-13 18:44:15'),
(45, 8, 28, 25, '2020-04-13 19:29:44', '2020-04-13 19:29:44'),
(46, 9, 32, 30, '2020-04-13 19:33:02', '2020-04-13 19:33:02'),
(47, 9, 25, 30, '2020-04-13 19:46:21', '2020-04-13 19:46:21'),
(48, 9, 25, 30, '2020-04-13 19:53:10', '2020-04-13 19:53:10'),
(49, 10, 28, 45, '2020-04-13 20:00:35', '2020-04-13 20:00:35'),
(50, 13, 25, 70, '2020-04-13 20:05:21', '2020-04-13 20:05:21'),
(51, 18, 28, 4000, '2020-04-13 20:07:01', '2020-04-13 20:07:01'),
(52, 9, 27, 30, '2020-04-13 23:24:05', '2020-04-13 23:24:05'),
(53, 8, 32, 25, '2020-04-13 23:36:55', '2020-04-13 23:36:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rol` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `rol`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ADMINISTRADOR', 'Miss Velda Brekke DVM', 'rhoda80@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hC9sIgAynibheZwWZuxF8BWG8eRNufQH26ln3uP5lAwoAxgcSjtlGwSMIPOZ', '2020-03-22 02:01:17', '2020-03-22 02:01:17'),
(2, 'OPERADOR', 'Fabiola Durgan', 'jordon.robel@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'apJl6Yk7YtCMb7F9VyaFM624Z4aHwQRmzQ3w8R45skD5jHbxrZFkS3xAFfiL', '2020-03-22 02:01:18', '2020-04-03 15:46:04'),
(3, 'TECNICO', 'Gene Lynch DDS', 'lue.frami@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TQxEEdeJcS', '2020-03-22 02:01:18', '2020-04-03 15:47:34'),
(4, 'OPERADOR', 'Jesus Bruen', 'america89@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'iVhDs7iear', '2020-03-22 02:01:18', '2020-04-03 15:47:44'),
(5, 'TECNICO', 'Miss Colleen Beahan Jr.', 'barton.devan@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JNraGrVA8j', '2020-03-22 02:01:18', '2020-04-03 15:47:55'),
(6, '', 'Frankie Russel I', 'quinton28@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EHjRYydDQR', '2020-03-22 02:01:18', '2020-03-22 02:01:18'),
(7, '', 'Marietta Ferry III', 'christ.stamm@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1MUQRVlgwX', '2020-03-22 02:01:18', '2020-03-22 02:01:18'),
(8, '', 'Dr. Javon Schuppe DDS', 'kblick@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'IdpQnEBDNm', '2020-03-22 02:01:18', '2020-03-22 02:01:18'),
(9, '', 'Colby Blanda', 'lhuels@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zQpPGJFa0x', '2020-03-22 02:01:18', '2020-03-22 02:01:18'),
(10, '', 'Abbie Altenwerth', 'webster01@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '60UQLPTh1p', '2020-03-22 02:01:18', '2020-03-22 02:01:18'),
(11, '', 'Miss Pascale Schmitt II', 'dejon07@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fUn0QIu3IA', '2020-03-22 02:01:18', '2020-03-22 02:01:18'),
(12, '', 'Elenor Kuvalis', 'leora.schneider@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TvgdomuKuC', '2020-03-22 02:01:18', '2020-03-22 02:01:18'),
(13, '', 'Karianne Beatty MD', 'rschmitt@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3WUlMm5OkW', '2020-03-22 02:01:18', '2020-03-22 02:01:18'),
(14, '', 'Cielo Pollich', 'ntillman@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'b1BCiPOI0W', '2020-03-22 02:01:18', '2020-03-22 02:01:18'),
(15, '', 'Reagan Hartmann Sr.', 'kira.stark@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9EuWNr1aET', '2020-03-22 02:01:18', '2020-03-22 02:01:18'),
(16, '', 'Otto Russel Jr.', 'vlind@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QS51UlewFb', '2020-03-22 02:01:18', '2020-03-22 02:01:18'),
(17, '', 'Dr. Louvenia Spencer', 'nolan.jettie@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zTETacVKhS', '2020-03-22 02:01:18', '2020-03-22 02:01:18'),
(18, '', 'Mariane O\'Connell', 'kenyatta86@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wMSyZEd2VZ', '2020-03-22 02:01:18', '2020-03-22 02:01:18'),
(19, '', 'Dr. Major Mitchell PhD', 'bkiehn@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'piHrN7sSKB', '2020-03-22 02:01:19', '2020-03-22 02:01:19'),
(20, '', 'Mateo Hodkiewicz', 'amos.mante@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8r1GS6mHQU', '2020-03-22 02:01:19', '2020-03-22 02:01:19'),
(21, '', 'Dr. Alfredo Fritsch DDS', 'aledner@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6Wy4HIAyj9', '2020-03-22 02:01:19', '2020-03-22 02:01:19'),
(22, '', 'Christiana Macejkovic', 'heathcote.courtney@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BzOqPvHspS', '2020-03-22 02:01:19', '2020-03-22 02:01:19'),
(23, '', 'Geovanni Johns', 'luettgen.orpha@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tHeb2E8P6h', '2020-03-22 02:01:19', '2020-03-22 02:01:19'),
(24, '', 'Reuben Erdman', 'dare.naomie@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yJs9u2Sp7J', '2020-03-22 02:01:19', '2020-03-22 02:01:19'),
(25, '', 'Breanna Kreiger', 'travis.lueilwitz@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'T6O2jXtDEG', '2020-03-22 02:01:19', '2020-03-22 02:01:19'),
(26, '', 'Dr. Toy Bednar PhD', 'reuben49@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5WOIwlhFhX', '2020-03-22 02:01:19', '2020-03-22 02:01:19'),
(27, '', 'Piper Wolff', 'natasha74@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SC8GHd5Fn7', '2020-03-22 02:01:19', '2020-03-22 02:01:19'),
(28, '', 'Natasha Schroeder', 'afeeney@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Vol2ImCA3B', '2020-03-22 02:01:19', '2020-03-22 02:01:19'),
(29, '', 'Otilia Durgan Sr.', 'mgleichner@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'CAmbtmZpzP', '2020-03-22 02:01:19', '2020-03-22 02:01:19'),
(30, '', 'Karolann Hackett', 'lina47@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JdUw3u3ghv', '2020-03-22 02:01:19', '2020-03-22 02:01:19'),
(31, '', 'Talon Wolf IV', 'okuhn@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0Gh78YD8DK', '2020-03-22 02:01:19', '2020-03-22 02:01:19'),
(32, '', 'Nayeli Zulauf', 'bernice.daugherty@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'oo6AyAT6iD', '2020-03-22 02:01:19', '2020-03-22 02:01:19'),
(33, '', 'Toni Walter', 'schaefer.camilla@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VewYHSdTfe', '2020-03-22 02:01:19', '2020-03-22 02:01:19'),
(34, '', 'Ms. Maia Witting Jr.', 'bethel83@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FaB7t51Zin', '2020-03-22 02:01:19', '2020-03-22 02:01:19'),
(35, '', 'Dewayne Barton', 'austen.rempel@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AbjIlwgMxc', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(36, '', 'Rhoda Langosh', 'tchristiansen@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WZTsgfu3Pd', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(37, '', 'Prof. Maudie Johnston II', 'nickolas.harber@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xdd0yqCSMT', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(38, '', 'Annabel Prohaska', 'tquigley@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KV4jfYEK5L', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(39, '', 'Curtis Reichel V', 'ykemmer@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'm0K0XhKduW', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(40, '', 'Lilla Schamberger', 'sbeier@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jXkF6KsKlT', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(41, '', 'Stephon Wuckert', 'esperanza93@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '61HujE2lvl', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(42, '', 'Elise Konopelski', 'dickinson.lelia@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hLXWSoXaXQ', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(43, '', 'Dr. Sincere Strosin', 'seamus80@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2OQHvSRFxh', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(44, '', 'Prof. Roma Predovic', 'willow.king@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zo9XUbQMiz', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(45, '', 'Abel Walsh PhD', 'jon.yost@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AkkKyBuWJL', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(46, '', 'Ericka Lebsack', 'sboehm@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DdElHjRnSK', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(47, '', 'Ronny Olson MD', 'ora.ankunding@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'I4bvdXvWxS', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(48, '', 'Viviane Feeney IV', 'elliott.boyer@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yn5rpPMU7p', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(49, '', 'Fatima Gaylord', 'moen.kenyon@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0HJwLesf4g', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(50, '', 'Loraine Kreiger DDS', 'scarlett87@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TuQwWvPOUu', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(51, '', 'Zetta Romaguera Jr.', 'flatley.brendan@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uafZDmnZyC', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(52, '', 'Ruthe Ratke', 'ken16@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Xg1SKb9Yj2', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(53, '', 'Mr. Barton Beatty IV', 'idell.pollich@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GP5T0QVBBR', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(54, '', 'Jessy Torphy', 'serenity.torp@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'N4VnYNzFhb', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(55, '', 'Lilyan Romaguera Jr.', 'witting.jessyca@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'IwmjVvBfrP', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(56, '', 'Miss Mandy Batz', 'zlesch@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ny3MhYgoMn', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(57, '', 'Keith Vandervort', 'roberts.saul@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'czAOyvwyJ8', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(58, '', 'Bill Rutherford', 'runte.bernadine@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2eEBzwtuoJ', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(59, '', 'Morgan Heaney', 'roselyn.marquardt@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ol7gCyxhOf', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(60, '', 'Geovanny Stracke', 'zolson@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bTa4wlVLw4', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(61, '', 'Adeline Huel', 'homenick.makayla@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'g6ncgg9Q9S', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(62, '', 'Harley Yundt', 'isobel60@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2KHA6XbMOl', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(63, '', 'Granville Monahan Sr.', 'pagac.mayra@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RZRbmEoaqc', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(64, '', 'Vita Lockman', 'kaley17@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3oWwYuUPdv', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(65, '', 'Derick Carroll PhD', 'econn@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Caxan6M8Tf', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(66, '', 'Ryleigh Bailey', 'geo.kilback@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'sRF6jO0cLS', '2020-03-22 02:01:20', '2020-03-22 02:01:20'),
(67, '', 'Mr. Horacio Hyatt Sr.', 'cummings.shanon@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PFXo4WHlpy', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(68, '', 'Antonietta Kutch', 'zita.buckridge@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wIil89ghWF', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(69, '', 'Randi O\'Conner DDS', 'armando11@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kMfZoUGzz1', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(70, '', 'Lillian Volkman', 'effertz.hollis@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MpoQtKpWBw', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(71, '', 'Nola Aufderhar', 'elton54@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PB3d4JZpy7', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(72, '', 'Louisa Fay', 'halvorson.ryan@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '29NbLB4YOM', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(73, '', 'Fritz O\'Conner', 'borer.ransom@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'oTXGf0ee02', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(74, '', 'Keara Daugherty', 'hills.gay@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vjpTzRDb24', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(75, '', 'Glen Grady', 'lilliana.rempel@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rNhYNBhf8I', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(76, '', 'General Pollich', 'cleveland62@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WBNLivWLhn', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(77, '', 'Miss Estella Leuschke', 'nolan.johnathon@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'eNf6otfx2A', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(78, '', 'Prof. Pattie Douglas III', 'agustina.von@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EdbJZuDXbQ', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(79, '', 'Dr. Haylie Koepp', 'brooklyn77@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WuLNVKaU3w', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(80, '', 'Dr. Nico Ward', 'adrien.oberbrunner@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PNITdNYVpJ', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(81, '', 'Otho Adams', 'alysha34@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PAJ1xMDGUk', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(82, '', 'Mr. Clint Ryan', 'jovani.kutch@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'z0qXYjqDQU', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(83, '', 'Deja Rempel', 'kasey04@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MB4n4lXaRS', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(84, '', 'Craig Toy', 'nkilback@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2cc1fXTrtH', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(85, '', 'Jacky Mitchell', 'adolf.moore@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'h1TsFr59EN', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(86, '', 'Miss Kariane Mitchell Jr.', 'thompson.mozelle@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rnFab4P6qQ', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(87, '', 'Mr. Martin Kohler DDS', 'grover.lemke@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BQUycNeCZQ', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(88, '', 'Madonna Rutherford', 'jmarquardt@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'E7B9jHNy54', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(89, '', 'Noelia Greenfelder', 'philip.white@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tgYDw84mcA', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(90, '', 'Prof. Eino Quigley', 'doyle.mason@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2uGIAJMRCv', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(91, '', 'Clifton Lemke', 'welch.keira@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gjus8KJFqi', '2020-03-22 02:01:21', '2020-03-22 02:01:21'),
(92, '', 'Davion Vandervort', 'balistreri.monserrat@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ZdhTs11rHh', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(93, '', 'Angie Tromp', 'dawn36@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GDg3FbS84s', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(94, '', 'Prof. Maurice Bogan I', 'joe.trantow@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OVXOZWCwAb', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(95, '', 'Alvera Oberbrunner', 'isabelle38@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'iW26LtvkI5', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(96, '', 'Leonora Wehner', 'boyle.ima@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vw7QNTJ3Ag', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(97, '', 'Prof. Devin Kovacek', 'dejuan72@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vGpw7qQqWP', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(98, '', 'Moises Kuhic', 'abel.tremblay@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cTDldlwTGc', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(99, '', 'Lucius Zieme', 'murray.gustave@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UPiBLW46sf', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(100, '', 'Barrett Fadel', 'cathy.ryan@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nUPfhuQt0o', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(101, '', 'Nina Frami', 'hoeger.nikita@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 's4pLGWprfK', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(102, '', 'Prof. Oren Brekke I', 'bogisich.elise@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'T4NCPn0OaP', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(103, '', 'Chaya Borer', 'hegmann.estevan@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wi4qsBh0aq', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(104, '', 'Gerard McCullough', 'fvonrueden@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'O3Oy2F80y1', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(105, '', 'Torey Herman', 'destiny33@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0UM0NAo4qY', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(106, '', 'Mrs. Kara Buckridge DVM', 'ethyl65@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UzYZIwQcCV', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(107, '', 'Dr. Efren Cartwright V', 'dave.dubuque@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'eBNQSeNHwX', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(108, '', 'Donald McClure', 'jesse.quitzon@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'A8enXWGost', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(109, '', 'Ladarius Nader', 'lucio22@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fp6dvSgtuC', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(110, '', 'Dr. Sage Reilly', 'tremblay.sally@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'CkgcHc2noz', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(111, '', 'Osbaldo Gulgowski', 'aiyana.windler@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '86oGWQxFQE', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(112, '', 'Prof. Donato Yundt', 'vabshire@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xXXXxVLGQ6', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(113, '', 'Tillman Ortiz', 'oreilly.berniece@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cnladQUsdz', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(114, '', 'Polly Cruickshank Jr.', 'roob.seamus@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mggn2GS4gT', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(115, '', 'Phoebe Larkin', 'anissa57@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BjD6R97Fal', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(116, '', 'Prof. Zakary Goyette IV', 'gladys.kutch@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'B1tBRlnnLF', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(117, '', 'Eunice Kertzmann', 'graciela57@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BMhuAbDve7', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(118, '', 'Yoshiko Strosin', 'hane.maybelle@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'IVtPv07jTD', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(119, '', 'Tara Rogahn', 'kamille.schultz@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9gToFrRkzu', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(120, '', 'Lisandro O\'Kon', 'casper.fisher@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '481xrj3uwJ', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(121, '', 'Prof. Bret Lind', 'cebert@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3eLNoUPOTD', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(122, '', 'Ben Erdman Sr.', 'sister27@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EKl2JvkkDr', '2020-03-22 02:01:22', '2020-03-22 02:01:22'),
(123, '', 'Marina Koch', 'nona57@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KvcART82H8', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(124, '', 'Pietro Reilly', 'fhomenick@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'sIPnacmOlS', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(125, '', 'Willow Johnston', 'laverne60@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'o1soZ9hKWp', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(126, '', 'Prof. Gilberto Kessler DVM', 'jocelyn.parisian@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EocERKAkNO', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(127, '', 'Chanelle Pollich', 'cormier.asha@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LRTBaAE4IZ', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(128, '', 'Bessie Hettinger', 'bashirian.weldon@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ab5zAzrC1V', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(129, '', 'Shyanne Hartmann', 'kgerhold@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pUh4xMlHlm', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(130, '', 'Lila Ledner', 'jeromy70@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'K9tZuFwuqO', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(131, '', 'Ms. Danika Batz IV', 'astrid.becker@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'itV9vW50be', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(132, '', 'Branson Grimes', 'jsanford@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FSNmGLvAkz', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(133, '', 'Loyce Maggio', 'zoe49@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '33iNB4y7sQ', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(134, '', 'Hayley Gerhold MD', 'florencio53@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qH10Ub1Do8', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(135, '', 'Miss Krista Gottlieb PhD', 'ffritsch@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nTflgSZ6W1', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(136, '', 'Dr. Tyrique Schultz DVM', 'jvolkman@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cKTldCofGO', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(137, '', 'Minerva Kunde', 'vickie30@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OaMxO1Kvl2', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(138, '', 'Morgan Okuneva', 'dubuque.helga@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'va0evQV42q', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(139, '', 'Enos O\'Reilly', 'kavon70@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FYH3WTK70a', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(140, '', 'Jayda Botsford', 'lemke.elza@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'quq8JAaXn9', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(141, 'TECNICO', 'Abbey Connelly', 'schoen.hilda@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RDWzPC6nDE', '2020-03-22 02:01:23', '2020-04-03 15:47:22'),
(142, '', 'Dr. Thad Murphy V', 'glenda17@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EFtxVg1hdw', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(143, '', 'Geraldine Morar', 'oleta64@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4jksNla4Gh', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(144, '', 'Charlotte Casper IV', 'hoeger.gillian@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'C5w930Sshj', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(145, '', 'Dr. Marty Towne DVM', 'lydia44@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Co1mb6NvyS', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(146, '', 'Americo Champlin', 'van.becker@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wjribDcw8d', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(147, '', 'Dr. Florencio Larson', 'hailee66@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JZy4OfWxga', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(148, '', 'Lola Simonis', 'marques.kling@example.com', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lnUUqSMtSy', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(149, '', 'Dr. Caleigh Koss', 'kovacek.noel@example.net', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0a004bNqMP', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(150, '', 'Ms. Keara Heathcote', 'esta94@example.org', '2020-03-22 02:01:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PZyr4G24Wc', '2020-03-22 02:01:23', '2020-03-22 02:01:23'),
(151, 'OPERADOR', 'Diohandres Hernandez', 'diohandres1703@hotmail.com', NULL, '$2y$10$21ixnypk9dxBDjA3qsFEEuj3wcy92oy/nQbgUhMgSKPq5lY31Zoxy', NULL, '2020-04-08 18:07:17', '2020-04-08 18:07:17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adm_areas`
--
ALTER TABLE `adm_areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`clientes_id`);

--
-- Indices de la tabla `adm_clase_equipo`
--
ALTER TABLE `adm_clase_equipo`
  ADD PRIMARY KEY (`id_clase_equipo`);

--
-- Indices de la tabla `adm_clientes`
--
ALTER TABLE `adm_clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_municipio` (`id_municipio`);

--
-- Indices de la tabla `adm_consecutivo`
--
ALTER TABLE `adm_consecutivo`
  ADD PRIMARY KEY (`id_adm_consecutivo`);

--
-- Indices de la tabla `adm_dep_muncipio`
--
ALTER TABLE `adm_dep_muncipio`
  ADD PRIMARY KEY (`id_adm_dep_muncipio`);

--
-- Indices de la tabla `adm_empresa`
--
ALTER TABLE `adm_empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `adm_equipo`
--
ALTER TABLE `adm_equipo`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `adm_item`
--
ALTER TABLE `adm_item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`id_cotizacion`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalles_cotizacion`
--
ALTER TABLE `detalles_cotizacion`
  ADD PRIMARY KEY (`id_detalle_cotizacion`),
  ADD KEY `cotizacion_id` (`cotizacion_id`),
  ADD KEY `equipo_id` (`equipo_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `area_id` (`area_id`);

--
-- Indices de la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `factura_id` (`factura_id`),
  ADD KEY `equipo_id` (`equipo_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `area_id` (`area_id`);

--
-- Indices de la tabla `detalles_orden_servicio`
--
ALTER TABLE `detalles_orden_servicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orden_servicio_id` (`orden_servicio_id`),
  ADD KEY `equipo_id` (`equipo_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `area_id` (`area_id`);

--
-- Indices de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD PRIMARY KEY (`id_facturacion`),
  ADD KEY `clientes_id` (`clientes_id`);

--
-- Indices de la tabla `fac_cliente`
--
ALTER TABLE `fac_cliente`
  ADD PRIMARY KEY (`id_empresa`,`id_cliente`);

--
-- Indices de la tabla `fac_cliente_area`
--
ALTER TABLE `fac_cliente_area`
  ADD PRIMARY KEY (`id_cliente`,`id_area`);

--
-- Indices de la tabla `fac_factura_detalle`
--
ALTER TABLE `fac_factura_detalle`
  ADD PRIMARY KEY (`id_fac_factura_enc`,`id_fac_factura_detalle`);

--
-- Indices de la tabla `fac_factura_enc`
--
ALTER TABLE `fac_factura_enc`
  ADD PRIMARY KEY (`id_fac_factura_enc`);

--
-- Indices de la tabla `fac_tarifario_cliente`
--
ALTER TABLE `fac_tarifario_cliente`
  ADD PRIMARY KEY (`id_fac_tarifario_item_cliente`);

--
-- Indices de la tabla `fac_tarifario_item`
--
ALTER TABLE `fac_tarifario_item`
  ADD PRIMARY KEY (`id_fac_tarifario_item`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departamento_id` (`departamento_id`);

--
-- Indices de la tabla `newtable`
--
ALTER TABLE `newtable`
  ADD PRIMARY KEY (`id_adm_dep_muncipio`);

--
-- Indices de la tabla `observaciones_orden`
--
ALTER TABLE `observaciones_orden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_orden_id` (`detalle_orden_id`);

--
-- Indices de la tabla `ope_cliente_equipo`
--
ALTER TABLE `ope_cliente_equipo`
  ADD PRIMARY KEY (`id_ope_equipo_cli`);

--
-- Indices de la tabla `ope_cotizacion_cliente`
--
ALTER TABLE `ope_cotizacion_cliente`
  ADD PRIMARY KEY (`id_cotizacion_cliente`);

--
-- Indices de la tabla `ope_orden_trabajo`
--
ALTER TABLE `ope_orden_trabajo`
  ADD PRIMARY KEY (`id_ope_orden_trabajo`);

--
-- Indices de la tabla `ope_orden_trabajo_detalle`
--
ALTER TABLE `ope_orden_trabajo_detalle`
  ADD PRIMARY KEY (`id_ope_orden_trabajo_detalle`);

--
-- Indices de la tabla `orden_servicio`
--
ALTER TABLE `orden_servicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientes_id` (`clientes_id`),
  ADD KEY `tecnico_id` (`tecnico_id`);

--
-- Indices de la tabla `rel_area_equipo`
--
ALTER TABLE `rel_area_equipo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_area` (`areas_id`),
  ADD KEY `id_equipo` (`equipos_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarifas_clientes`
--
ALTER TABLE `tarifas_clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adm_areas`
--
ALTER TABLE `adm_areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `adm_clase_equipo`
--
ALTER TABLE `adm_clase_equipo`
  MODIFY `id_clase_equipo` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'id de la tabla', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `adm_clientes`
--
ALTER TABLE `adm_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `adm_consecutivo`
--
ALTER TABLE `adm_consecutivo`
  MODIFY `id_adm_consecutivo` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'id de la tabla', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `adm_dep_muncipio`
--
ALTER TABLE `adm_dep_muncipio`
  MODIFY `id_adm_dep_muncipio` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'id de la tabla';

--
-- AUTO_INCREMENT de la tabla `adm_empresa`
--
ALTER TABLE `adm_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la empresa auto generado o el ultimo mas 1', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `adm_equipo`
--
ALTER TABLE `adm_equipo`
  MODIFY `id_equipo` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'identificador del equipo', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `adm_item`
--
ALTER TABLE `adm_item`
  MODIFY `id_item` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'id de la tabla', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `id_cotizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalles_cotizacion`
--
ALTER TABLE `detalles_cotizacion`
  MODIFY `id_detalle_cotizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `detalles_orden_servicio`
--
ALTER TABLE `detalles_orden_servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  MODIFY `id_facturacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `newtable`
--
ALTER TABLE `newtable`
  MODIFY `id_adm_dep_muncipio` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'id de la tabla';

--
-- AUTO_INCREMENT de la tabla `observaciones_orden`
--
ALTER TABLE `observaciones_orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ope_cliente_equipo`
--
ALTER TABLE `ope_cliente_equipo`
  MODIFY `id_ope_equipo_cli` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'id de la tabla';

--
-- AUTO_INCREMENT de la tabla `ope_orden_trabajo`
--
ALTER TABLE `ope_orden_trabajo`
  MODIFY `id_ope_orden_trabajo` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'id de la tabla';

--
-- AUTO_INCREMENT de la tabla `orden_servicio`
--
ALTER TABLE `orden_servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `rel_area_equipo`
--
ALTER TABLE `rel_area_equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tarifas_clientes`
--
ALTER TABLE `tarifas_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
