-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 11, 2022 lúc 06:20 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `du_an_mau3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `dm_id` int(11) NOT NULL,
  `dm_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`dm_id`, `dm_name`) VALUES
(4, 'Tai nghe'),
(5, 'Máy tính'),
(6, 'Loa nghe nhạc'),
(7, 'Chuột');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `cntt_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `kh_id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `hd_id` int(11) NOT NULL,
  `kh_name` varchar(255) NOT NULL,
  `kh_email` varchar(255) NOT NULL,
  `kh_phone` varchar(255) NOT NULL,
  `kh_address` varchar(255) NOT NULL,
  `kh_content` text DEFAULT NULL,
  `kh_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `hd_ct_id` int(11) NOT NULL,
  `sp_name` varchar(255) NOT NULL,
  `sp_image` varchar(300) NOT NULL,
  `sp_price` varchar(200) NOT NULL,
  `sp_quantity` int(11) NOT NULL,
  `hd_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `sp_id` int(11) NOT NULL,
  `sp_name` varchar(255) NOT NULL,
  `sp_price` varchar(200) NOT NULL,
  `sp_sale` varchar(200) NOT NULL,
  `sp_quantity` int(11) NOT NULL,
  `sp_description` text NOT NULL,
  `kt_id` int(11) NOT NULL,
  `dm_id` int(11) NOT NULL,
  `sp_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`sp_id`, `sp_name`, `sp_price`, `sp_sale`, `sp_quantity`, `sp_description`, `kt_id`, `dm_id`, `sp_image`) VALUES
(1, 'GIÀY ADIDAS CLIMACOOL VENT NỮ - TRẮNG', '  400000', '300000  ', 20, 'Giày Adidas Climacool Vent là một mẫu giày thể thao với thiết kế rất đẹp và thời trang, bộ đế êm có khả năng đàn hồi cao hỗ trợ tuyệt vời trong quá trình luyện tập. Phần upper công nghệ Climacool giúp đôi giày cực thoáng khi và dễ chịu khi sử dụng.', 9, 1, '27cc2a221a32c6425cd88c04d03c9153.jpg'),
(2, 'GIÀY ADIDAS BRAVADA NAM - TRẮNG ĐEN', ' 500000', '350000 ', 20, 'Giày adidas Bravada mẫu giày được thiết kế Basic cho các tín đồ yêu thời trang. Với các kiểu thiết kế Original này bạn sẽ không bao giờ lo lắng chuyện đôi giày của bạn bị lỗi mốt theo năm tháng.', 6, 1, 'images (1).jpg'),
(3, 'GIÀY NIKE AIR ZOOM PEGASUS 39 NỮ- XÁM', ' 500000', '450000 ', 20, 'Giày Nike Air Zoom Pegasus 39 là mẫu giày thể thao phiên bản thứ 39 của dòng giày huyền thoại Nike Pegasus nổi tiếng. Với những cải tiến vượt trội đặc biệt với việc gấp 2 lần lớp đệm Air Zoom so với phiên bản trước, Nike Air Zoom Pegasus 39 xứng đáng là siêu phẩm được săn đón nhất năm 2022.', 6, 3, 'images (5).jpg'),
(11, 'Laptop Acer Nitro Gaming AN515-57-54MV i5', ' 17000000', '15000000 ', 10, 'Câu hỏi thường gặp\r\nCó thiết kế quá mỏng nhẹ, liệu Lenovo Yoga Slim 7 Pro 14IHU5O có đảm bảo về trải nghiệm pin?\r\n\r\nCó công nghệ âm thanh nào đặc biệt trên Lenovo Yoga Slim 7 Pro 14IHU5O không?\r\n\r\nLenovo Yoga Slim 7 Pro 14IHU5O dùng màn hình OLED hay LCD?\r\n\r\nTôi muốn chơi game eSports trên Lenovo Yoga Slim 7 Pro 14IHU5O, liệu sản phẩm có đáp ứng được nhu cầu hay không?\r\n\r\nLenovo Yoga Slim 7 Pro 14IHU5O mỏng bao nhiêu, có trọng lượng thế nào?', 12, 5, '637971149907512230_lenovo-ideapad-gaming-3-15iah7-xam-dd.webp'),
(12, 'Tai nghe bluetooth Xiaomi Redmi Buds 3 Lite', ' 6400000', '300000 ', 10, 'Với Redmi buds 3 Lite, bạn sẽ có được một lựa chọn ấn tượng khi tìm mua tai nghe True Wireless giá phải chăng. Sản phẩm ghi nhận thời lượng pin tối đa 18 giờ, cho cảm giác đeo an toàn và thoải mái, thể hiện chất âm ấn tượng và đạt chuẩn chống bụi và nước IP54.', 16, 4, '637523738137561484_tai-nghe-airpods-max-dd-1.webp'),
(13, 'Tai nghe AirPods 2 hộp sạc dây', ' 450000', '300000 ', 15, 'Kế thừa toàn bộ tinh hoa của chiếc tai nghe AirPods đời đầu, tai nghe AirPods 2 được Apple bổ sung nhiều nâng cấp hiệu quả để gia tăng thời lượng pin cũng như tối ưu hóa âm thanh để trở thành một trong những mẫu tai nghe True Wireless có công nghệ tốt nhất.', 15, 6, '637804327078939087_tai-nghe-tws-xiaomi-redmi-buds-3-lite-den-dd.webp'),
(14, 'Laptop Acer Nitro Gaming AN515-57-54MV i5', ' 640000', '300000 ', 15, 'Hướng dẫn & tư vấn về Acer Nitro Gaming AN515-57-54MV i5 11400H (NH.QENSV.003)', 17, 5, '637407970062806725_mba-2020-gold-dd.webp'),
(15, 'Laptop Nitro Gaming AN515-57-54MV i5', ' 19500000', '17500000 ', 15, 'Laptop Acer Nitro Gaming AN515-57-54MV i5 11400H/8GB/512GB/15.6\"FHD/NVIDIA GeForce RTX 3050 4GB/Win10', 13, 5, '637696541426162655_dell-inspiron-n3511-den-dd.webp'),
(16, 'Laptop  Gaming AN515-57-54MV i5', ' 17500000', '16500000 ', 14, '', 13, 5, '637663485438013374_msi-modern-14-xam-dd.webp'),
(17, 'Chuột không dây Rapoo 1620', ' 450000', '300000 ', 24, 'Chuột không dây Rapoo 1620', 14, 7, '636764212069190085_chuot-khong-day-zadez-m390-1o.webp'),
(18, 'Loa vi tính SoundMax A180 ', ' 400000', '350000 ', 20, 'Loa vi tính SoundMax A180 ', 17, 6, '636834211696157887_00529900-daidien.webp'),
(19, 'Loa vi tính SoundMax A180', ' 400000', '320000 ', 10, 'Loa vi tính SoundMax A180', 17, 6, '637714692279012327_loa-bluetooth-jbl-go-2-dd.webp'),
(20, 'Loa Bluetooth Xiaomi Mi Compact Speaker 2', ' 450000', '360000 ', 10, 'Loa Bluetooth Xiaomi Mi Compact Speaker 2', 14, 6, '637509832735277493_loa-bluetooth-compact-2-dd.webp'),
(21, 'Tai nghe AirPods 2 hộp sạc dây ', ' 340000', '200000 ', 10, 'Tai nghe AirPods 2 hộp sạc dây ', 16, 4, '637703243707644047_tai-nghe-airpods-3-2021-dd.webp'),
(22, 'Laptop ADC Gaming AN515-57-54MV i5', ' 15550000', '13000000 ', 10, 'Tai nghe AirPods 2 hộp sạc dây ', 12, 5, '637738603461090929_lenovo-100e-gen-2-n4020-win-10-pro-dd.webp'),
(23, 'Laptop Beuti Gaming AN515-57-54MV i5', ' 23000000', '21000000 ', 23, 'Laptop Beuti Gaming AN515-57-54MV i5', 15, 5, '638006467071200088_gigabyte-gaming-g5-dd-bh (1).webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `kt_id` int(11) NOT NULL,
  `kt_name` varchar(255) NOT NULL,
  `kieu_display` int(11) NOT NULL DEFAULT 0,
  `ma_color` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`kt_id`, `kt_name`, `kieu_display`, `ma_color`) VALUES
(12, 'To', 1, '#000000'),
(13, 'Nhỏ', 1, '#000000'),
(14, 'Lớn', 1, '#000000'),
(15, 'Đen', 2, '#000000'),
(16, 'Xám ', 2, '#9d9595'),
(17, 'Hồng', 2, '#f45757'),
(18, 'Cam', 2, '#f53d00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `kh_id` int(11) NOT NULL,
  `kh_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kh_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kh_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kh_avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `kh_phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`kh_id`, `kh_name`, `kh_password`, `kh_email`, `kh_avatar`, `role`, `kh_phone`) VALUES
(13, 'Uy nguyễn', '$2y$10$cz5qaWtLa52mYuCLfxsJ4edKyyv09UrDMOwAcwvJzrQNBQziFsin.', ' uynnph15055@fpt.edu.vn', 'anh-lam-viec-nhom-dep.jpg ', 1, '0349791128'),
(14, 'Hoàng', '$2y$10$oEO6xJKQ0zBEFgXXhDTeIuj0UTv2UI7B9vIKAkq3fn9ebzBMIS8em', ' hoangnguyen@gmail.com', 'xiaomi-mi-smart-standing-fan-2-lite-foto_1024x1024@2x.webp ', 1, '0349791128'),
(16, 'Duy anh', '$2y$10$4vqMijOAbv8NYseavLLsIezfV33vAUEBwlZzX8h7RitiVC3GrTGyC', ' duyanhnguyen123@gmail.com', 'tải xuống.jpg ', 1, '0349791128'),
(17, 'Nguyễn Ngọc Toàn', '$2y$10$l51VwoJ8DCLWdFl97jXIZuo.TbNI5SYjW7DCdMhKBCyVNMTPCLjlO', ' toannnph15055@fpt.edu.vn', 'images (1).jpg ', 0, '0349791128');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`dm_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cntt_id`),
  ADD KEY `Fk_product_id` (`sp_id`),
  ADD KEY `FK_user_id` (`kh_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`hd_id`),
  ADD KEY `FK_customer` (`kh_id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`hd_ct_id`),
  ADD KEY `FK_product` (`sp_id`),
  ADD KEY `FK_order` (`hd_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`sp_id`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`kt_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kh_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `dm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `cntt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `hd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `hd_ct_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `kt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `kh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_user_id` FOREIGN KEY (`kh_id`) REFERENCES `user` (`kh_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_product_id` FOREIGN KEY (`sp_id`) REFERENCES `product` (`sp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `FK_customer` FOREIGN KEY (`kh_id`) REFERENCES `user` (`kh_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `FK_order` FOREIGN KEY (`hd_id`) REFERENCES `order` (`hd_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_product` FOREIGN KEY (`sp_id`) REFERENCES `product` (`sp_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
