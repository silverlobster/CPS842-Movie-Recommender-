-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 01:03 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cps842`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_id` int(4) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `genre` varchar(128) DEFAULT NULL,
  `summary` varchar(256) DEFAULT NULL,
  `studio` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `title`, `genre`, `summary`, `studio`) VALUES
(1, 'Gintama: The Final', 'Action, Comedy, Drama, Sci-Fi', 'Two years have passed following the Tendoshuus invasion of the O-Edo Central Terminal. Since then, the Yorozuya have gone their separate ways.', 'Bandai Namco Pictures'),
(2, 'A Silent Voice', 'Award Winning, Drama', 'As a wild youth, elementary school student Shouya Ishida sought to beat boredom in the cruelest ways.', 'Kyoto Animation'),
(3, 'Gintama: The Movie: The Final Chapter: Be Forever Yorozuya', 'Action, Comedy, Sci-Fi', 'When Gintoki apprehends a movie pirate at a premiere, he checks the cameras footage and finds himself transported to a bleak, post-apocalyptic version of Edo, where a mysterious epidemic called the White Plague has ravished the worlds population.', 'Sunrise'),
(4, 'Violet Evergarden: The Movie', 'Award Winning, Drama, Fantasy', 'Several years have passed since the end of The Great War.', 'Kyoto Animation'),
(5, 'Your Name.', 'Award Winning, Drama, Supernatural', 'Mitsuha Miyamizu, a high school girl, yearns to live the life of a boy in the bustling city of Tokyo—a dream that stands in stark contrast to her present life in the countryside.', 'CoMix Wave Films'),
(6, 'Kaguya-sama: Love is War - The First Kiss That Never Ends', 'Comedy, Drama, Romance', 'After their first kiss, Kaguya Shinomiya and Miyuki Shirogane are left unsure where their relationship stands.', 'A-1 Pictures'),
(7, 'The First Slam Dunk', 'Award Winning, Sports', 'Shohokus speedster and point guard, Ryouta Miyagi, always plays with brains and lightning speed, running circles around his opponents while feigning composure.', 'Toei Animation'),
(8, 'Kizumonogatari Part 3: Cold-Blooded', 'Action, Mystery, Supernatural', 'After helping revive the legendary vampire Kiss-shot Acerola-orion Heart-under-blade, Koyomi Araragi has become a vampire himself and her servant.', 'Shaft'),
(9, 'Spirited Away', 'Adventure, Award Winning, Supernatural', 'Stubborn, spoiled, and naïve, 10-year-old Chihiro Ogino is less than pleased when she and her parents discover an abandoned amusement park on the way to their new house.', 'Studio Ghibli'),
(10, 'Princess Mononoke', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(11, 'Fate/stay night: Heavens Feel III. Spring Song', 'Action, Fantasy, Supernatural', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(12, 'Howls Moving Castle', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(13, 'Evangelion: 3.0+1.0 Thrice Upon a Time', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(14, 'Made in Abyss: Dawn of the Deep Soul', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(15, 'The Disappearance of Haruhi Suzumiya', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(16, 'Demon Slayer: Kimetsu no Yaiba - The Movie: Mugen Train', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(17, 'Rascal Does Not Dream of a Dreaming Girl', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(18, 'Mushishi Zoku Shou: Suzu no Shizuku', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(19, 'Kizumonogatari Part 2: Hot-Blooded', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(20, 'Wolf Children', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(21, 'Gurren Lagann The Movie: The Lights in the Sky are Stars', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(22, 'Wolf Children', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(23, 'I Want To Eat Your Pancreas', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(24, 'Neon Genesis Evangelion: The End of Evangelion', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(25, 'Revue Starlight: The Movie', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(26, 'Perfect Blue', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(27, 'The Garden of Sinners Chapter 5: Paradox Spiral', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(28, 'Gintama: The Movie', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(29, 'Grave of the Fireflies', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(30, 'Teasing Master Takagi-san: The Movie', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(31, 'Fate/stay night: Heavens Feel  II. Lost Butterfly', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(32, 'Puella Magi Madoka Magica the Movie: Rebellion', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(33, 'Jujutsu Kaisen 0', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(34, 'Steins;Gate: The Movie - Load Region of Déjà Vu', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(35, 'Yuru Camp Movie', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(36, 'KonoSuba: Gods Blessing on This Wonderful World! - Legend of Crimson', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(37, 'Saekano the Movie: Finale', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(38, 'Gintama: Yorinuki Gintama-san on Theater 2D', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(39, 'Fruits Basket: Prelude', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(40, 'Natsume Yujin-cho the Movie: Ephemeral Bond', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(41, 'Violet Evergarden: Eternity and the Auto Memory Doll', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(42, 'Josee, the Tiger and the Fish', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(43, 'Maquia: When the Promised Flower Blooms', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(44, 'The Garden of Sinners Chapter 7: A Study in Murder - Part 2', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(45, 'Cowboy Bebop: The Movie', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(46, 'Made in Abyss: Wandering Twilight', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(47, 'Puella Magi Madoka Magica the Movie Part 2: Eternal', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(48, 'Nausicaä of the Valley of the Wind', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(49, 'Kizumonogatari Part 1: Iron-Blooded', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(50, 'Suzume', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(51, 'K-ON! The Movie', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(52, 'Ramayana: The Legend of Prince Rama', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli'),
(53, 'Sasaki and Miyano: Graduation', 'Action, Adventure, Award Winning, Fantasy', 'When an Emishi village is attacked by a fierce demon boar, the young prince Ashitaka puts his life at stake to defend his tribe. With its dying breath, the beast curses the princes arm, granting him demonic powers while gradually siphoning his life away.', 'Studio Ghibli');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(4) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `movie_id` int(4) DEFAULT NULL,
  `ratings` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating_id`, `user_id`, `movie_id`, `ratings`) VALUES
(1, 6, 1, 3),
(2, 6, 2, 2),
(3, 6, 3, 5),
(4, 6, 4, 4),
(5, 6, 5, 4),
(6, 7, 1, 4),
(7, 7, 2, 5),
(8, 7, 3, 2),
(9, 7, 5, 1),
(10, 8, 2, 3),
(11, 8, 3, 4),
(12, 8, 4, 4),
(13, 8, 5, 5),
(14, 9, 1, 4),
(15, 9, 2, 5),
(16, 9, 3, 3),
(17, 9, 4, 5),
(18, 9, 5, 4),
(19, 10, 1, 5),
(20, 10, 2, 5),
(21, 10, 3, 3),
(22, 10, 4, 3),
(23, 3, 6, 9),
(24, 3, 7, 4),
(25, 3, 8, 5),
(26, 3, 10, 7),
(27, 3, 11, 9),
(28, 3, 12, 3),
(29, 3, 13, 9),
(30, 3, 14, 0),
(31, 3, 15, 10),
(32, 3, 16, 2),
(33, 3, 19, 8),
(34, 3, 20, 2),
(35, 3, 21, 10),
(36, 3, 22, 8),
(37, 3, 23, 2),
(38, 3, 24, 7),
(39, 3, 26, 1),
(40, 3, 27, 1),
(41, 3, 29, 10),
(42, 3, 30, 3),
(43, 3, 31, 5),
(44, 3, 32, 0),
(45, 3, 33, 1),
(46, 3, 34, 4),
(47, 3, 35, 7),
(48, 3, 36, 10),
(49, 3, 37, 1),
(50, 3, 38, 6),
(51, 3, 39, 1),
(52, 3, 40, 10),
(53, 3, 41, 7),
(54, 3, 42, 7),
(55, 3, 43, 3),
(56, 3, 44, 0),
(57, 3, 45, 9),
(58, 3, 46, 7),
(59, 3, 47, 2),
(60, 3, 48, 10),
(61, 3, 49, 2),
(62, 3, 50, 6),
(63, 3, 51, 0),
(64, 3, 52, 7),
(65, 3, 53, 6),
(66, 4, 6, 6),
(67, 4, 7, 10),
(68, 4, 9, 3),
(69, 4, 10, 4),
(70, 4, 11, 8),
(71, 4, 12, 7),
(72, 4, 13, 10),
(73, 4, 14, 2),
(74, 4, 15, 3),
(75, 4, 16, 8),
(76, 4, 17, 1),
(77, 4, 18, 3),
(78, 4, 19, 7),
(79, 4, 20, 0),
(80, 4, 21, 5),
(81, 4, 22, 10),
(82, 4, 23, 1),
(83, 4, 24, 10),
(84, 4, 25, 9),
(85, 4, 27, 2),
(86, 4, 28, 9),
(87, 4, 29, 10),
(88, 4, 31, 0),
(89, 4, 34, 6),
(90, 4, 35, 9),
(91, 4, 36, 4),
(92, 4, 37, 1),
(93, 4, 38, 8),
(94, 4, 39, 10),
(95, 4, 40, 2),
(96, 4, 41, 7),
(97, 4, 42, 4),
(98, 4, 43, 3),
(99, 4, 44, 7),
(100, 4, 45, 6),
(101, 4, 46, 9),
(102, 4, 47, 4),
(103, 4, 48, 1),
(104, 4, 49, 9),
(105, 4, 50, 2),
(106, 4, 51, 6),
(107, 4, 52, 3),
(108, 4, 53, 1),
(109, 5, 6, 0),
(110, 5, 7, 9),
(111, 5, 8, 6),
(112, 5, 9, 8),
(113, 5, 10, 1),
(114, 5, 11, 3),
(115, 5, 12, 7),
(116, 5, 13, 2),
(117, 5, 14, 3),
(118, 5, 15, 6),
(119, 5, 16, 7),
(120, 5, 17, 3),
(121, 5, 18, 2),
(122, 5, 19, 8),
(123, 5, 20, 7),
(124, 5, 21, 0),
(125, 5, 23, 7),
(126, 5, 24, 3),
(127, 5, 25, 3),
(128, 5, 26, 3),
(129, 5, 27, 1),
(130, 5, 28, 10),
(131, 5, 29, 10),
(132, 5, 30, 4),
(133, 5, 31, 3),
(134, 5, 34, 1),
(135, 5, 35, 10),
(136, 5, 36, 9),
(137, 5, 37, 6),
(138, 5, 38, 3),
(139, 5, 39, 4),
(140, 5, 40, 0),
(141, 5, 41, 6),
(142, 5, 42, 3),
(143, 5, 43, 1),
(144, 5, 44, 9),
(145, 5, 45, 10),
(146, 5, 46, 1),
(147, 5, 47, 2),
(148, 5, 48, 4),
(149, 5, 49, 4),
(150, 5, 50, 9),
(151, 5, 51, 0),
(152, 5, 52, 1),
(153, 5, 53, 7),
(154, 11, 6, 1),
(155, 11, 7, 5),
(156, 11, 8, 7),
(157, 11, 9, 7),
(158, 11, 10, 2),
(159, 11, 12, 1),
(160, 11, 13, 3),
(161, 11, 14, 9),
(162, 11, 16, 3),
(163, 11, 17, 4),
(164, 11, 20, 7),
(165, 11, 21, 8),
(166, 11, 23, 1),
(167, 11, 25, 0),
(168, 11, 26, 8),
(169, 11, 27, 10),
(170, 11, 28, 9),
(171, 11, 29, 1),
(172, 11, 30, 3),
(173, 11, 31, 1),
(174, 11, 33, 10),
(175, 11, 34, 7),
(176, 11, 35, 2),
(177, 11, 38, 7),
(178, 11, 39, 8),
(179, 11, 40, 4),
(180, 11, 41, 4),
(181, 11, 43, 4),
(182, 11, 44, 5),
(183, 11, 45, 6),
(184, 11, 46, 3),
(185, 11, 47, 5),
(186, 11, 48, 4),
(187, 11, 49, 6),
(188, 11, 50, 0),
(189, 11, 51, 5),
(190, 11, 52, 7),
(191, 11, 53, 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(128) DEFAULT NULL,
  `user_password` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`) VALUES
(3, 'Xing', 'Hi'),
(4, 'Admin', 'test'),
(5, 'stanley', 'hi'),
(6, 'Alice', 'hi'),
(7, 'Bob', 'hi'),
(8, 'Cindy', 'hi'),
(9, 'David', 'hi'),
(10, 'Steve', 'hi'),
(11, 'Jason', 'Chicken');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
