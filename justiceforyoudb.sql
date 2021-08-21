-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2020 at 08:34 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `justiceforyoudb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` varchar(25) NOT NULL,
  `adname` varchar(50) NOT NULL,
  `adnrcnumber` varchar(30) NOT NULL,
  `adage` int(11) NOT NULL,
  `adphoneno` varchar(11) NOT NULL,
  `ademail` text NOT NULL,
  `adaddress` text NOT NULL,
  `adposition` varchar(25) NOT NULL,
  `adpassword` text NOT NULL,
  `adconfirmpassword` text NOT NULL,
  `adeducation` varchar(50) NOT NULL,
  `adsalary` int(11) NOT NULL,
  `adexperience` varchar(20) NOT NULL,
  `adavatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adname`, `adnrcnumber`, `adage`, `adphoneno`, `ademail`, `adaddress`, `adposition`, `adpassword`, `adconfirmpassword`, `adeducation`, `adsalary`, `adexperience`, `adavatar`) VALUES
('admin_000001', 'Lil Miquela', '7/AHPHANA(N)129276', 22, '09763644855', 'mique@gmail.com', 'Sanchaung,Yangon', 'Manager', '45a6de41486403790a933991f89c04c4d38bb018', '45a6de41486403790a933991f89c04c4d38bb018', 'BA(ECO)(YGN)', 1500000, '5 years', 'assets/img/miquela.jpg'),
('admin_000002', 'Zayn Malik', '12/(N)213456', 28, '09444061144', 'Zayn@gmail.com', 'Yangon', 'Owner', '20b47338a53b8b86fd9d056e03a8ee169b80210a', '20b47338a53b8b86fd9d056e03a8ee169b80210a', 'L.L.B(UK), L.L.M(UK)', 0, '', 'assets/img/ZaynMalik.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `bookingid` varchar(20) NOT NULL,
  `lawyerid` varchar(15) NOT NULL,
  `clientid` varchar(13) NOT NULL,
  `appointmentdate` date NOT NULL,
  `status` varchar(30) NOT NULL,
  `slotid` varchar(15) NOT NULL,
  `casedescription` text NOT NULL,
  `bookingdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`bookingid`, `lawyerid`, `clientid`, `appointmentdate`, `status`, `slotid`, `casedescription`, `bookingdate`) VALUES
('book_000002', 'lawyer_000008', 'client_000001', '2020-05-23', 'Confirmed', 'slot_000001', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '2020-05-22'),
('book_000003', 'lawyer_000008', 'client_000001', '2020-05-25', 'Confirmed', 'slot_000002', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '2020-05-22'),
('book_000005', 'lawyer_000002', 'client_000001', '2020-05-27', 'Confirmed', 'slot_000001', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '2020-05-22'),
('book_000006', 'lawyer_000008', 'client_000001', '2020-05-23', 'Confirmed', 'slot_000002', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '2020-05-22'),
('book_000007', 'lawyer_000009', 'client_000001', '2020-05-23', 'Pending', 'slot_000004', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '2020-05-22'),
('book_000008', 'lawyer_000006', 'client_000003', '2020-05-23', 'Pending', 'slot_000003', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-05-22'),
('book_000009', 'lawyer_000011', 'client_000001', '2020-05-23', 'Confirmed', 'slot_000001', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-05-22'),
('book_000010', 'lawyer_000010', 'client_000001', '2020-05-25', 'Pending', 'slot_000001', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-05-22'),
('book_000011', 'lawyer_000007', 'client_000001', '2020-05-27', 'Pending', 'slot_000001', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-05-22'),
('book_000012', 'lawyer_000003', 'client_000001', '2020-05-28', 'Pending', 'slot_000001', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '2020-05-22'),
('book_000013', 'lawyer_000011', 'client_000001', '2020-05-25', 'Confirmed', 'slot_000002', ' he trial lawyers at Arnold & Itkin LLP are known for the unique blend of skill, energy, and passion they bring to each and every', '2020-05-23'),
('book_000014', 'lawyer_000011', 'client_000001', '2020-05-25', 'Pending', 'slot_000004', ' The trial lawyers at Arnold & Itkin LLP are known for the unique blend of skill, energy, and passion they bring to each and every case.', '2020-05-23'),
('book_000015', 'lawyer_000011', 'client_000001', '2020-05-25', 'Pending', 'slot_000003', ' nnnnn', '2020-05-23'),
('book_000016', 'lawyer_000011', 'client_000001', '2020-05-25', 'Pending', 'slot_000001', ' nnnnnn', '2020-05-23'),
('book_000017', 'lawyer_000011', 'client_000001', '2020-05-26', 'Pending', 'slot_000004', ' bbbbbb', '2020-05-23'),
('book_000018', 'lawyer_000011', 'client_000001', '2020-05-26', 'Confirmed', 'slot_000002', ' ggggg', '2020-05-24'),
('book_000019', 'lawyer_000011', 'client_000001', '2020-05-26', 'Pending', 'slot_000003', ' bbbb', '2020-05-24'),
('book_000020', 'lawyer_000011', 'client_000001', '2020-05-28', 'Pending', 'slot_000001', ' mmm', '2020-05-27'),
('book_000021', 'lawyer_000011', 'client_000001', '2020-05-28', 'Pending', 'slot_000002', ' hhhhhhhh', '2020-05-27'),
('book_000022', 'lawyer_000011', 'client_000001', '2020-05-28', 'Pending', 'slot_000003', ' kikkk', '2020-05-27'),
('book_000023', 'lawyer_000011', 'client_000001', '2020-05-29', 'Pending', 'slot_000003', ' nnn', '2020-05-27'),
('book_000024', 'lawyer_000017', 'client_000001', '2020-06-01', 'Pending', 'slot_000002', ' ', '2020-05-30'),
('book_000025', 'lawyer_000017', 'client_000001', '2020-06-01', 'Pending', 'slot_000003', ' ', '2020-05-30'),
('book_000026', 'lawyer_000017', 'client_000001', '2020-06-01', 'Pending', 'slot_000004', ' ', '2020-05-30'),
('book_000027', 'lawyer_000017', 'client_000001', '2020-06-01', 'Pending', 'slot_000005', 'Child abuse case.', '2020-05-30'),
('book_000028', 'lawyer_000017', 'client_000001', '2020-06-02', 'Pending', 'slot_000002', 'This case is child abuse.', '2020-05-30'),
('book_000029', 'lawyer_000017', 'client_000001', '2020-06-02', 'Pending', 'slot_000003', 'This case is child abuse.', '2020-05-30'),
('book_000030', 'lawyer_000017', 'client_000001', '2020-06-02', 'Pending', 'slot_000004', 'This case is child abuse.', '2020-05-30'),
('book_000031', 'lawyer_000017', 'client_000001', '2020-06-02', 'Pending', 'slot_000005', 'This case is child abuse.', '2020-05-30'),
('book_000032', 'lawyer_000017', 'client_000001', '2020-06-03', 'Pending', 'slot_000002', 'The trial lawyers at Arnold & Itkin LLP are known for the unique blend of skill, energy, and passion they bring to each and every case.', '2020-05-31'),
('book_000033', 'lawyer_000017', 'client_000001', '2020-06-03', 'Pending', 'slot_000003', 'The trial lawyers at Arnold & Itkin LLP are known for the unique blend of skill, energy, and passion they bring to each and every case.', '2020-05-31'),
('book_000034', 'lawyer_000017', 'client_000001', '2020-06-03', 'Pending', 'slot_000004', 'The trial lawyers at Arnold & Itkin LLP are known for the unique blend of skill, energy, and passion they bring to each and every case.', '2020-06-01'),
('book_000035', 'lawyer_000017', 'client_000001', '2020-06-03', 'Pending', 'slot_000005', 'The trial lawyers at Arnold & Itkin LLP are known for the unique blend of skill, energy, and passion they bring to each and every case.', '2020-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `availableslot`
--

CREATE TABLE `availableslot` (
  `slotid` varchar(15) NOT NULL,
  `slotstart` varchar(50) NOT NULL,
  `slotend` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `availableslot`
--

INSERT INTO `availableslot` (`slotid`, `slotstart`, `slotend`) VALUES
('slot_000002', '11:30 AM', '1:30 PM'),
('slot_000003', '2:00 PM', '4:00 PM'),
('slot_000004', '5:00 pm', '7:00 pm'),
('slot_000005', '9:05 AM', '11:05 PM');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientid` varchar(13) NOT NULL,
  `clname` varchar(30) NOT NULL,
  `cnrcnumber` varchar(30) NOT NULL,
  `cage` int(11) NOT NULL,
  `cphoneno` varchar(11) NOT NULL,
  `cemail` text NOT NULL,
  `caddress` text NOT NULL,
  `cpassword` text NOT NULL,
  `cconpassword` text NOT NULL,
  `cavatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientid`, `clname`, `cnrcnumber`, `cage`, `cphoneno`, `cemail`, `caddress`, `cpassword`, `cconpassword`, `cavatar`) VALUES
('client_000001', 'Lisa Manobon', '9/MATAYA(P)129276', 24, '09444061144', 'lisa@gmail.com', 'Yangon', '2be61768bd485dd5d3c257361e08ec9d8546b8f7', '2be61768bd485dd5d3c257361e08ec9d8546b8f7', '../image/lisa.jpeg'),
('client_000002', 'Mon Chae Won', '11/AHMANA(N)218946', 30, '09444061144', 'monchae@gmail.com', 'Yangon', '6da662b29797cd261c364a7d0683f36ff6a24ca4', '6da662b29797cd261c364a7d0683f36ff6a24ca4', '../image/moon-chae-won.jpeg'),
('client_000003', 'Song Joong Ki', '14/AHGAPA(TH)213456', 30, '09345678902', 'sjk@gmail.com', 'Yangon', '4c155d33db6431f64d8ed51bdf87d41b68760481', '4c155d33db6431f64d8ed51bdf87d41b68760481', '../image/songjoongki.jpeg'),
('client_000004', 'Yoon Myat Cherry', '1/AHGHAYA(N)123456', 19, '09422715702', 'chelchel@gmail.com', 'Yangon', '6d5caadff47357330e85007c604b366e4b406e11', '6d5caadff47357330e85007c604b366e4b406e11', '../image/SongHyeKyo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contactid` int(11) NOT NULL,
  `contactname` varchar(50) NOT NULL,
  `contactemail` varchar(50) NOT NULL,
  `contactmassage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactid`, `contactname`, `contactemail`, `contactmassage`) VALUES
(1, 'ggg', 'zins61301@gmail.com', 'kkdkdkdk'),
(2, 'ggg', 'w.ye.linn.04@gmail.com', 'jjjj');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer`
--

CREATE TABLE `lawyer` (
  `lawyerid` varchar(15) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `lnrcnumber` varchar(30) NOT NULL,
  `lage` int(11) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `lphoneno` varchar(11) NOT NULL,
  `lemail` text NOT NULL,
  `laddress` text NOT NULL,
  `lposition` varchar(30) NOT NULL,
  `pricepersession` int(11) NOT NULL,
  `lpassword` text NOT NULL,
  `lconfirmpassword` text NOT NULL,
  `leducation` varchar(50) NOT NULL,
  `lsalary` int(11) NOT NULL,
  `lexperience` varchar(30) NOT NULL,
  `lavatar` text NOT NULL,
  `sectorid` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lawyer`
--

INSERT INTO `lawyer` (`lawyerid`, `lname`, `lnrcnumber`, `lage`, `gender`, `lphoneno`, `lemail`, `laddress`, `lposition`, `pricepersession`, `lpassword`, `lconfirmpassword`, `leducation`, `lsalary`, `lexperience`, `lavatar`, `sectorid`) VALUES
('lawyer_000002', 'Faulkner Fiennes Tiffin', '12/AHLANA(N)213456', 28, 'Male', '09250563424', 'Hardin@gmail.com', 'Maharmyaing,Yangon', 'Attorney', 350, 'c080178f4cc9f85a2c3d0c7a09790a34a1cee848', 'c080178f4cc9f85a2c3d0c7a09790a34a1cee848', 'L.L.B(Austrilia), L.L.M(Austrilia)', 1500000, '5 years', '../image/hardin.jpeg', 'sector_000007 '),
('lawyer_000003', 'Josephine Langford', '12/AHLANA(N)213456', 23, 'Female', '09763644855', 'Jose@gmail.com', 'Hlaedan,Yangon', 'Attorney', 300, ' 9b0c8db1c812f22ec16b89733e8e49a4bcdd4bb5', ' 9b0c8db1c812f22ec16b89733e8e49a4bcdd4bb5', 'L.L.B(UK), L.L.M(UK)', 1500000, '5 years', '../image/JosephineLangford.jpeg', 'sector_000011 '),
('lawyer_000006', 'Kim Ji Won', '7/AHPHANA(N)213456', 30, 'Female', '09250563424', 'Kimji@gmail.com', 'Suelay, Yangon', 'Lawyer', 400, ' ded40a9354dc6c11a80c227a0dc2d4918204008b', ' ded40a9354dc6c11a80c227a0dc2d4918204008b', 'L.L.B(Austrilia), L.L.M(Austrilia)', 1500000, '3 years', '../image/KimJiWon.jpg', 'sector_000011 '),
('lawyer_000007', 'Jin Goo', '7/AHPHANA(N)129276', 30, 'Male', '09763644855', 'Jingoo@gmail.com', 'Sanchaung,Yangon', 'Attorney', 300, ' 93e2ab13b1b7f34c806de683120a6abe87186136', ' 93e2ab13b1b7f34c806de683120a6abe87186136', 'L.L.B(Austrilia), L.L.M(Austrilia)', 1500000, '5 years', '../image/JinGoo.jpeg', 'sector_000012 '),
('lawyer_000008', 'Park Seo Joon', '7/AHPHANA(N)213456', 31, 'Male', '09444061144', 'park@gmail.com', 'Hledan,Yangon', 'Attorney', 350, '61f8640f6db54bf42cd641b45b4523b6f4bb4972', '61f8640f6db54bf42cd641b45b4523b6f4bb4972', 'L.L.B(Austrilia), L.L.M(Austrilia)', 1500000, '5 years', '../image/parksoojoon.jpg', 'sector_000012 '),
('lawyer_000009', 'Kim Soo Hyun', '7/AHPHANA(N)129276', 30, 'Male', '09444061144', 'Kimsoo@gmail.com', 'Yangon', 'Attorney', 300, ' 3643142c5cd1aa59af97b29a2a66fe9ab7106f09', ' 3643142c5cd1aa59af97b29a2a66fe9ab7106f09', 'L.L.B(UK), L.L.M(UK)', 1500000, '5 years', '../image/KimSooHyun.jpg', 'sector_000008 '),
('lawyer_000010', 'Jun Ji Hyun', '7/AHPHANA(N)213456', 34, 'Female', '09444061144', 'Junji@gmail.com', 'Yangon', 'Attorney', 400, ' 2d47ee358babad9337e9ebb21b7a0ced118e8636', ' 2d47ee358babad9337e9ebb21b7a0ced118e8636', 'L.L.B(Austrilia), L.L.M(Austrilia)', 1000000, '5 years', '../image/JunJiHyun.jpg', 'sector_000012 '),
('lawyer_000011', 'Song Hye Kyo', '7/AHPHANA(N)213456', 35, 'Female', '09444061144', 'SongHye@gmail.com', 'Yangon', 'Attorney', 350, ' 8e20c281b8404c01db09a6919796cb5cbe55e5c3', ' 8e20c281b8404c01db09a6919796cb5cbe55e5c3', 'L.L.B(Austrilia), L.L.M(Austrilia)', 500000, '5 years', '../image/SongHyeKyo.jpg', 'sector_000014 '),
('lawyer_000017', 'Shwe Zin', '1/AHGHAYA(N)123456', 28, 'Female', '09786789091', 'Ymcho@gmail.com', 'Okpo', 'Attorney', 200, '94b7b30d75cabd05c860c0a2fae3b83f2a9d81d7', '94b7b30d75cabd05c860c0a2fae3b83f2a9d81d7', 'L.L.B(Yangon)', 2000, '5 years', '../image/HaleyLuRichardson.jpg', 'sector_000006 ');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentid` varchar(30) NOT NULL,
  `paymentfees` int(11) NOT NULL,
  `bookingid` varchar(15) NOT NULL,
  `creditcardnumber` varchar(20) NOT NULL,
  `creditcardpassword` varchar(20) NOT NULL,
  `wavemoneyphnumber` varchar(11) NOT NULL,
  `wavemoneypassword` varchar(6) NOT NULL,
  `paymentdate` date NOT NULL,
  `expirymonth` varchar(50) NOT NULL,
  `expiryyear` varchar(30) NOT NULL,
  `cvv` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentid`, `paymentfees`, `bookingid`, `creditcardnumber`, `creditcardpassword`, `wavemoneyphnumber`, `wavemoneypassword`, `paymentdate`, `expirymonth`, `expiryyear`, `cvv`) VALUES
('pay_000002', 350, 'book_000002', '', '', '09423679344', '123456', '2020-05-22', '', '', ''),
('pay_000003', 350, 'book_000003', '', '', '09423679344', '123456', '2020-05-22', '', '', ''),
('pay_000005', 350, 'book_000005', '', '', '09423679344', '123456', '2020-05-22', '', '', ''),
('pay_000006', 350, 'book_000006', '', '', '09423679344', '123456', '2020-05-22', '', '', ''),
('pay_000007', 300, 'book_000007', '', '', '09423679344', '123456', '2020-05-22', '', '', ''),
('pay_000008', 400, 'book_000008', '', '', '09423679344', '123456', '2020-05-22', '', '', ''),
('pay_000009', 350, 'book_000009', '', '', '09423679344', '123456', '2020-05-22', '', '', ''),
('pay_000010', 400, 'book_000010', '', '', '09423679344', '123456', '2020-05-22', '', '', ''),
('pay_000011', 300, 'book_000011', '', '', '09423679344', '123456', '2020-05-22', '', '', ''),
('pay_000012', 300, 'book_000012', '', '', '09423679344', '123456', '2020-05-22', '', '', ''),
('pay_000013', 350, 'book_000013', '', '', '09423679344', '123456', '2020-05-23', '', '', ''),
('pay_000014', 350, 'book_000014', '', '', '09423679344', '123456', '2020-05-23', '', '', ''),
('pay_000015', 350, 'book_000018', '', '', '09423679344', '123456', '2020-05-24', '', '', ''),
('pay_000016', 350, 'book_000019', '', '', '09423679344', '123456', '2020-05-24', '', '', ''),
('pay_000017', 350, 'book_000020', '', '', '09423679344', '123456', '2020-05-27', '', '', ''),
('pay_000018', 350, 'book_000021', '', '', '09423679344', '123456', '2020-05-27', '', '', ''),
('pay_000019', 350, 'book_000023', '', '', '09423679344', '123456', '2020-05-27', '', '', ''),
('pay_000020', 200, 'book_000024', '', '', '', '', '2020-05-30', '', '', ''),
('pay_000021', 200, 'book_000026', '', '', '', '', '2020-05-30', '', '', ''),
('pay_000022', 200, 'book_000028', '', '', '', '', '2020-05-30', '', '', ''),
('pay_000023', 200, 'book_000029', '', '', '', '', '2020-05-30', '', '', ''),
('pay_000024', 200, 'book_000031', '', '', '09794907949', '122344', '2020-05-30', '', '', ''),
('pay_000025', 200, 'book_000032', '', '', '09794907949', '122344', '2020-05-31', '', '', ''),
('pay_000026', 200, 'book_000033', '', '', '09794907949', '122344', '2020-05-31', '', '', ''),
('pay_000027', 200, 'book_000035', '', '', '09794907949', '122344', '2020-06-01', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ratingid` varchar(20) NOT NULL,
  `ratingnumber` int(11) NOT NULL,
  `review` text NOT NULL,
  `ratingdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `clientid` varchar(13) NOT NULL,
  `lawyerid` varchar(15) NOT NULL,
  `like` int(11) NOT NULL,
  `dislike` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ratingid`, `ratingnumber`, `review`, `ratingdate`, `clientid`, `lawyerid`, `like`, `dislike`) VALUES
('rating_000005', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', '2020-05-17 07:25:15', 'client_000003', 'lawyer_000011', 0, 0),
('rating_000006', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', '2020-05-17 07:54:31', 'client_000003', 'lawyer_000009', 0, 0),
('rating_000007', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', '2020-05-23 03:41:05', 'client_000003', 'lawyer_000008', 0, 1),
('rating_000008', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', '2020-05-17 07:55:25', 'client_000003', 'lawyer_000006', 0, 0),
('rating_000009', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', '2020-05-17 07:55:54', 'client_000003', 'lawyer_000002', 0, 0),
('rating_000010', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', '2020-05-17 07:56:35', 'client_000003', 'lawyer_000003', 0, 0),
('rating_000011', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', '2020-05-17 07:57:16', 'client_000003', 'lawyer_000007', 0, 0),
('rating_000012', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', '2020-05-17 07:58:33', 'client_000003', 'lawyer_000010', 2, 0),
('rating_000016', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', '2020-05-21 14:06:21', 'client_000001', 'lawyer_000012', 0, 0),
('rating_000017', 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', '2020-05-26 05:18:49', 'client_000001', 'lawyer_000011', 1, 0),
('rating_000018', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', '2020-05-22 08:32:19', 'client_000001', 'lawyer_000012', 0, 0),
('rating_000019', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ', '2020-05-22 16:12:12', 'client_000001', 'lawyer_000006', 0, 0),
('rating_000020', 4, 'The trial lawyers at Arnold & Itkin LLP are known for the unique blend of skill, energy, and passion', '2020-05-26 05:18:44', 'client_000001', 'lawyer_000011', 1, 1),
('rating_000023', 3, 'You are very good.', '2020-05-31 05:43:07', 'client_000001', 'lawyer_000017', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sector`
--

CREATE TABLE `sector` (
  `sectorid` varchar(15) NOT NULL,
  `sectorimage` text NOT NULL,
  `sectorname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sector`
--

INSERT INTO `sector` (`sectorid`, `sectorimage`, `sectorname`) VALUES
('sector_000006', '../sectorimage/images (3).jpg', 'Banking Management'),
('sector_000007', '../sectorimage/6e62919c51da07bf5f38eea7e1ba82e9.jpg', 'Labour law'),
('sector_000008', '../sectorimage/research-construction.jpg', 'Constructional Law'),
('sector_000010', '../sectorimage/images (5).jpg', 'Shipping and Trading'),
('sector_000011', '../sectorimage/ISS-TL-state-of-Corporate-Real-Estate-header-v2-1.png', 'Estate Law'),
('sector_000012', '../sectorimage/download (1).jpg', 'Banking and Security'),
('sector_000013', '../sectorimage/download.jpg', 'Economic and Peak'),
('sector_000014', '../sectorimage/competition-law.png', 'Competitor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`bookingid`),
  ADD KEY `lawyerid` (`lawyerid`),
  ADD KEY `clientid` (`clientid`),
  ADD KEY `lawyerid_2` (`lawyerid`),
  ADD KEY `clientid_2` (`clientid`),
  ADD KEY `slotid` (`slotid`);

--
-- Indexes for table `availableslot`
--
ALTER TABLE `availableslot`
  ADD PRIMARY KEY (`slotid`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientid`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contactid`);

--
-- Indexes for table `lawyer`
--
ALTER TABLE `lawyer`
  ADD PRIMARY KEY (`lawyerid`),
  ADD KEY `sectorid` (`sectorid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentid`),
  ADD KEY `bookingid` (`bookingid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ratingid`),
  ADD KEY `lawyerid` (`lawyerid`),
  ADD KEY `clientid` (`clientid`);

--
-- Indexes for table `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`sectorid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contactid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
