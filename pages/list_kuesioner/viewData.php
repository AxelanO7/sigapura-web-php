<?php
    session_start();
    if($_SESSION['status'] !="sudah_login"){
        header("location:../errorpage/403.php");
    }
    $page = "kuesioner";
    include '../../config/config.php';
	$qku = mysqli_query($koneksi, "SELECT *,(SELECT name FROM users WHERE id=usr_id) as name FROM z_kuisioner_user WHERE kuiu_id='".$_GET["kuiu_id"]."' ") or die(mysqli_errno($koneksi));
    $dku = mysqli_fetch_array($qku);
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
                            Questionnaire
                        </div>
                        <div class="card-body">
                            <?php
								$idk = "KU004";
                                
                                    $flagp = 0;
                                    $flage = 0;
                                    $flagk = 0;
                                    $idk = "";
                                    $tessay = "";
                                    $k=0;
									$idk = "KU004";
                                    $q = mysqli_query($koneksi,"SELECT * FROM z_kuisioner WHERE kui_id='".$idk."' ;") ;
                                    $d = mysqli_fetch_array($q);
                                    $kreteria = "<b>Kreteria Kategori Penilaian :</b><br />";
                                    $qkre = mysqli_query($koneksi,"SELECT * FROM z_kuisioner_kriteria WHERE kui_id='".$d["kui_id"]."' ORDER BY kuik_pilihan;") ;
                                    $colkre = "";
                                    $arrkreteria = array();
                                    $jmlkol = 2;
                                    while($dkre=mysqli_fetch_array($qkre)){
                                        $kreteria .= $dkre["kuik_pilihan"].". ".$dkre["kuik_keterangan"]."<br />";
                                        $colkre .="<td align=\"center\"><b>".$dkre["kuik_pilihan"]."</b></td>";
                                        $arrkreteria[] = $dkre["kuik_pilihan"];
                                        $jmlkol ++;
                                        $flagk = 1;
                                    }
                                    $kreteria .="<br />";
                                    $jmlcolspan = $jmlkol - 1;
                                    
                                    $tpertanyaan = "";
                                    
                                    $qs = mysqli_query($koneksi,"SELECT * FROM z_kuisioner_section WHERE kui_id='".$d["kui_id"]."' ");
                                    $i=1;
                                    $l = 0;
                                    if($jmlks = mysqli_num_rows($qs)>0){
                                        while($ds = mysqli_fetch_array($qs)){
                                            $tpertanyaan .= "<table border=\"0\" width=\"100%\" cellspacing=\"1\" cellpadding=\"5\" bgcolor=\"#DDDDDD\">
                                                                <tr bgcolor=\"#CCCCCC\">
                                                                    <td align=\"center\" width=\"5%\"><b>No</b></td>
                                                                    <td align=\"center\" width=\"80%\"><b>Pertanyaan</b></td>
                                                                    ".$colkre."
                                                                </tr>";
                                            if($i%2==1){
                                                $bgcolor = "bgcolor=\"#FFFFFF\"";
                                            }else{
                                                $bgcolor = "bgcolor=\"#EEEEEE\"";
                                            }
                                            $tpertanyaan .="<tr ".$bgcolor.">
                                                                <td colspan=\"".$jmlkol."\"><h4>".$ds["ks_name"]."</h4></td>
                                                            </tr>";
                                            $i++;
                                            $qkp=mysqli_query($koneksi,"SELECT * FROM z_kuisioner_pertanyaan WHERE kui_id='".$d["kui_id"]."' AND ks_id='".$ds["ks_id"]."' ORDER BY kuip_urutan;") ;
                                            while($dkp=mysqli_fetch_array($qkp)){
                                                if($i%2==1){
                                                    $bgcolor = "bgcolor=\"#FFFFFF\"";
                                                }else{
                                                    $bgcolor = "bgcolor=\"#EEEEEE\"";
                                                }
                                                if($dkp["kuip_tipe"]=="bobot"){
                                                    $colkrej = "";
                                                    $chk = "";
													$qx=mysqli_query($koneksi,"SELECT * FROM z_kuisioner_user_bobot WHERE kuiu_id='".$_GET["kuiu_id"]."' AND kuip_id='".$dkp["kuip_id"]."';") ;
													$dx=mysqli_fetch_array($qx);
                                                    foreach($arrkreteria as $kre){
                                                        if($dx["kuiui_jawaban"]==$kre){
															$colkrej .= "<td align=\"center\">
																		<input type=\"radio\" name=\"jp[".$l."]\" value=\"".$kre."\" checked/>
																		</td>";
														}else{
															$colkrej .= "<td align=\"center\">
																		<input type=\"radio\" name=\"jp[".$l."]\" value=\"".$kre."\"/>
																		</td>";
														}
                                                        $chk = "";
                                                    }
                                                    $tpertanyaan .= "<tr ".$bgcolor.">
                                                                        <td valign=\"top\" style=\"text-align:center\">".$dkp["kuip_urutan"]."</td>
                                                                        <td valign=\"top\"><input type=\"hidden\" name=\"kuip_id[".$l."]\" value=\"".$dkp["kuip_id"]."\">".$dkp["kuip_pertanyaan"]."</td>
                                                                        ".$colkrej."
                                                                    </tr>";
                                                    $i++;
                                                    $l++;
                                                    $flagp = 1;
                                                }else{
													$qx=mysqli_query($koneksi,"SELECT * FROM z_kuisioner_user_essay WHERE kuiu_id='".$_GET["kuiu_id"]."' AND kuip_id='".$dkp["kuip_id"]."';") ;
													$dx=mysqli_fetch_array($qx);
                                                    $tpertanyaan .= "<tr ".$bgcolor.">
                                                                        <td align=\"center\" valign=\"center\" width=\"5%\"><p>".$dkp["kuip_urutan"].".</p>
                                                                            <input type=\"hidden\" name=\"kuipe_id[]\" value=\"".$dkp["kuip_id"]."\"></td>
                                                                        <td valign=\"center\" colspan=\"".$jmlcolspan."\">".$dkp["kuip_pertanyaan"]."</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td colspan=\"".$jmlcolspan."\" ><textarea id=\"essay[".$k."]\" name=\"essay[]\" cols=\"90%\" rows=\"4\" readonly>".$dx["kuiui_jawaban"]."</textarea></td>
                                                                    </tr>";
                                                    $k++;
                                                    $i++;
                                                    $flagp = 1;
                                                }				
                                            }				
                                            $tpertanyaan .= "</table>";
                                        }
                                    }else{
                                        $l = 0;
                                        $qkp=mysqli_query($koneksi,"SELECT * FROM z_kuisioner_pertanyaan WHERE kui_id='".$d["kui_id"]."' ORDER BY kuip_urutan;") ;
                                        while($dkp=mysqli_fetch_array($qkp)){
                                            if($i%2==1){
                                                $bgcolor = "bgcolor=\"#FFFFFF\"";
                                            }else{
                                                $bgcolor = "bgcolor=\"#EEEEEE\"";
                                            }
                                            if($dkp["kuip_tipe"]=="bobot"){
                                                $colkrej = "";
                                                $chk = "";
												$qx=mysqli_query($koneksi,"SELECT * FROM z_kuisioner_user_bobot WHERE kuiu_id='".$_GET["kuiu_id"]."' AND kuip_id='".$dkp["kuip_id"]."';") ;
												$dx=mysqli_fetch_array($qx);
                                                foreach($arrkreteria as $kre){
													if($dx["kuiui_jawaban"]==$kre){
														$colkrej .= "<td align=\"center\">
																	<input type=\"radio\" name=\"jp[".$l."]\" value=\"".$kre."\" checked/>
																	</td>";
													}else{
														$colkrej .= "<td align=\"center\">
																	<input type=\"radio\" name=\"jp[".$l."]\" value=\"".$kre."\"/>
																	</td>";
													}
                                                    $chk = "";
                                                }
                                                $tpertanyaan .= "<tr ".$bgcolor.">
                                                                    <td valign=\"top\" style=\"text-align:center\">".$dkp["kuip_urutan"]."</td>
                                                                    <td valign=\"top\"><input type=\"hidden\" name=\"kuip_id[".$l."]\" value=\"".$dkp["kuip_id"]."\">".$dkp["kuip_pertanyaan"]."</td>
                                                                    ".$colkrej."
                                                                </tr>";
                                                $i++;
                                                $l++;
                                                $flagp = 1;
                                            }else{
												$qx=mysqli_query($koneksi,"SELECT * FROM z_kuisioner_user_essay WHERE kuiu_id='".$_GET["kuiu_id"]."' AND kuip_id='".$dkp["kuip_id"]."';") ;
												$dx=mysqli_fetch_array($qx);
                                                $tpertanyaan .= "<tr ".$bgcolor.">
                                                                    <td align=\"center\" valign=\"center\" width=\"5%\"><p>".$dkp["kuip_urutan"].".</p>
                                                                        <input type=\"hidden\" name=\"kuipe_id[]\" value=\"".$dkp["kuip_id"]."\"></td>
                                                                    <td valign=\"center\" colspan=\"".$jmlcolspan."\">".$dkp["kuip_pertanyaan"]."</td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td colspan=\"".$jmlcolspan."\" ><textarea id=\"essay[".$k."]\" name=\"essay[]\" cols=\"90%\" rows=\"4\" readonly>".$dx["kuiui_jawaban"]."</textarea></td>
                                                                </tr>";
                                                $k++;
                                                $i++;
                                                $flagp = 1;
                                            }	 
                                        }
                                        $tpertanyaan = "<table border=\"0\" width=\"100%\" cellspacing=\"1\" cellpadding=\"5\" bgcolor=\"#DDDDDD\">
                                                                <tr bgcolor=\"#CCCCCC\">
                                                                    <td align=\"center\" width=\"5%\"><b>No</b></td>
                                                                    <td align=\"center\" width=\"80%\"><b>Pertanyaan</b></td>
                                                                    ".$colkre."
                                                                </tr>
                                                                ".$tpertanyaan." ";
                                        $tpertanyaan .= "</table>";
                                    }
                                    
                                    
                                    if($flagp==0){
                                        $tpertanyaan = "";
                                    }
                                    if($flagk==0){
                                        $kreteria = "";
                                    }
                                    
                                    echo "<div class=\"panel panel-default\">
                                                <div class=\"panel-body\">
                                                    <div class=\"row\">
                                                        <div class=\"col-md-12\">
                                                            <form id=\"formKuesioner\" name=\"formKuesioner\" action=\"../../apps/kuesionerController.php?action=addData\" method=\"POST\">
                                                                <h3>".$d["kui_header"]."</h3><hr />
                                                                <input type=\"hidden\" id=\"kuisioner\" name=\"kuisioner\" value=\"".$d["kui_id"]."\" />
                                                                <input type=\"hidden\" id=\"kuisioner\" name=\"usr_id\" value=\"".$dz["id"]."\" />
																<table border=\"0\"  width=\"100%\" cellspacing=\"1\">
																	<tr>
																		<td width=\"10%\"><b>Nama</b></td>
																		<td width=\"3%\">:</td>
																		<td>".$dz["name"]."</td>
																	</tr>
																	<tr>
																		<td><b>Tanggal</b></td>
																		<td>:</td>
																		<td>".$dku["kuiu_date"]."</td>
																	</tr>
																</table><br /><br />
                                                                ".$kreteria."
                                                                ".$tpertanyaan."<br />
                                                                ".$tessay."
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>";
                            ?>
                        </div>
                    </div>

                </section>

            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy; Kamus Bahasa Enggano</p>
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
</body>

</html>