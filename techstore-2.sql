-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 13, 2022 lúc 10:08 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `techstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `caption` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `content` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `photo` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `caption`, `content`, `photo`, `status`, `create_at`) VALUES
(1, 'Sale up to 1110%', 'Nhanh tay nào bạn tôi ơi', 'slide1.jpg', 1, '2022-04-04 19:12:16'),
(2, 'Mùa hè sôi động', 'Nhanh chân nào bạn tôi ơi', 'slide2.jpg', 1, '2022-07-07 00:00:00'),
(3, 'Mua 1 tặng 1', 'Nhanh chân nào bạn tôi ơi', 'slide3.jpg', 1, '2022-07-07 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`brand_id`, `name`, `status`, `created_at`) VALUES
(1, 'Apple', 1, '2022-03-21 00:00:00'),
(2, 'Samsung', 1, '2022-04-07 15:24:28'),
(3, 'Oppo', 2, '2022-04-07 15:24:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `name`, `status`, `created_at`) VALUES
(1, 'Điện thoại', 1, '2022-03-21 00:00:00'),
(2, 'Máy tính bảng', 0, '2022-03-21 00:00:00'),
(3, 'Đồng hồ', 0, '2022-03-21 00:00:00'),
(4, 'Laptop', 0, '2022-03-21 00:00:00'),
(5, 'Phụ kiện', 0, '2022-03-21 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `color_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `code` varchar(20) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`color_id`, `name`, `code`) VALUES
(1, 'Đen', ''),
(2, 'Trắng', ''),
(3, 'Đỏ', ''),
(4, 'Vàng', ''),
(8, 'Xanh', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `feedback_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`comment_id`, `customer_id`, `employee_id`, `feedback_id`, `content`, `created_at`) VALUES
(1, 1, 0, 3, 'abc', '2022-04-13 09:29:56'),
(2, 1, 0, 3, 'ok', '2022-04-13 09:34:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `phone` char(10) COLLATE utf8_bin DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `phone`, `birthday`, `gender`, `email`, `address`, `password`, `status`, `created_at`) VALUES
(1, 'Gia Phuc', '0364536930', '2022-04-03 00:00:00', 1, 'a@gmail.com', '34 Hai Bà Trưng', '202cb962ac59075b964b07152d234b70', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `phone` char(10) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `employee`
--

INSERT INTO `employee` (`employee_id`, `name`, `gender`, `birthday`, `phone`, `email`, `password`, `status`, `role_id`, `created_at`) VALUES
(1, 'giaphuc', 1, '2022-04-18 00:00:00', '0345693162', 'a@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 1, '2022-04-05 14:40:24'),
(2, 'Minh Hung', 1, '2022-04-18 00:00:00', '0345693169', 'abc@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 1, '2022-04-05 14:40:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `caption` varchar(100) NOT NULL,
  `content` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `customer_id`, `caption`, `content`, `status`, `created_at`) VALUES
(3, 1, 'Hài lòng', 'Trên cả tuyệt vời', 1, '2022-04-04 00:00:00'),
(4, 1, 'Hài lòng', 'Giá cả phải chăng', 1, '0000-00-00 00:00:00'),
(5, 1, 'Tệ', 'Kém chất lượng', 1, '0000-00-00 00:00:00'),
(6, 1, 'Hài lòng', 'Dịch vụ tuyệt vời', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `liked`
--

CREATE TABLE `liked` (
  `customer_id` int(11) NOT NULL,
  `feedback_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderdetail_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`orderdetail_id`, `product_id`, `orders_id`, `color_id`, `quantity`) VALUES
(24, 10, 83, 1, 2),
(25, 11, 83, 2, 1),
(26, 10, 84, 1, 2),
(27, 10, 85, 1, 2),
(28, 10, 86, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `address` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `note` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `total` double DEFAULT NULL,
  `order_code` double DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`orders_id`, `customer_id`, `address`, `note`, `total`, `order_code`, `status`, `created_at`, `employee_id`) VALUES
(83, 1, '34 Hai Bà Trưng', '', 43000000, 12341234, 2, '2022-04-11 11:37:05', NULL),
(84, 1, '34 Hai Bà Trưng', '', 28000000, 0, 1, '2022-04-11 11:48:01', NULL),
(85, 1, '34 Hai Bà Trưng', '', 28000000, 0, 1, '2022-04-11 11:51:43', NULL),
(86, 1, '34 Hai Bà Trưng', '', 28000000, 0, 1, '2022-04-11 11:53:27', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `brand_id`, `name`) VALUES
(1, 4, 1, 'macbook'),
(2, 3, 1, 'apple watch'),
(4, 2, 3, 'Oppo I2'),
(5, 2, 3, 'Oppo I2'),
(6, 2, 3, 'Oppo I4'),
(7, 2, 3, 'Oppo A4'),
(8, 2, 3, 'Oppo K5'),
(9, 2, 3, 'Oppo GSX'),
(10, 1, 1, 'Iphone X'),
(11, 1, 1, 'Iphone X'),
(12, 1, 1, 'Iphone 12'),
(13, 1, 1, 'Iphone 13pro'),
(14, 1, 1, 'Iphone 13mini'),
(15, 1, 1, 'Iphone 12pro'),
(16, 1, 1, 'Iphone 11pro'),
(17, 1, 1, 'Iphone SXMAX'),
(18, 1, 1, 'Iphone 7'),
(19, 1, 1, 'Iphone 8'),
(20, 3, 2, 'Samsung Watch ARs'),
(22, 3, 2, 'Samsung Watch'),
(26, 5, 1, 'Bàn phím'),
(27, 5, 1, 'Bàn phím'),
(28, 5, 1, 'Chuột'),
(29, 5, 1, 'Tay nghe'),
(30, 5, 1, 'Cáp sạc'),
(31, 1, 1, 'Iphone Xs Max 16GB');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`role_id`, `role`) VALUES
(1, 'admin'),
(2, 'staff');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `storehouse`
--

CREATE TABLE `storehouse` (
  `storehouse_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `storehouse`
--

INSERT INTO `storehouse` (`storehouse_id`, `product_id`, `color_id`, `price`, `quantity`, `image`, `description`, `create_at`) VALUES
(1, 1, 4, 15000000, 50, 'product-01.png', 'Hàng chính hãng 100%', '2022-04-07 21:40:40'),
(2, 2, 1, 15000000, 100, 'product-01.png', 'Hàng like new 99%', '2022-04-07 21:41:30'),
(3, 2, 1, 15000000, 50, 'product-01.png', 'Hàng chính hãng 100%', '2022-04-07 21:44:07'),
(4, 1, 1, 15000000, 50, 'product-01.png', 'Hàng chính hãng 100%', '2022-04-07 21:44:07'),
(5, 1, 1, 15000000, 50, 'product-01.png', 'Hàng chính hãng 100%', '2022-04-07 21:44:07'),
(6, 1, 1, 15000000, 50, 'product-01.png', 'Hàng chính hãng 100%', '2022-04-07 21:44:07'),
(7, 1, 1, 15000000, 50, 'product-01.png', 'Hàng chính hãng 100%', '2022-04-07 21:44:07'),
(8, 19, 2, 15000000, 100, 'product-01.png', 'Hàng like new', '2022-04-06 22:00:10'),
(9, 19, 2, 15000000, 100, 'product-01.png', 'Hàng like new', '2022-04-06 22:00:10'),
(10, 20, 2, 15000000, 100, 'product-01.png', 'Hàng like new', '2022-04-06 22:00:10'),
(11, 17, 4, 15000000, 100, 'product-01.png', 'Hàng like new', '2022-04-06 22:00:10'),
(12, 15, 3, 15000000, 100, 'product-01.png', 'Hàng like new', '2022-04-06 22:00:10'),
(13, 14, 2, 15000000, 100, 'product-01.png', 'Hàng like new', '2022-04-06 22:00:10'),
(14, 13, 1, 15000000, 100, 'product-01.png', 'Hàng like new 99%', NULL),
(15, 13, 1, 15000000, 100, 'product-01.png', 'Hàng like new 99%', NULL),
(16, 12, 3, 15000000, 100, 'product-01.png', 'Hàng like new 99%', NULL),
(17, 11, 2, 15000000, 100, 'product-01.png', 'Hàng like new 99%', NULL),
(18, 10, 4, 15000000, 100, 'product-01.png', 'Hàng like new 99%', NULL),
(19, 9, 2, 15000000, 100, 'product-01.png', 'Hàng like new 99%', NULL),
(20, 27, 4, 15000000, 50, 'product-01.png', 'Chính hãng 100%', NULL),
(21, 27, 4, 15000000, 50, 'product-01.png', 'Chính hãng 100%', NULL),
(22, 28, 2, 15000000, 50, 'product-01.png', 'Chính hãng 100%', NULL),
(23, 29, 1, 15000000, 50, 'product-01.png', 'Chính hãng 100%', NULL),
(24, 30, 1, 15000000, 50, 'product-01.png', 'Chính hãng 100%', NULL),
(25, 10, 1, 14000000, 10, 'product-01.png\r\n', 'Hàng like new', '2022-04-09 05:18:34'),
(26, 1, 2, 34000000, 16, '', 'Hàng like new', '2022-04-09 05:25:24');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `feedback_id` (`feedback_id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `liked`
--
ALTER TABLE `liked`
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `feedback_id` (`feedback_id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`orderdetail_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `orders_id` (`orders_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `orders_ibfk_2` (`employee_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `storehouse`
--
ALTER TABLE `storehouse`
  ADD PRIMARY KEY (`storehouse_id`),
  ADD KEY `color_id` (`color_id`),
  ADD KEY `product_id` (`product_id`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `orderdetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `storehouse`
--
ALTER TABLE `storehouse`
  MODIFY `storehouse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`feedback_id`) REFERENCES `feedback` (`feedback_id`);

--
-- Các ràng buộc cho bảng `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Các ràng buộc cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `orders` (`customer_id`);

--
-- Các ràng buộc cho bảng `liked`
--
ALTER TABLE `liked`
  ADD CONSTRAINT `liked_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `liked_ibfk_2` FOREIGN KEY (`feedback_id`) REFERENCES `feedback` (`feedback_id`);

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `storehouse` (`product_id`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`orders_id`),
  ADD CONSTRAINT `orderdetail_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `storehouse` (`color_id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Các ràng buộc cho bảng `storehouse`
--
ALTER TABLE `storehouse`
  ADD CONSTRAINT `storehouse_ibfk_1` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`),
  ADD CONSTRAINT `storehouse_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
