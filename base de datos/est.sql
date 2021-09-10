-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.35-log - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para code
CREATE DATABASE IF NOT EXISTS `code` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `code`;

-- Volcando estructura para tabla code.departamentos
CREATE TABLE IF NOT EXISTS `departamentos` (
  `id_depa` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  PRIMARY KEY (`id_depa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla code.point_acum
CREATE TABLE IF NOT EXISTS `point_acum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `puntos_sum` int(11)  NULL,
  `puntos_rest` int(11)  NULL,
  `id_nivel` int(11) NOT NULL,
  `fecha_insert` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_point_acum_usuario` (`puntos_sum`),
  KEY `point_acum_ibfk_1` (`id_nivel`),
  KEY `point_acum_ibfk_2` (`usuario_id`),
  CONSTRAINT `point_acum_ibfk_1` FOREIGN KEY (`id_nivel`) REFERENCES `punto_nivel` (`id`),
  CONSTRAINT `point_acum_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla code.punto_nivel
CREATE TABLE IF NOT EXISTS `punto_nivel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nivel` enum('Basico','Bronce','Plata','Oro','Platino') NOT NULL,
  `puntos` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla code.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `documento` varchar(12) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `tipo_usuario` enum('Usuario','Administrador') DEFAULT NULL,
  `direccion` varchar(200) NOT NULL,
  `genero` enum('Masculino','Femenino','Otro') NOT NULL,
  `departamento` int(11) NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL,
  `fecha_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `puntos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `puntos` (`puntos`),
  KEY `FK_usuario_departamentos` (`departamento`),
  CONSTRAINT `FK_usuario_departamentos` FOREIGN KEY (`departamento`) REFERENCES `departamentos` (`id_depa`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
