-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017 年 9 月 24 日 14:49
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Gs_db37_kadai7`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `productList`
--

CREATE TABLE IF NOT EXISTS `productList` (
`id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(12) NOT NULL,
  `imageUrl` text COLLATE utf8_unicode_ci NOT NULL,
  `score` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `productList`
--

INSERT INTO `productList` (`id`, `name`, `price`, `imageUrl`, `score`) VALUES
(1, 'レゴ (LEGO) クラシック 黄色のアイデアボックス', 4447, 'https://images-na.ssl-images-amazon.com/images/I/91nmXqdQiBL._SX522_.jpg', 2.6),
(2, 'レゴ(LEGO)パイレーツオブカリビアン サイレント・メアリー号', 25025, 'https://images-na.ssl-images-amazon.com/images/I/91F6nB8QXkL._SX522_.jpg', 3.5),
(3, 'レゴ (LEGO) デュプロ みどりのコンテナスーパーデラックス', 4063, 'https://images-na.ssl-images-amazon.com/images/I/91HSzKeOAML._SX522_.jpg', 3.5);

-- --------------------------------------------------------

--
-- テーブルの構造 `review`
--

CREATE TABLE IF NOT EXISTS `review` (
`id` int(12) NOT NULL,
  `targetProduct` int(12) NOT NULL,
  `score` int(1) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `review`
--

INSERT INTO `review` (`id`, `targetProduct`, `score`, `time`) VALUES
(1, 1, 5, '2017-09-24 15:04:22'),
(2, 2, 4, '2017-09-24 15:04:22'),
(3, 3, 3, '2017-09-24 15:04:22'),
(4, 3, 5, '2017-09-24 16:40:28'),
(5, 2, 4, '2017-09-24 17:07:01'),
(6, 2, 1, '2017-09-24 17:08:09'),
(7, 2, 5, '2017-09-24 17:36:30'),
(8, 3, 1, '2017-09-24 17:37:29'),
(9, 1, 1, '2017-09-24 17:39:52'),
(10, 1, 1, '2017-09-24 17:43:25'),
(44, 1, 1, '2017-09-24 21:20:39'),
(45, 1, 5, '2017-09-24 21:21:19'),
(46, 3, 5, '2017-09-24 21:22:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productList`
--
ALTER TABLE `productList`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productList`
--
ALTER TABLE `productList`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
