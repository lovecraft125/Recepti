-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2016 at 03:28 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recepti`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Marina', 'Marold', 'cica@mica.com', '123'),
(2, 'Antonio', 'Jakobac', 'h.p.lovecraft125@gmail.com', '4f299a7369c16d23f5be5484b31713a6268ed832b17ad7f1ccefebb929038b23'),
(3, 'a', 'a', 'a', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb'),
(6, 'Mario', 'Jakobac', 'mario@yahoo.com', '59195c6c541c8307f1da2d1e768d6f2280c984df217ad5f4c64c3542b04111a4'),
(7, 'dasdadsad', 'dsadsadasda', 'dasdsadasd', '80671bd3c94058afa23ddefcde4836a255db9ab70bf845a67dc118654ae76402'),
(8, 'CicaMica', 'Mica', 'CicaKraljica@guza.com', '93cc4ad2a2102405c97fd2128f4e9e0cd704273373a11f7443a91850f7a57ce7'),
(9, 'Josip', 'Broz', 'tito@gmail.com', '504db5aeeabd937a18a36b62d6e948d236b889b33c84e9e0561d7fda1c145bce'),
(10, 'milos', 'njegic', 'genja@gmail.com', '2ba290587d882c1bce75c51b301ee5812b5d6f243134ff91355a4bab640a7aa9');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(2, 'Jela sa rostilja'),
(1, 'Kuvana jela');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recepie_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `author`, `recepie_id`, `comment`, `date`) VALUES
(1, ' ', 4, 'Mnogo lepo izgleda', '2016-06-05 15:16:53'),
(2, ' ', 5, 'Njam Njam', '2016-06-05 15:20:55'),
(3, 'milos njegic', 5, 'Odlicno izgleda prava patka', '2016-06-05 15:24:01'),
(4, 'Antonio Jakobac', 5, 'Prava kineska', '2016-06-05 15:42:42'),
(5, 'Antonio Jakobac', 4, 'Dobra je skusa ko lebac', '2016-06-05 20:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `recepies`
--

CREATE TABLE `recepies` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recepies`
--

INSERT INTO `recepies` (`id`, `author_id`, `category_id`, `title`, `content`, `image`, `date`) VALUES
(1, 1, 1, 'Pasulj klot', 'Soufflé pudding jelly-o. Jelly-o chocolate cake muffin chocolate tart topping chocolate bar. Candy canes pudding cheesecake. Carrot cake danish croissant gummi bears cotton candy sugar plum jelly beans. Chocolate halvah cheesecake soufflé dragée tiramisu. Gingerbread candy brownie sesame snaps. Wafer cupcake sesame snaps candy canes toffee cookie dragée. Bear claw marshmallow donut bonbon candy canes candy cheesecake marshmallow. Oat cake chocolate cake wafer lemon drops. Caramels sweet roll oat cake tart sweet tootsie roll cake jelly beans. Pastry jelly-o tart gummi bears tootsie roll soufflé gummi bears pie. Pie jelly-o dessert sugar plum croissant bonbon. Oat cake gummi bears oat cake halvah dragée cake chocolate cake tart.', 'beans.jpg', '2016-05-31 20:10:32'),
(2, 2, 1, 'Kiseli kupus', 'Lollipop muffin chocolate gingerbread cookie. Candy canes sesame snaps macaroon gummi bears apple pie dessert cake. Ice cream gingerbread cookie sesame snaps. Sugar plum jelly gummies biscuit cupcake jelly pie tart. Souffl&eacute; cotton candy tiramisu pudding icing topping donut apple pie chupa chups. Cookie oat cake toffee chupa chups halvah. Bear claw chocolate cake jelly-o carrot cake. Pudding bear claw chocolate muffin fruitcake tiramisu. Chocolate cake cookie souffl&eacute; powder pastry cookie. Cake cotton candy cheesecake jelly-o sweet roll. Icing marzipan croissant bonbon chocolate cake brownie pie. Tiramisu bear claw tootsie roll jelly oat cake chocolate bar marshmallow fruitcake wafer.\r\n\r\nSouffl&eacute; donut bear claw bear claw halvah tootsie roll gummi bears carrot cake candy. Sweet roll donut marzipan. Chocolate bear claw fruitcake candy bear claw jelly-o macaroon donut. Gummies ice cream brownie. Marshmallow gummies sugar plum bear claw ice cream sweet toffee. Jujubes toffee jelly beans oat cake gummi bears muffin. Lemon drops fruitcake muffin apple pie. Cake halvah croissant cake drag&eacute;e cake souffl&eacute; toffee pie. Souffl&eacute; muffin powder cookie cheesecake cupcake sweet. Sweet brownie cotton candy wafer. Apple pie halvah chupa chups biscuit cotton candy caramels marzipan pudding macaroon. Danish marshmallow oat cake candy tart.\r\n\r\nChupa chups c', 'f59cc254890912c641a201d73da42959_view_l.jpg', '2016-06-03 16:16:59'),
(3, 2, 2, 'Domaci rostilj', 'Icing caramels bear claw macaroon. Cake apple pie oat cake tart apple pie biscuit. Dessert lemon drops souffl&eacute; chupa chups fruitcake pie. Croissant sugar plum bear claw toffee gummies. Powder fruitcake drag&eacute;e pudding pastry danish pastry pastry. Toffee cheesecake cheesecake jujubes souffl&eacute; sugar plum croissant bonbon bonbon. Gingerbread oat cake dessert jelly beans drag&eacute;e. Candy canes gummies macaroon ice cream cookie cotton candy oat cake. Powder tart jelly beans jujubes jelly-o. Tart powder ice cream tootsie roll. Tootsie roll sugar plum gummies powder souffl&eacute; marzipan croissant powder tart. Gummi bears donut chocolate bar fruitcake candy canes. Jujubes pie wafer pastry candy sweet souffl&eacute;.\r\n\r\nJelly macaroon dessert fruitcake powder chocolate lemon drops bear claw. Apple pie topping fruitcake lollipop. Jelly-o powder marzipan biscuit jelly. Lemon drops candy chupa chups. Danish chocolate cake sugar plum tart chocolate cake. Carrot cake marzipan lemon drops. Toffee chocolate bar gingerbread gummi bears donut jujubes. Cake candy canes muffin sugar plum jelly-o toffee pudding fruitcake. Fruitcake pudding dessert biscuit halvah danish chocolate bar. Sugar plum liquorice tootsie roll. Lollipop halvah caramels icing sugar plum tootsie roll ice cream marzipan. Muffin sugar plum gummi bears halvah jelly tart cookie. Candy donut cookie candy dessert tart lollipop sesame snaps.', 'rostilj.jpg', '2016-06-03 17:07:53'),
(4, 2, 2, 'Skusa na rostilju', 'Souffl&eacute; cupcake cotton candy toffee. Chupa chups chupa chups icing ice cream chocolate cake jujubes chocolate cake. Gummi bears sweet tart wafer jelly beans. Jujubes sesame snaps wafer liquorice. Brownie tart bear claw bear claw oat cake. Candy pastry sugar plum cake sweet gummies marshmallow bear claw. Cheesecake biscuit macaroon caramels biscuit. Tiramisu dessert cake lemon drops cotton candy gingerbread halvah macaroon. Macaroon sweet cotton candy lemon drops toffee biscuit souffl&eacute; biscuit. Marshmallow bonbon apple pie dessert biscuit. Halvah tiramisu tiramisu pie halvah. Tootsie roll pudding macaroon sesame snaps marshmallow. Cake gingerbread liquorice gummi bears gingerbread danish.\r\n\r\nBear claw marzipan marshmallow gummi bears gummi bears jujubes brownie. Ice cream lollipop gummi bears. Donut marzipan fruitcake candy chupa chups cotton candy chocolate cake tiramisu. Dessert drag&eacute;e cheesecake chocolate bar cake muffin. Danish cotton candy gummi bears bear claw chocolate cake pastry jujubes powder cupcake. Tart caramels bonbon gummi bears topping pudding cupcake candy. Marzipan tart marshmallow bear claw tiramisu lemon drops biscuit. Tiramisu liquorice sesame snaps danish. Dessert topping toffee jelly caramels carrot cake. Chocolate souffl&eacute; cake. Wafer chupa chups cotton candy carrot cake icing caramels jelly beans. Jujubes gingerbread cotton candy cake sugar plum sweet cookie caramels.', '6394800.jpg', '2016-06-03 19:23:50'),
(5, 10, 2, 'Pekinsa patka', 'Jujubes biscuit lollipop cake candy biscuit bonbon sugar plum. Cookie chocolate bar biscuit croissant candy pie tart gummi bears topping. Marzipan biscuit sugar plum oat cake gummies donut lemon drops. Croissant caramels bear claw cake. Pudding chocolate cake pastry jujubes macaroon biscuit tart cake. Halvah liquorice oat cake jelly tootsie roll lemon drops. Chupa chups gummies jelly beans jelly-o ice cream tart biscuit caramels drag&eacute;e. Cotton candy tootsie roll muffin fruitcake fruitcake cupcake ice cream brownie tiramisu. Icing lemon drops jelly. Souffl&eacute; sugar plum candy canes. Biscuit chocolate cake macaroon chocolate cake. Lemon drops tart topping chocolate cake pastry cake jelly. Sweet cheesecake fruitcake. Liquorice icing marzipan fruitcake pie brownie sugar plum.\r\n\r\nWafer chupa chups sweet roll marshmallow. Lemon drops bonbon jelly beans lemon drops pastry jelly gummies. Cake topping jujubes cheesecake powder cupcake. Topping gummi bears chocolate cake cupcake carrot cake ice cream cotton candy. Sesame snaps cotton candy cake cheesecake. Chupa chups pudding jujubes lemon drops cake ice cream. Sugar plum ice cream lollipop chocolate bar marshmallow souffl&eacute; chocolate cake. Oat cake sugar plum sesame snaps fruitcake cake dessert chocolate bar. Carrot cake oat cake gummies cupcake pastry chocolate bar jujubes. Cake sweet roll marzipan topping bear claw jelly-o carrot cake drag&eacute;e cupcake. Danish macaroon marzipan. Chocolate bar chocolate sesame snaps pie.', 'PekinskaPatka123.jpeg', '2016-06-05 14:18:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recepies`
--
ALTER TABLE `recepies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `recepies`
--
ALTER TABLE `recepies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
