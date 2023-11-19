<?php
session_start();
// if ($_SESSION['status'] != "sudah_login") {
//     header("location:../errorpage/403.php");
// }
$page = "populate_details";
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
    <link rel="stylesheet" href="../../skins/mazer/demo/assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="../../skins/mazer/demo/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../../skins/mazer/demo/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../../skins/mazer/demo/assets/css/app.css">
    <link rel="shortcut icon" href="../../skins/mazer/demo/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div class="min-vh-100">
        <div class="header_main_page row align-items-center my-5">
            <img src="../../skins/mazer/demo/assets/images/logo/kamus_enggano.png" alt="" class="col-3">
            <h2 class="col">Sigapura</h2>
            <i class="bi bi-box-arrow-left col-3" style="width: 100px;"></i>
        </div>

        <div id="carouselExampleIndicators" class="carousel slide my-5">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../../skins/mazer/demo/assets/images/logo/kamus_enggano.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../../skins/mazer/demo/assets/images/logo/kamus_enggano.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../../skins/mazer/demo/assets/images/logo/kamus_enggano.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="row d-flex justify-content-center mb-5">
            <h2 class="text-center">SCAN BARCODE</h2>
            <button type="button" class="btn btn-warning w-auto px-5 rounded-pill text-dark mt-2">Scan</button>
        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted row">
                <div class="float-start">
                    <p>2023 &copy; Sistem Digitalisasi Pelinggih</p>
                </div>
                <div class="float-end">
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="#">Team</a></p>
                </div>
            </div>
        </footer>
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
            $('#form').attr('action', "../../apps/kamusController.php?action=deleteData&id=" + id);
            $('#modal').modal('show');
        }
    </script>
    </div>
</body>

</html>