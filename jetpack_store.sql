-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2026 at 04:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jetpack_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `gh_hotro`
--

CREATE TABLE `gh_hotro` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `nickyahoo` varchar(255) NOT NULL,
  `nickskype` varchar(255) NOT NULL,
  `chucvu` varchar(255) NOT NULL,
  `dienthoai` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `thutu` int(11) NOT NULL,
  `anhien` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:Hiện; 0:Ẩn'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `gh_hotro`
--

INSERT INTO `gh_hotro` (`id`, `ten`, `nickyahoo`, `nickskype`, `chucvu`, `dienthoai`, `email`, `thutu`, `anhien`) VALUES
(1, 'Hu Tao?', 'motdikhongtrolai', 'baohanhhetdoi', 'Tổng Giám Đốc Hậu Sự', '0900000000', 'support@jetpackcoffin.vn', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gh_lienhe`
--

CREATE TABLE `gh_lienhe` (
  `id` int(11) NOT NULL,
  `hoten` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dienthoai` varchar(20) DEFAULT NULL,
  `tieude` varchar(255) DEFAULT NULL,
  `noidung` text DEFAULT NULL,
  `ngaygui` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `gh_lienhe`
--

INSERT INTO `gh_lienhe` (`id`, `hoten`, `email`, `dienthoai`, `tieude`, `noidung`, `ngaygui`) VALUES
(1, 'Phạm Đăng Khoa', 'jettypack1020@gmail.com', '2412423432', 'rgreger', 'cvgewgwgwgewgewgewfwfewfewfweefew', '2026-06-04 14:06:13'),
(2, 'Phạm Đăng Khoa', 'jettypack1020@gmail.com', '2412423432', 'rgreger', 'dwqdwqdqdq', '2026-06-04 14:08:33'),
(3, 'abc', 'bruh@gmail.com', '011', 'rgreger', 'yyfiffgiu', '2026-06-23 00:01:22'),
(4, 'abc', 'bruh@gmail.com', '011', 'rgreger', 'yyfiffgiu', '2026-06-23 00:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `gh_lienhe2`
--

CREATE TABLE `gh_lienhe2` (
  `id` int(11) NOT NULL,
  `idDH` int(11) DEFAULT NULL,
  `HoTen` varchar(255) NOT NULL,
  `SoDienThoai` varchar(20) NOT NULL,
  `DiaChi` text NOT NULL,
  `NgayGui` datetime DEFAULT current_timestamp(),
  `idSP` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gh_lienhe2`
--

INSERT INTO `gh_lienhe2` (`id`, `idDH`, `HoTen`, `SoDienThoai`, `DiaChi`, `NgayGui`, `idSP`) VALUES
(10, 13, 'Phạm Đăng Khoa', '76857857', 'ascascasc', '2026-06-23 00:25:37', 96),
(11, 14, 'bbb', '786986', 'vyuvyuvyuvyu', '2026-06-24 02:07:20', 0),
(12, 14, 'bbb', '786986', 'vyuvyuvyuvyu', '2026-06-24 02:07:20', 112),
(13, 15, 'bbb', '76857857', 'afsafesgfesfge', '2026-06-24 02:15:24', 112),
(14, 15, 'bbb', '76857857', 'afsafesgfesfge', '2026-06-24 02:15:24', 111);

-- --------------------------------------------------------

--
-- Table structure for table `gh_quangcao`
--

CREATE TABLE `gh_quangcao` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `tomtat` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL DEFAULT 'http://',
  `hinh` varchar(255) NOT NULL,
  `vitri` int(11) NOT NULL COMMENT '1:banner; 2: duoimenu; 3: left; 4: cen; 5: right; 6:foot',
  `thutu` int(11) DEFAULT 0,
  `anhien` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:Hiện; 0: Ẩn'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `gh_quangcao`
--

INSERT INTO `gh_quangcao` (`id`, `ten`, `tomtat`, `link`, `hinh`, `vitri`, `thutu`, `anhien`) VALUES
(1, 'fdsfsdfsdf', 'sdfsfd', '#', 'uploads/quangcao/20111218093437vb8Lw1JN5I.jpg', 3, 0, 1),
(2, 'sadasdas', 'dfdsfdsfsd', '#', 'uploads/quangcao/20111218093450xkrwdiyo7.jpg', 3, 0, 1),
(3, 'sdfdsfsddfs', 'sad adadas', '#', 'uploads/quangcao/20111218093504tNQmNXEIW1.jpg', 3, 0, 1),
(4, 'dsfdsfsdf', 'sdfsdf', '#', 'uploads/quangcao/20111218093617V6ApF2noa.jpg', 5, 0, 1),
(5, 'sdfsfsdf', 'sdf sdfs', '#', 'uploads/quangcao/20111218093629wZIbFrACcH.jpg', 5, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gh_slide`
--

CREATE TABLE `gh_slide` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idgh` int(11) NOT NULL,
  `tenmien` varchar(255) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `tenkodau` varchar(255) NOT NULL,
  `hinh` varchar(255) NOT NULL,
  `tomtat` varchar(255) NOT NULL,
  `noidung` text NOT NULL,
  `noibat` tinyint(2) NOT NULL DEFAULT 0,
  `thutu` int(11) DEFAULT 0,
  `anhien` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:Hiện; 0: Ẩn'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `gh_slide`
--

INSERT INTO `gh_slide` (`id`, `iduser`, `idgh`, `tenmien`, `ten`, `tenkodau`, `hinh`, `tomtat`, `noidung`, `noibat`, `thutu`, `anhien`) VALUES
(2, 0, 0, 'dffsf-2', '333333333', 'dffsf', 'uploads/slide/20230423110037APshGDGNDX.jpg', 'ádas', '<html>\r\n	<head>\r\n		<title></title>\r\n	</head>\r\n	<body data-autofill-highlight=\"false\">\r\n		<p>\r\n			đ&acirc;s</p>\r\n	</body>\r\n</html>\r\n', 0, 0, 1),
(5, 0, 0, '', '4444', '', 'uploads/slide/20230423110407EyxMC8pwru.png', '', '<html>\r\n	<head>\r\n		<title></title>\r\n	</head>\r\n	<body data-autofill-highlight=\"false\">\r\n	</body>\r\n</html>\r\n', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gh_sp_news`
--

CREATE TABLE `gh_sp_news` (
  `id` int(11) NOT NULL,
  `idtheloai` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `ten` varchar(255) NOT NULL,
  `ngaycapnhat` datetime DEFAULT NULL,
  `tomtat` mediumtext DEFAULT NULL,
  `noidung` text NOT NULL,
  `hinh` varchar(255) NOT NULL,
  `songuoixem` int(11) NOT NULL DEFAULT 0,
  `noibat` tinyint(1) NOT NULL DEFAULT 0,
  `anhien` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:Hiện; 0: Ẩn',
  `lang` int(2) NOT NULL DEFAULT 1,
  `thutu` tinyint(1) DEFAULT NULL,
  `noitieng` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `gh_sp_news`
--

INSERT INTO `gh_sp_news` (`id`, `idtheloai`, `title`, `description`, `keywords`, `ten`, `ngaycapnhat`, `tomtat`, `noidung`, `hinh`, `songuoixem`, `noibat`, `anhien`, `lang`, `thutu`, `noitieng`) VALUES
(1, 6, 'Khách hàng hài lòng nhất năm', 'Khảo sát khách hàng JETPACK COFFIN', 'quan tai,khach hang', '100% khách hàng chưa từng phàn nàn sau khi sử dụng', '2026-06-23 19:29:21', 'khách hàng chưa từng phàn nàn sau khi sử dụng', 'Ban lãnh đạo công ty xác nhận chưa nhận được bất kỳ khiếu nại nào từ khách hàng sau khi sử dụng sản phẩm. Đây là thành tích mà nhiều doanh nghiệp khác chỉ có thể mơ ước.', 'uploads/news/1782232903_pngwing.com.png', 0, 1, 1, 1, 1, 0),
(2, 2, 'Ra mắt sản phẩm mới', 'Quan tài công nghệ cao', 'quan tai,wifi', 'JETPACK giới thiệu Quan Tài WiFi 6E Gaming Edition', '2026-06-23 20:45:19', ' giới thiệu Quan Tài WiFi 6E Gaming Edition', 'Theo nhà sản xuất, mẫu quan tài mới có khả năng bắt WiFi mạnh hơn cả phòng trọ sinh viên. Tuy nhiên tính năng hồi sinh vẫn đang được nghiên cứu.', 'uploads/news/1782240319_Gemini_Generated_Image_azg619azg619azg6 (1).png', 0, 0, 1, 1, 2, 0),
(3, 3, 'Khuyến mãi mùa hè', 'Chương trình giảm giá', 'khuyen mai', 'Giảm giá 30% cho khách hàng còn sống', '2026-06-23 20:45:58', 'Giảm giá 30% cho khách hàng còn sống', 'Đại diện công ty cho biết khách hàng nên tận dụng chương trình khi vẫn còn đủ điều kiện ký hợp đồng bằng chính tay mình.', 'uploads/news/1782240358_360_F_507796978_MwplqZOKyeIN7fACIrLygrgnOjDmYRUL.jpg', 0, 0, 1, 1, 1, 0),
(4, 6, 'Nghiên cứu thị trường', 'Tâm lý khách hàng', 'marketing', 'Khảo sát: 0% khách hàng có ý định đổi trả', '2026-06-23 20:47:07', 'Kết quả khảo sát gây chấn động ngành.', 'Trong số hàng nghìn khách hàng được khảo sát, không ai yêu cầu hoàn tiền hay đổi sản phẩm. Đây là tỷ lệ đáng kinh ngạc trong thương mại điện tử.', 'uploads/news/1782240427_1.webp', 0, 0, 1, 1, 2, 0),
(5, 4, 'Tuyển dụng', 'Việc làm', 'tuyen dung', 'JETPACK tuyển nhân viên tư vấn ca đêm', '2026-06-23 20:47:15', 'Cơ hội nghề nghiệp hấp dẫn.', 'Yêu cầu ứng viên không sợ bóng tối, có khả năng giao tiếp tốt và bình tĩnh khi nghe những tiếng động lạ lúc nửa đêm.', 'uploads/news/1782240435_360_F_276831797_pt3LSNMifFHn6cOnsAc60IQPd0IkKW4z.jpg', 0, 0, 1, 1, 5, 0),
(6, 6, 'Kỷ lục mới', 'Doanh số', 'kinh doanh', 'Doanh số tăng mạnh, khách hàng quay lại đạt 0%', '2026-06-23 20:47:54', 'Thành tích khiến giới kinh doanh ngưỡng mộ.', 'Không giống các doanh nghiệp khác phải đau đầu giữ chân khách hàng, JETPACK COFFIN duy trì tỷ lệ khách hàng quay lại ở mức tuyệt đối là 0%.', 'uploads/news/1782240474_2021-03-03_12-19-53---31b3b37cbe2e2c66c02dd4c5dbfd2069.png', 0, 0, 1, 1, 6, 0),
(7, 5, 'Công nghệ tương lai', 'AI', 'ai,quan tai', 'JETPACK thử nghiệm AI trò chuyện với khách hàng sau bán hàng', '2026-06-23 20:49:10', 'Dự án đang trong giai đoạn nghiên cứu.', 'Theo kỹ sư trưởng, dự án hoạt động khá tốt nhưng khách hàng phản hồi hơi chậm.', 'uploads/news/1782240550_istockphoto-2207141986-612x612.jpg', 0, 0, 1, 1, 7, 0),
(8, 7, 'Cảnh báo', 'An toàn', 'canh bao', 'Người dân không nên ngủ thử sản phẩm trong giờ làm việc', '2026-06-23 20:50:36', 'Công ty phát đi thông báo chính thức.', 'Ban quản lý cho biết một số nhân viên đã ngủ thử sản phẩm quá lâu và quên quay lại làm việc.', 'uploads/news/1782240636_8f85c23774ff0a36e9a0590a4c48e4dc.jpeg', 0, 0, 1, 1, 8, 0),
(9, 1, 'Thông báo đặc biệt', 'Bảo hành', 'bao hanh', 'JETPACK tiếp tục duy trì chính sách bảo hành đến hết đời', '2026-06-23 20:51:21', 'Cam kết chưa từng thay đổi.', 'Chính sách bảo hành đến hết đời khách hàng tiếp tục là niềm tự hào của thương hiệu.', 'uploads/news/1782240681_no-more-face-mask-masks-praise-rejoice-success-celebration-person-hope-silhouette-celebrating-against-water-sea-ocean-sunset-high-206936529.webp', 1, 0, 1, 1, 9, 0),
(10, 1, 'Thành tựu doanh nghiệp', 'Giải thưởng', 'giai thuong', 'JETPACK đạt giải \"Doanh nghiệp có khách hàng yên tĩnh nhất Việt Nam\"', '2026-06-23 20:52:07', 'Giải thưởng danh giá của ngành.', 'Ban tổ chức cho biết chưa từng thấy tập khách hàng nào điềm tĩnh và ít tranh cãi như vậy.', 'uploads/news/1782240727_businessman-sign-happy-customer-37623406.webp', 5, 0, 1, 1, 10, 0),
(11, 8, 'Âm phủ phủ nhận tin đồn thiếu chỗ ở', 'Tuyên bố chính thức từ cơ quan quản lý thế giới bên kia', 'am phu,tin tuc,tam linh', 'Âm phủ phủ nhận tin đồn thiếu chỗ ở', '2026-06-23 20:53:10', 'Đại diện âm phủ khẳng định hệ thống vẫn hoạt động ổn định.', 'Trước những tin đồn lan truyền trên mạng xã hội, đại diện âm phủ cho biết toàn bộ cơ sở hạ tầng vẫn đủ sức phục vụ nhu cầu hiện tại.', 'uploads/news/1782240790_alien-landscape-a-surreal-world-beyond-our-imagination-photo.jpg', 1, 0, 1, 1, 0, 0),
(12, 8, 'Xuất hiện dịch vụ đặt chỗ trước 50 năm', 'Dịch vụ mới gây tranh cãi', 'dat cho truoc,am phu', 'Xuất hiện dịch vụ đặt chỗ trước 50 năm', '2026-06-23 20:53:49', 'Nhiều người trẻ bắt đầu lên kế hoạch rất xa cho tương lai.', 'Một số khách hàng cho biết họ thích chuẩn bị mọi thứ thật sớm để tránh tăng giá về sau.', 'uploads/news/1782240829_360_F_617973907_yTFWFWUtb6kAov3Mq5kQzlrWceRMdtKn.jpg', 0, 0, 1, 1, 0, 0),
(13, 8, 'Báo cáo: Ma mới tốt nghiệp tăng 15%', 'Thống kê mới nhất từ âm giới', 'ma moi,bao cao', 'Báo cáo: Ma mới tốt nghiệp tăng 15%', '2026-06-23 20:54:24', 'Số lượng cư dân mới tiếp tục tăng ổn định.', 'Các chuyên gia nhận định đây là tín hiệu cho thấy ngành dịch vụ hậu sự vẫn còn rất nhiều tiềm năng.', 'uploads/news/1782240864_success-celebration-graduate-throwing-cap-photo.jpeg', 0, 0, 1, 1, 0, 0),
(14, 9, '100% khách hàng giữ im lặng sau khi sử dụng', 'Khảo sát khách hàng mới nhất', 'danh gia,khach hang', '100% khách hàng giữ im lặng sau khi sử dụng', '2026-06-23 20:55:11', 'Không ghi nhận bất kỳ phản hồi tiêu cực nào.', 'Theo khảo sát nội bộ, chưa có khách hàng nào yêu cầu hoàn tiền hoặc khiếu nại sau khi sử dụng sản phẩm.', 'uploads/news/1782240911_award-5-gold-star-photo.jpg', 0, 0, 1, 1, 0, 0),
(15, 9, 'Khách hàng báo mộng xin thêm đèn LED', 'Ý kiến đóng góp độc đáo', 'led,khach hang', 'Khách hàng báo mộng xin thêm đèn LED', '2026-06-23 20:55:54', 'Một phản hồi hiếm hoi được ghi nhận qua giấc mơ.', 'Bộ phận R&D đang xem xét phát triển phiên bản RGB Gaming Edition theo yêu cầu.', 'uploads/news/1782240954_depositphotos_69954843-stock-photo-led-shining-diode-lights-strip.jpg', 0, 0, 1, 1, 0, 0),
(16, 9, 'Khảo sát: 98% khách hàng hài lòng với độ yên tĩnh', 'Kết quả khảo sát gây bất ngờ', 'do yen tinh,danh gia', 'Khảo sát: 98% khách hàng hài lòng với độ yên tĩnh', '2026-06-23 20:56:37', 'Tiêu chí yên tĩnh tiếp tục được đánh giá rất cao.', 'Chỉ có 2% chưa phản hồi do bận việc cá nhân kéo dài vô thời hạn.', 'uploads/news/1782240997_coffin-resting-tree-symbolizes-cycle-life-death-quiet-burial-site-placed-near-large-representing-natural-354134598.webp', 0, 0, 1, 1, 3, 0),
(18, 10, 'Không mang quan tài vào giải đấu eSports', 'Thông báo từ ban tổ chức', 'esports,gaming', 'Không mang quan tài vào giải đấu eSports', '2026-06-23 20:58:42', 'Một số trường hợp cá biệt đã khiến ban tổ chức phải lên tiếng.', 'JETPACK khẳng định sản phẩm không được thiết kế để thay thế ghế gaming.', 'uploads/news/1782241122_360_F_1891674318_CCkMkv77tjqZjJtvTNRgxPvYjsR34hWg.jpg', 0, 0, 1, 1, 0, 0),
(19, 10, 'Chuyên gia khuyên không nên test trước thời hạn', 'Khuyến nghị chính thức', 'huong dan,canh bao', 'Chuyên gia khuyên không nên test trước thời hạn', '2026-06-23 21:00:37', 'Mọi sản phẩm đều có thời điểm sử dụng phù hợp.', 'Các chuyên gia khuyến nghị người dân tiếp tục tận hưởng cuộc sống thay vì nóng lòng trải nghiệm sản phẩm.', 'uploads/news/1782241237_doctor-scientist-white-lab-coat-standing-finger-thumbs-up-portrait-background-studio-shot-314474571.webp', 0, 0, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gh_sp_sp`
--

CREATE TABLE `gh_sp_sp` (
  `id` int(11) NOT NULL,
  `idtheloai` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `ten` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL DEFAULT '0',
  `ngay` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ngaycapnhat` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tomtat` varchar(1000) NOT NULL,
  `noidung` text NOT NULL,
  `hinh1` varchar(255) NOT NULL,
  `hinh2` varchar(255) NOT NULL,
  `songuoixem` int(11) NOT NULL DEFAULT 0,
  `noibat` tinyint(1) NOT NULL DEFAULT 0,
  `anhien` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:Hiện; 0: Ẩn',
  `thutu` int(11) NOT NULL,
  `lang` int(2) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `gh_sp_sp`
--

INSERT INTO `gh_sp_sp` (`id`, `idtheloai`, `title`, `description`, `keywords`, `ten`, `price`, `ngay`, `ngaycapnhat`, `tomtat`, `noidung`, `hinh1`, `hinh2`, `songuoixem`, `noibat`, `anhien`, `thutu`, `lang`) VALUES
(86, 1, 'Quan Tai Obsidian Black', 'Quan tai den phong cach Gothic', 'quan tai den, gothic', 'Quan Tài Obsidian Black', '55000000', '2026-06-21 09:00:42', '2026-06-21 09:00:42', 'Phong cách huyền bí dành cho khách hàng cá tính.', 'Lớp sơn đen bóng cao cấp, nội thất nhung đỏ sang trọng.', 'uploads/sanpham/1782143163_black-custom-casket-removebg-preview.png', '', 0, 1, 1, 2, 1),
(87, 1, 'Jetpack Signature Coffin', 'Phien ban dac biet cua Jetpack Coffin Store', 'jetpack coffin, premium', 'Quan Tài Jetpack Signature', '99000000', '2026-06-21 09:00:42', '2026-06-21 09:00:42', 'Mẫu độc quyền của Jetpack Coffin Store.', 'Thiết kế riêng cho khách hàng muốn tạo dấu ấn cuối cùng.', 'uploads/sanpham/1782144292_Gemini_Generated_Image_kcu84nkcu84nkcu8-removebg-preview.png', '', 0, 1, 1, 3, 1),
(91, 1, 'Quan tài dành cho FA', 'Không ai nắm tay thì nắp đậy sẽ làm điều đó.', 'fa,doc than', 'Quan Tài Forever Alone', '6999000', '2026-06-21 09:01:48', '2026-06-21 09:01:48', 'Người yêu không có nhưng quan tài luôn bên bạn.', 'Thiết kế rộng rãi cho những năm tháng cô đơn kéo dài.', 'uploads/sanpham/1782142781_Gemini_Generated_Image_kyf371kyf371kyf3-removebg-preview.png', '', 0, 0, 1, 4, 1),
(94, 1, 'Quan tài tăng lực', 'Cho người uống 5 lon nước tăng lực mỗi ngày.', 'energy,coffee', 'Quan Tài Cà Phê 24/7', '11990000', '2026-06-21 09:01:48', '2026-06-21 09:01:48', 'Cuối cùng cũng được nghỉ ngơi thật sự.', 'Có sẵn giá để ly cà phê và hóa đơn tiệm net.', 'uploads/sanpham/1782142853_Gemini_Generated_Image_tbd0z1tbd0z1tbd0-removebg-preview.png', '', 0, 0, 1, 7, 1),
(96, 1, 'Quan tài siêu xe', 'Cho người thích tốc độ.', 'sieuxe,f1', 'Quan Tài Turbo GT', '22990000', '2026-06-21 09:01:48', '2026-06-21 09:01:48', 'Tăng tốc từ 0 đến nghĩa trang trong thời gian kỷ lục.', 'Khung khí động học giúp trông nhanh hơn dù đứng yên.', 'uploads/sanpham/1782140837_Gemini_Generated_Image_xhe3tzxhe3tzxhe3-removebg-preview.png', '', 0, 1, 1, 9, 1),
(97, 5, 'Quan tài VIP', 'Phiên bản giới hạn.', 'vip,premium,luxury', 'Quan Tài Hoàng Gia Premium', '49990000', '2026-06-21 09:01:48', '2026-06-21 09:01:48', 'Ra đi nhưng vẫn phải đẳng cấp.', 'Bọc nhung cao cấp, tay cầm mạ vàng và khả năng flex cực mạnh.', 'uploads/sanpham/1782140571_royal-removebg-preview.png', '', 0, 1, 1, 10, 1),
(98, 1, 'Premium', 'Premium', 'premium coffin', 'Quan Tài Diamond Elite', '39990000', '2026-06-21 09:12:47', '2026-06-21 09:12:47', 'Dành cho khách hàng muốn ra đi trong sang trọng.', 'Gỗ cao cấp, nội thất nhung mềm mại, đẳng cấp vượt thời gian.', 'uploads/sanpham/1782140469_Caskets-Going-Home-Diamond-Blue_A15261-removebg-preview.png', '', 0, 1, 1, 1, 1),
(100, 2, 'Gothic', 'Dark style', 'gothic', 'Quan Tài Bá Tước Dracula', '18990000', '2026-06-21 09:12:57', '2026-06-21 09:12:57', 'Đen huyền bí, chuẩn phong cách ma cà rồng.', 'Không đi kèm ma cà rồng thật.', 'uploads/sanpham/1782138078_599c5f9fd9e96728a780212f013be8cf-removebg-preview.png', '', 0, 0, 1, 1, 1),
(101, 2, 'Gothic', 'Dark style', 'gothic', 'Quan Tài Hắc Ám Vĩnh Cửu', '22990000', '2026-06-21 09:12:57', '2026-06-21 09:12:57', 'Đẹp đến mức người sống cũng muốn thử.', 'Thiết kế Gothic cao cấp với họa tiết cổ điển.', 'uploads/sanpham/1782137727_nosferatu-v2-stillbg_1_520x500_efe582f6-d538-4029-8e83-88a992387f0c-removebg-preview.png', '', 0, 1, 1, 2, 1),
(102, 3, 'Gaming', 'Gaming coffin', 'gaming', 'Quan Tài Rank Cao Thủ', '15990000', '2026-06-21 09:13:04', '2026-06-21 09:13:04', 'AFK vĩnh viễn nhưng vẫn giữ rank.', 'Không lo bị report AFK.', 'uploads/sanpham/1782137641_Gemini_Generated_Image_ktgwybktgwybktgw-removebg-preview.png', '', 0, 1, 1, 1, 1),
(103, 3, 'Gaming', 'Gaming coffin', 'gaming', 'Quan Tài RGB Pro Max', '19990000', '2026-06-21 09:13:04', '2026-06-21 09:13:04', 'Có RGB nên chắc chắn mạnh hơn.', 'Không tăng FPS nhưng tăng phong cách.', 'uploads/sanpham/1782137017_Gemini_Generated_Image_azg619azg619azg6__1_-removebg-preview.png', '', 0, 1, 1, 2, 1),
(104, 3, 'Gaming', 'Gaming coffin', 'gaming', 'Quan Tài Streamer Edition', '16990000', '2026-06-21 09:13:04', '2026-06-21 09:13:04', 'Livestream cuối cùng.', 'Like và subscribe trước khi đóng nắp.', 'uploads/sanpham/1782137411_Gemini_Generated_Image_inu5stinu5stinu5-removebg-preview.png', '', 0, 0, 1, 3, 1),
(105, 4, 'Economy', 'Economy coffin', 'cheap', 'Quan Tài Sinh Viên', '2999000', '2026-06-21 09:13:13', '2026-06-21 09:13:13', 'Giá mềm như điểm giữa kỳ.', 'Trả góp 0% trong phần đời còn lại.', 'uploads/sanpham/1782136907_cardboard-coffin-newspaper-3912-removebg-preview.png', '', 0, 0, 1, 1, 1),
(106, 4, 'Economy', 'Economy coffin', 'cheap', 'Quan Tài Khuyến Mãi Cuối Tuần', '3999000', '2026-06-21 09:13:13', '2026-06-21 09:13:13', 'Giảm giá nhưng chất lượng vẫn đáng sợ.', 'Giá tốt cho người thích tiết kiệm.', 'uploads/sanpham/1782135751_Shaped-Pine-Casket-Partial-Interior.webp', '', 0, 0, 1, 2, 1),
(107, 5, 'Royal', 'Royal coffin', 'royal', 'Quan Tài Hoàng Đế Thiên Triều', '59990000', '2026-06-21 09:13:21', '2026-06-21 09:13:21', 'Ra đi nhưng vẫn phải có khí chất.', 'Trang trí vàng giả nhưng nhìn rất thật.', 'uploads/sanpham/1782135646_GoldEraBackgroundRemoved.webp', '', 0, 1, 1, 1, 1),
(108, 5, 'Royal', 'Royal coffin', 'royal', 'Quan Tài Nữ Hoàng Premium', '69990000', '2026-06-21 09:13:21', '2026-06-21 09:13:21', 'Đẳng cấp dành cho người không thích bình thường.', 'Nhung đỏ cao cấp và thiết kế sang trọng.', 'uploads/sanpham/1782135555_RedEraMain.webp', '', 0, 1, 1, 2, 1),
(109, 6, 'Meme', 'Funny coffin', 'meme', 'Quan Tài Mai Tính', '9999999', '2026-06-21 09:13:28', '2026-06-21 09:13:28', 'Để mai tính rồi mua.', 'Khách hàng nào cũng nói để mai tính.', 'uploads/sanpham/1782135377_BLANK_ICON.png', '', 0, 1, 1, 1, 1),
(110, 6, 'Meme', 'Funny coffin', 'meme', 'Quan Tài Snooze Forever', '8888888', '2026-06-21 09:13:28', '2026-06-21 09:13:28', 'Bảo hành không bao giờ phải dậy lúc 6 giờ sáng.	', 'Giải pháp cuối cùng cho người ghét thứ Hai. Được hàng triệu học sinh và nhân viên văn phòng mơ ước.', 'uploads/sanpham/1782135325_RomaPoplarMain.webp', '', 0, 1, 1, 2, 1),
(111, 6, 'Meme', 'Funny coffin', 'meme', 'Quan Tài Hết Deadline', '12345678', '2026-06-21 09:13:28', '2026-06-21 09:13:28', 'Không còn KPI, không còn deadline.', 'Được dân văn phòng yêu thích.', 'uploads/sanpham/1782135116_Lexington_1.webp', '', 0, 1, 1, 3, 1),
(112, 7, 'Accessory', 'Accessory', 'hoa', 'Vòng Hoa VIP', '1500000', '2026-06-21 09:13:36', '2026-06-21 09:13:36', 'Đẹp hơn cả người nằm trong quan tài.', 'Hoa tươi, thơm và đầy cảm xúc.', 'uploads/sanpham/1782232518_a-loving-farewell-funeral-flowers-ribbon-banner-700546-removebg-preview.png', '', 0, 0, 1, 1, 1),
(113, 7, 'Accessory', 'Accessory', 'nen', 'Nến Tưởng Niệm Premium', '250000', '2026-06-21 09:13:36', '2026-06-21 09:13:36', 'Ánh sáng cuối cùng nhưng rất lung linh.', 'Thắp sáng mọi khoảnh khắc.', 'uploads/sanpham/1782133773_istockphoto-1504550028-612x612.jpg', '', 0, 0, 1, 2, 1),
(114, 7, 'Accessory', 'Accessory', 'bangron', 'Băng Rôn Tiễn Biệt', '350000', '2026-06-21 09:13:36', '2026-06-21 09:13:36', 'Chia tay đầy cảm xúc.', 'Có thể tùy chỉnh nội dung.', 'uploads/sanpham/1782135237_Ribbon-Script-500x500-removebg-preview.png', '', 0, 0, 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gh_sp_theloai`
--

CREATE TABLE `gh_sp_theloai` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `keywords` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tomtat` varchar(1000) NOT NULL,
  `thutu` int(11) NOT NULL,
  `anhien` tinyint(1) NOT NULL DEFAULT 1,
  `hinh1` varchar(255) NOT NULL,
  `hinh2` varchar(255) NOT NULL,
  `lang` int(2) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `gh_sp_theloai`
--

INSERT INTO `gh_sp_theloai` (`id`, `ten`, `title`, `description`, `keywords`, `tomtat`, `thutu`, `anhien`, `hinh1`, `hinh2`, `lang`) VALUES
(1, 'Quan Tài Cao Cấp', 'Quan Tài Cao Cấp', 'Dòng quan tài sang trọng dành cho khách hàng VIP.', 'quan tai cao cap, vip', 'Sự lựa chọn cho những ai muốn ra đi trong đẳng cấp.', 1, 1, '', '', 1),
(2, 'Quan Tài Gothic', 'Quan Tài Gothic', 'Phong cách huyền bí và đầy nghệ thuật.', 'gothic, quan tai den', 'Thiết kế dành cho những tâm hồn yêu bóng tối.', 2, 1, '', '', 1),
(3, 'Quan Tài Gaming', 'Quan Tài Gaming', 'AFK vĩnh viễn nhưng vẫn giữ phong độ.', 'gaming coffin', 'Dành cho game thủ chuyên nghiệp.', 3, 1, '', '', 1),
(4, 'Quan Tài Tiết Kiệm', 'Quan Tài Tiết Kiệm', 'Chất lượng tốt với mức giá dễ tiếp cận.', 'quan tai gia re', 'Giải pháp kinh tế nhưng vẫn trang trọng.', 4, 1, '', '', 1),
(5, 'Quan Tài Hoàng Gia', 'Quan Tài Hoàng Gia', 'Đẳng cấp dành cho giới quý tộc.', 'royal coffin', 'Sang trọng đến từng chi tiết.', 5, 1, '', '', 1),
(6, 'Quan Tài Meme Edition', 'Quan Tài Meme Edition', 'Những mẫu quan tài khiến ai nhìn cũng phải bật cười.', 'meme coffin', 'Khách hàng chưa từng phàn nàn.', 6, 1, '', '', 1),
(7, 'Phụ Kiện Tang Lễ', 'Phụ Kiện Tang Lễ', 'Các phụ kiện đi kèm cho buổi lễ hoàn chỉnh.', 'phu kien tang le', 'Hoa, vòng hoa, trang trí và nhiều hơn nữa.', 7, 1, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gh_sp_theloai_news`
--

CREATE TABLE `gh_sp_theloai_news` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `ten` varchar(255) NOT NULL,
  `thutu` int(11) NOT NULL,
  `noibat` tinyint(1) NOT NULL DEFAULT 0,
  `anhien` tinyint(1) NOT NULL DEFAULT 1,
  `lang` int(2) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `gh_sp_theloai_news`
--

INSERT INTO `gh_sp_theloai_news` (`id`, `title`, `description`, `keywords`, `ten`, `thutu`, `noibat`, `anhien`, `lang`) VALUES
(1, 'Tin tức doanh nghiệp JETPACK', 'Các thông báo chính thức từ JETPACK', 'jetpack,tin tuc,thong bao', 'Thông Báo Công Ty', 1, 1, 1, 1),
(2, 'Ra mắt sản phẩm mới', 'Các mẫu quan tài và phụ kiện mới nhất', 'quan tai moi,san pham moi', 'Sản Phẩm Mới', 2, 0, 1, 1),
(3, 'Ưu đãi đặc biệt', 'Thông tin giảm giá và khuyến mãi', 'giam gia,khuyen mai', 'Khuyến Mãi', 3, 0, 1, 1),
(4, 'Cơ hội nghề nghiệp', 'Thông tin tuyển dụng từ JETPACK', 'tuyen dung,nhan su', 'Tuyển Dụng', 4, 0, 1, 1),
(5, 'AI và công nghệ mới', 'Các dự án nghiên cứu của JETPACK', 'ai,cong nghe,nghien cuu', 'Nghiên Cứu & Công Nghệ', 5, 0, 1, 1),
(6, 'Báo cáo khách hàng', 'Những thống kê thú vị về khách hàng', 'khach hang,khao sat', 'Khảo Sát Khách Hàng', 6, 0, 1, 1),
(7, 'Tin tức ngành', 'Cập nhật ngành dịch vụ hậu sự', 'mai tang,nganh', 'Tin Tức Ngành Mai Táng', 7, 0, 1, 1),
(8, 'Bản tin thế giới bên kia', 'Những tin tức khó kiểm chứng', 'am phu,tam linh', 'Tin Từ Âm Phủ', 8, 0, 1, 1),
(9, 'Đánh giá khách hàng', 'Nhận xét sau sử dụng', 'review,danh gia', 'Khách Hàng Nói Gì', 9, 0, 1, 1),
(10, 'Những điều cần lưu ý', 'Khuyến cáo từ chuyên gia', 'canh bao,huong dan', 'Góc Cảnh Báo', 10, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `idKH` int(11) NOT NULL DEFAULT 0,
  `soDT` varchar(32) NOT NULL,
  `ThoiDiemDatHang` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TenNguoiNhan` varchar(100) NOT NULL DEFAULT '',
  `DiaChi` varchar(255) NOT NULL,
  `yahoo` varchar(255) NOT NULL,
  `status` tinyint(2) DEFAULT 0,
  `thanhtoan` tinyint(2) DEFAULT 0,
  `GhiChu` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`id`, `price`, `idKH`, `soDT`, `ThoiDiemDatHang`, `TenNguoiNhan`, `DiaChi`, `yahoo`, `status`, `thanhtoan`, `GhiChu`) VALUES
(1, '684', 0, 'sdfsd', '2013-12-17 21:57:49', 'dsfsd', 'dsf', 'sdf', 1, 0, 'Giohang_'),
(2, '34534', 1, '1234567', '2013-12-25 09:14:14', 'asd adasdasd as', 'as dsadsadasdas', 'vcththasdasd@gamil.com', 0, 0, 'Giohang_'),
(3, '34534', 1, '1234567', '2013-12-25 13:40:19', 'asd adasdasd as', 'as dsadsadasdas', 'vcththasdasd@gamil.com', 0, 0, 'Giohang_'),
(4, '', 0, '012345678', '2026-06-04 13:12:16', 'Phạm Đăng Khoa', '365 Hoàng sa', '', 0, 0, NULL),
(5, '', 0, '011', '2026-06-12 16:43:21', 'abc', '123', '', 0, 0, NULL),
(6, '', 0, '24223432', '2026-06-22 23:50:42', 'Phạm Đăng Khoa', 'fyfyufyufy', '', 0, 0, NULL),
(7, '', 0, '011', '2026-06-22 23:59:01', 'abc', 'yyfyuv', '', 0, 0, NULL),
(8, '', 0, '989078787', '2026-06-23 00:13:23', 'hi', 'yufvyfkyufy', '', 0, 0, NULL),
(9, '', 0, '989078787', '2026-06-23 00:14:07', 'Phạm Đăng Khoa', 'u6giugiufui', '', 0, 0, NULL),
(10, '', 0, '989078787', '2026-06-23 00:16:04', 'abc', 'iyfviyfyuvkpokpokp', '', 0, 0, NULL),
(11, '', 0, '989078787', '2026-06-23 00:16:40', 'abc', 'iuufiuiu', '', 0, 0, NULL),
(12, '', 0, '76857857', '2026-06-23 00:19:43', 'sefef', 'regregvsefvess', '', 0, 0, NULL),
(13, '', 0, '76857857', '2026-06-23 00:25:37', 'Phạm Đăng Khoa', 'ascascasc', '', 0, 0, NULL),
(14, '', 0, '786986', '2026-06-24 02:07:20', 'bbb', 'vyuvyuvyuvyu', '', 0, 0, NULL),
(15, '', 0, '76857857', '2026-06-24 02:15:24', 'bbb', 'afsafesgfesfge', '', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donhangchitiet`
--

CREATE TABLE `tbl_donhangchitiet` (
  `id` int(11) NOT NULL,
  `idDH` int(4) NOT NULL DEFAULT 0,
  `idSP` int(4) NOT NULL DEFAULT 0,
  `SoLuong` int(4) NOT NULL DEFAULT 0,
  `DonGia` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_donhangchitiet`
--

INSERT INTO `tbl_donhangchitiet` (`id`, `idDH`, `idSP`, `SoLuong`, `DonGia`) VALUES
(1, 1, 7, 2, '342'),
(2, 2, 6, 1, '34534'),
(3, 3, 6, 1, '34534'),
(4, 4, 30, 2, '3534543'),
(5, 4, 24, 2, '3534543'),
(6, 4, 21, 1, '3534543'),
(7, 4, 12, 1, '3534543'),
(8, 5, 32, 1, '10000000'),
(9, 5, 31, 1, '500000'),
(10, 6, 114, 1, '350000'),
(11, 7, 113, 1, '250000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email`
--

CREATE TABLE `tbl_email` (
  `id` int(11) NOT NULL,
  `idshop` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'ten giao dien',
  `image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `last_modified` datetime NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_email`
--

INSERT INTO `tbl_email` (`id`, `idshop`, `name`, `image`, `email`, `date_added`, `last_modified`, `status`) VALUES
(1, 1, '', 'images/item/item_s8.png', 'sdfsds@gmail.com', '2013-12-21 09:29:37', '0000-00-00 00:00:00', 1),
(2, 1, '', 'images/item/item_s8.png', 'sdfsdfsfd@gmail.com', '2013-12-21 12:39:33', '0000-00-00 00:00:00', 1),
(3, 0, '', '', 'sdfsdf@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(4, 0, '', '', 'sdfsdf@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, 0, '', '', 'erewrew', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `hinh` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dienthoai` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nickyahoo` varchar(255) NOT NULL,
  `nickskype` varchar(255) NOT NULL,
  `ngaydangky` varchar(255) NOT NULL,
  `xem` int(11) NOT NULL DEFAULT 1,
  `ngayvaocuoi` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idgroup` int(11) NOT NULL DEFAULT 1 COMMENT '1:nv; 2:ql; 3:admin',
  `listquanly` varchar(255) NOT NULL DEFAULT '0',
  `khoa` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:ko; 0:khoa',
  `randomkey` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ten`, `hinh`, `username`, `password`, `dienthoai`, `email`, `nickyahoo`, `nickskype`, `ngaydangky`, `xem`, `ngayvaocuoi`, `idgroup`, `listquanly`, `khoa`, `randomkey`) VALUES
(1, 'admin', 'uploads/users/20111003121202HTF0dwPBw.jpg', 'admin', 'c56d0e9a7ccec67b4ea131655038d604', '0901885891', 'admin@yahoo.com', 'admin yahoo 1', 'admin skype', '', 294, '2025-03-11 09:34:41', 3, '7,5,6,12,13,14,15,9,10,11,8,1,2,4,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,38,39,40,41,42,43,44,45,46,47,48,49,50,51,53', 1, 'M0HY9V7f9Jlve0YScWPv39s2FysWCMn'),
(2, 'master', 'uploads/users/20111003115811RRc1tSpzCD.jpg', 'master', 'c56d0e9a7ccec67b4ea131655038d604', '0982779970', 'master@yahoo.com', 'master yahoo', 'master skype', '', 112, '2011-12-19 10:38:53', -1, '-1', 1, 'M0HY9V7f9Jlve0YScjhv39s2FysWCMn'),
(10, 'Jetpack Admin', '', 'jetpack', '123', '', '', '', '', '', 1, '0000-00-00 00:00:00', 3, '0', 1, ''),
(11, 'Jetpack Admin', '', 'jetpack', '123', '', '', '', '', '', 1, '0000-00-00 00:00:00', 3, '0', 1, ''),
(12, 'Admin Test', '', 'admin1', '123', '', '', '', '', '', 1, '0000-00-00 00:00:00', 3, '0', 1, ''),
(13, 'Quan Ly Test', '', 'manager1', '123', '', '', '', '', '', 1, '0000-00-00 00:00:00', 2, '0', 1, ''),
(14, 'Nhan Vien Test', '', 'staff1', '123', '', '', '', '', '', 1, '0000-00-00 00:00:00', 1, '0', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `version`
--

CREATE TABLE `version` (
  `id` int(11) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `tenkh` varchar(255) NOT NULL,
  `dckh` varchar(255) NOT NULL,
  `dtkh` varchar(255) NOT NULL,
  `hotlinekh` varchar(255) NOT NULL,
  `emailkh` varchar(255) NOT NULL,
  `faxkh` varchar(255) NOT NULL,
  `cauhinh_mail_ten` varchar(255) NOT NULL,
  `cauhinh_mail_mk` varchar(255) NOT NULL,
  `total` int(32) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `version`
--

INSERT INTO `version` (`id`, `copyright`, `title`, `description`, `keywords`, `tenkh`, `dckh`, `dtkh`, `hotlinekh`, `emailkh`, `faxkh`, `cauhinh_mail_ten`, `cauhinh_mail_mk`, `total`) VALUES
(1, 'Copyright ©', '1Host.Vn - Hosting Services 1', '1Host.Vn - Hosting Services', '1Host.Vn - Hosting Services', '1Host.Vn - Hosting Services', '32/16 Tân Thới Nhất 02, Q.12, TP.Hồ Chí Minh', '01666.0666.49', '01666.0666.49', 'info@1host.vn', '(08) 6.292.6797', 'ten@gmail.com', '123456', 171),
(5, 'sdfs', 'sdf', 'sdf', '', '', '', '', '', '', '', '', '', 0),
(6, '', '', '', '', 'khe', '', '', '', '', '', '', '', 0),
(7, '', '', '', '', '', '', '', '', '', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gh_hotro`
--
ALTER TABLE `gh_hotro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gh_lienhe`
--
ALTER TABLE `gh_lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gh_lienhe2`
--
ALTER TABLE `gh_lienhe2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gh_quangcao`
--
ALTER TABLE `gh_quangcao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gh_slide`
--
ALTER TABLE `gh_slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gh_sp_news`
--
ALTER TABLE `gh_sp_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gh_sp_sp`
--
ALTER TABLE `gh_sp_sp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gh_sp_theloai`
--
ALTER TABLE `gh_sp_theloai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gh_sp_theloai_news`
--
ALTER TABLE `gh_sp_theloai_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_donhangchitiet`
--
ALTER TABLE `tbl_donhangchitiet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_email`
--
ALTER TABLE `tbl_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `version`
--
ALTER TABLE `version`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gh_hotro`
--
ALTER TABLE `gh_hotro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gh_lienhe`
--
ALTER TABLE `gh_lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gh_lienhe2`
--
ALTER TABLE `gh_lienhe2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gh_quangcao`
--
ALTER TABLE `gh_quangcao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gh_slide`
--
ALTER TABLE `gh_slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gh_sp_news`
--
ALTER TABLE `gh_sp_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `gh_sp_sp`
--
ALTER TABLE `gh_sp_sp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `gh_sp_theloai`
--
ALTER TABLE `gh_sp_theloai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gh_sp_theloai_news`
--
ALTER TABLE `gh_sp_theloai_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_donhangchitiet`
--
ALTER TABLE `tbl_donhangchitiet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_email`
--
ALTER TABLE `tbl_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `version`
--
ALTER TABLE `version`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
