-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2024-04-07 16:07:54
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
  `rate` float NOT NULL,
  PRIMARY KEY (`cartId`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quantity`, `image`, `rate`) VALUES
(4, 'g7v9g9flni8h7h82c20rvirq83', 15, 'Laundry machine ', 3200.00, 1, 'uploads/d712a37947.png', 0),
(5, 'g7v9g9flni8h7h82c20rvirq83', 21, 'EOS 77D DSLR Camera', 58160.00, 1, 'uploads/6521499b3d.jpg', 0),
(6, 'q0lke3gu36m3l3q7r9bhugu7eq', 18, 'iPhone 8 Plus', 109999.00, 1, 'uploads/33ce6b99f4.jpg', 0),
(9, '67n4kcq3rernb1592dmgav43s8', 19, 'LED Monitor K202HQL', 6563.00, 1, 'uploads/346c11f644.png', 0),
(10, '67n4kcq3rernb1592dmgav43s8', 18, 'iPhone 8 Plus', 109999.00, 1, 'uploads/33ce6b99f4.jpg', 0),
(11, '67n4kcq3rernb1592dmgav43s8', 21, 'EOS 77D DSLR Camera', 58160.00, 1, 'uploads/6521499b3d.jpg', 0),
(16, 'vbmt2jv6u3qtom3o87amhaimak', 20, ' YN 85mm f/1.8 Lens', 14740.00, 4, 'uploads/2c7084ec2f.jpg', 0.6);

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
(5, 'GPU'),
(6, 'CPU'),
(7, 'Footwear'),
(8, 'Sports &amp; fitness'),
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`) VALUES
(1, 'bappy', 'khilgaon, Dhaka', 'Dhaka', 'Bangladesh', '1219', '01622425286', 'customer@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'Han Yang', '3817 Spruce Street,, 714 Mayer Residence Hall (Stouffer College House)', 'Philadelphia', 'USA', '19104', '55164512', 'mahlerrrr76@gmail.com', '202cb962ac59075b964b07152d234b70'),
(4, '1', '1', '1', '1', '1', '1', '111', '698d51a19d8a121ce581499d7b701668');

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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

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
(35, 3, 15, 'Laundry machine ', 1, 3200.00, 'uploads/d712a37947.png', '2024-04-05 21:25:18', 0),
(36, 4, 18, 'iPhone 8 Plus', 5, 549995.00, 'uploads/33ce6b99f4.jpg', '2024-04-07 19:10:55', 0);

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
  `rate` float NOT NULL,
  `sales` int NOT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`, `stock`, `rate`, `sales`) VALUES
(1, 'Lenovo Legion Pro 7i Gaming Laptop', 2, 3, 'Memory & Storage :The PC memory has been upgraded to 64GB DDR5 SDRAM for enhanced high bandwidth to easily switch back and forth between open applications; the Hard drive has been upgraded to 2TB + 2TB PCIe NVMe M.2 SSD for fast boot-up and speedy data transfer\r\nProcessor: 13th Gen Intel Core i9-13900HX Processor (24 Cores, 32 threads, 36MB Cache, base at 2.20GHz, up to 5.40GHz), with NVIDIA GeForce RTX 4080 (12GB GDDR6)\r\nScreen: 240Hz 16-inch WQHD IPS Display (2560 x 1600)\r\nTech Specs: 1 x USB 3.2 Gen 2 Type-C, 4 x USB 3.2 Gen 1 Type-A, 1 x Thunderbolt 4, 1 x HDMI, 1 x RJ-45, 1 x Headphone/microphone combo; Wi-Fi 6E and Bluetooth Combo; Per-key RGB Backlit Keyboard\r\nAuthorized KKE Bundle: Bundled with KKE Mousepad', 16999.00, 'uploads/da4299f223.jpg', 0, 4, 4.8, 998),
(2, 'ASUS ROG Strix G16 Laptop', 2, 5, 'POWER UP YOUR PLAY - Win more games with Windows 11, a 14th Gen Intel Core i9-14900HX processor, and an NVIDIA GeForce RTX 4060 Laptop GPU at 140W Max TGP.\r\nBLAZING FAST MEMORY AND STORAGE – Multitask swiftly with 16GB of DDR5-5600MHz memory and 1TB of PCIe 4x4.\r\nROG INTELLIGENT COOLING – The Strix G16 features Thermal Grizzly’s Conductonaut Extreme liquid metal on the CPU, and a third intake fan among other premium features, to allow for sustained performance over long gaming sessions.', 13999.00, 'uploads/5030c05f99.jpg', 0, 7, 4.75, 4800),
(3, 'LG Gram 16', 2, 2, '<p>Press the power button for 2 seconds, then the light will vibrate for a few seconds. Once the vibration stop, the BLUE led indicator to stay on and it is in ready mode. To make a video, simply press the power button one time, the lighter will vibrate 2 times and the blue LED indicator goes off, then the video recording begins. To stop filming, press the power again, then the light will vibrate 3 times. Now your file is saved and in ready mode again. To turn off, hold the power button for 2 seconds, and the lighter will vibrate 2 times.</p>\r\n<p>Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.</p>\r\n<p>Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.</p>\r\n<p>Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.Product details will be go here.</p>', 9899.00, 'uploads/708e680c6f.jpg', 1, 4, 4.7, 435),
(4, 'Lakers 24 Kobe', 8, 3, 'Great outfit for your future NBA player\r\nGreat for Lakers fans\r\nSuper stylish, dressy and trendy\r\nCombined shipping available. Seller will refund difference after check-out. Pay one shipping rate, then $2 for each additional item. Seller will refund the money.\r\nEasy snaps for diaper changes', 399.00, 'uploads/83102d32c9.jpg', 0, 8, 5, 24),
(5, 'SAMSUNG 16', 2, 2, 'POWER FOR YOUR MOST PRODUCTIVE DAYS: Galaxy Book4 Pro models come with a new Intel Core Ultra 7 processor 155H or Intel Core Ultra 5 processor 125H with a higher-performance Intel ARC graphics & newly added AI neural processing unit (NPU)\r\nPOWERFUL. LIGHT. AMAZINGLY SLIM: Galaxy Book4 Pro is the epitome of portability and the lightest in our all-new Galaxy Book4 Series; 16” Thickness: 12.5mm, Weight: 3.44 lbs; 14\" Thickness: 11.6mm, Weight: 2.71 lbs', 18999.00, 'uploads/4b14d267ad.jpg', 1, 6, 4.1, 378),
(6, 'Basketball Lover Boy Kunkun', 4, 5, 'For the Ultimate Fan: If you\'re a die-hard enthusiast, this special gift is tailor-made for you. Make a bold statement about your passions and interests at any party!\r\nFor the Ultimate Fan: If you\'re a die-hard enthusiast, this special gift is tailor-made for you. Make a bold statement about your passions and interests at any party!\r\nFor the Ultimate Fan: If you\'re a die-hard enthusiast, this special gift is tailor-made for you. Make a bold statement about your passions and interests at any party!', 49.00, 'uploads/ab10610f8e.jpg', 1, 3, 2.5, 5661),
(7, 'ASUS TUF GeForce RTX 4090', 5, 2, 'NVIDIA Ada Lovelace Streaming Multiprocessors: Up to 2x performance and power efficiency\r\n4th Generation Tensor Cores: Up to 2X AI performance\r\n3rd Generation RT Cores: Up to 2X ray tracing performance\r\nAxial-tech fans scaled up for 23% more airflow\r\nDual Ball Fan Bearings last up to twice as long as conventional designs', 24899.00, 'uploads/4a46c9013f.jpg', 0, 5, 4.8, 871),
(8, 'VIPERA NVIDIA GeForce RTX 4090', 5, 2, '16,384 NVIDIA CUDA Cores\r\nSupports 4K 120Hz HDR, 8K 60Hz HDR, and Variable Refresh Rate as specified in HDMI 2.1a\r\nNew Streaming Multiprocessors: Up to 2x performance and power efficiency\r\nFourth-Gen Tensor Cores: Up to 2x AI performance\r\nThird-Gen RT Cores: Up to 2x ray tracing performance\r\nAI-Accelerated Performance: NVIDIA DLSS 3\r\nGame-Winning Responsiveness: NVIDIA Reflex low-latency platform', 16999.00, 'uploads/5aad5a9752.jpg', 0, 4, 4.3, 579),
(11, 'NVIDIA H100 80 GB Graphic Card', 5, 4, 'Accelerated Data Analytics\r\nReal-time Deep Learning Inference\r\nBuilt for AI, HPC, and data analytics\r\nUp to 7X higher performance for HPC applications', 99990.00, 'uploads/2f32e89726.jpg', 1, 8, 1.9, 9),
(12, 'NVIDIA Quadro RTX 4000', 5, 2, 'Experience fast, interactive, professional application performance\r\nLatest NVIDIA Turing GPU architecture and ultra-fast graphics memory\r\nNVidia RTX technology brings real time rendering to professionals\r\n36 RT cores accelerate photorealistic ray-traced rendering\r\nAdvanced rendering and shading features for immersive VR', 5999.00, 'uploads/d0d1fae017.jpg', 1, 2, 3.6, 84),
(13, 'MSI GeForce RTX 4080 16GB SUPRIM X', 5, 5, 'V511-004R\r\nMemory Clock Speed : 1700\r\nProduct Dimensions : ?33.6 x 14.2 x 7.8 cm\r\nItem Weight: 798 Grams', 8799.00, 'uploads/10ea9204a8.jpg', 1, 6, 4.6, 45),
(15, 'Dell Optiplex 7000 Intel i5-13500', 1, 2, 'Dell OptiPlex offers maximum efficiency and convenience in a small factor desktop tower PC. Processor: Intel i5-13500 (14 Cores, 6P + 8E; 2.5GHz – 4.8GHz / 1.8GHz – 3.5GHz, 24MB Cache)\r\nStorage: 512GB NVMe; RAM: 16GB DDR4-3200MHz. Dell OptiPlex offers lightning-fast responsiveness, rapid boot-up times, swift data access, and an overall improvement in system performance.\r\nGraphics: Intel UHD 770; This graphic card supports dual or quad monitors, 4K resolution for an elevated visual gaming experience or for complex office applications.\r\nOS: Windows 11 Pro. Optimized for School Education, Designers, Professionals, Small Business, Programmers, Gaming, Streaming, Video Conference and Online Classes, Remote Learning, Zoom Meeting.\r\nWarranty: 3 Year Dell Onsite Warranty / 3 Year Oemgenuine Limited Warranty. Memory & Hard Drive Upgrade | * - View Product Description for complete details and notes.', 8799.00, 'uploads/c3c6650bef.jpg', 0, 5, 4.2, 1146),
(16, 'HP Pro Tower 290 G9 Desktop Computer', 1, 4, 'Premium RAM and Storage: Enhance multitasking capabilities with 16GB RAM, while enjoying significantly faster performance compared to traditional hard drives with a 256GB PCIe M.2 SSD and an extra 1TB HDD.\r\nProcessor: 12th Gen Intel Core i3-12100 (up to 4.3 GHz with Intel Turbo Boost Technology, 12 MB L3 cache, 4 cores, 8 threads)\r\nGraphics and DVD: The system includes an integrated Intel UHD 730 Graphics card and a slim drive with an emergency eject pinhole for reading from and writing to CDs and DVDs.', 6789.00, 'uploads/d365bf2a07.jpg', 1, 4, 3.6, 155),
(17, 'Mac mini Apple M1 chip', 1, 4, 'Apple-designed M1 chip for a giant leap in CPU, GPU, and machine learning performance\r\n8-core CPU packs up to 3x faster performance to fly through workflows quicker than ever*\r\n8-core GPU with up to 6x faster graphics for graphics-intensive apps and games*\r\n16-core Neural Engine for advanced machine learning\r\n8GB of unified memory so everything you do is fast and fluid', 2999.00, 'uploads/4a25f46d67.jpg', 1, 3, 3.7, 4658),
(18, 'Apple 2023 MacBook Pro Laptop M3', 2, 4, 'SUPERCHARGED BY M3 — With an 8-core CPU and 10-core GPU, the Apple M3 chip can help you blaze through everyday multitasking and take on pro projects like editing thousands of photos or 4K video.\r\nUP TO 22 HOURS OF BATTERY LIFE — Go all day thanks to the power-efficient design of Apple silicon. The MacBook Pro laptop delivers the same exceptional performance whether it’s running on battery or plugged in. (Battery life varies by use and configuration. See apple.com/batteries for more information.)', 15889.00, 'uploads/bc011f19ac.jpg', 1, 9, 3.9, 1659),
(19, 'Canon EOS Rebel T7 DSLR Camera', 4, 5, '24.1 Megapixel CMOS (APS-C) sensor with is 100–6400 (H: 12800)\r\nBuilt-in Wi-Fi and NFC technology\r\n9-Point AF system and AI Servo AF\r\nOptical Viewfinder with approx 95% viewing coverage\r\nUse the EOS Utility Webcam Beta Software (Mac and Windows) to turn your compatible Canon camera into a high-quality webcam. Compatible Lenses- Canon EF Lenses (including EF-S lenses, excluding EF-M lenses)', 3499.00, 'uploads/36d63c3dad.jpg', 1, 3, 4.3, 89),
(20, 'ORDRO 4K Video Camera AC5', 4, 3, '4K Optical Zoom Camcorder: This 4k video camera is an optical zoom camcorder that zooms (zoom in / out) without sacrificing pixels, and is still a very sharp image. Easily zoom in on distant scenes without affecting the detailed picture quality. Vlogging video camcorder with 5MP CMOS sensor is easy to capture 4K images with high image capture speed and faster image processing to take pictures and video with the resolution 24MP and 2880x2160 24FPS.', 2299.00, 'uploads/119b2b82b5.jpg', 1, 7, 3.7, 172),
(21, 'Mac Book Pro Charger - 120W', 4, 3, '120W Fast Charger: Suprspc USB-C charger has a high charging efficiency of up to 96%, the charger can fully charge the mac book pro 16inch in about 1H 20mins. It can charge most mobile phones from 0% to 85% in 20 minutes. Works with USB C 120W, 118W, 110W, 106W, 100W, 96W, 87W, 61W, 30W, 29W PD model.', 259.00, 'uploads/022355bbbd.jpg', 1, 6, 4.6, 794),
(23, 'SAMSUNG Galaxy S24+ Plus', 3, 0, 'CIRCLE & SEARCH¹ IN A SNAP: What’s your favorite influencer wearing? Where’d they go on vacation? What’s that word mean? Don’t try to describe it — use Circle to Search1 with Google to get the answer; With S24 Series, circle it on your screen and learn more\r\nREAL EASY, REAL-TIME TRANSLATIONS: Speak foreign languages on the spot with Live Translate²; Unlock the power of convenient communication with near real-time voice translations, right through your Samsung Phone app', 10799.00, 'uploads/6e75d91860.jpg', 0, 4, 4.3, 22),
(24, 'Apple iPhone 15', 3, 0, 'WHAT\'S INCLUDED You get the new iPhone 15 , complete with unlimited talk, text, and data on America\'s Smart Network. We make it easy to keep your existing number or get a new one if you prefer. Best of all You can upgrade to the latest iPhone every year—no trade-in required to get started. Yes, seriously.', 8699.00, 'uploads/d87dd58596.jpg', 0, 5, 3.9, 394),
(25, 'HUAWEI Mate 50 Pro', 3, 0, 'For USA Buyers: This Smartphone is not compatible/will not work with any CDMA Networks including: VERIZON, SPRINT, US CELLULAR. Please check with your network provider for 3G or 4G/LTE compatibility check before you purchase.', 6399.00, 'uploads/1bc128f006.jpg', 0, 9, 4.9, 461),
(26, 'Google Pixel 8 Smartphone', 3, 0, 'Pixel 8 is the helpful phone engineered by Google; the new Google Tensor G3 chip is custom-designed with Google AI for cutting-edge photo and video features and smarter ways to help[1]\r\nUnlocked Android 5G phone gives you the flexibility to change carriers and choose your own data plan[2]; it works with Google Fi, Verizon, T-Mobile, AT&T, and other major carriers', 4899.00, 'uploads/2894cf2904.jpg', 0, 8, 3.1, 164),
(27, 'Intel Core i5-12600KF', 6, 0, 'Game and multitask without compromise powered by Intel’s performance hybrid architecture on an unlocked processor.\r\nDiscrete graphics required\r\nCompatible with Intel 600 series and 700 series chipset-based motherboards\r\nIntel and reg; Core and reg; i5 processor offers hyper-threading architecture that delivers high performance for demanding applications with improved onboard graphics and turbo boost', 899.00, 'uploads/ff04454751.jpg', 0, 6, 4.8, 1967),
(28, 'Intel Core i7-14700K', 6, 0, 'Game Without Compromise. Play harder and work smarter with Intel Core 14th Gen processors\r\n20 cores (8 P-cores + 12 E-cores) and 28 threads. Integrated Intel UHD Graphics 770 included\r\nUp to 5.6 GHz with Turbo Boost Max Technology 3.0 gives you smooth game play, high frame rates, and rapid responsiveness', 2899.00, 'uploads/204cc56de3.jpg', 0, 4, 4.7, 1312),
(29, 'Intel Core i9-14900KF', 6, 0, 'Game without compromise. Play harder and work smarter with Intel Core 14th Gen processors\r\n24 cores (8 P-cores + 16 E-cores) and 32 threads. Discrete graphics required\r\nLeading max clock speed of up to 6.0 GHz gives you smoother game play, higher frame rates, and rapid responsiveness', 3799.00, 'uploads/d77c31812e.jpg', 0, 5, 4.6, 513),
(30, 'AMD Ryze 7 5700X', 6, 0, 'Can deliver ultra-fast 100 plus FPS performance in the world\'s most popular games, discrete graphics card required\r\n8 Cores and 16 processing threads, based on AMD \"Zen 3\" architecture\r\n4.6 GHz Max Boost, unlocked for overclocking, 36 MB cache, DDR4-3200 support\r\nFor the advanced Socket AM4 platform, can support PCIe 4.0 on X570 and B550 motherboards\r\nCooler not included . Max. Operating Temperature (Tjmax) 90°C', 1299.00, 'uploads/20b35a7d1c.jpg', 0, 9, 4.7, 651),
(31, 'AMD Ryzen 9 5900X', 6, 0, 'The world\'s best gaming desktop processor, with 12 cores and 24 processing threads\r\nCan deliver elite 100-plus FPS performance in the world\'s most popular games\r\nCooler not included, high-performance cooler recommended. Max Temperature- 90°C\r\n4.8 GHz Max Boost, unlocked for overclocking, 70 MB of cache, DDR-3200 support\r\nFor the advanced Socket AM4 platform, can support PCIe 4.0 on X570 and B550 motherboards', 1599.00, 'uploads/cfa942f9a9.jpg', 0, 9, 4.2, 619),
(32, 'AMD Ryzen 5 5500', 6, 0, 'Item Package Dimension: 5.43L x 5.27W x 2.86H inches\r\nItem Package Weight - 0.97 Pounds\r\nItem Package Quantity - 1\r\nProduct Type - COMPUTER PROCESSOR', 699.00, 'uploads/f0d8ce3ce4.jpg', 0, 8, 4.7, 626),
(33, 'Nike Air Force 1', 7, 0, 'Upper material: Leather & Synthetic\r\nLining: Textile\r\nInsole material: Textile\r\nSole material: Rubber\r\nClosure: Lace-Up', 890.00, 'uploads/ac457a07ac.jpg', 0, 15, 3.6, 614),
(34, 'Air Jordan Xxxiv Low', 7, 0, 'Low-top design allows your ankle to move freely\r\nThe raw edges of the Zoom Air unit below the forefoot are visible through the Eclipse plate\r\nThe herringbone outsole offers rugged, multidirectional traction that\'s ready to play\r\nSculpted Eclipse plate made from molded TPU provides stability and support that engages during side-to-side movements', 1599.00, 'uploads/91ba73c4b2.jpg', 0, 19, 4.6, 194),
(35, 'Jordan Air 7', 7, 0, 'Care instructionsMachine Wash\r\nSole materialRubber\r\nOuter materialLeather\r\nClosure typeLace-Up', 1799.00, 'uploads/a6d0fcfc56.jpg', 0, 6, 4.6, 199),
(36, 'adidas Ultraboost 1.0 Sneaker', 7, 0, 'Men\'s shoes that provide the support and reliability needed to run with confidence\r\nSTRETCHWEB WITH CONTINENTAL RUBBER OUTSOLE: Stretchweb outsole flexes naturally for an energized ride, and Continental Rubber gives you superior traction; Officially licensed Continental product', 1399.00, 'uploads/c4cbe43933.jpg', 0, 18, 3.7, 191),
(37, 'Spalding React TF-250', 8, 0, 'Official size and weight: Size 7, 29.5\"\r\nAll-surface composite leather cover\r\nButyl rubber bladder for air retention\r\nShipped inflated and game-ready\r\nDesigned for indoor and outdoor play', 329.00, 'uploads/21c7305a3c.jpg', 0, 19, 4.1, 4906),
(38, 'adidas Rihla Training', 8, 0, 'adidas unisex-adult soccer ball', 289.00, 'uploads/01cfe5e206.jpg', 0, 8, 3.2, 98),
(39, '8 Legend Basketball Jersey', 9, 0, 'Fabric: 100% high quality polyester.This Youth Kids Boy Children #8 #24 legend basketball jersey is super soft,skin-friendly,lightweight breathable material and durable,quick dry.\r\nWashing: Hand washable/machine wash/line dry will not wrinkle or shrink after washing.Do not bleach.\r\nDesign style: Embroidered stitched letters and numbers jersey shirts, casual mens unisex clothing,fashion and trendy, straight fit design.', 139.00, 'uploads/c8798cf1a5.jpg', 0, 5, 4.2, 96),
(40, 'Intel Core i3-14100F', 6, 0, '4 cores (4 P-cores + 0 E-cores) and 8 threads\r\nPerformance two core microarchitecture, prioritizing and distributing workloads to optimize performance\r\nUp to 4.7 GHz unlocked. 12MB Cache\r\nCompatible with Intel 600-series (with potential BIOS update) and 700-series chipset-based motherboards\r\nPCIe 5.0 & 4.0 support. DDR4 and DDR5 Memory support. RM1 thermal solution included. Discrete graphics required.', 699.00, 'uploads/40f0f9fc32.jpg', 0, 6, 4.7, 1651),
(41, 'AMD Ryzen 3 4100', 6, 0, 'Can deliver smooth 100 plus FPS performance in the world\'s most popular games, discrete graphics card required\r\n4 Cores and 8 processing threads, bundled with the AMD Wraith Stealth cooler\r\n4.0 GHz Max Boost, unlocked for overclocking, 6 MB cache, DDR4-3200 support\r\nFor the advanced Socket AM4 platform', 639.00, 'uploads/066bab90ed.jpg', 0, 19, 4.7, 1961),
(42, 'AMD Ryzen 7 5800X', 6, 0, 'AMD\'s fastest 8 core processor for mainstream desktop, with 16 procesing threads. OS Support-Windows 10 64-Bit Edition\r\nCan deliver elite 100-plus FPS performance in the world\'s most popular games\r\nCooler not included, high-performance cooler recommended\r\n4.7 GHz Max Boost, unlocked for overclocking, 36 MB of cache, DDR-3200 support\r\nFor the advanced Socket AM4 platform, can support PCIe 4.0 on X570 and B550 motherboards\r\nSystem Memory Specification: Up to 3200MHz', 1489.00, 'uploads/04452d72c4.jpg', 0, 1, 4.4, 1641),
(43, 'AMD Ryzen™ 9 7900X', 6, 0, 'Processor is versatile, reliable, and offers convenient usage with high speed\r\nRyzen 9 product line processor for your convenience and optimal usage\r\n5 nm process technology for reliable performance with maximum productivity\r\nDodeca-core (12 Core) processor core allows multitasking with great reliability and fast processing speed', 2999.00, 'uploads/b274288606.jpg', 0, 19, 4.7, 164),
(44, 'AMD Ryzen™ 9 7950X', 6, 0, 'Processor consumes less power to offer maximum productivity with added usability\r\nRyzen 9 product line processor for better usability and increased efficiency\r\n5 nm process technology provides optimal processing results with added usability\r\nHexadeca-core (16 Core) processor core efficiently handles data to ensure quicker transfer of information with maximum usability\r\n16 MB L2 plus 64 MB L3 cache memory provides excellent hit rate in short access time enabling improved system performance\r\nProcessor with 4.50 GHz clock speed for quick and dependable processing of data to ensure maximum productivity\r\nComes with AMD Radeon Graphics controller for stunning picture quality', 4299.00, 'uploads/5f5bd3c324.jpg', 0, 16, 4.75, 72),
(45, 'AMD Ryzen 7 7800X3D', 6, 0, 'Processor provides dependable and fast execution of tasks with maximum efficiency.Graphics Frequency : 2200 MHZ.Number of CPU Cores : 8. Maximum Operating Temperature (Tjmax) : 89°C.\r\nRyzen 7 product line processor for better usability and increased efficiency\r\n5 nm process technology for reliable performance with maximum productivity\r\nOcta-core (8 Core) processor core allows multitasking with great reliability and fast processing speed\r\n8 MB L2 plus 96 MB L3 cache memory provides excellent hit rate in short access time enabling improved system performance\r\nProcessor with 4.20 GHz clock speed for reliable and fast execution of instructions to ensure maximum convenience and feasibility\r\nComes with AMD Radeon Graphics controller for amazing graphics output', 2799.00, 'uploads/587e924a1c.jpg', 0, 15, 4.6, 198),
(46, 'Icetea-kangshifu', 8, 0, 'Master Kong Iced Tea, a drink with ingredients such as water, sugar, black tea powder and table salt. Kobe\'s favorite.', 24.00, 'uploads/cad51b96b8.jpg', 0, 0, 2.4, 4824);

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
