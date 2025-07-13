-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 13, 2025 at 09:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onboarding_merchants`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_applications`
--

CREATE TABLE `business_applications` (
  `id` int(11) NOT NULL,
  `entity` varchar(100) DEFAULT NULL,
  `doi` date DEFAULT NULL,
  `nob` varchar(100) DEFAULT NULL,
  `businesscategory` varchar(100) DEFAULT NULL,
  `businesssubcategory` varchar(100) DEFAULT NULL,
  `gstin` varchar(15) DEFAULT NULL,
  `pan` varchar(10) DEFAULT NULL,
  `registeredbsuiness` text DEFAULT NULL,
  `operatingaddress` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `businessnumber` varchar(15) DEFAULT NULL,
  `alternnumber` varchar(15) DEFAULT NULL,
  `supportemail` varchar(100) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `number` varchar(15) DEFAULT NULL,
  `personalemail` varchar(100) DEFAULT NULL,
  `aadhaarnumber` varchar(12) DEFAULT NULL,
  `pannumber` varchar(10) DEFAULT NULL,
  `fullnameadn` varchar(100) DEFAULT NULL,
  `designationadn` varchar(100) DEFAULT NULL,
  `numberadn` varchar(15) DEFAULT NULL,
  `personalemailadn` varchar(100) DEFAULT NULL,
  `aadhaarnumberadn` varchar(12) DEFAULT NULL,
  `pannumberadn` varchar(10) DEFAULT NULL,
  `totalvolume` varchar(50) DEFAULT NULL,
  `numberofusers` varchar(50) DEFAULT NULL,
  `sixmonthprojectionamount` varchar(50) DEFAULT NULL,
  `sixmonthprojectionuser` varchar(50) DEFAULT NULL,
  `numoftransactions` varchar(50) DEFAULT NULL,
  `disbursedamount` varchar(50) DEFAULT NULL,
  `mintransaction` varchar(50) DEFAULT NULL,
  `maxtransaction` varchar(50) DEFAULT NULL,
  `thresholdlimit` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `businessname` varchar(255) DEFAULT NULL,
  `applicantname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_applications`
--

INSERT INTO `business_applications` (`id`, `entity`, `doi`, `nob`, `businesscategory`, `businesssubcategory`, `gstin`, `pan`, `registeredbsuiness`, `operatingaddress`, `url`, `businessnumber`, `alternnumber`, `supportemail`, `fullname`, `designation`, `number`, `personalemail`, `aadhaarnumber`, `pannumber`, `fullnameadn`, `designationadn`, `numberadn`, `personalemailadn`, `aadhaarnumberadn`, `pannumberadn`, `totalvolume`, `numberofusers`, `sixmonthprojectionamount`, `sixmonthprojectionuser`, `numoftransactions`, `disbursedamount`, `mintransaction`, `maxtransaction`, `thresholdlimit`, `created_at`, `businessname`, `applicantname`) VALUES
(482731, 'Partnership', '2025-07-18', 'e7txIwOr3', 'r5phztofk9', 'gydpkdhCmS', 'Ptt4uWNZBP', 'EE1iWWhM8j', 'vtBhVFaUA6', 'd9atk3e286', '1zj8qKLeRc', '5157291991', '7556627814', 'w6hbg@dins.com', 'Bi2LgAfGjU', 'GrkUJ3ueMZ', '4269168665', 'anixz@rute.com', '8767708018', '3085403434', 'UwGSHActNu', '8gwpoxHadu', '4350358659', 'bdrli@bkhw.com', '5655098026', '6013692257', '8KkqLnGcSD', '3738034388', 'hA6PHtUWau', 'TGPHmBwBcy', 'kkCGUIG7fP', 'EaybArr6HB', '3C8SiG8j2U', 'nLOSXMCmcS', 'vRSN1d3G06', '2025-07-13 08:23:47', 'e7txIwOr3', 'rS2Wmwzugj');

-- --------------------------------------------------------

--
-- Table structure for table `business_documents`
--

CREATE TABLE `business_documents` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `aadhaarfile` varchar(255) DEFAULT NULL,
  `personalpanfile` varchar(255) DEFAULT NULL,
  `photograph` varchar(255) DEFAULT NULL,
  `addressfile` varchar(255) DEFAULT NULL,
  `coifile` varchar(255) DEFAULT NULL,
  `moafile` varchar(255) DEFAULT NULL,
  `aoafile` varchar(255) DEFAULT NULL,
  `brfile` varchar(255) DEFAULT NULL,
  `udyamfile` varchar(255) DEFAULT NULL,
  `gstinfile` varchar(255) DEFAULT NULL,
  `bofile` varchar(255) DEFAULT NULL,
  `rentfile` varchar(255) DEFAULT NULL,
  `annexurebfile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_documents`
--

INSERT INTO `business_documents` (`id`, `application_id`, `aadhaarfile`, `personalpanfile`, `photograph`, `addressfile`, `coifile`, `moafile`, `aoafile`, `brfile`, `udyamfile`, `gstinfile`, `bofile`, `rentfile`, `annexurebfile`) VALUES
(6, 482731, 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_applications`
--
ALTER TABLE `business_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_documents`
--
ALTER TABLE `business_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `application_id` (`application_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_applications`
--
ALTER TABLE `business_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=482732;

--
-- AUTO_INCREMENT for table `business_documents`
--
ALTER TABLE `business_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business_documents`
--
ALTER TABLE `business_documents`
  ADD CONSTRAINT `business_documents_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `business_applications` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
