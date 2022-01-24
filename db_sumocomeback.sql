-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2022 at 08:08 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sumocomeback`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(1, 'Arsandi Wira Panorama', 'admin', '21232f297a57a5a743894a0e4a801fc3', '085290065940', 'arsandiwp@gmail.com', 'Jogowisa, Bulurejo, Juwiring, Klaten');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(8, 'T Shirt '),
(9, 'Hoodie'),
(12, 'Topi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `data_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_status`, `data_created`) VALUES
(17, 8, 'Full Force Forward', 120000, '8', 'produk1641744509.jpg', 1, '2022-01-09 16:08:29'),
(18, 8, 'Go Fast Or Go Home', 120000, '<p>1. Bahan cottoncombed 30s</p>\r\n\r\n<p>2. Sablon plastisol</p>\r\n\r\n<p>3. Jahit rantai</p>\r\n\r\n<p>4. Free sticker</p>\r\n\r\n<p>Size chart :</p>\r\n\r\n<p>M 52 70</p>\r\n\r\n<p>L 55 73</p>\r\n\r\n<p>XL 57 75</p>\r\n', 'produk1641745602.jpg', 1, '2022-01-09 16:26:42'),
(19, 8, 'Anniv 2nd ', 120000, '<p>1. Bahan cottoncombed 30s</p>\r\n\r\n<p>2. Sablon plastisol</p>\r\n\r\n<p>3. Jahit rantai</p>\r\n\r\n<p>4. Free sticker</p>\r\n\r\n<p>Size chart :</p>\r\n\r\n<p>M 52 70</p>\r\n\r\n<p>L 55 73</p>\r\n\r\n<p>XL 57 75</p>\r\n', 'produk1641745625.jpg', 1, '2022-01-09 16:27:05'),
(20, 8, 'Born To Ride', 120000, '<p>1. Bahan cottoncombed 30s</p>\r\n\r\n<p>2. Sablon plastisol</p>\r\n\r\n<p>3. Jahit rantai</p>\r\n\r\n<p>4. Free sticker</p>\r\n\r\n<p>Size chart :</p>\r\n\r\n<p>M 52 70</p>\r\n\r\n<p>L 55 73</p>\r\n\r\n<p>XL 57 75</p>\r\n', 'produk1641745652.jpg', 1, '2022-01-09 16:27:32'),
(21, 9, 'ComeBack 2', 280000, '9', 'produk1641913733.jpg', 1, '2022-01-11 15:05:08'),
(22, 9, 'Full Thorthell', 280000, '<p>Bahan :</p>\r\n\r\n<p>1. Cotton flece</p>\r\n\r\n<p>2. Sablon plastisol</p>\r\n\r\n<p>3. Jahit rantai</p>\r\n\r\n<p>4. Free sticker</p>\r\n', 'produk1641913876.jpg', 1, '2022-01-11 15:11:16'),
(23, 12, 'Bisbol ComeBack', 50000, '<p>Bahan:</p>\r\n\r\n<p>1. Polyster</p>\r\n\r\n<p>2. Sablon plastisol</p>\r\n\r\n<p>3. Free sticker</p>\r\n', 'produk1641966462.jpg', 1, '2022-01-12 05:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `email`, `password`) VALUES
(2, 'kya', 'kyasempol@gmail.com', '70324b74c6ebd6076851781e05246514');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
