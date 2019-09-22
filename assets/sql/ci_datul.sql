-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Sep 2019 pada 06.04
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_datul`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gallery`
--

CREATE TABLE `tb_gallery` (
  `id_gallery` int(11) NOT NULL,
  `gallery` text NOT NULL,
  `jenis` enum('Pengelolaan Dana','Laporan','Album Foto') NOT NULL,
  `judul` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_gallery`
--

INSERT INTO `tb_gallery` (`id_gallery`, `gallery`, `jenis`, `judul`) VALUES
(2, 'daftart.PNG', 'Pengelolaan Dana', 'Hey Jude'),
(8, 'Mask_Group_1.png', 'Laporan', 'Kotak Masuk'),
(9, 'siswa_icon.png', 'Pengelolaan Dana', 'Pesan Terkirim');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` text,
  `status` enum('Lurah','Wakil Lurah','PNS','Honor','Kontrak','Warga') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`, `status`) VALUES
(1, 'Developer', 'Kontrak'),
(2, 'NONE', NULL),
(3, 'Kepala Desa', 'PNS'),
(4, 'Sekertaris Desa', 'Honor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laporan_surat`
--

CREATE TABLE `tb_laporan_surat` (
  `id_laporan_surat` int(11) NOT NULL,
  `tgl_surat` date DEFAULT NULL,
  `tgl_kirim` date DEFAULT NULL,
  `id_surat` int(11) DEFAULT NULL,
  `kop_kecamatan` text,
  `kop_kelurahan` text,
  `kop_alamat` text,
  `no_urut_surat` text,
  `bulan_surat` text,
  `tahun_surat` text,
  `id_pemohon` int(11) DEFAULT NULL,
  `hp` text,
  `id_pembuat` int(11) DEFAULT NULL,
  `keperluan` text,
  `data_detail` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_laporan_surat`
--

INSERT INTO `tb_laporan_surat` (`id_laporan_surat`, `tgl_surat`, `tgl_kirim`, `id_surat`, `kop_kecamatan`, `kop_kelurahan`, `kop_alamat`, `no_urut_surat`, `bulan_surat`, `tahun_surat`, `id_pemohon`, `hp`, `id_pembuat`, `keperluan`, `data_detail`) VALUES
(8, '2019-09-20', NULL, 1, 'BARABAI', 'Binjai Pure', 'Jl.Desa Binjai Pure No.1 Rt00 Rw00', '23', '09', '2019', 254, NULL, 1011210246, NULL, NULL),
(10, '2019-09-20', NULL, 1, 'BARABAI', 'Binjai Pure', 'Jl.Desa Binjai Pure No.1 Rt00 Rw00', '1', '09', '2019', 255, NULL, 1011210246, NULL, NULL),
(11, '2019-09-20', NULL, 2, 'BARABAI', 'Binjai Pure', 'Jl.Desa Binjai Pure No.1 Rt00 Rw00', '23', '09', '2019', 258, NULL, 1011210246, NULL, NULL),
(12, '2019-09-20', NULL, 2, 'BARABAI', 'Binjai Pure', 'Jl.Desa Binjai Pure No.1 Rt00 Rw00', '423', '09', '2019', 252, NULL, 1011210246, NULL, NULL),
(13, '2019-09-20', NULL, 2, 'BARABAI', 'Binjai Pure', 'Jl.Desa Binjai Pure No.1 Rt00 Rw00', '43', '09', '2019', 257, NULL, 1011210246, NULL, NULL),
(14, '2019-09-20', NULL, 3, 'BARABAI', 'Binjai Pure', 'Jl.Desa Binjai Pure No.1 Rt00 Rw00', '2', '09', '2019', 258, NULL, 1011210246, NULL, NULL),
(15, '2019-09-20', NULL, 3, 'BARABAI', 'Binjai Pure', 'Jl.Desa Binjai Pure No.1 Rt00 Rw00', '3', '09', '2019', 250, NULL, 1011210246, NULL, NULL),
(16, '2019-09-20', NULL, 3, 'BARABAI', 'Binjai Pure', 'Jl.Desa Binjai Pure No.1 Rt00 Rw00', '5', '09', '2019', 255, NULL, 1011210246, NULL, NULL),
(17, '2019-09-20', NULL, 4, 'BARABAI', 'Binjai Pure', 'Jl.Desa Binjai Pure No.1 Rt00 Rw00', '1', '09', '2019', 258, NULL, 1011210246, NULL, NULL),
(18, '2019-09-20', NULL, 4, 'BARABAI', 'Binjai Pure', 'Jl.Desa Binjai Pure No.1 Rt00 Rw00', '2', '09', '2019', 254, NULL, 1011210246, NULL, NULL),
(19, '2019-09-20', NULL, 4, 'BARABAI', 'Binjai Pure', 'Jl.Desa Binjai Pure No.1 Rt00 Rw00', '3', '09', '2019', 254, NULL, 1011210246, NULL, NULL),
(20, '2019-09-20', NULL, 4, 'BARABAI', 'Binjai Pure', 'Jl.Desa Binjai Pure No.1 Rt00 Rw00', '5', '09', '2019', 256, NULL, 1011210246, NULL, NULL),
(21, '2019-09-20', NULL, 4, 'BARABAI', 'Binjai Pure', 'Jl.Desa Binjai Pure No.1 Rt00 Rw00', '6', '09', '2019', 250, NULL, 1011210246, NULL, NULL),
(22, '2019-09-20', NULL, 3, 'BARABAI', 'Binjai Pure', 'Jl.Desa Binjai Pure No.1 Rt00 Rw00', '', '09', '2019', 258, NULL, 1011210246, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mutasi`
--

CREATE TABLE `tb_mutasi` (
  `id_mutasi` int(11) NOT NULL,
  `no_surat` text NOT NULL,
  `nama` text NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `perihal` longtext NOT NULL,
  `jenis_mutasi` enum('Masuk','Keluar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mutasi`
--

INSERT INTO `tb_mutasi` (`id_mutasi`, `no_surat`, `nama`, `tanggal_masuk`, `perihal`, `jenis_mutasi`) VALUES
(1, '1', 'Chairul Anam', '2019-09-01', 'Hallo Jude\r\n', 'Masuk'),
(3, '2', 'Sri Magfirah', '2019-09-20', '-', 'Masuk'),
(4, '123', 'Nami Channn', '2019-09-03', 'Hallo World', 'Keluar'),
(5, '22', 'JANSON FRIANDO NAINGGOLAN', '2019-09-20', '-', 'Keluar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profil_desa`
--

CREATE TABLE `tb_profil_desa` (
  `id_desa` int(11) NOT NULL,
  `nama_desa` text,
  `nama_kecamatan` text,
  `nama_kabupaten` text,
  `alamat` text NOT NULL,
  `telpon` text NOT NULL,
  `kode_pos` text NOT NULL,
  `klasifikasi` enum('Desa','Kelurahan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_profil_desa`
--

INSERT INTO `tb_profil_desa` (`id_desa`, `nama_desa`, `nama_kecamatan`, `nama_kabupaten`, `alamat`, `telpon`, `kode_pos`, `klasifikasi`) VALUES
(1, 'Binjai Pure', 'BARABAI', 'Hulu Sungai Tengah', 'Jl.Desa Binjai Pure No.1 Rt00 Rw00', '092217380171', '12345', 'Desa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id_surat` int(11) NOT NULL,
  `nama_surat` text NOT NULL,
  `kode_surat` text NOT NULL,
  `icon` text NOT NULL,
  `bg` text NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_surat`
--

INSERT INTO `tb_surat` (`id_surat`, `nama_surat`, `kode_surat`, `icon`, `bg`, `url`) VALUES
(1, 'Keterangan Kematian', 'SKMT', '-', '-', 'surat/SKMT'),
(2, 'Keterangan Usaha', 'SKU', '-', '-', 'surat/SKU'),
(3, 'Pengantar KTP', 'PKTP', '-', '-', 'surat/PKTP'),
(4, 'Pengantar Nikah', 'PNIK', '-', '-', 'surat/PNIK'),
(5, 'Pindah Datang', 'PINDA', '-', '-', 'surat/PINDA'),
(6, 'Pindah Keluar', 'PINKEL', '-', '-', 'surat/PINKEL'),
(7, 'Surat Kuasa', 'SKSA', '-', '-', 'surat/SKSA'),
(8, 'Pernyataan Jual Beli Putus', 'PJBP', '-', '-', 'surat/PJBP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nik` text,
  `nama_user` text,
  `jk` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `tmpt_lhr` text,
  `tgl_lhr` date DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `foto` text,
  `password` text,
  `role` enum('Super Admin','Admin','User') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nik`, `nama_user`, `jk`, `tmpt_lhr`, `tgl_lhr`, `id_jabatan`, `foto`, `password`, `role`) VALUES
(856283495, '54321', 'Nami Chan', 'Perempuan', 'Kandangan', '1997-06-16', 2, 'ben-curry-jH-pSc3166Y-unsplash.jpg', '$2y$10$fIdlLeC.e3D3yFR/IB.8se1KCxfaJIphbrk31pthCpCfsvzTzAT0S', 'User'),
(1011210246, '12345', 'Chairul Anam,S.Kom', 'Laki-Laki', 'Kandangan', '1997-06-16', 1, 'logo.png', '$2y$10$F/yU8m.XkEPJT1.R/OorT.XUO2MiFIxq6PX.f0atax7XjaK9L2r2O', 'Super Admin'),
(1830894579, '123456789', 'Raudatul Jannah', 'Perempuan', 'Barabai', '2019-09-20', 3, 'default.jpg', '$2y$10$85kMe1NJV2SBG8qFCuk3I.q1tY2QeqlxyOrU3F5pX1ErkD9RI1Tci', 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_warga`
--

CREATE TABLE `tb_warga` (
  `id_warga` int(11) NOT NULL,
  `namadesa_kel` text,
  `no_kk` text,
  `nik` text,
  `nama_lengkap` text,
  `jk` text,
  `tmpt_lhr` text,
  `tgl_lhr` text,
  `nama_ibu` text,
  `nama_ayah` text,
  `gol_darah` text,
  `agama` text,
  `pendidikan_akhir` text,
  `pekerjaan` text,
  `stts_hub_kel` text,
  `status_kawin` text,
  `alamat` text,
  `no_rt` text,
  `no_rw` text,
  `status_pendudu` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_warga`
--

INSERT INTO `tb_warga` (`id_warga`, `namadesa_kel`, `no_kk`, `nik`, `nama_lengkap`, `jk`, `tmpt_lhr`, `tgl_lhr`, `nama_ibu`, `nama_ayah`, `gol_darah`, `agama`, `pendidikan_akhir`, `pekerjaan`, `stts_hub_kel`, `status_kawin`, `alamat`, `no_rt`, `no_rw`, `status_pendudu`) VALUES
(250, '2016-BINJAI PIRUA', '6307040102180003', '6307045005860002', 'NORHALIMAH', 'PEREMPUAN', 'BINJAI PEMANGKIH', '10-05-1986', 'JUMRIAH', 'BASERI', 'TIDAK TAHU', 'TIDAK TAHU', 'TAMAT SD', 'MENGURUS_RUMAH_TANGGA', '3 - ISTRI', 'KAWIN', NULL, '1', '1', 'AKTIF'),
(251, '2016-BINJAI PIRUA', '6307040108110001', '6307040205820002', 'SURIANI', 'LAKI-LAKI', 'BINJAI PIRUA', '02-05-1982', 'ARBAINAH', 'AHMAD', 'TIDAK TAHU', 'TIDAK TAHU', 'SLTP', 'WIRASWASTA', '1 - KEPALA KELUARGA', 'KAWIN', NULL, '1', '1', 'AKTIF'),
(252, '2016-BINJAI PIRUA', '6307040112100005', '6307040103620003', 'KASERANI', 'LAKI-LAKI', 'BINJAIPEMANGKIH', '01-03-1962', 'BADARA', 'SABERI', 'TIDAK TAHU', 'TIDAK TAHU', 'TAMAT SD', 'PETANI_PEKEBUN', '1 - KEPALA KELUARGA', 'KAWIN', NULL, '1', '1', 'AKTIF'),
(253, '2016-BINJAI PIRUA', '6307040112100005', '6307044609700005', 'MAISARAH', 'PEREMPUAN', 'BINJAI PEMANGKIH', '06-09-1970', 'SABARIAH', 'MASRI', 'TIDAK TAHU', 'TIDAK TAHU', 'TAMAT SD', 'PETANI_PEKEBUN', '3 - ISTRI', 'KAWIN', NULL, '1', '1', 'AKTIF'),
(254, '2016-BINJAI PIRUA', '6307040112100005', '6307042006970003', 'AKHMAD FAUZAN', 'LAKI-LAKI', 'BINJAI PIRUA', '20-06-1997', 'MAISARAH', 'KASRANI', 'TIDAK TAHU', 'TIDAK TAHU', 'TAMAT SD', 'BELUM_TIDAK_BEKERJA', '4 - ANAK', 'BELUM KAWIN', NULL, '1', '1', 'AKTIF'),
(255, '2016-BINJAI PIRUA', '6307040112100005', '6307044706890008', 'SITI MARIANA', 'PEREMPUAN', 'BINJAI PIRUA', '07-06-1989', 'MAISARAH', 'KASERANI', 'TIDAK TAHU', 'TIDAK TAHU', 'TAMAT SD', 'BELUM_TIDAK_BEKERJA', '4 - ANAK', 'BELUM KAWIN', NULL, '1', '1', 'AKTIF'),
(256, '2016-BINJAI PIRUA', '6307040208170005', '6307045905710002', 'SABARIAH', 'PEREMPUAN', 'BINJAI PIRUA', '19-05-1971', 'MISI', 'HERMAN', 'TIDAK TAHU', 'TIDAK TAHU', 'TAMAT SD', 'PETANI_PEKEBUN', '1 - KEPALA KELUARGA', 'BELUM KAWIN', NULL, '1', '1', 'AKTIF'),
(257, '2016-BINJAI PIRUA', '6307040212150002', '6307044509890003', 'RAHIMAH', 'PEREMPUAN', 'BINJAI PIRUA', '05-09-1989', 'SALASIAH', 'RAHMADI', 'TIDAK TAHU', 'TIDAK TAHU', 'SLTP', 'BELUM_TIDAK_BEKERJA', '1 - KEPALA KELUARGA', 'BELUM KAWIN', NULL, '1', '1', 'AKTIF'),
(258, '2016-BINJAI PIRUA', '6307040301120006', '6307041507860004', 'ARBANI', 'LAKI-LAKI', 'BANGKAL', '15-07-1986', 'JUNAINAH', 'ARDIANSYAH', 'TIDAK TAHU', 'TIDAK TAHU', 'BELUM SEKOLAH', 'WIRASWASTA', '1 - KEPALA KELUARGA', 'CERAH HIDUP', NULL, '1', '1', 'AKTIF'),
(259, '2016-BINJAI PIRUA', '6307040102180003', '6307045005860002', 'NORHALIMAH', 'PEREMPUAN', 'BINJAI PEMANGKIH', '10-05-1986', 'JUMRIAH', 'BASERI', 'TIDAK TAHU', 'TIDAK TAHU', 'TAMAT SD', 'MENGURUS_RUMAH_TANGGA', '3 - ISTRI', 'KAWIN', NULL, '1', '1', 'AKTIF'),
(260, '2016-BINJAI PIRUA', '6307040108110001', '6307040205820002', 'SURIANI', 'LAKI-LAKI', 'BINJAI PIRUA', '02-05-1982', 'ARBAINAH', 'AHMAD', 'TIDAK TAHU', 'TIDAK TAHU', 'SLTP', 'WIRASWASTA', '1 - KEPALA KELUARGA', 'KAWIN', NULL, '1', '1', 'AKTIF'),
(261, '2016-BINJAI PIRUA', '6307040112100005', '6307040103620003', 'KASERANI', 'LAKI-LAKI', 'BINJAIPEMANGKIH', '01-03-1962', 'BADARA', 'SABERI', 'TIDAK TAHU', 'TIDAK TAHU', 'TAMAT SD', 'PETANI_PEKEBUN', '1 - KEPALA KELUARGA', 'KAWIN', NULL, '1', '1', 'AKTIF'),
(262, '2016-BINJAI PIRUA', '6307040112100005', '6307044609700005', 'MAISARAH', 'PEREMPUAN', 'BINJAI PEMANGKIH', '06-09-1970', 'SABARIAH', 'MASRI', 'TIDAK TAHU', 'TIDAK TAHU', 'TAMAT SD', 'PETANI_PEKEBUN', '3 - ISTRI', 'KAWIN', NULL, '1', '1', 'AKTIF'),
(263, '2016-BINJAI PIRUA', '6307040112100005', '6307042006970003', 'AKHMAD FAUZAN', 'LAKI-LAKI', 'BINJAI PIRUA', '20-06-1997', 'MAISARAH', 'KASRANI', 'TIDAK TAHU', 'TIDAK TAHU', 'TAMAT SD', 'BELUM_TIDAK_BEKERJA', '4 - ANAK', 'BELUM KAWIN', NULL, '1', '1', 'AKTIF'),
(264, '2016-BINJAI PIRUA', '6307040112100005', '6307044706890008', 'SITI MARIANA', 'PEREMPUAN', 'BINJAI PIRUA', '07-06-1989', 'MAISARAH', 'KASERANI', 'TIDAK TAHU', 'TIDAK TAHU', 'TAMAT SD', 'BELUM_TIDAK_BEKERJA', '4 - ANAK', 'BELUM KAWIN', NULL, '1', '1', 'AKTIF'),
(265, '2016-BINJAI PIRUA', '6307040208170005', '6307045905710002', 'SABARIAH', 'PEREMPUAN', 'BINJAI PIRUA', '19-05-1971', 'MISI', 'HERMAN', 'TIDAK TAHU', 'TIDAK TAHU', 'TAMAT SD', 'PETANI_PEKEBUN', '1 - KEPALA KELUARGA', 'BELUM KAWIN', NULL, '1', '1', 'AKTIF'),
(266, '2016-BINJAI PIRUA', '6307040212150002', '6307044509890003', 'RAHIMAH', 'PEREMPUAN', 'BINJAI PIRUA', '05-09-1989', 'SALASIAH', 'RAHMADI', 'TIDAK TAHU', 'TIDAK TAHU', 'SLTP', 'BELUM_TIDAK_BEKERJA', '1 - KEPALA KELUARGA', 'BELUM KAWIN', NULL, '1', '1', 'AKTIF'),
(267, '2016-BINJAI PIRUA', '6307040301120006', '6307041507860004', 'ARBANI', 'LAKI-LAKI', 'BANGKAL', '15-07-1986', 'JUNAINAH', 'ARDIANSYAH', 'TIDAK TAHU', 'TIDAK TAHU', 'BELUM SEKOLAH', 'WIRASWASTA', '1 - KEPALA KELUARGA', 'CERAH HIDUP', NULL, '1', '1', 'AKTIF');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_gallery`
--
ALTER TABLE `tb_gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tb_laporan_surat`
--
ALTER TABLE `tb_laporan_surat`
  ADD PRIMARY KEY (`id_laporan_surat`),
  ADD KEY `id_surat` (`id_surat`),
  ADD KEY `id_pemohon` (`id_pemohon`),
  ADD KEY `id_pembuat` (`id_pembuat`);

--
-- Indeks untuk tabel `tb_mutasi`
--
ALTER TABLE `tb_mutasi`
  ADD PRIMARY KEY (`id_mutasi`);

--
-- Indeks untuk tabel `tb_profil_desa`
--
ALTER TABLE `tb_profil_desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indeks untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indeks untuk tabel `tb_warga`
--
ALTER TABLE `tb_warga`
  ADD PRIMARY KEY (`id_warga`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_gallery`
--
ALTER TABLE `tb_gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_laporan_surat`
--
ALTER TABLE `tb_laporan_surat`
  MODIFY `id_laporan_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_mutasi`
--
ALTER TABLE `tb_mutasi`
  MODIFY `id_mutasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_profil_desa`
--
ALTER TABLE `tb_profil_desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_warga`
--
ALTER TABLE `tb_warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_laporan_surat`
--
ALTER TABLE `tb_laporan_surat`
  ADD CONSTRAINT `tb_laporan_surat_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `tb_surat` (`id_surat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_laporan_surat_ibfk_2` FOREIGN KEY (`id_pemohon`) REFERENCES `tb_warga` (`id_warga`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_laporan_surat_ibfk_3` FOREIGN KEY (`id_pembuat`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
