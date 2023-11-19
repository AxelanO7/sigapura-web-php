<?php
    // menghubungkan dengan koneksi
    $action=$_GET["action"];
	if(($action=="")){
		header("location:../pages/users/index.php");
	}else{
		if ($action=="addData"){
			echo addData($_REQUEST);
		}elseif($action=="addDataMultiple"){
			echo addDataMultiple($_REQUEST);
		}elseif($action=="deleteData"){
			echo deleteData($_REQUEST);
		}elseif($action=="showData"){
			echo showData($_REQUEST);
		}elseif($action=="editData"){
			echo editData($_REQUEST);
		}else{
            header("location:../pages/users/index.php?pesan=Action tidak terdaftar!");
        }
	}
    function showData($request){
		//print_r($request);
		extract($request,EXTR_SKIP);
        include '../config/config.php';
        //cek validasi
        $error = "";
        if($id==""){
            $error .="Id user tidak ditemukan! <br>";
        }
        if($error==""){
            $query = mysqli_query($koneksi, "SELECT * FROM users WHERE id=".$id." ");
            $result = mysqli_fetch_array($query);
            return json_encode($result);
        }else{
            header("location:../pages/users/index.php?pesan=".$error."");
        }
    }
    function addData($request){
		//print_r($request);
		extract($request,EXTR_SKIP);
        include '../config/config.php';
        //cek validasi
        $error = "";
        if($name==""){
            $error .="Nama tidak boleh kosong! <br>";
        }
        if($email==""){
            $error .="Email tidak boleh kosong! <br>";
        }else{
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = $email ." : email yang diinput tidak valid <br>";
            } 
        }
        if($username==""){
            $error .="Username tidak boleh kosong! <br>";
        }else{
            $sql = mysqli_query($koneksi, "SELECT * FROM users WHERE username='".$username."' ");
            $cek = mysqli_num_rows($sql);
            if($cek>0){
                $error .="Username sudah terdaftar dalam sistem, silahkan menggunakan username yang lain. <br>";
            }
        }
        if($password==""){
            $error .="Password tidak boleh kosong! <br>";
        }else{
            if($password!=$repassword){
                $error .="Password tidak sama!, Silahkan diulangi. <br>";
            }
        }
        if($error==""){
            $query=mysqli_query($koneksi, "START TRANSACTION;");
			$q = array();
			
			$q[] = mysqli_query($koneksi, "INSERT INTO users (name, email, username, password, status) VALUES 
                                ('".$name."','".$email."','".$username."','".md5($password)."',1);") or die(mysqli_errno($koneksi));		
								
			if (!is_int(array_search(false,$q))){
				$query=mysqli_query($koneksi, "COMMIT;");
				if ($query){
					header("location:../pages/users/index.php?pesan=Proses Sukses Dilakukan! <br>");
				}else{
					header("location:../pages/users/index.php?pesan=Proses Gagal Dilakukan! <br>");
				}
			}else{
				$query=mysqli_query($koneksi, "ROLLBACK;");
				header("location:../pages/users/index.php?pesan=Proses Gagal Dilakukan! <br>");
			}
        }else{
            header("location:../pages/users/index.php?pesan=".$error."");
        }
    }

    function editData($request){
		//print_r($request);
		extract($request,EXTR_SKIP);
        include '../config/config.php';
        //cek validasi
        $error = "";
        if($name==""){
            $error .="Nama tidak boleh kosong! <br>";
        }
        if($email==""){
            $error .="Email tidak boleh kosong! <br>";
        }else{
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error .= $email ." : email yang diinput tidak valid <br>";
            } 
        }
        $qpassword = "";
        if($password==""){
            $qpassword = "";
        }else{
            if($password!=$repassword){
                $error .="Password tidak sama!, Silahkan diulangi. <br>";
            }else{
                $qpassword = ",password = '".md5($password)."'";
            }
        }
        if($error==""){
            $query=mysqli_query($koneksi, "START TRANSACTION;");
			$q = array();
			
			$q[] = mysqli_query($koneksi, "UPDATE users SET 
                                name='".$name."', 
                                email='".$email."', 
                                username = '".$username."'
                                WHERE id=".$id." ;") or die(mysqli_errno($koneksi));		
								
			if (!is_int(array_search(false,$q))){
				$query=mysqli_query($koneksi, "COMMIT;");
				if ($query){
					header("location:../pages/users/index.php?pesan=Proses Sukses Dilakukan! <br>");
				}else{
					header("location:../pages/users/index.php?pesan=Proses Gagal Dilakukan! <br>");
				}
			}else{
				$query=mysqli_query($koneksi, "ROLLBACK;");
				header("location:../pages/users/index.php?pesan=Proses Gagal Dilakukan! <br>");
			}
        }else{
            header("location:../pages/users/index.php?pesan=".$error."");
        }
    }

    function addDataMultiple($request){
		//print_r($request);
		extract($request,EXTR_SKIP);
        include '../config/config.php';
        //cek validasi
        $error = "";
        if($jumlah==""){
            $error .="Jumlah user yang akan dibuat tidak boleh kosong! <br>";
        }
        if($prefix==""){
            $error .="Prefix User tidak boleh kosong! <br>";
        }else{
            $sql = mysqli_query($koneksi, "SELECT * FROM users WHERE username='".$prefix."001' ");
            $cek = mysqli_num_rows($sql);
            if($cek>0){
                $error .="Username sudah terdaftar dalam sistem, silahkan menggunakan username yang lain. <br>";
            }
        }
        if($password==""){
            $error .="Password tidak boleh kosong! <br>";
        }else{
            if($password!=$repassword){
                $error .="Password tidak sama!, Silahkan diulangi. <br>";
            }
        }
        if($error==""){
            $query=mysqli_query($koneksi, "START TRANSACTION;");
			$q = array();
			for($k = 0; $k<$jumlah; $k++){
                $inc = str_pad(($k+1),3,"0",STR_PAD_LEFT); 
                $q[] = mysqli_query($koneksi, "INSERT INTO users (name, email, username, password, status) VALUES 
                                ('".ucfirst($prefix)."_".$inc."','admin@kamus.web.oss.id','".$prefix."_".$inc."','".md5($password)."',1);") or die(mysqli_errno($koneksi));
            }	
								
			if (!is_int(array_search(false,$q))){
				$query=mysqli_query($koneksi, "COMMIT;");
				if ($query){
					header("location:../pages/users/index.php?pesan=Proses Sukses Dilakukan! <br>");
				}else{
					header("location:../pages/users/index.php?pesan=Proses Gagal Dilakukan! <br>");
				}
			}else{
				$query=mysqli_query($koneksi, "ROLLBACK;");
				header("location:../pages/users/index.php?pesan=Proses Gagal Dilakukan! <br>");
			}
        }else{
            header("location:../pages/users/index.php?pesan=".$error."");
        }
    }

    function deleteData($request){
		//print_r($request);
		extract($request,EXTR_SKIP);
        include '../config/config.php';
        //cek validasi
        $error = "";
        if($id==""){
            $error .="ID tidak ditemukan! <br>";
        }
        
        if($error==""){
            $query=mysqli_query($koneksi, "START TRANSACTION;");
			$q = array();
			
			$q[] = mysqli_query($koneksi, "DELETE FROM users WHERE id=".$id." ;") or die(mysqli_errno($koneksi));		
								
			if (!is_int(array_search(false,$q))){
				$query=mysqli_query($koneksi, "COMMIT;");
				if ($query){
					header("location:../pages/users/index.php?pesan=Proses Sukses Dilakukan! <br>");
				}else{
					header("location:../pages/users/index.php?pesan=Proses Gagal Dilakukan! <br>");
				}
			}else{
				$query=mysqli_query($koneksi, "ROLLBACK;");
				header("location:../pages/users/index.php?pesan=Proses Gagal Dilakukan! <br>");
			}
        }else{
            header("location:../pages/users/index.php?pesan=".$error."");
        }
    }
?>