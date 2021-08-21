-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Aug 22, 2021 at 02:40 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metabolik`
--

-- --------------------------------------------------------

--
-- Table structure for table `basispengetahuan`
--

CREATE TABLE `basispengetahuan` (
  `id_rule` int(5) NOT NULL,
  `kode_rule` varchar(5) NOT NULL,
  `kode_penyakit` varchar(5) NOT NULL,
  `kode_gejala` varchar(5) NOT NULL,
  `mb` varchar(5) NOT NULL,
  `md` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `basispengetahuan`
--

INSERT INTO `basispengetahuan` (`id_rule`, `kode_rule`, `kode_penyakit`, `kode_gejala`, `mb`, `md`) VALUES
(212, 'R001', 'P001', 'G001', '0,6', '0,2'),
(213, 'R002', 'P001', 'G002', '1', '0,2'),
(214, 'R003', 'P001', 'G003', '1', '0'),
(215, 'R004', 'P001', 'G004', '0,8', '0,2'),
(216, 'R005', 'P002', 'G005', '0,6', '0,2'),
(217, 'R006', 'P002', 'G006', '0,8', '0,2'),
(218, 'R007', 'P002', 'G007', '0,6', '0,2'),
(219, 'R008', 'P002', 'G008', '0,8', '0'),
(220, 'R009', 'P002', 'G009', '1', '0'),
(221, 'R010', 'P002', 'G010', '0,8', '0,2'),
(222, 'R011', 'P003', 'G001', '1', '0'),
(223, 'R012', 'P003', 'G009', '0,6', '0,2'),
(224, 'R013', 'P003', 'G010', '0,8', '0'),
(225, 'R014', 'P003', 'G011', '1', '0'),
(226, 'R015', 'P004', 'G001', '0,6', '0,2'),
(227, 'R016', 'P004', 'G012', '0,8', '0'),
(228, 'R017', 'P004', 'G013', '1', '0,2'),
(229, 'R018', 'P004', 'G014', '1', '0'),
(230, 'R019', 'P005', 'G015', '0,8', '0,2'),
(231, 'R020', 'P005', 'G009', '0,6', '0,2'),
(232, 'R021', 'P005', 'G016', '1', '0,2'),
(233, 'R022', 'P005', 'G017', '0,8', '0'),
(234, 'R023', 'P005', 'G018', '0,8', '0'),
(235, 'R024', 'P005', 'G019', '0,8', '0,2');

-- --------------------------------------------------------

--
-- Table structure for table `bpangan`
--

CREATE TABLE `bpangan` (
  `id_bahan` int(5) NOT NULL,
  `kode_bahan` varchar(5) NOT NULL,
  `nama_bahan` text NOT NULL,
  `kalori` varchar(12) NOT NULL,
  `lemak` varchar(12) NOT NULL,
  `karbohidrat` varchar(12) NOT NULL,
  `protein` varchar(12) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bpangan`
--

INSERT INTO `bpangan` (`id_bahan`, `kode_bahan`, `nama_bahan`, `kalori`, `lemak`, `karbohidrat`, `protein`, `ket`) VALUES
(1, 'BP001', 'Nasi Putih', '129', '0,28 gr', '27,9 gr', '2,66 gr', '-  ASAM URAT : DISARANKAN (kandungan purin rendah)\r\n-  DIABETES : TIDAK DISARANKAN (IG sebesar 87 : IG tinggi)\r\n-  HIPERTENSI : DISARANKAN dengan syarat TIDAK DIKONSUMSI SECARA BERLEBIHAN\r\n-  KOLESTEROL : DISARANKAN dengan syarat TIDAK DIKONSUMSI SECARA BERLEBIHAN \r\n-  OBESITAS : TIDAK DISARANKAN\r\n\r\n==&gt;	Nasi putih termasuk dalam karbohidrat jenis refined grain. Mengonsumsi nasi putih dalam jumlah yang terlalu banyak dapat menyebabkan trigliserinda tinggi di dalam darah. Sehingga mengakibatkan risiko diabetes, hipertensi, kolesterol dan obesitas. Nasi putih mengandung kadar gula yang tinggi dibanding sumber karbohidrat lain, sehingga tidak disarankan untuk penderita Diabetes dan Obesitas\r\n'),
(3, 'BP002', 'Nasi Merah', '110', '0,89 gr', '22,78 gr', '2,56 gr', '-  ASAM URAT : DISARANKAN (tidak mengandung purin)\r\n\r\n-  DIABETES : DISARANKAN (IG sebesar 50 : IG rendah dan mengandung banyak serat)\r\n\r\n-  HIPERTENSI : DISARANKAN (nasi merah mengandung natrium rendah yang dapat mengendalikan tekanan darah)\r\n\r\n-  KOLESTEROL : DISARANKAN (nasi merah mengandung asam gamma aminobutyric yang dapat menjaga kadar kolesterol agar tetap normal. Selain itu kandungan serat yang tinggi dapat menurunkan kolesterol melalui penghambatan penyerapan karbohidrat, lemak dan protein. Nasi merah juga dapat menurunkan kolesterol dari mekanisme terhadap toleransi glukosa)\r\n\r\n-  OBESITAS : DISARANKAN (nasi merah baik dikonsumsi bagi penderita obesitas karena mengandung serat yang tinggi, yang dapat membuat tubuh merasa kenyang lebih lama dan memberi suplai energy secara bertahap sesuai kebutuhan, sehingga asupan kalori yang terpakai lebih efisien dan tidak menumpuk menjadi lemak)\r\n'),
(4, 'BP003', 'Ubi Jalar', '76', '0,14 gr', '17,72 gr', '1,37 gr', '-  ASAM URAT : DISARANKAN (kandungan purin rendah)\r\n\r\n-  DIABETES : DISARANKAN (IG sebesar 53 : IG rendah dan berfungsi untuk mengendalikan gula darah pada penderita diabetes)\r\n'),
(5, 'BP004', 'Terung', '24', '0,19 gr', '5,7 gr', '1,01 gr', '-  ASAM URAT : DISARANKAN (kandungan purin rendah dan mengandung alkalin yang dapat menetralisir asam urat dalam darah. Selain itu juga mengandung mineral berupa zat besi, magnesium dan mangan yang mampu mengendalikan kadar asam urat dalam persendian secara lebih baik)\r\n\r\n-  HIPERTENSI : DISARANKAN (mengandung kalium dan berbagai vitamin yang berperan dalam menurunkan tekanan darah)\r\n\r\n-  OBESITAS : DISARANKAN (mengandung sedikit lemak dan kolesterol namun memiliki kandungan air yang tinggi yang dapat menurunkan berat badan dan melawan obesitas)\r\n'),
(6, 'BP005', 'Wortel', '41', '0,24 gr', '9,58 gr', '0,93 gr', '-  ASAM URAT : DISARANKAN (kandungan purin rendah, serta kaya akan antioksidan dan serat yang membantu mengeluarkan asam urat dari dalam tubuh dan dapat menurunkan asam urat tinggi)\r\n\r\n-  DIABETES : DISARANKAN (IG sebesar 47 : IG rendah)\r\n\r\n-  KOLESTEROL : DISARANKAN (mengandung serat selulosa, hemiselulosa dan lingin, yang dapat memperbaiki penyerapan kolesterol dari saluran cerna. Sehingga kadar kolesterol jahat dalam darah bisa diturunkan)\r\n\r\n-  OBESITAS : DISARANKAN (tinggi akan kandungan serat dan air yang berguna dalam mengurangi resiko yang berhubungan dengan kelebihan berat badan dan obesitas. )\r\n'),
(7, 'BP006', 'Mentimun', '15', '0,11 gr', '3,63 gr', '0,65', '                                  -  ASAM URAT : DISARANKAN (Kandungan purin rendah : 7,3mg purin/100gr mentimun. Kandungan yang terdapat dalam mentimun dapat mencegah sekaligus membantu mengatasi peradangan pada asam urat secara efektif. )\r\n\r\n-  DIABETES : DISARANKAN (kandungan air yang tinggi pada mentimun mampu mengurangi hasrat untuk memakan cemilan. Hal ini merupakan cara terbaik untuk mengatur kadar insulin sehingga membantu menjaga berat badan)\r\n\r\n-  HIPERTENSI : DISARANKAN (mengandung elektrolit potassium tinggi yang mampu mengurangi retensi air yang diinduksi natrium sehingga menurunkan tekanan darah )\r\n\r\n-  OBESITAS : DISARANKAN (mentimun kaya akan air, bagus dikonsumsi oleh penderita obesitas yang merencanakan diet. Namun hanya dengan mengonsumsi mentimun tidak akan membantu menurunkan berat badan, tetapi mentimun bermanfaat untuk mempertahankan diet seimbang yang mengandung semua makronutrien termasuk karbohidrat, lemak dan protein)\r\n \r\n                                '),
(8, 'BP007', 'Selada', '14', '0,14 gr', '2,97 gr', '0,9 gr', '-  ASAM URAT : DISARANKAN (kandungan purin rendah)\r\n\r\n-  HIPERTENSI : DISARANKAN (selada kaya akan kalium yang secara efektif menurunkan tekanan darah tinggi apabila dikonsumsi secara rutin)\r\n\r\n-  OBESITAS : DISARANKAN (daun selada mengandung serat yang cukup tinggi. Serat membantu mengeluarkan garam empedu dari tubuh sehingga dapat mendetoks rancun dan sisa makanan sehingga dapat melancarkan pencernaan dan mencegah obesitas)\r\n'),
(9, 'BP008', 'Susu (Tanpa Lemak)', '35', '0,18 gr', '4,85 gr', '3,41 gr', '-  ASAM URAT : DISARANKAN (kandungan purin rendah. Kandungannya sangat bermanfaat bagi kesehatan tulang, otot dan sendi)\r\n\r\n-  DIABETES : DISARANKAN (IG sebesar 32 : IG rendah)\r\n\r\n-  HIPERTENSI : DISARANKAN (kandungan kalium yang tinggi dalam produk olahan susu bisa membantu menurunkan tekanan darah dengan merelaksasi otot polos dan pelebaran pembuluh darah. Hanya saja susu yang dapat dikonsumsi oleh penderita hipertensi adalah susu yang mengandung rendah lemak atau bahkan tanpa lemak)\r\n\r\n-  KOLESTEROL : DISARANKAN (kandungan kolesterol pada susu tanpa lemak sebesar 0mg kolesterol/100gr susu tanpa lemak. Susu tanpa lemak termasuk dalam kategori sehat, yang artinya dapat dikonsumsi setiap hari)\r\n\r\n-  OBESITAS : DISARANKAN (penderita obesitas dianjurkan untuk melakukan diet rendah energi seimbang, dengan mengonsumsi sumber protein rendah lemak yang salah satunya adalah susu tanpa telur\r\n'),
(10, 'BP009', 'Lentil', '353', '1,06 gr', '60,08 gr', '25,8 gr', '-  ASAM URAT : DISARANKAN (kandungan purin rendah : 74,8mg purin/100 gr lentils)\r\n\r\n-  DIABETES : DISARANKAN (IG sebesar 30 : IG rendah)\r\n\r\n-  KOLESTEROL : DISARANKAN (kaya akan kandungan serat, asam folat dan kalium. Pemenuhan asupan serat dapat menurunkan kadar kolesterol jahat atau LDL) \r\n'),
(11, 'BP010', 'Kacang kedelai (dan produk olahannya)', '471', '25,4 gr', '33,55 gr', '35,22 gr', '-  ASAM URAT : DISARANKAN (kandungan purin rendah : 37,2mg purin/100 gr kacang kedelai)\r\n\r\n-  DIABETES : DISARANKAN (IG sebesar 15 : IG rendah)\r\n\r\n-  KOLESTEROL : DISARANKAN (kacang kedelai mampu meningkatkan kolesterol baik &lt;HDL&gt; dan menyingkirkan kolesterol jahat &lt;LDL&gt;. Sehingga kadar kolesterol LDL akan mengalami penurunan secara signifikan)\r\n\r\n-  OBESITAS : DISARANKAN (kacang kedelai mengandung protein yang tinggi. Protein kedelai dapat bekerja dengan serat dan isoflavon yang memberikan manfaat tambahan bagi metabolisme lemak dan penurunan berat badan.)\r\n'),
(12, 'BP011', 'Kacang almond', '578', '50,64 gr', '19,74 gr', '21,26 gr', '-  ASAM URAT : DISARANKAN (kandungan purin rendah : 10mg purin/100gr kacang almond)\r\n\r\n-  DIABETES : DISARANKAN (rendah karbohidrat dan tidak banyak meningkatkan kadar gula darah). \r\n\r\n-  KOLESTEROL : DISARANKAN (bermanfaat dalam meningkatkan kolesterol HDL yang bersifat baik sekaligus mengurangi kolesterol LDL dalam tubuh)\r\n\r\n-  OBESITAS : DISARANKAN (kacang almond dapat menurunkan kadar trigliserida pada orang yang menderita obesitas)\r\n'),
(13, 'BP012', 'Pisang', '89', '0,33 gr', '22,84 gr', '1,09 gr', '-  ASAM URAT : DISARANKAN (kandungan purin rendah dan kaya akan vit c. Vit c dapat menurunkan risiko asam urat dan mengurangi efek asam urat di dalam tubuh)\r\n\r\n-  DIABETES : DISARANKAN dengan syarat TIDAK DIKONSUMSI SECARA BERLEBIHAN (IG sebesar 56 : IG sedang)\r\n\r\n-  HIPERTENSI : DISARANKAN (mengandung kalium yang membantu menyeimbangkan jumlah garam di dalam tubuh, sehingga mampu mengontrol tekanan darah)\r\n'),
(14, 'BP013', 'Apel', '52', '0,17 gr', '13,81 gr', '0,26 gr', '-  ASAM URAT : DISARANKAN\r\n\r\n-  KOLESTEROL : DISARANKAN (kandungan kolesterol pada apel sebesar 0mg kolesterol/100gr apel. Apel termasuk dalam kategori sehat, yang artinya dapat dikonsumsi setiap hari. Apel menjadi buah terbaik untuk menurunkan kolesterol, karena mengandung pektin &lt;terutama bagian kulit&gt; yang mengandung serat larut yang dapat menurunkan kolesterol dalam tubuh)\r\n'),
(15, 'BP014', 'Kentang', '77', '0,09 gr', '17,47 gr', '2,02 gr', '-  ASAM URAT : DISARANKAN (kandungan purin rendah dan kaya akan vit c yang dapat mengurangi asam urat dalam tubuh)\r\n\r\n-  DIABETES : TIDAK DISARANKAN (mengandung IG tinggi, yang membuat karbohidrat dipecah menjadi gula dengan cepat, sehingga kadar gula darah naik)\r\n\r\n-  KOLESTEROL : DISARANKAN (memiliki kandungan serat yang cukup signifikan sehingga baik untuk pencernaan sekaligus dapat menurunkan kadar kolesterol dalam darah)\r\n\r\n-  HIPERTENSI : DISARANKAN (mengandung tinggi kalium dan magnesium serta serat, yang mampu menurunkan tekanan darah)\r\n\r\n-  OBESITAS : TIDAK DISARANKAN  (mengandung karbohidrat yang kemudian dipecah menjadi gula, sehingga beresiko dalam meningkatkan penyimpanan lemak atau kegemukan atau obesitas)\r\n'),
(16, 'BP015', 'Brokoli', '77', '0,09 gr', '17,47 gr', '2,02 gr', '-  ASAM URAT : TIDAK DISARANKAN (karena termasuk sayuran dengan kandungan purin sedang : 51:81mg purin/100gr)\r\n\r\n-  DIABETES : DISARANKAN (IG sebesar 15 : IG rendah)\r\n\r\n-  HIPERTENSI : DISARANKAN (brokoli termasuk sayuran yang dapat menurunkan darah tinggi karena mengandung banyak kalsium, kalium, magnesium dan vit c yang menjadi penurun darah tanggi)\r\n\r\n-  KOLESTEROL : DISARANKAN (brokoli mengandung serat yang cukup banyak yang dapat melarutkan kolesterol untuk keluar dari tubuh)\r\n'),
(17, 'BP016', 'Bayam', '23', '0,39 gr', '3,63 gr', '2,86 gr', '-  ASAM URAT : TIDAK DISARANKAN (karena termasuk sayuran dengan kandungan purin sedang : 51:81mg purin/100gr)\r\n\r\n-  DIABETES : DISARANKAN (IG sebesar 15 : IG rendah)\r\n\r\n-  HIPERTENSI : DISARANKAN (Bayam mengandung senyawa nitrat, kalium, kalsium dan magnesium, dengan mengonsumsi bayam secara rutin maka tekanan darah akan lebih terkontrol dan meningkatkan kesehatan jantung)\r\n\r\n-  KOLESTEROL : DISARANKAN (bayam mengandung lutein, karotenoid dan serat yang tinggi, yang mampu menurunkan kolesterol dan menurunkan resiko penyakit jantung)\r\n\r\n-  OBESITAS : DISARANKAN (Bayam mengandung vitamin dan mineral penting, seperti vit A, C,K1, asam folat, besi dan kalsium. Selain itu juga mengandung senyawa lutein kaempferol, nitrat, quercetin dan zeaxantin. Apabila dikonsumsi secara rutin dan teratur dalam porsi yang tepat dapat mencegah obesitas)\r\n'),
(18, 'BP017', 'Ikan Sarden', '208', '11,45 gr', '0 gr', '24,62 gr', '-  ASAM URAT : TIDAK DISARANKAN (kandungan purin tinggi : 399mg purin/100gr ikan sarden)\r\n\r\n-  HIPERTENSI : TIDAK DISARANKAN (produk daging olahan yang dikemas dalam kalengan umumnya memiliki kandungan garam yang berlebih sebagai bahan pengawetnya. Tingginya kandungan garam dapat meningkatkan tekanan darah dan menimbulkan darah tinggi)\r\n\r\n-  OBESITAS : TIDAK DISARANKAN (Ikan sarden termasuk makanan olahan yang menjadi penyebab utama obesitas. Makanan olahan mengandung kalori padat dengan kandungan air yang sedikit, sehingga cenderung membuat seseorang makan dalam porsi yang lebih banyak)\r\n'),
(19, 'BP018', 'Sosis', '172', '9,98 gr', '1,52 gr', '17,82 gr', '-  ASAM URAT : TIDAK DISARANKAN (karena termasuk produk olahan daging dengan kandungan purin tinggi )\r\n\r\n-  HIPERTENSI : TIDAK DISARANKAN (kornet termasuk produk olahan daging yang mengandung sodium &lt;garam&gt; cukup tinggi &lt;sekitar 360 mg sodium&gt; kandungan garam yang berlebih digunakan sebagai bahan pengawet. Tingginya kandungan garam dapat meningkatkan tekanan darah dan menimbulkan darah tinggi)\r\n\r\n-  KOLESTEROL : TIDAK DISARANKAN (kandungan kolesterol pada sosis sebesar 150mg kolesterol/100gr sosis. Sosis termasuk dalam kategori hati:hati, yang artinya makanan tersebut berbahaya untuk penderita kolesterol dan hanya boleh dikonsumsi satu atau dua kali salam satu bulan\r\n\r\n-  OBESITAS : TIDAK DISARANKAN (sosis termasuk daging olahan yang mengandung lemak trans tinggi. Lemak trans tinggi sangat berbahaya bagi tubuh. )\r\n'),
(20, 'BP019', 'Kornet', '251', '18,98 gr', '0,47 gr', '18,17 gr', '-  ASAM URAT : TIDAK DISARANKAN (karena termasuk produk olahan daging dengan kandungan purin tinggi )\r\n\r\n-  HIPERTENSI : TIDAK DISARANKAN (kornet termasuk produk olahan daging yang mengandung sodium &lt;garam&gt; cukup tinggi &lt;sekitar 360 mg sodium&gt; kandungan garam yang berlebih digunakan sebagai bahan pengawet. Tingginya kandungan garam dapat meningkatkan tekanan darah dan menimbulkan darah tinggi)\r\n\r\n-  KOLESTEROL : TIDAK DISARANKAN (kandungan kolesterol pada kornet sebesar 150mg kolesterol/100gr kornet. Kornet termasuk dalam kategori hati:hati, yang artinya makanan tersebut berbahaya untuk penderita kolesterol dan hanya boleh dikonsumsi satu atau dua kali salam satu bulan\r\n\r\n-  OBESITAS : TIDAK DISARANKAN (kornet termasuk daging olahan yang mengandung lemak trans tinggi. Lemak trans tinggi sangat berbahaya bagi tubuh. )\r\n'),
(21, 'BP020', 'Ikan Tuna', '108', '0,95 gr', '0 gr', '23,38 gr', '-  ASAM URAT : TIDAK DISARANKAN (kandungan purin tinggi : 142mg purin/100gr ikan tuna)\r\n\r\n-  HIPERTENSI : DISARANKAN (mengandung asam lemak omega 3 yang dapat menurunkan tekanan darah)\r\n\r\n-  KOLESTEROL : DISARANKAN dengan syarat TIDAK DIKONSUMSI SECARA BERLEBIHAN (kandungan kolesterol pada ikan tuna sebesar 60mg kolesterol/100gr ikan tuna. Ikan tuna memiliki kandungan asam lemak omega:3 yang tinggi yang dapat menurunkan kadar trigliserida dan mengontrol kolesterol jahat dalam darah. Tetapi ikan tuna juga bisa menjadi penyebab kolesterol tinggi, karena tuna mengandung merkuri yang tinggi)\r\n'),
(22, 'BP021', 'Ikan Salmon', '146', '5,93 gr', '0 gr', '21,62 gr', '-  ASAM URAT : TIDAK DISARANKAN (kandungan purin tinggi : 260mg purin/100gr ikan salmon)\r\n\r\n-  HIPERTENSI : DISARANKAN (mengandung asam lemak omega 3 yang dapat menurunkan tekanan darah)\r\n\r\n-  KOLESTEROL : DISARANKAN dengan syarat TIDAK DIKONSUMSI SECARA BERLEBIHAN (kandungan kolesterol pada ikan salmon sebesar 55mg kolesterol/100gr salmon. Ikan salmon mengandung vit B12, asam lemak omega:3 yang mampu menurunkan kadar kolesterol jahat atau LDL. Tetapi ikan salmon juga mengandung zat logam merkuri dan polychlorinated biphenyls atau PCBs yang dapat memicu kanker)\r\n'),
(23, 'BP022', 'Jeroan (hati ayam)', '116', '4,83 gr', '0 gr', '16,92 gr', '-  ASAM URAT : TIDAK DISARANKAN (kandungan purin tinggi : 443mg purin/100gr hati ayam)\r\n\r\n-  KOLESTEROL : TIDAK DISARANKAN (kandungan kolesterol pada jeroan (hati ayam) sebesar 350mg kolesterol/100gr hati ayam. Hati ayam termasuk dalam kategori berbahaya, yang artinya makanan tersebut berbahaya untuk penderita kolesterol dan hanya boleh dikonsumsi satu atau dua kali salam satu bulan\r\n\r\n-  OBESITAS : TIDAK DISARANKAN  (jeroan termasuk dalam sumber lemak yang harus dihindari bagi penderita obesitas)\r\n'),
(24, 'BP023', 'Udang', '144', '2,35 gr', '1,24 gr', '27,59 gr', '-  ASAM URAT : TIDAK DISARANKAN (kandungan purin tinggi : 147mg purin/100gr udang)\r\n\r\n-  KOLESTEROL : TIDAK DISARANKAN (kandungan kolesterol pada udang sebesar 160mg kolesterol/100gr udang. Udang termasuk dalam kategori hati:hati, yang artinya makanan tersebut berbahaya untuk penderita kolesterol dan hanya boleh dikonsumsi satu atau dua kali salam satu bulan\r\n\r\n-  OBESITAS : TIDAK DISARANKAN  (margarin termasuk dalam sumber lemak yang harus dihindari bagi penderita obesitas)\r\n'),
(25, 'BP024', 'Kerang', '217', '10,96 gr', '10,49 gr', '18,14 gr', '-  ASAM URAT : TIDAK DISARANKAN (kandungan purin tinggi : 136mg purin/100gr kerang)\r\n\r\n-  KOLESTEROL : TIDAK DISARANKAN (kandungan kolesterol pada kerang sebesar 189mg kolesterol/100gr kerang. Kerang termasuk dalam kategori hati:hati, yang artinya makanan tersebut berbahaya untuk penderita kolesterol dan hanya boleh dikonsumsi satu atau dua kali salam satu bulan\r\n\r\n-  OBESITAS : TIDAK DISARANKAN  (margarin termasuk dalam sumber lemak yang harus dihindari bagi penderita obesitas)\r\n'),
(26, 'BP025', 'Cumi-cumi', '92', '1,38 gr', '3,08 gr', '15,58 gr', '-  ASAM URAT : TIDAK DISARANKAN (kandungan purin tinggi : 135mg purin/100gr cumi:cumi)\r\n\r\n-  KOLESTEROL : TIDAK DISARANKAN (kandungan kolesterol pada cumi:cumi sebesar 1170mg kolesterol/100gr cumi:cumi. Cumi:cumi termasuk dalam kategori hindari, yang artinya makanan tersebut harus dihindari oleh penderita kolesterol. Cumi:cumi termasuk dalam makanan seafood dengan jumlah kolesterol paling tinggi.)\r\n'),
(27, 'BP026', 'Daging Bebek', '132', '5,95 gr', '0 gr', '18,28 gr', '-  ASAM URAT : TIDAK DISARANKAN (kandungan purin tinggi)\r\n\r\n-  OBESITAS : TIDAK DISARANKAN  (daging bebek termasuk dalam sumber lemak yang harus dihindari bagi penderita obesitas)\r\n'),
(28, 'BP027', 'Daging Angsa', '161', '7,13 gr', '0 gr', '22,75 gr', '-  ASAM URAT : TIDAK DISARANKAN (kandungan purin tinggi)\r\n\r\n-  OBESITAS : TIDAK DISARANKAN  (margarin termasuk dalam sumber lemak yang harus dihindari bagi penderita obesitas. Daging angsa sangat berlemak sehingga dapat meningkatkan berat badan dan memperburuk gejala obesitas)\r\n'),
(29, 'BP028', 'Yoghurt', '63', '1,55 gr', '7,04 gr', '5,25 gr', '-  DIABETES : DISARANKAN (IG sebesar 15 : IG rendah, menurut penelitian yoghurt dapat membantu mengontrol kadar glukosa darah)\r\n\r\n-  HIPERTENSI : DISARANKAN (kandungan kalium yang tinggi dalam produk olahan susu seperti yoghurt bias membantu menurunkan tekanan darah dengan merelaksasi otot polos dan pelebaran pembuluh darah)\r\n'),
(30, 'BP029', 'Oatmeal', '70', '2 gr', '12 gr', '2 gr', '-  DIABETES : DISARANKAN (IG sebesar 48 : IG rendah)\r\n\r\n-  HIPERTENSI : DISARANKAN (mengandung tinggi serat, rendah garam dan lemak. Selain itu, oatmeal juga mengandung beta:glucan yang mampu menurunkan tekanan darah.)\r\n\r\n-  KOLESTEROL : DISARANKAN (mengandung serat larut yang dapat memicu produksi asam empedu sehingga membantu  dalam menurunkan kolesterol)\r\n'),
(31, 'BP030', 'Tomat', '18', '0,2 gr', '3,92 gr', '0,88 gr', '-  DIABETES : DISARANKAN (IG sebesar 15 : IG rendah)\r\n\r\n-  KOLESTEROL : DISARANKAN (kandungan kolesterol pada tomat sebesar 0mg kolesterol/100gr tomat. Tomat termasuk dalam kategori sehat, yang artinya dapat dikonsumsi setiap hari. Tomat mengandung likopen, antioksidan yang membantu mengurangi jumlah kolesterol jahat &lt;LDL&gt; serta meningkatkan jumlah kolesterol baik &lt;HDL&gt;)\r\n'),
(32, 'BP031', 'Kacang Polong', '42', '0,2 gr', '7,55 gr', '2,8 gr', '-  DIABETES : DISARANKAN (IG sebesar 48 : IG rendah)'),
(33, 'BP032', 'Jagung', '86', '1,18 gr', '19,02 gr', '3,22 gr', '-  DIABETES : DISARANKAN dengan syarat TIDAK DIKONSUMSI SECARA BERLEBIHAN (IG sebesar 65 : IG sedang)'),
(34, 'BP033', 'Madu', '304', '0 gr', '82,4 gr', '0,3 gr', '-  DIABETES : DISARANKAN dengan syarat TIDAK DIKONSUMSI SECARA BERLEBIHAN (IG sebesar 61 : IG sedang)'),
(35, 'BP034', 'Pepaya', '39', '0,14 gr', '9,81 gr', '0,61 gr', '-  DIABETES : DISARANKAN dengan syarat TIDAK DIKONSUMSI SECARA BERLEBIHAN (IG sebesar 59 : IG sedang)'),
(36, 'BP0', 'Lobak', '28', '0,1 gr', '6,43 gr', '0,9 gr', '-  DIABETES : TIDAK DISARANKAN (IG sebesar 97 : IG tinggi)\r\nHIPERTENSI : DISARANKAN (lobak mengandung potassium yang bermanfaat untuk menurunkan serta mengontrol tekanan darah)\r\n'),
(37, 'BP036', 'Semangka', '30', '0,15 gr', '7,55 gr', '0,61 gr', '-  DIABETES : TIDAK DISARANKAN (IG sebesar 72 : IG tinggi)\r\n\r\n-  OBESITAS : DISARANKAN (semangka mengandung kalori yang bermanfaat sebagai sumber energy pada tubuh, selain itu juga semangka mengandung air yang sangat dibutuhkan untuk kelangsungan proses metabolisme tubuh yang secara langsung metabolisme tubuh dapat mempengaruhi berat badan\r\n'),
(38, 'BP037', 'Gandum Hitam', '259', '3,3 gr', '48,3 gr', '8,5 gr', '-  DIABETES : TIDAK DISARANKAN (IG sebesar 76 : IG tinggi)'),
(39, 'BP038', 'Labu', '26', '0,1 gr', '6,5 gr', '1 gr', '-  DIABETES : TIDAK DISARANKAN (IG sebesar 75 : IG tinggi)'),
(40, 'BP039', 'Roti Tawar Putih', '266', '3,29 gr', '50,61 gr', '7,64 gr', '-  DIABETES : TIDAK DISARANKAN (IG sebesar 70 : IG tinggi)\r\n\r\n-  KOLESTEROL : DISARANKAN dengan syarat TIDAK DIKONSUMSI SECARA BERLEBIHAN\r\n\r\n==&gt; Mengonsumsi karbohidrat jenis refined grain dalam jumlah yang terlalu banyak dapat menyebabkan trigliserinda tinggi di dalam darah. Sehingga mengakibatkan risiko diabetes, hipertensi, kolesterol dan obesitas. Nasi putih mengandung kadar gula yang tinggi dibanding sumber karbohidrat lain, sehingga tidak disarankan untuk penderita Diabetes dan Obesitas\r\n'),
(41, 'BP040', 'Roti Gandum', '259', '4,11 gr', '47,14 gr', '9,13 gr', '-  DIABETES : TIDAK DISARANKAN (IG sebesar 77 : IG tinggi)\r\n\r\n-  HIPERTENSI : DISARANKAN (konsumsi gandum secara teratur dapat meningkatkan kesehatan jantung dan menurunkan risiko tekanan darah tinggi)\r\n\r\n-  KOLESTEROL : DISARANKAN (roti gandum utuh sangat baik karena mengandung sejumlah serat dan protein yang bermanfaat untuk menjaga kolesterol )\r\n\r\n-  OBESITAS : DISARANKAN (Roti gandum memiliki protein dan serat yang tinggi. Serat pada roti gandum secara perlahan diserap ke dalam aliran darah dan dapat menekan nafsu makan)\r\n'),
(42, 'BP041', 'Pasta', '123', '0,54 gr', '26,38 gr', '5,3 gr', '-  HIPERTENSI : DISARANKAN (pasta yang berbahan dasar gandum dapat meningkatkan kesehatan jantung dan menurunkan risiko tekanan darah tinggi)'),
(43, 'BP042', 'Ayam tanpa Kulit', '188', '7,35 gr', '0 gr', '28,69 gr', '-  HIPERTENSI : DISARANKAN dengan syarat TIDAK DIKONSUMSI SECARA BERLEBIHAN (daging ayam mengandung protein,karbohidrat dan berbagai vitamin. Disamping itu daging ayam mengandung lemak jenuh dan kolesterol yang lebih sedikit dibandingkan dengan asupan daging lainnya. Sehingga untuk penderita hipertensi dalam mengkonsumsi daging ayam harus menyingkirkan bagian yang mengandung banyak lemak yaitu bagian kulit ayam. Dengan mengkonsumsi daging tanpa lemak, tubuh akan tidak akan kemasukan kolesterol dalam jumlah berlebih yang dapat menyebabkan melonjaknya tekanan darah)\r\n\r\n-  KOLESTEROL : DISARANKAN (kandungan kolesterol pada ayam tanpa kulit sebesar 50mg kolesterol/100gr ayam tanpa kulit. Daging ayam tanpa kulit termasuk dalam kategori sehat, yang artinya dapat dikonsumsi setiap hari)\r\n\r\n-  OBESITAS : DISARANKAN (penderita obesitas dianjurkan untuk melakukan diet rendah energi seimbang, dengan mengonsumsi sumber protein rendah lemak yang salah satunya adalah ayam tanpa kulit)\r\n'),
(44, 'BP043', 'Margarin', '526', '59,17 gr', '0 gr', '0,6 gr', '-  HIPERTENSI : TIDAK DISARANKAN (margarin termasuk lemak nabati yang mengandung banyak sodium atau garam dan lemak yang sangat berbahaya bagi kesehatan. Karena dapat meningkatkan tingkat kolesterol LDL dalam tubuh dan mencegah aliran darah normal sehingga bias memicu hipertensi)\r\n\r\n-  KOLESTEROL : TIDAK DISARANKAN (kandungan kolesterol pada margarin sebesar 300mg kolesterol/100gr margarin. Margarin termasuk dalam kategori berbahaya, yang artinya makanan tersebut berbahaya untuk penderita kolesterol dan hanya boleh dikonsumsi satu atau dua kali salam satu bulan\r\n\r\n-  OBESITAS : TIDAK DISARANKAN  (margarin termasuk dalam sumber lemak yang harus dihindari bagi penderita obesitas)\r\n'),
(45, 'BP044', 'Mentega', '717', '81,11 gr', '0,06 gr', '0,85 gr', '-  HIPERTENSI : TIDAK DISARANKAN (mentega mengandung lemak jenuh dan lemak trans yang cukup tinggi yang dapat memicu tekanan darah tinggi)\r\n\r\n-  KOLESTEROL : TIDAK DISARANKAN (kandungan kolesterol pada mentega sebesar 300mg kolesterol/100gr mentega. Mentega termasuk dalam kategori berbahaya, yang artinya makanan tersebut berbahaya untuk penderita kolesterol dan hanya boleh dikonsumsi satu atau dua kali salam satu bulan\r\n\r\n-  OBESITAS : TIDAK DISARANKAN  (mentega termasuk dalam sumber lemak yang harus dihindari bagi penderita obesitas)\r\n'),
(46, 'BP045', 'Kecap', '301', '0,01 gr', '76,43 gr', '1,28 gr', '-  HIPERTENSI : TIDAK DISARANKAN (kecap mengandung tinggi gula dan tinggi garam. Mengonsumsi garam yang terlalu tinggi dapat meningkatkan tekanan darah, apabila hal tersebut terjadi secara berkelanjutan berpotensi menyebabkan terjadinya penyakit jantung)'),
(47, 'BP046', 'Daging Asap', '146', '5,82 gr', '0 gr', '21,8 gr', '-  HIPERTENSI : TIDAK DISARANKAN (pengolahan makanan dengan cara pengasapan dapat mengubah kandungan gizi. Pada umumnya pada proses pengasapan terdapat penambahan garam dalam jumlah besar yang dapat memicu tekanan darah tinggi)\r\n\r\n-  KOLESTEROL : DISARANKAN dengan syarat TIDAK DIKONSUMSI SECARA BERLEBIHAN (kandungan kolesterol pada daging asap sebesar 98mg kolesterol/100gr daging asap. Daging asap termasuk dalam kategori sekali:kali, yang artinya hanya boleh dikonsumsi satu atau dua kali dalam seminggu)\r\n'),
(48, 'BP047', 'Abon', '440', '17 gr', '60 gr', '14 gr', '-  HIPERTENSI : TIDAK DISARANKAN (abon termasuk makanan yang diawetkan. Makanan yang diawetkan dapat meingkatkan tekanan darah)'),
(49, 'BP048', 'Ikan Asin', '195', '1,59 gr', '0 gr', '42,16 gr', '-  HIPERTENSI : TIDAK DISARANKAN (ikan asin memiliki kandungan garam yang tinggi, yang dimaksudkan untuk mengawetkan ikan asin agar tahan lama. Makanan dengan kadar garam tinggi dapat memicu penyakit berbahaya seperti stroke dan hipertensi)'),
(50, 'BP049', 'Telur Asin', '183', '13,63 gr', '1,44 gr', '12,68 gr', '-  HIPERTENSI : TIDAK DISARANKAN (meskipun telur asin kaya akan beragam nutrisi, tetapi ikan asin juga mengandung natrium &lt;garam&gt; yang sangat tinggi. Kandungan natrium didalamnya mencapai 529mg natrium/100gr telur asin. Padahal batasan natrium yang dapat dikonsumsi untuk penderita hipertensi adalah 200:400mg natrium/100gr telur asin)'),
(51, 'BP050', 'Ubur-ubur', '36', '1,4 gr', '0 gr', '5,5 gr', '-  HIPERTENSI : DISARANKAN (mengandung zat asetikolin yang dapat membantu menurunkan tekanan darah tinggi)\r\n\r\n-  KOLESTEROL : DISARANKAN (kandungan kolesterol pada ubur:ubur sebesar 0mg kolesterol/100gr ubur:ubur. Ubur:ubur termasuk dalam kategori sehat, yang artinya dapat dikonsumsi setiap hari. Selain itu, ubur:ubur mengandung zat asetikolin yang membantu mencegah penyempitan pembuluh darah dan mengurangi kadar kolesterol tinggi)\r\n'),
(52, 'BP051', 'Putih Telur', '52', '0,17 gr', '0,73 gr', '10,9 gr', '-  KOLESTEROL : DISARANKAN (kandungan kolesterol pada putih telur sebesar 0mg kolesterol/100gr putih telur. Putih telur termasuk dalam kategori sehat, yang artinya dapat dikonsumsi setiap hari)\r\n\r\n-  OBESITAS : DISARANKAN (penderita obesitas dianjurkan untuk melakukan diet rendah energi seimbang, dengan mengonsumsi sumber protein rendah lemak yang salah satunya adalah putih telur)\r\n'),
(53, 'BP052', 'Kubis', '24', '0,12 gr', '5,58 gr', '1,44 gr', '-  KOLESTEROL : DISARANKAN (kandungan kolesterol pada kubis sebesar 0mg kolesterol/100gr kubis. Kubis termasuk dalam kategori sehat, yang artinya dapat dikonsumsi setiap hari. Selain itu, kubis mengandung vit A, vit B, vit C, kalium, klor, iodium, fisfor, sodium, flovanoid dan sulphur yang bermanfaat untuk menurunkan kolesterol)'),
(54, 'BP053', 'Alpukat', '160', '14,66 gr', '8,53 gr', '2 gr', '-  DIABETES : DISARANKAN (alpukat mengandung lemak tak jenuh yang apabila dikonsumsi secara rutin dapat mencegah Diabetes)\r\n\r\n-  KOLESTEROL  : DISARANKAN (kandungan kolesterol pada alpukat sebesar 0mg kolesterol/100gr alpukat. Alpukat termasuk dalam kategori sehat, yang artinya dapat dikonsumsi setiap hari. Alpukat mengandung lemak tak jenuh yang dapat mengurangi kadar kolesterol jahat atau LDL dalam darah)\r\n'),
(55, 'BP054', 'Telur Ikan', '204', '8,23 gr', '1,92 gr', '28,62 gr', '-  KOLESTEROL : TIDAK DISARANKAN (kandungan kolesterol pada telur ikan sebesar 479mg kolesterol/100gr telur ikan. Telur ikan termasuk dalam kategori berbahaya, yang artinya makanan tersebut berbahaya untuk penderita kolesterol dan hanya boleh dikonsumsi satu atau dua kali salam satu bulan'),
(56, 'BP055', 'Kuning Telur', '322', '26,54 gr', '3,59 gr', '15,86 gr', '-  KOLESTEROL : TIDAK DISARANKAN (kandungan kolesterol pada kuning telur sebesar 2000mg kolesterol/100gr kuning telur. Kuning telur termasuk dalam kategori hindari, yang artinya makanan tersebut harus dihindari oleh penderita kolesterol)\r\n\r\n-  OBESITAS : TIDAK DISARANKAN  (kuning telur termasuk dalam sumber lemak yang harus dihindari bagi penderita obesitas)\r\n'),
(57, 'BP056', 'Telur Burung Puyuh', '158', '11,09 gr', '0,41 gr', '13,05 gr', '-  KOLESTEROL : TIDAK DISARANKAN (kandungan kolesterol pada kuning telur sebesar 2000mg kolesterol/100gr kuning telur. Kuning telur termasuk dalam kategori hindari, yang artinya makanan tersebut harus dihindari oleh penderita kolesterol)');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(5) NOT NULL,
  `kode_gejala` varchar(5) NOT NULL,
  `nama_gejala` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `kode_gejala`, `nama_gejala`) VALUES
(38, 'G001', 'Mengalami sakit kepala atau pusing'),
(39, 'G002', 'Bengkak pada persendian hingga menimbulkan warna kemerahan'),
(40, 'G003', 'Persendian terasa sakit sekali saat akan digerakan'),
(41, 'G004', 'Nyeri pada sendi saat bangun tidur dan pada saat malam hari'),
(42, 'G005', 'Sering buang air kecil (Polyuria)'),
(43, 'G006', 'Sering merasa haus (Polydipsia) dan lapar (Polifagia)'),
(44, 'G007', 'Berat badan menurun, namun nafsu makan bertambah'),
(45, 'G008', 'Tingkat penyembuhan luka yang lambat'),
(46, 'G009', 'Mudah lelah dan mengantuk'),
(47, 'G010', 'Penglihatan kabur'),
(48, 'G011', 'Nyeri dada kiri, disertai jantung berdebar-debar'),
(49, 'G012', 'Mengalami nyeri pada kaki'),
(50, 'G013', 'Kram pada malam hari'),
(51, 'G014', 'Perubahan pada kuku (Kuku menebal dan pertumbuhannya menjadi lamban)'),
(52, 'G015', 'Berat badan bertambah secara signifikan'),
(53, 'G016', 'Mengalami gangguan pernapasan'),
(54, 'G017', 'Sendi terasa sakit dan nyeri'),
(55, 'G018', 'Nyeri pada tulang belakang'),
(56, 'G019', 'Menderita darah tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `hasilkonsultasi`
--

CREATE TABLE `hasilkonsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `presentation` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hasilkonsultasi`
--

INSERT INTO `hasilkonsultasi` (`id_konsultasi`, `id_user`, `id_penyakit`, `tanggal`, `presentation`) VALUES
(1, 28, 1, '2021-07-10', ''),
(4, 28, 1, '2021-07-14', ''),
(36, 28, 1, '2021-07-15', ''),
(38, 28, 6, '2021-07-30', ''),
(39, 27, 1, '2021-08-01', ''),
(40, 28, 1, '2021-08-14', ''),
(41, 28, 1, '2021-08-14', ''),
(42, 28, 1, '2021-08-14', ''),
(43, 28, 4, '2021-08-22', '100');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(5) NOT NULL,
  `kode_penyakit` varchar(5) NOT NULL,
  `nama_penyakit` varchar(40) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `solusi` text NOT NULL,
  `penyebab` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `kode_penyakit`, `nama_penyakit`, `gambar`, `keterangan`, `solusi`, `penyebab`) VALUES
(1, 'P001', 'Asam Urat', '60c753a56039f.jpg', '  Asam urat atau dalam bahasa medis dikenal dengan sebutan gout adalah suatu kondisi medis dimana terjadi gangguan metabolisme asam urat di dalam tubuh yang dapat menyebabkan gejala nyeri yang tidak tertahankan, pembengkakan dan rasa panas di persendian. Asam urat merupakan sisa hasil metabolisme tubuh, jika kadar asam urat melebihi ambang normal, asam urat ini tidak akan bias larut kembali dalam darah. Pada akhirnya, akan mengendap menjadi Kristal urat dan masuk ke organ-organ tubuh, khususnya kedalam sendi. Kristal asam urat yang berlebihan akan menumpuk di jaringan tubuh dan menyebabkan inflamasi (peradangan) pada persendian (artritis).\r\n\r\nLaki-laki lebih rawan terkena penyakit asam urat dibandingkan dengan perempuan, terutama saat usia mereka diatas 30 tahun. Pada perempuan, penyakit ini biasanya berisiko timbul setelah menopause. Orang yang terkena serangan penyakit asam urat biasanya akan merasakan perkembangan gejala yang cepat dalam beberapa jam pertama. Rasa sakit bias berlangsung selama 3-10 hari. Pembengkakan tidak hanya terjadi di sendir, namun juga di daerah sekitar sendi  disertai warna kulit yang memerah. Pada tahap ini, penderita tidak mampu bergerak dengan leluasa.\r\n ', '  1.	Menghindari makanan yang mengandung zat purin tinggi\r\n2.	Perbanyak minum air putih\r\n3.	Tidak mengkonsumsi minuman beralkohol\r\n4.	Mengkonsumsi buah yang memiliki antioksidan tinggi\r\n5.	Berolah raga secara rutin dan banyak melakukan aktivitas fisik\r\n ', '     1.	Makan makanan yang berzat purin tinggi (jeroan, makanan laut dan daging merah)\r\n2.	Mengkonsumsi obat-obatan tertentu (Niacin, Diuretik, Aspirin) dan beberapa obat kemoterapi\r\n3.	Riwayat kesehatan keluarga\r\n4.	Memiliki kondisi medis tertentu (gangguan sindrom metabolik, leukimia, penyakit ginjal)\r\n '),
(2, 'P002', 'Diabetes Mellitus', '60c4b515e4aab.jpg', '      Menurut World Health Organization (WHO), Diabetes Mellitus adalah suatu penyakit kronis dimana organ pancreas tidak memproduksi cukup insulin atau ketika tubuh tidak efektif dalam menggunakannya. Diabetes Mellitus adalah gangguan metabolisme yang secara genetis dan klinis termasuk heterogen dengan manifestasi berupa hilangnya toleransi karbohidrat (Price dan Wilson, 2006). Diabetes Mellitus adalah keadaan hiperglikemi kronik yang disertai berbagai kelainan metabolik akibat gangguan hormonal yang menimbulkan berbagai komplikasi kronik pada mata, ginjal, saraf dan pembuluh darah (Mansjoer dkk, 1999).\r\n\r\nHiperglikemia atau terjadinya peningkatan kadar gula darah adalah salah satu efek yang terjadi jika penyakit diabetes tidak terkontrol dan lambat laun akan mengakibatkan kerusakan diberbagai sistem di dalam tubuh khususnya saraf dan pembuluh darah. Ppenyakit metabolik yang berlangsung lama atau kronis yang ditandai dengan peningkatan kadar gula darah sebagai akibat dari kelainan insulin, aktivitas insulin ataupun sekresi insulin yang dapat menimbukan berbagai masalah serius dan prevalensi dari penyakit diabetes mellitus ini berkembang sangat cepat (Smeltzer &amp;Bare, 2008).\r\n   ', '        1.	Mempertahankan berat badan ideal dengan mengkonsumsi makanan rendah lemak\r\n2.	Mengkonsumsi makanan tinggi serat (buah dan sayur)\r\n3.	Mengurangi konsumsi makanan dan minuman manis\r\n4.	Berolah raga secara rutin dan banyak melakukan aktivitas fisik\r\n    ', '        1.	Terlalu banyak mengkonsumsi makanan manis dan gorengan\r\n2.	Kurangnya aktifitas fisik atau olahraga\r\n3.	Memiliki berat badan yang berlebih\r\n4.	Distribusi lemak perut yang tinggi\r\n5.	Kurangnya insulin\r\n6.	Tingginya kadar kortikosteroid\r\n7.	Riwayat kesehatan keluarga\r\n8.	Memiliki kondisi medis tertentu (riwayat penyakit jantung, hipertensi dan dislipidemia)\r\n9.	Diet tidak seimbang (tinggi gula, garam, lemak dan rendah serat)\r\n    '),
(4, 'P003', 'Hipertensi', '60c4a4f56ec34.jpg', '              Hipertensi atau biasa disebut sebagai penyakit darah tinggi merupakan penyakit yang menjadi perhatian bagi semua kalangan masyarakat. Penyakit Hipertensi timbul akibat adanya interaksi dari berbagai faktor resiko yang dimiliki seseorang. Umunya hipertensi terjadi jika tekanan darah diatas 140/90 mmHg. Selain itu faktor resiko yang dapat menyebabkan hipertensi adalah faktor genetik, obesitas, kelebihan asupan natrium, dislipedemia, kurangnya aktivitas fisik dan defisiensi vitamin D (Dharmeizar, 2012).\r\n\r\n          Berdasarkan penelitian yang telah dilakukan ternyata prevalensi (amhka kejadian) hipertensi meningkat dengan bertambahnya usia. Dari berbagai penelitian epidemiologis yang dilakukan di Indonesia menunjukkan 1,8-28,6% penduduk yang berusia diatas 20 tahun adalah penderita hipertensi. \r\n\r\n          Menurut American Society of Hypertension (ASH), hipertensi adalah suatu sindrom atau kumpulan gejala kardiovaskuler yang progresif akibat dari kondisi lain yang kompleks dan saling berhubungan. Penyakit hipertensi dapat meningkatkan risiko terjadinya penyakit kardiovaskuler. Setiap peningkatan 20 mmHg tekanan darah sistolik atau 10 mmHg tekanan darah diastolic dapat meningkatkan risiko kematian akibat penyakit jantung iskemik dan strok (Chobanian, dkk, 2003).\r\n   ', '      1.	Mengkonsumsi makanan yang rendah lemak dan kaya serat (buah dan sayur)\r\n2.	Membatasi asupan garam\r\n3.	Hindari konsumsi minuman beralkohol\r\n4.	Mengurangi konsumsi kafein yang berlebihan\r\n5.	Hentikan kebiasaan merokok\r\n6.	Berolah raga secara rutin dan banyak melakukan aktivitas fisik\r\n   ', '      1.	Faktor usia (&gt;65 tahun)\r\n2.	Merokok \r\n3.	Memiliki berat badan yang berlebih\r\n4.	Memiliki tekanan darah tinggi\r\n5.	Kurangnya aktifitas fisik atau olahraga\r\n6.	Kurangnya asupan buah dan sayur\r\n7.	Terlalu banyak mengkonsumsi kafein\r\n8.	Mengkonsumsi obat-obatan tertentu (pil KB, obat flu dan dekongeston)\r\n9.	Memiliki kelainan bawaan pada pembuluh darah\r\n10.	Diet tidak seimbang (konsumsi garam, berlebih dan kurang mengkonsumsi natrium/sodium)\r\n11.	Riwayat kesehatan keluarga\r\n   '),
(5, 'P004', 'Kolesterol', '60c75435d4482.jpg', 'Kolesterol adalah salah satu lemak tubuh yang berada dalam bentuk asam lemak bebas dan ester serta merupakan komponen utama selaput sel otak dan saraf. Kolesterol dalam tubuh manusia dapat dihasilkan sendiri oleh organ hati, korteks, adrenal, kulit, usus, lambung, otot, jaringan adipose dan otak. Kolesterol juga dapat diperoleh dari luar tubuh yaitu melalui makanan hewani. Faktoe luar inilah yang menjadi salah satu penyebab kadar kolesterol menjadi tinggi jika tidak di kontrol dengan baik. \r\n\r\nKolesterol sangat dibutuhkan manusia sebagai pembentuk bermacam-macam fungsi didalam tubuh, antara lain membentuk dinding sel baru, membantu tubuh memproduksi vitamin D, sejumlah hormon, dan asam empedu untuk mencerna lemak. Berdasarkanstruktur kimia, kolesterol merupakan kelompok steroid, yaitu suatu zat yang termasuk kedalam golongan lipid. Namun jika jumlah kolesterol melebihi kebutuhan, maka dapat mengendap pada dinding-dinding arteri yang menyebabkan penyakit.\r\n\r\nSecara umum, total kadar kolesterol di dalam tubuh manusia yang baik adalah di bawah200 mg/dl, dengan kadar kolestrol jahat (Low Density Lipoprotein) di bawah angka 130,dan kolestrol baik (High Density Lipoprotein) berada di atas angka 40. Yang menjadimasalah adalah jika jumlah kolesterol berlebihan yang bisa menimbulkan penyakit lainnya.', '1.	Rajin mengkonsumsi makanan sehat dan bergizi (buah, sayur serta biji-bijian utuh)\r\n2.	Mengkonsumsi makanan yang rendah lemak\r\n3.	Berhenti merokok\r\n4.	Melakukan olahraga secara rutin dan banyak melakukan aktivitas fisik\r\n', '   1.	Merokok\r\n2.	Gaya hidup yang tidak sehat\r\n3.	Memiliki berat badan yang berlebih (obesitas)\r\n4.	Kurangnya aktifitas fisik atau olahraga\r\n5.	Riwayat kesehatan keluarga\r\n'),
(6, 'P005', 'Obesitas', '60c754858d601.jpg', '  Obesitas adalah kelebihan berat badan sebagai akibat dari penimbunan lemak tubuh yang berlebihan. Obesitas dapat dikatakan sebagai kondisi kronis yang terjadi akibat penumpukan lemak dalam tubuh sehingga berat badan berada diluar vatas ideal. Setiap orang memerlukan sejumlah lemak tubuh untuk menyimpan energy, sebagai penyekat panas, penyerap guncangan dan fungsi lainnya.\r\n\r\nRata-rata wanita memiliki lemak tubuhyang lebih banyak dibandingkan pria. Perbandingan yang normal antara lemak tubuh dengan berat badan adalah sekitar 25-30% pada wanita dan 18-23% pada pria. Wanita dengan lemak tubuh lebih dari 30% dan pria dengan lemak tubuh lebih dari 25% dianggap mengalami obesitas. Seseorang yang memiliki berat badan 20% lebih tinggi dari nilai tengah kisaran berat badannya yang normal dianggap mengalami obesitas.\r\n\r\nObesitas digolongkan menjadi 3 kelompok :\r\n--	Obesitas ringan : kelebihan berat badan 20-40%\r\n--	Obesitas sedang : kelebihan berat badan 41-100%\r\n--	Obesitas berat : kelebihan berat badan &gt;100% (Obesitas berat ditemukan sebanyak 5% dari antara orang-orang yang gemuk)\r\n\r\nBanyak faktor yang dapat mempengaruhi obesitas diantaranya yaitu tingkat pendidikan dan pekerjaan, stress, aktivitas fisik, jenis kelamin, usia, perubahan gaya hidup, asupan nutrisi yang semakin banyak dari makanan olahan atau diet dengan tinggi kalori ', '  1.	Mengkonsumsi makanan sehat (makanan rendah kalori dan padat nutrisi)\r\n2.	Berolah raga secara rutin dan banyak melakukan aktivitas fisik\r\n3.	Melakukan diet sehat\r\n4.	Membatasi konsumsi gula, garam dan lemak berlebih\r\n ', '     1.	Faktor usia\r\n2.	Gaya hidup yang tidak sehat\r\n3.	Kurangnya waktu istirahat\r\n4.	Pola makan yang berlebih dan tidak shat\r\n5.	Mengkonsumsi obat-obatan tertentu (antidepresan, antipsikotik dan antikonvulsan)\r\n6.	Memiliki kondisi medis tertentu (sindrom cushing dan hormon tiroid yang kurang dalam tubuh)\r\n7.	Kurangnya aktifitas fisik atau olahraga\r\n8.	Riwayat kesehatan keluarga\r\n ');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `subjek` text NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nama`, `email`, `subjek`, `pesan`) VALUES
(1, 'hh', 'll@gmail.com', 'jj', 'hh'),
(2, 'fadiha', 'diha@gmail.com', 'bagaimana?', 'begitu'),
(3, '', '', '', ''),
(4, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `jk`, `password`, `role`, `tgl_lahir`) VALUES
(25, 'Fadihah Fitri', 'fadihah', 'fadihah@gmail.com', 'Perempuan', '$2y$10$XAUsG1FIwZfxzxQxC6ptnegbK5VAqtDypT1eb6wiKPFu6gJOK3hoO', 'Admin', '1990-01-23'),
(27, 'Brilian Fitri', 'ian', 'ian@gmail.com', 'Laki-laki', '$2y$10$L9.Cg9XIpPkM5s8swNGnN.OMil11BEZU5Ha3uZqe/vwI9VF5rfFx2', 'Dokter', '1991-01-23'),
(28, 'Fitri Nursasi', 'fitri', 'fitri@gmail.com', 'Perempuan', '$2y$10$djyF3ptP5b8L4QUqc5NuK.2knWmZTGl9Bbxb.M4eNVHMRyM6GbTNG', 'Pasien', '2020-03-16'),
(47, 'nti', 'nti', 'nti@gmail.com', 'pr', '$2y$10$BFlD1iT7oWokDyxp/xk3ve8T4sRXHBL3QKPw7cz7iCgslx5vG5MOu', 'Pasien', '2021-08-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basispengetahuan`
--
ALTER TABLE `basispengetahuan`
  ADD PRIMARY KEY (`id_rule`);

--
-- Indexes for table `bpangan`
--
ALTER TABLE `bpangan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `hasilkonsultasi`
--
ALTER TABLE `hasilkonsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basispengetahuan`
--
ALTER TABLE `basispengetahuan`
  MODIFY `id_rule` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `bpangan`
--
ALTER TABLE `bpangan`
  MODIFY `id_bahan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `hasilkonsultasi`
--
ALTER TABLE `hasilkonsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
