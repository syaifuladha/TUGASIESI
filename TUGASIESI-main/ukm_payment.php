<?php
session_start();

// Temporarily comment out database connection until we set it up
// require_once 'koneksi.php';

// Temporary session simulation for testing
if (!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = 1;
    $_SESSION['username'] = 'Test User';
}

include 'header.php';

$ukm_id = isset($_GET['id']) ? $_GET['id'] : 1;

// Simulate getting UKM data
$ukm_list = [
    1 => [
        'nama' => 'UKM Basket',
        'kategori' => 'Olahraga',
        'icon' => 'fas fa-basketball-ball',
        'biaya' => 35000
    ],
    2 => [
        'nama' => 'UKM Teater',
        'kategori' => 'Seni',
        'icon' => 'fas fa-theater-masks',
        'biaya' => 35000
    ],
    3 => [
        'nama' => 'UKM Robotika',
        'kategori' => 'Akademik',
        'icon' => 'fas fa-robot',
        'biaya' => 35000
    ],
    4 => [
        'nama' => 'UKM Fotografi',
        'kategori' => 'Seni',
        'icon' => 'fas fa-camera-retro',
        'biaya' => 35000
    ],
    5 => [
        'nama' => 'UKM Pencak Silat',
        'kategori' => 'Olahraga',
        'icon' => 'fas fa-fist-raised',
        'biaya' => 35000
    ],
    6 => [
        'nama' => 'UKM Programming',
        'kategori' => 'Akademik',
        'icon' => 'fas fa-code',
        'biaya' => 35000
    ]
];

$ukm = isset($ukm_list[$ukm_id]) ? $ukm_list[$ukm_id] : null;
if (!$ukm) {
    header('Location: ukm_list.php');
    exit;
}

// Generate random registration number
$registration_number = 'REG-' . date('Ymd') . '-' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
?>

<main class="min-h-screen bg-gray-50 p-6">
    <div class="max-w-2xl mx-auto">
        <!-- Back Button -->
        <a href="ukm_join.php?id=<?php echo $ukm_id; ?>" class="inline-flex items-center text-gray-600 hover:text-gray-800 mb-6 group">
            <i class="fas fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform"></i>
            Kembali ke Form Pendaftaran
        </a>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-br from-green-400 to-green-600 p-6 text-white text-center">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-qrcode text-3xl"></i>
                </div>
                <h1 class="text-2xl font-bold mb-2">Pembayaran Registrasi</h1>
                <p class="opacity-90">Silakan selesaikan pembayaran untuk menyelesaikan pendaftaran</p>
            </div>

            <!-- Content -->
            <div class="p-6">
                <!-- Registration Details -->
                <div class="mb-8">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Detail Registrasi</h2>
                    <div class="bg-gray-50 rounded-lg p-4 space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Nomor Registrasi</span>
                            <span class="font-medium text-gray-900"><?php echo $registration_number; ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">UKM</span>
                            <span class="font-medium text-gray-900"><?php echo $ukm['nama']; ?></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Biaya Registrasi</span>
                            <span class="font-medium text-gray-900">Rp <?php echo number_format($ukm['biaya'], 0, ',', '.'); ?></span>
                        </div>
                    </div>
                </div>

                <!-- Payment Methods -->
                <div class="space-y-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Metode Pembayaran</h2>
                    
                    <!-- QRIS -->
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-qrcode text-2xl text-gray-600"></i>
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-900">QRIS</h3>
                                    <p class="text-sm text-gray-500">Scan menggunakan aplikasi e-wallet</p>
                                </div>
                            </div>
                            <span class="px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full">
                                Recommended
                            </span>
                        </div>
                        
                        <!-- QR Code -->
                        <div class="flex flex-col items-center gap-4 p-4 border border-dashed border-gray-300 rounded-lg bg-gray-50">
                            <div class="w-48 h-48 bg-white p-3 rounded-lg shadow-sm">
                                <!-- Replace with actual QR code image -->
                                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?php echo urlencode($registration_number . '|' . $ukm['nama'] . '|' . $ukm['biaya']); ?>" 
                                     alt="QR Code" 
                                     class="w-full h-full"
                                >
                            </div>
                            <div class="text-center">
                                <p class="text-sm text-gray-500 mb-2">Pindai QR code menggunakan aplikasi:</p>
                                <div class="flex justify-center gap-4">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/e/e4/Logo_of_GoPay.png" alt="GoPay" class="h-6">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/85/Logo_of_OVO.png" alt="OVO" class="h-6">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/e/eb/Logo_of_Dana.png" alt="DANA" class="h-6">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/86/Logo_of_ShopeePay.png" alt="ShopeePay" class="h-6">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bank Transfer -->
                    <div class="border border-gray-200 rounded-lg p-4">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-university text-2xl text-gray-600"></i>
                            </div>
                            <div>
                                <h3 class="font-medium text-gray-900">Transfer Bank</h3>
                                <p class="text-sm text-gray-500">Transfer melalui ATM atau mobile banking</p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <!-- BRI -->
                            <div class="p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center gap-3 mb-2">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/68/BANK_BRI_logo.svg/2560px-BANK_BRI_logo.svg.png" alt="BRI" class="h-6">
                                    <span class="font-medium text-gray-900">Bank BRI</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="font-mono text-lg">1234 5678 9012 3456</span>
                                    <button onclick="copyToClipboard('1234567890123456')" class="text-green-600 hover:text-green-700">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">a.n. UKM UNIVERSITAS</p>
                            </div>

                            <!-- BNI -->
                            <div class="p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center gap-3 mb-2">
                                    <img src="https://upload.wikimedia.org/wikipedia/id/thumb/5/55/BNI_logo.svg/2560px-BNI_logo.svg.png" alt="BNI" class="h-6">
                                    <span class="font-medium text-gray-900">Bank BNI</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="font-mono text-lg">9876 5432 1098 7654</span>
                                    <button onclick="copyToClipboard('9876543210987654')" class="text-green-600 hover:text-green-700">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                                <p class="text-sm text-gray-500 mt-1">a.n. UKM UNIVERSITAS</p>
                            </div>
                        </div>
                    </div>

                    <!-- Instructions -->
                    <div class="bg-blue-50 border border-blue-100 rounded-lg p-4">
                        <h3 class="font-medium text-blue-800 mb-2">Instruksi Pembayaran:</h3>
                        <ol class="list-decimal list-inside space-y-1 text-sm text-blue-700">
                            <li>Pilih metode pembayaran yang diinginkan (QRIS atau transfer bank)</li>
                            <li>Lakukan pembayaran sebesar <span class="font-medium">Rp <?php echo number_format($ukm['biaya'], 0, ',', '.'); ?></span></li>
                            <li>Simpan bukti pembayaran</li>
                            <li>Upload bukti pembayaran melalui tombol di bawah ini</li>
                        </ol>
                    </div>

                    <!-- Back to Home Button -->
                    <div class="flex justify-center pt-4">
                        <button onclick="showSuccessAndRedirect()" 
                                class="bg-[#00A651] hover:bg-[#008741] text-white px-8 py-3 rounded-lg text-lg font-semibold transition-all hover:shadow-lg flex items-center gap-2">
                            <i class="fas fa-check-circle"></i>
                            Selesai & Kembali ke Beranda
                        </button>
                    </div>

                    <!-- Success Popup -->
                    <div id="successPopup" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
                        <div class="bg-white rounded-lg p-8 max-w-md mx-4 relative animate-bounce-in">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-check-circle text-4xl text-green-500"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Pembayaran Berhasil!</h3>
                                <p class="text-gray-600 mb-6">Terima kasih telah mendaftar di <?php echo $ukm['nama']; ?>. Kami akan memproses pendaftaran Anda.</p>
                                <button onclick="redirectToHome()" 
                                        class="bg-[#00A651] hover:bg-[#008741] text-white px-6 py-2 rounded-lg font-medium transition-all">
                                    Kembali ke Beranda
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(() => {
        alert('Nomor rekening berhasil disalin!');
    }).catch(err => {
        console.error('Failed to copy text: ', err);
    });
}

function showSuccessAndRedirect() {
    document.getElementById('successPopup').classList.remove('hidden');
    document.getElementById('successPopup').classList.add('flex');
}

function redirectToHome() {
    window.location.href = 'home.php';
}

// Add animation styles
const style = document.createElement('style');
style.textContent = `
    @keyframes bounceIn {
        0% {
            opacity: 0;
            transform: scale(0.3);
        }
        50% {
            opacity: 0.9;
            transform: scale(1.1);
        }
        80% {
            opacity: 1;
            transform: scale(0.89);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }
    .animate-bounce-in {
        animation: bounceIn 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }
`;
document.head.appendChild(style);
</script>

<?php include 'footer.php'; ?>
