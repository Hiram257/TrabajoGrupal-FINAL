-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2023 a las 01:37:43
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_tienda_computo`
--
create database db_tienda_computo;
use db_tienda_computo;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `asistencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id`, `id_personal`, `fecha`, `asistencia`) VALUES
(1, 1, '2023-06-02', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `tipo_cargo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `tipo_cargo`) VALUES
(1, 'administrador'),
(2, 'venta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `dni` varchar(10) DEFAULT NULL,
  `nombre_apellido` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `dni`, `nombre_apellido`) VALUES
(1, '1', NULL),
(2, '12345678', 'John Doe'),
(3, '12345678', 'John Doe'),
(4, '12345678', 'John Doe'),
(5, '12345678', 'John Doe'),
(6, '12345678', 'John Doe'),
(7, '12345678', 'John Doe'),
(8, '12345678', 'John Doe'),
(9, '12345678', 'John Doe'),
(10, '12345678', 'John Doe'),
(11, '12345678', 'John Doe'),
(12, '12345678', 'John Doe'),
(13, '12345678', 'Jose'),
(14, '12345678', 'John Doe'),
(15, '12345678', 'John Doe'),
(16, '12345678', 'John Doe'),
(17, '12345678', 'John Doe'),
(18, '12345678', 'John Doe'),
(19, '12345678', 'John Doe'),
(20, '12345678', 'John Doe'),
(21, '12345678', 'Jose'),
(22, '12345678', 'Jose'),
(23, '12345678', 'Jose'),
(24, '12345678', 'Jose'),
(25, '12345678', 'Jose'),
(26, '7894561', 'jose perez'),
(27, '7894561', 'jose perez'),
(28, '789456', 'yossec prueba falso'),
(29, '789456', 'yossec prueba falso'),
(30, '258963', 'jefferson'),
(31, '123456', 'adada'),
(32, '12345678', 'Jose'),
(33, '12345678', 'Jose'),
(34, '12345678', 'Jose'),
(35, '12345678', 'Jose'),
(37, '12345678', 'Jose'),
(38, '12345678', 'Jose'),
(39, '12345678', 'Jose'),
(40, '12345678', 'Jose'),
(41, '85258', 'sven suarez'),
(42, '12345678', 'Jose yossec'),
(43, '12345678', 'Jose yossec'),
(44, '12345678', 'Jose yossec'),
(45, '12345678', 'Jose yossec jefferson'),
(46, '12345678', 'Jose'),
(47, '12345678', 'Jose yossec jefferson'),
(48, '36', 'papa'),
(53, '123', 'sandra'),
(56, '12', 'luna'),
(58, '12345678', 'Jose'),
(59, '12345678', 'Jose'),
(60, '12345678', 'Jose'),
(61, '12345678', 'Jose'),
(63, 'ad', 'ad'),
(65, '12345678', 'Jose'),
(67, '12345678', 'Jose yossec'),
(68, '12345678', 'Jose yossec pedro'),
(69, '12345678', 'Jose'),
(70, '12345678', 'Jose yossec pedro'),
(71, '', ''),
(72, '789', 'papap'),
(73, 'Array', 'Array'),
(74, '2', '22'),
(75, '12345678', 'Jose'),
(76, '12345678', 'Jose'),
(77, '1', '1a'),
(78, '15', 'rata1'),
(79, '12345678', 'Jose'),
(80, '90', 'popo'),
(81, '90', 'popo'),
(82, '91', '12ada'),
(83, '9630', 'SIMON PEREZ'),
(84, '12345678', 'Jose'),
(85, '12345678', 'Jose'),
(86, '789', 'adad'),
(87, '1', 'limpieza'),
(88, '98 ', 'simon'),
(89, '75148266', 'SUAREZ ARRATEA YOSSEC'),
(90, '75007640', 'HIRAM'),
(91, '78', 'RAMON'),
(92, '852', 'JESUS'),
(93, '789852', 'gama');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` varchar(11) NOT NULL,
  `precio_total` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id`, `id_venta`, `id_producto`, `cantidad`, `precio_total`) VALUES
(2, 3, 1, '2', '40.000'),
(6, 5, 1, '2', '50.000'),
(7, 11, 1, '3', '50.000'),
(8, 12, 1, '3', '50.000'),
(9, 12, 2, '3', '50.000'),
(10, 13, 1, '3', '50.000'),
(11, 13, 2, '3', '50.000'),
(12, 14, 1, '3', '50.000'),
(13, 14, 2, '3', '50.000'),
(14, 14, 1, '1', '58000.000'),
(15, 14, 2, '1', '2000.000'),
(26, 15, 1, '1', '58000.000'),
(27, 15, 2, '1', '2000.000'),
(28, 16, 1, '3', '50.000'),
(29, 16, 2, '3', '50.000'),
(30, 17, 1, '3', '50.000'),
(31, 17, 2, '3', '50.000'),
(32, 18, 1, '3', '50.000'),
(33, 18, 2, '3', '50.000'),
(34, 19, 2, '1', '12.000'),
(35, 19, 1, '1', '21.000'),
(36, 20, 2, '3', '12.000'),
(37, 20, 1, '1', '21.000'),
(52, 21, 1, '1', '12.000'),
(53, 21, 2, '1', '21.000'),
(54, 22, 1, '3', '50.000'),
(55, 22, 2, '3', '50.000'),
(56, 23, 1, '3', '50.000'),
(57, 23, 2, '3', '50.000'),
(58, 28, 1, '3', '50.000'),
(59, 28, 2, '3', '50.000'),
(61, 34, 1, '1', '12.000'),
(63, 37, 1, '1', '12.000'),
(64, 39, 1, '3', '50.000'),
(65, 39, 2, '3', '50.000'),
(66, 40, 1, '3', '50.000'),
(67, 40, 2, '3', '50.000'),
(68, 40, 1, '1', '1.000'),
(69, 46, 1, '3', '50.000'),
(70, 46, 2, '3', '50.000'),
(71, 50, 1, '3', '50.000'),
(72, 50, 2, '3', '50.000'),
(73, 51, 1, '1', '1.000'),
(74, 54, 1, '3', '50.000'),
(75, 54, 2, '3', '50.000'),
(76, 55, 1, '3', '50'),
(77, 55, 2, '3', '50'),
(78, 56, 2, '1', '12,00'),
(79, 57, 2, '1', '12,00'),
(80, 58, 1, '3', '50'),
(81, 58, 2, '3', '50'),
(82, 59, 2, '1', '12,00'),
(83, 60, 1, '2', '42,00'),
(84, 60, 2, '1', '12,00'),
(85, 61, 2, '1', '12,00'),
(86, 62, 1, '1', '21,00'),
(87, 62, 2, '1', '12,00'),
(88, 63, 1, '3', '50'),
(89, 63, 2, '3', '50'),
(90, 64, 1, '3', '50'),
(91, 64, 2, '3', '50'),
(92, 65, 2, '1', '12,00'),
(93, 66, 2, '1', '12,00'),
(94, 67, 1, '1', '21,00'),
(95, 68, 1, '4', '84,00'),
(96, 68, 2, '3', '36,00'),
(97, 69, 1, '3', '63,00'),
(98, 69, 2, '1', '12,00'),
(99, 70, 1, '1', '21,00'),
(100, 70, 2, '1', '12,00'),
(101, 71, 3, '1', '3,5'),
(102, 71, 2, '1', '12,00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familia`
--

CREATE TABLE `familia` (
  `id` int(11) NOT NULL,
  `nombre_familia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `familia`
--

INSERT INTO `familia` (`id`, `nombre_familia`) VALUES
(1, 'TECLADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nombre_marca` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre_marca`) VALUES
(1, 'LOGITECH');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `dni` varchar(10) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nombre_apellido` varchar(100) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `estado_personal` int(11) DEFAULT NULL,
  `id_cargo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `dni`, `foto`, `nombre_apellido`, `contrasena`, `estado_personal`, `id_cargo`) VALUES
(1, '125', 'a', 'ADMINISTRADOR', 'abc', 1, 2),
(3, '256', 'a', 'VENTA', 'abc', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `codigo_producto` varchar(50) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_familia` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `id_ubicacion` int(11) DEFAULT NULL,
  `estado_producto` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `descripcion`, `precio`, `stock`, `codigo_producto`, `id_marca`, `id_familia`, `nombre`, `id_ubicacion`, `estado_producto`, `id_proveedor`, `imagen`) VALUES
(1, 'teclado', 98.00, 100, '1313', 1, 1, 'teclado logitech', 1, 1, 1, 'teclado.jfif'),
(2, 'azucar', 12.00, 2, '331331', 1, 1, 'silla gamer rosado', 1, 1, 1, 'silla.jfif'),
(3, 'arroz', 3.50, 20, '2020', 1, 1, 'PC personalizado', 1, 1, 1, 'pc2.jfif'),
(4, 'cuaderno', 80.00, 1, '963258', 1, 1, 'escritorio gamer', 1, 1, 1, 'pc_gamer.jfif'),
(5, 'DescripciÃ³n del producto', 19.99, 10, 'ABC123', 1, 1, 'mause', 1, 1, 1, 'mause.jfif'),
(6, 'PC', 5000.00, 20, '7896325', 1, 1, 'PC ASUS', 1, 1, 1, 'img1.jpg'),
(7, 'L', 20.00, 20, '120', 1, 1, 'laptop', 1, 1, 1, 'laptop2.jfif'),
(8, 'u', 12.00, 20, '1', 1, 1, 'tarjeta grafica', 1, 1, 1, 'tarjeta.jfif'),
(9, 'tar', 20.00, 500, '520a', 1, 1, 'silla gamer negro', 1, 1, 1, 'silla_negro.jfif');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provedores`
--

CREATE TABLE `provedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `celular` int(11) NOT NULL,
  `tipo_provedor` varchar(255) NOT NULL,
  `red_social` varchar(255) NOT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `provedores`
--

INSERT INTO `provedores` (`id`, `nombre`, `direccion`, `celular`, `tipo_provedor`, `red_social`, `estado`) VALUES
(1, 'Nuevo nombre', 'Nueva direcciÃ³n', 78945, 'Nuevo tipo de proveedor', 'Nueva red social', 1),
(2, '', '', 455454, '', 'valor_red_social', 1),
(3, 'valor_nombre', 'valor_direccion', 455454, '', 'valor_red_social', 1),
(4, 'valor_nombre', 'valor_direccion', 455454, 'empresa', 'valor_red_social', 0),
(5, 'valor_nombre', 'valor_direccion', 455454, 'empresa', 'valor_red_social', 0),
(6, 'valor_nombre', 'valor_direccion', 455454, 'empresa', 'valor_red_social', 1),
(7, 'valor_nombre', 'valor_direccion', 455454, 'empresa', 'valor_red_social', 1),
(8, 'yossec suarez', 'amarilis', 963258741, 'persona', 'fb_yossec', 0),
(9, 'je', 'f', 131, 'ada', 'q', 1),
(10, 'a', 'a', 1, 'a', 'a', 0),
(11, 'yossec suarez', 'amarilis', 963258741, 'persona', 'fb_yossec', 1),
(12, 'yossec suarez', 'amarilis', 12345645, 'persona', 'fb_yossec', 0),
(13, 'barrer', 'amarilis', 963258741, 'persona', 'fb_yossec', 1),
(14, 'limpieza', 'amarilis', 963258741, 'persona', 'fb_yossec', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id` int(11) NOT NULL,
  `nombre_ubicacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`id`, `nombre_ubicacion`) VALUES
(1, 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `numero_serie` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad_producto` varchar(11) NOT NULL,
  `estado_pago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `id_cliente`, `id_personal`, `numero_serie`, `total`, `fecha`, `cantidad_producto`, `estado_pago`) VALUES
(3, 1, 1, '1', '101.000', '2023-05-28', '3', 1),
(4, 3, 1, '1111', '100.000', '2023-05-29', '2', 1),
(5, 4, 1, '1111', '100.000', '2023-05-29', '2', 1),
(6, 5, 1, '1111', '100.000', '2023-05-29', '2', 1),
(7, 6, 1, '1111', '100.000', '2023-05-29', '2', 1),
(8, 7, 1, '1111', '100.000', '2023-05-29', '2', 1),
(9, 8, 1, '888', '100.000', '2023-05-29', '2', 1),
(10, 9, 1, '888', '100.000', '2023-05-29', '2', 1),
(11, 10, 1, '888', '100.000', '2023-05-29', '2', 1),
(12, 11, 1, '888', '100.000', '2023-05-29', '2', 1),
(13, 12, 1, '888', '100.000', '2023-05-29', '2', 1),
(14, 13, 1, '888', '100.000', '2023-05-29', '2', 1),
(15, 20, 1, '10', '120000.000', '2023-05-29', '2', 1),
(16, 21, 1, '888', '100.000', '2023-05-29', '2', 1),
(17, 22, 1, '888', '100.000', '2023-05-29', '2', 1),
(18, 23, 1, '888', '100.000', '2023-05-29', '2', 1),
(19, 24, 1, '888', '100.000', '2023-05-29', '2', 1),
(20, 25, 1, '888', '100.000', '2023-05-29', '2', 1),
(21, 38, 1, '2222', '200.000', '2023-05-30', '2', 1),
(22, 39, 1, '2222', '200.000', '2023-05-30', '2', 1),
(23, 40, 1, '852', '100.000', '2023-05-31', '2', 1),
(24, 42, 1, '852', '100.000', '2023-05-31', '2', 1),
(25, 43, 1, '852', '100.000', '2023-05-31', '2', 1),
(26, 44, 1, '852', '100.000', '2023-05-31', '2', 1),
(27, 45, 1, '852', '100.000', '2023-05-31', '2', 1),
(28, 46, 1, '852', '100.000', '2023-05-31', '2', 1),
(29, 47, 1, '852', '100.000', '2023-05-31', '2', 1),
(34, 53, 1, '853', '20.000', '2023-05-30', '1', 1),
(37, 56, 1, '15', '15.000', '2023-05-30', '1', 1),
(39, 58, 1, '852', '100.000', '2023-05-31', '2', 1),
(40, 59, 1, '852', '100.000', '2023-05-31', '2', 1),
(41, 60, 1, '852', '100.000', '2023-05-31', '2', 1),
(42, 61, 1, '852', '100.000', '2023-05-31', '2', 1),
(44, 61, 1, '85', '10.000', '2023-05-31', '1', 1),
(46, 65, 1, '852', '100.000', '2023-05-31', '2', 1),
(48, 67, 1, '852', '100.000', '2023-05-31', '2', 1),
(49, 68, 1, '852', '100.000', '2023-05-31', '2', 1),
(50, 69, 1, '852', '100.000', '2023-05-31', '2', 1),
(51, 70, 1, '852', '100.000', '2023-05-31', '2', 1),
(52, 71, 1, '852', '100.000', '2023-05-31', '2', 1),
(53, 72, 1, '852', '100.000', '2023-05-31', '2', 1),
(54, 75, 1, '852', '100.000', '2023-05-31', '2', 1),
(55, 76, 1, '852', '100', '2023-05-31', '2', 1),
(56, 77, 1, '1', '10', '2023-05-31', '1', 1),
(57, 78, 1, '1456', '10', '2023-05-31', '1', 1),
(58, 79, 1, '852', '100', '2023-05-31', '2', 1),
(59, 80, 1, '78', '10', '2023-05-31', '1', 1),
(60, 81, 1, '78', '10', '2023-05-31', '1', 1),
(61, 82, 1, '1ad1', '12,00', '2023-05-31', '1', 1),
(62, 83, 1, '963023', '33,00', '2023-05-31', '1', 1),
(63, 84, 1, '852', '100', '2023-05-31', '2', 1),
(64, 85, 1, '852', '100', '2023-05-31', '2', 1),
(65, 86, 1, '120', '12,00', '2023-05-31', '4', 1),
(66, 87, 1, '13', '12,00', '2023-05-31', '1', 1),
(67, 88, 1, '456123', '21,00', '2023-06-01', '1', 1),
(68, 89, 1, '12345', '120,00', '2023-06-01', '2', 1),
(69, 90, 1, '7894', '75,00', '2023-06-01', '2', 1),
(70, 91, 1, '78945', '33,00', '2023-06-01', '2', 1),
(71, 92, 1, '120', '15,5,00', '2023-06-01', '2', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_personal` (`id_personal`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_venta_fk0` (`id_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `familia`
--
ALTER TABLE `familia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_familia` (`id_familia`),
  ADD KEY `id_ubicacion` (`id_ubicacion`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `provedores`
--
ALTER TABLE `provedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_personal` (`id_personal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `familia`
--
ALTER TABLE `familia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `provedores`
--
ALTER TABLE `provedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_fk0` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id`),
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_familia`) REFERENCES `familia` (`id`),
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`id_ubicacion`) REFERENCES `ubicacion` (`id`),
  ADD CONSTRAINT `producto_ibfk_4` FOREIGN KEY (`id_proveedor`) REFERENCES `provedores` (`id`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
