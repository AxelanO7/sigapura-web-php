<?php
// mengaktifkan session
session_start();

// menghapus semua session
session_destroy();

// mengalihkan halaman login
header("location:../pages/visitor/login.php?pesan=Anda berhasil logout.");
