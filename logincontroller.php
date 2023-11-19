<?php 
    // mengaktifkan session php
    session_start();
    
    // menghubungkan dengan koneksi
    include '../config/config.php';
    
    // menangkap data yang dikirim dari form
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    
    //validasi
    if($username=="" || $_POST['password']==""){
        header("location:../index.php?pesan=Username dan Password tidak boleh kosong. Silahkan ulangi kembali!");
    }else{
        // menyeleksi data user dengan username dan password yang sesuai
        $result = mysqli_query($koneksi,"SELECT * FROM users where username='$username' and password='$password' AND status='1' ");

        $cek = mysqli_num_rows($result);
        
        if($cek > 0) {
            $data = mysqli_fetch_assoc($result);
            //menyimpan session user, nama, status dan id login
            $_SESSION['username'] = $username;
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['status'] = "sudah_login";
            $_SESSION['id_login'] = $data['id'];
            header("location:../pages/populate_details/index.php");
        } else {
            header("location:../index.php?pesan=Gagal login data tidak ditemukan. Silahkan ulangi kembali!");
        }
    }
?>