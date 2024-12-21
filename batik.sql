-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Nov 2024 pada 15.29
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(100) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_foto`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1352025327_avatar.png'),
(2, 'Hendra', 'Hendra', '123', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_nama` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_hp` varchar(20) NOT NULL,
  `customer_alamat` text NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_nama`, `customer_email`, `customer_hp`, `customer_alamat`, `customer_password`, `customer_foto`) VALUES
(14, 'Farish Ilham Syahrani', 'farishilham.s@gmail.com', '0999999', 'JL.KUSUMA BANGSA RT 002 RW 002', '827ccb0eea8a706c4c34a16891f84e7b', NULL),
(16, 'Hendra Hartono', 'hendrahartono203@gmail.com', '085735426654', 'Bojonegoro', '202cb962ac59075b964b07152d234b70', '75674509_IMG-20220209-WA0004.jpg'),
(17, 'Ari Kusuma', 'arikusuma@gmail.com', '084532112233', 'Jakarta', '202cb962ac59075b964b07152d234b70', NULL),
(18, 'Hazle', 'hazle@gmail.com', '087564532112', 'Bogor', '202cb962ac59075b964b07152d234b70', '313062914_profile8.gif'),
(21, 'Reni Setiawati', 'reni@gmail.com', '087654556647', 'Surabaya', '202cb962ac59075b964b07152d234b70', '205755168_profile.jpg'),
(22, 'yudha nuur cahyo', 'yudha@gmail.com', '085731465936', 'kamal', '202cb962ac59075b964b07152d234b70', '355653201_VEST BATIK CIREBON MEGA MENDUNG WANITA.jpg'),
(23, 'Mahreza 2', 'mahrezarizky03@gmail.com', '081233668242', 'Pamekasan', '202cb962ac59075b964b07152d234b70', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_tanggal` date NOT NULL,
  `invoice_customer` int(11) NOT NULL,
  `invoice_nama` varchar(255) NOT NULL,
  `invoice_hp` varchar(255) NOT NULL,
  `invoice_alamat` text NOT NULL,
  `invoice_provinsi` varchar(255) NOT NULL,
  `invoice_kabupaten` varchar(255) NOT NULL,
  `invoice_kurir` varchar(255) NOT NULL,
  `invoice_berat` int(11) NOT NULL,
  `invoice_ongkir` int(11) NOT NULL,
  `invoice_total_bayar` int(11) NOT NULL,
  `invoice_status` int(11) NOT NULL,
  `invoice_resi` varchar(255) NOT NULL,
  `invoice_bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_tanggal`, `invoice_customer`, `invoice_nama`, `invoice_hp`, `invoice_alamat`, `invoice_provinsi`, `invoice_kabupaten`, `invoice_kurir`, `invoice_berat`, `invoice_ongkir`, `invoice_total_bayar`, `invoice_status`, `invoice_resi`, `invoice_bukti`) VALUES
(14, '2024-05-28', 17, 'Ari Kusuma', '084532112233', 'Jakarta', 'Jawa Barat', 'Depok', 'JNE - REG', 300, 10000, 299000, 5, '', '1348734260.png'),
(15, '2024-05-29', 17, 'Ari Kusuma', '084532112233', 'Jakarta', 'Jawa Barat', 'Depok', 'JNE - REG', 300, 10000, 309000, 5, '', '1842771542.png'),
(18, '2024-05-31', 18, 'Hazle', '087564532112', 'Bogor', 'Jawa Barat', 'Bogor', 'TIKI - REG', 300, 9000, 278000, 5, '', '1944005912.png'),
(19, '2024-06-03', 22, 'yudha nuur cahyo', '0857318273587835', 'kamal', 'Jawa Timur', 'Lamongan', 'TIKI - REG', 300, 22000, 321000, 5, '', '1878373013.jpg'),
(94, '2024-11-22', 23, 'Mahreza', '081233668242', 'Pamekasan', 'Gorontalo', 'Boalemo', 'Pos Indonesia - Pos Reguler', 25, 87500, 337500, 5, '', '1682465802.jpg'),
(95, '2024-11-22', 23, 'Reza', '121212', 'Sampang', 'DKI Jakarta', 'Kepulauan Seribu', 'TIKI - REG', 29, 9000, 449000, 5, '', '625450923.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(10, 'Batik Pria'),
(11, 'Batik Wanita'),
(13, 'Batik Daerah Istimewa Yogyakarta'),
(14, 'Batik Solo'),
(15, 'Batik Cirebon'),
(16, 'Batik Pekalongan'),
(17, 'Batik Rembang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `komentar_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `komentar_teks` text NOT NULL,
  `komentar_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `bintang` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`komentar_id`, `customer_id`, `produk_id`, `komentar_teks`, `komentar_timestamp`, `bintang`) VALUES
(11, 16, 38, 'Produknya top mantap', '2024-05-28 15:52:22', 3),
(12, 17, 34, 'Cepet banget pengirimannya, ga sampai 2 hari udah dateng pesanannya, mantap lah pokoknya', '2024-05-28 16:02:40', 5),
(13, 17, 34, 'Bagus banget', '2024-05-28 16:59:04', 3),
(14, 17, 34, 'Lumayanlah buat harga segitu', '2024-05-28 16:59:21', 2),
(15, 17, 34, 'Pengen beli yang banyak', '2024-05-28 16:59:38', 4),
(16, 16, 39, 'Tes', '2024-05-29 05:09:21', 4),
(17, 16, 38, 'cepat dan bagus', '2024-05-30 02:39:29', 4),
(18, 16, 38, 'Tes', '2024-05-31 16:47:02', 3),
(19, 16, 39, 'Bagus banget', '2024-05-31 21:05:48', 4),
(20, 16, 38, 'Bagus banget', '2024-05-31 21:06:27', 4),
(21, 22, 70, 'keren dan ukurannya pas', '2024-06-07 03:17:45', 4),
(22, 22, 65, 'barangnya bagus pacarsaya suka', '2024-06-07 17:15:07', 5),
(23, 16, 38, 'Bagus', '2024-06-08 04:57:40', 3),
(24, 16, 36, 'Coba', '2024-06-08 04:59:42', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_date`) VALUES
(30, 16, '2024-05-28 06:15:05'),
(36, 17, '2024-05-29 15:06:41'),
(37, 17, '2024-05-29 15:16:54'),
(55, 16, '2024-05-29 18:32:22'),
(57, 16, '2024-05-29 18:33:16'),
(58, 16, '2024-05-29 18:33:47'),
(61, 16, '2024-05-29 18:40:26'),
(62, 16, '2024-05-29 18:40:49'),
(63, 16, '2024-05-29 18:43:05'),
(65, 16, '2024-05-30 02:36:17'),
(66, 16, '2024-05-30 02:36:47'),
(67, 16, '2024-05-30 02:37:06'),
(78, 17, '2024-06-01 07:46:29'),
(79, 16, '2024-06-01 07:48:29'),
(80, 17, '2024-06-01 07:54:34'),
(81, 18, '2024-06-01 07:55:25'),
(82, 16, '2024-06-01 08:08:19'),
(83, 16, '2024-06-01 09:18:45'),
(84, 17, '2024-06-01 09:21:17'),
(85, 18, '2024-06-01 09:22:51'),
(86, 35, '2024-06-08 03:21:55'),
(87, 16, '2024-06-08 05:01:57'),
(88, 18, '2024-06-08 08:23:55'),
(89, 16, '2024-06-09 13:57:03'),
(90, 23, '2024-11-22 14:19:52'),
(91, 23, '2024-11-22 14:23:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `ukuran_baju` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_id`, `produk_id`, `ukuran_baju`, `jumlah`) VALUES
(24, 30, 38, 'M', 1),
(27, 36, 40, 'L', 1),
(28, 37, 41, 'M', 1),
(49, 55, 41, 'M', 1),
(51, 57, 41, 'M', 1),
(52, 58, 41, 'M', 1),
(53, 58, 41, 'XL', 1),
(58, 61, 41, 'S', 1),
(59, 62, 41, 'S', 2),
(60, 63, 41, 'S', 2),
(62, 65, 38, 'M', 1),
(63, 65, 39, 'L', 1),
(64, 66, 38, 'M', 1),
(65, 66, 39, 'L', 1),
(66, 67, 38, 'M', 1),
(67, 67, 39, 'L', 1),
(72, 78, 41, 'M', 1),
(74, 86, 39, 'M', 2),
(75, 86, 41, 'L', 1),
(76, 86, 40, 'L', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `produk_nama` varchar(255) NOT NULL,
  `produk_kategori` int(11) NOT NULL,
  `produk_harga` int(11) NOT NULL,
  `produk_keterangan` text NOT NULL,
  `produk_jumlah` int(11) NOT NULL,
  `produk_berat` int(11) NOT NULL,
  `produk_foto1` varchar(255) DEFAULT NULL,
  `produk_foto2` varchar(255) DEFAULT NULL,
  `produk_foto3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`produk_id`, `produk_nama`, `produk_kategori`, `produk_harga`, `produk_keterangan`, `produk_jumlah`, `produk_berat`, `produk_foto1`, `produk_foto2`, `produk_foto3`) VALUES
(26, 'Batik Pria Kemeja Panjang Mathew Marion', 10, 329000, '<p><u>\r\n\r\n</u></p><p><u>Kemeja Panjang Mathew Marion</u></p><p><u>\r\n</u></p><p><u>Kemeja batik dengan design eksklusif memadukan keindahan batik tradisional dengan sentuhan modern yang unik. </u></p><p><u>Jahitan berkualitas dan bahan ramah lingkungan karna 100% katun sehingga nyaman saat digunakan.</u></p><u>\r\n\r\n</u><br><p></p>', 100, 300, '460207896_Batik Pria Mathew Marion.jpeg', '460207896_Batik Pria Mathew Marion(2).jpeg', '1239293443_Batik Pria Mathew Marion(3).jpeg'),
(27, 'Batik Pria Kemeja Panjang Adam Amy', 10, 309000, '<p>\r\n\r\n</p><p>Kemeja Panjang Adam Amy</p><p>\r\n</p><p>Kemeja batik dengan design eksklusif memadukan keindahan batik tradisional dengan sentuhan modern yang unik. </p><p>Jahitan berkualitas dan bahan ramah lingkungan karna 100% katun sehingga nyaman saat digunakan.</p>\r\n\r\n<br><p></p>', 100, 300, '666532664_Batik Pria Adam Amy.jpeg', '666532664_Batik Pria Adam Amy(2).jpeg', '666532664_Batik Pria Adam Amy(3).jpeg'),
(28, 'Batik Pria Kemeja Panjang Damar Dahayu Daniar', 10, 329000, '<p>\r\n\r\n</p><p>Kemeja Panjang Damar Dahayu Daniar</p><p>\r\n</p><p>Kemeja batik dengan design eksklusif memadukan keindahan batik tradisional dengan sentuhan modern yang unik. </p><p>Jahitan berkualitas dan bahan ramah lingkungan karna 100% katun sehingga nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 100, 300, '1268376301_Batik Pria Damar Dahayu Daniar.jpeg', '1268376301_Batik Pria Damar Dahayu Daniar(2).jpeg', '1268376301_Batik Pria Damar Dahayu Daniar(3).jpeg'),
(29, 'Batik Pria Kemeja Panjang Furing Superfine Rajendra Rihana', 10, 499000, '<p>\r\n\r\n</p><p>Kemeja Panjang Furing Superfine Rajendra Rihana</p><p>\r\n</p><p>Setiap kemeja kami dirancang dengan design eksklusif dengan sentuhan modern membuat anda stylish dan berwibawa</p><p>dengan menggunakan furing yang kembut dan breathable menjadikan kemeja ini nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 99, 300, '458359201_Batik Pria Furing Superfine Rajendra Rihana.jpeg', '458359201_Batik Pria Furing Superfine Rajendra Rihana(2).jpeg', '458359201_Batik Pria Furing Superfine Rajendra Rihana(3).jpeg'),
(30, 'Batik Pria Kemeja Pendek Gilby Nayara', 10, 259000, '<p>\r\n\r\n</p><p>Kemeja Pendek Gilby Nayara</p><p>\r\n</p><p>Setiap kemeja kami dirancang dengan design eksklusif dengan sentuhan modern membuat anda stylish dan berwibawa</p><p>dengan menggunakan furing yang lembut dan breathable menjadikan kemeja ini nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 100, 300, '1468531688_Batik Pria Gilby Nayara.jpeg', '1468531688_Batik Pria Gilby Nayara(2).jpeg', '1468531688_Batik Pria Gilby Nayara(3).jpeg'),
(31, 'Batik Pria Kemeja Pendek Adelio Pinggala', 10, 249000, '<p>\r\n\r\n</p><p>Kemeja Pendek Adelio Pinggala</p><p>\r\n</p><p>Setiap kemeja kami dirancang dengan design eksklusif dengan sentuhan modern membuat anda stylish dan berwibawa</p><p>dengan menggunakan furing yang lembut dan breathable menjadikan kemeja ini nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 100, 300, '952434119_Batik Pria Adelio Pinggala.jpeg', '952434119_Batik Pria Adelio Pinggala(2).jpeg', '952434119_Batik Pria Adelio Pinggala(3).jpeg'),
(32, 'Batik Pria Kemeja Pendek Leon Liodra', 10, 269000, '<p>\r\n\r\n</p><p>Kemeja Pendek Leon Liodra</p><p>\r\n</p><p>Setiap kemeja kami dirancang dengan design eksklusif dengan sentuhan modern membuat anda stylish dan berwibawa</p><p>dengan menggunakan furing yang lembut dan breathable menjadikan kemeja ini nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 99, 300, '2017388881_Batik Pria Leon Liodra.jpeg', '2017388881_Batik Pria Leon Liodra(2).jpeg', '2017388881_Batik Pria Leon Liodra(3).jpeg'),
(33, 'Batik Pria Kemeja Pendek Jaladhi', 10, 239000, '<p>\r\n\r\n</p><p>Kemeja Pendek Jaladhi</p><p>\r\n</p><p>Setiap kemeja kami dirancang dengan design eksklusif dengan sentuhan modern membuat anda stylish dan berwibawa</p><p>dengan menggunakan furing yang lembut dan breathable menjadikan kemeja ini nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 100, 300, '458396771_Batik Pria Jaladhi.jpeg', '458396771_Batik Pria Jaladhi(2).jpeg', '458396771_Batik Pria Jaladhi(3).jpeg'),
(34, 'Batik Wanita Blouse Marion Mathew', 11, 289000, '<p>\r\n\r\n- Batik Print&nbsp;</p><p>- Material 100% Katun Primis 40S , Ringan , Tidak melar dan Tidak Menerawang&nbsp;</p><p>- Round Neck&nbsp;</p><p>- Back Zipper&nbsp;</p><p>- Model Rompi&nbsp;</p><p>- Inner Navy sudah include dengan batik&nbsp;</p><p>- Tanpa Furing&nbsp;</p><p>- Lengan 7/8&nbsp;</p><p>- Warna Navy\r\n\r\n<br></p>', 100, 300, '1898180518_Batik Wanita Blouse Marion Mathew.jpeg', '1898180518_Batik Wanita Blouse Marion Mathew(2).jpeg', '1898180518_Batik Wanita Blouse Marion Mathew(3).jpeg'),
(35, 'Batik Wanita Blouse Puspa Pandu', 11, 299000, '<p>\r\n\r\n- Batik Print&nbsp;</p><p>- Material 100% Katun Primis 40S , Ringan , Tidak melar dan Tidak Menerawang&nbsp;</p><p>- Round Neck&nbsp;</p><p>- Resleting Depan&nbsp;</p><p>- Resleting sampai bawah tapi tidak sampai lepas&nbsp;</p><p>- Tanpa Furing&nbsp;</p><p>- Lengan 7/8&nbsp;</p><p>- Warna Hijau\r\n\r\n<br></p>', 100, 300, '478659573_Batik Wanita Blouse Puspa Pandu.jpeg', '478659573_Batik Wanita Blouse Puspa Pandu(2).jpeg', '478659573_Batik Wanita Blouse Puspa Pandu(3).jpeg'),
(36, 'Batik Wanita Blouse Zeline Zoe', 11, 299000, '<p>\r\n\r\n- Batik Print&nbsp;</p><p>- Material 100% Katun Primis 40S , Ringan , Tidak melar dan Tidak Menerawang&nbsp;</p><p>- Round Neck\r\n- Back Zipper&nbsp;</p><p>- Model Rompi&nbsp;</p><p>&nbsp;- Variasi Kancing Shanghai&nbsp;</p><p>- Inner Navy sudah include dengan batik&nbsp;</p><p>- Tanpa Furing&nbsp;</p><p>- Lengan 7/8&nbsp;</p><p>- Warna Pink\r\n\r\n<br></p>', 102, 300, '1385564931_Batik Wanita Blouse Zeline Zoe.jpeg', '1385564931_Batik Wanita Blouse Zeline Zoe(2).jpeg', '1385564931_Batik Wanita Blouse Zeline Zoe(3).jpeg'),
(37, 'Batik Wanita Blouse Amy Adam', 11, 289000, '<p>\r\n\r\n- Batik Print&nbsp;</p><p>- Material 100% Katun Primis 40S , Ringan , Tidak melar dan Tidak Menerawang&nbsp;</p><p>- Kerah V-Neck&nbsp;</p><p>- Kancing Depan&nbsp;</p><p>- Hidden Button&nbsp;</p><p>- Tanpa Furing&nbsp;</p><p>- Lengan 7/8&nbsp;</p><p>- Warna Navy\r\n\r\n<br></p>', 100, 300, '1115723907_Batik Wanita Blouse Amy Adam.jpeg', '1115723907_Batik Wanita Blouse Amy Adam(2).jpeg', '1115723907_Batik Wanita Blouse Amy Adam(3).jpeg'),
(38, 'Batik Wanita Blouse Janneta Ganendra', 11, 300000, '<p>\r\n\r\n- Batik Print&nbsp;</p><p>- Material 100% Katun Primis 40S , Ringan , Tidak melar dan Tidak Menerawang&nbsp;</p><p>- Round Neck&nbsp;</p><p>- Resleting Depan&nbsp;</p><p>- Resleting sampai bawah tapi tidak sampai lepas&nbsp;</p><p>- Terdapat varian List Hitam&nbsp;</p><p>- Tanpa Furing&nbsp;</p><p>- Lengan 7/8&nbsp;</p><p>- Warna Hitam\r\n\r\n<br></p>', 59, 300, '17871899_Batik Wanita Blouse Janneta Ganendra.jpeg', '17871899_Batik Wanita Blouse Janneta Ganendra(2).jpeg', '17871899_Batik Wanita Blouse Janneta Ganendra(3).jpeg'),
(39, 'Batik Wanita Blouse Magda Malik', 11, 300000, '<p>\r\n\r\n- Batik Print&nbsp;</p><p>- Material 100% Katun Primis 40S , Ringan , Tidak melar dan Tidak Menerawang&nbsp;</p><p>- Round Neck&nbsp;</p><p>- Resleting Depan&nbsp;</p><p>- Resleting sampai bawah tapi tidak sampai lepas&nbsp;</p><p>- Tanpa Furing&nbsp;</p><p>- Lengan 7/8&nbsp;</p><p>- Warna Coklat\r\n\r\n<br></p>', 100, 300, '1396750069_Batik Wanita Blouse Magda Malik.jpeg', '1396750069_Batik Wanita Blouse Magda Malik(2).jpeg', '1396750069_Batik Wanita Blouse Magda Malik(3).jpeg'),
(40, 'Batik Wanita Blouse Beatrix beryl', 11, 299000, '<p>\r\n\r\n- Batik Print&nbsp;</p><p>- Material 100% Katun Primis 40S , Ringan , Tidak melar dan Tidak Menerawang&nbsp;</p><p>- Kerah V-Neck&nbsp;</p><p>- Resleting Depan&nbsp;</p><p>- Resleting tidak sampai lepas</p><p>- Tanpa Furing&nbsp;</p><p>- Lengan 7/8&nbsp;</p><p>- Warna Abu-Abu\r\n\r\n<br></p>', 98, 300, '556797379_Batik Wanita Blouse Beatrix Beryl.jpeg', '556797379_Batik Wanita Blouse Beatrix Beryl(2).jpeg', '556797379_Batik Wanita Blouse Beatrix Beryl(3).jpeg'),
(41, 'Batik Wanita Blouse Vallery Arion', 11, 299000, '<p>\r\n\r\n- Batik Print&nbsp;</p><p>- Material 100% Katun Primis 40S , Ringan , Tidak melar dan Tidak Menerawang&nbsp;</p><p>- Round Neck&nbsp;</p><p>- Back Zipper&nbsp;</p><p>- Model Rompi&nbsp;</p><p>- Inner sudah include dengan batik&nbsp;</p><p>- Tanpa Furing&nbsp;</p><p>- Lengan 7/8&nbsp;</p><p>- Warna Navy\r\n\r\n<br></p>', 101, 300, '1032547152_Batik Wanita Blouse Vallery Arion.jpeg', '1032547152_Batik Wanita Blouse Vallery Arion(2).jpeg', '1032547152_Batik Wanita Blouse Vallery Arion(3).jpeg'),
(44, 'Atasan Wanita Tunik Batik Mega Mendung Rintik', 15, 199000, '<p>\r\n\r\n</p><p>- Batik Print </p><p>- Material 100% Katun Primis 40S , Ringan , Tidak melar dan Tidak Menerawang</p><p>- Resleting Depan </p><p>- Resleting tidak sampai lepas</p><p>- Lengan 7/8 </p><p>- Warna Hitam</p>\r\n\r\n<br><p></p>', 79, 20, '1204484932_Atasan Wanita Tunik Batik Mega Mendung Rintik.jpg', '1204484932_Atasan Wanita Tunik Batik Mega Mendung Rintik 1.jpg', '1204484932_Atasan Wanita Tunik Batik Mega Mendung Rintik 2.jpg'),
(45, 'Baju batik pria lengan panjang motif mega mendung', 15, 230000, '<p>\r\n\r\n</p><p>Kemeja Panjang mega mendung</p><p></p><p>Kemeja batik dengan design eksklusif memadukan keindahan batik tradisional dengan sentuhan modern yang unik.</p><p>Jahitan berkualitas dan bahan ramah lingkungan karna 100% katun sehingga nyaman saat digunakan.</p>\r\n\r\n<br><p></p>', 120, 21, '1618878513_Baju batik pria lengan panjang motif mega mendung 2.jpg', '1618878513_Baju batik pria lengan panjang motif mega mendung 4.jpg', '1618878513_Baju batik pria lengan panjang motif mega mendung 1.jpg'),
(46, 'Batik Sarimbit Atasan Blouse Mega Mendung Godong Telo Melody', 15, 240000, '<p>\r\n\r\n</p><p>Kemeja Panjang serimbit</p><p></p><p>Kemeja batik dengan design eksklusif memadukan keindahan batik tradisional dengan sentuhan modern yang unik.</p><p>Jahitan berkualitas dan bahan ramah lingkungan karna 100% katun sehingga nyaman saat digunakan.</p>\r\n\r\n<br><p></p>', 89, 21, '1054854897_Batik Sarimbit Atasan Blouse Mega Mendung Godong Telo Melody.jpg', '1054854897_Batik Sarimbit Atasan Blouse Mega Mendung Godong Telo Melody 1.jpg', '1054854897_Batik Sarimbit Atasan Blouse Mega Mendung Godong Telo Melody 2.jpg'),
(47, 'Blouse Batik Mega Mendung', 15, 310000, '<p>\r\n\r\n</p><p>- Batik Print </p><p>- Material 100% Katun Primis 40S , Ringan , Tidak melar dan Tidak Menerawang </p><p>- Round Neck </p><p>- Resleting Depan </p><p>- Resleting sampai bawah tapi tidak sampai lepas </p><p>- Terdapat varian List Hitam </p><p>- Tanpa Furing </p><p>- Lengan 7/8 </p><p>- Warna pink</p>\r\n\r\n<br><p></p>', 57, 26, '1479475617_Blouse Batik Mega Mendung.jpg', '1479475617_Blouse Batik Mega Mendung 1.jpg', '1479475617_Blouse Batik Mega Mendung 2.jpg'),
(48, 'Tunik Batik Wanita Motif Mega Mendung', 15, 350000, '<p>\r\n\r\n</p><p>- Batik Print</p><p>- Material 100% Katun Primis 40S , Ringan , Tidak melar dan Tidak Menerawang</p><p>- Resleting Depan</p><p>- Resleting tidak sampai lepas</p><p>- Lengan 7/8</p><p>- Warna Navy</p><br>\r\n\r\n<br><p></p>', 99, 24, '346243741_Tunik Batik Wanita Motif Mega Mendung 2.jpg', '346243741_Tunik Batik Wanita Motif Mega Mendung.jpg', '346243741_Tunik Batik Wanita Motif Mega Mendung 1.jpg'),
(49, 'Vest Batik Wanita Mega Mendung Wanita', 15, 300000, '<p>\r\n\r\n</p><p>- Batik Print</p><p>- Material 100% Katun Primis 40S , Ringan , Tidak melar dan Tidak Menerawang</p><p>- Resleting Depan</p><p>- Resleting tidak sampai lepas</p><p>- Lengan pendek</p><p>- Warna merah&nbsp;</p><br>\r\n\r\n<br><p></p>', 79, 20, '744938289_VEST BATIK CIREBON MEGA MENDUNG WANITA 1.jpg', '744938289_VEST BATIK CIREBON MEGA MENDUNG WANITA 2.jpg', '744938289_VEST BATIK CIREBON MEGA MENDUNG WANITA.jpg'),
(50, 'Baju Couple Adat Jawa - Solo, Motif Sidoasih Kecil', 14, 400000, '<p>\r\n\r\n</p><p>Kemeja cuple</p><p></p><p>Kemeja batik dengan design eksklusif memadukan keindahan batik tradisional dengan sentuhan modern yang unik.</p><p>Jahitan berkualitas dan bahan ramah lingkungan karna 100% katun sehingga nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 47, 30, '584754687_Baju Couple Adat Jawa - Solo, Motif Sidoasih Kecil.jpg', '584754687_Baju Couple Adat Jawa - Solo, Motif Sidoasih Kecil 2.jpg', '584754687_Baju Couple Adat Jawa - Solo, Motif Sidoasih Kecil 3.jpg'),
(51, 'Batik ajotosatru sogan ndoromesem katun halus furing', 13, 250000, '<p>\r\n\r\n</p><p>Kemeja Panjang&nbsp;</p><p></p><p>Kemeja batik dengan design eksklusif memadukan keindahan batik tradisional dengan sentuhan modern yang unik.</p><p>Jahitan berkualitas dan bahan ramah lingkungan karna 100% katun sehingga nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 38, 20, '818642236_Batik ajotosatru sogan ndoromesem katun halus furing 1.jpg', '818642236_Batik ajotosatru sogan ndoromesem katun halus furing 3.jpg', '818642236_Batik ajotosatru sogan ndoromesem katun halus furing.jpg'),
(52, 'Batik Amanda Sogan Peache', 13, 300000, '<p>\r\n\r\n</p><p>Kemeja Panjang amanda</p><p></p><p>Kemeja batik dengan design eksklusif memadukan keindahan batik tradisional dengan sentuhan modern yang unik.</p><p>Jahitan berkualitas dan bahan ramah lingkungan karna 100% katun sehingga nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 79, 28, '1017189822_BATIK WANITA AMANDA SOGAN PEACHE.jpg', '1017189822_BATIK AMANDA SOGAN PEACHE 1.jpg', '1017189822_BATIK AMANDA SOGAN PEACHE 2.jpg'),
(53, 'batik perwira sogan katun halus full furing', 13, 250000, '<p>\r\n\r\n</p><p>Kemeja perwira sogan</p><p></p><p>Setiap kemeja kami dirancang dengan design eksklusif dengan sentuhan modern membuat anda stylish dan berwibawa</p><p>dengan menggunakan furing yang lembut dan breathable menjadikan kemeja ini nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 103, 20, '1140428633_batik perwira sogan katun halus full furing.jpg', '1140428633_batik perwira sogan katun halus full furing 2.jpg', '1140428633_batik perwira sogan katun halus full furing 1.jpg'),
(54, 'Kemeja Batik Mahkota Sogan Premium', 13, 250000, '<p>\r\n\r\n</p><p>Kemeja Mahkota</p><p></p><p>Setiap kemeja kami dirancang dengan design eksklusif dengan sentuhan modern membuat anda stylish dan berwibawa</p><p>dengan menggunakan furing yang lembut dan breathable menjadikan kemeja ini nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 97, 20, '726382580_Kemeja Batik Mahkota Sogan Premium 4.jpg', '726382580_Kemeja Batik Mahkota Sogan Premium 2.jpg', '726382580_Kemeja Batik Mahkota Sogan Premium 3.jpg'),
(55, 'Atasan Batik Baju Kerja Batik Motif Buketan Cheongsam Kerah Shanghai', 16, 320000, '<p>\r\n\r\n</p><p>- Batik Print </p><p>- Material 100% Katun Primis 40S , Ringan , Tidak melar dan Tidak Menerawang </p><p>- Kerah V-Neck </p><p>- Resleting Depan </p><p>- Resleting tidak sampai lepas</p><p>- Tanpa Furing </p><p>- Lengan pendek</p><p>- Warna pink</p>\r\n\r\n<br><p></p>', 87, 28, '729964886_Atasan Batik Baju Kerja Batik Motif Buketan Cheongsam Kerah Shanghai.jpg', '729964886_Atasan Batik Baju Kerja Batik Motif Buketan Cheongsam Kerah Shanghai 1.jpg', '729964886_Atasan Batik Baju Kerja Batik Motif Buketan Cheongsam Kerah Shanghai 1.jpg'),
(56, 'Kemeja Batik Motif Daun Khas Pekalongan Lengan Panjang ', 16, 250000, '<p>\r\n\r\n</p><p>Kemeja panjang pekalongan</p><p></p><p>Setiap kemeja kami dirancang dengan design eksklusif dengan sentuhan modern membuat anda stylish dan berwibawa</p><p>dengan menggunakan furing yang lembut dan breathable menjadikan kemeja ini nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 129, 23, '158755894_Kemeja Batik Pekalongan Lengan Panjang.jpg', '158755894_Kemeja Batik Pekalongan Lengan Panjang 2.jpg', '158755894_Kemeja Batik Pekalongan Lengan Panjang 1.jpg'),
(57, 'Nona Buketan, Baju atasan kerja batik wanita modern', 16, 310000, '<p>\r\n\r\n</p><p>- Batik Print </p><p>- Material 100% Katun Primis 40S , Ringan , Tidak melar dan Tidak Menerawang </p><p>- Round Neck </p><p>- Back Zipper </p><p>- Model Rompi </p><p>- Inner Navy sudah include dengan batik </p><p>- Tanpa Furing </p><p>- Lengan 7/8 </p><p>- Warna Coklat</p>\r\n\r\n<br><p></p>', 39, 28, '1668140713_Nona Buketan, Baju atasan kerja batik wanita modern 1.jpg', '1668140713_Nona Buketan, Baju atasan kerja batik wanita modern 2.jpg', '1668140713_Nona Buketan, Baju atasan kerja batik wanita modern.jpg'),
(58, 'Baju batik cowok Lengan panjang Dobby lasem', 17, 230000, '<p>\r\n\r\n</p><p>Kemeja Panjang </p><p></p><p>Kemeja batik dengan design eksklusif memadukan keindahan batik tradisional dengan sentuhan modern yang unik.</p><p>Jahitan berkualitas dan bahan ramah lingkungan karna 100% katun sehingga nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 230, 23, '868173540_Baju batik cowok Lengan panjang Dobby lasem.jpg', '868173540_Baju batik cowok Lengan panjang Dobby lasem 2.jpg', '868173540_Baju batik cowok Lengan panjang Dobby lasem 1.jpg'),
(59, 'Kemeja Batik Pria Lengan Panjang Dobi Lasem Motif Bangau Kembar Premium', 17, 260000, '<p>\r\n\r\n</p><p>Kemeja Panjang Premium</p><p></p><p>Kemeja batik dengan design eksklusif memadukan keindahan batik tradisional dengan sentuhan modern yang unik.</p><p>Jahitan berkualitas dan bahan ramah lingkungan karna 100% katun sehingga nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 198, 23, '1401929242_Kemeja Batik Pria Lengan Panjang Dobi Lasem Motif Bangau Kembar Premium.jpg', '1401929242_Kemeja Batik Pria Lengan Panjang Dobi Lasem Motif Bangau Kembar Premium 2.jpg', '1401929242_Kemeja Batik Pria Lengan Panjang Dobi Lasem Motif Bangau Kembar Premium 1.jpg'),
(60, 'Baju Batik Couple Gurdo New Tunik Kemeja Sarimbit Lengan Panjang Motif New Seno', 14, 450000, '<p>\r\n\r\n</p><p>Kemeja batik dengan design eksklusif memadukan keindahan batik tradisional dengan sentuhan modern yang unik.</p><p>Jahitan berkualitas dan bahan ramah lingkungan karna 100% katun sehingga nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 20, 30, '166872357_Baju Batik Couple Gurdo New Tunik Kemeja Sarimbit Lengan Panjang Motif New Seno.jpg', '166872357_Baju Batik Couple Gurdo New Tunik Kemeja Sarimbit Lengan Panjang Motif New Seno 2.jpg', '166872357_Baju Batik Couple Gurdo New Tunik Kemeja Sarimbit Lengan Panjang Motif New Seno 1.jpg'),
(61, 'Baju Batik Pria Lengan Panjang Terbaru Motif Parang aji Batik solo ', 14, 250000, '<p>\r\n\r\n</p><p>Kemeja batik dengan design eksklusif memadukan keindahan batik tradisional dengan sentuhan modern yang unik.</p><p>Jahitan berkualitas dan bahan ramah lingkungan karna 100% katun sehingga nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 95, 20, '608088576_Baju Batik Pria Lengan Panjang Terbaru Motif Parang aji Batik solo 2.jpg', '608088576_Baju Batik Pria Lengan Panjang Terbaru Motif Parang aji Batik solo 1.jpg', '608088576_Baju Batik Pria Lengan Panjang Terbaru Motif Parang aji Batik solo.jpg'),
(62, 'Baju Couple Parang Ageng', 14, 400000, '<p>\r\n\r\n</p><p>Kemeja batik dengan design eksklusif memadukan keindahan batik tradisional dengan sentuhan modern yang unik.</p><p>Jahitan berkualitas dan bahan ramah lingkungan karna 100% katun sehingga nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 47, 29, '1440902029_Batik Couple Parang Ageng 1.jpg', '1440902029_Batik Couple Parang Ageng 3.jpg', '1440902029_Batik Couple Parang Ageng.jpg'),
(63, 'Batik Gurdo Solo', 14, 270000, '<p>\r\n\r\n</p><p>Kemeja batik dengan design eksklusif memadukan keindahan batik tradisional dengan sentuhan modern yang unik.</p><p>Jahitan berkualitas dan bahan ramah lingkungan karna 100% katun sehingga nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 87, 19, '1512810852_batik gurdo solo 8.jpg', '1512810852_batik gurdo solo 3.jpg', '1512810852_batik gurdo solo 5.jpg'),
(64, 'Blouse Batik Kerja KAWUNG SELING NAVY Bahan Katun Primisima Halus Premium Batik Wanita', 14, 350000, '<p>\r\n\r\n</p><p>Kemeja batik dengan design eksklusif memadukan keindahan batik tradisional dengan sentuhan modern yang unik.</p><p>Jahitan berkualitas dan bahan ramah lingkungan karna 100% katun sehingga nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 24, 29, '1142946572_Blouse Batik Kerja KAWUNG SELING NAVY Bahan Katun Primisima Halus Premium Batik Wanita 1.jpg', '1142946572_Blouse Batik Kerja KAWUNG SELING NAVY Bahan Katun Primisima Halus Premium Batik Wanita 4.jpg', '1142946572_Blouse Batik Kerja KAWUNG SELING NAVY Bahan Katun Primisima Halus Premium Batik Wanita 2.jpg'),
(65, 'Blouse Batik Wanita Kawung Hijau', 14, 300000, '<p>\r\n\r\n</p><p>Kemeja batik dengan design eksklusif memadukan keindahan batik tradisional dengan sentuhan modern yang unik.</p><p>Jahitan berkualitas dan bahan ramah lingkungan karna 100% katun sehingga nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 84, 24, '1267210071_Blouse Batik Wanita Kawung Hijau 2.jpg', '1267210071_Blouse Batik Wanita Kawung Hijau 1.jpg', '1267210071_Blouse Batik Wanita Kawung Hijau 3.jpg'),
(66, 'Blouse Batik Kerja Parang Klitik', 14, 390000, '<p>\r\n\r\n</p><p>Kemeja batik dengan design eksklusif memadukan keindahan batik tradisional dengan sentuhan modern yang unik.</p><p>Jahitan berkualitas dan bahan ramah lingkungan karna 100% katun sehingga nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 84, 27, '27727370_BLOUSE BATIK WANITA KERJA parang klitik.jpg', '27727370_BLOUSE BATIK WANITA KERJA parang klitik 1.jpg', '27727370_BLOUSE BATIK WANITA KERJA parang klitik.jpg'),
(67, 'Hem Pria Cap Kawung Tumpang Exclusiv Faaro', 14, 240000, '<p>\r\n\r\n</p><p>Kemeja batik dengan design eksklusif memadukan keindahan batik tradisional dengan sentuhan modern yang unik.</p><p>Jahitan berkualitas dan bahan ramah lingkungan karna 100% katun sehingga nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 137, 28, '1297452923_Hem Pria Batik Cap Kawung Tumpang Exclusive Faaro.jpg', '1297452923_Hem Pria Batik Cap Kawung Tumpang Exclusive Faaro 2.jpg', '1297452923_Hem Pria Batik Cap Kawung Tumpang Exclusive Faaro 3.jpg'),
(68, 'Kemeja Batik motif Kawung Sage, Batik Pria', 14, 230000, '<p>\r\n\r\n</p><p>Kemeja batik dengan design eksklusif memadukan keindahan batik tradisional dengan sentuhan modern yang unik.</p><p>Jahitan berkualitas dan bahan ramah lingkungan karna 100% katun sehingga nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 110, 29, '587284691_Kemeja Batik Motif Kawung Sage Batik Pria.jpg', '587284691_Kemeja Batik Motif Kawung Sage Batik Pria 2.jpg', '587284691_Kemeja Batik Motif Kawung Sage Batik Pria 3.jpg'),
(69, 'Kemeja Batik Pria Lapis Furing Motif Truntum Hitam', 14, 240000, '<p>\r\n\r\n</p><p>Kemeja batik dengan design eksklusif memadukan keindahan batik tradisional dengan sentuhan modern yang unik.</p><p>Jahitan berkualitas dan bahan ramah lingkungan karna 100% katun sehingga nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 124, 28, '1240120491_Kemeja Batik Pria Lapis Furing Motif TRUNTUM HITAM.jpg', '1240120491_Kemeja Batik Pria Lapis Furing Motif TRUNTUM HITAM  2.jpg', '1240120491_Kemeja Batik Pria Lapis Furing Motif TRUNTUM HITAM  3.jpg'),
(70, 'Kemeja Couple Maheswari Kawung', 14, 440000, '<p>\r\n\r\n</p><p>Kemeja batik dengan design eksklusif memadukan keindahan batik tradisional dengan sentuhan modern yang unik.</p><p>Jahitan berkualitas dan bahan ramah lingkungan karna 100% katun sehingga nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 277, 29, '136256101_KEMEJA Couple Maheswari kawung 1.jpg', '136256101_KEMEJA Couple Maheswari kawung 3.jpg', '136256101_KEMEJA Couple Maheswari kawung 2.jpg'),
(71, 'Batik Truntum Kuncoro Baju Batik  Cowok Lengan Panjang', 14, 250000, '<p>\r\n\r\n</p><p>Kemeja batik dengan design eksklusif memadukan keindahan batik tradisional dengan sentuhan modern yang unik.</p><p>Jahitan berkualitas dan bahan ramah lingkungan karna 100% katun sehingga nyaman saat digunakan.</p><br>\r\n\r\n<br><p></p>', 141, 25, '534098564_TRUNTUM KUNCORO baju batik cowok lengan panjang 4.jpg', '534098564_TRUNTUM KUNCORO baju batik cowok lengan panjang 3.jpg', '534098564_TRUNTUM KUNCORO baju batik cowok lengan panjang 2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `refund`
--

CREATE TABLE `refund` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `alasan` text DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `ukuran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `transaksi_invoice` int(11) NOT NULL,
  `transaksi_produk` int(11) NOT NULL,
  `transaksi_jumlah` int(11) NOT NULL,
  `transaksi_harga` int(11) NOT NULL,
  `ukuran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `transaksi_invoice`, `transaksi_produk`, `transaksi_jumlah`, `transaksi_harga`, `ukuran`) VALUES
(14, 15, 40, 1, 299000, 'L'),
(18, 18, 32, 1, 269000, 'XL'),
(19, 19, 40, 1, 299000, 'L'),
(121, 94, 71, 1, 250000, 'S'),
(122, 95, 70, 1, 440000, 'S');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `invoice_ibfk_1` (`invoice_customer`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`komentar_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`),
  ADD KEY `produk_kategori_fk` (`produk_kategori`);

--
-- Indeks untuk tabel `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `transaksi_ibfk_1` (`transaksi_invoice`),
  ADD KEY `transaksi_ibfk_2` (`transaksi_produk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `komentar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `refund`
--
ALTER TABLE `refund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`invoice_customer`) REFERENCES `customer` (`customer_id`);

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`);

--
-- Ketidakleluasaan untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_kategori_fk` FOREIGN KEY (`produk_kategori`) REFERENCES `kategori` (`kategori_id`);

--
-- Ketidakleluasaan untuk tabel `refund`
--
ALTER TABLE `refund`
  ADD CONSTRAINT `refund_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`invoice_id`),
  ADD CONSTRAINT `refund_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`produk_id`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`transaksi_invoice`) REFERENCES `invoice` (`invoice_id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`transaksi_produk`) REFERENCES `produk` (`produk_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
