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
    <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
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
                <h1 class="display-1 text-center text-white" style="font-family: 'Roboto', sans-serif; font-weight: 700;">SIGAPURA</h1>
                <h2 class="text-center text-white" style="font-family: 'Roboto', sans-serif; font-weight: 400;">Sistem Digitalisasi Pelinggih</h2>
            </div>
        </div>


        <div class="container text-center my-5">
            <h1 class="text-center text-dark" style="font-family: 'Roboto', sans-serif; font-weight: 700;">Scan QR Code</h1>
        </div>


        <div class="text-center my-5" style="height: 60vh;">
            <!-- html5-qrcode -->
            <div id="qr-reader" style="height: 100%;" class="py-5"></div>
            <script>
                function onScanSuccess(decodedText, decodedResult) {
                    console.log(`Code scanned = ${decodedText}`, decodedResult);
                    setTimeout(() => {
                        window.location.href = decodedText;
                    }, 1000);
                }
                var html5QrcodeScanner = new Html5QrcodeScanner(
                    "qr-reader", {
                        fps: 10,
                        qrbox: 250
                    });
                html5QrcodeScanner.render(onScanSuccess);
            </script>
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>