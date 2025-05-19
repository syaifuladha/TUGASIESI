<?php
session_start();
include('koneksi.php');

// Ambil data dari form login
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

// Query untuk cek username dan password
$query = "SELECT * FROM mahasiswa WHERE username = '$username' AND password = '$password'";
$hasil = mysqli_query($conn, $query);
$data_user = mysqli_fetch_assoc($hasil);

// Cek apakah data user ditemukan
if ($data_user != null) {
    $_SESSION['user'] = $data_user;
    header('Location: dashboard.php');
} else {
    // Jika username atau password salah
    echo "<script>alert('Username atau password salah'); window.location.href='./login.php';</script>";
}
?>