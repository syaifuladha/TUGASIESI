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
  <div class="max-w-7xl mx-auto">
    <div class="bg-white rounded-lg shadow-lg p-8 mb-6">
      <h1 class="text-3xl font-bold text-green-800 mb-6">Rekomendasi UKM</h1>
      <p class="text-gray-700 mb-8">
        Pilih minat dan bakat Anda untuk mendapatkan rekomendasi UKM yang sesuai.
      </p>

      <form class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-green-800 font-semibold mb-2">Minat Utama</label>
            <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600">
              <option value="">Pilih Minat Utama</option>
              <option value="olahraga">Olahraga</option>
              <option value="seni">Seni & Budaya</option>
              <option value="teknologi">Teknologi</option>
              <option value="akademik">Akademik</option>
              <option value="sosial">Sosial</option>
            </select>
          </div>
          <div>
            <label class="block text-green-800 font-semibold mb-2">Keahlian</label>
            <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600">
              <option value="">Pilih Keahlian</option>
              <option value="pemrograman">Pemrograman</option>
              <option value="desain">Desain</option>
              <option value="musik">Musik</option>
              <option value="fotografi">Fotografi</option>
              <option value="menulis">Menulis</option>
            </select>
          </div>
        </div>

        <button type="submit" class="bg-green-800 text-white px-6 py-2 rounded hover:bg-green-900 transition">
          Dapatkan Rekomendasi
        </button>
      </form>
    </div>

    <!-- Hasil Rekomendasi -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-xl font-semibold text-green-800 mb-2">UKM Teknologi</h3>
        <p class="text-gray-600 mb-4">Cocok untuk mahasiswa yang tertarik dengan teknologi dan pengembangan software.</p>
        <div class="flex justify-between items-center">
          <span class="text-sm text-green-700">Kesesuaian: 95%</span>
          <a href="#" class="text-green-800 hover:text-green-900">Selengkapnya →</a>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-xl font-semibold text-green-800 mb-2">UKM Programming</h3>
        <p class="text-gray-600 mb-4">Fokus pada pengembangan skill pemrograman dan project IT.</p>
        <div class="flex justify-between items-center">
          <span class="text-sm text-green-700">Kesesuaian: 90%</span>
          <a href="#" class="text-green-800 hover:text-green-900">Selengkapnya →</a>
        </div>
      </div>

      <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-xl font-semibold text-green-800 mb-2">UKM Robotika</h3>
        <p class="text-gray-600 mb-4">Eksplorasi dunia robotika dan automation technology.</p>
        <div class="flex justify-between items-center">
          <span class="text-sm text-green-700">Kesesuaian: 85%</span>
          <a href="#" class="text-green-800 hover:text-green-900">Selengkapnya →</a>
        </div>
      </div>
    </div>

    <div class="mt-8">
      <a href="home.php" class="inline-block bg-gray-600 text-white px-6 py-2 rounded hover:bg-gray-700 transition mr-4">
        Kembali
      </a>
    </div>
  </div>
</main>

<?php include 'footer.php'; ?>
