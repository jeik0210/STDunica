-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-03-2015 a las 18:31:41
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `unica_tramite`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `estado` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `nombre`, `estado`) VALUES
(1, 'DECANATO', 's'),
(2, 'SECRETARIA ACADEMICA', 's'),
(3, 'DIRECCION ESCUELA', 's'),
(4, 'DIRECCION ADMINISTRATIVA', 's'),
(7, 'SECRETARIA', 's'),
(8, 'INFORMATICA', 's'),
(12, 'MESA DE PARTES', 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `nombre`) VALUES
(1, 'FACULTADES'),
(2, 'OFICINAS GENERALES'),
(3, 'CENTROS DE PRODUCCION'),
(4, 'COMISIONES EN GENERAL'),
(5, 'OFICINAS TIC'),
(6, 'ALTA DIRECCION'),
(7, 'OTROS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencia`
--

CREATE TABLE IF NOT EXISTS `dependencia` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `coddepa` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Volcado de datos para la tabla `dependencia`
--

INSERT INTO `dependencia` (`id`, `codigo`, `nombre`, `coddepa`) VALUES
(2, '1A', 'OBSTETRICIA', 1),
(3, '2A', 'INGENIERIA AMBIENTAL Y SANITARIA', 1),
(4, '3A', 'BIOLOGIA', 1),
(5, 'A1', 'ADMINISTRACION', 1),
(6, 'B1', 'AGRONOMIA', 1),
(7, 'C1', 'MATEMATICAS E INFORMATICA', 1),
(8, 'C3', 'FISICA', 1),
(9, 'C4', 'ESTADISTICA', 1),
(10, 'C5', 'QUIMICA', 1),
(11, 'D1', 'EDUCACION: CIENCIAS BIOLOGICAS Y QUIMICA', 1),
(12, 'D2', 'EDUCACION: HISTORIA GEOGRAFIA Y ECOLOGIA', 1),
(13, 'D3', 'EDUCACION: FILOSOFIA, PSICOLOGIA Y CIENC. SOCIALES', 1),
(14, 'D4', 'EDUCACION: LENGUA Y LITERATURA', 1),
(15, 'D7', 'EDUCACION: EDUCACION FISICA', 1),
(16, 'D9', 'EDUCACION: EDUCACION INICIAL Y PRIMARIA', 1),
(17, 'DA', 'EDUCACION: EDUCACION ARTISTICA', 1),
(18, 'DR', 'EDUCACION: CIENCIAS MATEMATICAS E INFORMATICAS', 1),
(19, 'DÑ', 'EDUCACIÓN: ESCUELA DE EDUCACIÓN PRIMARIA', 1),
(20, 'E1', 'DERECHO Y CIENCIAS POLITICAS', 1),
(21, 'F1', 'CONTABILIDAD', 1),
(22, 'G2', 'ENFERMERIA', 1),
(23, 'H1', 'FARMACIA Y BIOQUIMICA', 1),
(24, 'I1', 'INGENIERIA CIVIL', 1),
(25, 'J1', 'INGENIERIA MECANICA Y ELECTRICA', 1),
(26, 'J3', 'INGENIERIA ELECTRONICA', 1),
(27, 'K1', 'INGENIERIA DE MINAS', 1),
(28, 'K2', 'INGENIERIA METALURGICA', 1),
(29, 'L1', 'INGENIERIA QUIMICA', 1),
(30, 'L4', 'INGENIERIA PETROQUIMICA', 1),
(31, 'M1', 'MEDICINA HUMANA', 1),
(32, 'N1', 'MEDICINA VETERINARIA Y ZOOTECNIA', 1),
(33, 'O1', 'ODONTOLOGIA', 1),
(34, 'P1', 'INGENIERIA PESQUERA', 1),
(35, 'P3', 'INGENIERIA DE ALIMENTOS', 1),
(36, 'T1', 'CIENCIAS DE LA COMUNICACION', 1),
(37, 'T2', 'TURISMO', 1),
(38, 'T3', 'ARQUEOLOGIA', 1),
(39, 'V1', 'INGENIERIA DE SISTEMAS', 1),
(40, 'W1', 'ARQUITECTURA', 1),
(41, 'X1', 'PSICOLOGIA', 1),
(42, 'Z1', 'ECONOMIA', 1),
(43, 'Z2', 'NEGOCIOS INTERNACIONALES', 1),
(46, '46', 'ABASTECIMIENTO', 2),
(47, '47', 'ACREDITACION Y CALIDAD ACADEMICA', 2),
(48, '48', 'ADMISION(OGA)', 2),
(49, '49', 'ALMACEN CENTRAL', 2),
(50, '50', 'ASESORIA JURIRICA', 2),
(51, '51', 'BIENESTAR UNIVERSITARIO', 2),
(52, '52', 'CONTROL INTERNO', 2),
(53, '53', 'CONTABILIDAD', 2),
(54, '54', 'COMITE ELECTORAL UNIVERSITARIO', 2),
(55, '55', 'COOPERACION TECNICA', 2),
(56, '56', 'CONTROL PATRIMONIAL Y MARGESI DE BIENES', 2),
(57, '57', 'DIRECCION EJECUTIVA DE PRESUPUESTO', 2),
(58, '58', 'EXTENSION CULTURAL Y PROYECCION SOCIAL', 2),
(59, '59', 'GEST.DE LA INFORMACION Y PUBLICACIONES CIENT.', 2),
(60, '60', 'GEST. DE RECURSOS FINANCIEROS PARA LA INVEST.', 2),
(61, '61', 'INFRAESTRUCTURA', 2),
(62, '62', 'MANTENIMIENTO', 2),
(63, '63', 'IMAGEN INSTITUCIONAL Y PROTOCOLO', 2),
(64, '64', 'MATRICULA,REGISTRO Y ESTADISTICA', 2),
(65, '65', 'ORGANIZACION Y METODOS(RACIONALIZACION)', 2),
(66, '66', 'PLANEAMIENTO DE LA INVEST. E INNOVACION CIENT.', 2),
(67, '67', 'PERSONAL', 2),
(68, '68', 'PRESUPUESTO Y PLANIFICACION UNIVERSITARIA', 2),
(69, '69', 'PROGRAMACION DE INVERSIONES', 2),
(70, '70', 'SEGURIDAD Y VIGILANCIA', 2),
(71, '71', 'SECRETARIA GENERAL', 2),
(72, '72', 'SERVICIOS ACADEMICOS', 2),
(73, '73', 'TESORERIA', 2),
(74, '74', 'TECNOLOGIA,INFORMATICA Y COMUNICACIONES', 2),
(75, '75', 'UNIDAD DE ADJUDICACIONES', 2),
(76, '76', 'CENTRO DE COMPUTO E INFORMATICA', 3),
(77, '77', 'CENTRO DE IDIOMAS', 3),
(78, '78', 'CENTRO MEDICO UNIVERSITARIO', 3),
(79, '79', 'CENTRO DE ESTUDIOS PRE-UNIVERSITARIOS', 3),
(80, '80', 'CLINICA ODONTOLOGICA', 3),
(81, '81', 'COMPLEMENTACION UNIVERSITARIA', 3),
(82, '82', 'EDITORIAL UNIVERSITARIA', 3),
(83, '83', 'FARMACIA UNIVERSITARIA', 3),
(84, '84', 'LABORATORIO DE SUELOS', 3),
(85, '85', 'LABORATORIO DE ANALISIS QUIMICOS', 3),
(86, '86', 'PLANTA PILOTO DE CONSERVAS Y ALCOHOLES', 3),
(87, '87', 'PECUARIA CHINCHA', 3),
(88, '88', 'TALLER MECANICO', 3),
(89, '89', 'COMISION EJECUTIVA CENTRAL DE ADMISION', 4),
(90, '90', 'COMISION ACADEMICA SUPERIOR DE PROCESOS DISCIPLINARIOS(CASPDI)', 4),
(91, '91', 'COMISION DE PROCESOS DISCIPLINARIOS DOCENTE', 4),
(92, '92', 'DESARROLLO DE SOFTWARE', 5),
(93, '93', 'SOPORTE TECNICO', 5),
(94, '94', 'GESTION DE LAS COMUNICACIONES', 5),
(95, '95', 'RECTORADO', 6),
(96, '96', 'VICE RECTORADO DE INVESTIGACION Y DESARROLLO', 6),
(97, '97', 'VICERECTORADO ACADEMICO', 6),
(98, '98', 'OTROS', 7),
(99, '99', 'ADMINISTRACION(DIGA)', 2),
(100, '100', 'SECRETARIA', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(255) NOT NULL,
  `empresa` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nit` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tel1` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tel2` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `web` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `region` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `eslogan` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `intro` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `empresa`, `nit`, `direccion`, `ciudad`, `tel1`, `tel2`, `web`, `correo`, `region`, `eslogan`, `intro`) VALUES
(1, 'Soft Unicorn', 'CodigoEmpresa', 'DIreecionEmpresa', 'CiudadEmpresa', '666-66666', '666-6666-666', 'www.pagina.net', 'correo@pagina.net', '82', 'AsesorÃ­as en ProgramaciÃ³n PHP y MySQL ', 'Stefani Joanne Angelina Germanotta (Nueva York, 28 de marzo de 1986), mÃ¡s conocida por su nombre artÃ­stico, Lady Gaga, es una cantante, compositora, productora, bailarina, activista y diseÃ±adora de moda estadounidense. TambiÃ©n ha dedicado parte de su vida a la actuaciÃ³n y la filantropÃ­a. Nacida y criada en la ciudad de Nueva York, estudiÃ³ en la escuela Convent of the Sacred Heart y asistiÃ³ por un tiempo breve a la Tisch School of the Arts, perteneciente a la Universidad de Nueva York, hasta que abandonÃ³ sus estudios para enfocarse en su carrera musical. Fue asÃ­ como irrumpiÃ³ en la escena del rock en el Lower East Side de Manhattan y firmÃ³ un contrato con Streamline Records hacia fines de 2007. En la Ã©poca en que trabajaba como compositora para dicha discogrÃ¡fica, su voz llamÃ³ la atenciÃ³n del artista Akon, quien la hizo firmar un contrato con Kon Live Distribution.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `codigo` char(2) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `codigo`, `nombre`) VALUES
(1, 'n', 'Atendido'),
(2, 'd', 'Devuelto'),
(3, 's', 'Pendiente'),
(4, 'r', 'Reenviado'),
(5, 'a', 'Archivado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE IF NOT EXISTS `expediente` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idexpediente` varchar(10) NOT NULL,
  `tramite` varchar(20) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `hora` varchar(10) NOT NULL,
  `fechaf` varchar(10) NOT NULL,
  `horaf` varchar(10) NOT NULL,
  `tipodoc` varchar(10) NOT NULL,
  `ndoc` varchar(100) NOT NULL,
  `folios` varchar(10) NOT NULL,
  `procedencia` varchar(10) NOT NULL,
  `dependencia` varchar(10) NOT NULL,
  `asunto` varchar(100) NOT NULL,
  `descripcion` varchar(900) NOT NULL,
  `area` int(10) NOT NULL,
  `codep` varchar(10) NOT NULL,
  `estado` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`id`, `idexpediente`, `tramite`, `fecha`, `hora`, `fechaf`, `horaf`, `tipodoc`, `ndoc`, `folios`, `procedencia`, `dependencia`, `asunto`, `descripcion`, `area`, `codep`, `estado`) VALUES
(25, '1', '15', '17-02-2015', '10:34:13', '24-02-2015', '10:32:17', '1', '002-2015-JEQ', '1', '1', 'A1', 'PORTAL WEB UNICA', 'urgente', 12, '3A', 's'),
(26, '26', 'S/N', '15-02-2015', '10:35:18', '24-02-2015', '10:23:44', '9', '002-2015-JEQ', '3', '7', '98', 'corre', 'sigue', 12, '3A', 's'),
(27, '27', 'S/N', '19-02-2015', '11:18:14', '', '', '8', '002-2015-JEQ', '2', '1', 'B1', 'PORTAL', 'gfghr', 12, '3A', 's'),
(28, '28', 'S/N', '24-02-2015', '12:49:42', '', '', '8', '002-2015-JEQ-MIBNA', '2', '1', 'A1', 'citación urgente', 'Día 25 de febrero', 12, 'V1', 's'),
(29, '28', 'S/N', '24-02-2015', '12:49:42', '', '', '8', '002-2015-JEQ-MIBNA', '2', '1', 'A1', 'citación urgente', 'Día 25 de febrero', 12, 'V1', 's'),
(30, '30', '1679', '24-02-2015', '12:51:41', '', '', '5', '00-2015-JEQ-MIBNA3', '3', '1', 'B1', 'Comision', 'Dia 27 de febrero', 12, 'V1', 's'),
(31, '30', '1679', '24-02-2015', '12:51:41', '', '', '5', '00-2015-JEQ-MIBNA3', '3', '1', 'B1', 'Comision', 'Dia 27 de febrero', 12, 'V1', 's'),
(32, '32', 'S/N', '24-02-2015', '12:53:27', '', '', '1', '47', '4', '1', 'B1', '12345', '12345', 12, 'V1', 's'),
(33, '32', 'S/N', '24-02-2015', '12:53:27', '', '', '1', '47', '4', '1', 'B1', '12345', '12345', 12, 'V1', 's'),
(34, '34', 'S/N', '24-02-2015', '13:46:06', '', '', '1', '155', '1', '7', '98', 'love', 'love', 12, 'V1', 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expedientee`
--

CREATE TABLE IF NOT EXISTS `expedientee` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idexpediente` varchar(10) NOT NULL,
  `tramite` varchar(50) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `hora` varchar(10) NOT NULL,
  `fechas` varchar(10) NOT NULL,
  `tipodoc` varchar(10) NOT NULL,
  `ndoc` varchar(100) NOT NULL,
  `folios` varchar(10) NOT NULL,
  `procedencia` varchar(10) NOT NULL,
  `dependencia` varchar(10) NOT NULL,
  `asunto` varchar(200) NOT NULL,
  `descripcion` varchar(900) NOT NULL,
  `area` int(10) NOT NULL,
  `codep` varchar(10) NOT NULL,
  `estado` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `expedientee`
--

INSERT INTO `expedientee` (`id`, `idexpediente`, `tramite`, `fecha`, `hora`, `fechas`, `tipodoc`, `ndoc`, `folios`, `procedencia`, `dependencia`, `asunto`, `descripcion`, `area`, `codep`, `estado`) VALUES
(12, '1', 'S/N', '19-02-2015', '12:28:32', '19-02-2015', '3', '45', '3', '1', 'F1', 'Reunión de Comisión Técnica y de Presupuesto', 'Dia 25', 12, '3A', 's'),
(13, '13', 'S/N', '24-02-2015', '13:27:03', '24-02-2015', '1', '40', '1', '1', 'T3', 'campo', 'dia 25', 12, 'V1', 's'),
(14, '14', 'S/N', '24-02-2015', '13:27:40', '24-02-2015', '5', '41', '2', '1', '3A', 'dia 25', 'reunion', 12, 'V1', 's'),
(15, '14', 'S/N', '24-02-2015', '13:27:40', '24-02-2015', '5', '41', '2', '1', '3A', 'dia 25', 'reunion', 12, 'V1', 's'),
(16, '16', 'S/N', '24-02-2015', '13:29:20', '24-02-2015', '9', '4213', '1', '1', '3A', '12\r\n', 'h. torres', 12, 'V1', 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujo`
--

CREATE TABLE IF NOT EXISTS `flujo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idexpediente` varchar(10) NOT NULL,
  `tramite` varchar(20) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `hora` varchar(10) NOT NULL,
  `fechaf` varchar(10) NOT NULL,
  `horaf` varchar(10) NOT NULL,
  `tipodoc` varchar(10) NOT NULL,
  `ndoc` varchar(100) NOT NULL,
  `folios` varchar(10) NOT NULL,
  `procedencia` varchar(10) NOT NULL,
  `dependencia` varchar(10) NOT NULL,
  `asunto` varchar(100) NOT NULL,
  `descripcion` varchar(900) NOT NULL,
  `area` int(10) NOT NULL,
  `codep` varchar(10) NOT NULL,
  `estado` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Volcado de datos para la tabla `flujo`
--

INSERT INTO `flujo` (`id`, `idexpediente`, `tramite`, `fecha`, `hora`, `fechaf`, `horaf`, `tipodoc`, `ndoc`, `folios`, `procedencia`, `dependencia`, `asunto`, `descripcion`, `area`, `codep`, `estado`) VALUES
(54, '1', '15', '23-02-2015', '11:33:22', '24-02-2015', '10:32:17', '1', '002-2015-JEQ-mayyoo', '3', '1', 'A1', 'PORTAL 001', 'urgente solo', 12, '3A', 'n'),
(55, '26', 'S/N', '19-02-2015', '11:38:21', '24-02-2015', '10:23:44', '9', '002-2015-JEQ', '3', '7', '98', 'corre', 'sigue', 12, '3A', 'n'),
(56, '27', 'S/N', '17-02-2015', '11:19:53', '', '', '8', '002-2015-JEQ', '3', '1', 'B1', 'PORTAL WEB UNICA', 'gfghr', 12, '3A', 's'),
(57, '26', 'S/N', '24-02-2015', '10:23:44', '', '', '9', '002-2015-JEQ', '3', '7', '98', 'corre', 'revisar', 8, '3A', 's'),
(60, '1', '15', '24-02-2015', '10:32:17', '', '', '1', '002-2015-JEQ-mayyoo', '3', '1', 'A1', 'PORTAL 001', 'informatica', 8, '3A', 's'),
(61, '28', 'S/N', '24-02-2015', '12:49:42', '24-02-2015', '13:34:31', '8', '002-2015-JEQ-MIBNA', '2', '1', 'A1', 'citación urgente', 'Día 25 de febrero', 12, 'V1', 'n'),
(62, '28', 'S/N', '24-02-2015', '12:49:42', '24-02-2015', '13:34:31', '8', '002-2015-JEQ-MIBNA', '2', '1', 'A1', 'citación urgente', 'Día 25 de febrero', 12, 'V1', 's'),
(63, '30', '1679', '24-02-2015', '12:51:41', '', '', '5', '00-2015-JEQ-MIBNA3', '3', '1', 'B1', 'Comision', 'Dia 27 de febrero', 12, 'V1', 's'),
(64, '30', '1679', '24-02-2015', '12:51:41', '', '', '5', '00-2015-JEQ-MIBNA3', '3', '1', 'B1', 'Comision', 'Dia 27 de febrero', 12, 'V1', 's'),
(65, '32', 'S/N', '24-02-2015', '12:53:27', '', '', '1', '47', '4', '1', 'B1', '12345', '12345', 12, 'V1', 's'),
(66, '32', 'S/N', '24-02-2015', '12:53:27', '', '', '1', '47', '4', '1', 'B1', '12345', '12345', 12, 'V1', 's'),
(67, '28', 'S/N', '24-02-2015', '13:34:31', '24-02-2015', '13:36:17', '8', '002-2015-JEQ-MIBNA', '2', '1', 'A1', 'citación urgente', 'revisar', 1, 'V1', 's'),
(68, '28', 'S/N', '24-02-2015', '13:36:17', '24-02-2015', '13:37:08', '8', '002-2015-JEQ-MIBNA', '2', '1', 'A1', 'citación urgente', 'agregar', 7, 'V1', 'n'),
(69, '28', 'S/N', '24-02-2015', '13:37:08', '24-02-2015', '13:38:53', '8', '002-2015-JEQ-MIBNA', '2', '1', 'A1', 'citación urgente', 'emitir', 8, 'V1', 'n'),
(70, '28', 'S/N', '24-02-2015', '13:38:53', '', '', '8', '002-2015-JEQ-MIBNA', '2', '1', 'A1', 'citación urgente', 'terminado', 4, 'V1', 'n'),
(71, '34', 'S/N', '24-02-2015', '13:46:06', '', '', '1', '155', '1', '7', '98', 'love', 'love', 12, 'V1', 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujoe`
--

CREATE TABLE IF NOT EXISTS `flujoe` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idexpediente` varchar(10) NOT NULL,
  `tramite` varchar(20) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `hora` varchar(10) NOT NULL,
  `fechas` varchar(10) NOT NULL,
  `tipodoc` varchar(10) NOT NULL,
  `ndoc` varchar(100) NOT NULL,
  `folios` varchar(10) NOT NULL,
  `procedencia` varchar(10) NOT NULL,
  `dependencia` varchar(10) NOT NULL,
  `asunto` varchar(200) NOT NULL,
  `descripcion` varchar(900) NOT NULL,
  `area` int(10) NOT NULL,
  `codep` varchar(10) NOT NULL,
  `estado` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `flujoe`
--

INSERT INTO `flujoe` (`id`, `idexpediente`, `tramite`, `fecha`, `hora`, `fechas`, `tipodoc`, `ndoc`, `folios`, `procedencia`, `dependencia`, `asunto`, `descripcion`, `area`, `codep`, `estado`) VALUES
(13, '1', 'S/N', '19-02-2015', '12:28:32', '23-02-2015', '3', '75', '3', '1', 'F1', 'Reunión de Comisión Técnica y de Presupuesto', 'Dia 25 012', 12, '3A', 's'),
(14, '13', 'S/N', '24-02-2015', '13:27:03', '24-02-2015', '1', '40', '1', '1', 'T3', 'campo', 'dia 25', 12, 'V1', 's'),
(15, '14', 'S/N', '24-02-2015', '13:27:40', '24-02-2015', '5', '41', '2', '1', '3A', 'dia 25', 'reunion', 12, 'V1', 's'),
(16, '14', 'S/N', '24-02-2015', '13:27:40', '24-02-2015', '5', '41', '2', '1', '3A', 'dia 25', 'reunion', 12, 'V1', 's'),
(17, '16', 'S/N', '24-02-2015', '13:29:20', '24-02-2015', '9', '4213', '1', '1', '3A', '12\r\n', 'h. torres', 12, 'V1', 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modo`
--

CREATE TABLE IF NOT EXISTS `modo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `modo`
--

INSERT INTO `modo` (`id`, `nombre`) VALUES
(1, 'EMITIDO'),
(2, 'RECIBIDO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `intro` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `texto` text COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `intro`, `texto`, `tipo`, `fecha`) VALUES
(1, 'Liga Bancomer MX por mÃ¡s de 30 mdd', 'A partir del prÃ³ximo torneo, el nombre del banco estarÃ¡ presente en el nombre del campeonato mexicano', 'La Liga MX llegÃ³ a un acuerdo para que el Banco BBVA Bancomer sea el nuevo patrocinador y asÃ­, aparecer en el nombre del campeonato: Liga Bancomer MX.<br>El contrato entre ambas entidades serÃ¡ de mÃ¡s de 30 millones de dÃ³lares por tres aÃ±os.<br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1', '2013-07-11 22:21:49'),
(2, 'Urge apoyar al Chepo de la Torre: Salcido', 'El defensa de Tigres seÃ±alÃ³ que el timonel del Tri tiene la capacidad para sacarlos adelante, y que es cuestiÃ³n de que el equipo retome la confianza', 'Carlos Salcido pidiÃ³ apoyar a JosÃ© Manuel de la Torre, tÃ©cnico de la SelecciÃ³n Mexicana, ante el momento que pasa el combinado por los malos resultados en las eliminatorias para Brasil 2014, la Copa Confederaciones y la Copa Oro.<br>El defensa de los Tigres no quiso hablar de una crisis en el Tri, aunque aceptÃ³ que no han obtenido buenos resultados en Hexagonal Final de Concacaf y considerÃ³ que buena parte de la situaciÃ³n tiene su origen en la prensa.', '1', '2013-07-11 22:24:20'),
(3, 'AtlÃ©tico Mineiro quiere jugar la Final en el estadio Independencia', 'El club brasileÃ±o habrÃ­a acatado la decisiÃ³n de Conmebol de disputar el partido por la Libertadores en el estadio Mineirao; sin embargo, no se quieren mudar de sede', 'AtlÃ©tico Mineiro acatÃ³ la decisiÃ³n de la Conmebol de que la Final de la Copa Libertadores  se juegue en el estadio Mineirao, reciÃ©n remodelado para el Mundial de Brasil 2014, pero el club aÃºn estudia pedir un cambio de sede.<br>El partido de Vuelta de la Final de la Libertadores se jugarÃ¡ el prÃ³ximo dÃ­a 24 en Belo Horizonte entre el AtlÃ©tico Mineiro y el Olimpia, mientras que la Ida tendrÃ¡ lugar la semana que viene en el Defensores del Chaco, de AsunciÃ³n.', '1', '2013-07-11 22:25:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=560 ;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`id`, `nombre`) VALUES
(3, 'Africa/Abidjan'),
(4, 'Africa/Accra'),
(5, 'Africa/Addis_Ababa'),
(6, 'Africa/Algiers'),
(7, 'Africa/Asmara'),
(8, 'Africa/Asmera'),
(9, 'Africa/Bamako'),
(10, 'Africa/Bangui'),
(11, 'Africa/Banjul'),
(12, 'Africa/Bissau'),
(13, 'Africa/Blantyre'),
(14, 'Africa/Brazzaville'),
(15, 'Africa/Bujumbura'),
(16, 'Africa/Cairo'),
(17, 'Africa/Casablanca'),
(18, 'Africa/Ceuta'),
(19, 'Africa/Conakry'),
(20, 'Africa/Dakar'),
(21, 'Africa/Dar_es_Salaam'),
(22, 'Africa/Djibouti'),
(23, 'Africa/Douala'),
(24, 'Africa/El_Aaiun'),
(25, 'Africa/Freetown'),
(26, 'Africa/Gaborone'),
(27, 'Africa/Harare'),
(28, 'Africa/Johannesburg'),
(29, 'Africa/Kampala'),
(30, 'Africa/Khartoum'),
(31, 'Africa/Kigali'),
(32, 'Africa/Kinshasa'),
(33, 'Africa/Lagos'),
(34, 'Africa/Libreville'),
(35, 'Africa/Lome'),
(36, 'Africa/Luanda'),
(37, 'Africa/Lubumbashi'),
(38, 'Africa/Lusaka'),
(39, 'Africa/Malabo'),
(40, 'Africa/Maputo'),
(41, 'Africa/Maseru'),
(42, 'Africa/Mbabane'),
(43, 'Africa/Mogadishu'),
(44, 'Africa/Monrovia'),
(45, 'Africa/Nairobi'),
(46, 'Africa/Ndjamena'),
(47, 'Africa/Niamey'),
(48, 'Africa/Nouakchott'),
(49, 'Africa/Ouagadougou'),
(50, 'Africa/Porto-Novo'),
(51, 'Africa/Sao_Tome'),
(52, 'Africa/Timbuktu'),
(53, 'Africa/Tripoli'),
(54, 'Africa/Tunis'),
(55, 'Africa/Windhoek'),
(56, 'America/Adak'),
(57, 'America/Anchorage'),
(58, 'America/Anguilla'),
(59, 'America/Antigua'),
(60, 'America/Araguaina'),
(61, 'America/Argentina/Buenos_Aires'),
(62, 'America/Argentina/Catamarca'),
(63, 'America/Argentina/ComodRivadavia'),
(64, 'America/Argentina/Cordoba'),
(65, 'America/Argentina/Jujuy'),
(66, 'America/Argentina/La_Rioja'),
(67, 'America/Argentina/Mendoza'),
(68, 'America/Argentina/Rio_Gallegos'),
(69, 'America/Argentina/San_Juan'),
(70, 'America/Argentina/Tucuman'),
(71, 'America/Argentina/Ushuaia'),
(72, 'America/Aruba'),
(73, 'America/Asuncion'),
(74, 'America/Atikokan'),
(75, 'America/Atka'),
(76, 'America/Bahia'),
(77, 'America/Barbados'),
(78, 'America/Belem'),
(79, 'America/Belize'),
(80, 'America/Blanc-Sablon'),
(81, 'America/Boa_Vista'),
(82, 'America/Bogota'),
(83, 'America/Boise'),
(84, 'America/Buenos_Aires'),
(85, 'America/Cambridge_Bay'),
(86, 'America/Campo_Grande'),
(87, 'America/Cancun'),
(88, 'America/Caracas'),
(89, 'America/Catamarca'),
(90, 'America/Cayenne'),
(91, 'America/Cayman'),
(92, 'America/Chicago'),
(93, 'America/Chihuahua'),
(94, 'America/Coral_Harbour'),
(95, 'America/Cordoba'),
(96, 'America/Costa_Rica'),
(97, 'America/Cuiaba'),
(98, 'America/Curacao'),
(99, 'America/Danmarkshavn'),
(100, 'America/Dawson'),
(101, 'America/Dawson_Creek'),
(102, 'America/Denver'),
(103, 'America/Detroit'),
(104, 'America/Dominica'),
(105, 'America/Edmonton'),
(106, 'America/Eirunepe'),
(107, 'America/El_Salvador'),
(108, 'America/Ensenada'),
(109, 'America/Fort_Wayne'),
(110, 'America/Fortaleza'),
(111, 'America/Glace_Bay'),
(112, 'America/Godthab'),
(113, 'America/Goose_Bay'),
(114, 'America/Grand_Turk'),
(115, 'America/Grenada'),
(116, 'America/Guadeloupe'),
(117, 'America/Guatemala'),
(118, 'America/Guayaquil'),
(119, 'America/Guyana'),
(120, 'America/Halifax'),
(121, 'America/Havana'),
(122, 'America/Hermosillo'),
(123, 'America/Indiana/Indianapolis'),
(124, 'America/Indiana/Knox'),
(125, 'America/Indiana/Marengo'),
(126, 'America/Indiana/Petersburg'),
(127, 'America/Indiana/Vevay'),
(128, 'America/Indiana/Vincennes'),
(129, 'America/Indiana/Winamac'),
(130, 'America/Indianapolis'),
(131, 'America/Inuvik'),
(132, 'America/Iqaluit'),
(133, 'America/Jamaica'),
(134, 'America/Jujuy'),
(135, 'America/Juneau'),
(136, 'America/Kentucky/Louisville'),
(137, 'America/Kentucky/Monticello'),
(138, 'America/Knox_IN'),
(139, 'America/La_Paz'),
(140, 'America/Lima'),
(141, 'America/Los_Angeles'),
(142, 'America/Louisville'),
(143, 'America/Maceio'),
(144, 'America/Managua'),
(145, 'America/Manaus'),
(146, 'America/Martinique'),
(147, 'America/Mazatlan'),
(148, 'America/Mendoza'),
(149, 'America/Menominee'),
(150, 'America/Merida'),
(151, 'America/Mexico_City'),
(152, 'America/Miquelon'),
(153, 'America/Moncton'),
(154, 'America/Monterrey'),
(155, 'America/Montevideo'),
(156, 'America/Montreal'),
(157, 'America/Montserrat'),
(158, 'America/Nassau'),
(159, 'America/New_York'),
(160, 'America/Nipigon'),
(161, 'America/Nome'),
(162, 'America/Noronha'),
(163, 'America/North_Dakota/Center'),
(164, 'America/North_Dakota/New_Salem'),
(165, 'America/Panama'),
(166, 'America/Pangnirtung'),
(167, 'America/Paramaribo'),
(168, 'America/Phoenix'),
(169, 'America/Port-au-Prince'),
(170, 'America/Port_of_Spain'),
(171, 'America/Porto_Acre'),
(172, 'America/Porto_Velho'),
(173, 'America/Puerto_Rico'),
(174, 'America/Rainy_River'),
(175, 'America/Rankin_Inlet'),
(176, 'America/Recife'),
(177, 'America/Regina'),
(178, 'America/Resolute'),
(179, 'America/Rio_Branco'),
(180, 'America/Rosario'),
(181, 'America/Santiago'),
(182, 'America/Santo_Domingo'),
(183, 'America/Sao_Paulo'),
(184, 'America/Scoresbysund'),
(185, 'America/Shiprock'),
(186, 'America/St_Johns'),
(187, 'America/St_Kitts'),
(188, 'America/St_Lucia'),
(189, 'America/St_Thomas'),
(190, 'America/St_Vincent'),
(191, 'America/Swift_Current'),
(192, 'America/Tegucigalpa'),
(193, 'America/Thule'),
(194, 'America/Thunder_Bay'),
(195, 'America/Tijuana'),
(196, 'America/Toronto'),
(197, 'America/Tortola'),
(198, 'America/Vancouver'),
(199, 'America/Virgin'),
(200, 'America/Whitehorse'),
(201, 'America/Winnipeg'),
(202, 'America/Yakutat'),
(203, 'America/Yellowknife'),
(204, 'Antarctica/Casey'),
(205, 'Antarctica/Davis'),
(206, 'Antarctica/DumontDUrville'),
(207, 'Antarctica/Mawson'),
(208, 'Antarctica/McMurdo'),
(209, 'Antarctica/Palmer'),
(210, 'Antarctica/Rothera'),
(211, 'Antarctica/South_Pole'),
(212, 'Antarctica/Syowa'),
(213, 'Antarctica/Vostok'),
(214, 'Arctic/Longyearbyen'),
(215, 'Asia/Aden'),
(216, 'Asia/Almaty'),
(217, 'Asia/Amman'),
(218, 'Asia/Anadyr'),
(219, 'Asia/Aqtau'),
(220, 'Asia/Aqtobe'),
(221, 'Asia/Ashgabat'),
(222, 'Asia/Ashkhabad'),
(223, 'Asia/Baghdad'),
(224, 'Asia/Bahrain'),
(225, 'Asia/Baku'),
(226, 'Asia/Bangkok'),
(227, 'Asia/Beirut'),
(228, 'Asia/Bishkek'),
(229, 'Asia/Brunei'),
(230, 'Asia/Calcutta'),
(231, 'Asia/Choibalsan'),
(232, 'Asia/Chongqing'),
(233, 'Asia/Chungking'),
(234, 'Asia/Colombo'),
(235, 'Asia/Dacca'),
(236, 'Asia/Damascus'),
(237, 'Asia/Dhaka'),
(238, 'Asia/Dili'),
(239, 'Asia/Dubai'),
(240, 'Asia/Dushanbe'),
(241, 'Asia/Gaza'),
(242, 'Asia/Harbin'),
(243, 'Asia/Hong_Kong'),
(244, 'Asia/Hovd'),
(245, 'Asia/Irkutsk'),
(246, 'Asia/Istanbul'),
(247, 'Asia/Jakarta'),
(248, 'Asia/Jayapura'),
(249, 'Asia/Jerusalem'),
(250, 'Asia/Kabul'),
(251, 'Asia/Kamchatka'),
(252, 'Asia/Karachi'),
(253, 'Asia/Kashgar'),
(254, 'Asia/Katmandu'),
(255, 'Asia/Krasnoyarsk'),
(256, 'Asia/Kuala_Lumpur'),
(257, 'Asia/Kuching'),
(258, 'Asia/Kuwait'),
(259, 'Asia/Macao'),
(260, 'Asia/Macau'),
(261, 'Asia/Magadan'),
(262, 'Asia/Makassar'),
(263, 'Asia/Manila'),
(264, 'Asia/Muscat'),
(265, 'Asia/Nicosia'),
(266, 'Asia/Novosibirsk'),
(267, 'Asia/Omsk'),
(268, 'Asia/Oral'),
(269, 'Asia/Phnom_Penh'),
(270, 'Asia/Pontianak'),
(271, 'Asia/Pyongyang'),
(272, 'Asia/Qatar'),
(273, 'Asia/Qyzylorda'),
(274, 'Asia/Rangoon'),
(275, 'Asia/Riyadh'),
(276, 'Asia/Riyadh87'),
(277, 'Asia/Riyadh88'),
(278, 'Asia/Riyadh89'),
(279, 'Asia/Saigon'),
(280, 'Asia/Sakhalin'),
(281, 'Asia/Samarkand'),
(282, 'Asia/Seoul'),
(283, 'Asia/Shanghai'),
(284, 'Asia/Singapore'),
(285, 'Asia/Taipei'),
(286, 'Asia/Tashkent'),
(287, 'Asia/Tbilisi'),
(288, 'Asia/Tehran'),
(289, 'Asia/Tel_Aviv'),
(290, 'Asia/Thimbu'),
(291, 'Asia/Thimphu'),
(292, 'Asia/Tokyo'),
(293, 'Asia/Ujung_Pandang'),
(294, 'Asia/Ulaanbaatar'),
(295, 'Asia/Ulan_Bator'),
(296, 'Asia/Urumqi'),
(297, 'Asia/Vientiane'),
(298, 'Asia/Vladivostok'),
(299, 'Asia/Yakutsk'),
(300, 'Asia/Yekaterinburg'),
(301, 'Asia/Yerevan'),
(302, 'Atlantic/Azores'),
(303, 'Atlantic/Bermuda'),
(304, 'Atlantic/Canary'),
(305, 'Atlantic/Cape_Verde'),
(306, 'Atlantic/Faeroe'),
(307, 'Atlantic/Faroe'),
(308, 'Atlantic/Jan_Mayen'),
(309, 'Atlantic/Madeira'),
(310, 'Atlantic/Reykjavik'),
(311, 'Atlantic/South_Georgia'),
(312, 'Atlantic/St_Helena'),
(313, 'Atlantic/Stanley'),
(314, 'Australia/ACT'),
(315, 'Australia/Adelaide'),
(316, 'Australia/Brisbane'),
(317, 'Australia/Broken_Hill'),
(318, 'Australia/Canberra'),
(319, 'Australia/Currie'),
(320, 'Australia/Darwin'),
(321, 'Australia/Eucla'),
(322, 'Australia/Hobart'),
(323, 'Australia/LHI'),
(324, 'Australia/Lindeman'),
(325, 'Australia/Lord_Howe'),
(326, 'Australia/Melbourne'),
(327, 'Australia/NSW'),
(328, 'Australia/North'),
(329, 'Australia/Perth'),
(330, 'Australia/Queensland'),
(331, 'Australia/South'),
(332, 'Australia/Sydney'),
(333, 'Australia/Tasmania'),
(334, 'Australia/Victoria'),
(335, 'Australia/West'),
(336, 'Australia/Yancowinna'),
(337, 'Brazil/Acre'),
(338, 'Brazil/DeNoronha'),
(339, 'Brazil/East'),
(340, 'Brazil/West'),
(341, 'CET'),
(342, 'CST6CDT'),
(343, 'Canada/Atlantic'),
(344, 'Canada/Central'),
(345, 'Canada/East-Saskatchewan'),
(346, 'Canada/Eastern'),
(347, 'Canada/Mountain'),
(348, 'Canada/Newfoundland'),
(349, 'Canada/Pacific'),
(350, 'Canada/Saskatchewan'),
(351, 'Canada/Yukon'),
(352, 'Chile/Continental'),
(353, 'Chile/EasterIsland'),
(354, 'Cuba'),
(355, 'EET'),
(356, 'EST'),
(357, 'EST5EDT'),
(358, 'Egypt'),
(359, 'Eire'),
(360, 'Etc/GMT'),
(361, 'Etc/GMT+0'),
(362, 'Etc/GMT+1'),
(363, 'Etc/GMT+10'),
(364, 'Etc/GMT+11'),
(365, 'Etc/GMT+12'),
(366, 'Etc/GMT+2'),
(367, 'Etc/GMT+3'),
(368, 'Etc/GMT+4'),
(369, 'Etc/GMT+5'),
(370, 'Etc/GMT+6'),
(371, 'Etc/GMT+7'),
(372, 'Etc/GMT+8'),
(373, 'Etc/GMT+9'),
(374, 'Etc/GMT-0'),
(375, 'Etc/GMT-1'),
(376, 'Etc/GMT-10'),
(377, 'Etc/GMT-11'),
(378, 'Etc/GMT-12'),
(379, 'Etc/GMT-13'),
(380, 'Etc/GMT-14'),
(381, 'Etc/GMT-2'),
(382, 'Etc/GMT-3'),
(383, 'Etc/GMT-4'),
(384, 'Etc/GMT-5'),
(385, 'Etc/GMT-6'),
(386, 'Etc/GMT-7'),
(387, 'Etc/GMT-8'),
(388, 'Etc/GMT-9'),
(389, 'Etc/GMT0'),
(390, 'Etc/Greenwich'),
(391, 'Etc/UCT'),
(392, 'Etc/UTC'),
(393, 'Etc/Universal'),
(394, 'Etc/Zulu'),
(395, 'Europe/Amsterdam'),
(396, 'Europe/Andorra'),
(397, 'Europe/Athens'),
(398, 'Europe/Belfast'),
(399, 'Europe/Belgrade'),
(400, 'Europe/Berlin'),
(401, 'Europe/Bratislava'),
(402, 'Europe/Brussels'),
(403, 'Europe/Bucharest'),
(404, 'Europe/Budapest'),
(405, 'Europe/Chisinau'),
(406, 'Europe/Copenhagen'),
(407, 'Europe/Dublin'),
(408, 'Europe/Gibraltar'),
(409, 'Europe/Guernsey'),
(410, 'Europe/Helsinki'),
(411, 'Europe/Isle_of_Man'),
(412, 'Europe/Istanbul'),
(413, 'Europe/Jersey'),
(414, 'Europe/Kaliningrad'),
(415, 'Europe/Kiev'),
(416, 'Europe/Lisbon'),
(417, 'Europe/Ljubljana'),
(418, 'Europe/London'),
(419, 'Europe/Luxembourg'),
(420, 'Europe/Madrid'),
(421, 'Europe/Malta'),
(422, 'Europe/Mariehamn'),
(423, 'Europe/Minsk'),
(424, 'Europe/Monaco'),
(425, 'Europe/Moscow'),
(426, 'Europe/Nicosia'),
(427, 'Europe/Oslo'),
(428, 'Europe/Paris'),
(429, 'Europe/Podgorica'),
(430, 'Europe/Prague'),
(431, 'Europe/Riga'),
(432, 'Europe/Rome'),
(433, 'Europe/Samara'),
(434, 'Europe/San_Marino'),
(435, 'Europe/Sarajevo'),
(436, 'Europe/Simferopol'),
(437, 'Europe/Skopje'),
(438, 'Europe/Sofia'),
(439, 'Europe/Stockholm'),
(440, 'Europe/Tallinn'),
(441, 'Europe/Tirane'),
(442, 'Europe/Tiraspol'),
(443, 'Europe/Uzhgorod'),
(444, 'Europe/Vaduz'),
(445, 'Europe/Vatican'),
(446, 'Europe/Vienna'),
(447, 'Europe/Vilnius'),
(448, 'Europe/Volgograd'),
(449, 'Europe/Warsaw'),
(450, 'Europe/Zagreb'),
(451, 'Europe/Zaporozhye'),
(452, 'Europe/Zurich'),
(453, 'Factory'),
(454, 'GB'),
(455, 'GB-Eire'),
(456, 'GMT'),
(457, 'GMT+0'),
(458, 'GMT-0'),
(459, 'GMT0'),
(460, 'Greenwich'),
(461, 'HST'),
(462, 'Hongkong'),
(463, 'Iceland'),
(464, 'Indian/Antananarivo'),
(465, 'Indian/Chagos'),
(466, 'Indian/Christmas'),
(467, 'Indian/Cocos'),
(468, 'Indian/Comoro'),
(469, 'Indian/Kerguelen'),
(470, 'Indian/Mahe'),
(471, 'Indian/Maldives'),
(472, 'Indian/Mauritius'),
(473, 'Indian/Mayotte'),
(474, 'Indian/Reunion'),
(475, 'Iran'),
(476, 'Israel'),
(477, 'Jamaica'),
(478, 'Japan'),
(479, 'Kwajalein'),
(480, 'Libya'),
(481, 'MET'),
(482, 'MST'),
(483, 'MST7MDT'),
(484, 'Mexico/BajaNorte'),
(485, 'Mexico/BajaSur'),
(486, 'Mexico/General'),
(487, 'Mideast/Riyadh87'),
(488, 'Mideast/Riyadh88'),
(489, 'Mideast/Riyadh89'),
(490, 'NZ'),
(491, 'NZ-CHAT'),
(492, 'Navajo'),
(493, 'PRC'),
(494, 'PST8PDT'),
(495, 'Pacific/Apia'),
(496, 'Pacific/Auckland'),
(497, 'Pacific/Chatham'),
(498, 'Pacific/Easter'),
(499, 'Pacific/Efate'),
(500, 'Pacific/Enderbury'),
(501, 'Pacific/Fakaofo'),
(502, 'Pacific/Fiji'),
(503, 'Pacific/Funafuti'),
(504, 'Pacific/Galapagos'),
(505, 'Pacific/Gambier'),
(506, 'Pacific/Guadalcanal'),
(507, 'Pacific/Guam'),
(508, 'Pacific/Honolulu'),
(509, 'Pacific/Johnston'),
(510, 'Pacific/Kiritimati'),
(511, 'Pacific/Kosrae'),
(512, 'Pacific/Kwajalein'),
(513, 'Pacific/Majuro'),
(514, 'Pacific/Marquesas'),
(515, 'Pacific/Midway'),
(516, 'Pacific/Nauru'),
(517, 'Pacific/Niue'),
(518, 'Pacific/Norfolk'),
(519, 'Pacific/Noumea'),
(520, 'Pacific/Pago_Pago'),
(521, 'Pacific/Palau'),
(522, 'Pacific/Pitcairn'),
(523, 'Pacific/Ponape'),
(524, 'Pacific/Port_Moresby'),
(525, 'Pacific/Rarotonga'),
(526, 'Pacific/Saipan'),
(527, 'Pacific/Samoa'),
(528, 'Pacific/Tahiti'),
(529, 'Pacific/Tarawa'),
(530, 'Pacific/Tongatapu'),
(531, 'Pacific/Truk'),
(532, 'Pacific/Wake'),
(533, 'Pacific/Wallis'),
(534, 'Pacific/Yap'),
(535, 'Poland'),
(536, 'Portugal'),
(537, 'ROC'),
(538, 'ROK'),
(539, 'Singapore'),
(540, 'Turkey'),
(541, 'UCT'),
(542, 'US/Alaska'),
(543, 'US/Aleutian'),
(544, 'US/Arizona'),
(545, 'US/Central'),
(546, 'US/East-Indiana'),
(547, 'US/Eastern'),
(548, 'US/Hawaii'),
(549, 'US/Indiana-Starke'),
(550, 'US/Michigan'),
(551, 'US/Mountain'),
(552, 'US/Pacific'),
(553, 'US/Pacific-New'),
(554, 'US/Samoa'),
(555, 'UTC'),
(556, 'Universal'),
(557, 'W-SU'),
(558, 'WET'),
(559, 'Zulu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE IF NOT EXISTS `tipos` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `nombre`, `estado`) VALUES
(1, 'Deporte', 's'),
(2, 'Musica', 's'),
(3, 'Television', 's'),
(9, 'Animaciones', 's'),
(10, 'Anime', 's'),
(11, '', 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE IF NOT EXISTS `tipo_documento` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id`, `nombre`, `estado`) VALUES
(1, 'CARTA', 's'),
(3, 'OFICIO', 's'),
(4, 'SOLICITUD', 's'),
(5, 'MEMORANDO', 's'),
(6, 'OTROS', 's'),
(7, 'OFICIO CIRCULAR', 's'),
(8, 'INFORME', 's'),
(9, 'CURRICULUM VITAE', 's');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulos`
--

CREATE TABLE IF NOT EXISTS `titulos` (
  `id` int(255) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `cuadro` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `titulos`
--

INSERT INTO `titulos` (`id`, `titulo`, `cuadro`) VALUES
(1, 'BIENVENIDOS TODOS', 'alert alert-info'),
(2, 'PRINCIPALES NOTICIAS', 'alert alert-error'),
(3, 'FACEBOOK', 'alert alert-info');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `procedencia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `dependencia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `usu` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `con` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `codarea` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=70 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `procedencia`, `dependencia`, `usu`, `con`, `tipo`, `correo`, `codarea`, `estado`) VALUES
(1, 'JOSE', 'ESPILLCO QUISPE', '1', '3A', 'jose', 'jose', 'a', 'espillco_16@hotmail.com', '12', 's'),
(60, 'HEBER', 'TORRES', '1', '3A', 'heber', 'heber', 'a', 'heber@hotmail.com', '8', 's'),
(61, 'REYSER', 'LAVI', '1', '3A', 'reyser', 'reyser', 'u', 'reyser@hotmail.com', '1', 's'),
(62, 'NELY', 'MEZA', '1', '3A', 'nely', 'nely', 'a', 'nely@hotmail.com', '7', 's'),
(63, 'FELIPE', 'YARASCA', '1', 'V1', 'felipe', 'felipe', 'a', 'felipe@hotmail.com', '1', 's'),
(64, 'JOSE', 'ESPILLCO', '1', 'V1', 'ejose', 'ejose', 'a', 'jose@hotmail.com', '8', 's'),
(65, 'MARIA', 'LUISA', '1', 'V1', 'maria', 'maria', 'a', 'maria@hotmail.com', '7', 's'),
(66, 'MARIA', 'LUISA', '1', 'V1', 'lmaria', 'lmaria', 'a', 'maria@hotmail.com', '7', 's'),
(68, 'JORGE', 'MARQUEZ', '1', 'V1', 'jorge', 'jorge', 'a', 'jorge@hotmail.com', '4', 's'),
(69, 'HEBER', 'TORRES', '1', 'V1', 'theber', 'theber', 'a', 'heber@hotmail.com', '12', 's');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
