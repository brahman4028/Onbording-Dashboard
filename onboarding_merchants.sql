-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/

--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2025 at 03:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12



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
  `status` varchar(100) DEFAULT NULL,
  `coment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_applications`
--

INSERT INTO `business_applications` (`id`, `entity`, `doi`, `nob`, `businesscategory`, `businesssubcategory`, `gstin`, `pan`, `registeredbsuiness`, `operatingaddress`, `url`, `businessnumber`, `alternnumber`, `supportemail`, `fullname`, `designation`, `number`, `personalemail`, `aadhaarnumber`, `pannumber`, `fullnameadn`, `designationadn`, `numberadn`, `personalemailadn`, `aadhaarnumberadn`, `pannumberadn`, `totalvolume`, `numberofusers`, `sixmonthprojectionamount`, `sixmonthprojectionuser`, `numoftransactions`, `disbursedamount`, `mintransaction`, `maxtransaction`, `thresholdlimit`, `created_at`, `businessname`, `applicantname`, `accountname`, `bankname`, `branchname`, `accountnumber`, `ifsccode`, `accounttype`, `status`, `coment`) VALUES
(482731, 'Partnership', '2025-07-18', 'e7txIwOr3', 'r5phztofk9', 'gydpkdhCmS', 'Ptt4uWNZBP', 'EE1iWWhM8j', 'vtBhVFaUA6', 'd9atk3e286', '1zj8qKLeRc', '5157291991', '7556627814', 'w6hbg@dins.com', 'Bi2LgAfGjU', 'GrkUJ3ueMZ', '4269168665', 'anixz@rute.com', '8767708018', '3085403434', 'UwGSHActNu', '8gwpoxHadu', '4350358659', 'bdrli@bkhw.com', '5655098026', '6013692257', '8KkqLnGcSD', '3738034388', 'hA6PHtUWau', 'TGPHmBwBcy', 'kkCGUIG7fP', 'EaybArr6HB', '3C8SiG8j2U', 'nLOSXMCmcS', 'vRSN1d3G06', '2025-07-13 08:23:47', 'ABC Company', 'rS2Wmwzugj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(482732, 'Public Ltd.', '2001-12-14', 'Perferendis non aliq', 'Sit ex maxime amet', 'Corrupti dolorum at', 'Obcaecati corpo', 'SIMILIQUE ', 'Sint explicabo Inve', 'Ex quo nihil sed qui', 'Culpa tenetur commod', '126', '329', 'fure@mailinator.com', 'Carter Hill', 'Amet perspiciatis', '99', 'dobelix@mailinator.com', '936', '201', 'Bianca Lynn', 'Proident odit conse', '172', 'nefarobik@mailinator.com', '564', '708', 'Autem ex in ipsa be', '675', '6', '9', 'Rerum dolore eius vo', 'Sequi porro dicta fa', 'Omnis tempor ea odit', 'Atque ullam illum a', 'Ab voluptas magni nu', '2025-07-14 09:25:45', 'Inez Houston', 'Sonia Olson', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(482733, 'Pvt. Ltd.', '1980-01-23', 'Et molestiae quaerat', 'Voluptates sapiente', 'Sunt laudantium vo', 'Perferendis mai', 'DO CONSEQU', 'Ullam earum accusamu', 'Irure aliquam qui ma', 'Quisquam ut non corp', '485', '754', 'zocusat@mailinator.com', 'Channing Parrish', 'Architecto reprehend', '408', 'hofic@mailinator.com', '247', '445', 'Oscar Olson', 'Hic molestiae rerum', '498', 'vuwozuguf@mailinator.com', '720', '393', 'Nihil repellendus V', '522', '3', '7', 'Facilis et quaerat n', 'Nemo iusto voluptate', 'Ex quia nemo vitae v', 'Dolor voluptate nemo', 'Tempora aut a in hic', '2025-07-14 09:30:49', 'Galena Beasley', 'Linda Forbes', 'Otto Calderon', 'Jenna Stafford', 'Brenna Norton', '487', 'Est est autem aut in', 'Current Account', NULL, NULL),
(482734, 'Proprietorship', '2025-02-09', 'Exercitation blandit', 'Corrupti consectetu', 'Itaque vel est labor', 'Recusandae At o', 'RERUM ENIM', 'Sint ex enim facili', 'Aliquam quis aut com', 'Rerum id enim aliqua', '598', '181', 'gomolek@mailinator.com', 'Vivian Roman', 'Modi voluptates prov', '555', 'silo@mailinator.com', '66', '705', 'Noah Terry', 'Nostrud dicta odio s', '709', 'xucotusig@mailinator.com', '973', '518', 'Deserunt suscipit ex', '176', '11', '1', 'Rem harum voluptate', 'Ut quae eligendi asp', 'Totam temporibus vol', 'Magnam elit corpori', 'Perspiciatis ut aut', '2025-07-14 09:34:20', 'Hilel Wilkerson', 'Brynn Gonzales', 'Silas Hooper', 'Charity Jimenez', 'Phyllis Lott', '312', 'Iste modi enim volup', 'Current Account', NULL, NULL),
(482735, 'Public Ltd.', '2020-01-24', 'Consectetur consect', 'Occaecat et eiusmod', 'Ullamco qui voluptat', 'Voluptate id la', 'VERO DOLOR', 'Adipisicing laborum', 'Praesentium nesciunt', 'Consequat Officiis', '227', '359', 'rohuca@mailinator.com', 'Kasimir Munoz', 'Recusandae Amet no', '424', 'hodeva@mailinator.com', '822', '671', 'Dexter Salazar', 'Ut est rerum aut dig', '995', 'zoxixujy@mailinator.com', '804', '860', 'Eius nesciunt eum f', '702', '9', '4', 'Pariatur Voluptatum', 'Soluta dolorem odit', 'Molestias expedita o', 'Id incididunt consec', 'Dolore ut earum in a', '2025-07-14 09:41:21', 'Kuame Barrett', 'Walter Nieves', 'Cade Holman', 'Veronica Langley', 'Yeo Russo', '482', 'Quia dolores impedit', 'Current Account', NULL, NULL),
(482736, 'Public Ltd.', '1971-05-14', 'Enim molestias ea at', 'Dolorem animi neque', 'Molestiae animi atq', 'Ex consequatur ', 'ASPERNATUR', 'Mollitia ut porro pr', 'Alias id id praesen', 'Et labore sunt sunt', '88', '935', 'qapu@mailinator.com', 'Kitra Clements', 'Cupidatat dignissimo', '48', 'tozanin@mailinator.com', '652', '477', 'Jamalia Berg', 'Saepe non ex vero ni', '170', 'qojiqab@mailinator.com', '270', '430', 'Perferendis nemo sae', '824', '4', '7', 'Qui sed pariatur Mo', 'Repellendus Totam q', 'Possimus laudantium', 'Harum culpa ipsum vo', 'Facilis perferendis', '2025-07-14 09:43:30', 'Colt Horne', 'Gloria Phelps', 'Brandon Mcbride', 'Zephr Vaughan', 'Victoria Carpenter', '251', 'Consequat Alias qua', 'Current Account', NULL, NULL);

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
  `cancelledchequefile` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `business_documents`
--

INSERT INTO `business_documents` (`id`, `application_id`, `aadhaarfile`, `personalpanfile`, `photograph`, `addressfile`, `coifile`, `moafile`, `aoafile`, `brfile`, `udyamfile`, `gstinfile`, `bofile`, `rentfile`, `annexurebfile`, `cancelledchequefile`) VALUES
(6, 482731, 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', NULL),
(7, 482732, 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', NULL),
(8, 482734, 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'uploads/6874cf1cbbe09_ANNEXURE A AND B.pdf'),
(9, 482735, 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'No file or error', 'uploads/6874d0c1218b9_ANNEXURE A AND B.pdf'),
(10, 482736, '', '', '', '', '', '', '', '', '', '', '', '', 'uploads/6874d1422fa91_ANNEXURE_A_AND_B.pdf', 'uploads/6874d1422fa91_ANNEXURE_A_AND_B.pdf');

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
  `role` text NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `role`) VALUES
(2, 'admin', 'admin@gmail.com', '$2y$10$APEfRZexPLZZTEEKMt8uXOQkVvurUwYcerN1XhzyVLDr6tTxTIyXS', '2025-07-09 08:07:44', 'admin'),
(3, 'tarun', 'tarun@gmail.com', '$2y$10$7YSLKbPVg21NhnNq7xDeRe9Yc5PnAEU9MMrsVXHoEpKl4gywV/iiC', '2025-07-14 12:12:27', 'user');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=482737;

--
-- AUTO_INCREMENT for table `business_documents`
--
ALTER TABLE `business_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
