<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
    header("location:../errorpage/403.php");
}
$page = "sub_district";
include '../../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sigapura</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../skins/mazer/demo/assets/css/bootstrap.css">

    <link rel="stylesheet" href="../../skins/mazer/demo/assets/vendors/toastify/toastify.css">
    <link rel="stylesheet" href="../../skins/mazer/demo/assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="../../skins/mazer/demo/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../../skins/mazer/demo/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../../skins/mazer/demo/assets/css/app.css">
    <link rel="shortcut icon" href="../../skins/mazer/demo/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.php"><img src="../../skins/mazer/demo/assets/images/logo/sigapura.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <?php
                    include '../layout/menu.php';
                    ?>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Management Kecamatan</h3>
                            <p class="text-subtitle text-muted">Sistem Digitalisasi Pelinggih</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Menu</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Management Kecamatan</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <div class="alert alert-primary">Data Kecamatan</div>
                        </div>
                        <div class="card-body">
                            <?php if ($dz["ug_id"] != 1) { ?>
                                <form class="form form-horizontal" action="index.php" method="POST">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label style="color:#435ebe">Filter Kecamatan</label>
                                                    </div>
                                                    <div class="col-md-7 form-group">
                                                        <select class="form-select" style="border-color:#435ebe; color:#000000;" name="filter" aria-label="Default select example">
                                                            <option value="">Input by Me</option>
                                                            <option value="all" <?php if ($_POST["filter"] == "all") echo "selected" ?>>Input by all Users</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php } ?>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <a href="formAdd.php">
                                    <button type="button" class="btn btn-sm btn-primary pull-right">Add Kecamatan</button>
                                </a>
                            </div>
                            <?php
                            if (isset($_GET['pesan'])) { ?>
                                <div class="col-sm-12 text-center">
                                    <div class="alert alert-primary" style="margin-top:15px;"><?php echo $_GET['pesan']; ?></div>
                                </div>
                            <?php }
                            ?>
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kota / Kabupaten</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $filter = "";
                                    if ($dz["ug_id"] != "1") {
                                        $filter = "WHERE create_by='" . $dz["id"] . "' ";
                                        if ($_POST["filter"] == "all") {
                                            $filter = "";
                                        }
                                    }
                                    // $qu = mysqli_query($koneksi, "SELECT *,(SELECT name FROM users WHERE id=create_by) as name FROM stem ".$filter." ") or die(mysqli_errno());
                                    // $qu = mysqli_query($koneksi, "SELECT *,(SELECT nama FROM visitor WHERE id=name_creator) as name FROM visitor ".$filter." ") or die(mysqli_errno($koneksi));
                                    $qu = mysqli_query($koneksi, "SELECT * FROM sub_district");
                                    $no = 1;
                                    while ($du = mysqli_fetch_array($qu)) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $du["name"] ?></td>
                                            <td>
                                                <?php
                                                $qu2 = mysqli_query($koneksi, "SELECT * FROM district WHERE id='" . $du["id_district"] . "'") or die(mysqli_errno($koneksi));
                                                $du2 = mysqli_fetch_array($qu2);
                                                echo $du2["name"];
                                                ?>
                                            </td>
                                            <td>
                                                <a href="formEdit.php?id=<?php echo $du["id"];  ?>" title="Edit Data"><i class="bi bi-pencil-square"></i> </a>
                                                <a href="viewData.php?id=<?php echo $du["id"];  ?>" title="View Data"><i class="bi bi-eye"></i> </a>
                                                <a href="javascript:void(0);" onclick="viewFormDelete('<?php echo $du["id"]; ?>')"><i class="bi bi-trash"></i> </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2023 &copy; Sistem Digitalisasi Pelinggih</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="#">Team</a></p>
                    </div>
                </div>
            </footer>

            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
                    <form class="form form-horizontal" id="form" action="" method="POST">
                        <div class="form-body">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row" style="margin-top:10px;">
                                        <div class="col-md-12">
                                            Apakah Anda Yakin Menghapus Data Ini?
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Cancel</span>
                                    </button>
                                    <button type="submit" class="btn btn-danger ml-1">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Delete</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../../skins/mazer/demo/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../skins/mazer/demo/assets/js/bootstrap.bundle.min.js"></script>

    <script src="../../skins/mazer/demo/assets/vendors/toastify/toastify.js"></script>
    <script src="../../skins/mazer/demo/assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script language="JavaScript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script languange="javascript">
        function viewFormDelete(id) {
            document.getElementById('form').reset();
            $('.modal-title').text('Delete Data');
            $('#form').attr('action', "../../apps/areaController.php?action=deleteDataSubDistrict&id=" + id);
            $('#modal').modal('show');
        }
    </script>
    </div>
</body>

</html>