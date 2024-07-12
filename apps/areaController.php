<?php

session_start();
include '../config/config.php';

$action = $_GET["action"];
echo ($action);
if (($action == "")) {
    header("location:../pages/province/login.php");
} else {
    if ($action == "addDataProvince") {
        echo addDataProvince($_REQUEST);
    } elseif ($action == "deleteDataProvince") {
        echo deleteDataProvince($_REQUEST);
    } elseif ($action == "editDataProvince") {
        echo editDataProvince($_REQUEST);
    } elseif ($action == "addDataDistrict") {
        echo addDataDistrict($_REQUEST);
    } elseif ($action == "editDataDistrict") {
        echo editDataDistrict($_REQUEST);
    } elseif ($action == "deleteDataDistrict") {
        echo deleteDataDistrict($_REQUEST);
    } elseif ($action == "addDataSubDistrict") {
        echo addDataSubDistrict($_REQUEST);
    } elseif ($action == "editDataSubDistrict") {
        echo editDataSubDistrict($_REQUEST);
    } elseif ($action == "deleteDataSubDistrict") {
        echo deleteDataSubDistrict($_REQUEST);
    } elseif ($action == "addDataVillage") {
        echo addDataVillage($_REQUEST);
    } elseif ($action == "editDataVillage") {
        echo editDataVillage($_REQUEST);
    } elseif ($action == "deleteDataVillage") {
        echo deleteDataVillage($_REQUEST);
    } else {
        header("location:../pages/province/index.php?pesan=Action tidak terdaftar!");
    }
}

function addDataProvince($request)
{
    extract($request, EXTR_SKIP);
    include '../config/config.php';
    $error = "";
    if ($error == "") {
        $query = mysqli_query($koneksi, "START TRANSACTION;");
        $q = array();

        $q[] = mysqli_query($koneksi, "INSERT INTO province (name) VALUES 
                                                        ('" . $name . "');") or die(mysqli_error($koneksi));

        if (!is_int(array_search(false, $q))) {
            $query = mysqli_query($koneksi, "COMMIT;");
            if ($query) {
                header("location:../pages/province/index.php?pesan=Proses Sukses Dilakukan! <br>");
            } else {
                header("location:../pages/province/index.php?pesan=Proses Gagal Dilakukan! <br>");
            }
        } else {
            $query = mysqli_query($koneksi, "ROLLBACK;");
            header("location:../pages/province/index.php?pesan=Proses Gagal Dilakukan! <br>");
        }
    } else {
        header("location:../pages/province/index.php?pesan=" . $error . "");
    }
}

function editDataProvince($request)
{
    extract($request, EXTR_SKIP);
    include '../config/config.php';
    $error = "";
    if ($error == "") {
        $query = mysqli_query($koneksi, "START TRANSACTION;");
        $q = array();
        $q[] = mysqli_query($koneksi, "UPDATE province SET 
                                name='" . $name . "'
                                WHERE id=" . $id . " ;") or die(mysqli_errno($koneksi));

        if (!is_int(array_search(false, $q))) {
            $query = mysqli_query($koneksi, "COMMIT;");
            if ($query) {
                header("location:../pages/province/index.php?pesan=Proses Sukses Dilakukan! <br>");
            } else {
                header("location:../pages/province/index.php?pesan=Proses Gagal Dilakukan! <br>");
            }
        } else {
            $query = mysqli_query($koneksi, "ROLLBACK;");
            header("location:../pages/province/index.php?pesan=Proses Gagal Dilakukan! <br>");
        }
    } else {
        header("location:../pages/province/index.php?pesan=" . $error . "");
    }
}

function deleteDataProvince($request)
{
    extract($request, EXTR_SKIP);
    include '../config/config.php';
    $error = "";
    if ($error == "") {
        $query = mysqli_query($koneksi, "START TRANSACTION;");
        $q = array();

        $q[] = mysqli_query($koneksi, "DELETE FROM province WHERE id=" . $id . " ;") or die(mysqli_errno($koneksi));

        if (!is_int(array_search(false, $q))) {
            $query = mysqli_query($koneksi, "COMMIT;");
            if ($query) {
                header("location:../pages/province/index.php?pesan=Proses Sukses Dilakukan! <br>");
            } else {
                header("location:../pages/province/index.php?pesan=Proses Gagal Dilakukan! <br>");
            }
        } else {
            $query = mysqli_query($koneksi, "ROLLBACK;");
            header("location:../pages/province/index.php?pesan=Proses Gagal Dilakukan! <br>");
        }
    } else {
        header("location:../pages/province/index.php?pesan=" . $error . "");
    }
}

function addDataDistrict($request)
{
    extract($request, EXTR_SKIP);
    include '../config/config.php';
    $error = "";
    if ($error == "") {
        $query = mysqli_query($koneksi, "START TRANSACTION;");
        $q = array();

        $q[] = mysqli_query($koneksi, "INSERT INTO district (name) VALUES 
                                                        ('" . $name . "');") or die(mysqli_error($koneksi));

        if (!is_int(array_search(false, $q))) {
            $query = mysqli_query($koneksi, "COMMIT;");
            if ($query) {
                header("location:../pages/district/index.php?pesan=Proses Sukses Dilakukan! <br>");
            } else {
                header("location:../pages/district/index.php?pesan=Proses Gagal Dilakukan! <br>");
            }
        } else {
            $query = mysqli_query($koneksi, "ROLLBACK;");
            header("location:../pages/district/index.php?pesan=Proses Gagal Dilakukan! <br>");
        }
    } else {
        header("location:../pages/district/index.php?pesan=" . $error . "");
    }
}

function editDataDistrict($request)
{
    extract($request, EXTR_SKIP);
    include '../config/config.php';
    $error = "";
    if ($error == "") {
        $query = mysqli_query($koneksi, "START TRANSACTION;");
        $q = array();
        $q[] = mysqli_query($koneksi, "UPDATE district SET 
                                name='" . $name . "'
                                WHERE id=" . $id . " ;") or die(mysqli_errno($koneksi));

        if (!is_int(array_search(false, $q))) {
            $query = mysqli_query($koneksi, "COMMIT;");
            if ($query) {
                header("location:../pages/district/index.php?pesan=Proses Sukses Dilakukan! <br>");
            } else {
                header("location:../pages/district/index.php?pesan=Proses Gagal Dilakukan! <br>");
            }
        } else {
            $query = mysqli_query($koneksi, "ROLLBACK;");
            header("location:../pages/district/index.php?pesan=Proses Gagal Dilakukan! <br>");
        }
    } else {
        header("location:../pages/district/index.php?pesan=" . $error . "");
    }
}

function deleteDataDistrict($request)
{
    extract($request, EXTR_SKIP);
    include '../config/config.php';
    $error = "";
    if ($error == "") {
        $query = mysqli_query($koneksi, "START TRANSACTION;");
        $q = array();

        $q[] = mysqli_query($koneksi, "DELETE FROM district WHERE id=" . $id . " ;") or die(mysqli_errno($koneksi));

        if (!is_int(array_search(false, $q))) {
            $query = mysqli_query($koneksi, "COMMIT;");
            if ($query) {
                header("location:../pages/district/index.php?pesan=Proses Sukses Dilakukan! <br>");
            } else {
                header("location:../pages/district/index.php?pesan=Proses Gagal Dilakukan! <br>");
            }
        } else {
            $query = mysqli_query($koneksi, "ROLLBACK;");
            header("location:../pages/district/index.php?pesan=Proses Gagal Dilakukan! <br>");
        }
    } else {
        header("location:../pages/district/index.php?pesan=" . $error . "");
    }
}

function addDataSubDistrict($request)
{
    extract($request, EXTR_SKIP);
    include '../config/config.php';
    $error = "";
    if ($error == "") {
        $query = mysqli_query($koneksi, "START TRANSACTION;");
        $q = array();

        $q[] = mysqli_query($koneksi, "INSERT INTO sub_district (name, id_district) VALUES 
                                                        ('" . $name . "', '" . $id_district . "');") or die(mysqli_error($koneksi));

        if (!is_int(array_search(false, $q))) {
            $query = mysqli_query($koneksi, "COMMIT;");
            if ($query) {
                header("location:../pages/sub_district/index.php?pesan=Proses Sukses Dilakukan! <br>");
            } else {
                header("location:../pages/sub_district/index.php?pesan=Proses Gagal Dilakukan! <br>");
            }
        } else {
            $query = mysqli_query($koneksi, "ROLLBACK;");
            header("location:../pages/sub_district/index.php?pesan=Proses Gagal Dilakukan! <br>");
        }
    } else {
        header("location:../pages/sub_district/index.php?pesan=" . $error . "");
    }
}

function editDataSubDistrict($request)
{
    extract($request, EXTR_SKIP);
    include '../config/config.php';
    $error = "";
    if ($error == "") {
        $query = mysqli_query($koneksi, "START TRANSACTION;");
        $q = array();

        $q[] = mysqli_query($koneksi, "UPDATE sub_district SET 
                                name='" . $name . "',
                                id_district='" . $id_district . "'
                                WHERE id=" . $id . " ;") or die(mysqli_errno($koneksi));

        if (!is_int(array_search(false, $q))) {
            $query = mysqli_query($koneksi, "COMMIT;");
            if ($query) {
                header("location:../pages/sub_district/index.php?pesan=Proses Sukses Dilakukan! <br>");
            } else {
                header("location:../pages/sub_district/index.php?pesan=Proses Gagal Dilakukan! <br>");
            }
        } else {
            $query = mysqli_query($koneksi, "ROLLBACK;");
            header("location:../pages/sub_district/index.php?pesan=Proses Gagal Dilakukan! <br>");
        }
    } else {
        header("location:../pages/sub_district/index.php?pesan=" . $error . "");
    }
}

function deleteDataSubDistrict($request)
{
    extract($request, EXTR_SKIP);
    include '../config/config.php';
    $error = "";
    if ($error == "") {
        $query = mysqli_query($koneksi, "START TRANSACTION;");
        $q = array();

        $q[] = mysqli_query($koneksi, "DELETE FROM sub_district WHERE id=" . $id . " ;") or die(mysqli_errno($koneksi));

        if (!is_int(array_search(false, $q))) {
            $query = mysqli_query($koneksi, "COMMIT;");
            if ($query) {
                header("location:../pages/sub_district/index.php?pesan=Proses Sukses Dilakukan! <br>");
            } else {
                header("location:../pages/sub_district/index.php?pesan=Proses Gagal Dilakukan! <br>");
            }
        } else {
            $query = mysqli_query($koneksi, "ROLLBACK;");
            header("location:../pages/sub_district/index.php?pesan=Proses Gagal Dilakukan! <br>");
        }
    } else {
        header("location:../pages/sub_district/index.php?pesan=" . $error . "");
    }
}

function addDataVillage($request)
{
    extract($request, EXTR_SKIP);
    include '../config/config.php';
    $error = "";
    if ($error == "") {
        $query = mysqli_query($koneksi, "START TRANSACTION;");
        $q = array();

        $q[] = mysqli_query($koneksi, "INSERT INTO village (name, id_sub_district) VALUES 
                                                        ('" . $name . "', '" . $id_sub_district . "');") or die(mysqli_error($koneksi));

        if (!is_int(array_search(false, $q))) {
            $query = mysqli_query($koneksi, "COMMIT;");
            if ($query) {
                header("location:../pages/village/index.php?pesan=Proses Sukses Dilakukan! <br>");
            } else {
                header("location:../pages/village/index.php?pesan=Proses Gagal Dilakukan! <br>");
            }
        } else {
            $query = mysqli_query($koneksi, "ROLLBACK;");
            header("location:../pages/village/index.php?pesan=Proses Gagal Dilakukan! <br>");
        }
    } else {
        header("location:../pages/village/index.php?pesan=" . $error . "");
    }
}

function editDataVillage($request)
{
    extract($request, EXTR_SKIP);
    include '../config/config.php';
    $error = "";
    if ($error == "") {
        $query = mysqli_query($koneksi, "START TRANSACTION;");
        $q = array();
        $q[] = mysqli_query($koneksi, "UPDATE village SET 
                                name='" . $name . "',
                                id_sub_district='" . $id_sub_district . "'
                                WHERE id=" . $id . " ;") or die(mysqli_errno($koneksi));

        if (!is_int(array_search(false, $q))) {
            $query = mysqli_query($koneksi, "COMMIT;");
            if ($query) {
                header("location:../pages/village/index.php?pesan=Proses Sukses Dilakukan! <br>");
            } else {
                header("location:../pages/village/index.php?pesan=Proses Gagal Dilakukan! <br>");
            }
        } else {
            $query = mysqli_query($koneksi, "ROLLBACK;");
            header("location:../pages/village/index.php?pesan=Proses Gagal Dilakukan! <br>");
        }
    } else {
        header("location:../pages/village/index.php?pesan=" . $error . "");
    }
}

function deleteDataVillage($request)
{
    extract($request, EXTR_SKIP);
    include '../config/config.php';
    $error = "";
    if ($error == "") {
        $query = mysqli_query($koneksi, "START TRANSACTION;");
        $q = array();

        $q[] = mysqli_query($koneksi, "DELETE FROM village WHERE id=" . $id . " ;") or die(mysqli_errno($koneksi));

        if (!is_int(array_search(false, $q))) {
            $query = mysqli_query($koneksi, "COMMIT;");
            if ($query) {
                header("location:../pages/village/index.php?pesan=Proses Sukses Dilakukan! <br>");
            } else {
                header("location:../pages/village/index.php?pesan=Proses Gagal Dilakukan! <br>");
            }
        } else {
            $query = mysqli_query($koneksi, "ROLLBACK;");
            header("location:../pages/village/index.php?pesan=Proses Gagal Dilakukan! <br>");
        }
    } else {
        header("location:../pages/village/index.php?pesan=" . $error . "");
    }
}
