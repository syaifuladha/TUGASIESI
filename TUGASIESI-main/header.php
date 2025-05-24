<?php
require_once 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sistem Rekomendasi UKM - Login</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Google Font -->
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap"
    rel="stylesheet"
  />
  <style>
    
        body {
            font-family: 'Poppins', sans-serif;
        }
        .login-container {
            background: linear-gradient(135deg, rgba(0, 128, 0, 0.1) 0%, rgba(0, 128, 0, 0.2) 100%);
        }
        .login-box {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.9);
        }
    
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>

</head>
<body class="bg-gray-50">
  <header class="bg-green-800 text-white py-4 text-center font-semibold text-lg">
    SISTEM REKOMENDASI PEMILIHAN UKM UNIT KEGIATAN MAHASISWA
  </header>
