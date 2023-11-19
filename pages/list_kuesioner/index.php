<?php
    session_start();
    if($_SESSION['status'] !="sudah_login"){
        header("location:../errorpage/403.php");
    }
    $page = "list_kuesioner";
    include '../../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamus Enggano</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../skins/mazer/demo/assets/css/bootstrap.css">

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
                            <h3>Questionnaire</h3>
                            <p class="text-subtitle text-muted">Kamus Bahasa Enggano</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Menu</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Questionnaire</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Data Stem
                        </div>
                        <div class="card-body">
						
                            <?php
                                if(isset($_GET['pesan'])){?>
                                    <div class="col-sm-12 text-center">
                                        <div class="alert alert-primary" style="margin-top:15px;"><?php echo $_GET['pesan']; ?></div>
                                    </div>
                            <?php }
                            ?>
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $qu = mysqli_query($koneksi, "SELECT *,(SELECT name FROM users WHERE id=usr_id) as name FROM z_kuisioner_user") or die(mysqli_errno($koneksi));
                                        while($du = mysqli_fetch_array($qu)){ ?>
                                        
                                            <tr>
                                                <td><?php echo $du["name"] ?></td>
                                                <td><?php echo $du["kuiu_date"] ?></td>
                                                <td>
                                                    <a href="viewData.php?usr_id=<?php echo $du["usr_id"];  ?>&kuiu_id=<?php echo $du["kuiu_id"]; ?>" title="View Data"><i class="bi bi-eye"></i> </a>
                                                    <a href="../../apps/kuesionerController.php?action=deleteData&usr_id=<?php echo $du["usr_id"];  ?>&kuiu_id=<?php echo $du["kuiu_id"]; ?>" title="Delete Data"><i class="bi bi-trash"></i> </a>
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
                        <p>2023 &copy; Kamus Bahasa Enggano</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="#">Team</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="../../skins/mazer/demo/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../../skins/mazer/demo/assets/js/bootstrap.bundle.min.js"></script>

    <script src="../../skins/mazer/demo/assets/vendors/toastify/toastify.js"></script>
    
    <script src="../../skins/mazer/demo/assets/js/main.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    </div>
</body>

</html>