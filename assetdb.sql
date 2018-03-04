-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2018 at 10:34 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assetdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `hardware`
--

CREATE TABLE `hardware` (
  `serial_no` varchar(48) NOT NULL,
  `vendor` varchar(24) NOT NULL,
  `model_no` varchar(24) NOT NULL,
  `type` varchar(24) NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `misc_info` varchar(48) NOT NULL,
  `po_number` varchar(48) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hardware`
--

INSERT INTO `hardware` (`serial_no`, `vendor`, `model_no`, `type`, `purchase_date`, `misc_info`, `po_number`) VALUES
('H3287542', 'HP', 'x65', 'Laptop', '2018-01-08', 'for DWP', 'PO2378524'),
('test1', '1', '2', '3', '2018-01-23', 'info', 'PO'),
('test2', '1', '2', '3', NULL, 'info', 'PO123');

-- --------------------------------------------------------

--
-- Table structure for table `hardware_maintenance`
--

CREATE TABLE `hardware_maintenance` (
  `serial_no` varchar(48) NOT NULL,
  `company` varchar(48) NOT NULL,
  `reference` varchar(48) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hardware_maintenance`
--

INSERT INTO `hardware_maintenance` (`serial_no`, `company`, `reference`, `start_date`, `end_date`) VALUES
('H3287542', 'HP', 'REF$43424', '2018-01-01', '2018-03-02'),
('test1', 'CISCO', 'ref234', '2018-01-01', '2018-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `hardware_usage`
--

CREATE TABLE `hardware_usage` (
  `serial_no` varchar(48) NOT NULL,
  `hostname` varchar(48) NOT NULL,
  `ip_address` varchar(24) NOT NULL,
  `project` varchar(24) NOT NULL,
  `start_date` date DEFAULT NULL,
  `expected_end_date` date DEFAULT NULL,
  `location` varchar(48) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hardware_usage`
--

INSERT INTO `hardware_usage` (`serial_no`, `hostname`, `ip_address`, `project`, `start_date`, `expected_end_date`, `location`) VALUES
('H3287542', 'N/A', 'N/A', 'DWP', '2018-01-08', '2018-01-30', 'Aston1'),
('test1', 'adc.wyse127@acentres.gb.co.uk', '10.21.168.78', 'DWP', '2018-01-02', '2018-01-31', 'Aston');

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE `license` (
  `license_id` int(11) NOT NULL,
  `license` varchar(48) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(128) NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `m_date` date DEFAULT NULL,
  `po_number` varchar(48) NOT NULL,
  `supplier` varchar(48) NOT NULL,
  `cost` varchar(48) NOT NULL,
  `renewal_info` varchar(48) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `license`
--

INSERT INTO `license` (`license_id`, `license`, `quantity`, `description`, `purchase_date`, `m_date`, `po_number`, `supplier`, `cost`, `renewal_info`) VALUES
(1, 'ADC Jira licenses', 25000, 'Jira license1', '2018-02-23', '2018-02-27', 'PO3475831', 'Atlassian1', 'Â£1000.00', 'Maintenance renewal yearly'),
(4, 'test', 300, 'test', '2018-02-06', '2018-02-07', 'PO8767', 'a', 'Â£00', 'c'),
(5, 'test2', 1, 'd', '2018-02-06', '2018-02-14', 'po78', 'at', 'Â£100', ''),
(6, 'test3', 5, 't', '2018-02-07', '2018-02-21', 'Po777', 'atl', '', ''),
(7, 'lic', 300, 'test', '2018-02-14', '2018-02-14', 'PO', '', '', ''),
(8, 'test4', 200, '1', '2018-02-14', '2018-02-21', '', '', '', ''),
(9, 'test55', 5, 'tes', '2018-02-14', '2018-02-14', '', '', '', ''),
(10, '<a href="license_asset.php?id=test">test</a>', 400, 'ro', '2018-01-31', '2018-03-03', '', '', '', ''),
(11, 'test11111', 4, 'tes', '2018-02-07', '2018-02-28', '', '', '', ''),
(14, 'aaaaaaaa', 1, '', '2018-02-28', '2018-02-15', '', '', '', ''),
(15, 'bbbbbbbb', 12, '', NULL, NULL, '', '', '', ''),
(16, '11111', 5, '', NULL, NULL, '', '', '', ''),
(17, '2222', 1, '', NULL, NULL, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `license_usage`
--

CREATE TABLE `license_usage` (
  `license_id` int(11) NOT NULL,
  `license` varchar(48) NOT NULL,
  `hostname` varchar(48) NOT NULL,
  `quantity` int(11) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `project` varchar(48) NOT NULL,
  `details` varchar(48) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `license_usage`
--

INSERT INTO `license_usage` (`license_id`, `license`, `hostname`, `quantity`, `start_date`, `end_date`, `project`, `details`) VALUES
(2, 'ADC Jira licenses', 'test', 106, '2018-02-13', '2018-02-28', 'dp', 'test'),
(4, '11111', 'test', 2, NULL, NULL, '', ''),
(5, 'lic', '', 2, NULL, NULL, '', ''),
(6, '<a href="license_asset.php?id=test">test</a>', '', 3, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `serial_no` varchar(48) NOT NULL,
  `company` varchar(48) NOT NULL,
  `reference` varchar(48) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`serial_no`, `company`, `reference`, `start_date`, `end_date`) VALUES
('A1', 'test', 'test', '2018-01-09', '2018-02-20'),
('B2', '', '', '2018-01-17', '2018-03-03'),
('ABC465', '', '', NULL, '2018-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `network`
--

CREATE TABLE `network` (
  `serial_no` varchar(48) NOT NULL,
  `vendor` varchar(24) NOT NULL,
  `model_no` varchar(24) NOT NULL,
  `type` varchar(24) NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `misc_info` varchar(48) NOT NULL,
  `u_size` int(11) DEFAULT NULL,
  `po_number` varchar(48) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `network`
--

INSERT INTO `network` (`serial_no`, `vendor`, `model_no`, `type`, `purchase_date`, `misc_info`, `u_size`, `po_number`) VALUES
('N323485', 'vendor1', 'model', 'type2', '1994-06-11', 'info', 12, 'po13243'),
('test1', '', '', '', NULL, '', NULL, ''),
('res', '', '', '', '2018-02-07', '', NULL, ''),
('test', 'test', '', '', '2018-02-28', '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `network_maintenance`
--

CREATE TABLE `network_maintenance` (
  `serial_no` varchar(48) NOT NULL,
  `company` varchar(48) NOT NULL,
  `reference` varchar(48) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `network_maintenance`
--

INSERT INTO `network_maintenance` (`serial_no`, `company`, `reference`, `start_date`, `end_date`) VALUES
('N323485', 'provider', 'ref122', '2018-01-16', '2018-01-17'),
('test', 'test', 'test', '2018-03-02', '2018-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `network_usage`
--

CREATE TABLE `network_usage` (
  `serial_no` varchar(48) NOT NULL,
  `hostname` varchar(48) NOT NULL,
  `ip_address` varchar(24) NOT NULL,
  `project` varchar(24) NOT NULL,
  `start_date` date DEFAULT NULL,
  `expected_end_date` date DEFAULT NULL,
  `location` varchar(48) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `network_usage`
--

INSERT INTO `network_usage` (`serial_no`, `hostname`, `ip_address`, `project`, `start_date`, `expected_end_date`, `location`) VALUES
('N323485', 'host', '10.23.80.178', 'adc', '2018-01-09', '2018-01-03', 'aston');

-- --------------------------------------------------------

--
-- Table structure for table `network_vlan`
--

CREATE TABLE `network_vlan` (
  `vlan` varchar(48) NOT NULL,
  `site` varchar(48) NOT NULL,
  `description` varchar(48) NOT NULL,
  `ip_range` varchar(48) NOT NULL,
  `subnet` varchar(48) NOT NULL,
  `gateway` varchar(48) NOT NULL,
  `project` varchar(48) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `network_vlan`
--

INSERT INTO `network_vlan` (`vlan`, `site`, `description`, `ip_range`, `subnet`, `gateway`, `project`) VALUES
('ADEP-DWP003', 'Aston', 'DWP SIT VLAN', '10.128.465.80/12', '10.128.465.0', '10.128.465.0', 'DWP'),
('test', 'site', 'desc', 'ip', 's1', 'g1', 'project'),
('ADEP-TEST1233', 'Merlin', 's', 'i', 's', 'g', 'p'),
('vlan', 'site', 'descr', 'i', 's', 'g', 'project'),
('test2', '', 'd', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `server`
--

CREATE TABLE `server` (
  `serial_no` varchar(48) NOT NULL,
  `vendor` varchar(24) NOT NULL,
  `model_no` varchar(24) NOT NULL,
  `type` varchar(24) NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `memory` varchar(24) DEFAULT NULL,
  `proc_type` varchar(48) NOT NULL,
  `no_of_procs` int(11) DEFAULT NULL,
  `proc_cores` int(11) DEFAULT NULL,
  `proc_speed` varchar(11) DEFAULT NULL,
  `misc_info` varchar(48) NOT NULL,
  `u_size` int(11) DEFAULT NULL,
  `po_number` varchar(48) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `server`
--

INSERT INTO `server` (`serial_no`, `vendor`, `model_no`, `type`, `purchase_date`, `memory`, `proc_type`, `no_of_procs`, `proc_cores`, `proc_speed`, `misc_info`, `u_size`, `po_number`) VALUES
('A1', 'HP32', 'HP3244', 'stuff1', '2017-11-15', '4GB', 'pt1', 2, NULL, '', '', NULL, ''),
('sn45345', '', '', '', NULL, '', 'pt', 1, 1, '1', '1', 1, '1'),
('ABC465', 'IBM', 'I4657', 'X65', NULL, '12GB', 'type', 2, 4, '2.4ghz', 'info', 4, 'PO2345'),
('BCD5374', 'CISCO', 'BVDG', '', NULL, '', 'BG54', 4, 2, '2.5ghz', '', NULL, ''),
('EGFHDG64547', 'IBM', 'I646', 'I745', '2017-11-27', '', '', NULL, NULL, '', '', NULL, ''),
('B2', 'HP', 'HP34234', 'xg', '2018-01-16', '8GB', 't', 2, NULL, '', '', NULL, ''),
('test4', '', '', '', NULL, '', '', NULL, NULL, '', '', NULL, ''),
('test11111', '', '', '', NULL, '', '', NULL, NULL, '', '', NULL, ''),
('test3', '', '', '', '2017-11-07', '', '', NULL, NULL, '', '', NULL, ''),
('test2', '', '', '', NULL, '', '', NULL, NULL, '', '', NULL, ''),
('serial_no', 'vendor', '', '1', NULL, '1', '1', 1, 1, '1', '1', 1, '1'),
('test1', 'ven', 'mod', 'type', NULL, '1', '1', 1, 1, '1', '1', 1, '1'),
('kfjasd', 'wjfskfb', 'fwkefj', 'wfjbsd', NULL, '1', '1', 1, 1, '1', '1', 1, '1'),
('test134324', '', '', '', NULL, '', '', NULL, NULL, '', '', NULL, ''),
('test1423', '', '', '', NULL, '', '', NULL, NULL, '', '', NULL, ''),
('new_test', '', '', '', '2018-01-17', '', '', NULL, NULL, '', '', NULL, ''),
('test', 'were', 'werwer', '', NULL, '', '', NULL, NULL, '', '', NULL, ''),
('test11111111', '', '', '', NULL, '', '', NULL, NULL, '', '', NULL, ''),
('A333', '', '', '', NULL, '', '', NULL, NULL, '', '', NULL, ''),
('A11111111111', '', '', '', '2018-01-03', '', '', NULL, NULL, '', '', NULL, ''),
('test123', '', '', '', '2018-01-10', '', '', NULL, NULL, '', '', NULL, ''),
('test12', '', '', '', NULL, '', '', NULL, NULL, '', '', NULL, ''),
('tet', '', '', '', NULL, '', '', NULL, NULL, '', '', NULL, ''),
('testettqt', 'sjsfnkwsf', '', '', NULL, '', '', NULL, NULL, '', '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `server_usage`
--

CREATE TABLE `server_usage` (
  `serial_no` varchar(48) NOT NULL,
  `hostname` varchar(48) NOT NULL,
  `ip_address` varchar(24) NOT NULL,
  `project` varchar(24) NOT NULL,
  `start_date` date DEFAULT NULL,
  `expected_end_date` date DEFAULT NULL,
  `location` varchar(48) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `server_usage`
--

INSERT INTO `server_usage` (`serial_no`, `hostname`, `ip_address`, `project`, `start_date`, `expected_end_date`, `location`) VALUES
('BCD5374', '', '', '', NULL, NULL, ''),
('B2', 'testAsset', '10.23.80.178', 'AMEY', '2018-01-17', '2018-01-31', 'Merlin'),
('A1', 'adc.acentres.gb.co.uk', '10.23.80.168', 'DWP', '2018-01-09', '2018-01-12', 'Aston'),
('ABC465', '', '', '', NULL, NULL, ''),
('EGFHDG64547', 'test', '', '', NULL, NULL, ''),
('kfjasd', 'test', '', '', NULL, NULL, ''),
('new_test', '', '', '', NULL, NULL, ''),
('serial_no', '', '', '', NULL, NULL, ''),
('N323485', 'test123', '', '', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(48) NOT NULL,
  `password` varchar(48) NOT NULL,
  `first_name` varchar(48) NOT NULL,
  `last_name` varchar(48) NOT NULL,
  `email_address` varchar(48) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `first_name`, `last_name`, `email_address`) VALUES
('testuser', '5d9c68c6c50ed3d02a2fcf54f63993b6', 'Test', '', 'test@test.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hardware`
--
ALTER TABLE `hardware`
  ADD PRIMARY KEY (`serial_no`),
  ADD UNIQUE KEY `serial_no` (`serial_no`);

--
-- Indexes for table `hardware_maintenance`
--
ALTER TABLE `hardware_maintenance`
  ADD UNIQUE KEY `serial_no` (`serial_no`);

--
-- Indexes for table `hardware_usage`
--
ALTER TABLE `hardware_usage`
  ADD UNIQUE KEY `serial_no` (`serial_no`);

--
-- Indexes for table `license`
--
ALTER TABLE `license`
  ADD PRIMARY KEY (`license_id`);

--
-- Indexes for table `license_usage`
--
ALTER TABLE `license_usage`
  ADD PRIMARY KEY (`license_id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD UNIQUE KEY `serial_no` (`serial_no`);

--
-- Indexes for table `network`
--
ALTER TABLE `network`
  ADD PRIMARY KEY (`serial_no`),
  ADD UNIQUE KEY `serial_no` (`serial_no`);

--
-- Indexes for table `network_maintenance`
--
ALTER TABLE `network_maintenance`
  ADD UNIQUE KEY `serial_no` (`serial_no`);

--
-- Indexes for table `network_usage`
--
ALTER TABLE `network_usage`
  ADD UNIQUE KEY `serial_no` (`serial_no`);

--
-- Indexes for table `network_vlan`
--
ALTER TABLE `network_vlan`
  ADD PRIMARY KEY (`vlan`);

--
-- Indexes for table `server`
--
ALTER TABLE `server`
  ADD PRIMARY KEY (`serial_no`),
  ADD UNIQUE KEY `serial_no` (`serial_no`);

--
-- Indexes for table `server_usage`
--
ALTER TABLE `server_usage`
  ADD UNIQUE KEY `serial_no` (`serial_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `license`
--
ALTER TABLE `license`
  MODIFY `license_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `license_usage`
--
ALTER TABLE `license_usage`
  MODIFY `license_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
