-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 19, 2018 at 01:31 PM
-- Server version: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.2.7-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simona_majstori`
--

-- --------------------------------------------------------

--
-- Table structure for table `glavni_zanat`
--

CREATE TABLE `glavni_zanat` (
  `id` int(3) NOT NULL,
  `zanat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `glavni_zanat`
--

INSERT INTO `glavni_zanat` (`id`, `zanat`) VALUES
(8, 'ELEKTRIÄŒAR'),
(9, 'MOLER'),
(10, 'ZIDAR'),
(11, 'GIPSAR'),
(12, 'VODOINSTALATER'),
(13, 'KERAMIÄŒAR'),
(14, 'STOLAR'),
(15, 'PARKETAR'),
(16, 'AUTO LIMAR'),
(17, 'TAPETAR');

-- --------------------------------------------------------

--
-- Table structure for table `inbox_k2042363`
--

CREATE TABLE `inbox_k2042363` (
  `id` int(5) NOT NULL,
  `vreme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `posiljalac` varchar(20) NOT NULL,
  `primalac` varchar(20) NOT NULL,
  `poruka` text,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inbox_k5606025`
--

CREATE TABLE `inbox_k5606025` (
  `id` int(5) NOT NULL,
  `vreme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `posiljalac` varchar(20) NOT NULL,
  `primalac` varchar(20) NOT NULL,
  `poruka` text,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inbox_k6114419`
--

CREATE TABLE `inbox_k6114419` (
  `id` int(5) NOT NULL,
  `vreme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `posiljalac` varchar(20) NOT NULL,
  `primalac` varchar(20) NOT NULL,
  `poruka` text,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inbox_k6658911`
--

CREATE TABLE `inbox_k6658911` (
  `id` int(5) NOT NULL,
  `vreme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `posiljalac` varchar(20) NOT NULL,
  `primala` varchar(20) NOT NULL,
  `poruka` text,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inbox_k8463834`
--

CREATE TABLE `inbox_k8463834` (
  `id` int(5) NOT NULL,
  `vreme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `posiljalac` varchar(20) NOT NULL,
  `primalac` varchar(20) NOT NULL,
  `poruka` text,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inbox_k8582216`
--

CREATE TABLE `inbox_k8582216` (
  `id` int(5) NOT NULL,
  `vreme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `posiljalac` varchar(20) NOT NULL,
  `primalac` varchar(20) NOT NULL,
  `poruka` text,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inbox_m4016053`
--

CREATE TABLE `inbox_m4016053` (
  `id` int(5) NOT NULL,
  `vreme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `posiljalac` varchar(20) NOT NULL,
  `primalac` varchar(20) NOT NULL,
  `poruka` text,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inbox_m4049262`
--

CREATE TABLE `inbox_m4049262` (
  `id` int(5) NOT NULL,
  `vreme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `posiljalac` varchar(20) NOT NULL,
  `primalac` varchar(20) NOT NULL,
  `poruka` text,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inbox_m7580092`
--

CREATE TABLE `inbox_m7580092` (
  `id` int(5) NOT NULL,
  `vreme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `posiljalac` varchar(20) NOT NULL,
  `primalac` varchar(20) NOT NULL,
  `poruka` text,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inbox_m9390713`
--

CREATE TABLE `inbox_m9390713` (
  `id` int(5) NOT NULL,
  `vreme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `posiljalac` varchar(20) NOT NULL,
  `primalac` varchar(20) NOT NULL,
  `poruka` text,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `id` int(2) NOT NULL,
  `kategorija` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`id`, `kategorija`) VALUES
(1, 'klijenti'),
(2, 'majstori');

-- --------------------------------------------------------

--
-- Table structure for table `klijenti`
--

CREATE TABLE `klijenti` (
  `id` int(5) NOT NULL,
  `ident` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `grad` varchar(50) NOT NULL,
  `telefon1` varchar(20) NOT NULL,
  `telefon2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klijenti`
--

INSERT INTO `klijenti` (`id`, `ident`, `email`, `password`, `username`, `ime`, `prezime`, `adresa`, `grad`, `telefon1`, `telefon2`) VALUES
(1, 'k5606025', 'yt5ytt@gmail.com', '123456', 'Aleksandar VA', 'Aleksandar', 'Safranec', 'nas. Milorada Pavlovica 15-b', 'Valjevo', '0605991001', ''),
(2, 'k2042363', 'kimilawyer@gmail.com', 'Safranec', 'Milos', 'Milos', 'Vuksanovic', 'Uralska 30', 'Beograd', '0655551060', ''),
(3, 'k6114419', 'studiomkaraburma@gmail.com', 'dortmund', 'borusia', 'Marina', 'Vuksanovic', 'Uralska 30', 'Beograd', '0655551060', ''),
(4, 'k8582216', 'milosnetvuksanovic@gmail.com', 'mustaci', 'majstor brka', 'Stole', 'Petrovic', 'Ravnogorska', 'Beograd', '255554', ''),
(5, 'k8463834', 'gocavuksanovic59@gmail.com', 'gocabeko', 'Goca', 'Gordana', 'Vuksanovic', 'Dr Drage Ljocic 6', 'Beograd', '0655551060', ''),
(12, 'k6658911', 'kolubarac77@yahoo.com', 'sna2405976', 'AlexSafranec', 'Momak', 'sa Kolubare', 'Neka Tamo 25', 'Neki Tamo', '123456', '3456789');

-- --------------------------------------------------------

--
-- Table structure for table `majstori`
--

CREATE TABLE `majstori` (
  `id` int(5) NOT NULL,
  `ident` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `grad` varchar(50) NOT NULL,
  `telefon` varchar(50) NOT NULL,
  `opis` text,
  `delatnost` varchar(50) NOT NULL,
  `dodatna_delatnost` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `majstori`
--

INSERT INTO `majstori` (`id`, `ident`, `email`, `password`, `username`, `ime`, `prezime`, `adresa`, `grad`, `telefon`, `opis`, `delatnost`, `dodatna_delatnost`) VALUES
(1, 'm7580092', 'yt5ytt@gmail.com', '123456', 'yt5ytt', 'Aleksandar', 'Safranec', 'nas. Milorada Pavlovica 15-b', 'Valjevo', '0605991001', 'Ovo je samo kratak opis delatnosti koju obavljam.', 'MOLER', NULL),
(2, 'm4016053', 'alex.yt5ytt@gmail.com', '123456', 'yt5ytt', 'Aleksandar', 'Safranec', 'nas. Milorada Pavlovica 15-b', 'Valjevo', '0605991001', 'Ovo je samo kratak opis delatnosti koju obavljam.\r\nTrebalo bi da ide ovaj novi red.', 'AUTO LIMAR', NULL),
(3, 'm4049262', 'milosnetvuksanovic@gmail.com', 'mustaci', 'majstor brka', 'Stole', 'Petrovic', 'Ravnogorska', 'Beograd', '255554', 'Keramicar', 'KERAMIÄŒAR', NULL),
(4, 'm9390713', 'gocavuksanovic59@gmail.com', 'gocabeko', 'Goca', 'Gordana', 'Vuksanovic', 'Dr Drage Ljocic 6', 'Beograd', '0655551060', 'Tapetar', 'TAPETAR', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oglas4401581`
--

CREATE TABLE `oglas4401581` (
  `id` int(5) NOT NULL,
  `vreme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `majstor` varchar(20) NOT NULL,
  `ponuda` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oglas6517893`
--

CREATE TABLE `oglas6517893` (
  `id` int(5) NOT NULL,
  `vreme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `majstor` varchar(20) NOT NULL,
  `ponuda` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `oglasi`
--

CREATE TABLE `oglasi` (
  `id` int(5) NOT NULL,
  `vreme` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `identoglasa` varchar(20) NOT NULL,
  `zanat` varchar(20) NOT NULL,
  `opis` text,
  `slika1` varchar(100) NOT NULL,
  `slika2` varchar(100) NOT NULL,
  `slika3` varchar(100) NOT NULL,
  `klijent` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oglasi`
--

INSERT INTO `oglasi` (`id`, `vreme`, `identoglasa`, `zanat`, `opis`, `slika1`, `slika2`, `slika3`, `klijent`) VALUES
(1, '2018-08-19 10:02:05', 'oglas4401581', 'AUTO LIMAR', 'Ovo je samo kratak opis posla koji treba obaviti', 'Prva slika.jpeg', 'Druga slika.jpg', 'Treca slika.jpg', 'k5606025'),
(2, '2018-08-19 10:03:25', 'oglas6517893', 'AUTO LIMAR', 'Ovo je isto kratak opis, ali sa novim redom\r\n\r\nNovi red\r\nNovi red\r\nNovi red', 'Tigar_2.jpg', '96c2mr.jpg', '090712084146_692041.jpg', 'k5606025');

-- --------------------------------------------------------

--
-- Table structure for table `pomocni_zanat`
--

CREATE TABLE `pomocni_zanat` (
  `id` int(3) NOT NULL,
  `zanat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pomocni_zanat`
--

INSERT INTO `pomocni_zanat` (`id`, `zanat`) VALUES
(13, 'ALU i PVC STOLARIJA'),
(14, 'AUTO FARBANjE'),
(15, 'ARMIRAÄŒ'),
(16, 'BAÅ TOVAN'),
(17, 'BRAVAR'),
(18, 'VARIOC'),
(19, 'VISINSKI RADNIK'),
(20, 'DRVOSEÄŒA'),
(21, 'FASADER'),
(22, 'FIZIÄŒKI RADOVI'),
(23, 'GEODETSKE USLUGE'),
(24, 'ISKOP / KOPANjE'),
(25, 'IZRADA BAZENA I FONTANA'),
(26, 'INSTALIRANjE GREJANjA'),
(27, 'KOVAÄŒ'),
(28, 'KROVNI RADOVI'),
(29, 'LIVAC'),
(30, 'LIMAR'),
(31, 'MONTER'),
(32, 'MONTER KLIMA UREÄAJA'),
(33, 'MAÅ INBRAVAR'),
(34, 'METALOSTRUGAR'),
(35, 'DIMNIÄŒAR'),
(36, 'ODNOÅ ENjE OTPADA'),
(37, 'POMOÄ†NI RADNIK'),
(38, 'PRANjE PODNIH POVRÅ INA'),
(39, 'PRANjE TEPIHA'),
(40, 'PEÄŒATOREZAC'),
(41, 'POSTAVLjANjE IZOLACIJE'),
(42, 'POSTAVLjANjE PODNIH POVRÅ INA'),
(43, 'POSTAVLjANjE LAMINATA'),
(44, 'POSTAVLjANjE TENDI'),
(45, 'RUÅ ENjE OBJEKATA'),
(46, 'STAKLOREZAC'),
(47, 'SEÄŒENjE I BUÅ ENjE'),
(48, 'SEÄŒENjE BETONA'),
(50, 'SELIDBE I TRANSPORT '),
(51, 'SERVISER LIFTOVA'),
(52, 'SERVISER KLIMA UREÄAJA'),
(53, 'TESAR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `glavni_zanat`
--
ALTER TABLE `glavni_zanat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox_k2042363`
--
ALTER TABLE `inbox_k2042363`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox_k5606025`
--
ALTER TABLE `inbox_k5606025`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox_k6114419`
--
ALTER TABLE `inbox_k6114419`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox_k6658911`
--
ALTER TABLE `inbox_k6658911`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox_k8463834`
--
ALTER TABLE `inbox_k8463834`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox_k8582216`
--
ALTER TABLE `inbox_k8582216`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox_m4016053`
--
ALTER TABLE `inbox_m4016053`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox_m4049262`
--
ALTER TABLE `inbox_m4049262`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox_m7580092`
--
ALTER TABLE `inbox_m7580092`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox_m9390713`
--
ALTER TABLE `inbox_m9390713`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klijenti`
--
ALTER TABLE `klijenti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majstori`
--
ALTER TABLE `majstori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oglas4401581`
--
ALTER TABLE `oglas4401581`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oglas6517893`
--
ALTER TABLE `oglas6517893`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oglasi`
--
ALTER TABLE `oglasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pomocni_zanat`
--
ALTER TABLE `pomocni_zanat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `glavni_zanat`
--
ALTER TABLE `glavni_zanat`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `inbox_k2042363`
--
ALTER TABLE `inbox_k2042363`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inbox_k5606025`
--
ALTER TABLE `inbox_k5606025`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inbox_k6114419`
--
ALTER TABLE `inbox_k6114419`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inbox_k6658911`
--
ALTER TABLE `inbox_k6658911`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inbox_k8463834`
--
ALTER TABLE `inbox_k8463834`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inbox_k8582216`
--
ALTER TABLE `inbox_k8582216`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inbox_m4016053`
--
ALTER TABLE `inbox_m4016053`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inbox_m4049262`
--
ALTER TABLE `inbox_m4049262`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inbox_m7580092`
--
ALTER TABLE `inbox_m7580092`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inbox_m9390713`
--
ALTER TABLE `inbox_m9390713`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `klijenti`
--
ALTER TABLE `klijenti`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `majstori`
--
ALTER TABLE `majstori`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `oglas4401581`
--
ALTER TABLE `oglas4401581`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oglas6517893`
--
ALTER TABLE `oglas6517893`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oglasi`
--
ALTER TABLE `oglasi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pomocni_zanat`
--
ALTER TABLE `pomocni_zanat`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
