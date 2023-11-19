<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
    header("location:../errorpage/403.php");
}
$page = "users";
include '../../config/config.php';
$qz = mysqli_query($koneksi, "SELECT * FROM users WHERE username='" . $_SESSION['username'] . "' ");
$dz = mysqli_fetch_array($qz);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamus Bahasa Enggano</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../skins/mazer/demo/assets/css/bootstrap.css">

    <link rel="stylesheet" href="../../skins/mazer/demo/assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="../../skins/mazer/demo/assets/vendors/toastify/toastify.css">

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
                            <!-- <a href="index.php"><img src="../../skins/mazer/demo/assets/images/logo/kamus_enggano.png" alt="Logo" srcset=""></a> -->
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
                            <h3>Management Users</h3>
                            <p class="text-subtitle text-muted">Sistem Digitalisasi Pelinggih</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Menu</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Manajemen Users</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Data User
                        </div>
                        <div class="card-body">
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-sm btn-primary pull-right" onclick="viewFormAdd()">Tambah User</button>
                                <button type="button" style="margin-left:10px;" class="btn btn-sm btn-success pull-right" onclick="viewFormAddMultiple()">Tambah User Multiple</button>
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
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>User Group</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $qu = mysqli_query($koneksi, "SELECT *, (SELECT ug_name FROM user_group WHERE ug_id=u.ug_id) as ug_name FROM users u") or die(mysqli_errno($koneksi));
                                    while ($du = mysqli_fetch_array($qu)) { ?>

                                        <tr>
                                            <td><?php echo $du["id"] ?></td>
                                            <td><?php echo $du["name"] ?></td>
                                            <td><?php echo $du["email"] ?></td>
                                            <td><?php echo $du["username"] ?></td>
                                            <td><?php echo $du["ug_name"] ?></td>
                                            <td><?php
                                                if ($du["status"] == "1") {
                                                    echo "<span class=\"badge bg-success\">Active</span>";
                                                } else {
                                                    echo "<span class=\"badge bg-danger\">Inactive</span>";
                                                } ?>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);" onclick="viewFormEdit(<?php echo $du['id']; ?>)"><i class="bi bi-pencil-square"></i> </a>
                                                <a href="../../apps/usersController.php?action=deleteData&id=<?php echo $du["id"];  ?>"><i class="bi bi-trash"></i> </a>
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
                <div class="modal-dialog modal-lg  modal-dialog-scrollable" role="document">
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
                                        <div class="col-md-3">
                                            <label>Nama</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Username</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Usern Group</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <select class="form-select" style="border-color:#435ebe; color:#000000;" id="ug_id" name="ug_id" aria-label="Default select example">
                                                <?php $qq = mysqli_query($koneksi, "SELECT * FROM users_group");
                                                while ($dd = mysqli_fetch_array($qq)) { ?>
                                                    <option value="<?php echo $dd["ug_id"] ?>"><?php echo $dd["ug_name"] ?></option>
                                                <?php        } ?>

                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Password</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Ulangi Password</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Ulangi Masukkan Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary ml-1">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Save</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal fade" id="modalmultiple" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg  modal-dialog-scrollable" role="document">
                    <form class="form form-horizontal" id="formmultiple" action="" method="POST">
                        <div class="form-body">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Tambah User Multiple</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row" style="margin-top:10px;">
                                        <div class="col-md-3">
                                            <label>Jumlah User</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah User yang akan dibut" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Prefix User</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" class="form-control" id="prefix" name="prefix" placeholder="Masukkan Prefix User" required>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <select class="form-select" style="border-color:#435ebe; color:#000000;" name="ug_id" aria-label="Default select example">
                                                <?php $qq = mysqli_query($koneksi, "SELECT * FROM users_group");
                                                while ($dd = mysqli_fetch_array($qq)) { ?>
                                                    <option value="<?php echo $dd["ug_id"] ?>"><?php echo $dd["ug_name"] ?></option>
                                                <?php        } ?>

                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label>Password</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                                        </div>
                                        <div class="col-md-3">
                                            <label>Ulangi Password</label>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Ulangi Masukkan Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button type="submit" class="btn btn-primary ml-1">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Save</span>
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
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="../../skins/mazer/demo/assets/js/main.js"></script>
    <script language="JavaScript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script languange="javascript">
        function viewFormAdd() {
            document.getElementById('form').reset();
            $('.modal-title').text('Tambah User');
            $('#form').attr('action', "../../apps/usersController.php?action=addData");
            $('#modal').modal('show');
        }

        function viewFormAddMultiple() {
            $('#formmultiple').attr('action', "../../apps/usersController.php?action=addDataMultiple");
            $('#modalmultiple').modal('show');
        }

        function viewFormEdit(id) {
            document.getElementById('form').reset();
            $.get("../../apps/usersController.php?action=showData&id=" + id, function(result) {
                var d = JSON.parse(result);
                $('.modal-title').text('Ubah Kategori Pengaduan');
                $('#form').attr('action', "../../apps/usersController.php?action=editData&id=" + id);

                $('#name').val(d.name);
                $('#email').val(d.email);
                $('#username').val(d.username);
                $('#ug_id').val(d.ug_id);
                document.getElementById('username').readOnly = true;
            });
            $('#modal').modal('show');
        }
    </script>
</body>

</html>