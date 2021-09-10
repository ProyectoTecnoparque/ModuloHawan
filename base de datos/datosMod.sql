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

-- Volcando datos para la tabla code.departamentos: ~33 rows (aproximadamente)
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` (`id_depa`, `nombre`) VALUES
	(1, 'Amazonas'),
	(2, 'Antioquia'),
	(3, 'Arauca'),
	(4, 'Atlantico'),
	(5, 'Bolivar'),
	(7, 'Boyaca'),
	(8, 'Caldas'),
	(9, 'Caqueta'),
	(10, 'Casanare'),
	(11, 'Cauca'),
	(12, 'Cesar'),
	(13, 'Choco'),
	(14, 'Cordoba'),
	(15, 'Cundinamarca'),
	(16, 'Distrito Capital'),
	(17, 'Guainia'),
	(18, 'Guaviare'),
	(19, 'Huila'),
	(20, 'La Guajira'),
	(21, 'Magdalena'),
	(22, 'Meta'),
	(23, 'Nariño'),
	(24, 'Norte de Santander'),
	(25, 'Putumayo'),
	(26, 'Quindio'),
	(27, 'Risaralda'),
	(28, 'San Andres y Providencia'),
	(29, 'Santander'),
	(30, 'Sucre'),
	(31, 'Tolima'),
	(32, 'Valle del Cauca'),
	(33, 'Vaupes'),
	(34, 'Vichada');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;

-- Volcando datos para la tabla code.point_acum: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `point_acum` DISABLE KEYS */;
INSERT INTO `point_acum` (`id`, `usuario_id`, `puntos_sum`, `puntos_rest`, `id_nivel`, `fecha_insert`) VALUES
	(1, 3, 1000, 0, 2, '2021-09-10 13:15:06'),
	(2, 1, 1000, 0, 2, '2021-09-10 13:47:02'),
	(3, 1, 100, 0, 2, '2021-09-10 14:08:53'),
	(4, 3, 0, 500, 2, '2021-09-10 14:39:33'),
	(5, 3, 1000, 0, 2, '2021-09-10 14:43:13'),
	(6, 3, 100, 0, 2, '2021-09-10 14:43:57'),
	(7, 3, 0, 100, 2, '2021-09-10 14:44:03'),
	(8, 1, 100, 0, 2, '2021-09-10 15:13:20'),
	(9, 1, 0, 100, 2, '2021-09-10 15:13:28');
/*!40000 ALTER TABLE `point_acum` ENABLE KEYS */;

-- Volcando datos para la tabla code.punto_nivel: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `punto_nivel` DISABLE KEYS */;
INSERT INTO `punto_nivel` (`id`, `Nivel`, `puntos`, `valor`) VALUES
	(1, 'Basico', 100, 50000),
	(2, 'Bronce', 200, 100000),
	(3, 'Plata', 300, 150000),
	(4, 'Oro', 500, 200000),
	(5, 'Platino', 800, 350000);
/*!40000 ALTER TABLE `punto_nivel` ENABLE KEYS */;

-- Volcando datos para la tabla code.usuario: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `email`, `password`, `documento`, `nombres`, `apellidos`, `tipo_usuario`, `direccion`, `genero`, `departamento`, `estado`, `fecha_insert`, `puntos`) VALUES
	(1, 'maria@gmail.com', '2c9d9225385f6be2f576647e9e49e631', '16533', 'Maria', 'Flores', 'Usuario', 'calle 5', 'Femenino', 2, 'Activo', '2021-09-10 11:45:39', 2500),
	(2, 'carlos@gmail.com', '125d0d502244655321fd3c3daf0dc440', '78587676', 'carlos', 'cardona', 'Usuario', 'calle 57', 'Masculino', 2, 'Inactivo', '2021-09-09 14:08:17', 50),
	(3, 'ana@gmail.com', '06d86297d6e28d4637d60c86c2a2f5b6', '5524', 'Ana', 'Jaramillo', 'Usuario', 'calle 76', 'Femenino', 1, 'Activo', '2021-08-24 15:29:59', 600),
	(4, 'jhon@gmail.com', 'b16574c54c98b9512edbecb8fa4f47f2', '5655257', 'Jhon', 'Lopez', 'Usuario', 'calle 5', 'Masculino', 1, 'Activo', '2021-08-24 15:29:55', 100),
	(5, 'angela@gmail.com', '06d86297d6e28d4637d60c86c2a2f5b6', '5824556', 'Angela', 'Toro', 'Usuario', 'calle 56', 'Masculino', 1, 'Activo', '2021-08-24 15:29:52', 600),
	(6, 'ingreso@gmail.com', '0192023a7bbd73250516f069df18b500', '125689', 'ingreso', 'inicio', 'Administrador', 'calle 7', 'Otro', 3, 'Activo', '2021-09-10 10:55:47', 900),
	(7, 'andrea@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1203094', 'andrea', 'osorio', 'Administrador', 'calle 8', 'Femenino', 1, 'Activo', '2021-08-24 15:29:50', 500),
	(8, 'ing@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '45432', 'ingreso', 'dos', 'Administrador', 'calle 2', 'Masculino', 5, 'Activo', '2021-09-10 09:43:29', 800),
	(9, 'ejemm@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '589684', 'ejemm', 'plo', 'Usuario', 'calle 3', 'Masculino', 1, 'Activo', '2021-08-24 15:30:14', 700),
	(10, 'exam@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '53564356', 'exam', 'ple', 'Usuario', 'calle 435', 'Masculino', 2, 'Activo', '2021-08-24 15:30:17', 300),
	(11, 'regist@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '845883', 'registro', 'ejemplo', 'Usuario', 'calle 4', 'Femenino', 1, 'Activo', '2021-08-24 11:07:31', 100),
	(12, 'gfd@gmail.com', '4607e782c4d86fd5364d7e4508bb10d9', '42386', 'gdf', 'sdf', 'Usuario', 'calle 4', 'Femenino', 1, 'Activo', '2021-08-24 11:09:36', 1000),
	(13, 'qoo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '52387527', ' qoo', 'apps', 'Usuario', 'calle 4', 'Masculino', 1, 'Activo', '2021-08-24 11:40:32', 1000),
	(14, 'eje@gmail.com', 'ee6440fae92f53bf4429b21e7f886d17', '2334', 'eje', 'plo', 'Administrador', 'calle 4', 'Masculino', 20, 'Activo', '2021-09-10 09:43:14', 0),
	(15, 'inje@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '12345', 'ingreso', 'ejemplo', 'Usuario', 'calle 9', 'Femenino', 1, 'Activo', '2021-09-10 15:44:51', 100);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
