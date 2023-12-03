-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 08:41 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sportscomplex`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `equipmentID` int(11) NOT NULL,
  `equipmentName` varchar(20) DEFAULT NULL,
  `equipmentType` varchar(20) DEFAULT NULL,
  `equipmentRentalFee` int(11) DEFAULT NULL,
  `equipmentImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`equipmentID`, `equipmentName`, `equipmentType`, `equipmentRentalFee`, `equipmentImage`) VALUES
(1, 'Balls', 'Game Equipment', 1500, '../venueImage/71VEK1tsUYL._AC_SL1500_.jpg'),
(2, 'Nets', 'Game Equipment', 3500, '../venueImage/badmition.jpg'),
(3, 'Racquets', 'Game Equipment', 500, '../venueImage/tdslyl0pptzs6vst4uq5.webp'),
(4, 'Flying discs', 'Game Equipment', 2000, '../venueImage/550px-nowatermark-Throw-a-Frisbee-Step-5-Version-4.jpg'),
(5, 'Footwear', 'Player Equipment', 2500, '../venueImage/sports_shoes_for_men_1657191786436_1657191816166.webp'),
(6, 'Elbow Pads', 'Player Equipment', 3000, '../venueImage/e2defecb8278be38ff3f6ce49d539193.jfif'),
(7, 'Tennis Hat', 'Player Equipment', 1000, '../venueImage/41DyPjwdkvL.jpg'),
(8, 'Football Shinguard', 'Player Equipment', 9000, '../venueImage/soccer-shin-guards-kid.webp');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `memberID` int(11) NOT NULL,
  `lastName` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `firstName` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `middleName` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `contactNum` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `userType` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberID`, `lastName`, `firstName`, `middleName`, `address`, `contactNum`, `username`, `password`, `userType`) VALUES
(7, 'Account', 'Create', 'An', 'Manila', '09123456728', 'createaccount', '34f9f5a95087301785196ee0e503f060', '2'),
(8, '', '', '', '', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(9, 'Bautista', 'Rob', 'C', 'Quezon City', '09123456789', 'rob@gmail.com', '760061f6bfde75c29af12f252d4d3345', '2'),
(10, 'Maldo', 'John', 'Paul', 'Manila', '0967389876', 'john', '527bd5b5d689e2c32ae974c6229ff785', '2');

-- --------------------------------------------------------

--
-- Stand-in structure for view `rental`
-- (See below for the actual view)
--
CREATE TABLE `rental` (
`Name` varchar(152)
,`equipmentName` varchar(20)
,`schedDate` varchar(35)
,`equipmentRentalFee` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `rentalID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `equipmentID` int(11) NOT NULL,
  `rentalBilling` int(11) DEFAULT NULL,
  `rentalFee` int(11) DEFAULT NULL,
  `schedDate` varchar(35) DEFAULT NULL,
  `schedTime` varchar(35) DEFAULT NULL,
  `period` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`rentalID`, `memberID`, `equipmentID`, `rentalBilling`, `rentalFee`, `schedDate`, `schedTime`, `period`) VALUES
(28, 7, 3, NULL, NULL, '2023-02-22', '1', 'AM'),
(29, 7, 2, NULL, NULL, '2023-02-23', '1', 'AM'),
(30, 7, 5, NULL, NULL, '2023-02-23', '1', 'AM'),
(31, 7, 6, NULL, NULL, '2023-02-22', '1', 'AM');

-- --------------------------------------------------------

--
-- Stand-in structure for view `reservation`
-- (See below for the actual view)
--
CREATE TABLE `reservation` (
`Name` varchar(152)
,`venueName` varchar(20)
,`schedDate` varchar(35)
,`venueRentalFee` int(11)
,`reservationFee` int(11)
,`Reservation Billing` bigint(12)
);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservationID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `venueID` int(11) DEFAULT NULL,
  `reservationBilling` int(11) DEFAULT NULL,
  `reservationFee` int(11) DEFAULT 500,
  `schedDate` varchar(35) DEFAULT NULL,
  `schedTime` varchar(35) DEFAULT NULL,
  `period` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservationID`, `memberID`, `venueID`, `reservationBilling`, `reservationFee`, `schedDate`, `schedTime`, `period`) VALUES
(6, 9, 4, NULL, NULL, '2023-02-16', '00:00:01', 'AM'),
(79, 10, 6, NULL, 500, '2023-02-20', '00:00:01', 'AM'),
(97, 7, 2, 500, 500, '2023-02-22', '1', 'AM'),
(98, 7, 9, 0, NULL, '2023-02-22', '1', 'AM'),
(99, 7, 8, 0, NULL, '2023-02-23', '1', 'AM'),
(100, 7, 3, 0, NULL, '2023-02-22', '1', 'AM'),
(101, 7, 8, 0, NULL, '2023-03-01', '1', 'AM'),
(102, 7, 8, 0, 0, '2023-03-04', '1', 'AM'),
(103, 7, 3, NULL, 500, '2023-02-25', '1', 'AM'),
(104, 7, 6, NULL, 500, '2023-03-23', '1', 'AM'),
(105, 7, 9, NULL, 500, '2023-03-19', '1', 'AM'),
(106, 7, 2, NULL, 500, '2023-02-22', '3', 'PM'),
(107, 7, 6, NULL, 500, '2023-02-22', '1', 'AM');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `venueID` int(11) NOT NULL,
  `venueName` varchar(20) DEFAULT NULL,
  `venueType` varchar(20) DEFAULT NULL,
  `venueRentalFee` int(11) DEFAULT NULL,
  `venueImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`venueID`, `venueName`, `venueType`, `venueRentalFee`, `venueImage`) VALUES
(1, 'Basketball', 'Indoor Court', 10000, '../venueImage/image_2023-02-07-10-52-42_63e21f6a110c6.jpg'),
(2, 'swim', 'pool', 8000, '../venueImage/image_2023-02-22-08-51-38_63f5c98ae86e2.jpg'),
(3, 'Volleyball', 'Indoor Court', 10000, '../venueImage/image_2023-02-07-10-54-38_63e21fde998fd.jpg'),
(4, 'Football', 'Outdoor Court', 25000, '../venueImage/image_2023-02-07-10-53-15_63e21f8b96971.jpg'),
(6, 'Swimming Pool', 'Pool', 30000, '../venueImage/image_2023-02-07-10-54-03_63e21fbb47b11.jpg'),
(7, 'Gymnastics', 'Floor', 15000, '../venueImage/image_2023-02-07-10-53-44_63e21fa877408.jpg'),
(8, 'Tennis', 'Outdoor Court', 50000, '../venueImage/image_2023-02-07-17-35-51_63e27de7cfe7b.jpg'),
(9, 'Multi-sports Court', 'Outdoor Court', 80000, '../venueImage/image_2023-02-07-17-35-15_63e27dc3c8dc1.jpg'),
(29, 'Badmintons', 'court', 7000, '../venueImage/image_2023-02-22-08-52-12_63f5c9aca63da.jpg');

-- --------------------------------------------------------

--
-- Structure for view `rental`
--
DROP TABLE IF EXISTS `rental`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rental`  AS SELECT concat(`m`.`firstName`,' ',`m`.`middleName`,' ',`m`.`lastName`) AS `Name`, `e`.`equipmentName` AS `equipmentName`, `rt`.`schedDate` AS `schedDate`, `e`.`equipmentRentalFee` AS `equipmentRentalFee` FROM ((`equipments` `e` join `rentals` `rt` on(`e`.`equipmentID` = `rt`.`equipmentID`)) join `members` `m` on(`rt`.`memberID` = `m`.`memberID`))  ;

-- --------------------------------------------------------

--
-- Structure for view `reservation`
--
DROP TABLE IF EXISTS `reservation`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `reservation`  AS SELECT concat(`m`.`firstName`,' ',`m`.`middleName`,' ',`m`.`lastName`) AS `Name`, `v`.`venueName` AS `venueName`, `r`.`schedDate` AS `schedDate`, `v`.`venueRentalFee` AS `venueRentalFee`, `r`.`reservationFee` AS `reservationFee`, `v`.`venueRentalFee`+ `r`.`reservationFee` AS `Reservation Billing` FROM ((`venues` `v` join `reservations` `r` on(`v`.`venueID` = `r`.`venueID`)) join `members` `m` on(`r`.`memberID` = `m`.`memberID`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`equipmentID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`rentalID`),
  ADD KEY `equipmentID` (`equipmentID`),
  ADD KEY `memberID` (`memberID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservationID`),
  ADD KEY `reservations_ibfk_1` (`memberID`),
  ADD KEY `reservations_ibfk_2` (`venueID`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`venueID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `equipmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `rentalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `venueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_ibfk_1` FOREIGN KEY (`equipmentID`) REFERENCES `equipments` (`equipmentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rentals_ibfk_2` FOREIGN KEY (`memberID`) REFERENCES `members` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `members` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`venueID`) REFERENCES `venues` (`venueID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
