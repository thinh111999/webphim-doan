-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 05, 2023 lúc 09:27 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webphim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `status`, `slug`, `position`) VALUES
(2, 'Phim Lẻ', 'Phim lẻ cập nhật hằng ngày', 1, 'phim-le', 5),
(4, 'Phim Bộ', 'Phim bộ cập nhật hằng ngày', 1, 'phim-bo', 4),
(9, 'Phim Chiếu Rạp', 'Phim chiếu rạp cập nhật nhanh nhất', 1, 'phim-chieu-rap', 3),
(11, 'Trailer', 'Trailer', 1, 'trailer', 1),
(23, 'Phim 18+', 'phim trên 18 tuổi', 1, 'phim-18+', 0),
(24, 'Phim Netflix', 'netfflix', 1, 'phim-netflix', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `countries`
--

INSERT INTO `countries` (`id`, `title`, `description`, `status`, `slug`) VALUES
(1, 'Việt Nam', 'Phim Việt Nam cập nhật nhanh nhất', 1, 'Việt Nam'),
(2, 'Âu Mỹ', 'Phim Mỹ cập nhật hằng ngày', 1, 'Âu Mỹ'),
(3, 'Anh', 'Phim Anh cập nhật nhanh nhất', 1, 'anh'),
(4, 'Nhật Bản', 'Phim Nhật Bản cập nhật nhanh nhất', 1, 'nhat-ban'),
(5, 'Hàn Quốc', 'Phim Hàn Quốc cập nhật nhanh nhất', 1, 'han-quoc'),
(6, 'Trung quốc', 'Phim Trung Quốc cập nhật nhanh nhất', 1, 'trung-quoc'),
(7, 'Thái Lan', 'Phim Thái Lan cập nhật nhanh nhất', 1, 'Thái Lan'),
(8, 'Đài Loan', 'Phim Đài Loan cập nhật nhanh nhất', 1, 'Đài Loan'),
(9, 'Tổng Hợp', 'phim tổng hợp', 1, 'Tổng Hợp'),
(10, 'Ấn Độ', 'Ấn Độ', 1, 'Ấn Độ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `linkphim` varchar(500) NOT NULL,
  `episode` varchar(11) NOT NULL,
  `updated_at` varchar(50) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `server` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `episodes`
--

INSERT INTO `episodes` (`id`, `movie_id`, `linkphim`, `episode`, `updated_at`, `created_at`, `server`) VALUES
(36, 40, '<iframe width=\"1280\" height=\"720\" src=\"https://kd.opstream3.com/share/bea5b83d3a056039813089e7aa7f7e9a\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '1', '2023-09-27 13:43:33', '2023-09-27 13:43:33', 2),
(37, 41, '<iframe width=\"1280\" height=\"720\" src=\"https://1080.opstream4.com/share/3c947bc2f7ff007b86a9428b74654de5\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '1', '2023-09-27 15:06:23', '2023-09-27 15:06:23', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`id`, `title`, `description`, `status`, `slug`) VALUES
(1, 'Phim Hành Động', 'Thể loại phim này thường tập trung vào các tình tiết căng thẳng, các trận đấu và một anh hùng hoặc nhân vật chính tham gia vào các cuộc phiêu lưu nguy hiểm, thường có nhiều cảnh hành động và hỗn loạn.', 1, 'phim-hanh-dong'),
(3, 'Phim Hài Hước', 'Phim hài hước tạo nên tiếng cười thông qua các tình huống đùa vui, những gã lâm trận, và trí tuệ hài hước của nhân vật.', 1, 'phim-hai-huoc'),
(4, 'Phim Lãng Mạn', 'Thể loại này tập trung vào tình yêu và mối quan hệ giữa các nhân vật chính. Các tình tiết lãng mạn thường đầy cảm xúc và tạo nên kết cấu tình yêu.', 1, 'phim-lang-man'),
(5, 'Phim Viễn Tưởng', 'Phim viễn tưởng khám phá các khía cạnh của khoa học và công nghệ, thường kể về tương lai hoặc thế giới song song với các yếu tố siêu nhiên hoặc khoa học viễn tưởng.', 1, 'phim-vien-tuong'),
(6, 'Phim Võ Thuật', 'Thể loại này tập trung vào võ thuật và các màn chiến đấu đỉnh cao. Những người yêu thích võ thuật thường có thể tìm thấy các màn biểu diễn võ đẹp mắt.', 1, 'phim-vo-thuat'),
(7, 'Phim Kinh Dị - Ma', 'Phim kinh dị thường tạo ra cảm giác sợ hãi và ám ảnh thông qua các yếu tố ma quỷ, quỷ dữ hoặc sự bí ẩn. Các cảnh kinh dị thường xuyên xuất hiện.', 1, 'phim-kinh-di---ma'),
(9, 'Phim Tâm lý', 'Thể loại này thường tập trung vào tâm lý của các nhân vật, khám phá các tình cảm, suy tư và tâm trạng của họ.', 1, 'phim-tam-ly'),
(10, 'Phim Cổ Trang', 'Phim cổ trang thường diễn ra trong một thời kỳ lịch sử cụ thể và sử dụng trang phục và bối cảnh phù hợp với thời đại đó.', 1, 'phim-co-trang'),
(11, 'Phim Chiến Tranh', 'Phim chiến tranh tái hiện các sự kiện và trận đánh trong chiến tranh, thường tập trung vào mất mát và tác động của chiến tranh đối với con người.', 1, 'phim-chien-tranh'),
(12, 'Phim Hình Sự', 'Thể loại này tập trung vào các vụ án hình sự và cuộc điều tra của các thám tử hoặc cảnh sát.', 1, 'phim-hinh-su'),
(13, 'Phim Thể Thao', 'Thể loại này tập trung vào các môn thể thao và các cuộc thi thể thao, thường có các tình huống cạnh tranh và lòng kiên nhẫn.', 1, 'phim-the-thao'),
(14, 'Game Show', 'Phim game show thường mô phỏng các chương trình truyền hình thực tế hoặc cuộc thi nơi người chơi cạnh tranh để giành thưởng.', 1, 'game-show'),
(15, 'Phim Chiếu Rạp', 'Thể loại này bao gồm các bộ phim được sản xuất để chiếu trên màn ảnh lớn, với chất lượng hình ảnh và âm thanh cao cấp.', 1, 'phim-chieu-rap'),
(16, 'Phim Sắp Chiếu', 'Đây là các phim chưa ra mắt, người xem có thể mong đợi trong tương lai gần.', 1, 'phim-sap-chieu'),
(17, 'Phim Khoa Học', 'Thể loại này khám phá các khía cạnh của khoa học và công nghệ, thường thông qua các câu chuyện và sự phát triển của công nghệ.', 1, 'phim-khoa-hoc'),
(18, 'Phim Âm Nhạc', 'Phim âm nhạc tập trung vào âm nhạc và nghệ sĩ, thường có các màn biểu diễn âm nhạc và sự phấn khích của ngành công nghiệp âm nhạc.', 1, 'phim-am-nhac'),
(19, 'Phim TV Series', 'Thể loại này áp dụng cho các bộ phim được sản xuất cho truyền hình và thường có nhiều tập phim liên quan đến nhau.', 1, 'phim-tv-series'),
(20, 'Phim Thuyết Minh', 'Đây là các phim nói tiếng nước ngoài và được dịch hoặc thuyết minh sang ngôn ngữ đích để khán giả hiểu được nội dung.', 1, 'phim-thuyet-minh'),
(21, 'Vũ Trụ Marvel', 'Thể loại này là các bộ phim dựa trên các siêu anh hùng và nhân vật của Marvel Comics, tạo nên các câu chuyện về các siêu anh hùng và siêu ác nhân với các sức mạnh phi thường', 1, 'vu-tru-marvel'),
(22, 'Vũ Trụ DC', 'Thể loại này là các bộ phim dựa trên các siêu anh hùng và nhân vật của DC Comics, tạo nên các câu chuyện về các siêu anh hùng và siêu ác nhân với các sức mạnh phi thường', 1, 'vu-tru-dc'),
(23, 'Phim Phiêu Lưu', 'Dấn thân vào những cuộc phiêu lưu đầy mạo hiểm và thách thức nhằm tìm ra những báu vật chưa được biết đến và khám phá những địa điểm mới.', 1, 'phim-phieu-luu'),
(24, 'Phim Anime', 'Là Anime', 1, 'phim-anime');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(100) NOT NULL,
  `copyright` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `info`
--

INSERT INTO `info` (`id`, `title`, `description`, `logo`, `copyright`) VALUES
(1, 'Phim Mới | Phim Hay | Phim Free cập nhật nhanh hay nhất 2023', 'Xem phim hay, miễn phí trên nhiều thiết bị, mọi lúc mọi nơi', 'logo8556.jpg', 'Copyright© 2023 WorldMovie.Net');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `linkmovie`
--

CREATE TABLE `linkmovie` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `linkmovie`
--

INSERT INTO `linkmovie` (`id`, `title`, `description`, `status`) VALUES
(2, 'Hydrax', 'mượt', 1),
(3, 'FB', 'Hỗ trợ coi trên mobile', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `thoiluong` varchar(50) DEFAULT NULL,
  `description` longtext NOT NULL,
  `trailer` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `thuocphim` varchar(10) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `phim_hot` int(11) NOT NULL,
  `resolution` int(11) NOT NULL DEFAULT 0,
  `name_eng` varchar(255) NOT NULL,
  `phude` int(11) NOT NULL DEFAULT 0,
  `ngaytao` varchar(50) DEFAULT NULL,
  `ngaycapnhat` varchar(50) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `tags` text DEFAULT NULL,
  `topview` int(11) DEFAULT NULL,
  `season` int(11) NOT NULL DEFAULT 0,
  `sotap` varchar(100) NOT NULL DEFAULT '1',
  `count_views` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `movies`
--

INSERT INTO `movies` (`id`, `title`, `thoiluong`, `description`, `trailer`, `status`, `image`, `slug`, `category_id`, `thuocphim`, `genre_id`, `country_id`, `phim_hot`, `resolution`, `name_eng`, `phude`, `ngaytao`, `ngaycapnhat`, `year`, `tags`, `topview`, `season`, `sotap`, `count_views`, `position`) VALUES
(40, 'AVENGERS: HỒI KẾT', '180 phút', 'Sau những sự kiện tàn khốc của Avengers: Infinity War (2018), vũ trụ đang bị hủy hoại. Với sự trợ giúp của các đồng minh còn lại, Avengers đã lắp ráp một lần nữa để đảo ngược hành động của Thanos và khôi phục lại sự cân bằng cho vũ trụ.', 'TcMBFSGVi1c', 1, 'Avengers_Endgame_bia_teaser4607.jpg', 'avengers-hoi-ket', 2, '0', 2, 2, 1, 4, 'Avengers: Endgame', 0, '2023-09-27 13:40:11', '2023-09-28 19:58:55', '2019', 'avengers, endgame, biệt đội siêu anh hùng, biệt đội báo thù', 2, 0, '1', 98782, NULL),
(41, 'AVENGERS: CUỘC CHIẾN VÔ CỰC', '149 phút', 'The Avengers và các đồng minh của họ phải sẵn sàng hy sinh tất cả trong một nỗ lực để đánh bại Thanos mạnh mẽ trước khi Blitz của sự tàn phá và hủy hoại của anh ta chấm dứt vũ trụ.', '6ZfuNTqbHE8', 1, 'iw4802.jpg', 'avengers-cuoc-chien-vo-cuc', 9, '0', 2, 2, 1, 4, 'Avengers: Infinity War', 0, '2023-09-27 15:05:39', '2023-09-29 12:29:54', '2018', 'avengers', 1, 0, '1', 1251, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movie_category`
--

CREATE TABLE `movie_category` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `movie_category`
--

INSERT INTO `movie_category` (`id`, `movie_id`, `category_id`) VALUES
(1, 41, 2),
(2, 41, 9),
(3, 40, 2),
(4, 40, 9),
(8, 41, 24);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movie_genre`
--

CREATE TABLE `movie_genre` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `movie_genre`
--

INSERT INTO `movie_genre` (`id`, `movie_id`, `genre_id`) VALUES
(77, 40, 1),
(78, 40, 5),
(79, 40, 21),
(80, 41, 1),
(81, 41, 11),
(82, 41, 21);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `ip_address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`id`, `rating`, `movie_id`, `ip_address`) VALUES
(1, 4, 38, '127.0.0.1'),
(2, 4, 39, '127.0.0.1'),
(3, 4, 18, '127.0.0.1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` varchar(10) DEFAULT NULL,
  `google_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `token`, `google_id`) VALUES
(3, 'admin', 'admin01@gmail.com', NULL, '$2y$10$gtzRkowtID05XUO4V.ZFnetv.FOcaV0ySJGX0GLNEMe2RBQLDU20O', NULL, '2023-09-02 23:09:29', '2023-09-02 23:09:29', '', NULL),
(4, 'Thịnh Phúc', 'predator5485@gmail.com', NULL, 'eyJpdiI6IkxJQVo0YkxmQ0wxc3pVdHlKbXVpZnc9PSIsInZhbHVlIjoic1ZNOUdhZFhnaWpPd0FtNHhYV1JIbTROQ25lS0F3aGNpY25RRG1Ka0R1dz0iLCJtYWMiOiJmNWFjNTc0ODgyMzY1YzZlMmE3OWNmYmZhZTQ4MGE0ZDVjMDQwNjkyYTI1N2M2ODAyNTYwODllNTBiYjQ0MzU0IiwidGFnIjoiIn0=', NULL, '2023-09-27 18:28:02', '2023-09-27 18:28:02', NULL, NULL),
(5, 'Batman Who Laughs', 'phucthinh2017.dn@gmail.com', NULL, 'eyJpdiI6IkF6a3ExUCtVY2xqd0RBeDVkbW9HZkE9PSIsInZhbHVlIjoieUM2dldhOUNQcEUzODZWTEl2RjZ3K3Z5Vk5JVDIyNDlIcndkdk00cUk5TT0iLCJtYWMiOiJlNGE5ZTEwNzM2MWJhMzk1MzgyNWY3ZDlhYTM1NTUyMjliOTFhN2U3YTM4MTQzZTBiNDA5NDkyYjNmODI2MDg1IiwidGFnIjoiIn0=', NULL, '2023-09-27 18:28:44', '2023-09-27 18:28:44', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `linkmovie`
--
ALTER TABLE `linkmovie`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movie_category`
--
ALTER TABLE `movie_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `linkmovie`
--
ALTER TABLE `linkmovie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `movie_category`
--
ALTER TABLE `movie_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD CONSTRAINT `movie_genre_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
