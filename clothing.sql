-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 08:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothing`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `Admin_id` int(200) NOT NULL,
  `Admin_Name` varchar(200) NOT NULL,
  `Admin_Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`Admin_id`, `Admin_Name`, `Admin_Password`) VALUES
(1, 'admin1', '1nimda');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `email` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`email`, `message`) VALUES
('pranith@gmail.com', 'hi hello'),
('hi@hello', 'hi hello gn dpfjweifc wef whdchnwfwec  wefcefuwfucwe cfwef ce dw 9w dal cwdwoefhw pc wecpdqc3 dew[-dmcloewjf ipw0fedc aoifp ');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `user_id` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `total_items` int(200) NOT NULL,
  `total_amount` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`user_id`, `username`, `total_items`, `total_amount`) VALUES
(1, 'admin1', 2, 1498),
(2, 'admin1', 2, 1398),
(3, 'admin1', 1, 499),
(4, 'ab', 1, 549),
(5, 'admin1', 2, 1498);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `item_id` int(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `item` varchar(200) NOT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  `cost` int(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`item_id`, `category`, `item`, `product_name`, `description`, `cost`, `image`) VALUES
(47, 'Men', 'Shirt', 'Navy blue T-shirt', 'Navy blue printed T-shirt, has a round neck, short sleeves, Cotton, Machine-wash', 599, 'Uploaded_Images/Navy blue T-shirt.jpg'),
(48, 'Men', 'Shirt', 'Maroon casual shirt', 'Maroon casual shirt with Blue checks, long sleeves, Cotton, Machine-wash', 899, 'Uploaded_Images/Maroon casual shirt.jpg'),
(49, 'Men', 'Jeans', 'Men Blue Stretchable Jeans', 'Blue soild 5-pocket mid-rise skinny fit stretchable jeans, cotton, machine wash', 999, 'Uploaded_Images/Men Blue Stretchable Jeans.jpg'),
(50, 'Men', 'Trousers', 'Men Navy Blue Trousers', 'Navy blue solid mid-rise chinos, has a button closure, 5 pockets, cotton, washable', 899, 'Uploaded_Images/Men Navy Blue Trousers.jpg'),
(51, 'Men', 'Ethnic Wear', 'Men Red & Cream Sherwani', 'Red and cream printed sherwani, has a mandarin collar, long sleeves, cotton, dry clean', 2999, 'Uploaded_Images/Men Red &amp; Cream Sherwani Set.jpg'),
(52, 'Men', 'Ethnic Wear', 'Men Red Nehru Jacket', 'Red nehru jacket, has a mandarin collar, sleeveless, cotton blend, dryclean', 2499, 'Uploaded_Images/Men Red Nehru Jacket.jpg'),
(53, 'Women', 'Shirt', 'Ladies Round Neck T-shirt', 'Purple T-shirt, has a round neck and short sleeves, cotton, machine wash', 599, 'Uploaded_Images/Ladies Round Neck T-shirt.jfif'),
(54, 'Women', 'Shirt', 'Women Black Printed Top', 'Black printed top, has a V-neck, long sleeves, and button closure, Rayon, machine wash', 499, 'Uploaded_Images/Women Black Printed Top.jfif'),
(55, 'Women', 'Shirt', 'Women Dark Blue Kurti', 'Dark blue kurti with white details, has a mandarin collar, three-quarter sleeves, cotton, hand wash', 599, 'Uploaded_Images/Women Dark Blue Kurti.jfif'),
(56, 'Women', 'Jeans', 'Women Blue Jeans', 'Blue light jeans, clean look, no fade, and has a button and zip closure, cotton wash, machine wash', 799, 'Uploaded_Images/Women Blue Jeans.jfif'),
(57, 'Women', 'Leggings', 'Women Dark Blue Leggings', 'A pair of dark blue mid-rise ankle-length leggings, cotton, machine wash', 499, 'Uploaded_Images/Women Dark Blue Leggings.jfif'),
(58, 'Women', 'Ethnic Wear', 'Green Saree', 'Green saree and has a woven design border Blouse Piece, hand wash', 699, 'Uploaded_Images/Green Saree.jfif'),
(59, 'Kids', 'Shirt', 'Boys Yellow T-shirt', 'Boys Yellow Printed Round Neck T-shirt, cotton, machine wash', 199, 'Uploaded_Images/Boys Yellow T-shirt.jfif'),
(60, 'Kids', 'Shirt', 'Boys Casual Shirt', 'Boys Blue & White lines Casual Shirt, cotton, machine wash', 549, 'Uploaded_Images/Boys Casual Shirt.jfif'),
(61, 'Kids', 'Jeans', 'Boys Blue Jeans', 'Boys Blue Regular Fit Mid-Rise Clean Look Jeans, cotton, machine wash', 599, 'Uploaded_Images/Boys Blue Jeans.jfif'),
(62, 'Kids', 'Trousers', 'Boys Olive Green Cargos', 'Olive green solid mid-rise cargo trousers, button closure, and 6 pockets, cotton, machine wash', 899, 'Uploaded_Images/Boys Olive Green Cargos.jfif'),
(64, 'Kids', 'Ethnic Wear', 'Kids Gold & Red Sherwani', 'Gold printed sherwani, has a mandarin collar, long sleeves, cotton, dry clean', 1999, 'Uploaded_Images/Kids Gold & Red Sherwani.jfif'),
(65, 'Kids', 'Ethnic Wear', 'Kids Green & Blue Kurta', 'Pink straight above knee kurta, has a round neck, long sleeves, cotton, machine wash', 1499, 'Uploaded_Images/Kids Green & Blue Kurta.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `mailid` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `mailid`, `password`) VALUES
(1, 'ab', 'a@b.com', 'de99e4ada244c272d51a83f035d87e4d'),
(2, 'Pranith Rao', 'a@b.com', '0c8d55ac9624bdc1bc920a7cb6e71a9b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `Admin_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `item_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
