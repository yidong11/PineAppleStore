-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2024-04-05 14:44:49
-- 服务器版本： 8.2.0
-- PHP 版本： 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `db_shop`
--

-- --------------------------------------------------------

--
-- 表的结构 `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `adminId` int NOT NULL AUTO_INCREMENT,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPassword` varchar(32) NOT NULL,
  `level` tinyint NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPassword`, `level`) VALUES
(1, 'Nayem Howlader', 'nayem', 'nayemhowlader77@gmail.com', '850721dea834fe36b29083291509c7ad', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_brand`
--

DROP TABLE IF EXISTS `tbl_brand`;
CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `brandId` int NOT NULL AUTO_INCREMENT,
  `brandName` varchar(255) NOT NULL,
  PRIMARY KEY (`brandId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(2, 'SAMSUNG'),
(3, 'CANON'),
(4, 'IPHONE'),
(5, 'ACER');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_cart`
--

DROP TABLE IF EXISTS `tbl_cart`;
CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `cartId` int NOT NULL AUTO_INCREMENT,
  `sId` varchar(255) NOT NULL,
  `productId` int NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`cartId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(4, 'g7v9g9flni8h7h82c20rvirq83', 15, 'Laundry machine ', 3200.00, 1, 'uploads/d712a37947.png'),
(5, 'g7v9g9flni8h7h82c20rvirq83', 21, 'EOS 77D DSLR Camera', 58160.00, 1, 'uploads/6521499b3d.jpg'),
(6, 'q0lke3gu36m3l3q7r9bhugu7eq', 18, 'iPhone 8 Plus', 109999.00, 1, 'uploads/33ce6b99f4.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `catId` int NOT NULL AUTO_INCREMENT,
  `catName` varchar(255) NOT NULL,
  PRIMARY KEY (`catId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Desktop'),
(2, 'Laptop'),
(3, 'Mobile Phones'),
(4, 'Accessories'),
(5, 'Software'),
(6, 'Sports &amp; Fitness'),
(7, 'Footwear'),
(8, 'Jewellery'),
(9, 'Clothing');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_compare`
--

DROP TABLE IF EXISTS `tbl_compare`;
CREATE TABLE IF NOT EXISTS `tbl_compare` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cmrId` int NOT NULL,
  `productId` int NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_contact`
--

DROP TABLE IF EXISTS `tbl_contact`;
CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `contact`, `message`, `status`, `date`) VALUES
(2, 'md.alvi islam', 'customer@gmail.com', '1622425286', 'szzss', 1, '2018-08-05 23:23:25');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`) VALUES
(1, 'bappy', 'khilgaon, Dhaka', 'Dhaka', 'Bangladesh', '1219', '01622425286', 'customer@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'Han Yang', '3817 Spruce Street,, 714 Mayer Residence Hall (Stouffer College House)', 'Philadelphia', 'USA', '19104', '55164512', 'mahlerrrr76@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cmrId` int NOT NULL,
  `productId` int NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cmrId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(21, 1, 15, 'Lorem Ipsum is simply', 1, 505.22, 'uploads/d712a37947.png', '2018-08-01 20:45:34', 2),
(22, 1, 14, 'Lorem Ipsum is simply', 1, 505.22, 'uploads/bb49c3ce4e.png', '2018-08-01 20:45:34', 0),
(23, 1, 15, 'Lorem Ipsum is simply', 3, 1515.66, 'uploads/d712a37947.png', '2018-08-01 21:23:42', 0),
(24, 1, 11, 'Lorem ipsum dolor sit amet sed do eiusmod', 3, 1501.65, 'uploads/4ebef5562f.png', '2018-08-02 00:14:55', 0),
(25, 1, 15, 'Lorem Ipsum is simply', 1, 505.22, 'uploads/d712a37947.png', '2018-08-02 00:15:23', 0),
(26, 1, 15, 'Lorem Ipsum is simply', 1, 505.22, 'uploads/d712a37947.png', '2018-08-02 00:19:13', 0),
(27, 1, 12, 'Lorem Ipsum is simply', 2, 856.04, 'uploads/8147397401.png', '2018-08-02 00:19:45', 0),
(28, 1, 11, 'Lorem ipsum dolor sit amet sed do eiusmod', 1, 500.55, 'uploads/4ebef5562f.png', '2018-08-02 02:39:52', 0),
(29, 1, 12, 'Lorem Ipsum is simply', 1, 428.02, 'uploads/8147397401.png', '2018-08-02 02:50:52', 0),
(30, 1, 15, 'Lorem Ipsum is simply', 1, 505.22, 'uploads/d712a37947.png', '2018-08-02 02:50:52', 0),
(31, 1, 4, 'Lorem Ipsum is simply', 1, 220.97, 'uploads/fa56e62bef.jpg', '2018-08-02 02:50:52', 0),
(32, 1, 13, 'Lorem Ipsum is simply', 1, 505.22, 'uploads/bd293afbce.jpg', '2018-08-06 03:29:05', 0),
(33, 2, 21, 'EOS 77D DSLR Camera', 1, 58160.00, 'uploads/6521499b3d.jpg', '2024-03-30 19:06:56', 0),
(34, 2, 18, 'iPhone 8 Plus', 1, 109999.00, 'uploads/33ce6b99f4.jpg', '2024-03-30 19:06:56', 0),
(35, 3, 15, 'Laundry machine ', 1, 3200.00, 'uploads/d712a37947.png', '2024-04-05 21:25:18', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_product`
--

DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `productId` int NOT NULL AUTO_INCREMENT,
  `productName` varchar(255) NOT NULL,
  `catId` int NOT NULL,
  `brandId` int NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint NOT NULL DEFAULT '0',
  `stock` int NOT NULL,
  `total_rate` float NOT NULL,
  `sales` int NOT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`, `stock`, `total_rate`, `sales`) VALUES
(1, 'Mini-503 Wireless Bluetooth', 4, 3, '<p><span>With built-in microphone as well as volume, play, pause skip, call answer and call reject control buttons. Freedom to exercise, move around and commute without wires to tangle or hold you back. Simplify your communications with this lightweight and versatile headset. </span><br /><br /><span>This Super lightweight, comfortable over-the-ear design makes this Bluetooth stereo headphone easy to wear throughout the day. You\'ll enjoy all-day wearing comfort, clearer voice transmission and superior sound quality - without wires!</span></p>', 3999.00, 'uploads/cd60a8b471.jpg', 0, 4, 81, 20),
(2, 'Travelmate  - Core i5 ', 2, 5, '<p>7th -generation core i5, 2 core 4thread,4 gb single channel,aspect ratio 16:9Thin Bezel &amp; Powerful Laptop on the go. 8th Gen Intel&nbsp;<strong>Core</strong>&nbsp;i7, Buy Now. Award winning laptops. Recommended by Pros. 12 months warranty. Learn gaming features.</p>', 38500.00, 'uploads/f685d89450.jpeg', 0, 7, 60, 18),
(3, 'V18 LED - CC Camera - White', 4, 2, '<p>Press the power button for 2 seconds, then the light will vibrate for a few seconds. Once the vibration stop, the BLUE led indicator to stay on and it is in ready mode. To make a video, simply press the power button one time, the lighter will vibrate 2 times and the blue LED indicator goes off, then the video recording begins. To stop filming, press the power again, then the light will vibrate 3 times.&nbsp;Now your file is saved and in ready mode again. To turn off, hold the power button for 2 seconds, and the lighter will vibrate 2 times.</p>\r\n<p>Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.</p>\r\n<p>Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.</p>\r\n<p>Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.</p>', 2000.00, 'uploads/3bba9742ec.jpg', 1, 0, 65, 17),
(4, 'Rechargeable Mini Fan', 4, 3, '<p><span>Enfield is a multi branded retail chain store where all sorts of tech related accessories can be found. Their range of products start from brand new power banks, headphones, USB Data &amp; Charging Cables, High Speed Data Line Cables, 3D VR BOX, Bluetooth Selfie Sticks, Wireless N Routers, Wireless Bluetooth Speakers, Home Theatre Speakers, Android TV Box, RA-OTG Micro USB Adapters to Bluetooth Headsets among many other high tech gadgets that are in demand to lead a modern life.</span></p>', 1500.00, 'uploads/fa56e62bef.jpg', 0, 8, 34, 16),
(5, ' 3480 Laptop - Intel Core i5', 2, 2, '<p><span>Enhanced data protection: Data security is key in protecting your business and employees. Dell Data Protection is a suite of security software programs offered on each Latitude 3000 Series system. Endpoint security, advanced user authentication and data encryption software all work cohesively to safeguard your data from threats and hacks.</span><br /><span>Safely communicate: Your Latitude 3480 comes TPM2.0 TCG certified and FIPS-140-2 certified, and uses hardware-based cryptography for the most secure communication.</span></p>', 53500.00, 'uploads/9ef4ce1375.png', 1, 6, 67, 19),
(6, 'V18 LED - CC Camera - Black', 4, 5, '<p><span>Press the power button for 2 seconds, then the light will vibrate for a few seconds. Once the vibration stop, the BLUE led indicator to stay on and it is in ready mode. To make a video, simply press the power button one time, the lighter will vibrate 2 times and the blue LED indicator goes off, then the video recording begins. To stop filming, press the power again, then the light will vibrate 3 times.&nbsp;Now your file is saved and in ready mode again. To turn off, hold the power button for 2 seconds, and the lighter will vibrate 2 times.</span></p>', 1850.00, 'uploads/2966aff2bb.jpg', 1, 0, 69, 14),
(7, 'Bluetooth Speaker with ac line', 4, 2, '<p><span>Naturally, size and sound are two of the most important factors for many. Allocacoc has recently announced their audioCube and sent me one to review. Dutch manufacturer, Allocacoc, has an interesting proposition of getting the most out of a portable Bluetooth speaker. They obviously like working with cubes and have therefore added a speaker to almost every face of one.</span></p>', 3500.00, 'uploads/c5b154a642.jpg', 0, 5, 0, 0),
(8, 'Smoothie Blender', 4, 2, '<p><span>Compact design ideal for small living spaces and on-the-go portability. Great for making shakes, baby formula, marinades and salad dressings.(Please don\'t put hard foods into it like nuts). Parts are Removable and dishwasher safe EXCEPT bottom part. Before it starts working, add some water will make it perfect. Rapid stiring speed can make a cup of juice within one minute. It can be charged by power bank, laptop, computer, mobile phones or any other USB devices. Can used as common cup and juicer blender or as a power bank.&nbsp;Can repeat use 10-12 times when fully charged.</span></p>', 999.00, 'uploads/4d2b549e0a.jpg', 0, 4, 10, 5),
(11, 'Apple iPhone X 64GB', 3, 4, '<p>iPhone Display Size: 5.8 inches,Display Resolution: 1125 x 2436 pixels</p>\r\n<p>Rear Camera: Dual 12 MP</p>\r\n<p>Front Camera: 7 MP</p>\r\n<p>Video Quality : 4K video recording at 24 fps, 30 fps, or 60 fps</p>\r\n<p>Face ID: Enabled by TrueDepth camera for facial recognition<br />Splash, Water, and Dust Resistant: Rated IP67 under IEC standard 60529<br />Battery Capacity: Up to 21h (3G) talk time; Up to 60 h music play<br />Phone Sensors: Face ID, accelerometer, gyro, proximity, compass, barometer<br />Apple iPhone X Smartphone: Design &amp; Display</p>', 99990.00, 'uploads/9588c6f782.jpg', 1, 8, 20, 5),
(12, 'Refrigerator long size', 4, 2, '<p><span>Samsung GR-S24SPB (C) Top Mount Refrigerator can be a perfect choice for you and your family. This wonderfully designed refrigerator of 226 liters capacity is fully equipped with various healthy features to help store your food without any health hazards. The doors ensure convenience and the low noise design ensures comfort. This refrigerator comes with amazing Tempered Glass Shelves, Hybrid Bio Deodorizer, Cool Air Wrap, Multi-shelf slots and energy saving with optimized insulation thickness.</span></p>', 24500.00, 'uploads/91f3e32ef2.jpg', 1, 0, 3, 1),
(13, 'LED Monitor K202HQL Black', 1, 5, '<p>You\'ll enjoy tasks and entertainment more on the 19.5&rdquo; LED-backlit display. It presents incredibly clear, rich-detailed images at a high resolution of 1600 x 900, and features an impressive dynamic contrast ratio of 100,000,000:1 to reveal darker image areas in greater depth. A super-fast 5-millisecond response time displays action sequences with the highest degree of clarity. The great sights are made even better by exceptional colors via Acer Adaptive Contrast Management.</p>', 10500.00, 'uploads/bd293afbce.jpg', 1, 6, 3, 7),
(15, 'Laundry machine ', 4, 2, '<p>Best Laundry machine in bd.! years warenty<br /><br /></p>', 3200.00, 'uploads/d712a37947.png', 0, 5, 0, 0),
(16, 'iPhone X - Smartphone', 3, 4, '<p>5.8 inchi old multi touched display.Hexa-core 2.39ghz processor.</p>\r\n<p>3GB RAM And 256GB ROM</p>\r\n<p>12MP Dual Rear and 7MP front camera</p>\r\n<p>Nano Sim</p>', 120500.00, 'uploads/ac7385aa6d.jpeg', 1, 4, 0, 0),
(17, ' iPhone 6 - Smartphone', 3, 4, '<p>Apple iPhone 6 comes with 1GB of RAM. The phone packs 16GB of internal storage that cannot be expanded. As far as the cameras are concerned, the Apple iPhone 6 packs a 8-megapixel primary camera on the rear and a 1.2-megapixel front shooter for selfies. The Apple iPhone 6 is powered by a 1810mAh non removable battery.</p>', 34999.00, 'uploads/dd277d68bd.jpg', 1, 3, 0, 0),
(18, 'iPhone 8 Plus', 3, 4, '<p>iPhone XR comes with new chip<br />64GB and 256GB storage options on all models<br />128GB on XR only <br />Battery improvements on iPhone XR<br />The Apple iPhone 8 and 8 Plus both come with the A11 Bionic chip with 64-bit architecture, a neural engine and embedded M11 motion coprocessor. They also both come in 64GB and 256GB storage capacities, neither of which offer microSD support.</p>', 109999.00, 'uploads/33ce6b99f4.jpg', 1, 9, 1, 8),
(19, 'LED Monitor K202HQL', 4, 5, '<p>Product details of LED Monitor K202HQL 19.5\" - Black<br />Display size: 19.5 Inch<br />Resolution: HD+ (1600 x 900)<br />Stunning colours<br />Wall mountable<br />Ergonomic stand tilt -5 to 25 degrees<br />Image Brightness: 200 nits (cd/m2)<br />About LED Monitor K202HQL 19.5\"</p>\r\n<p><br />You\'ll enjoy tasks and entertainment more on the 19.5&rdquo; LED-backlit display. It presents incredibly clear, rich-detailed images at a high resolution of 1600 x 900, and features an impressive dynamic contrast ratio of 100,000,000:1 to reveal darker image areas in greater depth. A super-fast 5-millisecond response time displays action sequences with the highest degree of clarity. The great sights are made even better by exceptional colors via Acer Adaptive Contrast Management.</p>', 6563.00, 'uploads/346c11f644.png', 1, 0, 0, 0),
(20, ' YN 85mm f/1.8 Lens', 4, 3, '<p>Product details of YN 85mm f/1.8 Lens for Canon EF - Black<br />EF-Mount Lens/Full-Frame Format<br />Aperture Range: f/1.8 to f/18<br />AF/MF Switch<br />Gold-Plated Contacts<br />Minimum Focusing Distance: 2.8\'<br />Filter Diameter: 58mm<br />YN 85mm f/1.8 Lens for Canon EF<br />The YN 85mm f/1.8 Lens from Yongnuo is a short-telephoto prime designed for Canon EF-mount DSLRs. Pairing well with the slightly long focal length is a bright f/1.8 maximum aperture that benefits working in low-light as well as affords greater control over depth of field for selective focus control. An AF/MF switch on the lens barrel permits quick switching between focusing methods, and the lens can focus as closely as 2.8\' to suit photographing close-up subjects. Additionally, gold-plated contacts permit working with all exposure modes as well as transferring lens information to the EXIF data.</p>', 14740.00, 'uploads/2c7084ec2f.jpg', 1, 7, 6, 3),
(21, 'EOS 77D DSLR Camera', 4, 3, '<p>Product details of EOS 77D DSLR Camera (Body) - Black<br />No return policy after delivered<br />24.2 Megapixel CMOS (APS-C) sensor<br />Built-in Wi-Fi, NFC and Bluetooth<br />Hdr movie &amp; time-lapse movie.<br />Flash memory type: SDXC<br />About EOS 77D<br />Featuring an optical viewfinder with a 45-point all cross-type AF system1 and fast, accurate Dual Pixel CMOS AF with phase-detection, the EOS 77D camera helps you capture the action right as it happens. Extensive, customizable controls and brilliant image quality help you get the photo looking exactly how you want it. Capture vibrant colors and fine details with the 24.2 Megapixel CMOS (APS-C) Sensor. Without missing a beat, check and change your settings with the top-mounted LCD screen and rear Quick Control dial. When you&rsquo;re satisfied with your results, built-in Wi-Fi2, NFC3 and Bluetooth4 technology lets you easily share your favorite photos and videos.</p>', 58160.00, 'uploads/6521499b3d.jpg', 1, 6, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_wlist`
--

DROP TABLE IF EXISTS `tbl_wlist`;
CREATE TABLE IF NOT EXISTS `tbl_wlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cmrId` int NOT NULL,
  `productId` int NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tbl_wlist`
--

INSERT INTO `tbl_wlist` (`id`, `cmrId`, `productId`, `productName`, `price`, `image`) VALUES
(6, 1, 15, 'Laundry machine ', 3200.00, 'uploads/d712a37947.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
