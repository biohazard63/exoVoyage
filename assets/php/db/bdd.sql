-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage des données de la table exo_voyage.category : ~4 rows (environ)
INSERT INTO `category` (`id`, `name`) VALUES
	(1, 'nature'),
	(2, 'capital'),
	(3, 'urbain'),
	(4, 'montagne');

-- Listage des données de la table exo_voyage.formula : ~2 rows (environ)
INSERT INTO `formula` (`id`, `name`) VALUES
	(1, '2 in 1'),
	(2, 'abo'),
	(3, 'autre');

-- Listage des données de la table exo_voyage.group : ~2 rows (environ)
INSERT INTO `group` (`id`, `name`) VALUES
	(1, 'visiteur'),
	(2, 'admin'),
	(3, 'edit');

-- Listage des données de la table exo_voyage.travel : ~6 rows (environ)
INSERT INTO `travel` (`id_travel`, `titel`, `image_url`, `description`, `date_start`, `date_end`, `price`, `category_id`, `formula_id`) VALUES
	(19, 'paris', '../../img/clipart2430864.png', 'direction paris', '2024-04-01', '2024-04-07', 150, 1, 1),
	(20, 'new-york', 'https://images.ctfassets.net/bth3mlrehms2/3iFoOTp2EdMqu16ppNCwFp/d79574da12489e1e81131b97d735abf9/USA__New_York__Skyline.jpg?w=1933&h=1288&q=50&fm=webp', 'croquer dans la pomme', '2024-05-01', '2024-05-13', 1299.99, 3, 3),
	(21, 'Barcelone', 'https://media.routard.com/image/57/1/barceloneta-plage-barcelone.1545571.w630.jpeg', 'une petite pause aux bord des plage', '2024-06-01', '2024-07-01', 1000, 3, 2),
	(22, 'rome', 'https://romesite.fr/images/que-faire-a-rome-italie.jpg', 'tour en Italie ', '2024-09-01', '2024-09-23', 500, 2, 1),
	(23, 'alpes', 'https://media-server.clubmed.com/image/_AUTOFORMAT_/900/507/crop/center/75/https%3A%2F%2Fns.clubmed.com%2FFEAM%2FMarketing%2FOmnichannel%2FSEO%2FLPOTHERS%2FVA-0726%2FGettyImages-844233196.jpg', 'sur les toit du monde', '2024-12-21', '2025-01-05', 2500, 4, 2);

-- Listage des données de la table exo_voyage.user : ~2 rows (environ)
INSERT INTO `user` (`id`, `username`, `password`, `group_id`) VALUES
	(1, 'quentin', '04051995', 3),
	(2, 'biohazard', '04051995', 2),
	(3, 'yolo', 'yolo', 1),
	(4, 'sebastien', 'sebastien', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
