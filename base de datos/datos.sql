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


-- Volcando datos para la tabla code.punto_nivel: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `punto_nivel` DISABLE KEYS */;
INSERT INTO `punto_nivel` (`id`, `Nivel`, `puntos`, `valor`) VALUES
	(1, 'Basico', 100, 50000),
	(2, 'Bronce', 200, 100000),
	(3, 'Plata', 300, 150000),
	(4, 'Oro', 500, 200000),
	(5, 'Platino', 800, 350000);
/*!40000 ALTER TABLE `punto_nivel` ENABLE KEYS */;

-- Volcando datos para la tabla code.usuario: ~15 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `email`, `password`, `documento`, `nombres`, `apellidos`, `tipo_usuario`, `direccion`, `genero`, `departamento`, `estado`, `fecha_insert`, `puntos`) VALUES
	(1, 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '123456', 'Administrador', 'Hawah', 'Administrador', 'calle 2', 'Masculino', 5, 'Activo', '2021-09-10 09:43:29'),
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
