<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sigapura</title>

    <meta name="description" content="Kamus Bahasa Enggano">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../skins/mazer/demo/assets/css/app.css">
    <link rel="stylesheet" href="../../skins/mazer/demo/assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../skins/mazer/assets/css/style.css">

    <link rel="stylesheet" href="../../skins/mazer/demo/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="shortcut icon" href="../../skins/mazer/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app" style="background-image: url('../../assets/img/background/bg.JPG'); background-size: cover; background-position: center; height: 100vh;background-repeat: no-repeat; background-attachment: fixed; background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div style="background-color: rgba(255, 255, 255, 0.7); height: 100vh;">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
                    <div class="container">
                        <a class="navbar-brand me-auto" href="index.php">
                            <img src="../../skins/mazer/demo/assets/images/logo/sigapura.png" alt="Logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse " id="navbarNav">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <!--<li class="nav-item">
                                <a class="nav-link" href="#">Searching</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Browsing</a>
                            </li>-->
                                <li class="nav-item">
                                    <a class="btn btn-outline-primary" href="#">Register</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <div class="container">
                <section class="hero">
                    <div class="row">
                        <div class="col-lg-6 col-12 order-2 order-md-1">
                            <h1 class='pt-5'>Sistem Digitalisasi Pelinggih</h1>
                            <p class='fs-5 mt-3'>Selamat Datang di Sistem Digitalisasi Pelinggih</p>
                            <!-- <a href="../../index.php" class="btn btn-primary">Admin</a> -->
                            <a href="login.php" class="btn btn-outline-primary">Login</a>
                        </div>
                        <div class="col-lg-6 col-12 order-1 order-md-2">
                            <h2 class='pt-5 text-center'>Register Visitor</h2>
                            <?php if (isset($_GET['pesan'])) {  ?>
                                <div class="alert alert-danger text-center"><?php echo $_GET['pesan']; ?></div>
                            <?php } ?>
                            <form class="form form-horizontal" action="../../apps/visitorController.php?action=registerVisitor" method="POST">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Nama</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Nama" name="name" id="name">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Asal Negara</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="country_region" id="country_region" placeholder="Asal Negara">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-flag"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Jenis Kelamin</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" name="gender" id="gender" placeholder="Jenis Kelamin">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-8 offset-md-4">
                                            <div class='form-check'>
                                                <div class="checkbox">
                                                    <input type="checkbox" id="checkbox2" class='form-check-input' checked>
                                                    <label for="checkbox2">Remember Me</label>
                                                </div>
                                            </div>
                                        </div>
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
        </div>
    </div>
    <script src="../../skins/mazer/demo/assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        function validasi() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            if (username != "" && password != "") {
                return true;
            } else {
                alert('Username dan Password harus di isi !');
                return false;
            }
        }
    </script>
</body>

</html>