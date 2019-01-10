-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2019 at 07:26 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `googlemaps`
--

-- --------------------------------------------------------

--
-- Table structure for table `mapspoints`
--

CREATE TABLE `mapspoints` (
  `user_id` varchar(50) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `address` varchar(300) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapspoints`
--

INSERT INTO `mapspoints` (`user_id`, `latitude`, `longitude`, `address`, `city`, `country`) VALUES
('0220', -33.8700654, 151.20358399999998, 'Hyatt Regency Sydney, Sussex Street, Sydney NSW, Australia', 'New South Wales', 'Australia'),
('0269', -33.8662421, 151.2081869, 'Consulate General of Pakistan, Pitt Street, Sydney NSW, Australia', 'New South Wales', 'Australia'),
('0982', 51.503324, -0.1195430000000215, 'London Eye, London, UK', 'Greater London', 'UK'),
('1558', -33.8700654, 151.20358399999998, 'Hyatt Regency Sydney, Sussex Street, Sydney NSW, Australia', 'New South Wales', 'Australia'),
('1582', 43.8366029, -79.54222500000003, 'Canada\'s Wonderland Drive, Maple, ON, Canada', 'Ontario', 'Canada'),
('1644', 43.8503143, -79.39002549999998, 'canada post', 'Ontario', 'Canada'),
('1821', -33.8700654, 151.20358399999998, 'Hyatt Regency Sydney, Sussex Street, Sydney NSW, Australia', 'New South Wales', 'Australia'),
('1847', 51.5073509, -0.12775829999998223, 'London, UK', 'England', 'UK'),
('1915', 17.385044, 78.486671, 'Hyderabad, Telangana, India', 'Telangana', 'India'),
('1998', -33.8742694, 151.21463770000003, 'Hyde Park House, William Street, Darlinghurst NSW, Australia', 'New South Wales', 'Australia'),
('2277', 36.1539805, -95.99102440000001, 'hyatt regency', 'Oklahoma', 'USA'),
('2278', 16.2957613, 80.45637080000006, 'Guntur Bus Stand, Arrival Block Road, Coastal Andhra Region, Thamma Ranga Reddy Nagar, Guntur, Andhra Pradesh, India', 'Andhra Pradesh', 'India'),
('2430', 27.7172453, 85.3239605, 'Kathmandu, Nepal', 'Central Development Region', 'Nepal'),
('2442', -33.8180326, 151.00908660000005, 'Hyderabad House, Hassall Street, Parramatta NSW, Australia', 'New South Wales', 'Australia'),
('2738', 17.4347366, 78.50200169999994, 'Secunderabad Railway Station Bus Stop, Regimental Bazaar, Shivaji Nagar, Secunderabad, Telangana', 'Telangana', 'India'),
('3236', 17.385044, 78.486671, 'Hyderabad, Telangana, India', 'Telangana', 'India'),
('3252', -33.8760498, 151.20935710000003, 'Hyde Park Inn, Elizabeth Street, Sydney NSW, Australia', 'New South Wales', 'Australia'),
('3323', 36.1539805, -95.99102440000001, 'hyatt regency', 'Oklahoma', 'USA'),
('3696', 17.385044, 78.486671, 'hyderabad', 'Telangana', 'India'),
('3774', -33.8760498, 151.20935710000003, 'Hyde Park Inn, Elizabeth Street, Sydney NSW, Australia', 'New South Wales', 'Australia'),
('3984', 17.385044, 78.486671, 'Hyderabad, Telangana, India', 'Telangana', 'India'),
('3996', 3.139003, 101.68685499999992, 'Kuala Lumpur, Federal Territory of Kuala Lumpur, Malaysia', 'Kuala Lumpur', 'Federal Territory of Kuala Lum'),
('4212', 43.771489, -79.25298859999998, 'Hyderabad Biryani Hut, Ellesmere Road, Scarborough, ON, Canada', 'Ontario', 'Canada'),
('4444', 29.60813349999999, -95.5649785, 'kerala restaurant', 'Texas', 'USA'),
('4633', 16.3066525, 80.43654019999997, 'guntur', 'Andhra Pradesh', 'India'),
('4826', 17.4282656, 78.41300609999996, 'Australia Consultancy, Road Number 63, Jubilee Hills, Hyderabad, Telangana, India', 'Telangana', 'India'),
('4915', 12.9235557, 100.88245510000002, 'Pattaya City, Bang Lamung District, Chon Buri, Thailand', 'Chon Buri', 'Thailand'),
('5244', -33.87775999999999, 151.20628699999997, 'Secure Parking - World Square Car Park, Goulburn Street, Sydney NSW, Australia', 'New South Wales', 'Australia'),
('5396', 17.385044, 78.486671, 'Hyderabad, Telangana, India', 'Telangana', 'India'),
('5591', -33.88223, 151.19696, 'Ultimo NSW, Australia', 'New South Wales', 'Australia'),
('5787', -33.8700654, 151.20358399999998, 'Hyatt Regency Sydney, Sussex Street, Sydney NSW, Australia', 'New South Wales', 'Australia'),
('5923', 37.2631155, -95.5469584, 'address', 'Kansas', 'USA'),
('6124', 56.130366, -106.34677099999999, 'Canada', 'Saskatchewan', 'Canada'),
('6255', -33.8760498, 151.20935710000003, 'Hyde Park Inn, Elizabeth Street, Sydney NSW, Australia', 'New South Wales', 'Australia'),
('6661', 17.385044, 78.486671, 'Hyderabad, Telangana, India', 'Telangana', 'India'),
('6704', -33.8700654, 151.20358399999998, 'Hyatt Regency Sydney, Sussex Street, Sydney NSW, Australia', 'New South Wales', 'Australia'),
('6749', 17.385044, 78.486671, 'Hyderabad, Telangana, India', 'Telangana', 'India'),
('7303', -33.888584, 151.18734730000006, 'The University of Sydney, Camperdown NSW, Australia', 'New South Wales', 'Australia'),
('7452', 36.6375873, -93.27244250000001, 'seafood restaurants', 'Missouri', 'USA'),
('7481', 21.1689933, 72.80911429999992, 'Canal Road, Parimal Sankul, Athwa, Surat, Gujarat, India', 'Gujarat', 'India'),
('7697', 29.60813349999999, -95.5649785, 'kerala restaurant', 'Texas', 'USA'),
('7756', 17.385044, 78.486671, 'Hyderabad, Telangana, India', 'Telangana', 'India'),
('7833', 52.132633, 5.2912659999999505, 'Holland', 'Utrecht', 'Netherlands'),
('8356', -33.8557587, 151.20935229999998, 'Park Hyatt Sydney, Hickson Road, The Rocks NSW, Australia', 'Sydney NSW', 'Australia'),
('8520', -33.8700654, 151.20358399999998, 'Hyatt Regency Sydney, Sussex Street, Sydney NSW, Australia', 'New South Wales', 'Australia'),
('9004', -33.89655, 151.21997999999996, 'Moore Park NSW, Australia', 'New South Wales', 'Australia'),
('9016', -33.88092, 151.20294, 'Haymarket NSW, Australia', 'New South Wales', 'Australia'),
('9560', 36.3681582, -96.01080809999996, 'hy', 'Oklahoma', 'USA'),
('9673', 24.8607343, 67.00113639999995, 'Karachi, Pakistan', 'Napier Quarter', 'Karachi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mapspoints`
--
ALTER TABLE `mapspoints`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
