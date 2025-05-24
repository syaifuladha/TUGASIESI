<?php
session_start();
require_once 'koneksi.php';
include 'header.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$success_message = '';
$error_message = '';

// Get user data
try {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();
} catch(PDOException $e) {
    $error_message = "Error: " . $e->getMessage();
}

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $pdo->prepare("
            UPDATE users 
            SET full_name = ?, email = ?, nim = ?, fakultas = ?, jurusan = ?, 
                phone = ?, address = ?
            WHERE id = ?
        ");
        
        $stmt->execute([
            $_POST['full_name'],
            $_POST['email'],
            $_POST['nim'],
            $_POST['fakultas'],
            $_POST['jurusan'],
            $_POST['phone'],
            $_POST['address'],
            $_SESSION['user_id']
        ]);

        $success_message = "Profile berhasil diperbarui!";
        
        // Refresh user data
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch();
    } catch(PDOException $e) {
        $error_message = "Error updating profile: " . $e->getMessage();
    }
}
?>

<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4">
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <!-- Profile Header -->
            <div class="bg-gradient-to-r from-green-600 to-green-700 px-8 py-6">
                <h1 class="text-2xl font-bold text-white">Profile Settings</h1>
                <p class="text-green-100">Update your personal information</p>
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

            <!-- Profile Form -->
            <form method="POST" class="p-8 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Full Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Lengkap
                        </label>
                        <input 
                            type="text" 
                            name="full_name" 
                            value="<?= htmlspecialchars($user['full_name'] ?? '') ?>"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            required
                        >
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Email
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            value="<?= htmlspecialchars($user['email'] ?? '') ?>"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            required
                        >
                    </div>

                    <!-- NIM -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            NIM
                        </label>
                        <input 
                            type="text" 
                            name="nim" 
                            value="<?= htmlspecialchars($user['nim'] ?? '') ?>"
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
                            value="<?= htmlspecialchars($user['phone'] ?? '') ?>"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        >
                    </div>

                    <!-- Fakultas -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Fakultas
                        </label>
                        <input 
                            type="text" 
                            name="fakultas" 
                            value="<?= htmlspecialchars($user['fakultas'] ?? '') ?>"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        >
                    </div>

                    <!-- Jurusan -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Jurusan
                        </label>
                        <input 
                            type="text" 
                            name="jurusan" 
                            value="<?= htmlspecialchars($user['jurusan'] ?? '') ?>"
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
                    ><?= htmlspecialchars($user['address'] ?? '') ?></textarea>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button 
                        type="submit"
                        class="px-6 py-3 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors"
                    >
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
