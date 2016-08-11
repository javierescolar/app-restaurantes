-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-07-2016 a las 17:34:26
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

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
(3, 'Camarero');

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
  `ean` int(13) NOT NULL,
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
(1, 1, 'Producto1', 5, '2016-07-31', 10, 1, 1, 1),
(2, 2, 'Producto2', 2, '2016-07-27', 15.25, 1, 2, 1),
(3, 3, 'Producto3', 1, '2016-07-28', 9.75, 1, 1, 1),
(4, 1, 'Producto4', 5, '2016-07-31', 10, 0, 1, 1),
(5, 2, 'Producto5', 2, '2016-07-27', 15.25, 0, 2, 1),
(6, 3, 'Producto6', 1, '2016-07-28', 9.75, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurantes`
--

CREATE TABLE `restaurantes` (
  `idRestaurante` int(10) NOT NULL,
  `cif` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `restaurantes`
--

INSERT INTO `restaurantes` (`idRestaurante`, `cif`, `nombre`, `email`, `telefono`) VALUES
(1, '1111111A', 'Restaurante1', 'restaurante@1.es', 666999666);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `idTicket` int(10) NOT NULL,
  `mesa` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `idUsuario` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `total` float NOT NULL,
  `abierto` tinyint(1) NOT NULL,
  `idRestaurante` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`idTicket`, `mesa`, `fecha`, `idUsuario`, `total`, `abierto`, `idRestaurante`) VALUES
(1, 5, '2016-07-19', '1', 134, 1, 1),
(7, 0, '2016-07-20', '1', 0, 1, 0),
(8, 3, '2016-07-20', '1', 41, 1, 0),
(9, 9, '2016-07-20', '1', 41, 1, 0),
(10, 7, '2016-07-20', '1', 25.5, 1, 0),
(11, 7, '2016-07-20', '1', 0, 1, 0),
(12, 2, '2016-07-20', '1', 0, 1, 0),
(13, 1, '2016-07-20', '1', 0, 1, 0),
(14, 10, '2016-07-20', '1', 0, 1, 0),
(15, 3, '2016-07-20', '1', 0, 1, 0),
(16, 5, '2016-07-20', '1', 0, 1, 0),
(17, 3, '2016-07-22', '1', 0, 1, 0),
(18, 9, '2016-07-22', '1', 0, 1, 0),
(19, 4, '2016-07-23', '1', 15.5, 1, 0),
(20, 4, '2016-07-24', '1', 0, 1, 0),
(21, 8, '2016-07-24', '1', 0, 1, 0),
(22, 10, '2016-07-24', '1', 25.5, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticketsplatos`
--

CREATE TABLE `ticketsplatos` (
  `idTicketPlato` int(10) NOT NULL,
  `idPlato` int(10) NOT NULL,
  `idTicket` int(10) NOT NULL,
  `ordenEspecial` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ticketsplatos`
--

INSERT INTO `ticketsplatos` (`idTicketPlato`, `idPlato`, `idTicket`, `ordenEspecial`) VALUES
(5, 1, 15, ''),
(6, 1, 16, ''),
(7, 1, 17, ''),
(8, 1, 18, ''),
(9, 1, 18, ''),
(10, 1, 18, ''),
(11, 1, 8, ''),
(12, 2, 8, ''),
(13, 1, 9, ''),
(14, 2, 9, ''),
(16, 2, 19, ''),
(20, 1, 10, ''),
(28, 2, 1, ''),
(29, 2, 1, ''),
(30, 1, 1, ''),
(31, 1, 22, ''),
(32, 2, 1, ''),
(33, 2, 1, ''),
(34, 2, 1, ','),
(35, 2, 1, '1,'),
(36, 2, 1, '1,');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(10) NOT NULL,
  `dni` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` int(9) NOT NULL,
  `email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `idPerfil` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `habilitado` tinyint(1) NOT NULL,
  `idRestaurante` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `dni`, `nombre`, `apellidos`, `pass`, `telefono`, `email`, `idPerfil`, `habilitado`, `idRestaurante`) VALUES
(1, '12345678P', 'camarero1', 'camarero1', 'Camarero1', 916666666, 'camarero1@gmail.com', '3', 1, 1),
(2, '222222', 'Camarero2', 'Camarero2', 'Camarero2', 66655, 'amarero2@gmail.com', '3', 1, 1);

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
  MODIFY `idPerfil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `idPlato` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `idRestaurante` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `idTicket` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `ticketsplatos`
--
ALTER TABLE `ticketsplatos`
  MODIFY `idTicketPlato` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
