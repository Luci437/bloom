-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 10:31 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloom`
--

-- --------------------------------------------------------

--
-- Table structure for table `addedgame`
--

CREATE TABLE `addedgame` (
  `id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addedgame`
--

INSERT INTO `addedgame` (`id`, `game_id`, `player_id`) VALUES
(344, 32, 2),
(345, 32, 3),
(346, 32, 4),
(347, 32, 5),
(348, 32, 6),
(350, 32, 8),
(351, 32, 10),
(353, 34, 4),
(354, 34, 3),
(355, 34, 8),
(356, 34, 2),
(357, 34, 7),
(358, 34, 9),
(359, 34, 10),
(360, 34, 5),
(361, 34, 11),
(362, 34, 6),
(394, 39, 3),
(395, 39, 4),
(397, 39, 6),
(399, 39, 8),
(400, 39, 10),
(402, 39, 5),
(403, 40, 3),
(404, 40, 4),
(405, 40, 5),
(406, 40, 6),
(407, 40, 8),
(408, 40, 10),
(410, 40, 2),
(411, 41, 2),
(412, 41, 4),
(413, 41, 10),
(416, 41, 3),
(418, 41, 7),
(420, 41, 6),
(421, 41, 8),
(422, 41, 5),
(423, 42, 2),
(424, 42, 3),
(425, 42, 4),
(426, 42, 5),
(427, 42, 6),
(430, 42, 10),
(432, 42, 8),
(433, 43, 2),
(434, 43, 3),
(435, 43, 4),
(436, 43, 5),
(437, 43, 6),
(438, 43, 7),
(439, 43, 8),
(440, 43, 9),
(441, 43, 10),
(446, 44, 2),
(447, 44, 8),
(449, 44, 3),
(453, 44, 7),
(454, 44, 9),
(455, 44, 4),
(456, 44, 10),
(457, 44, 11),
(458, 44, 6),
(459, 44, 5),
(460, 45, 2),
(461, 45, 3),
(462, 45, 4),
(463, 45, 5),
(464, 45, 6),
(465, 45, 8),
(466, 45, 10),
(469, 45, 9),
(487, 48, 2),
(488, 48, 3),
(497, 48, 8),
(498, 48, 5),
(500, 48, 10),
(501, 48, 6),
(503, 48, 13),
(512, 50, 13),
(513, 50, 8),
(514, 50, 9),
(515, 50, 10),
(516, 51, 10),
(517, 51, 5),
(518, 51, 4),
(519, 51, 9),
(520, 51, 8),
(521, 51, 3),
(522, 52, 4),
(523, 53, 4),
(524, 54, 4),
(525, 54, 9),
(526, 54, 3),
(527, 54, 8),
(528, 54, 7),
(529, 54, 2),
(530, 55, 4),
(531, 55, 9),
(532, 55, 3),
(533, 55, 8),
(534, 55, 11),
(535, 55, 5),
(536, 56, 4),
(537, 56, 3),
(538, 56, 2),
(539, 56, 8),
(540, 56, 9),
(541, 56, 10),
(542, 56, 5),
(543, 56, 7),
(544, 56, 11),
(545, 56, 6),
(555, 58, 2),
(556, 58, 3),
(557, 58, 5),
(558, 58, 6),
(559, 58, 8),
(560, 58, 9),
(561, 58, 10),
(562, 58, 4),
(563, 59, 4),
(564, 59, 9),
(565, 59, 3),
(566, 59, 5),
(567, 59, 10),
(568, 59, 8),
(569, 59, 7),
(570, 59, 2),
(572, 59, 6),
(573, 60, 4),
(574, 60, 3),
(575, 60, 2),
(576, 60, 7),
(577, 60, 9),
(578, 60, 10),
(579, 60, 5),
(580, 61, 2),
(581, 61, 7),
(582, 61, 3),
(583, 61, 9),
(584, 61, 10),
(585, 62, 4),
(586, 62, 9),
(587, 62, 8),
(588, 62, 3),
(589, 62, 2),
(590, 62, 7),
(591, 62, 10),
(592, 62, 5),
(593, 62, 6),
(594, 63, 2),
(595, 63, 3),
(596, 63, 4),
(598, 63, 6),
(600, 63, 8),
(602, 63, 10),
(603, 63, 5),
(604, 64, 2),
(605, 64, 3),
(606, 64, 4),
(608, 64, 6),
(609, 64, 8),
(610, 64, 10),
(611, 64, 7),
(612, 64, 5),
(613, 65, 3),
(614, 65, 4),
(615, 65, 5),
(616, 65, 6),
(617, 65, 10),
(618, 65, 9),
(619, 65, 8),
(620, 65, 7),
(621, 65, 2),
(622, 66, 6),
(623, 66, 5),
(624, 66, 4),
(625, 66, 2),
(626, 66, 7),
(627, 66, 10),
(628, 67, 4),
(629, 67, 3),
(630, 67, 2),
(631, 67, 10),
(637, 69, 4),
(638, 69, 3),
(639, 69, 2),
(640, 69, 5),
(641, 69, 6),
(642, 70, 2),
(644, 70, 4),
(646, 70, 6),
(647, 70, 8),
(648, 70, 10),
(649, 70, 9),
(651, 70, 7);

-- --------------------------------------------------------

--
-- Table structure for table `available_color`
--

CREATE TABLE `available_color` (
  `id` int(11) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available_color`
--

INSERT INTO `available_color` (`id`, `color`) VALUES
(1, 'red'),
(2, 'green'),
(3, 'yellow'),
(4, 'blue'),
(5, 'violet'),
(6, 'lime'),
(7, 'brown'),
(8, 'black'),
(9, 'orange'),
(10, 'white'),
(11, 'pink');

-- --------------------------------------------------------

--
-- Table structure for table `available_players`
--

CREATE TABLE `available_players` (
  `id` int(11) NOT NULL,
  `player_name` varchar(100) NOT NULL,
  `player_color` varchar(100) NOT NULL,
  `scores` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available_players`
--

INSERT INTO `available_players` (`id`, `player_name`, `player_color`, `scores`) VALUES
(2, 'dN', 'black', 0),
(3, '9 kumar', 'pink', 0),
(4, 'Thambi', 'lime', 0),
(5, 'kl05ar4921', 'blue', 0),
(6, 'stony', 'white', 0),
(7, 'alfee', 'blue', 0),
(8, 'renizvazha', 'red', 0),
(9, 'killerbean', 'green', 0),
(10, 'luci', 'yellow', 0),
(11, 'that guy', 'black', 0),
(12, 'Melbin', 'green', 0),
(13, 'manakunanjan', 'red', 0);

-- --------------------------------------------------------

--
-- Table structure for table `broadcast`
--

CREATE TABLE `broadcast` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `broadcast_message` varchar(200) NOT NULL,
  `message_date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `broadcast_seen_users`
--

CREATE TABLE `broadcast_seen_users` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `broad_id` int(11) NOT NULL,
  `broad_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forgotpassword`
--

CREATE TABLE `forgotpassword` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_date` varchar(20) NOT NULL,
  `token` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `group_type` varchar(10) NOT NULL,
  `group_gen_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `user_id`, `group_name`, `group_type`, `group_gen_id`) VALUES
(36, 37, 'Ashbin\'s Group', 'Private', '1LR7O'),
(76, 45, 'Mca 2020', 'Private', 'BXEQO'),
(77, 42, 'This is a test guys', 'Public', '7COSN');

-- --------------------------------------------------------

--
-- Table structure for table `joinedgroup`
--

CREATE TABLE `joinedgroup` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `joinedgroup`
--

INSERT INTO `joinedgroup` (`id`, `group_id`, `user_id`) VALUES
(45, 36, 37),
(349, 76, 45),
(353, 77, 42),
(354, 77, 25),
(355, 77, 37),
(356, 77, 22),
(357, 77, 20),
(358, 77, 29);

-- --------------------------------------------------------

--
-- Table structure for table `mvp`
--

CREATE TABLE `mvp` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `player_score` int(11) NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mvp`
--

INSERT INTO `mvp` (`id`, `player_id`, `player_score`, `game_id`) VALUES
(17, 8, 17, 32),
(19, 8, 23, 40),
(21, 6, 21, 42),
(22, 3, 16, 44),
(23, 3, 15, 45),
(24, 13, 24, 48),
(25, 5, 10, 51),
(26, 9, 1, 55),
(27, 9, 15, 56),
(28, 6, 16, 58),
(29, 4, 31, 59),
(30, 10, 31, 60),
(31, 10, 10, 61),
(32, 9, 13, 62),
(33, 6, 11, 63),
(34, 4, 22, 64),
(35, 4, 18, 70);

-- --------------------------------------------------------

--
-- Table structure for table `myfriends`
--

CREATE TABLE `myfriends` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `friend_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myfriends`
--

INSERT INTO `myfriends` (`id`, `user_id`, `friend_id`) VALUES
(1, 20, 18),
(3, 20, 28),
(5, 20, 26),
(6, 20, 19),
(8, 16, 20),
(9, 16, 29),
(10, 16, 26),
(11, 16, 22),
(12, 25, 18),
(15, 25, 19),
(17, 25, 20),
(18, 25, 30),
(30, 42, 25),
(32, 42, 37),
(33, 42, 22),
(34, 42, 20),
(35, 20, 29),
(38, 20, 37),
(39, 20, 22),
(40, 20, 42),
(41, 20, 25),
(42, 18, 20),
(43, 18, 19),
(44, 18, 25),
(45, 18, 28),
(46, 18, 29),
(47, 18, 37),
(48, 18, 22),
(49, 18, 26),
(50, 18, 42),
(52, 29, 18),
(53, 29, 28),
(54, 29, 25),
(55, 29, 37),
(56, 29, 22),
(58, 43, 20),
(59, 43, 19),
(60, 43, 18),
(61, 42, 29),
(62, 20, 16);

-- --------------------------------------------------------

--
-- Table structure for table `newgame`
--

CREATE TABLE `newgame` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `game_date_year` int(4) NOT NULL,
  `game_date_month` int(2) NOT NULL,
  `game_date_day` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newgame`
--

INSERT INTO `newgame` (`id`, `player_id`, `game_date_year`, `game_date_month`, `game_date_day`) VALUES
(32, 16, 2020, 11, 25),
(34, 16, 2020, 11, 26),
(39, 16, 2020, 11, 26),
(40, 16, 2020, 11, 26),
(41, 16, 2020, 11, 27),
(42, 16, 2020, 11, 27),
(43, 16, 2020, 11, 27),
(44, 16, 2020, 11, 28),
(45, 16, 2020, 12, 3),
(48, 16, 2020, 12, 4),
(50, 16, 2020, 12, 11),
(51, 16, 2020, 12, 12),
(52, 16, 2020, 12, 12),
(53, 16, 2020, 12, 12),
(54, 16, 2020, 12, 12),
(55, 16, 2020, 12, 12),
(56, 16, 2020, 12, 12),
(58, 16, 2020, 12, 12),
(59, 16, 2020, 12, 13),
(60, 16, 2020, 12, 13),
(61, 16, 2020, 12, 13),
(62, 16, 2020, 12, 13),
(63, 16, 2020, 12, 15),
(64, 16, 2020, 12, 15),
(65, 16, 2020, 12, 16),
(66, 16, 2020, 12, 16),
(67, 16, 2020, 12, 16),
(69, 16, 2020, 12, 16),
(70, 16, 2020, 12, 16);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `notification` varchar(200) NOT NULL,
  `noti_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `notification`, `noti_status`) VALUES
(421, 42, 'Broadcast was deleted.', 1),
(422, 28, 'Broadcast was deleted.', 0),
(423, 25, 'Broadcast was deleted.', 0),
(424, 16, 'Broadcast was deleted.', 1),
(425, 37, 'Broadcast was deleted.', 0),
(426, 22, 'Broadcast was deleted.', 0),
(427, 20, 'Broadcast was deleted.', 1),
(428, 43, 'Onam 2020 was deleted.', 1),
(429, 18, 'Onam 2020 was deleted.', 1),
(430, 25, 'You were kicked from Hello Guys', 0),
(431, 22, 'You were kicked from Hello Guys', 0),
(432, 20, 'Hello Guys was deleted.', 1),
(433, 37, 'Hello Guys was deleted.', 0),
(434, 29, 'Hello Guys was deleted.', 0),
(435, 28, 'Hello Guys was deleted.', 0),
(436, 18, 'Hello Guys was deleted.', 1),
(437, 26, 'Hello Guys was deleted.', 1),
(438, 19, 'Hello Guys was deleted.', 0),
(439, 22, 'Hello Guys was deleted.', 0),
(440, 42, 'Hello Guys was deleted.', 1),
(441, 25, 'Hello Guys was deleted.', 0),
(442, 42, 'MCA 2020 was deleted.', 1),
(443, 22, 'MCA 2020 was deleted.', 0),
(444, 20, 'MCA 2020 was deleted.', 1),
(445, 25, 'MCA 2020 was deleted.', 0),
(446, 20, 'You were kicked from Mca', 1),
(447, 42, 'You were kicked from Mca', 1),
(448, 16, 'Mca was deleted.', 1),
(449, 26, 'Mca was deleted.', 0),
(450, 42, 'Mca was deleted.', 1),
(451, 20, 'Mca was deleted.', 1),
(452, 18, 'Chumma was deleted.', 1),
(453, 28, 'Chumma was deleted.', 0),
(454, 22, 'Chumma was deleted.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `review` varchar(500) NOT NULL,
  `viewed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `group_id`, `user_id`, `review`, `viewed`) VALUES
(105, 77, 20, 'This is just check my new keyboard typing and it is making me slow', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(16, 'Kamal E J', 'kamal@gmail.com', '$2y$10$.hj8rbftCObnWjS2acbR6eegnFTD5OiR5FjNAX6eXImFn4wEcTQOm'),
(17, 'Nirmal', 'nirmal@gmail.com', '$2y$10$wVnxnMg4Y3sB0O5Tal0h..3XC5FT52Ufla6Ss.Q7AtouRMWy4SUpC'),
(18, 'Aby Thomas', 'aby@gmail.com', '$2y$10$AtAPvb8NJk3wpMoalZgNmOIU7KK20.9d/O61e8cpOcwKITvgHTLVO'),
(19, 'Sachin Geo Jacob', 'sachin@gmail.com', '$2y$10$.PaX17LFwSZBNH1CvHzsZunf8cCuqa/T/EztfaKpMNtkC4eMB9MbS'),
(20, 'Reniz Nazar', 'reniz@gmail.com', '$2y$10$UZ/4ogEhc1V3j5Q4DH89eOgAhd6gY/mFvTUTu056udwipACSkqpuq'),
(21, 'Alex John', 'alex@gmail.com', '$2y$10$MjADchkjaPGyQ.gUQfIenuuTTo/KaTksZKgGdUWF9TFf3hGGNZrF6'),
(22, 'Don Mathew', 'don@gmail.com', '$2y$10$gHZZxIi6C8CThvBbK7RDsus2uPFqqcTeFvz2tZN1PnVTFiL6j0z2y'),
(23, 'Nevin Joy', 'nevin@gmail.com', '$2y$10$g4SH90FXVtqUh13AD1HMp.uhRUCmnlpeIiEFsK.X2/RZMqm8aolJi'),
(24, 'Tojo', 'tojo@gmail.com', '$2y$10$OMkNxEKhiXvNAilyl/2AX.7DqIpOA.qY84uMZe45twyIUUAwVw.ru'),
(25, 'Amal Vincent', 'amal@gmail.com', '$2y$10$b6yjCJxs1Zf5KuaHhc/WM.Sc91/BOtJixJDvibtqIQ2XoHKSFOdry'),
(26, 'Jomin George Attayil', 'jomin@gmail.com', '$2y$10$g53JeQ8vUMNB/ggxtZ1li.nguVdtURcXN3CGxk2Zqrju5ERuWK.Sm'),
(27, 'Dennis', 'dennis@gmail.com', '$2y$10$l98it88kq8W4L.dlXRun5Ok0HIONpJqj39c8Dh603J36w3.BT9mXC'),
(28, 'Akshai Joseph', 'akshai@gmail.com', '$2y$10$FHW2Xxze.4AsI6jIs75Klehfpy4.OxpSCU98TeIJNPknwmIIrPOTO'),
(29, 'Aibin Joy', 'aibin@gmail.com', '$2y$10$Wy1C4ZMPNXLQQGYBVOhEVujRLvcJILnmUxkaWgYikxZ46F6asFMby'),
(30, 'Kevin Biju', 'kevin@gmail.com', '$2y$10$tC89Yoq3zOc6ot4HTtl.c.ktgBkT6d4TQH4FzWAdvb82634lT32PO'),
(31, 'Vishnu Vijayan', 'vishnu@gmail.com', '$2y$10$217pfuHvYxrtwG6CjXbW2uVZieVP0VrlqkwnAutDcetHRfBiRBO0q'),
(32, 'Melvin Joy', 'melvin@gmail.com', '$2y$10$Vu/zA8Db./DAdCf71Vplq.9C75gcnHF52TVFaFYdlUr5UlWynbhoy'),
(33, 'Akhil Krishna', 'akhil@gmail.com', '$2y$10$Kyc/St2emmYAjjs0vR6ISOUhpqMT.aUJadwj1NbQXJwx/bvQOzBh6'),
(34, 'Jackson', 'jackson@gmail.com', '$2y$10$QpJnhO4anN3TR5j3aOzBReVv69RMQJSxaptHDEqwzyGD1A5F3ePpW'),
(35, 'Stefin Thomas', 'stefin@gmail.com', '$2y$10$T3TGnoZ0OvDP8Uj3UkixyOEtKiV8oOG27l49v4Ao6NwIngapr.9jy'),
(36, 'Ashish John', 'ashish@gmail.com', '$2y$10$4Urv3GQW1cqRAStoUJvgVud3Gp.gwP9J0mhRdkFLUs3VVsUmPT6tO'),
(37, 'Ashbin Mathew', 'ashbin@gmail.com', '$2y$10$xfrckwoPUzQhS96h5Rqj/OWqPuCs0nNgJLmiNN7eEGZbrNtfGd072'),
(38, 'Brijesh', 'brijesh@gmail.com', '$2y$10$lBzsiDZG7BGvQ6v17ByLpu1LZV/.GfkZ.VNmA4zEzeI15UANERg7e'),
(39, 'Mango', 'mango@gmail.com', '$2y$10$uWJINpd0KFyzwiB7uyoUiemYcxRtfepXXN2Mwt1EzsmyDRnUXZC2q'),
(40, 'Pillo D J', 'kamal.19pmc335@mcka.in', '$2y$10$8mrtxt153bbc.1UjWKgfGe8C26tKSuiytlorADdw7zu0Af5ux5YtK'),
(41, 'P P', 'pillodj1234@gmail.com', '$2y$10$bntmR4kvw20wC/wOAQnpeucgxbgNHen670SI76oBCO0CTwngIRPdq'),
(42, 'Kamal E J', 'kamalej1234@gmail.com', '$2y$10$qCRZGdZxpN4zmbHZYX9GteVuYks1iX6syFUI7n3.hLFIqefAlsWyi'),
(43, 'Archana Raju', 'archana@gmail.com', '$2y$10$lEZytNnUmyK5h.ksCHpf2ejOlpR4fcQLw/puJDJmHOxFmjM5kprPK'),
(44, '23', 'jp@gmail.com', '$2y$10$MclM0s3rWAJaoB3xbe9ZWOgo5QdA/Y5b5i4vXGhLYsZyT3XiDnYGa'),
(45, 'Aby Thomas', 'aby2@gmail.com', '$2y$10$G9F8FcsNy/A.gT0Y.NKYYedes6/hm6J2besUCQJNS23/sVrKuj2r.');

-- --------------------------------------------------------

--
-- Table structure for table `winner_board`
--

CREATE TABLE `winner_board` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `imposter_win` int(11) NOT NULL DEFAULT 0,
  `crew_win` int(11) NOT NULL DEFAULT 0,
  `total_games_played` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `winner_board`
--

INSERT INTO `winner_board` (`id`, `player_id`, `imposter_win`, `crew_win`, `total_games_played`) VALUES
(8, 6, 9, 79, 88),
(9, 8, 18, 78, 96),
(10, 3, 6, 67, 73),
(11, 10, 9, 79, 88),
(12, 4, 8, 70, 78),
(13, 5, 6, 67, 73),
(14, 7, 4, 24, 28),
(15, 2, 10, 76, 86),
(16, 11, 1, 0, 1),
(17, 9, 2, 21, 23),
(18, 12, 0, 1, 1),
(19, 13, 1, 13, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addedgame`
--
ALTER TABLE `addedgame`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `available_color`
--
ALTER TABLE `available_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `available_players`
--
ALTER TABLE `available_players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `broadcast`
--
ALTER TABLE `broadcast`
  ADD PRIMARY KEY (`id`),
  ADD KEY `broadcast_ibfk_1` (`group_id`);

--
-- Indexes for table `broadcast_seen_users`
--
ALTER TABLE `broadcast_seen_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `broadcast_seen_users_ibfk_2` (`broad_id`),
  ADD KEY `broadcast_seen_users_ibfk_1` (`user_id`);

--
-- Indexes for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_gen_id` (`group_gen_id`),
  ADD KEY `groups_ibfk_1` (`user_id`);

--
-- Indexes for table `joinedgroup`
--
ALTER TABLE `joinedgroup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `joinedgroup_ibfk_1` (`group_id`),
  ADD KEY `joinedgroup_ibfk_2` (`user_id`);

--
-- Indexes for table `mvp`
--
ALTER TABLE `mvp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `mvp_ibfk_2` (`player_id`);

--
-- Indexes for table `myfriends`
--
ALTER TABLE `myfriends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `friend_id` (`friend_id`);

--
-- Indexes for table `newgame`
--
ALTER TABLE `newgame`
  ADD PRIMARY KEY (`id`),
  ADD KEY `newgame_ibfk_1` (`player_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_ibfk_1` (`group_id`),
  ADD KEY `reviews_ibfk_2` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `winner_board`
--
ALTER TABLE `winner_board`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_id` (`player_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addedgame`
--
ALTER TABLE `addedgame`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=652;

--
-- AUTO_INCREMENT for table `available_color`
--
ALTER TABLE `available_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `available_players`
--
ALTER TABLE `available_players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `broadcast`
--
ALTER TABLE `broadcast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `broadcast_seen_users`
--
ALTER TABLE `broadcast_seen_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `joinedgroup`
--
ALTER TABLE `joinedgroup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;

--
-- AUTO_INCREMENT for table `mvp`
--
ALTER TABLE `mvp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `myfriends`
--
ALTER TABLE `myfriends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `newgame`
--
ALTER TABLE `newgame`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=455;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `winner_board`
--
ALTER TABLE `winner_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addedgame`
--
ALTER TABLE `addedgame`
  ADD CONSTRAINT `addedgame_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `newgame` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `addedgame_ibfk_2` FOREIGN KEY (`player_id`) REFERENCES `available_players` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `broadcast`
--
ALTER TABLE `broadcast`
  ADD CONSTRAINT `broadcast_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `broadcast_seen_users`
--
ALTER TABLE `broadcast_seen_users`
  ADD CONSTRAINT `broadcast_seen_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `broadcast_seen_users_ibfk_2` FOREIGN KEY (`broad_id`) REFERENCES `broadcast` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `joinedgroup`
--
ALTER TABLE `joinedgroup`
  ADD CONSTRAINT `joinedgroup_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `joinedgroup_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mvp`
--
ALTER TABLE `mvp`
  ADD CONSTRAINT `mvp_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `newgame` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mvp_ibfk_2` FOREIGN KEY (`player_id`) REFERENCES `available_players` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `myfriends`
--
ALTER TABLE `myfriends`
  ADD CONSTRAINT `myfriends_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `myfriends_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `winner_board`
--
ALTER TABLE `winner_board`
  ADD CONSTRAINT `winner_board_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `available_players` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
