-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2024 at 07:25 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_quis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawaban`
--

CREATE TABLE `tb_jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pertanyaan` int(11) NOT NULL,
  `jawaban` text NOT NULL,
  `hasil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pertanyaan`
--

CREATE TABLE `tb_pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `status` enum('pilgan','esai') NOT NULL,
  `nilai_a` varchar(255) NOT NULL,
  `nilai_b` varchar(255) NOT NULL,
  `nilai_c` varchar(255) NOT NULL,
  `nilai_d` varchar(255) NOT NULL,
  `nilai_e` varchar(255) NOT NULL,
  `nilai_benar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pertanyaan`
--

INSERT INTO `tb_pertanyaan` (`id_pertanyaan`, `pertanyaan`, `status`, `nilai_a`, `nilai_b`, `nilai_c`, `nilai_d`, `nilai_e`, `nilai_benar`) VALUES
(1, 'Apa fungsi dari file config.php dalam CodeIgniter?', 'pilgan', 'Mengatur konfigurasi dasar', 'Mengatur rute (routes)', 'Mengatur basis data (database)', 'Mengatur tampilan (view)', 'Mengatur kontroler (controller)', 'Mengatur konfigurasi dasar'),
(2, 'Bagian manakah dari MVC (Model-View-Controller) yang bertanggung jawab untuk berinteraksi dengan basis data?', 'pilgan', 'Model', 'View', 'Controller', 'Helper', 'Library', 'Model'),
(3, 'Dalam CodeIgniter, fungsi apa yang digunakan untuk memuat sebuah tampilan (view)?', 'pilgan', '$this->load->view()', '$this->display->view()', '$this->render->view()', '$this->show->view()', '$this->insert->view()', '$this->load->view()'),
(4, 'Apa yang dimaksud dengan base_url dalam CodeIgniter 3?', 'pilgan', 'Alamat URL lengkap dari suatu situs web', 'Alamat URL dasar dari suatu situs web', 'Alamat URL dari halaman login', 'Alamat URL dari halaman beranda', 'Alamat URL dari halaman detail produk', 'Alamat URL dasar dari suatu situs web'),
(5, 'Bagian manakah dari CodeIgniter yang bertanggung jawab untuk memproses input dari pengguna dan menjalankan logika bisnis?', 'pilgan', 'Model', 'View', 'Controller', 'Helper', 'Library', 'Controller'),
(6, 'Dalam CodeIgniter, bagaimana cara untuk memuat model di dalam sebuah kontroler?', 'pilgan', '$this->model->load()', '$this->load->model()', '$this->model->get()', '$this->import->model()', '$this->use->model()', '$this->load->model()'),
(7, 'Fungsi apa yang digunakan untuk melakukan pengalihan (redirect) dalam CodeIgniter?', 'pilgan', 'redirect()', 'route()', 'forward()', 'transfer()', 'move()', 'redirect()'),
(8, 'Apa tujuan dari file .htaccess dalam CodeIgniter 3?', 'pilgan', 'Mengatur konfigurasi umum aplikasi', 'Mengatur koneksi ke database', 'Mengatur tampilan antarmuka pengguna', 'Mengatur routing URL', 'Mengatur konfigurasi server web', 'Mengatur konfigurasi server web'),
(9, 'Bagian manakah dari CodeIgniter yang berfungsi untuk menyediakan alat bantu tambahan dalam pengembangan?', 'pilgan', 'Model', 'View', 'Controller', 'Helper', 'Library', 'Helper'),
(10, 'Apa yang dimaksud dengan \"flash data\" dalam CodeIgniter?', 'pilgan', 'Data yang tersimpan dalam cache browser', 'Data yang disimpan di dalam cookies', 'Data yang disimpan di dalam session dan dihapus setelah satu kali akses', 'Data yang disimpan dalam database', 'Data yang disimpan dalam file eksternal', 'Data yang disimpan di dalam session dan dihapus setelah satu kali akses'),
(11, 'Bagaimana cara mengakses data dari formulir POST dalam CodeIgniter?', 'pilgan', '$this->input->post()', '$this->form->post()', '$this->request->post()', '$this->data->post()', '$this->form->input()', '$this->input->post()'),
(12, 'Fungsi apa yang digunakan untuk memuat library di dalam sebuah kontroler CodeIgniter?', 'pilgan', '$this->load->library()', '$this->use->library()', '$this->import->library()', '$this->include->library()', '$this->add->library()', '$this->load->library()'),
(13, 'Apa tujuan utama dari file database.php dalam CodeIgniter 3?', 'pilgan', 'Mengatur konfigurasi umum aplikasi', 'Mengatur koneksi ke database', 'Mengatur tampilan antarmuka pengguna', 'Mengatur routing URL', 'Mengatur autentikasi pengguna', 'Mengatur koneksi ke database'),
(14, 'Apa yang dilakukan oleh fungsi $this->load->helper(\"url\") dalam CodeIgniter?', 'pilgan', 'Memuat file URL dari server', 'Memuat pustaka tambahan untuk manipulasi URL', 'Memuat daftar URL yang tersimpan', 'Memuat konfigurasi URL dasar dari aplikasi', 'Memuat daftar kontroler yang tersedia', 'Memuat pustaka tambahan untuk manipulasi URL'),
(15, 'Dalam CodeIgniter, file mana yang berisi definisi kelas utama dan fungsi pembuat (constructor) pada aplikasi?', 'pilgan', 'index.php', 'config.php', 'routes.php', 'autoload.php', 'controller.php', 'controller.php'),
(16, 'Jelaskan perbedaan antara penggunaan metode HTTP GET dan POST dalam pengiriman data formulir dalam PHP.', 'esai', '', '', '', '', '', 'Metode HTTP GET digunakan untuk mengirimkan data melalui URL dan cocok digunakan untuk mengambil data. Metode HTTP POST mengirimkan data dalam badan permintaan HTTP dan lebih aman serta cocok untuk mengirimkan data sensitif.'),
(17, 'Apa yang dimaksud dengan \"autoload\" dalam konteks CodeIgniter? Jelaskan kegunaannya dan berikan contoh implementasinya.', 'esai', '', '', '', '', '', 'Autoload dalam CodeIgniter adalah mekanisme untuk secara otomatis memuat file-file yang diperlukan ketika aplikasi dimulai. Kegunaannya adalah untuk memudahkan penggunaan kelas, library, atau helper secara global tanpa harus memuatnya secara manual setiap saat. Contoh implementasinya adalah dengan mendefinisikan file-file yang ingin dimuat secara otomatis dalam konfigurasi autoload.'),
(18, 'Jelaskan konsep Model-View-Controller (MVC) dalam pengembangan web menggunakan CodeIgniter. Mengapa MVC dianggap sebagai pola desain yang baik?', 'esai', '', '', '', '', '', 'Model-View-Controller (MVC) adalah pola desain yang memisahkan logika aplikasi menjadi tiga komponen: Model untuk mengelola data, View untuk menampilkan data kepada pengguna, dan Controller untuk mengontrol alur aplikasi. MVC dianggap sebagai pola desain yang baik karena memisahkan tanggung jawab masing-masing komponen, sehingga meningkatkan keterbacaan, skalabilitas, dan perawatan kode.'),
(19, 'Bagaimana cara membuat rute (route) kustom dalam CodeIgniter? Jelaskan langkah-langkahnya dan berikan contoh implementasinya.', 'esai', '', '', '', '', '', 'Untuk membuat rute kustom dalam CodeIgniter, pertama-tama Anda perlu menambahkan aturan rute baru dalam file `routes.php` yang terletak di direktori `application/config`. Kemudian, tentukan pola URL yang ingin Anda atur dan arahkan ke kontroler dan metode yang sesuai. Contoh implementasinya adalah dengan menambahkan baris kode seperti `$route[\"nama_rute\"] = \"nama_kontroler/nama_metode\";` dalam file `routes.php`.'),
(20, 'Apa perbedaan antara model dan controller dalam CodeIgniter 3?', 'esai', '', '', '', '', '', 'Perbedaan utama antara model dan controller dalam CodeIgniter 3 adalah bahwa model bertanggung jawab untuk mengelola data, sedangkan controller bertanggung jawab untuk mengelola aliran logika dan interaksi antara model dan tampilan.'),
(21, 'Apa perbedaan antara metode HTTP GET dan POST dalam pengiriman data formulir?', 'pilgan', 'Metode GET mengirimkan data melalui URL dan cocok untuk data yang tidak sensitif.', 'Metode POST mengirimkan data dalam badan permintaan HTTP dan cocok untuk data sensitif.', 'Keduanya memiliki fungsi yang sama.', 'GET dan POST tidak memiliki perbedaan dalam pengiriman data formulir.', 'GET lebih aman daripada POST.', 'Metode GET mengirimkan data melalui URL dan cocok untuk data yang tidak sensitif.'),
(22, 'Apa yang dimaksud dengan variabel dalam PHP?', 'pilgan', 'Variabel adalah tempat untuk menyimpan nilai atau informasi yang dapat berubah.', 'Variabel adalah fungsi untuk menampilkan hasil perhitungan.', 'Variabel adalah bagian dari sintaks yang tidak diperlukan dalam PHP.', 'Variabel adalah tipe data khusus dalam PHP.', 'Variabel adalah operator yang digunakan dalam PHP.', 'Variabel adalah tempat untuk menyimpan nilai atau informasi yang dapat berubah.'),
(24, 'Apa yang dimaksud dengan tipe data string dalam PHP?', 'pilgan', 'Tipe data string adalah tipe data untuk menyimpan angka.', 'Tipe data string adalah tipe data untuk menyimpan teks atau karakter.', 'Tipe data string adalah tipe data untuk menyimpan array.', 'Tipe data string adalah tipe data untuk menyimpan tanggal.', 'Tipe data string adalah tipe data untuk menyimpan nilai yang hanya dapat bernilai benar atau salah.', 'Tipe data string adalah tipe data untuk menyimpan teks atau karakter.'),
(25, 'Apa fungsi dari operator concatenation (.) dalam PHP?', 'pilgan', 'Operator concatenation digunakan untuk menggabungkan dua buah string.', 'Operator concatenation digunakan untuk membagi dua buah string.', 'Operator concatenation digunakan untuk mengubah tipe data.', 'Operator concatenation digunakan untuk memeriksa kesamaan nilai dua buah string.', 'Operator concatenation digunakan untuk mengalikan dua buah string.', 'Operator concatenation digunakan untuk menggabungkan dua buah string.'),
(26, 'Apa yang dimaksud dengan \"foreach\" dalam PHP?', 'pilgan', 'Foreach adalah perulangan yang digunakan untuk mengakses setiap elemen dalam array atau objek.', 'Foreach adalah fungsi bawaan untuk menghapus elemen dari array.', 'Foreach adalah sintaks yang digunakan untuk mengambil data dari database.', 'Foreach adalah operator yang digunakan untuk membuat kondisi percabangan.', 'Foreach adalah metode untuk memfilter data pada halaman web.', 'Foreach adalah perulangan yang digunakan untuk mengakses setiap elemen dalam array atau objek.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `sekolah` varchar(100) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','siswa') NOT NULL,
  `status` enum('mulai','belum selesai','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `sekolah`, `jk`, `username`, `password`, `level`, `status`) VALUES
(1, 'Admin', '-', 'Laki-laki', 'admin', '$2y$10$QuRVmg5qZrfjdnooLDbZNu2wD00ChrHNtqT2IKREGfY94JhkI1lI2', 'admin', 'mulai'),
(7, 'Alfarel Pratama Ginting', 'SMK AKP GALANG', 'Laki-laki', '2024001', '$2y$10$vabDbyQztdTH.lHjBlyDDePjD6evFi3VSCaZO31F1uPNLOJ3oU7dq', 'siswa', 'mulai'),
(8, 'Afdal Ariga', 'SMK AKP GALANG', 'Laki-laki', '2024002', '$2y$10$tCTTCYtIa4oJ92DoI3U0M.z7GRbhvJzzimmgKNzMTZGcayq8H8Rxa', 'siswa', 'mulai'),
(9, 'Amelya Pratiwi', 'SMK AKP GALANG', 'Perempuan', '2024003', '$2y$10$g6OZwO7sr0zhACpB/EXWUeF5mfN9B2LFXQe3pti4MU36GWpOW5Yhm', 'siswa', 'mulai'),
(10, 'Audry Novellya Sinulingga', 'SMK AKP GALANG', 'Perempuan', '2024004', '$2y$10$QZc4h8bNOFScYskiemjwve0KYqX4iBEYLuTOsD2vk1NYoZVEOKeVu', 'siswa', 'mulai'),
(11, 'Chyalin Monica', 'SMK AKP GALANG', 'Perempuan', '2024005', '$2y$10$IfXv6IOhobIbvVEtqcV4LuNoYAqPp6Z3iLFNsN7JPjWmViUX2Zqr2', 'siswa', 'mulai'),
(12, 'Cindy Nursyah Fadila', 'SMK AKP GALANG', 'Perempuan', '2024006', '$2y$10$bwBsVt.m9fYxsG8RnkTke.nfaXWo2v7H/TwjQMBZ1lLxlHbUZ5MOG', 'siswa', 'mulai'),
(13, 'Daffa Azmi Ramadan', 'SMK AKP GALANG', 'Laki-laki', '2024007', '$2y$10$zm63h/Wu50wzFmaykgdAkeOx.TyEX0rUlHg5ee1/9ZJhZPojCDiie', 'siswa', 'mulai'),
(14, 'Dian Rido Pratama', 'SMK AKP GALANG', 'Laki-laki', '2024008', '$2y$10$tf72A.LEQT8YpkyVk7yLQO/PGifs1DUIgMFgfUumtpDa2uc5R8f.q', 'siswa', 'mulai'),
(15, 'Dwi Siska Hariani', 'SMK AKP GALANG', 'Perempuan', '2024009', '$2y$10$O6usnQA74cQLwUjObzEoFOQjuzo24YPflXeiPbt7uL1D4F1tAYwYW', 'siswa', 'mulai'),
(16, 'Dzaki Naufal Luthfi', 'SMK AKP GALANG', 'Laki-laki', '2024010', '$2y$10$bbE6tn0Wkgd.BUJklfa2y.cJZWabSWLeeU1nuyW5GA6DBY13o9W8C', 'siswa', 'mulai'),
(17, 'Eka Prianka', 'SMK AKP GALANG', 'Perempuan', '2024011', '$2y$10$0Q.dIrX7.cv6U4XkMya6TOquaWQNOS6c6PUiqSg0OwpYXQmH69Cuy', 'siswa', 'mulai'),
(18, 'Eriska Fitria', 'SMK AKP GALANG', 'Perempuan', '2024012', '$2y$10$KAOiA.1JTSOl3s.zX1VQxuXxckocjN7uj6q.6Ihd5FIp84L4VC6y2', 'siswa', 'mulai'),
(19, 'Kheyzia Istiqfara Asdi', 'SMK AKP GALANG', 'Perempuan', '2024013', '$2y$10$UwSdN79gbPol0Cr/YVbGi.9ZEKeXM6heyzE2dAxU5pFJWKmxJMbkK', 'siswa', 'mulai'),
(20, 'M Hafiz Naufal', 'SMK AKP GALANG', 'Laki-laki', '2024014', '$2y$10$u89s8rX4M0VwAmWdqW7Hf.KJmdrC6m5aJhgQD3aivDfBNgmZ91Nrq', 'siswa', 'mulai'),
(21, 'MHD Farel Ramadhan', 'SMK AKP GALANG', 'Laki-laki', '2024015', '$2y$10$yqGZDYJmQjHs2CPHGdndo.PTzuWNnyBkCzhasy9qmzdaGkQrbw2Eq', 'siswa', 'mulai'),
(22, 'Moza Raisha Arif Sembiring', 'SMK AKP GALANG', 'Perempuan', '2024016', '$2y$10$oQemTH9.SXJ5FX/luGdYj.15DCW9akUtJvptPK1utWkn4RrmJq0mm', 'siswa', 'mulai'),
(23, 'Nasma Nadia', 'SMK AKP GALANG', 'Perempuan', '2024017', '$2y$10$jPePXkuuKLL4nepzDYvgie4HxhAVCgR2RUbsxaaBpqOtQ3oqPltU.', 'siswa', 'mulai'),
(24, 'Nayla Safira', 'SMK AKP GALANG', 'Perempuan', '2024018', '$2y$10$Z4Q0UeUfVW0eV42LI111o.uQ4d5LDfhldlnou/ScfA0Yx.PFkqXRi', 'siswa', 'mulai'),
(25, 'Nazril Raditya Harahap', 'SMK AKP GALANG', 'Laki-laki', '2024019', '$2y$10$1Y0GQHj3Qg8SBhfjwIHqLu2.hQPvlrf4ybkYVi5NGovNfQANDyEl.', 'siswa', 'mulai'),
(26, 'Novita Tri Apsari', 'SMK AKP GALANG', 'Perempuan', '2024020', '$2y$10$cJnmQ/Eq4JQd3nTrpBfug.4LCvKyv7zESETSRYDv1UnTIZItL5i6e', 'siswa', 'mulai'),
(27, 'Panji Satria Zigo', 'SMK AKP GALANG', 'Laki-laki', '2024021', '$2y$10$dOgYgjmeOfyBiGI7oe7RheOqqgfwqWdi8Y1FLqhtsrUykRkTIHydy', 'siswa', 'mulai'),
(28, 'Sekar Pratiwi', 'SMK AKP GALANG', 'Perempuan', '2024022', '$2y$10$iLkTGNe3Rx8.T/8h/360BeSyaLbTXj80FjKj3ExQJui5heZnTGFB6', 'siswa', 'mulai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jawaban`
--
ALTER TABLE `tb_jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pertanyaan`
--
ALTER TABLE `tb_pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
