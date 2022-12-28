-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2022 a las 11:07:27
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectophp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operarios`
--

CREATE TABLE `operarios` (
  `operario_id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `operarios`
--

INSERT INTO `operarios` (`operario_id`, `nombre`) VALUES
(1, 'Marc'),
(2, 'Jesus'),
(3, 'David');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `tarea_id` int(6) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `poblacion` varchar(45) NOT NULL,
  `codigo_postal` varchar(45) NOT NULL,
  `provincia` varchar(45) NOT NULL,
  `estado_tarea` varchar(45) NOT NULL,
  `fecha_creacion` varchar(45) NOT NULL,
  `operario_encargado` varchar(45) NOT NULL,
  `fecha_realizacion` varchar(45) DEFAULT NULL,
  `anotacion_inicio` varchar(45) DEFAULT NULL,
  `anotacion_final` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`tarea_id`, `dni`, `nombre`, `apellido`, `telefono`, `correo`, `direccion`, `poblacion`, `codigo_postal`, `provincia`, `estado_tarea`, `fecha_creacion`, `operario_encargado`, `fecha_realizacion`, `anotacion_inicio`, `anotacion_final`) VALUES
(1, '123454', 'Kike', 'Pereira', '658 215 3', 'kike@gmail.com', 'C Camarada Montiel Pichardo', 'Huelva', '21007', 'Huelva', 'B', '2022-12-05', 'Pepe', '2022-12-06', NULL, ''),
(4, '49955895X', 'Jesus', 'fernandez', '426 153 658', 'jesus@gmail.com', 'C/ pito grandote n7', 'Niebla', '21009', 'Huelva', 'B', '2022-12-09', 'Marc', '2022-12-28', 'es por la ñ', NULL),
(5, '77750726P', 'marc', 'pito', '655 987 123', 'kike@gmail.com', 'La Monacilla', 'Corrales', '21009', 'Avila', 'Pendiente', '2022-12-09', 'Jesus', '2022-12-26', '', ''),
(7, '49106450R', 'kike', 'Pereira', '652 654 456', 'kike@gmail.com', 'C/ pito grandote n7', 'Niebla', '21009', 'Ciudad Real', 'Validacion', '2022-12-12', 'Jesus', '2022-12-14', '', ''),
(9, '49955895X', 'Jesus', 'fernandez', '426 153 658', 'jesus@gmail.com', 'C/ pito grandote n7', 'Niebla', '21009', 'Huelva', 'B', '2022-12-15', 'Marc', '2022-12-28', 'es por la ñ', ''),
(10, '49955895X', 'Jesus', 'fernandez', '426 153 658', 'jesus@gmail.com', 'C/ pito grandote n7', 'Niebla', '21009', 'Huelva', 'B', '2022-12-15', 'Marc', '2022-12-28', 'es por la ñ', ''),
(11, '49955895X', 'Jesus', 'fernandez', '426 153 658', 'jesus@gmail.com', 'C/ pito grandote n7', 'Niebla', '21009', 'Huelva', 'B', '2022-12-15', 'Marc', '2022-12-28', 'es por la ñ', ''),
(12, '77750726P', 'marc', 'pito', '655 987 123', 'kike@gmail.com', 'La Monacilla', 'Corrales', '21009', 'Avila', 'Pendiente', '2022-12-15', 'Jesus', '2022-12-26', '', ''),
(13, '49106450R', 'Santiago', 'Profe', '658 521 623', 'santi@gmail.com', 'La Monacilla', 'Corrales', '21300', 'Almera', 'Validacion', '2022-12-15', 'Marc', '2022-12-16', 'asdasd', NULL),
(14, '49106450R', 'Santiago', 'Profe', '658 521 623', 'santi@gmail.com', 'La Monacilla', 'Corrales', '21300', 'Almera', 'Validacion', '2022-12-15', 'Marc', '2022-12-16', 'asdasd', NULL),
(15, '49106450R', 'operario', 'Llork', '554 444 444', 'kike@gmail.com', 'La Monacilla', 'Corrales', '21300', 'Albacete', 'Validacion', '2022-12-15', 'Jesus', '2022-12-16', 'asdasda', NULL),
(16, '49106450R', 'operario', 'Llork', '554 444 444', 'kike@gmail.com', 'La Monacilla', 'Corrales', '21300', 'Albacete', 'Validacion', '2022-12-15', 'Jesus', '2022-12-16', 'asdasda', NULL),
(17, '49106450R', 'operario', 'Llork', '554 444 444', 'kike@gmail.com', 'La Monacilla', 'Corrales', '21300', 'Albacete', 'Validacion', '2022-12-15', 'Jesus', '2022-12-16', 'asdasda', NULL),
(18, '49106450R', 'admin', 'pepe', '111 111 111', 'kike@gmail.com', 'La Monacilla', 'Corrales', '21300', 'Guipzcoa', 'Validacion', '2022-12-15', 'Marc', '2022-12-17', 'asdasd', NULL),
(19, '49106450R', 'admin', 'Llork', '111 111 111', 'kike@gmail.com', 'La Monacilla', 'Corrales', '21300', 'Girona', 'Validacion', '2022-12-15', 'David', '2022-12-17', 'tres copias', NULL),
(20, '49106450R', 'enrique', 'q', '111 111 111', 'kike@gmail.com', 'La Monacilla', 'Corrales', '21300', 'Guipzcoa', 'Validacion', '2022-12-15', 'David', '2022-12-16', 'asdasdasd', NULL),
(21, '49106450R', 'enrique', 'q', '111 111 111', 'kike@gmail.com', 'La Monacilla', 'Corrales', '21300', 'Guipzcoa', 'Validacion', '2022-12-15', 'David', '2022-12-16', 'asdasdasd', NULL),
(22, '49106450R', 'enrique', 'q', '111 111 111', 'kike@gmail.com', 'La Monacilla', 'Corrales', '21300', 'Guipzcoa', 'Validacion', '2022-12-15', 'David', '2022-12-16', 'asdasdasd', NULL),
(23, '49106450R', 'Santi', 'profe', '111 111 111', 'kike@gmail.com', 'La Monacilla', 'Niebla', '21300', 'Balears (Illes)', 'Validacion', '2022-12-15', 'Marc', '2022-12-16', 'asdasdasd', NULL),
(24, '49106450R', 'Santi', 'profe', '111 111 111', 'kike@gmail.com', 'La Monacilla', 'Niebla', '21300', 'Balears (Illes)', 'Validacion', '2022-12-15', 'Marc', '2022-12-16', 'asdasdasd', NULL),
(25, '49106450R', 'Santi', 'profe', '111 111 111', 'kike@gmail.com', 'La Monacilla', 'Niebla', '21300', 'Balears (Illes)', 'Borrada', '2022-12-15', 'Marc', '2022-12-16', 'asdasdasd', NULL),
(26, '49106450R', 'Santi', 'profe', '111 111 111', 'kike@gmail.com', 'La Monacilla', 'Niebla', '21300', 'Balears (Illes)', 'Borrada', '2022-12-15', 'Marc', '2022-12-16', 'asdasdasd', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_comunidadesautonomas`
--

CREATE TABLE `tbl_comunidadesautonomas` (
  `id` tinyint(4) NOT NULL DEFAULT 0,
  `nombre` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Afiliados de alta';

--
-- Volcado de datos para la tabla `tbl_comunidadesautonomas`
--

INSERT INTO `tbl_comunidadesautonomas` (`id`, `nombre`) VALUES
(1, 'Andalucía'),
(2, 'Aragón'),
(3, 'Asturias (Principado de)'),
(4, 'Balears (IIles)'),
(5, 'Canarias'),
(6, 'Cantabria'),
(8, 'Castilla y León'),
(7, 'Castilla-La Mancha'),
(9, 'Cataluña'),
(18, 'Ceuta'),
(10, 'Comunidad Valenciana'),
(11, 'Extremadura'),
(12, 'Galicia'),
(13, 'Madrid (Comunidad de)'),
(19, 'Melilla'),
(14, 'Murcia (Región de)'),
(15, 'Navarra (Comunidad Foral de)'),
(16, 'País Vasco'),
(17, 'Rioja (La)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_provincias`
--

CREATE TABLE `tbl_provincias` (
  `cod` char(2) NOT NULL DEFAULT '00' COMMENT 'Código de la provincia de dos digitos',
  `nombre` varchar(50) NOT NULL DEFAULT '' COMMENT 'Nombre de la provincia',
  `comunidad_id` tinyint(4) NOT NULL COMMENT 'Código de la comunidad a la que pertenece'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Provincias de españa; 99 para seleccionar a Nacional';

--
-- Volcado de datos para la tabla `tbl_provincias`
--

INSERT INTO `tbl_provincias` (`cod`, `nombre`, `comunidad_id`) VALUES
('01', 'Alava', 16),
('02', 'Albacete', 7),
('03', 'Alicante', 10),
('04', 'Almera', 1),
('05', 'Avila', 8),
('06', 'Badajoz', 11),
('07', 'Balears (Illes)', 4),
('08', 'Barcelona', 9),
('09', 'Burgos', 8),
('10', 'Cáceres', 11),
('11', 'Cádiz', 1),
('12', 'Castellón', 10),
('13', 'Ciudad Real', 7),
('14', 'Córdoba', 1),
('15', 'Coruña (A)', 12),
('16', 'Cuenca', 7),
('17', 'Girona', 9),
('18', 'Granada', 1),
('19', 'Guadalajara', 7),
('20', 'Guipzcoa', 16),
('21', 'Huelva', 1),
('22', 'Huesca', 2),
('23', 'Jaén', 1),
('24', 'León', 8),
('25', 'Lleida', 9),
('26', 'Rioja (La)', 17),
('27', 'Lugo', 12),
('28', 'Madrid', 13),
('29', 'Málaga', 1),
('30', 'Murcia', 14),
('31', 'Navarra', 15),
('32', 'Ourense', 12),
('33', 'Asturias', 3),
('34', 'Palencia', 8),
('35', 'Palmas (Las)', 5),
('36', 'Pontevedra', 12),
('37', 'Salamanca', 8),
('38', 'Santa Cruz de Tenerife', 5),
('39', 'Cantabria', 6),
('40', 'Segovia', 8),
('41', 'Sevilla', 1),
('42', 'Soria', 8),
('43', 'Tarragona', 9),
('44', 'Teruel', 2),
('45', 'Toledo', 7),
('46', 'Valencia', 10),
('47', 'Valladolid', 8),
('48', 'Vizcaya', 16),
('49', 'Zamora', 8),
('50', 'Zaragoza', 2),
('51', 'Ceuta', 18),
('52', 'Melilla', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `hora` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `nombre`, `password`, `tipo`, `hora`) VALUES
(10, 'admin', 'admin', 'admin', '10:26:10'),
(11, 'operario1', 'op', 'operario', ''),
(12, 'backdoor', 'backdoor', 'admin', '10:19:56');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `operarios`
--
ALTER TABLE `operarios`
  ADD PRIMARY KEY (`operario_id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`tarea_id`);

--
-- Indices de la tabla `tbl_comunidadesautonomas`
--
ALTER TABLE `tbl_comunidadesautonomas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `tbl_provincias`
--
ALTER TABLE `tbl_provincias`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `nombre` (`nombre`),
  ADD KEY `FK_ComunidadAutonomaProv` (`comunidad_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `operarios`
--
ALTER TABLE `operarios`
  MODIFY `operario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `tarea_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
