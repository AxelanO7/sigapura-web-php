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
    } else {
        header("location:../pages/users/index.php?pesan=Action tidak terdaftar!");
    }
}
function showData($request)
{
    //print_r($request);
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
    //print_r($request);
    extract($request, EXTR_SKIP);
    include '../config/config.php';
    //cek validasi
    $error = "";
    // if ($kms_Alphabet == "") {
    //     $error .= "Alphabet tidak boleh kosong! <br>";
    // }
    // if ($kms_Stem == "") {
    //     $error .= "Stem tidak boleh kosong! <br>";
    // }
    // if ($kms_stem_page == "") {
    //     $kms_stem_page = 0;
    // }
    if ($error == "") {
        $query = mysqli_query($koneksi, "START TRANSACTION;");
        $q = array();

        // 'name_object
        // 'description_detail
        // 'description_visual
        // 'year_of_creation
        // 'period_of_creation
        // 'name_creator
        // 'creator_style
        // 'main_material
        // 'additional_material
        // 'creation_technique
        // 'ornament
        // 'length
        // 'height
        // 'width
        // 'weight
        // 'volume
        // 'physical_condition
        // 'level_of_damage
        // 'country_location
        // 'district_location
        // 'subdistrict_location
        // 'village_location
        // 'functional
        // 'ownership
        // 'ownership_history
        // 'historical_value
        // 'cultural_value
        // 'aesthetic_value
        // 'economic_value

        $q[] = mysqli_query($koneksi, "INSERT INTO shrines (name_object, description_detail, description_visual, year_of_creation, period_of_creation, name_creator, creator_style, main_material, additional_material, creation_technique, ornament, length, height, width, weight, volume, physical_condition, level_of_damage, country_location, district_location, subdistrict_location, village_location, functional, ownership, ownership_history, historical_value, cultural_value, aesthetic_value, economic_value) VALUES 
                                                        ('" . $name_object . "','" . $description_detail . "','" . $description_visual . "','" . $year_of_creation . "','" . $period_of_creation . "','" . $name_creator . "','" . $creator_style . "','" . $main_material . "','" . $additional_material . "','" . $creation_technique . "','" . $ornament . "','" . $length . "','" . $height . "','" . $width . "','" . $weight . "','" . $volume . "','" . $physical_condition . "','" . $level_of_damage . "','" . $country_location . "','" . $district_location . "','" . $subdistrict_location . "','" . $village_location . "','" . $functional . "','" . $ownership . "','" . $ownership_history . "','" . $historical_value . "','" . $cultural_value . "','" . $aesthetic_value . "','" . $economic_value . "');") or die(mysqli_error($koneksi));



        // $q[] = mysqli_query($koneksi, "INSERT INTO kamus (kms_Alphabet, kms_Stem, kms_stem_homonymID, kms_stem_remarks_optional, kms_stem_variant, 
        //                                                 kms_stem_dialect_variant, kms_stem_source_form, kms_sourceForm_homonymID, kms_stem_etym_lang, 
        //                                                 kms_stem_etym_form, kms_stem_etym_German, kms_stem_crossRef, kms_stem_German, kms_stem_English,
        //                                                 kms_stem_German_crossRef, kms_stem_loanword_lang, kms_stem_loanword_form, kms_examples, kms_examples_variant, 
        //                                                 kms_examples_German, kms_examples_German_crossRef, kms_examples_English, kms_example_etym_lang, 
        //                                                 kms_example_etym_form, kms_stem_page) VALUES 
        //                                                 ('".$kms_Alphabet."','".$kms_Stem."','".$kms_stem_homonymID."','".$kms_stem_remarks_optional."','".$kms_stem_variant."',
        //                                                 '".$kms_stem_dialect_variant."','".$kms_stem_source_form."','".$kms_sourceForm_homonymID."','".$kms_stem_etym_lang."',
        //                                                 '".$kms_stem_etym_form."','".$kms_stem_etym_German."','".$kms_stem_crossRef."','".$kms_stem_German."','".$kms_stem_English."',
        //                                                 '".$kms_stem_German_crossRef."','".$kms_stem_loanword_lang."','".$kms_stem_loanword_form."','".$kms_examples."','".$kms_examples_variant."',
        //                                                 '".$kms_examples_German."','".$kms_examples_German_crossRef."','".$kms_examples_English."','".$kms_example_etym_lang."',
        //                                                 '".$kms_example_etym_form."',".$kms_stem_page.");") or die (mysqli_error($koneksi));	

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
    //print_r($request);
    extract($request, EXTR_SKIP);
    include '../config/config.php';
    //cek validasi
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
    if ($error == "") {
        $query = mysqli_query($koneksi, "START TRANSACTION;");
        $q = array();

        // $q[] = mysqli_query($koneksi, "UPDATE users SET 
        //                         name='" . $name . "', 
        //                         email='" . $email . "', 
        //                         username = '" . $username . "'
        //                         WHERE id=" . $id . " ;") or die(mysqli_errno($koneksi));

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
                                economic_value = '" . $economic_value . "'
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
