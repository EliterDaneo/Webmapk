-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 03, 2021 at 09:20 PM
-- Server version: 10.3.30-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mapkngalian`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` int(11) NOT NULL,
  `judul_berita` varchar(255) DEFAULT NULL,
  `slug_berita` varchar(255) DEFAULT NULL,
  `isi_berita` text DEFAULT NULL,
  `gambar_berita` text DEFAULT NULL,
  `tanggal_berita` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `judul_berita`, `slug_berita`, `isi_berita`, `gambar_berita`, `tanggal_berita`, `id_user`) VALUES
(1, 'wakanda forefer together and mother', '', '<p>A PHP Error was encountered</p>\r\n\r\n<p>Severity: Notice</p>\r\n\r\n<p>Message: Undefined variable: isi_berita</p>\r\n\r\n<p>Filename: pengaturanberita/editberita.php</p>\r\n\r\n<p>Line Number: 60</p>\r\n\r\n<p>Backtrace:</p>\r\n\r\n<p>File: C:\\xampp\\htdocs\\MAPKNEW\\application\\views\\admin\\master\\pengaturanberita\\editberita.php<br />\r\nLine: 60<br />\r\nFunction: _error_handler</p>\r\n\r\n<p>File: C:\\xampp\\htdocs\\MAPKNEW\\application\\views\\admin\\layout\\v_content.php<br />\r\nLine: 3<br />\r\nFunction: view</p>\r\n\r\n<p>File: C:\\xampp\\htdocs\\MAPKNEW\\application\\views\\admin\\layout\\v_wrapper.php<br />\r\nLine: 5<br />\r\nFunction: require_once</p>\r\n\r\n<p>File: C:\\xampp\\htdocs\\MAPKNEW\\application\\controllers\\Admin.php<br />\r\nLine: 1332<br />\r\nFunction: view</p>\r\n\r\n<p>File: C:\\xampp\\htdocs\\MAPKNEW\\index.php<br />\r\nLine: 315<br />\r\nFunction: require_once</p>\r\n\r\n<p>A PHP Error was encountered</p>\r\n\r\n<p>Severity: Notice</p>\r\n\r\n<p>Message: Trying to get property &#39;isi_berita&#39; of non-object</p>\r\n\r\n<p>Filename: pengaturanberita/editberita.php</p>\r\n\r\n<p>Line Number: 60</p>\r\n\r\n<p>Backtrace:</p>\r\n\r\n<p>File: C:\\xampp\\htdocs\\MAPKNEW\\application\\views\\admin\\master\\pengaturanberita\\editberita.php<br />\r\nLine: 60<br />\r\nFunction: _error_handler</p>\r\n\r\n<p>File: C:\\xampp\\htdocs\\MAPKNEW\\application\\views\\admin\\layout\\v_content.php<br />\r\nLine: 3<br />\r\nFunction: view</p>\r\n\r\n<p>File: C:\\xampp\\htdocs\\MAPKNEW\\application\\views\\admin\\layout\\v_wrapper.php<br />\r\nLine: 5<br />\r\nFunction: require_once</p>\r\n\r\n<p>File: C:\\xampp\\htdocs\\MAPKNEW\\application\\controllers\\Admin.php<br />\r\nLine: 1332<br />\r\nFunction: view</p>\r\n\r\n<p>File: C:\\xampp\\htdocs\\MAPKNEW\\index.php<br />\r\nLine: 315<br />\r\nFunction: require_once</p>\r\n', 'guru123555.png', '2021-07-24 07:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_download`
--

CREATE TABLE `tbl_download` (
  `id_file` int(11) NOT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file`
--

CREATE TABLE `tbl_file` (
  `id_file` int(11) NOT NULL,
  `nama_file` varchar(255) DEFAULT NULL,
  `ket_file` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_file`
--

INSERT INTO `tbl_file` (`id_file`, `nama_file`, `ket_file`, `file`) VALUES
(2, 'bagas31', 'yang maha esa', 'TIK_Kelas_7__Bab_1__Teknologi_Informasi_dan_Komunikasi-dikonversi1.pptx'),
(3, 'apk tool', 'yang maha esa', 'JADWAL_PELAJARAN_PAKET_C_DAN_B.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_foto`
--

CREATE TABLE `tbl_foto` (
  `id_foto` int(11) NOT NULL,
  `id_galery` int(11) NOT NULL,
  `ket_foto` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_foto`
--

INSERT INTO `tbl_foto` (`id_foto`, `id_galery`, `ket_foto`, `foto`) VALUES
(0, 3, 'admin', 'guru123555.png'),
(0, 3, 'bomin', 'guru1235551.png'),
(0, 3, 'maya', 'wallpaperflare_com_wallpaper.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_galery`
--

CREATE TABLE `tbl_galery` (
  `id_galery` int(11) NOT NULL,
  `nama_galery` varchar(255) DEFAULT NULL,
  `sampul` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_galery`
--

INSERT INTO `tbl_galery` (`id_galery`, `nama_galery`, `sampul`) VALUES
(1, 'Sampul Majalah', 'guru123555.png'),
(2, 'Sampul Majalah', 'guru1235551.png'),
(3, 'Sampul Majalah', 'guru1235552.png'),
(5, 'Sampul Majalah 12', 'simple-simple-background-minimalism-black-background-wallpaper-preview.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` int(11) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `nama_guru` varchar(25) DEFAULT NULL,
  `tempat_lahir` varchar(15) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `id_mapel` int(2) DEFAULT NULL,
  `pendidikan` varchar(5) DEFAULT NULL,
  `foto_guru` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `nik`, `nama_guru`, `tempat_lahir`, `tanggal_lahir`, `id_mapel`, `pendidikan`, `foto_guru`) VALUES
(1, '123456', 'maymunah', 'wonosono', '1997-12-01', 7, 'S1', 'guru.jpg'),
(3, '42353251', 'jembrong', 'Wonosobo', '1996-01-07', 2, 'S1', 'en_voyage_by_ekster11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `wali_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `jenis_kelas` enum('X','XI','XII') NOT NULL,
  `total_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `wali_kelas`, `nama_kelas`, `jenis_kelas`, `total_siswa`) VALUES
(1, 3, 'IPA 1', 'X', 111),
(2, 1, 'IPS 1', 'X', 120);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logo`
--

CREATE TABLE `tbl_logo` (
  `id_logo` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_logo`
--

INSERT INTO `tbl_logo` (`id_logo`, `logo`, `nama_sekolah`) VALUES
(1, 'logo.png', 'MA PK MA\'ARIF NGALIAN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mapel`
--

CREATE TABLE `tbl_mapel` (
  `id_mapel` int(10) NOT NULL,
  `nama_mapel` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mapel`
--

INSERT INTO `tbl_mapel` (`id_mapel`, `nama_mapel`) VALUES
(2, 'Fisika'),
(4, 'Kimia 1'),
(6, 'asdas'),
(7, 'aaaa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nis` int(255) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nilai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `id_mapel`, `nis`, `id_kelas`, `nilai`) VALUES
(10, 2, 546345231, 2, '90');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengumuman`
--

CREATE TABLE `tbl_pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul_pengumuman` varchar(255) DEFAULT NULL,
  `isi_pengumuman` text DEFAULT NULL,
  `tanggal_pengumuman` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengumuman`
--

INSERT INTO `tbl_pengumuman` (`id_pengumuman`, `judul_pengumuman`, `isi_pengumuman`, `tanggal_pengumuman`) VALUES
(1, 'libur covid', 'covid mulu dah', '2021-07-20 07:00:00'),
(2, 'libur covid-19', 'fsasdfa safsafs', '2021-07-24 07:00:00'),
(3, 'libur covid-19 dasd', 'xvsfasfasfsa dfgsdfadzcd', '2021-07-24 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `id_request` int(11) NOT NULL,
  `request_siswa` int(11) NOT NULL,
  `id_nilai` int(11) NOT NULL,
  `request_keterangan` text DEFAULT NULL,
  `request_guru` int(11) NOT NULL,
  `request_date` date NOT NULL,
  `request_status_guru` int(1) NOT NULL,
  `request_status_siswa` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`id_request`, `request_siswa`, `id_nilai`, `request_keterangan`, `request_guru`, `request_date`, `request_status_guru`, `request_status_siswa`) VALUES
(4, 2, 10, 'sdfsdfsdfsd', 3, '2021-08-03', 1, 1),
(5, 2, 10, 'Fisika -- test update', 3, '2021-08-03', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seting`
--

CREATE TABLE `tbl_seting` (
  `id` int(11) NOT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `kepala_sekolah` varchar(255) DEFAULT NULL,
  `foto_kapsek` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `sejarah` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_seting`
--

INSERT INTO `tbl_seting` (`id`, `nama_sekolah`, `alamat`, `telepon`, `email`, `kepala_sekolah`, `foto_kapsek`, `nip`, `visi`, `misi`, `sejarah`) VALUES
(1, 'MA PK MA\'ARIF NGALIAN', 'Wadaslintang', '462352332142', 'fgsdfasfsfsd', 'basiron', 'as1.png', '12341241235123', 'ini visi', 'ini misi', 'ini sejarah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` int(255) DEFAULT NULL,
  `nama_siswa` varchar(30) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `wali_siswa` varchar(255) DEFAULT NULL,
  `hp` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `foto_siswa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nis`, `nama_siswa`, `tempat_lahir`, `tanggal_lahir`, `kelas`, `wali_siswa`, `hp`, `alamat`, `foto_siswa`) VALUES
(2, 546345231, 'jubaidahhhaa', 'Wonosoboa', '2021-01-07', '1', 'asdasdasda', '54646', 'asda', 'Mario-mario-wallpaper-hd-games-1920x1080.jpg'),
(17, 1111, 'erwewrew', 'ewrwerw', '2021-07-28', '1', 'wqeqw', '3423423', 'eqweqweqw', NULL),
(18, 2342342, 'erwewrew', 'ewrwerw', '2021-07-28', '1', '1', '5136213', 'sdfsd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(30) NOT NULL,
  `nama_user` varchar(30) DEFAULT NULL,
  `foto_user` varchar(255) DEFAULT 'default.jpg',
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('Administrator','Guru','Siswa','Wali') DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `foto_user`, `username`, `password`, `level`, `email`) VALUES
(1, 'Ari Setiawan', 'Admin.png', 'Admin', '$2y$10$T94YluF61ZJdAcX0gHZD1eSO2ZrxcJMDLF1H/OcmviAVOa3XxDBZu', 'Administrator', 'admin$admin'),
(16, 'jubaidah', 'Mario-mario-wallpaper-hd-games-1920x1080.jpg', 'siswa546345231', '$2y$10$CplNGtEFdTdSGbD.1y2BG.VLwI49bFOw0dkWVS1R2voYnxefd7HuO', 'Siswa', 'sdadas@adasdsa.com'),
(17, 'maymunah', 'default.jpg', 'guru123456', '$2y$10$5Pc4zChavFiXaoZMJbtAmOgjBmysXIa2uHVShJx5Q.binDB0wDaU2', 'Guru', 'guru01@guru.com'),
(19, 'jembrong', 'default.jpg', 'guru42353251', '$2y$10$oITKS209i7A1GAPW/Yd/L.kCJWDcOvUaYO3mK2Ii7zD/9Q0TiTCq2', 'Guru', 'asdas@asdas.com'),
(20, 'erwewrew', NULL, 'siswa2342342', '$2y$10$AyYbU0Dn7gG2/xLrioVzE.rt/ryRVyvfZrvMrNS3KMQ30u6pyCeRS', 'Siswa', 'sdadas@adasdsa.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_download`
--
ALTER TABLE `tbl_download`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `tbl_foto`
--
ALTER TABLE `tbl_foto`
  ADD KEY `id_galery` (`id_galery`);

--
-- Indexes for table `tbl_galery`
--
ALTER TABLE `tbl_galery`
  ADD PRIMARY KEY (`id_galery`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `wali_kelas` (`wali_kelas`);

--
-- Indexes for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Indexes for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `nis` (`nis`,`id_kelas`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `request_siswa` (`request_siswa`),
  ADD KEY `request_guru` (`request_guru`),
  ADD KEY `id_mapel` (`id_nilai`);

--
-- Indexes for table `tbl_seting`
--
ALTER TABLE `tbl_seting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `nis` (`nis`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `nama_user` (`nama_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_download`
--
ALTER TABLE `tbl_download`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_galery`
--
ALTER TABLE `tbl_galery`
  MODIFY `id_galery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  MODIFY `id_logo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_mapel`
--
ALTER TABLE `tbl_mapel`
  MODIFY `id_mapel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_seting`
--
ALTER TABLE `tbl_seting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD CONSTRAINT `tbl_berita_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_foto`
--
ALTER TABLE `tbl_foto`
  ADD CONSTRAINT `tbl_foto_ibfk_1` FOREIGN KEY (`id_galery`) REFERENCES `tbl_galery` (`id_galery`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD CONSTRAINT `tbl_guru_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD CONSTRAINT `tbl_kelas_ibfk_1` FOREIGN KEY (`wali_kelas`) REFERENCES `tbl_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD CONSTRAINT `tbl_nilai_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `tbl_mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_nilai_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_nilai_ibfk_3` FOREIGN KEY (`nis`) REFERENCES `tbl_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
