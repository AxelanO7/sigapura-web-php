<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
	header("location:../errorpage/403.php");
}
$page = "populate_details";
include '../../config/config.php';
$qz = mysqli_query($koneksi, "SELECT * FROM users WHERE username='" . $_SESSION['username'] . "' ");
$dz = mysqli_fetch_array($qz);
$qt = mysqli_query($koneksi, "SELECT * FROM shrines WHERE id='" . $_GET["id"] . "' ");
$dt = mysqli_fetch_array($qt);
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
							<a href="index.php"><img src="../../skins/mazer/demo/assets/images/logo/sigapura.png" alt="Logo" srcset=""></a>
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
							<h3>View Data Kamus</h3>
							<p class="text-subtitle text-muted">Kamus Bahasa Enggano</p>
						</div>
						<div class="col-12 col-md-6 order-md-2 order-first">
							<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Menu</a></li>
									<li class="breadcrumb-item active" aria-current="page">View Data Kamus</li>
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
										<form class="form form-horizontal" action="../../apps/kamusController.php?action=editData" method="POST">
											<?php $timestart = time(); ?>
											<!-- <input type="hidden" name="timestart" value="<? echo $timestart; ?>">
											<input type="hidden" name="create_by" value="<?php echo $dz['id'] ?>"> -->
											<input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
											<div class="form-body">
												<div class="row" style="margin-top:40px;">
													<div class="alert alert-danger">Input Data Pelinggih</div>
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Nama Object</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="name_object" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["name_object"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Deskripsi Detail</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="description_detail" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["description_detail"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Deskripsi Visual</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="description_visual" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["description_visual"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Tahun Pembuatan Object</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="number" name="year_of_creation" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["year_of_creation"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Periode Pembuatan</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="period_of_creation" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["period_of_creation"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Nama Pencipta</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="name_creator" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["name_creator"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Gaya Pencipta</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="creator_style" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["creator_style"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Bahan Utama</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="main_material" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["main_material"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Bahan Tambahan</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="additional_material" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["additional_material"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Teknik Pembuatan</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="creation_technique" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["creation_technique"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Ornamen</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="ornament" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["ornament"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Panjang</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="number" name="length" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["length"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Tinggi</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="number" name="height" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["height"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Lebar</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="number" name="width" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["width"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Berat</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="number" name="weight" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["weight"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Volume</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="number" name="volume" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["volume"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Kondisi Fisik</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="physical_condition" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["physical_condition"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Tingkat Kerusakan</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="level_of_damage" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["level_of_damage"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Lokasi Negara</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="country_location" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["country_location"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Lokasi Kabupaten</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="district_location" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["district_location"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Lokasi Kecamatan</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="subdistrict_location" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["subdistrict_location"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Lokasi Desa / Kelurahan</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="village_location" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["village_location"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Fungsi</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="functional" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["functional"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Pemilik</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="ownership" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["ownership"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Sejarah Kepemilikan</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="ownership_history" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["ownership_history"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Nilai Sejarah</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="historical_value" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["historical_value"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Nilai Budaya</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="cultural_value" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["cultural_value"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Nilai Estetika</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="aesthetic_value" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["aesthetic_value"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Nilai Ekonomi</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled name="economic_value" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["economic_value"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Link Pelinggih</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" disabled class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" value="<?php echo $dt["link_shrine"] ?>" />
															</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Gambar Pelinggih</label>
															</div>
															<div class="col-md-9 form-group">
																<img src="../../assets/img/shrine/<?php echo $dt["image_shrine"] ?>" alt="" width="100%">
															</div>
														</div>

														// detail gambar
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Detail Gambar Pelinggih</label>
															</div>
															<div class="col-md-9 form-group">
																<img src="../../assets/img/detail/shrine/<?php echo $dt["image_detail"] ?>" alt="" width="100%">
															</div>
														</div>


														<!-- <div class="col-md-12">
															<div class="row">
																<div class="col-md-3">
																	<label style="color:#435ebe"></label>
																</div>
																<div class="col-md-9 form-group">
																	<button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
																	<button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
																</div>
															</div>
														</div> -->
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
								// $qu = mysqli_query($koneksi, "SELECT *,(SELECT name FROM users WHERE id=s.create_by) AS name FROM stem s ORDER BY `cerate_date` DESC LIMIT 0,10 ") or die(mysqli_errno($koneksi));
								$qu = mysqli_query($koneksi, "SELECT *,(SELECT name FROM users WHERE id=name_creator) AS name FROM shrines ORDER BY created_at DESC LIMIT 0,10 ") or die(mysqli_errno($koneksi));
								while ($du = mysqli_fetch_array($qu)) { ?>
									<div class="recent-message d-flex px-4 py-3">
										<div class="avatar avatar-lg">
											<img src="../../skins/mazer/demo/assets/images/faces/1.jpg">
										</div>
										<div class="name ms-4">
											<h5 class="mb-1"><?php echo $du["name_object"] ?></h5>
											<h6 class="text-muted mb-0">by <?php echo $du["name"] ?></h6>
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