-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 01, 2023 lúc 05:55 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `burninghotel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdatmon`
--

CREATE TABLE `chitietdatmon` (
  `MaDatMon` int(11) NOT NULL,
  `MaPMA` int(11) NOT NULL,
  `MaMonAn` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdatmon`
--

INSERT INTO `chitietdatmon` (`MaDatMon`, `MaPMA`, `MaMonAn`, `SoLuong`, `ThanhTien`) VALUES
(12, 1, 7, 2, 56000),
(13, 1, 3, 2, 60000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdatphong`
--

CREATE TABLE `chitietdatphong` (
  `MaCTDP` int(11) NOT NULL,
  `MaPDP` int(11) NOT NULL,
  `MaPhong` int(11) NOT NULL,
  `NgayDen` date NOT NULL,
  `NgayDi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdatphong`
--

INSERT INTO `chitietdatphong` (`MaCTDP`, `MaPDP`, `MaPhong`, `NgayDen`, `NgayDi`) VALUES
(10, 10, 101, '2023-11-01', '2023-11-02'),
(11, 14, 101, '2023-11-23', '2023-11-24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdichvu`
--

CREATE TABLE `chitietdichvu` (
  `MaCTDV` int(11) NOT NULL,
  `MaPDV` int(11) NOT NULL,
  `MaDichVu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `MaChucVu` varchar(255) NOT NULL,
  `TenChucVu` varchar(255) NOT NULL,
  `LuongTheoNgay` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`MaChucVu`, `TenChucVu`, `LuongTheoNgay`) VALUES
('11', 'Tổng giám đốc', 2000000),
('12', 'Phó giám đốc', 1500000),
('13', 'Thư ký tổng giám đốc', 500000),
('14', 'Trợ lý tổng giám đốc', 340000),
('21', 'Trưởng bộ phận lễ tân', 670000),
('210', 'Nhân viên hành lý', 200000),
('211', 'Nhân viên đứng cửa', 200000),
('212', 'Nhân viên trực tổng đài', 200000),
('213', 'Nhân viên lái xe', 200000),
('22', 'Quản lý phòng khách sạn', 1000000),
('23', 'Quản lý ca trực', 500000),
('24', 'Quản lý tiền sảnh', 500000),
('25', 'Nhân viên quan hệ khách hàng', 340000),
('26', 'Giám sát bộ phận lễ tân', 270000),
('27', 'Nhân viên lễ tân', 200000),
('28', 'Nhân viên đặt phòng', 200000),
('29', 'Nhân viên hỗ trợ khách hàng', 270000),
('31', 'Bếp Trưởng', 25000),
('32', 'Bếp Phó', 10000),
('33', 'Bếp Phụ', 5000),
('41', 'trưởng bộ phận buồn phòng', 400000),
('42', 'Nhân viên buồng phòng', 200000),
('43', 'Nhân viên giặt là', 200000),
('44', 'Nhân viên điều phối', 200000),
('51', 'Quản lý nhà hàng', 340000),
('52', 'Giám sát nhà hàng', 270000),
('53', 'Nhân viên phục vụ', 170000),
('54', 'Nhân viên đón khách', 170000),
('61', 'Kế toán trưởng', 670000),
('62', 'Kế toán tổng hợp', 500000),
('71', 'Trưởng bộ phận an ninh', 370000),
('72', 'Nhân viên an ninh', 200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `datban`
--

CREATE TABLE `datban` (
  `ID` int(11) NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThoiGian` time NOT NULL,
  `NgayDat` date NOT NULL,
  `NgayDen` date NOT NULL,
  `TinhTrang` varchar(50) NOT NULL,
  `MaNhanVien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `datban`
--

INSERT INTO `datban` (`ID`, `MaKhachHang`, `SoLuong`, `ThoiGian`, `NgayDat`, `NgayDen`, `TinhTrang`, `MaNhanVien`) VALUES
(6, 1, 1, '16:58:00', '2023-12-01', '2023-12-03', 'Chờ', NULL),
(7, 1, 2, '16:59:00', '2023-12-01', '2023-12-09', 'Chờ', NULL),
(8, 1, 3, '16:00:00', '2023-12-01', '2023-12-03', 'Chờ', NULL),
(9, 1, 10, '17:15:00', '2023-12-01', '2023-12-02', 'Chờ', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `daubep`
--

CREATE TABLE `daubep` (
  `ID` int(11) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `GioiTinh` varchar(10) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `MaChucVu` varchar(255) NOT NULL,
  `SoNamKinhNghiem` int(11) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `SoDienThoai` varchar(15) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `MoTa` text DEFAULT NULL,
  `HinhAnh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `daubep`
--

INSERT INTO `daubep` (`ID`, `HoTen`, `GioiTinh`, `NgaySinh`, `MaChucVu`, `SoNamKinhNghiem`, `Email`, `SoDienThoai`, `DiaChi`, `MoTa`, `HinhAnh`) VALUES
(1, 'Trương Bá Cát Trường', 'Nam', '1985-01-15', '31', 15, 'truong@example.com', '0987654321', 'Đường Phủ Lý, Hà Nội', 'Phó Bếp của chúng tôi không chỉ là người hỗ trợ Bếp Trưởng mà còn là linh hồn của bếp nhà hàng. Với 10 năm kinh nghiệm chế biến đa dạng các món ăn, Phó Bếp chịu trách nhiệm đảm bảo rằng mỗi món ăn đều được chuẩn bị một cách hoàn hảo. Sự tỉ mỉ, sự chú ý đến chi tiết và khả năng làm việc nhóm xuất sắc là những đặc điểm xuất sắc của họ.', '../../img/restaurant/chef1.jpg'),
(2, 'Nguyễn Thị Xón', 'Nữ', '1990-06-25', '32', 10, 'xon@example.com', '0123456789', '456 Đường XYZ, Hà Nội', 'Phó Bếp của chúng tôi không chỉ là người hỗ trợ Bếp Trưởng mà còn là linh hồn của bếp nhà hàng. Với 10 năm kinh nghiệm chế biến đa dạng các món ăn, Phó Bếp chịu trách nhiệm đảm bảo rằng mỗi món ăn đều được chuẩn bị một cách hoàn hảo. Sự tỉ mỉ, sự chú ý đến chi tiết và khả năng làm việc nhóm xuất sắc là những đặc điểm xuất sắc của họ.', '../../img/restaurant/chef2.jpg'),
(3, 'Cấn Minh Quang', 'Nam', '1987-03-10', '33', 12, 'quang@example.com', '0369852147', '789 Đường DEF, Hà Nội', 'Phó Bếp của chúng tôi không chỉ là người hỗ trợ Bếp Trưởng mà còn là linh hồn của bếp nhà hàng. Với 10 năm kinh nghiệm chế biến đa dạng các món ăn, Phó Bếp chịu trách nhiệm đảm bảo rằng mỗi món ăn đều được chuẩn bị một cách hoàn hảo. Sự tỉ mỉ, sự chú ý đến chi tiết và khả năng làm việc nhóm xuất sắc là những đặc điểm xuất sắc của họ.', '../../img/restaurant/chef3.jpg'),
(4, 'Nguyễn Khánh', 'Nam', '1975-08-02', '33', 25, 'khanh@example.com', '0912345678', '987 Đường UVW, Hà Nội', 'Phó Bếp của chúng tôi không chỉ là người hỗ trợ Bếp Trưởng mà còn là linh hồn của bếp nhà hàng. Với 10 năm kinh nghiệm chế biến đa dạng các món ăn, Phó Bếp chịu trách nhiệm đảm bảo rằng mỗi món ăn đều được chuẩn bị một cách hoàn hảo. Sự tỉ mỉ, sự chú ý đến chi tiết và khả năng làm việc nhóm xuất sắc là những đặc điểm xuất sắc của họ.', '../../img/restaurant/chef4.jpg'),
(5, 'Trịnh Tiến Lên', 'Nam', '1993-12-20', '33', 8, 'len@example.com', '0563214789', '753 Đường JKL, Hà Nội', 'Với 8 năm kinh nghiệm, Đầu Bếp của chúng tôi không chỉ là người nấu ăn giỏi mà còn là người thầy hướng dẫn tài năng. Sự chắc chắn và khéo léo trong việc chế biến các nguyên liệu tươi ngon thành những bữa ăn tinh tế là niềm tự hào của họ. Độ sáng tạo không giới hạn và kỹ năng thượng thừa của Đầu Bếp đều làm cho mỗi bữa ăn trở thành một trải nghiệm ẩm thực đáng nhớ.', '../../img/restaurant/chef5.jpg'),
(6, 'Gia Bảo', 'Nam', '1980-04-05', '33', 18, 'bao@example.com', '0709876543', '345 Đường MNO, Hà Nội', 'Với 18 năm kinh nghiệm, Đầu Bếp của chúng tôi không chỉ là người nấu ăn giỏi mà còn là người thầy hướng dẫn tài năng. Sự chắc chắn và khéo léo trong việc chế biến các nguyên liệu tươi ngon thành những bữa ăn tinh tế là niềm tự hào của họ. Độ sáng tạo không giới hạn và kỹ năng thượng thừa của Đầu Bếp đều làm cho mỗi bữa ăn trở thành một trải nghiệm ẩm thực đáng nhớ.', '../../img/restaurant/chef6.jpg'),
(7, 'Trương Vân', 'Nữ', '1988-09-14', '33', 14, 'van@example.com', '0563217890', '542 Đường PQR, Hà Nội', 'Với 14 năm kinh nghiệm, Đầu Bếp của chúng tôi không chỉ là người nấu ăn giỏi mà còn là người thầy hướng dẫn tài năng. Sự chắc chắn và khéo léo trong việc chế biến các nguyên liệu tươi ngon thành những bữa ăn tinh tế là niềm tự hào của họ. Độ sáng tạo không giới hạn và kỹ năng thượng thừa của Đầu Bếp đều làm cho mỗi bữa ăn trở thành một trải nghiệm ẩm thực đáng nhớ.', '../../img/restaurant/chef1.jpg'),
(8, 'Nguyễn Tuấn', 'Nam', '1982-06-07', '33', 20, 'tuan@example.com', '0918563201', '153 Đường STU, Hà Nội', 'Với 20 năm kinh nghiệm, Đầu Bếp của chúng tôi không chỉ là người nấu ăn giỏi mà còn là người thầy hướng dẫn tài năng. Sự chắc chắn và khéo léo trong việc chế biến các nguyên liệu tươi ngon thành những bữa ăn tinh tế là niềm tự hào của họ. Độ sáng tạo không giới hạn và kỹ năng thượng thừa của Đầu Bếp đều làm cho mỗi bữa ăn trở thành một trải nghiệm ẩm thực đáng nhớ.', '../../img/restaurant/chef1.jpg'),
(9, 'Cao Trinh', 'Nữ', '1995-03-30', '33', 6, 'trinh@example.com', '0123456789', '456 Đường VWX, Hà Nội', 'Với 6 năm kinh nghiệm, Đầu Bếp của chúng tôi không chỉ là người nấu ăn giỏi mà còn là người thầy hướng dẫn tài năng. Sự chắc chắn và khéo léo trong việc chế biến các nguyên liệu tươi ngon thành những bữa ăn tinh tế là niềm tự hào của họ. Độ sáng tạo không giới hạn và kỹ năng thượng thừa của Đầu Bếp đều làm cho mỗi bữa ăn trở thành một trải nghiệm ẩm thực đáng nhớ.', '../../img/restaurant/chef1.jpg'),
(10, 'Phan Quốc', 'Nam', '1986-11-12', '32', 13, 'quoc@example.com', '0987654321', '123 Đường YZA, Hà Nội', 'Với 13 năm kinh nghiệm, Đầu Bếp của chúng tôi không chỉ là người nấu ăn giỏi mà còn là người thầy hướng dẫn tài năng. Sự chắc chắn và khéo léo trong việc chế biến các nguyên liệu tươi ngon thành những bữa ăn tinh tế là niềm tự hào của họ. Độ sáng tạo không giới hạn và kỹ năng thượng thừa của Đầu Bếp đều làm cho mỗi bữa ăn trở thành một trải nghiệm ẩm thực đáng nhớ.', '../img/restaurant/Tên Ảnh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `MaDichVu` int(11) NOT NULL,
  `TenDichVu` varchar(50) NOT NULL,
  `DonGia` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dichvu`
--

INSERT INTO `dichvu` (`MaDichVu`, `TenDichVu`, `DonGia`) VALUES
(1, 'Extrabed', 300000),
(2, 'Xe đưa đón sân bay', 250000),
(3, 'Dọn Phòng', 150000),
(4, 'Spa', 500000),
(5, 'Nhà hàng', 200000),
(6, 'Phòng họp', 400000),
(7, 'Dịch vụ phòng', 100000),
(8, 'Bể bơi', 350000),
(9, 'Giặt ủi', 120000),
(10, 'Đưa đón tận nơi', 280000),
(11, 'Quầy bar', 180000),
(12, 'Máy lạnh', 100000),
(13, 'Wi-Fi', 50000),
(14, 'TV cáp', 80000),
(15, 'Phòng tắm riêng', 150000),
(16, 'Internet cáp quang', 75000),
(17, 'Phòng hút thuốc', 200000),
(18, 'Quạy trần', 70000),
(19, 'Két sắt', 90000),
(20, 'Dịch vụ buồng', 150000),
(21, 'Điều khiển nhiệt độ', 60000),
(22, 'Ban công riêng', 120000),
(23, 'Mini bar', 110000),
(24, 'Máy pha cà phê', 95000),
(25, 'Lò vi sóng', 80000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doan`
--

CREATE TABLE `doan` (
  `ID` int(11) NOT NULL,
  `TenMon` varchar(255) NOT NULL,
  `PhanLoai` enum('Món chính','Món khai vị','Món tráng miệng','Đồ ăn nhanh','Nước uống') NOT NULL,
  `ThoiGianNau` int(11) NOT NULL,
  `DoKho` enum('Dễ','Bình thường','Tương đối khó','Khó') NOT NULL,
  `ThanhPhan` text NOT NULL,
  `HamLuongcalo` float DEFAULT NULL,
  `ThanhTien` double DEFAULT NULL,
  `MoTa` text DEFAULT NULL,
  `SoLuongDaBan` int(11) DEFAULT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `doan`
--

INSERT INTO `doan` (`ID`, `TenMon`, `PhanLoai`, `ThoiGianNau`, `DoKho`, `ThanhPhan`, `HamLuongcalo`, `ThanhTien`, `MoTa`, `SoLuongDaBan`, `img`) VALUES
(1, 'Gà nướng Kon Tum', 'Món chính', 35, 'Dễ', 'Gà, xả, muối tôm, tỏi băm, mật ong, dầu ăn', 450, 250000, 'Thịt được tẩm ướp gia vị từ một số loài rễ, lá, mật ong và cây rừng Kon Tum nên gà nướng mang hương vị đặc biệt. Khi thưởng thức nên chấm thêm muối tiêu hoặc muối hột lớn với ớt cay cay hay lá bét (một loại lá rừng).', 0, '../img/restaurant/monchinh/ganuong.jpg'),
(2, 'Bún riêu cua đồng', 'Món chính', 30, 'Bình thường', 'Riêu cua, bún, hành, mắm tôm', 350, 22000, 'Bún riêu cua là món ngon đặc biệt với hương vị độc đáo từ riêu cua và bún mềm, thấm vị.', 0, '../img/restaurant/monchinh/bunrieucuadong.webp'),
(3, 'Mì Quảng', 'Món chính', 25, 'Tương đối khó', 'Mì, gia vị, hành, thịt', 200, 30000, 'Mì Quảng là một món ăn truyền thống của Quảng Nam, có hương vị đậm đà và phong cách riêng.', 0, '../img/restaurant/monchinh/myquang.jpg'),
(4, 'Lẩu cá hồi', 'Món chính', 40, 'Khó', 'Cá hồi, rau sống, nước lẩu', 360, 400000, 'Lẩu cá hồi với cá hồi tươi ngon và nước lẩu thơm ngon, hoàn hảo cho những ngày se lạnh.', 0, '../img/restaurant/monchinh/laucahoi.jpg'),
(5, 'Cơm rang dương châu', 'Món chính', 25, 'Tương đối khó', 'Cơm, hành, dương châu, gia vị', 520, 35000, 'Cơm rang dương châu với cơm nướng và hương vị độc đáo từ dương châu.', 0, '../img/restaurant/monchinh/duongchau.jpg'),
(6, 'Bún bò Huế', 'Món chính', 35, 'Bình thường', 'Bún, bò, gia vị, hành, rau sống', 420, 28000, 'Bún bò Huế với hương vị đặc trưng của miền Trung Việt Nam, thích hợp cho người thích mì vị cay.', 0, '../img/restaurant/monchinh/bunbohue.png'),
(8, 'Phở gà', 'Món chính', 30, 'Dễ', 'Phở, gà, gia vị', 380, 30000, 'Phở gà với mì và thịt gà thơm ngon, thích hợp cho bữa sáng hoặc bữa trưa.', 0, '../img/restaurant/monchinh/phoga.jpg'),
(9, 'Bánh xèo', 'Món chính', 20, 'Dễ', 'Bánh xèo, gia vị', 380, 20000, 'Bánh xèo với bánh mỳ giòn tan và nhiều loại gia vị tươi ngon.', 0, '../img/restaurant/monchinh/banhxeo.jpg'),
(10, 'Bún chả', 'Món chính', 25, 'Bình thường', 'Bún, thịt nướng, gia vị', 380, 25000, 'Bún chả là món ăn truyền thống của Hà Nội với bún mềm, thịt nướng thơm ngon. Bún chả thường được ăn kèm với nhiều loại rau sống và nước mắm pha chua ngọt.', 0, '../img/restaurant/monchinh/buncha.jpg'),
(11, 'Cơm gà', 'Món chính', 30, 'Dễ', 'Cơm, thịt gà, gia vị', 350, 20000, 'Cơm gà là món ngon và bổ dưỡng với thịt gà tươi ngon và cơm hấp. Món này thường được kèm theo nước lẩu hấp dẫn.', 0, '../img/restaurant/monchinh/comga.jpg'),
(13, 'Bánh mì kẹp thịt', 'Món chính', 20, 'Bình thường', 'Bánh mì, thịt, rau sống', 320, 18000, 'Bánh mì kẹp thịt với thịt và rau sống giòn tan là lựa chọn lý tưởng cho bữa ăn nhanh và ngon miệng.', 0, '../img/restaurant/monchinh/banhmykep.jpg'),
(14, 'Hủ tiếu Nam Vang', 'Món chính', 30, 'Tương đối khó', 'Hủ tiếu, thịt, gia vị', 410, 28000, 'Hủ tiếu Nam Vang là món ăn phổ biến tại Sài Gòn với hủ tiếu và thịt tươi ngon. Món này thường được kèm theo nước dùng thơm ngon.', 0, '../img/restaurant/monchinh/hutieu.jpg'),
(15, 'Mì Ý hấp', 'Món chính', 35, 'Tương đối khó', 'Mì Ý, thịt, gia vị', 450, 32000, 'Mì Ý hấp với mì Ý mềm và thịt ngon là một món ăn sang trọng và ngon miệng.', 0, '../img/restaurant/monchinh/myyhap.jpg'),
(16, 'Cơm rang dưa lưới', 'Món chính', 25, 'Bình thường', 'Cơm, dưa lưới, gia vị', 320, 22000, 'Cơm rang dưa lưới là món ăn thơm ngon và dễ làm với cơm và dưa lưới giòn tan.', 0, '../img/restaurant/monchinh/comrang.jpg'),
(28, 'Gỏi cuốn', 'Món khai vị', 20, 'Dễ', 'Bánh tráng, thịt nướng, rau sống', 280, 18000, 'Gỏi cuốn là món ăn dễ làm và ngon miệng với bánh tráng mỏng và thịt nướng tươi ngon.', 0, '../img/restaurant/monkhaivi/goicuon.jpg'),
(29, 'Bánh mì pate', 'Món khai vị', 15, 'Dễ', 'Bánh mì, pate, gia vị', 250, 12000, 'Bánh mì pate với lớp pate thơm ngon và bánh mì giòn tan là lựa chọn tuyệt vời cho món khai vị.', 0, '../img/restaurant/monkhaivi/banhmipate.jpg'),
(30, 'Canapé hải sản', 'Món khai vị', 25, 'Tương đối khó', 'Bánh mì, hải sản, gia vị', 320, 22000, 'Canapé hải sản với hải sản tươi ngon và bánh mì hấp dẫn là món khai vị hấp dẫn.', 0, '../img/restaurant/monkhaivi/takoyaki.jpg'),
(31, 'Nem chua', 'Món khai vị', 20, 'Dễ', 'Thịt, gia vị', 240, 14000, 'Nem chua là món khai vị truyền thống với thịt và gia vị thơm ngon.', 0, '../img/restaurant/monkhaivi/nemchua.jpg'),
(32, 'Bánh mì ốp la', 'Món khai vị', 20, 'Dễ', 'Bánh mì, trứng, gia vị', 290, 16000, 'Bánh mì ốp la với trứng gà và gia vị hấp dẫn là món khai vị ngon miệng.', 0, '../img/restaurant/monkhaivi/banhmiopla.jpg'),
(33, 'Xúc xích chiên', 'Món khai vị', 25, 'Dễ', 'Xúc xích, gia vị', 310, 18000, 'Xúc xích chiên với xúc xích tươi ngon và gia vị là lựa chọn lý tưởng cho món khai vị.', 0, '../img/restaurant/monkhaivi/chuchchichchien.jpg'),
(34, 'Súp lơ xào nấm', 'Món khai vị', 30, 'Dễ', 'Súp lơ, nấm, gia vị', 260, 14000, 'Súp lơ với súp lơ thơm ngon và gia vị là món khai vị hấp dẫn.', 0, '../img/restaurant/monkhaivi/suploxaonam.png'),
(35, 'Kem sữa chua', 'Món tráng miệng', 10, 'Dễ', 'Sữa bò, chất làm kem, vani, vừng', 180, 15000, 'Kem sữa chua với lớp sữa chua mềm mịn và hương vị thơm ngon.', 0, '../img/restaurant/montrangmieng/kemsuachua.png'),
(36, 'Bánh flan', 'Món tráng miệng', 15, 'Dễ', 'Trứng, Lòng đỏ trứng, Sữa tươi không đường, Đường, Vani', 250, 18000, 'Bánh flan với lớp caramel và bánh flan mềm mịn là món tráng miệng ngon miệng.', 0, '../img/restaurant/montrangmieng/flancake.jpg'),
(37, 'Kem chocolate', 'Món tráng miệng', 10, 'Dễ', 'Sữa tươi, Đường, Cacao, Chocolate đen, Yolk trứng, Kem tươi ', 220, 16000, 'Kem chocolate với kem thơm và sô cô la là món tráng miệng ngon miệng.', 0, '../img/restaurant/montrangmieng/Kemchocolate.jpg'),
(38, 'Cheesecake dâu', 'Món tráng miệng', 20, 'Tương đối khó', 'Dâu, bánh cheesecake, gia vị', 290, 22000, 'Cheesecake dâu với lớp cheesecake mềm và hương vị dâu là món tráng miệng hấp dẫn.', 0, '../img/restaurant/montrangmieng/Cheesecakedau.jpeg'),
(39, 'Bánh ngọt phô mai', 'Món tráng miệng', 15, 'Dễ', 'Bánh ngọt, phô mai, gia vị', 260, 19000, 'Bánh ngọt phô mai với lớp phô mai béo và bánh ngọt giòn là món tráng miệng ngon miệng.', 0, '../img/restaurant/montrangmieng/banhngotphomai.jpg'),
(40, 'Panna cotta', 'Món tráng miệng', 25, 'Tương đối khó', 'Sữa tươi, Đường, Gelatin, Kem tươi (whipping cream), Vanilla extract', 320, 25000, 'Panna cotta với lớp kem mềm và hương vị hạt dẻ là món tráng miệng hấp dẫn.', 0, '../img/restaurant/montrangmieng/Pannacotta.jpg'),
(41, 'Bánh tiramisu', 'Món tráng miệng', 20, 'Tương đối khó', 'Bánh tiramisu, cà phê', 310, 22000, 'Bánh tiramisu với bánh tiramisu thơm ngon và lớp cà phê là món tráng miệng hấp dẫn.', 0, '../img/restaurant/montrangmieng/tiramisu.jpg'),
(42, 'Bánh mì hamburger', 'Đồ ăn nhanh', 15, 'Dễ', 'Bánh mì, thịt bò, rau sống', 450, 35000, 'Bánh mì hamburger với thịt bò, rau sống và gia vị hấp dẫn là món đồ ăn nhanh phổ biến.', 0, '../img/restaurant/doannhanh/hamburger.jpg'),
(43, 'Pizza hawaiian', 'Đồ ăn nhanh', 20, 'Tương đối khó', 'Bánh pizza, thịt dăm, dứa, phô mai', 500, 42000, 'Pizza hawaiian với lớp bánh pizza mỏng, thịt dăm, dứa và phô mai là món đồ ăn nhanh thơm ngon.', 0, '../img/restaurant/doannhanh/Pizzahawaiian.jpg'),
(44, 'Bánh mỳ sandwich', 'Đồ ăn nhanh', 15, 'Dễ', 'Bánh mỳ, thịt gà, rau sống', 380, 30000, 'Bánh mỳ sandwich với thịt gà, rau sống và gia vị hấp dẫn là món đồ ăn nhanh ngon miệng.', 0, '../img/restaurant/doannhanh/sandwich.jpg'),
(45, 'Bánh bao', 'Đồ ăn nhanh', 10, 'Dễ', 'Bột mỳ, nhân thịt, trứng cút', 280, 18000, 'Bánh bao với lớp bánh mềm và nhân thịt là món đồ ăn nhanh truyền thống.', 0, '../img/restaurant/doannhanh/banhbao.webp'),
(46, 'Cơm cuộn', 'Đồ ăn nhanh', 25, 'Dễ', 'Cơm, thịt nướng, rau sống', 320, 25000, 'Cơm cuộn với lớp cơm, thịt nướng và rau sống là món đồ ăn nhanh ngon miệng.', 0, '../img/restaurant/doannhanh/kimbap.webp'),
(47, 'Mì xào hải sản', 'Đồ ăn nhanh', 20, 'Tương đối khó', 'Mì, hải sản, gia vị', 420, 35000, 'Mì xào hải sản với lớp mì và hải sản tươi ngon là món đồ ăn nhanh hấp dẫn.', 0, '../img/restaurant/doannhanh/mixaohaisan.jpg'),
(48, 'Hotdog', 'Đồ ăn nhanh', 15, 'Dễ', 'Xúc xích, bánh mì', 350, 28000, 'Hotdog với xúc xích và bánh mì giòn là món đồ ăn nhanh phổ biến.', 0, '../img/restaurant/doannhanh/Hotdog.jpg'),
(49, 'Bánh trứng', 'Đồ ăn nhanh', 12, 'Dễ', 'Trứng gà, gia vị, bột mỳ', 280, 20000, 'Bánh trứng với lớp bánh mềm và trứng gà là món đồ ăn nhanh ngon miệng.', 0, '../img/restaurant/doannhanh/banhtrung.jpg'),
(50, 'Bánh mì bơ tỏi', 'Đồ ăn nhanh', 15, 'Dễ', 'Bánh mì, bơ, tỏi, gia vị', 320, 22000, 'Bánh mì bơ tỏi với bơ tỏi thơm và bánh mì giòn là món đồ ăn nhanh hấp dẫn.', 0, '../img/restaurant/doannhanh/Garlicbread.jpg'),
(51, 'Bánh su kem', 'Đồ ăn nhanh', 18, 'Dễ', 'Bánh su kem, kem, gia vị', 280, 19000, 'Bánh su kem với lớp bánh su kem mềm và kem thơm là món đồ ăn nhanh ngon miệng.', 0, '../img/restaurant/doannhanh/chouxcream.jpg'),
(52, 'Cà phê đen', 'Nước uống', 5, 'Dễ', 'Cà phê rang xay (hạt đã xay sẵn), Nước sôi', 30, 22000, 'Cà phê đen với hương vị đắng và thơm là món nước uống phổ biến.', 0, '../img/restaurant/douong/capheden.jpg'),
(53, 'Nước chanh', 'Nước uống', 5, 'Dễ', 'Nước chanh, đường hoá học', 40, 15000, 'Nước chanh với hương vị chua ngọt là món nước uống giải khát.', 0, '../img/restaurant/douong/nuocchanh.jpg'),
(54, 'Soda chanh', 'Nước uống', 8, 'Dễ', 'Nước soda, Nước cốt chanh tươi, Đường , Đá lạnh', 60, 25000, 'Soda chanh với hương vị soda và chanh là món nước uống giải khát phổ biến.', 0, '../img/restaurant/douong/sodachanh.jpg'),
(55, 'Nước dừa', 'Nước uống', 10, 'Dễ', 'Nước Dừa,\nNước cốt dừa, Đường, Đá lạnh', 50, 28000, 'Nước dừa tươi ngon và bổ dưỡng.', 0, '../img/restaurant/douong/nuocdua.jpg'),
(56, 'Sinh tố bơ', 'Nước uống', 10, 'Dễ', 'Bơ, sữa, đường', 90, 35000, 'Sinh tố bơ với hương vị bơ ngon và thơm.', 0, '../img/restaurant/douong/sinhtobo.jpg'),
(57, 'Cà phê sữa', 'Nước uống', 5, 'Dễ', 'Cà phê, sữa, đường', 70, 26000, 'Cà phê sữa với hương vị cà phê và sữa ngon miệng.', 0, '../img/restaurant/douong/caphesua.jpg'),
(58, 'Trà đào', 'Nước uống', 8, 'Dễ', 'Trà, đào, đường', 80, 30000, 'Trà đào với hương vị trà thơm và đào ngon miệng.', 34, '../img/restaurant/douong/tradao.jpg'),
(59, 'Nước ép táo', '', 6, 'Tương đối khó', 'Táo', 70, 32000, 'Nước ép táo tươi ngon, giàu chất xơ và vitamin.', 80, '../img/restaurant/douong/nuoc-ep-tao.jpg'),
(60, 'Nước ép dưa lưới', '', 5, 'Bình thường', 'Dưa lưới', 60, 30000, 'Nước ép dưa lưới mát lạnh, giải khát tốt.', 100, '../img/restaurant/douong/nuoc-ep-dua-luoi.jpg'),
(61, 'Smoothie dâu', '', 4, 'Dễ', 'Dâu, sữa, đường', 120, 40000, 'Smoothie dâu mịn màng, ngon miệng.', 70, '../img/restaurant/douong/smoothie-dau.jpg'),
(62, 'Nước mía', '', 8, 'Tương đối khó', 'Mía', 90, 35000, 'Nước mía ngọt lịm, giúp giải độc tố trong cơ thể.', 60, '../img/restaurant/douong/nuoc-mia.jpg'),
(63, 'Nước ép cà rốt', '', 6, 'Tương đối khó', 'Cà rốt', 80, 33000, 'Nước ép cà rốt giàu vitamin A, tốt cho sức khỏe mắt.', 75, '../img/restaurant/douong/nuoc-ep-ca-rot.jpg'),
(64, 'Sinh tố xoài', '', 4, 'Dễ', 'Xoài, sữa, đường', 150, 42000, 'Sinh tố xoài mát lạnh, hương vị tuyệt vời.', 55, '../img/restaurant/douong/sinh-to-xoai.jpg'),
(65, 'Nước lọc trái cây', '', 3, 'Dễ', 'Dâu, dưa hấu, lựu, dưa lưới', 40, 25000, 'Nước lọc trái cây tươi ngon, giúp cung cấp năng lượng.', 120, '../img/restaurant/douong/nuoc-loc-trai-cay.jpg'),
(66, 'Nước ép táo', 'Nước uống', 6, 'Dễ', 'Táo, đường hoá học', 70, 32000, 'Nước ép táo tươi ngon, giàu chất xơ và vitamin.', 80, '../img/restaurant/douong/nuoc-ep-tao.jpg'),
(67, 'Nước ép dưa lưới mix kiwi', 'Nước uống', 5, 'Bình thường', 'Dưa lưới, kiwi, đường hoá học', 60, 30000, 'Nước ép dưa lưới mát lạnh, giải khát tốt.', 100, '../img/restaurant/douong/nuoc-ep-dua-luoi.jpg'),
(68, 'Smoothie dâu', 'Nước uống', 4, 'Dễ', 'Dâu, sữa, đường, chuối', 120, 40000, 'Smoothie dâu mịn màng, ngon miệng.', 70, '../img/restaurant/douong/smoothie-dau.jpg'),
(69, 'Nước mía', 'Nước uống', 8, 'Dễ', 'Mía, tắc', 90, 35000, 'Nước mía ngọt lịm, giúp giải độc tố trong cơ thể.', 60, '../img/restaurant/douong/nuoc-mia.jpg'),
(70, 'Nước ép cà rốt mix cam', 'Nước uống', 6, 'Tương đối khó', 'Cà rốt, đường hoá học, cam', 80, 33000, 'Nước ép cà rốt giàu vitamin A, tốt cho sức khỏe mắt.', 75, '../img/restaurant/douong/nuoc-ep-ca-rot.jpg'),
(71, 'Sinh tố xoài', 'Nước uống', 4, 'Dễ', 'Xoài, sữa, đường', 150, 42000, 'Sinh tố xoài mát lạnh, hương vị tuyệt vời.', 55, '../img/restaurant/douong/sinh-to-xoai.jpg'),
(72, 'Nước lọc trái cây', 'Nước uống', 3, 'Dễ', 'Dâu, dưa hấu, lựu, dưa lưới', 40, 25000, 'Nước lọc trái cây tươi ngon, giúp cung cấp năng lượng.', 120, '../img/restaurant/douong/nuoc-loc-trai-cay.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) NOT NULL,
  `mamonan` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `gia` int(11) NOT NULL,
  `makhachhang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id`, `mamonan`, `soluong`, `gia`, `makhachhang`) VALUES
(29, 54, 4, 0, 1),
(30, 52, 3, 22000, 84),
(31, 53, 1, 15000, 84),
(32, 52, 3, 22000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHoaDon` int(11) NOT NULL,
  `MaPDP` int(11) NOT NULL,
  `TongTien` double NOT NULL,
  `TinhTrang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MaHoaDon`, `MaPDP`, `TongTien`, `TinhTrang`) VALUES
(10, 10, 2700000, 'Đã thanh toán'),
(11, 14, 2500000, 'Đã đặt cọc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `ID` int(11) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `SDT` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `CMND` varchar(12) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `GioiTinh` int(11) NOT NULL,
  `PassWord` varchar(255) NOT NULL,
  `AccessToken` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`ID`, `HoTen`, `SDT`, `Email`, `CMND`, `DiaChi`, `GioiTinh`, `PassWord`, `AccessToken`) VALUES
(1, 'Admin', '0123456789', 'admin@gmail.com', '343025555', 'Thanh Hoá', 1, 'admin', NULL),
(3, 'Thùy Dung Nguyễn Thị', '0334504676', 'thuydungtstb@gmail.com', '001200507328', 'Thái Bình', 0, 'tstb2002', ''),
(4, 'Minh Tâm', '0125556789', 'tam@gmail.com', '00123456776', 'Hà Nội', 1, '456', ''),
(5, 'Trần Anh', '0126666789', 'anh@gmail.com', '00123456776', 'Đà Nẵng', 1, '789', ''),
(6, 'Hoàng Nam', '0127776789', 'nam@gmail.com', '00123456776', 'Hồ Chí Minh', 1, '135', ''),
(7, 'Lan Hương', '0128886789', 'huong@gmail.com', '00123456776', 'Bắc Ninh', 0, '246', ''),
(8, 'Thanh Hà', '0129996789', 'ha@gmail.com', '00123456776', 'Hải Phòng', 0, '579', ''),
(9, 'Quốc Anh', '0120001234', 'quocanh@gmail.com', '00123456776', 'Ninh Bình', 1, '111', ''),
(10, 'Ngọc Thảo', '0121112345', 'thaongoc@gmail.com', '00123456776', 'Thái Nguyên', 0, '222', ''),
(11, 'Văn Huy', '0122223456', 'huy@gmail.com', '00123456776', 'Hà Nam', 1, '333', ''),
(12, 'Trung Hiếu', '0123334567', 'hieu@gmail.com', '00123456776', 'Bắc Giang', 1, '444', ''),
(13, 'Hạnh Phúc', '0124445678', 'phuc@gmail.com', '00123456776', 'Hải Dương', 0, '555', ''),
(14, 'Xuân Thành', '0125556789', 'thanh@gmail.com', '00123456776', 'Thanh Hóa', 1, '666', ''),
(15, 'Tuyết Nga', '0126667890', 'tuyet@gmail.com', '00123456776', 'Hà Tĩnh', 0, '777', ''),
(16, 'Lâm Trọng', '0127778901', 'trong@gmail.com', '00123456776', 'Bình Định', 1, '888', ''),
(17, 'Phương Mai', '0128889012', 'mai@gmail.com', '00123456776', 'Quảng Ninh', 0, '999', ''),
(18, 'Thế Anh', '0129990123', 'anhthe@gmail.com', '00123456776', 'Hà Tĩnh', 1, '987', ''),
(19, 'Hoài Nam', '0120001234', 'namhoai@gmail.com', '00123456776', 'Quảng Bình', 1, '765', ''),
(20, 'Hoàng Anh', '0121112345', 'anhhoang@gmail.com', '00123456776', 'Hà Giang', 1, '543', ''),
(21, 'Vũ Thảo', '0122223456', 'thaovu@gmail.com', '00123456776', 'Ninh Thuận', 0, '321', ''),
(22, 'Phạm Huy', '0123334567', 'huypham@gmail.com', '00123456776', 'Quảng Trị', 1, '234', ''),
(23, 'Thị Hương', '0124445678', 'huongthi@gmail.com', '00123456776', 'Yên Bái', 0, '432', ''),
(24, 'Hoàng Dương', '0125556789', 'duonghoang@gmail.com', '00123456776', 'Sơn La', 1, '654', ''),
(25, 'Thị Lý', '0126667890', 'lythi@gmail.com', '00123456776', 'Bắc Kạn', 0, '987', ''),
(26, 'Thái Bình', '0127778901', 'thaibinh@gmail.com', '00123456776', 'Thái Bình', 1, '111', ''),
(27, 'Sài Gòn', '0128889012', 'saigon@gmail.com', '00123456776', 'Hồ Chí Minh', 1, '222', ''),
(28, 'Bắc Ninh', '0129990123', 'bacninh@gmail.com', '00123456776', 'Bắc Ninh', 0, '333', ''),
(29, 'Hải Phòng', '0120001234', 'haiphong@gmail.com', '00123456776', 'Hải Phòng', 1, '444', ''),
(30, 'Ninh Bình', '0121112345', 'ninhbinh@gmail.com', '00123456776', 'Ninh Bình', 0, '555', ''),
(31, 'Thái Nguyên', '0122223456', 'thainguyen@gmail.com', '00123456776', 'Thái Nguyên', 1, '666', ''),
(32, 'Hà Nam', '0123334567', 'hanam@gmail.com', '00123456776', 'Hà Nam', 1, '777', ''),
(33, 'Bắc Giang', '0124445678', 'bacgiang@gmail.com', '00123456776', 'Bắc Giang', 1, '888', ''),
(34, 'Hải Dương', '0125556789', 'haiduong@gmail.com', '00123456776', 'Hải Dương', 0, '999', ''),
(35, 'Thanh Hóa', '0126667890', 'thanhhoa@gmail.com', '00123456776', 'Thanh Hóa', 1, '987', ''),
(36, 'Hà Tĩnh', '0127778901', 'hatinh@gmail.com', '00123456776', 'Hà Tĩnh', 0, '765', ''),
(37, 'Bình Định', '0128889012', 'binhdinh@gmail.com', '00123456776', 'Bình Định', 1, '543', ''),
(38, 'Quảng Ninh', '0129990123', 'quangninh@gmail.com', '00123456776', 'Quảng Ninh', 0, '321', ''),
(39, 'Hà Tĩnh', '0120001234', 'hatinh2@gmail.com', '00123456776', 'Hà Tĩnh', 1, '234', ''),
(40, 'Quảng Bình', '0121112345', 'quangbinh@gmail.com', '00123456776', 'Quảng Bình', 1, '432', ''),
(41, 'Hà Giang', '0122223456', 'hagiang@gmail.com', '00123456776', 'Hà Giang', 0, '654', ''),
(42, 'Ninh Thuận', '0123334567', 'ninhthuan@gmail.com', '00123456776', 'Ninh Thuận', 1, '987', ''),
(43, 'Quảng Trị', '0124445678', 'quangtri@gmail.com', '00123456776', 'Quảng Trị', 1, '321', ''),
(44, 'Yên Bái', '0125556789', 'yenbai@gmail.com', '00123456776', 'Yên Bái', 0, '234', ''),
(45, 'Sơn La', '0126667890', 'sonla@gmail.com', '00123456776', 'Sơn La', 1, '432', ''),
(46, 'Bắc Kạn', '0127778901', 'backan@gmail.com', '00123456776', 'Bắc Kạn', 0, '654', ''),
(47, 'Lạng Sơn', '0128889012', 'langson@gmail.com', '00123456776', 'Lạng Sơn', 1, '987', ''),
(48, 'Lào Cai', '0129990123', 'laocai@gmail.com', '00123456776', 'Lào Cai', 0, '321', ''),
(49, 'Tuyên Quang', '0120001234', 'tuyenquang@gmail.com', '00123456776', 'Tuyên Quang', 1, '234', ''),
(50, 'Cát Trường Trương Bá', '0336004076', 'batruong1704@gmail.com', '123456789', 'Hà Nội', 1, '0123456789', '108617347685033795623'),
(51, 'Cao Bằng', '0121112345', 'caobang@gmail.com', '00123456776', 'Cao Bằng', 1, '432', ''),
(74, 'Cát Trường Trương Bá', '0336004076', 'truongtg2k@gmail.com', '123456789', 'Hà Nội', 1, 'admin123', '109408661915133195138'),
(78, 'Trường Bá', '', '7steam.work@gmail.com', '0', 'Hà Nội', 1, 'admin', '105238185890006122819'),
(84, 'Phạm Bá Hoàng', '0336004074', 'phambahoang@gmail.com', '038202016655', 'Thanh Hoé', 1, 'admin123', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mathang`
--

CREATE TABLE `mathang` (
  `MaHang` varchar(20) NOT NULL,
  `TenHang` varchar(50) NOT NULL,
  `MaCongTy` varchar(20) NOT NULL,
  `LoaiHang` varchar(50) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonViTinh` varchar(50) NOT NULL,
  `GiaNhap` double NOT NULL,
  `GiaBan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mathang`
--

INSERT INTO `mathang` (`MaHang`, `TenHang`, `MaCongTy`, `LoaiHang`, `SoLuong`, `DonViTinh`, `GiaNhap`, `GiaBan`) VALUES
('MH001', 'Coca Cola', 'MCT001', 'Nước uống', 100, 'Lon', 9000, 11000),
('MH002', 'Pepsi', 'MCT002', 'Nước uống', 150, 'Lon', 8, 10000),
('MH003', 'Bánh mì', 'MCT003', 'Thực phẩm', 200, 'Cái', 5000, 8000),
('MH004', 'Sữa tươi', 'MCT004', 'Nước uống', 80, 'Chai', 12000, 15000),
('MH005', 'Bánh quy', 'MCT005', 'Thực phẩm', 120, 'Hộp', 20000, 25000),
('MH006', 'Rượu Vodka', 'MCT001', 'Đồ uống', 120, 'Chai', 28000, 33000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaCongTy` varchar(20) NOT NULL,
  `TenCongTy` varchar(50) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `DienThoai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaCongTy`, `TenCongTy`, `DiaChi`, `Email`, `DienThoai`) VALUES
('MCT001', 'Công ty TNHH Thái Dương', 'Hà Nội', 'td@example.com', '0961473771'),
('MCT002', 'Công ty Nam Phương', '123 Đường Minh Khai, Hà Nội', 'namphuong@example.com', '0394462318'),
('MCT003', 'Công ty Hòa Phát', '456 Đường Võ Nguyên Giáp, Hà Nội', 'hoaphat@example.com', '0394407543'),
('MCT004', 'Công ty CP Bánh Kẹo Hải Hà', '789 Đường Phạm Văn Đồng,Hồ Chí Minh', 'haiha@gamil.com', '0389880459'),
('MCT005', 'Công ty CP Tiêu Dùng MaSan', '101 Đường Việt Nam, TP Hà Nội', 'masan@gmail.com', '0961523815');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` int(11) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `MaChucVu` varchar(255) NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `GioiTinh` int(11) DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `SoDienThoai` varchar(255) NOT NULL,
  `MatKhau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNhanVien`, `HoTen`, `MaChucVu`, `NgaySinh`, `GioiTinh`, `DiaChi`, `Email`, `SoDienThoai`, `MatKhau`) VALUES
(1, 'Bá Trường', '11', '2023-11-01', 1, 'Thanh Hoá', 'admin@gmail.com', '123456789', 'admin'),
(2, 'Cấn Minh Quang', '31', '2002-03-20', 1, 'Hà Nội', 'quang@gmail.com', '0973956942', '1'),
(3, 'Minh Tâm', '13', '2000-05-15', 1, 'Hà Nội', 'tam@gmail.com', '0125556789', '456'),
(4, 'Trần Anh', '14', '1998-03-21', 1, 'Đà Nẵng', 'anh@gmail.com', '0126666789', '789'),
(5, 'Hoàng Nam', '21', '1999-07-10', 1, 'Hồ Chí Minh', 'nam@gmail.com', '0127776789', '135'),
(6, 'Lan Hương', '22', '1997-09-05', 0, 'Bắc Ninh', 'huong@gmail.com', '0128886789', '246'),
(7, 'Thanh Hà', '23', '1995-08-17', 0, 'Hải Phòng', 'ha@gmail.com', '0129996789', '579'),
(8, 'Quốc Anh', '24', '2000-06-14', 1, 'Ninh Bình', 'quocanh@gmail.com', '0120001234', '111'),
(9, 'Ngọc Thảo', '25', '2001-04-02', 0, 'Thái Nguyên', 'thaongoc@gmail.com', '0121112345', '222'),
(10, 'Văn Huy', '26', '1996-02-19', 1, 'Hà Nam', 'huy@gmail.com', '0122223456', '333'),
(11, 'Trung Hiếu', '27', '1994-01-07', 1, 'Bắc Giang', 'hieu@gmail.com', '0123334567', '444'),
(12, 'Hạnh Phúc', '28', '1993-10-24', 0, 'Hải Dương', 'phuc@gmail.com', '0124445678', '555'),
(13, 'Xuân Thành', '29', '1992-12-30', 1, 'Thanh Hóa', 'thanh@gmail.com', '0125556789', '666'),
(14, 'Tuyết Nga', '31', '1997-06-08', 0, 'Hà Tĩnh', 'tuyet@gmail.com', '0126667890', '777'),
(15, 'Lâm Trọng', '32', '1999-04-14', 1, 'Bình Định', 'trong@gmail.com', '0127778901', '888'),
(16, 'Phương Mai', '33', '1998-08-02', 0, 'Quảng Ninh', 'mai@gmail.com', '0128889012', '999'),
(17, 'Thế Anh', '41', '1995-03-23', 1, 'Hà Tĩnh', 'anhthe@gmail.com', '0129990123', '987'),
(18, 'Hoài Nam', '42', '1994-12-11', 1, 'Quảng Bình', 'namhoai@gmail.com', '0120001234', '765'),
(19, 'Hoàng Anh', '43', '1993-07-31', 1, 'Hà Giang', 'anhhoang@gmail.com', '0121112345', '543'),
(20, 'Vũ Thảo', '44', '1997-09-29', 0, 'Ninh Thuận', 'thaovu@gmail.com', '0122223456', '321'),
(21, 'Phạm Huy', '21', '1998-11-25', 1, 'Quảng Trị', 'huypham@gmail.com', '0123334567', '234'),
(22, 'Thị Hương', '22', '1996-05-07', 0, 'Yên Bái', 'huongthi@gmail.com', '0124445678', '432'),
(23, 'Hoàng Dương', '23', '1995-02-03', 1, 'Sơn La', 'duonghoang@gmail.com', '0125556789', '654'),
(24, 'Thị Lý', '24', '1994-10-18', 0, 'Bắc Kạn', 'lythi@gmail.com', '0126667890', '987'),
(25, 'Tấn Thắng', '25', '1998-08-09', 1, 'Lạng Sơn', 'thangtan@gmail.com', '0127778901', '321'),
(26, 'Trung Hiếu', '28', '1993-04-05', 1, 'Hải Phòng', 'hieu@gmail.com', '0128881111', '9999'),
(27, 'Lan Hương', '22', '1997-09-05', 0, 'Bắc Ninh', 'huong@gmail.com', '0129992222', '8888');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhaphang`
--

CREATE TABLE `nhaphang` (
  `MaNhapHang` varchar(20) NOT NULL,
  `MaHang` varchar(20) NOT NULL,
  `MaCongTy` varchar(20) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `LoaiHang` varchar(50) NOT NULL,
  `DonViTinh` varchar(50) NOT NULL,
  `GiaNhap` double NOT NULL,
  `NgayNhap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieudatphong`
--

CREATE TABLE `phieudatphong` (
  `MaPDP` int(11) NOT NULL,
  `MaKhachHang` int(11) NOT NULL,
  `MaNhanVien` int(11) DEFAULT NULL,
  `TongTien` double NOT NULL,
  `ThanhToanTruoc` double NOT NULL,
  `PhuongThucThanhToan` varchar(50) NOT NULL,
  `NgayTT` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieudatphong`
--

INSERT INTO `phieudatphong` (`MaPDP`, `MaKhachHang`, `MaNhanVien`, `TongTien`, `ThanhToanTruoc`, `PhuongThucThanhToan`, `NgayTT`) VALUES
(10, 74, 1, 2500000, 250000, 'Thanh toán bằng QR-Pay', '2023-10-31'),
(11, 78, 1, 3200000, 0, 'Thanh Toán Trực Tiếp', '2023-11-02'),
(12, 78, 1, 11600000, 0, 'Thanh Toán Trực Tiếp', '2023-11-02'),
(13, 78, 1, 8600000, 0, 'Thanh Toán Trực Tiếp', '2023-11-02'),
(14, 84, NULL, 2500000, 1000000, 'Thẻ Visa, Master Card', '2023-11-22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieudichvu`
--

CREATE TABLE `phieudichvu` (
  `MaPDV` int(11) NOT NULL,
  `MaPDP` int(11) NOT NULL,
  `TongTienDV` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieugiamgia`
--

CREATE TABLE `phieugiamgia` (
  `MaGiamGia` varchar(20) NOT NULL,
  `TenMaGiamGia` varchar(255) NOT NULL,
  `ChietKhau` int(11) NOT NULL,
  `TinhTrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieugiamgia`
--

INSERT INTO `phieugiamgia` (`MaGiamGia`, `TenMaGiamGia`, `ChietKhau`, `TinhTrang`) VALUES
('HNN', 'Hội nghị', 65, 1),
('HST', 'Hội sách', 20, 1),
('LDG', 'Lễ hội giảm giá', 45, 0),
('LDT', 'Lễ hội du lịch', 75, 0),
('LĐH', 'Lễ hội hè', 50, 0),
('MGN', 'Mừng sinh nhật', 10, 0),
('MHX', 'Mùa Hè Xanh', 5, 0),
('MMV', 'Mừng năm mới', 50, 0),
('MXTV', 'Mùa xuân tuyệt vời cùng burning hotel!', 7, 0),
('MĐT', 'Mùa đông ấm áp', 80, 0),
('MĐX', 'Mùa đông xuân', 10, 0),
('NGH', 'Nghỉ dưỡng cuối tuần', 25, 0),
('SĐT', 'Sinh nhật trẻ em', 10, 0),
('TTB', 'Tiết kiệm bao la', 15, 0),
('TTG', 'Trăng thanh gió mát', 15, 0),
('TTK', 'Tiết kiệm không ngừng', 70, 0),
('TTN', 'Tuần lễ khuyến mãi', 55, 0),
('TTP', 'Tiệc cưới', 30, 0),
('TTQ', 'Tiết kiệm quẩy', 25, 0),
('TTV', 'Tiết kiệm vô tư', 40, 0),
('VVĐ', 'Vui vẻ đón đầu', 35, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieumonan`
--

CREATE TABLE `phieumonan` (
  `MaPMA` int(11) NOT NULL,
  `MaHoaDon` int(11) NOT NULL,
  `TongTienMA` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phieumonan`
--

INSERT INTO `phieumonan` (`MaPMA`, `MaHoaDon`, `TongTienMA`) VALUES
(1, 10, 200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong`
--

CREATE TABLE `phong` (
  `MaPhong` int(10) NOT NULL,
  `LoaiPhong` varchar(20) NOT NULL,
  `KieuPhong` varchar(50) NOT NULL,
  `SLMax` int(10) NOT NULL,
  `LoaiGiuong` varchar(50) NOT NULL,
  `GiaPhong` double NOT NULL,
  `IMG` varchar(50) NOT NULL,
  `DienTich` varchar(50) NOT NULL,
  `TamNhin` varchar(50) NOT NULL,
  `MoTa` varchar(500) NOT NULL,
  `TrangThai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phong`
--

INSERT INTO `phong` (`MaPhong`, `LoaiPhong`, `KieuPhong`, `SLMax`, `LoaiGiuong`, `GiaPhong`, `IMG`, `DienTich`, `TamNhin`, `MoTa`, `TrangThai`) VALUES
(101, 'Deluxe ', 'Deluxe Single', 2, '1 giường đơn', 2500000, '../img/roomstyle/junior_suite.jpg', '32m', '14:12', '0', 'Đầy'),
(102, 'Deluxe ', 'Deluxe Twin', 3, '2 giường đơn', 3200000, '../img/allroom/Deluxe_room1.jpg', '42m', 'Ra biển ', '0', 'Trống'),
(103, 'Deluxe ', 'Deluxe Double', 3, '1 giường đôi và 1 giường đơn', 3200000, '../img/allroom/family_room.jpg', '42m', '12:10', '0', 'Trống'),
(104, 'Deluxe ', 'Deluxe Triple', 4, '1 giường đôi và 2 giường đơn', 5800000, '../img/allroom/family_room1.jpg', '45m', '12:12', '0', 'Trống'),
(105, 'Executive ', 'Executive Twin', 3, '2 giường đơn', 8600000, '../img/allroom/Junior_suite.jpg', '50m', '14:12', '0', 'Trống'),
(106, 'Executive ', 'Executive Double', 3, '1 giường đôi và 1 giường đơn', 9400000, '../img/allroom/Single_room.jpg', '50m', '14:10', '0', 'Trống'),
(201, 'Executive ', 'Executive Triple', 4, '1 giường đôi và 2 giường đơn', 10100000, '../img/allroom/Standard_room.jpg', '56m', '12:10', '0', 'Trống'),
(202, 'Executive ', 'Executive Connecting', 6, '2 giường đôi và 2 giường đơn', 18200000, '../img/allroom/Standard_room1.jpg', '64m', '14:12', '0', 'Trống'),
(203, 'Suite ', 'Suite Twin', 3, '2 giường đơn', 18900000, '../img/allroom/Superior_suite.jpg', '56m', '14:10', '0', 'Trống'),
(204, 'Suite ', 'Suite Double', 3, '1 giường đôi và 1 giường đơn', 20700000, '../img/roomstyle/double_room.jpg', '56m', '12:10', '0', 'Trống'),
(205, 'Suite ', 'Suite Triple', 4, '1 giường đôi và 2 giường đơn', 22200000, '../img/roomstyle/small_suite.jpg', '65m', '12:12', '0', 'Trống'),
(206, 'Suite ', 'Suite Connecting', 6, '2 giường đôi và 2 giường đơn', 39500000, '../img/roomstyle/junior_suite.jpg', '72m', '14:10', '0', 'Trống');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietdatmon`
--
ALTER TABLE `chitietdatmon`
  ADD PRIMARY KEY (`MaDatMon`);

--
-- Chỉ mục cho bảng `chitietdatphong`
--
ALTER TABLE `chitietdatphong`
  ADD PRIMARY KEY (`MaCTDP`),
  ADD KEY `mkl3` (`MaPDP`),
  ADD KEY `mkl4` (`MaPhong`);

--
-- Chỉ mục cho bảng `chitietdichvu`
--
ALTER TABLE `chitietdichvu`
  ADD PRIMARY KEY (`MaCTDV`),
  ADD KEY `mkl1` (`MaPDV`),
  ADD KEY `mkl2` (`MaDichVu`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`MaChucVu`);

--
-- Chỉ mục cho bảng `datban`
--
ALTER TABLE `datban`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `daubep`
--
ALTER TABLE `daubep`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MaChucVu` (`MaChucVu`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`MaDichVu`);

--
-- Chỉ mục cho bảng `doan`
--
ALTER TABLE `doan`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHoaDon`),
  ADD KEY `MaPDP` (`MaPDP`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `mathang`
--
ALTER TABLE `mathang`
  ADD PRIMARY KEY (`MaHang`),
  ADD KEY `mlk7` (`MaCongTy`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaCongTy`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNhanVien`);

--
-- Chỉ mục cho bảng `nhaphang`
--
ALTER TABLE `nhaphang`
  ADD PRIMARY KEY (`MaNhapHang`),
  ADD KEY `mlk8` (`MaHang`),
  ADD KEY `mlk9` (`MaCongTy`);

--
-- Chỉ mục cho bảng `phieudatphong`
--
ALTER TABLE `phieudatphong`
  ADD PRIMARY KEY (`MaPDP`),
  ADD KEY `MaNhanVien` (`MaNhanVien`),
  ADD KEY `MaKhachHang` (`MaKhachHang`);

--
-- Chỉ mục cho bảng `phieudichvu`
--
ALTER TABLE `phieudichvu`
  ADD PRIMARY KEY (`MaPDV`),
  ADD KEY `MaPDP` (`MaPDP`);

--
-- Chỉ mục cho bảng `phieugiamgia`
--
ALTER TABLE `phieugiamgia`
  ADD PRIMARY KEY (`MaGiamGia`);

--
-- Chỉ mục cho bảng `phieumonan`
--
ALTER TABLE `phieumonan`
  ADD PRIMARY KEY (`MaPMA`);

--
-- Chỉ mục cho bảng `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`MaPhong`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitietdatmon`
--
ALTER TABLE `chitietdatmon`
  MODIFY `MaDatMon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `chitietdatphong`
--
ALTER TABLE `chitietdatphong`
  MODIFY `MaCTDP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `chitietdichvu`
--
ALTER TABLE `chitietdichvu`
  MODIFY `MaCTDV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `datban`
--
ALTER TABLE `datban`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `daubep`
--
ALTER TABLE `daubep`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `MaDichVu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `doan`
--
ALTER TABLE `doan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `phieudatphong`
--
ALTER TABLE `phieudatphong`
  MODIFY `MaPDP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `phieudichvu`
--
ALTER TABLE `phieudichvu`
  MODIFY `MaPDV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `phieumonan`
--
ALTER TABLE `phieumonan`
  MODIFY `MaPMA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdatphong`
--
ALTER TABLE `chitietdatphong`
  ADD CONSTRAINT `chitietdatphong_ibfk_1` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`),
  ADD CONSTRAINT `mkl3` FOREIGN KEY (`MaPDP`) REFERENCES `phieudatphong` (`MaPDP`),
  ADD CONSTRAINT `mkl4` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`);

--
-- Các ràng buộc cho bảng `chitietdichvu`
--
ALTER TABLE `chitietdichvu`
  ADD CONSTRAINT `chitietdichvu_ibfk_1` FOREIGN KEY (`MaPDV`) REFERENCES `phieudichvu` (`MaPDV`);

--
-- Các ràng buộc cho bảng `daubep`
--
ALTER TABLE `daubep`
  ADD CONSTRAINT `daubep_ibfk_1` FOREIGN KEY (`MaChucVu`) REFERENCES `chucvu` (`MaChucVu`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MaPDP`) REFERENCES `phieudatphong` (`MaPDP`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`MaPDP`) REFERENCES `phieudatphong` (`MaPDP`);

--
-- Các ràng buộc cho bảng `mathang`
--
ALTER TABLE `mathang`
  ADD CONSTRAINT `mlk7` FOREIGN KEY (`MaCongTy`) REFERENCES `nhacungcap` (`MaCongTy`);

--
-- Các ràng buộc cho bảng `nhaphang`
--
ALTER TABLE `nhaphang`
  ADD CONSTRAINT `mlk8` FOREIGN KEY (`MaHang`) REFERENCES `mathang` (`MaHang`),
  ADD CONSTRAINT `mlk9` FOREIGN KEY (`MaCongTy`) REFERENCES `nhacungcap` (`MaCongTy`);

--
-- Các ràng buộc cho bảng `phieudatphong`
--
ALTER TABLE `phieudatphong`
  ADD CONSTRAINT `phieudatphong_ibfk_1` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`),
  ADD CONSTRAINT `phieudatphong_ibfk_2` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`),
  ADD CONSTRAINT `phieudatphong_ibfk_3` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`ID`);

--
-- Các ràng buộc cho bảng `phieudichvu`
--
ALTER TABLE `phieudichvu`
  ADD CONSTRAINT `phieudichvu_ibfk_1` FOREIGN KEY (`MaPDP`) REFERENCES `phieudatphong` (`MaPDP`);

DELIMITER $$
--
-- Sự kiện
--
CREATE DEFINER=`root`@`localhost` EVENT `CapNhapTrangThaiHoaDon` ON SCHEDULE EVERY 1 SECOND STARTS '2023-10-28 22:53:33' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE hoadon AS hd
  JOIN chitietdatphong AS ctdp
  ON hd.MaPDP = ctdp.MaPDP
  SET hd.TinhTrang = 
  CASE
    WHEN ctdp.NgayDen <= NOW() AND ctdp.NgayDi >= NOW() THEN 'Chờ thanh toán'
    WHEN ctdp.NgayDi < NOW() THEN 'Đã thanh toán'
  END
  Where hd.TinhTrang IN ('Đã đặt cọc', 'Chờ thanh toán')$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
