-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2024 at 04:09 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci3ukk`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getKategori` (IN `param` VARCHAR(255))   BEGIN
    IF param IS NULL OR param = '' THEN
        SELECT * FROM kategori;
    ELSE
        CASE param
            WHEN 'deskripsi' THEN
                SELECT deskripsi FROM kategori;
            WHEN 'kategori' THEN
                SELECT kategori FROM kategori;
            WHEN 'id' THEN
                SELECT id FROM kategori;
            ELSE
                SELECT * FROM kategori;
        END CASE;
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tesKategori` ()   BEGIN
    select * from kategori;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `gettesKategori` () RETURNS TEXT CHARSET utf8mb4 COLLATE utf8mb4_general_ci READS SQL DATA BEGIN
    DECLARE result TEXT;
    SELECT GROUP_CONCAT(column_name SEPARATOR ', ') INTO result FROM kategori;
    RETURN result;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `ketKategori` (`kat` VARCHAR(4)) RETURNS VARCHAR(30) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN

 IF kat = 'M' THEN
   return  "Modal Barang";
 ELSEIF kat="A" THEN
   RETURN  "Alat";
 ELSEIF kat="BHP" THEN
   RETURN  "Bahan Habis Pakai";
 ELSEIF kat="BTHP" THEN
   RETURN  "Bahan Tidak Habis Pakai";
 END IF;

END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `ketKategorik` (`kat` VARCHAR(4)) RETURNS VARCHAR(30) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN

 IF kat = 'M' THEN
   return  "Modal Barang";
 ELSEIF kat="A" THEN
   RETURN  "Alat";
 ELSEIF kat="BHP" THEN
   RETURN  "Bahan Habis Pakai";
 ELSEIF kat="BTHP" THEN
   RETURN  "Bahan Tidak Habis Pakai";
 END IF;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `seri` varchar(50) DEFAULT NULL,
  `spesifikasi` text DEFAULT NULL,
  `stok` smallint(6) NOT NULL DEFAULT 0,
  `kategori_id` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barangkeluar`
--

CREATE TABLE `barangkeluar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_keluar` date NOT NULL,
  `qty_keluar` smallint(6) NOT NULL DEFAULT 1,
  `barang_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `barangkeluar`
--
DELIMITER $$
CREATE TRIGGER `barang_undo_stokdel` BEFORE DELETE ON `barangkeluar` FOR EACH ROW BEGIN
    UPDATE barang
    SET barang.stok = barang.stok + OLD.qty_keluar
    WHERE barang.id = OLD.barang_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `edit_kurangi_stok` AFTER UPDATE ON `barangkeluar` FOR EACH ROW BEGIN
    UPDATE barang SET barang.stok = barang.stok - (NEW.qty_keluar - OLD.qty_keluar) WHERE barang.id = NEW.barang_id; 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kurangi_stok` AFTER INSERT ON `barangkeluar` FOR EACH ROW BEGIN
    UPDATE barang SET barang.stok = barang.stok - NEW.qty_keluar WHERE barang.id = NEW.barang_id; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barangmasuk`
--

CREATE TABLE `barangmasuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_masuk` date NOT NULL,
  `qty_masuk` smallint(6) NOT NULL DEFAULT 1,
  `barang_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `barangmasuk`
--
DELIMITER $$
CREATE TRIGGER `barang_undo_stokdelete` BEFORE DELETE ON `barangmasuk` FOR EACH ROW BEGIN
    UPDATE barang
    SET barang.stok = barang.stok - OLD.qty_masuk
    WHERE barang.id = OLD.barang_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `edit_tambah_stok` AFTER UPDATE ON `barangmasuk` FOR EACH ROW BEGIN
    UPDATE barang SET barang.stok = barang.stok + (NEW.qty_masuk - OLD.qty_masuk) WHERE barang.id = NEW.barang_id; 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_stok` AFTER INSERT ON `barangmasuk` FOR EACH ROW BEGIN
    UPDATE barang SET barang.stok = barang.stok + NEW.qty_masuk WHERE barang.id = NEW.barang_id; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `kategori` enum('M','A','BHP','BTHP') NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `barangkeluar`
--
ALTER TABLE `barangkeluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangkeluar_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangmasuk_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barangkeluar`
--
ALTER TABLE `barangkeluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `barangkeluar`
--
ALTER TABLE `barangkeluar`
  ADD CONSTRAINT `barangkeluar_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`);

--
-- Constraints for table `barangmasuk`
--
ALTER TABLE `barangmasuk`
  ADD CONSTRAINT `barangmasuk_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
