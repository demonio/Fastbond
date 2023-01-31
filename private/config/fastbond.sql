-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         10.4.22-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla fastbond.boxes
DROP TABLE IF EXISTS `boxes`;
CREATE TABLE IF NOT EXISTS `boxes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `box_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `box_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_before` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_after` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla fastbond.boxes: ~6 rows (aproximadamente)
DELETE FROM `boxes`;
INSERT INTO `boxes` (`id`, `box_name`, `box_type`, `code_before`, `code_after`) VALUES
	(2, 'DOCTYPE HTML 5', 'html', '<!DOCTYPE html>', NULL),
	(4, 'META charset', 'html', '<meta charset="UTF-8">', NULL),
	(5, 'HEAD', 'html', '<head>', '</head>'),
	(6, 'META for mobiles', 'html', '<meta name="viewport" content="width=device-width, initial-scale=1.0">', NULL),
	(7, 'TITLE', 'html', '<title><?=empty($title)?"$module_name/$controller_name > $action_name":$title?></title>', NULL),
	(12, 'CSS', 'html', '<link href="/css/admin.min.css?v=<?=empty($version)?42:$version?>" rel="stylesheet">\r\n<?=Css::inc()?>', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
