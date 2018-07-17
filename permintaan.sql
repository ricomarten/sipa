-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2017 at 01:09 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `permintaan`
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
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `nip` varchar(18) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `beban` int(11) NOT NULL,
  `keahlian` int(11) NOT NULL,
  `expert1` int(11) NOT NULL,
  `expert2` int(11) NOT NULL,
  `expert3` int(11) NOT NULL,
  `expert4` int(11) NOT NULL,
  `expert5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`nip`, `nama`, `beban`, `keahlian`, `expert1`, `expert2`, `expert3`, `expert4`, `expert5`) VALUES
('198703102009121002', 'Rico Martenstyaro', 1, 1, 3, 0, 0, 0, 0),
('198703102009121003', 'Zenan', 2, 2, 1, 4, 0, 0, 0);

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
(2, 'Backup Data'),
(3, 'Manajemen User'),
(4, 'Tabulasi'),
(5, 'Monitoring');

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
(1, 'Pembangunan Sistem/Aplikasi'),
(2, 'Pengembangan Sistem/Aplikasi');

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
(4, 'Android');

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
  `mulai_keg` date NOT NULL,
  `selesai_keg` date NOT NULL,
  `durasi` int(11) NOT NULL,
  `durasi_keg` int(11) NOT NULL,
  `progres` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `fitur` int(11) NOT NULL,
  `bp` varchar(1) NOT NULL,
  `dokbp` text NOT NULL,
  `kue` varchar(1) NOT NULL,
  `dokkue` text NOT NULL,
  `rv` varchar(1) NOT NULL,
  `dokrv` text NOT NULL,
  `approve` varchar(1) NOT NULL DEFAULT '0',
  `developer` varchar(18) NOT NULL,
  `alokasi` varchar(1) NOT NULL DEFAULT '0',
  `user` varchar(18) NOT NULL,
  `tgl_entri` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`tiket`, `bagian`, `nama`, `tujuan`, `kebutuhan`, `aplikasi`, `level`, `ketlain`, `mulai`, `selesai`, `mulai_keg`, `selesai_keg`, `durasi`, `durasi_keg`, `progres`, `parent`, `fitur`, `bp`, `dokbp`, `kue`, `dokkue`, `rv`, `dokrv`, `approve`, `developer`, `alokasi`, `user`, `tgl_entri`) VALUES
(15656, '41200', 'Sakernas 2018', 'Sakernas 2018', '1', '3', '3', '', '2018-03-01', '2018-03-31', '2018-01-01', '2018-05-31', 22, 109, 0, 0, 5, '1', '15656-41200-Sakernas2018-BisnisProses.docx', '1', '15656-41200-Sakernas2018-DraftKuesioner.docx', '1', '15656-41200-Sakernas2018-RuleValidasi.xlsx', '0', '', '0', 'rico', '2017-11-02 00:00:00'),
(30656, '51200', 'Survei Hortikultura 2018', 'Survei Hortikultura 2018', '1', '3', '3', '', '2018-02-01', '2018-03-31', '2018-01-01', '2018-04-30', 42, 86, 0, 0, 5, '1', '30656-51200-SurveiHortikultura2018-BisnisProses.docx', '1', '30656-51200-SurveiHortikultura2018-DraftKuesioner.docx', '1', '30656-51200-SurveiHortikultura2018-RuleValidasi.xlsx', '0', '', '0', 'ricomarten', '2017-11-02 10:20:59'),
(30658, '31100', 'Aplikasi Desain Survei', 'Aplikasi Desain Survei', '1', '1', '1', '', '2018-03-01', '2018-03-31', '2018-01-01', '2018-05-31', 22, 109, 0, 0, 3, '1', '30658-31100-AplikasiDesainSurvei-BisnisProses.docx', '1', '30658-31100-AplikasiDesainSurvei-DraftKuesioner.docx', '1', '30658-31100-AplikasiDesainSurvei-RuleValidasi.xlsx', '0', '', '0', 'ricoma', '2017-11-02 12:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `subproyek`
--

CREATE TABLE `subproyek` (
  `tiket` varchar(8) NOT NULL,
  `fitur` int(11) NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `durasi` int(11) NOT NULL,
  `progres` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `developer` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subproyek`
--

INSERT INTO `subproyek` (`tiket`, `fitur`, `mulai`, `selesai`, `durasi`, `progres`, `parent`, `developer`) VALUES
('122', 1, '2017-11-02', '2017-11-02', 1, 0, 122, ''),
('15656', 1, '2018-03-01', '2018-03-31', 22, 0, 15656, ''),
('15656', 2, '2018-03-01', '2018-03-31', 22, 0, 15656, ''),
('15656', 3, '2018-03-01', '2018-03-31', 22, 0, 15656, ''),
('15656', 4, '2018-03-01', '2018-03-31', 22, 0, 15656, ''),
('15656', 5, '2018-03-01', '2018-03-31', 22, 0, 15656, ''),
('30656', 1, '2018-02-01', '2018-03-31', 42, 0, 30656, ''),
('30656', 2, '2018-02-01', '2018-03-31', 42, 0, 30656, ''),
('30656', 3, '2018-02-01', '2018-03-31', 42, 0, 30656, ''),
('30656', 4, '2018-02-01', '2018-03-31', 42, 0, 30656, ''),
('30656', 5, '2018-02-01', '2018-03-31', 42, 0, 30656, ''),
('30658', 1, '2018-03-01', '2018-03-31', 22, 0, 30658, ''),
('30658', 2, '2018-03-01', '2018-03-31', 22, 0, 30658, ''),
('30658', 3, '2018-03-01', '2018-03-31', 22, 0, 30658, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(25) NOT NULL,
  `level` int(11) NOT NULL,
  `bagian` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nip`, `nama`, `email`, `level`, `bagian`) VALUES
('ricomarten', '1234', '340053330', 'Rico Martenstyaro', 'ricomarten@bps.go.id', 0, '33330');

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
(3, 'BPS Kabupaten'),
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
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `fitur`
--
ALTER TABLE `fitur`
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
