-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2018 at 09:50 AM
-- Server version: 5.6.38
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `support_sipa`
--

-- --------------------------------------------------------

--
-- Table structure for table `aplikasi`
--

CREATE TABLE `aplikasi` (
  `kode` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aplikasi`
--

INSERT INTO `aplikasi` (`kode`, `nama`) VALUES
(1, 'Web'),
(2, 'Desktop'),
(3, 'Mobile');

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `kode` varchar(5) NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`kode`, `nama`) VALUES
('10000', 'Kepala Badan Pusat Statistik'),
('20000', 'Sekretariat Utama'),
('21000', 'Biro Bina Program'),
('21100', 'Bagian Penyusunan Rencana'),
('21110', 'Subbagian Rencana Kegiatan Teknis Statistik'),
('21120', 'Subbagian Rencana Kegiatan Non Teknis Statistik'),
('21130', 'Subbagian Keterpaduan Rencana'),
('21200', 'Bagian Penyusunan Anggaran'),
('21210', 'Subbagian Penyusunan Anggaran I'),
('21220', 'Subbagian Penyusunan Anggaran II'),
('21230', 'Subbagian Keterpaduan Anggaran'),
('21300', 'Bagian Monitoring dan Evaluasi'),
('21310', 'Subbagian Penyusunan Akuntabilitas'),
('21320', 'Subbagian Monitoring Program'),
('21330', 'Subbagian Evaluasi dan Pelaporan Program'),
('21400', 'Bagian Transformasi Statistik'),
('21410', 'Subbagian Transformasi Proses Bisnis'),
('21420', 'Subbagian Manajemen Perubahan'),
('21430', 'Subbagian Keterpaduan Transformasi'),
('22000', 'Biro Keuangan'),
('22100', 'Bagian Administrasi Keuangan'),
('22110', 'Subbagian Tata Usaha Keuangan'),
('22120', 'Subbagian Pembuatan Daftar Gaji'),
('22130', 'Subbagian Tuntutan Perbendaharaan dan Ganti Rugi'),
('22200', 'Bagian Perbendaharaan'),
('22210', 'Subbagian Perbendaharaan I'),
('22220', 'Subbagian Perbendaharaan II'),
('22230', 'Subbagian Pelaporan Perbendaharaan'),
('22300', 'Bagian Verifikasi'),
('22310', 'Subbagian Verifikasi Anggaran'),
('22320', 'Subbagian Monitoring Anggaran'),
('22400', 'Bagian Akuntansi'),
('22410', 'Subbagian Penyiapan Laporan Keuangan'),
('22420', 'Subbagian Evaluasi dan Pelaporan Keuangan'),
('23000', 'Biro Kepegawaian'),
('23100', 'Bagian Administrasi Kepegawaian'),
('23110', 'Subbagian Tata Usaha Kepegawaian'),
('23120', 'Subbagian Perencanaan dan Informasi Kepegawaian'),
('23200', 'Bagian Mutasi Pegawai'),
('23210', 'Subbagian Mutasi Pegawai I'),
('23220', 'Subbagian Mutasi Pegawai II'),
('23230', 'Subbagian Mutasi Pegawai III'),
('23300', 'Bagian Kesejahteraan dan Pengembangan Pegawai'),
('23310', 'Subbagian Kesejahteraan dan Disiplin Pegawai'),
('23320', 'Subbagian Pengembangan Pegawai'),
('23400', 'Bagian Jabatan Fungsional'),
('23410', 'Subbagian Tata Administrasi Jabatan Fungsional'),
('23420', 'Subbagian Penilaian dan Pengembangan Jabatan Fungsional'),
('23500', 'Sekretariat Korpri'),
('23600', 'Diperbantukan/Dipekerjakan'),
('23700', 'Belum Penempatan'),
('24000', 'Biro Hubungan Masyarakat dan Hukum'),
('24100', 'Bagian Kerja Sama, Protokol, dan Penyiapan Materi Pimpinan'),
('24110', 'Subbagian Kerjasama dan Hubungan Kelembagaan'),
('24120', 'Subbagian Protokol dan Persidangan'),
('24130', 'Subbagian Penyiapan Materi Pimpinan'),
('24200', 'Bagian Hubungan Masyarakat'),
('24210', 'Subbagian Hubungan Media Massa'),
('24220', 'Subbagian Sosialisasi Kegiatan Statistik'),
('24230', 'Subbagian Pengelolaan Opini Publik'),
('24300', 'Bagian Hukum dan Organisasi'),
('24310', 'Subbagian Pertimbangan dan Dokumentasi Hukum'),
('24320', 'Subbagian Bantuan dan Penyuluhan Hukum'),
('24330', 'Subbagian Organisasi dan Tatalaksana'),
('25000', 'Biro Umum'),
('25100', 'Bagian Rumah Tangga'),
('25110', 'Subbagian Urusan Dalam dan Pemeliharaan Kantor'),
('25120', 'Subbagian Pemeliharaan Perlengkapan'),
('25130', 'Subbagian Keamanan dan Ketertiban'),
('25200', 'Bagian Inventarisasi, Penyimpanan, dan Penghapusan'),
('25210', 'Subbagian Inventarisasi'),
('25220', 'Subbagian Penyimpanan'),
('25230', 'Subbagian Penghapusan'),
('25300', 'Bagian Pengadaan Barang / Jasa'),
('25310', 'Subbagian Layanan Pengadaan'),
('25320', 'Subbagian Pemantauan dan Evaluasi Pengadaan'),
('25400', 'Bagian Pencetakan, Arsip, dan Ekspedisi'),
('25410', 'Subbagian Pencetakan dan Penjilidan'),
('25420', 'Subbagian Arsip dan Ekspedisi'),
('25500', 'Belum Penempatan'),
('26000', 'Pusat Pendidikan dan Pelatihan'),
('26100', 'Bagian Tata Usaha'),
('26110', 'Subbagian Tata Usaha Umum'),
('26120', 'Subbagian Rumah Tangga'),
('26200', 'Bidang Pendidikan dan Pelatihan Prajabatan dan Kepemimpinan'),
('26210', 'Subbidang Program dan Evaluasi Pendidikan dan Pelatihan Prajabatan dan Kepemimpinan'),
('26220', 'Subbidang Penyelenggaraan Pendidikan dan Pelatihan Prajabatan dan Kepemimpinan'),
('26300', 'Bidang Pendidikan dan Pelatihan Teknis dan Fungsional'),
('26310', 'Subbidang Program dan Evaluasi Pendidikan dan Pelatihan Teknis dan Fungsional'),
('26320', 'Subbidang Penyelenggaraan Pendidikan dan Pelatihan Teknis dan Fungsional'),
('26400', 'Pejabat Fungsional'),
('27000', 'Sekolah Tinggi Ilmu Statistik'),
('27100', 'Bagian Administrasi Akademik dan Kemahasiswaan'),
('27110', 'Subbagian Administrasi Akademik dan Kerjasama'),
('27120', 'Subbagian Administrasi Kemahasiswaan'),
('27200', 'Bagian Administrasi Umum'),
('27210', 'Subbagian Kepegawaian'),
('27220', 'Subbagian Keuangan'),
('27230', 'Subbagian Tata Usaha dan Rumah Tangga'),
('27300', 'Pejabat Fungsional STIS'),
('30000', 'Deputi Bidang Metodologi dan Informasi Statistik'),
('31000', 'Direktorat Pengembangan Metodologi Sensus dan Survei'),
('31100', 'Subdirektorat Pengembangan Desain Sensus dan Survei'),
('31110', 'Seksi Pengembangan Desain Sensus dan Survei Bidang Statistik Sosial'),
('31120', 'Seksi Pengembangan Desain Sensus dan Survei Bidang Statistik Produksi'),
('31130', 'Seksi Pengembangan Desain Sensus dan Survei Bidang Statistik Distribusi dan Jasa'),
('31200', 'Subdirektorat Pengembangan Standardisasi dan Klasifikasi Statistik'),
('31210', 'Seksi Pengembangan Standardisasi Statistik'),
('31220', 'Seksi Pengembangan Klasifikasi Statistik'),
('31300', 'Subdirektorat Pengembangan Kerangka Sampel'),
('31310', 'Seksi Pengembangan Kerangka Sampel Survei Bidang Statistik Sosial'),
('31320', 'Seksi Pengembangan Kerangka Sampel Survei Bidang Statistik Produksi'),
('31330', 'Seksi Pengembangan Kerangka Sampel Survei Bidang Statistik Distribusi dan Jasa'),
('31400', 'Subdirektorat Pengembangan Pemetaan Statistik'),
('31410', 'Seksi Pengembangan Peta Wilayah'),
('31420', 'Seksi Pengembangan Muatan Peta Wilayah'),
('31430', 'Seksi Pengembangan Peta Statistik Wilayah Kecil'),
('32000', 'Direktorat Diseminasi Statistik'),
('32100', 'Subdirektorat Rujukan Statistik'),
('32110', 'Seksi Inventarisasi Kegiatan dan Produk Statistik'),
('32120', 'Seksi Pengelolaan Sistem Informasi Rujukan Statistik'),
('32130', 'Seksi Rekomendasi Kegiatan Statistik'),
('32200', 'Subdirektorat Publikasi dan Kompilasi Statistik'),
('32210', 'Seksi Pembakuan dan Perwajahan Publikasi'),
('32220', 'Seksi Pemantauan dan Evaluasi Publikasi'),
('32230', 'Seksi Kompilasi Laporan Statistik'),
('32300', 'Subdirektorat Layanan dan Promosi Statistik'),
('32310', 'Seksi Pengemasan Informasi Statistik'),
('32320', 'Seksi Konsultasi Statistik'),
('32330', 'Seksi Promosi Statistik'),
('32400', 'Subdirektorat Perpustakaan dan Dokumentasi Statistik'),
('32410', 'Seksi Pengelolaan Perpustakaan'),
('32420', 'Seksi Jasa Perpustakaan'),
('32430', 'Seksi Dokumentasi Statistik'),
('33000', 'Direktorat Sistem Informasi Statistik'),
('33100', 'Subdirektorat Integrasi Pengolahan Data'),
('33110', 'Seksi Integrasi Pengolahan Data Statistik Sosial'),
('33120', 'Seksi Integrasi Pengolahan Data Statistik Produksi'),
('33130', 'Seksi Integrasi Pengolahan Data Statistik Distribusi dan Jasa'),
('33200', 'Subdirektorat Jaringan Komunikasi Data'),
('33210', 'Seksi Layanan Jaringan Komunikasi Data'),
('33220', 'Seksi Pemeliharaan Jaringan Komunikasi Data'),
('33230', 'Seksi Pengembangan Jaringan Komunikasi Data'),
('33300', 'Subdirektorat Pengembangan Basis Data'),
('33310', 'Seksi Pengembangan Basis Data Statistik'),
('33320', 'Seksi Pengembangan Sistem Integrasi Statistik'),
('33330', 'Seksi Pengembangan Basis Data Manajemen'),
('33400', 'Subdirektorat Pengelolaan Teknologi Informasi'),
('33410', 'Seksi Pengelolaan Perangkat Keras'),
('33420', 'Seksi Pengelolaan Data dan Perangkat Lunak'),
('33430', 'Seksi Perekaman Data'),
('40000', 'Deputi Bidang Statistik Sosial'),
('41000', 'Direktorat Statistik Kependudukan dan Ketenagakerjaan'),
('41100', 'Subdirektorat Statistik Demografi'),
('41110', 'Seksi Penyiapan Statistik Demografi'),
('41120', 'Seksi Pengolahan Statistik Demografi'),
('41130', 'Seksi Evaluasi dan Pelaporan Statistik Demografi'),
('41200', 'Subdirektorat Statistik Ketenagakerjaan'),
('41210', 'Seksi Penyiapan Statistik Ketenagakerjaan'),
('41220', 'Seksi Pengolahan Statistik Ketenagakerjaan'),
('41230', 'Seksi Evaluasi dan Pelaporan Statistik Ketenagakerjaan'),
('41300', 'Subdirektorat Statistik Upah dan Pendapatan'),
('41310', 'Seksi Statistik Upah'),
('41320', 'Seksi Statistik Pendapatan'),
('41400', 'Subdirektorat Statistik Mobilitas Penduduk dan Tenaga Kerja'),
('41410', 'Seksi Statistik Mobilitas Penduduk'),
('41420', 'Seksi Statistik Mobilitas Tenaga Kerja'),
('42000', 'Direktorat Statistik Kesejahteraan Rakyat'),
('42100', 'Subdirektorat Statistik Rumah Tangga'),
('42110', 'Seksi Penyiapan Statistik Rumah Tangga'),
('42120', 'Seksi Pengolahan Statistik Rumah Tangga'),
('42130', 'Seksi Evaluasi dan Pelaporan Statistik Rumah Tangga'),
('42200', 'Subdirektorat Statistik Pendidikan dan Kesejahteraan Sosial'),
('42210', 'Seksi Penyiapan Statistik Pendidikan dan Kesejahteraan Sosial'),
('42220', 'Seksi Pengolahan Statistik Pendidikan dan Kesejahteraan Sosial'),
('42230', 'Seksi Evaluasi dan Pelaporan Statistik Pendidikan dan Kesejahteraan Sosial'),
('42300', 'Subdirektorat Statistik Kesehatan dan Perumahan'),
('42310', 'Seksi Penyiapan Statistik Kesehatan dan Perumahan'),
('42320', 'Seksi Pengolahan Statistik Kesehatan dan Perumahan'),
('42330', 'Seksi Evaluasi dan Pelaporan Statistik Kesehatan dan Perumahan'),
('43000', 'Direktorat Statistik Ketahanan Sosial'),
('43100', 'Subdirektorat Statistik Ketahanan Wilayah'),
('43110', 'Seksi Penyiapan Statistik Ketahanan Wilayah'),
('43120', 'Seksi Pengolahan Statistik Ketahanan Wilayah'),
('43130', 'Seksi Evaluasi dan Pelaporan Statistik Ketahanan Wilayah'),
('43200', 'Subdirektorat Statistik Lingkungan Hidup'),
('43210', 'Seksi Statistik Lingkungan Hidup Binaan'),
('43220', 'Seksi Statistik Lingkungan Hidup Sosial'),
('43300', 'Subdirektorat Statistik Politik dan Keamanan'),
('43310', 'Seksi Statistik Politik'),
('43320', 'Seksi Statistik Keamanan'),
('43400', 'Subdirektorat Statistik Kerawanan Sosial'),
('43410', 'Seksi Statistik Kemiskinan'),
('43420', 'Seksi Statistik Kerawanan Sosial Baru'),
('50000', 'Deputi Bidang Statistik Produksi'),
('51000', 'Direktorat Statistik Tanaman Pangan, Hortikultura, dan Perkebunan'),
('51100', 'Subdirektorat Statistik Tanaman Pangan'),
('51110', 'Seksi Penyiapan Statistik Tanaman Pangan'),
('51120', 'Seksi Pengolahan Statistik Tanaman Pangan'),
('51130', 'Seksi Evaluasi dan Pelaporan Statistik Tanaman Pangan'),
('51200', 'Subdirektorat Statistik Hortikultura'),
('51210', 'Seksi Penyiapan Statistik Hortikultura'),
('51220', 'Seksi Pengolahan Statistik Hortikultura'),
('51230', 'Seksi Evaluasi dan Pelaporan Statistik Hortikultura'),
('51300', 'Subdirektorat Statistik Tanaman Perkebunan'),
('51310', 'Seksi Penyiapan Statistik Tanaman Perkebunan'),
('51320', 'Seksi Pengolahan Statistik Tanaman Perkebunan'),
('51330', 'Seksi Evaluasi dan Pelaporan Statistik Tanaman Perkebunan'),
('52000', 'Direktorat Statistik Peternakan, Perikanan, dan Kehutanan'),
('52100', 'Subdirektorat Statistik Peternakan'),
('52110', 'Seksi Penyiapan Statistik Peternakan'),
('52120', 'Seksi Pengolahan Statistik Peternakan'),
('52130', 'Seksi Evaluasi dan Pelaporan Statistik Peternakan'),
('52200', 'Subdirektorat Statistik Perikanan'),
('52210', 'Seksi Penyiapan Statistik Perikanan'),
('52220', 'Seksi Pengolahan Statistik Perikanan'),
('52230', 'Seksi Evaluasi dan Pelaporan Statistik Perikanan'),
('52300', 'Subdirektorat Statistik Kehutanan'),
('52310', 'Seksi Penyiapan Statistik Kehutanan'),
('52320', 'Seksi Pengolahan Statistik Kehutanan'),
('52330', 'Seksi Evaluasi dan Pelaporan Statistik Kehutanan'),
('53000', 'Direktorat Statistik Industri'),
('53100', 'Subdirektorat Statistik Industri Besar dan Sedang'),
('53110', 'Seksi Penyiapan Statistik Industri Besar dan Sedang'),
('53120', 'Seksi Pengolahan Statistik Industri Besar dan Sedang'),
('53130', 'Seksi Evaluasi dan Pelaporan Statistik Industri Besar dan Sedang'),
('53200', 'Subdirektorat Statistik Industri Kecil dan Rumah Tangga'),
('53210', 'Seksi Penyiapan Statistik Industri Kecil dan Rumah Tangga'),
('53220', 'Seksi Pengolahan Statistik Industri Kecil dan Rumah Tangga'),
('53230', 'Seksi Evaluasi dan Pelaporan Statistik Industri Kecil dan Rumah Tangga'),
('53300', 'Subdirektorat Statistik Pertambangan dan Energi'),
('53310', 'Seksi Penyiapan Statistik Pertambangan dan Energi'),
('53320', 'Seksi Pengolahan Statistik Pertambangan dan Energi'),
('53330', 'Seksi Evaluasi dan Pelaporan Statistik Pertambangan dan Energi'),
('53400', 'Subdirektorat Statistik Konstruksi'),
('53410', 'Seksi Penyiapan Statistik Konstruksi'),
('53420', 'Seksi Pengolahan Statistik Konstruksi'),
('53430', 'Seksi Evaluasi dan Pelaporan Statistik Konstruksi'),
('60000', 'Deputi Bidang Statistik Distribusi dan Jasa'),
('61000', 'Direktorat Statistik Distribusi'),
('61100', 'Subdirektorat Statistik Ekspor'),
('61110', 'Seksi Penyiapan Statistik Ekspor'),
('61120', 'Seksi Pengolahan Statistik Ekspor'),
('61130', 'Seksi Evaluasi dan Pelaporan Statistik Ekspor'),
('61200', 'Subdirektorat Statistik Impor'),
('61210', 'Seksi Penyiapan Statistik Impor'),
('61220', 'Seksi Pengolahan Statistik Impor'),
('61230', 'Seksi Evaluasi dan Pelaporan Statistik Impor'),
('61300', 'Subdirektorat Statistik Perdagangan Dalam Negeri'),
('61310', 'Seksi Penyiapan Statistik Perdagangan Dalam Negeri'),
('61320', 'Seksi Pengolahan Statistik Perdagangan Dalam Negeri'),
('61330', 'Seksi Evaluasi dan Pelaporan Statistik Perdagangan Dalam Negeri'),
('61400', 'Subdirektorat Statistik Transportasi'),
('61410', 'Seksi Penyiapan Statistik Transportasi'),
('61420', 'Seksi Pengolahan Statistik Transportasi'),
('61430', 'Seksi Evaluasi dan Pelaporan Statistik Transportasi'),
('62000', 'Direktorat Statistik Harga'),
('62100', 'Subdirektorat Statistik Harga Produsen'),
('62110', 'Seksi Penyiapan Statistik Harga Produsen'),
('62120', 'Seksi Pengolahan Statistik Harga Produsen'),
('62130', 'Seksi Evaluasi dan Pelaporan Statistik Harga Produsen'),
('62200', 'Subdirektorat Statistik Harga Perdagangan Besar'),
('62210', 'Seksi Penyiapan Statistik Harga Perdagangan Besar'),
('62220', 'Seksi Pengolahan Statistik Harga Perdagangan Besar'),
('62230', 'Seksi Evaluasi dan Pelaporan Statistik Harga Perdagangan Besar'),
('62300', 'Subdirektorat Statistik Harga Konsumen'),
('62310', 'Seksi Penyiapan Statistik Harga Konsumen'),
('62320', 'Seksi Pengolahan Statistik Harga Konsumen'),
('62330', 'Seksi Evaluasi dan Pelaporan Statistik Harga Konsumen'),
('62400', 'Subdirektorat Statistik Harga Pedesaan'),
('62410', 'Seksi Penyiapan Statistik Harga Pedesaan'),
('62420', 'Seksi Pengolahan Statistik Harga Pedesaan'),
('62430', 'Seksi Evaluasi dan Pelaporan Statistik Harga Pedesaan'),
('63000', 'Direktorat Statistik Keuangan, Teknologi Informasi, dan Pariwisata'),
('63100', 'Subdirektorat Statistik Keuangan'),
('63110', 'Seksi Statistik Keuangan Pemerintah'),
('63120', 'Seksi Statistik Lembaga Keuangan'),
('63130', 'Seksi Statistik Badan Usaha dan Pasar Modal'),
('63200', 'Subdirektorat Statistik Komunikasi dan Teknologi Informasi'),
('63210', 'Seksi Penyiapan Statistik Komunikasi dan Teknologi Informasi'),
('63220', 'Seksi Pengolahan Statistik Komunikasi dan Teknologi Informasi'),
('63230', 'Seksi Evaluasi dan Pelaporan Statistik Komunikasi dan Teknologi Informasi'),
('63300', 'Subdirektorat Statistik Pariwisata'),
('63310', 'Seksi Penyiapan Statistik Pariwisata'),
('63320', 'Seksi Pengolahan Statistik Pariwisata'),
('63330', 'Seksi Evaluasi dan Pelaporan Statistik Pariwisata'),
('70000', 'Deputi Bidang Neraca dan Analisis Statistik'),
('71000', 'Direktorat Neraca Produksi'),
('71100', 'Subdirektorat Neraca Barang'),
('71110', 'Seksi Neraca Pertanian'),
('71120', 'Seksi Neraca Industri'),
('71130', 'Seksi Neraca Pertambangan, Energi, dan Konstruksi'),
('71200', 'Subdirektorat Neraca Jasa'),
('71210', 'Seksi Neraca Perdagangan, Hotel, dan Restoran'),
('71220', 'Seksi Neraca Transportasi dan Komunikasi'),
('71230', 'Seksi Neraca Bank, Lembaga Keuangan Bukan Bank, dan Jasa Lainnya'),
('71300', 'Subdirektorat Konsolidasi Neraca Produksi Nasional'),
('71310', 'Seksi Konsolidasi Neraca Produksi Triwulanan'),
('71320', 'Seksi Konsolidasi Neraca Produksi Tahunan'),
('71330', 'Seksi Konsolidasi Neraca Lintas Sektor'),
('71400', 'Subdirektorat Konsolidasi Neraca Produksi Regional'),
('71410', 'Seksi Konsolidasi Neraca Barang Regional'),
('71420', 'Seksi Konsolidasi Neraca Jasa Regional'),
('71430', 'Seksi Konsolidasi Neraca Lintas Regional'),
('72000', 'Direktorat Neraca Pengeluaran'),
('72100', 'Subdirektorat Neraca Rumah Tangga dan Institusi Nirlaba'),
('72110', 'Seksi Neraca Usaha Rumah Tangga'),
('72120', 'Seksi Neraca Pengeluaran Rumah Tangga'),
('72130', 'Seksi Neraca Institusi Nirlaba'),
('72200', 'Subdirektorat Neraca Pemerintah dan Badan Usaha'),
('72210', 'Seksi Neraca Pemerintahan Umum'),
('72220', 'Seksi Neraca Badan Usaha Pemerintah'),
('72230', 'Seksi Neraca Badan Usaha Swasta'),
('72300', 'Subdirektorat Neraca Modal dan Luar Negeri'),
('72310', 'Seksi Neraca Modal dan Akumulasi'),
('72320', 'Seksi Neraca Luar Negeri'),
('72330', 'Seksi Neraca Arus Dana'),
('72400', 'Subdirektorat Konsolidasi Neraca Pengeluaran'),
('72410', 'Seksi Konsolidasi Neraca Institusi'),
('72420', 'Seksi Konsolidasi Neraca  Sosial Ekonomi'),
('72430', 'Seksi Konsolidasi Neraca Pengeluaran Regional'),
('73000', 'Direktorat Analisis dan Pengembangan Statistik'),
('73100', 'Subdirektorat Analisis Statistik'),
('73110', 'Seksi Analisis Statistik Sosial'),
('73120', 'Seksi Analisis Statistik Ekonomi'),
('73130', 'Seksi Analisis Statistik Lintas Sektor'),
('73200', 'Subdirektorat Konsistensi Statistik'),
('73210', 'Seksi Konsistensi Statistik Sosial'),
('73220', 'Seksi Konsistensi Statistik Ekonomi'),
('73300', 'Subdirektorat Indikator Statistik'),
('73310', 'Seksi Indikator Statistik Sosial'),
('73320', 'Seksi Indikator Statistik Ekonomi'),
('73330', 'Seksi Indikator Statistik Lintas Sektor'),
('73400', 'Subdirektorat Pengembangan Model Statistik'),
('73410', 'Seksi Pengembangan Model Statistik Sosial'),
('73420', 'Seksi Pengembangan Model Statistik Ekonomi'),
('73500', 'Pejabat Fungsional'),
('80000', 'Inspektorat Utama'),
('80100', 'Bagian Administrasi'),
('80110', 'Subbagian Tata Usaha'),
('80120', 'Subbagian Penyusunan Program'),
('80130', 'Subbagian Evaluasi dan Pelaporan'),
('81000', 'Inspektorat Wilayah I'),
('82000', 'Inspektorat Wilayah II'),
('83000', 'Inspektorat Wilayah III');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `tiket` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `waktu` datetime NOT NULL,
  `pesan` text COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `tiket`, `username`, `waktu`, `pesan`, `level`) VALUES
(1, 201721, 'rian', '2018-02-22 18:54:23', 'Yth.  Admin Halosis.bps.go.id  Dengan hormat,  Bersama ini kami sampaikan permohonan pembuatan aplikasi berbasis website untuk penarikan sampel Kegiatan VIMK18 Triwulanan Atas kerjasama nya kami ucapkan terima kasih  M. Qadarian Bahagia', '9'),
(2, 201722, 'rian', '2018-02-22 18:56:56', 'Yth.  Admin Halosis.bps.go.id  Dengan hormat,  Bersama ini kami sampaikan permohonan pembuatan aplikasi berbasis website untuk penarikan sampel Kegiatan VIMK18 Tahunan. Atas kerjasama nya kami ucapkan terima kasih.  M. Qadarian Bahagia', '9'),
(3, 201721, 'rian', '2018-02-22 18:57:57', 'Yth. Admin Halosis.bps.go.id Dengan hormat, Bersama ini kami sampaikan permohonan pembuatan aplikasi berbasis website untuk penarikan sampel KegiatanMonitoring VIMK18 Triwulanan. Atas kerjasama nya kami ucapkan terima kasih. M. Qadarian Bahagia', '9'),
(4, 201721, 'rian', '2018-02-22 18:59:52', 'Ralat sebelumnya : Yth. Admin Halosis.bps.go.id. Dengan hormat, Bersama ini kami sampaikan permohonan pembuatan aplikasi berbasis website untuk Monitoring Kegiatan VIMK18 Triwulanan. Atas kerjasama nya kami ucapkan terima kasih. M. Qadarian Bahagia', '9'),
(5, 201721, 'tenie', '2018-02-26 13:25:21', 'Selamat Siang Bapak Qadarian...Untuk pembuatan aplikasi, silahkan membuka tiket melalui portal halosis.bps.go.id, dengan melampirkan formulir yang sudah ditandatangi eselon', '0'),
(6, 201721, 'tenie', '2018-02-26 13:26:35', 'Aplikasi SIPA ini nanti akan digunakan untuk meng-upload requirement yang dibutuhkan untuk pembangunan aplikasi, terima kasih.', '0');

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `nip` varchar(18) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `beban` int(11) NOT NULL,
  `keahlian` int(11) NOT NULL,
  `expert` varchar(50) NOT NULL,
  `expert1` int(11) NOT NULL DEFAULT '0',
  `expert2` int(11) NOT NULL DEFAULT '0',
  `expert3` int(11) NOT NULL DEFAULT '0',
  `expert4` int(11) NOT NULL DEFAULT '0',
  `expert5` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`nip`, `nama`, `beban`, `keahlian`, `expert`, `expert1`, `expert2`, `expert3`, `expert4`, `expert5`) VALUES
('340014529', ' Rudi Cahyadi ', 8, 1, '5 ', 0, 0, 0, 0, 0),
('340015082', ' Minto Setiyo, SST', 4, 2, '6 9 ', 0, 0, 0, 0, 0),
('340017798', ' Novita Ningrum Maldriawaty, SST', 4, 3, '1 5 9 ', 0, 0, 0, 0, 0),
('340019177', ' Kemas Muhammad Irsan Riza SST, MT.', 4, 2, '4 9 ', 0, 0, 0, 0, 0),
('340019229', ' R. Tenie Permata Kusumah SST, MT.', 4, 2, '4 9 ', 0, 0, 0, 0, 0),
('340050046', ' Christiana Dyah Ratnasari, SST', 4, 2, '5 9 ', 0, 0, 0, 0, 0),
('340050172', ' Ndaru Nuswantari SST, MTI.', 4, 3, '3 5 9 ', 0, 0, 0, 0, 0),
('340051036', ' Andrian Widihastanto, S.Kom.', 4, 3, '2 4 9 ', 0, 0, 0, 0, 0),
('340053197', ' Danuk Cahya Permana SST, MTI.', 4, 4, '3 4 5 9 ', 0, 0, 0, 0, 0),
('340053206', ' Kukuh Yuliasih Putri S.ST, M.Eng.', 4, 3, '1 3 9 ', 0, 0, 0, 0, 0),
('340053330', ' Rico Martenstyaro S.ST., M.T.', 1, 2, '3 4 ', 0, 0, 0, 0, 0),
('340054077', ' Aulia Roza Albareta SST, MTI.', 4, 2, '5 9 ', 0, 0, 0, 0, 0),
('340054345', ' Muhammad Rio Bastian SST, MT.', 4, 3, '3 5 9 ', 0, 0, 0, 0, 0),
('340055718', ' Aisha Adetia, SST.', 4, 3, '5 9 11 ', 0, 0, 0, 0, 0),
('340055719', ' Alfian May Purbany, SST.', 4, 4, '1 3 9 11 ', 0, 0, 0, 0, 0),
('340055797', ' Handita Okviyanto, SST.', 4, 6, '1 3 4 5 9 12 ', 0, 0, 0, 0, 0),
('340055916', ' Sara Sridebora Syaloom Sorta SST', 4, 4, '2 5 9 11 ', 0, 0, 0, 0, 0),
('340056201', ' Agustika Indah Mayangsari, SST.', 4, 4, '1 3 5 9 ', 0, 0, 0, 0, 0),
('340056313', ' Ignatius Aditya Setyadi SST', 4, 4, '2 3 9 10 ', 0, 0, 0, 0, 0),
('340056415', ' Rendra Achyunda Anugrah Putra, SST.', 4, 3, '3 5 9 ', 0, 0, 0, 0, 0),
('340056456', ' Sinta Denovi Rahmawati SST', 4, 2, '3 9 ', 0, 0, 0, 0, 0),
('340056749', ' Ayuningtyas Hari Fristiana SST', 4, 3, '1 3 9 ', 0, 0, 0, 0, 0),
('340056750', ' Rahma Nur Hindarwan, SST', 4, 6, '1 2 3 4 5 9 ', 0, 0, 0, 0, 0),
('340056752', ' Ratih Tri Hutami SST', 4, 3, '3 5 9 ', 0, 0, 0, 0, 0),
('340056761', ' Rizkiyani Harminingtyas, SST.', 4, 3, '1 3 9 ', 0, 0, 0, 0, 0),
('340057360', ' Ema Yulandika Setyaning Puspitasari, SST.', 4, 4, '1 3 5 9 ', 0, 0, 0, 0, 0),
('340057506', ' Mutiara Mawarni, SST', 4, 4, '1 3 5 9 ', 0, 0, 0, 0, 0),
('340057678', ' Waiz Al Qorni, SST', 4, 6, '1 2 3 5 9 10 ', 0, 0, 0, 0, 0),
('340058456', ' Rezkya Putri Septiani SST', 4, 5, '2 3 4 7 9 ', 0, 0, 0, 0, 0),
('340058489', ' Septiawan Aji Pradana SST', 4, 5, '2 3 4 7 9 ', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `tiket` int(11) NOT NULL,
  `perubahan` int(11) DEFAULT '0',
  `nama` varchar(250) NOT NULL,
  `nama_perubahan` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`tiket`, `perubahan`, `nama`, `nama_perubahan`) VALUES
(8957161, 0, '8957161-kue-33300-AplikasiPBD-POCNetezza.pdf', NULL),
(8957161, 0, '8957161-bp-33300-AplikasiPBD-RStudiokeHive-Hadoop.pdf', NULL),
(8957161, 0, '8957161-bp-33300-AplikasiPBD-POCNetezza.pdf', NULL),
(2782387, 0, '2782387-kue-53400-UpdatingPerusahaanKonstruksi-KuesionerUDP-2018.pdf', NULL),
(2782387, 0, '2782387-bp-53400-UpdatingPerusahaanKonstruksi-BisnisProsesKonstruksi.docx', NULL),
(8957161, 0, '8957161-bp-33300-Aplikasi-RStudiokeHive-Hadoop.pdf', NULL),
(2782387, 0, '2782387-kue-53400-SistemSurveiKonstruksiBPS-KuesionerSKTR-2018.pdf', NULL),
(2782387, 0, '2782387-kue-53400-SistemSurveiKonstruksiBPS-KuesionerSKTH-2017.pdf', NULL),
(2782387, 0, '2782387-rv-53400-SistemSurveiKonstruksiBPS-RULEVALIDASI.docx', NULL),
(2782387, 0, '2782387-rt-53400-SistemSurveiKonstruksiBPS-RancanganTabulasi.xls', NULL),
(2725828, 0, '2725828-kue-63300-UpdatingDirektoriUsahaAkomodasi-UpdatingHotel2018(used).pdf', NULL),
(1852507, 0, '1852507-kue-33100-AplikasiSBH-kuesi_sbh2018_p_edit-page-001.jpg', NULL),
(7147295, 0, '7147295-33100-SurveiPerdaganganDalamNegeriBeberapaKom-RuleValidasi.docx', NULL),
(7147295, 0, '7147295-33100-SurveiPerdaganganDalamNegeriBeberapaKom-DraftKuesioner.xlsx', ''),
(2725828, 0, '2725828-bp-63300-UpdatingDirektoriUsahaAkomodasi-PedomanSingkatPengisianUpdatingDirektoriAKOMODASI-18.UP.pdf', NULL),
(5762202, 0, '5762202-rv-81000-SistemInformasiManajemenPengawasan(-MatriksPKPTWilIrencanapkpt2016rumus.xlsx', NULL),
(5762202, 0, '5762202-bp-81000-SistemInformasiManajemenPengawasan(-MatriksPKPTWilIrencanapkpt2016rumus.xlsx', NULL),
(5762202, 0, '5762202-kue-81000-SistemInformasiManajemenPengawasan(-MatriksPKPTWilIrencanapkpt2016rumus.xlsx', NULL),
(5762202, 0, '5762202-rt-81000-SistemInformasiManajemenPengawasan(-MatriksPKPTWilIrencanapkpt2016rumus.xlsx', NULL),
(8291400, 0, '8291400-kue-61300-SurveiTriwulananKegiatanUsaha(STKU)-01KuesionerSTKU-G2018Update08032018.xlsx', NULL),
(8291400, 0, '8291400-kue-61300-SurveiTriwulananKegiatanUsaha(STKU)-_KuesionerSTKU-H2018(FIN080318).xlsx', NULL),
(8291400, 0, '8291400-kue-61300-SurveiTriwulananKegiatanUsaha(STKU)-20180226KuesionerSTKU-J_2018Draft02(1).xls', NULL),
(8291400, 0, '8291400-rv-61300-SurveiTriwulananKegiatanUsaha(STKU)-ValidasiIsiandanKonsistensiSTKU-G2018_F_08Maret2018_r.docx', NULL),
(8291400, 0, '8291400-rv-61300-SurveiTriwulananKegiatanUsaha(STKU)-RULEVALIDASISTKUJ(1).docx', NULL),
(1852507, 0, '1852507-kue-33100-AplikasiSBH-VBH18-BL.pdf', NULL),
(1852507, 0, '1852507-kue-33100-AplikasiSBH-VBH18-LKrevisi.pdf', NULL),
(3680452, 0, '3680452-kue-72300-SistemPengolahanSurveiPenyusunanDis-Kuesioner6Maret2018.zip', NULL),
(1852507, 0, '1852507-kue-33100-AplikasiSBH-kuesi_sbh2018_p_edit-page-002.jpg', NULL),
(1852507, 0, '1852507-rv-33100-AplikasiSBH-ValidasiBL.xlsx', NULL),
(1457008, 0, '1457008-bp-51200-ProgramPengolahanSurveiStrukturOngk-BisnisProsesSOUH2018.jpg', NULL),
(1457008, 0, '1457008-kue-51200-ProgramPengolahanSurveiStrukturOngk-KuesSOUH201813032018.pdf', NULL),
(1457008, 0, '1457008-rv-51200-ProgramPengolahanSurveiStrukturOngk-RuleValidasidanRangeCheckSOUH2018.docx', NULL),
(1457008, 0, '1457008-rt-51200-ProgramPengolahanSurveiStrukturOngk-RantabSOUH2018.rar', NULL),
(2696723, 0, '2696723-bp-51200-AplikasiMonitoringSurveiStrukturOng-BisnisProsesSOUH2018.jpg', NULL),
(2696723, 0, '2696723-kue-51200-AplikasiMonitoringSurveiStrukturOng-KuesSOUH201813032018.pdf', NULL),
(2696723, 0, '2696723-rv-51200-AplikasiMonitoringSurveiStrukturOng-RuleValidasidanRangeCheckSOUH2018.docx', NULL),
(2696723, 0, '2696723-rt-51200-AplikasiMonitoringSurveiStrukturOng-MonitoringSOUH2018.xlsx', NULL),
(5959607, 0, '5959607-bp-43100-AplikasiEntriPendataanPotensiDesa-skemaentri,validasi,dancleaningdataOK(2).pptx', NULL),
(5959607, 0, '5959607-kue-43100-AplikasiEntriPendataanPotensiDesa-01.KuesionerPodesDesa2018.pdf', NULL),
(5959607, 0, '5959607-kue-43100-AplikasiEntriPendataanPotensiDesa-02.KuesionerPodesJorong2018.pdf', NULL),
(5959607, 0, '5959607-kue-43100-AplikasiEntriPendataanPotensiDesa-03.KuesionerPodesNagari2018.pdf', NULL),
(5959607, 0, '5959607-kue-43100-AplikasiEntriPendataanPotensiDesa-04.KuesionerPodesKecamatan.pdf', NULL),
(5959607, 0, '5959607-kue-43100-AplikasiEntriPendataanPotensiDesa-05.KuesionerPodesKabupaten.pdf', NULL),
(5959607, 0, '5959607-rv-43100-AplikasiEntriPendataanPotensiDesa-RuleValidasiPodes.rar', NULL),
(5959607, 0, '5959607-rt-43100-AplikasiEntriPendataanPotensiDesa-02.dummytabelpermasalahan.xlsx', NULL),
(9283472, 0, '9283472-kue-51300-skbonline-FileKuesionerHaloSIS.rar', NULL),
(9283472, 0, '9283472-rv-51300-SKBOnline(TahunandanTriwulanan)-RuleValidasiSKB.xlsx', NULL),
(9283472, 0, '9283472-rt-51300-SKBOnline(TahunandanTriwulanan)-RancanganTabulasiSKB.docx', NULL),
(9283472, 0, '9283472-bp-51300-SKBOnline(TahunandanTriwulanan)-BusinessProcessSKBOnline.pptx', NULL),
(8636091, 0, '8636091-rt-51300-VKAKAO2018-RancanganTabulasiVKAKAO2018.docx', NULL),
(8636091, 0, '8636091-rv-51300-VKAKAO2018-RuleValidasiVKAKAO2018_02032018.docx', NULL),
(8636091, 0, '8636091-bp-51300-VKAKAO2018-BusinessProcessVKAKAO2018.pptx', NULL),
(8636091, 0, '8636091-kue-51300-VKAKAO2018-KuesionerVKAKAO201801032018.zip', NULL),
(1586713, 0, '1586713-kue-52100-LTPTernak-DaftarLTS_LaporanPerusahaanPeternakanSapiPerah2017_TA2018.pdf', NULL),
(1586713, 0, '1586713-kue-52100-LTPTernak-DaftarLTT_LaporanPerusahaanPeternakanTernakBesarKecil2017_TA2018.pdf', NULL),
(1586713, 0, '1586713-kue-52100-LTPTernak-DaftarLTU_LaporanPerusahaanPeternakanUnggas2017_TA2018.pdf', NULL),
(1586713, 0, '1586713-rv-52100-LTPTernak-Range_Struktur_RuleValLTS2017.docx', NULL),
(1586713, 0, '1586713-bp-52100-LTPTernak-AlurBisnisLaporanTahunanPerusahaanPeternakan2017.pdf', NULL),
(1586713, 0, '1586713-rt-52100-LTPTernak-RantabLTS2017.xlsx', NULL),
(1586713, 0, '1586713-rt-52100-LTPTernak-RantabLTT2017.xlsx', NULL),
(1586713, 0, '1586713-rt-52100-LTPTernak-RantabLTU2017.xlsx', NULL),
(1852507, 0, '1852507-bp-33100-AplikasiSBH-MekanismeSBH.vsd', NULL),
(8955628, 0, '8955628-dk-52100-LTPTernak-TambahanmenuLTPTernak.pdf', NULL),
(9336419, 0, '9336419-kue-63300-ProgramPengolahanVHTL2018-VHTL2018rev1.6.pdf', NULL),
(1852507, 0, '1852507-rt-33100-AplikasiSBH-DaftarKotaSBH.xlsx', NULL),
(5614827, 0, '5614827-bp-61100-AplikasiEkspor-Kudex-bisnisprosesKudex.docx', NULL),
(5614827, 0, '5614827-kue-61100-AplikasiEkspor-Kudex-bisnisprosesKudex.docx', NULL),
(5614827, 0, '5614827-rv-61100-AplikasiEkspor-Kudex-bisnisprosesKudex.docx', NULL),
(5614827, 0, '5614827-rt-61100-AplikasiEkspor-Kudex-bisnisprosesKudex.docx', NULL),
(2815655, 0, '2815655-kue-63300-SIMODUTA(VHTS)-B-004PengolahansampeltambahanVHT-18.S.pdf', NULL),
(2815655, 0, '2815655-bp-63300-SIMODUTA(VHTS)-Panduan_SIMODUTA.pdf', NULL),
(2815655, 0, '2815655-rv-63300-SIMODUTA(VHTS)-B-004PengolahansampeltambahanVHT-18.S.pdf', NULL),
(2815655, 0, '2815655-rv-63300-SIMODUTA(VHTS)-notulenrapatwisnusPES23022018.PDF', NULL),
(2815655, 0, '2815655-rt-63300-SIMODUTA(VHTS)-B-004PengolahansampeltambahanVHT-18.S.pdf', NULL),
(2664415, 0, '2664415-kue-62200-PengolahandanPenghitunganIHPB-KuesionerHPB.pdf', NULL),
(6577418, 0, '6577418-bp-63200-MonitoringSurveiP2TIK-20160323PanduanMonitoringP2TIK2016.docx', NULL),
(4165060, 0, '4165060-bp-63200-MonitoringSurveiPerusahaanInformasi-MonitoringonlineInfokom2018.doc', NULL),
(2664415, 0, '2664415-bp-62200-PengolahandanPenghitunganIHPB-BusinessProcessSHPBOnline.pdf', NULL),
(2664415, 0, '2664415-rv-62200-PengolahandanPenghitunganIHPB-shpb_cutofpointRH.xlsx', NULL),
(2664415, 0, '2664415-rt-62200-PengolahandanPenghitunganIHPB-tabulasipengolahanekspornonmigas.png', NULL),
(2664415, 0, '2664415-rt-62200-PengolahandanPenghitunganIHPB-tabulasipengolahanekspormigas.png', NULL),
(2664415, 0, '2664415-rt-62200-PengolahandanPenghitunganIHPB-tabulasipengolahanIHPBagregat.png', NULL),
(2664415, 0, '2664415-rt-62200-PengolahandanPenghitunganIHPB-tabulasipengolahanIHPBdomestik1.png', NULL),
(2664415, 0, '2664415-rt-62200-PengolahandanPenghitunganIHPB-tabulasipengolahanIHPBdomestik2.png', NULL),
(2664415, 0, '2664415-rt-62200-PengolahandanPenghitunganIHPB-tabulasipengolahanimpormigas.png', NULL),
(2664415, 0, '2664415-rt-62200-PengolahandanPenghitunganIHPB-tabulasipengolahanimpornonmigas.png', NULL),
(2664415, 0, '2664415-rt-62200-PengolahandanPenghitunganIHPB-tabulasipengolahankonstruksi1.png', NULL),
(2664415, 0, '2664415-rt-62200-PengolahandanPenghitunganIHPB-tabulasipengolahankonstruksi2.png', NULL),
(2664415, 0, '2664415-rt-62200-PengolahandanPenghitunganIHPB-tabulasipengolahansop1.png', NULL),
(2664415, 0, '2664415-rt-62200-PengolahandanPenghitunganIHPB-tabulasiRHlebihdari150persen.png', NULL),
(2664415, 0, '2664415-rt-62200-PengolahandanPenghitunganIHPB-tabulasipengolahansop2.png', NULL),
(2664415, 0, '2664415-rt-62200-PengolahandanPenghitunganIHPB-tabulasiRHkurangdari75persen.png', NULL),
(2664415, 0, '2664415-rt-62200-PengolahandanPenghitunganIHPB-tabulasiRHalasanekstrim.png', NULL),
(2664415, 0, '2664415-rt-62200-PengolahandanPenghitunganIHPB-tabulasilaporanprovinsi.png', NULL),
(2664415, 0, '2664415-rt-62200-PengolahandanPenghitunganIHPB-tabulasilaporankomoditi.png', NULL),
(2664415, 0, '2664415-rt-62200-PengolahandanPenghitunganIHPB-tabulasievaluasidokumen(provinsi).png', NULL),
(2664415, 0, '2664415-rt-62200-PengolahandanPenghitunganIHPB-tabulasievaluasidokumen(kabupaten).png', NULL),
(2664415, 0, '2664415-rt-62200-PengolahandanPenghitunganIHPB-tabulasicatatan.png', NULL),
(2664415, 0, '2664415-rt-62200-PengolahandanPenghitunganIHPB-tabulasialasanekstrim.png', NULL),
(6942218, 0, '6942218-rt-51100-webmonitoringSKGB2018-MonitoringSKGBPenggilingan.xlsx', NULL),
(3680452, 0, '3680452-bp-72300-PengolahanSurveiDisagregasiPMTB-BisnisProsesPengolahanPMTB2018.pdf', NULL),
(123456, 0, '123456-bp-33100-MOIBS-DaftarKebutuhan.docx', NULL),
(123456, 0, '123456-kue-33100-MOIBS-DaftarKebutuhan.docx', NULL),
(123456, 0, '123456-dk-33100-MOIBS-SistemPengolahanIBS2018.pptx', NULL),
(2664415, 0, '2664415-rv-62200-SHPBOnline-DaftarKebutuhan.docx', NULL),
(2664415, 0, '2664415-rt-62200-SHPBOnline-DaftarKebutuhan.docx', NULL),
(123456, 0, '123456-rv-33100-MOIBS-DaftarKebutuhan.docx', NULL),
(123456, 0, '123456-rt-33100-MOIBS-DaftarKebutuhan.docx', NULL),
(6942218, 0, '6942218-rt-51100-webmonitoringSKGB2018-MonitoringSKGBPengeringan.xlsx', NULL),
(6842174, 0, '6842174-rv-61300-AplikasiPengolahanSurveiPerdagangan-RuleValidasiRangeCheckVPAW-18_20180326.docx', NULL),
(6842174, 0, '6842174-bp-61300-AplikasiPengolahanSurveiPerdagangan-AlurPencacahanPAW.docx', NULL),
(6842174, 0, '6842174-bp-61300-AplikasiPengolahanSurveiPerdagangan-JadwalPAW.xlsx', NULL),
(6842174, 0, '6842174-kue-61300-AplikasiPengolahanSurveiPerdagangan-Kuesionerpaw20180321.xlsx', NULL),
(6842174, 0, '6842174-rt-61300-AplikasiPengolahanSurveiPerdagangan-DummyTabelPAW2018.xlsx', NULL),
(6466597, 0, '6466597-bp-53200-PengolahanVIMK18Tahunan-FormPenarikansampelbysistem.pdf', NULL),
(5725998, 0, '5725998-kue-53200-PengolahanVIMK18Triwulanan-VIMK18-L2Maret2018.pdf', NULL),
(2446346, 0, '2446346-kue-53200-WebMonitoringSurveiIndustriMikroda-VIMK18-RB1.pdf', NULL),
(3680452, 0, '3680452-rv-72300-SistemPengolahanSurveiPenyusunanDis-RuleValidasiMIP01-MIRT-MILNPRT.zip', NULL),
(3680452, 0, '3680452-rt-72300-SistemPengolahanSurveiPenyusunanDis-RANCANGANTABULASIPMTB.docx', NULL),
(3680452, 0, '3680452-dk-72300-SistemPengolahanSurveiPenyusunanDis-DaftarKebutuhanSistemPengolahanPMTB2018.docx', NULL),
(2132033, 0, '2132033-kue-51300-VTEBU2018-KuesionerVTEBU2018.zip', NULL),
(2132033, 0, '2132033-rv-51300-VTEBU2018-RuleValidasiVTEBU2018_05042018.docx', NULL),
(2132033, 0, '2132033-rt-51300-VTEBU2018-RancanganTabulasiVTEBU2018.docx', NULL),
(2132033, 0, '2132033-bp-51300-VTEBU2018-BisnisProsesVTEBU2018.docx', NULL),
(4084655, 0, '4084655-bp-51300-DPPNRT-BusinessProcessDirektoriPerusahaanPertanianTahun2018.docx', NULL),
(4084655, 0, '4084655-kue-51300-DPPNRT-Kuesioner_DPP2018.pdf', NULL),
(4084655, 0, '4084655-rv-51300-DPPNRT-RULE&Range_DPP.xlsx', NULL),
(4084655, 0, '4084655-rt-51300-DPPNRT-Rantab_DPP2018.docx', NULL),
(6345829, 0, '6345829-dk-52100-RPHTPH-PermintaanTambahanFiturAplikasiRPHTPH.pdf', NULL),
(6345829, 0, '6345829-rt-52100-RPHTPH-PerbedaanantaraDataJanDesdenganJumlahDataSetiapBulan.pdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fitur`
--

CREATE TABLE `fitur` (
  `kode` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fitur`
--

INSERT INTO `fitur` (`kode`, `nama`) VALUES
(1, 'Entri Data'),
(2, 'Backup dan Restore Data'),
(3, 'Pengelolaan Master (User, Wilayah, Direktori, dll)'),
(4, 'Tabulasi'),
(5, 'Progress dan Monitoring'),
(6, 'Utility - Cek Similarity'),
(7, 'Data Crawling (Kapow)'),
(8, 'Export Data'),
(9, 'Penarikan Sampel');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_perubahan`
--

CREATE TABLE `jenis_perubahan` (
  `kode` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_perubahan`
--

INSERT INTO `jenis_perubahan` (`kode`, `nama`) VALUES
(1, 'Jadwal'),
(2, 'Fitur'),
(3, 'Kuesioner'),
(4, 'Rule Validasi'),
(5, 'Rencana Tabulasi');

-- --------------------------------------------------------

--
-- Table structure for table `kebutuhan`
--

CREATE TABLE `kebutuhan` (
  `kode` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kebutuhan`
--

INSERT INTO `kebutuhan` (`kode`, `nama`) VALUES
(1, 'Pembangunan Aplikasi Pengolahan Data'),
(2, 'Pengembangan Aplikasi Pengolahan Data'),
(3, 'Pembangunan Aplikasi Monitoring'),
(4, 'Pengembangan Aplikasi Monitoring');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `kode` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`kode`, `nama`) VALUES
(0, 'Administrator'),
(1, 'Supervisor'),
(2, 'Developer'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `perubahan`
--

CREATE TABLE `perubahan` (
  `tiket` int(11) NOT NULL,
  `perubahan` int(11) NOT NULL,
  `jenis` varchar(10) DEFAULT NULL,
  `keterangan` text,
  `alasan` text,
  `mulai_awal` date DEFAULT NULL,
  `selesai_awal` date DEFAULT NULL,
  `durasi_awal` int(11) DEFAULT NULL,
  `mulai_baru` date DEFAULT NULL,
  `selesai_baru` date DEFAULT NULL,
  `durasi_baru` int(11) DEFAULT NULL,
  `fitur_awal` varchar(50) DEFAULT NULL,
  `fitur_baru` varchar(50) DEFAULT NULL,
  `ket_fitur` text,
  `alasan_fitur` text,
  `kuesioner_lama` text,
  `kuesioner_baru` text,
  `ket_kuesioner` text,
  `alasan_kuesioner` text,
  `rule_lama` text,
  `rule_baru` text,
  `ket_rule` text,
  `alasan_rule` text,
  `tabulasi_lama` text,
  `tabulasi_baru` text,
  `ket_tabulasi` text,
  `alasan_tabulasi` text,
  `tanggal` datetime DEFAULT NULL,
  `konfirmasi` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perubahan`
--

INSERT INTO `perubahan` (`tiket`, `perubahan`, `jenis`, `keterangan`, `alasan`, `mulai_awal`, `selesai_awal`, `durasi_awal`, `mulai_baru`, `selesai_baru`, `durasi_baru`, `fitur_awal`, `fitur_baru`, `ket_fitur`, `alasan_fitur`, `kuesioner_lama`, `kuesioner_baru`, `ket_kuesioner`, `alasan_kuesioner`, `rule_lama`, `rule_baru`, `ket_rule`, `alasan_rule`, `tabulasi_lama`, `tabulasi_baru`, `ket_tabulasi`, `alasan_tabulasi`, `tanggal`, `konfirmasi`) VALUES
(3333, 1, '2 3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1 2 ', '3 ', 'asda', 'asdas', '', '-rev1.pdf', '1231', '123123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-02-15 10:02:39', '0');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `kode` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`kode`, `nama`) VALUES
(1, 'C#'),
(2, 'Java'),
(3, 'PHP'),
(4, 'Android'),
(5, '.NET'),
(6, 'VB'),
(7, 'Phyton'),
(8, 'Ruby'),
(9, 'SQL Server'),
(10, 'Kapow (Data Crawling)'),
(11, 'Altosoft (Dashboard)'),
(12, 'Sharepoint (Collaboration)');

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `tiket` int(11) NOT NULL,
  `bagian` varchar(5) NOT NULL,
  `nama` char(150) NOT NULL,
  `tujuan` text NOT NULL,
  `kebutuhan` varchar(1) NOT NULL,
  `aplikasi` varchar(1) NOT NULL,
  `level` varchar(1) NOT NULL,
  `ketlain` text NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `mulai_keg` date DEFAULT NULL,
  `selesai_keg` date DEFAULT NULL,
  `durasi` int(11) NOT NULL,
  `durasi_keg` int(11) DEFAULT NULL,
  `progres` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `fitur` int(11) NOT NULL,
  `fitur_permintaan` varchar(50) DEFAULT NULL,
  `fitur_fix` varchar(50) DEFAULT NULL,
  `bp` varchar(1) DEFAULT NULL,
  `dokbp` text,
  `kue` varchar(1) DEFAULT NULL,
  `dokkue` text,
  `rv` varchar(1) DEFAULT NULL,
  `dokrv` text,
  `rt` varchar(1) DEFAULT NULL,
  `dokrt` text,
  `approve` varchar(1) NOT NULL DEFAULT '0',
  `developer` varchar(18) DEFAULT NULL,
  `alokasi` varchar(1) NOT NULL DEFAULT '0',
  `user` varchar(18) NOT NULL,
  `tgl_entri` datetime NOT NULL,
  `alasan` text,
  `tahun` year(4) NOT NULL,
  `pengembangan` int(11) DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`tiket`, `bagian`, `nama`, `tujuan`, `kebutuhan`, `aplikasi`, `level`, `ketlain`, `mulai`, `selesai`, `mulai_keg`, `selesai_keg`, `durasi`, `durasi_keg`, `progres`, `parent`, `fitur`, `fitur_permintaan`, `fitur_fix`, `bp`, `dokbp`, `kue`, `dokkue`, `rv`, `dokrv`, `rt`, `dokrt`, `approve`, `developer`, `alokasi`, `user`, `tgl_entri`, `alasan`, `tahun`, `pengembangan`, `status`) VALUES
(201701, '33100', 'Sakernas (Survei Angkatan Kerja Nasional)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 4, '1,2,3,4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2018, 0, '4'),
(201702, '33100', 'Survei Pekerja Informal (SPIN)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 5, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2018, 0, '4'),
(201703, '33100', 'Susenas (Survei Sosial Ekonomi Nasional)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 5, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2018, 0, '4'),
(201704, '33100', 'Monitoring Sakernas', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 1, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2018, 0, '4'),
(201705, '33100', 'Monitoring SPIN', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 5, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2018, 0, '4'),
(201706, '33100', 'Monitoring Susenas', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 3, '1,3,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2018, 0, '4'),
(201707, '33100', 'IBS Tahunan', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 2, '1,6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201708, '33100', 'IBS Bulanan', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 5, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201709, '33100', 'Monitoring IMK (Triwulanan dan Tahunan)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 5, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201710, '33100', 'DPP-NRT Online', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', NULL, 2017, 0, '4'),
(201711, '33100', 'Monitoring IBS (MoIBS)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 4, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201712, '33100', 'SIM-TP (Tanaman Pangan)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 4, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201713, '33100', 'Pemutakhiran Ubinan Subround 1', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 5, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2018, 0, '4'),
(201714, '33100', 'Entri Sampel Ubinan SR 1(online)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 6, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2018, 0, '4'),
(201715, '33100', 'SPH (Statistik Pertanian Hortikultura)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 7, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201716, '33100', 'Peternakan (LTT, LTU, LTS)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 8, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201717, '33100', 'RPH (Rumah Potong Hewan)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 9, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201718, '33100', 'SIM Kehutanan', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 10, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201719, '33100', 'SKTR (Survei Konstruksi Triwulanan)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 11, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201720, '33100', 'CAPI SHOPI (Survei Holtikultura Potensi)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 12, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201721, '33100', 'IMK Triwulan', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 13, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201722, '33100', 'IMK Tahunan', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 14, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201723, '33100', 'SKP (Survei Konstruksi Perorangan)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 15, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201724, '33100', 'VP-VN (Hortikultura)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 16, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201725, '33100', 'PP-TPI (Perikanan)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 17, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201726, '33100', 'SKB Online (Triwulanan dan Tahunan)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 18, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201727, '33100', 'Web Entry UMK UMB', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 19, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201728, '33100', 'Sistem Informasi Updating Direktori Non-Profit', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 20, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201729, '33100', 'SKTNP Barang dan Jasa', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 21, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201730, '33100', 'Komoditas SBH - Android', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 22, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201731, '33100', 'Monitoring UMK UMB', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 23, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201732, '33100', 'SMAK (Survei Matriks Arus Komoditas)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 24, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201733, '33100', 'STB (Survei Tendensi Bisnis)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 25, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201734, '33100', 'STK (Survei Tendensi Konsumen)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 26, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201735, '33100', 'Neraca Rumah Tangga dan Institusi Nirlaba', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 27, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201736, '33100', 'SKKRT (Survei Khusus Konsumsi Rumah Tangga)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 28, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201737, '33100', 'SKTIR (Survei Khusus Tabungan dan Investasi Rumah Tangga)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 29, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201738, '33100', 'SKLNP (Triwulanan, Tahunan)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 30, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201739, '33100', 'Analisis-Program Kompilasi Data (SDGs)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 31, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201740, '33100', 'SE2016 UMK UMB', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 32, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201741, '33100', 'Poldis', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 33, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201742, '33100', 'Survei Harga Perdagangan Besar (IHPB)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 34, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201743, '33100', 'Survei Harga Konsumen (SHK)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 35, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201744, '33100', 'SPDT NTP', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 36, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201745, '33100', 'Survei Harga Pedesaan (SHPed)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 37, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201746, '33100', 'STKU', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 38, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201747, '33100', 'Simpel BRS Trans', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 39, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201748, '33100', 'Survei Harga Produsen (HPG, HPBG)', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 40, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201749, '33100', 'K3', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 41, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201750, '33100', 'Wisnus', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 42, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(201751, '33100', 'Ekspor Impor', 'Tujuan', '1', '1', '1', '0', '2017-01-01', '2017-01-01', NULL, NULL, 1, NULL, 0, 0, 43, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'tenie', '2017-01-01 08:20:00', '0', 2017, 0, '4'),
(1457008, '51200', 'Program Pengolahan Survei Struktur Ongkos Usaha Tanaman Hortikultura (SOUH 2018)', 'DIgunakan untuk pengolahan (entri) hasil SOUH 2018', '1', '2', '2', '', '2018-03-13', '2018-08-13', NULL, NULL, 110, 0, 0, 0, 4, '1,2,3,4', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '340057506', '1', 'oktyaputri', '2018-03-13 08:20:59', '', 2018, 0, '3'),
(1586713, '52100', 'LTP Ternak', 'Tujuan:\r\n1. Mengevaluasi pemasukan dokumen\r\n2. Perekaman data\r\n3. Tabulasi data\r\n4. Evaluasi data\r\n5. Penyusunan target tahun berikutnya\r\n\r\nRuang lingkup:\r\n1. 602 perusahaan\r\n2. Seluruh provinsi', '1', '2', '1', '', '2018-03-20', '2018-04-19', NULL, NULL, 23, 0, 0, 0, 5, '1,2,3,4,5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '340056749', '1', 'hengki', '2018-03-20 07:57:42', '0', 2018, 0, '3'),
(1852507, '33100', 'Aplikasi SBH', 'xxxx', '2', '2', '3', '', '2018-03-21', '2018-04-30', NULL, NULL, 29, NULL, 20, 0, 5, '1,2,3,4,5', '5', '2', '', '2', '', '2', '', '2', '', '1', '340051036', '1', 'tenie', '2018-02-05 03:33:28', '', 2018, 1852507, '3'),
(2132033, '51300', 'VTEBU2018', 'Uji coba pendataan rumah tangga tebu untuk memperoleh data luas, produksi dan distribusi tebu di Kabupaten Ponorogo dan Tulung Agung, Provinsi Jawa Timur.', '1', '3', '3', '', '2018-04-06', '2018-07-01', NULL, NULL, 61, 0, 0, 0, 4, '1,4,5,9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'ucik', '2018-04-06 02:22:28', '0', 2018, 0, '1'),
(2446346, '53200', 'Web Monitoring Survei Industri Mikro dan Kecil', 'Web Monitoring pelaksanaan pendataan lapangan dan pengolahan data (data entry) Survei Industri Mikro dan Kecil Tahunan dan Triwulanan', '4', '1', '1', '', '2018-04-02', '2018-05-02', NULL, NULL, 23, 0, 0, 0, 7, '1,2,3,4,5,6,7', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '340055719', '1', 'mjunaedi', '2018-04-02 01:37:02', '0', 2018, 201709, '3'),
(2664415, '62200', 'SHPB Online', 'Indeks Harga Perdagangan Besar (IHPB) adalah suatu indeks yang menggambarkan perubahan harga di tingkat pedagang besar/grosir. Perubahan harga mencakup komoditas-komoditas yang diperdagangkan dalam suatu wilayah.  Selain menggambarkan perubahan harga, IHPB juga digunakan sebagai deflator Produk Domestik Bruto (PDB). \r\nBadan Pusat Statistik (BPS) melakukan rilis IHPB setiap bulan. Indeks yang saat ini disajikan adalah menurut sektor dan dan komoditas di level nasional. Penyajian untuk level provinsi terkendala oleh beberapa hal, kendala utamanya yaitu belum tersedianya bobot/penimbang di level provinsi.\r\nPada tahun 2017 telah dilakukan Survei Penyusunan Diagram Timbang (SPDT)  Indeks Harga Perdagangan Besar (IHPB) Provinsi, dengan tujuan untuk mendapatkan paket komoditas dan bobot/penimbang yang dibutuhkan dalam penghitungan IHPB Provinsi.\r\nUntuk kelancaran pengolahan dan penghitungan IHPB 34 provinsi dan nasional dibutuhkan program aplikasi secara online, yang pembangunan dan pengembangan program aplikasinya perlu bantuan dari Direktorat Sistem Informasi Statistik (SIS).\r\nTujuan penghitungan IHPB (tahun dasar 2017):\r\n1.  Memperoleh Nilai Penjualan tahun dasar (NP0) dan Harga tahun dasar (P0).\r\n2. Memperoleh Indeks HPB tahun dasar (2017=100).\r\n3. Memperoleh Indeks, Inflasi, dan Andil Inflasi HPB bulan berjalan.\r\nRuang Lingkup:\r\n- Cakupan provinsi: 34 provinsi\r\n- Cakupan sektor: Sektor Pertanian, Sektor Pertambangan dan Penggalian, serta Sektor Industri', '1', '1', '3', '', '2018-03-22', '2018-06-30', NULL, NULL, 72, 0, 0, 0, 4, '1,2,3,5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '340051036', '1', 'munipah', '2018-03-22 09:02:34', '', 2018, 0, '3'),
(2696723, '51200', 'Aplikasi Monitoring Survei Struktur Ongkos Usaha Tanaman Hortikultura Tahun 2018 (SOUH 2018)', 'Aplikasi Monitoring Survei Struktur Ongkos Usaha Tanaman Hortikultura Tahun 2018 (SOUH 2018) untuk monitoring progress, status dokumen, dan isian pelaksanaan SOUH 2018', '1', '1', '4', 'BPS Pusat, BPS Provinsi, BPS Kabupaten', '2018-03-13', '2018-07-02', NULL, NULL, 80, 0, 0, 0, 1, '5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '340057678', '1', 'oktyaputri', '2018-03-13 08:30:01', '', 2018, 0, '3'),
(2782387, '53400', 'Sistem Survei Konstruksi BPS', 'Sistem ini ditujukan untuk mengintegrasikan pengolahan data dan monitoring Survei Konstruksi. Sistem ini terdiri dari Aplikasi Data Entri kegiatan Updating Direktori Perusahaan Konstruksi (UDP), Aplikasi Data Entri Survei Perusahaan Konstruksi Triwulanan (SKTR), Aplikasi Data Entri Survei Perusahaan Konstruksi Tahunan (SKTH), dan Aplikasi Monitoring Kegiatan Konstruksi.', '1', '1', '3', '', '2018-03-29', '2018-05-11', NULL, NULL, 57, 0, 0, 0, 5, '1,2,3,4,5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '340057360', '1', 'ade.riyawan', '2018-02-22 02:14:38', '', 2018, 0, '3'),
(2815655, '63300', 'SIMODUTA (VHTS)', 'Entri data Survey hotel', '1', '1', '3', '', '2018-03-21', '2018-05-06', NULL, NULL, 33, 0, 0, 0, 3, '1,3,5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '340056415', '1', 'udien', '2018-03-21 09:40:29', '', 2018, 0, '3'),
(3680452, '72300', 'Sistem Pengolahan Survei Penyusunan Disagregasi PMTB 2018', 'Sistem ini bertujuan untuk melakukan pengolahan data hasil Survei Penyusunan Disagregasi PMTB 2018', '1', '1', '3', '', '2018-04-03', '2018-05-03', NULL, NULL, 23, 0, 0, 0, 4, '1,2,3,4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'fitri.andri', '2018-04-03 08:15:10', '', 2018, 0, '1'),
(4084655, '51300', 'DPP/NRT', 'Peningkatan kualitas data direktori perusahaan pertanian pelengkap data SBR', '2', '1', '3', '', '2018-04-06', '2018-05-06', NULL, NULL, 21, 0, 0, 0, 5, '1,2,4,5,8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'ucik', '2018-04-06 06:32:00', '0', 2018, 201710, '1'),
(5614827, '61100', 'Aplikasi Ekspor - Kudex', 'Untuk menjaga kualitas data Ekspor maka diperlukan pemeriksaan kesesuaian uraian barang dengan kode HS. Aplikasi Ekspor - Kudex dimaksudkan untuk menjalankan fungsi pemeriksaan data yang terintegrasi dengan aplikasi ekspor\r\n', '1', '2', '1', '', '2018-03-21', '2018-04-20', NULL, NULL, 23, 0, 0, 0, 2, '1,6', '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '340055916', '1', 'fadjarwo', '2018-03-21 09:01:30', '', 2018, 0, '3'),
(5725998, '53200', 'Pengolahan VIMK18 Triwulanan', '- meningkatkan keakurasian dan kualitas data IMK\r\n- meningkatkan kesesuaian penarikan sampel dengan hasil pencacahan VIMK', '1', '2', '3', '', '2018-03-29', '2018-04-28', NULL, NULL, 22, 0, 0, 0, 7, '1,2,3,4,5,6,7', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '340015082', '1', 'rian', '2018-03-29 10:14:45', '0', 2018, 0, '3'),
(5762202, '81000', 'Sistem Informasi Manajemen Pengawasan (SIM-WAS)', 'Perencanaan, Pelaksanaan, kegiatan Inspektorat SIM HP\r\n\r\npengembangan SPI Online ', '1', '1', '3', '', '2018-03-07', '2018-07-31', NULL, NULL, 105, 0, 0, 0, 5, '1,2,3,4,5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '340055719', '1', 'galih.rosanti', '2018-03-07 04:40:22', '0', 2018, 0, '3'),
(5959607, '43100', 'Aplikasi Entri Pendataan Potensi Desa', 'Dalam rangka pengolahan hasil pendataan Podes 2018, kami membutuhkan untuk dibuatkan aplikasi entri pendataan Podes 2018. Aplikasi tersebut akan digunakan dalam proses entri dan perekaman data hasil pendataan Potensi Desa 2018 yang terdiri dari 5 kuesioner, meliputi:\r\n    Kuesioner Podes2018-DaftarDesa\r\n    Kuesioner Podes2018-Desa\r\n    Kuesioner Podes2018-Nagari\r\n    Kuesioner Podes2018-Jorong\r\n    Kuesioner Podes2018-Kecamatan\r\n    Kuesioner Podes2018-Kabupaten\r\nAplikasi tersebut akan digunakan oleh Â± 7000 user.\r\n\r\nLevel Pengguna:\r\n- Entri dan perbaikan data, validasi, pemeriksaan tabel permasalahan dan evaluasi di BPS Kabupaten/Kota\r\n- Kompilasi data, validasi dan pemeriksaan tabel evaluasi di BPS Provinsi\r\n- Kompilasi data, validasi dan pemeriksaan tabel evaluasi di BPS Pusat\r\n\r\nFitur yang dibutuhkan :\r\n- Entri, modify, backup data, validasi, menu tabel permasalahan (error/warning), input catatan konfirmasi data, tabel evaluasi, tabulasi untuk publikasi\r\n- Monitoring pendataan dan pengolahan', '1', '1', '3', '', '2018-03-14', '2018-05-15', NULL, NULL, 45, 0, 18, 0, 5, '1,2,3,4,5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '340050172', '1', 'naim', '2018-03-14 03:36:06', '0', 2018, 0, '3'),
(6345829, '52100', 'RPH/TPH', 'Tujuan\r\n1.	Perekaman (entry) dokumen Laporan Pemotongan Ternak (Daftar RPH/TPH)\r\n2.	Evaluasi pemasukan/pengolahan dokumen RPH/TPH\r\n3.	Tabulasi data Statistik Pemotongan Ternak\r\n4.	Evaluasi data Pemotongan Ternak\r\n5.	Penyusunan target pada kegiatan tahun berikutnya\r\n\r\nRuang Lingkup\r\n1.	Sekitar 5200 (lima ribu dua ratus) unit RPH/TPH \r\n(1300 unit setiap triwulan)\r\n2.	Provinsi se-Indonesia\r\n\r\nPelaksana Entry adalah BPS Provinsi se-Indonesia', '2', '1', '2', '', '2018-04-13', '2018-07-01', NULL, NULL, 56, 0, 0, 0, 2, '1,4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'hengki', '2018-04-13 08:43:03', '0', 2018, 201717, '1'),
(6466597, '53200', 'Pengolahan VIMK 18 Tahunan', 'Aplikasi ini memuat \r\n- entry rekap listing\r\n- pencetakan rekap blok sensus\r\n- penarikan sampel\r\n- pencetakan lembar penarikan sampel\r\n- entry data hasil pencacahan\r\n- sinkronisasi penarikan sample dan hasil pencacahan', '2', '1', '3', '', '2018-03-29', '2018-07-02', NULL, NULL, 68, 0, 0, 0, 7, '1,2,3,4,5,6,7', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '340015082', '1', 'rian', '2018-03-29 03:52:51', '0', 2018, 201722, '3'),
(6842174, '61300', 'Aplikasi Pengolahan Survei Perdagangan Antar Wilayah 2018', 'a.	Mendapatkan volume (kg) dan nilai perdagangan antar wilayah.\r\nb.	Mendapatkan peta perdagangan antar wilayah.\r\nRuang Lingkup: Seluruh Provinsi', '1', '1', '2', '', '2018-03-27', '2018-12-31', NULL, NULL, 200, 0, 0, 0, 5, '1,2,3,4,5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'roysu', '2018-03-27 06:14:28', '0', 2018, 0, '1'),
(6942218, '51100', 'web monitoring SKGB 2018', 'web monitoring survei SKGB 2018 yang dilaksanakan di 34 provinsi', '3', '1', '3', '', '2018-03-26', '2018-04-20', NULL, NULL, 20, 0, 0, 0, 2, '4,5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '340054345', '1', 'dena', '2018-03-26 09:29:06', '0', 2018, 0, '3'),
(7147295, '33100', 'Survei  Perdagangan  Dalam  Negeri  Beberapa  Komoditas  Tahun  2018', 'Mendapatkan pola distribusi perdagangan dan margin pendapatan dan pengangkutan pelaku usaha perdagangan untuk komoditi Beras. Daging Sapi, Daging Ayan Ras, Cabai Merah, dan Bawang Merah di seluruh provinsi di Indonesia tahun 2018', '1', '2', '2', '', '2018-02-02', '2018-04-01', NULL, NULL, 41, NULL, 2, 0, 5, NULL, '5', '2', '', '1', '7147295-33100-SurveiPerdaganganDalamNegeriBeberapaKom-DraftKuesioner.xlsx', '1', '7147295-33100-SurveiPerdaganganDalamNegeriBeberapaKom-RuleValidasi.docx', '2', '', '1', '340051036', '1', 'tenie', '2018-02-02 07:38:39', NULL, 2018, NULL, '3'),
(8636091, '51300', 'VKAKAO2018', 'UNTUK PELAKSANAAN SURVEI PADA BULAN APRIL SAMPAI DENGAN BULAN SEPTEMBER TAHUN 2018', '1', '1', '2', '', '2018-03-14', '2018-06-04', NULL, NULL, 59, 0, 52, 0, 4, '1,3,4,5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '340057506', '1', 'solimah', '2018-03-14 10:48:36', '0', 2018, 0, '3'),
(9283472, '51300', 'SKB Online (Tahunan dan Triwulanan)', 'Pengembangan Sistem yang sudah ada dari tahun 2016. Akan tetapi tidak muncul pada saat memilih Pengembangan Sistem.', '1', '1', '2', '', '2018-03-14', '2018-06-05', NULL, NULL, 60, 0, 0, 0, 4, '1,3,4,5', '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '340056456', '1', 'solimah', '2018-03-14 10:14:04', '0', 2018, 0, '3'),
(9336419, '63300', 'Program Pengolahan VHTL 2018', 'Tujuan: Mengetahui Karakteristik usaha akomodasi; Mengetahui jumlah tenaga kerja, pendapatan dan pengeluaran serta Strukturnya.\r\nLingkup : Seluruh usaha penyedia jasa akomodasi jangka pendek di seluruh wilayah indonesia', '3', '1', '2', '', '2018-04-13', '2018-05-13', NULL, NULL, 21, 0, 0, 0, 7, '1,2,3,4,5,8,9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', 'udien', '2018-04-13 01:34:37', '0', 2018, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `subproyek`
--

CREATE TABLE `subproyek` (
  `tiket` int(11) NOT NULL,
  `fitur` varchar(50) NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `durasi` int(11) NOT NULL,
  `progres` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `developer` varchar(100) DEFAULT NULL,
  `aktiv` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subproyek`
--

INSERT INTO `subproyek` (`tiket`, `fitur`, `mulai`, `selesai`, `durasi`, `progres`, `parent`, `developer`, `aktiv`) VALUES
(1457008, '1', '2018-03-13', '2018-08-13', 110, 0, 1457008, '340014529 340053197 340057506', '0'),
(1457008, '2', '2018-03-13', '2018-08-13', 110, 0, 1457008, '340053197 340057506', '0'),
(1457008, '3', '2018-03-13', '2018-08-13', 110, 0, 1457008, '340057506', '0'),
(1457008, '4', '2018-03-13', '2018-08-13', 110, 0, 1457008, '340057506', '0'),
(1586713, '1', '2018-03-20', '2018-04-19', 23, 0, 1586713, '340056749', '0'),
(1586713, '2', '2018-03-20', '2018-04-19', 23, 0, 1586713, '340056749', '0'),
(1586713, '3', '2018-03-20', '2018-04-19', 23, 0, 1586713, '340056749', '0'),
(1586713, '4', '2018-03-20', '2018-04-19', 23, 0, 1586713, '340056749', '0'),
(1586713, '5', '2018-03-20', '2018-04-19', 23, 0, 1586713, '340056749', '0'),
(1852507, '1', '2018-03-21', '2018-04-30', 29, 0, 1852507, '340051036', '0'),
(1852507, '2', '2018-03-21', '2018-04-30', 29, 100, 1852507, '340056761', '0'),
(1852507, '3', '2018-03-21', '2018-04-29', 28, 0, 1852507, '340051036', '0'),
(1852507, '4', '2018-03-21', '2018-04-30', 29, 0, 1852507, '340051036', '0'),
(1852507, '5', '2018-03-21', '2018-04-30', 29, 0, 1852507, '340056415', '0'),
(2132033, '1', '2018-04-06', '2018-07-01', 61, 0, 2132033, NULL, '0'),
(2132033, '4', '2018-04-06', '2018-07-01', 61, 0, 2132033, NULL, '0'),
(2132033, '5', '2018-04-06', '2018-07-01', 61, 0, 2132033, NULL, '0'),
(2132033, '9', '2018-04-06', '2018-07-01', 61, 0, 2132033, NULL, '0'),
(2446346, '3', '2018-04-02', '2018-05-02', 23, 0, 2446346, '340055719 340057360', '0'),
(2446346, '5', '2018-04-02', '2018-05-02', 23, 0, 2446346, '340015082 340055719 340057360', '0'),
(2664415, '1', '2018-03-23', '2018-06-30', 71, 0, 2664415, '340056415', '0'),
(2664415, '2', '2018-03-23', '2018-06-30', 71, 0, 2664415, '340051036', '0'),
(2664415, '3', '2018-03-23', '2018-06-30', 71, 0, 2664415, '340051036 340056415', '0'),
(2664415, '5', '2018-03-23', '2018-06-30', 71, 0, 2664415, '340056415', '0'),
(2696723, '3', '2018-03-13', '2018-07-02', 80, 0, 2696723, '340056749 340057678', '0'),
(2696723, '4', '2018-03-13', '2018-07-02', 80, 0, 2696723, '340056749 340057678', '0'),
(2696723, '5', '2018-03-13', '2018-07-02', 80, 0, 2696723, '340056749 340057678', '0'),
(2782387, '1', '2018-03-29', '2018-05-11', 32, 0, 2782387, '340050172 340057360', '0'),
(2782387, '2', '2018-03-29', '2018-05-11', 32, 0, 2782387, '340050172 340057360', '0'),
(2782387, '3', '2018-03-29', '2018-05-11', 32, 0, 2782387, '340057360', '0'),
(2782387, '4', '2018-03-29', '2018-05-11', 32, 0, 2782387, '340050172 340057360', '0'),
(2782387, '5', '2018-03-29', '2018-05-11', 32, 0, 2782387, '340057360', '0'),
(2815655, '1', '2018-03-21', '2018-05-06', 33, 0, 2815655, '340056456', '0'),
(2815655, '3', '2018-03-21', '2018-05-06', 33, 0, 2815655, '340056415', '0'),
(2815655, '5', '2018-03-21', '2018-05-06', 33, 0, 2815655, '340056415', '0'),
(3680452, '1', '2018-04-03', '2018-05-03', 23, 0, 3680452, NULL, '0'),
(3680452, '2', '2018-04-03', '2018-05-03', 23, 0, 3680452, NULL, '0'),
(3680452, '3', '2018-04-03', '2018-05-03', 23, 0, 3680452, NULL, '0'),
(3680452, '4', '2018-04-03', '2018-05-03', 23, 0, 3680452, NULL, '0'),
(4084655, '1', '2018-04-06', '2018-05-06', 21, 0, 4084655, NULL, '0'),
(4084655, '2', '2018-04-06', '2018-05-06', 21, 0, 4084655, NULL, '0'),
(4084655, '4', '2018-04-06', '2018-05-06', 21, 0, 4084655, NULL, '0'),
(4084655, '5', '2018-04-06', '2018-05-06', 21, 0, 4084655, NULL, '0'),
(4084655, '8', '2018-04-06', '2018-05-06', 21, 0, 4084655, NULL, '0'),
(5614827, '1', '2018-03-21', '2018-04-20', 23, 0, 5614827, '340057678', '0'),
(5614827, '6', '2018-03-21', '2018-04-20', 23, 0, 5614827, '340055916 340057678', '0'),
(5725998, '1', '2018-03-29', '2018-04-28', 22, 0, 5725998, '340015082', '0'),
(5725998, '2', '2018-03-29', '2018-04-28', 22, 0, 5725998, '340015082', '0'),
(5725998, '3', '2018-03-29', '2018-04-28', 22, 0, 5725998, '340015082', '0'),
(5725998, '4', '2018-03-29', '2018-04-28', 22, 0, 5725998, '340015082', '0'),
(5762202, '1', '2018-03-07', '2018-07-31', 105, 0, 5762202, '340055719', '0'),
(5762202, '2', '2018-03-07', '2018-07-31', 105, 0, 5762202, '340055719', '0'),
(5762202, '3', '2018-03-07', '2018-07-31', 105, 0, 5762202, '340055719', '0'),
(5762202, '4', '2018-03-07', '2018-07-31', 105, 0, 5762202, '340055719', '0'),
(5762202, '5', '2018-03-07', '2018-07-31', 105, 0, 5762202, '340055719', '0'),
(5959607, '1', '2018-03-14', '2018-05-07', 39, 50, 5959607, '340014529 340050172 340057506', '0'),
(5959607, '2', '2018-03-14', '2018-05-07', 39, 20, 5959607, '340050172 340053197 340057506', '0'),
(5959607, '3', '2018-03-14', '2018-05-07', 39, 20, 5959607, '340050172 340053197 340057506 340057678', '0'),
(5959607, '4', '2018-03-26', '2018-05-07', 31, 0, 5959607, '340050172', '0'),
(5959607, '5', '2018-03-14', '2018-05-15', 45, 0, 5959607, '340057678', '0'),
(6345829, '1', '2018-04-13', '2018-07-01', 56, 0, 6345829, NULL, '0'),
(6345829, '4', '2018-04-13', '2018-07-01', 56, 0, 6345829, NULL, '0'),
(6466597, '1', '2018-03-29', '2018-07-02', 68, 0, 6466597, '340015082', '0'),
(6466597, '2', '2018-03-29', '2018-07-02', 68, 0, 6466597, '340015082', '0'),
(6466597, '3', '2018-03-29', '2018-07-02', 68, 0, 6466597, '340015082', '0'),
(6466597, '4', '2018-03-29', '2018-07-02', 68, 0, 6466597, '340015082', '0'),
(6842174, '1', '2018-03-27', '2018-12-31', 200, 0, 6842174, NULL, '0'),
(6842174, '2', '2018-03-27', '2018-12-31', 200, 0, 6842174, NULL, '0'),
(6842174, '3', '2018-03-27', '2018-12-31', 200, 0, 6842174, NULL, '0'),
(6842174, '4', '2018-03-27', '2018-12-31', 200, 0, 6842174, NULL, '0'),
(6842174, '5', '2018-03-27', '2018-12-31', 200, 0, 6842174, NULL, '0'),
(6942218, '3', '2018-03-26', '2018-04-20', 20, 0, 6942218, '340054345 340056456', '0'),
(6942218, '5', '2018-03-26', '2018-04-20', 20, 0, 6942218, '340054345 340056456', '0'),
(7147295, '1', '2018-02-05', '2018-04-01', 40, 0, 7147295, '340051036', '0'),
(7147295, '2', '2018-02-05', '2018-04-01', 40, 10, 7147295, '340056761', '0'),
(7147295, '3', '2018-02-05', '2018-04-01', 40, 0, 7147295, '340056761', '0'),
(7147295, '4', '2018-02-05', '2018-04-01', 40, 0, 7147295, '340051036', '0'),
(7147295, '5', '2018-03-01', '2018-04-01', 22, 0, 7147295, '340056761', '0'),
(8636091, '1', '2018-03-14', '2018-06-04', 59, 80, 8636091, '340014529 340053197 340055797 340057506', '0'),
(8636091, '2', '2018-03-14', '2018-06-04', 59, 100, 8636091, '340053197 340057506', '0'),
(8636091, '3', '2018-03-14', '2018-06-04', 59, 80, 8636091, '340055797 340057506', '0'),
(8636091, '4', '2018-03-14', '2018-06-04', 59, 0, 8636091, '340057506', '0'),
(8636091, '5', '2018-03-14', '2018-06-04', 59, 0, 8636091, '340055797 340057506', '0'),
(9283472, '1', '2018-03-14', '2018-06-05', 60, 0, 9283472, '340056456', '0'),
(9283472, '3', '2018-03-14', '2018-06-05', 60, 0, 9283472, '340056456', '0'),
(9283472, '4', '2018-03-14', '2018-06-05', 60, 0, 9283472, '340056456', '0'),
(9283472, '5', '2018-03-14', '2018-06-05', 60, 0, 9283472, '340056456', '0'),
(9336419, '1', '2018-04-13', '2018-05-13', 21, 0, 9336419, NULL, '0'),
(9336419, '2', '2018-04-13', '2018-05-13', 21, 0, 9336419, NULL, '0'),
(9336419, '3', '2018-04-13', '2018-05-13', 21, 0, 9336419, NULL, '0'),
(9336419, '4', '2018-04-13', '2018-05-13', 21, 0, 9336419, NULL, '0'),
(9336419, '5', '2018-04-13', '2018-05-13', 21, 0, 9336419, NULL, '0'),
(9336419, '8', '2018-04-13', '2018-05-13', 21, 0, 9336419, NULL, '0'),
(9336419, '9', '2018-04-13', '2018-05-13', 21, 0, 9336419, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) DEFAULT NULL,
  `nip` varchar(18) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `bagian` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nip`, `nama`, `email`, `level`, `bagian`) VALUES
('ade.riyawan', NULL, '340017321', ' Ade Riyawan SST, M.Si.', 'ade.riyawan@bps.go.id', 3, '53430'),
('adetia', NULL, '340055718', ' Aisha Adetia SST', 'adetia@bps.go.id', 2, '33130'),
('adityasetyadi', NULL, '340056313', ' Ignatius Aditya Setyadi SST', 'adityasetyadi@bps.go.id', 2, '33130'),
('agustika', NULL, '340056201', ' Agustika Indah Mayangsari SST', 'agustika@bps.go.id', 2, '33130'),
('Alfianmay', NULL, '340055719', ' Alfian May Purbany SST', 'alfianmay@bps.go.id', 2, '33130'),
('andrian', NULL, '340051036', ' Andrian Widihastanto S.Kom', 'andrian@bps.go.id', 2, '33130'),
('chris', NULL, '340050046', ' Christiana Dyah Ratnasari SST', 'chris@bps.go.id', 2, '33110'),
('danuk', NULL, '340053197', ' Danuk Cahya Permana S.ST, M.T.I.', 'danuk@bps.go.id', 2, '33110'),
('debora', NULL, '340055916', ' Sara Sridebora Syaloom Sorta SST', 'debora@bps.go.id', 2, '33130'),
('dena', NULL, '340017836', ' Dena Drajat, SST SE, M.Si', 'dena@bps.go.id', 3, '51130'),
('dwino', NULL, '340011998', ' Dwino Daries B.Eng.', 'dwino@bps.go.id', 0, '33100'),
('emayulandika', NULL, '340057360', ' Ema Yulandika Setyaning Puspitasari SST', 'emayulandika@bps.go.id', 2, '33130'),
('fadjarwo', NULL, '340015942', ' Fadjar Herbowo S.Si, MM.', 'fadjarwo@bps.go.id', 3, '61120'),
('fitri.andri', NULL, '340056771', ' Fitri Andri Astuti SST', 'fitri.andri@bps.go.id', 3, '72310'),
('fristiana', NULL, '340056749', ' Ayuningtyas Hari Fristiana SST', 'fristiana@bps.go.id', 2, '33120'),
('galih.rosanti', NULL, '340054378', ' Galih Rosanti Capriana Chandra A.Md', 'galih.rosanti@bps.go.id', 3, '81000'),
('giat', NULL, '340017337', ' Giat Sudrajat Sarmuda, SST M.Stat.', 'giat@bps.go.id', 0, '33120'),
('Handita', NULL, '340055797', ' Handita Okviyanto SST', 'handita@bps.go.id', 2, '33120'),
('hardian.indrajati', NULL, '340056781', ' Hardian Indrajati SST', 'hardian.indrajati@bps.go.id', 0, '33330'),
('hengki', NULL, '340016113', ' Hengki Eko Riyadi, SST SE.,M.Si', 'hengki@bps.go.id', 3, '52120'),
('hindarwan', NULL, '340056750', ' Rahma Nur Hindarwan SST', 'hindarwan@bps.go.id', 2, '33110'),
('hsaputra', NULL, '340053277', ' Herman Saputra SST, M.T.', 'hsaputra@bps.go.id', 0, '33330'),
('idyah', NULL, '340016110', ' Idyah Fitriandari, S.Si. M.T. M.P.P.', 'idyah@bps.go.id', 0, '33130'),
('irsan_riza', NULL, '340019177', 'Kemas Muhammad Irsan Riza SST.,MT', 'irsan_riza@bps.go.id', 0, '33130'),
('mawarni', NULL, '340057506', ' Mutiara Mawarni SST', 'mawarni@bps.go.id', 2, '33120'),
('minto', NULL, '340015082', ' Minto Setiyo SST', 'minto@bps.go.id', 2, '33120'),
('mjunaedi', NULL, '340015139', 'Dr. Mohammad Junaedi S.Si.,M.T', 'mjunaedi@bps.go.id', 3, '53220'),
('munipah', NULL, '340013360', ' Munipah S.ST', 'munipah@bps.go.id', 3, '62220'),
('naim', NULL, '340015794', ' Akhsan Naim S.Si', 'naim@bps.go.id', 3, '43120'),
('ndaru', NULL, '340050172', ' Ndaru Nuswantari SST.,MTI', 'ndaru@bps.go.id', 2, '33110'),
('novitaning', NULL, '340017798', ' Novita Ningrum Maldriawaty SST', 'novitaning@bps.go.id', 2, '33110'),
('oktyaputri', NULL, '340056873', ' Oktya Putri Gitaningtyas SST', 'oktyaputri@bps.go.id', 3, '51220'),
('puput', NULL, '340053206', ' Kukuh Yuliasih Putri S.ST, M.Eng', 'puput@bps.go.id', 2, '33110'),
('ratih.hutami', NULL, '340056752', ' Ratih Tri Hutami SST', 'ratih.hutami@bps.go.id', 2, '33120'),
('Rendra.ap', NULL, '340056415', ' Rendra Achyunda Anugrah Putra SST', 'rendra.ap@bps.go.id', 2, '33130'),
('rezkya.putri', NULL, '340058456', ' Rezkya Putri Septiani SST', 'rezkya.putri@bps.go.id', 2, '33110'),
('rian', NULL, '340013375', ' M. Qadarian Bahagia S.Si, M.E.', 'rian@bps.go.id', 3, '53210'),
('ricomarten', NULL, '340053330', ' Rico Martenstyaro S.ST., M.T.', 'ricomarten@bps.go.id', 0, '33330'),
('rio.bastian', NULL, '340054345', ' Muhammad Rio Bastian SST, M.T', 'rio.bastian@bps.go.id', 2, '33120'),
('rizkiyani.tyas', NULL, '340056761', ' Rizkiyani Harminingtyas SST', 'rizkiyani.tyas@bps.go.id', 2, '33120'),
('roysu', NULL, '340019185', ' Roy Suerlianto, SST SAP.,M.S.E', 'roysu@bps.go.id', 3, '61320'),
('roza', NULL, '340054077', ' Aulia Roza Albareta SST, M.TI', 'roza@bps.go.id', 2, '33110'),
('rudic', NULL, '340014529', ' Rudi Cahyadi ', 'rudic@bps.go.id', 2, '33110'),
('sanovia', NULL, '340017330', ' Yeni Sanovia SST., MT', 'sanovia@bps.go.id', 3, '33300'),
('septiawan.aji', NULL, '340058489', ' Septiawan Aji Pradana SST', 'septiawan.aji@bps.go.id', 2, '33110'),
('sinta.denovi', NULL, '340056456', ' Sinta Denovi Rahmawati SST', 'sinta.denovi@bps.go.id', 2, '33120'),
('solimah', NULL, '340014721', 'Ir. Solimah M.Si', 'solimah@bps.go.id', 3, '51300'),
('tenie', NULL, '340019229', 'R. Tenie Permata Kusumah SST.,MT', 'tenie@bps.go.id', 0, '33130'),
('ucik', NULL, '340017802', ' Ucik Mawarsari SST, M.Si.', 'ucik@bps.go.id', 3, '51320'),
('udien', NULL, '340014594', ' Barudin, SST SE.,M.Si', 'udien@bps.go.id', 3, '63320'),
('waiz.alqorni', NULL, '340057678', ' Waiz Al Qorni SST', 'waiz.alqorni@bps.go.id', 2, '33110'),
('widy', NULL, '340014602', ' Widiyati Pawit Suwarti SST.,M.Si', 'widy@bps.go.id', 0, '33110');

-- --------------------------------------------------------

--
-- Table structure for table `userlevel`
--

CREATE TABLE `userlevel` (
  `kode` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlevel`
--

INSERT INTO `userlevel` (`kode`, `nama`) VALUES
(1, 'BPS Pusat'),
(2, 'BPS Provinsi'),
(3, 'BPS Kabupaten/Kota'),
(4, 'Lainnya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `fitur`
--
ALTER TABLE `fitur`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `jenis_perubahan`
--
ALTER TABLE `jenis_perubahan`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `kebutuhan`
--
ALTER TABLE `kebutuhan`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `perubahan`
--
ALTER TABLE `perubahan`
  ADD PRIMARY KEY (`tiket`,`perubahan`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`tiket`);

--
-- Indexes for table `subproyek`
--
ALTER TABLE `subproyek`
  ADD PRIMARY KEY (`tiket`,`fitur`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `userlevel`
--
ALTER TABLE `userlevel`
  ADD PRIMARY KEY (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
