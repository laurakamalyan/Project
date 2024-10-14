-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 09:50 AM
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
-- Database: `toma_online_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(4) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'laura', 'laura123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `product_id` int(4) NOT NULL,
  `quantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(85, 0, 48, 1),
(86, 1, 44, 1),
(96, 1, 101, 1),
(120, 3, 7, 1),
(124, 5, 45, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `picture` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `picture`) VALUES
(35, 'Clothes', 'ba1e19eda6bad55410a8dc59dda3061c.jpg'),
(36, 'Shoes', '3c51bb85eb272d01756f4bf5e8658f14.jpg'),
(38, 'Bags', '76e17ceee10c6895ae93c0262aeb3108.jpg'),
(39, 'Hats', '9b396f7a7eba5dc6c1c95b1d94c20300.jpg'),
(40, 'Glasses', '506971eac6c0225752ae01ab148abd3c.jpg'),
(41, 'Accessories', '8677fecf80d5f74dc8b911637e6d2e7d.jpg'),
(42, 'Dishes', '20d45604c643ed487874a78ed48dd424.jpg'),
(43, 'Toys', '38e6dc2aa1934d43b6864ee140e0bd3d.jpg'),
(44, 'Strollers', 'bf89f6e398f3710b89bdb950e598db60.jpg'),
(45, 'Beds', '03b21198897c05a4c1e891b13923fcf6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `product_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `product_id`) VALUES
(32, 1, 98),
(33, 1, 101),
(39, 3, 8),
(40, 3, 74),
(42, 3, 76),
(43, 3, 7),
(45, 3, 10),
(46, 5, 36);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(5) NOT NULL,
  `user_id` int(15) NOT NULL,
  `product_id` int(15) NOT NULL,
  `quantity` int(15) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `create_date`) VALUES
(53, 3, 36, 1, '2024-10-08'),
(54, 3, 8, 3, '2024-10-08'),
(55, 3, 8, 1, '2024-10-08'),
(56, 3, 57, 1, '2024-10-08'),
(57, 3, 56, 1, '2024-10-08'),
(58, 3, 55, 1, '2024-10-08'),
(59, 3, 93, 1, '2024-10-08'),
(60, 3, 56, 1, '2024-10-08'),
(61, 3, 55, 2, '2024-10-08'),
(62, 5, 36, 8, '2024-10-09'),
(63, 5, 40, 9, '2024-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(120) NOT NULL,
  `category_id` int(3) NOT NULL,
  `image` varchar(60) NOT NULL,
  `price` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category_id`, `image`, `price`) VALUES
(7, 'Bodysuit', 'Bodysuit for girls', 35, '4490d08a-f3ca-4a36-8451-dc500cae36a4.jpeg', 200),
(8, 'Overalls ', 'Overalls for girls', 35, 'Baby Girl Striped & Cartoon Graphic Tee & Jumpsuit.jpeg', 300),
(9, 'Set', 'Set for boys', 35, 'Poldy Baby Bebek Kıyafetleri-Yeni Gelenler Kategorisi.jpeg', 250),
(10, 'Dress', 'Dress for girls', 35, '791056ba-e986-4796-95d3-17aab9be1c99.jpeg', 500),
(11, 'Set', 'Set for girl', 35, 'SHEIN USA.jpeg', 600),
(14, 'Shirt', 'Shirt for boys', 35, '62a7280969b419b177cdfeba69c9ee1c.jpg', 650),
(15, 'Jacket', 'Jacket for boys', 35, 'H&M Hooded Jacket- dark blue.jpeg', 1200),
(16, 'Set', 'Set for boys', 35, 'set_boys.jpeg', 1000),
(17, 'Dress', 'Dress for girls', 35, '34abab3d-6962-4a12-96d7-bb5055459be7.jpeg', 750),
(18, 'Overalls', 'Overalls for girls', 35, '5f247942-e59a-4dd7-a576-878ccd95046e.jpeg', 300),
(19, 'Bodysuit', 'Bodysuit for boys', 35, 'e6fd6740-c77c-4e56-9a8d-560650a1a36e.jpeg', 400),
(20, 'Bodysuit', 'Bodysuit for girls', 35, 'fc57de11-1fb9-46db-8d67-1ac71e00989e.jpeg', 550),
(21, 'T-Shirt', 'T-Shirt for boys', 35, 'Hugo Boss Kidswear - Shop Hugo Boss Juniors.jpeg', 250),
(34, 'Sandals', 'Sandals for girls', 36, 'download (2).jpeg', 350),
(36, 'Sneakers', 'Sneakers for boys', 36, 'New Spring_Autumn.jpeg', 680),
(37, 'Sandals', 'Sandals for girls', 36, 'download (5).jpeg', 550),
(38, 'Bootes', 'Bootes for boys', 36, '1pair PU Zip-Up Lace-Up Ankle Boots For Baby Boys Girls.jpeg', 950),
(39, 'Sneakers', 'Sneakers for girls', 36, 'Infant Rabbit Printed Simple Daily Sneakers.jpeg', 650),
(40, 'Bootes', 'Bootes for girls', 36, 'download (7).jpeg', 1200),
(42, 'Shoes', 'Shoes for girls', 36, 'Garotas Decoração Borboleta Sapatos Mary Jean.jpeg', 850),
(43, 'Backpack', 'Backpack for girls', 38, 'download (1).jpeg', 300),
(44, 'Clutch', 'Clutch for girls', 38, 'clutch.jpeg', 250),
(45, 'School bag', 'School bag for girls', 38, 'bag.jpeg', 450),
(46, 'School bag', 'School bag for boys', 38, 'bag 2.jpeg', 350),
(47, 'Backpack', 'Backpack for girls', 38, 'bag_.jpeg', 400),
(48, 'Bag', 'Bag for boys', 38, 'bag 4.jpeg', 500),
(49, 'Bags set', 'Bags for girls', 38, 'bag 5.jpeg', 1500),
(50, 'School bag', 'School bag for girls', 38, 'bag 3.jpeg', 600),
(51, 'School bag', 'School bag for boys', 38, 'bag 6.jpeg', 700),
(52, 'School bags set', 'School bags for girls', 38, 'bag 8.jpeg', 1200),
(54, 'Winter hat', 'Hats for girls and boys', 39, 'hat9.jpeg', 300),
(55, 'Winter hat', 'Hats for girls', 39, 'hat10.jpeg', 400),
(56, 'Boys hats', 'Hats for boys', 39, 'hat4.jpeg', 250),
(57, 'Pink cap', 'Caps for girls', 39, 'hat5.jpeg', 400),
(58, 'Blue hat', 'Hats for boys', 39, 'hat7.jpeg', 450),
(59, 'Boys caps', 'Caps for boys', 39, 'hat6.jpeg', 550),
(60, 'Yellow hat', 'Hats for boys', 39, 'hat2.jpeg', 450),
(61, 'Hats', 'Hats for girls and boys', 39, 'hat1.jpeg', 380),
(62, 'Girls hats', 'Hats for girls', 39, 'hat 12.jpeg', 500),
(63, 'Boys caps', 'Caps for boys', 39, 'hat8.jpeg', 600),
(64, 'Heart glasses', 'Heart shaped glasses for girls', 40, 'Toddler Girls Heart Frame Fashion Glasses.jpeg', 200),
(65, 'Pink glasses', 'Glasses for girls', 40, 'Toddler Girls Bow Decor Fashion Glasses.jpeg', 250),
(66, 'Shark glasses', 'Shark shaped glasses for boys', 40, 'Shark Decor Party Glasses.jpeg', 300),
(67, 'Girls glasses', 'Glasses for girls', 40, 'Kids Rainbow Decor Fashion Glasses.jpeg', 150),
(68, 'Blue glasses', 'Glasses for boys', 40, 'Square Frame Sunglasses.jpeg', 200),
(69, 'Heart glasses', 'Heart shaped glasses for girls', 40, 'glasses1.jpeg', 400),
(70, 'Mouse glasses', 'Mouse shaped glasses for girls', 40, 'glasses2.jpeg', 450),
(71, 'Heart glasses', 'Heart shaped glasses for girls', 40, 'Girls Heart Frame Sunglasses.jpeg', 300),
(72, 'Pirate glasses', 'Pirate glasses for boys', 40, 'Óculos de fantasia de pirata com estampa de caveira.jpeg', 500),
(73, 'Hair bands', 'Hair bands for girls', 41, 'hair bands.jpeg', 100),
(74, 'Hair clip', 'Hair clip in the form of butterflies', 41, '4pcs Toddler Girls Butterfly Decor Hair Clip.jpeg', 150),
(75, 'Bracelet', 'Bracelet for girls', 41, 'cute bracelet.jpeg', 200),
(76, 'Rings', 'Rings for girls', 41, 'rings.jpeg', 50),
(77, 'Hair comp', 'Hair comp for girls', 41, 'comb.jpeg', 150),
(78, 'Pacifier', 'Pacifier for girls and boys', 41, 'pacifier.jpeg', 200),
(79, 'Pacifier holder', 'Pacifier holder for girls and boys', 41, 'pacifier holder.jpeg', 100),
(80, 'Nair kit', 'Nail kit set for girls', 41, 'Baby Nail Kit 4-1 Set.jpeg', 350),
(81, 'Toothbrush', 'Toothbrush blue and pink', 41, 'toothbrush.jpeg', 300),
(82, 'Thermometr', 'Thermometr Hello Kitty', 41, 'thermometer.jpeg', 280),
(83, 'Baby potty', 'Baby potty for boys and girls', 41, 'baby potty.jpeg', 600),
(85, 'Dishes set', 'Shark shaped dishes set', 42, '67383050-4a2a-4f5b-ae07-e969ffb1ca39.jpeg', 1600),
(86, 'Bottle', 'Bottle for water', 42, 'Anti-Hot Leakproof 150ML Silicone Straw Cup_ Ideal….jpeg', 900),
(87, 'Fork & spoon', 'Fork and spoon ', 42, 'fork&spoon.jpeg', 500),
(88, 'Soup bowl', 'Soup bowl', 42, '318a0b0e-0f95-4e3f-b60f-537ab5cf295c.jpeg', 700),
(89, 'Plate', 'Chick shaped plate ', 42, 'dishes1.jpeg', 400),
(90, 'Dishes set', 'Fish shaped dishes set', 42, 'f8576e60-4188-4e9c-ad90-06c8618b6b18.jpeg', 1400),
(91, 'Bottle', 'Bottle for milk', 42, 'bottle.jpeg', 500),
(92, 'Fork & spoon', 'Wooden fork and spoon', 42, 'dishes2.jpeg', 650),
(93, 'Dishes set', 'Pinguin shaped dishes set', 42, 'fa97ce67-1ac4-4b60-a679-7caaafeb9e7b.jpeg', 1000),
(94, 'Soup bowl', 'Soup wooden bowl', 42, 'd8c274bc-bead-406a-885c-d0aeb3db5df4.jpeg', 850),
(95, 'Dishes set', 'Easter shaped dishes set', 42, 'bde876a9-02f4-48e7-8aeb-02af484201ce.jpeg', 1450),
(96, 'Dishes', 'Dishes', 42, 'Best Baby Gifts, Baby Accessories, Teething Baby.jpeg', 350),
(97, 'Cream Stroller', 'Cream Stroller for girls', 44, 'c2c76f4f-2b36-452a-8724-909f34e882d6.jpeg', 2100),
(98, 'Black Stroller', 'Black stroller for boys', 44, 'Optima Limited Edition Stroller 3in1.jpeg', 1900),
(100, 'Two block Stroller', 'Pink stroller, have 2 block', 44, 'aaaaaa.jpeg', 2200),
(101, 'Gray Stroller', 'Gray stroller for boys and girls', 44, 'Thule Baby Bassinet in Soft Beige at Nordstrom.jpeg', 2000),
(102, 'Cream Stroller', 'Stroller for boys and girls', 44, 'Anex Eli.jpeg', 1800),
(103, 'Three block Stroller', 'Pink stroller, have 3 block', 44, 'Search_ 58 results found for _stroller_.jpeg', 3000),
(104, 'Black Stroller', 'Black stroller for boys', 44, 'Peg Perego City Loop Chassis.jpeg', 2500),
(105, 'Pink Stroller', 'Pink stroller for girls', 44, 'Silver Cross(シルバークロス) 1877年設立の英国ベビーカーブランド.jpeg', 2000),
(107, 'Cradle for boys and ', 'Lorem ipsum dolor sit amet consectetur', 45, 'Boho nursery!.jpeg', 5000),
(108, 'Cradle for boys', 'Lorem ipsum dolor sit amet consectetur', 45, 'b5dbda2e-bd8a-4b51-aadc-464ec3174125.jpeg', 6000),
(110, 'White bed', 'Lorem ipsum dolor sit amet consectetur', 45, 'wdwdwdefrg.jpeg', 7500),
(112, 'Girls bed', 'Lorem ipsum dolor sit amet consectetur', 45, 'hrhergrbf.jpeg', 9000),
(113, 'Car bed', 'Lorem ipsum dolor sit amet consectetur', 45, 'p00.jpeg', 8500),
(114, 'Bunk bed', 'Lorem ipsum dolor sit amet consectetur', 45, 'hththr.jpeg', 7000),
(115, 'Baby cradle', 'Lorem ipsum dolor sit amet consectetur', 45, 't4t4t4t (2).jpeg', 5500),
(116, 'Bed for girls and bo', 'Lorem ipsum dolor sit amet consectetur', 45, 'p0p90p.jpeg', 8500),
(117, 'Castle bed', 'Lorem ipsum dolor sit amet consectetur', 45, 'oiouou.jpeg', 12000),
(118, 'Baby bed', 'Lorem ipsum dolor sit amet consectetur', 45, 't4t4t4t.jpeg', 4000),
(119, 'Girls bed', 'Lorem ipsum dolor sit amet consectetur', 45, 'aaaafrfrfr.jpeg', 6000),
(120, 'Cradle', 'Lorem ipsum dolor sit amet consectetur', 45, 'rt4t4.jpeg', 3000),
(121, 'Cradle', 'Lorem ipsum dolor sit amet consectetur', 45, 'jrtht.jpeg', 1500),
(122, 'Mobile for bed', 'Lorem ipsum dolor sit amet consectetur', 45, 'Bear Baby mobile.jpeg', 450),
(124, 'Doll', 'Lorem ipsum dolor sit amet consectetur', 43, 'toy12.jpeg', 1100),
(125, 'Educational toy', 'Lorem ipsum dolor sit amet consectetur', 43, 'toy18.jpeg', 500),
(126, 'Stroller', 'Lorem ipsum dolor sit amet consectetur', 43, 'toy24.jpeg', 800),
(127, 'Car', 'Lorem ipsum dolor sit amet consectetur', 43, 'toy31.jpeg', 700),
(131, 'Piano', 'Lorem ipsum dolor sit amet consectetur', 43, 'toy22.jpeg', 800),
(132, 'Soft toy', 'Lorem ipsum dolor sit amet consectetur', 43, 'toy17.jpeg', 600),
(133, 'Dishes set', 'Lorem ipsum dolor sit amet consectetur', 43, 'toy10.jpeg', 350),
(134, 'Carousel', 'Lorem ipsum dolor sit amet consectetur', 43, 'toy8.jpeg', 400),
(135, 'Gun', 'Lorem ipsum dolor sit amet consectetur', 43, 'toy29.jpeg', 680),
(137, 'Cash register', 'Lorem ipsum dolor sit amet consectetur', 43, 'toy23.jpeg', 550),
(138, 'Nail set', 'Lorem ipsum dolor sit amet consectetur', 43, 'toy11.jpeg', 280),
(139, 'Barby', 'Lorem ipsum dolor sit amet consectetur', 43, 'toy3.jpeg', 350),
(140, 'Washstand', 'Lorem ipsum dolor sit amet consectetur', 43, 'toy4.jpeg', 450),
(142, 'Laptop', 'Lorem ipsum dolor sit amet consectetur', 43, 'toy30.jpeg', 1500),
(143, 'Camera', 'Lorem ipsum dolor sit amet consectetur', 43, 'toy19.jpeg', 1200),
(144, 'Popit', 'Lorem ipsum dolor sit amet consectetur', 43, 'toy16.jpeg', 150),
(145, 'Robot', 'Lorem ipsum dolor sit amet consectetur', 43, 'toy26.jpeg', 750),
(147, 'Shoes set', 'Lorem ipsum dolor sit amet consectetur', 43, 'toy13.jpeg', 600),
(149, 'Car', 'Lorem ipsum dolor sit amet consectetur', 43, 'toy27.jpeg', 500);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `email`) VALUES
(1, 'Ani', 'ani', 'ANi$1234', 'ani@gmail.com'),
(3, 'Tom', 'tom', 'toM1234#', 'tom@mail.ru'),
(4, 'Anna', 'anna', 'annA_123', 'ann@gmail.com'),
(5, 'John', 'john', '_1234John', 'john@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
