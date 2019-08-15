-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2019 at 03:32 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `ID` int(11) NOT NULL,
  `TieuDe` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NoiDung` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `ID_User` int(11) NOT NULL,
  `ID_SanPham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`ID`, `TieuDe`, `NoiDung`, `ID_User`, `ID_SanPham`) VALUES
(3, NULL, 'Đây là comment của thằng sonnguyenit.998@gmail.com', 18, 1),
(4, NULL, 'helloo', 18, 1),
(12, NULL, 'hi', 14, 1),
(13, NULL, 'Alo', 14, 3);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `ID` int(11) NOT NULL,
  `TenDanhMuc` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `DuongDanAnh` varchar(500) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'public/images/default-images/no-image.jpg',
  `NgayTao` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`ID`, `TenDanhMuc`, `DuongDanAnh`, `NgayTao`) VALUES
(3, 'C# / ASP.NET', 'public/images/danhmuc-images/08-58-47-CShap.png', '05-27-19-'),
(4, 'Java / Android', 'public/images/danhmuc-images/08-59-08-java.png', '08-59-08-'),
(5, 'PHP', 'public/images/danhmuc-images/04-09-25-php-28-226043.png', '04-09-25-'),
(6, 'Javascript', 'public/images/danhmuc-images/04-10-12-JS.png', '04-10-12-'),
(7, 'IOS / Swift', 'public/images/danhmuc-images/04-29-22-Swift-2-512.png', '04-29-22-'),
(8, 'C++', 'public/images/danhmuc-images/04-30-44-33-331871_im-experienced-with-building-native-c-applications-c.png', '04-30-44-'),
(9, 'HTML', 'public/images/danhmuc-images/04-31-29-HTML_Logo.png', '04-31-29-');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `ID` int(11) NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenHienThi` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` tinyint(1) NOT NULL,
  `SoDienThoai` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(1500) COLLATE utf8_unicode_ci NOT NULL,
  `DuongDanAnhBia` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'public/images/default-images/no-image.jpg',
  `DuongDanAnhDaiDien` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'public/images/default-images/no-image.png',
  `NgayTao` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `KieuTaiKhoan` varchar(15) COLLATE utf8_unicode_ci DEFAULT 'user',
  `Tien` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`ID`, `Email`, `MatKhau`, `TenHienThi`, `GioiTinh`, `SoDienThoai`, `DiaChi`, `DuongDanAnhBia`, `DuongDanAnhDaiDien`, `NgayTao`, `KieuTaiKhoan`, `Tien`) VALUES
(14, 'nbhs.it.98@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Sơn Nguyễn', 0, '0916524328', 'Cần Thơ', 'public/images/user-images/anh-bia/08-39-15-66060611_2474939062572962_8535483048160919552_n.jpg', 'public/images/user-images/anh-daidien/08-42-16-6227882fbfbb55e50caa.jpg', '2019-07-16 15:59:01', 'user', 80000),
(18, 'sonnguyenit.998@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Joker Bot', 0, '0916524339', 'Cần Thơ', 'public/images/default-images/no-image.jpg', 'public/images/default-images/no-image.png', '2019-07-22 12:05:42', 'user', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quantri`
--

CREATE TABLE `quantri` (
  `ID` int(11) NOT NULL,
  `TenTaiKhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenHienThi` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `DuongDanAnh` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'public/images/default-images/no-image.png',
  `KieuTaiKhoan` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `quantri`
--

INSERT INTO `quantri` (`ID`, `TenTaiKhoan`, `MatKhau`, `TenHienThi`, `DuongDanAnh`, `KieuTaiKhoan`) VALUES
(37, 'SonNguyen', 'e10adc3949ba59abbe56e057f20f883e', 'Sơn Nguyễn', 'public/images/admin-images/13-10-55-sonnguyen.jpg', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `ID` int(11) NOT NULL,
  `TenSanPham` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `Gia` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ID_DanhMuc` int(11) NOT NULL,
  `Link` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ID_User` int(11) NOT NULL,
  `NgayTao` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `AnhDemo_1` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '	public/images/default-images/no-image.jpg',
  `AnhDemo_2` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '	public/images/default-images/no-image.jpg',
  `AnhDemo_3` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '	public/images/default-images/no-image.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`ID`, `TenSanPham`, `MoTa`, `Gia`, `ID_DanhMuc`, `Link`, `ID_User`, `NgayTao`, `AnhDemo_1`, `AnhDemo_2`, `AnhDemo_3`) VALUES
(1, 'Đồ án PHP xây dựng website quản lý khách sạn', 'Giao diện website bắt mắt, trực quan ,dễ sử dụng với người dùng. Có đầy đủ tính năng như:\r\n\r\n+ Quản lý phòng,danh mục phòng, khách hàng, thuê phòng, sử dụng dịch vụ,đặt phòng online.\r\n\r\n+Đăng nhập, đăng xuất\r\n\r\n+ Đăng nhập bằng Facebook (chỉ chạy localhost)\r\n\r\n+ Template chất lượng trả phí trên themeforest.net (với giá 17 USD):https://themeforest.net/item/lotus-hotel-booking-html-template/17689053', '50000', 5, 'https://sharecode.vn/source-code/do-an-xay-dung-website-quan-ly-khach-san-23181.htm', 14, '08-22-07-', 'public/images/sanpham-images/mota/08-22-07-do-an-php-xay-dung-website-quan-ly-khach-san-103345.jpg', 'public/images/sanpham-images/demo/08-22-07-do-an-php-xay-dung-website-quan-ly-khach-san-103348.jpg', 'public/images/sanpham-images/demo/08-22-07-do-an-php-xay-dung-website-quan-ly-khach-san-103346.jpg'),
(2, 'Source code Phần mềm quản lí khách sạn', 'Source phù hợp tham khảo học tập!', '15000', 3, 'https://sharecode.vn/source-code/source-code-phan-mem-quan-li-khach-san-winform-c-23165.htm', 14, '08-23-37-', 'public/images/sanpham-images/mota/08-23-37-[thanh-vien-bo-sung-hinh-anh-demo]-source-code-phan-mem-quan-li-khach-san-winform-c-181037.jpg', 'public/images/sanpham-images/demo/08-23-37-[thanh-vien-bo-sung-hinh-anh-demo]-source-code-phan-mem-quan-li-khach-san-winform-c-181038.jpg', 'public/images/sanpham-images/demo/08-23-37-[thanh-vien-bo-sung-hinh-anh-demo]-source-code-phan-mem-quan-li-khach-san-winform-c-181036.jpg'),
(3, 'Source code android Quản lý sinh viên FPOLY', 'ứng dụng quản lý sinh viên dựa trên asignment môn android cơ bản của cao đẳng FPT Polytechnic\r\n\r\nkhi nhận được link tải \r\n\r\ncác bạn giải nén pass: sharecode.vn\r\n\r\nmở trong android studio\r\n\r\ngood luck', '5000', 4, 'https://sharecode.vn/source-code/quan-ly-sinh-vienfpolysharecode-23157.htm', 18, '08-25-24-', 'public/images/sanpham-images/mota/08-25-24-source-code-android-quan-ly-sinh-vien-fpoly-8270.jpg', 'public/images/sanpham-images/demo/08-25-24-source-code-android-quan-ly-sinh-vien-fpoly-8271.jpg', 'public/images/sanpham-images/demo/08-25-24-source-code-android-quan-ly-sinh-vien-fpoly-8272.jpg'),
(4, 'Little Piano Drum And Music Game For Kids + Admob', 'It’s amazing Piano and Drum game for little kids. In this game beautiful piano and drum for kids music fun. This game HD graphics with ultimate music game for kids. Also using admob with the designed for families program.\r\n\r\nYou need to submit this game with design family program age 6 to 9. In this admob already filter for this\r\n\r\nYou also easy to reskin this game. You just need to replace same size images and change sounds on resources folder.\r\n\r\nFeatures:\r\n\r\nAdmob\r\nDesign for families program\r\nEast to reskin\r\nFun with piano and drum', '50000', 7, 'https://sharecode.vn/source-code/little-piano-drum-and-music-game-for-kids-admob-21488.htm', 18, '08-26-24-', 'public/images/sanpham-images/mota/08-26-24-little-piano-drum-and-music-game-for-kids-admob-151415.jpg', 'public/images/sanpham-images/demo/08-26-24-little-piano-drum-and-music-game-for-kids-admob-151414.jpg', 'public/images/sanpham-images/demo/08-26-24-little-piano-drum-and-music-game-for-kids-admob-143924.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `quantri`
--
ALTER TABLE `quantri`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `quantri`
--
ALTER TABLE `quantri`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
