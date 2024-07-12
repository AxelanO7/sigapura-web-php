<?php
    session_start();
    if($_SESSION['status'] !="sudah_login"){
        header("location:../errorpage/403.php");
    }
    $page = "searching";
    //include ("thk_ontology.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kamus Bahasa Bali</title>

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
                            <a href="index.php"><img src="../../skins/mazer/demo/assets/images/logo/logo-kamus.png" alt="Logo" srcset=""></a>
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
                            <h3>Searching</h3>
                            <p class="text-subtitle text-muted">Kamus Bahasa Bali</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Menu</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Searching</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Input Kata yang akan di cari!</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form form-horizontal" action="../../apps/searchingController.php" method="POST">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Pilih jenis kata</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input type="radio" class="btn-check" name="type" value="kasar" id="kasar" autocomplete="off">
                                                    <label class="btn btn-outline-primary btn-sm" for="kasar">Kasar</label>

                                                    <input type="radio" class="btn-check" name="type" name="kesamen" id="kesamen" autocomplete="off">
                                                    <label class="btn btn-outline-secondary btn-sm" for="kesamen">Kesamen</label>

                                                    <input type="radio" class="btn-check" name="type" name="sor" id="sor" autocomplete="off">
                                                    <label class="btn btn-outline-success btn-sm" for="sor">Sor</label>

                                                    <input type="radio" class="btn-check" name="type" name="mider" id="mider" autocomplete="off">
                                                    <label class="btn btn-outline-danger btn-sm" for="mider">Mider</label>

                                                    <input type="radio" class="btn-check" name="type" name="madia" id="madia" autocomplete="off">
                                                    <label class="btn btn-outline-warning btn-sm" for="madia">Madia</label>

                                                    <input type="radio" class="btn-check" name="type" name="singgih" id="singgih" autocomplete="off">
                                                    <label class="btn btn-outline-info btn-sm" for="singgih">Singgih</label>

                                                    <input type="radio" class="btn-check" name="type" name="id" id="id" autocomplete="off">
                                                    <label class="btn btn-outline-dark btn-sm" for="id">ID</label>

                                                    <input type="radio" class="btn-check" name="type" name="en" id="en" autocomplete="off">
                                                    <label class="btn btn-outline-primary btn-sm" for="en">EN</label>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top:10px;">
                                                <div class="col-md-3">
                                                    <label>Masukkan kata</label>
                                                </div>
                                                <div class="col-md-9 form-group">
                                                    <input type="text" class="form-control" id="basa_kasar" name="basa_kasar" placeholder="Masukkan kata yang akan dicari!">
                                                </div>
                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Results</h4>
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-primary">
                                        <h4 class="alert-heading" style="font-size: 1.2rem; margin-bottom: .2rem;">Basa Kesamen</h4>
                                        <p>This is a primary alert.</p>
                                    </div>
                                    <div class="alert alert-secondary">
                                        <h4 class="alert-heading" style="font-size: 1.2rem; margin-bottom: .2rem;">Basa Alus Sor</h4>
                                        <p>This is a secondary alert.</p>
                                    </div>
                                    <div class="alert alert-success">
                                        <h4 class="alert-heading" style="font-size: 1.2rem; margin-bottom: .2rem;">Basa Alus Mider</h4>
                                        <p>This is a success alert.</p>
                                    </div>
                                    <div class="alert alert-danger">
                                        <h4 class="alert-heading" style="font-size: 1.2rem; margin-bottom: .2rem;">Basa Alus Mider</h4>
                                        <p>This is a danger alert.</p>
                                    </div>
                                    <div class="alert alert-warning">
                                        <h4 class="alert-heading" style="font-size: 1.2rem; margin-bottom: .2rem;">Basa Alus Singgih</h4>
                                        <p>This is a warning alert.</p>
                                    </div>
                                    <div class="alert alert-info">
                                        <h4 class="alert-heading" style="font-size: 1.2rem; margin-bottom: .2rem;">Bahasa Indonesia</h4>
                                        <p>This is a info alert.</p>
                                    </div>
                                    <div class="alert alert-dark">
                                        <h4 class="alert-heading" style="font-size: 1.2rem; margin-bottom: .2rem;">English</h4>
                                        <p>This is a dark alert.</p>
                                    </div>
                                </div>
                            </div>
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
    <script languange="javascript">
        $( document ).ready(function() {
            Toastify({
                text: "This is a toast",
                duration: 3000
            }).showToast();
        });
    </div>
</body>

</html>