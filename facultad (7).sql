-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-01-2015 a las 10:37:14
-- Versión del servidor: 5.5.40-cll
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `unica_inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE IF NOT EXISTS `facultad` (
`id` int(10) NOT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `descripcion` varchar(60) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`id`, `codigo`, `descripcion`) VALUES
(2, '1A', 'OBSTETRICIA'),
(3, '2A', 'INGENIERIA AMBIENTAL Y SANITARIA'),
(4, '3A', 'BIOLOGIA'),
(5, 'A1', 'ADMINISTRACION'),
(6, 'B1', 'AGRONOMIA'),
(7, 'C1', 'MATEMATICAS E INFORMATICA'),
(8, 'C3', 'FISICA'),
(9, 'C4', 'ESTADISTICA'),
(10, 'C5', 'QUIMICA'),
(11, 'D1', 'CIENCIAS BIOLOGICAS Y QUIMICA'),
(12, 'D2', 'HISTORIA GEOGRAFIA Y ECOLOGIA'),
(13, 'D3', 'FILOSOFIA, PSICOLOGIA Y CIENC. SOCIALES'),
(14, 'D4', 'LENGUA Y LITERATURA'),
(15, 'D7', 'EDUCACION FISICA'),
(16, 'D9', 'EDUCACACION INICIAL Y PRIMARIA'),
(17, 'DA', 'EDUCACION ARTISTICA'),
(18, 'DR', 'MATEMATICA E INFORMATICA'),
(19, 'DÑ', 'ESCUELA DE EDUCACION PRIMARIA'),
(20, 'E1', 'DERECHO Y CIENCIAS POLITICAS'),
(21, 'F1', 'CONTABILIDAD'),
(22, 'G2', 'ENFERMERIA'),
(23, 'H1', 'FARMACIA Y BIOQUIMICA'),
(24, 'I1', 'INGENIERIA CIVIL'),
(25, 'J1', 'INGENIERIA MECANICA Y ELECTRICA'),
(26, 'J3', 'INGENIERIA ELECTRONICA'),
(27, 'K1', 'INGENIERIA DE MINAS'),
(28, 'K2', 'INGENIERIA METALURGICA'),
(29, 'L1', 'INGENIERIA QUIMICA'),
(30, 'L4', 'INGENIERIA PETROQUIMICA'),
(31, 'M1', 'MEDICINA HUMANA'),
(32, 'N1', 'MEDICINA VETERINARIA Y ZOOTECNIA'),
(33, 'O1', 'ODONTOLOGIA'),
(34, 'P1', 'INGENIERIA PESQUERA'),
(35, 'P3', 'INGENIERIA DE ALIMENTOS'),
(36, 'T1', 'CIENCIAS DE LA COMUNICACION'),
(37, 'T2', 'TURISMO'),
(38, 'T3', 'ARQUEOLOGIA'),
(39, 'V1', 'INGENIERIA DE SISTEMAS'),
(40, 'W1', 'ARQUITECTURA'),
(41, 'X1', 'PSICOLOGIA'),
(42, 'Z1', 'CIENCIAS ECONOMICAS'),
(43, 'Z2', 'NEGOCIOS INTERNACIONALES'),
(44, 'C', 'CIENCIAS'),
(45, 'L', 'QUIMICA Y PETROQUIMICA');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `facultad`
--
ALTER TABLE `facultad`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
