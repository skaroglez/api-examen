-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2020 a las 08:21:29
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_agricola`
--
CREATE DATABASE IF NOT EXISTS `db_agricola` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_agricola`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion_estatus`
--

CREATE TABLE `configuracion_estatus` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB  CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `configuracion_estatus`
--

INSERT INTO `configuracion_estatus` (`id`, `nombre`) VALUES(1, 'ACTIVO');
INSERT INTO `configuracion_estatus` (`id`, `nombre`) VALUES(2, 'INACTIVO');
INSERT INTO `configuracion_estatus` (`id`, `nombre`) VALUES(3, 'ELIMINADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion_horarios`
--

CREATE TABLE `configuracion_horarios` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL DEFAULT '',
  `horas` int(11) NOT NULL DEFAULT 0,
  `estatus_id` int(11) NOT NULL DEFAULT 1,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_registra_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuracion_horarios`
--

INSERT INTO `configuracion_horarios` (`id`, `descripcion`, `horas`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(1, '9:00 A 19:00 (HASTA LAS 7)', 45, 1, '2020-10-13 17:25:16', 1);
INSERT INTO `configuracion_horarios` (`id`, `descripcion`, `horas`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(2, '8:30  A 18:00 (HASTA LAS 6)', 46, 1, '2020-10-13 17:25:16', 1);
INSERT INTO `configuracion_horarios` (`id`, `descripcion`, `horas`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(3, '9:00 A 18:30 (HASTA 6:30 PM)', 46, 1, '2020-10-13 17:25:16', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion_menu_opciones`
--

CREATE TABLE `configuracion_menu_opciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `icono` varchar(20) DEFAULT 'NULL',
  `modulo_id` int(11) NOT NULL,
  `estatus_id` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `configuracion_menu_opciones`
--

INSERT INTO `configuracion_menu_opciones` (`id`, `nombre`, `icono`, `modulo_id`, `estatus_id`, `fecha_registro`, `url`) VALUES(1, 'Roles', 'faUserTag', 2, 1, '2020-10-11 19:50:41', 'configuration/roles');
INSERT INTO `configuracion_menu_opciones` (`id`, `nombre`, `icono`, `modulo_id`, `estatus_id`, `fecha_registro`, `url`) VALUES(2, 'Módulos', 'faCubes', 2, 1, '2020-10-11 19:50:41', 'configuration/modules');
INSERT INTO `configuracion_menu_opciones` (`id`, `nombre`, `icono`, `modulo_id`, `estatus_id`, `fecha_registro`, `url`) VALUES(3, 'Menú Opciones', 'faCube', 2, 1, '2020-10-11 19:50:41', 'configuration/menuOptions');
INSERT INTO `configuracion_menu_opciones` (`id`, `nombre`, `icono`, `modulo_id`, `estatus_id`, `fecha_registro`, `url`) VALUES(4, 'Permisos', 'faIndent', 3, 1, '2020-10-11 19:50:41', 'configuration/accesses');
INSERT INTO `configuracion_menu_opciones` (`id`, `nombre`, `icono`, `modulo_id`, `estatus_id`, `fecha_registro`, `url`) VALUES(5, 'Usuarios', 'faUser', 3, 1, '2020-10-11 19:50:41', 'catalogs/users');
INSERT INTO `configuracion_menu_opciones` (`id`, `nombre`, `icono`, `modulo_id`, `estatus_id`, `fecha_registro`, `url`) VALUES(6, 'Listado de Productos', 'faIndent', 3, 1, '2020-10-11 19:50:41', 'catalogs/product/list');
INSERT INTO `configuracion_menu_opciones` (`id`, `nombre`, `icono`, `modulo_id`, `estatus_id`, `fecha_registro`, `url`) VALUES(7, 'Listado de Categorías', 'faIndent', 3, 1, '2020-10-11 19:50:41', 'catalogs/categories/list');
INSERT INTO `configuracion_menu_opciones` (`id`, `nombre`, `icono`, `modulo_id`, `estatus_id`, `fecha_registro`, `url`) VALUES(8, 'Listado de Empleados', 'faUsers', 3, 1, '2020-10-11 19:50:41', 'catalogs/employees/list');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion_modulos`
--

CREATE TABLE `configuracion_modulos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estatus_id` int(11) NOT NULL,
  `icono` varchar(20) DEFAULT 'NULL',
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `configuracion_modulos`
--

INSERT INTO `configuracion_modulos` (`id`, `nombre`, `estatus_id`, `icono`, `fecha_registro`) VALUES(1, 'Administración', 1, 'admin', '2020-10-11 19:50:41');
INSERT INTO `configuracion_modulos` (`id`, `nombre`, `estatus_id`, `icono`, `fecha_registro`) VALUES(2, 'Configuración', 1, NULL, '2020-10-11 19:50:41');
INSERT INTO `configuracion_modulos` (`id`, `nombre`, `estatus_id`, `icono`, `fecha_registro`) VALUES(3, 'Catálogos', 1, NULL, '2020-10-11 19:50:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion_roles`
--

CREATE TABLE `configuracion_roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estatus_id` int(11) NOT NULL DEFAULT 1,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `configuracion_roles`
--

INSERT INTO `configuracion_roles` (`id`, `nombre`, `estatus_id`, `fecha_registro`) VALUES(1, 'ADMINISTRADOR', 1, '2020-10-11 19:50:41');
INSERT INTO `configuracion_roles` (`id`, `nombre`, `estatus_id`, `fecha_registro`) VALUES(2, 'AUXILIAR', 1, '2020-10-11 19:50:41');
INSERT INTO `configuracion_roles` (`id`, `nombre`, `estatus_id`, `fecha_registro`) VALUES(3, 'CONSULTOR', 1, '2020-10-11 19:50:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion_tipos_permisos`
--

CREATE TABLE `configuracion_tipos_permisos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `usuario_registra_id` int(11) NOT NULL,
  `estatus_id` int(11) NOT NULL DEFAULT 1,
  `fecha_registro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_categorias`
--

CREATE TABLE `imagenes_categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL DEFAULT '',
  `ruta` varchar(500) NOT NULL DEFAULT '',
  `categoria_id` int(11) NOT NULL DEFAULT 0,
  `extension` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_empleados`
--

CREATE TABLE `imagenes_empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL DEFAULT '',
  `ruta` varchar(500) NOT NULL DEFAULT '',
  `empleado_id` int(11) NOT NULL DEFAULT 0,
  `extension` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_productos`
--

CREATE TABLE `imagenes_productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL DEFAULT '',
  `ruta` varchar(500) NOT NULL DEFAULT '',
  `producto_id` int(11) NOT NULL DEFAULT 0,
  `extension` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listado_categorias`
--

CREATE TABLE `listado_categorias` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL DEFAULT '',
  `estatus_id` int(11) NOT NULL DEFAULT 1,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_registra_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `listado_categorias`
--

INSERT INTO `listado_categorias` (`id`, `descripcion`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(1, 'CAT 1', 1, '2020-10-12 13:28:42', 1);
INSERT INTO `listado_categorias` (`id`, `descripcion`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(2, 'CAT 2', 1, '2020-10-12 13:28:42', 1);
INSERT INTO `listado_categorias` (`id`, `descripcion`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(3, 'CAT 3', 1, '2020-10-12 14:04:30', 1);
INSERT INTO `listado_categorias` (`id`, `descripcion`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(4, 'CATEGORIA NUEVA', 1, '2020-10-15 23:49:12', 2);
INSERT INTO `listado_categorias` (`id`, `descripcion`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(5, 'NUEVA CATEGORIA', 1, '2020-10-16 00:00:46', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listado_empleados`
--

CREATE TABLE `listado_empleados` (
  `id` int(11) NOT NULL,
  `primer_nombre` varchar(50) NOT NULL,
  `segundo_nombre` varchar(50) DEFAULT NULL,
  `apellido_paterno` varchar(50) NOT NULL,
  `apellido_materno` varchar(50) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo` char(1) NOT NULL DEFAULT '',
  `puesto_id` int(11) NOT NULL,
  `horario_id` int(11) NOT NULL,
  `fecha_ingreso` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_baja` datetime DEFAULT NULL,
  `estatus_id` int(11) NOT NULL DEFAULT 1,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_registra_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `listado_empleados`
--

INSERT INTO `listado_empleados` (`id`, `primer_nombre`, `segundo_nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `sexo`, `puesto_id`, `horario_id`, `fecha_ingreso`, `fecha_baja`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(1, 'CAROLINA', NULL, 'GONZALEZ', 'CHAVEZ', '1995-06-17', 'F', 1, 1, '2020-10-13 00:00:00', '2020-10-13 00:00:00', 1, '2020-10-13 17:28:41', 1);
INSERT INTO `listado_empleados` (`id`, `primer_nombre`, `segundo_nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `sexo`, `puesto_id`, `horario_id`, `fecha_ingreso`, `fecha_baja`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(2, 'EDUARDO', NULL, 'ZAZUETA', NULL, '1925-06-23', 'M', 2, 2, '2020-10-13 00:00:00', NULL, 1, '2020-10-13 23:39:52', 1);
INSERT INTO `listado_empleados` (`id`, `primer_nombre`, `segundo_nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `sexo`, `puesto_id`, `horario_id`, `fecha_ingreso`, `fecha_baja`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(3, 'MARIO', 'ANTONIO', 'SANCHEZ', 'RODRIGUEZ', '1991-10-11', 'M', 3, 3, '2020-10-13 00:00:00', NULL, 1, '2020-10-13 23:39:52', 1);
INSERT INTO `listado_empleados` (`id`, `primer_nombre`, `segundo_nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `sexo`, `puesto_id`, `horario_id`, `fecha_ingreso`, `fecha_baja`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(4, 'MAGADALENA', NULL, 'PEREZ', 'PAEZ', '1992-06-17', 'F', 2, 1, '2020-10-13 00:00:00', NULL, 1, '2020-10-13 23:39:52', 1);
INSERT INTO `listado_empleados` (`id`, `primer_nombre`, `segundo_nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `sexo`, `puesto_id`, `horario_id`, `fecha_ingreso`, `fecha_baja`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(5, 'REFUGIO', NULL, 'SOTO', NULL, '1999-03-07', 'F', 3, 3, '2020-10-13 00:00:00', NULL, 1, '2020-10-13 23:39:52', 1);
INSERT INTO `listado_empleados` (`id`, `primer_nombre`, `segundo_nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `sexo`, `puesto_id`, `horario_id`, `fecha_ingreso`, `fecha_baja`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(6, 'ERIDEL', NULL, 'SAMANIEGO', 'RAMIREZ', '1982-08-12', 'M', 2, 1, '2020-10-13 23:43:52', NULL, 1, '2020-10-13 23:43:52', 1);
INSERT INTO `listado_empleados` (`id`, `primer_nombre`, `segundo_nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `sexo`, `puesto_id`, `horario_id`, `fecha_ingreso`, `fecha_baja`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(7, 'JOSE', 'OMAR', 'CHAVEZ', NULL, '1987-01-13', 'M', 2, 2, '2020-10-13 23:43:52', NULL, 1, '2020-10-13 23:43:52', 1);
INSERT INTO `listado_empleados` (`id`, `primer_nombre`, `segundo_nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `sexo`, `puesto_id`, `horario_id`, `fecha_ingreso`, `fecha_baja`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(8, 'GUSTAVO', NULL, 'GONZALEZ', NULL, '2000-08-19', 'M', 2, 2, '2020-10-13 23:43:52', NULL, 1, '2020-10-13 23:43:52', 1);
INSERT INTO `listado_empleados` (`id`, `primer_nombre`, `segundo_nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `sexo`, `puesto_id`, `horario_id`, `fecha_ingreso`, `fecha_baja`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(9, 'MARTHA', 'ESMERALDA', 'RUBIO', 'ORTIZ', '1979-09-01', 'F', 3, 3, '2020-10-13 23:43:52', NULL, 1, '2020-10-13 23:43:52', 1);
INSERT INTO `listado_empleados` (`id`, `primer_nombre`, `segundo_nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `sexo`, `puesto_id`, `horario_id`, `fecha_ingreso`, `fecha_baja`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(10, 'OCTAVIO', '', 'VERDE', NULL, '1996-03-29', 'M', 3, 2, '2020-10-13 23:43:52', NULL, 1, '2020-10-13 23:43:52', 1);
INSERT INTO `listado_empleados` (`id`, `primer_nombre`, `segundo_nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `sexo`, `puesto_id`, `horario_id`, `fecha_ingreso`, `fecha_baja`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(21, 'ROSA', NULL, 'CARDENAS', 'MORA', '1989-06-16', 'M', 1, 1, '2020-10-13 23:45:03', NULL, 1, '2020-10-13 23:45:03', 1);
INSERT INTO `listado_empleados` (`id`, `primer_nombre`, `segundo_nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `sexo`, `puesto_id`, `horario_id`, `fecha_ingreso`, `fecha_baja`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(22, 'MARIO', NULL, 'SOTO', NULL, '2016-01-04', 'M', 3, 1, '2020-10-16 00:00:00', NULL, 1, '2020-10-14 11:16:40', 1);
INSERT INTO `listado_empleados` (`id`, `primer_nombre`, `segundo_nombre`, `apellido_paterno`, `apellido_materno`, `fecha_nacimiento`, `sexo`, `puesto_id`, `horario_id`, `fecha_ingreso`, `fecha_baja`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(23, 'MAXIMILIANO', NULL, 'ZAZUETA', NULL, '1992-11-10', 'F', 2, 3, '2020-10-16 00:00:00', '2020-10-16 00:00:00', 1, '2020-10-16 00:07:37', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listado_productos`
--

CREATE TABLE `listado_productos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL DEFAULT '',
  `categoria_id` int(11) NOT NULL,
  `estatus_id` int(11) NOT NULL DEFAULT 1,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_registra_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `listado_productos`
--

INSERT INTO `listado_productos` (`id`, `descripcion`, `categoria_id`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(1, 'PRODUCTO 1', 1, 1, '2020-10-12 14:09:58', 1);
INSERT INTO `listado_productos` (`id`, `descripcion`, `categoria_id`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(2, 'PRODUCTO 2', 1, 1, '2020-10-12 14:09:58', 1);
INSERT INTO `listado_productos` (`id`, `descripcion`, `categoria_id`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(3, 'PRODUCTO 3', 1, 1, '2020-10-12 21:58:41', 1);
INSERT INTO `listado_productos` (`id`, `descripcion`, `categoria_id`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(4, 'PRODUCTO 4', 1, 1, '2020-10-12 21:58:41', 1);
INSERT INTO `listado_productos` (`id`, `descripcion`, `categoria_id`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(5, 'PRODUCTO 5', 1, 1, '2020-10-12 21:58:41', 1);
INSERT INTO `listado_productos` (`id`, `descripcion`, `categoria_id`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(6, 'PRODUCTO 6', 1, 1, '2020-10-12 21:58:41', 1);
INSERT INTO `listado_productos` (`id`, `descripcion`, `categoria_id`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(7, 'PRODUCTO 7', 1, 1, '2020-10-12 21:58:41', 1);
INSERT INTO `listado_productos` (`id`, `descripcion`, `categoria_id`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(8, 'PRODUCTO 8', 1, 1, '2020-10-12 21:58:41', 1);
INSERT INTO `listado_productos` (`id`, `descripcion`, `categoria_id`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(9, 'PRODUCTO 9', 1, 1, '2020-10-12 21:58:41', 1);
INSERT INTO `listado_productos` (`id`, `descripcion`, `categoria_id`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(10, 'PRODUCTO 10', 1, 1, '2020-10-12 21:58:41', 1);
INSERT INTO `listado_productos` (`id`, `descripcion`, `categoria_id`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(11, 'PRODUCTO 11', 1, 1, '2020-10-12 21:58:41', 1);
INSERT INTO `listado_productos` (`id`, `descripcion`, `categoria_id`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(12, 'PRODUCTO 1', 2, 1, '2020-10-12 21:58:41', 1);
INSERT INTO `listado_productos` (`id`, `descripcion`, `categoria_id`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(13, 'PRODUCTO 1', 3, 1, '2020-10-13 12:48:38', 1);
INSERT INTO `listado_productos` (`id`, `descripcion`, `categoria_id`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(14, 'NUEVO PRODUCTO', 4, 1, '2020-10-16 00:03:29', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listado_puestos`
--

CREATE TABLE `listado_puestos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL DEFAULT '',
  `estatus_id` int(11) NOT NULL DEFAULT 1,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_registra_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `listado_puestos`
--

INSERT INTO `listado_puestos` (`id`, `descripcion`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(1, 'DIRECTOR GENERAL', 1, '2020-10-13 17:12:37', 1);
INSERT INTO `listado_puestos` (`id`, `descripcion`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(2, 'GERENTE', 1, '2020-10-13 17:12:37', 1);
INSERT INTO `listado_puestos` (`id`, `descripcion`, `estatus_id`, `fecha_registro`, `usuario_registra_id`) VALUES(3, 'SUBGERENTE', 1, '2020-10-13 17:12:37', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listado_usuarios`
--

CREATE TABLE `listado_usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(50) NOT NULL DEFAULT '',
  `contrasena` varchar(100) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `estatus_id` int(11) NOT NULL DEFAULT 1,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `listado_usuarios`
--

INSERT INTO `listado_usuarios` (`id`, `nombre`, `correo`, `contrasena`, `rol_id`, `estatus_id`, `fecha_registro`) VALUES(1, 'admin', 'correo1@examen.com', '21232f297a57a5a743894a0e4a801fc3', 1, 1, '2020-10-11 23:58:50');
INSERT INTO `listado_usuarios` (`id`, `nombre`, `correo`, `contrasena`, `rol_id`, `estatus_id`, `fecha_registro`) VALUES(2, 'auxiliar', 'correo_axuliar@examen.com', 'f700cd7088fef1f1986d7776f810a007', 2, 1, '2020-10-11 23:58:50');
INSERT INTO `listado_usuarios` (`id`, `nombre`, `correo`, `contrasena`, `rol_id`, `estatus_id`, `fecha_registro`) VALUES(3, 'consultor', 'consultor_consulta@examen.com', '33d3a1b450a9fe871cabdfc13db2c2e0', 3, 1, '2020-10-11 23:58:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_opciones_roles`
--

CREATE TABLE `menu_opciones_roles` (
  `id` int(11) NOT NULL,
  `menu_opcion_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `estatus_id` int(11) NOT NULL DEFAULT 1,
  `usuario_registra_id` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `menu_opciones_roles`
--

INSERT INTO `menu_opciones_roles` (`id`, `menu_opcion_id`, `rol_id`, `estatus_id`, `usuario_registra_id`, `fecha_registro`) VALUES(1, 1, 1, 1, 0, '2020-10-15 23:37:12');
INSERT INTO `menu_opciones_roles` (`id`, `menu_opcion_id`, `rol_id`, `estatus_id`, `usuario_registra_id`, `fecha_registro`) VALUES(2, 2, 1, 1, 0, '2020-10-15 23:37:12');
INSERT INTO `menu_opciones_roles` (`id`, `menu_opcion_id`, `rol_id`, `estatus_id`, `usuario_registra_id`, `fecha_registro`) VALUES(3, 3, 1, 1, 0, '2020-10-15 23:37:12');
INSERT INTO `menu_opciones_roles` (`id`, `menu_opcion_id`, `rol_id`, `estatus_id`, `usuario_registra_id`, `fecha_registro`) VALUES(4, 4, 1, 1, 0, '2020-10-15 23:37:12');
INSERT INTO `menu_opciones_roles` (`id`, `menu_opcion_id`, `rol_id`, `estatus_id`, `usuario_registra_id`, `fecha_registro`) VALUES(5, 5, 1, 1, 0, '2020-10-15 23:37:12');
INSERT INTO `menu_opciones_roles` (`id`, `menu_opcion_id`, `rol_id`, `estatus_id`, `usuario_registra_id`, `fecha_registro`) VALUES(6, 6, 1, 1, 0, '2020-10-15 23:38:51');
INSERT INTO `menu_opciones_roles` (`id`, `menu_opcion_id`, `rol_id`, `estatus_id`, `usuario_registra_id`, `fecha_registro`) VALUES(7, 7, 1, 1, 0, '2020-10-15 23:38:51');
INSERT INTO `menu_opciones_roles` (`id`, `menu_opcion_id`, `rol_id`, `estatus_id`, `usuario_registra_id`, `fecha_registro`) VALUES(8, 8, 1, 1, 0, '2020-10-15 23:38:51');
INSERT INTO `menu_opciones_roles` (`id`, `menu_opcion_id`, `rol_id`, `estatus_id`, `usuario_registra_id`, `fecha_registro`) VALUES(9, 6, 2, 1, 0, '2020-10-15 23:38:51');
INSERT INTO `menu_opciones_roles` (`id`, `menu_opcion_id`, `rol_id`, `estatus_id`, `usuario_registra_id`, `fecha_registro`) VALUES(10, 7, 2, 1, 0, '2020-10-15 23:38:51');
INSERT INTO `menu_opciones_roles` (`id`, `menu_opcion_id`, `rol_id`, `estatus_id`, `usuario_registra_id`, `fecha_registro`) VALUES(11, 8, 2, 1, 0, '2020-10-15 23:38:51');
INSERT INTO `menu_opciones_roles` (`id`, `menu_opcion_id`, `rol_id`, `estatus_id`, `usuario_registra_id`, `fecha_registro`) VALUES(12, 6, 3, 1, 0, '2020-10-15 23:38:51');
INSERT INTO `menu_opciones_roles` (`id`, `menu_opcion_id`, `rol_id`, `estatus_id`, `usuario_registra_id`, `fecha_registro`) VALUES(13, 7, 3, 1, 0, '2020-10-15 23:38:51');
INSERT INTO `menu_opciones_roles` (`id`, `menu_opcion_id`, `rol_id`, `estatus_id`, `usuario_registra_id`, `fecha_registro`) VALUES(14, 8, 3, 1, 0, '2020-10-15 23:38:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_opciones_roles_tipos_permisos`
--

CREATE TABLE `menu_opciones_roles_tipos_permisos` (
  `id` int(11) NOT NULL,
  `menu_opcion_rol_id` int(11) NOT NULL,
  `tipo_permiso_id` int(11) NOT NULL,
  `estatus_id` int(11) NOT NULL DEFAULT 1,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_registra_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `configuracion_estatus`
--
ALTER TABLE `configuracion_estatus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion_horarios`
--
ALTER TABLE `configuracion_horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estatus_id` (`estatus_id`),
  ADD KEY `usuario_registra_id` (`usuario_registra_id`);

--
-- Indices de la tabla `configuracion_menu_opciones`
--
ALTER TABLE `configuracion_menu_opciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_estatusmenu_opciones` (`estatus_id`),
  ADD KEY `fk_modulomenu_opciones` (`modulo_id`);

--
-- Indices de la tabla `configuracion_modulos`
--
ALTER TABLE `configuracion_modulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_modulosestatus` (`estatus_id`);

--
-- Indices de la tabla `configuracion_roles`
--
ALTER TABLE `configuracion_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rolesestatus` (`estatus_id`);

--
-- Indices de la tabla `configuracion_tipos_permisos`
--
ALTER TABLE `configuracion_tipos_permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_registra_id` (`usuario_registra_id`),
  ADD KEY `estatus_id` (`estatus_id`);

--
-- Indices de la tabla `imagenes_categorias`
--
ALTER TABLE `imagenes_categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `imagenes_empleados`
--
ALTER TABLE `imagenes_empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empleado_id` (`empleado_id`);

--
-- Indices de la tabla `imagenes_productos`
--
ALTER TABLE `imagenes_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `listado_categorias`
--
ALTER TABLE `listado_categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estatus_id` (`estatus_id`);

--
-- Indices de la tabla `listado_empleados`
--
ALTER TABLE `listado_empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estatus_id` (`estatus_id`),
  ADD KEY `puesto_id` (`puesto_id`),
  ADD KEY `horario_id` (`horario_id`);

--
-- Indices de la tabla `listado_productos`
--
ALTER TABLE `listado_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estatus_id` (`estatus_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `listado_puestos`
--
ALTER TABLE `listado_puestos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estatus_id` (`estatus_id`),
  ADD KEY `usuario_registra_id` (`usuario_registra_id`);

--
-- Indices de la tabla `listado_usuarios`
--
ALTER TABLE `listado_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estatus_id` (`estatus_id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `menu_opciones_roles`
--
ALTER TABLE `menu_opciones_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menu_opciones_roles` (`menu_opcion_id`),
  ADD KEY `fk_menu_opciones_roles_estatus` (`estatus_id`),
  ADD KEY `fk_menu_opciones_roles_roles` (`rol_id`);

--
-- Indices de la tabla `menu_opciones_roles_tipos_permisos`
--
ALTER TABLE `menu_opciones_roles_tipos_permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_opciones_roles_menu_opcion_rol_id` (`menu_opcion_rol_id`),
  ADD KEY `menu_opciones_roles_tipos_permisos_tipo_permiso_id` (`tipo_permiso_id`),
  ADD KEY `menu_opciones_roles_tipos_permisos_estatus_id` (`estatus_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `configuracion_estatus`
--
ALTER TABLE `configuracion_estatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `configuracion_horarios`
--
ALTER TABLE `configuracion_horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `configuracion_menu_opciones`
--
ALTER TABLE `configuracion_menu_opciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `configuracion_modulos`
--
ALTER TABLE `configuracion_modulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `configuracion_roles`
--
ALTER TABLE `configuracion_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `configuracion_tipos_permisos`
--
ALTER TABLE `configuracion_tipos_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `imagenes_categorias`
--
ALTER TABLE `imagenes_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `imagenes_empleados`
--
ALTER TABLE `imagenes_empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `imagenes_productos`
--
ALTER TABLE `imagenes_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `listado_categorias`
--
ALTER TABLE `listado_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `listado_empleados`
--
ALTER TABLE `listado_empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `listado_productos`
--
ALTER TABLE `listado_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `listado_puestos`
--
ALTER TABLE `listado_puestos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `listado_usuarios`
--
ALTER TABLE `listado_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `menu_opciones_roles`
--
ALTER TABLE `menu_opciones_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT de la tabla `menu_opciones_roles_tipos_permisos`
--
ALTER TABLE `menu_opciones_roles_tipos_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `configuracion_horarios`
--
ALTER TABLE `configuracion_horarios`
  ADD CONSTRAINT `configuracion_horarios_ibfk_1` FOREIGN KEY (`estatus_id`) REFERENCES `configuracion_estatus` (`id`),
  ADD CONSTRAINT `configuracion_horarios_ibfk_2` FOREIGN KEY (`usuario_registra_id`) REFERENCES `listado_usuarios` (`id`);

--
-- Filtros para la tabla `configuracion_menu_opciones`
--
ALTER TABLE `configuracion_menu_opciones`
  ADD CONSTRAINT `fk_estatusmenu_opciones` FOREIGN KEY (`estatus_id`) REFERENCES `configuracion_estatus` (`id`),
  ADD CONSTRAINT `fk_modulomenu_opciones` FOREIGN KEY (`modulo_id`) REFERENCES `configuracion_modulos` (`id`);

--
-- Filtros para la tabla `configuracion_modulos`
--
ALTER TABLE `configuracion_modulos`
  ADD CONSTRAINT `fk_modulosestatus` FOREIGN KEY (`estatus_id`) REFERENCES `configuracion_estatus` (`id`);

--
-- Filtros para la tabla `configuracion_roles`
--
ALTER TABLE `configuracion_roles`
  ADD CONSTRAINT `fk_rolesestatus` FOREIGN KEY (`estatus_id`) REFERENCES `configuracion_estatus` (`id`);

--
-- Filtros para la tabla `configuracion_tipos_permisos`
--
ALTER TABLE `configuracion_tipos_permisos`
  ADD CONSTRAINT `configuracion_tipos_permisos_ibfk_1` FOREIGN KEY (`usuario_registra_id`) REFERENCES `listado_usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `configuracion_tipos_permisos_ibfk_2` FOREIGN KEY (`estatus_id`) REFERENCES `configuracion_estatus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenes_categorias`
--
ALTER TABLE `imagenes_categorias`
  ADD CONSTRAINT `imagenes_categorias_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `listado_categorias` (`id`);

--
-- Filtros para la tabla `imagenes_empleados`
--
ALTER TABLE `imagenes_empleados`
  ADD CONSTRAINT `imagenes_empleados_ibfk_1` FOREIGN KEY (`empleado_id`) REFERENCES `listado_empleados` (`id`);

--
-- Filtros para la tabla `imagenes_productos`
--
ALTER TABLE `imagenes_productos`
  ADD CONSTRAINT `imagenes_productos_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `listado_productos` (`id`);

--
-- Filtros para la tabla `listado_categorias`
--
ALTER TABLE `listado_categorias`
  ADD CONSTRAINT `listado_categorias_ibfk_1` FOREIGN KEY (`estatus_id`) REFERENCES `configuracion_estatus` (`id`);

--
-- Filtros para la tabla `listado_empleados`
--
ALTER TABLE `listado_empleados`
  ADD CONSTRAINT `listado_empleados_ibfk_1` FOREIGN KEY (`estatus_id`) REFERENCES `configuracion_estatus` (`id`),
  ADD CONSTRAINT `listado_empleados_ibfk_2` FOREIGN KEY (`puesto_id`) REFERENCES `listado_puestos` (`id`),
  ADD CONSTRAINT `listado_empleados_ibfk_3` FOREIGN KEY (`horario_id`) REFERENCES `configuracion_horarios` (`id`);

--
-- Filtros para la tabla `listado_productos`
--
ALTER TABLE `listado_productos`
  ADD CONSTRAINT `listado_productos_ibfk_1` FOREIGN KEY (`estatus_id`) REFERENCES `configuracion_estatus` (`id`),
  ADD CONSTRAINT `listado_productos_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `listado_categorias` (`id`);

--
-- Filtros para la tabla `listado_puestos`
--
ALTER TABLE `listado_puestos`
  ADD CONSTRAINT `listado_puestos_ibfk_1` FOREIGN KEY (`estatus_id`) REFERENCES `configuracion_estatus` (`id`),
  ADD CONSTRAINT `listado_puestos_ibfk_2` FOREIGN KEY (`usuario_registra_id`) REFERENCES `listado_usuarios` (`id`);

--
-- Filtros para la tabla `listado_usuarios`
--
ALTER TABLE `listado_usuarios`
  ADD CONSTRAINT `listado_usuarios_ibfk_1` FOREIGN KEY (`estatus_id`) REFERENCES `configuracion_estatus` (`id`),
  ADD CONSTRAINT `listado_usuarios_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `configuracion_roles` (`id`);

--
-- Filtros para la tabla `menu_opciones_roles`
--
ALTER TABLE `menu_opciones_roles`
  ADD CONSTRAINT `fk_menu_opciones_roles` FOREIGN KEY (`menu_opcion_id`) REFERENCES `configuracion_menu_opciones` (`id`),
  ADD CONSTRAINT `fk_menu_opciones_roles_estatus` FOREIGN KEY (`estatus_id`) REFERENCES `configuracion_estatus` (`id`),
  ADD CONSTRAINT `fk_menu_opciones_roles_roles` FOREIGN KEY (`rol_id`) REFERENCES `configuracion_roles` (`id`);

--
-- Filtros para la tabla `menu_opciones_roles_tipos_permisos`
--
ALTER TABLE `menu_opciones_roles_tipos_permisos`
  ADD CONSTRAINT `menu_opciones_roles_menu_opcion_rol_id` FOREIGN KEY (`menu_opcion_rol_id`) REFERENCES `menu_opciones_roles` (`id`),
  ADD CONSTRAINT `menu_opciones_roles_tipos_permisos_estatus_id` FOREIGN KEY (`estatus_id`) REFERENCES `configuracion_estatus` (`id`),
  ADD CONSTRAINT `menu_opciones_roles_tipos_permisos_tipo_permiso_id` FOREIGN KEY (`tipo_permiso_id`) REFERENCES `configuracion_tipos_permisos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
