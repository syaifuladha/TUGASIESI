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
$ukm_id = isset($_GET['id']) ? $_GET['id'] : null;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ukm_id'])) {
    try {
        // Check if user already registered for this UKM
        $check_stmt = $pdo->prepare("SELECT * FROM ukm_registrations WHERE user_id = ? AND ukm_id = ?");
        $check_stmt->execute([$_SESSION['user_id'], $_POST['ukm_id']]);
        
        if ($check_stmt->fetch()) {
            $error_message = "Anda sudah terdaftar di UKM ini.";
        } else {
            // Generate registration number
            $registration_number = 'REG-' . date('Ymd') . '-' . rand(1000, 9999);
            
            // Insert registration
            $stmt = $pdo->prepare("
                INSERT INTO ukm_registrations 
                (user_id, ukm_id, registration_number, notes, status, payment_status) 
                VALUES (?, ?, ?, ?, 'Pending', 'Unpaid')
            ");
            
            $stmt->execute([
                $_SESSION['user_id'],
                $_POST['ukm_id'],
                $registration_number,
                $_POST['notes'] ?? ''
            ]);

            $success_message = "Pendaftaran berhasil! Nomor registrasi: " . $registration_number;
        }
    } catch(PDOException $e) {
        $error_message = "Error dalam pendaftaran: " . $e->getMessage();
    }
}

// Get UKM list
try {
    $stmt = $pdo->query("SELECT u.*, c.name as category_name 
                         FROM ukm u 
                         LEFT JOIN ukm_categories c ON u.category_id = c.id 
                         WHERE u.status = 'Aktif'");
    $ukm_list = $stmt->fetchAll();
} catch(PDOException $e) {
    $error_message = "Error: " . $e->getMessage();
    $ukm_list = [];
}
?>

<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4">
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-green-600 to-green-700 px-8 py-6">
                <h1 class="text-2xl font-bold text-white">Pendaftaran UKM</h1>
                <p class="text-green-100">Silahkan pilih UKM yang ingin diikuti</p>
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

            <!-- Registration Form -->
            <form method="POST" class="p-8 space-y-6">
                <!-- UKM Selection -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Pilih UKM
                    </label>
                    <select 
                        name="ukm_id" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                    >
                        <option value="">Pilih UKM</option>
                        <?php foreach ($ukm_list as $ukm): ?>
                            <option value="<?= $ukm['id'] ?>" <?= ($ukm_id == $ukm['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($ukm['name']) ?> 
                                (<?= htmlspecialchars($ukm['category_name']) ?>) - 
                                Rp <?= number_format($ukm['registration_fee'], 0, ',', '.') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Notes -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Catatan Tambahan
                    </label>
                    <textarea 
                        name="notes" 
                        rows="3" 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                        placeholder="Tambahkan catatan jika diperlukan"
                    ></textarea>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button 
                        type="submit"
                        class="px-6 py-3 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-colors"
                    >
                        Daftar UKM
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
