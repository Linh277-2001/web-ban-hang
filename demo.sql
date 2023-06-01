-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 05, 2023 lúc 01:06 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hieuung`
--

CREATE TABLE `hieuung` (
  `id` int(11) NOT NULL,
  `hieuung` varchar(50) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hieuung`
--

INSERT INTO `hieuung` (`id`, `hieuung`) VALUES
(1, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `ten` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `sdt` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` varchar(11) COLLATE utf32_unicode_ci NOT NULL,
  `chucvu` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `anhthe` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `luong` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `username`, `password`, `ten`, `diachi`, `sdt`, `ngaysinh`, `gioitinh`, `chucvu`, `anhthe`, `luong`) VALUES
(1, 'nhanvien1@gmail.com', '12345', 'Trần Tuấn Anh', 'Thanh Trì, Hà nội', '0978399264', '2002-01-11', 'Nam', 'Bán hàng', 'img/1.jpg', 9000000),
(2, 'nhanvien2@gmail.com', '12345', 'Nguyễn Văn Sơn', 'Thanh Xuân, Hà Nội', '0938884723', '2001-07-12', 'Nam', 'Thu ngân', 'img/2.jpg', 8000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `note` text COLLATE utf32_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL,
  `iduser` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `note`, `total`, `created_time`, `last_updated`, `iduser`) VALUES
(53, 'Nguyễn Văn Linh', '0654645646', 'Thanh Trì, Hà Nội', '', 95, 1671358012, 1671358012, 1),
(54, 'Nguyễn Văn Linh', '0983664723', 'Hà Đông, Hà Nội', '', 111, 1671515078, 1671515078, 1),
(55, 'Trần Thế Duyệt', '0938763889', 'Triều Khúc, Hà Nội', '', 29, 1671722840, 1671722840, 2),
(58, 'Nguyễn Văn Linh', '0947664829', 'Triều Khúc', '', 166, 1671732356, 1671732356, 1),
(59, 'Trần Thế Duyệt', '0938763889', 'Triều Khúc, Hà Nội', '', 92, 1671733284, 1671733284, 2),
(60, 'Nguyễn Văn Linh', '0947664829', 'Triều Khúc, Hà Nội', '', 38, 1671759179, 1671759179, 1),
(62, 'Nguyễn Văn Linh', '0984678294', 'Hà Nội', 'Đặt hôm 31/1', 83, 1675181012, 1675181012, 1),
(65, 'Nguyễn Văn Linh', '0984678294', 'Hà Nội', 'Giao sớm', 163, 1675388635, 1675388635, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_time`, `last_updated`) VALUES
(57, 53, 10, 1, 38, 1671358012, 1671358012),
(58, 53, 16, 1, 56, 1671358012, 1671358012),
(59, 54, 14, 1, 28, 1671515078, 1671515078),
(60, 54, 15, 1, 83, 1671515078, 1671515078),
(61, 55, 14, 1, 28, 1671722840, 1671722840),
(64, 58, 15, 2, 83, 1671732356, 1671732356),
(65, 59, 8, 2, 46, 1671733284, 1671733284),
(66, 60, 7, 2, 19, 1671759179, 1671759179),
(67, 62, 15, 1, 83, 1675181012, 1675181012),
(71, 65, 3, 1, 98, 1675388635, 1675388635),
(72, 65, 4, 1, 65, 1675388635, 1675388635);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `idsanpham` int(11) NOT NULL,
  `anh` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `hang` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `mota` varchar(255) COLLATE utf32_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `loai` int(11) NOT NULL,
  `soluong` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`idsanpham`, `anh`, `hang`, `mota`, `gia`, `loai`, `soluong`) VALUES
(1, 'f1.jpg', 'Hermes', 'Quần Short Desmil', 36, 2, 12),
(2, 'f2.jpg', 'LV', 'Short Đen Foetal', 45, 2, 7),
(3, 'f5.jpg', 'Hermes', 'Quần Jogger', 98, 2, 6),
(4, 'f4.jpg', 'H&M', 'Short Đỏ Mận', 65, 2, 23),
(5, 'n6.jpg', 'Nike', 'Short Nike', 78, 2, 32),
(6, 'f6.jpg', 'Hermes', 'Short Cueciz', 45, 2, 15),
(7, 'f7.jpg', 'Hermes', 'Short Touris', 19, 2, 21),
(8, 'f8.jpg', 'Hermes', 'Short Pockets', 46, 2, 31),
(9, 'n1.jpg', 'Hermes', 'Sơ Mi Xanh ', 27, 1, 41),
(10, 'n2.jpg', 'Hermes', 'Sơ Mi Goorup', 38, 1, 16),
(11, 'n3.jpg', 'Hermes', 'Sơ Mi Trắng', 60, 1, 8),
(12, 'n4.jpg', 'Hermes', 'Sơ Mi Kersen', 20, 1, 45),
(13, 'n5.jpg', 'Azidas', 'Áo Vải Pique', 79, 1, 35),
(14, 'f3.jpg', 'Hermes', 'Áo Hoa Curmis', 28, 1, 31),
(15, 'n7.jpg', 'Nike', 'Sơ Mi Ultral Light', 83, 1, 13),
(16, 'n8.jpg', 'Nike', 'Sơ Mi Burcaut Ngắn Tay', 56, 1, 19),
(17, 'apparel.jpg', 'H&M', 'Áo Apparel', 43, 3, 20),
(18, 'mieffig.jpg', 'H&M', 'Áo Mieffig', 78, 3, 29),
(19, 'puspitak.jpg', 'H&M', 'Áo Puspitak', 68, 3, 42),
(20, 'pinterm.jpg', 'H&M', 'Áo Pinterm', 93, 3, 45),
(21, 'lurion.jpg', 'Hermes', 'Áo Lurion', 59, 3, 24),
(22, 'Dakeay.jpg', 'Hermes', 'Áo Dakeay', 43, 3, 15),
(23, 'podipx.jpg', 'Hermes', 'Áo Podipx', 55, 3, 24),
(24, 'garcons.jpg', 'Hermes', 'Áo Garcons', 82, 3, 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `idkhach` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `ten` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `sdt` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `gioitinh` varchar(50) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`idkhach`, `username`, `password`, `ten`, `ngaysinh`, `sdt`, `diachi`, `gioitinh`) VALUES
(1, 'linh@gmail.com', '12345', 'Nguyễn Văn Linh', '2001-09-17', '0978399265', 'Tân Triều-Hà Nội', 'Nam'),
(2, 'duyet@gmail.com', '54321', 'Trần Thế Duyệt', '2001-08-14', '0938763889', 'Triều Khúc, Hà Nội', 'Nam');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Chỉ mục cho bảng `hieuung`
--
ALTER TABLE `hieuung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `order_detail_ibfk_2` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idsanpham`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idkhach`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hieuung`
--
ALTER TABLE `hieuung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `idsanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `idkhach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`idsanpham`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
