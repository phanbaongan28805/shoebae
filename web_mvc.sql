-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 20, 2021 lúc 07:20 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_mvc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adminEmail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `adminUser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adminPass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(2, 'admin', 'admin@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(15, 'Nike'),
(16, 'Converse'),
(17, 'Adidas'),
(18, 'Vans');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(18, 'Nike'),
(19, 'Adidas'),
(20, 'Converse'),
(21, 'Vans');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contactId` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `mess` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_contact`
--

INSERT INTO `tbl_contact` (`contactId`, `name`, `email`, `phone`, `mess`) VALUES
(8, 'Trang Hán Siêu', 'tranghansieu123@gmail.com', '0383356646', 'Cho em hỏi hàng em giao đến đâu rồi à'),
(9, 'Khánh', 'tdkhanh.20it6@vku.udn.vn', '0383356646', 'Hi em chào anh ạ'),
(11, 'Pham Van Dat', 'pvdat@gmail.com', '0383356789', 'Cho em hỏi đơn hàng của em được gửi chưa ạ'),
(12, 'Trang Hán Siêu', 'tranghansieu123@gmail.com', '+84383356646', 'hi'),
(13, 'Trang Hán Siêu', 'tranghansieu123@gmail.com', '+84383356646', 'sao đơn hàng mình lâu vậy'),
(33, '', 'tranghansieu1263@gmail.com', '', ''),
(34, '', 'tranghansieu12344@gmail.com', '', ''),
(35, '', 'tranghansieu12344@gmail.com', '', ''),
(36, 'Trang Hán Siêu', 'tranghansieu123@gmail.com', '+84383356646', 'hihihihihi'),
(37, '', 'testemail@gmail.com', '', ''),
(38, 'test bài', 'testmuahang@gmail.com', '0383356646', 'cho em hỏi với'),
(39, '', 'tranghansieu1122334455@gmail.com', '', ''),
(40, 'Trang Hán Siêu', 'tranghansieu123@gmail.com', '+84383356646', 'hihi admin\r\n'),
(41, '', 'khanh@gmail.com', '', ''),
(42, 'nguyễn viết huy', 'tranghansieu123@gmail.com', '0383356646', 'Cho em hỏi đươn hàng em được giao chưa ạ'),
(43, '', 'pvdat@gmail.com', '', ''),
(44, '', 'abc@gmail.com', '', ''),
(45, '', 'tranghansieu03@gmail.com', '', ''),
(46, 'Trang Hán Siêu', 'tranghansieu03@gmail.com', '0383356646', 'em chào mn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(100) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `zipcode`, `phone`, `email`, `password`) VALUES
(1, 'Trang Hán Siêu', 'Kinh Thị-Trung Sơn-Gio Linh-Quảng Trị', 'Gio Linh', '70000', '+84383356646', 'tranghansieu123@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Trần Đình Khánh', 'Nhĩ Hạ-Gio Mỹ-Quảng Trị', 'Quảng Trị', '60000', '0384756123', 'khanh@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `size` int(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productId`, `productName`, `customer_id`, `size`, `quantity`, `price`, `image`, `status`, `date_order`) VALUES
(1, 84, 'Nike Jordan 1 Low', 1, 40, 2, '2600000', '47b8a08147.png', 2, '2021-12-11 12:03:22'),
(2, 78, 'Vans Old Skool', 2, 40, 1, '1200000', '0a672cb91f.png', 1, '2021-12-11 14:26:02'),
(3, 77, 'Vans Old Skool', 2, 35, 3, '3600000', '8f9c499b7f.png', 1, '2021-12-12 05:45:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `product_code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `productQuantity` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_soldout` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `product_remain` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `color` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_desc` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `sex` int(20) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `product_code`, `productQuantity`, `product_soldout`, `product_remain`, `catId`, `brandId`, `color`, `product_desc`, `type`, `sex`, `price`, `image`) VALUES
(45, 'Nike Jordan 4', '006', '30', '7', '23', 18, 15, '', '<p>Gi&agrave;y Nike Jordan 4 l&agrave; một trong những phối m&agrave;u cực kỳ hot trong series 1s n&oacute;i chung v&agrave; cũng l&agrave; những phối m&agrave;u trường kỳ với thời gian được ph&aacute;t h&agrave;nh v&agrave;o năm 1985. M&ugrave;a h&egrave; 2019, Jordan Brand đ&atilde; nhanh tay chuẩn bị ph&aacute;t h&agrave;nh ra phi&ecirc;n...</p>\r\n', 0, 0, '1500000', '6d2853a14e.png'),
(46, ' Nike Jordan 4', '008', '30', '21', '9', 18, 15, '', '<p>Gi&agrave;y Nike Jordan 4 l&agrave; một trong những phối m&agrave;u cực kỳ hot trong series 1s n&oacute;i chung v&agrave; cũng l&agrave; những phối m&agrave;u trường kỳ với thời gian được ph&aacute;t h&agrave;nh v&agrave;o năm 1985. M&ugrave;a h&egrave; 2019, Jordan Brand đ&atilde; nhanh tay chuẩn bị ph&aacute;t h&agrave;nh ra phi&ecirc;n...</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, 0, '1500000', 'ac9373fc97.png'),
(47, 'Nike Jordan 4', '009', '40', '4', '36', 18, 15, '', '<p>Gi&agrave;y Nike Jordan 4 l&agrave; một trong những phối m&agrave;u cực kỳ hot trong series 1s n&oacute;i chung v&agrave; cũng l&agrave; những phối m&agrave;u trường kỳ với thời gian được ph&aacute;t h&agrave;nh v&agrave;o năm 1985. M&ugrave;a h&egrave; 2019, Jordan Brand đ&atilde; nhanh tay chuẩn bị ph&aacute;t h&agrave;nh ra phi&ecirc;n...</p>\r\n', 0, 0, '1400000', '28b51789d9.png'),
(48, 'Nike Jordan 4', '007', '40', '1', '39', 18, 15, '', '<p>Gi&agrave;y Nike Jordan 4 l&agrave; một trong những phối m&agrave;u cực kỳ hot trong series 1s n&oacute;i chung v&agrave; cũng l&agrave; những phối m&agrave;u trường kỳ với thời gian được ph&aacute;t h&agrave;nh v&agrave;o năm 1985. M&ugrave;a h&egrave; 2019, Jordan Brand đ&atilde; nhanh tay chuẩn bị ph&aacute;t h&agrave;nh ra phi&ecirc;n...</p>\r\n', 0, 0, '1500000', 'c8fd06373e.png'),
(49, 'Vans Vault Old Skool', '005', '40', '3', '37', 21, 18, '', '<p><span>VANS</span><span>&nbsp;được cộng đồng thể thao biết đến như một thương hiệu thời trang chuy&ecirc;n về gi&agrave;y d&agrave;nh cho c&aacute;c bộ m&ocirc;n nghệ thuật đường phố, nổi bật l&agrave; trượt v&aacute;n.&nbsp;</span></p>', 1, 0, '1000000', '59656f0dd6.png'),
(50, 'Vans Vault OG Classic', '003', '40', '12', '28', 21, 18, '', '<p><span>VANS</span><span>&nbsp;được cộng đồng thể thao biết đến như một thương hiệu thời trang chuy&ecirc;n về gi&agrave;y d&agrave;nh cho c&aacute;c bộ m&ocirc;n nghệ thuật đường phố, nổi bật l&agrave; trượt v&aacute;n.&nbsp;</span></p>', 1, 0, '1000000', '5ef46ceecc.png'),
(51, 'Vans Vault Old Skool', '004', '40', '1', '39', 21, 18, '', '<p><span>VANS</span><span>&nbsp;được cộng đồng thể thao biết đến như một thương hiệu thời trang chuy&ecirc;n về gi&agrave;y d&agrave;nh cho c&aacute;c bộ m&ocirc;n nghệ thuật đường phố, nổi bật l&agrave; trượt v&aacute;n.&nbsp;</span></p>', 1, 0, '1000000', '4d9e3cf055.png'),
(52, 'Vans Vault Old Skool', '002', '30', '0', '33', 21, 18, '', '<p><span>VANS</span><span>&nbsp;được cộng đồng thể thao biết đến như một thương hiệu thời trang chuy&ecirc;n về gi&agrave;y d&agrave;nh cho c&aacute;c bộ m&ocirc;n nghệ thuật đường phố, nổi bật l&agrave; trượt v&aacute;n.&nbsp;</span></p>', 1, 0, '1000000', '79bde9507e.png'),
(53, 'Adidas Yeezy 350', '013', '30', '2', '28', 19, 17, 'Xám', '<p>H&agrave;ng loạt bản mẫu. H&agrave;ng loạt cải tiến. H&agrave;ng loạt thử nghiệm. H&atilde;y đồng h&agrave;nh c&ugrave;ng ch&uacute;ng t&ocirc;i tr&ecirc;n h&agrave;nh tr&igrave;nh t&igrave;m kiếm sự h&ograve;a hợp đỉnh cao giữa trọng lượng, sự &ecirc;m &aacute;i v&agrave; độ đ&agrave;n hồi.&nbsp;</p>\r\n', 1, 1, '1700000', 'c391401e30.png'),
(54, 'Adidas Yeezy 350', '012', '30', '15', '15', 19, 17, 'Trắng', '<p>H&agrave;ng loạt bản mẫu. H&agrave;ng loạt cải tiến. H&agrave;ng loạt thử nghiệm. H&atilde;y đồng h&agrave;nh c&ugrave;ng ch&uacute;ng t&ocirc;i tr&ecirc;n h&agrave;nh tr&igrave;nh t&igrave;m kiếm sự h&ograve;a hợp đỉnh cao giữa trọng lượng, sự &ecirc;m &aacute;i v&agrave; độ đ&agrave;n hồi.&nbsp;</p>\r\n', 1, 1, '1600000', 'ce25ea6e5f.png'),
(55, 'Adidas Yeezy 350', '011', '40', '1', '39', 19, 17, 'Be', '<p>H&agrave;ng loạt bản mẫu. H&agrave;ng loạt cải tiến. H&agrave;ng loạt thử nghiệm. H&atilde;y đồng h&agrave;nh c&ugrave;ng ch&uacute;ng t&ocirc;i tr&ecirc;n h&agrave;nh tr&igrave;nh t&igrave;m kiếm sự h&ograve;a hợp đỉnh cao giữa trọng lượng, sự &ecirc;m &aacute;i v&agrave; độ đ&agrave;n hồi.&nbsp;</p>\r\n', 1, 1, '1500000', '762b0ca7c1.png'),
(56, 'Adidas Yeezy 350', '010', '40', '1', '39', 19, 17, 'Đen', '<p>H&agrave;ng loạt bản mẫu. H&agrave;ng loạt cải tiến. H&agrave;ng loạt thử nghiệm. H&atilde;y đồng h&agrave;nh c&ugrave;ng ch&uacute;ng t&ocirc;i tr&ecirc;n h&agrave;nh tr&igrave;nh t&igrave;m kiếm sự h&ograve;a hợp đỉnh cao giữa trọng lượng, sự &ecirc;m &aacute;i v&agrave; độ đ&agrave;n hồi.&nbsp;</p>\r\n', 1, 1, '1700000', 'e2a8628da8.png'),
(57, 'Converse Chuck  1970s', '014', '30', '15', '15', 20, 16, 'Đen', '<p>Phải khẳng định rằng,&nbsp;<em>Converse&nbsp;</em>chưa bao giờ l&agrave;m người h&acirc;m mộ thất vọng đối với c&aacute;c c&aacute;ch thể hiện sản phẩm của m&igrave;nh.&nbsp;</p>\r\n', 0, 0, '1200000', '965d11f80d.png'),
(58, 'Converse Chuck Taylor 1970s ', '015', '30', '3', '27', 20, 16, 'Trắng', '<p>Phải khẳng định rằng,&nbsp;<em>Converse&nbsp;</em>chưa bao giờ l&agrave;m người h&acirc;m mộ thất vọng đối với c&aacute;c c&aacute;ch thể hiện sản phẩm của m&igrave;nh.&nbsp;</p>\r\n', 0, 0, '1200000', '35cf4ca7fe.png'),
(59, 'Converse Chuck Taylor 1970s ', '016', '30', '4', '26', 20, 16, 'Đen', '<p>Phải khẳng định rằng,&nbsp;<em>Converse&nbsp;</em>chưa bao giờ l&agrave;m người h&acirc;m mộ thất vọng đối với c&aacute;c c&aacute;ch thể hiện sản phẩm của m&igrave;nh.&nbsp;</p>\r\n', 0, 0, '1200000', '49fd8749ce.png'),
(66, 'Converse Chuck  1970s', '017', '30', '40', '1', 20, 16, 'Xanh', '<p>Phải khẳng định rằng,&nbsp;<em>Converse&nbsp;</em>chưa bao giờ l&agrave;m người h&acirc;m mộ thất vọng đối với c&aacute;c c&aacute;ch thể hiện sản phẩm của m&igrave;nh.&nbsp;</p>\r\n', 1, 0, '1300000', '5ca03604c8.png'),
(71, 'Converse Run Star ', '018', '30', '8', '22', 20, 16, 'Xanh', '<p>Sản phẩm được thiết kế &quot;remix&quot; từ Chuck v&agrave; Runner khi 2 yếu tố thời trang.</p>\r\n\r\n<p>Chất liệu&nbsp;canvas v&agrave; đế Run Star zig-zag được thiết kế với dạng răng cưa to bản, gi&uacute;p tăng độ b&aacute;m tạo được điểm nhấn về phong c&aacute;ch v&agrave; ấn tượng về thời trang.&nbsp;</p>\r\n\r\n<p>Lớp lót dày tạo cảm giác &ecirc;m ái khi v&acirc;̣n đ&ocirc;̣ng, vải d&agrave;y dặn, cứng form hơn.</p>\r\n\r\n<p>D&acirc;y gi&agrave;y d&agrave;y hơn, c&ugrave;ng m&agrave;u với phần đế, tem g&oacute;t đen 1st-tring - đặc trưng.</p>\r\n\r\n<p>L&agrave; biểu tượng của văn h&oacute;a thể thao v&agrave; c&aacute;c loại h&igrave;nh nghệ thuật đường phố kiểu Mỹ, truyền cảm hứng v&agrave; sức s&aacute;ng tạo mạnh mẽ đến giới trẻ tr&ecirc;n to&agrave;n thế giới.</p>\r\n\r\n<p>Với đ&ocirc;i gi&agrave;y n&agrave;y bạn c&oacute; thể chọn quần jeans với &aacute;o pull đơn giản. Bạn mix theo kiểu tone xuyệt tone để mang tới sự h&agrave;i h&ograve;a trong phong c&aacute;ch.</p>\r\n', 0, 0, '2500000', '5610c9ad51.png'),
(72, 'Converse Run Star ', '019', '30', '5', '25', 20, 16, 'Be', '<p>Sản phẩm được thiết kế &quot;remix&quot; từ Chuck v&agrave; Runner khi 2 yếu tố thời trang.</p>\r\n\r\n<p>Chất liệu&nbsp;canvas v&agrave; đế Run Star zig-zag được thiết kế với dạng răng cưa to bản, gi&uacute;p tăng độ b&aacute;m tạo được điểm nhấn về phong c&aacute;ch v&agrave; ấn tượng về thời trang.&nbsp;</p>\r\n\r\n<p>Lớp lót dày tạo cảm giác &ecirc;m ái khi v&acirc;̣n đ&ocirc;̣ng, vải d&agrave;y dặn, cứng form hơn.</p>\r\n\r\n<p>D&acirc;y gi&agrave;y d&agrave;y hơn, c&ugrave;ng m&agrave;u với phần đế, tem g&oacute;t đen 1st-tring - đặc trưng.</p>\r\n\r\n<p>L&agrave; biểu tượng của văn h&oacute;a thể thao v&agrave; c&aacute;c loại h&igrave;nh nghệ thuật đường phố kiểu Mỹ, truyền cảm hứng v&agrave; sức s&aacute;ng tạo mạnh mẽ đến giới trẻ tr&ecirc;n to&agrave;n thế giới.</p>\r\n\r\n<p>Với đ&ocirc;i gi&agrave;y n&agrave;y bạn c&oacute; thể chọn quần jeans với &aacute;o pull đơn giản. Bạn mix theo kiểu tone xuyệt tone để mang tới sự h&agrave;i h&ograve;a trong phong c&aacute;ch.</p>\r\n', 0, 0, '2500000', 'dffd87cee8.png'),
(73, 'Converse Run Star ', '020', '30', '3', '27', 20, 16, 'Đen', '<p>Sản phẩm được thiết kế &quot;remix&quot; từ Chuck v&agrave; Runner khi 2 yếu tố thời trang.</p>\r\n\r\n<p>Chất liệu&nbsp;canvas v&agrave; đế Run Star zig-zag được thiết kế với dạng răng cưa to bản, gi&uacute;p tăng độ b&aacute;m tạo được điểm nhấn về phong c&aacute;ch v&agrave; ấn tượng về thời trang.&nbsp;</p>\r\n\r\n<p>Lớp lót dày tạo cảm giác &ecirc;m ái khi v&acirc;̣n đ&ocirc;̣ng, vải d&agrave;y dặn, cứng form hơn.</p>\r\n\r\n<p>D&acirc;y gi&agrave;y d&agrave;y hơn, c&ugrave;ng m&agrave;u với phần đế, tem g&oacute;t đen 1st-tring - đặc trưng.</p>\r\n\r\n<p>L&agrave; biểu tượng của văn h&oacute;a thể thao v&agrave; c&aacute;c loại h&igrave;nh nghệ thuật đường phố kiểu Mỹ, truyền cảm hứng v&agrave; sức s&aacute;ng tạo mạnh mẽ đến giới trẻ tr&ecirc;n to&agrave;n thế giới.</p>\r\n\r\n<p>Với đ&ocirc;i gi&agrave;y n&agrave;y bạn c&oacute; thể chọn quần jeans với &aacute;o pull đơn giản. Bạn mix theo kiểu tone xuyệt tone để mang tới sự h&agrave;i h&ograve;a trong phong c&aacute;ch.</p>\r\n', 0, 0, '2500000', 'bd252874c5.png'),
(74, 'Converse Run Star ', '021', '30', '0', '30', 20, 16, 'Trắng', '<p>Sản phẩm được thiết kế &quot;remix&quot; từ Chuck v&agrave; Runner khi 2 yếu tố thời trang.</p>\r\n\r\n<p>Chất liệu&nbsp;canvas v&agrave; đế Run Star zig-zag được thiết kế với dạng răng cưa to bản, gi&uacute;p tăng độ b&aacute;m tạo được điểm nhấn về phong c&aacute;ch v&agrave; ấn tượng về thời trang.&nbsp;</p>\r\n\r\n<p>Lớp lót dày tạo cảm giác &ecirc;m ái khi v&acirc;̣n đ&ocirc;̣ng, vải d&agrave;y dặn, cứng form hơn.</p>\r\n\r\n<p>D&acirc;y gi&agrave;y d&agrave;y hơn, c&ugrave;ng m&agrave;u với phần đế, tem g&oacute;t đen 1st-tring - đặc trưng.</p>\r\n\r\n<p>L&agrave; biểu tượng của văn h&oacute;a thể thao v&agrave; c&aacute;c loại h&igrave;nh nghệ thuật đường phố kiểu Mỹ, truyền cảm hứng v&agrave; sức s&aacute;ng tạo mạnh mẽ đến giới trẻ tr&ecirc;n to&agrave;n thế giới.</p>\r\n\r\n<p>Với đ&ocirc;i gi&agrave;y n&agrave;y bạn c&oacute; thể chọn quần jeans với &aacute;o pull đơn giản. Bạn mix theo kiểu tone xuyệt tone để mang tới sự h&agrave;i h&ograve;a trong phong c&aacute;ch.</p>\r\n', 0, 0, '2500000', '1c158dade9.png'),
(75, 'Vans Old Skool', '022', '30', '0', '30', 21, 18, 'Đen đỏ', '<p><strong>VANS</strong>&nbsp;được cộng đồng thể thao biết đến như một thương hiệu thời trang chuy&ecirc;n về gi&agrave;y d&agrave;nh cho c&aacute;c bộ m&ocirc;n nghệ thuật đường phố, nổi bật l&agrave; trượt v&aacute;n.&nbsp;</p>\r\n', 1, 0, '1200000', 'f99f8e5cef.png'),
(76, 'Vans Old Skool', '023', '30', '2', '28', 21, 18, 'Đen xanh lá', '<p><strong>VANS</strong>&nbsp;được cộng đồng thể thao biết đến như một thương hiệu thời trang chuy&ecirc;n về gi&agrave;y d&agrave;nh cho c&aacute;c bộ m&ocirc;n nghệ thuật đường phố, nổi bật l&agrave; trượt v&aacute;n.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 0, '1200000', '9dc1b429c6.png'),
(77, 'Vans Old Skool', '024', '30', '19', '11', 21, 18, 'Xanh lá', '<p><strong>VANS</strong>&nbsp;được cộng đồng thể thao biết đến như một thương hiệu thời trang chuy&ecirc;n về gi&agrave;y d&agrave;nh cho c&aacute;c bộ m&ocirc;n nghệ thuật đường phố, nổi bật l&agrave; trượt v&aacute;n.&nbsp;</p>\r\n', 1, 0, '1200000', '8f9c499b7f.png'),
(78, 'Vans Old Skool', '025', '30', '1', '29', 21, 18, 'Xám trắng', '<p><strong>VANS</strong>&nbsp;được cộng đồng thể thao biết đến như một thương hiệu thời trang chuy&ecirc;n về gi&agrave;y d&agrave;nh cho c&aacute;c bộ m&ocirc;n nghệ thuật đường phố, nổi bật l&agrave; trượt v&aacute;n.&nbsp;</p>\r\n', 1, 0, '1200000', '0a672cb91f.png'),
(79, 'Adidas Forum', '026', '30', '0', '30', 19, 17, 'Trắng đen xám', '<p>D&ograve;ng gi&agrave;y adidas Forum vẫn lu&ocirc;n thống trị s&acirc;n b&oacute;ng rổ cũng như đường phố, nay trở lại với phi&ecirc;n bản cổ lửng gi&uacute;p đưa c&aacute;c chuyển động của bạn l&ecirc;n một tầm cao mới. Cho đ&ocirc;i ch&acirc;n phong c&aacute;ch kh&ocirc;ng thể h&ograve;a lẫn c&ugrave;ng chất liệu da phủ sang trọng v&agrave; thể hiện đẳng cấp.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, 0, '2500000', 'fd812f5201.png'),
(80, 'Adidas Forum', '027', '30', '2', '30', 19, 17, 'Trắng xanh', '<p>D&ograve;ng gi&agrave;y adidas Forum vẫn lu&ocirc;n thống trị s&acirc;n b&oacute;ng rổ cũng như đường phố, nay trở lại với phi&ecirc;n bản cổ lửng gi&uacute;p đưa c&aacute;c chuyển động của bạn l&ecirc;n một tầm cao mới. Cho đ&ocirc;i ch&acirc;n phong c&aacute;ch kh&ocirc;ng thể h&ograve;a lẫn c&ugrave;ng chất liệu da phủ sang trọng v&agrave; thể hiện đẳng cấp.</p>\r\n', 0, 0, '2500000', '7dd2d6e19e.png'),
(81, 'Adidas Forum', '028', '30', '2', '28', 19, 17, 'Trắng xanh', '<p>D&ograve;ng gi&agrave;y adidas Forum vẫn lu&ocirc;n thống trị s&acirc;n b&oacute;ng rổ cũng như đường phố, nay trở lại với phi&ecirc;n bản cổ lửng gi&uacute;p đưa c&aacute;c chuyển động của bạn l&ecirc;n một tầm cao mới. Cho đ&ocirc;i ch&acirc;n phong c&aacute;ch kh&ocirc;ng thể h&ograve;a lẫn c&ugrave;ng chất liệu da phủ sang trọng v&agrave; thể hiện đẳng cấp.</p>\r\n', 0, 0, '2500000', '55980ee264.png'),
(82, 'Adidas Forum', '029', '30', '0', '30', 19, 17, 'Trắng cam', '<p>D&ograve;ng gi&agrave;y<strong> Adidas Forum</strong> vẫn lu&ocirc;n thống trị s&acirc;n b&oacute;ng rổ cũng như đường phố, nay trở lại với phi&ecirc;n bản cổ lửng gi&uacute;p đưa c&aacute;c chuyển động của bạn l&ecirc;n một tầm cao mới. Cho đ&ocirc;i ch&acirc;n phong c&aacute;ch kh&ocirc;ng thể h&ograve;a lẫn c&ugrave;ng chất liệu da phủ sang trọng v&agrave; thể hiện đẳng cấp.</p>\r\n', 0, 0, '2500000', '5b2349ceaf.png'),
(83, 'Nike Jordan 1 Low', '030', '30', '0', '30', 18, 15, 'Đỏ trắng', '<p>Nike Air Jordan 1 Low l&agrave; một phi&ecirc;n bản cổ thấp của mẫu gi&agrave;y nổi tiếng Air&nbsp;<a href=\"https://sneakerdaily.vn/danh-muc-san-pham/air-jordan-1/\">Jordan 1</a>, được ph&aacute;t h&agrave;nh hầu như tất cả c&aacute;c m&ugrave;a trong năm với rất nhiều phối m&agrave;u đa dạng. Sở hữu một mức gi&aacute; mềm hơn rất nhiều so với một phi&ecirc;n bản&nbsp;<a href=\"https://sneakerdaily.vn/danh-muc-san-pham/air-jordan-1-high/\">Jordan 1 High</a>&nbsp;hoặc&nbsp;<a href=\"https://sneakerdaily.vn/danh-muc-san-pham/air-jordan-1-mid/\">Jordan 1 Mid</a>, Air Jordan 1 cổ Low đang thực sự trở th&agrave;nh một cơn sốt trong thị trường Sneaker Việt Nam.</p>\r\n', 1, 1, '1300000', 'cb16316366.png'),
(84, 'Nike Jordan 1 Low', '031', '35', '9', '26', 18, 15, 'Xanh cam', '<p>Nike Air Jordan 1 Low l&agrave; một phi&ecirc;n bản cổ thấp của mẫu gi&agrave;y nổi tiếng Air Jordan, được ph&aacute;t h&agrave;nh hầu như tất cả c&aacute;c m&ugrave;a trong năm với rất nhiều phối m&agrave;u đa dạng. Sở hữu một mức gi&aacute; mềm hơn rất nhiều so với một phi&ecirc;n bản Jordan High&nbsp;hoặc Jordan Mid, Air Jordan 1 cổ Low đang thực sự trở th&agrave;nh một cơn sốt trong thị trường Sneaker Việt Nam.</p>\r\n', 1, 1, '1300000', '47b8a08147.png'),
(85, 'Nike Jordan 1 Low', '032', '35', '2', '33', 18, 15, 'Xanh', '<p>Nike Air Jordan 1 Low l&agrave; một phi&ecirc;n bản cổ thấp của mẫu gi&agrave;y nổi tiếng Air Jordan, được ph&aacute;t h&agrave;nh hầu như tất cả c&aacute;c m&ugrave;a trong năm với rất nhiều phối m&agrave;u đa dạng. Sở hữu một mức gi&aacute; mềm hơn rất nhiều so với một phi&ecirc;n bản Jordan High&nbsp;hoặc Jordan Mid, Air Jordan 1 cổ Low đang thực sự trở th&agrave;nh một cơn sốt trong thị trường Sneaker Việt Nam.</p>\r\n', 1, 1, '1300000', 'f1d47d5cbc.png'),
(86, 'Nike Jordan 1 Low', '033', '30', '0', '40', 18, 15, 'Xanh', '<p>Nike Air Jordan 1 Low l&agrave; một phi&ecirc;n bản cổ thấp của mẫu gi&agrave;y nổi tiếng Air Jordan, được ph&aacute;t h&agrave;nh hầu như tất cả c&aacute;c m&ugrave;a trong năm với rất nhiều phối m&agrave;u đa dạng. Sở hữu một mức gi&aacute; mềm hơn rất nhiều so với một phi&ecirc;n bản Jordan High&nbsp;hoặc Jordan Mid, Air Jordan 1 cổ Low đang thực sự trở th&agrave;nh một cơn sốt trong thị trường Sneaker Việt Nam.</p>\r\n', 1, 1, '1300000', 'e17e387fad.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(23, 'Siêu', 5, 'Đẹp lắm', 1639154839),
(24, 'khánh', 5, 'khánh', 1639155773),
(25, 'Huy', 5, 'dịch vụ rất tốt', 1639225525);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderId` int(11) NOT NULL,
  `sliderName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_mota` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderId`, `sliderName`, `slider_mota`, `slider_image`, `type`) VALUES
(82, 'Chính sách ưu đãi', 'Mua giày sneaker giao tận nơi và tham khảo thêm nhiều sản phẩm khác. Miễn phí vận chuyển toàn quốc cho mọi đơn hàng . Đổi trả dễ dàng. Thanh toán bảo mật.', 'cbdc0693d7.png', 2),
(84, 'Dẫn đầu xu hướng', 'Xu hướng giày thể thao (sneakers) luôn là một trong những “dòng chảy” chính yếu của thời trang được giới mộ điệu thời trang quan tâm nhất.', '97faaffa31.png', 5),
(104, 'Thiết kế hiện đại', 'Sneaker là món đồ không thể thiếu trong tủ đồ của mọi cô gái bởi nó không quá cầu kỳ về hình thức lại khá dễ để kết hợp với bất kì phong cách thời trang nào.', '92ddc604d8.png', 6),
(112, 'RUNNING COLLECTION', 'Tổng hợp những mẫu giày tích hợp những tính năng ưu việt cho việc chạy bộ.', '1221ebe918.jpg', 3),
(113, 'ADIDAS COLLECTION', 'Tổng hợp những mẫu giày đẹp, thời trang , xu hướng.', 'e90eb68469.png', 4),
(114, 'Nike Collection', 'Kể từ những đôi giày đầu tiên mà hãng sản xuất là Nike “Cortez” cũng đã nhận được vô số lời khen cũng như mang đến cho Nike một lượng lớn fan hâm mộ kể từ đó, theo thời gian hãng không ngừng nghiên cứu và phát triển để cho ra mắt những mẫu giày được cải tiến.', 'ed8946e655.png', 7),
(115, 'Adidas Collection', 'Thương hiệu giày Adidas trong hơn 70 năm hình thành và phát triển đã tạo được ấn tượng đặc biệt cho các tín đồ thời trang, đặc biệt là những người yêu thích giày và đã có mặt ở hầu khắp các quốc gia trên Thế giới.', '920a5389fc.png', 8),
(116, 'NIKE COLLECTION', 'Tổng hợp những mẫu giày đẹp, thời trang , xu hướng.', '3cb6b5de2c.png', 9),
(117, 'CONVERSE COLLECTION', 'Tổng hợp những mẫu giày đẹp, thời trang , xu hướng.', '794b1b61e7.png', 11),
(118, 'ADIDAS COLLECTION', 'Tổng hợp những mẫu giày đẹp, thời trang , xu hướng.', 'b2f9893d39.png', 10),
(119, 'VANS COLLECTION', 'Tổng hợp những mẫu giày đẹp, thời trang , xu hướng.', '65936a522f.png', 12),
(120, 'Nike Collection', 'Kể từ những đôi giày đầu tiên mà hãng sản xuất là Nike “Cortez” cũng đã nhận được vô số lời khen cũng như mang đến cho Nike một lượng lớn fan hâm mộ kể từ đó, theo thời gian hãng không ngừng nghiên cứu và phát triển để cho ra mắt những mẫu giày được cải tiến.', '30fde37402.png', 13),
(121, 'Converse Collection', 'Converse là một trong những thương hiệu giày nổi tiếng và uy tín nhất trên thế giới với lịch sử phát triển hơn 100 năm. Đến 60% người Mỹ đều sở hữu ít nhất 1 đôi giày từ nhãn hiệu Converse. Với thiết kế đơn giản, trẻ trung và năng động, Converse trở thành một must-have item trong bộ sưu tập giày của tất cả mọi người.', 'f64ad7ec7d.png', 15),
(122, 'Adidas Collection', 'Thương hiệu giày Adidas trong hơn 70 năm hình thành và phát triển đã tạo được ấn tượng đặc biệt cho các tín đồ thời trang, đặc biệt là những người yêu thích giày và đã có mặt ở hầu khắp các quốc gia trên Thế giới.', 'c0544f03d2.png', 14),
(123, 'Vans Collection', 'Hãng giày Vans được ông Paul Van Doren, một nhân viên nhà máy giày, sáng lập vào năm 1966. Sau vài năm làm việc tại xưởng giày Randy\'s, Doren gặt hái kinh nghiệm và quyết định thành lập một thương hiệu giày của riêng mình.', '1b240a34ce.png', 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_warehouse`
--

CREATE TABLE `tbl_warehouse` (
  `id_warehouse` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `sl_nhap` varchar(50) NOT NULL,
  `sl_ngaynhap` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_warehouse`
--

INSERT INTO `tbl_warehouse` (`id_warehouse`, `id_sanpham`, `sl_nhap`, `sl_ngaynhap`) VALUES
(1, 22, '5', '2019-07-16 18:31:22'),
(2, 21, '10', '2019-07-16 18:32:03'),
(3, 21, '3', '2019-07-16 18:42:59'),
(4, 20, '5', '2019-07-16 18:51:40'),
(5, 34, '50', '2021-11-17 16:11:34'),
(6, 34, '69', '2021-11-17 16:12:42'),
(7, 60, '10', '2021-11-26 04:02:19'),
(9, 66, '1', '2021-12-02 04:00:52'),
(10, 52, '3', '2021-12-03 06:40:07'),
(11, 86, '10', '2021-12-09 05:03:31'),
(12, 85, '5', '2021-12-09 10:01:12'),
(13, 85, '5', '2021-12-09 10:01:35'),
(14, 84, '5', '2021-12-09 10:01:53'),
(15, 80, '2', '2021-12-09 10:20:16');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `productId` (`productId`),
  ADD KEY `productId_2` (`productId`),
  ADD KEY `productId_3` (`productId`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contactId`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`productId`,`customer_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `catId` (`catId`,`brandId`),
  ADD KEY `brandId` (`brandId`);

--
-- Chỉ mục cho bảng `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- Chỉ mục cho bảng `tbl_warehouse`
--
ALTER TABLE `tbl_warehouse`
  ADD PRIMARY KEY (`id_warehouse`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contactId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT cho bảng `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT cho bảng `tbl_warehouse`
--
ALTER TABLE `tbl_warehouse`
  MODIFY `id_warehouse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`catId`) REFERENCES `tbl_category` (`catId`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
