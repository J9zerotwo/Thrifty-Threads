-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2023 at 06:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `rrp` decimal(7,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES
(1, 'Bi-Swing Jacket', '<p>Lightweight Big & Tall jacket is designed for enhanced mobility.<br>The crisp-weather essential also has a peached microfiber shell that’s incredibly soft.</p>\r\n<h2>Brand: Ralph Lauren </h2>\r\n<p><b>Machine washable:</b> Yes</p>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li>Wind Breaker</li>\r\n</ul>\r\n<h3>SIZE</h3>\r\n<ul>\r\n<li>M-L</li>\r\n</ul>\r\n<h3>MATERIAL</h3>\r\n<ul>\r\n<li>Shell and sleeve lining: 100% polyester</li>\r\n<li>Body lining: 100% cotton</li>\r\n</ul>', 1000.00, 0.00, 10, 'ralp lauren.jpg', '2019-03-13 17:55:22'),
(2, 'Vintage Nike Sweatshirt ', '<p>Nike crewneck vintage selection for the very best in unique.</p>\r\n<h2>Nike </h2>\r\n<p><b>Machine washable:</b> Yes</p>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li>Sweatshirt</li>\r\n</ul>\r\n<h3>SIZE</h3>\r\n<ul>\r\n<li>L-XL</li>\r\n</ul>\r\n<h3>MATERIAL</h3>\r\n<ul>\r\n<li>100% cotton</li>\r\n</ul>\r\n', 1000.00, 1500.00, 34, 'NIKE3.jpg\r\n', '2019-03-13 18:52:49'),
(3, 'Vintage Lacoste Knit Sweater', '<p>Pre-owned: Good condition</p>\r\n<h2>Brand: Lacoste </h2>\r\n<p><b>Machine washable:</b> Yes</p>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li>Knit Sweater</li>\r\n</ul>\r\n<h3>SIZE</h3>\r\n<ul>\r\n<li>L</li>\r\n</ul>\r\n<h3>MATERIAL</h3>\r\n<ul>\r\n<li>100% acrylic</li>\r\n</ul>\r\n', 1500.00, 0.00, 23, 'LACOSTE5.jpg', '2019-03-13 18:47:56'),
(4, 'Burberry Jumper', '', 950.00, 0.00, 7, 'burberry.jpg', '2019-03-13 17:42:04'),
(5, 'Converse Low Cut', '<p>The Chuck Taylor All Star Low Top sneaker keeps it classic.</p>\r\n<h2>Brand: Converse </h2>\r\n<p><b>Machine washable:</b> Yes</p>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li>Canvas Shoes</li>\r\n</ul>\r\n<h3>SIZE</h3>\r\n<ul>\r\n<li>US Women (8.5)</li>\r\n<li>US Men (7)</li>\r\n</ul>\r\n<h3>MATERIAL</h3>\r\n<ul>\r\n<li>Natural Gum Rubber</li>\r\n</ul>', 1500.00, 0.00, 5, 'converse.jpg', '2023-07-05 15:49:13'),
(6, 'Oversize Cotton Poplin Shirt', '<p>.</p>\r\n<h2>Brand: Lacoste </h2>\r\n<p><b>Machine washable:</b> Yes</p>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li>Lightweight Shirt</li>\r\n</ul>\r\n<h3>SIZE</h3>\r\n<ul>\r\n<li>M</li>\r\n</ul>\r\n<h3>MATERIAL</h3>\r\n<ul>\r\n<li>100% cotton</li>\r\n</ul>', 1000.00, 0.00, 8, 'LACOSTE4.jpg', '2023-07-05 15:51:30'),
(7, 'Unisex Lacoste Striped Crocodile ', '<p>Add a bold twist to any look. A new take on a Lacoste classic, featuring our iconic stripes.</p>\r\n<h2>Brand: Lacoste </h2>\r\n<p><b>Machine washable:</b> Yes</p>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li>Iconic Stripe</li>\r\n</ul>\r\n<h3>SIZE</h3>\r\n<ul>\r\n<li>M-L</li>\r\n</ul>\r\n<h3>MATERIAL</h3>\r\n<ul>\r\n<li>100% cotton</li>\r\n</ul>\r\n\r\n', 1000.00, 0.00, 2, 'LACOSTE2.jpg', '2023-07-05 15:52:37'),
(8, 'Blazer with Rolled-up Sleeves', '<p>Open blazer with a lapel collar and padded shoulders.</p>\r\n<h2>Brand: Zara </h2>\r\n<p><b>Machine washable:</b> Yes</p>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li>Blazer</li>\r\n</ul>\r\n<h3>SIZE</h3>\r\n<ul>\r\n<li>XS</li>\r\n</ul>\r\n<h3>MATERIAL</h3>\r\n<ul>\r\n<li>Outer Shell: 100% viscose</li>\r\n<li>Lining: 100% acetate</li>\r\n</ul>\r\n', 850.00, 0.00, 9, 'ZARA1.jpg', '2023-07-05 15:53:57'),
(9, 'Wide Lapel Cropped Blazer', '<p>Open front blazer with lapel collar and long sleeves with belted cuffs.</p>\r\n<h2>Brand: Zara </h2>\r\n<p><b>Machine washable:</b> Yes</p>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li>Blazer</li>\r\n</ul>\r\n<h3>SIZE</h3>\r\n<ul>\r\n<li>S</li>\r\n</ul>\r\n<h3>MATERIAL</h3>\r\n<ul>\r\n<li>Outer Shell: 66% polyester, 34% cotton</li>\r\n\r\n</ul>\r\n', 750.00, 0.00, 2, 'ZARA2.jpg', '2023-07-05 15:54:28'),
(10, 'Short Sleeve UT', '<p>A special UT collection features.</p>\r\n<h2>Brand: Uniqlo </h2>\r\n<p><b>Machine washable:</b> Yes</p>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li>T-Shirt</li>\r\n</ul>\r\n<h3>SIZE</h3>\r\n<ul>\r\n<li>M</li>\r\n</ul>\r\n<h3>MATERIAL</h3>\r\n<ul>\r\n<li>100% cotton</li>\r\n</ul>\r\n', 150.00, 0.00, 6, 'UNI1.jpg', '2023-07-05 15:56:09'),
(11, 'Short Sleeve UT', '<p>The collection focuses on the numerous flowers painted by Andy Warhol and gorgeously designed.</p>\r\n<h2>Brand: Uniqlo </h2>\r\n<p><b>Machine washable:</b> Yes</p>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li>T-Shirt</li>\r\n</ul>\r\n<h3>SIZE</h3>\r\n<ul>\r\n<li>S-M</li>\r\n</ul>\r\n<h3>MATERIAL</h3>\r\n<ul>\r\n<li>100% cotton</li>\r\n</ul>\r\n', 80.00, 0.00, 3, 'UNI2.jpg', '2023-07-05 15:57:19'),
(12, 'Slim Fit Striped Jersey ', '<p></p>\r\n<h2>Brand: Ralph Lauren </h2>\r\n<p><b>Machine washable:</b> Yes</p>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li>T-Shirt</li>\r\n</ul>\r\n<h3>SIZE</h3>\r\n<ul>\r\n<li>M</li>\r\n</ul>\r\n<h3>MATERIAL</h3>\r\n<ul>\r\n<li>100% cotton</li>\r\n</ul>\r\n', 900.00, 1200.00, 1, 'RL1.jpg', '2023-07-05 15:59:05'),
(13, 'Fit  Anchor Jersey T-Shirt', '<p> It is crafted from soft cotton jersey and printed with an anchor motif.</p>\r\n<h2>Brand: Ralph Lauren </h2>\r\n<p><b>Machine washable:</b> Yes</p>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li>Crewneck</li>\r\n</ul>\r\n<h3>SIZE</h3>\r\n<ul>\r\n<li>S-M</li>\r\n</ul>\r\n<h3>MATERIAL</h3>\r\n<ul>\r\n<li>100% cotton</li>\r\n</ul>\r\n', 1200.00, 0.00, 3, 'RL2.jpg\r\n', '2023-07-05 15:59:39'),
(14, 'Crewneck T-Shirt', '<p></p>\r\n<h2>Brand: Ralph Lauren </h2>\r\n<p><b>Machine washable:</b> Yes</p>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li>T-Shirt</li>\r\n</ul>\r\n<h3>SIZE</h3>\r\n<ul>\r\n<li>L</li>\r\n</ul>\r\n<h3>MATERIAL</h3>\r\n<ul>\r\n<li>100% cotton</li>\r\n</ul>\r\n', 900.00, 0.00, 12, 'RL3.jpg', '2023-07-05 16:00:10'),
(15, 'Dri-FIT Short-Sleeve Top\r\n\r\n\r\n', '<p> </p>\r\n<h2>Brand: Nike</h2>\r\n<p><b>Machine washable:</b> Yes</p>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li>Dri-FIT</li>\r\n</ul>\r\n<h3>SIZE</h3>\r\n<ul>\r\n<li>S-M</li>\r\n</ul>\r\n<h3>MATERIAL</h3>\r\n<ul>\r\n<li>100% polyester</li>\r\n</ul>\r\n', 250.00, 0.00, 5, 'NIKE1.jpg', '2023-07-05 16:01:41'),
(16, 'Dri-FIT One Training Top', '<p></p>\r\n<h2>Brand: Nike </h2>\r\n<p><b>Machine washable:</b> Yes</p>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li>Dri-FIT</li>\r\n</ul>\r\n<h3>SIZE</h3>\r\n<ul>\r\n<li>S-M</li>\r\n</ul>\r\n<h3>MATERIAL</h3>\r\n<ul>\r\n<li>100% polyester</li>\r\n</ul>\r\n', 100.00, 250.00, 3, 'NIKE2.jpg', '2023-07-05 16:02:05'),
(17, 'Lakers NBA Black Chrome White ', '<p>  Introducing the Los Angeles Lakers NBA Black Chrome White 9FORTY Adjustable Cap, the ultimate headwear for devoted Lakers fans.</p>\r\n<h2>Brand: Los Angeles Lakers </h2>\r\n<p><b>Machine washable:</b> No</p>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li> Adjustable Cap</li>\r\n</ul>\r\n\r\n', 100.00, 0.00, 2, 'CAP1.jpg', '2023-07-05 16:03:13'),
(18, 'Twill Ball Cap', '<p> </p>\r\n<h2>Brand: Ralph Lauren </h2>\r\n<p><b>Machine washable:</b> No</p>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li>Cap</li>\r\n</ul>\r\n<h3>SIZE</h3>\r\n<ul>\r\n<li>Inner Size (58cm)</li>\r\n</ul>\r\n<h3>MATERIAL</h3>\r\n<ul>\r\n<li>100% cotton</li>\r\n</ul>\r\n', 100.00, 0.00, 7, 'CAP2.jpg', '2023-07-05 16:07:13'),
(19, 'Wide High Jeans ', '<p>Light denim blue, solid colour, zip fly and button and wide, straight legs.</p>\r\n<h2>Brand: H_M </h2>\r\n<p><b>Machine washable:</b> Yes</p>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li>Denim</li>\r\n</ul>\r\n<h3> SIZE </h3>\r\n<ul>\r\n<li> <b>Length: </b> 79 cm (Long) </li>\r\n<li><b>Waist: </b> 58-62cm </li>\r\n<li><b>Fit: </b> Regular fit</li>\r\n</ul>\r\n<h3>MATERIAL</h3>\r\n<ul>\r\n<li>1% elastine</li>\r\n<li>99% cotton</li>\r\n</ul>\r\n', 300.00, 0.00, 15, 'h_m1.jpg', '2023-07-05 16:08:17'),
(20, 'Embrace High Ankle Jeans', '<p> Denim blue, solid colour, ankle-length jeans in washed, stretch denim with worn details. High waist, zip fly and button and skinny legs.</p>\r\n<h2>Brand: H_M </h2>\r\n<p><b>Machine washable:</b> Yes</p>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li>Denim</li>\r\n</ul>\r\n<h3> SIZE </h3>\r\n<ul>\r\n<li> <b>Length: </b> 74.5cm (Ankle Length) </li>\r\n<li><b>Waist: </b> 58-62cm (High Waist)</li>\r\n<li><b>Fit: </b> Skinny Fit</li>\r\n<li><b>Style: </b> Trashed</li>\r\n</ul>\r\n<h3>MATERIAL</h3>\r\n<ul>\r\n<li>2% elastine</li>\r\n<li>6% polyester</li>\r\n<li>92% cotton</li>\r\n</ul>', 250.00, 0.00, 17, 'H_M2.jpg', '2023-07-05 16:08:42'),
(21, '574V2 Evergreen Trainers', '<p>The New Balance 574V2 Evergreen Trainers have been designed with a classic and casual style that works for any daily activity.</p>\r\n<h2>Brand: New Balance </h2>\r\n<p><b>Machine washable:</b> No</p>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li>Running Shoes</li>\r\n</ul>\r\n<h3>SIZE</h3>\r\n<ul>\r\n<li>US 10.5(27.5cm)</li>\r\n</ul>\r\n<h3>MATERIAL</h3>\r\n<ul>\r\n<li>Synthetic Leather</li>\r\n<li>Suede</li>\r\n<li>Mesh</li>\r\n</ul>\r\n', 1550.00, 0.00, 6, 'NB.jpg', '2023-07-05 16:09:40'),
(22, 'RB4264 Chromance', '<p>The extraordinary vision profile of this powerful new squared shape with exclusive new lenses takes game changing, high performance vision to a whole new level.</p>\r\n<h2>Brand: Ray-Ban </h2>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li>Sunglasses</li>\r\n</ul>\r\n<h3>FRAME DESCRIPTION</h3>\r\n<ul>\r\n<li><b>Shape:</b> Square</li>\r\n<li><b>Color:</b> Matte Black</li>\r\n<li><b>Material:</b> Nylon</li>\r\n<li><b>Temple Color:</b> Black</li>\r\n</ul>\r\n\r\n', 180.00, 0.00, 60, 'Rb1.jpg', '2023-07-05 16:10:47'),
(23, 'RB2180', '<p>Along with distinctive rivets and Ray-Ban shaped temples, these styles feature a sleek flattened bridge and stylish tinted lenses in appealing gradient options.</p>\r\n<h2>Brand: Ray-Ban </h2>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li>Sunglasses</li>\r\n</ul>\r\n<h3>FRAME DESCRIPTION</h3>\r\n<ul>\r\n<li><b>Shape:</b> Phantos</li>\r\n<li><b>Color:</b> Polished Light Brown</li>\r\n<li><b>Material:</b> Propionate</li>\r\n<li><b>Temple Color:</b> Light Brown</li>\r\n</ul>\r\n\r\n', 280.00, 0.00, 25, 'Rb2.jpg', '2023-07-05 16:11:06'),
(24, 'Low-Cut Straight Fit Jeans', '<p> Low-waist jeans with a five-pocket design and straight legs. Front zip and metal top button fastening.</p>\r\n<h2>Brand: Stradivarius </h2>\r\n<p><b>Machine washable:</b> Yes</p>\r\n<h3>MATERIAL</h3>\r\n<ul>\r\n<li>100% cotton</li>\r\n</ul>\r\n', 350.00, 0.00, 10, 'stradivarius.jpg', '2023-07-05 16:12:16'),
(25, 'Andy Warhol Flowers ', '<p> Andy Warhol Flowers Collection.</p>\r\n<h2>Brand: Uniqlo </h2>\r\n<p><b>Machine washable:</b> Yes</p>\r\n<h3>TYPE</h3>\r\n<ul>\r\n<li>T-Shirt</li>\r\n</ul>\r\n<h3>SIZE</h3>\r\n<ul>\r\n<li>M</li>\r\n</ul>\r\n<h3>MATERIAL</h3>\r\n<ul>\r\n<li>100% cotton</li>\r\n</ul>\r\n', 100.00, 0.00, 26, 'UNI3.jpg', '2023-07-05 16:13:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
