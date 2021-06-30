-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Jun 2021 pada 18.09
-- Versi server: 10.3.28-MariaDB-cll-lve
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1472693_babeshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about_page`
--

CREATE TABLE `about_page` (
  `id` int(11) NOT NULL,
  `judul1` text NOT NULL,
  `judul2` text NOT NULL,
  `subjudul2` text NOT NULL,
  `isi1` text NOT NULL,
  `isi_pilihan1_2` text NOT NULL,
  `isi_pilihan2_2` text NOT NULL,
  `isi_pilihan3_2` text NOT NULL,
  `isi_pilihan4_2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `about_page`
--

INSERT INTO `about_page` (`id`, `judul1`, `judul2`, `subjudul2`, `isi1`, `isi_pilihan1_2`, `isi_pilihan2_2`, `isi_pilihan3_2`, `isi_pilihan4_2`) VALUES
(1, 'Tentang Kami', 'Keunggulan', '~', 'Babeshop adalah sebuah web aplikasi yang bertemakan barbershop online dimana website ini memiliki 2(dua) sudut pandang yaitu guest dan admin. Yang pertama, Sudut pandang dari guest(Tamu) terhadap babeshop ini adalah sebuah platform yang memudahkan melakukan booking jasa barber dengan 2(dua) pilihan yaitu pelanggan datang langsung ke barbershop atau barber datang kerumah pelanggan. \r\nYang kedua, Sudut pandang admin terhadap babeshop yaitu sebagai panel control terhadap web aplikasi babeshop karena pada admin panel mempunyai hak untuk mengontrol semua elemen web aplikasi babeshop, dimulai dari monitoring system, monitoring pemasukan, menambah barber, menambah foto pada galeri dll. Di admin panel juga kita bisa mengubah kode verifikasi booking dan mengubah elemen tulisan pada website babeshop.', 'Servis Pasti Memuaskan Anda', 'Menggunakan peralatan yang berkualitas tinggi', 'Menggunakan bahan yang aman untuk anda', 'Kenyamanan anda adalah prioritas kami');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barber_page`
--

CREATE TABLE `barber_page` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barber_page`
--

INSERT INTO `barber_page` (`id`, `judul`, `isi`) VALUES
(1, 'Barbers', 'Barber pilihan kami');

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking_page`
--

CREATE TABLE `booking_page` (
  `id` int(11) NOT NULL,
  `judul1` text NOT NULL,
  `judul2` text NOT NULL,
  `isi1` text NOT NULL,
  `isi2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `booking_page`
--

INSERT INTO `booking_page` (`id`, `judul1`, `judul2`, `isi1`, `isi2`) VALUES
(1, 'Barber', 'Servis', 'Pilih Barbermu', 'Pilih layanan yang diinginkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact_page`
--

CREATE TABLE `contact_page` (
  `id` int(11) NOT NULL,
  `judul1` text NOT NULL,
  `judul2` text NOT NULL,
  `judul3` text NOT NULL,
  `isi1` text NOT NULL,
  `isi2` text NOT NULL,
  `isi3` text NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `contact_page`
--

INSERT INTO `contact_page` (`id`, `judul1`, `judul2`, `judul3`, `isi1`, `isi2`, `isi3`, `lat`, `lng`) VALUES
(1, 'Alamat', 'Telepon', 'Email', 'Jl. Ringroad Selatan, Kragilan, Tamanan, Kec. Banguntapan, Bantul, Daerah Istimewa Yogyakarta 55191', '+62274511830', 'info@uad.ac.id', '-7.833927358168563', '110.3832274772938');

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `tukang_cukur_id` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`id`, `tukang_cukur_id`, `feedback`, `contact`, `rating`, `date`) VALUES
(1, 1, 'Ntapss', 'Anon', 5, '2021-05-26'),
(2, 1, 'CUIH!!!', 'Anon', 1, '2021-05-26'),
(3, 2, 'Mantap Kali ini mbak siti!', 'Redho Harli', 5, '2021-06-17'),
(4, 1, 'MANTAP BG!', 'Alex', 5, '2021-06-17'),
(5, 3, 'mantappp mas panji nihhh', '0843295353342', 5, '2021-06-24'),
(6, 4, 'asikk asikk josss', '08543552343', 3, '2021-06-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback_page`
--

CREATE TABLE `feedback_page` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `feedback_page`
--

INSERT INTO `feedback_page` (`id`, `judul`, `isi`) VALUES
(1, 'Feedback', 'Berikan Ratingmu untuk barber kami');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `img`, `keterangan`) VALUES
(1, '1622045402.1619081495.g1.jpg', 'a1'),
(2, '1622045415.1619081495.g1.jpg', 'A2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galery_page`
--

CREATE TABLE `galery_page` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galery_page`
--

INSERT INTO `galery_page` (`id`, `judul`, `isi`) VALUES
(1, 'Gallery', 'Koleksi Foto Kami');

-- --------------------------------------------------------

--
-- Struktur dari tabel `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `home`
--

INSERT INTO `home` (`id`, `judul`, `isi`) VALUES
(1, 'Home', 'SELAMAT DATANG DI APLIKASI BABESHOP \r\nby Team TangObeng');

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
(1, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `pesanan` varchar(255) NOT NULL,
  `tanggal_memesan` datetime NOT NULL,
  `tukang_cukur` varchar(255) NOT NULL,
  `total_biaya` decimal(10,0) NOT NULL,
  `status_pesanan` int(11) NOT NULL,
  `panggil` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `nope` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama_pemesan`, `pesanan`, `tanggal_memesan`, `tukang_cukur`, `total_biaya`, `status_pesanan`, `panggil`, `alamat`, `nope`) VALUES
(5, 'Surip', 'Cukur', '2021-06-17 07:00:00', '2', 50000, 1, 0, '-', '-'),
(6, 'Alex', 'Cuci Rambut', '2021-06-24 07:00:00', '1', 15000, 1, 0, '-', '-'),
(7, 'Redok', 'Cukur', '2021-06-21 07:00:00', '1', 50000, 1, 0, '-', '-'),
(8, 'Kevin', 'Cukur ,Cuci Rambut', '2021-06-17 19:00:00', '2', 65000, 1, 0, '-', '-'),
(9, 'irfan', 'Cukur Brewok', '2021-06-28 07:00:00', '1', 10000, 1, 0, '-', '-'),
(10, 'hesqial', 'Cukur, Cukur Brewok', '2021-06-29 19:00:00', '1', 60000, 1, 0, '-', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pricing_page`
--

CREATE TABLE `pricing_page` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pricing_page`
--

INSERT INTO `pricing_page` (`id`, `judul`, `isi`) VALUES
(1, 'Daftar Harga', 'Pilih Layanan yang ada inginkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `servis`
--

CREATE TABLE `servis` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `servis`
--

INSERT INTO `servis` (`id`, `nama`, `harga`) VALUES
(1, 'Cukur', 50000),
(2, 'Cuci Rambut', 15000),
(3, 'Cukur Brewok', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sosmed`
--

CREATE TABLE `sosmed` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `jenis_sosmed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sosmed`
--

INSERT INTO `sosmed` (`id`, `link`, `jenis_sosmed`) VALUES
(3, 'instagram.com/parmatika.tif/?hl=en', 'instagram');

-- --------------------------------------------------------

--
-- Struktur dari tabel `time`
--

CREATE TABLE `time` (
  `id` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `time`
--

INSERT INTO `time` (`id`, `time`) VALUES
(1, '07:00:00'),
(2, '19:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tukang_cukur`
--

CREATE TABLE `tukang_cukur` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelamin` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `pesanan` int(11) NOT NULL,
  `total_feedback` int(11) NOT NULL,
  `total_rating` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tukang_cukur`
--

INSERT INTO `tukang_cukur` (`id`, `nama`, `kelamin`, `img`, `pesanan`, `total_feedback`, `total_rating`, `rating`) VALUES
(1, 'Redho Harli Saputra', 'Laki-Laki', '1624550965_Screenshot_2.png', 4, 3, 11, 4),
(2, 'Tri Fungsihono', 'Laki-Laki', '1624551259_WhatsApp Image 2021-06-24 at 23.13.48.jpeg', 3, 1, 5, 5),
(3, 'Nurkholis Panji Saputra', 'Laki-Laki', '1624550679_Screenshot_1.png', 0, 1, 5, 5),
(4, 'Fuqqha Rahmad Illahiansyah', 'Laki-Laki', '1624550560_107835002_1539955156186351_8488643838786653554_o.jpg', 0, 1, 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$RFer386OsfLyX2.g8n04yO96GLjfvdfNNeA/qT2oZqLsqwnrGZPS6', NULL, '2021-06-17 03:08:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `verify_number`
--

CREATE TABLE `verify_number` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `verify_number`
--

INSERT INTO `verify_number` (`id`, `code`) VALUES
(1, 'babeshop2021');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about_page`
--
ALTER TABLE `about_page`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barber_page`
--
ALTER TABLE `barber_page`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `booking_page`
--
ALTER TABLE `booking_page`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contact_page`
--
ALTER TABLE `contact_page`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `feedback_page`
--
ALTER TABLE `feedback_page`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galery_page`
--
ALTER TABLE `galery_page`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pricing_page`
--
ALTER TABLE `pricing_page`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sosmed`
--
ALTER TABLE `sosmed`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tukang_cukur`
--
ALTER TABLE `tukang_cukur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `verify_number`
--
ALTER TABLE `verify_number`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about_page`
--
ALTER TABLE `about_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `barber_page`
--
ALTER TABLE `barber_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `booking_page`
--
ALTER TABLE `booking_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `contact_page`
--
ALTER TABLE `contact_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `feedback_page`
--
ALTER TABLE `feedback_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `galery_page`
--
ALTER TABLE `galery_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pricing_page`
--
ALTER TABLE `pricing_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `servis`
--
ALTER TABLE `servis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sosmed`
--
ALTER TABLE `sosmed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `time`
--
ALTER TABLE `time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tukang_cukur`
--
ALTER TABLE `tukang_cukur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `verify_number`
--
ALTER TABLE `verify_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
