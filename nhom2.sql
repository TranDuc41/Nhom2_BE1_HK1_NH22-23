-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 10, 2022 lúc 01:02 PM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhom2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soLuong` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `image`, `price`, `name`, `soLuong`) VALUES
(55, '13', 17, 'AppleWatchS8.jpeg', 11990000, 'Apple Watch S8', 1),
(56, '13', 5, 'SamsungGlxZFlip4.jpg', 20690000, 'Samsung Galaxy Z Flip4', 1),
(60, '13', 6, 'xiaomiredmibook15.jpg', 13290000, 'Xiaomi RedmiBook 15', 1),
(63, '13', 7, 'MacBookAirM1_2020.jpg', 23490000, 'Apple MacBook Air M1', 1),
(130, '2', 24, 'TrueWirelessSamsungGalaxyBuds2.jpg', 2990000, 'Samsung Galaxy Buds 2', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_id` int(11) NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(100) NOT NULL,
  PRIMARY KEY (`manu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(1, 'Apple'),
(2, 'Oppo'),
(3, 'Samsung'),
(4, 'Xiaomi'),
(5, 'Sony\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `manu_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `pro_image` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `feature` tinyint(4) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `price`, `pro_image`, `description`, `feature`, `so_luong`, `created_at`) VALUES
(1, 'Iphone 13 pro max', 1, 1, 28690000, 'Iphone13promax.jpg', 'Điện thoại iPhone 13 Pro Max 128GB\r\nThiết kế đặc trưng với màu sắc thời thượng\r\nNâng cấp màn hình với tần số quét 120 Hz\r\nQuay chụp đỉnh cao với camera Pro\r\nHiệu năng đột phá với Apple A15 Bionic\r\nNâng cấp thời lượng pin', 1, 0, '2022-10-26 03:35:11'),
(2, 'iPhone 14 Pro Max', 1, 1, 41490000, 'Iphone14promax.jpg', 'Điện thoại iPhone 14 Pro Max 1TB\r\nThiết kế cao cấp và vẻ ngoài sành điệu\r\nĐột phá với thiết kế Dynamic island\r\niPhone 14 Pro Max với nhiều màu sắc rực rỡ\r\nMàn hình chất lượng cho những trải nghiệm xem tuyệt vời\r\niPhone 14 Pro Max sở hữu cụm cam chất lượng\r\niPhone 14 Pro Max với chip xử lý A16 Bionic mang lại sức mạnh đáng kinh ngạc\r\nPin đáp ứng đủ cho cả ngày dài\r\nĐáp ứng mọi nhu cầu lưu trữ với nhiều phiên bản bộ nhớ', 0, 50, '2022-11-18 09:53:50'),
(3, 'Oppo Reno 8', 2, 1, 8500000, 'OppoReno8pro.jpg', 'Điện thoại OPPO Reno8 Pro 5G\r\nVẻ ngoài thời thượng\r\nKhông gian hiển thị rộng lớn\r\nNhiếp ảnh chuyên nghiệp nhờ camera chất lượng\r\nHiệu năng mạnh mẽ cân mọi tác vụ hàng ngày\r\nHỗ trợ sạc pin nhanh chóng', 1, 0, '2022-10-26 03:39:15'),
(4, 'Samsung Galaxy S22 Ultra', 3, 1, 25000000, 'SamsungGlxS22ultra.jpg', 'Điện thoại Samsung Galaxy S22 Ultra 5G 128GB\r\nThiết kế khác biệt hoàn toàn thế hệ trước\r\nLần đầu tiên S Pen xuất hiện\r\nCamera độ phân giải cao, zoom cực xa\r\nNâng cao trải nghiệm thị giác\r\nHiệu năng khủng với chip nhà Qualcomm\r\nPin thoải mái sử dụng một ngày\r\n', 0, 0, '2022-11-05 16:24:50'),
(5, 'Samsung Galaxy Z Flip4', 3, 1, 20690000, 'SamsungGlxZFlip4.jpg', 'Điện thoại Samsung Galaxy Z Flip4 128GB\r\nDẫn đầu xu hướng thiết kế mới \r\nNâng tầm trải nghiệm smartphone \r\nSở hữu màn hình cao cấp\r\nẢnh chụp bắt trọn vẻ đẹp từ mọi khung cảnh\r\nSức mạnh đáng kinh ngạc đến từ Qualcomm\r\nHỗ trợ sạc pin nhanh chóng', 1, 0, '2022-10-26 03:42:42'),
(6, 'Xiaomi RedmiBook 15', 4, 2, 13290000, 'xiaomiredmibook15.jpg', 'Laptop Xiaomi RedmiBook 15 JYU4506AP\r\nChip Intel thế hệ 11 mạnh mẽ\r\nMàn hình Full HD kèm chế độ DC Dimming thông minh\r\nThiết kế trang nhã, màu sắc thanh lịch\r\nWindows 11 Home mới nhất, loa âm thanh nổi sống động', 1, 0, '2022-11-04 10:53:33'),
(7, 'Apple MacBook Air M1', 1, 2, 23490000, 'MacBookAirM1_2020.jpg', 'Laptop Apple MacBook Air M1 2020 16GB256GB7-core GPU (Z124000DE)\r\nHiệu năng ấn tượng đến từ chip M1\r\nMàn hình Retina hiển thị sắc nét, màu sắc chính xác\r\nVẻ ngoài sang trọng, đẳng cấp\r\n', 1, 0, '2022-11-11 09:10:24'),
(8, 'MacBook Pro 16 M1', 1, 2, 82900000, 'MacBookPro16M1.jpg', 'Laptop Apple MacBook Pro 16 M1 Max 2021 10 core-CPU/32GB/1TB SSD/32 core-GPU (MK1A3SA/A) \r\nHiệu năng vượt trội, chinh phục mọi tác vụ\r\nHình ảnh hiển thị sắc nét, màu sắc rực rỡ\r\nThiết kế hiện đại, thời thượng\r\n', 0, 0, '2022-11-05 16:26:06'),
(9, 'MacBook Pro M2', 1, 2, 32990000, 'MacBookProM2.jpg', 'Laptop Apple MacBook Pro M2 2022 8GB/256GB/10-core GPU (MNEH3SA/A)\r\nHiệu năng vượt trội của dòng chip thế hệ mới\r\nThao tác nhanh hơn với bộ đôi chip M2 và MacOS\r\nMàn hình Retina kết hợp công nghệ True Tone mang lại hình ảnh sống động, lôi cuốn\r\nThiết kế quyến rũ, biểu tượng cho sự hoàn mỹ thu hút mọi ánh nhìn\r\nMacbook Pro M2 một studio thu nhỏ trong tầm tay\r\nCông nghệ tân tiến, tiện ích cao.\r\n....', 1, 0, '2022-10-26 03:44:25'),
(10, 'MacBook Pro 14 M1 Max', 1, 2, 16490000, 'MacBookPro14M1Max.jpg', 'Laptop MacBook Pro 14 M1 Max 2021 10-core CPU/32GB/512GB/24-core GPU (Z15G) \r\nThiết kế hiện đại, đẳng cấp, thời thượng\r\nCấu hình \"khủng\", đa nhiệm mượt mà mọi tác vụ nặng\r\nKết nối hiện đại, an toàn bảo mật\r\nGiải trí không giới hạn siêu nét, chi tiết, chân thực', 1, 0, '2022-10-26 03:46:11'),
(11, 'Sony Extra Bass SRS-XB01', 5, 3, 680000, 'SonyExtraBassSRS-XB01.jpg', 'Loa Bluetooth Sony Extra Bass SRS-XB01 \r\nThiết kế nhỏ gọn, di động, dễ mang lại di chuyển.\r\nKhả năng chống thấm nước đạt chuẩn IPX5.\r\nCông suất 3 W đủ đáp ứng nghe nhạc trong không gian nhỏ.\r\nCông nghệ Extra Bass độc quyền cho âm thanh mạnh mẽ hơn.\r\nPin có thể nghe nhạc liên tục trong 6 giờ.\r\nCác nút điều khiển trên loa: Bật nguồn, phát/dừng nhạc, nhận cuộc gọi, tăng âm lượng.\r\nVới micro tích hợp, nhận cuộc gọi trên điện thoại thông minh qua loa dễ dàng.\r\nThương hiệu Sony đến từ Nhật Bản, nổi tiếng toàn cầu trong lĩnh vực công nghệ, điện tử.', 1, 0, '2022-10-26 03:56:30'),
(12, 'Loa Sony HT-A7000 ', 5, 3, 31990000, 'LoaSonyHT-A7000.png', 'Loa thanh Sony HT-A7000 \r\nThiết kế dạng khối tối giản\r\nÂm thành vòm sống động\r\nÂm thanh chân thực\r\nĐiều khiển loa thanh linh hoạt.', 1, 0, '2022-10-26 03:54:21'),
(13, 'Sony Extra Bass SRS-XB23', 5, 3, 1750000, 'SonyExtraBassSRS-XB23.jpg', 'Loa Bluetooth Sony Extra Bass SRS-XB23\r\nThiết kế đẹp mắt, nhiều màu sắc, có dây treo.\r\nÂm thanh sôi động nhờ công nghệ Extra Bass.\r\nMàng loa độc đáo cho âm thanh chi tiết, hạn chế méo tiếng.\r\nKết nối 100 loa cùng lúc với tính năng Party Connect.\r\nYên tâm sử dụng với khả năng chống nước, chống bụi chuẩn IP67.\r\nĐiều chỉnh âm thanh tùy thích trên điện thoại qua ứng dụng Sony | Music Center.\r\nThời gian dùng liên tục 12 giờ, sạc đầy 4 tiếng.', 1, 0, '2022-10-26 03:55:34'),
(14, 'Sony SRS-XE200', 5, 3, 2590000, 'SonySRS-XE200.jpg', 'Loa Bluetooth Sony SRS-XE200 Cam\r\n Kiểu dáng đơn giản với dạng hình trụ lạ mắt, màu cam nổi bật. Trên thân loa được bổ sung thêm dây xách tiện lợi, khối lượng gọn nhẹ, dễ mang theo trong mọi cuộc hành trình.\r\n\r\n• Loa Bluetooth mang đến bộ khuếch tán âm chất lượng giúp âm thanh lan toả khắp không gian, chất âm sống động, mạnh mẽ.\r\n\r\n• Trang bị thêm mic tiện lợi cho bạn thoải mái nghe, gọi ngay trên loa vô cùng tiện lợi.\r\n\r\n• Loa Sony trang bị kháng bụi và nước cao nhất IP67 cho phép loa vẫn hoạt động an toàn ngay cả khi rớt xuống nước, thậm chí là nước biển.\r\n\r\n• Dung lượng pin khủng cho thời gian sử dụng liên tục lên tới 16 giờ. Khi hết pin, bạn có thể sạc nhanh tiện lợi.', 1, 0, '2022-10-26 03:57:19'),
(15, 'Sony SA-SW3', 5, 3, 8000000, 'SonySA-SW3.jpeg', 'Loa siêu trầm không dây tùy chọn Sony SA-SW3 \r\nThiết kề mệm mại sang trọng\r\nÂm thanh mạnh mẽ\r\nÂm thanh phát ra rõ nét\r\nKết nối không dây thuận tiện', 0, 0, '2022-10-26 03:58:27'),
(16, 'Apple Watch Series 7', 1, 4, 12900000, 'AppleWatchSeries7.jpg', 'Apple Watch Series 7 LTE 41mm\r\nThiết kế hiện đại và sang trọng\r\nMàn hình OLED có độ sáng cao, sắc nét\r\nHệ điều hành WatchOS 8 tối ưu tốt\r\nSở hữu bộ sưu tập mặt đồng hồ đa dạng\r\nNghe gọi trực tiếp trên đồng hồ với eSim\r\nThời lượng pin 1.5 ngày cho 1 lần sạc\r\nHỗ trợ theo dõi sức khỏe liên tục\r\nAn toàn hơn với tính năng phát hiện té ngã\r\nNhiều chế độ luyện tập và mức độ khác nhau\r\nĐi kèm nhiều tiện ích khác', 1, 0, '2022-10-26 04:01:15'),
(17, 'Apple Watch S8', 1, 4, 11990000, 'AppleWatchS8.jpeg', 'Đồng hồ thông minh Apple Watch S8 GPS 45mm\r\nKiểu dáng hiện đại, phù hợp với đa dạng phong cách\r\nHiệu năng mạnh mẽ với con chip độc quyền mới nhất\r\nAn toàn khi đi một mình với hệ thống cảm biến và định vị tiên tiến\r\nChăm sóc sức khỏe toàn diện và chính xác\r\nĐồng hành cùng bạn trong mọi buổi tập\r\nViên pin đủ dùng, hỗ trợ chống nước chuẩn 5 ATM\r\nNghe gọi độc lập với eSIM hiện đại\r\nĐa dạng các tiện ích đi kèm', 1, 0, '2022-10-26 04:02:40'),
(18, 'Apple Watch SE 2022', 1, 4, 7490000, 'AppleWatchSE2022.jpeg', 'Đồng hồ thông minh Apple Watch SE 2022 LTE 44mm\r\nKiểu dáng sang chảnh, màu sắc hợp thời trang\r\nHỗ trợ kết nối Bluetooth để nhận thông báo trò chuyện ngay trên đồng hồ\r\nHiệu năng vượt trội, khả năng xử lý mượt mà nhờ chip S8 và hệ điều hành mới nhất\r\nCảm biến hiện đại cho phép đo lường và theo dõi chính xác tình trạng sức khỏe người dùng\r\nĐồng hành cùng bạn trong mọi chế độ luyện tập\r\nKết nối eSIM tiện lợi\r\n', 1, 0, '2022-10-26 04:04:00'),
(19, 'Samsung Galaxy Watch 4 ', 3, 4, 4390000, 'SamsungGalaxyWatch4.jpg', 'Đồng hồ thông minh Samsung Galaxy Watch 4 44mm Đen\r\nKiểu dáng thời thượng, mang nét đặc trưng của nhà Samsung\r\nTrang bị chip Exynos W920 cho hiệu năng mạnh mẽ\r\nHệ điều hành Wear OS cải tiến - One UI Watch 3.5\r\nTấm nền Super AMOLED hiển thị màu sắc rõ nét\r\nKết nối Bluetooth v5.0\r\nThời lượng pin 1.5 ngày\r\nThoải mái thay đổi phong cách với bộ sưu tập mặt đồng hồ đa dạng\r\nTheo dõi sức khoẻ tối ưu hơn\r\nThoải mái tắm, đi mưa nhờ chỉ số chống nước 5 ATM', 1, 0, '2022-10-26 04:05:28'),
(20, 'Xiaomi Watch S1', 4, 4, 4190000, 'XiaomiWatchS1.jpg', 'Đồng hồ thông minh Xiaomi Watch S1 Active 47mm\r\nVẫn mang một phong cách thiết kế năng động đậm chất thể thao nhưng được trang bị một màn hình có kích thước lớn hơn cùng việc hỗ trợ tần số quét 60 Hz, hệ điều hành MIUI được tuỳ biến riêng cho smartwatch, Xiaomi Watch S1 Active sẽ mang lại cho người dùng những trải nghiệm sử dụng mới mẻ hơn so với thế hệ tiền nhiệm.', 1, 0, '2022-10-26 04:06:31'),
(21, 'MagSafe Charge', 1, 5, 4550000, 'AirPodsProMagSafe.jpeg', 'Tai nghe Bluetooth AirPods Pro MagSafe Charge Apple MLWK3 Trắng\r\nVẻ ngoài thời trang, kiểu dáng nhỏ gọn, đeo chắc chắn với 3 size nút tai. \r\nTái tạo âm thanh sống động, phù hợp với ống tai bạn nhờ chip H1, công nghệ Adaptive EQ.\r\nKiểm soát âm thanh tai nghe hiệu quả với công nghệ chống ồn chủ động (Active Noise Cancellation) cùng xuyên âm (Transparency mode).\r\nNghe nhạc đến 4.5 giờ khi bật chống ồn, 5 giờ khi tắt chống ồn.\r\nSử dụng song song với hộp sạc có thể dùng được đến 24 giờ nghe nhạc.\r\nHỗ trợ sạc nhanh trong 5 phút có 1 giờ sử dụng. \r\nSạc không dây tiện lợi với bộ sạc Magsafe, chuẩn không dây Qi. \r\nAn tâm khi gặp mưa nhỏ, luyện tập ra nhiều mồ hôi với chuẩn chống nước IPX4.\r\nSản phẩm chính hãng Apple, nguyên seal 100%.', 1, 0, '2022-11-05 03:25:27'),
(22, 'OPPO ENCO Air 2 Pro', 2, 5, 1990000, 'TrueWirelessOPPOENCOAir2Pro.jpg', 'Tai nghe Bluetooth True Wireless OPPO ENCO Air 2 Pro ETE21\r\nThiết kế gọn gàng, kiểu dáng sang trọng, màu sắc trang nhã\r\nÂm thanh sống động, dải âm rõ ràng, chi tiết\r\nHỗ trợ mic đàm thoại tiện dụng\r\nCảm ứng nhanh nhạy, điều khiển dễ dàng, chức năng đa dạng\r\nCông nghệ Bluetooth 5.2 hiện đại cho kết nối mượt mà, ổn định\r\nChống nước chuẩn IP54\r\nThời gian sử dụng, cổng sạc Type-C', 1, 0, '2022-11-05 03:24:56'),
(23, 'Sony WH-1000XM4', 5, 5, 8490000, 'SonyWH-1000XM4.jpg', 'Tai nghe chụp tai Bluetooth Sony WH-1000XM4\r\nThiết kế trẻ trung, gọn nhẹ dễ dàng mang theo bên mình.\r\nChất âm chân thực, sâu lắng với màng loa 40 mm, màng chắn Polymer tinh thể lỏng (LCD) và công nghệ Hi-Res Audio.\r\nTự động ngừng phát nhạc khi bạn trò chuyện và phát nhạc lại khi bạn ngừng nói chuyện.\r\nTự động điều chỉnh âm thanh cho phù hợp với hành động của bạn, đem đến trải nghiệm tuyệt vời.\r\nTự động ngừng phát nhạc khi bạn tháo tai nghe ra.\r\nHạ thấp âm lượng chỉ với một cái chạm vào tai nghe.\r\nThỏa sức nghe nhạc cả ngày dài với thời lượng pin khủng đến 30 giờ, và sạc lại trong 3 giờ.\r\nCông nghệ chống ồn HD QN1 cho chất lượng âm hoàn hảo khi thưởng thức.\r\nKiểm soát việc vận hành của tai nghe một cách nhanh chóng và đơn giản.', 1, 0, '2022-10-26 04:09:07'),
(24, 'Samsung Galaxy Buds 2', 3, 5, 2990000, 'TrueWirelessSamsungGalaxyBuds2.jpg', 'Tai nghe Bluetooth True Wireless Samsung Galaxy Buds 2 Pro R510N Trắng\r\nThiết kế thời thượng, cá tính.\r\nChất âm chuẩn studio với loa 2 chiều.\r\nHiệu quả chống ồn lên đến 98%.\r\nĐàm thoại dễ dàng với 3 micro và bộ cảm biến nhận diện giọng nói.\r\nĐồng bộ với các thiết bị Samsung Galaxy.\r\nThời gian nghe nhạc: Khoảng 5 giờ (bật chống ồn), khoảng 7.5 giờ (tắt chống ồn).\r\nThời gian đàm thoại: Khoảng 3.5 giờ (bật chống ồn), khoảng 3.5 giờ (tắt chống ồn).\r\n5 phút sạc cho 1 giờ chơi nhạc.\r\nĐạt tiêu chuẩn chống nước IPX2.\r\nĐiều khiển cảm ứng dừng/phát, trả lời cuộc gọi, chuyển bài.', 1, 0, '2022-11-05 03:24:06'),
(25, 'Samsung IA500', 3, 5, 300000, 'SamsungIA500.jpg', 'Tai nghe Có Dây Samsung IA500 Đen\r\nTrải nghiệm nghe phong phú, chất âm rõ nét với hệ thống loa 2 chiều.\r\nMỗi đầu nút đeo được thiết kế thích hợp với mọi dáng tai.\r\nJack 3.5 mm thông dụng tương thích với thiết bị có cổng 3.5 mm, dây dài 1.25 m.\r\nĐiều khiển bật/dừng phát nhạc, tăng giảm âm lượng với nút nhấn trên dây.\r\nTai nghe có tích hợp microphone, trong hộp đi kèm 3 cặp đệm với 3 size khác nhau để bạn thoải mái thay đổi.', 0, 0, '2022-10-26 04:10:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`) VALUES
(1, 'Điện thoại'),
(2, 'Laptop'),
(3, 'Loa'),
(4, 'Đồng hồ'),
(5, 'Tai nghe');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioi_tinh` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `role` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ban` int(1) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `mail`, `user_name`, `password`, `gioi_tinh`, `sdt`, `role`, `ban`, `date_create`) VALUES
(2, 'qw@gmail.com', 'Nhi', '202cb962ac59075b964b07152d234b70', 'Nữ', 0, 'user', 0, '2022-12-10 11:12:30'),
(13, 'An@gmail.com', 'An', '76d80224611fc919a5d54f0ff9fba446', 'Nam', 0, 'user', 0, '2022-12-10 11:12:47'),
(14, '123@mail.com', 'Trần Đức', '202cb962ac59075b964b07152d234b70', '', 0, 'admin', 0, '2022-12-10 11:12:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wistlist`
--

DROP TABLE IF EXISTS `wistlist`;
CREATE TABLE IF NOT EXISTS `wistlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wistlist`
--

INSERT INTO `wistlist` (`id`, `user_id`, `product_id`, `image`, `price`, `name`) VALUES
(7, 2, 16, 'AppleWatchSeries7.jpg', 12900000, 'Apple Watch Series 7'),
(8, 2, 24, 'TrueWirelessSamsungGalaxyBuds2.jpg', 2990000, 'Samsung Galaxy Buds 2'),
(9, 2, 7, 'MacBookAirM1_2020.jpg', 23490000, 'Apple MacBook Air M1'),
(13, 13, 5, 'SamsungGlxZFlip4.jpg', 20690000, 'Samsung Galaxy Z Flip4');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
