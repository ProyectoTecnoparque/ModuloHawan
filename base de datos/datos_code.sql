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

-- Volcando datos para la tabla code.departamentos: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` (`id_depa`, `nombre`) VALUES
	(1, 'Risaralda\n'),
	(2, 'Caldas'),
	(3, 'Quindío');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;

-- Volcando datos para la tabla code.point_acum: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `point_acum` DISABLE KEYS */;
INSERT INTO `point_acum` (`id`, `usuario_id`, `acum_point`, `id_nivel`, `fecha_insert`) VALUES
	(1, 3, 600, 3, '2021-08-20 00:00:00'),
	(2, 9, 700, 4, '2021-08-13 00:00:00'),
	(3, 10, 300, 2, '2021-08-30 00:00:00');
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

-- Volcando datos para la tabla code.usuario: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `email`, `password`, `documento`, `nombres`, `apellidos`, `tipo_usuario`, `direccion`, `genero`, `departamento`, `estado`, `fecha_insert`, `puntos`) VALUES
	(1, 'maria@gmail.com', '2c9d9225385f6be2f576647e9e49e631', '16533', 'Maria', 'Flores', 'Usuario', 'calle 5', 'Femenino', 2, 'Inactivo', '2021-08-30 00:01:23', 2500),
	(2, 'carlos@gmail.com', '125d0d502244655321fd3c3daf0dc440', '78587676', 'carlos', 'cardona', 'Usuario', 'calle 57', 'Masculino', 2, 'Activo', '2021-08-24 15:30:01', 50),
	(3, 'ana@gmail.com', '06d86297d6e28d4637d60c86c2a2f5b6', '5524', 'Ana', 'Jaramillo', 'Usuario', 'calle 76', 'Femenino', 1, 'Activo', '2021-08-24 15:29:59', 600),
	(4, 'jhon@gmail.com', 'b16574c54c98b9512edbecb8fa4f47f2', '5655257', 'Jhon', 'Lopez', 'Usuario', 'calle 5', 'Masculino', 1, 'Activo', '2021-08-24 15:29:55', 100),
	(5, 'angela@gmail.com', '06d86297d6e28d4637d60c86c2a2f5b6', '5824556', 'Angela', 'Toro', 'Usuario', 'calle 56', 'Masculino', 1, 'Activo', '2021-08-24 15:29:52', 600),
	(6, 'ingreso@gmail.com', '0192023a7bbd73250516f069df18b500', '125689', 'ingreso', 'inicio', 'Administrador', 'calle 7', 'Otro', 3, 'Activo', '2021-08-24 15:30:11', 900),
	(7, 'andrea@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1203094', 'andrea', 'osorio', 'Administrador', 'calle 8', 'Femenino', 1, 'Activo', '2021-08-24 15:29:50', 500),
	(8, 'ing@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '45432', 'ingreso', 'dos', 'Administrador', 'calle 2', 'Masculino', 1, 'Activo', '2021-08-24 15:29:46', 800),
	(9, 'ejemm@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '589684', 'ejemm', 'plo', 'Usuario', 'calle 3', 'Masculino', 1, 'Activo', '2021-08-24 15:30:14', 700),
	(10, 'exam@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '53564356', 'exam', 'ple', 'Usuario', 'calle 435', 'Masculino', 2, 'Activo', '2021-08-24 15:30:17', 300),
	(11, 'regist@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '845883', 'registro', 'ejemplo', 'Usuario', 'calle 4', 'Femenino', 1, 'Activo', '2021-08-24 11:07:31', 100),
	(12, 'gfd@gmail.com', '4607e782c4d86fd5364d7e4508bb10d9', '42386', 'gdf', 'sdf', 'Usuario', 'calle 4', 'Femenino', 1, 'Activo', '2021-08-24 11:09:36', 1000),
	(13, 'qoo@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '52387527', ' qoo', 'apps', 'Usuario', 'calle 4', 'Masculino', 1, 'Activo', '2021-08-24 11:40:32', 1000);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
