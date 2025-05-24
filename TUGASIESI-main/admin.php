<?php
session_start();
require_once 'koneksi.php';
include 'header.php';

// Check if user is logged in and is admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit;
}

$success_message = '';
$error_message = '';

// Handle new user creation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Check if username or email already exists
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ? OR nim = ?");
        $stmt->execute([$_POST['username'], $_POST['email'], $_POST['nim']]);
        if ($stmt->fetch()) {
            $error_message = 'Username, email, atau NIM sudah terdaftar.';
        } else {
            // Hash password
            $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // Insert new user with student data
            $stmt = $pdo->prepare("
                INSERT INTO users (
                    username, password, email, full_name, nim, 
                    fakultas, jurusan, phone, address, role
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'user')
            ");
            
            $stmt->execute([
                $_POST['username'],
                $hashed_password,
                $_POST['email'],
                $_POST['full_name'],
                $_POST['nim'],
                $_POST['fakultas'],
                $_POST['jurusan'],
                $_POST['phone'],
                $_POST['address']
            ]);

            $success_message = 'Data mahasiswa berhasil ditambahkan!';
        }
    } catch (PDOException $e) {
        $error_message = 'Database error: ' . $e->getMessage();
    }
}

// Get list of faculties for dropdown
$faculties = [
    'Fakultas Ilmu Komputer',
    'Fakultas Ekonomi dan Bisnis',
    'Fakultas Teknik',
    'Fakultas Kedokteran',
    'Fakultas Hukum',
    'Fakultas Ilmu Sosial dan Politik',
    'Fakultas Psikologi',
    'Fakultas Agama Islam'
];
?>

<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4">
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-green-600 to-green-700 px-8 py-6">
                <h1 class="text-2xl font-bold text-white">Tambah Data Mahasiswa Baru</h1>
                <p class="text-green-100">Masukkan data lengkap mahasiswa</p>
            </div>

            <!-- Messages -->
            <?php if ($success_message): ?>
                <div class="bg-green-50 border-l-4 border-green-500 p-4 m-4">
                    <p class="text-green-700"><?= htmlspecialchars($success_message) ?></p>
                </div>
            <?php endif; ?>

            <?php if ($error_message): ?>
                <div class="bg-red-50 border-l-4 border-red-500 p-4 m-4">
                    <p class="text-red-700"><?= htmlspecialchars($error_message) ?></p>
                </div>
            <?php endif; ?>

            <!-- Student Registration Form -->
            <form method="POST" class="p-8 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Full Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Lengkap *
                        </label>
                        <input 
                            type="text" 
                            name="full_name" 
                            required 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        >
                    </div>

                    <!-- NIM -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            NIM *
                        </label>
                        <input 
                            type="text" 
                            name="nim" 
                            required 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        >
                    </div>

                    <!-- Username -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Username *
                        </label>
                        <input 
                            type="text" 
                            name="username" 
                            required 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        >
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Password *
                        </label>
                        <input 
                            type="password" 
                            name="password" 
                            required 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        >
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Email *
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            required 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        >
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nomor Telepon
                        </label>
                        <input 
                            type="tel" 
                            name="phone" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        >
                    </div>

                    <!-- Faculty -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Fakultas *
                        </label>
                        <select 
                            name="fakultas" 
                            required 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        >
                            <option value="">Pilih Fakultas</option>
                            <?php foreach ($faculties as $faculty): ?>
                                <option value="<?= htmlspecialchars($faculty) ?>">
                                    <?= htmlspecialchars($faculty) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Major -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Jurusan *
                        </label>
                        <input 
                            type="text" 
                            name="jurusan" 
                            required 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        >
                    </div>
                </div>

                <!-- Address -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Alamat
                    </label>
                    <textarea 
                        name="address" 
                        rows="3" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                    ></textarea>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end gap-4">
                    <a 
                        href="admin_dashboard.php" 
                        class="px-6 py-3 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors"
                    >
                        Kembali
                    </a>
                    <button 
                        type="submit"
                        class="px-6 py-3 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors"
                    >
                        Tambah Mahasiswa
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
