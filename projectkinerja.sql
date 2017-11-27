-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2016 at 05:14 PM
-- Server version: 10.1.9-MariaDB-log
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectkinerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `kodegolongan` varchar(10) NOT NULL,
  `namagolongan` varchar(70) NOT NULL,
  `nilaiakk` int(11) NOT NULL COMMENT 'angka kredit kumulatif minimal',
  `nilaiakpkb` int(11) NOT NULL COMMENT 'Angka Kredit Pengembangan Keprofesian Berkelanjutan',
  `nilaiakp` int(11) NOT NULL COMMENT 'angka kredit penunjang',
  `jwm` int(11) NOT NULL COMMENT 'jam wajib mengajar'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`kodegolongan`, `namagolongan`, `nilaiakk`, `nilaiakpkb`, `nilaiakp`, `jwm`) VALUES
('GLN0000001', 'III / a', 50, 3, 5, 24),
('GLN0000002', 'III / b', 50, 7, 5, 24),
('GLN0000003', 'III / c', 100, 9, 10, 24),
('GLN0000004', 'III / d', 100, 12, 10, 24),
('GLN0000005', 'IV / a', 150, 16, 15, 24),
('GLN0000006', 'IV / b', 150, 16, 15, 24),
('GLN0000007', 'IV / c', 150, 19, 15, 24),
('GLN0000008', 'IV / d', 200, 25, 20, 24);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `kodeguru` varchar(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nuptk` varchar(20) NOT NULL,
  `nrg` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempatlahir` varchar(30) NOT NULL,
  `tanggallahir` date NOT NULL,
  `kodepangkat` varchar(10) NOT NULL,
  `kodejabatan` varchar(10) NOT NULL,
  `kodegolongan` varchar(10) NOT NULL,
  `tmtguru` date NOT NULL,
  `jeniskelamin` varchar(20) NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `program` varchar(30) NOT NULL,
  `jam` int(11) NOT NULL,
  `masakerja` varchar(30) NOT NULL,
  `jenisguru` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Tabel Guru';

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`kodeguru`, `nip`, `nuptk`, `nrg`, `nama`, `tempatlahir`, `tanggallahir`, `kodepangkat`, `kodejabatan`, `kodegolongan`, `tmtguru`, `jeniskelamin`, `pendidikan`, `program`, `jam`, `masakerja`, `jenisguru`) VALUES
('GRU0000001', '19590630 198710 1 00', '2692 7376 3920 0002', '076229051008', 'Drs. H. Suprayitno, M.Pd.', 'Jember', '1959-06-30', 'PKT0000006', 'JBT0000001', 'GLN0000006', '1987-10-01', 'Laki-laki', 'S1 Pendidikan Adper', 'Administrasi Perkantoran', 24, '23 tahun', 'Guru Matpel'),
('GRU0000002', '19641117 198903 2 00', '3449 7426 4430 0013', '084934056019', 'Hj. Isnayah, S.Pd., MMPd', 'Jember', '1964-11-17', 'PKT0000006', 'JBT0000005', 'GLN0000006', '1989-03-01', 'Perempuan', 'S1. Pendidikan Bimbingan Konse', 'Bimbingan Konseling', 24, '4 Tahun', 'Guru BK'),
('GRU0000003', '19581231 198603 1 13', '9563 7366 3720 0443', '076335050018', 'Drs. Mulyono, M.Pd.', 'Nganjuk', '1958-12-31', 'PKT0000006', 'JBT0000003', 'GLN0000006', '1986-03-01', 'Laki-laki', 'S.1. Pend. Teknik Mesin', 'Fisika', 24, '40 Tahun', 'Guru Matpel');

-- --------------------------------------------------------

--
-- Table structure for table `indikator`
--

CREATE TABLE `indikator` (
  `kodeindikator` varchar(10) NOT NULL,
  `kodekompetensi` varchar(10) NOT NULL,
  `isiindikator` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='berisi indikator indikator dengan beberapa kriteria';

--
-- Dumping data for table `indikator`
--

INSERT INTO `indikator` (`kodeindikator`, `kodekompetensi`, `isiindikator`) VALUES
('IDK0000001', 'KMP0000001', 'Guru dapat mengidentifikasi karakteristik belajar setiap peserta didik di kelasnya.'),
('IDK0000002', 'KMP0000001', 'Guru memastikan bahwa semua peserta didik mendapatkan kesempatan yang sama untuk berpartisipasi aktif dalam kegiatan pembelajaran.'),
('IDK0000003', 'KMP0000001', 'Guru dapat mengatur kelas untuk memberikan kesempatan belajar yang sama pada semua peserta didik dengan kelainan fisik dan kemampuan belajar yang berbeda.'),
('IDK0000004', 'KMP0000001', 'Guru mencoba mengetahui penyebab penyimpangan perilaku peserta didik untuk mencegah agar perilaku tersebut tidak merugikan peserta didik lainnya.'),
('IDK0000005', 'KMP0000001', 'Guru membantu mengembangkan potensi dan mengatasi kekurangan peserta didik.'),
('IDK0000006', 'KMP0000001', 'Guru memperhatikan peserta didik dengan kelemahan fisik tertentu agar dapat mengikuti aktivitas pembelajaran, sehingga peserta didik tersebut tidak termarginalkan (tersisihkan, diolok-olok, minder, dsb.).'),
('IDK0000007', 'KMP0000002', 'Guru memberi kesempatan kepada peserta didik untuk menguasai materi pembelajaran sesuai usia dan kemampuan belajarnya melalui pengaturan proses pembelajaran dan aktivitas yang bervariasi.'),
('IDK0000008', 'KMP0000002', 'Guru selalu memastikan tingkat pemahaman peserta didik terhadap materi pembelajaran tertentu dan menyesuaikan aktivitas pembelajaran berikutnya berdasarkan tingkat pemahaman tersebut.'),
('IDK0000009', 'KMP0000002', 'Guru dapat menjelaskan alasan pelaksanaan kegiatan/aktivitas yang dilakukannya, baik yang sesuai maupun yang berbeda dengan rencana, terkait keberhasilan pembelajaran.'),
('IDK0000010', 'KMP0000002', 'Guru menggunakan berbagai teknik untuk memotiviasi kemauan belajar peserta didik.'),
('IDK0000011', 'KMP0000002', 'Guru merencanakan kegiatan pembelajaran yang saling terkait satu sama lain, dengan memperhatikan tujuan pembelajaran maupun proses belajar peserta didik.'),
('IDK0000012', 'KMP0000002', 'Guru memperhatikan respon peserta didik yang belum/kurang memahami materi pembelajaran yang diajarkan dan menggunakannya untuk memperbaiki rancangan pembelajaran berikutnya.'),
('IDK0000013', 'KMP0000003', 'Guru dapat menyusun silabus yang sesuai dengan kurikulum.'),
('IDK0000014', 'KMP0000003', 'Guru merancang rencana pembelajaran yang sesuai dengan silabus untuk membahas materi ajar tertentu agar peserta didik dapat mencapai kompetensi dasar yang ditetapkan.'),
('IDK0000015', 'KMP0000003', 'Guru mengikuti urutan materi pembelajaran dengan memperhatikan tujuan pembelajaran.'),
('IDK0000016', 'KMP0000003', 'Guru memilih materi pembelajaran yang: a) sesuai dengan tujuan pembelajaran, b) tepat dan mutakhir, c) sesuai dengan usia dan tingkat kemampuan belajar peserta didik, dan d) dapat dilaksanakan di kelas e) sesuai dengan konteks kehidupan sehari-hari peserta didik.'),
('IDK0000017', 'KMP0000004', 'Guru melaksanakan aktivitas pembelajaran sesuai dengan rancangan yang telah disusun secara lengkap dan pelaksanaan aktivitas tersebut mengindikasikan bahwa guru mengerti tentang tujuannya.'),
('IDK0000018', 'KMP0000004', 'Guru melaksanakan aktivitas pembelajaran yang bertujuan untuk membantu proses belajar peserta didik, bukan untuk menguji sehingga membuat peserta didik merasa tertekan.'),
('IDK0000019', 'KMP0000004', 'Guru mengkomunikasikan informasi baru (misalnya materi tambahan) sesuai dengan usia dan tingkat kemampuan belajar peserta didik.'),
('IDK0000020', 'KMP0000004', 'Guru menyikapi kesalahan yang dilakukan peserta didik sebagai tahapan proses pembelajaran, bukan semata-mata kesalahan yang harus dikoreksi. Misalnya: dengan mengetahui terlebih dahulu peserta didik lain yang setuju atau tidak setuju dengan jawaban tersebut, sebelum memberikan penjelasan tentang jawaban yang benar.'),
('IDK0000021', 'KMP0000004', 'Guru melaksanakan kegiatan pembelajaran sesuai isi kurikulum dan mengkaitkannya dengan konteks kehidupan sehari-hari peserta didik.'),
('IDK0000022', 'KMP0000004', 'Guru melakukan aktivitas pembelajaran secara bervariasi dengan waktu yang cukup untuk kegiatan pembelajaran yang sesuai dengan usia dan tingkat kemampuan belajar dan mempertahankan perhatian peserta didik.'),
('IDK0000023', 'KMP0000004', 'Guru mengelola kelas dengan efektif tanpa mendominasi atau sibuk dengan kegiatannya sendiri agar semua waktu peserta dapat termanfaatkan secara produktif.'),
('IDK0000024', 'KMP0000004', 'Guru mampu menyesuaikan aktivitas pembelajaran yang dirancang dengan kondisi kelas.'),
('IDK0000025', 'KMP0000004', 'Guru memberikan banyak kesempatan kepada peserta didik untuk bertanya, mempraktekkan dan berinteraksi dengan peserta didik lain.'),
('IDK0000026', 'KMP0000004', 'Guru mengatur pelaksanaan aktivitas pembelajaran secara sistematis untuk membantu proses belajar peserta didik. Sebagai contoh: guru menambah informasi baru setelah mengevaluasi pemahaman peserta didik terhadap materi sebelumnya.'),
('IDK0000027', 'KMP0000004', 'Guru menggunakan alat bantu mengajar, dan/atau audio-visual (termasuk TIK) untuk meningkatkan motivasi belajar peserta didik dalam mencapai tujuan pembelajaran.'),
('IDK0000028', 'KMP0000005', 'Guru menggunakan alat bantu mengajar, dan/atau audio-visual (termasuk TIK) untuk meningkatkan motivasi belajar peserta didik dalam mencapai tujuan pembelajaran.'),
('IDK0000029', 'KMP0000005', 'Guru merancang dan melaksanakan aktivitas pembelajaran yang mendorong peserta didik untuk belajar sesuai dengan kecakapan dan pola belajar masing-masing.'),
('IDK0000030', 'KMP0000005', 'Guru merancang dan melaksanakan aktivitas pembelajaran untuk memunculkan daya kreativitas dan kemampuan berfikir kritis peserta didik.'),
('IDK0000031', 'KMP0000005', 'Guru secara aktif membantu peserta didik dalam proses pembelajaran dengan memberikan perhatian kepada setiap individu.'),
('IDK0000032', 'KMP0000005', 'Guru dapat mengidentifikasi dengan benar tentang bakat, minat, potensi, dan kesulitan belajar masing-masing peserta didik.'),
('IDK0000033', 'KMP0000005', 'Guru memberikan kesempatan belajar kepada peserta didik sesuai dengan cara belajarnya masing-masing.'),
('IDK0000034', 'KMP0000005', 'Guru memusatkan perhatian pada interaksi dengan peserta didik dan mendorongnya untuk memahami dan menggunakan informasi yang disampaikan.'),
('IDK0000035', 'KMP0000006', 'Guru menggunakan pertanyaan untuk mengetahui pemahaman dan menjaga partisipasi peserta didik, termasuk memberikan pertanyaan terbuka yang menuntut peserta didik untuk menjawab dengan ide dan pengetahuan mereka.'),
('IDK0000036', 'KMP0000006', 'Guru memberikan perhatian dan mendengarkan semua pertanyaan dan tanggapan peserta didik, tanpa menginterupsi, kecuali jika diperlukan untuk membantu atau mengklarifikasi pertanyaan/tanggapan tersebut.'),
('IDK0000037', 'KMP0000006', 'Guru menanggapinya pertanyaan peserta didik secara tepat, benar, dan mutakhir, sesuai tujuan pembelajaran dan isi kurikulum, tanpa mempermalukannya.'),
('IDK0000038', 'KMP0000006', 'Guru menyajikan kegiatan pembelajaran yang dapat menumbuhkan kerja sama yang baik antar peserta didik.'),
('IDK0000039', 'KMP0000006', 'Guru mendengarkan dan memberikan perhatian terhadap semua jawaban peserta didik baik yang benar maupun yang dianggap salah untuk mengukur tingkat pemahaman peserta didik.'),
('IDK0000040', 'KMP0000006', 'Guru memberikan perhatian terhadap pertanyaan peserta didik dan meresponnya secara lengkap dan relevan untuk menghilangkan kebingungan pada peserta didik.'),
('IDK0000041', 'KMP0000007', 'Guru menyusun alat penilaian yang sesuai dengan tujuan pembelajaran untuk mencapai kompetensi tertentu seperti yang tertulis dalam RPP.'),
('IDK0000042', 'KMP0000007', 'Guru melaksanakan penilaian dengan berbagai teknik dan jenis penilaian, selain penilaian formal yang dilaksanakan sekolah, dan mengumumkan hasil serta implikasinya kepada peserta didik, tentang tingkat pemahaman terhadap materi pembelajaran yang telah dan akan dipelajari.'),
('IDK0000043', 'KMP0000007', 'Guru menganalisis hasil penilaian untuk mengidentifikasi topik/kompetensi dasar yang sulit sehingga diketahui kekuatan dan kelemahan masing-masing peserta didik untuk keperluan remedial dan pengayaan.'),
('IDK0000044', 'KMP0000007', 'Guru memanfaatkan masukan dari peserta didik dan merefleksikannya untuk meningkatkan pembelajaran selanjutnya, dan dapat membuktikannya melalui catatan, jurnal pembelajaran, rancangan pembelajaran, materi tambahan, dan sebagainya.'),
('IDK0000045', 'KMP0000007', 'Guru memanfatkan hasil penilaian sebagai bahan penyusunan rancangan pembelajaran yang akan dilakukan selanjutnya.'),
('IDK0000046', 'KMP0000008', 'Guru menghargai dan mempromosikan prinsip-prinsip Pancasila sebagai dasar ideologi dan etika bagi semua warga Indonesia.'),
('IDK0000047', 'KMP0000008', 'Guru mengembangkan kerjasama dan membina kebersamaan dengan teman sejawat tanpa memperhatikan perbedaan yang ada (misalnya: suku, agama, dan gender).'),
('IDK0000048', 'KMP0000008', 'Guru saling menghormati dan menghargai teman sejawat sesuai dengan kondisi dan keberadaan masing-masing.'),
('IDK0000049', 'KMP0000008', 'Guru memiliki rasa persatuan dan kesatuan sebagai bangsa Indonesia.'),
('IDK0000050', 'KMP0000008', 'Guru mempunyai pandangan yang luas tentang keberagaman bangsa Indonesia (misalnya: budaya, suku, agama).'),
('IDK0000051', 'KMP0000009', 'Guru bertingkah laku sopan dalam berbicara, berpenampilan, dan berbuat terhadap semua peserta didik, orang tua, dan teman sejawat.'),
('IDK0000052', 'KMP0000009', 'Guru mau membagi pengalamannya dengan teman sejawat, termasuk mengundang mereka untuk mengobservasi cara mengajarnya dan memberikan masukan.'),
('IDK0000053', 'KMP0000009', 'Guru mampu mengelola pembelajaran yang membuktikan bahwa guru dihormati oleh peserta didik, sehingga semua peserta didik selalu memperhatikan guru dan berpartisipasi aktif dalam proses pembelajaran.'),
('IDK0000054', 'KMP0000009', 'Guru bersikap dewasa dalam menerima masukan dari peserta didik dan memberikan kesempatan kepada peserta didik untuk berpartisipasi dalam proses pembelajaran.'),
('IDK0000055', 'KMP0000009', 'Guru berperilaku baik untuk mencitrakan nama baik sekolah.'),
('IDK0000056', 'KMP0000010', 'Guru mengawali dan mengakhiri pembelajaran dengan tepat waktu.'),
('IDK0000057', 'KMP0000010', 'Jika guru harus meninggalkan kelas, guru mengaktifkan siswa dengan melakukan hal-hal produktif terkait dengan mata pelajaran, dan meminta guru piket atau guru lain untuk mengawasi kelas.'),
('IDK0000058', 'KMP0000010', 'Guru memenuhi jam mengajar dan dapat melakukan semua kegiatan lain di luar jam mengajar berdasarkan ijin dan persetujuan pengelola sekolah.'),
('IDK0000059', 'KMP0000010', 'Guru meminta ijin dan memberitahu lebih awal, dengan memberikan alasan dan bukti yang sah jika tidak menghadiri kegiatan yang telah direncanakan, termasuk proses pembelajaran di kelas.'),
('IDK0000060', 'KMP0000010', 'Guru menyelesaikan semua tugas administratif dan non-pembelajaran dengan tepat waktu sesuai standar yang ditetapkan.'),
('IDK0000061', 'KMP0000010', 'Guru memanfaatkan waktu luang selain mengajar untuk kegiatan yang produktif terkait dengan tugasnya.'),
('IDK0000062', 'KMP0000010', 'Guru memberikan kontribusi terhadap pengembangan sekolah dan mempunyai prestasi yang berdampak positif terhadap nama baik sekolah.'),
('IDK0000063', 'KMP0000010', 'Guru merasa bangga dengan profesinya sebagai guru.'),
('IDK0000064', 'KMP0000011', 'Guru memperlakukan semua peserta didik secara adil, memberikan perhatian dan bantuan sesuai kebutuhan masing-masing, tanpa memperdulikan faktor personal.'),
('IDK0000065', 'KMP0000011', 'Guru menjaga hubungan baik dan peduli dengan teman sejawat (bersifat inklusif), serta berkontribusi positif terhadap semua diskusi formal dan informal terkait dengan pekerjaannya.'),
('IDK0000066', 'KMP0000011', 'Guru sering berinteraksi dengan peserta didik dan tidak membatasi perhatiannya hanya pada kelompok tertentu (misalnya: peserta didik yang pandai, kaya, berasal dari daerah yang sama dengan guru).'),
('IDK0000067', 'KMP0000012', 'Guru menyampaikan informasi tentang kemajuan, kesulitan, dan potensi peserta didik kepada orang tuanya, baik dalam pertemuan formal maupun tidak formal antara guru dan orang tua, teman sejawat, dan dapat menunjukkan buktinya.'),
('IDK0000068', 'KMP0000012', 'Guru ikut berperan aktif dalam kegiatan di luar pembelajaran yang diselenggarakan oleh sekolah dan masyarakat dan dapat memberikan bukti keikutsertaannya.'),
('IDK0000069', 'KMP0000012', 'Guru memperhatikan sekolah sebagai bagian dari masyarakat, berkomunikasi dengan masyarakat sekitar, serta berperan dalam kegiatan sosial di masyarakat.'),
('IDK0000070', 'KMP0000013', 'Guru melakukan pemetaan standar kompetensi dan kompetensi dasar untuk mata pelajaran yang diampunya, untuk mengidentifikasi materi pembelajaran yang dianggap sulit, melakukan perencanaan dan pelaksanaan pembelajaran, dan memperkirakan alokasi waktu yang diperlukan.'),
('IDK0000071', 'KMP0000013', 'Guru menyertakan informasi yang tepat dan mutakhir di dalam perencanaan dan pelaksanaan pembelajaran.'),
('IDK0000072', 'KMP0000013', 'Guru menyusun materi, perencanaan dan pelaksanaan pembelajaran yang berisi informasi yang tepat, mutakhir, dan yang membantu peserta didik untuk memahami konsep materi pembelajaran.'),
('IDK0000073', 'KMP0000014', 'Guru melakukan evaluasi diri secara spesifik, lengkap, dan  didukung dengan contoh pengalaman diri sendiri.'),
('IDK0000074', 'KMP0000014', 'Guru memiliki jurnal pembelajaran, catatan masukan dari kolega atau hasil penilaian proses pembelajaran sebagai bukti yang menggambarkan kinerjanya.'),
('IDK0000075', 'KMP0000014', 'Guru memanfaatkan bukti gambaran kinerjanya untuk mengembangkan  perencanaan dan pelaksanaan pembelajaran selanjutnya dalam program Pengembangan Keprofesian Berkelanjutan (PKB).'),
('IDK0000076', 'KMP0000014', 'Guru dapat mengaplikasikan pengalaman PKB dalam perencanaan, pelaksanaan, penilaian pembelajaran dan tindak lanjutnya.'),
('IDK0000077', 'KMP0000014', 'Guru melakukan penelitian, mengembangkan karya inovasi, mengikuti kegiatan ilmiah (misalnya seminar, konferensi), dan aktif dalam melaksanakan PKB.'),
('IDK0000078', 'KMP0000014', 'Guru dapat memanfaatkan TIK dalam berkomunikasi dan pelaksanaan PKB.'),
('IDK0000079', 'KMP0000015', 'Guru BK/Konselor dapat menunjukkan dalam perencanaan layanan BK, sesuai dengan landasan dan prinsip-prinsip pendidikan serta pembelajaran yang aktif, kreatif, mandiri, dan berpusat pada peserta didik/konseli.'),
('IDK0000080', 'KMP0000015', 'Guru BK/Konselor dapat menunjukkan dalam perencanaan layanan BK, sesuai dengan usia, tahap perkembangan, dan kebutuhan peserta didik/ konseli.'),
('IDK0000081', 'KMP0000015', 'Guru BK/Konselor dapat menunjukkan dalam perencanaan layanan BK, sesuai dengan keragaman latar belakang budaya, ekonomi, dan sosial peserta didik/konseli.'),
('IDK0000082', 'KMP0000016', 'Peserta didik/konseli diberi kesempatan dalam memperoleh layanan BK sesuai dengan kebutuhan perkembangan mental, emosional, fisik, dan gender.'),
('IDK0000083', 'KMP0000016', 'Peserta didik/konseli diberi kesempatan dalam memperoleh layanan BK sesuai dengan kebutuhan bakat, minat, dan potensi pribadi.'),
('IDK0000084', 'KMP0000016', 'Peserta didik/konseli diberi kesempatan dalam memperoleh layanan BK sesuai dengan harapan untuk melanjutkan pendidikan dan pilihan karir.'),
('IDK0000085', 'KMP0000017', 'Layanan BK yang diprogramkan oleh guru BK/ Konselor telah memenuhi esensi layanan pada jalur satuan pendidikan formal, nonformal dan informal.'),
('IDK0000086', 'KMP0000017', 'Layanan BK yang diprogramkan oleh guru BK/ Konselor telah memenuhi esensi layanan pada jenis satuan pendidikan umum, kejuruan, keagamaan, dan khusus.'),
('IDK0000087', 'KMP0000017', 'Layanan BK yang diprogramkan oleh guru BK/ Konselor telah memenuhi esensi layanan pada jenjang satuan pendidikan usia dini, dasar dan menengah, serta tinggi.'),
('IDK0000088', 'KMP0000018', 'Guru BK/Konselor berpenampilan rapih dan bersih.'),
('IDK0000089', 'KMP0000018', 'Guru BK/Konselor berbicara dengan santun dan jujur kepada peserta didik/konseli.'),
('IDK0000090', 'KMP0000018', 'Guru BK/Konselor bersikap dan mendorong kepada peserta didik/konseli untuk bersikap toleran.'),
('IDK0000091', 'KMP0000018', 'Guru BK/Konselor memperlihatkan konsistensi dan memotivasi peserta didik/konseli dalam melaksanakan ibadah.'),
('IDK0000092', 'KMP0000019', 'Guru BK/Konselor merencanakan layanan BK yang mengacu kepada pengaplikasian pandangan dinamis tentang manusia sebagai mahluk bermoral spiritual, sosial, & individu.'),
('IDK0000093', 'KMP0000019', 'Pelayanan BK yang dirancang oleh Guru BK/Konselor mendorong kepada pengembangan potensi positif individu.'),
('IDK0000094', 'KMP0000019', 'Rancangan pelayanan BK mengacu kepada kebutuhan dan masukan balik peserta didik/konseli.'),
('IDK0000095', 'KMP0000019', 'Pelayanan BK dirancang untuk mengembangkan sikap toleran dalam menjunjung hak azasi manusia pada peserta didik/konseli.'),
('IDK0000096', 'KMP0000020', 'Guru BK/Konselor menunjukkan kepribadian, kestabilan emosi dan perilaku yang terpuji, jujur, sabar, ramah, dan konsisten.'),
('IDK0000097', 'KMP0000020', 'Guru BK/Konselor menunjukkan kepekaan dan bersikap empati terhadap keragaman dan perubahan.'),
('IDK0000098', 'KMP0000020', 'Guru BK/Konselor menampilkan toleransi tinggi terhadap peserta didik/konseli yang menghadapi stress dan frustasi.'),
('IDK0000099', 'KMP0000021', 'Guru BK/Konselor memotivasi peserta didik/konseli untuk berpartisipasi aktif dalam layanan BK yang diberikan.'),
('IDK0000100', 'KMP0000021', 'Guru BK/Konselor melaksanakan pelayanan BK yang efektif sesuai dengan rancangan untuk mencapai tujuan pelayanan BK dalam waktu yang tersedia.'),
('IDK0000101', 'KMP0000021', 'Guru BK/Konselor melaksanakan tugas layanan BK secara mandiri, disiplin, dan semangat agar peserta didik/konseli berpartisipasi secara aktif.'),
('IDK0000102', 'KMP0000022', 'Guru lain dapat menunjukkan contoh penggunaan hasil pelayanan BK untuk membantu peserta didik/konseli dalam proses pembelajaran yang dilakukannya.'),
('IDK0000103', 'KMP0000022', 'Guru BK/Konselor merencanakan pelayanan BK dengan menyertakan pihak-pihak terkait di sekolah.'),
('IDK0000104', 'KMP0000022', 'Guru BK/Konselor dapat menunjukkan bukti bagaimana menjelaskan program dan hasil layanan BK kepada pihak-pihak terkait di sekolah.'),
('IDK0000105', 'KMP0000022', 'Guru BK/Konselor dapat menunjukkan bukti permintaan guru lain untuk membantu penyelesaian permasalahan pembelajaran.'),
('IDK0000106', 'KMP0000023', 'Guru BK/Konselor mentaati Kode Etik organisasi profesi BK (seperti MGBK, ABKIN, atau organisasi profesi sejenis lainnya).'),
('IDK0000107', 'KMP0000023', 'Guru BK/Konselor berpartisipasi aktif dalam proses pengembangan diri melalui organisasi profesi guru BK/Konselor.'),
('IDK0000108', 'KMP0000023', 'Guru BK/Konselor dapat memanfaatkan organisasi profesi BK/Konselor untuk membangun kolaborasi dalam pengembangan program BK.'),
('IDK0000109', 'KMP0000024', 'Guru BK/Konselor dapat menunjukkan bukti melakukan interaksi dengan organisasi profesi lain.'),
('IDK0000110', 'KMP0000024', 'Guru BK/Konselor dapat berkolaborasi dengan institusi atau profesi lain untuk mencapai tujuan pelayanan BK.'),
('IDK0000111', 'KMP0000024', 'Guru BK/Konselor dapat memanfaatkan keahlian lain untuk membantu penyelesaian permasalahan peserta didik/konseli sesuai kebutuhan.'),
('IDK0000112', 'KMP0000024', 'Guru BK/Konselor dapat menunjukkan bukti melakukan interaksi dengan organisasi profesi lain.'),
('IDK0000113', 'KMP0000025', 'Guru BK/Konselor dapat mengembangkan instrumen non-tes (pedoman wawancara, angket, atau format lainnya) untuk keperluan pelayanan BK.'),
('IDK0000114', 'KMP0000025', 'Guru BK/Konselor dapat mengaplikasikan instrumen non-tes untuk mengungkapkan kondisi aktual peserta didik/konseli berkaitan dengan lingkungan.'),
('IDK0000115', 'KMP0000025', 'Guru BK/Konselor dapat mendeskripsikan penilaian yang digunakan dalam pelayanan BK yang sesuai dengan kebutuhan peserta didik/konseli.'),
('IDK0000116', 'KMP0000025', 'Guru BK/Konselor dapat memilih jenis penilaian (Instrumen Tugas Perkembangan/ITP, Alat Ungkap Masalah/AUM, Daftar Cek Masalah/DCM, atau instrumen non-tes lainnya) yang sesuai dengan kebutuhan layanan bimbingan dan konseling.'),
('IDK0000117', 'KMP0000025', 'Guru BK/Konselor dapat mengadministrasikan penilaian (merencanakan, melaksanakan, mengolah data) untuk mengungkapkan kemampuan dasar dan kecenderungan pribadi peserta didik/konseli.'),
('IDK0000118', 'KMP0000025', 'Guru BK/Konselor dapat mengadministrasikan penilaian (merencanakan, melaksanakan, mengolah data) untuk mengungkapkan masalah peserta didik/konseli (data catatan pribadi, kemampuan akademik, hasil evaluasi belajar, dan hasil psikotes).'),
('IDK0000119', 'KMP0000025', 'Guru BK/Konselor dapat menampilkan tanggung jawab profesional sesuai dengan azas BK (misalnya kerahasiaan, keterbukaan, kemutakhiran, dll.) dalam praktik penilaian.'),
('IDK0000120', 'KMP0000026', 'Guru BK/Konselor dapat mengaplikasikan hakikat pelayanan BK (tujuan, prinsip, azas, fungsi, dan landasan).'),
('IDK0000121', 'KMP0000026', 'Guru BK/Konselor dapat menentukankan arah profesi bimbingan dan konseling (peran sebagai guru BK/konselor).'),
('IDK0000122', 'KMP0000026', 'Guru BK/Konselor dapat mengaplikasikan dasar-dasar pelayanan BK.'),
('IDK0000123', 'KMP0000026', 'Guru BK/Konselor dapat mengaplikasikan pelayanan BK sesuai kondisi dan tuntutan wilayah kerja.'),
('IDK0000124', 'KMP0000026', 'Guru BK/Konselor dapat mengaplikasikan pendekatan /model/jenis pelayanan dan kegiatan pendukung bimbingan dan konseling.'),
('IDK0000125', 'KMP0000026', 'Guru BK/Konselor dapat mengaplikasikan praktik format (kegiatan) pelayanan BK.'),
('IDK0000126', 'KMP0000027', 'Guru BK/Konselor dapat menganalisis kebutuhan peserta didik/konseli.'),
('IDK0000127', 'KMP0000027', 'Guru BK/Konselor dapat menyusun program pelayanan BK yang berkelanjutan berdasar kebutuhan peserta didik/konseli secara komprehensif dengan pendekatan perkembangan'),
('IDK0000128', 'KMP0000027', 'Guru BK/Konselor dapat menyusun rencana pelaksanaan program pelayanan BK.'),
('IDK0000129', 'KMP0000027', 'Guru BK/Konselor dapat merencanakan sarana dan biaya penyelenggaraan program pelayanan BK.'),
('IDK0000130', 'KMP0000028', 'Guru BK/Konselor dapat melaksanakan program pelayanan BK.'),
('IDK0000131', 'KMP0000028', 'Guru BK/Konselor dapat melaksanakan pendekatan kolaboratif dengan pihak terkait dalam pelayanan BK.'),
('IDK0000132', 'KMP0000028', 'Guru BK/Konselor dapat memfasilitasi perkembangan akademik, karier, personal/ pribadi, dan sosial peserta didik/konseli.'),
('IDK0000133', 'KMP0000028', 'Guru BK/Konselor dapat mengelola sarana dan biaya program pelayanan BK.'),
('IDK0000134', 'KMP0000029', 'Guru BK/Konselor dapat melakukan evaluasi proses dan hasil program pelayanan BK.'),
('IDK0000135', 'KMP0000029', 'Guru BK/Konselor dapat melakukan penyesuaian kebutuhan peserta didik/konseli dalam proses pelayanan BK.'),
('IDK0000136', 'KMP0000029', 'Guru BK/Konselor dapat menginformasikan hasil pelaksanaan evaluasi pelayanan BK kepada pihak terkait'),
('IDK0000137', 'KMP0000029', 'Guru BK/Konselor dapat menggunakan hasil pelaksanaan evaluasi untuk merevisi dan mengembangkan program pelayanan BK berdasarkan analisis kebutuhan.'),
('IDK0000138', 'KMP0000030', 'Guru BK/Konselor dapat memberdayakan kekuatan pribadi, dan keprofesionalan guru BK/konselor.'),
('IDK0000139', 'KMP0000030', 'Guru BK/Konselor dapat meminimalisir dampak lingkungan dan keterbatasan pribadi guru BK/konselor.'),
('IDK0000140', 'KMP0000030', 'Guru BK/Konselor dapat menyelenggarakan pelayanan BK sesuai dengan kewenangan professi etik profesional guru BK/konselor.'),
('IDK0000141', 'KMP0000030', 'Guru BK/ Konselor dapat mempertahankan objektivitas dan menjaga agar tidak larut dengan masalah peserta didik/konseli.'),
('IDK0000142', 'KMP0000030', 'Guru BK/Konselor dapat melaksanakan layanan pendukung sesuai kebutuhan peserta didik/konseli (misalnya alih tangan kasus, kunjungan rumah, konferensi kasus, instrumen bimbingan, himpunan data).'),
('IDK0000143', 'KMP0000030', 'Guru BK / Konselor dapat menghargai Identitas Profesional dan pengembangan Profesi.'),
('IDK0000144', 'KMP0000030', 'Guru BK/Konselor dapat mendahulukan kepentingan peserta didik/konseli daripada kepentingan pribadi guru BK/Konselor.'),
('IDK0000145', 'KMP0000031', 'Guru BK/Konselor dapat mendeskripsikan jenis dan metode penelitian dalam BK.'),
('IDK0000146', 'KMP0000031', 'Guru BK/Konselor mampu merancang penelitian dalam BK.'),
('IDK0000147', 'KMP0000031', 'Guru BK/Konselor dapat melaksanakan penelitian dalam BK.'),
('IDK0000148', 'KMP0000031', 'Guru BK/Konselor dapat memanfaatkan hasil penelitian dalam BK dengan mengakses jurnal yang relevan.');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `kodejabatan` varchar(10) NOT NULL,
  `namajabatan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='penata muda dlll';

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kodejabatan`, `namajabatan`) VALUES
('JBT0000001', 'Kepala Sekolah'),
('JBT0000002', 'Waka Kurikulum'),
('JBT0000003', 'Waka Kemahasiswaan'),
('JBT0000004', 'Guru Mata Pelajaran'),
('JBT0000005', 'Guru BK');

-- --------------------------------------------------------

--
-- Table structure for table `jenispenilaian`
--

CREATE TABLE `jenispenilaian` (
  `kodejenis` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='menentukan guru matpel / bk / tambahan jabatan';

--
-- Dumping data for table `jenispenilaian`
--

INSERT INTO `jenispenilaian` (`kodejenis`, `nama`, `keterangan`) VALUES
('JNP0000001', 'Guru Matpel', 'penilaian untuk Guru matpel'),
('JNP0000002', 'Guru BK', 'Penilai untuk guru bk');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kodekategori` varchar(10) NOT NULL,
  `namakategori` varchar(30) NOT NULL,
  `kodejenis` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='contohnya pedagogik';

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kodekategori`, `namakategori`, `kodejenis`) VALUES
('KTG0000001', 'Pedagogik', 'JNP0000001'),
('KTG0000002', 'Kepribadian', 'JNP0000001'),
('KTG0000003', 'Sosial', 'JNP0000001'),
('KTG0000004', 'Professional', 'JNP0000001'),
('KTG0000005', 'Pedagogik', 'JNP0000002'),
('KTG0000006', 'Kepribadian', 'JNP0000002'),
('KTG0000007', 'Sosial', 'JNP0000002'),
('KTG0000008', 'Professional', 'JNP0000002');

-- --------------------------------------------------------

--
-- Table structure for table `kompetensi`
--

CREATE TABLE `kompetensi` (
  `kodekompetensi` varchar(10) NOT NULL,
  `kodekategori` varchar(10) NOT NULL,
  `namakompetensi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kompetensi`
--

INSERT INTO `kompetensi` (`kodekompetensi`, `kodekategori`, `namakompetensi`) VALUES
('KMP0000001', 'KTG0000001', 'Menguasai karakteristik peserta didik'),
('KMP0000002', 'KTG0000001', 'Menguasai teori belajar dan prinsip-prinsip pembelajaran yang mendidik'),
('KMP0000003', 'KTG0000001', 'Pengembangan kurikulum'),
('KMP0000004', 'KTG0000001', 'Kegiatan pembelajaran yang mendidik'),
('KMP0000005', 'KTG0000001', 'Pengembangan potensi peserta didik'),
('KMP0000006', 'KTG0000001', 'Komunikasi dengan peserta didik'),
('KMP0000007', 'KTG0000001', 'Penilaian dan Evaluasi'),
('KMP0000008', 'KTG0000002', 'Bertindak sesuai dengan norma agama, hukum, sosial dan kebudayaan nasional'),
('KMP0000009', 'KTG0000002', 'Menunjukkan pribadi yang dewasa dan teladan'),
('KMP0000010', 'KTG0000002', 'Etos kerja, tanggung jawab yang tinggi, rasa bangga menjadi guru'),
('KMP0000012', 'KTG0000003', 'Komunikasi dengan sesama guru, tenaga kependidikan, orang tua, peserta didik, dan masyarakat'),
('KMP0000011', 'KTG0000003', 'Bersikap inklusif, bertindak obyektif, serta tidak diskriminatif'),
('KMP0000013', 'KTG0000004', 'Penguasaan materi, struktur, konsep dan pola pikir keilmuan yang mendukung mata pelajaran yang diampu'),
('KMP0000014', 'KTG0000004', 'Mengembangkan keprofesionalan melalui tindakan yang reflektif'),
('KMP0000015', 'KTG0000005', 'Menguasai teori dan praksis pendidikan'),
('KMP0000016', 'KTG0000005', 'Mengaplikasikan perkembangan fisiologis dan psikologis serta perilaku konseli'),
('KMP0000017', 'KTG0000005', 'Menguasai esensi pelayanan BK dalam jalur, jenis dan jenjang satuan pendidikan'),
('KMP0000018', 'KTG0000006', 'Beriman dan bertaqwa kepada Tuhan Yang Maha Esa'),
('KMP0000019', 'KTG0000006', 'Menghargai dan menjunjung tinggi nilai-nilai kemanusiaan, individualitas dan kebebasan memilih'),
('KMP0000020', 'KTG0000006', 'Menunjukkan integritas dan stabilitas kepribadian yang kuat'),
('KMP0000021', 'KTG0000006', 'Menampilkan kinerja berkualitas tinggi'),
('KMP0000022', 'KTG0000007', 'Mengimplementasikan kolaborasi internal ditempat bekerja'),
('KMP0000023', 'KTG0000007', 'Berperan dalam organisasi dan kegiatan profesi BK'),
('KMP0000024', 'KTG0000007', 'Mengimplementasikan kolaborasi antar profesi'),
('KMP0000025', 'KTG0000008', 'Menguasai konsep dan praksis penilaian (assesment) untuk memahami kondisi, kebutuhan dan masalah konseli'),
('KMP0000026', 'KTG0000008', 'Menguasai kerangka teoritik dan praksis BK'),
('KMP0000027', 'KTG0000008', 'Merancang program BK'),
('KMP0000028', 'KTG0000008', 'Mengimplementasikan program BK yang komperehensip'),
('KMP0000029', 'KTG0000008', 'Menilai proses dan hasil kegiatan bimbingan dan konseli'),
('KMP0000030', 'KTG0000008', 'Memiliki kesadaran dan komitmen terhadap etika profesional'),
('KMP0000031', 'KTG0000008', 'Menguasai konsep dan praksis penelitian dalam BK');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `kodepenilaian` varchar(10) NOT NULL,
  `kodeguru` varchar(10) NOT NULL,
  `kodeindikator` varchar(10) NOT NULL,
  `nilai` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`kodepenilaian`, `kodeguru`, `kodeindikator`, `nilai`) VALUES
('PNL0000001', 'GRU0000003', 'IDK0000005', '1'),
('PNL0000001', 'GRU0000003', 'IDK0000004', '1'),
('PNL0000001', 'GRU0000003', 'IDK0000003', '2'),
('PNL0000001', 'GRU0000003', 'IDK0000002', '2'),
('PNL0000001', 'GRU0000003', 'IDK0000001', '2'),
('PNL0000001', 'GRU0000002', 'IDK0000081', '2'),
('PNL0000001', 'GRU0000002', 'IDK0000080', '1'),
('PNL0000001', 'GRU0000002', 'IDK0000079', '0'),
('PNL0000001', 'GRU0000001', 'IDK0000006', '0'),
('PNL0000001', 'GRU0000001', 'IDK0000005', '1'),
('PNL0000001', 'GRU0000001', 'IDK0000004', '2'),
('PNL0000001', 'GRU0000001', 'IDK0000003', '2'),
('PNL0000001', 'GRU0000001', 'IDK0000002', '1'),
('PNL0000001', 'GRU0000001', 'IDK0000001', '0'),
('PNL0000001', 'GRU0000003', 'IDK0000006', '2'),
('PNL0000001', 'GRU0000002', 'IDK0000082', '2'),
('PNL0000001', 'GRU0000002', 'IDK0000083', '2'),
('PNL0000001', 'GRU0000002', 'IDK0000084', '2');

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

CREATE TABLE `pangkat` (
  `kodepangkat` varchar(10) NOT NULL,
  `namapangkat` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`kodepangkat`, `namapangkat`) VALUES
('PKT0000002', 'Penata Muda Tk 1'),
('PKT0000001', 'Penata Muda'),
('PKT0000003', 'Penata'),
('PKT0000004', 'Penata Tk 1'),
('PKT0000005', 'Pembina'),
('PKT0000006', 'Pembina Tk 1'),
('PKT0000007', 'Pembina Utama Muda'),
('PKT0000008', 'Pembina Utama Madya'),
('PKT0000009', 'Pembina Utama');

-- --------------------------------------------------------

--
-- Table structure for table `penilai`
--

CREATE TABLE `penilai` (
  `kodepenilai` varchar(10) NOT NULL,
  `kodeguru` varchar(10) NOT NULL,
  `nomorsk` varchar(30) NOT NULL,
  `tanggalsk` date NOT NULL,
  `berlaku` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Tabel Penilai / Guru yang menilai';

--
-- Dumping data for table `penilai`
--

INSERT INTO `penilai` (`kodepenilai`, `kodeguru`, `nomorsk`, `tanggalsk`, `berlaku`, `keterangan`, `username`, `password`) VALUES
('PNL0000001', 'GRU0000002', '823/001a/413.29.20523849/2015', '2015-01-05', '31 Desember 2015', '-', 'amien', '123');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `kodepenilaian` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `periode` varchar(30) NOT NULL,
  `kodedinas` varchar(10) NOT NULL,
  `kodepenilai` varchar(10) NOT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`kodepenilaian`, `tanggal`, `periode`, `kodedinas`, `kodepenilai`, `tipe`) VALUES
('PLN0000001', '2015-12-12', '5 Januari - 31 Desember 2015', 'PGD0000001', 'PNL0000001', 'Formatif');

-- --------------------------------------------------------

--
-- Table structure for table `petugasdinas`
--

CREATE TABLE `petugasdinas` (
  `kodedinas` varchar(10) NOT NULL,
  `nama_petugas` varchar(30) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='table petugas dinas / asesor';

--
-- Dumping data for table `petugasdinas`
--

INSERT INTO `petugasdinas` (`kodedinas`, `nama_petugas`, `nip`, `keterangan`) VALUES
('PGD0000001', 'Drs. Bambang Hariono, M.M', '196201311982011005', 'dari dinas jember');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `kode_sekolah` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kabupaten` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `idguru` varchar(10) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Tabel Sekolah';

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`kode_sekolah`, `nama`, `telp`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `alamat`, `idguru`, `status`) VALUES
('SKL0000001', 'SMK NEGERI 6 JEMBER', '(0336) 441347', 'Tanggul-Kulon', 'Tanggul', 'Jember', 'Jawa TImur', 'Jl. PB. Sudirman 114 Tanggul-Jember', 'GRU0000001', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`kodegolongan`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`kodeguru`);

--
-- Indexes for table `indikator`
--
ALTER TABLE `indikator`
  ADD PRIMARY KEY (`kodeindikator`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kodejabatan`);

--
-- Indexes for table `jenispenilaian`
--
ALTER TABLE `jenispenilaian`
  ADD PRIMARY KEY (`kodejenis`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kodekategori`);

--
-- Indexes for table `kompetensi`
--
ALTER TABLE `kompetensi`
  ADD PRIMARY KEY (`kodekompetensi`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kodepenilaian`,`kodeguru`,`kodeindikator`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`kodepangkat`);

--
-- Indexes for table `penilai`
--
ALTER TABLE `penilai`
  ADD PRIMARY KEY (`kodepenilai`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`kodepenilaian`);

--
-- Indexes for table `petugasdinas`
--
ALTER TABLE `petugasdinas`
  ADD PRIMARY KEY (`kodedinas`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`kode_sekolah`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
