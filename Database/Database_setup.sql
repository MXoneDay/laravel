-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Gegenereerd op: 17 sep 2020 om 16:50
-- Serverversie: 5.6.37
-- PHP-versie: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `characters`
--

CREATE TABLE IF NOT EXISTS `characters` (
  `id` int(11) NOT NULL,
  `firstname` int(11) NOT NULL,
  `lastname` int(11) NOT NULL,
  `race_number` int(11) NOT NULL,
  `img_dir` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `drivers`
--

CREATE TABLE IF NOT EXISTS `drivers` (
  `driver_number` tinyint(3) unsigned NOT NULL,
  `user_id` tinyint(3) unsigned NOT NULL,
  `team_id` tinyint(3) unsigned NOT NULL,
  `firstname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_dir` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `drivers`
--

INSERT INTO `drivers` (`driver_number`, `user_id`, `team_id`, `firstname`, `lastname`, `img_dir`) VALUES
(2, 3, 7, 'Demi', 'Kwant', './img/drivers/13.png'),
(9, 4, 6, 'Tim', 'van der Veen', './img/drivers/11.png'),
(12, 1, 1, 'Mark', 'van der Molen', './img/drivers/2.png'),
(13, 5, 9, 'Pieter', 'Hofkamp', './img/drivers/18.png'),
(21, 2, 1, 'Marco', 'Radelaar', './img/drivers/1.png'),
(22, 6, 10, 'Aart', 'van Werven', './img/drivers/20.png'),
(24, 7, 4, 'Nick', 'Kuiper', './img/drivers/7.png'),
(25, 8, 5, 'Emiel', 'de Vries', './img/drivers/9.png'),
(27, 9, 3, 'Jesse', 'de Vries', './img/drivers/5.png'),
(46, 10, 6, 'Frans-Jan', 'Roffel', './img/drivers/12.png'),
(66, 11, 7, 'Derk Jan', 'Speelman', './img/drivers/14.png'),
(69, 12, 10, 'Jordi', 'Zandhuis', './img/drivers/19.png'),
(73, 13, 2, 'Gerko', 'Geertsema', './img/drivers/3.png'),
(76, 14, 5, 'Jur', 'de Vries', './img/drivers/10.png'),
(83, 20, 11, 'Bram', 'Tiesinga', './img/drivers/20.png'),
(85, 21, 11, 'René', 'Vrieling', './img/drivers/20.png'),
(88, 15, 4, 'Jochum', 'Boer', './img/drivers/8.png'),
(93, 16, 9, 'Dennis', 'Vrieling', './img/drivers/17.png'),
(94, 17, 8, 'Nick', 'van der Meij', './img/drivers/16.png'),
(95, 18, 3, 'Dennis', 'Smit', './img/drivers/6.png'),
(96, 19, 8, 'Lorenzo', 'Buist', './img/drivers/15.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_07_15_122813_create_teams_table', 1),
(4, '2020_07_16_205522_create_drivers_table', 1),
(5, '2020_07_16_205613_create_races_table', 1),
(6, '2020_07_16_205634_create_results_table', 1),
(7, '2020_07_22_153108_create_penalties_table', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `penalties`
--

CREATE TABLE IF NOT EXISTS `penalties` (
  `id` tinyint(3) unsigned NOT NULL,
  `race_id` tinyint(3) unsigned NOT NULL,
  `driver_number` tinyint(3) unsigned NOT NULL,
  `warning` tinyint(4) NOT NULL,
  `licence_points` tinyint(4) NOT NULL,
  `incident` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `penalties`
--

INSERT INTO `penalties` (`id`, `race_id`, `driver_number`, `warning`, `licence_points`, `incident`, `notes`) VALUES
(1, 1, 69, 1, 0, 'Australië Incident A', 'Één Waarschuwing'),
(2, 1, 93, 0, 0, 'Australië Incident A', 'No Further Action'),
(3, 2, 88, 0, 1, 'Bahrain Incident A', 'Één Licentiepunt'),
(4, 2, 94, 1, 0, 'Bahrain Incident B', 'Één Waarschuwing'),
(5, 2, 93, 1, 0, 'Bahrain Incident C', 'Één Waarschuwing'),
(6, 2, 27, 1, 0, 'Bahrain Incident D', 'Één Waarschuwing'),
(7, 2, 96, 0, 0, 'Bahrain Incident E1', 'Één drie seconden tijdstraf'),
(8, 2, 21, 1, 0, 'Bahrain Incident E2', 'Één Waarschuwing'),
(9, 3, 13, 0, 1, 'Vietnam Incident A', 'Één Licentiepunt'),
(10, 3, 69, 0, 0, 'Vietnam Incident B', 'No Further Action'),
(11, 3, 13, 1, 0, 'Vietnam Incident C', 'Één Waarschuwing'),
(12, 3, 27, 1, 0, 'Vietnam Incident D', 'Één Waarschuwing'),
(13, 4, 46, 0, 0, 'China Incident A', 'No Further Action'),
(14, 4, 24, 0, 0, 'China Incident B', 'No Further Action'),
(15, 4, 73, 0, 0, 'China Incident C', '- 10 Seconden'),
(16, 4, 9, 0, 0, 'China Incident D', '- 10 Seconden'),
(17, 4, 24, 0, 0, 'China Incident E', 'No Further Action'),
(18, 4, 27, 0, 0, 'China Incident F', '- 5 Seconden'),
(19, 4, 27, 0, 0, 'China Incident G', '- 5 Seconden'),
(20, 4, 12, 0, 0, 'China Incident H', '- 10 Seconden'),
(21, 4, 9, 0, 0, 'China Incident I', 'No Further Action'),
(22, 4, 83, 0, 0, 'China Incident J', 'Één Strafpunt'),
(23, 4, 24, 0, 0, 'China Incident K', 'No Further Action'),
(24, 4, 94, 1, 0, 'China Incident L1', 'Éen Waarschuwing'),
(25, 4, 94, 0, 0, 'China Incident L2', 'Éen Strafpunt'),
(26, 4, 12, 1, 0, 'China Incident L2-1', 'Éen Waarschuwing');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `races`
--

CREATE TABLE IF NOT EXISTS `races` (
  `id` tinyint(3) unsigned NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `img_dir` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `track_dir` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `races`
--

INSERT INTO `races` (`id`, `name`, `code`, `date`, `img_dir`, `track_dir`) VALUES
(1, 'Australian Grand Prix', 'AUS', '2020-08-09 20:30:00', './img/flags/australia.jpg', './img/track_layout/AUS.png'),
(2, 'Bahrain Grand Prix', 'BAH', '2020-08-16 20:30:00', './img/flags/bahrain.jpg', './img/track_layout/BAH.png'),
(3, 'Vietnam Grand Prix', 'VIE', '2020-08-23 20:30:00', './img/vlags/vietnam.jpg', './img/track_layout/VIE.png'),
(4, 'Chinese Grand Prix', 'CHI', '2020-08-30 20:30:00', './img/flags/china.jpg', './img/track_layout/CHI.png'),
(5, 'Dutch Grand Prix', 'NED', '2020-09-06 20:30:00', './img/vlags/dutch.jpg', './img/track_layout/NED.png'),
(6, 'Spanish Grand Prix', 'SPA', '2020-09-13 20:30:00', './img/flags/spain.jpg', './img/track_layout/SPA.png'),
(7, 'Monaco Grand Prix', 'MON', '2020-09-20 20:30:00', './img/flags/monaco.jpg', './img/track_layout/MON.png'),
(8, 'Azerbaijan Grand Prix', 'AZE', '2020-09-27 20:30:00', './img/flags/azerbaijan.jpg', './img/track_layout/AZE.png'),
(9, 'Canadian Grand Prix', 'CAN', '2020-10-04 20:30:00', './img/flags/canada.jpg', './img/track_layout/CAN.png'),
(10, 'French Grand Prix', 'FRA', '2020-10-11 20:30:00', './img/flags/french.jpg', './img/track_layout/FRA.png'),
(11, 'Austrian Grand Prix', 'OOS', '2020-10-18 20:30:00', './img/flags/austria.jpg', './img/track_layout/OOS.png'),
(12, 'British Grand Prix', 'GBR', '2020-10-25 20:30:00', './img/flags/GBR.jpg', './img/track_layout/GBR.png'),
(13, 'Hungarian Grand Prix', 'HON', '2020-11-01 20:30:00', './img/flags/hungary.jpg', './img/track_layout/HON.png'),
(14, 'Belgian Grand Prix', 'BEL', '2020-11-08 20:30:00', './img/flags/belgium.jpg', './img/track_layout/BEL.png'),
(15, 'Italian Grand Prix', 'ITA', '2020-11-15 20:30:00', './img/flags/italy.jpg', './img/track_layout/ITA.png'),
(16, 'Singapore Grand Prix', 'SIN', '2020-11-22 20:30:00', './img/flags/singapore.jpg', './img/track_layout/SIN.png'),
(17, 'Russian Grand Prix', 'RUS', '2020-11-29 20:30:00', './img/flags/russia.jpg', './img/track_layout/RUS.png'),
(18, 'Japanese Grand Prix', 'JPN', '2020-12-06 20:30:00', './img/flags/japan.jpg', './img/track_layout/JPN.png'),
(19, 'Mexican Grand Prix', 'MEX', '2020-12-13 20:30:00', './img/flags/mexico.jpg', './img/track_layout/MEX.png'),
(20, 'United States Grand Prix', 'USA', '2020-12-20 20:30:00', './img/flags/usa.jpg', './img/track_layout/USA.png'),
(21, 'Brazilian Grand Prix', 'BRA', '2020-12-27 20:30:00', './img/flags/brazil.jpg', './img/track_layout/BRA.png'),
(22, 'Abu Dhabi Grand Prix', 'ABU', '2021-01-03 20:30:00', './img/flags/abu_dhabi.jpg', './img/track_layout/ABU.png');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `id` tinyint(3) unsigned NOT NULL,
  `race_id` tinyint(3) unsigned NOT NULL,
  `number` tinyint(3) unsigned NOT NULL,
  `team_id` tinyint(3) unsigned NOT NULL,
  `grid` tinyint(4) NOT NULL,
  `place` tinyint(4) NOT NULL,
  `time` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fastest_lap_time` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fastest_lap` tinyint(1) NOT NULL,
  `status` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `points` tinyint(4) NOT NULL,
  `bonus_points` tinyint(4) NOT NULL,
  `penalty_points` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `results`
--

INSERT INTO `results` (`id`, `race_id`, `number`, `team_id`, `grid`, `place`, `time`, `fastest_lap_time`, `fastest_lap`, `status`, `type`, `points`, `bonus_points`, `penalty_points`) VALUES
(1, 1, 2, 7, 1, 1, '43:39.597', '1:24.992', 0, 'FIN', 1, 25, 0, 0),
(2, 1, 21, 1, 3, 2, '+ 9.473', '1:24.858', 0, 'FIN', 1, 18, 0, 0),
(3, 1, 95, 3, 5, 3, '+ 18.807', '1:25.347', 0, 'FIN', 1, 15, 0, 0),
(4, 1, 12, 1, 4, 4, '+ 35.224', '1:26.320', 0, 'FIN', 1, 12, 0, 0),
(5, 1, 24, 4, 9, 5, '+ 37.398', '1:26.473', 0, 'FIN', 1, 10, 0, 0),
(6, 1, 27, 3, 2, 6, '+ 44.907', '1:24.522', 0, 'FIN', 1, 8, 0, 0),
(7, 1, 69, 10, 14, 7, '+ 46.165', '1:24.099', 1, 'FIN', 1, 6, 1, 0),
(8, 1, 66, 7, 7, 8, '+ 1:06.398', '1:26.493', 0, 'FIN', 1, 4, 0, 0),
(9, 1, 13, 9, 11, 9, '+ 1 Lap', '1:24.781', 0, 'FIN', 1, 2, 0, 0),
(10, 1, 46, 6, 10, 10, '+ 1 Lap', '1:27.360', 0, 'FIN', 1, 1, 0, 0),
(11, 1, 76, 5, 8, 11, 'DNF', '1:27.379', 0, 'DNF', 1, 0, 0, 0),
(12, 1, 22, 10, 15, 12, 'DNF', '1:28.346', 0, 'DNF', 1, 0, 0, 0),
(13, 1, 94, 2, 12, 13, 'DNF', '1:49.821', 0, 'DNF', 1, 0, 0, 0),
(14, 1, 93, 9, 6, 14, 'DNF', '1:35.599', 0, 'DNF', 1, 0, 0, 0),
(15, 1, 88, 4, 13, 15, 'DNF', '1:34.444', 0, 'DNF', 1, 0, 0, 0),
(16, 2, 27, 3, 10, 1, '49:11.082', '1:30.318', 0, 'FIN', 1, 25, 0, 0),
(17, 2, 21, 1, 2, 3, '+ 3.243', '1:29.670', 1, 'FIN', 1, 18, 1, 0),
(18, 2, 96, 8, 3, 2, '+ 6.074', '1:29.852', 0, 'FIN', 1, 15, 0, 0),
(19, 2, 2, 7, 1, 4, '+ 11.665', '1:30.504', 0, 'FIN', 1, 12, 0, 0),
(20, 2, 12, 1, 4, 5, '+ 13.994', '1:30.984', 0, 'FIN', 1, 10, 0, 0),
(21, 2, 66, 7, 7, 6, '+ 15.288', '1:31.048', 0, 'FIN', 1, 8, 0, 0),
(22, 2, 9, 6, 9, 7, '+ 15.668', '1:31.305', 0, 'FIN', 1, 6, 0, 0),
(23, 2, 13, 9, 11, 8, '+ 22.569', '1:31.327', 0, 'FIN', 1, 4, 0, 0),
(24, 2, 22, 10, 12, 9, '+ 29.913', '1:32.187', 0, 'FIN', 1, 2, 0, 0),
(25, 2, 94, 8, 5, 10, '+ 33.427', '1:31.245', 0, 'FIN', 1, 1, 0, 0),
(26, 2, 46, 6, 13, 11, '+ 41.184', '1:30.888', 0, 'FIN', 1, 0, 0, 0),
(27, 2, 24, 4, 14, 12, '+ 49.440', '1:31.788', 0, 'FIN', 1, 0, 0, 0),
(28, 2, 93, 9, 15, 13, '+ 58.084', '1:31.892', 0, 'FIN', 1, 0, 0, 0),
(29, 2, 95, 3, 6, 14, 'DNF', '1:31.380', 0, 'DNF', 1, 0, 0, 0),
(30, 2, 69, 10, 8, 15, 'DNF', 'X', 0, 'DNF', 1, 0, 0, 0),
(31, 2, 88, 4, 16, 16, 'DNF', 'X', 0, 'DNF', 1, 0, 0, 0),
(32, 3, 21, 1, 2, 1, '49:45.613', '1:39.774', 0, 'FIN', 1, 25, 0, 0),
(33, 3, 2, 7, 1, 2, '+ 3.164', '1:37.865', 0, 'FIN', 1, 18, 0, 0),
(34, 3, 94, 8, 4, 3, '+ 23.744', '1:40.002', 0, 'FIN', 1, 15, 0, 0),
(35, 3, 66, 7, 5, 4, '+ 26.790', '1:37.794', 1, 'FIN', 1, 12, 1, 0),
(36, 3, 9, 6, 7, 5, '+ 31.648', '1:39.687', 0, 'FIN', 1, 10, 0, 0),
(37, 3, 96, 8, 3, 6, '+ 37.101', '1:38.566', 0, 'FIN', 1, 8, 0, 0),
(38, 3, 12, 1, 11, 7, '+ 43.164', '1:40.601', 0, 'FIN', 1, 6, 0, 0),
(39, 3, 76, 5, 13, 8, '+ 58.465', '1:40.071', 0, 'FIN', 1, 4, 0, 0),
(40, 3, 93, 9, 12, 9, '+ 1:08.435', '1:41.008', 0, 'FIN', 1, 2, 0, 0),
(41, 3, 69, 10, 9, 10, '+ 1 Lap', '1:39.213', 0, 'FIN', 1, 1, 0, 0),
(42, 3, 24, 4, 8, 11, '+ 1 Lap', 'Time Bugg', 0, 'FIN', 1, 0, 0, 0),
(43, 3, 13, 9, 14, 12, 'DNF', '1:40.847', 0, 'DNF', 1, 0, 0, 0),
(44, 3, 27, 3, 6, 13, 'DNF', '1:40.317', 0, 'DNF', 1, 0, 0, 0),
(45, 3, 85, 2, 10, 14, 'DNF', '1:42.128', 0, 'DNF', 1, 0, 0, 0),
(46, 4, 21, 1, 1, 1, '48:46.595', '1:33.962', 1, 'FIN', 1, 25, 1, 0),
(47, 4, 2, 7, 2, 2, '+ 1.872', '1:35.087', 0, 'FIN', 1, 18, 0, 0),
(48, 4, 27, 3, 4, 3, '+ 5.347', '1:35.254', 0, 'FIN', 1, 15, 0, 0),
(49, 4, 66, 7, 8, 4, '+ 8.493', '1:36.072', 0, 'FIN', 1, 12, 0, 0),
(50, 4, 12, 1, 7, 5, '+ 12.569', '1:35.190', 0, 'FIN', 1, 10, 0, 0),
(51, 4, 9, 6, 11, 6, '+ 13.519', '1:36.850', 0, 'FIN', 1, 8, 0, 0),
(52, 4, 96, 8, 3, 7, '+ 15.347', '1:34.082', 0, 'FIN', 1, 6, 0, 0),
(53, 4, 73, 2, 5, 8, '+ 18.161', '1:34.962', 0, 'FIN', 1, 4, 0, 0),
(54, 4, 22, 10, 18, 9, '+ 21.239', '1:35.999', 0, 'FIN', 1, 2, 0, 0),
(55, 4, 69, 10, 6, 10, '+ 32.866', '1:35.904', 0, 'FIN', 1, 1, 0, 0),
(56, 4, 76, 5, 12, 11, '+ 34.057', '1:34.806', 0, 'FIN', 1, 0, 0, 0),
(57, 4, 93, 9, 14, 12, '+ 34.964', '1:37.324', 0, 'FIN', 1, 0, 0, 0),
(58, 4, 25, 5, 10, 13, '+ 36.275', '1:36.724', 0, 'FIN', 1, 0, 0, 0),
(59, 4, 94, 8, 13, 14, '+ 41.733', '1:36.103', 0, 'FIN', 1, 0, 0, 1),
(60, 4, 46, 6, 16, 15, '+ 1 Lap', '1:37.973', 0, 'FIN', 1, 0, 0, 0),
(61, 4, 88, 4, 20, 16, '+ 1 Lap', '1:38.768', 0, 'FIN', 1, 0, 0, 0),
(62, 4, 13, 9, 17, 17, '+ 2 Laps', '1:37.762', 0, 'FIN', 1, 0, 0, 0),
(63, 4, 83, 2, 19, 18, '+ 2 Laps', '1:38.295', 0, 'FIN', 1, 0, 0, 1),
(64, 4, 24, 4, 9, 19, '+ 3 Laps', '1:36.623', 0, 'FIN', 1, 0, 0, 0),
(65, 4, 95, 3, 15, 20, 'DNF', '1:34.958', 0, 'DNF', 1, 0, 0, 0),
(66, 5, 2, 7, 2, 1, '44:14.049', '1:12.095', 0, 'FIN', 1, 25, 0, 0),
(67, 5, 96, 8, 7, 2, '+ 5.972', '1:11.980', 1, 'FIN', 1, 18, 1, 0),
(68, 5, 27, 3, 5, 3, '+ 18.367', '1:12.727', 0, 'FIN', 1, 15, 0, 0),
(69, 5, 21, 1, 3, 4, '+ 20.848', '1:13.067', 0, 'FIN', 1, 12, 0, 0),
(70, 5, 73, 2, 10, 5, '+ 32.606', '1:12.868', 0, 'FIN', 1, 10, 0, 0),
(71, 5, 94, 8, 6, 6, '+ 47.434', '1:12.975', 0, 'FIN', 1, 8, 0, 0),
(72, 5, 12, 1, 8, 7, '+ 51.680', '1:13.607', 0, 'FIN', 1, 6, 0, 0),
(73, 5, 95, 3, 4, 8, '+ 1:00.407', '1:12.803', 0, 'FIN', 1, 4, 0, 0),
(74, 5, 66, 7, 9, 9, '+ 1:04.820', '1:13.718', 0, 'FIN', 1, 2, 0, 0),
(75, 5, 22, 10, 12, 10, '+ 1:25.940', '1:13.519', 0, 'FIN', 1, 1, 0, 0),
(76, 5, 24, 4, 14, 11, '+ 1 Lap', '1:13.527', 0, 'FIN', 1, 0, 0, 0),
(77, 5, 13, 9, 15, 12, '+ 1 Lap', '1:13.803', 0, 'FIN', 1, 0, 0, 0),
(78, 5, 69, 10, 1, 13, '+ 1 Lap', '1:12.800', 0, 'FIN', 1, 0, 0, 0),
(79, 5, 76, 5, 11, 14, '+ 1 Lap', '1:13.371', 0, 'FIN', 1, 0, 0, 0),
(80, 5, 93, 9, 16, 15, '+ 2 Laps', '1:14.099', 0, 'FIN', 1, 0, 0, 0),
(81, 5, 46, 6, 13, 16, '+ 2 Laps', '1:14.380', 0, 'FIN', 1, 0, 0, 0),
(82, 6, 27, 3, 8, 1, '44:36.555', '1:19.283', 0, 'FIN', 1, 25, 0, 0),
(83, 6, 73, 2, 7, 2, '+ 15.763', '1:18.959', 0, 'FIN', 1, 18, 0, 0),
(84, 6, 21, 1, 1, 3, '+ 19.514', '1:18.727', 0, 'FIN', 1, 15, 0, 0),
(85, 6, 12, 1, 9, 4, '+ 33.159', '1:19.169', 0, 'FIN', 1, 12, 0, 0),
(86, 6, 9, 6, 11, 5, '+ 35.006', '1:20.597', 0, 'FIN', 1, 10, 0, 0),
(87, 6, 95, 3, 5, 6, '+ 36.042', '1:19.657', 0, 'FIN', 1, 8, 0, 0),
(88, 6, 66, 7, 4, 7, '+ 38.855', '1:19.689', 0, 'FIN', 1, 6, 0, 0),
(89, 6, 2, 7, 2, 8, '+ 39.529', '1:17.633', 1, 'FIN', 1, 4, 1, 0),
(90, 6, 25, 5, 6, 9, '+ 50.895', '1:19.804', 0, 'FIN', 1, 2, 0, 0),
(91, 6, 69, 10, 10, 10, '+ 1:19.735', '1:19.339', 0, 'FIN', 1, 1, 0, 0),
(92, 6, 76, 5, 12, 11, '+ 1:25.302', '1:19.901', 0, 'FIN', 1, 0, 0, 0),
(93, 6, 93, 9, 16, 12, '+ 1:25.939', '1:19.462', 0, 'FIN', 1, 0, 0, 0),
(94, 6, 13, 9, 13, 13, '+ 1 Lap', '1:20.294', 0, 'FIN', 1, 0, 0, 0),
(95, 6, 22, 10, 14, 14, '+ 1 Lap', '1:20.348', 0, 'FIN', 1, 0, 0, 0),
(96, 6, 24, 4, 15, 15, '+ 4 Laps', '1:19.448', 0, 'FIN', 1, 0, 0, 0),
(97, 6, 88, 4, 17, 15, 'DNF', '1:23.802', 0, 'DNF', 1, 0, 0, 0),
(98, 6, 96, 8, 3, 16, 'DNF', '1:18.579', 0, 'DNF', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` tinyint(3) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `teams`
--

INSERT INTO `teams` (`id`, `name`, `color_code`) VALUES
(1, 'Mercedes', '0,210,190'),
(2, 'Red Bull Racing', '6,0,239'),
(3, 'Ferrari', '192,0,0'),
(4, 'Racing Point', '245,150,200'),
(5, 'Mclaren', '255,135,0'),
(6, 'Renault', '255,245,0'),
(7, 'AlphaTauri', '200,200,200'),
(8, 'Haas', '120,120,120'),
(9, 'Alfa Romeo Racing', '150,0,0'),
(10, 'Williams', '0,130,250'),
(11, 'Reserve', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_number`),
  ADD KEY `drivers_team_id_foreign` (`team_id`);

--
-- Indexen voor tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `penalties`
--
ALTER TABLE `penalties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penalties_race_id_foreign` (`race_id`),
  ADD KEY `penalties_driver_number_foreign` (`driver_number`);

--
-- Indexen voor tabel `races`
--
ALTER TABLE `races`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_race_id_foreign` (`race_id`),
  ADD KEY `results_number_foreign` (`number`),
  ADD KEY `results_team_id_foreign` (`team_id`);

--
-- Indexen voor tabel `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driver_number` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT voor een tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT voor een tabel `penalties`
--
ALTER TABLE `penalties`
  MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT voor een tabel `races`
--
ALTER TABLE `races`
  MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT voor een tabel `results`
--
ALTER TABLE `results`
  MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT voor een tabel `teams`
--
ALTER TABLE `teams`
  MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `drivers_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);

--
-- Beperkingen voor tabel `penalties`
--
ALTER TABLE `penalties`
  ADD CONSTRAINT `penalties_driver_number_foreign` FOREIGN KEY (`driver_number`) REFERENCES `drivers` (`driver_number`),
  ADD CONSTRAINT `penalties_race_id_foreign` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`);

--
-- Beperkingen voor tabel `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_number_foreign` FOREIGN KEY (`number`) REFERENCES `drivers` (`driver_number`),
  ADD CONSTRAINT `results_race_id_foreign` FOREIGN KEY (`race_id`) REFERENCES `races` (`id`),
  ADD CONSTRAINT `results_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
