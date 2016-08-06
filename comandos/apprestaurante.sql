-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-08-2016 a las 21:45:04
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apprestaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(10) NOT NULL,
  `idRestaurante` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `idRestaurante`, `nombre`) VALUES
(1, 1, 'Entrantes'),
(2, 1, 'Combos'),
(3, 1, 'Primeros'),
(4, 1, 'Segundos'),
(5, 1, 'Postres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costes`
--

CREATE TABLE `costes` (
  `idCoste` int(10) NOT NULL,
  `coste` float NOT NULL,
  `beneficio` float NOT NULL,
  `empleado` float NOT NULL,
  `ingredientes` float NOT NULL,
  `local` float NOT NULL,
  `idRestaurante` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE `medidas` (
  `idMedida` int(10) NOT NULL,
  `nombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medidas`
--

INSERT INTO `medidas` (`idMedida`, `nombre`) VALUES
(1, 'cl'),
(2, 'gr'),
(3, 'oz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `idPerfil` int(10) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`idPerfil`, `nombre`) VALUES
(1, 'Admi. Plataforma'),
(2, 'Responsable'),
(3, 'Camarero'),
(4, 'Cocinero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `idPlato` int(10) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `precio` float NOT NULL,
  `ingredientes` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `valoracion` int(50) NOT NULL DEFAULT '0',
  `idCategoria` int(3) NOT NULL,
  `idRestaurante` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`idPlato`, `nombre`, `precio`, `ingredientes`, `descripcion`, `imagen`, `valoracion`, `idCategoria`, `idRestaurante`) VALUES
(1, 'Plato 1', 25.5, '1,2,3,', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. ', 'pollito.jpg', 10, 1, 1),
(2, 'Plato2', 15.5, '1,2,', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. ', 'brochetas.jpg', 7, 2, 1),
(3, 'asd', 20.5, '1,2,', 'sdasd', 'photo3.jpg', 1, 1, 1),
(4, 'asda', 20.5, '1,2,3,', 'asdasd', 'wallpaper-de-guitarra-gibson-1714.jpg', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(10) NOT NULL,
  `ean` bigint(15) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(5) NOT NULL,
  `caducidad` date NOT NULL,
  `precio` float NOT NULL,
  `esencial` tinyint(1) NOT NULL,
  `idMedida` int(10) NOT NULL,
  `idRestaurante` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `ean`, `nombre`, `cantidad`, `caducidad`, `precio`, `esencial`, `idMedida`, `idRestaurante`) VALUES
(5, 5901234123458, 'Producto5', 2, '2016-07-27', 15.25, 0, 2, 1),
(6, 5901234123457, 'Producto6', 1, '2016-07-28', 9.75, 0, 1, 1),
(7, 5901234123457, 'Nuevo Producto8', 5, '2016-07-28', 10.5, 1, 1, 1),
(8, 5901234123457, 'Nuevo Producto258', 1, '2016-07-28', 20.5, 0, 1, 1),
(9, 6553, 'Nuevo Producto335', 2, '2016-07-28', 12.25, 1, 1, 1),
(11, 2147483647, 'Producto new', 45, '2016-07-28', 12.25, 1, 2, 1),
(12, 2147483647, 'Producto new', 45, '2016-07-31', 12.25, 1, 2, 1),
(13, 5901234123457, 'Producto new', 45, '2016-07-31', 12.25, 1, 2, 1),
(14, 5901234123457, 'Patatas fritas', 20, '2016-07-31', 10.5, 0, 1, 1),
(15, 5901234123457, 'Patatas fritas quema', 2, '2016-08-07', 11.25, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE `restaurantes` (
  `idRestaurante` int(10) NOT NULL,
  `cif` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` int(9) NOT NULL,
  `estiloCSS` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`idRestaurante`, `cif`, `nombre`, `email`, `telefono`, `estiloCSS`, `logo`) VALUES
(1, '1111111A', 'Restaurante1', 'restaurante@1.es', 666999666, 'default.css', 'app-restaurante.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sla`
--

CREATE TABLE `sla` (
  `id` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `valor` int(10) NOT NULL,
  `color` varchar(10) NOT NULL,
  `idRestaurante` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sla`
--

INSERT INTO `sla` (`id`, `nombre`, `valor`, `color`, `idRestaurante`) VALUES
(1, 'Entrantes', 1, '#A9FFA6', 1),
(2, 'Primeros', 3, '#FFDFA6', 1),
(3, 'Segundo', 7, '#F781D8', 1),
(4, 'Postres', 10, '#FF8181', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `idTicket` int(10) NOT NULL,
  `mesa` int(4) NOT NULL,
  `fecha` datetime NOT NULL,
  `idUsuario` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `total` float NOT NULL,
  `abierto` tinyint(1) NOT NULL,
  `abiertoCocina` tinyint(1) NOT NULL,
  `idRestaurante` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`idTicket`, `mesa`, `fecha`, `idUsuario`, `total`, `abierto`, `abiertoCocina`, `idRestaurante`) VALUES
(1, 5, '2016-07-19 00:00:00', '1', 134, 0, 0, 1),
(8, 3, '2016-07-20 00:00:00', '1', 41, 0, 0, 1),
(19, 4, '2016-07-23 00:00:00', '1', 15.5, 0, 0, 1),
(20, 4, '2016-07-24 00:00:00', '1', 0, 0, 0, 1),
(23, 1, '2016-07-24 00:00:00', '1', 0, 0, 0, 1),
(24, 2, '2016-07-24 00:00:00', '1', 0, 0, 0, 1),
(25, 3, '2016-07-30 00:00:00', '2', 25.5, 0, 0, 1),
(26, 4, '2016-07-30 00:00:00', '2', 31, 1, 0, 1),
(45, 1, '2016-08-06 19:47:02', '1', 25.5, 1, 0, 1),
(46, 3, '2016-08-06 20:38:19', '1', 0, 1, 0, 1),
(47, 9, '2016-08-06 20:38:23', '1', 25.5, 1, 1, 1),
(48, 2, '2016-08-06 21:02:56', '1', 20.5, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticketsplatos`
--

CREATE TABLE `ticketsplatos` (
  `idTicketPlato` int(10) NOT NULL,
  `idPlato` int(10) NOT NULL,
  `idTicket` int(10) NOT NULL,
  `ordenEspecial` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `preparado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ticketsplatos`
--

INSERT INTO `ticketsplatos` (`idTicketPlato`, `idPlato`, `idTicket`, `ordenEspecial`, `preparado`) VALUES
(11, 1, 8, '', 0),
(12, 2, 8, '', 0),
(16, 2, 19, '', 0),
(28, 2, 1, '', 0),
(29, 2, 1, '', 0),
(30, 1, 1, '', 0),
(32, 2, 1, '', 0),
(33, 2, 1, '', 0),
(34, 2, 1, ',', 0),
(36, 2, 1, '1,', 0),
(37, 2, 1, '1,2,', 0),
(38, 1, 25, '1,', 0),
(39, 2, 26, '', 0),
(40, 2, 26, '', 0),
(64, 1, 45, '', 1),
(65, 1, 47, '', 0),
(66, 3, 48, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(10) NOT NULL,
  `dni` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` int(9) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `idPerfil` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `habilitado` tinyint(1) NOT NULL,
  `idRestaurante` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `dni`, `nombre`, `apellidos`, `pass`, `telefono`, `email`, `idPerfil`, `habilitado`, `idRestaurante`) VALUES
(1, '53664078H', 'Camarero', 'Camarero Camarero', 'Camarero1', 916666666, 'camarero1@gmail.com', '3', 1, 1),
(2, '53664078H', 'Responsable', 'Responsable Respon', 'Responsable1', 666555333, 'responsable1@gmail.com', '2', 1, 1),
(3, '3', 'Cocinero', 'Cocinero Cocinero', 'Cocinero1', 666666666, 'cocinero1@gmail.com', '4', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `costes`
--
ALTER TABLE `costes`
  ADD PRIMARY KEY (`idCoste`);

--
-- Indices de la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD PRIMARY KEY (`idMedida`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`idPerfil`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`idPlato`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idRestaurante` (`idRestaurante`);

--
-- Indices de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`idRestaurante`);

--
-- Indices de la tabla `sla`
--
ALTER TABLE `sla`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`idTicket`);

--
-- Indices de la tabla `ticketsplatos`
--
ALTER TABLE `ticketsplatos`
  ADD PRIMARY KEY (`idTicketPlato`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `costes`
--
ALTER TABLE `costes`
  MODIFY `idCoste` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `medidas`
--
ALTER TABLE `medidas`
  MODIFY `idMedida` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `idPerfil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `idPlato` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `idRestaurante` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `sla`
--
ALTER TABLE `sla`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `idTicket` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `ticketsplatos`
--
ALTER TABLE `ticketsplatos`
  MODIFY `idTicketPlato` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idRestaurante`) REFERENCES `restaurantes` (`idRestaurante`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
