-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2020 pada 10.53
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alhrfcju_db_elearning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_lengkap`, `alamat`, `username`, `password`, `pass`) VALUES
(1, 'Muhammad Farhan ', 'Jl Cifor Griya Melati Blok D3-6', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'Arsal Hakiem', 'Puri Kencana Asri', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'admin1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_file_materi`
--

CREATE TABLE `tb_file_materi` (
  `id_materi` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `id_kelas` int(4) NOT NULL,
  `id_mapel` int(4) NOT NULL,
  `nama_file` varchar(250) NOT NULL,
  `tgl_posting` date NOT NULL,
  `pembuat` varchar(10) NOT NULL,
  `hits` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_file_materi`
--

INSERT INTO `tb_file_materi` (`id_materi`, `judul`, `id_kelas`, `id_mapel`, `nama_file`, `tgl_posting`, `pembuat`, `hits`) VALUES
(2, 'BAB 3 Fungsi dan Tugas Keluarga', 1, 19, 'bab_3_fungsi_dan_tugas_keluarga_1598338675.docx', '2020-11-01', '38', 0),
(3, 'bab_3_fungsi_dan_tugas_keluarga_1598338675', 2, 19, 'bab_3_fungsi_dan_tugas_keluarga_1598338675.docx', '2020-11-23', '38', 0),
(4, 'BAB 3 Fungsi dan Tugas Keluarga	', 3, 19, 'bab_3_fungsi_dan_tugas_keluarga_1598338675.docx', '2020-11-23', '38', 0),
(5, 'BAB 4 Keluarga di hadapan tuhan', 1, 19, 'bab_4_keluarga_di_hadapan_tuhan_1598338810.docx', '2020-11-23', '38', 0),
(6, 'BAB 4 Keluarga di hadapan tuhan', 2, 19, 'bab_4_keluarga_di_hadapan_tuhan_1598338810.docx', '2020-11-23', '38', 0),
(7, 'BAB 4 Keluarga di hadapan tuhan', 3, 19, 'bab_4_keluarga_di_hadapan_tuhan_1598338810.docx', '2020-11-23', '38', 0),
(8, 'test', 1, 18, '0c1e0451126d9738683e9c05ed91d417129921.pdf', '2020-11-23', '20', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jawaban`
--

CREATE TABLE `tb_jawaban` (
  `id` int(11) NOT NULL,
  `id_tc` int(4) NOT NULL,
  `id_soal` int(4) NOT NULL,
  `id_siswa` int(4) NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jawaban`
--

INSERT INTO `tb_jawaban` (`id`, `id_tc`, `id_soal`, `id_siswa`, `jawaban`) VALUES
(1, 11, 2, 30, '<p>test</p>'),
(2, 11, 2, 17, '<p>test</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jawaban_upload`
--

CREATE TABLE `tb_jawaban_upload` (
  `id` int(11) NOT NULL,
  `id_tu` int(4) NOT NULL,
  `id_soal` int(4) NOT NULL,
  `id_siswa` int(4) NOT NULL,
  `jawaban` varchar(250) NOT NULL,
  `tgl_mengumpulkan` varchar(50) NOT NULL,
  `waktu_mengumpulkan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jawaban_upload`
--

INSERT INTO `tb_jawaban_upload` (`id`, `id_tu`, `id_soal`, `id_siswa`, `jawaban`, `tgl_mengumpulkan`, `waktu_mengumpulkan`) VALUES
(3, 1, 1, 1, '0b6af648239ebc8970051865d5f997ad555604.jpg', '23/11/2020', '03:37:33'),
(4, 4, 4, 1, '0c1e0451126d9738683e9c05ed91d417129921.pdf', '23/11/2020', '03:40:55'),
(5, 7, 7, 1, '0cdeba099ff451cc9c65f001e6bb710d571567.jpg', '23/11/2020', '03:41:40'),
(6, 1, 1, 2, '0d1752409132d2ee95fd81a14d52b9bc107735.jpeg', '23/11/2020', '03:51:28'),
(7, 4, 4, 2, '0e0316262fe4b037ff771a7b0f885656932535.jpeg', '23/11/2020', '03:51:51'),
(8, 7, 7, 2, '0f8f0ac38871f57689399da605e1bf4c287787.jpg', '23/11/2020', '03:52:13'),
(9, 2, 2, 37, '1abf1c17b314df6523d2b7088ec05a89645087.jpeg', '23/11/2020', '03:59:04'),
(10, 5, 5, 37, '2bc59d8435324d828d0467152dee7dc8529151.jpg', '23/11/2020', '03:59:23'),
(11, 8, 8, 37, '2b8628e94030c3c643273f923a5c50cd800842.jpg', '23/11/2020', '03:59:40'),
(12, 1, 1, 30, '0cdeba099ff451cc9c65f001e6bb710d571567.jpg', '23/11/2020', '01:36:23'),
(13, 1, 1, 17, '0cdeba099ff451cc9c65f001e6bb710d571567.jpg', '24/11/2020', '02:48:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurnal_harian`
--

CREATE TABLE `tb_jurnal_harian` (
  `id_pengajar` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `tgl_jurnal` varchar(50) NOT NULL,
  `waktu_jurnal` varchar(50) NOT NULL,
  `uraian_kegiatan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jurnal_harian`
--

INSERT INTO `tb_jurnal_harian` (`id_pengajar`, `nip`, `nama_lengkap`, `kelas`, `mapel`, `tgl_jurnal`, `waktu_jurnal`, `uraian_kegiatan`) VALUES
(1, '3432423', 'Rostika Solihati khasanah', '7', '18', '04/11/2020', '09:36:14', 'contoh jurnal harian'),
(2, '10014299882', 'Rostika Solihati khasanah', '7', '18', '07/11/2020', '08:05:35', 'test jurnal'),
(3, '196605252014071001', 'Viktor Hutabarat', '1', '19', '23/11/2020', '09:25:08', 'asd'),
(4, '196605252014071001', 'Viktor Hutabarat', '2', '19', '23/11/2020', '09:25:22', 'asd'),
(5, '196605252014071001', 'Viktor Hutabarat', '3', '19', '23/11/2020', '09:25:31', 'asd'),
(6, '197406062008011040', 'Rostika Solihati khasanah', '1', '18', '23/11/2020', '09:25:55', 'asd'),
(7, '197406062008011040', 'Rostika Solihati khasanah', '2', '18', '23/11/2020', '09:26:04', 'asd'),
(8, '197406062008011040', 'Rostika Solihati khasanah', '3', '18', '23/11/2020', '09:26:17', 'asd'),
(9, '197406062008011040', 'Rostika Solihati khasanah', '2', '18', '23/11/2020', '07:46:33', 'test'),
(10, '197406062008011040', 'Rostika Solihati khasanah', '1', '18', '24/11/2020', '09:02:31', 'test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `wali_kelas` int(5) NOT NULL,
  `ketua_kelas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `wali_kelas`, `ketua_kelas`) VALUES
(1, 'XI-IPA1', 57, 1),
(2, 'XI-IPA2', 16, 52),
(3, 'XI-IPA3', 22, 92),
(4, 'XI-IPA4', 0, 0),
(5, 'XI-IPA5', 0, 0),
(6, 'XI-IPA6', 0, 0),
(7, 'XI-IPS1', 0, 0),
(8, 'XI-IPS2', 0, 0),
(9, 'XI-IPS3', 0, 0),
(10, 'X-IPA1', 0, 0),
(11, 'X-IPA2', 0, 0),
(12, 'X-IPA3', 0, 0),
(13, 'X-IPA4', 0, 0),
(14, 'X-IPA5', 0, 0),
(15, 'X-IPA6', 0, 0),
(16, 'X-IPS1', 0, 0),
(17, 'X-IPS2', 0, 0),
(18, 'X-IPS3', 0, 0),
(19, 'XII-IPA1', 0, 0),
(20, 'XII-IPA2', 0, 0),
(22, 'XII-IPA4', 0, 0),
(23, 'XII-IPA5', 0, 0),
(24, 'XII-IPA6', 0, 0),
(25, 'XII-IPS1', 0, 0),
(26, 'XII-IPS2', 0, 0),
(27, 'XII-IPS3', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas_ajar`
--

CREATE TABLE `tb_kelas_ajar` (
  `id` int(11) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `id_pengajar` int(5) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas_ajar`
--

INSERT INTO `tb_kelas_ajar` (`id`, `id_kelas`, `id_pengajar`, `keterangan`) VALUES
(1, 1, 20, 'Bahasa Sunda'),
(2, 2, 20, 'Bahasa Sunda'),
(3, 3, 20, 'Bahasa Sunda'),
(13, 1, 38, 'Pendidikan Agama Kristen'),
(14, 2, 38, 'Pendidikan Agama Kristen'),
(15, 3, 38, 'Pendidikan Agama Kristen'),
(16, 4, 38, 'Pendidikan Agama Kristen'),
(17, 5, 38, 'Pendidikan Agama Kristen'),
(18, 6, 38, 'Pendidikan Agama Kristen'),
(19, 7, 38, 'Pendidikan Agama Kristen'),
(20, 8, 38, 'Pendidikan Agama Kristen'),
(21, 9, 38, 'Pendidikan Agama Kristen'),
(22, 5, 20, 'Bahasa Sunda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id` int(11) NOT NULL,
  `kode_mapel` varchar(10) NOT NULL,
  `mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`id`, `kode_mapel`, `mapel`) VALUES
(2, 'A2', 'PKN'),
(3, 'A3', 'Bahasa Indonesia'),
(4, 'A4', 'Matematika'),
(5, 'A5', 'Sejarah Indonesia'),
(6, 'A6', 'Bahasa Inggris'),
(7, 'B1', 'Seni Budaya'),
(8, 'B2', 'Penjas'),
(9, 'B3', 'Prakarya dan Kewirausahaan'),
(10, 'C1', 'Matematika Peminatan'),
(11, 'C2', 'Biologi'),
(12, 'C3', 'Fisika'),
(13, 'C4', 'Kimia'),
(14, 'C5', 'Geografi'),
(15, 'C6', 'Sejarah Peminatan'),
(16, 'C7', 'Sosiologi'),
(17, 'C8', 'Ekonomi'),
(18, 'B4', 'Bahasa Sunda'),
(19, 'A7', 'Pendidikan Agama Kristen'),
(20, 'C9', 'Bahasa Inggris Peminatan'),
(22, 'B5', 'Bimbingan TIK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel_ajar`
--

CREATE TABLE `tb_mapel_ajar` (
  `id` int(11) NOT NULL,
  `id_mapel` int(5) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `id_pengajar` int(5) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mapel_ajar`
--

INSERT INTO `tb_mapel_ajar` (`id`, `id_mapel`, `id_kelas`, `id_pengajar`, `keterangan`) VALUES
(1, 18, 7, 20, 'Bahasa Sunda'),
(2, 18, 8, 20, 'Bahasa Sunda'),
(3, 18, 9, 20, 'Bahasa Sunda'),
(4, 8, 1, 15, 'Pendidikan Jasmani, Olahraga dan Kesehatan	'),
(5, 8, 2, 15, 'Pendidikan Jasmani, Olahraga dan Kesehatan	'),
(6, 8, 3, 15, 'Pendidikan Jasmani, Olahraga dan Kesehatan	'),
(7, 8, 4, 15, 'Pendidikan Jasmani, Olahraga dan Kesehatan	'),
(8, 8, 5, 15, 'Pendidikan Jasmani, Olahraga dan Kesehatan	'),
(9, 8, 6, 15, 'Pendidikan Jasmani, Olahraga dan Kesehatan	'),
(10, 5, 7, 16, 'Sejarah'),
(11, 5, 8, 16, 'Sejarah'),
(12, 5, 9, 16, 'Sejarah'),
(13, 15, 7, 16, 'Sejarah Peminatan	'),
(14, 15, 8, 16, 'Sejarah Peminatan	'),
(15, 15, 9, 16, 'Sejarah Peminatan	'),
(16, 19, 1, 38, 'Pendidikan Agama Kristen'),
(17, 19, 2, 38, 'Pendidikan Agama Kristen'),
(18, 19, 3, 38, 'Pendidikan Agama Kristen'),
(19, 19, 4, 38, 'Pendidikan Agama Kristen'),
(20, 19, 5, 38, 'Pendidikan Agama Kristen'),
(21, 19, 6, 38, 'Pendidikan Agama Kristen'),
(22, 19, 7, 38, 'Pendidikan Agama Kristen'),
(23, 19, 8, 38, 'Pendidikan Agama Kristen'),
(24, 19, 9, 38, 'Pendidikan Agama Kristen'),
(25, 18, 5, 20, 'Bahasa Sunda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_essay`
--

CREATE TABLE `tb_nilai_essay` (
  `id` int(11) NOT NULL,
  `id_tc` int(5) NOT NULL,
  `id_siswa` int(5) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nilai_essay`
--

INSERT INTO `tb_nilai_essay` (`id`, `id_tc`, `id_siswa`, `nilai`) VALUES
(1, 11, 30, 80),
(2, 11, 17, 80);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_pilgan`
--

CREATE TABLE `tb_nilai_pilgan` (
  `id` int(11) NOT NULL,
  `id_tc` int(4) NOT NULL,
  `id_siswa` int(4) NOT NULL,
  `benar` int(4) NOT NULL,
  `salah` int(4) NOT NULL,
  `tidak_dikerjakan` int(4) NOT NULL,
  `presentase` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nilai_pilgan`
--

INSERT INTO `tb_nilai_pilgan` (`id`, `id_tc`, `id_siswa`, `benar`, `salah`, `tidak_dikerjakan`, `presentase`) VALUES
(2, 11, 30, 0, 2, 0, 0),
(3, 11, 17, 1, 1, 0, 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai_upload`
--

CREATE TABLE `tb_nilai_upload` (
  `id` int(11) NOT NULL,
  `id_tu` int(5) NOT NULL,
  `id_siswa` int(5) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nilai_upload`
--

INSERT INTO `tb_nilai_upload` (`id`, `id_tu`, `id_siswa`, `nilai`) VALUES
(3, 1, 30, 80),
(4, 8, 37, 70),
(5, 4, 1, 60),
(6, 4, 2, 50),
(7, 7, 1, 70);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengajar`
--

CREATE TABLE `tb_pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengajar`
--

INSERT INTO `tb_pengajar` (`id_pengajar`, `nip`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `foto`, `username`, `password`, `pass`, `status`) VALUES
(16, '197406062008011020', 'Hesti Dwi Rachmawati', 'Bogor', '1980-01-05', 'P', 'Komplek Perumahan Graha Grande  Sukaresmi Tanah Sareal Bogor', 'pengajar-hesti-dwi-rachmawati.jpg', 'achahesti@hotmail.com', '9cd009a387a94aa2c72a959e74a21f1e', 'pengajar2', 'aktif'),
(17, '197406062008011010', 'E. Kusmana, S.Pd.', 'Bogor', '1974-06-06', 'L', 'Bogor', 'pengajar-e-kusmana-spd.jpeg', 'dzakizaidan@yahoo.com', '12175cadaa445c8ce049ca32673a5e4d', 'pengajar3', 'aktif'),
(18, '197406062008011030', 'Muhamad Furqon Nugraha, S.Pd.', 'Bogor', '1997-03-15', 'L', 'Jl. Letnan Sukarna no. 30 RT 03/1 Ds. Benteng - Ciampea, Kab. Bogor', 'pengajar-muhamad-furqon-nugraha-spd.jpg', 'mpuuympuy@gmail.com', '9d764ffe1662111a987d6251df5acb22', 'pengajar4', 'aktif'),
(19, '198406182011012001', 'Yuni Nursetianti', 'Jakarta', '1984-06-18', 'P', 'Perum Telaga Laras Asri Blok C1 Tonjong', 'pengajar-yuni-nursetianti.jpg', 'yuninursetianti@yahoo.com', 'c2b7649c7ea7e4849a2e17b9d444e943', 'pengajar5', 'aktif'),
(20, '197406062008011040', 'Rostika Solihati khasanah', 'Sumedang', '1987-02-04', 'P', 'Perum bumi Pertiwi 1 Cilebut', 'pengajar-rostika-solihati-khasanah.jpg', 'kaka.kirei10@gmail.com', '74c568d1cc6ad8c8635d834b01ff8dbf', 'pengajar6', 'aktif'),
(21, '197104142005011013', 'Tateng Gunadi', 'Majalengka', '1971-04-14', 'L', 'Telaga Kahuripan', 'anonim.png', 'tatenggunadi@gmail.com', '0f0a19a3490d751671db893bf67f7660', 'pengajar7', 'aktif'),
(22, '197407292006041014', 'Ruly Budiman', 'Bogor', '1974-07-29', 'L', 'Lawanggintung rt 03 rw 08 Bogor', 'anonim.png', 'rulybudiman@yahoo.co.id', 'cdcb4329cf7233b97637ea664c8a23ca', 'pengajar9 ', 'aktif'),
(23, '197406062008011090', 'Muhammad Fachry Yanuar', 'Tangerang', '1995-01-01', 'L', 'Bumi Menteng Asri', 'pengajar-muhammad-fachry-yanuar.jpeg', 'mfyanuar12@gmail.com', '4c9b9941e7d5a0694a6eb6f1ddb2eca1', 'pengajar8', 'aktif'),
(24, '197309132002122006', 'Heni Yulia Sari', 'Bandung', '1973-09-13', 'P', 'Perum de botanica', 'anonim.png', 'hysheniyuliasari@gmail.com', '2dd2cb58385a83bcb8068f7c070d8a6e', 'pengajar10', 'aktif'),
(25, '196612192007012009', 'Lusi Dahniar, S.Pd.', 'Bogor', '1966-12-19', 'P', 'Bogor', 'anonim.png', 'lusidahniar19@gmail.com', 'a12c7ea674490460b0cd351b09809b86', 'pengajar11', 'aktif'),
(26, '197007242002122004', 'Julita', 'Bangka', '1970-07-24', 'P', 'Perum. Ciomas Permai Blok D.8 No. 11 Ciomas Bogor', 'pengajar-julita.JPG', 'Julita33@yahoo.co.id', 'b86d1168c9fe73b0fa716877ce02bdfc', 'pengajar12 ', 'aktif'),
(27, '196306281989111001', 'Jayeng', 'Bogor', '1963-06-28', 'L', 'Parakan mulya rt 04/04 ds parakan', 'anonim.png', 'Jayengaarfi@gmail.com', 'e23fc2cdb619f15f714be43a711a5b38', 'pengajar13', 'aktif'),
(28, '197704022008011003', 'Sapriliyana', 'Bogor', '1977-04-02', 'L', 'Ciampea', 'pengajar-sapriliyana1.jpg', 'apinkteas@gmail.com', '31e25bf2b0251062961b5ab7aadd52b3', 'pengajar14 ', 'aktif'),
(29, '197510232005011006', 'Darmono W', 'Klaten', '1975-10-23', 'L', 'Villa comas indah', 'anonim.png', 'darmono.wd@gmail.com', '25b320701e9a70c499615ed2340ec52a', 'pengajar15 ', 'aktif'),
(30, '197404072006042019', 'Fata Apriyani', 'Bantul', '1974-04-07', 'P', 'Bumi Ciluar Indah blok C3 No.14 bogor', 'pengajar-fata-apriyani1.jpg', 'fataapriyani@ymail.com', '6a8b8b353cb108e65ff108d0e2c8fbee', 'pengajar16 ', 'aktif'),
(31, '197406212008012008', 'Tetti Herawati', 'Bogor', '1974-06-21', 'P', 'Perum Nuansa Asri Laladon Blok B no.20 Kel Laladon Kec .Ciomas  Kab.Bogor 16610', 'anonim.png', 'tetti@gmail.com', '229648d430c1e2fd2147bb630d7eee01', 'pengajar17 ', 'aktif'),
(32, '196103131987032003', 'Dra.Trilas Martiani', 'Bantul', '1961-03-13', 'P', 'BTN Tanah Baru Blok E no.28', 'anonim.png', 'trilasmartiani61@gmail.com', '3f5137490920f080da1899a77978f8da', 'pengajar18 ', 'aktif'),
(33, '197712202007012013', 'Dewi Rina Kusumawanti', 'Bogor', '1977-12-20', 'P', 'Sman 10 Bogor', 'anonim.png', 'Dewirina09@yahoo.co.id', 'bbb46839f860b2487aeaa8d5985f578a', 'pengajar19 ', 'aktif'),
(34, '196911062007012013', 'Mustika Lestari', 'Jakarta', '1969-11-06', 'P', 'Ciomas Permai Blok C 16 No. 17', 'anonim.png', 'mustikalestari69@gmail.com', 'db4cfde9cfa10a3ad18d0afe648646f9', 'pengajar20', 'aktif'),
(35, '197211272005012009', 'Ernawati', 'Bogor', '1972-11-27', 'P', 'Ciomas permai blok d 15 no 12', 'pengajar-ernawati1.jpg', 'erna_wati7222@yahoo.com', '7a94a49aa94cc1ca11114a5c250b26db', 'pengajar21 ', 'aktif'),
(36, '196610301990012003', 'Euis Sunarwati', 'Kuningan', '1966-10-30', 'P', 'Perumahan IPB Alam Sinar Sari jln Delima blok E no 212 Cibeureum Dramaga', 'pengajar-euis-sunarwati.jpg', 'euis.chemistry@gmail.com', '2613f6dbc6f1ae4e421de391ae8af945', 'pengajar22 ', 'aktif'),
(37, '197406062008011023', 'Pipih sopiah', 'Bogor', '1974-11-11', 'P', 'Kp baru ciomas permai', 'anonim.png', 'Sopiahpipih231@gmail.com', '7ba88ca2a207373b7e75934a4283d40d', 'pengajar23 ', 'aktif'),
(38, '196605252014071001', 'Viktor Hutabarat', 'Simalungun', '1966-05-25', 'L', 'Bukit Cimanggu Villa Blok S7 No.39 Tanah Sareal Bogor', 'pengajar-viktor-hutabarat.jpg', 'viktorhutabarat10@gmail.com', 'b361566ab54f2f73a1ac8b96561364ac', 'pengajar24 ', 'aktif'),
(39, '196504131988031008', 'H. Deden Cuhaya S.,S.Pd.,MM', 'Bogor', '1965-04-13', 'L', 'Bogor', 'anonim.png', 'dedensamsudin@gmail.com', '57d8003b32e82e56df1e8feb5cfff24b', 'pengajar25 ', 'aktif'),
(40, '197805122006042026', 'Neneng Hamidah', 'Bogor', '1978-05-12', 'P', 'Kp.Bojong tengah RT 04/06 desa Bantarsari Rancabungur Bogor', 'anonim.png', 'nenenghamidah949@gmail.com', '996f3f5ff189d55589838c4a053649cb', 'pengajar26 ', 'aktif'),
(41, '', 'Anggesti Awalia', 'Bogor', '1994-03-22', 'P', 'Bogor', 'anonim.png', 'anggestiaw@gmail.com', '3212704ac11b757c922a58a026065843', 'pengajar27', 'aktif'),
(42, '196408111989021001', 'ARDI RUDY KAIRUPAN', 'BANDUNG', '1964-01-11', 'L', 'Curug Permai Blok I NO. 15 RT.003/RW 010 KEL. CURUG KEC. KOTA BOGOR BARAT, KOTA BOGOR 16113', 'pengajar-ardi-rudy-kairupan.jpg', 'ardirudyk64@gmail.com', '2c5000664d03a9e9ed6fa99872ad1fe3', 'pengajar28 ', 'aktif'),
(43, '197306162007012008', 'Nurul Quddusy, SP, M.Pd', 'Tanjung Karang', '1973-06-16', 'P', 'jl Pendidikan gg Bendera 1 No. 51 Cilebut Barat. Bogor', 'anonim.png', 'nurulquddusy@gmail.com', '2d2a0fc4f69e2a49c8be078cd6ce967c', 'pengajar29 ', 'aktif'),
(44, '196511031986101003', 'Didi Supardi', 'Bogor', '1965-11-03', 'L', 'Alam Tirta Lestari Blok G2 No.18', 'anonim.png', 'didisupardi03@gmail.com', '3288c5bf3adc171a9e12cfc9c57d3339', 'pengajar30 ', 'aktif'),
(45, '196810251997022001', 'Sumarti, M.Pd.', 'Magetan', '1968-10-25', 'P', 'Sat induk Bais TNI Kelurahan Menteng Bogor Barat', 'anonim.png', 'sumarti33@yahoo.co.id', '15d956c9ccd72f3fe46df6585e3828ff', 'pengajar31 ', 'aktif'),
(46, '', 'Diana Kumalasari, S.Pd', 'Bogor', '1995-05-07', 'P', 'Jl. Gardu Tinggi No. 13 , Sukasari, Bogor Timur, Kota Bogor', 'anonim.png', 'dianakumala70@gmail.com', 'fe12b42fbdda54d7f530eef202ee8bd1', 'pengajar32 ', 'aktif'),
(47, '3271060606740011', 'Engkus Kusmana, S.Pd.', 'Bogor', '1974-06-06', 'L', 'Bogor', 'pengajar-engkus-kusmana-spd.jpeg', 'dzakizaidantsaaqib@gmail.com', '427c470943e1f5da7ce20201b76b6d0b', 'pengajar33 ', 'aktif'),
(48, '196507071988032008', 'Emi Rosmiami', 'Tasikmalaya', '1965-07-07', 'P', 'Taman Cimanggu Bogor', 'anonim.png', 'emirosmiami12@yahoo.com', '0554a76ab9fc815d104004af12dafa70', 'pengajar34 ', 'aktif'),
(49, '197607182007012007', 'Yuli Rusniati, SE', 'Bogor', '1976-07-18', 'P', 'Jl. Pondok Rumput No 19 RT 04 RW 05 Bogor', 'pengajar-yuli-rusniati-se.jpg', 'pbsmanse@gmail.com', '11da5a3a77a63bc59a1042445e0bd8dd', 'pengajar35 ', 'aktif'),
(50, '196509202007011006', 'Ruhiyat', 'Bogor', '1965-09-20', 'L', 'Jl. Semboja 5 Bogor tengah kota Bogor', 'pengajar-ruhiyat.jpg', 'Iheusruhiyat15@gmail.com', '9890f746cbfdb45e35b7c1767b70c6f3', 'pengajar36 ', 'aktif'),
(51, '196503112007011032', 'Partono, S.Pd.', 'Klaten', '1963-03-11', 'L', 'Bogor', 'anonim.png', 'Po90189@gmail.com', '7bdb9b9e2f20baa2442ba5a91da58023', 'pengajar37 ', 'aktif'),
(52, '197502082010011005', 'Wawa Warno, S.Pd.', 'Bandung', '1975-02-08', 'L', 'Perumahan Bukit Hijau Ciomas Bogor', 'anonim.png', 'wawa_sman10bogor@yahoo.com', 'c19fdff8805c09527a9046dd7b3d41d1', 'pengajar38 ', 'aktif'),
(53, '197005021995122005', 'Yosi Skanda Mirza', 'Bukittinggi', '1970-05-02', 'P', 'Komplek Balittro Cimanggu Keci CC 30', 'anonim.png', 'pengajar39 ', '3a18b5b8fdbeed8036f67428961ff662', 'pengajar39 ', 'tidak aktif'),
(54, '197103012006042015', 'Uun Nurhayati', 'Bogor', '1971-03-03', 'P', 'Perum.Griya Melati 1 C5 No.3 Bogor', 'anonim.png', 'pengajar40 ', '11d4319a0d25d3a82fbd8c50c5b84a8b', 'pengajar40 ', 'tidak aktif'),
(55, '196804121993011002', 'Jaenuri', 'Indramayu', '1968-04-12', 'L', 'Jl ciremai ujung Bantarjati bogor', 'anonim.png', 'pengajar41 ', '9ea4a68fab6d938b51378607dadfd9ad', 'pengajar41 ', 'tidak aktif'),
(56, '1048768668200003', 'Fajar Lutfian', 'Sukabumi', '1990-07-16', 'L', 'Jl. Raya Cilebut Jembatan 1, GG H. Ghoni RT/RW 01/02 Kel, Sukaresmi Kec, Tanah Sereal Kota Bogor', 'anonim.png', 'pengajar42 ', 'ea9f59ea927e9b0fce82f9f3887202dd', 'pengajar42 ', 'tidak aktif'),
(57, '197805122006042026', 'Neneng Hamidah', 'Bogor', '1978-05-12', 'P', 'Kp.Bojong tengah RT 04/06 desa Bantarsari Rancabungur Bogor', 'anonim.png', 'nenenghamidah949@gmail.com', '996f3f5ff189d55589838c4a053649cb', 'pengajar26 ', 'aktif'),
(58, '', 'Diana Kumalasari, S.Pd', 'Bogor', '1995-05-07', 'P', 'Jl. Gardu Tinggi No. 13 , Sukasari, Bogor Timur, Kota Bogor', 'anonim.png', 'dianakumala70@gmail.com', '3212704ac11b757c922a58a026065843', 'pengajar27 ', 'aktif'),
(59, '1048768668200003', 'Fajar Lutfian', 'Sukabumi', '1990-07-16', 'L', 'Jl. Raya Cilebut Jembatan 1, GG H. Ghoni RT/RW 01/02 Kel, Sukaresmi Kec, Tanah Sereal Kota Bogor', 'anonim.png', 'fajarlutfian@gmail.com', '2c5000664d03a9e9ed6fa99872ad1fe3', 'pengajar28 ', 'aktif'),
(60, '3432423', 'Ervin', 'Bogor', '2018-11-27', 'L', 'test', 'anonim.png', 'ervin', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengumuman`
--

CREATE TABLE `tb_pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul` text NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `isi` longtext NOT NULL,
  `tgl_posting` date NOT NULL,
  `penerbit` varchar(10) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengumuman`
--

INSERT INTO `tb_pengumuman` (`id_pengumuman`, `judul`, `kelas`, `isi`, `tgl_posting`, `penerbit`, `status`) VALUES
(2, 'Test 2 ', '1', '<p>contoh pengumuman 2</p>', '2020-11-03', '20', 'aktif'),
(3, 'test 5', '2', '<p>test</p>', '2020-11-23', '20', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_presensi`
--

CREATE TABLE `tb_presensi` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `tgl_presensi` varchar(50) NOT NULL,
  `waktu_presensi` varchar(50) NOT NULL,
  `hasil_pembelajaran` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_presensi`
--

INSERT INTO `tb_presensi` (`id_siswa`, `nis`, `nama_lengkap`, `kelas`, `mapel`, `tgl_presensi`, `waktu_presensi`, `hasil_pembelajaran`) VALUES
(5, '192010167', 'Rizqi ramlan fadillah', '1', '18', '23/11/2020', '07:57:54', 'test'),
(6, '192010987', 'Ahmad Rizki Rifanni', '1', '18', '23/11/2020', '07:58:30', 'test'),
(7, '192010173', 'Windie Amanda', '1', '18', '23/11/2020', '07:59:09', 'test'),
(8, '192010173', 'Windie Amanda', '1', '18', '23/11/2020', '07:59:20', 'sad'),
(9, '192010147', 'Dela fizrianti', '1', '18', '23/11/2020', '08:02:41', 'asd'),
(10, '192010249', 'Alya noviyana', '1', '18', '23/11/2020', '08:03:25', 'asd'),
(11, '192010001', 'Adnin Majiid Kusuma Pratama', '1', '18', '23/11/2020', '08:03:54', 'asd'),
(12, '20220392', 'Arya Juliyana Rahman', '1', '18', '23/11/2020', '08:56:12', 'test'),
(13, '192010018', 'Lasgiwi Prasiska', '1', '18', '23/11/2020', '08:56:43', 'asd'),
(14, '192010006', 'Daffa Althaf Carisa Alamsyah', '1', '18', '23/11/2020', '08:57:10', 'asd'),
(15, '192010062', 'Ni Luh Kadek Ardhia Swari Pradnyani', '2', '18', '23/11/2020', '08:57:41', 'asd'),
(16, '192010062', 'Ni Luh Kadek Ardhia Swari Pradnyani', '2', '18', '23/11/2020', '08:57:50', 'asd'),
(17, '192010041', 'ARYA HIFNI HERIAWAN', '2', '18', '23/11/2020', '08:59:55', 'test'),
(18, '192010043', 'Dedy Supryadi', '2', '18', '23/11/2020', '09:00:21', 'asd'),
(19, '192010067', 'Salfa Nur Raudhoh', '2', '18', '23/11/2020', '09:00:46', 'asd'),
(20, '192010110', 'Anis Adinda Putri', '2', '18', '23/11/2020', '09:01:14', 'asd'),
(21, '192010159', 'Maedellin', '2', '18', '23/11/2020', '09:01:44', 'asd'),
(22, '301026104002', 'Fauziah Amanda Rahmat', '2', '18', '23/11/2020', '09:02:06', 'test'),
(23, '192010013', 'Ghina Rafifah Zulfiani', '2', '18', '23/11/2020', '09:02:35', 'test'),
(24, '192010298', 'Aghy Mochammad Alghifary Maulana', '3', '18', '23/11/2020', '09:03:14', 'asd'),
(25, '192010237', 'Nova Safitri', '3', '18', '23/11/2020', '09:04:27', 'asd'),
(26, '0045984894', 'Nadia dwi purnama', '3', '18', '23/11/2020', '09:04:49', 'asd'),
(27, '0045984894', 'Nadia dwi purnama', '3', '18', '23/11/2020', '09:06:43', 'asd'),
(28, '192010069', 'Vela Estrelita Johannis', '1', '19', '23/11/2020', '09:13:50', 'ads'),
(29, '192010159', 'Maedellin', '2', '19', '23/11/2020', '09:14:22', 'asd'),
(30, '192010258', 'Felicia Rangkoratat', '2', '19', '23/11/2020', '09:14:58', 'asd'),
(31, '192010122', 'Miracle Patrick Aden Ponamon', '2', '19', '23/11/2020', '09:15:23', 'asd'),
(32, '161707056', 'Ricky Syahputra Tarigan', '2', '19', '23/11/2020', '09:15:47', 'asd'),
(33, '192010069', 'Vela Estrelita Johannis', '1', '18', '23/11/2020', '07:34:49', 'test'),
(34, '19201003800000', 'Annisa Sholihah', '1', '18', '24/11/2020', '08:44:42', 'test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `id_kelas` varchar(5) NOT NULL,
  `thn_masuk` int(5) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `alamat`, `id_kelas`, `thn_masuk`, `foto`, `username`, `password`, `pass`, `status`) VALUES
(1, '192010167', 'Rizqi ramlan fadillah', 'Bogor', '2004-07-09', 'L', 'Islam', '', '1', 2019, 'anonim.png', 'rramlanf123@gmail.com', '013f0f67779f3b1686c604db150d12ea', 'siswa1', 'aktif'),
(2, '192010987', 'Ahmad Rizki Rifanni', 'Surabaya', '2000-01-26', 'L', 'Islam', '', '1', 2019, 'anonim.png', 'ekkyrifanni@gmail.com', '331633a246a4e1ceefc9539a71fcd124', 'siswa2', 'aktif'),
(4, '192010173', 'Windie Amanda', 'Bogor', '2003-11-19', 'P', 'Islam', 'Villa Mutiara Bogor Blok D3 no 33', '1', 2019, 'anonim.png', 'Amandawindie70@gmail.com', 'be92aac38633896eb7b6781816b17c37', 'siswa4', 'aktif'),
(5, '192010147', 'Dela fizrianti', 'Bogor', '2004-08-02', 'P', 'Islam', 'Cilendek timur', '1', 2019, 'anonim.png', 'Delafizrianti@gmail.com', '829e85a9946f9d4621e7e8f544fefd54', 'siswa5', 'aktif'),
(6, '192010249', 'Alya noviyana', 'Bogor', '2004-11-20', 'P', 'Islam', 'Curug mekar Rt.03/06', '1', 2019, 'anonim.png', 'Alyanoviyana198@gmail.com', '1061ecee1b8274545fb8c1a3da9c62ff', 'siswa6', 'aktif'),
(7, '192010001', 'Adnin Majiid Kusuma Pratama', 'Bogor', '2003-09-23', 'L', 'Islam', 'Jln Rasamala No 6', '1', 2019, 'anonim.png', 'adninmajiid@gmail.com', '21c72a1d31b205eb4faffec3392bd1e6', 'siswa7', 'aktif'),
(8, '20220392', 'Arya Juliyana Rahman', 'Bogor', '2004-07-23', 'L', 'Islam', 'Curug mekar rt03 rw04 no 10', '1', 2019, 'anonim.png', 'aryajuliana4@gmail.com', '848d193d33ed0369253f39320c2bcf8e', 'siswa8', 'aktif'),
(9, '192010018', 'Lasgiwi Prasiska', 'Bogor', '2003-12-21', 'P', 'Islam', 'Jl.Pangkalan Batu Kav.Hj Oyo rt04 rw02', '1', 2019, 'anonim.png', 'lasgiwiprasiskaap@gmail.com', 'd2e42db0c07075dfee59988b7e363f21', 'siswa9', 'aktif'),
(10, '192010006', 'Daffa Althaf Carisa Alamsyah', 'Bogor', '2004-12-07', 'P', 'Islam', 'Curug mekar rt03 rw04 no 10', '1', 2019, 'anonim.png', 'carisa.alamsyah@gmail.com', '5ca4a94eb7b4a88904d9824ff42024e7', 'siswa10', 'aktif'),
(11, '192010019', 'M. Zaki Rizaldi', 'Banjarnegara', '2004-05-03', 'L', 'Islam', 'Jln curug induk rt 1 rw 3 no 23', '1', 2019, 'anonim.png', 'Mzakirizalfi@gmail.com', '91ecdd33b4518699c629e251d9aa2a87', 'siswa11', 'aktif'),
(12, '192010268', 'Muhammad Rizky nur Fadillah', 'Bogor', '2004-11-26', 'L', 'Islam', 'Cilendek timur rt02/05 no 6', '1', 2019, 'anonim.png', 'nurfadillahmuhammadrizky@gmail.com', '380a0238d4eeb7ebbf6445d1541865c2', 'siswa12', 'aktif'),
(13, '192010174', 'Faiz Hanif anjarianto', 'Bogor', '2004-03-04', 'L', 'Islam', 'Perumahan pandan valley AC 8 nomor 24', '1', 2019, 'anonim.png', 'faizhanif831@gmail.com', 'ed0fc6c04b4e6f720d456f6bd371d04a', 'siswa13', 'aktif'),
(14, '192010058', 'Muhamad Hayqal Arisandi Gunawan', 'Bogor', '2004-04-08', 'L', 'Islam', 'Jl.curug mekar no.28 RT.005 RW.006', '1', 2019, 'anonim.png', 'Vierzaanun75@gmail.com', '2bcbb7e68bf616858c50db96f2e6ad7c', 'siswa14', 'aktif'),
(15, '192010023', 'Mohamad Fadilah Rizki', 'Bogor', '2003-10-03', 'L', 'Islam', 'Semplak, jalan H. EDI NO 109', '1', 2019, 'anonim.png', 'mfadriz03@gmail.com', 'd56fff1d9ee03839a49c23aa0c417edb', 'siswa15', 'aktif'),
(16, '192010894', 'Anvira Kirana Az-Zahra', 'Bogor', '2004-06-05', 'P', 'Islam', 'Taman Yasmin jl. Teratai Raya no. 35', '1', 2019, 'anonim.png', 'anviraaz05@gmail.com', '87b01b262401781f93bcb637f4625a04', 'siswa16', 'aktif'),
(17, '19201003800000', 'Annisa Sholihah', 'Bandung', '2003-11-24', 'P', 'Islam', '', '1', 2019, 'anonim.png', 'asholihah1@gmail.com', '540fa8004c286f93a26aa6aea062a510', 'siswa17', 'aktif'),
(18, '161707005', 'Akmal Zaidan Yusuf', 'Bogor', '2004-03-14', 'L', 'Islam', 'Jl. Raya Semplak No.355', '1', 2019, 'anonim.png', 'akmalzaidanyusuf@gmail.com', '019c4833b51c355adee4b6d800b20fa2', 'siswa18', 'aktif'),
(19, '192010054', 'Malwa Aulia Safira', 'Bogor', '2004-06-17', 'P', 'Islam', 'Cemplang baru RT 02 RW 10 no 117', '1', 2019, 'anonim.png', 'laimalwaq@gmail.com', '54bf8a9fadc3a4dfc1c626f5f65bfeff', 'siswa19', 'aktif'),
(20, '192010234', 'faiz Hanif anjarianto', 'Bogor', '2004-03-04', 'L', 'Islam', 'Pandan valley AC 8 nomor 23', '1', 2019, 'anonim.png', 'faizhanif888@gmail.com', '097c7c996151cbf1facf937cb9e60f72', 'siswa20', 'aktif'),
(21, '192010005', 'BRAIN CAESAF ZEBUA', 'Jakarta', '2004-04-08', 'L', 'Islam', 'Villa mutiara bogor 1 sektor 2 blok G1 no.31', '1', 2019, 'anonim.png', 'braincaesaf16@gmail.com', 'cb4f51a1475c69a93257798bf6ec192b', 'siswa21', 'aktif'),
(22, '101101113', 'salfa nur raudhoh', 'Bogor', '2004-09-05', 'P', 'Islam', 'jalan raya bubulak no 9 rt 01/rw 11', '1', 2019, 'anonim.png', 'salfanurraudhoh@gmail.com', '133c50c811f3ed276809e7310169e514', 'siswa22', 'aktif'),
(23, '', 'Miftsa Faiz Ikhsan', 'Bogor', '2004-11-06', 'L', 'Islam', 'cijahe rt 04/01 no 26', '1', 2019, 'anonim.png', 'miftsaikhsan80@gmail.com', '1f4126d8478f405564436198e8789813', 'siswa23', 'aktif'),
(24, '192010025', 'MUHAMMAD JODRA ARMIZA', 'Bogor', '2004-06-04', 'L', 'Islam', 'Jl. Pinang merah raya Rt. 04/09 No. 26', '1', 2019, 'anonim.png', 'jodra.armiza994@gmail.com', '3c583f1cc6196db5d5f8809af0282d89', 'siswa24', 'aktif'),
(25, '', 'Hilal Akbar Sulasman', 'Tangerang', '2004-07-17', 'L', 'Islam', 'Villa Mutiara Bogor blok D5/6', '1', 2019, 'anonim.png', 'hilalakbars90@gmail.com', '399fecdc2b47307ca027e40fd37be859', 'siswa25', 'aktif'),
(26, '192010068', 'Sarla Maryama Aprila', 'Bandung', '2004-04-08', 'P', 'Islam', 'Jl. Kp cilubang desa sukawening kecamatan dramaga', '1', 2019, 'anonim.png', 'Sarlamaryama96@gmail.com', '2d5efdd2078d385a46037069a6098bac', 'siswa26', 'aktif'),
(27, '192010066', 'Rizky Saputra', 'Bogor', '2004-08-05', 'L', 'Islam', 'Jl.Cifor Bubulak Gg.sumur VII Rt. 01/07', '1', 2019, 'anonim.png', 'ottesaputra8@gmail.com', 'cb7686c908825ae14cd6f9999b5535d4', 'siswa27', 'aktif'),
(28, '192010061', 'Nasywa Areej', 'Jakarta', '2004-06-09', 'P', 'Islam', 'Curug Induk Rt.03/03 No. 83', '1', 2019, 'anonim.png', 'Nasywaareej03@gmail.com', '671e64ce45a6812e24936aec37590313', 'siswa28', 'aktif'),
(29, '192010060', 'Nafisa Zalfa Maulida', 'Sukabumi', '2004-05-19', 'P', 'Islam', 'Jl. Semplak rt 2/2 no 80', '1', 2019, 'anonim.png', 'nafisazalfaa@gmai.com', '4148c5b325a4ebb93ab30e5970eb59a3', 'siswa29', 'aktif'),
(30, '192010069', 'Vela Estrelita Johannis', 'Bogor', '2004-06-18', 'L', 'Kristen', 'Bogor Raya Permai blok FD3/1', '1', 2019, 'anonim.png', 'V3l4happy@gmail.com', 'e5f88adc51d6bdbb12473621334b6a41', 'siswa30', 'aktif'),
(31, '192010057', 'Mochamad Sabilal Muhtadin Anis', 'Bogor', '2004-02-15', 'L', 'Islam', 'Bogor raya permai fd 5 no.7', '1', 2020, 'anonim.png', 'Sabilalmuhtadin15@gmail.com', 'a3ec5179d0ef1f38067ee87fa678ddf0', 'siswa31', 'aktif'),
(32, '0041100648', 'Karinira Early', 'Bogor', '2004-02-26', 'P', 'Islam', 'Jln.Cijahe Curug Mekar', '1', 2019, 'anonim.png', 'kariniraearly@email.com', '895c2be060447eaea092ff56c079ab7f', 'siswa32', 'aktif'),
(33, '0036737425', 'Ghifari ayyubi siregar', 'Bogor', '2004-06-22', 'L', 'Islam', 'Raflesia 1 no. 5 taman yasmin', '1', 2019, 'anonim.png', 'Www.roasteddragon@gmail.com', '320d34eba77548d1c1b48d19e6c9f8cb', 'siswa33', 'aktif'),
(34, '192010056', 'Mauludi Rachman', 'Bandung', '2004-05-08', 'L', 'Islam', 'Taman yasmin sektor 6 Jl.Pinang X No.7 kel.curug mekar kec.bogor barat', '1', 2019, 'anonim.png', 'mauludi080504@gmail.com', 'ab4760fecbb9c69affc34ffb9268a430', 'siswa34', 'aktif'),
(35, '192010036', 'Agnys Zabrina Martiviani Putri', 'Bogor', '2004-02-25', 'P', 'Islam', 'Jalan raya semplak No.148 RT.002 RW.008', '1', 2019, 'anonim.png', 'agnyszabrina41@gmail.com', '47bf4837b1465168219e973bec3e7d59', 'siswa35', 'aktif'),
(36, '192010035', 'Adinda aisyah lesmana', 'Bogor', '2004-03-06', 'P', 'Islam', 'Jl. Kp. Bojong neros rt.03/07 No.06', '1', 2019, 'anonim.png', 'Adindalesmana6@gmail.com', 'dc7d7e249c28449dd71f9461ce2f7ff8', 'siswa36', 'aktif'),
(37, '192010062', 'Ni Luh Kadek Ardhia Swari Pradnyani', 'Bogor', '2004-02-25', 'P', 'Hindu', 'Cilendek Timur Rt 002 Rw 05', '2', 2019, 'anonim.png', 'ardhiaswari1122@gmail.com', '2c62f8d42b5be2859b926b300262e509', 'siswa37', 'aktif'),
(38, '192010041', 'ARYA HIFNI HERIAWAN', 'Bogor', '2004-10-06', 'L', 'Islam', 'Taman yasmin sektor 5 jln palem putri 3 no 37', '2', 2019, 'anonim.png', 'aryahifni@yahoo.com', '6bc67bf66b51f840b2485ad0db137ff4', 'siswa38', 'aktif'),
(39, '192010043', 'Dedy Supryadi', 'Bogor', '2004-12-01', 'L', 'Islam', 'Jalan, Salabenda raya rt4/rw3, desa parakanjaya', '2', 2019, 'anonim.png', 'dedysupryadi72@gmail.com', '638e1a00d1e25b3b86d66b48c8bc0e68', 'siswa39', 'aktif'),
(40, '192010067', 'Salfa Nur Raudhoh', 'Bogor', '2003-09-05', 'P', 'Islam', 'jalan raya bubulak no 9 rt 01/rw 11', '2', 2019, 'anonim.png', 'salfaners@gmail.com', '65504dd1f179bf45eafef9a7851aebf6', 'siswa40', 'aktif'),
(41, '192010110', 'Anis Adinda Putri', 'Bogor', '2004-09-16', 'P', 'Islam', 'Perumahan Curug Permai Jln. Dirgantara Blok A no. 3', '2', 2019, 'anonim.png', 'anisadindap@gmail.com', 'b7e4140465ea0f689589db619a1cba33', 'siswa41', 'aktif'),
(42, '192010159', 'Maedellin', 'Bogor', '2004-03-21', 'P', 'Kristen', 'cemplang baru', '2', 2019, 'anonim.png', 'dellinlee04@gmail.com', 'd686b4bf9f85331bcf6010853d030306', 'siswa42', 'aktif'),
(43, '301026104002', 'Fauziah Amanda Rahmat', 'Jakarta', '2004-03-23', 'P', 'Islam', 'Perumahan Curug Permai, jl Hercules 3 E/22', '2', 2019, 'anonim.png', 'amandafauziah0323@gmail.com', '742f80d74ce691d736fbff6c3e6535a9', 'siswa43', 'aktif'),
(44, '192010013', 'Ghina Rafifah Zulfiani', 'Palembang', '2004-01-01', 'P', 'Islam', 'Griya kalisuren', '2', 2019, 'anonim.png', 'ghinarafifah1234@gmail.com', '22f522c09d33e923ee262beab3cb36e4', 'siswa44', 'aktif'),
(45, '192010027', 'Pianissa Zahra', 'Bogor', '2004-06-13', 'P', 'Islam', 'salabenda, parakan jaya no.3', '2', 2019, 'anonim.png', 'pianissazahra04@gmail.com', '9f3b922f9e93de44a7389751c1960d71', 'siswa45', 'aktif'),
(46, '192010123', 'Siti Khumaira Susetyo', 'Bogor', '2004-03-02', 'P', 'Islam', 'Taman yasmin sektor 6', '2', 2019, 'anonim.png', 'siti.khumaira.s@gmail.com', 'af164b87aab4007dd590850f9520a7be', 'siswa46', 'aktif'),
(47, '192010055', 'Marlinda sari', 'Bogor', '2004-03-27', 'P', 'Islam', 'Jln.curug mekar Rt03/Rw04 No.60', '2', 2019, 'anonim.png', 'smarlinda54@gmail.com', 'f51e67c60277ea55598c636d7d4b647d', 'siswa47', 'aktif'),
(48, '192010120', 'Kayla Zhahirah', 'Jakarta', '2004-05-01', 'P', 'Islam', 'Nirwana Valley Residence blok D no 2 Semplak', '2', 2019, 'anonim.png', 'zhahirahkay@gmail.com', '1ceb501a3c434c17e8da8bf118b7d575', 'siswa48', 'aktif'),
(49, '192010200', 'Sekar Sariningsih', 'Bogor', '2003-09-09', 'P', 'Islam', 'Taman Yasmin sektor 6 jl. Pinang Raya no. 61', '2', 2019, 'anonim.png', 'SEKARSARININGSIH99@gmail.com', '870b327f5b4808b4e1c5157f43300ded', 'siswa49', 'aktif'),
(50, '192010267', 'Muhammad Ridwan Al Fath', 'Bogor', '2004-08-25', 'L', 'Islam', 'Jalan Cemplang baru timur No. 37, Rt. 02, Rw. 09', '2', 2019, 'anonim.png', 'wannafath@gmail.com', '0207c447fbb481940f9d41ca22338c3b', 'siswa50', 'aktif'),
(51, '192010178', 'Maudy anjani', 'Bogor', '2004-05-17', 'P', 'Islam', 'Jl cijahe curuk mekar', '2', 2019, 'anonim.png', 'maudyanjani470@gmail.com', '50c5c0b3f89b2e4dd7c42423ed190406', 'siswa51', 'aktif'),
(52, '192010258', 'Felicia Rangkoratat', 'Bogor', '2004-07-07', 'P', 'Kristen', 'perumahan curug indah, Â jln.elang', '2', 2019, 'anonim.png', 'ikarangko123@gmail.com', 'e142838d276d2e83d1095b765c36399e', 'siswa52', 'aktif'),
(53, '192010122', 'Miracle Patrick Aden Ponamon', 'Bogor', '2004-10-09', 'L', 'Kristen', 'Jl.Elang G 12 Curug indah kel. Curug mekar', '2', 2019, 'anonim.png', 'udhtau3232@gmail.com', 'b82df2babbb1d663c526427eada63a9e', 'siswa53', 'aktif'),
(54, '161707056', 'Ricky Syahputra Tarigan', 'Bogor', '2004-04-11', 'L', 'Kristen', 'Jl. Semplak pilar III Kel. Semplak Kec. Bogor Barat Kota Bogor', '2', 2019, 'anonim.png', 'Rickytarigan117@gmail.com', '628ee0e65b540d3970c93bf8b8e222e8', 'siswa54', 'aktif'),
(55, '192010250', 'Aprillia Viola Wulandari', 'Bogor', '2004-04-14', 'P', 'Kristen', 'Perum permata kemang blok C1 No.15 desa tegal kec. kemang kab. Bogor', '2', 2019, 'anonim.png', 'aprilviola35@gmail.com', '7d19f106e5f0729d7a89adacb9426f1f', 'siswa55', 'aktif'),
(56, '192010137', 'Stella Victoria Imanuella Seimahuira', 'Bogor', '2003-12-12', 'P', 'Kristen', 'Perum. Curug permai. Jl. Dirgantara II Blok H.  No 2', '2', 2019, 'anonim.png', 'stellaseimahuira@gmail.com', '2510720aa7e4f40184f18a8d0b618737', 'siswa56', 'aktif'),
(57, '192010121', 'YOHANES TUMPAK PANGGABEAN', 'Bogor', '2004-04-14', 'L', 'Kristen', 'JLN. RAYA SEMPLAK PILAR RT 04/03 NO 27.', '2', 2019, 'anonim.png', 'yohanestumpak@gmail.com', '89e95b0a3f59fc7771f4069cec175e86', 'siswa57', 'aktif'),
(58, '192010109', 'Anabel Clara', 'Bogor', '2004-09-25', 'P', 'Kristen', 'Jl.madnur Gg.perintis kemang', '2', 2019, 'anonim.png', 'Anabelaaclara@gmail.com', '1b184af09c69b971188dc53edb2f4fb3', 'siswa58', 'aktif'),
(59, '192010235', 'Rendy kurnia', 'Bogor', '2003-08-19', 'L', 'Kristen', 'Curug mekad', '2', 2019, 'anonim.png', 'rendypecay@gmail.com', '1454ced4c4d217f732e41b6fbbc8a421', 'siswa59', 'aktif'),
(60, '192010197', 'Meilinda Pitaria', 'Bogor', '2004-05-17', 'P', 'Kristen', 'Semplak Pilar, H. Adang 02/03, no.103', '2', 2019, 'anonim.png', 'meilindapita17@gmail.com', '35848066eecac151fd9aa9b6a4c601a0', 'siswa60', 'aktif'),
(61, '192010059', 'Muhamad miftah fallah', 'Bogor', '2003-02-06', 'L', 'Islam', 'Perumahan curug indah jalan elang blok:G nomer:9', '2', 2019, 'anonim.png', 'Miff0623@gmail.com', '602b78b714e87ddd1d7273427f3802f4', 'siswa61', 'tidak aktif'),
(62, '192010079', 'Claresta Jeconia Arin Nuroso', 'Bogor', '2004-01-26', 'P', 'Kristen', 'Bogor, Perumahan Curug Indah jln.Garuda blok.b nomor 6 rt01/rw05 kec.bogor barat kel.curug mekar', '2', 2019, 'anonim.png', 'clarestajarinn@gmail.com', '4ab1613ea52b128faf35313ec716ee79', 'siswa62', 'tidak aktif'),
(63, '192010033', 'rifki padillah', 'Bogor', '2003-03-11', 'L', 'Islam', 'semplak caringin', '2', 2019, 'anonim.png', 'assidiqfian@gmail.com', 'b7eea077943f21b5093302ec42937b96', 'siswa63', 'tidak aktif'),
(64, '192010099.', 'Ranti pratiwi', 'Bogor', '2004-02-04', 'P', 'Islam', 'Vila mutiara bogor', '2', 2019, 'anonim.png', 'Jildanapriyanto2004@gmail.com', '009687fe2a9176b44de4bd142de567e3', 'siswa64', 'tidak aktif'),
(65, '192010139.', 'Shaffa Andinia Oktavia', 'Jakarta', '2003-10-31', 'P', 'Islam', 'Bukit Cimanggu City blok R1 no 16', '2', 2019, 'anonim.png', 'shaffaa.o31@gmail.com', '64ae94b5f3ba27ec6d46ef63e2bfce4c', 'siswa65', 'tidak aktif'),
(66, '324234', 'test', 'Sumedang', '6754-05-04', 'L', 'Konghucu', 'test', '2', 2020, 'anonim.png', 'test1', '5a105e8b9d40e1329780d62ea2265d8a', 'test1', 'tidak aktif'),
(67, '192010298', 'Aghy Mochammad Alghifary Maulana', 'Kuningan', '2003-11-24', 'L', 'ISLAM', 'Jalan medika 3b blok am 14 bumi menteng asri bogor barat', '3', 2020, 'anonim.png', 'siswa66', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(68, '192010237', 'Nova Safitri', 'Bogor', '2003-11-23', 'P', 'ISLAM', 'jl Lotus 1 blok A2 nomor 12B', '3', 2019, 'anonim.png', 'siswa67', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(69, '0045984894', 'Nadia dwi purnama', 'Bogor', '2003-12-07', 'P', 'ISLAM', 'Cijahe curug mekar rt 06/01', '3', 2019, 'anonim.png', 'siswa68', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(70, '192010256', 'Erlangga wijaya', 'Bogor', '2003-12-31', 'L', 'ISLAM', 'Jalan curug mekar', '3', 2019, 'anonim.png', 'siswa68', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(71, '192010034', 'Yunita putri mutiara', 'Bogor', '2004-06-26', 'P', 'ISLAM', 'Komplek auri blok cd no 25', '3', 2019, 'anonim.png', 'siswa69', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(72, '192010293', 'farrel prasetya', 'Bogor', '2004-07-03', 'L', 'ISLAM', 'jl.raya semplak pilar rt.04/03', '3', 2019, 'anonim.png', 'siswa69', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(73, '17112002', 'Ryan Faisal Damanik', 'Bogor', '2002-11-17', 'L', 'ISLAM', 'Jln Cijahe RT 05 RW 03', '3', 2019, 'anonim.png', 'siswa70', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(74, '192010285', 'Anggita', 'Bogor', '2003-03-01', 'P', 'ISLAM', 'Taman yasmin 6 rt 06/09', '3', 2019, 'anonim.png', 'siswa71', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(75, '192010032', 'Selma Maharani', 'Bogor', '2004-01-03', 'P', 'ISLAM', 'Cemplang jalan cijahe RT 03 RW 13', '3', 2019, 'anonim.png', 'siswa72', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(76, '192010085.', 'Kerenhapukh Angela M.P.', 'Pekanbaru', '2004-01-27', 'P', 'KRISTEN', 'Jl.Katelia 1 No 15 Taman Yasmin Bogor', '3', 2019, 'anonim.png', 'siswa73', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(77, '192010262', 'Jildan apriyanto', 'Bogor', '2020-04-24', 'L', 'ISLAM', 'Cilendek timur rt 03 rw 04', '3', 2019, 'anonim.png', 'siswa74', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(78, '192011325', 'Raihan khozin matin algoni', 'Bogor', '2003-03-02', 'L', 'ISLAM', 'Bukit cimanggu city blok t 9 no 22', '3', 2019, 'anonim.png', 'siswa75', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(79, '161707106', 'Risma Dwi Anggraini', 'Bogor', '2004-01-06', 'P', 'ISLAM', 'Cilendek timur rt03 rw04', '3', 2019, 'anonim.png', 'siswa75', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(80, '161707185', 'Fajar Nurrahman', 'Bogor', '2004-05-20', 'L', 'ISLAM', 'Jln raya semplak Rt/04/06', '3', 2019, 'anonim.png', 'siswa76', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(81, '192010232', 'Raffirabbani Panatamahdi Adizaputra', 'Bogor', '2004-06-09', 'L', 'ISLAM', 'Taman yasmin sektor 6, Jl Pinang perak raya No.20', '3', 2019, 'anonim.png', 'siswa76', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(82, '192010263', 'Ananda Ruhul Ghani', 'Bogor', '2003-12-05', 'P', 'ISLAM', 'Taman yasmin sektor VI jl.pinang perakIII no.29', '3', 2019, 'anonim.png', 'siswa77', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(83, '192010264', 'Mohamad Haziq', 'Bogor', '2004-09-03', 'L', 'ISLAM', 'Jl. Cijahe, RT: 02, RW:02, NO.17, Gang fajar', '3', 2019, 'anonim.png', 'siswa77', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(84, '161707016', 'Rafif Aditya maulana', 'Bogor', '2004-05-13', 'L', 'ISLAM', 'Semplak bogor', '3', 2019, 'anonim.png', 'siswa78', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(85, '192010092', 'Kamila humaida', 'Bogor', '2004-04-26', 'P', 'ISLAM', 'Cilendek timur', '3', 2019, 'anonim.png', 'siswa78', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(86, '192010095', 'andika rama setiaji', 'Bogor', '2004-01-06', 'L', 'ISLAM', 'Jl.Bambu apus 7 no 16', '3', 2019, 'anonim.png', 'siswa79', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(87, '192010094', 'Naufal priadna sakti', 'Jakarta', '2003-10-01', 'L', 'ISLAM', 'bukit cimanggu city', '3', 2019, 'anonim.png', 'siswa79', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(88, '161707275', 'Muhammad Dzikwan Arief.A', 'Bogor', '2004-04-11', 'L', 'ISLAM', 'Curug permai ,jln hercules 1 C.9', '3', 2019, 'anonim.png', 'siswa80', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(89, '161707276', 'Aulia Nasywaa Ulayya', 'Sumedang', '2003-11-11', 'P', 'ISLAM', 'jln cendana blok b5 no 11-12 taman pagelaran ciomas bogor', '3', 2019, 'anonim.png', 'siswa80', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(90, '161707275', 'MUHAMAD SALSA RIZKY DILAH', 'Bogor', '2004-07-08', 'L', 'ISLAM', 'Jalan Cesna, Curug Permai, Curug, Bogor, Kec. Bogor Barat', '3', 2019, 'anonim.png', 'siswa81', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(91, '192010286', 'Atira putri bandarudin', 'Palembang', '2004-01-20', 'P', 'ISLAM', 'Taman yasmin sektor 3 jalan seroja raya no 34', '3', 2019, 'anonim.png', 'siswa81', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(92, '192010285', 'Dwi Praja Agustian', 'Bogor', '2004-08-30', 'L', 'ISLAM', 'Cilendek timur', '3', 2019, 'anonim.png', 'siswa82', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(93, '192010283', 'Ali Maulana', 'Jakarta', '2003-10-04', 'L', 'ISLAM', 'Gg.Mangga Semplak Caringin', '3', 2019, 'anonim.png', 'siswa82', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(94, '181910301', 'Dafa Januar', 'Bogor', '2003-01-01', 'L', 'ISLAM', 'Jl. Pipit Raya Blok PTB 8, Kecamatan Ciomas, Kelurahan Padasuka, Kabupaten Bogor', '3', 2019, 'anonim.png', 'siswa83', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'aktif'),
(95, '301026104002', 'Ervin', 'Bogor', '2020-11-01', 'L', 'Islam', 'test', '1', 2019, 'anonim.png', 'ervin', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'aktif'),
(96, '32423423423', 'Farhan', 'Bogor', '2020-07-02', 'L', 'Islam', 'test', '1', 2019, 'anonim.png', 'farhan', '202cb962ac59075b964b07152d234b70', '123', 'aktif'),
(97, 'afcasdffffffffefffff', 'Ervin', 'Jakarta', '2020-11-25', 'L', 'Islam', 'qefeqfqe', '16', 2008, 'anonim.png', 'testing', 'ae2b1fca515949e5d54fb22b8ed95575', 'testing', 'tidak aktif'),
(98, '4545467676645555', 'Ervin', 'Bogor', '2020-12-04', 'L', 'Islam', 'test', '3', 2019, 'anonim.png', 'testing1', '6b7330782b2feb4924020cc4a57782a9', 'testing1', 'tidak aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal_essay`
--

CREATE TABLE `tb_soal_essay` (
  `id_essay` int(11) NOT NULL,
  `id_tc` int(5) NOT NULL,
  `pertanyaan` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tgl_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_soal_essay`
--

INSERT INTO `tb_soal_essay` (`id_essay`, `id_tc`, `pertanyaan`, `gambar`, `tgl_buat`) VALUES
(1, 12, '<p>test 123</p>', '', '2020-11-07'),
(2, 11, '<p>test 123</p>', '', '2020-11-07'),
(3, 13, '<p>test</p>', '', '2020-11-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal_pilgan`
--

CREATE TABLE `tb_soal_pilgan` (
  `id_pilgan` int(11) NOT NULL,
  `id_tc` int(5) NOT NULL,
  `pertanyaan` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `pil_a` text NOT NULL,
  `pil_b` text NOT NULL,
  `pil_c` text NOT NULL,
  `pil_d` text NOT NULL,
  `pil_e` text NOT NULL,
  `kunci` varchar(2) NOT NULL,
  `tgl_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_soal_pilgan`
--

INSERT INTO `tb_soal_pilgan` (`id_pilgan`, `id_tc`, `pertanyaan`, `gambar`, `pil_a`, `pil_b`, `pil_c`, `pil_d`, `pil_e`, `kunci`, `tgl_buat`) VALUES
(1, 11, '<p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">Ngaran lain tina Biantara nyaeta â€¦</span><br></p>', '', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px; background-color: rgb(249, 249, 249);\">Guneman</span><br></p>', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">Ngadongeng</span><br></p>', '<p><span style=\"font-family: Arial;\">ï»¿</span><span style=\"font-family: undefined;\">ï»¿</span><span style=\"font-family: undefined;\">ï»¿</span><span style=\"font-family: Arial;\">ï»¿</span><span style=\"font-family: Arial;\">Pidato</span><span style=\"font-family: &quot;Arial Black&quot;;\">ï»¿</span><span style=\"font-family: &quot;Comic Sans MS&quot;;\">ï»¿</span></p>', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">Sawala</span><br></p>', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px; background-color: rgb(249, 249, 249);\">Sajak</span><br></p>', 'C', '2020-11-02'),
(2, 12, '<p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">Ngaran lain tina Biantara nyaeta â€¦</span><br></p>', '', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px; background-color: rgb(249, 249, 249);\">Guneman</span><br></p>', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">Ngadongeng</span><br></p>', '<p><span style=\"font-family: Arial;\">ï»¿</span><span style=\"font-family: undefined;\">ï»¿</span><span style=\"font-family: undefined;\">ï»¿</span><span style=\"font-family: Arial;\">ï»¿</span><span style=\"font-family: Arial;\">Pidato</span><span style=\"font-family: &quot;Arial Black&quot;;\">ï»¿</span><span style=\"font-family: &quot;Comic Sans MS&quot;;\">ï»¿</span></p>', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">Sawala</span><br></p>', '<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px; background-color: rgb(249, 249, 249);\">Sajak</span><br></p>', 'C', '2020-11-02'),
(4, 11, '<p>Kalemahan biantara make metode ngapalkeun nyaeta<br></p>', '', '<p>Babari inget<br></p>', '<p>Ngaguluyur<br></p>', '<p>Sok poho dei<br></p>', '<p>Bisa maca deui<br></p>', '<p>Komunikatif<br></p>', 'D', '2020-11-02'),
(5, 12, '<p>Kalemahan biantara make metode ngapalkeun nyaeta<br></p>', '', '<p>Babari inget<br></p>', '<p>Ngaguluyur<br></p>', '<p>Sok poho dei<br></p>', '<p>Bisa maca deui<br></p>', '<p>Komunikatif<br></p>', 'D', '2020-11-02'),
(6, 13, '<p>test</p>', '', '<p>1</p>', '<p>2</p>', '<p>3</p>', '<p>4</p>', '<p>5</p>', 'A', '2020-11-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_soal_upload`
--

CREATE TABLE `tb_soal_upload` (
  `id_upload` int(11) NOT NULL,
  `id_tu` int(5) NOT NULL,
  `pertanyaan` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tgl_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_soal_upload`
--

INSERT INTO `tb_soal_upload` (`id_upload`, `id_tu`, `pertanyaan`, `gambar`, `tgl_buat`) VALUES
(1, 2, '<p><br></p><table class=\"table\" style=\"max-width: 100%; border-spacing: 0px; width: 837.778px; margin-bottom: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><tbody><tr id=\"pertanyaan-35\"><td style=\"padding: 8px; line-height: 20px; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: rgb(213, 213, 213) !important;\"><div class=\"pertanyaan\"><div class=\"btn-group pull-right\" style=\"display: inline-block; font-size: 0px; white-space: nowrap; float: right; margin-left: 10px;\">&nbsp;<a href=\"http://localhost/el_11/index.php/tugas/hapus_soal/3/35/http%3A%252F%252Flocalhost%252Fel_11%252Findex.php%252Ftugas%252Fmanajemen_soal%252F3\" class=\"btn btn-small btn-default\" data-toggle=\"tooltip\" title=\"\" data-original-title=\"Hapus Pertanyaan\" style=\"color: rgb(118, 118, 118); padding: 4px 10px; margin-bottom: 0px; font-size: 13px; line-height: 1.42857; text-shadow: rgba(255, 255, 255, 0.75) 0px 1px 1px; background-color: rgb(250, 250, 250); background-image: none; background-repeat: repeat-x; border-color: rgb(237, 237, 237); border-radius: 0px 3px 3px 0px; box-shadow: rgba(255, 255, 255, 0.2) 0px 1px 0px inset, rgba(0, 0, 0, 0.05) 0px 1px 2px; font-weight: 400; margin-left: -1px;\"><span class=\"icon-trash\" style=\"display: inline; width: auto; height: auto; line-height: 20px; vertical-align: baseline; background-image: none; background-position: 0% 0%; background-repeat: repeat; margin-top: 0px; font-family: FontAwesome; text-decoration: inherit; -webkit-font-smoothing: antialiased; font-size: 14px; min-width: 16px;\"></span></a></div><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">1. Dihandap ieu nyaeta salah sahiji faktor/unsur anu penting dina kagiatan pidato, pek jelaakeun sing jentre!</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">a. Tatag nyaritana</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">b. Aktual temana</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">c. Munel eusina</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">d. Alus basana</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">e. Ngandung wirahma&nbsp;</p></div></td></tr></tbody></table>', '', '2020-11-02'),
(2, 3, '<p><br></p><table class=\"table\" style=\"max-width: 100%; border-spacing: 0px; width: 837.778px; margin-bottom: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><tbody><tr id=\"pertanyaan-35\"><td style=\"padding: 8px; line-height: 20px; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-color: rgb(213, 213, 213) !important;\"><div class=\"pertanyaan\"><div class=\"btn-group pull-right\" style=\"display: inline-block; font-size: 0px; white-space: nowrap; float: right; margin-left: 10px;\">&nbsp;<a href=\"http://localhost/el_11/index.php/tugas/hapus_soal/3/35/http%3A%252F%252Flocalhost%252Fel_11%252Findex.php%252Ftugas%252Fmanajemen_soal%252F3\" class=\"btn btn-small btn-default\" data-toggle=\"tooltip\" title=\"\" data-original-title=\"Hapus Pertanyaan\" style=\"color: rgb(118, 118, 118); padding: 4px 10px; margin-bottom: 0px; font-size: 13px; line-height: 1.42857; text-shadow: rgba(255, 255, 255, 0.75) 0px 1px 1px; background-color: rgb(250, 250, 250); background-image: none; background-repeat: repeat-x; border-color: rgb(237, 237, 237); border-radius: 0px 3px 3px 0px; box-shadow: rgba(255, 255, 255, 0.2) 0px 1px 0px inset, rgba(0, 0, 0, 0.05) 0px 1px 2px; font-weight: 400; margin-left: -1px;\"><span class=\"icon-trash\" style=\"display: inline; width: auto; height: auto; line-height: 20px; vertical-align: baseline; background-image: none; background-position: 0% 0%; background-repeat: repeat; margin-top: 0px; font-family: FontAwesome; text-decoration: inherit; -webkit-font-smoothing: antialiased; font-size: 14px; min-width: 16px;\"></span></a></div><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">1. Dihandap ieu nyaeta salah sahiji faktor/unsur anu penting dina kagiatan pidato, pek jelaakeun sing jentre!</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">a. Tatag nyaritana</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">b. Aktual temana</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">c. Munel eusina</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">d. Alus basana</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px;\">e. Ngandung wirahma&nbsp;</p></div></td></tr></tbody></table>', '', '2020-11-02'),
(6, 1, '<p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">1. Dihandap ieu nyaeta salah sahiji faktor/unsur anu penting dina kagiatan pidato, pek jelaakeun sing jentre!</span></p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">a. Tatag nyaritana</span></p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">b. Aktual temana</span></p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">c. Munel eusina</span></p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">d. Alus basana</span></p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">e. Ngandung wirahma&nbsp;</span></p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">2. Pek jieun conto bagian eusi pidato anu temana ngeunaan\"Ngajalanjeun kahirupan sapopoe dina kaayan New Normal\"</span></p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">3. Cek hideup, saha wae tokoh di Indonesia anu dianggap boga kaparigeulan anu alus lamun keur pidato?</span></p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">4. Dina teknik/metode pidato aya nu disebut metode ngapalkeun naskah (ditalar), sebutkeun kaleuwihan&nbsp;jeung kakuranganana&nbsp;lamun urang ngagunakeun metode eta?</span></p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">5. Jeulaskeun naon bedana biantara resmi jeung teu resmi?</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">6. Dihandap ieu nyaeta salah sahiji faktor/unsur anu penting dina kagiatan pidato, pek jelaakeun sing jentre!</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">a. Tatag nyaritana</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">b. Aktual temana</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">c. Munel eusina</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">d. Alus basana</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">e. Ngandung wirahma&nbsp;</p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><br></span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><br></span></p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><br></span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><br></span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><br></span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><br></span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><br></span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><br></span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><br></span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><br></span><br></p>', '', '2020-11-02'),
(7, 5, '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">MALURUH HARTI BABASAN JEUNG PARIBASA</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">Ieu dihandap aya babasan jeung paribasa, pek ku hideup teangan hartina. Sanggeus kitu tuluy larapkeun kana kalimah.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">Conto&nbsp;&nbsp;&nbsp; : Buntut kasiran</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Harti&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Pedit, koret, medit</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Kalimat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Nyai endit teh kacida buntut kasiran na, teu daek pisan barang bere kabatur.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">&nbsp;</p><ol style=\"padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 25px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><li style=\"line-height: 20px;\">Jauh ka bedug</li><li style=\"line-height: 20px;\">Bodo alewoh</li><li style=\"line-height: 20px;\">Hampang birit</li><li style=\"line-height: 20px;\">Ceuli lentaheun</li><li style=\"line-height: 20px;\">Laer gado</li><li style=\"line-height: 20px;\">Sahaok kadua gaplok</li><li style=\"line-height: 20px;\">Elmu tungtut dunya siar</li><li style=\"line-height: 20px;\">Adean ku kuda bereum</li><li style=\"line-height: 20px;\">Ngaliarkeun taleus ateul</li><li style=\"line-height: 20px;\">Lamun keuyeung tangtu pareng</li></ol>', '', '2020-11-02'),
(8, 6, '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">MALURUH HARTI BABASAN JEUNG PARIBASA</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">Ieu dihandap aya babasan jeung paribasa, pek ku hideup teangan hartina. Sanggeus kitu tuluy larapkeun kana kalimah.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">Conto&nbsp;&nbsp;&nbsp; : Buntut kasiran</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Harti&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Pedit, koret, medit</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Kalimat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Nyai endit teh kacida buntut kasiran na, teu daek pisan barang bere kabatur.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">&nbsp;</p><ol style=\"padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 25px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><li style=\"line-height: 20px;\">Jauh ka bedug</li><li style=\"line-height: 20px;\">Bodo alewoh</li><li style=\"line-height: 20px;\">Hampang birit</li><li style=\"line-height: 20px;\">Ceuli lentaheun</li><li style=\"line-height: 20px;\">Laer gado</li><li style=\"line-height: 20px;\">Sahaok kadua gaplok</li><li style=\"line-height: 20px;\">Elmu tungtut dunya siar</li><li style=\"line-height: 20px;\">Adean ku kuda bereum</li><li style=\"line-height: 20px;\">Ngaliarkeun taleus ateul</li><li style=\"line-height: 20px;\">Lamun keuyeung tangtu pareng</li></ol>', '', '2020-11-02'),
(9, 4, '<p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">MALURUH HARTI BABASAN JEUNG PARIBASA</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">Ieu dihandap aya babasan jeung paribasa, pek ku hideup teangan hartina. Sanggeus kitu tuluy larapkeun kana kalimah.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">Conto&nbsp;&nbsp;&nbsp; : Buntut kasiran</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Harti&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Pedit, koret, medit</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Kalimat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Nyai endit teh kacida buntut kasiran na, teu daek pisan barang bere kabatur.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">&nbsp;</p><ol style=\"padding: 0px; margin-right: 0px; margin-bottom: 10px; margin-left: 25px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><li style=\"line-height: 20px;\">Jauh ka bedug</li><li style=\"line-height: 20px;\">Bodo alewoh</li><li style=\"line-height: 20px;\">Hampang birit</li><li style=\"line-height: 20px;\">Ceuli lentaheun</li><li style=\"line-height: 20px;\">Laer gado</li><li style=\"line-height: 20px;\">Sahaok kadua gaplok</li><li style=\"line-height: 20px;\">Elmu tungtut dunya siar</li><li style=\"line-height: 20px;\">Adean ku kuda bereum</li><li style=\"line-height: 20px;\">Ngaliarkeun taleus ateul</li><li style=\"line-height: 20px;\">Lamun keuyeung tangtu pareng</li></ol>', '', '2020-11-02'),
(10, 8, '<p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">1. Naon nu dimaksud sisindiran tÃ©h?</span></p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">2.Ditilik tina wangunna sisindiran tÃ©h dibagi jadi sabaraha bagian? Sebutkeun!</span></p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">3.Sebutkeun naon waÃ© ciri-ciri sisindiran tÃ©h?</span></p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">4.Ditilik tina eusina sisindiran dibagi jadi sabaraha bagian? Sebutkeun!</span></p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">5.</span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">Naon eusi tina wawangsalan ieu di handap!</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">a. Belut sisit sabadarat</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">&nbsp; &nbsp;kapiraray siang weungi</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">b. Gedong ngambang di sagara</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">&nbsp; &nbsp; Ulah kapalang nya bela</p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><br></span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><br></span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><br></span><br></p>', '', '2020-11-02'),
(11, 9, '<p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">1. Naon nu dimaksud sisindiran tÃ©h?</span></p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">2.Ditilik tina wangunna sisindiran tÃ©h dibagi jadi sabaraha bagian? Sebutkeun!</span></p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">3.Sebutkeun naon waÃ© ciri-ciri sisindiran tÃ©h?</span></p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">4.Ditilik tina eusina sisindiran dibagi jadi sabaraha bagian? Sebutkeun!</span></p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">5.</span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">Naon eusi tina wawangsalan ieu di handap!</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">a. Belut sisit sabadarat</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">&nbsp; &nbsp;kapiraray siang weungi</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">b. Gedong ngambang di sagara</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">&nbsp; &nbsp; Ulah kapalang nya bela</p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><br></span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><br></span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><br></span><br></p>', '', '2020-11-02'),
(12, 7, '<p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">1. Naon nu dimaksud sisindiran tÃ©h?</span></p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">2.Ditilik tina wangunna sisindiran tÃ©h dibagi jadi sabaraha bagian? Sebutkeun!</span></p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">3.Sebutkeun naon waÃ© ciri-ciri sisindiran tÃ©h?</span></p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">4.Ditilik tina eusina sisindiran dibagi jadi sabaraha bagian? Sebutkeun!</span></p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">5.</span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">Naon eusi tina wawangsalan ieu di handap!</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">a. Belut sisit sabadarat</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">&nbsp; &nbsp;kapiraray siang weungi</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">b. Gedong ngambang di sagara</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\">&nbsp; &nbsp; Ulah kapalang nya bela</p><p><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><br></span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><br></span><span style=\"color: rgb(119, 119, 119); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 13px;\"><br></span><br></p>', '', '2020-11-02'),
(13, 8, '<p>test<img src=\"./img-uploads/1606183644.jpg\" style=\"width: 25%;\"></p>', '', '2020-11-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_topik_cbt`
--

CREATE TABLE `tb_topik_cbt` (
  `id_tc` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `id_mapel` int(5) NOT NULL,
  `tgl_buat` date NOT NULL,
  `pembuat` varchar(10) NOT NULL,
  `waktu_soal` int(8) NOT NULL,
  `info` varchar(250) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_topik_cbt`
--

INSERT INTO `tb_topik_cbt` (`id_tc`, `judul`, `id_kelas`, `id_mapel`, `tgl_buat`, `pembuat`, `waktu_soal`, `info`, `status`) VALUES
(11, 'Ulangan Harian 1 Bahasa Sunda', 1, 18, '2020-11-23', '20', 3600, 'Kerjakeun soal dihandap ieu!', 'aktif'),
(12, 'Ulangan Harian 1 Bahasa Sunda', 2, 18, '2020-11-23', '20', 3600, 'Kerjakeun soal dihandap ieu!', 'aktif'),
(13, 'Test', 1, 18, '2020-11-23', '20', 5400, 'test', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_topik_tugas`
--

CREATE TABLE `tb_topik_tugas` (
  `id_tu` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_kelas` int(5) NOT NULL,
  `id_mapel` int(5) NOT NULL,
  `tgl_buat` date NOT NULL,
  `pembuat` varchar(10) NOT NULL,
  `tgl_pengumpulan` date NOT NULL,
  `info` varchar(250) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_topik_tugas`
--

INSERT INTO `tb_topik_tugas` (`id_tu`, `judul`, `id_kelas`, `id_mapel`, `tgl_buat`, `pembuat`, `tgl_pengumpulan`, `info`, `status`) VALUES
(1, 'Biantara (pidato)', 1, 18, '2020-11-02', '20', '0000-00-00', '<p>Biantara (pidato)<br></p>', 'aktif'),
(2, 'Biantara (pidato)', 2, 18, '2020-11-02', '20', '0000-00-00', '<p>Biantara (pidato)<br></p>', 'aktif'),
(3, 'Biantara (pidato)', 3, 18, '2020-11-02', '20', '0000-00-00', '<p>Biantara (pidato)<br></p>', 'aktif'),
(4, 'PAKEMAN BASA (BABASAN JEUNG PARIBASA)', 1, 18, '2020-11-09', '20', '2020-11-29', '<p>PAKEMAN BASA (BABASAN JEUNG PARIBASA)<br></p>', 'aktif'),
(5, 'PAKEMAN BASA (BABASAN JEUNG PARIBASA)', 2, 18, '2020-11-09', '20', '0000-00-00', '<p>PAKEMAN BASA (BABASAN JEUNG PARIBASA)<br></p>', 'aktif'),
(6, 'PAKEMAN BASA (BABASAN JEUNG PARIBASA)', 3, 18, '2020-11-09', '20', '0000-00-00', '<p>PAKEMAN BASA (BABASAN JEUNG PARIBASA)<br></p>', 'aktif'),
(7, 'TUGAS SISINDIRAN', 1, 18, '2020-11-01', '20', '0000-00-00', '<p>TUGAS SISINDIRAN<br></p>', 'aktif'),
(8, 'TUGAS SISINDIRAN', 2, 18, '2020-11-16', '20', '0000-00-00', '<p>TUGAS SISINDIRAN<br></p>', 'aktif'),
(9, 'TUGAS SISINDIRAN', 3, 18, '2020-11-01', '20', '0000-00-00', '<p>TUGAS SISINDIRAN<br></p>', 'aktif'),
(10, 'Test Tugas', 1, 18, '2020-11-30', '20', '0000-00-00', '<p>test</p>', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_file_materi`
--
ALTER TABLE `tb_file_materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indeks untuk tabel `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_jawaban_upload`
--
ALTER TABLE `tb_jawaban_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_jurnal_harian`
--
ALTER TABLE `tb_jurnal_harian`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_kelas_ajar`
--
ALTER TABLE `tb_kelas_ajar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_mapel_ajar`
--
ALTER TABLE `tb_mapel_ajar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_nilai_essay`
--
ALTER TABLE `tb_nilai_essay`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_nilai_pilgan`
--
ALTER TABLE `tb_nilai_pilgan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_nilai_upload`
--
ALTER TABLE `tb_nilai_upload`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indeks untuk tabel `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tb_soal_essay`
--
ALTER TABLE `tb_soal_essay`
  ADD PRIMARY KEY (`id_essay`);

--
-- Indeks untuk tabel `tb_soal_pilgan`
--
ALTER TABLE `tb_soal_pilgan`
  ADD PRIMARY KEY (`id_pilgan`);

--
-- Indeks untuk tabel `tb_soal_upload`
--
ALTER TABLE `tb_soal_upload`
  ADD PRIMARY KEY (`id_upload`);

--
-- Indeks untuk tabel `tb_topik_cbt`
--
ALTER TABLE `tb_topik_cbt`
  ADD PRIMARY KEY (`id_tc`);

--
-- Indeks untuk tabel `tb_topik_tugas`
--
ALTER TABLE `tb_topik_tugas`
  ADD PRIMARY KEY (`id_tu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_file_materi`
--
ALTER TABLE `tb_file_materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_jawaban_upload`
--
ALTER TABLE `tb_jawaban_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_jurnal_harian`
--
ALTER TABLE `tb_jurnal_harian`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas_ajar`
--
ALTER TABLE `tb_kelas_ajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel_ajar`
--
ALTER TABLE `tb_mapel_ajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai_essay`
--
ALTER TABLE `tb_nilai_essay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai_pilgan`
--
ALTER TABLE `tb_nilai_pilgan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai_upload`
--
ALTER TABLE `tb_nilai_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_presensi`
--
ALTER TABLE `tb_presensi`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT untuk tabel `tb_soal_essay`
--
ALTER TABLE `tb_soal_essay`
  MODIFY `id_essay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_soal_pilgan`
--
ALTER TABLE `tb_soal_pilgan`
  MODIFY `id_pilgan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_soal_upload`
--
ALTER TABLE `tb_soal_upload`
  MODIFY `id_upload` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_topik_cbt`
--
ALTER TABLE `tb_topik_cbt`
  MODIFY `id_tc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_topik_tugas`
--
ALTER TABLE `tb_topik_tugas`
  MODIFY `id_tu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
