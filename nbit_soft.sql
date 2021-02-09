-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 09, 2021 at 07:00 PM
-- Server version: 8.0.18
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nbit_soft`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banks`
--

DROP TABLE IF EXISTS `tbl_banks`;
CREATE TABLE IF NOT EXISTS `tbl_banks` (
  `bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(255) NOT NULL,
  `bank_code` int(11) NOT NULL,
  PRIMARY KEY (`bank_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_banks`
--

INSERT INTO `tbl_banks` (`bank_id`, `bank_name`, `bank_code`) VALUES
(1, 'Sampath Bank', 7850),
(2, 'Bank of Ceylon', 5678);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branches`
--

DROP TABLE IF EXISTS `tbl_branches`;
CREATE TABLE IF NOT EXISTS `tbl_branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bank_id` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_code` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_branches`
--

INSERT INTO `tbl_branches` (`id`, `bank_id`, `branch_name`, `branch_code`) VALUES
(1, 1, 'Test Branch', '0001');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
