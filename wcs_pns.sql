-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2023 at 11:08 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wcs_pns`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_menu`
--

CREATE TABLE `master_menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `link_menu` varchar(50) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_menu`
--

INSERT INTO `master_menu` (`id`, `nama_menu`, `link_menu`, `parent`, `icon`) VALUES
(1, 'Dashboard', '/dashboard', 0, 'fa fa-television'),
(2, 'Weight Scale Program', '/wc_program', 0, 'fa fa-cogs'),
(3, 'Data Timbang', '/data_timbang', 0, 'fa fa-balance-scale');

-- --------------------------------------------------------

--
-- Table structure for table `master_menu_user`
--

CREATE TABLE `master_menu_user` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `id_menu` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_menu_user`
--

INSERT INTO `master_menu_user` (`id`, `id_user`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `posisi` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`id`, `username`, `password`, `nama`, `posisi`, `status`) VALUES
(1, 'superhero', '9eac2777d64d5b0b57b0fc7a2acbe337', 'Administrator', 'ADM', 1),
(2, '0000000KG ', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_vendor`
--

CREATE TABLE `master_vendor` (
  `kode_vendor` varchar(20) NOT NULL,
  `customer_code` varchar(3) DEFAULT NULL,
  `nama_vendor` varchar(255) NOT NULL DEFAULT '',
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `kontak` varchar(50) DEFAULT NULL,
  `siup` varchar(50) DEFAULT NULL,
  `npwp` varchar(50) DEFAULT NULL,
  `pkp` varchar(50) DEFAULT NULL,
  `tdp` varchar(50) DEFAULT NULL,
  `situ` varchar(50) DEFAULT NULL,
  `fp` varchar(255) DEFAULT NULL,
  `bank1` varchar(255) DEFAULT NULL,
  `cabang1` varchar(50) DEFAULT NULL,
  `no_rek1` varchar(100) DEFAULT NULL,
  `nama_rek1` varchar(255) DEFAULT NULL,
  `bank2` varchar(50) DEFAULT NULL,
  `cabang2` varchar(50) DEFAULT NULL,
  `no_rek2` varchar(100) DEFAULT NULL,
  `nama_rek2` varchar(255) DEFAULT NULL,
  `createby` varchar(20) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `createcomp` varchar(50) DEFAULT NULL,
  `tipe` varchar(20) DEFAULT NULL,
  `kena_ppn` decimal(1,0) DEFAULT 0,
  `catatan` longtext DEFAULT NULL,
  `keterangan` text NOT NULL,
  `skb` varchar(50) NOT NULL,
  `siujk` varchar(50) NOT NULL,
  `pph22` int(1) NOT NULL,
  `pbbkb` int(1) NOT NULL,
  `kode_coa` varchar(20) DEFAULT NULL,
  `location` varchar(2) DEFAULT NULL,
  `tampil` int(1) DEFAULT NULL,
  `blacklist` decimal(1,0) DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1,
  `keterangan_status` text NOT NULL,
  `tanpa_ppn` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_vendor`
--

INSERT INTO `master_vendor` (`kode_vendor`, `customer_code`, `nama_vendor`, `alamat`, `telepon`, `fax`, `email`, `kontak`, `siup`, `npwp`, `pkp`, `tdp`, `situ`, `fp`, `bank1`, `cabang1`, `no_rek1`, `nama_rek1`, `bank2`, `cabang2`, `no_rek2`, `nama_rek2`, `createby`, `createdate`, `createcomp`, `tipe`, `kena_ppn`, `catatan`, `keterangan`, `skb`, `siujk`, `pph22`, `pbbkb`, `kode_coa`, `location`, `tampil`, `blacklist`, `status`, `keterangan_status`, `tanpa_ppn`) VALUES
('A-0114', NULL, 'Akbar Nugraha, CV', 'Desa Negeri Katon RT 01 RW 01 Kecamatan Negeri KAton Kabupaten Pesawaran', '0812-7690-1054', '', '', 'Anwar Sadit/081276901054', '503/205/KPMPPT/SIUP/PK/2016-26 Oktober 2016', '80.403.193.8-325.000', '', '071.234.6.207-26 Oktober 2021', 'Ijin Gangguan 503/254/KPMPPT/HO/016', '', 'BRI', '5795 UNIT GEDONG TATAAN', '5795-01-020528-53-7', 'ANWAR SADIT', 'BRI', 'Gedong Tataan', '5795.01.020528.53.7', 'Anwar Sadit', 'Yuki Ratna', '2016-11-15 09:21:19', 'app.protos', 'Kontraktor', '0', '', 'keterangan', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('A-0134', NULL, 'AZMYA JAYA, CV', '', '', '', '', 'ALI MASKUR', '510/81/SIUP/IV.14/MSJ/2017', '83.535.241.0-326.000', '', '04.10.02.0087', '140/738/LB-WS/MSJ/XII/2017', '', 'BANK BRI', 'UNIT SIMPANG PEMATANG', '5662-01-023373-53-4', 'ALI MASKUR', 'BANK BNI', '', '551540776', 'ALI MASKUR', 'Eka Widhyasmara', '2018-02-06 10:06:53', NULL, 'Kontraktor', '0', NULL, 'KTP  181104-180872-0001', '', '', 0, 0, NULL, NULL, 1, '0', 1, '', NULL),
('A-0151', NULL, 'Agung Podomoro, CV', 'Negara Jaya RT.003 RW.002 Desa Negara Jaya, Kec. Negeri Besar, Kabupaten Way Kanan Provinsi Lampung', '0852-6721-4946', '', '', '', '510.21/00165/12/DPMPTSP.2/V.2018', '84.189.623.6-326.000', '', '07.10.3.46.00181', '140/58/SITU/07-NB/IV/2018', '', 'BRI', '5662 UNIT SIMPANG PEMATANG TULANG', '5662-01-009288-53-7', 'SILO SIIWANTO', 'BRI', 'BUNGA MAYANG KOTA BUMI', '5653-01-019125-53-4', 'CV. AGUNG PODOMORO', 'Yuki Ratna', '2018-06-12 10:45:47', NULL, 'Kontraktor', '0', NULL, 'Perdagangan atas balas jasa (Fee) atau kontrak', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('A-0216', NULL, 'Ardan Putra Mesuji, CV', 'Wiralaga 1 Wiralaga 1 Mesuji Mesuji Lampung\r\n', '0253-6942-2006', '', '', '', '', '96.408.375.2-326.000', '', '', '', '', 'BANK LAMPUNG', '', '409.00.02.00024.7', 'A. LATIF RAIS', '', '', '', '', 'Eka Widhyasmara', '2020-12-11 13:40:33', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('A-0222', NULL, 'Anugrah Bersama, CV', 'Kibang Trijaya RT/RW 009/002 Tri Jaya Lambu Kibang Tulang Bawang Barat Lampung\r\n', '', '', '', 'MASLUKIN  0823-0695-8941', '503/239/H.17/SIUP/TUBA/2020', '81.658.676.2-326.000', '', '04081.6652075.239', '', '', 'BANK BRI', '', '4380-01-020491-53-4', 'NURUL HIDAYAT', '', '', '', '', 'Eka Widhyasmara', '2021-02-02 09:16:41', NULL, 'Kontraktor', '0', NULL, 'KTP : 181207-100676-0001', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('B-0022', NULL, 'BRAMA MANDIRI, CV', 'Blok 07 Jalur 22 No. 05 Bumi Dipasena Jaya, Kecamatan Rawajitu Selatan, Tulang Bawang 00000', '', '', '', 'Winarto/ 082178734961', '530/319/III.10/TB/2014 Kecil', '02.897.610.8326.000', '', '070.856.650.314', '', '', 'BRI', '', '0130-01-085814-50-8', 'RAGIL TRI LUSIANTO', 'BRI', 'Rawajitu', '2014-01-006194-50-5', 'Winarto', 'Yuki Ratna', '2015-04-17 16:07:44', 'app-01.pns.local', 'Kontraktor', '0', '', '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('B-0046', NULL, 'Bangkit Santia Margo, PT', 'NPWP : Jl.Polri No.89 Kampung Bandar Agung Kecamatan Terusan Nunyai Kabupaten Lampung Tengah\r\n', '082176887010/085367388269', '', 'movie2letters@gmail.com', 'Santi', '503/130-304/18-05/PK.1/VII/LPD.1/2015 Kecil', '72.281.063.7-321.000', '', '1805.1.78.00013', '', '', 'BCA', 'BANDAR JAYA', '293.050.9.101', 'APRILANTO MS', 'BCA', '', '8700-143-067', 'Mofita Yuli Susanti', 'Yuki Ratna', '2016-01-12 15:29:23', 'app.protos', 'Vendor', '0', '', 'keterangan', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('B-0083', NULL, 'BAROKAH SYADILIYAH, CV', '', '0853-8344-2227/0857-8962-7075', '', '', 'THASILIN / KTP 160205-260372-0001', '084/DPMPTSP/SIUP/II/2018', '02.797.549.9-312.000', '', '06.09.3.49.028', '041/SKD-KDT/II/2018', '', 'BRI', '0030 CABANG KAYU AGUNG', '0030-01-001425-56-7', 'THASILIN', 'BANK BRI', '', '0030-01-011039-53-4', 'CV. BAROKAH SYADILIYAH', 'Eka Widhyasmara', '2018-02-14 15:56:12', NULL, 'Kontraktor', '0', NULL, 'PEM-00346/WPJ.03/KP.0303/2008', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('B-0113', NULL, 'Borneo Lampung Sejahtera, CV', 'Giham Sukamaju, RT01/RW00\r\nGiham Sukamaju, Sekincau Kab Lampung Barat LAMPUNG', '', '', '', 'HERMAWAN', '9120006632864', '91.889.549.9-326.000', '', '', '', '', 'BANK BRI', 'unit SANGKULIRANG', '4509-01-021757-53-3', 'HERMAWAN', '', '', '', '', 'Eka Widhyasmara', '2019-07-22 09:22:03', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('B-0125', NULL, 'Berkat Doa Ibu, CV', 'Jl. Suprapto 05, RT 008/RW 003\r\nTanjung Mas Rejo\r\nMesuji Timur\r\nMesuji\r\n\r\nJl. Suprapto 05, RT 008/RW 003 Tanjung Mas Rejo Mesuji Timur Nesuji Lampung\r\n', '', '', '', 'Ricat Stepen KTP : 181102-201076-0005 /  HP : 0822', 'AHU-0047951-AH.01.14 Tahun 2019', '92.642.720.4-326.000', '', '', '140/276/18.11.02.2018/XI/2018', '', 'BANK BRI', '', '8141-01-000014-50-0', 'RICAT STEPEN', '', '', '', '', 'Eka Widhyasmara', '2019-12-13 16:24:22', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('B-0142', NULL, 'Berkah ABadi Af, CV', 'Dusun II , RT/RW 000/000 Sungai Ceper Sungai Menang Ogan Komering Ilir Sumatera Selatan\r\n', '0812-7889-1145', '', '', 'Andara', '', '95.493.078.0-312.000', '', '', '', '', 'BANK BRI', '', '0030-01-043991-50-8', 'ANDARA', '', '', '', '', 'Eka Widhyasmara', '2020-08-18 12:26:01', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('C-0075', NULL, 'Cahaya Anugrah Ramadhan, CV', 'Pendowo Asri, RT.004/RW.002 Pendowo Asri Dente Telada Tulang Bawang Lampung\r\n', '', '', '', 'M. NURHADI 0813-7905-8944', '', '93.792.074.2-326.000', '', 'AHU-0073727-AH.01.14 Tahun 2019', '140/13/KK-SKD/PA-DT/TB/XII/2019', '', 'BANK BRI', '', '7857-01-012201-53-9', 'M. NURHADI', '', '', '', '', 'Eka Widhyasmara', '2020-01-15 15:31:19', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('D-0073', NULL, 'Dua Saudara Mesuji, CV', 'Jl. Garuda Hitam RT. 002 RW.002 Wiralaga II Mesuji Lampung', '', '', '', '', '510/60/SIUP/IV.14/MSJ/2019', '91.121.147.2-326.000', '', '06.02.02.00060', '400/128/WR.2/MSJ/2019', '', 'BRI', 'Unit Simpang Pematang II', '7704.01.012840.53.2', 'Aprisandi', '', '', '', '', 'Yuki Ratna', '2019-05-02 11:25:37', NULL, 'Kontraktor', '0', NULL, 'Tanam Tebu dan maintenance', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('D-0081', NULL, 'Danu Putra Atlas, CV', 'Dusun III RT 07 Teloko Kayu Agung Ogan Komering Ilir Sumatera Selatan\r\n', '', '', '', 'Daryumi 0852-7972-8257', '', '93.325.173.8-312.000', '', '', '440/SK-KDTXI/2019', '', 'BANK BRI', '', '5638-01-020337-53-4', 'DARYUMI BINTI MUHAMMAD', '', '', '', '', 'Eka Widhyasmara', '2019-11-25 14:21:40', NULL, 'Kontraktor', '0', NULL, 'KTP 160205-450574-0011', 'AHU-0045004-AH.01.14 Tahun 2019', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('D-0082', NULL, 'Doa Ibu, CV', 'Jl.SK 02 A, RT.01/RW.01\r\nSumber Agung\r\nRawa Pitu\r\nTulang Bawang\r\nLampung', '', '', '', 'Suyono 0822-1711-1154', '001/SKU/SA-RP/TB/I/2020', '93.934.685.4-326.000', '', 'AHU-0074772-AH.01.14 Tahun 2019', '003/1805.22/SKDP/SA-RP/I/2020', '', 'BANK BRI', '', '3837-01-020638-53-0', 'Suyono', '', '', '', '', 'Eka Widhyasmara', '2020-01-15 15:29:57', NULL, 'Kontraktor', '0', NULL, '180522-130680-0007', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('F-0028', NULL, 'Fajar Hidayah, CV', 'Tanjung Menang, RT/RW 003/003 Tanjung Menang Mesuji Timur Mesuji Lampung\r\n', '', '', '', 'Ledi - 0853-7869-2968', '', '94.783.461.0-326.000', '', '', '471/64/SKD/18.11.02.2005', '', 'BANK BRI', '', '5662-01-004548-53-4', 'LEDI', '', '', '', '', 'Eka Widhyasmara', '2020-06-14 10:24:08', NULL, 'Kontraktor', '0', NULL, '', 'AHU-0023664-AH.01.14 Tahun 2020', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('G-0070', NULL, 'Gajah Setia Mandiri, PT', 'Trans Kubu Jambu Simpang Sekuen, Desa Gajah Mati, \r\nKec Sungai Menang, KAB OKI \r\nsumatera Selatan', '085366636268', '', '', 'NOPEN', '225/DPMPTSP/SIUP/IV/2018', '84.486.059.3-312.000', 'S-64PKP/WPJ.03/KP.1003/2018', '06.09.1.41.036', '', '', 'BANK BNI', 'KAYU AGUNG', '7705201888', 'GAJAH SETIA MANDIRI', 'BANK BRI', '', '8141-01-003994-53-9', 'NOPRIANTO', 'Eka Widhyasmara', '2019-08-26 09:07:42', NULL, 'Kontraktor', '0', NULL, '', '1.322699.1602.1026', '1.322699.1602.1026', 0, 0, NULL, NULL, NULL, '0', 1, '', 1),
('G-0084', NULL, 'Gajah Sakti Mandira, CV', 'Dsn IV\r\nGajah Mati\r\nSungai menang\r\nOgan Komering Ilir\r\nSumatra Selatan\r\n', '0813-6756-3934', '', '', 'NOPRIANTO', '', '96.569.556.2-312.000', '', '', '', '', 'BANK BRI', '', '8141-01-003994-53-9', 'NOPRIANTO', '', '', '', '', 'Eka Widhyasmara', '2021-04-01 15:05:29', NULL, 'Kontraktor', '0', NULL, '160215-100484-0001', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('H-0054', NULL, 'Haikal Putra, CV', 'Kampung Sendang Agung\r\nKec Sendang Agung\r\nKab Lampung Tengah', '', '', '', '082347608976', '503/0648/023/D.b.VI.18/VII/2020', '95.493.209.1-321.000', '', '', '', '', 'BANK BRI', '', '5811-01-026094-53-4', 'DULHANI', 'BANK BRI', '', '8142-01-012678-53-0', 'SAHRONI', 'Eka Widhyasmara', '2020-08-06 10:45:08', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('I-0041', NULL, 'Ister Fani Suka Damai, CV', 'Gg. 2000 RT.002/RW.002 Kel.PKL Kerinci Timur, Kecamatan Pelalawan', '081275664403', '', '', 'Sarilia Telaumbanua / Idanoli Telaumbanua', '137/DPMPTST/SIUP-K/2017/102 Kecil', '81.951.932.3-222.000', '', '041.634.100.280 5 Mei 2022', '137/DPMPTSP/SITU/2017/148', '', '', '', '', '', '', '', '', '', 'Yuki Ratna', '2017-05-29 13:13:46', NULL, 'Kontraktor', '0', NULL, 'Kontraktor Tanam', '', '', 0, 0, NULL, NULL, NULL, '1', 1, '', NULL),
('J-0018', NULL, 'Jaya Abadi, CV (Kontraktor)', 'Desa Sidoarum RT.05 RW.05 Kecamatan Jakenan Kabupaten Pati', '081335962723', '', '', '', '510.41/205/11-05/PK/III/2016', '75.432.554.6-507.000', '', '11.05.3.46.01836', 'Ijin Gangguan 503/182/2016', '', 'BRI', '0066 KANCA BRI PATI', '0066-01-001334-56-5', 'CV. Jaya Abadi', 'TUNAI', '', 'TUNAI', 'Jaya Abadi, CV (Kontraktor)', 'Yuki Ratna', '2016-04-08 17:03:03', 'app.protos', 'Kontraktor', '0', '', 'keterangan', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('J-0033', NULL, 'JAGUAR LANGGENG JAYA, CV', '', '', '', '', 'HENDRA WIDIYANTO', '530/32/V.16/TB/2018', '83.776.220.2-326.000', '', '070856650-32', '245/SKDU/PJ/I/2018', '', 'BANK BRI', '', '5705-01-000391-50-5', 'INTAN BETI KUMALA DEWI', '', '', '', '', 'Eka Widhyasmara', '2018-02-06 10:02:15', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, 1, '0', 1, '', NULL),
('J-0054', NULL, 'JAYA ABADI SRIWIJAYA, PT', 'Jl. DI Panjaitan No. 1553A RT. 30 RW. 09 Enam Belas Ulu Seberang Ulu Dua Kota Palembang Sumatra Selatan\r\n', '0812-7328-3636', '', '', 'ANDI WAHYUDI', '', '84.174.259.6-307.000', '', '', '475/060/SU.DUA/2020', '', 'BANK BRI', '', '2278-01-000280-56-0', 'PT. JAYA ABADI SRIWIJAYA', '', '', '', '', 'Eka Widhyasmara', '2021-04-01 15:19:37', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('J-0058', NULL, 'Jes Per Solai , CV', 'HILIBADALU RT 000 RW 000	SIFASOROASI GOMO	GOMO	NIAS SELATAN	SUMATERA UTARA\r\n', '0853-7294-8118', '', '', '', '', '42.748.592.5-326.000', '', '', '', '', 'BANK BRI', '', '3832-01-026358-53-6', 'BAZIDUHU NDRURU', '', '', '', '', 'Eka Widhyasmara', '2021-06-30 09:56:52', NULL, 'Kontraktor', '0', NULL, '121402-060191-0003', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('K-0043', NULL, 'Karya Mandiri, CV', 'Sumber Sari RT/RW 01/06 Kec.Penawar Aji', '0853-5703-1177', '', '', 'Widi Atmoko', '530/12/III.10', '75.090.294.2-326.000', '', '070.856.650', '530/12/III.10/TB/2016', '', 'BRI', 'Gadingrejo , Pringsewu', '5772-01-011304-53-2', 'WIDI ATMOKO', 'BRI', '', '06050.10007.98306', 'CV Karya Mandiri', 'Yuki Ratna', '2016-02-15 07:55:08', 'app.protos', 'Kontraktor', '0', '', 'keterangan', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('K-0070', NULL, 'Kidang Kencana Utama, CV', 'Desa Panggung Jaya, RT.004 RW. 002 Kec. Rawajitu Utara, Kab. Mesuji Lampung', '', '', '', 'Edi Tukidi / 0813-6724-1510', '510/88/SIUP/IV.14/MSJ/2018', '49.030.441.7-312.000', '', '07.02.02.00089', '470/492/18.11.03.2002/X/2018', '', 'BANK BRI', '', '5665-01-001310-50-2', 'EDI TUKIDI', '', '', '', '', 'Yuki Ratna', '2018-10-09 09:32:24', NULL, 'Kontraktor', '0', NULL, 'Perdagangan Umum, Kontraktor dan Pengadaan Barang dan Jasa', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('M-0141', NULL, 'Mulia Bersama ,CV', 'Jl. Alamsyah Ratu Prawira Negara Kom. Bukit Sejahtera EE No.33\r\nRT.78/23', '', '', '', '', '', '03.165.990.7-306.000', '', '', '', '', 'BANK BRI', '', '0030-01-001683-56-3', 'ELISA', '', '', '', '', 'Eka Widhyasmara', '2020-03-12 15:02:51', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('M-0155', NULL, 'Mitra Karya Lampung, CV', 'Jalan Lintas Pantai Timur KM. 253+200 RT.004 RW.002 Terbanggi Ilir Bandar Mataram Lampung Tengah Lampung\r\n', '0852-8141-8381', '', '', 'NURJIYONO TRI PAMUNGKAS', '', '74.661.845.3-321.000', '', '1805.3.52.000040', '503/605/1805/HO.1/LPD.1/XII/2015', '', 'BANK BRI', '', '7709-01-003230-53-8', 'NURJIYONO TRI PAMUNGKAS', '', '', '', '', 'Eka Widhyasmara', '2020-10-13 10:19:08', NULL, 'Kontraktor', '0', NULL, '', '538/335/03-TI/2015', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('M-0185', NULL, 'Manual Jaya, CV', 'Jl. Panglima Undan NO 29 Kampung Bandar Senepelan Kota Pekanbaru Riau\r\n', '', '', '', 'ANTONIUS PANGESTU', '', '41.615.273.4-211.000', '', '', '', '', 'BANK MANDIRI', '', '108-00-2128201-8', 'CV. MANUAL JAYA', '', '', '', '', 'Eka Widhyasmara', '2022-01-21 17:22:23', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('OT-0130', NULL, 'Sri Rejeki, CV', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BRI', NULL, ' 0357-01-001618-56-6 ', 'Suntoro Sukarno', NULL, NULL, NULL, NULL, 'Afiatun Nufus', '2018-11-01 08:52:44', NULL, 'Other', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '1', 1, '', NULL),
('OT-0144', NULL, 'CV Imam Santoso', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BRI', NULL, '147101000433504', 'Imam Santoso', NULL, NULL, NULL, NULL, 'Afiatun Nufus', '2018-11-18 11:20:27', NULL, 'Other', '0', NULL, '', '', '', 0, 0, NULL, NULL, 1, '0', 1, '', NULL),
('OT-0202', NULL, 'Putra Mandiri Sukses, CV', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BRI', '5642 UNIT PEMATANG PANGGANG K.A.', '5642-01-019069-53-7', 'NOPRI SANDRA', 'TUNAI', NULL, 'TUNAI', 'Putra Mandiri Sukses, CV', 'Afiatun Nufus', '2019-04-15 14:23:26', NULL, 'Other', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '1', 1, '', NULL),
('OT-0207', NULL, 'SADAR HATI, CV', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014 KCP RAWAJITU - TULANG BAWANG', NULL, '2014-01-002583-53-2', 'ASMINA ZEBUA', NULL, NULL, NULL, NULL, 'Afiatun Nufus', '2019-04-16 10:16:08', NULL, 'Other', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '1', 1, '', NULL),
('P-0131', NULL, 'Putra Mabam Abadi, PT', 'Ds Simpang Mesuji, RT.001/RW.002, Simpang Pematang  Kab Mesuji \r\nPropinsi Lampung', '', '', '', 'ALKAT JAUHARI ', '', '91.591.173.9-326.000', '', 'S-10758KT/WPJ.28/KP.0703/2019', '', '', 'BANK LAMPUNG', 'BANDAR LAMPUNG', '409-0572-0000-14', 'PT Putra Mabam Abadi', '', '', '', '', 'Eka Widhyasmara', '2019-06-12 08:29:05', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', 1),
('P-0153', NULL, 'Putra Pratama Mesuji, CV', 'Sungai Badak, RT/RW 002/005 Sungai Badak Mesuji Mesuji Lampung\r\n', '0853-6606-4865', '', '', 'IRHANSYAH', '', '95.327.872.8-326.000', '', 'AHU-0035905-AH.01.14 Tahun 2020', '', '', 'BANK BRI', '', '7704-01-015223-535', 'IRHANSYAH', '', '', '', '', 'Eka Widhyasmara', '2020-08-18 12:28:38', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('P-0184', NULL, 'Pratiwi Artha Mandiri Makmur , CV', 'JL KESEDEN III KESEDEN KEJAKSAN CIREBON KOTA JAWA BARAT\r\n', '0852-8023-8175', '', 'cvpratiwiarthamandirimakmur@gmail.com', '', '', '67.638.857.2-426.000', '', '', '', '', 'BANK BRI', '', '0107-01-002561-56-7', 'CV. PRATIWI ARTHA MANDIRI MAKMUR', '', '', '', '', 'Eka Widhyasmara', '2021-12-27 10:39:06', NULL, 'Kontraktor', '0', NULL, '320906-651076-0001', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('Q-0003', NULL, 'QUEEN FAMILY, CV', '', '', '', '', 'HONGKI ALEXSANDER', '530/418/V.16/TB/2017', '83.503.813.4-326.000', '', '070856650-423', '470/581/GKJ-RJS/TB/XII/2017', '', 'BANK BRI', '', '2014-01-006861-50-0', 'HONGKI ALEXSANDER', '', '', '', '', 'Eka Widhyasmara', '2018-02-06 10:03:55', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('R-0031', NULL, 'Restu Ibu, CV - Mesuji', 'Desa Wiralaga II, RT.004/RW.004 Kec.Mesuji-Kabupaten Mesuji', '082372342959', '', '', 'Budi Arsyah', '510/95/SIUP/IV.08/MSJ/2016 Kecil', '80.847.706.1-326.000', '', '06.02.03.00095 21 Des 2021', 'Ijin Gangguan 503.648/118/SIG/IV.08/MSJ/2016', '', 'BRI', '7704 UNIT SIMPANG PEMATANG II TULANG BAWANG', '7704-01-012856-53-3', 'BUDI ARSYAH', 'BRI', 'Simpang Pematang II', '7704.01.008328.53.0', 'Budi Arsyah', 'Yuki Ratna', '2017-04-10 09:31:43', NULL, 'Kontraktor', '0', NULL, 'Jasa Pemborong Tebang Tebu dan Kontraktor', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('R-0035', NULL, 'Rimau Bersama Jaya, CV', 'Palembang Jambi LK III RT.023 RW.006 Seterio Banyuasin III Kab, Banyuasin \r\nSumatera Selatan', '', '', '', '0856-6980-8914', '503/364/BPT/P-2/VII/2016 ', '82.422.838.1-314.000', '', '061.430.100.125 23 September 2021', '503/643/SITU/BPT/2016', '', 'BRI', 'Teluk Dalam Gn Sitoli', '8039-01-004324-53-4', 'SODAZATULO NDRURU', 'BRI', '', '3832.01.037966.53.4', 'Sodazatulo Ndruru', 'Yuki Ratna', '2017-08-02 16:44:12', NULL, 'Kontraktor', '0', NULL, 'Tanam Tebu dan maintenance', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('R-0043', NULL, 'Rojer Makmur Jaya, CV', 'Agung Dalam RT/RW 004/005 Kec.Banjar Margo\r\nTulang Bawang Lampung', '0823-1196-7466', '', '', '', '530/399/V,16/TB/2018', '85.185.949.6-326.000', '', '070.856.620.408', '470/118/SKD/AD-BM/VII/2018', '', 'BRI', '5266 unit DIPONEGORO GUNUNG SITOLI', '5266-01-014605-53-2', 'ROJER IBRAHIM HIA', '', '', '', '', 'Yuki Ratna', '2018-07-20 14:51:04', NULL, 'Vendor', '0', NULL, '', '', '', 0, 0, NULL, NULL, 1, '0', 1, '', NULL),
('R-0056', NULL, 'Rejeki Lancar Bersama, CV', 'Karang RT01 Kel/Gading , Kec Tanon , Kab Sragen', '0823-0733-3038', '', '', 'Winarto', '', '92.167.973.0-312.000', '', '', '', '', 'BANK BRI', '', '6866-01-017268-53-8', 'WINARTO', '', '', '', '', 'Eka Widhyasmara', '2019-07-29 11:54:03', NULL, 'Kontraktor', '0', NULL, 'KTP : 331412-280270.00001', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('R-0073', NULL, 'Riau Kaisar Utama, PT', 'Gunung Sari Gunung Sari Gunung Sahilan Kampar Riau\r\n', '082388094880/082288029112', '', '', 'Mujiono', 'AHU-AH.01.03-0296968', '70.789.444.0-221.000', '', '', '', '', 'BANK BRI', '', '0696-01-001042-30-1', 'PT. RIAU KAISAR UTAMA', '', '', '', '', 'Eka Widhyasmara', '2020-08-18 12:23:31', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('R-0097', NULL, 'Riski Arto Moro, CV', 'Sumber Agung RT 001 RW 001\r\nSumber Agung\r\nMuara Sungkai\r\nLampung Utara\r\n', '0813-6740-4280', '', '', 'INDRAZAT', '', '42.158.593.6-326.000', '', '', '', '', 'BANK BNI', '', '1181.701692', 'INDRAZAT', '', '', '', '', 'Eka Widhyasmara', '2021-11-08 09:16:09', NULL, 'Kontraktor', '0', NULL, 'KTP : 180315-190885-0001', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('S0074-0023', NULL, 'Sukses Bersama Sahabat, CV', 'Jl. P.Antasari GG Waru I No.210 Kel.Kalibalau Kencana Kec. Kedamaian \r\nBandar Lampung', '', '', '', 'Siti Maemunah', '510.2.2/00268/30.13/III.16.2/III/2017', '81.235.551.9.322.000', '', '07.01.3.41.00158 16 Mar 2022', '504.1/00560/30.13/III.27/III/2017', '', 'BRI', '', '3837-01-023122-53-8', 'SURANDI', 'TUNAI', '', 'TUNAI', 'Sukses Bersama Sahabat, CV', 'Yuki Ratna', '2017-07-14 14:39:19', NULL, 'Kontraktor', '0', NULL, 'Tanam Tebu dan maintenance', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('S0074-0089', NULL, 'Surya Makmur Mesuji, CV', 'Ds Labuhan Batin , RT.002/RW.004\r\nLabuhan Batin, Way Serdang \r\nKab Mesuji LAMPUNG', '081274594033', '', '', 'TASIM', '510/17/SIUP/WS/MS/MSJ/VII/2019', '92.240.298.7-326.000', '', 'AHU-0042397-AH.01.14', '', '', 'BANK BRI', 'KCP TULANG BAWANG', '0605-01-048627-50-1', 'TASIM', '', '', '', '', 'Eka Widhyasmara', '2019-08-07 15:55:09', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('S0074-0117', NULL, 'Sarman Mesuji Sukses, CV', 'Jl. 01 RT.03 RK.04, Desa Wiralaga II . Kec. Mesuji\r\nKab Mesuji', '', '', '', '0813-6867-2893 SARMAN', '', '94.952.572.9-326.000', '', '', '500/002/W.II/MSJ/V/2020', '', 'BANK BRI', '', '7704-01-014880-53-8', 'SARMAN', '', '', '', '', 'Eka Widhyasmara', '2020-06-22 11:42:50', NULL, 'Kontraktor', '0', NULL, '', 'AHU-0027652-AH.01.14 Tahun 2020', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('S0074-0141', NULL, 'Sinergi Internasional Perkasa, PT ', 'JL.Pipa, Lorong Kebun Sayur Blok B.07 Rt.053 Rw.003 Kel. Bukit Sangkal, Kec. Kalidoni, Kota Palembang, Sumatera Selatan', '0812 7150 2511 ', '', 'admin@sinergi-ip.com', 'Gugun Ramdhan Natapraja 0853 6555 0079', '510/SIUP/0114/DPMPTSP-PPK/2020', '94.866.989.0-301.000', 'S-302PKP/WPJ.03/KP.0203/2020', '', 'KU/69/1003/2020', '', 'BRI', '', '1104-01.000239.30-5', 'PT. Sinergi Internasional Perkasa', '', '', '', '', 'Widi Rizky', '2020-12-14 12:39:58', NULL, 'Vendor', '0', NULL, 'STEEL STRUCTUR, GENERAL CONTRACTOR, SPARE PART AND HOIST&LIFTING EQUIPMENT', '', '0-1671-06-015-1-06-324487', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('S0074-0152', NULL, 'SUMATERA PELITA NUSANTARA, PT', 'Tj.Raya Permai Blk 16 No.3, RT 005/ RW -\r\nTanjung Seneng\r\nKota Bandar Lampung\r\nLampung\r\n', '0811-7233-274/0813-7976-5929', '', '', 'ANDI SUYITNO', '', '41.836.250.5-325.000', '', '', '', '', 'BANK BRI', '', '0098-01-002815-56-1', 'PT. SUMATERA PELITA NUSANTARA', '', '', '', '', 'Eka Widhyasmara', '2021-04-01 15:10:15', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('S0074-0156', NULL, 'Servini Inti Sejahtera, PT', 'Komplek Puri jatake Indah Blok SQ2 No 8 jatake RT0RW0 Jatiuwung Tanggerang Banten\r\n', '0821-1472-2188', '', '', 'LAURENTINUS SURYOTO', '9120407911263', '09.812.003.3-412.000', '', '', '', '', 'BANK BCA', '', '5465.161458', 'PT. SERVINI INTI SEJAHTERA', '', '', '', '', 'Eka Widhyasmara', '2021-06-10 10:14:03', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('S0074-0172', NULL, 'SAVENTUS PUTRA LAIA, CV', 'Pasar Gedung Karya Jitu	Gedung Karya Jitu	Rawajitu Selatan	Tulang Bawang	Lampung\r\n', '0812-7957-6955', '', '', 'PUTRUS LAIA', '', '63.165.585.9-326.000', '', '', '', '', 'BANK BRI', '', '3837-01-024535-53-0', 'PETRUS LAIA', '', '', '', '', 'Eka Widhyasmara', '2022-02-15 15:38:25', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('T-0055', NULL, 'Tunas Jaya, CV', 'Desa Taman Cari Kecamatan Purbolinggo Kabupaten Lampung Timur', '0856-7056-222', '', '', 'Suwarno', '510/517.b/489/SIUP/24/SK/2016 Kecil', '02.409.937.8.321.000', '', '510/519.a/125/TDP/30/SK/2013', '500/503.a/209/SITU/30/SK/2013', '', 'BRI', '', '0285-01-030792-50-0', 'SITI MARLINA', 'BRI', 'Teluk Betung', '0285.01.058147.50.1', 'Suwarno', 'Yuki Ratna', '2016-10-20 16:41:40', 'app.protos', 'Kontraktor', '0', '', 'keterangan', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('T-0107', NULL, 'Trijaya Sukses Abadi, CV', 'Jl.Dahlia No. 70 A Kedung Sari Sukajadi Pekanbaru Riau\r\n', '0852-6556-4988', '', '', 'LUKUAN', '1016/K.04.01/DPMPTSP/IX/2020', '95.917.575.3-216.000', '', '040134722422', '', '', 'BANK BCA', '', '8230688860', 'CV. TRIJAYA SUKSES ABADI', '', '', '', '', 'Eka Widhyasmara', '2020-10-13 10:20:37', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('T-0108', NULL, 'Tanggul Rasau Mandiri , CV', 'Gedung Karya Jitu RT/RW 000/000 Gedung Karya Jitu Rawa Jitu Selatan Tulang Bawang Lampung\r\n', '0821-7742-3822', '', '', 'ROSMAN EFENDI / 180518-090287-0001', '', '96.066.775.6-326.000', '', '', '', '', 'BANK BRI', '', '3837-01-017306-53-4', 'ROSMAN EFENDI', '', '', '', '', 'Eka Widhyasmara', '2020-10-16 14:45:46', NULL, 'Kontraktor', '0', NULL, '', 'AHU-0049040-AH.01.14 Tahun 2020', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('T-0118', NULL, 'Tri Jaya Nyata Utama, CV', 'CEMPAKA JAYA\r\nMenggala Timur\r\nTulang Bawang - Lampung', '0853-8452-7037', '', 'nyoto0808@gmail.com', 'Nyoto', '', '41.227.796.1-326.000', '', '', '', '', 'BANK BRI', '', '2192-01-000734-56-3', 'CV.TRI JAYA NYATA UTAMA', '', '', '', '', 'Eka Widhyasmara', '2021-03-25 09:09:12', NULL, 'Kontraktor', '0', NULL, 'AHU-0066844-AH.0114 TAHUN2020', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('T-0131', NULL, 'Taman Sari Persada, CV', 'Dusun Bangun Rejo\r\nMerak Batin\r\nNatar\r\nLampung Selatan\r\n', '0812-5672-1886', '', 'muhammad1101yusuf@gmail.com', 'MUHAMMAD YUSUF', '', '43.784.295.8-325.000', '', '', '', '', 'BANK BRI', '', '7656-01-013775-53-1', 'MUHAMMAD YUSUF', '', '', '', '', 'Eka Widhyasmara', '2021-11-08 09:17:40', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('U-0040', NULL, 'Utama Jaya Sungai Sibur, CV', 'Jl. Melati Dusun VIII Dewa Sibur, Kel.Sungai Sibur, Kec.Sungai Menang, Kab,OKI Sumsel', '', '', '', 'SUMARWOTO', '', '94.240.325.4-312.000', '', '', '', '', 'BANK BRI', 'RAWAJITU', '3837-01-019521-53-8', 'D SUMARWOTO', '', '', '', '', 'Eka Widhyasmara', '2020-03-04 09:25:18', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('W-0005', NULL, 'Weltes Energi Nusantara, PT', 'Jl. Raya Kedamean No. 168 Desa Mojotengah, Kecamatan Menganti Gresik - 61175', '(031) - 7913777', '(031) - 7912047', 'headoffice@weltes.co.id', 'Ibu Lika', '22-10-P.II/437.56/SIUP/VII/2015', '01.707.685.2-641.000', 'PEM-00020/WPJ.24/KP.0803/2013', '13.02.1.25.01170', 'SK Domisili No. 515/579/437.111.03/IX/2015', '', 'BCA', '', '088.570.0.000', 'PT Weltes Energi Nusantara', '', '', '', '', 'HQ Administrator', '2001-05-14 00:00:00', 'app-01.pns.local', 'Vendor', '0', '', 'Ponton', '', '', 0, 0, NULL, NULL, 1, '0', 1, '', NULL),
('W-0043', NULL, 'WIKA FUTARI, CV', 'Kampung Wonorejo RT.01 RW.01	Wonorejo	Penawar Aji	Tulang Bawang	Lampung\r\n', '0822-8137-2090', '', '', 'MUSRIKA', '', '42.910.880.6-326.000', '', '', '', '', 'BANK BRI', '', '8142-01-003269-53-0', 'MUSRIKAH', '', '', '', '', 'Eka Widhyasmara', '2022-02-15 15:46:24', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL),
('Z-0008', NULL, 'Zefa Anugerah, CV', 'desa Simpang pematang, Kec.Simpang Pematang\r\nkab Mesuji ', '', '', '', 'Leo Rismen - 081369171717', '510/53/SIUP/IV.14/MSJ/2018', '31.709.631.1-326.000', '', '20.01.03.00053', '', '', 'BANK BRI', 'UNIT SIMPANG PEMATANG', '7704-01-012268-53-6', 'Ling Ling Andayu', '', '', '', '', 'Eka Widhyasmara', '2019-09-05 09:46:16', NULL, 'Kontraktor', '0', NULL, '', '', '', 0, 0, NULL, NULL, NULL, '0', 1, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_weight_scale`
--

CREATE TABLE `tbl_weight_scale` (
  `id` int(11) NOT NULL,
  `no_transaksi` varchar(50) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `no_tiket_mobil` varchar(50) NOT NULL,
  `no_wo` varchar(50) NOT NULL,
  `kode_petak` varchar(50) NOT NULL,
  `ancak` varchar(50) NOT NULL,
  `jenis_tebu` varchar(50) NOT NULL,
  `tgl_harvesting` varchar(50) NOT NULL,
  `kode_kontraktor` varchar(50) NOT NULL,
  `loading_vehicle_number` varchar(50) NOT NULL,
  `loading_vehicle_operator` varchar(50) NOT NULL,
  `kode_barge` varchar(50) NOT NULL,
  `kode_tugboat` varchar(50) NOT NULL,
  `tugboat_captain` varchar(50) NOT NULL,
  `tujuan_tugboat` varchar(50) NOT NULL,
  `kode_truck` varchar(50) NOT NULL,
  `supir` varchar(50) NOT NULL,
  `kepala_regu` varchar(50) NOT NULL,
  `weight_in` double NOT NULL DEFAULT 0,
  `weight_in_time` datetime NOT NULL,
  `weight_out` double NOT NULL DEFAULT 0,
  `weight_out_time` datetime NOT NULL,
  `retase` varchar(50) NOT NULL,
  `kontraktor_delivery` varchar(50) NOT NULL,
  `no_polisi` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `no_alat2` varchar(50) NOT NULL,
  `op_alat2` varchar(50) NOT NULL,
  `del` int(11) NOT NULL DEFAULT 0,
  `createby` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_weight_scale_temp`
--

CREATE TABLE `tbl_weight_scale_temp` (
  `id` int(11) NOT NULL,
  `no_transaksi` varchar(50) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `no_tiket_mobil` varchar(50) NOT NULL,
  `no_wo` varchar(50) NOT NULL,
  `kode_petak` varchar(50) NOT NULL,
  `ancak` varchar(50) NOT NULL,
  `jenis_tebu` varchar(50) NOT NULL,
  `tgl_harvesting` varchar(50) NOT NULL,
  `kode_kontraktor` varchar(50) NOT NULL,
  `loading_vehicle_number` varchar(50) NOT NULL,
  `loading_vehicle_operator` varchar(50) NOT NULL,
  `kode_barge` varchar(50) NOT NULL,
  `kode_tugboat` varchar(50) NOT NULL,
  `tugboat_captain` varchar(50) NOT NULL,
  `tujuan_tugboat` varchar(50) NOT NULL,
  `kode_truck` varchar(50) NOT NULL,
  `supir` varchar(50) NOT NULL,
  `kepala_regu` varchar(50) NOT NULL,
  `weight_in` double NOT NULL DEFAULT 0,
  `weight_in_time` datetime NOT NULL,
  `weight_out` double NOT NULL DEFAULT 0,
  `weight_out_time` datetime NOT NULL,
  `retase` varchar(50) NOT NULL,
  `kontraktor_delivery` varchar(50) NOT NULL,
  `no_polisi` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `no_alat2` varchar(50) NOT NULL,
  `op_alat2` varchar(50) NOT NULL,
  `del` int(11) NOT NULL DEFAULT 0,
  `createby` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_weight_scale_temp`
--

INSERT INTO `tbl_weight_scale_temp` (`id`, `no_transaksi`, `tipe`, `no_tiket_mobil`, `no_wo`, `kode_petak`, `ancak`, `jenis_tebu`, `tgl_harvesting`, `kode_kontraktor`, `loading_vehicle_number`, `loading_vehicle_operator`, `kode_barge`, `kode_tugboat`, `tugboat_captain`, `tujuan_tugboat`, `kode_truck`, `supir`, `kepala_regu`, `weight_in`, `weight_in_time`, `weight_out`, `weight_out_time`, `retase`, `kontraktor_delivery`, `no_polisi`, `tujuan`, `no_alat2`, `op_alat2`, `del`, `createby`) VALUES
(7, 'DH/52E32E/060123145631', 'DH', 'TIKET/01', '', 'PNS000101', 'ANCAK/01', 'Tebu Bakar', '', 'A-0114', 'ALAT/01', 'OP/01', 'BARGE/01', 'TUG/01', 'NAHKODA/01', '', 'TRUCK/01', 'DRIVER/01', '', 0, '2023-01-09 16:02:06', 0, '0000-00-00 00:00:00', 'RETASE/01', 'A-0114', 'POL/01', 'TUJUAN01', 'ALAT/02', 'OP/02', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_menu`
--
ALTER TABLE `master_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_menu_user`
--
ALTER TABLE `master_menu_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_vendor`
--
ALTER TABLE `master_vendor`
  ADD PRIMARY KEY (`kode_vendor`),
  ADD UNIQUE KEY `customer_code` (`customer_code`);

--
-- Indexes for table `tbl_weight_scale`
--
ALTER TABLE `tbl_weight_scale`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_transaksi` (`no_transaksi`),
  ADD UNIQUE KEY `no_tiket_mobil` (`no_tiket_mobil`);

--
-- Indexes for table `tbl_weight_scale_temp`
--
ALTER TABLE `tbl_weight_scale_temp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_transaksi` (`no_transaksi`),
  ADD UNIQUE KEY `no_tiket_mobil` (`no_tiket_mobil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_menu`
--
ALTER TABLE `master_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_menu_user`
--
ALTER TABLE `master_menu_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_weight_scale`
--
ALTER TABLE `tbl_weight_scale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_weight_scale_temp`
--
ALTER TABLE `tbl_weight_scale_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
