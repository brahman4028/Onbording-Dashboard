-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2025 at 08:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
  `applicantname` varchar(255) DEFAULT NULL,
  `accountname` varchar(100) DEFAULT NULL,
  `bankname` varchar(100) DEFAULT NULL,
  `branchname` varchar(100) DEFAULT NULL,
  `accountnumber` varchar(20) DEFAULT NULL,
  `ifsccode` varchar(25) DEFAULT NULL,
  `accounttype` varchar(20) DEFAULT NULL,
  `bankeject` text NOT NULL DEFAULT 'no',
  `status` varchar(100) DEFAULT NULL,
  `coment` varchar(100) DEFAULT NULL,
  `placevalue` text NOT NULL,
  `merchant_trash` text NOT NULL DEFAULT 'n',
  `kycverification` text NOT NULL DEFAULT 'In Review',
  `documentsverification` text NOT NULL DEFAULT 'In Reviw',
  `bankverification` text NOT NULL DEFAULT 'In Review',
  `kyccomment` varchar(255) DEFAULT NULL,
  `documentscomment` varchar(255) DEFAULT NULL,
  `bankcomment` varchar(255) DEFAULT NULL,
  `accountnameadn` varchar(100) DEFAULT NULL,
  `banknameadn` varchar(100) DEFAULT NULL,
  `branchnameadn` varchar(100) DEFAULT NULL,
  `accountnumberadn` varchar(100) DEFAULT NULL,
  `ifsccodeadn` varchar(100) DEFAULT NULL,
  `accounttypeadn` varchar(100) DEFAULT NULL,
  `bankejectadn` varchar(100) NOT NULL DEFAULT 'no',
  `bankverificationadn` varchar(100) NOT NULL DEFAULT 'In Review',
  `kyccommentadn` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_applications`
--

INSERT INTO `business_applications` (`id`, `entity`, `doi`, `nob`, `businesscategory`, `businesssubcategory`, `gstin`, `pan`, `registeredbsuiness`, `operatingaddress`, `url`, `businessnumber`, `alternnumber`, `supportemail`, `fullname`, `designation`, `number`, `personalemail`, `aadhaarnumber`, `pannumber`, `fullnameadn`, `designationadn`, `numberadn`, `personalemailadn`, `aadhaarnumberadn`, `pannumberadn`, `totalvolume`, `numberofusers`, `sixmonthprojectionamount`, `sixmonthprojectionuser`, `numoftransactions`, `disbursedamount`, `mintransaction`, `maxtransaction`, `thresholdlimit`, `created_at`, `businessname`, `applicantname`, `accountname`, `bankname`, `branchname`, `accountnumber`, `ifsccode`, `accounttype`, `bankeject`, `status`, `coment`, `placevalue`, `merchant_trash`, `kycverification`, `documentsverification`, `bankverification`, `kyccomment`, `documentscomment`, `bankcomment`, `accountnameadn`, `banknameadn`, `branchnameadn`, `accountnumberadn`, `ifsccodeadn`, `accounttypeadn`, `bankejectadn`, `bankverificationadn`, `kyccommentadn`) VALUES
(482738, 'Pvt. Ltd.', '1988-10-12', 'Dolor neque ut conse', 'Unde est harum quo', 'Expedita laboris nec', 'Asperiores ut i', 'ET CULPA R', 'Harum doloribus in c', 'Cum labore ut aut de', 'Obcaecati repellendu', '604', '784', 'vonawujexu@mailinator.com', 'Shelly Nixon', 'Qui error aut maxime', '569', 'sapoqoz@mailinator.com', '552', '248', 'Hector Parks', 'Aperiam accusamus re', '65', 'vaboci@mailinator.com', '141', '146', 'Provident atque inc', '866', '4', '1', 'Labore qui numquam a', 'Similique aliquam et', 'Deserunt neque ut ut', 'Velit enim id iure', 'Repellendus Quam ev', '2025-07-18 10:42:10', 'India Stout', 'Declan Day', 'Lisandra Ayers', 'Libby Cox', 'Pamela Wilkinson', '609', 'Hic itaque blanditii', 'Current Account', 'no', 'In Review', 'Wrong Info', 'sdf', 'n', 'In Review', 'Pending', 'Verified', 'not provided needed documents yet', 'in pending', 'bank account verified', 'sur', 'ban', 'brn', 'acty', 'ifsc', 'tty', 'no', 'In Review', 'sdd');

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
  `annexurebfile` varchar(255) DEFAULT NULL,
  `cancelledchequefile` varchar(100) DEFAULT NULL,
  `aadhaaradnfile` varchar(255) NOT NULL,
  `personalpanadnfile` varchar(255) NOT NULL,
  `signatoryphotoadnfile` varchar(255) NOT NULL,
  `addressadnfile` varchar(255) NOT NULL,
  `signatorysignfile` varchar(255) NOT NULL,
  `signatorysignadnfile` varchar(255) NOT NULL,
  `cancelledchequefileadn` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_documents`
--

INSERT INTO `business_documents` (`id`, `application_id`, `aadhaarfile`, `personalpanfile`, `photograph`, `addressfile`, `coifile`, `moafile`, `aoafile`, `brfile`, `udyamfile`, `gstinfile`, `bofile`, `rentfile`, `annexurebfile`, `cancelledchequefile`, `aadhaaradnfile`, `personalpanadnfile`, `signatoryphotoadnfile`, `addressadnfile`, `signatorysignfile`, `signatorysignadnfile`, `cancelledchequefileadn`) VALUES
(12, 482738, 'uploads/687a2502887c1_aadhar_file.pdf', 'uploads/687a2502898d3_pan_file.pdf', 'uploads/687a390fde1ef_passportphoto.jpg', 'uploads/687a25028b437_electricity_bill.pdf', 'uploads/687a25028c434_coi_file.pdf', 'uploads/687a25028d7c1_moa_file.pdf', 'uploads/687a25028e2f1_ao_file.pdf', 'uploads/687a25028f36c_brfile.pdf', 'uploads/687a25028ffe1_parrot__1_.jpg', 'uploads/687a250290e1c_gstin_file.pdf', 'uploads/687a250291aca_bo_file.pdf', 'uploads/687a2502927d5_rent_file.pdf', 'uploads/687a250293481_Annexure_b.pdf', '', 'uploads/687a2502941c6_aadhar_file.pdf', 'uploads/687a250295144_pan_file.pdf', 'uploads/687a390fded54_passportphoto.jpg', 'uploads/687a2502967d6_electricity_bill.pdf', 'uploads/687a390fdf6b2_signature.jpg', 'uploads/687a390fdfd9b_signature.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `merchant_info`
--

CREATE TABLE `merchant_info` (
  `merchant_id` int(100) NOT NULL,
  `application_id` int(100) DEFAULT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `password` text NOT NULL,
  `date` text NOT NULL DEFAULT current_timestamp(),
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merchant_info`
--

INSERT INTO `merchant_info` (`merchant_id`, `application_id`, `username`, `email`, `phone`, `password`, `date`, `address`) VALUES
(87838, 482738, 'suraj pandey', 'surajp4028@gmail.com', '9876543210', '$2y$10$WpUVOGXtU4Ig2RLLuD7HWe1FqoKoCiQMXgQbupcBqJgxo0pal9Q8a', '2025-07-27 13:49:07', 'ssgkkjkj'),
(87839, NULL, 'brahman', 'brahman4028@gmail.com', '7982624533', '$2y$10$YrehdPh/ZW.VqNR3ksGSBOcSjvSPpaxgx/Oqz9O3pDOfqmYd.T/7G', '2025-08-01 18:26:34', ''),
(87840, NULL, 'dddfd', 'merchant@gmail.com', '9876544565', '$2y$10$Hr7Ox/FystOw4RCF028jR.qMgjlxRuhQEMfVuQdOhCpoR11GNct06', '2025-08-04 14:24:11', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` text NOT NULL DEFAULT 'user',
  `created_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `role`, `created_by`) VALUES
(2, 'admi', 'admin@gmail.com', '$2y$10$1FsaGHdSAjRiYTI.mjXHxe0j.V6y41n8eG/ljahVEiWgyRaupwmAi', '2025-07-09 08:07:44', 'admin', 'admin@gmail.com'),
(3, 'tarun', 'tarun@gmail.com', '$2y$10$7YSLKbPVg21NhnNq7xDeRe9Yc5PnAEU9MMrsVXHoEpKl4gywV/iiC', '2025-07-14 12:12:27', 'user', '');

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
-- Indexes for table `merchant_info`
--
ALTER TABLE `merchant_info`
  ADD PRIMARY KEY (`merchant_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_applications`
--
ALTER TABLE `business_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=482739;

--
-- AUTO_INCREMENT for table `business_documents`
--
ALTER TABLE `business_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `merchant_info`
--
ALTER TABLE `merchant_info`
  MODIFY `merchant_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87841;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
