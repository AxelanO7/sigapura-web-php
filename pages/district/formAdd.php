<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
	header("location:../errorpage/403.php");
}
$page = "district";
include '../../config/config.php';
$qz = mysqli_query($koneksi, "SELECT * FROM users WHERE username='" . $_SESSION['username'] . "' ");
$dz = mysqli_fetch_array($qz);
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
							<h3>Input Data Kota / Kabupaten</h3>
							<p class="text-subtitle text-muted">Kamus Bahasa Enggano</p>
						</div>
						<div class="col-12 col-md-6 order-md-2 order-first">
							<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Menu</a></li>
									<li class="breadcrumb-item active" aria-current="page">Input Data Kota / Kabupaten</li>
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
												$qd = mysqli_query($koneksi, "SELECT name FROM visitor ORDER BY created_at DESC LIMIT 0,1") or die(mysqli_errno($koneksi));
												$dd = mysqli_fetch_array($qd);
												if (!isset($dd['name'])) {
													$dd["name"] = "None";
												}
												?>
												<h6 class="text-muted font-semibold">Recent Visitor</h6>
												<h6 class="font-extrabold mb-0"><?php echo $dd["name"] ?></h6>
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
										<form class="form form-horizontal" action="../../apps/areaController.php?action=addDataDistrict" method="POST">
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
													<div class="alert alert-danger">Input Data Kota / Kabupaten</div>
													<div class="col-md-12">
														<div class="row">
															<div class="col-md-3">
																<label style="color:#435ebe">Nama</label>
															</div>
															<div class="col-md-9 form-group">
																<input type="text" name="name" class="form-control" placeholder="" style="border-color:#435ebe; color:#000000;" />
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
								<h4>Recent Kota / Kabupaten</h4>
							</div>
							<div class="card-content pb-4">
								<?php
								//$qu = mysqli_query($koneksi, "SELECT *,(SELECT name FROM users WHERE id=s.create_by) AS name FROM stem s ORDER BY `cerate_date` DESC LIMIT 0,10 ") or die(mysqli_errno($koneksi));
								// $qu = mysqli_query($koneksi, "SELECT *,(SELECT name FROM users WHERE id=name_creator) AS name FROM shrines ORDER BY created_at DESC LIMIT 0,10 ") or die(mysqli_errno($koneksi));
								$qu = mysqli_query($koneksi, "SELECT name FROM district LIMIT 0,10") or die(mysqli_errno($koneksi));
								while ($du = mysqli_fetch_array($qu)) { ?>
									<div class="recent-message d-flex px-4 py-3">
										<div class="avatar avatar-lg">
											<img src="../../skins/mazer/demo/assets/images/faces/1.jpg">
										</div>
										<div class="name ms-4">
											<h5 class="mb-1"><?php echo $du["name"] ?></h5>
											<h6 class="text-muted mb-0">Bali</h6>
										</div>
									</div>
								<?php
								}
								?>
								<div class="px-4">
									<a href="index.php"><button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>View Kota / Kabupaten</button></a>
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
	$qsw = mysqli_query($koneksi, "SELECT * FROM visitor ORDER BY name");
	while ($dsw = mysqli_fetch_array($qsw)) {
		$cb .= "<option value=\"" . $dsw["id"] . "\">" . $dsw["name"] . "</option>";
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