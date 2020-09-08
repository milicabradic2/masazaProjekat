-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2020 at 09:04 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekatmasaze`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `korisnikID` int(11) NOT NULL,
  `imePrezime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brojTelefona` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pristup` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`korisnikID`, `imePrezime`, `brojTelefona`, `email`, `username`, `password`, `pristup`) VALUES
(1, 'Marija Maric', '066 097 897', 'marija98@gmail.com', 'maki', 'maki', 1),
(2, 'Milica Milic', '064 123 45 67', 'milica98@gmail.com', 'comi', 'comi', 0),
(3, 'Marko Markovic', '065 666 666', 'marko98@gmail.com', 'marko', 'marko', 0),
(4, 'Petar Petrovic', '065555555', 'petarnjegos@gmail.com', 'pero', 'pero', 0);

-- --------------------------------------------------------

--
-- Table structure for table `masaza`
--

CREATE TABLE `masaza` (
  `masazaID` int(11) NOT NULL,
  `nazivMasaze` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trajanjeID` int(11) NOT NULL,
  `tipID` int(11) NOT NULL,
  `osnovnaCena` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `masaza`
--

INSERT INTO `masaza` (`masazaID`, `nazivMasaze`, `trajanjeID`, `tipID`, `osnovnaCena`) VALUES
(1, 'Masaza 1', 1, 1, 700),
(2, 'Masaza 2', 2, 4, 2300),
(3, 'Masaza 3', 3, 2, 1500),
(5, 'Masaza 4', 4, 2, 2500),
(6, 'Masaza 5', 2, 4, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `tip`
--

CREATE TABLE `tip` (
  `tipID` int(11) NOT NULL,
  `nazivTipa` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tip`
--

INSERT INTO `tip` (`tipID`, `nazivTipa`) VALUES
(1, 'Anticelulit masaza'),
(2, 'Relaks masaza'),
(3, 'Antistres masaza'),
(4, 'Sportska masaza');

-- --------------------------------------------------------

--
-- Table structure for table `trajanje`
--

CREATE TABLE `trajanje` (
  `trajanjeID` int(11) NOT NULL,
  `trajanje` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dodatakCeni` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trajanje`
--

INSERT INTO `trajanje` (`trajanjeID`, `trajanje`, `dodatakCeni`) VALUES
(1, '30 minuta', 0),
(2, '60 minuta', 500),
(3, '90 minuta', 1000),
(4, '120 minuta', 1250);

-- --------------------------------------------------------

--
-- Table structure for table `zakazivanje`
--

CREATE TABLE `zakazivanje` (
  `zakazivanjeID` int(11) NOT NULL,
  `masazaID` int(11) NOT NULL,
  `korisnikID` int(11) NOT NULL,
  `vreme` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zakazivanje`
--

INSERT INTO `zakazivanje` (`zakazivanjeID`, `masazaID`, `korisnikID`, `vreme`) VALUES
(8, 5, 1, '2020-09-01 17:08:38'),
(9, 6, 1, '2020-09-02 20:46:42'),
(10, 1, 4, '2020-09-04 15:01:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`korisnikID`);

--
-- Indexes for table `masaza`
--
ALTER TABLE `masaza`
  ADD PRIMARY KEY (`masazaID`),
  ADD KEY `trajanjeID` (`trajanjeID`),
  ADD KEY `tipID` (`tipID`);

--
-- Indexes for table `tip`
--
ALTER TABLE `tip`
  ADD PRIMARY KEY (`tipID`);

--
-- Indexes for table `trajanje`
--
ALTER TABLE `trajanje`
  ADD PRIMARY KEY (`trajanjeID`);

--
-- Indexes for table `zakazivanje`
--
ALTER TABLE `zakazivanje`
  ADD PRIMARY KEY (`zakazivanjeID`),
  ADD KEY `masazaID` (`masazaID`),
  ADD KEY `korisnikID` (`korisnikID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `korisnikID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `masaza`
--
ALTER TABLE `masaza`
  MODIFY `masazaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tip`
--
ALTER TABLE `tip`
  MODIFY `tipID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trajanje`
--
ALTER TABLE `trajanje`
  MODIFY `trajanjeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zakazivanje`
--
ALTER TABLE `zakazivanje`
  MODIFY `zakazivanjeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `masaza`
--
ALTER TABLE `masaza`
  ADD CONSTRAINT `masaza_ibfk_1` FOREIGN KEY (`trajanjeID`) REFERENCES `trajanje` (`trajanjeID`),
  ADD CONSTRAINT `masaza_ibfk_2` FOREIGN KEY (`tipID`) REFERENCES `tip` (`tipID`);

--
-- Constraints for table `zakazivanje`
--
ALTER TABLE `zakazivanje`
  ADD CONSTRAINT `zakazivanje_ibfk_1` FOREIGN KEY (`masazaID`) REFERENCES `masaza` (`masazaID`),
  ADD CONSTRAINT `zakazivanje_ibfk_2` FOREIGN KEY (`korisnikID`) REFERENCES `korisnik` (`korisnikID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
