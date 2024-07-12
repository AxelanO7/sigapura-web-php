<?php
// menghubungkan dengan koneksi
$action = $_GET["action"];
if (($action == "")) {
    header("location:../pages/users/index.php");
} else {
    if ($action == "addData") {
        echo addData($_REQUEST);
    } elseif ($action == "addDataMultiple") {
        echo addDataMultiple($_REQUEST);
    } elseif ($action == "deleteData") {
        echo deleteData($_REQUEST);
    } elseif ($action == "showData") {
        echo showData($_REQUEST);
    } elseif ($action == "editData") {
        echo editData($_REQUEST);
    } elseif ($action == "getSubDistrict") {
        echo getSubDistrict($_REQUEST);
    } elseif ($action == "getVillage") {
        echo getVillage($_REQUEST);
    } else {
        header("location:../pages/users/index.php?pesan=Action tidak terdaftar!");
    }
}


function getElement3D($name_req)
{
    $listElement = array(
        (object)[
            'name' => 'Balai Paingkupan',
            'element' => 'https://sketchfab.com/models/795a1df24ebf4f088f57d434db20b9e7/embed',
        ],
        (object)[
            'name' => 'Gedong Angelurah Gumi',
            'element' => 'https://sketchfab.com/models/a96b9a013bc44aa98c967a70c6b1d712/embed',
        ],
        (object)[
            'name' => 'Peliangan',
            'element' => 'https://sketchfab.com/models/4259554d77174a108af3ab4163f8ea66/embed',
        ],
        (object)[
            'name' => 'Pelinggih Apit Lawang B',
            'element' => 'https://sketchfab.com/models/d2d2007d29364772b75b657f0ad43dea/embed',
        ],
        (object)[
            'name' => 'Pelinggih Apit Lawang Kiri',
            'element' => 'https://sketchfab.com/models/dd0f3b9071c5402a80887aa87ccb0195/embed',
        ],
        (object)[
            'name' => 'Pelinggih Bhatara Tri Upasedhana',
            'element' => 'https://sketchfab.com/models/76a1fb3c658a4dfab8b069cc54fca628/embed',
        ],
        (object)[
            'name' => 'Pelinggih Bhatari Sedana',
            'element' => 'https://sketchfab.com/models/92479ebea52348358c5d9e2dc9b4e01d/embed',
        ],
        (object)[
            'name' => 'Pelinggih Gedong Sari',
            'element' => 'https://sketchfab.com/models/7712008a5f084698b74723e12f4bf368/embed',
        ],
        (object)[
            'name' => 'Pelinggih Ida Ratu Atma',
            'element' => 'https://sketchfab.com/models/f31b16515cdf46d58a7406f9a4caa12e/embed',
        ],
        (object)[
            'name' => 'Pengaruman Arip Ratu Desa',
            'element' => 'https://sketchfab.com/models/5f6e7bd090904c3cbbc888ac35869d14/embed',
        ],
        (object)[
            'name' => 'Ratu Alit',
            'element' => 'https://sketchfab.com/models/1cef7b39c96342d0922f71f5368273d1/embed',
        ],
        (object)[
            'name' => 'Ratu Madeg',
            'element' => 'https://sketchfab.com/models/4d08662b2ca84e488a6d68a8b1d54ed2/embed',
        ],
        (object)[
            'name' => 'Ratu Nini Basukih',
            'element' => 'https://sketchfab.com/models/05d058fa6e4742deb130450574599f53/embed',
        ],
        (object)[
            'name' => 'Ratu Pande',
            'element' => 'https://sketchfab.com/models/efc356aa669c44bc9bf4c1c5a0d85801/embed',
        ],
        (object)[
            'name' => 'Ratu Pecatu Pasek',
            'element' => 'https://sketchfab.com/models/a39acfd96b324721852f2c4bb9656562/embed',
        ],
    );
    // $listElement = array(
    //     (object)[
    //         'name' => 'Balai Paingkupan',
    //         'element' => '<iframe class="modal-content min-vh-100" title="Balai Paingkupan" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/795a1df24ebf4f088f57d434db20b9e7/embed"> </iframe>'
    //     ],
    //     (object)[
    //         'name' => 'Gedong Angelurah Gumi',
    //         'element' => '<iframe class="modal-content min-vh-100" title="Gedong Angelurah Gumi" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/a96b9a013bc44aa98c967a70c6b1d712/embed"> </iframe>',
    //     ],
    //     (object)[
    //         'name' => 'Peliangan',
    //         'element' => '<iframe class="modal-content min-vh-100" title="Peliangan" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/4259554d77174a108af3ab4163f8ea66/embed"> </iframe>',
    //     ],
    //     (object)[
    //         'name' => 'Pelinggih Apit Lawang B',
    //         'element' => '<iframe class="modal-content min-vh-100" title="Pelinggih Apit Lawang B" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/d2d2007d29364772b75b657f0ad43dea/embed"> </iframe>',
    //     ],
    //     (object)[
    //         'name' => 'Pelinggih Apit Lawang Kiri',
    //         'element' => '<iframe class="modal-content min-vh-100" title="Pelinggih Apit Lawang Kiri" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/dd0f3b9071c5402a80887aa87ccb0195/embed"> </iframe>',
    //     ],
    //     (object)[
    //         'name' => 'Pelinggih Bhatara Tri Upasedhana',
    //         'element' => '<iframe class="modal-content min-vh-100" title="Pelinggih Bhatara Tri Upasedhana" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/76a1fb3c658a4dfab8b069cc54fca628/embed"> </iframe>',
    //     ],
    //     (object)[
    //         'name' => 'Pelinggih Bhatari Sedana',
    //         'element' => '<iframe class="modal-content min-vh-100" title="Pelinggih Bhatari Sedana" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/92479ebea52348358c5d9e2dc9b4e01d/embed"> </iframe>',
    //     ],
    //     (object)[
    //         'name' => 'Pelinggih Gedong Sari',
    //         'element' => '<iframe class="modal-content min-vh-100" title="Pelinggih Gedong Sari" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/7712008a5f084698b74723e12f4bf368/embed"> </iframe>',
    //     ],
    //     (object)[
    //         'name' => 'Pelinggih Ida Ratu Atma',
    //         'element' => '<iframe class="modal-content min-vh-100" title="Pelinggih Ida Ratu Atma" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/f31b16515cdf46d58a7406f9a4caa12e/embed"> </iframe>',
    //     ],
    //     (object)[
    //         'name' => 'Pengaruman Arip Ratu Desa',
    //         'element' => '<iframe class="modal-content min-vh-100" title="Pengaruman Arip Ratu Desa" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/5f6e7bd090904c3cbbc888ac35869d14/embed"> </iframe>',
    //     ],
    //     (object)[
    //         'name' => 'Ratu Alit',
    //         'element' => '<iframe class="modal-content min-vh-100" title="Ratu Alit" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/1cef7b39c96342d0922f71f5368273d1/embed"> </iframe>',
    //     ],
    //     (object)[
    //         'name' => 'Ratu Madeg',
    //         'element' => '<iframe class="modal-content min-vh-100" title="Ratu Madeg" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/4d08662b2ca84e488a6d68a8b1d54ed2/embed"> </iframe>',
    //     ],
    //     (object)[
    //         'name' => 'Ratu Nini Basukih',
    //         'element' => '<iframe class="modal-content min-vh-100" title="Ratu Nini Basukih" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/05d058fa6e4742deb130450574599f53/embed"> </iframe>',
    //     ],
    //     (object)[
    //         'name' => 'Ratu Pande',
    //         'element' => '<iframe class="modal-content min-vh-100" title="Ratu Pande" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/efc356aa669c44bc9bf4c1c5a0d85801/embed"> </iframe>',
    //     ],
    //     (object)[
    //         'name' => 'Ratu Pecatu Pasek',
    //         'element' => '<iframe class="modal-content min-vh-100" title="Ratu Pecatu Pasek" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/a39acfd96b324721852f2c4bb9656562/embed"> </iframe>',
    //     ],
    // );

    $element = "";
    foreach ($listElement as $key => $value) {
        if ($value->name == $name_req) {
            $element = $value->element;
        }
    }
    return $element;
}

function showData($request)
{
    extract($request, EXTR_SKIP);
    include '../config/config.php';
    //cek validasi
    $error = "";
    if ($id == "") {
        $error .= "Id user tidak ditemukan! <br>";
    }
    if ($error == "") {
        $query = mysqli_query($koneksi, "SELECT * FROM users WHERE id=" . $id . " ");
        $result = mysqli_fetch_array($query);
        return json_encode($result);
    } else {
        header("location:../pages/users/index.php?pesan=" . $error . "");
    }
}
function addData($request)
{
    $error = "";
    if (isset($_FILES['image_shrine'])) {
        $image_name = $_FILES['image_shrine']['name'];
        $tmp = $_FILES['image_shrine']['tmp_name'];
        $path = "../assets/img/shrine/" . $image_name;
        $request['image_shrine'] = $image_name;
        if (file_exists($path)) {
            // $error .= "Gambar sudah ada, silahkan ganti dengan gambar lain. <br>";
            unlink($path);
            move_uploaded_file($tmp, $path);
        } else {
            move_uploaded_file($tmp, $path);
        }
    }

    if (isset($_FILES['image_detail'])) {
        $image_detail_name = $_FILES['image_detail']['name'];
        $tmp = $_FILES['image_detail']['tmp_name'];
        $path = "../assets/img/detail/shrine/" . $image_detail_name;
        $request['image_detail'] = $image_detail_name;
        if (file_exists($path)) {
            // $error .= "Gambar sudah ada, silahkan ganti dengan gambar lain. <br>";
            unlink($path);
            move_uploaded_file($tmp, $path);
        } else {
            move_uploaded_file($tmp, $path);
        }
    }


    extract($request, EXTR_SKIP);
    include '../config/config.php';

    if ($error == "") {
        $query = mysqli_query($koneksi, "START TRANSACTION;");
        $q = array();

        $name_request = $request['link_shrine'];
        $request['link_shrine'] = getElement3D($name_request);
        $request['country_location'] = 'Indonesia';
        $country_location = $request['country_location'];
        $link_shrine = $request['link_shrine'];



        $q[] = mysqli_query($koneksi, "INSERT INTO shrines (name_object, description_detail, description_visual, year_of_creation, period_of_creation, name_creator, creator_style, main_material, additional_material, creation_technique, ornament, length, height, width, weight, volume, physical_condition, level_of_damage, country_location, district_location, subdistrict_location, village_location, functional, ownership, ownership_history, historical_value, cultural_value, aesthetic_value, economic_value, link_shrine, image_shrine, image_detail) VALUES 
                                                        ('" . $name_object . "','" . $description_detail . "','" . $description_visual . "','" . $year_of_creation . "','" . $period_of_creation . "','" . $name_creator . "','" . $creator_style . "','" . $main_material . "','" . $additional_material . "','" . $creation_technique . "','" . $ornament . "','" . $length . "','" . $height . "','" . $width . "','" . $weight . "','" . $volume . "','" . $physical_condition . "','" . $level_of_damage . "','" . $country_location . "','" . $district_location . "','" . $subdistrict_location . "','" . $village_location . "','" . $functional . "','" . $ownership . "','" . $ownership_history . "','" . $historical_value . "','" . $cultural_value . "','" . $aesthetic_value . "','" . $economic_value . "', '" . $link_shrine . "','" . $image_shrine . "','" . $image_detail . "');") or die(mysqli_error($koneksi));
        if (!is_int(array_search(false, $q))) {
            $query = mysqli_query($koneksi, "COMMIT;");
            if ($query) {
                header("location:../pages/populate_details/index.php?pesan=Proses Sukses Dilakukan! <br>");
            } else {
                header("location:../pages/populate_details/index.php?pesan=Proses Gagal Dilakukan! <br>");
            }
        } else {
            $query = mysqli_query($koneksi, "ROLLBACK;");
            header("location:../pages/populate_details/index.php?pesan=Proses Gagal Dilakukan! <br>");
        }
    } else {
        header("location:../pages/populate_details/index.php?pesan=" . $error . "");
    }
}

function editData($request)
{
    $error = "";
    // if ($name == "") {
    //     $error .= "Nama tidak boleh kosong! <br>";
    // }
    // if ($email == "") {
    //     $error .= "Email tidak boleh kosong! <br>";
    // } else {
    //     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //         $error .= $email . " : email yang diinput tidak valid <br>";
    //     }
    // }
    // $qpassword = "";
    // if ($password == "") {
    //     $qpassword = "";
    // } else {
    //     if ($password != $repassword) {
    //         $error .= "Password tidak sama!, Silahkan diulangi. <br>";
    //     } else {
    //         $qpassword = ",password = '" . md5($password) . "'";
    //     }
    // }

    if (isset($_FILES['image_shrine'])) {
        $image_name = $_FILES['image_shrine']['name'];
        $tmp = $_FILES['image_shrine']['tmp_name'];
        $path = "../assets/img/shrine/" . $image_name;
        $request['image_shrine'] = $image_name;
        if (file_exists($path)) {
            unlink($path);
            move_uploaded_file($tmp, $path);
        } else {
            move_uploaded_file($tmp, $path);
        }
    }

    if (isset($_FILES['image_detail'])) {
        $image_detail_name = $_FILES['image_detail']['name'];
        $tmp = $_FILES['image_detail']['tmp_name'];
        $path = "../assets/img/detail/shrine/" . $image_detail_name;
        $request['image_detail'] = $image_detail_name;
        if (file_exists($path)) {
            unlink($path);
            move_uploaded_file($tmp, $path);
        } else {
            move_uploaded_file($tmp, $path);
        }
    }

    extract($request, EXTR_SKIP);
    include '../config/config.php';

    if ($error == "") {
        $query = mysqli_query($koneksi, "START TRANSACTION;");
        $q = array();

        $name_request = $request['link_shrine'];
        $request['link_shrine'] = getElement3D($name_request);
        $request['country_location'] = 'Indonesia';
        $country_location = $request['country_location'];
        $link_shrine = $request['link_shrine'];

        // add image shrine
        if (isset($_FILES['image_shrine'])) {
            $image_shrine = $_FILES['image_shrine']['name'];
            $tmp = $_FILES['image_shrine']['tmp_name'];
            $path = "../assets/img/shrine/" . $image_shrine;
            move_uploaded_file($tmp, $path);
        }

        $q[] = mysqli_query($koneksi, "UPDATE shrines SET 
                                name_object='" . $name_object . "', 
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
                                image_shrine = '" . $image_shrine . "'
                                image_detail = '" . $image_detail . "'
                                WHERE id=" . $id . " ;") or die(mysqli_errno($koneksi));

        if (!is_int(array_search(false, $q))) {
            $query = mysqli_query($koneksi, "COMMIT;");
            if ($query) {
                header("location:../pages/users/index.php?pesan=Proses Sukses Dilakukan! <br>");
            } else {
                header("location:../pages/users/index.php?pesan=Proses Gagal Dilakukan! <br>");
            }
        } else {
            $query = mysqli_query($koneksi, "ROLLBACK;");
            header("location:../pages/users/index.php?pesan=Proses Gagal Dilakukan! <br>");
        }
    } else {
        header("location:../pages/users/index.php?pesan=" . $error . "");
    }
}

function addDataMultiple($request)
{
    //print_r($request);
    extract($request, EXTR_SKIP);
    include '../config/config.php';
    //cek validasi
    $error = "";
    if ($jumlah == "") {
        $error .= "Jumlah user yang akan dibuat tidak boleh kosong! <br>";
    }
    if ($prefix == "") {
        $error .= "Prefix User tidak boleh kosong! <br>";
    } else {
        $sql = mysqli_query($koneksi, "SELECT * FROM users WHERE username='" . $prefix . "001' ");
        $cek = mysqli_num_rows($sql);
        if ($cek > 0) {
            $error .= "Username sudah terdaftar dalam sistem, silahkan menggunakan username yang lain. <br>";
        }
    }
    if ($password == "") {
        $error .= "Password tidak boleh kosong! <br>";
    } else {
        if ($password != $repassword) {
            $error .= "Password tidak sama!, Silahkan diulangi. <br>";
        }
    }
    if ($error == "") {
        $query = mysqli_query($koneksi, "START TRANSACTION;");
        $q = array();
        for ($k = 0; $k < $jumlah; $k++) {
            $inc = str_pad(($k + 1), 3, "0", STR_PAD_LEFT);
            $q[] = mysqli_query($koneksi, "INSERT INTO users (name, email, username, password, status) VALUES 
                                ('" . ucfirst($prefix) . "_" . $inc . "','admin@kamus.web.oss.id','" . $prefix . "_" . $inc . "','" . md5($password) . "',1);") or die(mysqli_errno($koneksi));
        }

        if (!is_int(array_search(false, $q))) {
            $query = mysqli_query($koneksi, "COMMIT;");
            if ($query) {
                header("location:../pages/users/index.php?pesan=Proses Sukses Dilakukan! <br>");
            } else {
                header("location:../pages/users/index.php?pesan=Proses Gagal Dilakukan! <br>");
            }
        } else {
            $query = mysqli_query($koneksi, "ROLLBACK;");
            header("location:../pages/users/index.php?pesan=Proses Gagal Dilakukan! <br>");
        }
    } else {
        header("location:../pages/users/index.php?pesan=" . $error . "");
    }
}

function deleteData($request)
{
    //print_r($request);
    extract($request, EXTR_SKIP);
    include '../config/config.php';
    //cek validasi
    $error = "";
    if ($id == "") {
        $error .= "ID tidak ditemukan! <br>";
    }

    if ($error == "") {
        $query = mysqli_query($koneksi, "START TRANSACTION;");
        $q = array();

        $q[] = mysqli_query($koneksi, "DELETE FROM shrines WHERE id=" . $id . " ;") or die(mysqli_errno($koneksi));

        if (!is_int(array_search(false, $q))) {
            $query = mysqli_query($koneksi, "COMMIT;");
            if ($query) {
                header("location:../pages/populate_details/index.php?pesan=Proses Sukses Dilakukan! <br>");
            } else {
                header("location:../pages/populate_details/index.php?pesan=Proses Gagal Dilakukan! <br>");
            }
        } else {
            $query = mysqli_query($koneksi, "ROLLBACK;");
            header("location:../pages/users/index.php?pesan=Proses Gagal Dilakukan! <br>");
        }
    } else {
        header("location:../pages/users/index.php?pesan=" . $error . "");
    }
}

function getSubDistrict($request)
{
    extract($request, EXTR_SKIP);
    include '../config/config.php';
    $id = $request['district_id'];
    $qe = mysqli_query($koneksi, "SELECT * FROM sub_district WHERE id_district = '$id'");
    $de = mysqli_fetch_array($qe);
    do {
        echo "<option value='$de[id]'>$de[name]</option>";
    } while ($de = mysqli_fetch_array($qe));
}

function getVillage($request)
{
    extract($request, EXTR_SKIP);
    include '../config/config.php';
    $id = $request['subdistrict_id'];
    $qe = mysqli_query($koneksi, "SELECT * FROM village WHERE id_sub_district = '$id'");
    $de = mysqli_fetch_array($qe);
    do {
        echo "<option value='$de[id]'>$de[name]</option>";
    } while ($de = mysqli_fetch_array($qe));
}
