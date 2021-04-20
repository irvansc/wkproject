-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 18 Apr 2021 pada 18.08
-- Versi server: 5.7.24
-- Versi PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wschool_1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id`, `title`, `deskripsi`, `photo`, `tanggal`) VALUES
(1, 'Kata Sambutan pertama', '<p>Puji syukur kami panjatkan ke hadirat Tuhan Yang Maha Esa atas karunia dan hidayah-Nya, sehingga kita semua dapat membaktikan segala hal yang kita miliki untuk kemajuan dunia pendidikan. Apapun bentuk dan sumbangsih yang kita berikan, jika dilandasi niat yang tulus tanpa memandang imbalan apapun akan menghasilkan mahakarya yang agung untuk bekal kita dan generasi setelah kita. Pendidikan adalah harga mati untuk menjadi pondasi bangsa dan negara dalam menghadapi perkembangan zaman.</p>\r\n\r\n<p>Hal ini seiring dengan penguasaan teknologi untuk dimanfaatkan sebaik mungkin, sehingga menciptakan iklim kondusif dalam ranah keilmuan. Dengan konsep yang kontekstual dan efektif, kami mengejewantahkan nilai-nilai pendidikan yang tertuang dalam visi misi M-School, sebagai panduan hukum dalam menjabarkan tujuan hakiki pendidikan.</p>', '1614564803.jpg', '2021-02-24 10:17:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE `agenda` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `mulai` date DEFAULT NULL,
  `selesai` date DEFAULT NULL,
  `tempat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waktu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `agenda`
--

INSERT INTO `agenda` (`id`, `name`, `tanggal`, `deskripsi`, `mulai`, `selesai`, `tempat`, `waktu`, `keterangan`, `author`) VALUES
(1, 'pembagian rapot', '2021-04-15 12:58:24', '<p>Lorem Ipsum&nbsp;adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>', '2021-04-17', '2021-04-18', 'Gedung Utama', '08:00 - 09:00 WIB', NULL, 'Irvan Maulana, S.Pd'),
(2, 'Kajian', '2021-04-15 12:59:05', '<p>Lorem Ipsum&nbsp;adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>', '2021-04-17', '2021-04-17', 'Majlis', '07:30 - 13:00 WIB', NULL, 'Irvan Maulana, S.Pd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`id`, `nama`, `user_id`, `cover`, `created_at`, `updated_at`) VALUES
(1, 'Kegiatan Osis', 1, '1618517176.jpg', '2021-04-15 13:06:16', '2021-04-15 13:06:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `alias`, `created_at`, `updated_at`) VALUES
(1, 'Sejarah', 'sejarah', '2021-04-15 12:31:57', '2021-04-15 12:31:57'),
(2, 'Tekhnologi', 'tekhnologi', '2021-04-15 12:32:01', '2021-04-15 12:32:01'),
(3, 'Sains', 'sains', '2021-04-15 12:32:05', '2021-04-15 12:32:05'),
(4, 'Budaya', 'budaya', '2021-04-15 12:38:22', '2021-04-15 12:38:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_post`
--

CREATE TABLE `category_post` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `category_post`
--

INSERT INTO `category_post` (`post_id`, `category_id`, `created_at`, `updated_at`) VALUES
(5, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('y','n') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'n',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` int(11) NOT NULL,
  `commentable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id`, `nama`, `email`, `telp`, `pesan`, `status`, `tanggal`) VALUES
(2, 'irvan maulana', 'irvanmaulana292@gmail.com', '085211023570', 'hallo', 0, '2021-04-16 18:58:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `download`
--

CREATE TABLE `download` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_dl` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `download`
--

INSERT INTO `download` (`id`, `title`, `keterangan`, `author`, `data`, `jml_dl`, `created_at`, `updated_at`) VALUES
(1, 'Modul tehnik komputer', NULL, 'Irvan Maulana, S.Pd', 'HALLO.docx', 0, NULL, NULL),
(2, 'contoh', 'kelas X wajib download', 'Irvan Maulana, S.Pd', 'contoh1.xlsx', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekstra`
--

CREATE TABLE `ekstra` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ektras`
--

CREATE TABLE `ektras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` text COLLATE utf8mb4_unicode_ci,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `status` enum('wajib','pilihan') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ektras`
--

INSERT INTO `ektras` (`id`, `nama`, `keterangan`, `status`, `img`, `tanggal`) VALUES
(1, 'Basket', NULL, 'wajib', '1618516417.jpg', '2021-04-15 19:53:37'),
(2, 'Pramuka', NULL, 'wajib', '1618516428.jpg', '2021-04-15 19:53:48'),
(3, 'Drumband', NULL, 'pilihan', '1618516449.jpg', '2021-04-15 19:54:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foot`
--

CREATE TABLE `foot` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maps` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `foot`
--

INSERT INTO `foot` (`id`, `alamat`, `phone`, `email`, `maps`, `created_at`, `updated_at`) VALUES
(1, 'Wkng Project, Mekarsari, Sukabumi Regency, Jawa Barat', '085211023570', 'irvanmaulana292@gmail.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.7436519137677!2d106.77015701475548!3d-6.801009468406966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6833cb65b3c65f%3A0xee6b4f2eebf231a8!2sWkng%20Project!5e0!3m2!1sid!2sid!4v1618599273728!5m2!1sid!2sid', NULL, '2021-04-16 11:55:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gbr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_video` text COLLATE utf8mb4_unicode_ci,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id`, `user_id`, `album_id`, `title`, `gbr`, `url_video`, `tanggal`) VALUES
(1, 1, 1, NULL, '1618517251.jpg', NULL, '2021-04-15 20:07:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmp_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenkel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb` text COLLATE utf8mb4_unicode_ci,
  `ig` text COLLATE utf8mb4_unicode_ci,
  `twitter` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `kelas_id`, `nip`, `nama_guru`, `mapel`, `tmp_lahir`, `tgl_lahir`, `alamat`, `telp`, `jenkel`, `photo`, `fb`, `ig`, `twitter`, `created_at`, `updated_at`) VALUES
(1, 1, '54321', 'ABC', 'Tehnik Komputer', 'Sukabumi', '1995-09-27 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43359', '1234567892', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(2, 1, '54322', 'ABCD', 'Agama Islam', 'Bogor', '1990-02-18 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43360', '1234567893', 'P', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(3, 1, '54323', 'ABCE', 'Psikologi', 'Depok', '1995-09-16 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43361', '1234567894', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(4, 1, '54324', 'ABCF', 'Sejarah', 'Bandung', '1990-09-20 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43362', '1234567895', 'P', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(5, 1, '54325', 'ABCG', 'Matematika', 'Sukabumi', '1997-09-21 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43363', '1234567896', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(6, 1, '54326', 'ABCH', 'PPKN', 'Bogor', '1997-09-22 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43364', '1234567897', 'P', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(7, 1, '54327', 'ABCI', 'B.Inggris', 'Depok', '1997-09-23 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43365', '1234567898', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(8, 1, '54328', 'ABCJ', 'B.Arab', 'Bandung', '1997-09-24 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43366', '1234567899', 'P', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(9, 1, '54329', 'ABCK', 'Jaringan', 'Sukabumi', '1997-09-25 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43367', '1234567900', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(10, 1, '54330', 'ABCL', 'Public Speaking', 'Bogor', '1997-09-26 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43368', '1234567901', 'P', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(11, 2, '54331', 'ABC', 'Tehnik Komputer', 'Sukabumi', '1995-09-27 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43359', '1234567892', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(12, 2, '54332', 'ABCD', 'Agama Islam', 'Bogor', '1990-02-18 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43360', '1234567893', 'P', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(13, 2, '54333', 'ABCE', 'Psikologi', 'Depok', '1995-09-16 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43361', '1234567894', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(14, 2, '54334', 'ABCF', 'Sejarah', 'Bandung', '1990-09-20 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43362', '1234567895', 'P', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(15, 2, '54335', 'ABCG', 'Matematika', 'Sukabumi', '1997-09-21 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43363', '1234567896', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(16, 2, '54336', 'ABCH', 'PPKN', 'Bogor', '1997-09-22 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43364', '1234567897', 'P', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(17, 2, '54337', 'ABCI', 'B.Inggris', 'Depok', '1997-09-23 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43365', '1234567898', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(18, 2, '54338', 'ABCJ', 'B.Arab', 'Bandung', '1997-09-24 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43366', '1234567899', 'P', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(19, 2, '54339', 'ABCK', 'Jaringan', 'Sukabumi', '1997-09-25 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43367', '1234567900', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(20, 2, '54340', 'ABCL', 'Public Speaking', 'Bogor', '1997-09-26 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43368', '1234567901', 'P', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(21, 3, '54341', 'ABC', 'Tehnik Komputer', 'Sukabumi', '1995-09-27 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43359', '1234567892', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(22, 3, '54342', 'ABCD', 'Agama Islam', 'Bogor', '1990-02-18 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43360', '1234567893', 'P', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(23, 3, '54343', 'ABCE', 'Psikologi', 'Depok', '1995-09-16 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43361', '1234567894', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(24, 3, '54344', 'ABCF', 'Sejarah', 'Bandung', '1990-09-20 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43362', '1234567895', 'P', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(25, 3, '54345', 'ABCG', 'Matematika', 'Sukabumi', '1997-09-21 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43363', '1234567896', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(26, 3, '54346', 'ABCH', 'PPKN', 'Bogor', '1997-09-22 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43364', '1234567897', 'P', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(27, 3, '54347', 'ABCI', 'B.Inggris', 'Depok', '1997-09-23 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43365', '1234567898', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(28, 3, '54348', 'ABCJ', 'B.Arab', 'Bandung', '1997-09-24 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43366', '1234567899', 'P', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(29, 3, '54349', 'ABCK', 'Jaringan', 'Sukabumi', '1997-09-25 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43367', '1234567900', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(30, 3, '54350', 'ABCL', 'Public Speaking', 'Bogor', '1997-09-26 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43368', '1234567901', 'P', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-15 12:48:51', '2021-04-15 12:48:51'),
(31, 1, '12345', 'Irvan Maulana, S.Pd', 'Tehnik Komputer', 'Sukabumi', '1993-05-12 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43359', '1234567892', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-16 11:29:54', '2021-04-16 11:29:54'),
(32, 2, '12346', 'Sundani, S.Pd', 'Agama Islam', 'Bogor', '1990-02-18 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43360', '1234567893', 'P', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-16 11:29:54', '2021-04-16 11:29:54'),
(33, 3, '12347', 'Azam, S.Pd', 'Psikologi', 'Depok', '1995-09-16 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43361', '1234567894', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-16 11:29:54', '2021-04-16 11:29:54'),
(34, 1, '12348', 'Samsidi, S.Pd', 'Sejarah', 'Bandung', '1990-09-20 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43362', '1234567895', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-16 11:29:54', '2021-04-16 11:29:54'),
(35, 2, '12349', 'Ikbal, S.Pd', 'Matematika', 'Sukabumi', '1997-09-21 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43363', '1234567896', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-16 11:29:54', '2021-04-16 11:29:54'),
(36, 3, '12350', 'Asma Permana, S.Pd', 'PPKN', 'Bogor', '1997-09-22 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43364', '1234567897', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-16 11:29:54', '2021-04-16 11:29:54'),
(37, 1, '12351', 'Yahdi, S.Pd', 'B.Inggris', 'Depok', '1997-09-23 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43365', '1234567898', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-16 11:29:54', '2021-04-16 11:29:54'),
(38, 2, '12352', 'Azmi, S.Pd', 'B.Arab', 'Bandung', '1997-09-24 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43366', '1234567899', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-16 11:29:54', '2021-04-16 11:29:54'),
(39, 3, '12353', 'Dede, S.kom', 'Jaringan', 'Sukabumi', '1997-09-25 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43367', '1234567900', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-16 11:29:54', '2021-04-16 11:29:54'),
(40, 1, '12354', 'Maulana, M.Si', 'Public Speaking', 'Bogor', '1997-09-26 00:00:00', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43368', '1234567901', 'L', NULL, 'https://www.facebook.com/irvhan.cievhan', 'https://www.instagram.com/irvansc', 'https://www.twitter.com/irvansc', '2021-04-16 11:29:54', '2021-04-16 11:29:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `image_fron`
--

CREATE TABLE `image_fron` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `image_fron`
--

INSERT INTO `image_fron` (`id`, `title`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Bottom', '1614565926.png', NULL, '2021-04-18 10:07:48'),
(2, 'Top', '1614565973.png', NULL, '2021-04-18 10:07:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `image_web`
--

CREATE TABLE `image_web` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `image_web`
--

INSERT INTO `image_web` (`id`, `title`, `favicon`, `created_at`, `updated_at`) VALUES
(1, 'frontend', '1614565702.png', NULL, '2021-02-28 19:28:22'),
(2, 'backend', '1614565657.png', NULL, '2021-02-28 19:27:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `alias`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'X', 'x', NULL, '2021-04-15 12:38:31', '2021-04-15 12:38:31'),
(2, 'X-A', 'x-a', NULL, '2021-04-15 12:38:35', '2021-04-15 12:38:35'),
(3, 'X-B', 'x-b', NULL, '2021-04-15 12:38:38', '2021-04-15 12:38:38'),
(4, 'XI', 'xi', NULL, '2021-04-16 11:19:00', '2021-04-16 11:19:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meta`
--

CREATE TABLE `meta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `meta`
--

INSERT INTO `meta` (`id`, `description`, `keywords`, `author`, `created_at`, `updated_at`) VALUES
(1, 'website resmi sekolah  WK-School', 'SMK W-School', 'Irvan Maulana,S.Pd', NULL, '2021-04-16 11:46:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_16_164103_create_post_table', 1),
(5, '2021_02_16_164125_create_categories_table', 1),
(6, '2021_02_16_164157_create_category_post_table', 1),
(7, '2021_02_16_164226_create_comments_table', 1),
(8, '2021_02_20_203706_create_roles_table', 1),
(9, '2021_02_20_203811_create_role_user_table', 1),
(10, '2021_02_20_203833_create_permissions_table', 1),
(11, '2021_02_20_203851_create_permissions_role_table', 1),
(12, '2021_02_20_211307_create_agenda_table', 1),
(13, '2021_02_20_211343_create_download_table', 1),
(14, '2021_02_20_211410_create_album_table', 1),
(15, '2021_02_20_211439_create_kelas_table', 1),
(16, '2021_02_20_211502_create_siswa_table', 1),
(17, '2021_02_20_211534_create_guru_table', 1),
(18, '2021_02_20_211603_create_pengumuman_table', 1),
(19, '2021_02_20_211742_create_foto_table', 1),
(20, '2021_02_20_212309_create_sejarah_table', 1),
(21, '2021_02_20_212431_create_testimoni_table', 1),
(22, '2021_02_20_212553_create_video_table', 1),
(23, '2021_02_20_212638_create_vimi_table', 1),
(24, '2021_02_24_094147_create_about_table', 2),
(25, '2021_02_24_094417_create_meta_table', 2),
(26, '2021_02_24_094602_create_image_web_table', 2),
(27, '2021_02_24_094706_create_foot_table', 2),
(28, '2021_02_24_094831_create_sosmed_table', 2),
(29, '2021_02_24_095213_create_slider_table', 2),
(30, '2021_02_24_095347_create_ekstra_table', 2),
(31, '2021_02_24_100027_update_deskripsi_in_log_for_sejarah_table', 3),
(32, '2021_02_24_101310_add_photo_to_about_table', 4),
(33, '2021_02_24_164123_update_avatar_in_log_for_image_web_table', 5),
(34, '2021_02_24_164323_add_title_to_image_web_table', 6),
(35, '2021_02_24_164948_create_image_fron_table', 7),
(36, '2021_02_25_013558_create_contact_table', 8),
(37, '2021_02_28_030306_add_values_to_alamat_column_in_users_table', 9),
(38, '2021_02_28_030643_update_deskripsi_in_log_for_slider_table', 10),
(39, '2021_03_01_092453_create_ektras_table', 11),
(40, '2021_03_05_090416_create_sambutans_table', 12),
(41, '2021_03_23_003112_edit_table_to_guru_table', 13),
(42, '2021_03_23_144945_create_table_sarana', 14),
(43, '2021_03_23_145942_create_osis', 14),
(44, '2021_03_23_150102_create_jurusan', 14),
(45, '2021_03_24_151032_add_image_to_ekstras_table', 15),
(46, '2021_03_24_163837_update_keterangan_in_log_for_ektras_table', 16),
(47, '2021_03_24_163956_add_status_to_ektras_table', 17),
(48, '2021_03_25_053244_delete_kolom_alias_to_table_kelas', 18),
(49, '2021_03_25_053606_edit_table_to_kelas_table', 19),
(50, '2021_03_30_023834_add_tgl_lahir_to_siswa_table', 20),
(51, '2021_04_01_035410_edit_photo_to_guru_table', 21),
(52, '2021_04_05_025229_create_table_ph', 22),
(53, '2021_04_05_025433_create__ppdb', 22),
(54, '2021_04_05_070818_edit_table_to_slider_table', 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `osis`
--

CREATE TABLE `osis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `osis`
--

INSERT INTO `osis` (`id`, `title`, `img`, `ket`, `created_at`, `updated_at`) VALUES
(1, 'Osis', '1234567.jpg', '<p style=\"text-align:justify\">Susunan Pengurus OSIS Periode Tahun Pelajaran 2019-2020&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\">Ketua : Ahnas Nurhamik&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Wakil Ketua : Pepie Pebrianti Wijaya&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Sekretaris I : Iksan Kosaih Febriana&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Sekretaris II : Anggita Eka Febriana&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Bendaraha I : Amallia Nursyifa Kusnaedi&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Bendahara&nbsp;II : Nurlaeli Azizah Koord. Umum :&nbsp;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">SEKBID I : Keimanan dan Ketakwaan terhadap Tuhan Yang Maha Esa</p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\">Ketua : Iqbal Rohman</li>\r\n	<li style=\"text-align: justify;\">Sekretaris : Anggita Eka Febriana&nbsp;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Anggota :&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Citra Pancawati&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Rizky Nurmulyani&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Alyani Nadhilah&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Luthfi Alfi Nur Hikmah&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Kartika Nursyabanita&nbsp;</li>\r\n	<li style=\"text-align: justify;\">H M. Mufid Taqiyuddin&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Ervina Dwinur Tegariyanti&nbsp;</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">SEKBID II : Kehidupan Berbangsa dan Bernegara&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\">Ketua : Nurlaeli Azizah&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Sekretaris : Amara Winoma&nbsp;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Anggota :&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Vidya Ananda Devista&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Falsabila Chika Azzahra&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Nawal Kamila Dava</li>\r\n	<li style=\"text-align: justify;\">&nbsp;Ladyana Azzahra&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Mely Amalia&nbsp;</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">SEKBID III : Pendidikan Pendahuluan Bela Negara&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\">Ketua : Prishandika Eka Pratama&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Sekretaris : Devi Aprianti&nbsp;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Anggota :&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Martha Aushasiani&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Muhammad Rakha Purnama&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Ericka Nurul Sabillah&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Vani Fitria&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Handyanai Meizani Putri&nbsp;</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">SEKBID IV : Kepribadian dan Budi Pekerti Luhur&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\">Ketua : Mooy Arthisya&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Sekretaris : Aprilia Debelta</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Anggota :&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Nendah Herlina&nbsp;</li>\r\n	<li style=\"text-align: justify;\">M. Akmal Faturrahman&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Nayandra Najlaa Syahira&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Yunita Melati Suci&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Manna As-Syagahaf Erica&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Gunaefi Putri&nbsp;</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">SEKBID V : Pendidikan Politik dan Kepemimpinan&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\">Ketua : Wira Hadikusumah&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Sekretaris : Dhea Lunciana Balqis&nbsp;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Anggota :&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Pepie Pebrianti&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Wijaya Ahnas Nurhakim</li>\r\n	<li style=\"text-align: justify;\">&nbsp;Muhammad Iqbal Fahreza&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Sindy Kurniawati&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Tazwini Nazwa&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Syaadatul Ummah&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Lia Afilianti&nbsp;</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">SEKBID VI : Keterampilan dan Keriwausahaan&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\">Ketua : Muhammad Bucky Al Farizi&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Sekretaris : Metta Audina&nbsp;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Anggota :&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Rosiana Sihombing&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Bunga Zafira Aditya&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Mahardika Salwa&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Faradilla Agnia&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Zahrah N&nbsp;</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">SEKBID VII : Kesegaran Jasmani dan Daya Kreasi&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\">Ketua : Irsyad Athalla Tegar Sugianto&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Sekretaris : Adhisty Nashira K&nbsp;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Anggota :&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Aisha Rania&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Aqil Rudya Alam&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Keisha Haifa&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Murni Maharanee&nbsp;</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">SEKBID VIII : Persepsi Apresiasi dan Kreasi Seni&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\">Ketua : Shiqia Nashir&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Sekretaris : Iksan Kosasih T&nbsp;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Anggota :&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Amalia Nursyifa&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Kusnaedi Zahra&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Assyifa Nurrahman&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Inez Reisya Salsabilla&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Averina Jaqluine&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Purnama M Natiqoh&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Istiqomah Nisrina&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Keisha Latief&nbsp;</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">SEKBID IX : Teknologi Informasi dan Komunikasi&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\">Ketua : Raidah Hasna Muthi&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Sekretaris : Hera Puspita&nbsp;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Anggota :&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Sarah Hafizah&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Nugraha Crishtiant&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Gabriel Annisa Aristiani&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Mutiara Devira Racmadina&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Nuri Rahmanisa&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Gregorius Dido&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Bintang K&nbsp;</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">SEKBID X : Komunikasi Berbahasa Asing&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\">Ketua : Olyandra Raihan Razak&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Sekretaris : Nendia Elisa Surya Amanda&nbsp;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Anggota :&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Ghina Salsabila&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Liany Syifa Nurjanah&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Tiara Seffa Raswina&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Qisti Septiani Putri&nbsp;</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">OSIS (Organisasi Siswa Intra Sekolah) adalah organisasi yang berada di tingkat sekolah di seluruh indonesia,dimulai dari tingkat sekolah menengah pertama (SMP) hingga seolah menengah atas atau kejuruan(SMA/SMK) Organisasi ini dibentuk sebagai tempat bagi siswa untuk mengenal dan belajar berorganisasi secara nyata dan berfungsi pula untuk memfasilitasi kegiatan-kegiatan ekstrakurikuler dan kesiswaan.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Sesuai dengan namanya (Organisasi Siswa), maka seluruh kegiatan OSIS diurus dan dikelola oleh siswa di bawah bimbingan seorang guru yang ditugaskan sekolah sebagai Pembina OSIS.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Susunan Pengurus inti dari organisasi siswa ini terdiri atas Ketua Umum, Ketua I,Ketua II, Sekretaris I, Sekretaris II , Bendahara I serta Bendahara II. Pengurus inti ini membawahi 10 (sepulu) sekbid yaang terdiri atas :&nbsp;</p>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\">SEKBID 1 (Ketaqwaan Terhadap Tuhan Yang Maha Esa)&nbsp;</li>\r\n	<li style=\"text-align: justify;\">SEKBID 2 (Wawasan Kebangsaan dan Nasionalisme)&nbsp;</li>\r\n	<li style=\"text-align: justify;\">SEKBID 3 (Wawasan Keilmuan)&nbsp;</li>\r\n	<li style=\"text-align: justify;\">SEKBID 4 (Kepribadian Budi pekerti dan Kehidupan Berbangsa)&nbsp;</li>\r\n	<li style=\"text-align: justify;\">SEKBID 5 (Organisasi Kepemimpinan dan Demokrasi)&nbsp;</li>\r\n	<li style=\"text-align: justify;\">SEKBID 6 (Keterampilan dan Kewirausahaan)&nbsp;</li>\r\n	<li style=\"text-align: justify;\">SEKBID 7 (Olahraga dan Kesehatan)&nbsp;</li>\r\n	<li style=\"text-align: justify;\">SEKBID 8 (Apresiasi Seni dan Budaya)&nbsp;</li>\r\n	<li style=\"text-align: justify;\">SEKBID 9 (Teknologi Informasi dan Komunikasi)&nbsp;</li>\r\n	<li style=\"text-align: justify;\">SEKBID 10 (Komunikasi Berbahas Asing)&nbsp;</li>\r\n</ul>\r\n\r\n<p style=\"text-align:justify\">Anggota OSIS adalah seluruh siswa yang berada pada satu sekolah tempat OSIS itu berada. Seluruh anggota OSIS berhak untuk memilih calonnya untuk kemudian menjadi ketua atau pengurus OSIS.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">PROGRAM KERJA OSIS SMKN 9 BANDUNG TAHUN PELAJARAN 2019/2020 SASARAN POKOK&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">A. KEDALAM&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Memantapkan keberadaan organisasi dalam mengaktualisasikan peran danfungsi OSIS yang bermanfaat bagi anggota pada khususnya maupun pada masyarakat pada umumnya, agar dapat di capai kondisi mantap untuk mencapai tujuan.</li>\r\n	<li style=\"text-align: justify;\">Meningkatkan kemampuan pemahaman akan fungsi dan peran OSIS sehingga terbentuk komitment yang kuat untuk membangun partisipasi aktif terhadap perkembangan dan kemajuan sekolah.</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">B. KELUAR&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Mewujudkan keberadaan OSIS sebagai bagian penting dalam penyelenggaraan pendidikan sekolah untuk ikut melaksanakan proses pengembangan akan kemajuan sekolah&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">A. PENGERTIAN&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Program kerja OSIS merupakan perwujudan dari komitment organisasi untuk berperan aktif mendukung program OSIS dalam upaya mencapai maksud dan tujuan seperti dalam anggaran dasar.&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Program kerja OSIS oleh rapat kerja yang memuat pokok-pokok program secara garis besar yang merupakan pedoman dalam merumuskan program dan pelaksanaan selanjutnya.</li>\r\n	<li style=\"text-align: justify;\">Program ini bersifat mengikat untuk di laksanakan segenap pengurus OSIS dan masyarakat sekolah.&nbsp;</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">B. MAKSUD DAN TUJUAN&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">Maksud dan tujuan ditetapkan program ini adalah memberikan arah dan prioritas bagi perkembangan sekolah secara menyeluruh dan bertahap dalam rangka mewujudkan visi dan misi SMK serta tanggung jawab dan keikutsertaannya berpatisipasi dalam mendukung kemajuan bidang pendidikan.&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">URAIAN KEGIATAN PROGRAM KERJA&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">A. SEKBID 1 (Ketaqwaan Terhadap Tuhan Yang Maha Esa)&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Baca Al-Quran dan Asmaul Husna sebelum KBM&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Kegiatan Sholat Dhuha&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Kegiatan Sholat Dzuhur Berjamaah&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Penjadaln Adzan Dzhuhur&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Kegiatan Sholat Jumat&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Penjadwalan Imam/Khotib Jumat&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Pengelolaan Infaq Jumat&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Kegiatan Tabligh Akbar&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Kegiatan Pesantren Ramadhan&nbsp;</li>\r\n	<li style=\"text-align: justify;\">KegiatanBuka Bersama&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Kegiatan Halal Bi Halal&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Peringatan Idul Qurban&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Peringatan Hari Besar Islam lainnya&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Kegiatan Lomba Keagamaan (MTQ, Adzan, Kaligrafi, Tausyiah, Busana Muslim)&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Bakti Sosial&nbsp;</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">SEKBID 2 (Wawasan Kebangsaan dan Nasionalisme)&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Upacara Hari Senin Upacara Hari Besar Nasional&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Kegiatan MPLS (Masa Pengenalan Lingkungan Sekolah)&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Pemilu Ketua OSIS&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Seleksi Calon Pengurus OSIS&nbsp;</li>\r\n	<li style=\"text-align: justify;\">LDKS (Latihan Dasar Kepemimpinan Siswa) untuk pengurus OSIS&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Pelantikan Pengurus OSIS&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Kegiatan LKS (Latihan kepemimpinan Siswa)&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Lomba PBB Ekstrakurikuler Paskibra&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Ekstrakurikuler Pramuka&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Ekstrakurikuler PMR&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Peringatan Bandung Lautan Api&nbsp;</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">SEKBID 3 (Wawasan Keilmuan) Studi Tour&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Ekstrakurikuler KIR (kelompok Ilmiah Remaja)&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Lomba cerdas cermat&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Mengikuti undangan pelatihan/workshop dari instansi/lembaga lain&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Apresiasi/menghadiri pameran buku</li>\r\n	<li style=\"text-align: justify;\">Apresiasi/menghadiri pameran pendidikan tinggi .&nbsp;</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">SEKBID 4 (Kepribadian Budi pekerti dan Kehidupan Berbangsa)&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Peringnatan hari Aids/HIV sedunia&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Penyuluhan penanganan kenakalan remaja dan pergaulan bebas&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Keputrian&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Ekstrakurikuler Paskibra&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Ekstrakurikuler Pramuka&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Ekstrakurikuler PMR&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Bakti sosial&nbsp;</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">SEKBID 5 (Organisasi Kepemimpinan dan Demokrasi)&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Rapat OSIS Musyawarah OSIS&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Kegiatan MPLS (Masa Pengenalan Lingkungan Sekolah)&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Pemilu Ketua OSIS&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Seleksi Calon Pengurus OSIS&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Pembentukan MPK&nbsp;</li>\r\n	<li style=\"text-align: justify;\">LDKS (Latihan Dasar Kepemimpinan Siswa) untuk pengurus OSIS&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Pelantikan Pengurus OSIS&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Kegiatan LKS (Latihan Kepemimpinan Siswa)&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Ekstrakurikuler Paskibra&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Ekstrakurikuler Pramuka&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Ekstrakurikuler PMR&nbsp;</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">SEKBID 6 (Keterampilan dan Kewirausahaan)&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Pengembangan Koperasi Siswa&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Pengembangan Kantin&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Kejujuran Mading&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Mengikuti undangan pelatihan/workshop&nbsp;</li>\r\n	<li style=\"text-align: justify;\">keterampilan dan kewirausahaan dari instansi/lembaga lain&nbsp;</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">SEKBID 7 (Olahraga dan Kesehatan)&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Senam Kesegaran Jasmani, Rabu pagi&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Ekstrakurikuler BKC&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Ekstrakurikuler Futsal&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Ekstrakurikuler Bola Basket&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Ekstrakurikuler Bola Voli&nbsp;</li>\r\n	<li style=\"text-align: justify;\">PORSENI (Pekan Olahraga dan Seni) Siswa&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Mengikuti undangan perlombaan olahraga dari instansi/lembaga lain&nbsp;</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">SEKBID 8 (Apresiasi Seni dan Budaya)&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Paduan Suara&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Upacara Bendera&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Ekstrakurikuler&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Paduan Suara&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Ekstrakurikuler Karawitan&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Ekstrakurikuler Modelling&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Ekstrakurikuler Drawing&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Club PORSENI (Pekan Olahraga dan Seni) Siswa&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Open house Pameran kreativitas siswa&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Mengisi acara kesenian untuk kegiatan sekolah (Open House, Pelepasan kelas XII)&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Mengikuti undangan perlombaan/workshop kesenian dari instansi/lembaga lain&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Apresiasi seni/menghadiri kegiatan kesenian di luar sekolah&nbsp;</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">SEKBID 9 (Teknologi Informasi dan Komunikasi)&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Pengadaan Blog OSIS&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Pengadaan Group/Page di Jejaring Sosial&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Penerimaan Kritik dan Saran melalui email, Blog, atau Situs Jejaring sosial&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Memberikan Informasi mengenai kegiatan dan Program Kerja OSIS dengan basis TIK&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Menampung aspirasi dan kreatif siswa untuk dipublikasikan ke Web Blog&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Mengikuti undangan perlombaan dan pelatihan/workshop TIK dari instansi/lembaga lain&nbsp;</li>\r\n</ol>\r\n\r\n<p style=\"text-align:justify\">SEKBID 10 (Komunikasi Berbahas Asing)&nbsp;</p>\r\n\r\n<ol>\r\n	<li style=\"text-align: justify;\">Ekstrakurikuler bahasa Inggris (ECC)&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Ekstrakurikuler bahasa Prancis&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Ekstrakurikuler bahasa Jerman&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Ekstrakurikuler bahasa Jepang&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Lomba debat bahasa Inggris</li>\r\n	<li style=\"text-align: justify;\">&nbsp;Lomba Karya Tulis berbahasa asing/bahasa Inggris&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Mading bahasa Inggris&nbsp;</li>\r\n	<li style=\"text-align: justify;\">Mengikuti undangan perlombaan dan pelatihan/workshop bahasa asing/bahasa inggris dari instansi/lembaga lain.</li>\r\n</ol>', NULL, '2021-03-24 10:09:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `title`, `body`, `user_id`, `tanggal`) VALUES
(1, 'Peluncuran Website Resmi Wscholl', '<p>Lorem Ipsum&nbsp;adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>', 1, '2021-04-15 19:56:28'),
(2, 'Pariatur Dignissimo', '<p>Lorem Ipsum&nbsp;adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>', 1, '2021-04-15 19:56:51'),
(3, 'Why do we use it?', '<p>Lorem Ipsum&nbsp;adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.</p>', 1, '2021-04-15 19:57:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`) VALUES
(61, 'aabout'),
(62, 'aabout-create'),
(65, 'aabout-delete'),
(63, 'aabout-edit'),
(64, 'aabout-update'),
(43, 'aagenda'),
(44, 'aagenda-create'),
(47, 'aagenda-delete'),
(45, 'aagenda-edit'),
(46, 'aagenda-update'),
(133, 'ajurusan'),
(134, 'ajurusan-create'),
(137, 'ajurusan-delete'),
(135, 'ajurusan-edit'),
(136, 'ajurusan-update'),
(17, 'akelas'),
(18, 'akelas-create'),
(19, 'akelas-delete'),
(20, 'akelas-edit'),
(21, 'akelas-update'),
(66, 'albums'),
(67, 'albums-create'),
(68, 'albums-delete'),
(70, 'albums-edit'),
(69, 'albums-update'),
(138, 'aosis'),
(139, 'aosis-create'),
(140, 'aosis-delete'),
(142, 'aosis-edit'),
(141, 'aosis-update'),
(38, 'apengumuman'),
(39, 'apengumuman-create'),
(40, 'apengumuman-delete'),
(41, 'apengumuman-edit'),
(42, 'apengumuman-update'),
(99, 'aprofile'),
(103, 'aprofile-create'),
(102, 'aprofile-delete'),
(100, 'aprofile-edit'),
(101, 'aprofile-update'),
(57, 'asejarah'),
(60, 'asejarah-delete'),
(58, 'asejarah-edit'),
(59, 'asejarah-update'),
(76, 'avideo'),
(77, 'avideo-create'),
(80, 'avideo-delete'),
(78, 'avideo-edit'),
(79, 'avideo-update'),
(8, 'categories'),
(37, 'commenst'),
(7, 'delete-comments'),
(11, 'delete-users'),
(23, 'download'),
(24, 'download-create'),
(25, 'download-delete'),
(26, 'download-update'),
(118, 'ekstra'),
(119, 'ekstra-create'),
(122, 'ekstra-delete'),
(120, 'ekstra-edit'),
(121, 'ekstra-update'),
(86, 'fav'),
(87, 'fav-edit'),
(88, 'fav-update'),
(71, 'fotos'),
(72, 'fotos-create'),
(73, 'fotos-delete'),
(74, 'fotos-edit'),
(75, 'fotos-update'),
(32, 'guru'),
(33, 'guru-create'),
(34, 'guru-delete'),
(35, 'guru-edit'),
(36, 'guru-update'),
(94, 'im'),
(95, 'im-create'),
(98, 'im-delete'),
(96, 'im-edit'),
(97, 'im-update'),
(109, 'inbox'),
(111, 'inbox-delete'),
(110, 'inbox-edit'),
(112, 'inbox-update'),
(81, 'meta'),
(83, 'meta-create'),
(85, 'meta-delete'),
(82, 'meta-edit'),
(84, 'meta-update'),
(12, 'pengguna'),
(14, 'pengguna-create'),
(15, 'pengguna-delete'),
(13, 'pengguna-edit'),
(22, 'pengguna-pw'),
(16, 'pengguna-update'),
(10, 'permissions'),
(143, 'ph'),
(146, 'ph-create'),
(148, 'ph-delete'),
(144, 'ph-edit'),
(147, 'ph-store'),
(145, 'ph-update'),
(116, 'posts'),
(1, 'posts-create'),
(3, 'posts-delete'),
(2, 'posts-update'),
(117, 'profiles'),
(114, 'profiles-edit'),
(113, 'profiles-show'),
(115, 'profiles-update'),
(9, 'roles'),
(123, 'sambutan'),
(127, 'sambutan-create'),
(126, 'sambutan-delete'),
(124, 'sambutan-edit'),
(125, 'sambutan-update'),
(128, 'sarana'),
(131, 'sarana-delete'),
(132, 'sarana-deletemultiple'),
(129, 'sarana-edit'),
(130, 'sarana-update'),
(27, 'siswa'),
(28, 'siswa-create'),
(29, 'siswa-delete'),
(30, 'siswa-edit'),
(31, 'siswa-update'),
(104, 'slider'),
(105, 'slider-create'),
(108, 'slider-delete'),
(106, 'slider-edit'),
(107, 'slider-update'),
(89, 'sosmed'),
(90, 'sosmed-create'),
(93, 'sosmed-delete'),
(91, 'sosmed-edit'),
(92, 'sosmed-update'),
(48, 'testimoni'),
(49, 'testimoni-create'),
(52, 'testimoni-delete'),
(50, 'testimoni-edit'),
(51, 'testimoni-update'),
(6, 'update-comments'),
(4, 'update-users'),
(53, 'vm'),
(56, 'vm-delete'),
(54, 'vm-edit'),
(55, 'vm-update');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(1, 2),
(2, 2),
(3, 2),
(1, 3),
(2, 3),
(3, 3),
(1, 4),
(2, 4),
(1, 6),
(2, 6),
(3, 6),
(1, 7),
(2, 7),
(3, 7),
(1, 8),
(2, 8),
(1, 9),
(1, 10),
(1, 11),
(2, 11),
(1, 12),
(2, 12),
(3, 12),
(1, 13),
(1, 14),
(2, 14),
(1, 15),
(1, 16),
(2, 16),
(1, 17),
(2, 17),
(1, 18),
(2, 18),
(1, 19),
(2, 19),
(1, 20),
(2, 20),
(1, 21),
(2, 21),
(1, 22),
(1, 23),
(2, 23),
(1, 24),
(2, 24),
(1, 25),
(2, 25),
(1, 26),
(2, 26),
(1, 27),
(2, 27),
(1, 28),
(2, 28),
(1, 29),
(2, 29),
(1, 30),
(2, 30),
(1, 31),
(2, 31),
(1, 32),
(2, 32),
(1, 33),
(2, 33),
(1, 34),
(2, 34),
(1, 35),
(2, 35),
(1, 36),
(2, 36),
(1, 37),
(2, 37),
(3, 37),
(1, 38),
(2, 38),
(1, 39),
(2, 39),
(1, 40),
(2, 40),
(1, 41),
(2, 41),
(1, 42),
(2, 42),
(1, 43),
(2, 43),
(1, 44),
(2, 44),
(1, 45),
(2, 45),
(1, 46),
(2, 46),
(1, 47),
(2, 47),
(1, 48),
(2, 48),
(1, 49),
(2, 49),
(1, 50),
(2, 50),
(1, 51),
(2, 51),
(1, 52),
(2, 52),
(1, 53),
(2, 53),
(1, 54),
(2, 54),
(1, 55),
(2, 55),
(1, 56),
(2, 56),
(1, 57),
(2, 57),
(1, 58),
(2, 58),
(1, 59),
(2, 59),
(1, 60),
(2, 60),
(1, 61),
(2, 61),
(1, 62),
(2, 62),
(1, 63),
(2, 63),
(1, 64),
(2, 64),
(1, 65),
(2, 65),
(1, 66),
(2, 66),
(1, 67),
(2, 67),
(1, 68),
(2, 68),
(1, 69),
(2, 69),
(1, 70),
(2, 70),
(1, 71),
(2, 71),
(1, 72),
(2, 72),
(1, 73),
(2, 73),
(1, 74),
(2, 74),
(1, 75),
(2, 75),
(1, 76),
(2, 76),
(1, 77),
(2, 77),
(1, 78),
(2, 78),
(1, 79),
(2, 79),
(1, 80),
(2, 80),
(1, 81),
(1, 82),
(1, 83),
(1, 84),
(1, 85),
(1, 86),
(2, 86),
(1, 87),
(2, 87),
(1, 88),
(2, 88),
(1, 89),
(2, 89),
(1, 90),
(2, 90),
(1, 91),
(2, 91),
(1, 92),
(2, 92),
(1, 93),
(2, 93),
(1, 94),
(2, 94),
(1, 95),
(2, 95),
(1, 96),
(2, 96),
(1, 97),
(2, 97),
(1, 98),
(2, 98),
(1, 99),
(2, 99),
(1, 100),
(2, 100),
(1, 101),
(2, 101),
(1, 102),
(2, 102),
(1, 103),
(2, 103),
(1, 104),
(2, 104),
(1, 105),
(2, 105),
(1, 106),
(2, 106),
(1, 107),
(2, 107),
(1, 108),
(2, 108),
(1, 109),
(2, 109),
(1, 110),
(2, 110),
(1, 111),
(2, 111),
(1, 112),
(2, 112),
(1, 113),
(2, 113),
(3, 113),
(1, 114),
(2, 114),
(1, 115),
(2, 115),
(3, 115),
(1, 116),
(2, 116),
(3, 116),
(1, 117),
(2, 117),
(3, 117),
(1, 118),
(2, 118),
(1, 119),
(2, 119),
(1, 120),
(2, 120),
(1, 121),
(2, 121),
(1, 122),
(2, 122),
(1, 123),
(2, 123),
(1, 124),
(2, 124),
(1, 125),
(2, 125),
(1, 126),
(2, 126),
(1, 127),
(2, 127),
(1, 128),
(2, 128),
(1, 129),
(2, 129),
(1, 130),
(2, 130),
(1, 131),
(2, 131),
(1, 132),
(2, 132),
(1, 133),
(2, 133),
(1, 134),
(2, 134),
(1, 135),
(2, 135),
(1, 136),
(2, 136),
(1, 137),
(2, 137),
(1, 138),
(2, 138),
(1, 139),
(2, 139),
(1, 140),
(2, 140),
(1, 141),
(2, 141),
(1, 142),
(2, 142),
(1, 143),
(2, 143),
(1, 144),
(2, 144),
(1, 145),
(2, 145),
(1, 146),
(2, 146),
(1, 147),
(2, 147),
(1, 148),
(2, 148);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ph`
--

CREATE TABLE `ph` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ph`
--

INSERT INTO `ph` (`id`, `body`, `created_at`, `updated_at`) VALUES
(1, '<p>PPDB 2021 Telah Dibuka !!!</p>', '2021-04-15 12:57:20', '2021-04-15 12:57:20'),
(2, '<p>Selamat menunaikan Ibadah Puasa 1442H</p>', '2021-04-15 12:57:43', '2021-04-15 12:57:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `views_today` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `weekly_views` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `alias`, `img`, `content`, `views`, `views_today`, `weekly_views`, `created_at`, `updated_at`) VALUES
(5, 1, 'Why do we use it?', 'why-do-we-use-it', NULL, '<p>Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h4>Why do we use it?</h4>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', 4, 0, 0, '2021-04-16 10:58:19', '2021-04-16 12:02:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ppdb`
--

CREATE TABLE `ppdb` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `aktif` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ppdb`
--

INSERT INTO `ppdb` (`id`, `title`, `alias`, `body`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'PPDB TA 2021-2022', 'ppdb-ta-2021-2022', 'https://forms.gle/Ycy8jaG3pKZC9n1c7', '1', NULL, '2021-04-16 11:36:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(3, 'author'),
(2, 'operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sambutan`
--

CREATE TABLE `sambutan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sambutan`
--

INSERT INTO `sambutan` (`id`, `title`, `deskripsi`, `photo`, `tanggal`) VALUES
(1, 'Welcome', 'Kami Menyambut baik terbitnya Website MSCHOOL yang baru , dengan harapan dipublikasinya website ini\r\nsekolah berharap : Peningkatan layanan pendidikan kepada siswa, orangtua, dan masyarakat pada\r\numumnya semakin meningkat.', '1614935997.jpg', '2021-03-05 09:19:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sarana`
--

CREATE TABLE `sarana` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sarana`
--

INSERT INTO `sarana` (`id`, `title`, `img`, `ket`, `created_at`, `updated_at`) VALUES
(1, 'Lab Komputer', '1618517115.jpg', NULL, '2021-04-15 13:05:16', '2021-04-15 13:05:16'),
(2, 'Perpustakaan', '1618517132.jpg', NULL, '2021-04-15 13:05:32', '2021-04-15 13:05:32'),
(3, 'Mesjid', '1618517147.jpeg', NULL, '2021-04-15 13:05:47', '2021-04-15 13:05:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sejarah`
--

CREATE TABLE `sejarah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sejarah`
--

INSERT INTO `sejarah` (`id`, `title`, `deskripsi`, `foto`, `tanggal`) VALUES
(1, 'Sejarah Sekolah Kami', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', NULL, '2021-04-15 20:04:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenkel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `kelas_id`, `nama`, `nis`, `alamat`, `telp`, `jenkel`, `photo`, `tgl_lahir`, `created_at`, `updated_at`) VALUES
(1, 1, 'ABC', '987654321', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43359', '1234567892', 'L', NULL, '1997-09-27', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(2, 2, 'ABCD', '987654322', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43360', '1234567893', 'P', NULL, '2009-02-18', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(3, 3, 'ABCE', '987654323', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43361', '1234567894', 'L', NULL, '1995-09-16', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(4, 1, 'ABCF', '987654324', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43362', '1234567895', 'P', NULL, '1990-09-20', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(5, 2, 'ABCG', '987654325', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43363', '1234567896', 'L', NULL, '1997-09-21', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(6, 3, 'ABCH', '987654326', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43364', '1234567897', 'P', NULL, '1997-09-22', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(7, 1, 'ABCI', '987654327', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43365', '1234567898', 'L', NULL, '1997-09-23', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(8, 2, 'ABCJ', '987654328', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43366', '1234567899', 'P', NULL, '1997-09-24', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(9, 3, 'ABCK', '987654329', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43367', '1234567900', 'L', NULL, '1997-09-25', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(10, 1, 'ABCL', '987654330', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43368', '1234567901', 'P', NULL, '1997-09-26', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(11, 2, 'ABC', '987654331', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43359', '1234567892', 'L', NULL, '1997-09-27', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(12, 3, 'ABCD', '987654332', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43360', '1234567893', 'P', NULL, '2009-02-18', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(13, 1, 'ABCE', '987654333', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43361', '1234567894', 'L', NULL, '1995-09-16', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(14, 2, 'ABCF', '987654334', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43362', '1234567895', 'P', NULL, '1990-09-20', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(15, 3, 'ABCG', '987654335', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43363', '1234567896', 'L', NULL, '1997-09-21', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(16, 1, 'ABCH', '987654336', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43364', '1234567897', 'P', NULL, '1997-09-22', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(17, 2, 'ABCI', '987654337', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43365', '1234567898', 'L', NULL, '1997-09-23', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(18, 3, 'ABCJ', '987654338', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43366', '1234567899', 'P', NULL, '1997-09-24', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(19, 1, 'ABCK', '987654339', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43367', '1234567900', 'L', NULL, '1997-09-25', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(20, 2, 'ABCL', '987654340', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43368', '1234567901', 'P', NULL, '1997-09-26', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(21, 3, 'ABC', '987654341', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43359', '1234567892', 'L', NULL, '1997-09-27', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(22, 1, 'ABCD', '987654342', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43360', '1234567893', 'P', NULL, '2009-02-18', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(23, 2, 'ABCE', '987654343', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43361', '1234567894', 'L', NULL, '1995-09-16', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(24, 3, 'ABCF', '987654344', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43362', '1234567895', 'P', NULL, '1990-09-20', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(25, 1, 'ABCG', '987654345', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43363', '1234567896', 'L', NULL, '1997-09-21', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(26, 2, 'ABCH', '987654346', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43364', '1234567897', 'P', NULL, '1997-09-22', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(27, 3, 'ABCI', '987654347', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43365', '1234567898', 'L', NULL, '1997-09-23', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(28, 1, 'ABCJ', '987654348', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43366', '1234567899', 'P', NULL, '1997-09-24', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(29, 2, 'ABCK', '987654349', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43367', '1234567900', 'L', NULL, '1997-09-25', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(30, 3, 'ABCL', '987654350', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43368', '1234567901', 'P', NULL, '1997-09-26', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(31, 1, 'ABC', '987654351', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43359', '1234567892', 'L', NULL, '1997-09-27', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(32, 2, 'ABCD', '987654352', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43360', '1234567893', 'P', NULL, '2009-02-18', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(33, 3, 'ABCE', '987654353', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43361', '1234567894', 'L', NULL, '1995-09-16', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(34, 1, 'ABCF', '987654354', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43362', '1234567895', 'P', NULL, '1990-09-20', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(35, 2, 'ABCG', '987654355', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43363', '1234567896', 'L', NULL, '1997-09-21', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(36, 3, 'ABCH', '987654356', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43364', '1234567897', 'P', NULL, '1997-09-22', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(37, 1, 'ABCI', '987654357', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43365', '1234567898', 'L', NULL, '1997-09-23', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(38, 2, 'ABCJ', '987654358', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43366', '1234567899', 'P', NULL, '1997-09-24', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(39, 3, 'ABCK', '987654359', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43367', '1234567900', 'L', NULL, '1997-09-25', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(40, 1, 'ABCL', '987654360', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43368', '1234567901', 'P', NULL, '1997-09-26', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(41, 2, 'ABC', '987654361', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43359', '1234567892', 'L', NULL, '1997-09-27', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(42, 3, 'ABCD', '987654362', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43360', '1234567893', 'P', NULL, '2009-02-18', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(43, 1, 'ABCE', '987654363', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43361', '1234567894', 'L', NULL, '1995-09-16', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(44, 2, 'ABCF', '987654364', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43362', '1234567895', 'P', NULL, '1990-09-20', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(45, 3, 'ABCG', '987654365', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43363', '1234567896', 'L', NULL, '1997-09-21', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(46, 1, 'ABCH', '987654366', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43364', '1234567897', 'P', NULL, '1997-09-22', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(47, 2, 'ABCI', '987654367', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43365', '1234567898', 'L', NULL, '1997-09-23', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(48, 3, 'ABCJ', '987654368', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43366', '1234567899', 'P', NULL, '1997-09-24', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(49, 1, 'ABCK', '987654369', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43367', '1234567900', 'L', NULL, '1997-09-25', '2021-04-15 12:51:57', '2021-04-15 12:51:57'),
(50, 2, 'ABCL', '987654370', 'kp.cicewol rt/rw 003/001 desa.mekarsari kec.cicurug kab.sukabumi 43368', '1234567901', 'P', NULL, '1997-09-26', '2021-04-15 12:51:57', '2021-04-15 12:51:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn` enum('y','n') COLLATE utf8mb4_unicode_ci DEFAULT 'n',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id`, `title`, `deskripsi`, `img`, `btn`, `created_at`, `updated_at`) VALUES
(1, 'PPDB TA 2021-2022 TELAH DIBUKA', '<p>Lorem Ipsum&nbsp;adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.&nbsp;</p>', '1618517574.jpg', 'y', '2021-04-15 13:12:55', '2021-04-15 13:12:55'),
(2, 'Why do we use it?', '<p>Lorem Ipsum&nbsp;adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.&nbsp;</p>', '1618517622.jpg', 'n', '2021-04-15 13:13:43', '2021-04-16 11:53:03'),
(3, 'Lagu Indonesia Raya', '<p>Lorem Ipsum&nbsp;adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.&nbsp;</p>', '1618517651.jpg', NULL, '2021-04-15 13:14:11', '2021-04-15 13:14:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sosmed`
--

CREATE TABLE `sosmed` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ig` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sosmed`
--

INSERT INTO `sosmed` (`id`, `fb`, `ig`, `twitter`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com/irvhan.cievhan/', 'https://www.instagram/irvansc', 'https://www.twitter/irvansc', NULL, '2021-02-24 17:43:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id`, `nama`, `pesan`, `ket`, `foto`, `tanggal`) VALUES
(1, 'irvan maulana,S.Pd', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.', 'Siswa Terbaik 2019', '1618516846.jpg', '2021-04-15 20:00:47'),
(2, 'Sundani, S.Pd', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting.', 'Siswa Terbaik 2019', '1618516870.jpg', '2021-04-15 20:01:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenkel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `telp`, `jenkel`, `image`, `alamat`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Irvan maulana', 'admin@gmail.com', '2021-04-15 19:18:45', '085211023570', 'L', '1618515087.jpg', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2021-04-15 19:18:45', '2021-04-15 12:31:27'),
(2, 'Dede Irvan', 'operator@gmail.com', '2021-04-15 19:19:38', NULL, 'L', '1618596175.jpg', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2021-04-15 19:19:38', '2021-04-16 11:02:55'),
(3, 'Dede', 'author@gmail.com', '2021-04-15 19:20:12', NULL, NULL, NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '2021-04-15 19:20:12', '2021-04-15 19:20:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `video`
--

INSERT INTO `video` (`id`, `title`, `url`, `tanggal`) VALUES
(1, 'Video 1', 'https://www.youtube.com/embed/YYfPxVvOakc', '2021-04-15 20:09:15'),
(2, 'Video 2', 'https://www.youtube.com/embed/4eKN_H-iavM', '2021-04-15 20:10:48'),
(3, 'coba 2', 'https://www.youtube.com/embed/YYfPxVvOakc', '2021-04-16 18:44:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vimi`
--

CREATE TABLE `vimi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `misi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` text COLLATE utf8mb4_unicode_ci,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vimi`
--

INSERT INTO `vimi` (`id`, `visi`, `misi`, `tujuan`, `tanggal`) VALUES
(1, 'Lorem Ipsum adalah contoh teks atau dummy dalam industri percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah buku contoh huruf. ', 'Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', 'Ia tidak hanya bertahan selama 5 abad, tapi juga telah beralih ke penataan huruf elektronik, tanpa ada perubahan apapun. Ia mulai dipopulerkan pada tahun 1960 dengan diluncurkannya lembaran-lembaran Letraset yang menggunakan kalimat-kalimat dari Lorem Ipsum, dan seiring munculnya perangkat lunak Desktop Publishing seperti Aldus PageMaker juga memiliki versi Lorem Ipsum.', '2021-02-24 08:32:03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_alias_unique` (`alias`);

--
-- Indeks untuk tabel `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`category_id`,`post_id`),
  ADD KEY `category_post_post_id_foreign` (`post_id`);

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ekstra`
--
ALTER TABLE `ekstra`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ektras`
--
ALTER TABLE `ektras`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `foot`
--
ALTER TABLE `foot`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foto_user_id_foreign` (`user_id`),
  ADD KEY `foto_album_id_foreign` (`album_id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guru_nip_unique` (`nip`),
  ADD KEY `guru_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `image_fron`
--
ALTER TABLE `image_fron`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `image_web`
--
ALTER TABLE `image_web`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kelas_alias_unique` (`alias`);

--
-- Indeks untuk tabel `meta`
--
ALTER TABLE `meta`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `osis`
--
ALTER TABLE `osis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengumuman_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indeks untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Indeks untuk tabel `ph`
--
ALTER TABLE `ph`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_alias_unique` (`alias`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `ppdb`
--
ALTER TABLE `ppdb`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indeks untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `sambutan`
--
ALTER TABLE `sambutan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sarana`
--
ALTER TABLE `sarana`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sejarah`
--
ALTER TABLE `sejarah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_nis_unique` (`nis`),
  ADD KEY `siswa_kelas_id_foreign` (`kelas_id`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sosmed`
--
ALTER TABLE `sosmed`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vimi`
--
ALTER TABLE `vimi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `download`
--
ALTER TABLE `download`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ekstra`
--
ALTER TABLE `ekstra`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ektras`
--
ALTER TABLE `ektras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `foot`
--
ALTER TABLE `foot`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `image_fron`
--
ALTER TABLE `image_fron`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `image_web`
--
ALTER TABLE `image_web`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `meta`
--
ALTER TABLE `meta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `osis`
--
ALTER TABLE `osis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT untuk tabel `ph`
--
ALTER TABLE `ph`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ppdb`
--
ALTER TABLE `ppdb`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sambutan`
--
ALTER TABLE `sambutan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sarana`
--
ALTER TABLE `sarana`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sejarah`
--
ALTER TABLE `sejarah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sosmed`
--
ALTER TABLE `sosmed`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `video`
--
ALTER TABLE `video`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `vimi`
--
ALTER TABLE `vimi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `category_post`
--
ALTER TABLE `category_post`
  ADD CONSTRAINT `category_post_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`),
  ADD CONSTRAINT `foto_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
