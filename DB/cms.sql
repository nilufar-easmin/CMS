-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2024 at 02:36 AM
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
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `case_details`
--

CREATE TABLE `case_details` (
  `case_details_id` int(10) NOT NULL,
  `court_type_id` int(10) NOT NULL,
  `case_type_id` int(10) NOT NULL,
  `case_no` varchar(32) NOT NULL,
  `case_summary` varchar(256) NOT NULL,
  `court_id` int(10) NOT NULL,
  `case_status_id` int(10) NOT NULL,
  `rule_issue_date` date NOT NULL,
  `interim_order_date` date NOT NULL,
  `judgment_date` date NOT NULL,
  `power_issue_date` date NOT NULL,
  `petitioners_name` varchar(64) NOT NULL,
  `respondent_name` varchar(64) NOT NULL,
  `attachment` varbinary(1000) NOT NULL,
  `interim_order` varchar(256) NOT NULL,
  `lawyer_id` int(10) NOT NULL,
  `judgment_summary` varchar(256) NOT NULL,
  `next_date` varchar(32) NOT NULL,
  `appeal_date` varchar(32) NOT NULL,
  `appeal_order` varchar(256) NOT NULL,
  `appeal_judgment_date` varchar(32) NOT NULL,
  `appeal_judgment` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `case_details`
--

INSERT INTO `case_details` (`case_details_id`, `court_type_id`, `case_type_id`, `case_no`, `case_summary`, `court_id`, `case_status_id`, `rule_issue_date`, `interim_order_date`, `judgment_date`, `power_issue_date`, `petitioners_name`, `respondent_name`, `attachment`, `interim_order`, `lawyer_id`, `judgment_summary`, `next_date`, `appeal_date`, `appeal_order`, `appeal_judgment_date`, `appeal_judgment`) VALUES
(0, 2, 2, '214 of 2024', 'Judgment and order dated 16.07.2002 passed by a Division Bench of the HCD making the rule absolute in Writ petition No. 2528 of 1999 filed by the Writ petitioner/respondent impugning the mobile-phone bill issued by the respondent No. 1, petitioner containi', 1, 6, '2024-08-14', '2024-08-28', '0000-00-00', '2024-08-30', 'Kazi Bashir Ahmed', 'Minhaz Ahmed', 0x43657274696669656420636f7079206f662052756c65202620496e746572696d204f726465722e706466, 'Passed on 06-01-2004. Operation of judgment and order dated 16-7-2002 passed by the High Court Division in Writ Petition No. 2528 of 1999 is stayed till the disposal of the appeal.', 3, '', '2024-09-10', '', '', '', ''),
(0, 1, 2, '13400  of 2024', '1.	Inaction of the respondents in allowing the application for permission to import mobile phone.  2.	For a direction upon the respondent No. 2 to allow/consider the application of the petitioner to import mobile phone according to invoice.', 11, 6, '2024-08-14', '0000-00-00', '0000-00-00', '2024-08-16', 'Amreen Rakhi ', 'PTD, represented by Secretary, PTD & Others', 0x43657274696669656420636f7079206f662052756c65202620496e746572696d204f726465722e706466, 'Pending hearing of the Rule, operation of the letter dated 20.04.2014 and 21.04.2014 (Annexure-C-9 and C-10) issued by the Respondent No. 6 so far as they relate to the cancellation of license and stoppage of business of the petitioners is stayed for a per', 3, '', '2024-09-19', '', '', '', ''),
(0, 3, 27, '146 of 2023', 'Failure/Inaction of the Respondents in not releasing the petitioner’s duty paid goods imported under Letter of Credit No. 089112010049 dated 23.02.2012 and covered under Bill of Entry No. C-96554 dated 15.04.2012.', 18, 6, '2024-08-09', '2024-08-14', '0000-00-00', '2024-08-08', 'Abrar Hossain', 'Rifa Rounak', 0x43657274696669656420636f7079206f662052756c65202620496e746572696d204f726465722e706466, 'Passed on 22-05-2012 to release the goods of the petitioner within 03 days from the receipt of the copy of this order.', 5, '', '2024-09-25', '', '', '', ''),
(0, 6, 29, '15500 of 2022', '1. The Customs Act, 1969.  2. Letter bearing No. 1(1) Shu: Nee: & Ba:/2010/478(11) dated 20.09.2011 (Annexure-A) issued by the respondent No. 3 directing the respondent No. 1 to classify capital machineries imported as  telecommunication equipment accessor', 25, 6, '2024-07-31', '2024-08-21', '0000-00-00', '2024-07-18', 'Fahim Foysal', 'Wasiuzzaman', 0x43657274696669656420636f7079206f662052756c65202620496e746572696d204f726465722e706466, 'Let this Writ Petition be heard and disposed of analogously with Writ Petition Nos. 6336, 5759 and 5760 of 2012.', 8, '', '2024-09-19', '', '', '', ''),
(0, 2, 5, '684 of 2020', 'Judgment and order dated 19-01-2023 passed by the High Court Division.', 2, 6, '2024-08-14', '2024-08-21', '0000-00-00', '2024-08-22', 'Masum Alam', 'Nirjhor Chowdhury', 0x43657274696669656420636f7079206f662052756c65202620496e746572696d204f726465722e706466, 'Passed on 11-08-22. Hon’ble Judge-in-Chamber was pleased to grant ‘Status-Quo’ on the subject-matter.', 12, '', '2024-09-27', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `case_status`
--

CREATE TABLE `case_status` (
  `case_status_id` int(10) NOT NULL,
  `case_status_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `case_status`
--

INSERT INTO `case_status` (`case_status_id`, `case_status_name`) VALUES
(6, 'Pending'),
(7, 'Disposed');

-- --------------------------------------------------------

--
-- Table structure for table `case_type`
--

CREATE TABLE `case_type` (
  `case_type_id` int(11) NOT NULL,
  `case_type_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `case_type`
--

INSERT INTO `case_type` (`case_type_id`, `case_type_name`) VALUES
(1, 'Writ Petition'),
(2, 'Civil Appeal '),
(4, 'First Appeal'),
(5, 'First Misc Appeal'),
(6, 'Second Appeal'),
(7, 'Second Misc Appeal'),
(8, 'Civil Rule'),
(9, 'Civil Revision'),
(10, 'Civil Order'),
(11, 'Civil Review'),
(12, 'Criminal Rule'),
(13, 'Criminal Misc (Suo Muto) Rule'),
(14, 'criminal Appeal (H)'),
(15, 'Jail Appeal'),
(16, 'Govt. Appeal'),
(17, 'Suo Muto'),
(18, 'Suo Muto Contempt Rule'),
(19, 'Company Matter'),
(20, 'Customs Appeal'),
(21, 'Income Tax Reference'),
(22, 'VAT Appeal'),
(23, 'Admiralty Suit'),
(24, 'Transfer Petition'),
(25, 'Civil Petition'),
(26, 'Civil Suit'),
(27, 'Money Suit'),
(28, 'Certificate Case (PDR)'),
(29, 'Labour Court Cases'),
(30, 'N.I Act Related Case'),
(31, 'Arbitration Case'),
(32, 'Administrative Tribunal Case');

-- --------------------------------------------------------

--
-- Table structure for table `court_info`
--

CREATE TABLE `court_info` (
  `court_id` int(11) NOT NULL,
  `court_type_id` int(11) NOT NULL,
  `justice_name` varchar(64) NOT NULL,
  `court_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `court_info`
--

INSERT INTO `court_info` (`court_id`, `court_type_id`, `justice_name`, `court_name`) VALUES
(1, 2, 'Syed Refaat Ahmed', ''),
(2, 2, 'Justice Md. Ashfaqul Islam', ''),
(3, 2, ' Zubayer Rahman Chowdhury', ''),
(4, 2, 'Syed Md. Ziaul Karim', ''),
(5, 2, 'Md. Rezaul Haque', ''),
(6, 2, 'S. M. Emdadul Hoque', ''),
(7, 1, ' Salma Masud Chowdhury', ''),
(8, 1, 'A. K. M. Asaduzzaman', ''),
(9, 1, ' Md. Ataur Rahman Khan', ''),
(10, 1, 'Sheikh Abdul Awal', ''),
(11, 1, 'Mamnoon Rahman', ''),
(12, 1, 'Farah Mahbub', ''),
(13, 1, 'Naima Haider', ''),
(14, 1, 'Md. Rezaul Hasan', ''),
(15, 1, ' Abdur Rob', ''),
(16, 1, 'Quazi Reza-Ul Hoque', ''),
(17, 1, ' A.K.M. Zahirul Hoque', ''),
(18, 3, '', 'District and Sessions Judge Court, Dhaka '),
(19, 3, '', 'Ad. District and Sessions Judge 1st Court, Dhaka'),
(20, 3, '', 'Joint District and Sessions Judge 1st Court , Dhaka'),
(21, 3, '', 'Senior Assistant Judge 1st Court , Dhaka'),
(22, 3, '', 'Senior Assistant Judge 2nd Addition and Family Court'),
(23, 6, '', 'First Labour Court, Chittagong'),
(24, 6, '', 'Second Labour Court, Dhaka'),
(25, 6, '', 'Labour Appellate Tribunal'),
(26, 7, '', 'General Certificate Officer, Dhaka '),
(27, 4, '', 'Administrative Tribunal-1, Dhaka'),
(28, 4, '', ' Administrative Appellate Tribunal');

-- --------------------------------------------------------

--
-- Table structure for table `court_type`
--

CREATE TABLE `court_type` (
  `court_type_id` int(10) NOT NULL,
  `court_type_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `court_type`
--

INSERT INTO `court_type` (`court_type_id`, `court_type_name`) VALUES
(1, 'High Court Division'),
(2, 'Appellate Division '),
(3, 'Lower Court'),
(4, 'Administrative Tribunal'),
(6, 'Labour Court'),
(7, 'Gen. Certificate Officer Court '),
(10, 'Divisional Cases');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_info`
--

CREATE TABLE `lawyer_info` (
  `lawyer_id` int(10) NOT NULL,
  `lawyer_name` varchar(64) NOT NULL,
  `lawyer_email` varchar(32) NOT NULL,
  `Phone_no` varchar(32) NOT NULL,
  `lawyer_type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lawyer_info`
--

INSERT INTO `lawyer_info` (`lawyer_id`, `lawyer_name`, `lawyer_email`, `Phone_no`, `lawyer_type`) VALUES
(3, ' Jannatul Peya', 'peya@gmail.com', '01698763214', 'Panel Lawyer'),
(4, 'Nilufar Easmin', 'nilu@gmail.com', '01751235435', 'Panel Lawyer'),
(5, 'Nadia Islam', 'nadia@gmail.com', '01611364587', 'Panel Lawyer'),
(6, 'Wasiur Rahman', 'wasiur@gmail.com', '01916358721', 'Panel Lawyer'),
(7, 'MD. Rakibul Islam', 'rakib@gmail.com', '01369439127', 'Panel Lawyer'),
(8, 'Anika Rahman', 'anika@gmail.com', '01879635479', 'Assistant  Attorney General'),
(9, 'Masroor Chowdhury', 'masroor@gmail.com', '01823457698', 'Deputy Attorney General'),
(10, 'Tanzima Sumi', 'tanzima@gmail.com', '01734897609', 'Additional Attorney General '),
(11, 'Shihab Rahman', 'shihab@gmail.com', '01654871205', 'Additional Attorney General '),
(12, 'Abul Hossain', 'abul@gmail.com', '01735867345', 'Attorney General ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission_info`
--

CREATE TABLE `tbl_permission_info` (
  `PermissionID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_permission_info`
--

INSERT INTO `tbl_permission_info` (`PermissionID`, `UserID`, `RoleID`) VALUES
(5, 6, 12),
(6, 11, 11),
(7, 10, 11),
(8, 12, 12),
(9, 13, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role_info`
--

CREATE TABLE `tbl_role_info` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_role_info`
--

INSERT INTO `tbl_role_info` (`RoleID`, `RoleName`) VALUES
(11, 'admin'),
(12, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `UserID` int(4) NOT NULL,
  `UserName` varchar(64) NOT NULL,
  `UserPassword` varchar(64) NOT NULL,
  `UserEmail` varchar(64) NOT NULL,
  `UserPhone` varchar(15) NOT NULL,
  `UserPhoto` varchar(250) NOT NULL,
  `CreateDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`UserID`, `UserName`, `UserPassword`, `UserEmail`, `UserPhone`, `UserPhoto`, `CreateDate`) VALUES
(5, 'admin', '123', 'admin@gmail.com', '01611367868', '254_', '2024-08-14'),
(6, 'User', '123', 'user@gmail.com', '01611367868', '359_628_824_free-nature-images.jpg', '2023-03-14'),
(10, 'nadia', '123', 'nadia@gmail.com', '01701774233', '399_WhatsApp Image 2024-07-12 at 21.13.46_970a5b06.jpg', '2024-09-01'),
(11, 'nilu', '123', 'nilu@gmail.com', '564554876876', '676_free-nature-images.jpg', '2024-09-16'),
(12, 'anika', '123', 'anika@gmail.com', '54356', '432_WhatsApp Image 2024-07-12 at 21.13.46_970a5b06.jpg', '2024-09-24'),
(13, 'peya', '123', 'peya@gmail.com', '5342455', '824_free-nature-images.jpg', '2024-09-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `case_status`
--
ALTER TABLE `case_status`
  ADD PRIMARY KEY (`case_status_id`);

--
-- Indexes for table `case_type`
--
ALTER TABLE `case_type`
  ADD PRIMARY KEY (`case_type_id`);

--
-- Indexes for table `court_info`
--
ALTER TABLE `court_info`
  ADD PRIMARY KEY (`court_id`);

--
-- Indexes for table `court_type`
--
ALTER TABLE `court_type`
  ADD PRIMARY KEY (`court_type_id`);

--
-- Indexes for table `lawyer_info`
--
ALTER TABLE `lawyer_info`
  ADD PRIMARY KEY (`lawyer_id`);

--
-- Indexes for table `tbl_permission_info`
--
ALTER TABLE `tbl_permission_info`
  ADD PRIMARY KEY (`PermissionID`);

--
-- Indexes for table `tbl_role_info`
--
ALTER TABLE `tbl_role_info`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `case_status`
--
ALTER TABLE `case_status`
  MODIFY `case_status_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `case_type`
--
ALTER TABLE `case_type`
  MODIFY `case_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `court_info`
--
ALTER TABLE `court_info`
  MODIFY `court_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `court_type`
--
ALTER TABLE `court_type`
  MODIFY `court_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lawyer_info`
--
ALTER TABLE `lawyer_info`
  MODIFY `lawyer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_permission_info`
--
ALTER TABLE `tbl_permission_info`
  MODIFY `PermissionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_role_info`
--
ALTER TABLE `tbl_role_info`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `UserID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
