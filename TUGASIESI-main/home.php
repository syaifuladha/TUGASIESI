<?php
session_start();
require_once 'koneksi.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];
?>

<?php include 'header.php'; ?>

<main class="min-h-screen bg-gray-50 p-6">
  <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-lg p-8">
    <h1 class="text-3xl font-bold text-green-800 mb-6">Selamat Datang, <?= htmlspecialchars($username) ?>!</h1>
    <p class="text-gray-700 mb-4">
      Ini adalah halaman utama sistem rekomendasi pemilihan UKM Unit Kegiatan Mahasiswa.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <a href="ukm_search.php" class="block">
        <div class="bg-green-100 rounded-lg p-6 shadow hover:shadow-lg transition-shadow">
          <h2 class="text-xl font-semibold text-green-900 mb-2">Rekomendasi UKM</h2>
          <p class="text-green-800">
            Temukan UKM yang sesuai dengan minat dan bakat Anda dengan sistem rekomendasi kami.
          </p>
        </div>
      </a>
    <a href="profile.php" class="block">
      <div class="bg-green-100 rounded-lg p-6 shadow hover:shadow-lg transition-shadow cursor-pointer">
        <h2 class="text-xl font-semibold text-green-900 mb-2">Profil Anda</h2>
        <p class="text-green-800">
          Kelola data profil Anda dan perbarui informasi pribadi dengan mudah.
        </p>
      </div>
            <a href="ukm_list.php" class="block">
      <div class="bg-green-100 rounded-lg p-6 shadow hover:shadow-lg transition-shadow cursor-pointer">
        <h2 class="text-xl font-semibold text-green-900 mb-2">Daftar UKM</h2>
        <p class="text-green-800">
          Jelajahi daftar lengkap UKM yang tersedia di kampus Anda.
        </p>
      </div>
    </div>

    <div class="mt-8">
      <a href="logout.php" class="inline-block bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 transition">
        Logout
      </a>
    </div>
  </div>
</main>

<?php include 'footer.php'; ?>
