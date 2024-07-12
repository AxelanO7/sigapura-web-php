<?php
    session_start();
    if($_SESSION['status'] !="sudah_login"){
        header("location:../errorpage/403.php");
    }
    $page = "populate_details";
    include ("thk_ontology.php");
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
                            <h3>Populate Details</h3>
                            <p class="text-subtitle text-muted">Kamus Bahasa Bali</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Menu</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Populate Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Input Kata</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-horizontal" action="../../apps/populateDetailsController.php" method="POST">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label style="color:#435ebe">Basa Kasar</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" style="border-color:#435ebe" class="form-control" id="basa_kasar" name="basa_kasar" placeholder="Basa Kasar">
                                                </div>
                                                <div class="col-md-4">
                                                    
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" style="border-color:#435ebe" class="form-control" id="basa_kasar_aksara" name="basa_kasar_aksara" placeholder="Aksara Bali">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Contoh Kalimat</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-group with-title mb-3">
                                                        <textarea style="border-color:#435ebe" class="form-control" id="basa_kasar_kalimat" name="basa_kasar_kalimat" rows="2"></textarea>
                                                        <label style="border:1px solid #435ebe;">Contoh Kalimat</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label style="color:#4fbe87">Basa Kesamen</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" style="border-color:#4fbe87" class="form-control" id="basa_kesamen" name="basa_kesamen" placeholder="Basa Kesamen">
                                                </div>
                                                <div class="col-md-4">
                                                    
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" style="border-color:#4fbe87" class="form-control" id="basa_kesamen" name="basa_kesamen" placeholder="Aksara Bali">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label style="color:#4fbe87">Contoh Kalimat</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-group with-title mb-3">
                                                        <textarea style="border-color:#4fbe87" class="form-control" id="basa_kesamen_kalimat" name="basa_kesamen_kalimat" rows="2"></textarea>
                                                        <label style="border:1px solid #4fbe87;">Contoh Kalimat</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label style="color:#f3616d">Basa Alus Sor</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" style="border-color:#f3616d" class="form-control" id="basa_alus_sor" name="basa_alus_sor" placeholder="Basa Alus Sor">
                                                </div>
                                                <div class="col-md-4">
                                                    
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" style="border-color:#f3616d" class="form-control" id="basa_alus_sor" name="basa_alus_sor" placeholder="Aksara Bali">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label style="color:#f3616d">Contoh Kalimat</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-group with-title mb-3">
                                                        <textarea style="border-color:#f3616d" class="form-control" id="basa_alus_sor_kalimat" name="basa_alus_sor_kalimat" rows="2"></textarea>
                                                        <label style="border:1px solid #f3616d;">Contoh Kalimat</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label style="color:#56b6f7">Basa Alus Mider</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" style="border-color:#56b6f7" class="form-control" id="basa_alus_mider" name="basa_alus_mider" placeholder="Basa Alus Mider">
                                                </div>
                                                <div class="col-md-4">
                                                    
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" style="border-color:#56b6f7" class="form-control" id="basa_alus_mider" name="basa_alus_mider" placeholder="Aksara Bali">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label style="color:#56b6f7">Contoh Kalimat</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-group with-title mb-3">
                                                        <textarea style="border-color:#56b6f7" class="form-control" id="basa_alus_mider_kalimat" name="basa_alus_mider_kalimat" rows="2"></textarea>
                                                        <label style="border:1px solid #56b6f7;">Contoh Kalimat</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label style="color:#435ebe">Basa Alus Madia</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" style="border-color:#435ebe" class="form-control" id="basa_alus_madia" name="basa_alus_madia" placeholder="Basa Alus Madia">
                                                </div>
                                                <div class="col-md-4">
                                                    
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" style="border-color:#435ebe" class="form-control" id="basa_alus_madia" name="basa_alus_madia" placeholder="Aksara Bali">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label style="color:#435ebe">Contoh Kalimat</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-group with-title mb-3">
                                                        <textarea style="border-color:#435ebe" class="form-control" id="basa_alus_madia_kalimat" name="basa_alus_madia_kalimat" rows="2"></textarea>
                                                        <label style="border:1px solid #435ebe;">Contoh Kalimat</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label style="color:#4fbe87">Basa Alus Singgih</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" style="border-color:#4fbe87" class="form-control" id="basa_alus_singgih" name="basa_alus_singgih" placeholder="Basa Alus Singgih">
                                                </div>
                                                <div class="col-md-4">
                                                    
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" style="border-color:#4fbe87" class="form-control" id="basa_alus_singgih" name="basa_alus_singgih" placeholder="Aksara Bali">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label style="color:#4fbe87">Contoh Kalimat</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-group with-title mb-3">
                                                        <textarea style="border-color:#4fbe87" class="form-control" id="basa_alus_singgih_kalimat" name="basa_alus_singgih_kalimat" rows="2"></textarea>
                                                        <label style="border:1px solid #4fbe87;">Contoh Kalimat</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label style="color:#f3616d">Bahasa Indonesia</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" style="border-color:#f3616d" class="form-control" id="bahasa_indonesia" name="bahasa_indonesia" placeholder="Bahasa Indonesia">
                                                </div>
                                                <div class="col-md-4">
                                                    
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" style="border-color:#f3616d" class="form-control" id="bahasa_indonesia" name="bahasa_indonesia" placeholder="Aksara Bali">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label style="color:#f3616d">Contoh Kalimat</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-group with-title mb-3">
                                                        <textarea style="border-color:#f3616d" class="form-control" id="bahasa_indonesia_kalimat" name="bahasa_indonesia_kalimat" rows="2"></textarea>
                                                        <label style="border:1px solid #f3616d;">Contoh Kalimat</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label style="color:#56b6f7">English</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" style="border-color:#56b6f7" class="form-control" id="english" name="english" placeholder="English">
                                                </div>
                                                <div class="col-md-4">
                                                    
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" style="border-color:#56b6f7" class="form-control" id="english" name="english" placeholder="Aksara Bali">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label style="color:#56b6f7">Contoh Kalimat</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <div class="form-group with-title mb-3">
                                                        <textarea style="border-color:#56b6f7" class="form-control" id="english_kalimat" name="english_kalimat" rows="2"></textarea>
                                                        <label style="border:1px solid #56b6f7;">Contoh Kalimat</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label style="color:#435ebe">Jenis Kata yang diinput</label>
                                                </div>
                                                <div class="col-md-10 form-group">
                                                    <select name="jenis_kata" style="border-color:#435ebe" class="form-select" id="jenis_kata">
                                                        <option value="kata_dasar">Kata Dasar</option>
                                                        <option value="kata_kerja">Kata Kerja</option>
                                                        <option value="kata_sifat">Kata Sifat</option>
                                                        <option value="kata_keterangan">Kata keterangan</option>
                                                        <option value="kata_benda">Kata Benda</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
        </script>
    </div>
</body>

</html>