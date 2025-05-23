<?php
session_start();
require_once 'koneksi.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];

// Simulated user data (replace with database query in production)
$userData = [
    'nama_lengkap' => 'John Doe',
    'email' => 'john.doe@example.com',
    'nim' => '123456789',
    'jurusan' => 'Teknik Informatika',
    'angkatan' => '2022',
    'minat' => 'Teknologi, Pemrograman',
    'bio' => 'Mahasiswa yang antusias dengan pengembangan web dan AI.'
];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // In a real application, you would validate and update the database here
    $userData['nama_lengkap'] = $_POST['nama_lengkap'] ?? $userData['nama_lengkap'];
    $userData['email'] = $_POST['email'] ?? $userData['email'];
    $userData['nim'] = $_POST['nim'] ?? $userData['nim'];
    $userData['jurusan'] = $_POST['jurusan'] ?? $userData['jurusan'];
    $userData['angkatan'] = $_POST['angkatan'] ?? $userData['angkatan'];
    $userData['minat'] = $_POST['minat'] ?? $userData['minat'];
    $userData['bio'] = $_POST['bio'] ?? $userData['bio'];
    
    // Simulate success message
    $success_message = "Profil berhasil diperbarui!";
}
?>

<?php include 'header.php'; ?>

<main class="min-h-screen bg-gray-50 p-6">
    <div class="max-w-4xl mx-auto">
        <!-- Back Button -->
        <a href="home.php" class="inline-flex items-center text-gray-600 hover:text-gray-800 mb-6 group">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 transform group-hover:-translate-x-1 transition-transform" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Kembali ke Beranda
        </a>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Profile Header -->
            <div class="bg-gradient-to-br from-green-600 to-green-800 p-8 text-white">
                <div class="flex flex-col md:flex-row items-center gap-6">
                    <div class="relative">
                        <div class="w-24 h-24 rounded-full bg-white/20 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <button class="absolute bottom-0 right-0 bg-white text-green-800 p-2 rounded-full shadow-md hover:bg-gray-100 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                    </div>
                    <div class="text-center md:text-left">
                        <h1 class="text-2xl font-bold"><?= htmlspecialchars($userData['nama_lengkap']) ?></h1>
                        <p class="text-green-100">@<?= htmlspecialchars($username) ?></p>
                        <p class="mt-2 text-green-100"><?= htmlspecialchars($userData['jurusan']) ?> - Angkatan <?= htmlspecialchars($userData['angkatan']) ?></p>
                    </div>
                </div>
            </div>

            <!-- Success Message -->
            <?php if (isset($success_message)): ?>
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mx-6 mt-6">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <p><?= htmlspecialchars($success_message) ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Profile Form -->
            <form method="POST" class="p-8 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nama_lengkap" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= htmlspecialchars($userData['nama_lengkap']) ?>" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" id="email" name="email" value="<?= htmlspecialchars($userData['email']) ?>" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="nim" class="block text-gray-700 font-medium mb-2">NIM</label>
                        <input type="text" id="nim" name="nim" value="<?= htmlspecialchars($userData['nim']) ?>" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600">
                    </div>
                    <div>
                        <label for="jurusan" class="block text-gray-700 font-medium mb-2">Jurusan</label>
                        <select id="jurusan" name="jurusan" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600">
                            <option value="Teknik Informatika" <?= $userData['jurusan'] === 'Teknik Informatika' ? 'selected' : '' ?>>Teknik Informatika</option>
                            <option value="Sistem Informasi" <?= $userData['jurusan'] === 'Sistem Informasi' ? 'selected' : '' ?>>Sistem Informasi</option>
                            <option value="Teknik Elektro" <?= $userData['jurusan'] === 'Teknik Elektro' ? 'selected' : '' ?>>Teknik Elektro</option>
                            <option value="Teknik Mesin" <?= $userData['jurusan'] === 'Teknik Mesin' ? 'selected' : '' ?>>Teknik Mesin</option>
                            <option value="Manajemen" <?= $userData['jurusan'] === 'Manajemen' ? 'selected' : '' ?>>Manajemen</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="angkatan" class="block text-gray-700 font-medium mb-2">Angkatan</label>
                        <select id="angkatan" name="angkatan" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600">
                            <?php for ($year = date('Y'); $year >= 2010; $year--): ?>
                                <option value="<?= $year ?>" <?= $userData['angkatan'] === (string)$year ? 'selected' : '' ?>><?= $year ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div>
                        <label for="minat" class="block text-gray-700 font-medium mb-2">Minat</label>
                        <input type="text" id="minat" name="minat" value="<?= htmlspecialchars($userData['minat']) ?>" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600" 
                            placeholder="Contoh: Teknologi, Seni, Olahraga">
                    </div>
                </div>

                <div>
                    <label for="bio" class="block text-gray-700 font-medium mb-2">Bio</label>
                    <textarea id="bio" name="bio" rows="4" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-600"><?= htmlspecialchars($userData['bio']) ?></textarea>
                </div>

                <div class="pt-6">
                    <button type="submit" class="bg-green-700 hover:bg-green-800 text-white px-6 py-3 rounded-md font-medium transition">
                        Simpan Perubahan
                    </button>
                    <a href="home.php" class="ml-4 text-gray-600 hover:text-gray-800 font-medium">
                        Batalkan
                    </a>
                </div>
            </form>

            <!-- Account Settings Section -->
            <div class="border-t border-gray-200 px-8 py-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Pengaturan Akun</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <h4 class="text-sm font-medium text-gray-700">Ubah Password</h4>
                            <p class="text-sm text-gray-500">Perbarui password akun Anda</p>
                        </div>
                        <button class="text-green-700 hover:text-green-900 text-sm font-medium">
                            Ubah Password
                        </button>
                    </div>
                    <div class="flex justify-between items-center">
                        <div>
                            <h4 class="text-sm font-medium text-gray-700">Hapus Akun</h4>
                            <p class="text-sm text-gray-500">Hapus permanen akun Anda dan semua data terkait</p>
                        </div>
                        <button class="text-red-600 hover:text-red-800 text-sm font-medium">
                            Hapus Akun
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>