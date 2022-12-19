-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table stunt.games: ~19 rows (approximately)
INSERT INTO `games` (`id_game`, `nama`, `genre`, `deskripsi`, `developer`, `tanggal_release`, `harga`) VALUES
	(1, 'Apex Legends', 'FPS', 'Apex Legends adalah game battle royale-hero shooter free-to-play yang dikembangkan oleh Respawn Entertainment dan diterbitkan oleh Electronic Arts. Ini dirilis untuk Microsoft Windows, PlayStation 4, dan Xbox One pada Februari 2019, untuk Nintendo Switch ', 'Respawn Entertainment', '4 Februari 2019', 'Free'),
	(3, 'Counter Strike Global Offensive', 'FPS', 'Counter-Strike: Global Offensive adalah penembak orang pertama taktis multipemain tahun 2012 yang dikembangkan oleh Valve dan Hidden Path Entertainment. Ini adalah game keempat dalam seri Counter-Strike.', 'Valve', '21 Agustus 2012', 'Free'),
	(4, 'Dark Souls III', 'RPG', 'Dark Souls III adalah game role-playing game tahun 2016 yang dikembangkan oleh FromSoftware dan diterbitkan oleh Bandai Namco Entertainment untuk PlayStation 4, Xbox One, dan Windows.', 'From Software', '24 Maret 2016', '700000'),
	(5, 'Dead By Day light', 'HORROR', 'Dead by Daylight adalah game online horor bertahan hidup multipemain asimetris yang dikembangkan oleh studio Kanada Behavior Interactive.', 'Behavior Interactive Inc.', '14 Juni 2016', '200000'),
	(6, 'Dota 2', 'MOBA', 'Dota 2 adalah video game arena pertempuran online multipemain 2013 oleh Valve. Gim ini merupakan sekuel dari Defense of the Ancients, mod buatan komunitas untuk Warcraft III: Reign of Chaos dari Blizzard Entertainment.', 'Valve', '9 Juli 2013', 'Free'),
	(7, 'Genshin Impact', 'RPG', 'Genshin Impact adalah game role-playing yang dikembangkan dan diterbitkan oleh miHoYo. Ini dirilis untuk Android, iOS, PlayStation 4, dan Windows pada tahun 2020, di PlayStation 5 pada tahun 2021, dan akan dirilis di Nintendo Switch.', 'Mihoyo', '28 September 2020', 'Free'),
	(8, 'Heroes Of The Storm', 'MOBA', 'Heroes of the Storm adalah video game arena pertempuran online multipemain crossover yang dikembangkan dan diterbitkan oleh Blizzard Entertainment.', 'Blizzard', '2 Juni 2015', 'Free'),
	(9, 'League Of Legends', 'MOBA', 'League of Legends, biasa disebut League, adalah video game arena pertempuran online multipemain tahun 2009 yang dikembangkan dan diterbitkan oleh Riot Games. Terinspirasi oleh Defense of the Ancients, peta khusus untuk Warcraft III, pendiri Riot berusaha ', 'Riot Games', '27 Oktober 2009', 'Free'),
	(10, 'Monster Hunter World', 'RPG', 'Monster Hunter: World adalah permainan video role-playing yang dikembangkan dan diterbitkan oleh Capcom dan angsuran utama kelima dalam seri Monster Hunter. Itu dirilis di seluruh dunia untuk PlayStation 4 dan Xbox One pada Januari 2018, dengan versi Micr', 'Capcom', '26 Januari 2018', '300000'),
	(13, 'Destiny 2', 'FPS', 'Destiny 2 adalah permainan video penembak orang pertama multipemain daring yang hanya dapat dimainkan gratis yang dikembangkan oleh Bungie. Ini awalnya dirilis sebagai permainan berbayar pada tahun 2017 untuk PlayStation 4, Xbox One, dan Microsoft Windows', 'Bungie', '28 Agustus 2017', 'Free'),
	(14, 'Outlast', 'HORROR', 'Hidup lebih lama dr adalah video game horor bertahan hidup orang pertama tahun 2013 yang dikembangkan dan diterbitkan oleh Red Barrels . Gim ini berkisah tentang jurnalis investigasi lepas, Miles Upshur, yang memutuskan untuk menyelidiki rumah sakit jiwa ', 'Red Barrels', '4 Sep 2013', '200000'),
	(15, 'Paladins', 'FPS', 'Paladins: Champions of the Realm adalah game video penembak pahlawan online gratis untuk dimainkan tahun 2016 oleh Hi-Rez. Gim ini dikembangkan oleh Evil Mojo, sebuah studio internal Hi-Rez dan dirilis pada 16 September 2016 untuk Microsoft Windows, PlayS', 'Hi Rez Studios', '16 September 2016', 'Free'),
	(16, 'Phasmophobia', 'HORROR', 'Phasmophobia adalah game horor investigasi yang dikembangkan dan diterbitkan oleh studio game indie Inggris, Kinetic Games. Ini terutama didasarkan pada hobi berburu hantu yang populer. Gim ini tersedia dalam akses awal melalui Steam untuk Microsoft Windo', 'Kinetic Games', '18 September 2020', '200000'),
	(17, 'Point Blank', 'FPS', 'Point Blank adalah permainan video penembak orang pertama yang dikembangkan oleh perusahaan Korea Selatan Zepetto untuk Microsoft Windows.', 'Zepetto', '17 Oktober 2008', 'Free'),
	(18, 'Resident Evil Village', 'HORROR', 'Resident Evil Village adalah game horor bertahan hidup 2021 yang dikembangkan dan diterbitkan oleh Capcom. Ini adalah sekuel dari Resident Evil 7: Biohazard. Pemain mengontrol Ethan Winters, yang mencari putrinya yang diculik di desa yang dipenuhi makhluk', 'Capcom', '2 Mei 2021', '200000'),
	(19, 'The Forest', 'HORROR', 'The Forest adalah video game horor bertahan hidup yang dikembangkan dan diterbitkan oleh Endnight Games. Permainan berlangsung di semenanjung berhutan lebat terpencil, di mana karakter pemain Eric LeBlanc harus melawan monster kanibal saat mencari putrany', 'Endnight Games', '30 Mei 2014', '200000'),
	(20, 'Smite', 'MOBA', 'Smite adalah permainan video arena pertempuran online multipemain orang ketiga gratis untuk dimainkan tahun 2014 yang dikembangkan dan diterbitkan oleh Hi-Rez Studios untuk Microsoft Windows, Xbox One, PlayStation 4, dan Nintendo Switch, dan Amazon Luna.', 'Hi Rez Studio', '25 Maret 2014', 'Free'),
	(21, 'The Witcher 3 Wild Hunt', 'RPG', 'The Witcher 3: Wild Hunt adalah game role-playing tahun 2015 yang dikembangkan dan diterbitkan oleh CD Projekt. Ini adalah sekuel dari game 2011 The Witcher 2: Assassins of Kings dan game ketiga dalam seri video game The Witcher, dimainkan di dunia terbuk', 'CD Projekt RED', '18 Mei 2015', '500000'),
	(22, 'Undertale', 'HORROR', 'Undertale adalah permainan video permainan peran 2D tahun 2015 yang dibuat oleh pengembang indie Amerika Toby Fox. Pemain mengontrol seorang anak yang jatuh ke Bawah Tanah: wilayah besar dan terpencil di bawah permukaan Bumi, dipisahkan oleh penghalang ma', 'Toby Fox', '15 September 2015', '120000'),
	(23, 'Valorant', 'FPS', 'Valorant adalah penembak pahlawan taktis orang pertama gratis yang dikembangkan dan diterbitkan oleh Riot Games, untuk Microsoft Windows. Digoda dengan nama kode Proyek A pada Oktober 2019, game ini memulai periode beta tertutup dengan akses terbatas pada', 'Riot Games', '2 Juni 2020', 'Free');

-- Dumping data for table stunt.user: ~0 rows (approximately)
INSERT INTO `user` (`id`, `username`, `password`, `type`) VALUES
	(1, 'marsel', 'e10adc3949ba59abbe56e057f20f883e', 'user'),
	(2, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin');

-- Dumping data for table stunt.usercart: ~2 rows (approximately)
INSERT INTO `usercart` (`id`, `id_user`, `id_game`, `status`) VALUES
	(1, '1', '15', 2),
	(9, '1', '7', 0),
	(11, '1', '18', 0),
	(12, '1', '18', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
