-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 22-07-29 05:56
-- 서버 버전: 10.4.22-MariaDB
-- PHP 버전: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `conference`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `building`
--

CREATE TABLE `building` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `building`
--

INSERT INTO `building` (`id`, `name`, `address`) VALUES
(1, '하이하이하이', '초량데스'),
(2, '루루룰라랄', '룰루룰룰룰룰룰ㄹ');

-- --------------------------------------------------------

--
-- 테이블 구조 `meeting_room`
--

CREATE TABLE `meeting_room` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `price` int(255) NOT NULL DEFAULT 0,
  `building_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `meeting_room`
--

INSERT INTO `meeting_room` (`id`, `name`, `comment`, `img`, `price`, `building_id`) VALUES
(1, '200호', '간지데스', 'https://th.bing.com/th/id/OIP.PkKYceR5-WvkxOF73ay9zQHaE_?w=257&h=180&c=7&r=0&o=5&pid=1.7', 20000, 1),
(2, '202호', '여기는 장송하 ', 'https://th.bing.com/th/id/OIP.V8pot_amr6rituCCcc_K9gHaE6?w=261&h=180&c=7&r=0&o=5&pid=1.7', 50000, 1),
(3, '300호', 'ㅇㄹㅇㄹㅇㄹㅇㄹㅇㄹㅇㄹ', 'https://th.bing.com/th/id/OIP.WzidS6wE0ywIeXNd5NB0zAHaE7?w=267&h=180&c=7&r=0&o=5&pid=1.7', 5500, 2),
(4, '3003호', 'ㄹ윯ㅇㄹㅇㅍㄴㅇ뮨ㅇㅁ', 'https://th.bing.com/th/id/OIP.8jYASlNW5wsm6qf5LF9jLgHaHa?w=177&h=180&c=7&r=0&o=5&pid=1.7', 12321312, 2);

-- --------------------------------------------------------

--
-- 테이블 구조 `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `start_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `metting_room_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `grade` enum('default','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `grade`) VALUES
(1, '장송하', '01011111292229', 'admin'),
(2, '이충직', '101010101011', 'default');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `meeting_room`
--
ALTER TABLE `meeting_room`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `building`
--
ALTER TABLE `building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 테이블의 AUTO_INCREMENT `meeting_room`
--
ALTER TABLE `meeting_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
