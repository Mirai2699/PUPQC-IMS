-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2019 at 02:01 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pupqc_ams_ims_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ims_r_clinical_category`
--

CREATE TABLE `ims_r_clinical_category` (
  `Category_ID` int(10) NOT NULL,
  `Category_Name` varchar(50) NOT NULL,
  `Category_Desc` varchar(100) NOT NULL,
  `DEF_Active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_r_clinical_category`
--

INSERT INTO `ims_r_clinical_category` (`Category_ID`, `Category_Name`, `Category_Desc`, `DEF_Active`) VALUES
(1, 'Topical Ointment', 'for external application use ointments', b'1'),
(2, 'Bandage', 'for wound protection and anti-infection', b'1'),
(3, 'Anti-sposmadic', 'for anti-sposmadic', b'1'),
(4, 'External Cleansing', 'for cleaning external parts of the skin', b'1'),
(5, 'Adhesive', 'for adhesion application', b'1'),
(6, 'Wearable and Disposable ', 'one-time usage supplies', b'1'),
(7, 'Disposables', 'For one time use clinical supplies', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `ims_r_clinical_stock`
--

CREATE TABLE `ims_r_clinical_stock` (
  `Item_No` int(10) UNSIGNED NOT NULL,
  `Stock_Key_Unit` varchar(10) NOT NULL,
  `Item_Name` varchar(100) NOT NULL,
  `Item_Category` varchar(50) NOT NULL,
  `Unit` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Critical_level` int(11) NOT NULL DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_r_clinical_stock`
--

INSERT INTO `ims_r_clinical_stock` (`Item_No`, `Stock_Key_Unit`, `Item_Name`, `Item_Category`, `Unit`, `Quantity`, `Critical_level`) VALUES
(1, '01_00C1', 'Mometasone', 'Topical Ointment', 'Piece', 109, 5),
(2, '01_00C2', 'Mupirocin', 'Topical Ointment', 'Piece', 17, 5),
(3, '01_00C3', 'Fungus Ointment', 'Topical Ointment', 'Piece', 19, 5),
(4, '02_00C1', 'Gauze Pad 1/2', 'Bandage', 'Box', 33, 5),
(5, '02_00C2', 'Tribandage', 'Bandage', 'Piece', 8, 5),
(6, '03-00C1', 'Isopropyl Alcohol 70% sln', 'External Cleansing', 'Piece', 24, 5),
(7, '01_00C4', 'Silver Sulfadiazine Cream 3% 20gms', 'Topical Ointment', 'Tube', 10, 5),
(8, '22-00M1', 'Cloth Dressing 1/4 yard', 'Bandage', 'Piece', 10, 5),
(9, '03-00C2', 'hydrogen Peroxide 70% Solution', 'External Cleansing', 'Bottle', 10, 5),
(10, '03-00C3', 'Betadine', 'External Cleansing', 'Bottle', 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ims_r_medicinal_stock`
--

CREATE TABLE `ims_r_medicinal_stock` (
  `Med_No` int(11) UNSIGNED NOT NULL,
  `Med_Code` varchar(20) NOT NULL,
  `Med_Name` varchar(200) NOT NULL,
  `Med_Category` varchar(50) NOT NULL,
  `Unit` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Med_Expired` date NOT NULL,
  `Critical_level` int(11) NOT NULL DEFAULT '5',
  `Med_Status` varchar(15) NOT NULL DEFAULT 'Stocked'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_r_medicinal_stock`
--

INSERT INTO `ims_r_medicinal_stock` (`Med_No`, `Med_Code`, `Med_Name`, `Med_Category`, `Unit`, `Quantity`, `Med_Expired`, `Critical_level`, `Med_Status`) VALUES
(26, '01-00M1', 'Amoxicillin trihydrate 500mg', 'Antibiotics', 'Box', 5, '2018-08-25', 5, 'Stocked'),
(27, '01-00M1', 'Amoxicillin trihydrate 500mg', 'Antibiotics', 'Box', 2, '2018-08-22', 5, 'Stocked'),
(28, '01-00M3', 'Clonidine HCI 75mcg', 'Hypertension ', 'Set', 10, '2018-08-31', 5, 'Stocked'),
(29, '04-00C1', 'Betahistine Mesylate 12mg tab', 'Anti-Vertigo', 'Box', 2, '2018-08-31', 5, 'Stocked'),
(30, '01-00M1', 'Amoxicillin trihydrate 500mg', 'Antibiotics', 'Box', 5, '2018-08-25', 5, 'Stocked'),
(31, '01-00M3', 'Clonidine HCI 75mcg', 'Hypertension ', 'Set', 5, '2019-07-31', 5, 'Stocked'),
(32, '17-001', 'Paracetamol 500mg', 'Analgesic / Anti-Inflammatory', 'Tab', 20, '2018-08-31', 5, 'Disposed'),
(33, '17-001', 'Paracetamol 500mg', 'Analgesic / Anti-Inflammatory', 'Tab', 24, '2018-08-31', 5, 'Disposed'),
(34, '01-00M1', 'Amoxicillin trihydrate 500mg', 'Antibiotics', 'Box', 2, '2018-09-18', 5, 'Stocked'),
(35, '18-001', 'Decongestant 250mg', 'Colds ', 'Box', 5, '2018-08-27', 5, 'Stocked'),
(36, '01-00M1', 'Amoxicillin trihydrate 500mg', 'Antibiotics', 'Box', 3, '2018-10-16', 5, 'Stocked'),
(37, '01-00M3', 'Clonidine HCI 75mcg', 'Hypertension ', 'Set', 3, '2018-08-25', 5, 'Stocked'),
(38, '18-001', 'Decongestant 250mg', 'Colds ', 'Box', 3, '2018-08-30', 5, 'Stocked'),
(39, '21-001', 'Camphor Menthol', 'Cough / Dispectorant', 'Bottle', 5, '2020-04-03', 5, 'Stocked'),
(40, '21-001', 'Camphor Menthol', 'Cough / Dispectorant', 'Bottle', 3, '2018-08-23', 5, 'Stocked'),
(41, '18-001', 'Decongestant 250mg', 'Colds ', 'Box', 2, '2018-08-29', 5, 'Stocked'),
(42, '18-001', 'Decongestant 250mg', 'Colds ', 'Box', 5, '2018-04-03', 5, 'Stocked'),
(43, '17-00M1', 'Anti-acidic', 'Antiacid', 'Box', 5, '2018-09-03', 5, 'Stocked'),
(44, '01-00M1', 'Amoxicillin trihydrate 500mg', 'Antibiotics', 'Box', 5, '2018-09-22', 5, 'Stocked'),
(45, '01-00M2', 'Azithromycin 500mg cap', 'Antibiotics', 'Box', 5, '2018-09-29', 5, 'Stocked'),
(46, '01-00M1', 'Amoxicillin trihydrate 500mg', 'Antibiotics', 'Box', 5, '2018-09-23', 5, 'Stocked'),
(47, '01-00M3', 'Clonidine HCI 75mcg', 'Hypertension ', 'Set', 5, '2018-11-15', 5, 'Stocked');

-- --------------------------------------------------------

--
-- Table structure for table `ims_r_medicine_category`
--

CREATE TABLE `ims_r_medicine_category` (
  `Category_ID` int(10) NOT NULL,
  `Category_Name` varchar(50) NOT NULL,
  `Category_Desc` varchar(100) NOT NULL,
  `DEF_Active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_r_medicine_category`
--

INSERT INTO `ims_r_medicine_category` (`Category_ID`, `Category_Name`, `Category_Desc`, `DEF_Active`) VALUES
(1, 'Anti-Allergy', 'for anti-allergic purposes and usage and to use again', b'1'),
(2, 'Antibiotics', 'for anti-infection and bacterial infection', b'1'),
(3, 'Hypertension ', 'for Hypertensions', b'1'),
(4, 'Antiacid', 'for anti-acidity', b'1'),
(5, 'Anti-diarrhea', 'for anti-diarrhea purposes', b'1'),
(6, 'Anti-Vertigo', 'for anti-vertigo purposes', b'1'),
(7, 'Antipyretic', 'for fever', b'1'),
(8, 'Cough / Dispectorant', 'for cough', b'1'),
(9, 'Bronchodilator / Mucolytic', 'for mucolytic medication', b'1'),
(10, 'Colds ', 'for colds and mild fever', b'1'),
(11, 'Analgesic / Anti-Inflammatory', 'for swelling medication', b'1'),
(12, 'Expectorant', 'for mucus-related coughs', b'1'),
(13, 'Headaches / Migraine', 'for headaches and migraines', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `ims_r_office_category`
--

CREATE TABLE `ims_r_office_category` (
  `Category_ID` int(10) UNSIGNED NOT NULL,
  `Category_Name` varchar(50) NOT NULL,
  `Category_Desc` varchar(100) NOT NULL,
  `DEF_Active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_r_office_category`
--

INSERT INTO `ims_r_office_category` (`Category_ID`, `Category_Name`, `Category_Desc`, `DEF_Active`) VALUES
(1, 'Paper', 'for printing and producing letters and etc', b'1'),
(2, 'Ballpen', 'for writing and drawing', b'1'),
(3, 'Envelope', 'for paper keeping', b'1'),
(4, 'Marking Pen', 'board writing and highlighting', b'1'),
(5, 'Printer Ink', 'for printing', b'1'),
(6, 'Eraser', 'for erasing', b'1'),
(7, 'DVD', 'for large keeping of data', b'1'),
(8, 'Signpen', 'for strong and embossed writing ', b'1'),
(9, 'Tape', 'for adhesive purposes', b'1'),
(10, 'Glue', 'for crafts', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `ims_r_office_stock`
--

CREATE TABLE `ims_r_office_stock` (
  `Item_No` int(10) UNSIGNED NOT NULL,
  `Stock_Key_Unit` varchar(10) NOT NULL,
  `Item_Name` varchar(100) NOT NULL,
  `Item_Category` varchar(50) NOT NULL,
  `Unit` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Critical_level` int(11) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_r_office_stock`
--

INSERT INTO `ims_r_office_stock` (`Item_No`, `Stock_Key_Unit`, `Item_Name`, `Item_Category`, `Unit`, `Quantity`, `Critical_level`) VALUES
(1, '01-001', 'Bond Paper, Short White, 70 GSM', 'Paper', 'Ream', 52, 15),
(2, '01-002', 'Bond Paper,Long White,70-GSM', 'Paper', 'Ream', 35, 15),
(4, '01-003', 'Bond Paper, A4 White, 70 GSM', 'Paper', 'Ream', 23, 15),
(5, '20-002', 'Tape Masking 1\", 24mm', 'Tape', 'Piece', 16, 10),
(6, '20-003', 'Tape Masking 2\", 48mm', 'Tape', 'Piece', 19, 10),
(7, '13-004', 'Marking Pen Permanent Black', 'Marking Pen', 'Piece', 22, 10),
(8, '13-005', 'Marking Pen Permanent Blue', 'Marking Pen', 'Piece', 12, 10),
(9, '13-006', 'Marking Pen Permanent Red', 'Marking Pen', 'Piece', 17, 10),
(10, '04-002', 'DVD Rewritable', 'DVD', 'Piece', 22, 10),
(11, '09-031', 'INK EPSON L110 (Black)', 'Printer Ink', 'Piece', 11, 10),
(12, '02-001', 'Blackboard Eraser', 'Eraser', 'Piece', 13, 10),
(13, '02-002', 'WhiteBoard Eraser', 'Eraser', 'Piece', 13, 10),
(14, '20-001', 'Tape Double-Sided 1\", 12mm', 'Tape', 'Piece', 9, 10),
(15, '03-001', 'Panda Black Ballpen', 'Ballpen', 'Piece', 20, 10),
(16, '03-002', 'Haikyu Black Gel Pen', 'Ballpen', 'Piece', 20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `ims_t_acquisition`
--

CREATE TABLE `ims_t_acquisition` (
  `Acquisition_No` int(10) UNSIGNED NOT NULL,
  `Date_Procured` date NOT NULL,
  `Mode_Acquisition` varchar(30) NOT NULL,
  `Item_SKU` varchar(10) DEFAULT NULL,
  `Quantity` int(11) NOT NULL,
  `Item_Desc_Stat` varchar(200) NOT NULL,
  `Remarks` varchar(200) DEFAULT NULL,
  `Supplier` varchar(50) NOT NULL,
  `Request_Batch_No` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_t_acquisition`
--

INSERT INTO `ims_t_acquisition` (`Acquisition_No`, `Date_Procured`, `Mode_Acquisition`, `Item_SKU`, `Quantity`, `Item_Desc_Stat`, `Remarks`, `Supplier`, `Request_Batch_No`) VALUES
(1, '2018-05-20', 'Purchased', 'Bond Paper', 42, '', NULL, 'National Bookstore', NULL),
(2, '2018-05-20', 'Donated', '01-001', 44, '', NULL, 'PUP MAIN', NULL),
(3, '2018-05-21', 'Donated', '13-006', 10, '', NULL, 'PUP San Juan', NULL),
(4, '2018-05-21', 'Purchased', '13-006', 5, '', NULL, 'PUP San Juan', NULL),
(5, '2018-05-21', 'DeliveryFromRequest', '01-001', 5, '', NULL, 'PUP MAIN', 1),
(6, '2018-05-21', 'DeliveryFromRequest', '01-002', 5, '', NULL, 'PUP MAIN', 1),
(7, '2018-05-21', 'DeliveryFromRequest', '04-002', 10, '', NULL, 'PUP MAIN', 2),
(8, '2018-05-21', 'Purchased', '09-031', 10, '', NULL, 'Ink Store', NULL),
(9, '2018-05-22', 'DeliveryFromRequest', '01-001', 5, '', NULL, 'PUP MAIN', 1),
(10, '2018-05-22', 'DeliveryFromRequest', '01-002', 5, '', NULL, 'PUP MAIN', 1),
(11, '2018-05-26', 'Purchased', '04-002', 15, '', NULL, 'National Bookstore', NULL),
(12, '2018-07-11', 'DeliveryFromRequest', '13-004', 1, '', NULL, 'PUP MAIN', 4),
(13, '2018-07-11', 'DeliveryFromRequest', '01-002', 10, '', NULL, 'PUP MAIN', 4),
(14, '2018-07-20', 'DeliveryFromRequest', '09-031', 5, '', NULL, 'PUP MAIN', 3),
(15, '2018-07-20', 'DeliveryFromRequest', '09-031', 0, '', NULL, 'PUP MAIN', 5),
(16, '2018-07-20', 'DeliveryFromRequest', '09-031', 0, '', NULL, 'PUP MAIN', 5),
(17, '2018-07-20', 'DeliveryFromRequest', '01-001', 2, '', NULL, 'PUP MAIN', 5),
(18, '2018-07-20', 'DeliveryFromRequest', '01-003', 5, '', NULL, 'PUP MAIN', 5),
(19, '2018-07-20', 'DeliveryFromRequest', '13-004', 5, '', NULL, 'PUP MAIN', 5),
(20, '2018-07-21', 'DeliveryFromRequest', '02-001', 5, '', NULL, 'PUP MAIN', 2),
(21, '2018-07-21', 'DeliveryFromRequest', '02-002', 5, '', NULL, 'PUP MAIN', 2),
(22, '2018-07-21', 'Purchased', '01-001', 5, '', NULL, 'NBS', NULL),
(23, '2018-07-21', 'Purchased', '01-001', 5, '', NULL, 'NBS', NULL),
(24, '2018-07-21', 'Purchased', '01-003', 2, '', NULL, 'NBS', NULL),
(25, '2018-07-21', 'Donated', '01-001', 5, '', NULL, 'PUP Taguig', NULL),
(26, '2018-07-21', 'Purchased', '01-002', 12, '', NULL, 'NBS', NULL),
(27, '2018-07-21', 'Purchased', '20-001', 10, '', NULL, 'NBS', NULL),
(28, '2018-07-22', 'DeliveryFromRequest', '', 3, '', NULL, 'PUP MAIN', 6),
(29, '2018-07-22', 'DeliveryFromRequest', '20-003', 3, '', NULL, 'PUP MAIN', 6),
(30, '2018-07-22', 'DeliveryFromRequest', '02-001', 3, '', NULL, 'PUP MAIN', 10),
(31, '2018-07-22', 'DeliveryFromRequest', '02-002', 3, '', NULL, 'PUP MAIN', 10),
(32, '2018-07-22', 'DeliveryFromRequest', '13-006', 3, '', NULL, 'PUP MAIN', 10),
(33, '2018-07-22', 'DeliveryFromRequest', '01-002', 3, '', NULL, 'PUP MAIN', 11),
(34, '2018-07-22', 'DeliveryFromRequest', '01-001', 3, '', NULL, 'PUP MAIN', 11),
(35, '2018-07-22', 'DeliveryFromRequest', '02-001', 5, '', NULL, 'PUP MAIN', 12),
(36, '2018-07-22', 'DeliveryFromRequest', '02-002', 5, '', NULL, 'PUP MAIN', 12),
(37, '2018-07-22', 'DeliveryFromRequest', '13-006', 5, '', NULL, 'PUP MAIN', 9),
(38, '2018-07-22', 'DeliveryFromRequest', '04-002', 5, '', NULL, 'PUP MAIN', 7),
(39, '2018-07-22', 'DeliveryFromRequest', '01-002', 5, '', NULL, 'PUP MAIN', 13),
(40, '2018-07-22', 'DeliveryFromRequest', '01-001', 3, '', NULL, 'PUP MAIN', 13),
(41, '2018-07-22', 'DeliveryFromRequest', '03-001', 20, '', NULL, 'PUP MAIN', 14),
(42, '2018-07-22', 'DeliveryFromRequest', '03-002', 20, '', NULL, 'PUP MAIN', 14);

-- --------------------------------------------------------

--
-- Table structure for table `ims_t_acquisition_clinic`
--

CREATE TABLE `ims_t_acquisition_clinic` (
  `Acquisition_No` int(10) UNSIGNED NOT NULL,
  `Date_Procured` date NOT NULL,
  `Mode_Acquisition` varchar(30) NOT NULL,
  `Item_SKU` varchar(10) DEFAULT NULL,
  `Quantity` int(11) NOT NULL,
  `Item_Desc_Stat` varchar(200) NOT NULL,
  `Remarks` varchar(200) DEFAULT NULL,
  `Supplier` varchar(50) NOT NULL,
  `Request_Batch_No` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_t_acquisition_clinic`
--

INSERT INTO `ims_t_acquisition_clinic` (`Acquisition_No`, `Date_Procured`, `Mode_Acquisition`, `Item_SKU`, `Quantity`, `Item_Desc_Stat`, `Remarks`, `Supplier`, `Request_Batch_No`) VALUES
(1, '2018-05-17', 'Donated', '01_00C1', 1, '', NULL, 'Red Cross', NULL),
(2, '2018-05-17', 'Donated', '01_00C1', 3, '', NULL, 'Red Cross', NULL),
(3, '2018-05-17', 'Donated', '02_00C1', 4, '', NULL, 'Red Cross', NULL),
(4, '2018-05-17', 'Donated', '02_00C1', 9, '', NULL, 'Red Cross', NULL),
(5, '2018-05-17', 'DeliveryFromRequest', '03-00C1', 9, '', NULL, 'PUP MAIN', 2),
(6, '2018-05-17', 'Purchased', '03-00C1', 7, '', NULL, 'Mercury Drugstore', NULL),
(7, '2018-05-17', 'Purchased', '01_00C2', 7, '', NULL, 'Mercury Drugstore', NULL),
(8, '2018-05-17', 'DeliveryFromRequest', '01_00C3', 6, '', NULL, 'PUP MAIN', 3),
(9, '2018-05-17', 'Donated', '01_00C4', 5, '', NULL, 'Red Cross', NULL),
(10, '2018-07-21', 'DeliveryFromRequest', '03-00C1', 3, '', NULL, 'PUP MAIN', 5),
(11, '2018-07-21', 'DeliveryFromRequest', '01_00C3', 3, '', NULL, 'PUP MAIN', 5),
(12, '2018-08-03', 'DeliveryFromRequest', '22-00M1', 10, '', NULL, 'PUP MAIN', 9),
(13, '2018-08-12', 'DeliveryFromRequest', '03-00C1', 5, '', NULL, 'PUP MAIN', 4),
(14, '2018-08-12', 'Donated', '01_00C1', 100, '', NULL, 'WHO', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ims_t_acquisition_med`
--

CREATE TABLE `ims_t_acquisition_med` (
  `Acquisition_No` int(10) UNSIGNED NOT NULL,
  `Date_Procured` date NOT NULL,
  `Mode_Acquisition` varchar(30) NOT NULL,
  `Medicine_Name` varchar(150) DEFAULT NULL,
  `Quantity` int(11) NOT NULL,
  `Supplier` varchar(50) NOT NULL,
  `Request_Batch_No` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_t_acquisition_med`
--

INSERT INTO `ims_t_acquisition_med` (`Acquisition_No`, `Date_Procured`, `Mode_Acquisition`, `Medicine_Name`, `Quantity`, `Supplier`, `Request_Batch_No`) VALUES
(42, '2018-07-22', 'Purchased', 'Decongestant 250mg', 2, 'Mercury Drugstore', NULL),
(43, '2018-07-22', 'Donated', 'Decongestant 250mg', 5, 'Red Cross', NULL),
(44, '2018-08-12', 'DeliveryFromRequest', '01-00M2', 5, 'PUP MAIN', 5),
(45, '2018-08-12', 'DeliveryFromRequest', '01-00M1', 5, 'PUP MAIN', 15),
(46, '2018-08-12', 'DeliveryFromRequest', 'Clonidine HCI 75mcg', 5, 'PUP MAIN', 16);

-- --------------------------------------------------------

--
-- Table structure for table `ims_t_clinic_requisition`
--

CREATE TABLE `ims_t_clinic_requisition` (
  `Requisition_No` int(10) UNSIGNED NOT NULL,
  `CLI_Name` varchar(100) NOT NULL,
  `CLI_Category` varchar(30) NOT NULL,
  `CLI_Unit` varchar(20) NOT NULL,
  `CLI_Quantity` int(11) NOT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `Batch_No` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_t_clinic_requisition`
--

INSERT INTO `ims_t_clinic_requisition` (`Requisition_No`, `CLI_Name`, `CLI_Category`, `CLI_Unit`, `CLI_Quantity`, `Status`, `Batch_No`) VALUES
(1, 'Cotton 400g', 'External Cleansing', 'Piece', 1, 'PENDING', 1),
(2, 'Povidine Iodine', 'External Cleansing', 'Piece', 5, 'PENDING', 1),
(3, 'Isopropyl Alcohol 70% sln', 'External Cleansing', 'Piece', 9, 'ACQUIRED', 2),
(4, 'Fungus Ointment', 'Topical Ointment', 'Tube', 6, 'ACQUIRED', 3),
(5, 'Alcohol 70% Solution', 'External Cleansing', 'Bottle', 5, 'ACQUIRED', 4),
(6, 'Isopropyl Alcohol 70% sln', 'External Cleansing', 'Bottle', 3, 'ACQUIRED', 5),
(7, 'Fungus Ointment', 'Topical Ointment', 'Tube', 3, 'ACQUIRED', 5),
(8, 'Isopropyl Alcohol 70% sln', 'External Cleansing', 'Bottle', 1, 'PENDING', 6),
(9, 'fungus Ointment', 'Topical Ointment', 'Piece', 1, 'PENDING', 7),
(10, 'Isopropyl Alcohol 70% sln', 'External Cleansing', 'Piece', 10, 'PENDING', 8),
(11, 'Cotton 75g', 'Bandage', 'Roll', 7, 'PENDING', 8),
(12, 'Cloth Dressing 1/4 yard', 'Bandage', 'Piece', 10, 'ACQUIRED', 9);

-- --------------------------------------------------------

--
-- Table structure for table `ims_t_clinic_summary_request`
--

CREATE TABLE `ims_t_clinic_summary_request` (
  `Sum_No` int(10) UNSIGNED NOT NULL,
  `Batch_No` int(10) UNSIGNED NOT NULL,
  `Date_Requested` date NOT NULL,
  `Date_Revised` date DEFAULT NULL,
  `Date_Approved` date DEFAULT NULL,
  `Date_Released` date DEFAULT NULL,
  `Date_Procured` date DEFAULT NULL,
  `Status_Req` varchar(20) NOT NULL DEFAULT 'PENDING',
  `Acquired_Status` varchar(20) NOT NULL DEFAULT 'PENDING',
  `Account_ID` int(11) UNSIGNED DEFAULT NULL,
  `Account_Name` varchar(50) NOT NULL,
  `Depart_Name` varchar(100) NOT NULL,
  `Remarks` varchar(150) DEFAULT NULL,
  `Viewed` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_t_clinic_summary_request`
--

INSERT INTO `ims_t_clinic_summary_request` (`Sum_No`, `Batch_No`, `Date_Requested`, `Date_Revised`, `Date_Approved`, `Date_Released`, `Date_Procured`, `Status_Req`, `Acquired_Status`, `Account_ID`, `Account_Name`, `Depart_Name`, `Remarks`, `Viewed`) VALUES
(1, 1, '2018-05-17', '2018-07-14', '2018-07-21', NULL, NULL, 'APPROVED', 'PENDING', 15, 'Melissa Sarapuddin', 'Medical Clinic and Health Office', 'Urgent', b'1'),
(2, 2, '2018-05-17', '2018-05-17', '2018-05-17', '2018-05-18', '2018-05-17', 'RELEASED', 'ACQUIRED', 15, 'Melissa Sarapuddin', 'Medical Clinic and Health Office', '', b'1'),
(3, 3, '2018-05-17', '2018-05-18', '2018-05-18', '2018-05-18', '2018-05-17', 'RELEASED', 'ACQUIRED', 16, 'Rosanna Florencia Ulep', 'Medical Clinic and Health Office', '', b'1'),
(4, 4, '2018-07-11', NULL, '2018-07-11', '2018-08-03', '2018-08-12', 'RELEASED', 'ACQUIRED', 15, 'Melissa Sarapuddin', 'Medical Clinic and Health Office', '', b'0'),
(5, 5, '2018-07-21', '2018-07-21', '2018-07-21', '2018-07-21', '2018-07-21', 'RELEASED', 'ACQUIRED', 15, 'Melissa Sarapuddin', 'Medical Clinic and Health Office', '', b'0'),
(6, 6, '2018-07-21', NULL, NULL, NULL, NULL, 'PENDING', 'PENDING', 16, 'Rosanna Florencia Ulep', 'Medical Clinic and Health Office', NULL, b'0'),
(7, 7, '2018-07-21', '2018-07-21', NULL, NULL, NULL, 'REVISE', 'PENDING', 16, 'Rosanna Florencia Ulep', 'Medical Clinic and Health Office', 'dagdagan', b'0'),
(8, 8, '2018-08-03', '2018-08-03', '2018-11-26', NULL, NULL, 'APPROVED', 'PENDING', 15, 'Melissa Sarapuddin', 'Medical Clinic and Health Office', NULL, b'0'),
(9, 9, '2018-08-03', '2018-08-03', '2018-08-03', '2018-08-03', '2018-08-03', 'RELEASED', 'ACQUIRED', 15, 'Melissa Sarapuddin', 'Medical Clinic and Health Office', '', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `ims_t_dept_issuance`
--

CREATE TABLE `ims_t_dept_issuance` (
  `Issue_No` int(10) UNSIGNED NOT NULL,
  `Date_Requested` date NOT NULL,
  `Date_Approved` date NOT NULL,
  `Date_Issued` date NOT NULL,
  `SKU` varchar(10) NOT NULL,
  `Item_Name` varchar(50) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Account_Issued` varchar(50) NOT NULL,
  `Office_Request` varchar(100) NOT NULL,
  `Batch_No` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_t_dept_issuance`
--

INSERT INTO `ims_t_dept_issuance` (`Issue_No`, `Date_Requested`, `Date_Approved`, `Date_Issued`, `SKU`, `Item_Name`, `Quantity`, `Account_Issued`, `Office_Request`, `Batch_No`) VALUES
(1, '2018-05-23', '2018-05-22', '2018-05-23', '01-001', 'Bond Paper, Short White, 70 GSM', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 1),
(2, '2018-05-23', '2018-05-22', '2018-05-23', '01-003', 'Bond Paper, A4 White, 70 GSM', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 1),
(3, '2018-05-26', '2018-05-26', '2018-05-26', '01-001', 'Bond Paper, Short White, 70 GSM', 3, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 2),
(4, '2018-07-09', '2018-07-09', '2018-07-10', '01-003', 'Bond Paper, A4 White, 70 GSM', 3, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 3),
(5, '2018-07-09', '2018-07-09', '2018-07-10', '01-001', 'Bond Paper, Short White, 70 GSM', 3, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 3),
(6, '2018-07-14', '2018-07-14', '2018-07-14', '01-001    ', 'Bond Paper, Short White, 70 GSM', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 5),
(7, '2018-07-14', '2018-07-14', '2018-07-14', '01-002 ', 'Bond Paper,Long White,70-GSM', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 5),
(8, '2018-07-09', '2018-07-15', '2018-07-15', '13-006 ', 'Marking Pen Permanent Red', 6, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 4),
(9, '2018-07-15', '2018-07-15', '2018-07-15', '01-001', 'Bond Paper, Short White, 70 GSM', 10, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 6),
(10, '2018-07-15', '2018-07-15', '2018-07-15', '01-003', 'Bond Paper, A4 White, 70 GSM', 3, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 7),
(11, '2018-07-15', '2018-07-15', '2018-07-15', '01-001', 'Bond Paper, Short White, 70 GSM', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 8),
(12, '2018-07-15', '2018-07-15', '2018-07-15', '01-001', 'Bond Paper, Short White, 70 GSM', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 8),
(13, '2018-07-15', '2018-07-15', '2018-07-15', '13-005', 'Marking Pen Permanent Blue', 2, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 9),
(14, '2018-07-15', '2018-07-15', '2018-07-15', '01-001', 'Bond Paper, Short White, 70 GSM', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 10),
(15, '2018-07-15', '2018-07-15', '2018-07-15', '01-002', 'Bond Paper,Long White,70-GSM', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 11),
(16, '2018-07-15', '2018-07-15', '2018-07-15', '01-001', 'Bond Paper, Short White, 70 GSM', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 11),
(17, '2018-07-15', '2018-07-15', '2018-07-15', '01-002', 'Bond Paper,Long White,70-GSM', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 12),
(18, '2018-07-17', '2018-07-17', '2018-07-17', '01-001', 'Bond Paper, Short White, 70 GSM', 2, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 13),
(19, '2018-07-17', '2018-07-17', '2018-07-17', '01-002', 'Bond Paper,Long White,70-GSM', 2, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 13),
(20, '2018-07-17', '2018-07-17', '2018-07-17', '13-005', 'Marking Pen Permanent Blue', 2, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 14),
(21, '2018-07-17', '2018-07-17', '2018-07-17', '13-004', 'Marking Pen Permanent Black', 2, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 14),
(22, '2018-07-17', '2018-07-17', '2018-07-17', '20-002', 'Tape Masking 1', 2, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 15),
(23, '2018-07-17', '2018-07-17', '2018-07-17', '01-002', 'Bond Paper,Long White,70-GSM', 2, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 16),
(24, '2018-07-17', '2018-07-17', '2018-07-17', '13-005', 'Marking Pen Permanent Blue', 3, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 16),
(25, '2018-07-17', '2018-07-17', '2018-07-17', '01-003', 'Bond Paper, A4 White, 70 GSM', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 17),
(26, '2018-07-17', '2018-07-17', '2018-07-20', '01-001', 'Bond Paper, Short White, 70 GSM', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 17),
(27, '2018-07-20', '2018-07-20', '2018-07-20', '01-002', 'Bond Paper,Long White,70-GSM', 2, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 18),
(28, '2018-07-20', '2018-07-20', '2018-07-20', '01-001', 'Bond Paper, Short White, 70 GSM', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 19),
(29, '2018-07-20', '2018-07-20', '2018-07-20', '20-003', 'Tape Masking 2', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 19),
(30, '2018-07-20', '2018-07-20', '2018-07-20', '01-001', 'Bond Paper, Short White, 70 GSM', 3, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 20),
(31, '2018-07-20', '2018-07-20', '2018-07-20', '01-003', 'Bond Paper, A4 White, 70 GSM', 3, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 20),
(32, '2018-07-20', '2018-07-20', '2018-07-20', '13-005', 'Marking Pen Permanent Blue', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 21),
(33, '2018-07-20', '2018-07-20', '2018-07-20', '13-004', 'Marking Pen Permanent Black', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 21),
(34, '2018-07-20', '2018-07-20', '2018-07-20', '20-002', 'Tape Masking 1', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 21),
(35, '2018-07-20', '2018-07-20', '2018-07-20', '01-001', 'Bond Paper, Short White, 70 GSM', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 22),
(36, '2018-07-20', '2018-07-20', '2018-07-20', '20-003', 'Tape Masking 2', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 22),
(37, '2018-07-20', '2018-07-20', '2018-07-20', '01-001', 'Bond Paper, Short White, 70 GSM', 2, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 23),
(38, '2018-07-20', '2018-07-20', '2018-07-20', '20-003', 'Tape Masking 2', 2, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 23),
(39, '2018-07-20', '2018-07-20', '2018-07-20', '01-001', 'Bond Paper, Short White, 70 GSM', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 24),
(40, '2018-07-20', '2018-07-20', '2018-07-20', '01-002', 'Bond Paper,Long White,70-GSM', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 24),
(41, '2018-07-20', '2018-07-20', '2018-07-20', '01-001', 'Bond Paper, Short White, 70 GSM', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 25),
(42, '2018-07-20', '2018-07-20', '2018-07-20', '04-002', 'DVD Rewritable', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 26),
(43, '2018-07-20', '2018-07-20', '2018-07-20', '20-002', 'Tape Masking 1', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 26),
(44, '2018-07-20', '2018-07-20', '2018-07-20', '13-004', 'Marking Pen Permanent Black', 1, 'Demelyn Monzon', 'Office of the Student Affairs and Services', 26);

-- --------------------------------------------------------

--
-- Table structure for table `ims_t_dept_requisition`
--

CREATE TABLE `ims_t_dept_requisition` (
  `DeptReq_No` int(10) UNSIGNED NOT NULL,
  `Item_SKU` varchar(30) NOT NULL,
  `DR_Quantity` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL DEFAULT 'PENDING',
  `Batch_No` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_t_dept_requisition`
--

INSERT INTO `ims_t_dept_requisition` (`DeptReq_No`, `Item_SKU`, `DR_Quantity`, `Status`, `Batch_No`) VALUES
(1, '01-001', 1, 'RELEASED', 1),
(2, '01-003', 1, 'RELEASED', 1),
(3, '01-001', 2, 'RELEASED', 2),
(4, '01-001', 3, 'RELEASED', 3),
(5, '01-003', 3, 'RELEASED', 3),
(6, '13-006 ', 6, 'RELEASED', 4),
(7, '01-002 ', 2, 'RELEASED', 5),
(8, '01-001     ', 2, 'RELEASED', 5),
(9, '01-001', 10, 'RELEASE', 6),
(10, '01-003', 3, 'RELEASED', 7),
(11, '01-001', 1, 'RELEASED', 8),
(12, '01-001', 1, 'RELEASED', 8),
(13, '13-005', 2, 'RELEASED', 9),
(14, '20-003', 2, 'RELEASED', 9),
(15, '01-001', 1, 'RELEASED', 10),
(16, '01-002', 1, 'RELEASED', 10),
(17, '01-001', 1, 'RELEASED', 11),
(18, '01-002', 1, 'RELEASED', 11),
(19, '01-001', 1, 'PENDING', 12),
(20, '01-002', 1, 'RELEASED', 12),
(21, '01-001', 2, 'RELEASED', 13),
(22, '01-002', 2, 'RELEASED', 13),
(23, '13-004', 2, 'RELEASED', 14),
(24, '13-005', 2, 'RELEASED', 14),
(25, '20-002', 2, 'PENDING', 15),
(26, '20-002', 2, 'RELEASED', 15),
(27, '13-005', 3, 'RELEASED', 16),
(28, '01-002', 3, 'RELEASED', 16),
(29, '01-001', 1, 'RELEASED', 17),
(30, '01-003', 1, 'RELEASED', 17),
(31, '01-001', 2, 'PENDING', 18),
(32, '01-002', 2, 'RELEASED', 18),
(33, '01-001', 1, 'RELEASED', 19),
(34, '20-003', 1, 'RELEASED', 19),
(35, '01-001', 3, 'RELEASED', 20),
(36, '01-003', 3, 'RELEASED', 20),
(37, '13-005', 1, 'RELEASED', 21),
(38, '13-004', 1, 'RELEASED', 21),
(39, '20-002', 1, 'RELEASED', 21),
(40, '01-001', 1, 'RELEASED', 22),
(41, '20-003', 1, 'RELEASED', 22),
(42, '01-001', 2, 'RELEASED', 23),
(43, '20-003', 2, 'RELEASED', 23),
(44, '01-001', 1, 'RELEASED', 24),
(45, '01-002', 1, 'RELEASED', 24),
(46, '01-001', 1, 'RELEASED', 25),
(47, '20-002', 1, 'RELEASED', 26),
(48, '13-004', 1, 'RELEASED', 26),
(49, '04-002', 1, 'RELEASED', 26);

-- --------------------------------------------------------

--
-- Table structure for table `ims_t_dept_summary_request`
--

CREATE TABLE `ims_t_dept_summary_request` (
  `DeptSum_No` int(10) UNSIGNED NOT NULL,
  `Batch_No` int(10) UNSIGNED NOT NULL,
  `Date_Requested` date NOT NULL,
  `Date_Revised` date DEFAULT NULL,
  `Date_Approved` date DEFAULT NULL,
  `Date_Released` date DEFAULT NULL,
  `Status_Req` varchar(20) NOT NULL DEFAULT 'PENDING',
  `Remarks` varchar(150) DEFAULT NULL,
  `Account_Name` varchar(50) NOT NULL,
  `Depart_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_t_dept_summary_request`
--

INSERT INTO `ims_t_dept_summary_request` (`DeptSum_No`, `Batch_No`, `Date_Requested`, `Date_Revised`, `Date_Approved`, `Date_Released`, `Status_Req`, `Remarks`, `Account_Name`, `Depart_Name`) VALUES
(1, 1, '2018-05-23', NULL, '2018-05-22', '2018-05-22', 'RELEASED', '', 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(2, 2, '2018-05-26', NULL, '2018-05-26', '2018-05-26', 'RELEASED', '', 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(3, 3, '2018-07-09', NULL, '2018-07-09', '2018-07-10', 'RELEASED', '', 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(4, 4, '2018-07-09', '2018-07-14', '2018-07-15', '2018-07-15', 'RELEASED', '', 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(5, 5, '2018-07-14', '2018-07-14', '2018-07-14', '2018-07-14', 'RELEASED', '', 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(6, 6, '2018-07-15', NULL, '2018-07-15', '2018-07-15', 'RELEASED', '', 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(7, 7, '2018-07-15', NULL, '2018-07-15', '2018-07-15', 'RELEASED', '', 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(8, 8, '2018-07-15', NULL, '2018-07-15', '2018-07-15', 'RELEASED', '', 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(9, 9, '2018-07-15', NULL, '2018-07-15', '2018-07-15', 'RELEASED', '', 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(10, 10, '2018-07-15', NULL, '2018-07-15', '2018-07-15', 'RELEASED', '', 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(11, 11, '2018-07-15', NULL, '2018-07-15', '2018-07-15', 'RELEASED', NULL, 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(12, 12, '2018-07-15', NULL, '2018-07-15', '2018-07-15', 'RELEASED', '', 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(13, 13, '2018-07-17', NULL, '2018-07-17', NULL, 'APPROVED', NULL, 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(14, 14, '2018-07-17', NULL, '2018-07-17', NULL, 'APPROVED', NULL, 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(15, 15, '2018-07-17', NULL, '2018-07-17', '2018-07-17', 'RELEASED', '', 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(16, 16, '2018-07-17', NULL, '2018-07-17', NULL, 'APPROVED', NULL, 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(17, 17, '2018-07-17', NULL, '2018-07-17', '2018-07-20', 'RELEASED', '', 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(18, 18, '2018-07-20', NULL, '2018-07-20', '2018-07-20', 'RELEASED', NULL, 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(19, 19, '2018-07-20', NULL, '2018-07-20', '2018-07-20', 'RELEASED', NULL, 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(20, 20, '2018-07-20', NULL, '2018-07-20', '2018-07-20', 'RELEASED', NULL, 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(21, 21, '2018-07-20', NULL, '2018-07-20', '2018-07-20', 'RELEASED', NULL, 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(22, 22, '2018-07-20', NULL, '2018-07-20', '2018-07-20', 'RELEASED', NULL, 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(23, 23, '2018-07-20', NULL, '2018-07-20', '2018-07-20', 'RELEASED', NULL, 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(24, 24, '2018-07-20', NULL, '2018-07-20', '2018-07-20', 'RELEASED', NULL, 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(25, 25, '2018-07-20', NULL, '2018-07-20', '2018-07-20', 'RELEASED', NULL, 'Demelyn Monzon', 'Office of the Student Affairs and Services'),
(26, 26, '2018-07-20', NULL, '2018-07-20', '2018-07-20', 'RELEASED', NULL, 'Demelyn Monzon', 'Office of the Student Affairs and Services');

-- --------------------------------------------------------

--
-- Table structure for table `ims_t_med_requisition`
--

CREATE TABLE `ims_t_med_requisition` (
  `Requisition_No` int(10) UNSIGNED NOT NULL,
  `Item_Name` varchar(100) NOT NULL,
  `Item_Category` varchar(30) NOT NULL,
  `MED_Unit` varchar(20) DEFAULT NULL,
  `MED_Quantity` int(11) NOT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `Batch_No` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_t_med_requisition`
--

INSERT INTO `ims_t_med_requisition` (`Requisition_No`, `Item_Name`, `Item_Category`, `MED_Unit`, `MED_Quantity`, `Status`, `Batch_No`) VALUES
(1, 'Amoxicillin trihydrate 500mg', 'Antibiotics', 'Box', 4, 'ACQUIRED', 1),
(2, 'Cefalexin 500mg', 'Antibiotics', 'Box', 4, 'ACQUIRED', 1),
(3, 'Clonidine HCI 75mcg', 'Hypertension ', 'Box', 5, 'ACQUIRED', 1),
(4, 'Omeprazole 20mg', 'Antiacid', 'Box', 2, 'ACQUIRED', 1),
(5, 'Racecadotril 100mg', 'Anti-diarrhea', 'Box', 5, 'ACQUIRED', 1),
(6, 'Oxetacaine 10mg softgel', 'Antiacid', 'Box', 10, 'ACQUIRED', 2),
(7, 'Amoxicillin trihydrate 500mg', 'Antibiotics', 'Box', 5, 'ACQUIRED', 3),
(12, 'Clonidine HCI 75mcg', 'Hypertension ', 'Box', 10, 'ACQUIRED', 4),
(13, 'Azithromycin 500mg cap', 'Antibiotics', 'Box', 5, 'ACQUIRED', 5),
(14, 'Amoxicillin trihydrate 500mg', 'Antibiotics', 'Box', 10, 'ACQUIRED', 6),
(15, 'Carbocisteine 500mg blister cap', 'Cough / Dispectorant', 'Box', 5, 'ACQUIRED', 7),
(16, 'Clonidine HCI 75mcg', 'Hypertension ', 'Box', 5, 'ACQUIRED', 8),
(17, 'Ketoprofen Gel 50g', 'Analgesic / Anti-Inflammatory', 'Tube', 5, 'ACQUIRED', 8),
(18, 'Amoxicillin trihydrate 500mg', 'Antibiotics', 'Box', 5, 'ACQUIRED', 8),
(19, 'Amoxicillin trihydrate 500mg', 'Antibiotics', 'Box', 5, 'ACQUIRED', 9),
(20, 'Amoxicillin trihydrate 500mg', 'Antibiotics', 'Box', 2, 'ACQUIRED', 10),
(21, 'Clonidine HCI 75mcg', 'Hypertension ', 'Box', 2, 'ACQUIRED', 10),
(22, 'Betahistine Mesylate 12mg tab', 'Anti-Vertigo', 'Box', 2, 'ACQUIRED', 10),
(23, 'Amoxicillin trihydrate 500mg', 'Antibiotics', 'Box', 2, 'PENDING', 11),
(24, 'Amoxicillin trihydrate 500mg', 'Antibiotics', 'Box', 2, 'PENDING', 12),
(25, 'Amoxicillin trihydrate 500mg', 'Antibiotics', 'Box', 3, 'ACQUIRED', 13),
(26, 'Clonidine HCI 75mcg', 'Hypertension ', 'Box', 3, 'ACQUIRED', 13),
(27, 'Amoxicillin trihydrate 500mg', 'Antibiotics', 'Box', 5, 'ACQUIRED', 14),
(28, 'Amoxicillin trihydrate 500mg', 'Antibiotics', 'Box', 5, 'ACQUIRED', 15),
(29, 'Clonidine HCI 75mcg', 'Hypertension ', 'Box', 5, 'ACQUIRED', 16);

-- --------------------------------------------------------

--
-- Table structure for table `ims_t_med_summary_request`
--

CREATE TABLE `ims_t_med_summary_request` (
  `Sum_No` int(10) UNSIGNED NOT NULL,
  `Batch_No` int(10) UNSIGNED NOT NULL,
  `Date_Requested` date NOT NULL,
  `Date_Revised` date DEFAULT NULL,
  `Date_Approved` date DEFAULT NULL,
  `Date_Released` date DEFAULT NULL,
  `Date_Procured` date DEFAULT NULL,
  `Status_Req` varchar(20) NOT NULL DEFAULT 'PENDING',
  `Acquired_Status` varchar(20) NOT NULL DEFAULT 'PENDING',
  `Account_ID` int(11) NOT NULL,
  `Account_Name` varchar(50) NOT NULL,
  `Depart_Name` varchar(100) NOT NULL,
  `Remarks` varchar(150) DEFAULT NULL,
  `Viewed` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_t_med_summary_request`
--

INSERT INTO `ims_t_med_summary_request` (`Sum_No`, `Batch_No`, `Date_Requested`, `Date_Revised`, `Date_Approved`, `Date_Released`, `Date_Procured`, `Status_Req`, `Acquired_Status`, `Account_ID`, `Account_Name`, `Depart_Name`, `Remarks`, `Viewed`) VALUES
(1, 1, '2018-05-14', NULL, '2018-05-14', '2018-05-14', '2018-05-15', 'RELEASED', 'ACQUIRED', 15, 'Melissa Sarapuddin', 'Medical Clinic and Health Office', '', b'1'),
(2, 2, '2018-05-14', '2018-05-15', '2018-05-15', '2018-05-18', '2018-05-17', 'RELEASED', 'ACQUIRED', 15, 'Melissa Sarapuddin', 'Medical Clinic and Health Office', '', b'1'),
(3, 3, '2018-05-15', NULL, '2018-07-11', '2018-07-21', '2018-07-21', 'RELEASED', 'ACQUIRED', 15, 'Melissa Sarapuddin', 'Medical Clinic and Health Office', '', b'1'),
(4, 4, '2018-05-17', '2018-07-21', '2018-07-21', '2018-07-21', '2018-07-21', 'RELEASED', 'ACQUIRED', 15, 'Melissa Sarapuddin', 'Medical Clinic and Health Office', '', b'1'),
(5, 5, '2018-05-17', '2018-07-22', '2018-08-12', '2018-08-12', '2018-08-12', 'RELEASED', 'ACQUIRED', 15, 'Melissa Sarapuddin', 'Medical Clinic and Health Office', '', b'1'),
(6, 6, '2018-05-17', NULL, '2018-05-17', '2018-05-18', '2018-05-17', 'RELEASED', 'ACQUIRED', 16, 'Rosanna Florencia Ulep', 'Medical Clinic and Health Office', '', b'1'),
(7, 7, '2018-05-17', '2018-05-18', '2018-05-18', '2018-05-18', '2018-05-17', 'RELEASED', 'ACQUIRED', 16, 'Rosanna Florencia Ulep', 'Medical Clinic and Health Office', '', b'1'),
(8, 8, '2018-05-17', NULL, '2018-05-18', '2018-05-18', '2018-05-17', 'RELEASED', 'ACQUIRED', 15, 'Melissa Sarapuddin', 'Medical Clinic and Health Office', '', b'1'),
(9, 9, '2018-05-21', NULL, '2018-05-21', '2018-05-21', '2018-05-21', 'RELEASED', 'ACQUIRED', 15, 'Melissa Sarapuddin', 'Medical Clinic and Health Office', '', b'1'),
(10, 10, '2018-07-20', NULL, '2018-07-20', '2018-07-22', '2018-07-22', 'RELEASED', 'ACQUIRED', 15, 'Melissa Sarapuddin', 'Medical Clinic and Health Office', '', b'0'),
(11, 11, '2018-07-21', NULL, '2018-07-21', '2018-08-03', '2018-08-03', 'RELEASED', 'ACQUIRED', 15, 'Melissa Sarapuddin', 'Medical Clinic and Health Office', '', b'0'),
(12, 12, '2018-07-21', NULL, NULL, NULL, NULL, 'PENDING', 'PENDING', 16, 'Rosanna Florencia Ulep', 'Medical Clinic and Health Office', NULL, b'0'),
(13, 13, '2018-07-22', '2018-07-22', '2018-07-22', '2018-07-22', '2018-07-22', 'RELEASED', 'ACQUIRED', 15, 'Melissa Sarapuddin', 'Medical Clinic and Health Office', '', b'0'),
(14, 14, '2018-08-12', NULL, '2018-08-12', '2018-08-12', '2018-08-12', 'RELEASED', 'ACQUIRED', 15, 'Melissa Sarapuddin', 'Medical Clinic and Health Office', '', b'0'),
(15, 15, '2018-08-12', NULL, '2018-08-12', '2018-08-12', '2018-08-12', 'RELEASED', 'ACQUIRED', 15, 'Melissa Sarapuddin', 'Medical Clinic and Health Office', '', b'0'),
(16, 16, '2018-08-12', NULL, '2018-08-12', '2018-08-12', '2018-08-12', 'RELEASED', 'ACQUIRED', 15, 'Melissa Sarapuddin', 'Medical Clinic and Health Office', '', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `ims_t_ppmp_clinic_details`
--

CREATE TABLE `ims_t_ppmp_clinic_details` (
  `Ent_ID` int(11) UNSIGNED NOT NULL,
  `Item_Code` varchar(10) DEFAULT NULL,
  `Item_Name` varchar(200) NOT NULL,
  `Unit` varchar(20) NOT NULL,
  `Quantity` int(10) DEFAULT NULL,
  `Est_Budget` decimal(10,0) NOT NULL,
  `Batch_No` int(10) NOT NULL,
  `Jan` int(10) DEFAULT NULL,
  `Feb` int(10) DEFAULT NULL,
  `March` int(10) DEFAULT NULL,
  `April` int(10) DEFAULT NULL,
  `May` int(10) DEFAULT NULL,
  `June` int(10) DEFAULT NULL,
  `July` int(10) DEFAULT NULL,
  `Aug` int(10) DEFAULT NULL,
  `Sept` int(10) DEFAULT NULL,
  `Oct` int(10) DEFAULT NULL,
  `Nov` int(10) DEFAULT NULL,
  `Decem` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_t_ppmp_clinic_details`
--

INSERT INTO `ims_t_ppmp_clinic_details` (`Ent_ID`, `Item_Code`, `Item_Name`, `Unit`, `Quantity`, `Est_Budget`, `Batch_No`, `Jan`, `Feb`, `March`, `April`, `May`, `June`, `July`, `Aug`, `Sept`, `Oct`, `Nov`, `Decem`) VALUES
(1, NULL, 'Gauze Pad 1/2', 'Piece', NULL, '500', 1, 2, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, NULL, 'Tribandage', 'Piece', NULL, '2501', 2, 2, 0, 0, 0, 2, 0, 0, 0, 2, 0, 0, 2),
(3, NULL, 'Cloth Dressing 1/4 yard', 'Piece', NULL, '4799', 2, 0, 2, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0),
(4, NULL, 'Gauze Pad 1/2', 'Piece', NULL, '5525', 2, 0, 0, 0, 0, 0, 0, 2, 2, 2, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ims_t_ppmp_clinic_summary`
--

CREATE TABLE `ims_t_ppmp_clinic_summary` (
  `MED_PPMP_ID` int(10) NOT NULL,
  `MED_PPMP_Date_Created` date NOT NULL,
  `MED_PPMP_Date_Request` date NOT NULL,
  `MED_PPMP_Requested_By` varchar(50) NOT NULL,
  `MED_PPMP_Job_Type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_t_ppmp_clinic_summary`
--

INSERT INTO `ims_t_ppmp_clinic_summary` (`MED_PPMP_ID`, `MED_PPMP_Date_Created`, `MED_PPMP_Date_Request`, `MED_PPMP_Requested_By`, `MED_PPMP_Job_Type`) VALUES
(1, '2018-05-19', '2018-05-19', 'Rossana Florencia Ulep', 'Branch Dentist'),
(2, '2018-08-12', '2018-08-12', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ims_t_ppmp_med_details`
--

CREATE TABLE `ims_t_ppmp_med_details` (
  `Ent_ID` int(11) UNSIGNED NOT NULL,
  `Med_Code` varchar(10) DEFAULT NULL,
  `Med_Name` varchar(200) NOT NULL,
  `Unit` varchar(20) NOT NULL,
  `Quantity` int(10) DEFAULT NULL,
  `Est_Budget` decimal(10,0) NOT NULL,
  `Batch_No` int(10) NOT NULL,
  `Jan` int(10) DEFAULT NULL,
  `Feb` int(10) DEFAULT NULL,
  `March` int(10) DEFAULT NULL,
  `April` int(10) DEFAULT NULL,
  `May` int(10) DEFAULT NULL,
  `June` int(10) DEFAULT NULL,
  `July` int(10) DEFAULT NULL,
  `Aug` int(10) DEFAULT NULL,
  `Sept` int(10) DEFAULT NULL,
  `Oct` int(10) DEFAULT NULL,
  `Nov` int(10) DEFAULT NULL,
  `Decem` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_t_ppmp_med_details`
--

INSERT INTO `ims_t_ppmp_med_details` (`Ent_ID`, `Med_Code`, `Med_Name`, `Unit`, `Quantity`, `Est_Budget`, `Batch_No`, `Jan`, `Feb`, `March`, `April`, `May`, `June`, `July`, `Aug`, `Sept`, `Oct`, `Nov`, `Decem`) VALUES
(1, NULL, 'Ketoprofen Gel 50g', 'Boxes', NULL, '4000', 1, 0, 2, 2, 2, 0, 0, 7, 0, 0, 0, 0, 0),
(2, NULL, 'Ketoprofen Gel 50g', 'Boxes', NULL, '5000', 2, 0, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, NULL, 'Omeprazole 20mg', 'Boxes', NULL, '4789', 2, 0, 0, 0, 2, 2, 0, 0, 0, 0, 0, 0, 0),
(4, NULL, 'Paracetamol 500mg', 'Boxes', NULL, '500', 3, 2, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0),
(5, NULL, 'Betahistine Mesylate 12mg tab', 'Boxes', NULL, '1500', 3, 0, 2, 0, 2, 0, 2, 0, 0, 0, 0, 0, 0),
(6, NULL, 'Anti-acidic', 'Boxes', NULL, '2454', 3, 0, 0, 4, 0, 0, 0, 0, 4, 0, 0, 0, 3),
(7, NULL, 'Anti-acidic', 'Boxes', NULL, '1279', 4, 2, 0, 0, 0, 0, 2, 0, 0, 2, 0, 0, 0),
(8, NULL, 'Decongestant 250mg', 'Boxes', NULL, '5000', 5, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ims_t_ppmp_med_summary`
--

CREATE TABLE `ims_t_ppmp_med_summary` (
  `MED_PPMP_ID` int(10) NOT NULL,
  `MED_PPMP_Date_Created` date NOT NULL,
  `MED_PPMP_Date_Request` date NOT NULL,
  `MED_PPMP_Requested_By` varchar(50) NOT NULL,
  `MED_PPMP_Job_Type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_t_ppmp_med_summary`
--

INSERT INTO `ims_t_ppmp_med_summary` (`MED_PPMP_ID`, `MED_PPMP_Date_Created`, `MED_PPMP_Date_Request`, `MED_PPMP_Requested_By`, `MED_PPMP_Job_Type`) VALUES
(1, '2018-05-21', '2018-05-21', 'Melissa Sarapuddin', 'Branch Physician'),
(2, '2018-05-22', '2018-05-22', '', ''),
(3, '2018-08-12', '2018-08-12', '', ''),
(4, '2018-08-12', '2018-08-12', '', ''),
(5, '2018-08-12', '2018-08-12', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ims_t_requisition`
--

CREATE TABLE `ims_t_requisition` (
  `Requisition_No` int(10) UNSIGNED NOT NULL,
  `OFF_Name` varchar(50) NOT NULL,
  `OFF_Category` varchar(30) NOT NULL,
  `OFF_Unit` varchar(20) NOT NULL,
  `OFF_Quantity` int(11) NOT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `Batch_No` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_t_requisition`
--

INSERT INTO `ims_t_requisition` (`Requisition_No`, `OFF_Name`, `OFF_Category`, `OFF_Unit`, `OFF_Quantity`, `Status`, `Batch_No`) VALUES
(1, 'Bond Paper, Short White, 70-GSM', 'Paper', 'Ream', 5, 'ACQUIRED', 1),
(2, 'Bond Paper, Long White, 70-GSM', 'Paper', 'Ream', 5, 'ACQUIRED', 1),
(3, 'Blackboard Eraser', 'Eraser', 'Piece', 5, 'ACQUIRED', 2),
(4, 'WhiteBoard Eraser', 'Eraser', 'Piece', 5, 'ACQUIRED', 2),
(5, 'Ink Epson L110 (Black)', 'Printer Ink', 'Piece', 5, 'ACQUIRED', 3),
(6, 'Marking Pen Permanent Black', 'Marking Pen', 'Box', 1, 'ACQUIRED', 4),
(7, 'Bond Paper,Long White,70-GSM', 'Paper', 'Ream', 10, 'ACQUIRED', 4),
(8, 'Bond Paper, Short White, 70 GSM', 'Paper', 'Ream', 2, 'ACQUIRED', 5),
(9, 'Bond Paper,Long White,70-GSM', 'Paper', 'Ream', 0, 'ACQUIRED', 5),
(10, 'Bond Paper, A4 White, 70 GSM', 'Paper', 'Ream', 5, 'ACQUIRED', 5),
(11, 'INK EPSON L110 (Black)', 'Printer Ink', 'Cartridge', 0, 'ACQUIRED', 5),
(12, 'Marking Pen Permanent Black', 'Marking Pen', 'Box', 5, 'ACQUIRED', 5),
(13, 'Tape Masking 1\", 24mm', 'Tape', 'Piece', 3, 'ACQUIRED', 6),
(14, 'Tape Masking 2\", 48mm', 'Tape', 'Piece', 3, 'ACQUIRED', 6),
(15, 'DVD Rewritable', 'DVD', 'Piece', 5, 'ACQUIRED', 7),
(16, 'Bond Paper,Long White,70-GSM', 'Paper', 'Ream', 10, 'PENDING', 8),
(17, 'Marking Pen Permanent Red', 'Marking Pen', 'Piece', 5, 'ACQUIRED', 9),
(18, 'Blackboard Eraser', 'Eraser', 'Piece', 3, 'ACQUIRED', 10),
(19, 'Whiteboard Eraser', 'Eraser', 'Piece', 3, 'ACQUIRED', 10),
(20, 'Marking Pen Permanent Red', 'Marking Pen', 'Piece', 3, 'ACQUIRED', 10),
(21, 'Bond Paper,Long White,70-GSM', 'Paper', 'Ream', 3, 'ACQUIRED', 11),
(22, 'Bond Paper,Short White,70-GSM', 'Paper', 'Ream', 3, 'ACQUIRED', 11),
(23, 'Blackboard Eraser', 'Eraser', 'Piece', 5, 'ACQUIRED', 12),
(24, 'Whiteboard Eraser', 'Eraser', 'Piece', 5, 'ACQUIRED', 12),
(25, 'Bond Paper,Long White,70-GSM', 'Paper', 'Ream', 5, 'ACQUIRED', 13),
(26, 'Bond Paper,Short White,70-GSM', 'Paper', 'Ream', 6, 'ACQUIRED', 13),
(27, 'Panda Black Ballpen', 'Ballpen', 'Piece', 20, 'ACQUIRED', 14),
(28, 'Haikyu Black Gel Pen', 'Ballpen', 'Piece', 20, 'ACQUIRED', 14);

-- --------------------------------------------------------

--
-- Table structure for table `ims_t_summary_issuance`
--

CREATE TABLE `ims_t_summary_issuance` (
  `Batch_No` int(10) UNSIGNED NOT NULL,
  `Date_Requested` date NOT NULL,
  `Date_Approved` date DEFAULT NULL,
  `Date_Revised` date DEFAULT NULL,
  `Date_Released` date DEFAULT NULL,
  `Remarks` varchar(150) DEFAULT NULL,
  `Account_ID` int(1) NOT NULL,
  `Depart_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ims_t_summary_request`
--

CREATE TABLE `ims_t_summary_request` (
  `Sum_No` int(10) UNSIGNED NOT NULL,
  `Batch_No` int(10) UNSIGNED NOT NULL,
  `Date_Requested` date NOT NULL,
  `Date_Revised` date DEFAULT NULL,
  `Date_Approved` date DEFAULT NULL,
  `Date_Released` date DEFAULT NULL,
  `Date_Delivered` date DEFAULT NULL,
  `Status_Req` varchar(20) NOT NULL DEFAULT 'PENDING',
  `Accept_Status` varchar(20) DEFAULT NULL,
  `Remarks` varchar(150) DEFAULT NULL,
  `Viewed` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ims_t_summary_request`
--

INSERT INTO `ims_t_summary_request` (`Sum_No`, `Batch_No`, `Date_Requested`, `Date_Revised`, `Date_Approved`, `Date_Released`, `Date_Delivered`, `Status_Req`, `Accept_Status`, `Remarks`, `Viewed`) VALUES
(1, 1, '2018-05-22', NULL, '2018-05-22', '2018-05-22', '2018-05-22', 'RELEASE', 'DELIVERED', '', b'1'),
(2, 2, '2018-05-22', NULL, '2018-07-11', '2018-07-11', '2018-07-11', 'RELEASE', 'DELIVERED', '', b'1'),
(3, 3, '2018-07-09', '2018-07-15', '2018-07-15', '2018-07-20', '2018-07-20', 'RELEASE', 'DELIVERED', '', b'0'),
(4, 4, '2018-07-09', NULL, '2018-07-09', '2018-07-09', '2018-07-11', 'RELEASE', 'DELIVERED', NULL, b'0'),
(5, 5, '2018-07-15', '2018-07-15', '2018-07-15', '2018-07-15', '2018-07-20', 'RELEASE', 'DELIVERED', '', b'0'),
(6, 6, '2018-07-15', '2018-07-15', '2018-07-20', '2018-07-22', '2018-07-22', 'RELEASE', 'DELIVERED', '', b'0'),
(7, 7, '2018-07-15', '2018-07-20', '2018-07-20', '2018-07-21', '2018-07-22', 'RELEASE', 'DELIVERED', '', b'0'),
(8, 8, '2018-07-21', '2018-07-21', NULL, NULL, NULL, 'REVISE', NULL, 'auokonito', b'0'),
(9, 9, '2018-07-21', NULL, '2018-07-22', '2018-07-22', '2018-07-22', 'RELEASE', 'DELIVERED', '', b'0'),
(10, 10, '2018-07-22', NULL, '2018-07-22', '2018-07-22', '2018-07-22', 'RELEASE', 'DELIVERED', '', b'0'),
(11, 11, '2018-07-22', NULL, '2018-07-22', '2018-07-22', '2018-07-22', 'RELEASE', 'DELIVERED', '', b'0'),
(12, 12, '2018-07-22', NULL, '2018-07-22', '2018-07-22', '2018-07-22', 'RELEASE', 'DELIVERED', '', b'0'),
(13, 13, '2018-07-22', NULL, '2018-07-22', '2018-07-22', '2018-07-22', 'RELEASE', 'DELIVERED', '', b'0'),
(14, 14, '2018-07-22', NULL, '2018-07-22', '2018-07-22', '2018-07-22', 'RELEASE', 'DELIVERED', '', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `pso_r_employee_profile`
--

CREATE TABLE `pso_r_employee_profile` (
  `EP_ID` int(11) NOT NULL,
  `EP_FNAME` varchar(50) NOT NULL,
  `EP_MNAME` varchar(35) NOT NULL,
  `EP_LNAME` varchar(35) NOT NULL,
  `EP_GENDER` varchar(10) NOT NULL,
  `EP_MOBILE` char(11) NOT NULL,
  `EP_EMAIL` varchar(75) NOT NULL,
  `EP_BIRTHDATE` date NOT NULL,
  `EP_HOME_ADDRESS` varchar(300) NOT NULL,
  `EP_TYPE` varchar(50) NOT NULL,
  `EP_TYPE_DESC` varchar(150) NOT NULL,
  `EP_STATUS` varchar(10) NOT NULL DEFAULT 'Active',
  `EP_PICTURE` varchar(200) DEFAULT '../../Resources/images/EmployePictures/default.png',
  `O_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pso_r_employee_profile`
--

INSERT INTO `pso_r_employee_profile` (`EP_ID`, `EP_FNAME`, `EP_MNAME`, `EP_LNAME`, `EP_GENDER`, `EP_MOBILE`, `EP_EMAIL`, `EP_BIRTHDATE`, `EP_HOME_ADDRESS`, `EP_TYPE`, `EP_TYPE_DESC`, `EP_STATUS`, `EP_PICTURE`, `O_ID`) VALUES
(1, 'Cristian', 'O', 'Balatbat', 'Male', '09153257869', 'cristianbalatbat@yahoo.com', '1999-10-26', 'Quezon City', 'Student', 'Student of PUPQC BSIT', 'Active', '../../Resources/images/EmployePictures/default.png', 2),
(2, 'Edgardo', 'S', 'Delmo', 'Male', '09123456789', 'Edgardo_Delmo@yahoo.com', '1963-01-23', 'Quezon City', 'Administrative Officer', 'administers', 'Active', '../../Resources/images/EmployePictures/default.png', 1),
(3, 'Firmo', 'A', 'Esguerra', 'Male', '09123456788', 'Firmo_Esguerra@gmail.com', '1963-07-09', 'Quezon City', 'Director', 'University Campus Director', 'Active', '../../Resources/images/EmployePictures/default.png', 3),
(4, 'Robert', 'G', 'Doromal', 'Male', '09123456786', 'robertdoromal@gmail.com', '1975-01-07', 'Quezon City', 'Administrative Staff', 'for pupqcpso', 'Active', '../../Resources/images/EmployePictures/default.png', 1),
(5, 'Demelyn', 'E', 'Monzon', 'Female', '09123456798', 'demelynmonzon@yahoo.com', '1970-10-10', 'Quezon City', 'OSAS Head', 'head of OSAS', 'Active', '../../Resources/images/EmployePictures/default.png', 2),
(8, 'Mirai', 'B', 'Kuriyama', 'Set', '09123456787', 'miraikuriyama@gmail.com', '2018-01-07', 'Fairview', 'Student Assistant', 'helper', 'Active', 'DSC_0010.JPG', 3),
(9, 'Villy', 'N', 'Ormido', 'Ream', '09967742089', 'villyormido@yahoo.com', '1998-07-15', 'Quezon City', 'Inventory Assistant', 'manages assets', 'Active', 'm1.jpg', 1),
(10, 'Irynne', 'P', 'Gatchalian', 'Set', '09123456879', 'irynnegatchalian@gamil.com', '1971-09-12', 'Quezon City', 'Accounting Officer', 'accounting officer', 'Active', 'default.png', 4),
(12, 'Sample', 'A', 'User', 'Male', '99999999999', 'sampleuser@yahoo.com', '2018-05-03', 'QC', 'SAMPLE', 'SAMPLE', 'Active', 'default.png', 5),
(13, 'Melissa', '', 'Sarapuddin', 'Female', '09123465789', 'melissasarapuddin@yahoo.com', '1979-05-04', 'Manila', 'Branch Physician', 'medical physician of the university', 'Active', '', 5),
(14, 'Rosanna Florencia', 'A', 'Ulep', 'Female', '09132465789', 'rosannaulep@gmail.com', '1980-03-31', 'Quezon City', 'Branch Dentist', 'university campus branch dentist', 'Active', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pso_r_office`
--

CREATE TABLE `pso_r_office` (
  `O_ID` int(11) NOT NULL,
  `O_CODE` varchar(50) NOT NULL,
  `O_NAME` varchar(150) NOT NULL,
  `O_DESCRIPTION` varchar(300) NOT NULL,
  `EP_ID` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pso_r_office`
--

INSERT INTO `pso_r_office` (`O_ID`, `O_CODE`, `O_NAME`, `O_DESCRIPTION`, `EP_ID`, `C_ID`) VALUES
(1, 'PSO', 'Property and Supply Office', 'for asset and inventory', 1, 1),
(2, 'OSAS', 'Office of the Student Affairs and Services', 'helping students affairs and provides services', 2, 1),
(3, 'EXOF', 'Executive Office', 'for high decision making officials', 3, 1),
(4, 'ACCO', 'Accounting Office', 'accounting services', 8, 1),
(5, 'MDCL', 'Medical Clinic and Health Office', 'for medical and health ', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pso_r_user`
--

CREATE TABLE `pso_r_user` (
  `U_ID` int(11) NOT NULL,
  `U_USERNAME` varchar(25) NOT NULL,
  `U_PASSWORD` varchar(150) NOT NULL,
  `U_TYPE` varchar(30) NOT NULL,
  `U_STATUS` varchar(10) NOT NULL DEFAULT 'Active',
  `EP_ID` int(11) NOT NULL,
  `O_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pso_r_user`
--

INSERT INTO `pso_r_user` (`U_ID`, `U_USERNAME`, `U_PASSWORD`, `U_TYPE`, `U_STATUS`, `EP_ID`, `O_ID`) VALUES
(1, 'Cristian', 'balatbat', 'SysAd', 'Active', 1, 2),
(2, 'Edgardo_Delmo', 'serdelmo', 'Property-Custodian', 'Active', 2, 1),
(3, 'Firmo_Esguerra', 'firmo', 'Director', 'Active', 3, 3),
(4, 'admin', 'admin', 'Administrator', 'Active', 2, 1),
(5, 'Demelyn_Monzon', 'maam', 'Departmental-User', 'Active', 5, 2),
(6, 'Robert_Doromal', 'robert', 'Inspection-Officer', 'Active', 4, 1),
(7, 'Mirai_Kuriyama', 'kuriyamamirai', 'Departmental-User', 'Active', 8, 2),
(8, 'VillyOrmido', 'sdfghjk', 'Departmental-User', 'Active', 1, 0),
(12, 'Villy_Ormido', 'villygates', 'Inspection-Officer', 'Active', 1, 1),
(13, 'kurisuchan', 'mirai', 'Departmental-User', 'Active', 1, 2),
(14, 'Sample_User', 'sample', 'Departmental-User', 'Active', 12, 1),
(15, 'Melissa_Sarapuddin', 'medical', 'Medical-Officer', 'Active', 13, 5),
(16, 'Rosanna_Ulep', 'dentist', 'Medical-Officer', 'Active', 14, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pso_r_users_log`
--

CREATE TABLE `pso_r_users_log` (
  `UL_LOGGED_DATE` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UL_LOGGED_TYPE` varchar(50) NOT NULL,
  `EP_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pso_r_users_log`
--

INSERT INTO `pso_r_users_log` (`UL_LOGGED_DATE`, `UL_LOGGED_TYPE`, `EP_ID`) VALUES
('2018-05-02 03:39:51', 'Property-Custodian', 2),
('2018-05-02 04:54:50', 'Departmental-User', 5),
('2018-05-02 04:56:42', 'Departmental-User', 5),
('2018-05-02 04:58:51', 'Inspection-Officer', 4),
('2018-05-02 07:48:08', 'Inspection-Officer', 4),
('2018-05-02 08:42:32', 'Director', 3),
('2018-05-02 10:42:45', 'Inspection-Officer', 4),
('2018-05-02 10:44:18', 'Property-Custodian', 2),
('2018-05-02 10:44:33', 'Property-Custodian', 2),
('2018-05-02 10:53:00', 'Inspection-Officer', 4),
('2018-05-02 12:48:14', 'Director', 3),
('2018-05-02 12:50:45', 'Property-Custodian', 2),
('2018-05-02 12:50:55', 'Property-Custodian', 2),
('2018-05-02 12:51:26', 'Property-Custodian', 2),
('2018-05-02 12:51:52', 'Inspection-Officer', 4),
('2018-05-02 12:52:24', 'Director', 3),
('2018-05-02 12:52:38', 'Property-Custodian', 2),
('2018-05-02 12:55:17', 'Director', 3),
('2018-05-02 13:11:32', 'Departmental-User', 5),
('2018-05-02 13:13:16', 'Inspection-Officer', 4),
('2018-05-02 13:28:04', 'Departmental-User', 5),
('2018-05-02 14:00:29', 'Property-Custodian', 2),
('2018-05-02 14:08:27', 'Departmental-User', 5),
('2018-05-02 14:14:19', 'Inspection-Officer', 4),
('2018-05-02 14:14:51', 'Property-Custodian', 2),
('2018-05-02 14:16:47', 'Property-Custodian', 2),
('2018-05-02 14:18:47', 'Director', 3),
('2018-05-02 14:21:58', 'Inspection-Officer', 4),
('2018-05-02 14:24:09', 'Departmental-User', 5),
('2018-05-02 14:36:18', 'Departmental-User', 5),
('2018-05-02 14:41:17', 'Property-Custodian', 2),
('2018-05-03 05:55:47', 'Director', 3),
('2018-05-03 06:40:02', 'Departmental-User', 5),
('2018-05-03 06:42:24', 'Inspection-Officer', 4),
('2018-05-03 07:48:07', 'Property-Custodian', 2),
('2018-05-03 10:39:30', 'Departmental-User', 12),
('2018-05-03 10:56:18', 'Inspection-Officer', 4),
('2018-05-03 11:26:31', 'Property-Custodian', 2),
('2018-05-03 12:28:13', 'Inspection-Officer', 4),
('2018-05-03 13:35:51', 'Director', 3),
('2018-05-05 15:11:25', 'Departmental-User', 12),
('2018-05-06 18:32:17', 'Medical-Officer', 13),
('2018-05-06 18:32:34', 'Medical-Officer', 13),
('2018-05-06 18:33:50', 'Medical-Officer', 13),
('2018-05-07 04:06:52', 'Departmental-User', 12),
('2018-05-07 04:07:11', 'Property-Custodian', 2),
('2018-05-09 18:21:26', 'Property-Custodian', 2),
('2018-05-09 21:40:09', 'Departmental-User', 12),
('2018-05-10 04:46:20', 'Property-Custodian', 2),
('2018-05-10 12:43:05', 'Departmental-User', 5),
('2018-05-10 16:46:37', 'Departmental-User', 12),
('2018-05-10 19:37:38', 'Departmental-User', 5),
('2018-05-10 19:37:57', 'Departmental-User', 12),
('2018-05-10 20:12:46', 'Departmental-User', 5),
('2018-05-10 20:13:54', 'Departmental-User', 12),
('2018-05-10 20:19:22', 'Departmental-User', 5),
('2018-05-10 20:19:41', 'Departmental-User', 12),
('2018-05-10 20:30:23', 'Property-Custodian', 2),
('2018-05-10 20:56:29', 'Departmental-User', 5),
('2018-05-11 05:04:11', 'Departmental-User', 5),
('2018-05-11 05:04:23', 'Departmental-User', 12),
('2018-05-11 05:47:06', 'Property-Custodian', 2),
('2018-05-11 06:35:09', 'Inspection-Officer', 4),
('2018-05-12 20:03:29', 'Medical-Officer', 13),
('2018-05-13 10:55:03', 'Inspection-Officer', 4),
('2018-05-13 11:37:03', 'Medical-Officer', 13),
('2018-05-13 17:46:22', 'Director', 3),
('2018-05-14 18:07:41', 'Director', 3),
('2018-05-15 10:14:37', 'Inspection-Officer', 4),
('2018-05-15 10:15:35', 'Medical-Officer', 13),
('2018-05-15 10:43:20', 'Property-Custodian', 2),
('2018-05-15 10:44:58', 'Medical-Officer', 13),
('2018-05-15 10:45:21', 'Departmental-User', 12),
('2018-05-15 10:47:57', 'Medical-Officer', 13),
('2018-05-15 11:01:05', 'Property-Custodian', 2),
('2018-05-15 11:05:28', 'Medical-Officer', 13),
('2018-05-15 11:23:26', 'Property-Custodian', 2),
('2018-05-15 11:40:23', 'Director', 3),
('2018-05-15 14:23:12', 'Medical-Officer', 13),
('2018-05-15 19:52:05', 'Property-Custodian', 2),
('2018-05-16 14:48:09', 'Departmental-User', 5),
('2018-05-16 16:05:13', 'Medical-Officer', 13),
('2018-05-16 16:53:51', 'Director', 3),
('2018-05-17 09:27:14', 'Medical-Officer', 13),
('2018-05-17 09:45:29', 'Medical-Officer', 14),
('2018-05-17 09:56:57', 'Medical-Officer', 13),
('2018-05-17 10:12:46', 'Medical-Officer', 13),
('2018-05-17 10:33:25', 'Medical-Officer', 13),
('2018-05-17 10:46:42', 'Departmental-User', 12),
('2018-05-17 10:58:13', 'Medical-Officer', 13),
('2018-05-17 17:46:53', 'Medical-Officer', 14),
('2018-05-17 17:47:19', 'Medical-Officer', 13),
('2018-05-17 21:20:56', 'Director', 3),
('2018-05-17 22:23:06', 'Medical-Officer', 14),
('2018-05-18 00:39:43', 'Medical-Officer', 13),
('2018-05-18 00:50:07', 'Medical-Officer', 14),
('2018-05-18 02:37:11', 'Medical-Officer', 13),
('2018-05-18 04:19:48', 'Director', 3),
('2018-05-18 04:20:21', 'Property-Custodian', 2),
('2018-05-18 04:20:43', 'Property-Custodian', 2),
('2018-05-18 04:21:26', 'Inspection-Officer', 4),
('2018-05-18 04:23:58', 'Inspection-Officer', 4),
('2018-05-18 04:26:18', 'Departmental-User', 5),
('2018-05-18 04:27:13', 'Departmental-User', 12),
('2018-05-18 04:28:24', 'Director', 3),
('2018-05-18 04:29:00', 'Departmental-User', 5),
('2018-05-18 04:29:06', 'Medical-Officer', 13),
('2018-05-18 04:29:15', 'Medical-Officer', 14),
('2018-05-18 10:08:16', 'Inspection-Officer', 4),
('2018-05-18 10:08:51', 'Medical-Officer', 13),
('2018-05-19 10:36:30', 'Medical-Officer', 14),
('2018-05-19 10:37:01', 'Medical-Officer', 13),
('2018-05-20 10:21:25', 'Medical-Officer', 14),
('2018-05-20 14:50:42', 'Inspection-Officer', 4),
('2018-05-20 20:12:49', 'Medical-Officer', 13),
('2018-05-20 20:28:48', 'Inspection-Officer', 4),
('2018-05-21 06:09:36', 'Director', 3),
('2018-05-21 06:10:03', 'Property-Custodian', 2),
('2018-05-21 06:22:55', 'Medical-Officer', 13),
('2018-05-21 06:23:18', 'Inspection-Officer', 4),
('2018-05-21 06:26:19', 'Property-Custodian', 2),
('2018-05-21 07:10:22', 'Inspection-Officer', 4),
('2018-05-21 09:54:17', 'Inspection-Officer', 4),
('2018-05-21 10:05:21', 'Property-Custodian', 2),
('2018-05-21 10:06:39', 'Director', 3),
('2018-05-21 10:11:35', 'Medical-Officer', 13),
('2018-05-21 10:30:45', 'Departmental-User', 12),
('2018-05-21 10:38:10', 'Departmental-User', 12),
('2018-05-21 11:48:18', 'Property-Custodian', 2),
('2018-05-21 11:52:50', 'Property-Custodian', 2),
('2018-05-21 11:57:26', 'Inspection-Officer', 4),
('2018-05-21 12:01:59', 'Property-Custodian', 2),
('2018-05-21 13:44:15', 'Medical-Officer', 13),
('2018-05-21 13:47:08', 'Director', 3),
('2018-05-21 13:50:50', 'Medical-Officer', 14),
('2018-05-21 13:51:33', 'Medical-Officer', 13),
('2018-05-21 13:55:14', 'Inspection-Officer', 4),
('2018-05-21 13:58:29', 'Property-Custodian', 2),
('2018-05-21 14:22:23', 'Departmental-User', 12),
('2018-05-21 14:36:58', 'Property-Custodian', 2),
('2018-05-21 15:12:32', 'Inspection-Officer', 4),
('2018-05-21 15:13:04', 'Property-Custodian', 2),
('2018-05-21 16:57:53', 'Medical-Officer', 13),
('2018-05-22 00:26:58', 'Director', 3),
('2018-05-22 01:55:31', 'Property-Custodian', 2),
('2018-05-22 01:57:45', 'Director', 3),
('2018-05-22 02:27:41', 'Inspection-Officer', 4),
('2018-05-22 03:51:46', 'Director', 3),
('2018-05-22 04:49:44', 'Property-Custodian', 2),
('2018-05-22 10:26:12', 'Property-Custodian', 2),
('2018-05-22 11:26:49', 'Medical-Officer', 13),
('2018-05-22 11:32:29', 'Property-Custodian', 2),
('2018-05-22 11:37:45', 'Property-Custodian', 2),
('2018-05-22 11:38:59', 'Property-Custodian', 2),
('2018-05-22 11:42:59', 'Director', 3),
('2018-05-22 13:13:27', 'Property-Custodian', 2),
('2018-05-22 13:15:50', 'Director', 3),
('2018-05-22 13:32:25', 'Property-Custodian', 2),
('2018-05-22 14:28:42', 'Departmental-User', 12),
('2018-05-22 17:19:55', 'Departmental-User', 12),
('2018-05-22 21:15:36', 'Departmental-User', 5),
('2018-05-22 21:24:32', 'Departmental-User', 12),
('2018-05-22 21:34:52', 'Departmental-User', 5),
('2018-05-22 21:35:33', 'Departmental-User', 12),
('2018-05-22 21:36:54', 'Property-Custodian', 2),
('2018-05-22 21:41:25', 'Departmental-User', 5),
('2018-05-22 21:55:42', 'Departmental-User', 5),
('2018-05-22 21:56:11', 'Property-Custodian', 2),
('2018-05-22 21:56:37', 'Director', 3),
('2018-05-22 21:57:03', 'Property-Custodian', 2),
('2018-05-22 21:58:58', 'Departmental-User', 12),
('2018-05-22 21:59:51', 'Departmental-User', 5),
('2018-05-22 22:05:34', 'Medical-Officer', 13),
('2018-05-22 22:13:06', 'Departmental-User', 5),
('2018-05-23 00:35:16', 'Departmental-User', 5),
('2018-05-23 00:35:31', 'Property-Custodian', 2),
('2018-05-23 01:33:09', 'Departmental-User', 5),
('2018-05-23 01:33:57', 'Departmental-User', 5),
('2018-05-23 01:41:23', 'Director', 3),
('2018-05-23 21:58:38', 'Director', 3),
('2018-05-24 03:55:46', 'Director', 3),
('2018-05-24 04:07:07', 'Medical-Officer', 13),
('2018-05-24 04:19:25', 'Medical-Officer', 13),
('2018-05-24 05:18:02', 'Inspection-Officer', 4),
('2018-05-26 06:29:57', 'Departmental-User', 5),
('2018-05-26 06:30:22', 'Director', 3),
('2018-05-26 06:41:11', 'Inspection-Officer', 4),
('2018-05-26 07:03:19', 'Director', 3),
('2018-05-26 08:24:18', 'Property-Custodian', 2),
('2018-06-05 20:01:14', 'Medical-Officer', 13),
('2018-06-05 20:02:20', 'Director', 3),
('2018-06-05 20:02:54', 'Property-Custodian', 2),
('2018-07-09 17:14:06', 'SysAd', 1),
('2018-07-09 17:14:43', 'Departmental-User', 5),
('2018-07-09 17:35:33', 'Director', 3),
('2018-07-09 17:43:06', 'Property-Custodian', 2),
('2018-07-09 17:44:28', 'Director', 3),
('2018-07-09 17:51:29', 'SysAd', 1),
('2018-07-09 17:51:33', 'SysAd', 1),
('2018-07-09 17:51:48', 'SysAd', 1),
('2018-07-09 17:52:31', 'Administrator', 2),
('2018-07-09 17:55:13', 'Property-Custodian', 2),
('2018-07-09 17:55:38', 'Property-Custodian', 2),
('2018-07-09 20:06:00', 'Director', 3),
('2018-07-09 20:29:38', 'Departmental-User', 5),
('2018-07-10 10:54:50', 'Director', 3),
('2018-07-10 10:56:20', 'Director', 3),
('2018-07-10 10:56:29', 'Director', 3),
('2018-07-10 10:58:30', 'Property-Custodian', 2),
('2018-07-10 11:08:17', 'Director', 3),
('2018-07-11 10:20:19', 'Director', 3),
('2018-07-11 10:35:33', 'Medical-Officer', 13),
('2018-07-11 11:01:13', 'Inspection-Officer', 4),
('2018-07-11 14:14:26', 'Director', 3),
('2018-07-11 14:16:58', 'Director', 3),
('2018-07-11 14:17:23', 'Director', 3),
('2018-07-11 14:29:05', 'Inspection-Officer', 4),
('2018-07-11 14:38:34', 'Director', 3),
('2018-07-13 20:07:41', 'Medical-Officer', 13),
('2018-07-13 20:11:33', 'Medical-Officer', 13),
('2018-07-14 10:50:58', 'Medical-Officer', 13),
('2018-07-14 11:05:22', 'Property-Custodian', 2),
('2018-07-14 11:12:45', 'Departmental-User', 5),
('2018-07-14 11:14:15', 'Property-Custodian', 2),
('2018-07-14 13:26:28', 'Departmental-User', 5),
('2018-07-14 13:37:29', 'Director', 3),
('2018-07-15 14:59:56', 'Departmental-User', 8),
('2018-07-15 15:00:32', 'Departmental-User', 12),
('2018-07-15 15:01:06', 'Departmental-User', 5),
('2018-07-15 15:18:52', 'Property-Custodian', 2),
('2018-07-15 15:45:13', 'Director', 3),
('2018-07-15 19:20:15', 'Departmental-User', 5),
('2018-07-16 11:27:37', 'Director', 3),
('2018-07-17 18:03:53', 'Property-Custodian', 2),
('2018-07-17 19:47:09', 'Departmental-User', 5),
('2018-07-20 16:45:26', 'Property-Custodian', 2),
('2018-07-20 16:46:59', 'Departmental-User', 5),
('2018-07-20 18:11:46', 'Director', 3),
('2018-07-20 18:37:25', 'Medical-Officer', 13),
('2018-07-20 18:49:28', 'Property-Custodian', 2),
('2018-07-20 18:57:10', 'Inspection-Officer', 4),
('2018-07-20 18:58:20', 'Property-Custodian', 2),
('2018-07-20 19:04:37', 'Inspection-Officer', 4),
('2018-07-20 19:06:34', 'Property-Custodian', 2),
('2018-07-21 13:24:29', 'Medical-Officer', 13),
('2018-07-21 15:01:32', 'Medical-Officer', 14),
('2018-07-21 15:11:13', 'Property-Custodian', 2),
('2018-07-21 15:32:04', 'Medical-Officer', 13),
('2018-07-21 18:09:16', 'Inspection-Officer', 4),
('2018-07-22 09:45:54', 'Property-Custodian', 2),
('2018-07-22 09:47:15', 'Director', 3),
('2018-07-22 10:07:15', 'Property-Custodian', 2),
('2018-07-22 10:08:07', 'Property-Custodian', 2),
('2018-07-22 10:09:16', 'Director', 3),
('2018-07-22 10:48:17', 'Property-Custodian', 2),
('2018-07-22 10:49:07', 'Director', 3),
('2018-07-22 10:52:31', 'Property-Custodian', 2),
('2018-07-22 10:53:52', 'Director', 3),
('2018-07-22 11:18:01', 'Medical-Officer', 13),
('2018-08-03 17:14:21', 'Medical-Officer', 13),
('2018-08-03 17:15:30', 'Medical-Officer', 13),
('2018-08-03 17:35:13', 'Medical-Officer', 13),
('2018-08-03 18:41:18', 'Director', 3),
('2018-08-12 13:50:41', 'Medical-Officer', 13),
('2018-08-12 15:14:20', 'Director', 3),
('2018-11-07 19:31:29', 'Property-Custodian', 2),
('2018-11-26 13:06:04', 'Director', 3),
('2018-11-26 13:07:35', 'Property-Custodian', 2),
('2018-12-01 11:02:39', 'Departmental-User', 5),
('2018-12-01 11:03:25', 'Property-Custodian', 2),
('2018-12-01 11:05:10', 'Inspection-Officer', 4),
('2019-02-10 10:20:30', 'Property-Custodian', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ims_r_clinical_category`
--
ALTER TABLE `ims_r_clinical_category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `ims_r_clinical_stock`
--
ALTER TABLE `ims_r_clinical_stock`
  ADD PRIMARY KEY (`Item_No`);

--
-- Indexes for table `ims_r_medicinal_stock`
--
ALTER TABLE `ims_r_medicinal_stock`
  ADD PRIMARY KEY (`Med_No`);

--
-- Indexes for table `ims_r_medicine_category`
--
ALTER TABLE `ims_r_medicine_category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `ims_r_office_category`
--
ALTER TABLE `ims_r_office_category`
  ADD PRIMARY KEY (`Category_ID`),
  ADD UNIQUE KEY `Category_Name` (`Category_Name`);

--
-- Indexes for table `ims_r_office_stock`
--
ALTER TABLE `ims_r_office_stock`
  ADD PRIMARY KEY (`Item_No`),
  ADD UNIQUE KEY `Stock_Key_Unit` (`Stock_Key_Unit`),
  ADD KEY `Item_Category` (`Item_Category`);

--
-- Indexes for table `ims_t_acquisition`
--
ALTER TABLE `ims_t_acquisition`
  ADD PRIMARY KEY (`Acquisition_No`);

--
-- Indexes for table `ims_t_acquisition_clinic`
--
ALTER TABLE `ims_t_acquisition_clinic`
  ADD PRIMARY KEY (`Acquisition_No`);

--
-- Indexes for table `ims_t_acquisition_med`
--
ALTER TABLE `ims_t_acquisition_med`
  ADD PRIMARY KEY (`Acquisition_No`);

--
-- Indexes for table `ims_t_clinic_requisition`
--
ALTER TABLE `ims_t_clinic_requisition`
  ADD PRIMARY KEY (`Requisition_No`),
  ADD KEY `Batch_No` (`Batch_No`);

--
-- Indexes for table `ims_t_clinic_summary_request`
--
ALTER TABLE `ims_t_clinic_summary_request`
  ADD PRIMARY KEY (`Sum_No`);

--
-- Indexes for table `ims_t_dept_issuance`
--
ALTER TABLE `ims_t_dept_issuance`
  ADD PRIMARY KEY (`Issue_No`),
  ADD KEY `Batch_No` (`Batch_No`),
  ADD KEY `SKU` (`SKU`);

--
-- Indexes for table `ims_t_dept_requisition`
--
ALTER TABLE `ims_t_dept_requisition`
  ADD PRIMARY KEY (`DeptReq_No`),
  ADD KEY `Batch_No` (`Batch_No`),
  ADD KEY `Item_SKU` (`Item_SKU`);

--
-- Indexes for table `ims_t_dept_summary_request`
--
ALTER TABLE `ims_t_dept_summary_request`
  ADD PRIMARY KEY (`DeptSum_No`),
  ADD KEY `Depart_Name` (`Depart_Name`);

--
-- Indexes for table `ims_t_med_requisition`
--
ALTER TABLE `ims_t_med_requisition`
  ADD PRIMARY KEY (`Requisition_No`),
  ADD KEY `Batch_No` (`Batch_No`);

--
-- Indexes for table `ims_t_med_summary_request`
--
ALTER TABLE `ims_t_med_summary_request`
  ADD PRIMARY KEY (`Sum_No`);

--
-- Indexes for table `ims_t_ppmp_clinic_details`
--
ALTER TABLE `ims_t_ppmp_clinic_details`
  ADD PRIMARY KEY (`Ent_ID`),
  ADD KEY `Batch_No` (`Batch_No`);

--
-- Indexes for table `ims_t_ppmp_clinic_summary`
--
ALTER TABLE `ims_t_ppmp_clinic_summary`
  ADD PRIMARY KEY (`MED_PPMP_ID`);

--
-- Indexes for table `ims_t_ppmp_med_details`
--
ALTER TABLE `ims_t_ppmp_med_details`
  ADD PRIMARY KEY (`Ent_ID`),
  ADD KEY `Batch_No` (`Batch_No`);

--
-- Indexes for table `ims_t_ppmp_med_summary`
--
ALTER TABLE `ims_t_ppmp_med_summary`
  ADD PRIMARY KEY (`MED_PPMP_ID`);

--
-- Indexes for table `ims_t_requisition`
--
ALTER TABLE `ims_t_requisition`
  ADD PRIMARY KEY (`Requisition_No`),
  ADD KEY `Batch_No` (`Batch_No`);

--
-- Indexes for table `ims_t_summary_issuance`
--
ALTER TABLE `ims_t_summary_issuance`
  ADD PRIMARY KEY (`Batch_No`),
  ADD KEY `Account_ID` (`Account_ID`),
  ADD KEY `Depart_Name` (`Depart_Name`);

--
-- Indexes for table `ims_t_summary_request`
--
ALTER TABLE `ims_t_summary_request`
  ADD PRIMARY KEY (`Sum_No`);

--
-- Indexes for table `pso_r_employee_profile`
--
ALTER TABLE `pso_r_employee_profile`
  ADD PRIMARY KEY (`EP_ID`),
  ADD KEY `O_ID` (`O_ID`);

--
-- Indexes for table `pso_r_office`
--
ALTER TABLE `pso_r_office`
  ADD PRIMARY KEY (`O_ID`),
  ADD UNIQUE KEY `O_NAME` (`O_NAME`),
  ADD KEY `EP_ID` (`EP_ID`),
  ADD KEY `C_ID` (`C_ID`);

--
-- Indexes for table `pso_r_user`
--
ALTER TABLE `pso_r_user`
  ADD PRIMARY KEY (`U_ID`),
  ADD UNIQUE KEY `U_USERNAME` (`U_USERNAME`),
  ADD KEY `EP_ID` (`EP_ID`);

--
-- Indexes for table `pso_r_users_log`
--
ALTER TABLE `pso_r_users_log`
  ADD UNIQUE KEY `UL_LOGGED_DATE` (`UL_LOGGED_DATE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ims_r_clinical_category`
--
ALTER TABLE `ims_r_clinical_category`
  MODIFY `Category_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ims_r_clinical_stock`
--
ALTER TABLE `ims_r_clinical_stock`
  MODIFY `Item_No` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ims_r_medicinal_stock`
--
ALTER TABLE `ims_r_medicinal_stock`
  MODIFY `Med_No` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `ims_r_medicine_category`
--
ALTER TABLE `ims_r_medicine_category`
  MODIFY `Category_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ims_r_office_category`
--
ALTER TABLE `ims_r_office_category`
  MODIFY `Category_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ims_r_office_stock`
--
ALTER TABLE `ims_r_office_stock`
  MODIFY `Item_No` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ims_t_acquisition`
--
ALTER TABLE `ims_t_acquisition`
  MODIFY `Acquisition_No` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `ims_t_acquisition_clinic`
--
ALTER TABLE `ims_t_acquisition_clinic`
  MODIFY `Acquisition_No` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ims_t_acquisition_med`
--
ALTER TABLE `ims_t_acquisition_med`
  MODIFY `Acquisition_No` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `ims_t_clinic_requisition`
--
ALTER TABLE `ims_t_clinic_requisition`
  MODIFY `Requisition_No` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ims_t_clinic_summary_request`
--
ALTER TABLE `ims_t_clinic_summary_request`
  MODIFY `Sum_No` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ims_t_dept_issuance`
--
ALTER TABLE `ims_t_dept_issuance`
  MODIFY `Issue_No` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `ims_t_dept_requisition`
--
ALTER TABLE `ims_t_dept_requisition`
  MODIFY `DeptReq_No` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `ims_t_dept_summary_request`
--
ALTER TABLE `ims_t_dept_summary_request`
  MODIFY `DeptSum_No` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ims_t_med_requisition`
--
ALTER TABLE `ims_t_med_requisition`
  MODIFY `Requisition_No` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `ims_t_med_summary_request`
--
ALTER TABLE `ims_t_med_summary_request`
  MODIFY `Sum_No` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ims_t_ppmp_clinic_details`
--
ALTER TABLE `ims_t_ppmp_clinic_details`
  MODIFY `Ent_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ims_t_ppmp_clinic_summary`
--
ALTER TABLE `ims_t_ppmp_clinic_summary`
  MODIFY `MED_PPMP_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ims_t_ppmp_med_details`
--
ALTER TABLE `ims_t_ppmp_med_details`
  MODIFY `Ent_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ims_t_ppmp_med_summary`
--
ALTER TABLE `ims_t_ppmp_med_summary`
  MODIFY `MED_PPMP_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ims_t_requisition`
--
ALTER TABLE `ims_t_requisition`
  MODIFY `Requisition_No` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `ims_t_summary_request`
--
ALTER TABLE `ims_t_summary_request`
  MODIFY `Sum_No` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pso_r_employee_profile`
--
ALTER TABLE `pso_r_employee_profile`
  MODIFY `EP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pso_r_office`
--
ALTER TABLE `pso_r_office`
  MODIFY `O_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pso_r_user`
--
ALTER TABLE `pso_r_user`
  MODIFY `U_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ims_r_office_stock`
--
ALTER TABLE `ims_r_office_stock`
  ADD CONSTRAINT `ims_r_office_stock_ibfk_1` FOREIGN KEY (`Item_Category`) REFERENCES `ims_r_office_category` (`Category_Name`);

--
-- Constraints for table `ims_t_dept_issuance`
--
ALTER TABLE `ims_t_dept_issuance`
  ADD CONSTRAINT `ims_t_dept_issuance_ibfk_2` FOREIGN KEY (`SKU`) REFERENCES `ims_r_office_stock` (`Stock_Key_Unit`);

--
-- Constraints for table `ims_t_dept_requisition`
--
ALTER TABLE `ims_t_dept_requisition`
  ADD CONSTRAINT `ims_t_dept_requisition_ibfk_1` FOREIGN KEY (`Batch_No`) REFERENCES `ims_t_dept_summary_request` (`DeptSum_No`),
  ADD CONSTRAINT `ims_t_dept_requisition_ibfk_2` FOREIGN KEY (`Item_SKU`) REFERENCES `ims_r_office_stock` (`Stock_Key_Unit`);

--
-- Constraints for table `ims_t_dept_summary_request`
--
ALTER TABLE `ims_t_dept_summary_request`
  ADD CONSTRAINT `ims_t_dept_summary_request_ibfk_1` FOREIGN KEY (`Depart_Name`) REFERENCES `pso_r_office` (`O_NAME`);

--
-- Constraints for table `ims_t_med_requisition`
--
ALTER TABLE `ims_t_med_requisition`
  ADD CONSTRAINT `ims_t_med_requisition_ibfk_1` FOREIGN KEY (`Batch_No`) REFERENCES `ims_t_med_summary_request` (`Sum_No`);

--
-- Constraints for table `ims_t_ppmp_med_details`
--
ALTER TABLE `ims_t_ppmp_med_details`
  ADD CONSTRAINT `ims_t_ppmp_med_details_ibfk_1` FOREIGN KEY (`Batch_No`) REFERENCES `ims_t_ppmp_med_summary` (`MED_PPMP_ID`);

--
-- Constraints for table `ims_t_requisition`
--
ALTER TABLE `ims_t_requisition`
  ADD CONSTRAINT `ims_t_requisition_ibfk_1` FOREIGN KEY (`Batch_No`) REFERENCES `ims_t_summary_request` (`Sum_No`);

--
-- Constraints for table `ims_t_summary_issuance`
--
ALTER TABLE `ims_t_summary_issuance`
  ADD CONSTRAINT `ims_t_summary_issuance_ibfk_1` FOREIGN KEY (`Account_ID`) REFERENCES `pso_r_user` (`U_ID`),
  ADD CONSTRAINT `ims_t_summary_issuance_ibfk_2` FOREIGN KEY (`Depart_Name`) REFERENCES `pso_r_office` (`O_NAME`);

--
-- Constraints for table `pso_r_employee_profile`
--
ALTER TABLE `pso_r_employee_profile`
  ADD CONSTRAINT `pso_r_employee_profile_ibfk_1` FOREIGN KEY (`O_ID`) REFERENCES `pso_r_office` (`O_ID`);

--
-- Constraints for table `pso_r_user`
--
ALTER TABLE `pso_r_user`
  ADD CONSTRAINT `pso_r_user_ibfk_1` FOREIGN KEY (`EP_ID`) REFERENCES `pso_r_employee_profile` (`EP_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
