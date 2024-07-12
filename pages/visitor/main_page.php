<?php
// session_start();
// if ($_SESSION['status_visitor'] != "sudah_login") {
//     // header("location:../errorpage/403.php");
//     header("location:../../pages/visitor/login.php?pesan=Silahkan Login Terlebih Dahulu");
// }
// $page = "populate_details";
include '../../config/config.php';
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
    <link rel="stylesheet" href="../../skins/mazer/demo/assets/css/bootstrap.css">

    <link rel="stylesheet" href="../../skins/mazer/demo/assets/vendors/toastify/toastify.css">
    <link rel="stylesheet" href="../../skins/mazer/demo/assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="../../skins/mazer/demo/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../../skins/mazer/demo/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../../skins/mazer/demo/assets/css/app.css">
    <link rel="shortcut icon" href="../../skins/mazer/demo/assets/images/favicon.svg" type="image/x-icon">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="min-vh-100" style="overflow-x: hidden; background-color: lightgrey;">
        <!-- make navbar sticky -->
        <nav class="w-100 container-fluid d-flex justify-content-between align-items-center bg-dark" style="top: 0; z-index: 1000; position: fixed;">
            <img src="../../skins/mazer/demo/assets/images/logo/logo-sigapura.png" style=" max-height: 5rem; max-width: 5rem; object-fit: contain; cursor: pointer;" onclick="window.location.href = 'index.php';" />
            <h2 class=" text-center text-white m-0 p-0" style="font-family: 'Roboto', sans-serif; font-weight: 700;">SIGAPURA</h2>
            <div class="text-center text-white d-flex justify-content-between align-items-center pe-4">
                <i class="bi bi-map" style="cursor: pointer; font-size: 1.5rem; height: 1.5rem;"></i>
                <div class=" mx-3">
                </div>
                <i class="bi bi-box-arrow-left" style="cursor: pointer; font-size: 1.5rem; height: 1.5rem;" onclick="window.location.href = '../../apps/logout_visitor.php';"></i>
            </div>
        </nav>

        <div class="hero bg-dark text-white py-5" style="background-image: url('../../assets/img/background/bg.JPG'); background-size: cover; background-position: center; height: 100vh;">
            <div class="container d-flex flex-column justify-content-center align-items-center h-100">
                <h1 class="display-1 text-center text-white" style="font-family: 'Roboto', sans-serif; font-weight: 700;">SIGAPURA</h1>
                <h2 class="text-center text-white" style="font-family: 'Roboto', sans-serif; font-weight: 400;">Sistem Digitalisasi Pelinggih</h2>
            </div>
        </div>

        <div class="row text-center my-5 py-5 mx-5">
            <?php while ($ds = mysqli_fetch_array($fs)) { ?>
                <div class="col-4" style="cursor: pointer;">
                    <!-- hover action -->
                    <div class="bg-white rounded-lg p-3">
                        <img src=" ../../assets/img/shrine/<?= $ds['image_shrine'] ?>" class="img-fluid rounded-lg" style="height: 15rem; object-fit: cover;" />
                        <div class="position-relative p-4 pt-0">
                            <h3 class="mt-3 text-start text-dark" style="font-family: 'Roboto', sans-serif; font-weight: 700;"><?= $ds['name_object'] ?></h3>
                            <p class="text-start text-secondary" style="font-family: 'Roboto', sans-serif; font-weight: 400; height: 4.7rem; overflow: hidden;"><?= $ds['description_detail'] ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#modalfade" onclick="document.getElementById('content').src='<?= $ds['link_shrine'] ?>';
                                document.getElementById('name_object').innerHTML='<?= $ds['name_object'] ?>';
                                document.getElementById('description_detail').innerHTML='<?= $ds['description_detail'] ?>';
                                document.getElementById('description_visual').innerHTML='<?= $ds['description_visual'] ?>';
                                document.getElementById('year_of_creation').innerHTML='<?= $ds['year_of_creation'] ?>';
                                document.getElementById('period_of_creation').innerHTML='<?= $ds['period_of_creation'] ?>';
                                document.getElementById('name_creator').innerHTML='<?= $ds['name_creator'] ?>';
                                document.getElementById('creator_style').innerHTML='<?= $ds['creator_style'] ?>';
                                document.getElementById('main_material').innerHTML='<?= $ds['main_material'] ?>';
                                document.getElementById('additional_material').innerHTML='<?= $ds['additional_material'] ?>';
                                document.getElementById('creation_technique').innerHTML='<?= $ds['creation_technique'] ?>';
                                document.getElementById('ornament').innerHTML='<?= $ds['ornament'] ?>';
                                document.getElementById('length').innerHTML='<?= $ds['length'] ?>';
                                document.getElementById('height').innerHTML='<?= $ds['height'] ?>';
                                document.getElementById('width').innerHTML='<?= $ds['width'] ?>';
                                document.getElementById('weight').innerHTML='<?= $ds['weight'] ?>';
                                document.getElementById('volume').innerHTML='<?= $ds['volume'] ?>';
                                document.getElementById('physical_condition').innerHTML='<?= $ds['physical_condition'] ?>';
                                document.getElementById('level_of_damage').innerHTML='<?= $ds['level_of_damage'] ?>';
                                document.getElementById('country_location').innerHTML='<?= $ds['country_location'] ?>';
                                document.getElementById('district_location').innerHTML='<?= $ds['district_location'] ?>';
                                document.getElementById('subdistrict_location').innerHTML='<?= $ds['subdistrict_location'] ?>';
                                document.getElementById('village_location').innerHTML='<?= $ds['village_location'] ?>';
                                document.getElementById('functional').innerHTML='<?= $ds['functional'] ?>';
                                document.getElementById('ownership').innerHTML='<?= $ds['ownership'] ?>';
                                document.getElementById('ownership_history').innerHTML='<?= $ds['ownership_history'] ?>';
                                document.getElementById('historical_value').innerHTML='<?= $ds['historical_value'] ?>';
                                document.getElementById('cultural_value').innerHTML='<?= $ds['cultural_value'] ?>';
                                document.getElementById('aesthetic_value').innerHTML='<?= $ds['aesthetic_value'] ?>';
                                document.getElementById('economic_value').innerHTML='<?= $ds['economic_value'] ?>'; 
                                ">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }  ?>
        </div>
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

    <div class="modal fade absolute-center p-5" id="modalfade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl bg-body">
            <iframe class="modal-content vh-100" id="content" title="Peliangan" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/4259554d77174a108af3ab4163f8ea66/embed"> </iframe>
            <div style="height: 5rem;"></div>

            <!-- name_object='" . $name_object . "',
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
            economic_value = '" . $economic_value . "',
            link_shrine = '" . $link_shrine . "',
            image_shrine = '" . $image_shrine . "' -->

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Name
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <p id="name_object" class="col-8 d-flex align-items-center">
                    Name
                </p>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Description
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <p id="description_detail" class="col-8 d-flex align-items-center">
                    Description
                </p>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Description Visual
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <p id="description_visual" class="col-8 d-flex align-items-center">
                    Description Visual
                </p>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Year of Creation
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <p id="year_of_creation" class="col-8 d-flex align-items-center">
                    Year of Creation
                </p>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Period of Creation
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <p id="period_of_creation" class="col-8 d-flex align-items-center">
                    Period of Creation
                </p>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Name Creator
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <p id="name_creator" class="col-8 d-flex align-items-center">
                    Name Creator
                </p>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Creator Style
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <p id="creator_style" class="col-8 d-flex align-items-center">
                    Creator Style
                </p>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Main Material
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <p id="main_material" class="col-8 d-flex align-items-center">
                    Main Material
                </p>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Additional Material
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="additional_material" class="col-8 d-flex align-items-center">
                    Additional Material
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Creation Technique
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="creation_technique" class="col-8 d-flex align-items-center">
                    Creation Technique
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Ornament :
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="ornament" class="col-8 d-flex align-items-center">
                    Ornament
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Length
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="length" class="col-8 d-flex align-items-center">
                    Length
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Height
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="height" class="col-8 d-flex align-items-center">
                    Height
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Width
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="width" class="col-8 d-flex align-items-center">
                    Width
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Weight
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="weight" class="col-8 d-flex align-items-center">
                    Weight
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Volume
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="volume" class="col-8 d-flex align-items-center">
                    Volume
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Physical Condition
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="physical_condition" class="col-8 d-flex align-items-center">
                    Physical Condition
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Level of Damage
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="level_of_damage" class="col-8 d-flex align-items-center">
                    Level of Damage
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Country Location
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="country_location" class="col-8 d-flex align-items-center">
                    Country Location
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    District Location
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="district_location" class="col-8 d-flex align-items-center">
                    District Location
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Subdistrict Location
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="subdistrict_location" class="col-8 d-flex align-items-center">
                    Subdistrict Location
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Village Location
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="village_location" class="col-8 d-flex align-items-center">
                    Village Location
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Functional
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="functional" class="col-8 d-flex align-items-center">
                    Functional
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Ownership
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="ownership" class="col-8 d-flex align-items-center">
                    Ownership
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Ownership History
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="ownership_history" class="col-8 d-flex align-items-center">
                    Ownership History
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Historical Value
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="historical_value" class="col-8 d-flex align-items-center">
                    Historical Value
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Cultural Value
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="cultural_value" class="col-8 d-flex align-items-center">
                    Cultural Value
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Aesthetic Value
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="aesthetic_value" class="col-8 d-flex align-items-center">
                    Aesthetic Value
                </div>
            </div>

            <div class="row px-5 d-flex align-items-center" style="font-family: 'Roboto', sans-serif;">
                <p class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Economic Value
                </p>
                <p class="col-1 d-flex align-items-center">:</p>
                <div id="economic_value" class="col-8 d-flex align-items-center">
                    Economic Value
                </div>
            </div>

            <!-- <div class="row px-5">
                                <div class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Link Shrine :
                </div>
                <div id="link_shrine" class="col-8 d-flex align-items-center">
                    Link Shrine
                </div>
            </div>

            <div class="row px-5">
                                <div class="col-3 d-flex align-items-center" style="font-family: 'Roboto', sans-serif; font-weight: 700;">
                    Image Shrine :
                </div>
                <div id="image_shrine" class="col-8 d-flex align-items-center">
                    Image Shrine
                </div>
            </div> -->

            <div style="height: 2rem;"></div>
            <!-- Modal Header -->
            <!-- <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Modal Animasi Fade</h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        </div> -->
            <!-- Modal body -->
            <!-- <div class="modal-body">
                            Ini Adalah isi dari modal animasi fade
                        </div> -->
            <!-- Modal footer -->
            <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div> -->
            <!-- </div> -->
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>