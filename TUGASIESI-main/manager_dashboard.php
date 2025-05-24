<?php
session_start();
require_once 'koneksi.php';
include 'header.php';

// Check if user is logged in and is manager
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'manager') {
    header('Location: login.php');
    exit;
}

$success_message = '';
$error_message = '';

// Handle UKM creation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'create_ukm') {
        try {
            $stmt = $pdo->prepare("
                INSERT INTO ukm (
                    name, description, max_members, registration_fee
                ) VALUES (?, ?, ?, ?)
            ");
            
            $stmt->execute([
                $_POST['name'],
                $_POST['description'],
                $_POST['max_members'],
                $_POST['registration_fee']
            ]);

            $success_message = 'UKM berhasil ditambahkan!';
        } catch (PDOException $e) {
            $error_message = 'Database error: ' . $e->getMessage();
        }
    } elseif ($_POST['action'] === 'approve_registration') {
        try {
            $stmt = $pdo->prepare("
                UPDATE ukm_registrations 
                SET status = 'Approved', 
                    approved_at = NOW(),
                    approved_by = ?
                WHERE id = ? AND payment_status = 'Paid'
            ");
            
            $stmt->execute([$_SESSION['user_id'], $_POST['registration_id']]);
            
            if ($stmt->rowCount() > 0) {
                $success_message = 'Pendaftaran berhasil disetujui!';
            } else {
                $error_message = 'Pendaftaran tidak dapat disetujui. Pastikan pembayaran telah dilakukan.';
            }
        } catch (PDOException $e) {
            $error_message = 'Database error: ' . $e->getMessage();
        }
    }
}

// Get pending registrations
try {
    $stmt = $pdo->prepare("
        SELECT r.*, u.full_name, u.nim, k.name as ukm_name, k.registration_fee
        FROM ukm_registrations r
        JOIN users u ON r.user_id = u.id
        JOIN ukm k ON r.ukm_id = k.id
        WHERE r.status = 'Pending'
        ORDER BY r.registration_date DESC
    ");
    $stmt->execute();
    $pending_registrations = $stmt->fetchAll();
} catch (PDOException $e) {
    $error_message = 'Database error: ' . $e->getMessage();
    $pending_registrations = [];
}

// Get all UKM
try {
    $stmt = $pdo->prepare("
        SELECT * FROM ukm
        ORDER BY name ASC
    ");
    $stmt->execute();
    $ukm_list = $stmt->fetchAll();
} catch (PDOException $e) {
    $error_message = 'Database error: ' . $e->getMessage();
    $ukm_list = [];
}
?>

<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Manager Dashboard</h1>
            <p class="text-gray-600">Kelola UKM dan Pendaftaran Mahasiswa</p>
        </div>

        <?php if ($success_message): ?>
            <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6">
                <p class="text-green-700"><?= htmlspecialchars($success_message) ?></p>
            </div>
        <?php endif; ?>

        <?php if ($error_message): ?>
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                <p class="text-red-700"><?= htmlspecialchars($error_message) ?></p>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Add New UKM Form -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Tambah UKM Baru</h2>
                <form method="POST" class="space-y-4">
                    <input type="hidden" name="action" value="create_ukm">
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nama UKM
                        </label>
                        <input 
                            type="text" 
                            name="name" 
                            required 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Deskripsi
                        </label>
                        <textarea 
                            name="description" 
                            required 
                            rows="3"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        ></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Maksimal Anggota
                            </label>
                            <input 
                                type="number" 
                                name="max_members" 
                                required 
                                min="1"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Biaya Pendaftaran
                            </label>
                            <input 
                                type="number" 
                                name="registration_fee" 
                                required 
                                min="0"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            >
                        </div>
                    </div>

                    <button 
                        type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors"
                    >
                        Tambah UKM
                    </button>
                </form>
            </div>

            <!-- Pending Registrations -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Pendaftaran Menunggu Persetujuan</h2>
                <?php if (empty($pending_registrations)): ?>
                    <p class="text-gray-500 text-center py-4">Tidak ada pendaftaran yang menunggu persetujuan</p>
                <?php else: ?>
                    <div class="space-y-4">
                        <?php foreach ($pending_registrations as $registration): ?>
                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <h3 class="font-medium"><?= htmlspecialchars($registration['full_name']) ?></h3>
                                        <p class="text-sm text-gray-600">NIM: <?= htmlspecialchars($registration['nim']) ?></p>
                                        <p class="text-sm text-gray-600">UKM: <?= htmlspecialchars($registration['ukm_name']) ?></p>
                                        <p class="text-sm text-gray-600">Biaya: Rp <?= number_format($registration['registration_fee'], 0, ',', '.') ?></p>
                                        <p class="text-sm mt-1">
                                            Status Pembayaran: 
                                            <span class="<?= $registration['payment_status'] === 'Paid' ? 'text-green-600 font-medium' : 'text-red-600' ?>">
                                                <?= $registration['payment_status'] === 'Paid' ? 'Sudah Dibayar' : 'Belum Dibayar' ?>
                                            </span>
                                        </p>
                                    </div>
                                    <form method="POST">
                                        <input type="hidden" name="action" value="approve_registration">
                                        <input type="hidden" name="registration_id" value="<?= $registration['id'] ?>">
                                        <button 
                                            type="submit"
                                            <?= $registration['payment_status'] !== 'Paid' ? 'disabled' : '' ?>
                                            class="<?= $registration['payment_status'] === 'Paid' 
                                                ? 'bg-green-600 hover:bg-green-700' 
                                                : 'bg-gray-400 cursor-not-allowed' ?> 
                                                text-white px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors text-sm"
                                        >
                                            <?= $registration['payment_status'] === 'Paid' ? 'Setujui' : 'Menunggu Pembayaran' ?>
                                        </button>
                                    </form>
                                </div>
                                <div class="text-sm text-gray-500 mt-2">
                                    <p>Mendaftar pada: <?= date('d/m/Y H:i', strtotime($registration['registration_date'])) ?></p>
                                    <?php if ($registration['notes']): ?>
                                        <p class="mt-1">Catatan: <?= htmlspecialchars($registration['notes']) ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- UKM List -->
            <div class="lg:col-span-2 bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold mb-4">Daftar UKM</h2>
                <?php if (empty($ukm_list)): ?>
                    <p class="text-gray-500 text-center py-4">Belum ada UKM yang terdaftar</p>
                <?php else: ?>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama UKM
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Deskripsi
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Max Anggota
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Biaya
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php foreach ($ukm_list as $ukm): ?>
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <?= htmlspecialchars($ukm['name']) ?>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            <?= htmlspecialchars($ukm['description']) ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <?= htmlspecialchars($ukm['max_members']) ?>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            Rp <?= number_format($ukm['registration_fee'], 0, ',', '.') ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
