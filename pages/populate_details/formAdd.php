<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
	header("location:../errorpage/403.php");
}
$page = "populate_details";
include '../../config/config.php';
$qz = mysqli_query($koneksi, "SELECT * FROM users WHERE username='" . $_SESSION['username'] . "' ");
$dz = mysqli_fetch_array($qz);
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

	<link rel="stylesheet" href="../../skins/mazer/demo/assets/vendors/iconly/bold.css">
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
							<h3>Input Data Shrines</h3>
							<p class="text-subtitle text-muted">Kamus Bahasa Enggano</p>
						</div>
						<div class="col-12 col-md-6 order-md-2 order-first">
							<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Menu</a></li>
									<li class="breadcrumb-item active" aria-current="page">Input Data Shrines</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<div class="page-content">
				<section class="row">
					<div class="col-12 col-lg-9">
						<div class="row">
							<div class="col-6 col-lg-3 col-md-6">
								<div class="card">
									<div class="card-body px-3 py-4-5">
										<div class="row">
											<div class="col-md-4">
												<div class="stats-icon purple">
													<i class="iconly-boldDocument"></i>
												</div>
											</div>
											<div class="col-md-8">
												<?php
												$qd = mysqli_query($koneksi, "SELECT count(id) as jml FROM shrines") or die(mysqli_errno($koneksi));
												$dd = mysqli_fetch_array($qd);
												?>
												<h6 class="text-muted font-semibold">Total Shrines</h6>
												<h6 class="font-extrabold mb-0"><?php echo $dd["jml"] ?></h6>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-6 col-lg-3 col-md-6">
								<div class="card">
									<div class="card-body px-3 py-4-5">
										<div class="row">
											<div class="col-md-4">
												<div class="stats-icon blue">
													<i class="iconly-boldBookmark"></i>
												</div>
											</div>
											<div class="col-md-8">
												<?php
												// $qd = mysqli_query($koneksi, "SELECT COUNT(example_id) as jml FROM stem_example ") or die(mysqli_errno($koneksi));
												$qd = mysqli_query($koneksi, "SELECT count(id) as jml FROM visitor") or die(mysqli_errno($koneksi));
												$dd = mysqli_fetch_array($qd);
												?>
												<h6 class="text-muted font-semibold">Total Visitor</h6>
												<h6 class="font-extrabold mb-0"><?php echo $dd["jml"] ?></h6>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-6 col-lg-3 col-md-6">
								<div class="card">
									<div class="card-body px-3 py-4-5">
										<div class="row">
											<div class="col-md-4">
												<div class="stats-icon red">
													<i class="iconly-boldProfile"></i>
												</div>
											</div>
											<div class="col-md-8">
												<h6 class="text-muted font-semibold">Total Users</h6>
												<?php
												$qd = mysqli_query($koneksi, "SELECT count(id) as jml FROM users") or die(mysqli_errno($koneksi));
												$dd = mysqli_fetch_array($qd);
												?>
												<h6 class="font-extrabold mb-0"><?php echo $dd["jml"] ?></h6>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-6 col-lg-3 col-md-6">
								<div class="card">
									<div class="card-body px-3 py-4-5">
										<div class="row">
											<div class="col-md-4">
												<div class="stats-icon green">
													<i class="iconly-boldShow"></i>
												</div>
											</div>
											<div class="col-md-8">
												<?php
												// $qd = mysqli_query($koneksi, "SELECT stem_form FROM stem ORDER BY cerate_date DESC LIMIT 0,1") or die(mysqli_errno($koneksi));
												// $qd = mysqli_query($koneksi, "SELECT stem_form FROM stem ORDER BY cerate_date DESC LIMIT 0,1") or die(mysqli_errno($koneksi));
												$qd = mysqli_query($koneksi, "SELECT name_object FROM shrines ORDER BY created_at DESC LIMIT 0,1") or die(mysqli_errno($koneksi));
												$dd = mysqli_fetch_array($qd);
												if (!isset($dd['name_object'])) {
													$dd["name_object"] = "None";
												}
												?>
												<h6 class="text-muted font-semibold">Recent Shrines</h6>
												<h6 class="font-extrabold mb-0"><?php echo $dd["name_object"] ?></h6>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-body">
										<?php
										if (isset($_GET['pesan'])) { ?>
											<div class="col-sm-12 text-center">
												<div class="alert alert-primary" style="margin-top:15px;"><?php echo $_GET['pesan']; ?></div>
											</div>
										<?php } ?>
										<form class="form form-horizontal" action="../../apps/kamusController.php?action=addData" method="POST">
											<?php $timestart = time(); ?>
											<!-- <input type="hidden" name="timestart" value="<?php echo $timestart; ?>">
											<input type="hidden" name="create_by" value="<?php echo $dz['id'] ?>"> -->
											<div class="form-body">
												<!-- <div class="row">
													<div class="alert alert-primary">Metadata for the Entry</div>
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-4">
																<label style="color:#435ebe">Alphabet</label>
															</div>
															<div class="col-md-8 form-group">
																<input type="text" style="border-color:#435ebe; color:#000000;" class="form-control"  name="kms_Alphabet" placeholder="">
															</div>
														</div>
													</div> 
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-4">
																<label style="color:#435ebe">Page in Kähler</label>
															</div>
															<div class="col-md-8 form-group">
																<input type="text" style="border-color:#435ebe; color:#000000;" class="form-control" name="kms_page" placeholder="">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-4">
																<label style="color:#435ebe">Entry No</label>
															</div>
															<div class="col-md-8 form-group">
																<input type="number" style="border-color:#435ebe; color:#000000;" class="form-control" name="kms_entry_no" placeholder="">
															</div>
														</div>
													</div>
												</div> -->
												<div class="row" style="margin-top:16px;">
													<div class="alert alert-danger">Input Data Shrines</div>
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Nama Object</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" name="name_object" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Deskripsi Detail</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" name="description_detail" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Deskripsi Visual</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" name="description_visual" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Tahun Pembuatan Object</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="number" name="year_of_creation" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Periode Pembuatan</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" name="period_of_creation" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Nama Pencipta</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" name="name_creator" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Gaya Pencipta</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" name="creator_style" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Bahan Utama</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" name="main_material" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Bahan Tambahan</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" name="additional_material" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Teknik Pembuatan</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" name="creation_technique" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Ornamen</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" name="ornament" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Panjang</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="number" name="length" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Tinggi</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="number" name="height" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Lebar</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="number" name="width" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Berat</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="number" name="weight" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Volume</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="number" name="volume" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Kondisi Fisik</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" name="physical_condition" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Tingkat Kerusakan</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" name="level_of_damage" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Lokasi Negara</label>
															</div>
															<div class="col-md-9 form-group">
																<!-- <input type="text" name="country_location" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;"  /> -->
																<select name="country_location" class="col-12" style="border-color:#435ebe; color:#000000; padding: 8px 8px; border-radius: 4px;" disabled>
																	<option value="indonesia">Indonesia</option>
																</select>
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Lokasi Provinsi</label>
															</div>
															<div class="col-md-9 form-group">
																<!-- <input type="text" name="province_location" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" /> -->
																<select name="province_location" class="col-12" style="border-color:#435ebe; color:#000000; padding: 8px 8px; border-radius: 4px;" onchange="if (this.value=='bali'){this.form['district_location'].value='';this.form['subdistrict_location'].value='';this.form['village_location'].value='';}" disabled>
																	<option value="bali">Bali</option>
																</select>
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Lokasi Kabupaten</label>
															</div>
															<div class="col-md-9 form-group">
																<!-- <input type="text" name="district_location" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" /> -->
																<select name="district_location" class="col-12" style="border-color:#435ebe; color:#000000; padding: 8px 8px; border-radius: 4px;" onchange="if (this.value=='bangli'){this.form['subdistrict_location'].value='';this.form['village_location'].value='';}">
																	<option value="bangli">Bangli</option>
																	<option value="buleleng">Buleleng</option>
																	<option value="badung">Badung</option>
																	<option value="denpasar">Denpasar</option>
																	<option value="gianyar">Gianyar</option>
																	<option value="jembrana">Jembrana</option>
																	<option value="karangasem">Karangasem</option>
																	<option value="klungkung">Klungkung</option>
																	<option value="tabanan">Tabanan</option>
																</select>
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Lokasi Kecamatan</label>
															</div>
															<div class="col-md-9 form-group">
																<!-- <input type="text" name="subdistrict_location" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" /> -->
																<select name="subdistrict_location" class="col-12" style="border-color:#435ebe; color:#000000; padding: 8px 8px; border-radius: 4px;" onchange="if (this.value=='bangli'){this.form['village_location'].value='';}">
																	<option value="bangli" disabled>Bangli</option>
																	<option value="bangli">Bangli</option>
																	<option value="kintamani">Kintamani</option>
																	<option value="susut">Susut</option>
																	<option value="tembuku">Tembuku</option>

																	<option value="buleleng" disabled>Buleleng</option>
																	<option value="banjar">Banjar</option>
																	<option value="buleleng">Buleleng</option>
																	<option value="busungbiu">Busungbiu</option>
																	<option value="gerokgak">Gerokgak</option>
																	<option value="kubutambahan">Kubutambahan</option>
																	<option value="sawan">Sawan</option>
																	<option value="seririt">Seririt</option>
																	<option value="sukasada">Sukasada</option>
																	<option value="tejakula">Tejakula</option>

																	<option value="badung" disabled>Badung</option>
																	<option value="abiansemal">Abiansemal</option>
																	<option value="kuta">Kuta</option>
																	<option value="kuta selatan">Kuta Selatan</option>
																	<option value="kuta utara">Kuta Utara</option>
																	<option value="mengwi">Mengwi</option>
																	<option value="petang">Petang</option>

																	<option value="denpasar" disabled>Denpasar</option>
																	<option value="denpasar_barat">Denpasar Barat</option>
																	<option value="denpasar_selatan">Denpasar Selatan</option>
																	<option value="denpasar_timur">Denpasar Timur</option>
																	<option value="denpasar_utara">Denpasar Utara</option>

																	<option value="giayar" disabled>Giayar</option>
																	<option value="blahbatuh">Blahbatuh</option>
																	<option value="payangan">Payangan</option>
																	<option value="sukawati">Sukawati</option>
																	<option value="tampaksiring">Tampaksiring</option>
																	<option value="tegalalang">Tegalalang</option>
																	<option value="ubud">Ubud</option>

																	<option value="jembrana" disabled>Jembrana</option>
																	<option value="jembrana">Jembrana</option>
																	<option value="melaya">Melaya</option>
																	<option value="mendoyo">Mendoyo</option>
																	<option value="negara">Negara</option>
																	<option value="pekutatan">Pekutatan</option>

																	<option value="karangasem" disabled>Karangasem</option>
																	<option value="abang">Abang</option>
																	<option value="bebandem">Bebandem</option>
																	<option value="karangasem">Karangasem</option>
																	<option value="kubu">Kubu</option>
																	<option value="manggis">Manggis</option>
																	<option value="rendang">Rendang</option>
																	<option value="selat">Selat</option>
																	<option value="sidemen">Sidemen</option>
																	<option value="susut">Susut</option>

																	<option value="klungkung" disabled>Klungkung</option>
																	<option value="banjarangkan">Banjarangkan</option>
																	<option value="dawan">Dawan</option>
																	<option value="klungkung">Klungkung</option>
																	<option value="nusapenida">Nusapenida</option>

																	<option value="tabanan" disabled>Tabanan</option>
																	<option value="baturiti">Baturiti</option>
																	<option value="kediri">Kediri</option>
																	<option value="kerambitan">Kerambitan</option>
																	<option value="marga">Marga</option>
																	<option value="penebel">Penebel</option>
																	<option value="pupuan">Pupuan</option>
																	<option value="selemadeg">Selemadeg</option>
																	<option value="selemadeg_barat">Selemadeg Barat</option>
																	<option value="selemadeg_timur">Selemadeg Timur</option>
																</select>
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Lokasi Desa / Kelurahan</label>
															</div>
															<div class="col-md-9 form-group">
																<!-- <input type="text" name="village_location" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" /> -->
																<select name="village_location" class="col-12" style="border-color:#435ebe; color:#000000; padding: 8px 8px; border-radius: 4px;">
																	<option value="abiansemal" disabled>Abiansemal</option>
																	<option value="abiansemal">Abiansemal</option>
																	<option value="angantaka">Angantaka</option>
																	<option value="ayunan">Ayunan</option>
																	<option value="blahkiuh">Blahkiuh</option>
																	<option value="bongkasa">Bongkasa</option>
																	<option value="bongkasa_pertiwi">Bongkasa Pertiwi</option>
																	<option value="darmasaba">Darmasaba</option>
																	<option value="dauh_yeh_cani">Dauh Yeh Cani</option>
																	<option value="jagapati">Jagapati</option>
																	<option value="mambal">Mambal</option>
																	<option value="mekar_bhuana">Mekar Bhuana</option>
																	<option value="punggul">Punggul</option>
																	<option value="sangeh">Sangeh</option>
																	<option value="sedang">Sedang</option>
																	<option value="selat">Selat</option>
																	<option value="sibang_gede">Sibang Gede</option>
																	<option value="sibang_kaja">Sibang Kaja</option>
																	<option value="taman">Taman</option>

																	<option value="kuta_kelurahan" disabled>Kuta Kelurahan</option>
																	<option value="kedonganan">Kedonganan</option>
																	<option value="tuban">Tuban</option>
																	<option value="kuta">Kuta</option>
																	<option value="legian">Legian</option>
																	<option value="seminyak">Seminyak</option>

																	<option value="kuta_selatan" disabled>Kuta Selatan</option>
																	<option value="benoa">Benoa</option>
																	<option value="tanjung_benoa">Tanjung Benoa</option>
																	<option value="jimbaran">Jimbaran</option>
																	<option value="pecatu">Pecatu</option>
																	<option value="ungasan">Ungasan</option>
																	<option value="kutuh">Kutuh</option>

																	<option value="kuta_utara" disabled>Kuta Utara</option>
																	<option value="canggu">Canggu</option>
																	<option value="dalung">Dalung</option>
																	<option value="tibuneneng">Tibuneneng</option>
																	<option value="kerobokan">Kerobokan</option>
																	<option value="kerobokan_kelod">Kerobokan Kelod</option>
																	<option value="kerobokan_kaja">Kerobokan Kaja</option>

																	<option value="mengwi" disabled>Mengwi</option>
																	<option value="abianbase">Abianbase</option>
																	<option value="kapal">kapal</option>
																	<option value="lukluk">Lukluk</option>
																	<option value="sading">Sading</option>
																	<option value="sempidi">Sempidi</option>
																	<option value="baha">Baha</option>
																	<option value="buduk">Buduk</option>
																	<option value="cemagi">Cemagi</option>
																	<option value="gulingan">Gulingan</option>
																	<option value="kekeran">Kekeran</option>
																	<option value="kuwum">Kuwum</option>
																	<option value="mengwi">Mengwi</option>
																	<option value="mengwitani">Mengwitani</option>
																	<option value="munggu">Munggu</option>
																	<option value="penarungan">Penarungan</option>
																	<option value="pererenan">Pererenan</option>
																	<option value="sembung">Sembung</option>
																	<option value="sobangan">Sobangan</option>
																	<option value="tumbak_bayuh">Tumbak Bayuh</option>
																	<option value="werdi_bhuwana">Werdi Bhuwana</option>

																	<option value="petang" disabled>Petang</option>
																	<option value="belok">Belok</option>
																	<option value="carangsari">Carangsari</option>
																	<option value="getasan">Getasan</option>
																	<option value="pangsan">Pangsan</option>
																	<option value="pelaga">Pelaga</option>
																	<option value="petang">Petang</option>
																	<option value="sulangai">Sulangai</option>

																	<option value="denpasar_barat" disabled>Denpasar Barat</option>
																	<option value="dangin_puri_kaja">Dangin Puri Kaja</option>
																	<option value="dangin_puri_kauh">Dangin Puri Kauh</option>
																	<option value="dauh_puri_kaja">Dauh Puri Kaja</option>
																	<option value="dauh_puri_kauh">Dauh Puri Kauh</option>
																	<option value="dauh_puri_klod">Dauh Puri Klod</option>
																	<option value="padangsambian_kaja">Padangsambian Kaja</option>
																	<option value="padangsambian_kelod">Padangsambian Kelod</option>
																	<option value="pemecutan_kaja">Pemecutan Kaja</option>
																	<option value="pemecutan_kelod">Pemecutan Kelod</option>
																	<option value="tegal_harum">Tegal Harum</option>
																	<option value="tegal_kerta">Tegal Kerta</option>

																	<option value="denpasar_selatan" disabled>Denpasar Selatan</option>
																	<option value="sanur_kaja">Sanur Kaja</option>
																	<option value="sanur_kauh">Sanur Kauh</option>
																	<option value="sidakarya">Sidakarya</option>
																	<option value="panjer">Panjer</option>
																	<option value="pedungan">Pedungan</option>
																	<option value="renon">Renon</option>
																	<option value="sanur">Sanur</option>
																	<option value="serangan">Serangan</option>
																	<option value="sesetan">Sesetan</option>

																	<option value="denpasar_timur" disabled>Denpasar Timur</option>
																	<option value="dangin_puri_klod">Dangin Puri Klod</option>
																	<option value="kesiman_kertalangu">Kesiman Kertalangu</option>
																	<option value="kesiman_petilan">Kesiman Petilan</option>
																	<option value="penatih_dangin_puri">Penatih Dangin Puri</option>
																	<option value="sumerta_kaja">Sumerta Kaja</option>
																	<option value="sumerta_kauh">Sumerta Kauh</option>
																	<option value="sumerta_klod_kelod">Sumerta Klod/Kelod</option>
																	<option value="dangin_puri">Dangin Puri</option>
																	<option value="kesiman">Kesiman</option>
																	<option value="penatih">Penatih</option>
																	<option value="sumerta">Sumerta</option>

																	<option value="denpasar_utara" disabled>Denpasar Utara</option>
																	<option value="dauh_puri_kaja">Dauh Puri Kaja</option>
																	<option value="dauh_puri_kangin">Dauh Puri Kangin</option>
																	<option value="dauh_puri_kauh">Dauh Puri Kauh</option>
																	<option value="peguyangan_kaja">Peguyangan Kaja</option>
																	<option value="peguyangan_kangin">Peguyangan Kangin</option>
																	<option value="pemecutan_kaja">Pemecutan Kaja</option>
																	<option value="ubung_kaja">Ubung Kaja</option>
																	<option value="peguyangan">Peguyangan</option>
																	<option value="tonja">Tonja</option>
																	<option value="ubung">Ubung</option>

																	<option value="bangli" disabled>bangli</option>
																	<option value="bunutin">Bunutin</option>
																	<option value="kayubihi">Kayubihi</option>
																	<option value="landih">Landih</option>
																	<option value="pengotan">Pengotan</option>
																	<option value="taman_bali">Taman Bali</option>
																	<option value="bebalang">Bebalang</option>
																	<option value="cempaga">Cempaga</option>
																	<option value="kawan">Kawan</option>
																	<option value="kubu">Kubu</option>

																	<option value="kintamani" disabled>Kintamani</option>
																	<option value="abangsongan">Abangsongan</option>
																	<option value="abuan">Abuan</option>
																	<option value="awan">Awan</option>
																	<option value="bantang">Bantang</option>
																	<option value="banua">Banua</option>
																	<option value="batudinding">Batudinding</option>
																	<option value="batukaang">Batukaang</option>
																	<option value="batur_selatan">Batur Selatan</option>
																	<option value="batur_tengah">Batur Tengah</option>
																	<option value="batur_utara">Batur Utara</option>
																	<option value="bayungcerik">Bayungcerik</option>
																	<option value="bayung_gede">Bayung Gede</option>
																	<option value="belancan">Belancan</option>
																	<option value="belandingan">Belandingan</option>
																	<option value="belanga">Belanga</option>
																	<option value="belantih">Belantih</option>
																	<option value="binyan">Binyan</option>
																	<option value="bonyoh">Bonyoh</option>
																	<option value="buahan">Buahan</option>
																	<option value="bunutin">Bunutin</option>
																	<option value="catur">Catur</option>
																	<option value="daup">Daup</option>
																	<option value="dausa">Dausa</option>
																	<option value="gunungbau">Gunungbau</option>
																	<option value="katung">Katung</option>
																	<option value="kedisan">Kedisan</option>
																	<option value="kintamani">Kintamani</option>
																	<option value="kutuh">Kutuh</option>
																	<option value="langgahan">Langgahan</option>
																	<option value="lembean">Lembean</option>
																	<option value="mangguh">Mangguh</option>
																	<option value="manikliyu">Manikliyu</option>
																	<option value="mengani">Mengani</option>
																	<option value="pengejaran">Pengejaran</option>
																	<option value="pinggan">Pinggan</option>
																	<option value="satra">Satra</option>
																	<option value="sekaan">Sekaan</option>
																	<option value="sekardadi">Sekardadi</option>
																	<option value="selulung">Selulung</option>
																	<option value="serai">Serai</option>
																	<option value="siakin">Siakin</option>
																	<option value="songan_a">Songan A</option>
																	<option value="songan_b">Songan B</option>
																	<option value="subaya">Subaya</option>
																	<option value="sukawana">Sukawana</option>
																	<option value="suter">Suter</option>
																	<option value="terunyan">Terunyan</option>
																	<option value="ulian">Ulian</option>

																	<option value="susut" disabled>Susut</option>
																	<option value="apuan">Apuan</option>
																	<option value="demulih">Demulih</option>
																	<option value="pengiangan">Pengiangan</option>
																	<option value="penglumbaran">Penglumbaran</option>
																	<option value="selat">Selat</option>
																	<option value="sulahan">Sulahan</option>
																	<option value="susut">Susut</option>
																	<option value="tiga">Tiga</option>

																	<option value="tejakula" disabled>Tembuku</option>
																	<option value="bangbang">Bangbang</option>
																	<option value="jehem">Jehem</option>
																	<option value="peninjoan">Peninjoan</option>
																	<option value="tembuku">Tembuku</option>
																	<option value="undisan">Undisan</option>
																	<option value="yangapi">Yangapi</option>

																	<option value="banjar" disabled>Banjar</option>
																	<option value="banjar_tegeha">Banjar Tegeha</option>
																	<option value="banyuatis">Banyuatis</option>
																	<option value="banyuseri">Banyuseri</option>
																	<option value="cempaga">Cempaga</option>
																	<option value="dencarik">Dencarik</option>
																	<option value="gesing">Gesing</option>
																	<option value="gobleg">Gobleg</option>
																	<option value="kaliasem">Kaliasem</option>
																	<option value="kayuputih">Kayuputih</option>
																	<option value="munduk">Munduk</option>
																	<option value="pedawa">Pedawa</option>
																	<option value="sidetapa">Sidetapa</option>
																	<option value="tampekan">Tampekan</option>
																	<option value="temukus">Temukus</option>
																	<option value="tigawasa">Tigawasa</option>
																	<option value="tirtasari">Tirtasari</option>

																	<!-- Alasangker
																	Anturan
																	Bakti Seraga
																	Jinengdalem
																	Kalibukbuk
																	Nagasepaha
																	Pemaron
																	Penglatan
																	Petandakan
																	Poh Bergong
																	Sari Mekar
																	Tukadmungga
																	Astina
																	Banjar Bali
																	Banjar Jawa
																	Banjar Tegal
																	Banyuasri
																	Banyuning
																	Beratan
																	Kaliuntu
																	Kampung Anyar
																	Kampung Baru
																	Kampung Bugis
																	Kampung Kajanan
																	Kampung Singaraja
																	Kendran
																	Liligundi
																	Paket Agung
																	Penarukan -->

																	<!-- Bengkel
																	Bongancina
																	Busung Biu
																	Kedis
																	Kekeran
																	Pelapuan
																	Pucaksari
																	Sepang
																	Sepang Kelod
																	Subuk
																	Telaga
																	Tinggarsari
																	Tista
																	Titab
																	Umejero -->

																	<!-- Banyupoh
																	Celukanbawang
																	Gerokgak
																	Musi
																	Patas
																	Pejarakan
																	Pemuteran
																	Pengulon
																	Penyabangan
																	Sanggalangit
																	Sumberklampok
																	Sumberklima
																	Tinga-Tinga
																	Tukadsumaga -->

																	<!-- Bengkala
																	Bila
																	Bontihing
																	Bukti
																	Bulian
																	Depeha
																	Kubutambahan
																	Mengening
																	Pakisan
																	Tajun
																	Tambakan
																	Tamblang
																	Tunjung -->

																	<!-- Bebetin
																	Bungkulan
																	Galungan
																	Giri Emas
																	Jagaraga
																	Kerobokan
																	Lemukih
																	Menyali
																	Sangsit
																	Sawan
																	Sekumpul
																	Sinabun
																	Sudaji
																	Suwug -->

																	<!-- Banjar Asem
																	Bestala
																	Bubunan
																	Gunungsari
																	Joanyar
																	Kalianget
																	Kalisada
																	Lokapaksa
																	Mayong
																	Munduk Bestala
																	Pangkung Paruk
																	Patemon
																	Pengastulan
																	Rangdu
																	Ringdikit
																	Sulanyah
																	Tangguwisia
																	Ularan
																	Umeanyar
																	Unggahan
																	Seririt -->

																	<!-- Ambengan
																	Git Git
																	Kayu Putih
																	Padang Bulia
																	Pancasari
																	Panji
																	Panji Anom
																	Pegadungan
																	Pegayaman
																	Sambangan
																	Selat
																	Silangjana
																	Tegal Linggah
																	Wanagiri
																	Sukasada -->

																	<!-- Bondalem
																	Julah
																	Les
																	Madenan
																	Pacung
																	Penuktukan
																	Sambirenteng
																	Sembiran
																	Tejakula
																	Tembok -->

																	<!-- Bedulu
																	Belega
																	Blahbatuh
																	Bona
																	Buruan
																	Keramas
																	Medahan
																	Pering
																	Saba -->


																</select>
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Fungsi</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" name="functional" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Pemilik</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" name="ownership" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Sejarah Kepemilikan</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" name="ownership_history" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Nilai Sejarah</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" name="historical_value" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Nilai Budaya</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" name="cultural_value" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Nilai Estetika</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" name="aesthetic_value" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Nilai Ekonomi</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" name="economic_value" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
															</div>
														</div>
														<div class="col-md-12">
															<div class="row">
																<div class="col-md-3">
																	<label style="color:#435ebe"></label>
																</div>
																<div class="col-md-9 form-group">
																	<button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
																	<button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-3">
						<div class="card">
							<div class="card-body py-4 px-5">
								<div class="d-flex align-items-center">
									<div class="avatar avatar-xl">
										<img src="../../skins/mazer/demo/assets/images/faces/1.jpg" alt="Face 1">
									</div>
									<div class="ms-3 name">
										<h5 class="font-bold">Hello <?php echo substr($dz['name'], 0, 5); ?></h5>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header">
								<h4>Recent Shrines</h4>
							</div>
							<div class="card-content pb-4">
								<?php
								//$qu = mysqli_query($koneksi, "SELECT *,(SELECT name FROM users WHERE id=s.create_by) AS name FROM stem s ORDER BY `cerate_date` DESC LIMIT 0,10 ") or die(mysqli_errno($koneksi));
								$qu = mysqli_query($koneksi, "SELECT *,(SELECT name FROM users WHERE id=name_creator) AS name FROM shrines ORDER BY created_at DESC LIMIT 0,10 ") or die(mysqli_errno($koneksi));
								while ($du = mysqli_fetch_array($qu)) { ?>
									<div class="recent-message d-flex px-4 py-3">
										<div class="avatar avatar-lg">
											<img src="../../skins/mazer/demo/assets/images/faces/1.jpg">
										</div>
										<div class="name ms-4">
											<h5 class="mb-1"><?php echo $du["name_object"] ?></h5>
											<h6 class="text-muted mb-0">by <?php echo $du["name_creator"] ?></h6>
										</div>
									</div>
								<?php
								}
								?>
								<div class="px-4">
									<a href="index.php"><button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>View Shrines</button></a>
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
						<p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="#">Team</a></p>
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
	<?php
	$cb = "<option value=\"\"></option>";
	$qsw = mysqli_query($koneksi, "SELECT * FROM shrines ORDER BY name_creator");
	while ($dsw = mysqli_fetch_array($qsw)) {
		$cb .= "<option value=\"" . $dsw["id"] . "\">" . $dsw["name_creator"] . "</option>";
	}
	?>
	<script languange="javascript">
		function cekUnicode() {
			var str = document.getElementById('basa_kasar_aksara').value;
			for (var i = 0, n = str.length; i < n; i++) {
				if (str.charCodeAt(i) > 255) {
					alert('true');
				}
			}
			alert('false');
		}

		function addLoanwordForm() {
			$('#loanwordform').append('<div class="row">' +
				'		<div class="col-md-3">' +
				'			<label style="color:#435ebe">Loanword Form </label>' +
				'		</div>' +
				'		<div class="col-md-8 form-group">' +
				'			<input type="text" style="border-color:#435ebe; color:#000000;" class="form-control"  name="stem_loanword_form[]" placeholder="">' +
				'		</div>' +
				'	</div>');
		}

		function addLoanwordDonorLang() {
			$('#loanworddonorlang').append('	<div class="row">' +
				'		<div class="col-md-3">' +
				'			<label style="color:#435ebe">Loanword Donor Lang.</label>' +
				'		</div>' +
				'		<div class="col-md-5 form-group">' +
				'			<select class="form-select"  style="border-color:#435ebe; color:#000000;" name="stem_loanword_language_donor[]" aria-label="Default select example"><option value=""></option>' +
				'	<?php echo $cb ?> ' +
				'			</select>' +
				'		</div>' +
				'		<div class="col-md-3 form-group">' +
				'			<input type="text" style="border-color:#435ebe; color:#000000;" class="form-control"  name="stem_loanword_language_donor_new[]" placeholder="Other Language">' +
				'		</div>' +
				'	</div>');
		}

		function addExampleForm() {
			$('table tbody').append('<tr>' +
				'<td colspan="2">' +
				'<div class="row">' +
				'<div class="col-md-3">' +
				'<label style="color:#435ebe">Example Form</label>' +
				'</div>' +
				'<div class="col-md-9 form-group">' +
				'<input type="text" style="border-color:#435ebe; color:#000000;" class="form-control"  name="example_form[]" placeholder="">' +
				'</div>' +
				'</div>' +
				'<div class="row">' +
				'<div class="col-md-3">' +
				'	<label style="color:#435ebe">German Translation </label>' +
				'</div>' +
				'<div class="col-md-9 form-group">' +
				'		<input type="text" style="border-color:#435ebe; color:#000000;" class="form-control"  name="example_GermanTranslation[]" placeholder="">' +
				'	</div>' +
				'</div>' +
				'<div class="row">' +
				'	<div class="col-md-3">' +
				'		<label style="color:#435ebe">Example Variant </label>' +
				'	</div>' +
				'	<div class="col-md-9 form-group">' +
				'		<input type="text" style="border-color:#435ebe; color:#000000;" class="form-control"  name="example_variant[]" placeholder="">' +
				'	</div>' +
				'</div>' +
				'<div class="row">' +
				'		<div class="col-md-3">' +
				'			<label style="color:#435ebe">GermanTransVarian</label>' +
				'		</div>' +
				'		<div class="col-md-9 form-group">' +
				'			<input type="text" style="border-color:#435ebe; color:#000000;" class="form-control"  name="example_GermanTranslationVariant[]" placeholder="">' +
				'		</div>' +
				'	</div>' +
				'<div class="row">' +
				'		<div class="col-md-3">' +
				'			<label style="color:#435ebe">Dialect Variant </label>' +
				'		</div>' +
				'		<div class="col-md-9 form-group">' +
				'			<input type="text" style="border-color:#435ebe; color:#000000;" class="form-control"  name="example_dialect_variant[]" placeholder="">' +
				'		</div>' +
				'	</div>' +
				'	<div class="row">' +
				'		<div class="col-md-3">' +
				'			<label style="color:#435ebe">Etymological Form</label>' +
				'		</div>' +
				'		<div class="col-md-9 form-group">' +
				'			<input type="text" style="border-color:#435ebe; color:#000000;" class="form-control"  name="example_etymological_form[]" placeholder="">' +
				'		</div>' +
				'	</div>' +
				'	<div class="row">' +
				'		<div class="col-md-3">' +
				'			<label style="color:#435ebe">Etym.Lang</label>' +
				'		</div>' +
				'		<div class="col-md-5 form-group">' +
				'			<select class="form-select"  style="border-color:#435ebe; color:#000000;" name="example_etymological_language_donor[]" aria-label="Default select example"><option value=""></option>' +
				'	<?php echo $cb ?> ' +
				'			</select>' +
				'		</div>' +
				'		<div class="col-md-4 form-group">' +
				'			<input type="text" style="border-color:#435ebe; color:#000000;" class="form-control"  name="example_etymological_language_donor_new[]" placeholder="Other Language">' +
				'		</div>' +
				'	</div>' +
				'	<div class="row">' +
				'		<div class="col-md-3">' +
				'			<label style="color:#435ebe">Loanword Form </label>' +
				'		</div>' +
				'		<div class="col-md-9 form-group">' +
				'			<input type="text" style="border-color:#435ebe; color:#000000;" class="form-control"  name="example_loanword_form[]" placeholder="">' +
				'		</div>' +
				'	</div>' +
				'	<div class="row">' +
				'		<div class="col-md-3">' +
				'			<label style="color:#435ebe">Loanword Donor Lang.</label>' +
				'		</div>' +
				'		<div class="col-md-5 form-group">' +
				'			<select class="form-select"  style="border-color:#435ebe; color:#000000;" name="example_loanword_language_donor[]" aria-label="Default select example"><option value=""></option>' +
				'	<?php echo $cb ?> ' +
				'			</select>' +
				'		</div>' +
				'		<div class="col-md-4 form-group">' +
				'			<input type="text" style="border-color:#435ebe; color:#000000;" class="form-control"  name="example_loanword_language_donor_new[]" placeholder="Other Language">' +
				'		</div>' +
				'	</div>' +
				'	<div class="row">' +
				'		<div class="col-md-3">' +
				'			<label style="color:#435ebe">Example Source Form</label>' +
				'		</div>' +
				'		<div class="col-md-9 form-group">' +
				'			<input type="text" style="border-color:#435ebe; color:#000000;" class="form-control"  name="example_source_form[]" placeholder="">' +
				'		</div>' +
				'	</div>' +
				'	<div class="row">' +
				'		<div class="col-md-3">' +
				'			<label style="color:#435ebe">SourceFormHom.ID</label>' +
				'		</div>' +
				'		<div class="col-md-9 form-group">' +
				'			<input type="text" style="border-color:#435ebe; color:#000000;" class="form-control"  name="example_source_form_homonymID[]" placeholder="">' +
				'		</div>' +
				'	</div>' +
				'<div class="row">' +
				'		<div class="col-md-3">' +
				'			<label style="color:#435ebe">Crossref</label>' +
				'		</div>' +
				'		<div class="col-md-9 form-group">' +
				'			<input type="text" style="border-color:#435ebe; color:#000000;" class="form-control"  name="example_crossref[]" placeholder="">' +
				'		</div>' +
				'	</div>' +
				'	<div class="row">' +
				'		<div class="col-md-3">' +
				'			<label style="color:#435ebe">Remark</label>' +
				'		</div>' +
				'		<div class="col-md-9 form-group">' +
				'			<input type="text" style="border-color:#435ebe; color:#000000;" class="form-control"  name="example_remark[]" placeholder="">' +
				'		</div>' +
				'	</div>' +
				'	<div class="row">' +
				'		<div class="col-md-3">' +
				'			<label style="color:#435ebe">Is Complete?</label>' +
				'		</div>' +
				'		<div class="col-md-9 form-group">' +
				'			<select class="form-select"  style="border-color:#435ebe; color:#000000;" name="example_complete[]" aria-label="Default select example">' +
				'				<option value=""></option>' +
				'				<option value="y">Yes</option>' +
				'				<option value="n">No</option>' +
				'			</select>' +
				'		</div>' +
				'	</div>' +
				'<div class="row">' +
				'		<div class="col-md-12">' +
				'			<hr>' +
				'		</div>' +
				'	</div>' +
				'</td>' +

				'</tr>');
		}
	</script>
	</div>
</body>

</html>