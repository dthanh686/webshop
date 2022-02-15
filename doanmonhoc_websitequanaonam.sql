-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 15, 2021 at 10:24 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doantotnghiep_phpthuan_quanaonam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` char(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phone`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Tôi là Admin', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0123456789', 4, '2017-05-12 09:25:39', '2017-05-12 09:25:39'),
(2, 'Đỗ Việt Anh', 'dovietanh@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0986420994', 1, '2017-05-12 08:09:11', '2017-05-12 08:09:11'),
(4, 'Đỗ Gia Tùng', 'tunggia@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0986541230', 1, '2017-05-12 09:43:31', '2017-05-12 09:43:31'),
(5, 'Phan Trung Phú', 'trungphu150994@gmail.com', '25f9e794323b453885f5181f1b624d0b', '13409676756', 4, '2017-05-12 09:50:28', '2019-11-01 13:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thunbar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` tinyint(4) DEFAULT '0',
  `phone` char(14) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL,
  `id_auth` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`name`, `email`, `password`, `address`, `thunbar`, `level`, `phone`, `created_at`, `updated_at`, `id`, `id_auth`) VALUES
('Nguyễn Văn A', 'nguyenvana@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Xóm 3 Quỳnh Ngọc Quỳnh Lưu Nghệ An', NULL, 0, '0987654321', '2017-04-26 21:32:46', '2017-04-26 21:32:46', 1, NULL),
('admin', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Hà Nội', NULL, 2, NULL, '2017-04-26 22:01:10', '2017-04-26 22:01:10', 2, NULL),
('Linh Chi', 'linhchi@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Hà Nội', NULL, 0, '0987654321', '2017-04-29 14:08:46', '2017-04-29 14:08:46', 3, NULL),
('Linh CHi Nguyễn', 'nguyenlinhchi@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Hà Nội', NULL, 0, '1234567890', '2017-04-29 14:11:30', '2017-04-29 14:11:30', 4, NULL),
('Nguyễn Văn B', 'nguyenvandd@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Hà Nội', NULL, 0, '0987654321', '2017-04-30 07:03:52', '2017-04-30 07:03:52', 5, NULL),
('vanb', 'vanb@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Hà Nội', NULL, 0, '12345678', '2017-05-01 15:26:55', '2017-05-01 15:26:55', 6, NULL),
('Thu Hiền', 'thuhien@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'TP HCM', NULL, 0, '0123456789', '2017-05-12 16:22:55', '2017-05-12 16:22:55', 8, NULL),
('TrungPhuNA', 'phupt.humg.94@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Ngách 138, Số nhà 62', NULL, 0, '0986420994', '2019-11-01 13:20:20', '2019-11-01 13:20:20', 9, NULL),
('Nguyễn Văn A', 'nguyenvana@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Tây Mỗ - Hà Nội', '12.jpeg', 0, '0987654321', '2019-11-01 19:52:52', '2019-11-01 19:52:52', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `donhang_id` int(11) DEFAULT NULL,
  `sanpham_id` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`donhang_id`, `sanpham_id`, `soluong`, `gia`, `hinhanh`, `id`) VALUES
(6, 10, 1, 12870000, 'OM-D_E-M5_Mark_II__kit_14-150mm_II_zSop_-_003.jpg', 1),
(7, 9, 1, 24500000, 'May_anh_Canon_EOS_5D_Mark_IV_kit__24-70mm__F4L__IS__USM_001.jpg', 2),
(7, 8, 1, 1862000, 'OM-D_E-M5_Mark_II__kit_14-150mm_II_zSop_-_003.jpg', 3),
(8, 7, 1, 5194000, '892349.jpg', 4),
(9, 8, 1, 1862000, 'OM-D_E-M5_Mark_II__kit_14-150mm_II_zSop_-_003.jpg', 5),
(9, 11, 1, 1176000, 'May_quay_GoPro_Hero5__Black_001.jpg', 6),
(9, 4, 1, 1425000, 'a1.jpg', 7),
(13, 10, 1, 12870000, 'OM-D_E-M5_Mark_II__kit_14-150mm_II_zSop_-_003.jpg', 8),
(13, 12, 1, 24000, 'Ong_kinh_Canon_EF_135mm_F2L_USM_001_m7h6-oq.jpg', 9),
(14, 11, 1, 1176000, 'May_quay_GoPro_Hero5__Black_001.jpg', 10),
(14, 12, 1, 24000, 'Ong_kinh_Canon_EF_135mm_F2L_USM_001_m7h6-oq.jpg', 11),
(14, 13, 2, 297000, 'Ong_kinh_Canon_EF_100mm_F2_usm_001.jpg', 12),
(14, 14, 1, 306000, 'Ong_kinh_Canon_EF_28-300mm_F3.5-5.6_001.jpg', 13),
(15, 7, 1, 5194000, '892349.jpg', 14),
(16, 11, 1, 1176000, 'May_quay_GoPro_Hero5__Black_001.jpg', 15),
(16, 10, 1, 12870000, 'OM-D_E-M5_Mark_II__kit_14-150mm_II_zSop_-_003.jpg', 16),
(17, 3, 1, 2700000, '2-min-ec90c621-6a0a-4e23-a2d4-58a4391b3444.jpg', 17),
(18, 7, 2, 5194000, '12-min-0ea01181-833e-44a2-b159-e74819794d38.jpg', 18),
(18, 14, 2, 306000, '9-ea248091-e5bd-4e3f-986a-acfb2db000a4.jpg', 19),
(19, 14, 1, 306000, '9-ea248091-e5bd-4e3f-986a-acfb2db000a4.jpg', 20),
(19, 13, 1, 297000, '13-min.jpg', 21),
(12, 14, 1, 306000, '9-ea248091-e5bd-4e3f-986a-acfb2db000a4.jpg', 22),
(13, 11, 2, 1764000, 'giay-vai-nam-pettino-gv01-trang-3697-2457893-cb6fdc5a3d4657c77e487b67380c4df4-webp-catalog_233.jpg', 23),
(14, 5, 1, 186200, 'giay-jean-nam-xanh-jean-1871-5322872-1c9138ecb6127a9c3325bbf8dcef2c76-webp-catalog_233.jpg', 24),
(14, 9, 1, 24500000, 'giay-nam-dep-2017-gv02-trang-3866-0298554-8027bc8b77072ed24f12bc270db46df8-webp-catalog_233.jpg', 25),
(14, 38, 1, 247500, 'UOUdSW_simg_b5529c_250x250_maxb.jpg', 26),
(14, 37, 1, 376200, '2d8f74_simg_b5529c_250x250_maxb.jpg', 27),
(15, 38, 1, 247500, 'UOUdSW_simg_b5529c_250x250_maxb.jpg', 28),
(15, 33, 1, 384000, '53c1dc_simg_b5529c_250x250_maxb.jpg', 29),
(16, 101, 1, 800000, 'J9p2gK_simg_b5529c_250x250_maxb.jpg', 30),
(16, 88, 1, 432000, 'NfjymX_simg_b5529c_250x250_maxb.png', 31),
(16, 4, 1, 1425000, 'giay-bot-da-lon-thoi-trang-zapas-gb090-mau-den-9547-2380581-76df311417869ffbc3456d85b4b7c10d-webp-catalog_233.jpg', 32),
(16, 6, 1, 120000, 'giay-bot-da-lon-buoc-day-zapas-gb082-mau-nau-2718-0930581-cfd293ea579a46783f424371c49c579b-webp-catalog_233.jpg', 33),
(17, 4, 1, 1425000, 'giay-bot-da-lon-thoi-trang-zapas-gb090-mau-den-9547-2380581-76df311417869ffbc3456d85b4b7c10d-webp-catalog_233.jpg', 34),
(18, 108, 2, 552000, 'c6D7Zm_simg_b5529c_250x250_maxb.jpg', 35),
(18, 107, 1, 392000, '8.jpg', 36),
(18, 2, 2, 196000, '5-min-a34571b3-bd89-418a-99f3-09cac3f32a04.jpg', 37),
(18, 15, 7, 1800000, 'xuong-cung-cap-mua-ban-buon-giay-dep-nam-nu-si-dep-gia-re-tphcm-1.jpg', 38),
(19, 110, 1, 13000, 'giay.png', 39),
(19, 15, 7, 1800000, 'xuong-cung-cap-mua-ban-buon-giay-dep-nam-nu-si-dep-gia-re-tphcm-1.jpg', 40),
(20, 106, 3, 297000, '7.jpg', 41),
(20, 109, 3, 384000, '9.jpg', 42),
(21, 4, 1, 1425000, 'giay-bot-da-lon-thoi-trang-zapas-gb090-mau-den-9547-2380581-76df311417869ffbc3456d85b4b7c10d-webp-catalog_233.jpg', 43),
(21, 6, 1, 120000, 'giay-bot-da-lon-buoc-day-zapas-gb082-mau-nau-2718-0930581-cfd293ea579a46783f424371c49c579b-webp-catalog_233.jpg', 44),
(21, 12, 1, 240000, '9-min.jpg', 45),
(22, 4, 4, 1425000, 'giay-bot-da-lon-thoi-trang-zapas-gb090-mau-den-9547-2380581-76df311417869ffbc3456d85b4b7c10d-webp-catalog_233.jpg', 46),
(22, 6, 3, 120000, 'giay-bot-da-lon-buoc-day-zapas-gb082-mau-nau-2718-0930581-cfd293ea579a46783f424371c49c579b-webp-catalog_233.jpg', 47),
(22, 110, 3, 13000, 'giay.png', 48),
(22, 109, 3, 384000, '9.jpg', 49),
(23, 109, 11, 384000, '9.jpg', 50),
(23, 104, 1, 400000, '2.jpg', 51),
(24, 109, 1, 384000, '9.jpg', 52),
(25, 109, 1, 384000, '9.jpg', 53),
(26, 109, 2, 384000, '9.jpg', 54),
(27, 110, 1, 13000, 'giay.png', 55),
(27, 7, 1, 5194000, '12-min-0ea01181-833e-44a2-b159-e74819794d38.jpg', 56),
(27, 19, 2, 400000, 'KiLMBe_simg_b5529c_250x250_maxb.jpg', 57),
(28, 110, 1, 13000, 'giay.png', 58),
(29, 110, 1, 13000, 'giay.png', 59),
(30, 7, 1, 5194000, '12-min-0ea01181-833e-44a2-b159-e74819794d38.jpg', 60),
(31, 105, 1, -108000, '3.jpg', 61),
(32, 105, 1, -108000, '3.jpg', 62),
(33, 115, 1, 392000, '8ts20a005-sy091-2-thumb-.jpg', 63);

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `yes` int(11) DEFAULT '0',
  `no` int(11) DEFAULT '0',
  `sum` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhgia`
--

INSERT INTO `danhgia` (`yes`, `no`, `sum`, `created_at`, `id`) VALUES
(9, 6, 15, '2017-04-29 05:28:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `tendanhmuc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `danhmuccha_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`tendanhmuc`, `slug`, `hinhanh`, `danhmuccha_id`, `created_at`, `updated_at`, `id`) VALUES
('Áp phông', 'ap-phong', NULL, 0, '2017-04-21 13:31:23', '2021-03-10 23:18:24', 1),
('Áo len', 'ao-len', NULL, 0, '2017-04-21 13:31:47', '2021-03-10 23:18:35', 2),
('Áo sơ mi', 'ao-so-mi', NULL, 0, '2017-04-21 13:50:51', '2021-03-10 23:18:41', 3),
('Áo phông trơn', 'ao-phong-tron', NULL, 1, '2017-04-21 14:16:25', '2021-03-10 23:19:04', 5),
('Sơ mi nam dài tay', 'so-mi-nam-dai-tay', NULL, 3, '2017-04-21 14:17:47', '2021-03-10 23:20:50', 6),
('Sơ mi nam ngắn tay', 'so-mi-nam-ngan-tay', NULL, 3, '2017-04-25 08:20:20', '2021-03-10 23:20:58', 7),
('Áo phông cổ tròng', 'ao-phong-co-trong', NULL, 1, '2017-04-29 13:54:30', '2021-03-10 23:19:11', 8),
('Áo phông mới', 'ao-phong-moi', NULL, 1, '2017-04-29 13:57:56', '2021-03-10 23:19:25', 9),
('Áo len cổ tròn', 'ao-len-co-tron', NULL, 2, '2017-05-01 16:31:01', '2021-03-10 23:19:42', 12),
('Áo len lọ lem', 'ao-len-lo-lem', NULL, 2, '2017-05-01 16:31:25', '2021-03-10 23:19:49', 13),
('Áo len lông cúc', 'ao-len-long-cuc', NULL, 2, '2017-05-09 07:31:21', '2021-03-10 23:20:33', 15);

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `ten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodienthoai` char(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tongtien` int(11) DEFAULT NULL,
  `loai` tinyint(4) NOT NULL DEFAULT '1',
  `noidung` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trangthai` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`ten`, `diachi`, `sodienthoai`, `email`, `tongtien`, `loai`, `noidung`, `trangthai`, `created_at`, `updated_at`, `id`) VALUES
('Nguyễn Văn A', 'Quốc Oai Hà Nội', '0986420364', 'nguyenvana@gmail.com', 37370000, 1, 'Giao hàng tại nhà', 0, '2017-04-25 21:36:29', '2017-04-25 21:36:29', 1),
('Nguyễn Văn B', 'Xóm 3 Quỳnh Ngọc Quỳnh Lưu Nghệ An', '0123456789', 'nguyenvanb@gmail.com', 26362000, 1, 'Giao tận nhà khi đi mang theo tiền lẻ', 1, '2017-04-25 21:38:16', '2017-04-25 18:31:28', 2),
('Nguyễn Văn C', 'Thanh Oai hà Nội', '012345678', 'nguyenvanc@gmail.com', 5194000, 1, 'Giao hàng tận nhà', 1, '2017-04-25 23:34:57', '2017-04-25 18:35:30', 3),
('Nguyễn Văn DX', 'Hải Hậu Nam Định', '09876543210', 'nguyenvand@gmail.com', 4463000, 1, 'Giao hàng tận nơi ', 1, '2017-04-27 13:49:04', '2017-04-27 08:50:16', 4),
('Nguyễn Văn DD', 'Hà Nội', '0987654321', 'nguyenvandd@gmail.com', 12894000, 1, 'ok', 0, '2017-04-27 18:42:28', '2017-04-27 18:42:28', 5),
('Nguyễn Văn P', 'Hoàng Mai - Hà Nội', '1234567890', 'nguyenvanp@gmail.com', 2100000, 1, 'giao hàng tận nơi', 0, '2017-04-27 18:43:44', '2017-04-27 18:43:44', 6),
('Nguyễn Văn BBBB', 'Hải Dương', '0987654321', 'nguyenvandd@gmail.com', 5194000, 1, 'Giao hàng tại nhà', 1, '2017-04-28 22:57:58', '2017-04-28 17:58:14', 7),
('Nguyễn Trần ABC', 'Hà Nội City', '0987654321', 'nguyentranadb@gmail.com', 14046000, 1, 'Tốt', 1, '2017-04-29 12:30:55', '2017-04-29 07:31:17', 8),
('Nguyễn Văn L ', 'Hà Nội', '0987654321', 'nguyenvanl@gmail.com', 2700000, 1, 'Tốt', 0, '2017-04-29 14:07:34', '2017-04-29 14:07:34', 9),
('Nguyễn Linh Chi', 'Hà Nội', '12345890', 'nguyenlinhci@gmail.com', 11000000, 1, 'OK', 1, '2017-04-29 14:12:31', '2017-04-29 09:13:42', 10),
('Test DDD', 'Hà Nội', '0987121245', 'test@gmail.com', 603000, 1, 'OK giao hàng tận nơi', 1, '2017-04-30 07:07:43', '2017-04-30 02:08:04', 11),
('Pham linh chi', 'OK', '1234578', 'Dongphuongkygiai_95@yahoo.com', 306000, 1, 'OK', 1, '2017-05-01 15:26:12', '2017-05-01 10:26:23', 12),
('chi', 'thanh hoa', '87654321', 'abc@gmail.com', 3528000, 1, 'ok', 0, '2017-05-02 04:06:39', '2017-05-02 04:06:39', 13),
('Pham thi linh chi', 'Yen hoa', '87654321', 'linhchi@gmail.com', 25309900, 1, 'Hjghn', 0, '2017-05-09 06:27:18', '2017-05-09 06:27:18', 14),
('Pham thi linh chi', 'yen hoa', '87654321', 'linhchi@gmail.com', 631500, 1, 'dfgg', 0, '2017-05-09 06:29:59', '2017-05-09 06:29:59', 15),
('Pham thi linh chi', 'Yen hoa', '02936558', 'linhchi@gmail.com', 2777000, 1, '23', 0, '2017-05-11 07:31:07', '2017-05-11 07:31:07', 16),
(' Code thuê đồ án CNTT - Website php mysql', 'ad', '123456789', 'phupt.humg.94@gmail.com', 1425000, 1, 'ad', 0, '2017-05-11 22:14:12', '2017-05-11 22:14:12', 17),
('Trung PHus NA', ' Nghệ AN', '0986420994', 'trungphu150994@gmail.com', 13039200, 1, 'OK', 1, '2017-05-12 07:00:31', '2017-05-12 02:01:16', 18),
('Phan Trung Phú', 'Xóm 3 Quỳnh Ngọc Quỳnh Lưu Nghệ An', '0986420994', 'trungphu150994@gmail.com', 11351700, 1, 'OK', 1, '2017-05-12 16:26:46', '2017-05-12 11:26:58', 19),
('Nguyễn Hoàng Anh', 'Hà Nội', '0987654321', 'hoanganh@gmail.com', 2043000, 1, 'Giao hàng thành công', 1, '2017-05-12 19:49:26', '2017-05-12 14:50:19', 20),
('Hoàng Văn Thọ', 'Nghệ An', '0987655121', 'hoangvantho@gmail.com', 1785000, 1, 'ok', 0, '2017-05-12 20:26:58', '2017-05-12 20:26:58', 21),
('Nguyễn Linh Chi', 'Xóm 3 Quỳnh Ngọc Quỳnh Lưu Nghệ An', '0987121245', 'nguyenlinhchi@gmail.com', 7105980, 1, ' Hà Nội', 0, '2017-05-12 20:33:24', '2017-05-12 20:33:24', 22),
('Trung Phu NA', 'Ngách 138, Số nhà 62', '0986420994', 'phupt.humg.94@gmail.com', 4624000, 1, 'Nội dung', 0, '2019-11-01 13:19:26', '2019-11-01 13:19:26', 23),
('Trung Phu NA', 'Ngách 138, Số nhà 62', '0986420994', 'phupt.humg.94@gmail.com', 384000, 1, '1212121', 0, '2019-11-01 13:20:52', '2019-11-01 13:20:52', 24),
('Nguyễn Văn A', 'Ngách 138, Số nhà 62', '0986420994', 'nguyenvana@gmail.com', 384000, 1, 'Hà Nôi', 0, '2019-11-01 19:53:27', '2019-11-01 19:53:27', 25),
('Nguyễn Văn Dược', 'Xóm 9, Thôn Nội Thôn - Tây Đô - Hưng Hà', '0928817228', 'phupt.humg.94@gmail.com', 768000, 1, 'ok', 1, '2021-01-14 04:04:13', '2021-01-13 21:04:37', 26),
('Nguyễn Văn Dược', 'Xóm 9, Thôn Nội Thôn - Tây Đô - Hưng Hà', '0928817228', 'phupt.humg.94@gmail.com', 5886860, 1, '21212', 0, '2021-01-14 12:13:26', '2021-01-14 12:13:26', 27),
('Nguyễn Văn Dược', 'Xóm 9, Thôn Nội Thôn - Tây Đô - Hưng Hà', '0928817228', 'ngocnb94@gmail.com', 13000, 1, '2121', 0, '2021-01-14 12:15:27', '2021-01-14 12:15:27', 28),
('Nguyễn Văn Dược', 'Xóm 9, Thôn Nội Thôn - Tây Đô - Hưng Hà', '0928817228', 'ngocnb94@gmail.com', 13000, 1, '2121', 0, '2021-01-14 12:18:54', '2021-01-14 12:18:54', 29),
('Nguyễn Văn Dược', 'Xóm 9, Thôn Nội Thôn - Tây Đô - Hưng Hà', '0928817228', 'ngocnb94@gmail.com', 5090120, 1, '212121', 0, '2021-01-14 12:20:21', '2021-01-14 12:20:21', 30),
('Nguyễn Văn Dược', 'Xóm 9, Thôn Nội Thôn - Tây Đô - Hưng Hà', '0928817228', 'phupt.humg.94@gmail.com', -108000, 1, '12121', 0, '2021-01-14 12:20:54', '2021-01-14 12:20:54', 31),
('Nguyễn Văn Dược', 'Xóm 9, Thôn Nội Thôn - Tây Đô - Hưng Hà', '0928817228', 'phupt.humg.94@gmail.com', -108000, 1, '12121', 0, '2021-01-14 12:21:17', '2021-01-14 12:21:17', 32),
('adada adada', 'Ha noi', '0986420994', 'phu@gmail.com', 392000, 1, 'qưqwqwq', 1, '2021-03-11 12:10:10', '2021-03-11 05:10:22', 33);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `tenmenu` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vitri` tinyint(4) DEFAULT '0',
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`tenmenu`, `slug`, `vitri`, `id`) VALUES
('Giới thiệu', 'gioi-thieu.php', 0, 1),
('Địa chỉ', 'dia-chi.php', 0, 2),
('tin tức', 'tin-tuc.php', 0, 3),
('Đánh giá website', 'danh-gia-website.php', 0, 4),
('Liên hệ', 'lien-he.php', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `tennhacc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodienthoai` char(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`tennhacc`, `diachi`, `sodienthoai`, `email`, `created_at`, `updated_at`, `id`) VALUES
('Công ty Nam Hà', ' Thái Nguyên', '09865243246', 'samsung@gmail.com', '2017-04-26 00:31:59', '2017-04-26 00:31:59', 1),
('Công ty THHH Phúc Anh', '345 Cầu Giấy Hà Nội', '0321564896', 'phucanh@gmail.com', '2017-04-26 00:38:56', '2017-04-26 00:38:56', 2),
('Công ty THHH Hoàng Long', ' Ngách  56/34 số nhà 22 Phường Đức Thắng - Quận Bắc Từ Liêm - Hà Nội', '0986423562', 'hoanglong@gmail.com', '2017-04-26 00:47:26', '2017-04-26 00:47:26', 3),
('CTTNHH 1 thành viên', 'hà Nội', '0987654321', 'adminad@gmail.com', '2017-04-30 07:12:26', '2017-04-30 07:12:26', 4);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `tensanpham` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `danhmuc_id` int(11) DEFAULT NULL,
  `gia` int(11) DEFAULT '0',
  `soluong` int(11) DEFAULT '0',
  `giamgia` tinyint(4) NOT NULL DEFAULT '0',
  `hinhanh` varchar(255) DEFAULT NULL,
  `mota` text,
  `trangthai` varchar(255) DEFAULT NULL,
  `hot` tinyint(3) UNSIGNED DEFAULT '0',
  `yeuthich` int(11) DEFAULT '0',
  `nhacungcap_id` int(11) DEFAULT NULL,
  `gianhap` int(11) DEFAULT NULL,
  `pay` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL,
  `size` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`tensanpham`, `slug`, `danhmuc_id`, `gia`, `soluong`, `giamgia`, `hinhanh`, `mota`, `trangthai`, `hot`, `yeuthich`, `nhacungcap_id`, `gianhap`, `pay`, `created_at`, `updated_at`, `id`, `size`) VALUES
('ÁO PHÔNG NAM VẢI LACOSTE', 'ao-phong-nam-vai-lacoste', 5, 299000, 100, 0, '8ts21s003-sb015-m-1-.jpg', '<p>Đang cập nhật</p>\r\n', NULL, 0, 0, 1, 200000, 0, '2021-03-11 06:27:11', '2021-03-11 06:27:11', 111, 1),
('ÁO PHÔNG NAM COTTON USA', 'ao-phong-nam-cotton-usa', 5, 120000, 100, 2, '8ts21a004-sk010-m-1.jpg', '<p>&Aacute;O PH&Ocirc;NG NAM COTTON USA</p>\r\n', NULL, 0, 0, 1, 60000, 0, '2021-03-11 06:27:53', '2021-03-11 06:27:53', 112, 1),
('ÁO PHÔNG NAM CỔ TIM 100% COTTON', 'ao-phong-nam-co-tim-100-cotton', 5, 6, 200, 6, '8ts20a006-sa487-m-1.jpg', '<p>Giặt m&aacute;y chế độ nhẹ nh&agrave;ng, ở nhiệt độ thường.<br />\r\nKh&ocirc;ng sử dụng h&oacute;a chất tẩy c&oacute; chứa clo.<br />\r\nPhơi trong b&oacute;ng m&aacute;t<br />\r\nSấy th&ugrave;ng, chế độ nhẹ nh&agrave;ng.<br />\r\nL&agrave; ở nhiệt độ trung b&igrave;nh 150 độ C.<br />\r\nGiặt với sản phẩm c&ugrave;ng m&agrave;u.<br />\r\nKh&ocirc;ng l&agrave; l&ecirc;n chi tiết trang tr&iacute;</p>\r\n', NULL, 0, 0, 1, 230000, 0, '2021-03-11 06:29:06', '2021-03-11 06:29:06', 113, 1),
('Áo phông nam', 'ao-phong-nam', 5, 800000, 1, 2, '8ts20s017-sw001-1.jpg', '<p>&Aacute;o ph&ocirc;ng nam</p>\r\n', NULL, 1, 0, 1, 600000, 0, '2021-03-11 06:30:58', '2021-03-11 06:30:58', 114, 1),
('Áo phông nam 100%  trơn', 'ao-phong-nam-100-tron', 5, 400000, 21, 2, '8ts20a005-sy091-2-thumb-.jpg', '<p>Áo phông nam 100%  trơn</p>\r\n\r\n<p>Đang cập nhật</p>\r\n', NULL, 0, 0, 1, 20000, 1, '2021-03-11 06:33:05', '2021-03-11 06:33:05', 115, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `tieude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noidung` text COLLATE utf8_unicode_ci,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`tieude`, `noidung`, `hinhanh`, `created_at`, `updated_at`, `slug`, `id`) VALUES
('Đôi loafer da của Gigi Hadid có gì đặc biệt mà tới 10.000 người ', 'David Beckham không chỉ là \"Người đàn ông sexy nhất thế giới năm 2015\" mà anh còn nhiều lần thống trị các bảng xếp hạng quý ông mặc đẹp. Phong cách của anh có sự thay đổi linh hoạt theo từng địa điểm. Người ta rất khó bắt lỗi thời trang của ngài Beck bởi rất hiếm khi anh xuề xòa trong việc lựa chọn trang phục.\r\n\r\nMột trong những yếu tố tạo nên độ hoàn hảo cho mọi trang phục của David Beckham chính là những đôi giày. Lựa chọn giày dép phù hợp trang phục luôn là bài toán khó nhằn bậc nhất, không chỉ với phái mạnh mà ngay cả các quý cô sành điệu cũng hoang mang trường kỳ. Nhưng riêng với David Beckham thì có vẻ như mọi thứ quá dễ dàng, bởi trong bài phỏng vấn mới nhất, cựu danh thủ tiết lộ anh có đến hơn... 1000 đôi giày!\r\nTrong số 1.000 đôi giày đó có đủ loại mà mọi người đàn ông có thể hình dung đến: từ những đôi giày da lịch lãm, giày lười tiện dụng, giày sneaker khỏe khoắn... nhưng nhiều nhất lại là loại giày chuyên dụng để đá bóng. Điều này cũng chẳng mấy ngạc nhiên khi nghiệp túc cầu là đam mê lớn nhất đời của David Beckham.\r\n\r\nÔng bố 4 con còn tiết lộ rằng, mọi đôi giày đều được anh bảo quản kỹ lưỡng trong những chiếc hộp từ chính hãng. Dựa trên chi tiết này thì ắt không gian đựng giày dép của David Beckham hẳn phải to như một cửa hàng tạp hóa. Chưa kể, anh còn vui vẻ chia sẻ là số lượng giày của anh \"át\" hẳn tủ giày của cô vợ nổi tiếng - Victoria Beckham.', '5.jpg', '2017-05-10 03:58:49', '2017-05-10 03:58:49', 'doi-loafer-da-cua-gigi-hadid-co-gi-dac-biet-ma-toi-10000-nguoi', 8),
('Sau \"dép lau nhà\", Zara lại ra đôi dép nhựa hoa đỏ order về thể nào cũng khóc thét', 'Là thương hiệu thời trang bình dân hàng đầu thế giới, Zara luôn biết cách chiều lòng giới mộ điệu trong mọi khoản. Quần áo, giày dép, túi xách... có cả một thế giới mang tên Zara khiến chúng ta đắm chìm không dứt.\r\n\r\nThế nhưng cũng có đôi khi, Zara khiến ', 'gK4WeV_simg_b5529c_250x250_maxb.jpg', '2017-05-11 08:03:17', '2017-05-11 08:03:17', 'sau-dep-lau-nha-zara-lai-ra-doi-dep-nhua-hoa-do-order-ve-the-nao-cung-khoc-thet', 9),
(' Giày đẹp lắm  khỏi chê đi', '- Giá cả phải chăng \r\n-  Chất lượng đảm bảo \r\n-  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n-Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n-Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '7.jpg', '2017-05-11 08:14:23', '2017-05-11 08:14:23', 'giay-dep-lam-khoi-che-di', 10),
('Chọn giày thể thao cho gái đẹp', '<p>Gi&agrave;y thể thao đang l&agrave; phụ kiện kh&ocirc;ng thể thiếu trong tủ gi&agrave;y d&eacute;p của c&aacute;c bạn g&aacute;i. Những đ&ocirc;i gi&agrave;y thể thao với thiết kế đa dạng, nhiều m&agrave;u sắc thường được phái đẹp lựa chọn.&nbsp;Những đ&ocirc;i gi&agrave;y thể thao mang phong c&aacute;ch trẻ trung với gam m&agrave;u ngọt ng&agrave;o như cam, hồng, v&agrave;ng&hellip; thể hiện sự năng động nhưng kh&ocirc;ng k&eacute;m phần nữ t&iacute;nh cho ph&aacute;i đẹp. Gi&agrave;y thể thao kh&ocirc;ng chỉ đẹp về kiểu d&aacute;ng m&agrave; c&ograve;n tạo sự thoải m&aacute;i v&agrave; tiện lợi, lu&ocirc;n l&agrave; người bạn đồng h&agrave;nh kh&ocirc;ng thể thiếu của những c&ocirc; n&agrave;ng m&ecirc; thể thao. Trong tiết trời se lạnh, gi&agrave;y thể thao c&agrave;ng chứng tỏ được tầm quan trọng nhờ khả năng giữ ấm cho b&agrave;n ch&acirc;n. Với c&aacute;c gam m&agrave;u kẹo ngọt, c&aacute;c bạn nữ c&oacute; thể phối c&ugrave;ng với những bộ trang phục như v&aacute;y ngắn, &aacute;o thun, quần short t&ugrave;y &yacute;.</p>\r\n\r\n<p>Kh&ocirc;ng đơn thuần d&agrave;nh ri&ecirc;ng cho nam giới, những đ&ocirc;i gi&agrave;y thể thao với thiết kế đa dạng, phối nhiều m&agrave;u sắc kh&aacute;c nhau sẽ gi&uacute;p c&aacute;c bạn nữ nổi bật v&agrave; tự tin hơn. Với đặc điểm đế thấp, những đ&ocirc;i gi&agrave;y thể thao c&oacute; cấu tạo nhẹ, đơn giản n&ecirc;n thỏa m&atilde;n được nhu cầu của nhiều t&iacute;n đồ thời trang. C&aacute;c gam m&agrave;u đa dạng được phối c&ugrave;ng nhau tạo n&ecirc;n tổng thể bắt mắt sẽ l&agrave; trợ thủ đắc lực của những bạn nữ lu&ocirc;n ch&uacute; trọng ngoại h&igrave;nh nội bật. Với những đ&ocirc;i gi&agrave;y thể thao c&aacute; t&iacute;nh, c&aacute;c bạn g&aacute;i c&oacute; thể dễ d&agrave;ng phối c&ugrave;ng c&aacute;c trang phục năng động như &aacute;o thun oversize c&ugrave;ng quần skinny, đi k&egrave;m với những chiếc &aacute;o kho&aacute;c thật đa dạng. &nbsp;</p>\r\n', '13-min-283b9571-e2d5-4086-bc3c-c168ebf143eb.jpg', '2017-05-12 20:12:56', '2017-05-12 20:12:56', 'chon-giay-the-thao-cho-gai-dep', 11),
('Giới trẻ ầm lên về giày', '<p>Chuck II, &quot;hậu duệ&quot; của mẫu gi&agrave;y Chuck Taylor 98 năm tuổi đ&igrave;nh đ&aacute;m đang l&agrave; từ kh&oacute;a &quot;hot&quot; nhất trong từ điển của c&aacute;c bạn trẻ Việt m&ecirc; gi&agrave;y những ng&agrave;y qua.&nbsp;28/7 vừa qua, thương hiệu Converse đ&atilde; ch&iacute;nh thức ra mắt Chuck II, phi&ecirc;n bản cải tiến của mẫu gi&agrave;y Chuck Taylor All Star đ&igrave;nh đ&aacute;m. Đ&acirc;y l&agrave; lần đầu ti&ecirc;n kể từ khi ra đời v&agrave;o năm 1917, t&iacute;nh đến nay l&agrave; 98 năm, mẫu gi&agrave;y cổ điển mang t&iacute;nh biểu tượng của Converse nhận được sự cải c&aacute;ch về thiết kế. Bởi vậy, kh&ocirc;ng ngạc nhi&ecirc;n khi Chuck II gi&agrave;nh được sự quan t&acirc;m đặc biệt của giới trẻ cũng như c&aacute;c t&iacute;n đồ của gi&agrave;y Chuck Taylor tr&ecirc;n to&agrave;n thế giới.</p>\r\n\r\n<p><br />\r\nTại Việt Nam, những ng&agrave;y vừa qua Chuck II đ&atilde; tạo n&ecirc;n một cơn sốt sục s&ocirc;i trong cộng đồng c&aacute;c bạn trẻ. Dạo một v&ograve;ng quanh Instagram v&agrave; Facebook, kh&ocirc;ng kh&oacute; để bắt gặp những bức ảnh khoe gi&agrave;y với nh&acirc;n vật ch&iacute;nh l&agrave; Chuck II k&egrave;m theo những d&ograve;ng b&igrave;nh luận đầy h&agrave;o hứng. Được biết, kh&ocirc;ng &iacute;t bạn đ&atilde; phải xếp h&agrave;ng hay thậm ch&iacute; l&agrave; lặn lội đến nhiều cửa h&agrave;ng kh&aacute;c nhau để c&oacute; thể sở hữu mẫu gi&agrave;y mới ra mắt n&agrave;y.&nbsp;</p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/091/132/files/anh3.png?v=1466157709429\" /></p>\r\n\r\n<p><br />\r\nỞ lần ra mắt đầu ti&ecirc;n n&agrave;y, Chuck II giới thiệu đến c&aacute;c fan 2 phi&ecirc;n bản cao cổ v&agrave; thấp cổ với 4 t&ugrave;y chọn m&agrave;u sắc đen, trắng, đỏ v&agrave; xanh navy. So với &quot;đ&agrave;n anh&quot; Chuck Taylor cổ điển, &quot;hậu duệ&quot; Chuck II c&oacute; kh&ocirc;ng &iacute;t thay đổi lớn gi&uacute;p cải thiện đ&aacute;ng kể về sự thoải m&aacute;i khi mang cũng như độ bền. Cụ thể, Chuck II sử dụng chất liệu canvas cao cấp hơn hẳn với mặt trong được l&agrave;m từ vải micro-suede mềm mại, được trang bị l&oacute;t gi&agrave;y Lunarlon &ecirc;m &aacute;i của Nike, phần cổ gi&agrave;y được bọc th&ecirc;m đệm xốp tạo sự thoải m&aacute;i cho cổ ch&acirc;n c&ugrave;ng với phần lưỡi gi&agrave;y chống trơn trượt giảm thiểu tối đa t&igrave;nh trạng x&ocirc; lệch khi mang. Về mặt ngoại h&igrave;nh, Chuck II ph&acirc;n biệt với đ&agrave;n anh ở viền đế gi&agrave;y tuyền một m&agrave;u trắng, lỗ xỏ d&acirc;y gi&agrave;y được phủ m&agrave;u tr&ugrave;ng với m&agrave;u gi&agrave;y cũng như d&acirc;y gi&agrave;y. Ngo&agrave;i ra, logo Converse Chuck Taylor All Star h&igrave;nh tr&ograve;n ở phi&ecirc;n bản cao cổ cũng được th&ecirc;u một c&aacute;ch tỉ mỉ tạo diện mạo sắc sảo hơn hẳn cho đ&ocirc;i gi&agrave;y. Hiện Chuck II đang c&oacute; gi&aacute; b&aacute;n lẻ l&agrave; 70USD (~ 1.400.000VNĐ) cho phi&ecirc;n bản thấp cổ v&agrave; 75USD (~ 1.500.000VNĐ) cho phi&ecirc;n bản cao cổ.&nbsp;</p>\r\n', '7-min-b0397d03-c03d-4d05-9f1f-86d95f9d4f33.jpg', '2017-05-12 20:13:56', '2017-05-12 20:13:56', 'gioi-tre-am-len-ve-giay', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
