-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Generation Time: Apr 03, 2022 at 04:52 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmotors`
--

-- --------------------------------------------------------

--
-- Table structure for table `carclassification`
--

CREATE TABLE `carclassification` (
  `classificationId` int NOT NULL,
  `classificationName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carclassification`
--

INSERT INTO `carclassification` (`classificationId`, `classificationName`) VALUES
(1, 'SUV'),
(2, 'Classic'),
(3, 'Sports'),
(4, 'Trucks'),
(5, 'Used');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientId` int UNSIGNED NOT NULL,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientId`, `clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comment`) VALUES
(5, 'Chloe', 'Mieres', 'task@gmail.com', '$2y$10$kHKYPoAmHJsFw2S.IBG7/.nwTvCPGtE1a1r62w1HbSkbVYdkRxxj6', '1', NULL),
(6, 'Alirio', 'Mieres', 'email@gmail.com', '$2y$10$Z/PCM07GAXP5t8TDadO7Pe.BT2iCWW3EyFzIUjpM8cgOjkE2Tm06G', '1', NULL),
(7, 'Esaias', 'Mieres', 'email2@gmail.com', '$2y$10$86YF8IChPjDrEhAylRTpHuAB4jcm31B6lIPsnwOdB8MhtyXaglN0e', '1', NULL),
(8, 'Alirio', 'Mieres', 'rebeca@gmail.com', '$2y$10$NDr9o9yvMEoGQjf7kAkY0.Iccwda485jOa70NuPKE//5KelwavUGS', '1', NULL),
(9, 'Alirio', 'Mieres', 'nuevo2@gmail.com', '$2y$10$3jJV6WngLVtGuRsIpw2Hzu.s3PtTkfhoHBGzXawc9sxlXwY3Dj23i', '1', NULL),
(10, 'Alirio', 'Mieres', 'new@gmail.com', '$2y$10$ng1ileQ3tUq8S1rlPJOAB.jkGtqBsw2QWM0d4EXKQ4TigC5WV7uY6', '1', NULL),
(11, 'Alirio', 'Mieres', '456@gmail.com', '$2y$10$kTHanuzzdOr2HxNaJkUypuLOhiPFrfxWlpCYXv3rp9cvTAdIu.Hz6', '1', NULL),
(12, 'Mama', 'Miers', 'lol@gmail.co', '$2y$10$PlfjK95LAiVJzrIPEQY68utiEZnh096wFmEOa8GR0ZrN/gGOGQ6Zm', '1', NULL),
(13, 'Admin', 'User', 'admin@cse340.net', '$2y$10$tVpqU/rolnKTGBjStunyKOSocqqoypVCcx4l7nNHh9m4lQnmKGqYi', '3', NULL),
(14, 'Sthephania', 'Mieres', 'lds@gmail.com', '$2y$10$akHrzbu61VlUBSnhT5r/HuqDBy1t7fBLDD6jzXwtjAUTV2ybHu1TW', '1', NULL),
(15, 'Alirio', 'Mieres', 'aurora@gmail.com', '$2y$10$gUZlgUQoycok97/Qh7.zrO4MarrorZNPY0X.eSqBBZKlIJUcmpowW', '1', NULL),
(16, 'Esaias', 'Millan', 'aurora2@gmail.com', '$2y$10$hhl0GCwiYSEExtOUwwKvnei0r5qRU7NcB.hW2iFDY5AKR3tj6rfYG', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgId` int NOT NULL,
  `invId` int NOT NULL,
  `imgName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imgPath` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imgPrimary` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgId`, `invId`, `imgName`, `imgPath`, `imgDate`, `imgPrimary`) VALUES
(7, 1, 'wrangler.jpg', '/phpmotors/images/vehicles/wrangler.jpg', '2022-03-18 23:41:29', 1),
(8, 1, 'wrangler-tn.jpg', '/phpmotors/images/vehicles/wrangler-tn.jpg', '2022-03-18 23:41:29', 1),
(9, 2, 'model-t.jpg', '/phpmotors/images/vehicles/model-t.jpg', '2022-03-18 23:41:47', 1),
(10, 2, 'model-t-tn.jpg', '/phpmotors/images/vehicles/model-t-tn.jpg', '2022-03-18 23:41:47', 1),
(11, 3, 'adventador.jpg', '/phpmotors/images/vehicles/adventador.jpg', '2022-03-18 23:42:00', 1),
(12, 3, 'adventador-tn.jpg', '/phpmotors/images/vehicles/adventador-tn.jpg', '2022-03-18 23:42:00', 1),
(13, 4, 'monster-truck.jpg', '/phpmotors/images/vehicles/monster-truck.jpg', '2022-03-18 23:42:15', 1),
(14, 4, 'monster-truck-tn.jpg', '/phpmotors/images/vehicles/monster-truck-tn.jpg', '2022-03-18 23:42:15', 1),
(15, 5, 'mechanic.jpg', '/phpmotors/images/vehicles/mechanic.jpg', '2022-03-18 23:42:38', 1),
(16, 5, 'mechanic-tn.jpg', '/phpmotors/images/vehicles/mechanic-tn.jpg', '2022-03-18 23:42:38', 1),
(17, 6, 'batmobile.jpg', '/phpmotors/images/vehicles/batmobile.jpg', '2022-03-18 23:42:47', 1),
(18, 6, 'batmobile-tn.jpg', '/phpmotors/images/vehicles/batmobile-tn.jpg', '2022-03-18 23:42:47', 1),
(19, 7, 'mystery-van.jpg', '/phpmotors/images/vehicles/mystery-van.jpg', '2022-03-18 23:42:56', 1),
(20, 7, 'mystery-van-tn.jpg', '/phpmotors/images/vehicles/mystery-van-tn.jpg', '2022-03-18 23:42:56', 1),
(21, 8, 'fire-truck.jpg', '/phpmotors/images/vehicles/fire-truck.jpg', '2022-03-18 23:43:07', 1),
(22, 8, 'fire-truck-tn.jpg', '/phpmotors/images/vehicles/fire-truck-tn.jpg', '2022-03-18 23:43:07', 1),
(23, 9, 'crown-vic.jpg', '/phpmotors/images/vehicles/crown-vic.jpg', '2022-03-18 23:43:19', 1),
(24, 9, 'crown-vic-tn.jpg', '/phpmotors/images/vehicles/crown-vic-tn.jpg', '2022-03-18 23:43:20', 1),
(25, 10, 'camaro.jpg', '/phpmotors/images/vehicles/camaro.jpg', '2022-03-18 23:43:31', 1),
(26, 10, 'camaro-tn.jpg', '/phpmotors/images/vehicles/camaro-tn.jpg', '2022-03-18 23:43:31', 1),
(27, 11, 'escalade.jpg', '/phpmotors/images/vehicles/escalade.jpg', '2022-03-18 23:43:44', 1),
(28, 11, 'escalade-tn.jpg', '/phpmotors/images/vehicles/escalade-tn.jpg', '2022-03-18 23:43:44', 1),
(29, 12, 'hummer.jpg', '/phpmotors/images/vehicles/hummer.jpg', '2022-03-18 23:43:53', 1),
(30, 12, 'hummer-tn.jpg', '/phpmotors/images/vehicles/hummer-tn.jpg', '2022-03-18 23:43:54', 1),
(31, 13, 'aerocar.jpg', '/phpmotors/images/vehicles/aerocar.jpg', '2022-03-18 23:44:05', 1),
(32, 13, 'aerocar-tn.jpg', '/phpmotors/images/vehicles/aerocar-tn.jpg', '2022-03-18 23:44:05', 1),
(33, 14, 'van.jpg', '/phpmotors/images/vehicles/van.jpg', '2022-03-18 23:44:15', 1),
(34, 14, 'van-tn.jpg', '/phpmotors/images/vehicles/van-tn.jpg', '2022-03-18 23:44:15', 1),
(35, 15, 'no-image.png', '/phpmotors/images/vehicles/no-image.png', '2022-03-18 23:44:23', 1),
(36, 15, 'no-image-tn.png', '/phpmotors/images/vehicles/no-image-tn.png', '2022-03-18 23:44:23', 1),
(39, 1, 'wrangler1.jpg', '/phpmotors/images/vehicles/wrangler1.jpg', '2022-03-18 23:52:02', 0),
(40, 1, 'wrangler1-tn.jpg', '/phpmotors/images/vehicles/wrangler1-tn.jpg', '2022-03-18 23:52:02', 0),
(41, 3, 'adventador1.jpg', '/phpmotors/images/vehicles/adventador1.jpg', '2022-03-18 23:54:40', 0),
(42, 3, 'adventador1-tn.jpg', '/phpmotors/images/vehicles/adventador1-tn.jpg', '2022-03-18 23:54:40', 0),
(43, 7, 'mystery-van1.jpg', '/phpmotors/images/vehicles/mystery-van1.jpg', '2022-03-18 23:56:00', 0),
(44, 7, 'mystery-van1-tn.jpg', '/phpmotors/images/vehicles/mystery-van1-tn.jpg', '2022-03-18 23:56:01', 0),
(45, 77, 'delorean.jpg', '/phpmotors/images/vehicles/delorean.jpg', '2022-03-19 01:45:52', 1),
(46, 77, 'delorean-tn.jpg', '/phpmotors/images/vehicles/delorean-tn.jpg', '2022-03-19 01:45:52', 1),
(47, 7, 'mystery-van2.jpg', '/phpmotors/images/vehicles/mystery-van2.jpg', '2022-03-19 21:40:52', 0),
(48, 7, 'mystery-van2-tn.jpg', '/phpmotors/images/vehicles/mystery-van2-tn.jpg', '2022-03-19 21:40:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invId` int NOT NULL,
  `invMake` varchar(30) NOT NULL,
  `invModel` varchar(30) NOT NULL,
  `invDescription` text NOT NULL,
  `invImage` varchar(50) NOT NULL,
  `invThumbnail` varchar(50) NOT NULL,
  `invPrice` decimal(10,0) NOT NULL,
  `invStock` smallint NOT NULL,
  `invColor` varchar(20) NOT NULL,
  `classificationId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invId`, `invMake`, `invModel`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invColor`, `classificationId`) VALUES
(1, 'Jeep ', 'Wrangler', 'The Jeep Wrangler is small and compact with enough power to get you where you want to go. It is great for everyday driving as well as off-roading whether that be on the rocks or in the mud!', '/phpmotors/images/vehicles/wrangler.jpg', '/phpmotors/images/vehicles/wrangler-tn.jpg', '28045', 4, 'Orange', 1),
(2, 'Ford', 'Model T', 'The Ford Model T can be a bit tricky to drive. It was the first car to be put into production. You can get it in any color you want if it is black.', '/phpmotors/images/vehicles/model-t.jpg', '/phpmotors/images/vehicles/model-t-tn.jpg', '30000', 2, 'Black', 2),
(3, 'Lamborghini', 'Adventador', 'This V-12 engine packs a punch in this sporty car. Make sure you wear your seatbelt and obey all traffic laws.', '/phpmotors/images/vehicles/adventador.jpg', '/phpmotors/images/vehicles/adventador-tn.jpg', '417650', 1, 'Blue', 3),
(4, 'Monster', 'Truck', 'Most trucks are for working, this one is for fun. This beast comes with 60 inch tires giving you the traction needed to jump and roll in the mud.', '/phpmotors/images/vehicles/monster-truck.jpg', '/phpmotors/images/vehicles/monster-truck-tn.jpg', '150000', 3, 'purple', 4),
(5, 'Mechanic', 'Special', 'Not sure where this car came from. However, with a little tender loving care it will run as good a new.', '/phpmotors/images/vehicles/mechanic.jpg', '/phpmotors/images/vehicles/mechanic-tn.jpg', '100', 1, 'Rustt', 5),
(6, 'Batmobile', 'Custom', 'Ever want to be a superhero? Now you can with the bat mobile. This car allows you to switch to bike mode allowing for easy maneuvering through traffic during rush hour.', '/phpmotors/images/vehicles/batmobile.jpg', '/phpmotors/images/vehicles/batmobile-tn.jpg', '65000', 1, 'Black', 3),
(7, 'Mystery', 'Machine', 'Scooby and the gang always found luck in solving their mysteries because of their 4 wheel drive Mystery Machine. This Van will help you do whatever job you are required to with a success rate of 100%.', '/phpmotors/images/vehicles/mystery-van.jpg', '/phpmotors/images/vehicles/mystery-van-tn.jpg', '10000', 12, 'Green', 1),
(8, 'Spartan', 'Fire Truck', 'Emergencies happen often. Be prepared with this Spartan fire truck. Comes complete with 1000 ft. of hose and a 1000-gallon tank.', '/phpmotors/images/vehicles/fire-truck.jpg', '/phpmotors/images/vehicles/fire-truck-tn.jpg', '50000', 1, 'Red', 4),
(9, 'Ford', 'Crown Victoria', 'After the police force updated their fleet these cars are now available to the public! These cars come equipped with the siren which is convenient for college students running late to class.', '/phpmotors/images/vehicles/crown-vic.jpg', '/phpmotors/images/vehicles/crown-vic-tn.jpg', '10000', 5, 'White', 5),
(10, 'Chevy', 'Camaro', 'If you want to look cool this is the car you need! This car has great performance at an affordable price. Own it today!', '/phpmotors/images/vehicles/camaro.jpg', '/phpmotors/images/vehicles/camaro-tn.jpg', '25000', 10, 'Silver', 3),
(11, 'Cadillac', 'Escalade', 'This styling car is great for any occasion from going to the beach to meeting the president. The luxurious inside makes this car a home away from home.', '/phpmotors/images/vehicles/escalade.jpg', '/phpmotors/images/vehicles/escalade-tn.jpg', '75195', 4, 'black', 1),
(12, 'GM', 'Hummer', 'Do you have 6 kids and like to go off-roading? The Hummer gives you the small interiors with an engine to get you out of any muddy or rocky situation.', '/phpmotors/images/vehicles/hummer.jpg', '/phpmotors/images/vehicles/hummer-tn.jpg', '58800', 5, 'Yellow', 5),
(13, 'Aerocar International', 'Aerocar', 'Are you sick of rush hour traffic? This car converts into an airplane to get you where you are going fast. Only 6 of these were made, get this one while it lasts!', '/phpmotors/images/vehicles/aerocar.jpg', '/phpmotors/images/vehicles/aerocar-tn.jpg', '1000000', 1, 'Red', 2),
(14, 'FBI', 'Surveillance Van', 'Do you like police shows? You will feel right at home driving this van. Comes complete with surveillance equipment for an extra fee of $2,000 a month. ', '/phpmotors/images/vehicles/van.jpg', '/phpmotors/images/vehicles/van-tn.jpg', '20000', 1, 'Green', 1),
(15, 'Dog ', 'Car', 'Do you like dogs? Well, this car is for you straight from the 90s from Aspen, Colorado we have the original Dog Car complete with fluffy ears.', '/phpmotors/images/vehicles/no-image.png', '/phpmotors/images/vehicles/no-image-tn.png', '35000', 1, 'Brown', 2),
(77, 'DMC', 'DeLorean', 'This V-12 engine packs a punch in this sporty car. Make sure you wear your seatbelt and obey all traffic laws.', '/phpmotors/images/vehicles/delorean.jpg', '/phpmotors/images/vehicles/delorean-tn.jpg', '1000', 1, 'white', 3);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int UNSIGNED NOT NULL,
  `reviewText` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invId` int NOT NULL,
  `clientId` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `reviewText`, `reviewDate`, `invId`, `clientId`) VALUES
(33, 'Hello World!!', '2022-04-02 22:07:08', 7, 15),
(34, 'Hello World!', '2022-04-02 22:29:53', 7, 15),
(43, 'Final Project CSE340', '2022-04-03 04:41:28', 7, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carclassification`
--
ALTER TABLE `carclassification`
  ADD PRIMARY KEY (`classificationId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientId`),
  ADD UNIQUE KEY `clientEmail` (`clientEmail`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `FK_inv_images` (`invId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `classificationId` (`classificationId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `FK_reviews_clients` (`clientId`),
  ADD KEY `FK_reviews_inventory` (`invId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carclassification`
--
ALTER TABLE `carclassification`
  MODIFY `classificationId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientId` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_inv_images` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`classificationId`) REFERENCES `carclassification` (`classificationId`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_reviews_clients` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reviews_inventory` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
