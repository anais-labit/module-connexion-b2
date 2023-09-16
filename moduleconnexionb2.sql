-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 16, 2023 at 04:38 PM
-- Server version: 10.6.12-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moduleconnexionb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `firstname`, `lastname`, `password`, `role`) VALUES
(101, 'fffffff', 'dud', 'dud', '$2y$10$26fKWNrBWf61X7bH7vg9WO6MLxl9eEMFxyfrw35eVxjG9bUxBM9Zy', NULL),
(102, 'ffffffff', 'dud', 'dud', '$2y$10$8dr1Yi0CtlP8yCe0I8MZ2uJsZh2pTfNPtFHwwRMX7A3xFb5kwUYgS', NULL),
(103, 'fffffffffffffffffffffffffffff', 'dud', 'dud', '$2y$10$1l.mGOCpJsle.BNnc1jINOofPK2AmdwwEIBIXULPdmyMLzWOKYEgK', NULL),
(106, 'ddd', 'Ll', 'Lluuuuu', '$2y$10$3C0bC7NjdDBJ92GhCeWOz.F1pCbi0exgj46LXzbZ0RZ9RDby2/3xK', NULL),
(108, 'llll', 'll', 'll', '$2y$10$hqpD.YGG0onnSaBLTMbJB.9kLLvE7wsMXqvMHaAKABwci5cW3zomK', NULL),
(110, 'admiN1337$', 'admiN1337$', 'admiN1337$', '$2y$10$yDoPKSSE7ft4WNUafdktieTCV1pdHhiE/pT79bRiHeR44nSyCejFG', 1),
(112, 'bbbbbbbbbb', 'dudu', 'duduuu', '$2y$10$ySvkGLEMv7TCix0iQdO1Huhy4bOaApCb.dSO5JfWMwKgEI5l628aa', 2),
(113, 'coucou', 'coucou', 'ooooff', '$2y$10$koT/qVQdy4E7jtHwWq8j5uCI2TH5u0KKHV5PmqC.vjLgmGyOprT2S', 2),
(126, 'rr', 'rr', 'rr', '$2y$10$46jvIzuPDm0Fmns8BrjEh.BM/rd0ij0DtbSCPNzmL7zOb33YE3XRa', 2),
(138, 'tt', 'Tt', 'Tta', '$2y$10$zpkAwSspGmVeUVDz05skLOtMuJaJ2xrm55OjI.sltlUPh29f4/Xba', 2),
(141, 'bb', 'Bb', 'Bbaaaaaaarr', '$2y$10$UVy6jZ/7nedsDWx1oVeFW.uDtIDWgTZfUgZCTnQyH5YSa//quiL/m', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
