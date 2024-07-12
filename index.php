<?php
// session_start();
// if ($_SESSION['status_visitor'] != "sudah_login") {
//     // header("location:../errorpage/403.php");
//     header("location:pages/visitor/login.php?pesan=Silahkan Login Terlebih Dahulu");
// }
// $page = "populate_details";
include 'config/config.php';
$fs = mysqli_query($koneksi, "SELECT * FROM shrines");
// $ds = mysqli_fetch_array($fs);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sigapura</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="skins/mazer/demo/assets/css/bootstrap.css">

    <link rel="stylesheet" href="skins/mazer/demo/assets/vendors/toastify/toastify.css">
    <link rel="stylesheet" href="skins/mazer/demo/assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="skins/mazer/demo/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="skins/mazer/demo/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="skins/mazer/demo/assets/css/app.css">
    <link rel="shortcut icon" href="skins/mazer/demo/assets/images/favicon.svg" type="image/x-icon">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="min-vh-100" style="overflow-x: hidden; background-color: lightgrey;">
        <!-- make navbar sticky -->
        <nav class="w-100 container-fluid d-flex justify-content-between align-items-center bg-dark" style="top: 0; z-index: 1000; position: fixed;">
            <img src="skins/mazer/demo/assets/images/logo/logo-sigapura.png" style=" max-height: 5rem; max-width: 5rem; object-fit: contain; cursor: pointer;" onclick="window.location.href = 'index.php';" />
            <h2 class=" text-center text-white m-0 p-0" style="font-family: 'Roboto', sans-serif; font-weight: 700;">SIGAPURA</h2>
            <div class="text-center text-white d-flex justify-content-between align-items-center pe-4">
                <i class="bi bi-map" style="cursor: pointer; font-size: 1.5rem; height: 1.5rem;"></i>
                <div class=" mx-3">
                </div>
                <i class="bi bi-box-arrow-left" style="cursor: pointer; font-size: 1.5rem; height: 1.5rem;"></i>
            </div>
        </nav>

        <div class="hero bg-dark text-white py-5" style="background-image: url('assets/img/background/bg.JPG'); background-size: cover; background-position: center; height: 100vh;">
            <div class="container d-flex flex-column justify-content-center align-items-center h-100">
                <!-- make responsive -->
                <h1 class="display-1 text-center text-white" style="font-family: 'Roboto', sans-serif; font-weight: 700;
                font-size: 3rem;
                line-height: 3.5rem;
                letter-spacing: -0.05em;
                text-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
                ">SIGAPURA</h1>
                <h2 class="text-center text-white" style="font-family: 'Roboto', sans-serif; font-weight: 400;">Sistem Digitalisasi Pelinggih</h2>
            </div>
        </div>

        <div class="container text-center my-5">
            <h1 class="text-center text-dark" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                SEJARAH DESA ADAT BATUAN
            </h1>

            <p class="text-center text-secondary" style="font-family: 'Roboto', sans-serif; font-weight: 400; height: 7.7rem; overflow: hidden;">
                SEJARAH DESA ADAT BATUAN
                Pada zaman Pemerintahan Dinasti Warmadewa di Bali, Desa Batuan dengan sebutan Desa Baturan, memang sudah terdapat ada. Nama Baturan akhirnya kemudian disebut Batuan, yang berasal dari kota Batu, oleh karena di daerah ini adalah daerah berbatu-batu, lantas selanjutnya karena perubahan pengucapan sehari-hari maka lebih populer dengan sebutan "Desa Batuan". Hal ini dapat kita jumpai dari peninggalan prasasti yang terdapat di "Pura Hyang Tibha" yang dibangun menurut Candrasengkala "Lawang Apit Gajah" yang berarti Isaka: 829= Tahun 907 M, oleh "Srie Aji Darmapangkaja Wira Dalem Kesari".
                Pada masa Pemerintahan Srie Aji Darma Udayana Warmadewa dengan didampingi oleh Permesuri Srie Baginda Gunapriadarmapatni, terdapat para anggota staf kerajaan yang terkenal pada waktu itu ialah "Senopati Kuturan". Untuk menciptakan ketertiban serta menegakkan sendi-sendi agama serta budaya masyarakat di Bali, maka Empu Kuturan segera mengadakan musyawarah besar (Maha Sabha) yang dihadiri oleh para pemuka masyarakat serta "Para Pandita Siwa-Budha" di "Samuan Tiga". Didalam musyawarah besar itu telah diambil keputusan dan menetapkan bahwa makna paham/pengertian "Tri Sakti" atau "Tri Purusa" harus dipulihkan kembali. Akhirnya sejak itu terlaksanalah pengertian Tri Purusa landasan dari dibangunnya "Pura Kahyangan Tiga" yang melambangkan: "Utpeti, Setiti dan Prelina".
                Desa Batuan baru terdapat hanya sebuah Pura terletak di Dusun Blahtanah yang disebut Pura Hyang Tibha tempat memuja kebesaran "Ida Sang Hyang Siwa", sebagai lambang Maha Pralina, lalu dibangun lagi Pura terletak di Dusun Cangi tempat memuja kebesaran "Ida Sang Hyang Ageni/Brahma" sebagai lambang Maha Pencipta (Utpeti) dan sebuah lagi terletak di Desa Batuan tempat memuja kebesaran "Ida Sang Hyang Wisnu" sebagai lambang Pemelihara (Setiti). Selanjutnya Pura Kahyangan Tiga yang berada di wilayah Desa Batuan Sesuai dengan makna Prasasti yang kini masih tersimpan di Pura Puseh Desa Adat Batuan ber Isaka: 944= Tahun 1022 M, tepatnya pada tanggal: 26 Desember 1022, maka pada waktu itu Para Kerama Desa Batuan sepasuktani, dibawah pimpinan:
                1. Seorang Petapa bernama: Bhiksu Widya.
                2. Kepala Desa bernama: Bhiksu Sukaji.
                3. Juru Tulis Desa bernama: Mamudri Gawan.
                4. Beserta Para Perangkat Desa lainnya, hendak menghadap kehadapan "Srie Aji Darmawangsawardana Marakata Pangkajasthanotunggadewa",
                Dengan diantar oleh "Pandita Siwa" bernama: "Empu Gupit" dari Ngudalaya, dengan maksud mengajukan permohonan agar Srie Baginda Raja berkenan memberikan keringanan kepada Para Kerama Desa
                Baturan Batuan sewilayahnya mengenai ayah-ayahan antara lain:
                1. Membebaskan dari kewajiban ngayah rodi.
                2. Menghapuskan pengenaan tanggungan dari segala pajak-pajak.
                3. Menghentikan menyuguhkan (penangu) kepada para petugas Kerajaan, hanya masih
                tetap menjadi beban selanjutnya penyungsung serta menghaturkan aci-aci terhadap Pura Kahyangan Tiga tersebut.
                Srie Baginda berkenan untuk mengabulkan permohonan dari Para Kerama Desa Baturan sewilayahnya, dengan "Surat Keputusan" sebagai yang termaktub di dalam "Prasasti Baturan" yang berisaka: 944 = Tahun 1022 M. Adapun Prasasti tersebut sampai kini tetap menjadi penyungsungan Desa Batuan yang disebut: "Ida Sanghyang Aji Saraswati" yang secara pisiologi merupakan pelindung dari Para Kerama Desa Batuan sewilayahnya dan piodalannya jatuh pada hari Sabtu Umanis wuku Gunung.
                Setelah hapusnya Dinasti Warmadewa di Bali dipindahkan ke "Gelgel" dan dinobatkan menjadi sesuhunan Bali "Srie Dalem Ketut Ngulesir" bertahta dari Tahun 1380 sampai dengan Tahun 1460. Kemudian zaman "Gelgel" berakhir juga Ibu Kota Kerajaan di Bali dipindahkan ke "Klungkung" dibawah pemerintahan "Ida Dewa Agung Jambe" yang bertahta sejak Tahun 1700 sampai dengan Tahun 1735 dengan menurunkan 4 (empat) Raja Putra. Sejak masa dibangunnya Puri Gerogak yang diberi nama Puri Sekulih awal berkembangnya "Kesenian dan Kebudayaan" di Desa Batuan yang amat tersohor, sehingga kemudian sampai merobah sebutan " Desa Timbul menjadi " Sukawati". Selanjutnya kesenian dan kebudayaan di Desa Batuan selalu dapat berkembang dengan semerbaknya. Lestari menuruti situasi masa, dibawah pimpinan Kepala/Pemuka Desa, yang Namanya diabadikan dibawah ini, sejak jaman Dinasti Warmadewa, Mojopahit, Penjajahan Belanda, Pendudukan Jepang dan jaman kemerdekaan sampai sekarang.

                PRASASTI BATURAN:
                1. Pada Tahun Caka 944, Sasih Kenem, Suklapaksa hari pertama menuju bulan Purnama, Saptawara Buda, Pancawara Wage, Sadwara Maulu, Wara/Wuku Ukir, tepat pada Tanggal 26
                Desember 1022, waktu itulah saatnya Desa Baturan sewilayahnya,
                2. Kepala kehutanan bernama Bhiksu Widya, Juru Tulis Tambeh mamudri Gawan, Rama Kabayan Bhiksu Sukaji serta Wanotara, Sandung, Maha, Bahling menghadap,
                3. Kepada Paduka Raja Cri Dharmawangca Wardana Marakata Pangkajasthanottunggadewa dengan perantara Mpungku di Ngudayalaya,Dangacarya Tiksena,
                4. Serta Kepala Pemelihara Kuda Pu Gupit, dengan maksud akan mengatakan kebertan melakukan rodinya, menjaga kebun Paduka Raja yang telah menjadi Dewata di Candikan di Nger Wka di Nger Paku yang dibersihkan tiap-tiap hari pertama sukla,
                5. Demikian pula mengadakan rodi di tempat pemujaan para Dewa di Baturan, mempersembahkan sajian caru, apabila ada perintah dari Paduka Raja,
                6. Penyelenggaraan pajak pembersihan itu agar datang di Japura, demikianlah isi permohonan Desa di Baturan itu sewilayahnya,
                7. Adapun karena kebijakan Paduka Raja prihatin akan kelanjutan gangguan hal- hal yang merintangi anugrah almarhum yang dimakamkan di Nger Wka, menyebabkan prihatin Paduka Raja, terhadap Desa Baturan,
                8. Lalu ditambahi beliau bahwa Desa Baturan tidak dikenai pisaningu seperti umpamanya pajak tali, pajak burung, pajawa, pajak perburuan, pajak peternakan, pajak gunung, pawalyan, tempat suci,
                9. Apabila akan mengadu ayam di tempat suci batasnya hanya 3 babak, tidak usah minta ijin kepada Kepala Tukang Kontrol, serta sawung tunggur tidak kena pinta
                pamali,
                10.Pada hari ke 9 bulan/sasih magha (kesanga) pertapaannya kelima pertapaan oleh Samgatwilang Patapan,
                11.Apabila ada yang menumpang dipertapaan, jika penyanyi, pemain angklung bambu, pemukul gambelan, meniup seruling, agar mengajukan parmesan kepada Nayakan,
                12.Caksu Pamwatan, Caksu Krangan, ada tukang emas, tukang besi,
                13.Tukang batu, tukang kayu, tukang aungan, pelukis, pemahat,
                14.Adapun lamanya berpisah dengan tetangganya ke empat tumpuk dari Raja yang dicandikan di Nger Madatu, sebab perceraian dengan seluruh penduduknya di Sukawati,
                15.Menyebabkan perpisahan Desa Baturan tersebut dengan Desa Sukawati itu, ke empat tumpuk sehingga mengakibatkan dibagi 3 drbya haji itu, Sebagian kepada Desa Baturan, 2 bagian kepada Desa Sukawati, ke 4 tumpuk drbya haji lainnya diperuntukan tempat Suci,
                16. Adapun jumlah tumpuk di Sukawati, ketumpukan Bangun Buddhi, Nur Madahan, Timbul, Gusali Putih,
                17.Demikian isi dan maksud anugrah Paduka Raja, terhadap Desa di Baturan sewilayahnya, agar menyebabkan tetap taat panatarannya di Desa di Baturan, sehingga mereka diberikan menjaga Prasasti Suci, agar tidak menentang terhadap Raja penggantinya untuk seterusnya,
                18.Di Baturan milik Sang Senapati dari Kuturan yang bernama Mapanji Putuputu, hutan belukar, di Subak Gurang Panggung di Baturan, dijadikan sawah oleh Si Pacarwan, Si Dana dan Subhumi, di Tapesan, Si Bragayan, di Sangsiwal Si Buru, Si Ibus di Batu Aji, Si Padang di Batu Hyang, Si Sambar, Si Pule, Si Kepundung di Gurang, Si Dopala, Cri Bawa, Si Jagul Si Yatna, di Nangka, Si Kupa di Rbun, Si Beneng di Sakar Batu Giantung,
                19. kemudian dibatasilah Desa Baturan ke 4 arah, batasnya sebelah Timur Air Morobog agak serong keselatan sampai Waringin berbelok sedikit ke barat sampai Waringin, batasnya sebelah Selatan hantap batasnya sebelah Barat Air Barngbeng, batasnya sebelah Utara Rangr berbelok-belok 15 kali lalu sampai di Air Morobog terus Rangr, demikianlah luas batas Desa Baturan sewilayahnya,
                20.Pura Puseh-Pura Desa sesuai informasi/penuturan dari orang tua/nenek\ moyang/leluhur, bahwa pura tersebut dibangun pada Tahun Caka 925 = Tahun 1.003 Masehi, berarti ada rentangan waktu saat Prasasti Desa Baturan dibuat dengan dibangunnya pura selama 19 tahun.
                BATUAN, JULI 2022
                PEMUPUL,
            </p>
            <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#modalfadedesc">Read More</button>
        </div>

        <div class=" row text-center my-5 py-5 mx-5">
            <?php while ($ds = mysqli_fetch_array($fs)) { ?>
                <div class="col-12
                col-sm-6
                col-md-4
                col-lg-3
                col-xl-3
                col-xxl-3
                 mb-5" style="cursor: pointer;">
                    <!-- hover action -->
                    <div class="bg-white rounded-lg p-3" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); transition: all 0.3s ease-in-out;
                    max-height: 48rem;">
                        <img src=" assets/img/shrine/<?= $ds['image_shrine'] ?>" class="img-fluid rounded-lg" style="height: 15rem; object-fit: cover;" />
                        <div class="position-relative p-4 pt-0">
                            <metadata class="d-none">
                                <description>
                                    <short_description><?= $ds['description_visual'] ?></short_description>
                                    <detail_description><?= $ds['description_detail'] ?></detail_description>
                                    <visual_description><?= $ds['description_visual'] ?></visual_description>
                                </description>
                                <date>
                                    <year><?= $ds['year_of_creation'] ?></year>
                                    <period><?= $ds['period_of_creation'] ?></period>
                                </date>
                                <creator>
                                    <name><?= $ds['name_creator'] ?></name>
                                    <country><?= $ds['country_creator'] ?></country>
                                    <style>
                                        <?= $ds['creator_style'] ?>
                                    </style>
                                </creator>
                                <materials>
                                    <main><?= $ds['main_material'] ?></main>
                                    <additional><?= $ds['additional_material'] ?></additional>
                                    <technique><?= $ds['creation_technique'] ?></technique>
                                    <ornaments><?= $ds['ornament'] ?></ornaments>
                                </materials>
                                <dimensions>
                                    <length><?= $ds['length'] ?></length>
                                    <width><?= $ds['width'] ?></width>
                                    <height><?= $ds['height'] ?></height>
                                    <weight><?= $ds['weight'] ?></weight>
                                    <volume><?= $ds['volume'] ?></volume>
                                </dimensions>
                                <condition>
                                    <physical><?= $ds['physical_condition'] ?></physical>
                                    <damage><?= $ds['level_of_damage'] ?></damage>
                                </condition>
                                <location>
                                    <country><?= $ds['country_location'] ?></country>
                                    <province><?= $ds['district_location'] ?></province>
                                    <city><?= $ds['subdistrict_location'] ?></city>
                                    <district><?= $ds['village_location'] ?></district>
                                    <village><?= $ds['village_location'] ?></village>
                                    <address><?= $ds['village_location'] ?></address>
                                </location>
                                <history>
                                    <period><?= $ds['period_of_creation'] ?></period>
                                    <function><?= $ds['functional'] ?></function>
                                    <owner><?= $ds['ownership'] ?></owner>
                                    <ownership_history><?= $ds['ownership_history'] ?></ownership_history>
                                </history>
                                <value>
                                    <historical><?= $ds['historical_value'] ?></historical>
                                    <cultural><?= $ds['cultural_value'] ?></cultural>
                                    <aesthetic><?= $ds['aesthetic_value'] ?></aesthetic>
                                    <economic><?= $ds['economic_value'] ?></economic>
                                </value>
                            </metadata>
                            <h3 class="mt-3 text-start text-dark" style="font-family: ' Roboto', sans-serif; font-weight: 700;"><?= $ds['name_object'] ?></h3>
                            <p class="text-start text-secondary" style="font-family: 'Roboto', sans-serif; font-weight: 400; height: 4.7rem; overflow: hidden;"><?= $ds['description_detail'] ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#modalfade" onclick="
                                <?=
                                $ds['link_shrine'] == null
                                    ? "document.getElementById('detail_image').src='assets/img/detail/shrine/" . $ds['image_detail'] . "'; document.getElementById('detail_image').classList.remove('d-none')"
                                    : "document.getElementById('content').src='" . $ds['link_shrine'] . "'; document.getElementById('content').classList.remove('d-none')"
                                ?>
                                // document.getElementById('content').src='<?= $ds['link_shrine'] == null ? $ds['image_detail'] : $ds['link_shrine'] ?>';
                                document.getElementById('name_object').innerHTML='<?= $ds['name_object'] ?>';
                                document.getElementById('description_detail').innerHTML='<?= $ds['description_detail'] ?>';
                                document.getElementById('description_visual').innerHTML='<?= $ds['description_visual'] ?>';
                                document.getElementById('year_of_creation').innerHTML='<?= $ds['year_of_creation'] ?>';
                                document.getElementById('period_of_creation').innerHTML='<?= $ds['period_of_creation'] ?>';
                                document.getElementById('name_creator').innerHTML='<?= $ds['name_creator'] ?>';
                                document.getElementById('creator_style').innerHTML='<?= $ds['creator_style'] ?>';
                                document.getElementById('main_material').innerHTML='<?= $ds['main_material'] ?>';
                                document.getElementById('additional_material').innerHTML='<?= $ds['additional_material'] ?>';
                                document.getElementById('creation_technique').innerHTML='<?= $ds['creation_technique'] ?>';
                                document.getElementById('ornament').innerHTML='<?= $ds['ornament'] ?>';
                                document.getElementById('length').innerHTML='<?= $ds['length'] ?>';
                                document.getElementById('height').innerHTML='<?= $ds['height'] ?>';
                                document.getElementById('width').innerHTML='<?= $ds['width'] ?>';
                                document.getElementById('weight').innerHTML='<?= $ds['weight'] ?>';
                                document.getElementById('volume').innerHTML='<?= $ds['volume'] ?>';
                                document.getElementById('physical_condition').innerHTML='<?= $ds['physical_condition'] ?>';
                                document.getElementById('level_of_damage').innerHTML='<?= $ds['level_of_damage'] ?>';
                                document.getElementById('country_location').innerHTML='<?= $ds['country_location'] ?>';
                                document.getElementById('district_location').innerHTML='<?= $ds['district_location'] ?>';
                                document.getElementById('subdistrict_location').innerHTML='<?= $ds['subdistrict_location'] ?>';
                                document.getElementById('village_location').innerHTML='<?= $ds['village_location'] ?>';
                                document.getElementById('functional').innerHTML='<?= $ds['functional'] ?>';
                                document.getElementById('ownership').innerHTML='<?= $ds['ownership'] ?>';
                                document.getElementById('ownership_history').innerHTML='<?= $ds['ownership_history'] ?>';
                                document.getElementById('historical_value').innerHTML='<?= $ds['historical_value'] ?>';
                                document.getElementById('cultural_value').innerHTML='<?= $ds['cultural_value'] ?>';
                                document.getElementById('aesthetic_value').innerHTML='<?= $ds['aesthetic_value'] ?>';
                                document.getElementById('economic_value').innerHTML='<?= $ds['economic_value'] ?>'; 
                                ">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }  ?>
        </div>
    </div>

    <footer class="footer text-white justify-content-between d-flex px-5 bg-dark py-2">
        <p class="my-auto" style="font-family: 'Roboto', sans-serif;">2023 &copy; Sistem Digitalisasi Pelinggih</p>
        <p class="my-auto" style="font-family: 'Roboto', sans-serif;">
            Crafted with
            <span class="text-danger"><i class="bi bi-heart"></i></span> by
            <a href="#">Team</a>
        </p>
    </footer>
    </div>

    <!-- Modal -->
    <div class="modal fade absolute-center p-5" id="modalfadedesc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl bg-body min-vh-100 py-4 px-5">
            <p class="text-dark" style="font-family: 'Roboto', sans-serif; font-weight: 700; font-size: 1rem;" id="content-desc">
            <h1 class="text-center text-dark" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                SEJARAH DESA ADAT BATUAN
            </h1>
            Pada zaman Pemerintahan Dinasti Warmadewa di Bali, Desa Batuan dengan sebutan Desa Baturan, memang sudah terdapat ada. Nama Baturan akhirnya kemudian disebut Batuan, yang berasal dari kota Batu, oleh karena di daerah ini adalah daerah berbatu-batu, lantas selanjutnya karena perubahan pengucapan sehari-hari maka lebih populer dengan sebutan "Desa Batuan". Hal ini dapat kita jumpai dari peninggalan prasasti yang terdapat di "Pura Hyang Tibha" yang dibangun menurut Candrasengkala "Lawang Apit Gajah" yang berarti Isaka: 829= Tahun 907 M, oleh "Srie Aji Darmapangkaja Wira Dalem Kesari".
            <br><br>
            Pada masa Pemerintahan Srie Aji Darma Udayana Warmadewa dengan didampingi oleh Permesuri Srie Baginda Gunapriadarmapatni, terdapat para anggota staf kerajaan yang terkenal pada waktu itu ialah "Senopati Kuturan". Untuk menciptakan ketertiban serta menegakkan sendi-sendi agama serta budaya masyarakat di Bali, maka Empu Kuturan segera mengadakan musyawarah besar (Maha Sabha) yang dihadiri oleh para pemuka masyarakat serta "Para Pandita Siwa-Budha" di "Samuan Tiga". Didalam musyawarah besar itu telah diambil keputusan dan menetapkan bahwa makna paham/pengertian "Tri Sakti" atau "Tri Purusa" harus dipulihkan kembali. Akhirnya sejak itu terlaksanalah pengertian Tri Purusa landasan dari dibangunnya "Pura Kahyangan Tiga" yang melambangkan: "Utpeti, Setiti dan Prelina".
            <br><br> Desa Batuan baru terdapat hanya sebuah Pura terletak di Dusun Blahtanah yang disebut Pura Hyang Tibha tempat memuja kebesaran "Ida Sang Hyang Siwa", sebagai lambang Maha Pralina, lalu dibangun lagi Pura terletak di Dusun Cangi tempat memuja kebesaran "Ida Sang Hyang Ageni/Brahma" sebagai lambang Maha Pencipta (Utpeti) dan sebuah lagi terletak di Desa Batuan tempat memuja kebesaran "Ida Sang Hyang Wisnu" sebagai lambang Pemelihara (Setiti). Selanjutnya Pura Kahyangan Tiga yang berada di wilayah Desa Batuan Sesuai dengan makna Prasasti yang kini masih tersimpan di Pura Puseh Desa Adat Batuan ber Isaka: 944= Tahun 1022 M, tepatnya pada tanggal: 26 Desember 1022, maka pada waktu itu Para Kerama Desa Batuan sepasuktani, dibawah pimpinan:
            1. Seorang Petapa bernama: Bhiksu Widya.
            2. Kepala Desa bernama: Bhiksu Sukaji.
            3. Juru Tulis Desa bernama: Mamudri Gawan.
            4. Beserta Para Perangkat Desa lainnya, hendak menghadap kehadapan "Srie Aji Darmawangsawardana Marakata Pangkajasthanotunggadewa",
            Dengan diantar oleh "Pandita Siwa" bernama: "Empu Gupit" dari Ngudalaya, dengan maksud mengajukan permohonan agar Srie Baginda Raja berkenan memberikan keringanan kepada Para Kerama Desa
            Baturan Batuan sewilayahnya mengenai ayah-ayahan antara lain:
            1. Membebaskan dari kewajiban ngayah rodi.
            2. Menghapuskan pengenaan tanggungan dari segala pajak-pajak.
            3. Menghentikan menyuguhkan (penangu) kepada para petugas Kerajaan, hanya masih
            tetap menjadi beban selanjutnya penyungsung serta menghaturkan aci-aci terhadap Pura Kahyangan Tiga tersebut.
            Srie Baginda berkenan untuk mengabulkan permohonan dari Para Kerama Desa Baturan sewilayahnya, dengan "Surat Keputusan" sebagai yang termaktub di dalam "Prasasti Baturan" yang berisaka: 944 = Tahun 1022 M. Adapun Prasasti tersebut sampai kini tetap menjadi penyungsungan Desa Batuan yang disebut: "Ida Sanghyang Aji Saraswati" yang secara pisiologi merupakan pelindung dari Para Kerama Desa Batuan sewilayahnya dan piodalannya jatuh pada hari Sabtu Umanis wuku Gunung.
            Setelah hapusnya Dinasti Warmadewa di Bali dipindahkan ke "Gelgel" dan dinobatkan menjadi sesuhunan Bali "Srie Dalem Ketut Ngulesir" bertahta dari Tahun 1380 sampai dengan Tahun 1460. Kemudian zaman "Gelgel" berakhir juga Ibu Kota Kerajaan di Bali dipindahkan ke "Klungkung" dibawah pemerintahan "Ida Dewa Agung Jambe" yang bertahta sejak Tahun 1700 sampai dengan Tahun 1735 dengan menurunkan 4 (empat) Raja Putra. Sejak masa dibangunnya Puri Gerogak yang diberi nama Puri Sekulih awal berkembangnya "Kesenian dan Kebudayaan" di Desa Batuan yang amat tersohor, sehingga kemudian sampai merobah sebutan " Desa Timbul menjadi " Sukawati". Selanjutnya kesenian dan kebudayaan di Desa Batuan selalu dapat berkembang dengan semerbaknya. Lestari menuruti situasi masa, dibawah pimpinan Kepala/Pemuka Desa, yang Namanya diabadikan dibawah ini, sejak jaman Dinasti Warmadewa, Mojopahit, Penjajahan Belanda, Pendudukan Jepang dan jaman kemerdekaan sampai sekarang.
            <br><br> PRASASTI BATURAN:
            1. Pada Tahun Caka 944, Sasih Kenem, Suklapaksa hari pertama menuju bulan Purnama, Saptawara Buda, Pancawara Wage, Sadwara Maulu, Wara/Wuku Ukir, tepat pada Tanggal 26
            Desember 1022, waktu itulah saatnya Desa Baturan sewilayahnya,
            2. Kepala kehutanan bernama Bhiksu Widya, Juru Tulis Tambeh mamudri Gawan, Rama Kabayan Bhiksu Sukaji serta Wanotara, Sandung, Maha, Bahling menghadap,
            3. Kepada Paduka Raja Cri Dharmawangca Wardana Marakata Pangkajasthanottunggadewa dengan perantara Mpungku di Ngudayalaya,Dangacarya Tiksena,
            4. Serta Kepala Pemelihara Kuda Pu Gupit, dengan maksud akan mengatakan kebertan melakukan rodinya, menjaga kebun Paduka Raja yang telah menjadi Dewata di Candikan di Nger Wka di Nger Paku yang dibersihkan tiap-tiap hari pertama sukla,
            5. Demikian pula mengadakan rodi di tempat pemujaan para Dewa di Baturan, mempersembahkan sajian caru, apabila ada perintah dari Paduka Raja,
            6. Penyelenggaraan pajak pembersihan itu agar datang di Japura, demikianlah isi permohonan Desa di Baturan itu sewilayahnya,
            7. Adapun karena kebijakan Paduka Raja prihatin akan kelanjutan gangguan hal- hal yang merintangi anugrah almarhum yang dimakamkan di Nger Wka, menyebabkan prihatin Paduka Raja, terhadap Desa Baturan,
            8. Lalu ditambahi beliau bahwa Desa Baturan tidak dikenai pisaningu seperti umpamanya pajak tali, pajak burung, pajawa, pajak perburuan, pajak peternakan, pajak gunung, pawalyan, tempat suci,
            9. Apabila akan mengadu ayam di tempat suci batasnya hanya 3 babak, tidak usah minta ijin kepada Kepala Tukang Kontrol, serta sawung tunggur tidak kena pinta
            pamali,
            10.Pada hari ke 9 bulan/sasih magha (kesanga) pertapaannya kelima pertapaan oleh Samgatwilang Patapan,
            11.Apabila ada yang menumpang dipertapaan, jika penyanyi, pemain angklung bambu, pemukul gambelan, meniup seruling, agar mengajukan parmesan kepada Nayakan,
            12.Caksu Pamwatan, Caksu Krangan, ada tukang emas, tukang besi,
            13.Tukang batu, tukang kayu, tukang aungan, pelukis, pemahat,
            14.Adapun lamanya berpisah dengan tetangganya ke empat tumpuk dari Raja yang dicandikan di Nger Madatu, sebab perceraian dengan seluruh penduduknya di Sukawati,
            15.Menyebabkan perpisahan Desa Baturan tersebut dengan Desa Sukawati itu, ke empat tumpuk sehingga mengakibatkan dibagi 3 drbya haji itu, Sebagian kepada Desa Baturan, 2 bagian kepada Desa Sukawati, ke 4 tumpuk drbya haji lainnya diperuntukan tempat Suci,
            16. Adapun jumlah tumpuk di Sukawati, ketumpukan Bangun Buddhi, Nur Madahan, Timbul, Gusali Putih,
            17.Demikian isi dan maksud anugrah Paduka Raja, terhadap Desa di Baturan sewilayahnya, agar menyebabkan tetap taat panatarannya di Desa di Baturan, sehingga mereka diberikan menjaga Prasasti Suci, agar tidak menentang terhadap Raja penggantinya untuk seterusnya,
            18.Di Baturan milik Sang Senapati dari Kuturan yang bernama Mapanji Putuputu, hutan belukar, di Subak Gurang Panggung di Baturan, dijadikan sawah oleh Si Pacarwan, Si Dana dan Subhumi, di Tapesan, Si Bragayan, di Sangsiwal Si Buru, Si Ibus di Batu Aji, Si Padang di Batu Hyang, Si Sambar, Si Pule, Si Kepundung di Gurang, Si Dopala, Cri Bawa, Si Jagul Si Yatna, di Nangka, Si Kupa di Rbun, Si Beneng di Sakar Batu Giantung,
            19. kemudian dibatasilah Desa Baturan ke 4 arah, batasnya sebelah Timur Air Morobog agak serong keselatan sampai Waringin berbelok sedikit ke barat sampai Waringin, batasnya sebelah Selatan hantap batasnya sebelah Barat Air Barngbeng, batasnya sebelah Utara Rangr berbelok-belok 15 kali lalu sampai di Air Morobog terus Rangr, demikianlah luas batas Desa Baturan sewilayahnya,
            20.Pura Puseh-Pura Desa sesuai informasi/penuturan dari orang tua/nenek\ moyang/leluhur, bahwa pura tersebut dibangun pada Tahun Caka 925 = Tahun 1.003 Masehi, berarti ada rentangan waktu saat Prasasti Desa Baturan dibuat dengan dibangunnya pura selama 19 tahun.
            <br><br>
            <p class="text-center">
                BATUAN, JULI 2022
            </p>
            <p class="text-center">
                PEMUPUL
            </p>
            </p>
        </div>
    </div>


    <div class="modal fade absolute-center p-5" id="modalfade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl bg-body">
            <!-- <p class="text-center text-dark" style="font-family: 'Roboto', sans-serif; font-weight: 700; font-size: 1rem;" id="content-modal">Sigapura</p> -->
            <iframe class="modal-content vh-100 d-none" id="content" title="Peliangan" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/4259554d77174a108af3ab4163f8ea66/embed"> </iframe>
            <image id="detail_image" src="assets/img/detail/shrine/<?= $ds['detail_image'] ?>" class="img-fluid rounded-lg d-none" style="height: 15rem; object-fit: cover;" />
            <div style="height: 5rem;"></div>

            <!-- name_object='" . $name_object . "',
            description_detail='" . $description_detail . "',
            description_visual = '" . $description_visual . "',
            year_of_creation = '" . $year_of_creation . "',
            period_of_creation = '" . $period_of_creation . "',
            name_creator = '" . $name_creator . "',
            creator_style = '" . $creator_style . "',
            main_material = '" . $main_material . "',
            additional_material = '" . $additional_material . "',
            creation_technique = '" . $creation_technique . "',
            ornament = '" . $ornament . "',
            length = '" . $length . "',
            height = '" . $height . "',
            width = '" . $width . "',
            weight = '" . $weight . "',
            volume = '" . $volume . "',
            physical_condition = '" . $physical_condition . "',
            level_of_damage = '" . $level_of_damage . "',
            country_location = '" . $country_location . "',
            district_location = '" . $district_location . "',
            subdistrict_location = '" . $subdistrict_location . "',
            village_location = '" . $village_location . "',
            functional = '" . $functional . "',
            ownership = '" . $ownership . "',
            ownership_history = '" . $ownership_history . "',
            historical_value = '" . $historical_value . "',
            cultural_value = '" . $cultural_value . "',
            aesthetic_value = '" . $aesthetic_value . "',
            economic_value = '" . $economic_value . "',
            link_shrine = '" . $link_shrine . "',
            image_shrine = '" . $image_shrine . "' -->

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Name
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <p id="name_object" class="col-8 d-flex align-items-center">
                    Name
                </p>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Description
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <p id="description_detail" class="col-8 d-flex align-items-center">
                    Description
                </p>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Description Visual
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <p id="description_visual" class="col-8 d-flex align-items-center">
                    Description Visual
                </p>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Year of Creation
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <p id="year_of_creation" class="col-8 d-flex align-items-center">
                    Year of Creation
                </p>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Period of Creation
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <p id="period_of_creation" class="col-8 d-flex align-items-center">
                    Period of Creation
                </p>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Name Creator
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <p id="name_creator" class="col-8 d-flex align-items-center">
                    Name Creator
                </p>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Creator Style
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <p id="creator_style" class="col-8 d-flex align-items-center">
                    Creator Style
                </p>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Main Material
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <p id="main_material" class="col-8 d-flex align-items-center">
                    Main Material
                </p>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Additional Material
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="additional_material" class="col-8 d-flex align-items-center">
                    Additional Material
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Creation Technique
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="creation_technique" class="col-8 d-flex align-items-center">
                    Creation Technique
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Ornament :
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="ornament" class="col-8 d-flex align-items-center">
                    Ornament
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Length
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="length" class="col-8 d-flex align-items-center">
                    Length
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Height
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="height" class="col-8 d-flex align-items-center">
                    Height
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Width
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="width" class="col-8 d-flex align-items-center">
                    Width
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Weight
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="weight" class="col-8 d-flex align-items-center">
                    Weight
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Volume
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="volume" class="col-8 d-flex align-items-center">
                    Volume
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Physical Condition
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="physical_condition" class="col-8 d-flex align-items-center">
                    Physical Condition
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Level of Damage
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="level_of_damage" class="col-8 d-flex align-items-center">
                    Level of Damage
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Country Location
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="country_location" class="col-8 d-flex align-items-center">
                    Country Location
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    District Location
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="district_location" class="col-8 d-flex align-items-center">
                    District Location
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Subdistrict Location
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="subdistrict_location" class="col-8 d-flex align-items-center">
                    Subdistrict Location
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Village Location
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="village_location" class="col-8 d-flex align-items-center">
                    Village Location
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Functional
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="functional" class="col-8 d-flex align-items-center">
                    Functional
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Ownership
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="ownership" class="col-8 d-flex align-items-center">
                    Ownership
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Ownership History
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="ownership_history" class="col-8 d-flex align-items-center">
                    Ownership History
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Historical Value
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="historical_value" class="col-8 d-flex align-items-center">
                    Historical Value
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Cultural Value
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="cultural_value" class="col-8 d-flex align-items-center">
                    Cultural Value
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Aesthetic Value
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="aesthetic_value" class="col-8 d-flex align-items-center">
                    Aesthetic Value
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Economic Value
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="economic_value" class="col-8 d-flex align-items-center">
                    Economic Value
                </div>
            </div>

            <!-- <div class="row px-5">
                                <div class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Link Shrine :
                </div>
                <div id="link_shrine" class="col-8 d-flex align-items-center">
                    Link Shrine
                </div>
            </div>

            <div class="row px-5">
                                <div class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Image Shrine :
                </div>
                <div id="image_shrine" class="col-8 d-flex align-items-center">
                    Image Shrine
                </div>
            </div> -->

            <div style="height: 2rem;"></div>
            <!-- Modal Header -->
            <!-- <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Modal Animasi Fade</h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        </div> -->
            <!-- Modal body -->
            <!-- <div class="modal-body">
                            Ini Adalah isi dari modal animasi fade
                        </div> -->
            <!-- Modal footer -->
            <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div> -->
            <!-- </div> -->
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>