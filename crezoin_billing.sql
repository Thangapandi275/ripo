-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2022 at 08:56 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crezoin_billing`
--

-- --------------------------------------------------------

--
-- Table structure for table `cr_branch`
--

CREATE TABLE `cr_branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `branch_email` varchar(100) NOT NULL,
  `branch_mobile` varchar(100) NOT NULL,
  `branch_address` text NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `IsDelete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cr_branch`
--

INSERT INTO `cr_branch` (`branch_id`, `branch_name`, `branch_email`, `branch_mobile`, `branch_address`, `isActive`, `IsDelete`) VALUES
(1, 'The Shop', 'shop1@gmail.com', '8124498572', 'Valasaravakkam, Chennai - 117', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cr_category`
--

CREATE TABLE `cr_category` (
  `category_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL DEFAULT 0,
  `categoryname` varchar(100) NOT NULL DEFAULT '0',
  `category_branch_id` int(11) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `IsDelete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cr_category`
--

INSERT INTO `cr_category` (`category_id`, `userid`, `categoryname`, `category_branch_id`, `isActive`, `IsDelete`) VALUES
(1, 1, 'Gold Haram', 0, 1, 0),
(2, 1, 'Gold necklace ', 0, 1, 0),
(3, 1, 'Gold bangles ', 0, 1, 0),
(4, 1, 'Gold hip belt ', 0, 1, 0),
(5, 1, 'test', 0, 1, 0),
(6, 1, 'test', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cr_customer`
--

CREATE TABLE `cr_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_number` text NOT NULL,
  `customer_address` text DEFAULT NULL,
  `customer_remark` varchar(500) DEFAULT NULL,
  `customer_branch_id` int(11) NOT NULL,
  `IsDelete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cr_customer`
--

INSERT INTO `cr_customer` (`customer_id`, `customer_name`, `customer_number`, `customer_address`, `customer_remark`, `customer_branch_id`, `IsDelete`) VALUES
(1, 'Muhamed Musthak', '8124498572', ' chennai', 'test ', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cr_products`
--

CREATE TABLE `cr_products` (
  `id` int(11) NOT NULL,
  `product_id` text DEFAULT '0',
  `product_branch_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` text NOT NULL,
  `products_category_id` varchar(50) NOT NULL,
  `product_size` varchar(50) NOT NULL,
  `purchase_date` varchar(50) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_color` varchar(50) NOT NULL,
  `purchase_amount` varchar(50) NOT NULL,
  `rent_amount` varchar(50) NOT NULL,
  `stock_type` varchar(50) NOT NULL,
  `instock` text NOT NULL,
  `outstock` text NOT NULL,
  `totstock` text NOT NULL,
  `product_cr_by` int(11) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1 COMMENT '1 -> Active, 0 -> Pending, 2 -> Deactive',
  `IsDelete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cr_products`
--

INSERT INTO `cr_products` (`id`, `product_id`, `product_branch_id`, `product_name`, `product_description`, `products_category_id`, `product_size`, `purchase_date`, `created_date_time`, `product_color`, `purchase_amount`, `rent_amount`, `stock_type`, `instock`, `outstock`, `totstock`, `product_cr_by`, `isActive`, `IsDelete`) VALUES
(1, 'ARA000001', 1, 'test', 'rwer', '6', 'test', '2022-10-10', '2022-09-19 18:52:57', 'test', '100', '10', 'new', '10', '-1', '20', 1, 1, 0),
(2, 'ARA000002', 1, 'test2', 'asfwff', '6', 'test2', '2022-10-10', '2022-09-19 18:52:57', 'test2', '100', '9', 'new', '10', '-1', '12', 1, 1, 0),
(3, 'ARA000003', 1, 'test3', 'test3', '6', 'test3', '2022-10-10', '2022-09-12 17:53:50', 'test3', '100', '8', 'old', '10', '0', '20', 1, 1, 0),
(4, 'ARA000004', 1, 'test4', 'test4', '6', 'test4', '2022-10-10', '2022-09-12 17:53:46', 'test4', '100', '7', 'new', '10', '0', '20', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cr_sales`
--

CREATE TABLE `cr_sales` (
  `sale_id` int(11) NOT NULL,
  `sale_branch_id` int(11) NOT NULL,
  `sales_customer_id` int(11) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_mobile` int(11) NOT NULL,
  `customer_address` varchar(500) DEFAULT NULL,
  `rent_start_date` text NOT NULL,
  `no_of_days_rent` int(11) NOT NULL,
  `totrent` decimal(10,2) NOT NULL,
  `totdis` decimal(10,2) NOT NULL,
  `perdayrent` decimal(10,2) NOT NULL,
  `totamt` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `finamt` decimal(10,2) NOT NULL,
  `IsDelete` int(11) NOT NULL,
  `sales_created_on` text NOT NULL,
  `sales_created_by` int(11) NOT NULL,
  `sales_details` varchar(500) DEFAULT NULL,
  `sales_box` text DEFAULT NULL,
  `sale_status` text DEFAULT 'saved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cr_sales`
--

INSERT INTO `cr_sales` (`sale_id`, `sale_branch_id`, `sales_customer_id`, `customer_name`, `customer_mobile`, `customer_address`, `rent_start_date`, `no_of_days_rent`, `totrent`, `totdis`, `perdayrent`, `totamt`, `discount`, `finamt`, `IsDelete`, `sales_created_on`, `sales_created_by`, `sales_details`, `sales_box`, `sale_status`) VALUES
(1, 1, 1, 'Muhamed Musthak', 2147483647, ' chennai', '2022-09-12', 1, '19.00', '0.00', '19.00', '19.00', '0.00', '19.00', 0, '09/12/2022 07:57:54 pm', 1, '', 'box01', 'Returned'),
(2, 1, 1, 'Muhamed Musthak', 2147483647, ' chennai', '2022-09-13', 1, '19.00', '0.00', '19.00', '19.00', '0.00', '19.00', 0, '09/13/2022 11:03:22 am', 1, '', 'qweqw', 'Returned'),
(3, 1, 1, 'Muhamed Musthak', 2147483647, ' chennai', '2022-09-07', 1, '19.00', '0.00', '19.00', '19.00', '0.00', '19.00', 0, '09/13/2022 11:07:07 am', 1, '', 'wqrwqr', 'Cancelled'),
(4, 1, 1, 'Muhamed Musthak', 2147483647, ' chennai', '2022-09-07', 1, '39.00', '0.00', '39.00', '39.00', '0.00', '39.00', 0, '01-01-1970 01:00:00 am', 1, '', 'wqrwqr', 'Returned'),
(5, 1, 1, 'Muhamed Musthak', 2147483647, ' chennai', '2022-09-20', 1, '19.00', '0.00', '19.00', '19.00', '0.00', '19.00', 0, '09/19/2022 08:51:51 pm', 1, 'test', 'test1', 'Returned');

-- --------------------------------------------------------

--
-- Table structure for table `cr_sales_item`
--

CREATE TABLE `cr_sales_item` (
  `sale_item_id` int(11) NOT NULL,
  `sale_ref_id` int(11) NOT NULL,
  `sale_item_branch_id` int(11) NOT NULL,
  `sale_item_product_id` int(11) NOT NULL,
  `sale_item_product_code` text NOT NULL,
  `sale_item_product_name` text NOT NULL,
  `sale_item_qty` int(11) NOT NULL,
  `sale_item_rent` decimal(10,2) NOT NULL,
  `sale_item_discount` decimal(10,2) NOT NULL,
  `sale_item_amt` decimal(10,2) NOT NULL,
  `sale_item_damage` int(11) NOT NULL DEFAULT 0,
  `returnDate` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cr_sales_item`
--

INSERT INTO `cr_sales_item` (`sale_item_id`, `sale_ref_id`, `sale_item_branch_id`, `sale_item_product_id`, `sale_item_product_code`, `sale_item_product_name`, `sale_item_qty`, `sale_item_rent`, `sale_item_discount`, `sale_item_amt`, `sale_item_damage`, `returnDate`) VALUES
(1, 1, 1, 1, 'ARA000001', 'test', 1, '10.00', '0.00', '10.00', 0, NULL),
(2, 1, 1, 2, 'ARA000002', 'test2', 1, '9.00', '0.00', '9.00', 0, NULL),
(3, 2, 1, 2, 'ARA000002', 'test2', 1, '9.00', '0.00', '9.00', 0, '17-09-2022'),
(4, 2, 1, 1, 'ARA000001', 'test', 1, '10.00', '0.00', '10.00', 0, '17-09-2022'),
(5, 3, 1, 1, 'ARA000001', 'test', 1, '10.00', '0.00', '10.00', 0, NULL),
(6, 3, 1, 2, 'ARA000002', 'test2', 1, '9.00', '0.00', '9.00', 0, NULL),
(13, 4, 1, 1, 'ARA000001', 'test', 3, '10.00', '0.00', '30.00', 0, '19-09-2022'),
(14, 4, 1, 2, 'ARA000002', 'test2', 1, '9.00', '0.00', '9.00', 0, '19-09-2022'),
(15, 5, 1, 1, 'ARA000001', 'test', 1, '10.00', '0.00', '10.00', 1, '19-09-2022'),
(16, 5, 1, 2, 'ARA000002', 'test2', 1, '9.00', '0.00', '9.00', 1, '19-09-2022');

-- --------------------------------------------------------

--
-- Table structure for table `cr_users`
--

CREATE TABLE `cr_users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `isActive` int(11) NOT NULL,
  `usertype_ref_id` int(11) NOT NULL,
  `branch_ref_id` int(11) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `contact` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cr_users`
--

INSERT INTO `cr_users` (`user_id`, `username`, `password`, `isActive`, `usertype_ref_id`, `branch_ref_id`, `fullname`, `contact`) VALUES
(1, 'admin@gmail.com', 'admin@123', 1, 1, 0, 'Super Admin', NULL),
(2, 'sadmin@gamil.com', '123456', 1, 3, 1, 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cr_usertype`
--

CREATE TABLE `cr_usertype` (
  `usertype_id` int(11) NOT NULL,
  `usertype` varchar(30) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cr_usertype`
--

INSERT INTO `cr_usertype` (`usertype_id`, `usertype`, `isActive`) VALUES
(1, 'Admin', 1),
(2, 'Foc', 1),
(3, 'Sales', 1),
(4, 'Others', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cr_branch`
--
ALTER TABLE `cr_branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `cr_category`
--
ALTER TABLE `cr_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cr_customer`
--
ALTER TABLE `cr_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `cr_products`
--
ALTER TABLE `cr_products`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `cr_sales`
--
ALTER TABLE `cr_sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `cr_sales_item`
--
ALTER TABLE `cr_sales_item`
  ADD PRIMARY KEY (`sale_item_id`);

--
-- Indexes for table `cr_users`
--
ALTER TABLE `cr_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `cr_usertype`
--
ALTER TABLE `cr_usertype`
  ADD PRIMARY KEY (`usertype_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cr_branch`
--
ALTER TABLE `cr_branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cr_category`
--
ALTER TABLE `cr_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cr_customer`
--
ALTER TABLE `cr_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cr_products`
--
ALTER TABLE `cr_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cr_sales`
--
ALTER TABLE `cr_sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cr_sales_item`
--
ALTER TABLE `cr_sales_item`
  MODIFY `sale_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cr_users`
--
ALTER TABLE `cr_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cr_usertype`
--
ALTER TABLE `cr_usertype`
  MODIFY `usertype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
