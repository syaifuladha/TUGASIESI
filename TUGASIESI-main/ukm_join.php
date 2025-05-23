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
        'icon' => 'fas fa-basketball-ball'
    ],
    2 => [
        'nama' => 'UKM Teater',
        'kategori' => 'Seni',
        'icon' => 'fas fa-theater-masks'
    ],
    3 => [
        'nama' => 'UKM Robotika',
        'kategori' => 'Akademik',
        'icon' => 'fas fa-robot'
    ],
    4 => [
        'nama' => 'UKM Fotografi',
        'kategori' => 'Seni',
        'icon' => 'fas fa-camera-retro'
    ],
    5 => [
        'nama' => 'UKM Pencak Silat',
        'kategori' => 'Olahraga',
        'icon' => 'fas fa-fist-raised'
    ],
    6 => [
        'nama' => 'UKM Programming',
        'kategori' => 'Akademik',
        'icon' => 'fas fa-code'
    ]
];

$ukm = isset($ukm_list[$ukm_id]) ? $ukm_list[$ukm_id] : null;
if (!$ukm) {
    header('Location: ukm_list.php');
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Here you would typically process the form data and save to database
    // Redirect to payment page
    header('Location: ukm_payment.php?id=' . $ukm_id);
    exit;
}
?>

<main class="min-h-screen bg-gray-50 p-6">
    <div class="max-w-3xl mx-auto">
        <!-- Back Button -->
        <a href="ukm_detail.php?id=<?php echo $ukm_id; ?>" class="inline-flex items-center text-gray-600 hover:text-gray-800 mb-6 group">
            <i class="fas fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform"></i>
            Kembali ke Detail UKM
        </a>

        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="text-center mb-8">
                <div class="bg-gradient-to-br from-green-400 to-green-600 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="<?php echo $ukm['icon']; ?> text-white text-3xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Gabung <?php echo $ukm['nama']; ?></h1>
                <p class="text-gray-600">Lengkapi formulir di bawah ini untuk bergabung dengan UKM</p>
            </div>

            <form action="" method="POST" class="space-y-8">
                <!-- Data Diri -->
                <div class="space-y-6">
                    <h2 class="text-xl font-semibold text-gray-900 pb-2 border-b">Data Diri</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" id="nama" name="nama" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                placeholder="Masukkan nama lengkap">
                        </div>
                        <div>
                            <label for="nim" class="block text-sm font-medium text-gray-700 mb-1">NIM <span class="text-red-500">*</span></label>
                            <input type="text" id="nim" name="nim" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                placeholder="Masukkan NIM">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="fakultas" class="block text-sm font-medium text-gray-700 mb-1">Fakultas <span class="text-red-500">*</span></label>
                            <select id="fakultas" name="fakultas" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Pilih Fakultas</option>
                                <option value="FMIPA">FMIPA</option>
                                <option value="FT">Fakultas Teknik</option>
                                <option value="FEB">Fakultas Ekonomi dan Bisnis</option>
                                <option value="FH">Fakultas Hukum</option>
                                <option value="FK">Fakultas Kedokteran</option>
                                <option value="FP">Fakultas Pertanian</option>
                            </select>
                        </div>
                        <div>
                            <label for="jurusan" class="block text-sm font-medium text-gray-700 mb-1">Program Studi <span class="text-red-500">*</span></label>
                            <input type="text" id="jurusan" name="jurusan" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                placeholder="Masukkan program studi">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="angkatan" class="block text-sm font-medium text-gray-700 mb-1">Angkatan <span class="text-red-500">*</span></label>
                            <select id="angkatan" name="angkatan" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Pilih Angkatan</option>
                                <?php 
                                $currentYear = date('Y');
                                for ($year = $currentYear; $year >= $currentYear - 4; $year--) {
                                    echo "<option value=\"$year\">$year</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="semester" class="block text-sm font-medium text-gray-700 mb-1">Semester <span class="text-red-500">*</span></label>
                            <select id="semester" name="semester" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                <option value="">Pilih Semester</option>
                                <?php for ($i = 1; $i <= 8; $i++) { ?>
                                    <option value="<?php echo $i; ?>">Semester <?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                placeholder="contoh@email.com">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor WhatsApp <span class="text-red-500">*</span></label>
                            <input type="tel" id="phone" name="phone" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                                placeholder="Contoh: 08123456789">
                        </div>
                    </div>
                </div>

                <!-- Informasi Tambahan -->
                <div class="space-y-6">
                    <h2 class="text-xl font-semibold text-gray-900 pb-2 border-b">Informasi Tambahan</h2>
                    
                    <div>
                        <label for="pengalaman" class="block text-sm font-medium text-gray-700 mb-1">Pengalaman di Bidang <?php echo $ukm['kategori']; ?> <span class="text-red-500">*</span></label>
                        <textarea id="pengalaman" name="pengalaman" rows="4" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            placeholder="Ceritakan pengalaman Anda dalam bidang ini..."></textarea>
                        <p class="mt-1 text-sm text-gray-500">Jelaskan pengalaman Anda dalam bidang ini, baik formal maupun informal.</p>
                    </div>

                    <div>
                        <label for="motivasi" class="block text-sm font-medium text-gray-700 mb-1">Motivasi Bergabung <span class="text-red-500">*</span></label>
                        <textarea id="motivasi" name="motivasi" rows="4" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            placeholder="Apa yang memotivasi Anda untuk bergabung dengan UKM ini?"></textarea>
                        <p class="mt-1 text-sm text-gray-500">Jelaskan mengapa Anda tertarik bergabung dan apa yang ingin Anda capai.</p>
                    </div>

                    <div>
                        <label for="minat_bakat" class="block text-sm font-medium text-gray-700 mb-1">Minat dan Bakat <span class="text-red-500">*</span></label>
                        <textarea id="minat_bakat" name="minat_bakat" rows="4" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            placeholder="Ceritakan minat dan bakat Anda yang relevan..."></textarea>
                        <p class="mt-1 text-sm text-gray-500">Jelaskan minat dan bakat Anda yang sesuai dengan UKM ini.</p>
                    </div>

                    <div>
                        <label for="kontribusi" class="block text-sm font-medium text-gray-700 mb-1">Rencana Kontribusi</label>
                        <textarea id="kontribusi" name="kontribusi" rows="4"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent"
                            placeholder="Apa yang ingin Anda kontribusikan untuk UKM ini?"></textarea>
                        <p class="mt-1 text-sm text-gray-500">Jelaskan bagaimana Anda berencana berkontribusi untuk kemajuan UKM.</p>
                    </div>
                </div>

                <!-- Komitmen -->
                <div class="space-y-6">
                    <h2 class="text-xl font-semibold text-gray-900 pb-2 border-b">Komitmen</h2>

                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="komitmen_waktu" name="komitmen_waktu" type="checkbox" required
                                    class="w-4 h-4 border-gray-300 rounded text-green-600 focus:ring-green-500">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="komitmen_waktu" class="font-medium text-gray-700">
                                    Saya bersedia mengikuti seluruh kegiatan UKM sesuai jadwal yang ditentukan
                                </label>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="komitmen_peraturan" name="komitmen_peraturan" type="checkbox" required
                                    class="w-4 h-4 border-gray-300 rounded text-green-600 focus:ring-green-500">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="komitmen_peraturan" class="font-medium text-gray-700">
                                    Saya bersedia mematuhi seluruh peraturan yang berlaku di UKM
                                </label>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="komitmen_kontribusi" name="komitmen_kontribusi" type="checkbox" required
                                    class="w-4 h-4 border-gray-300 rounded text-green-600 focus:ring-green-500">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="komitmen_kontribusi" class="font-medium text-gray-700">
                                    Saya berkomitmen untuk berkontribusi aktif dalam setiap kegiatan UKM
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end pt-6 border-t border-gray-200">
                    <button type="submit" class="bg-[#00A651] hover:bg-[#008741] text-white px-8 py-3 rounded-lg text-lg font-semibold transition-all hover:shadow-lg flex items-center gap-2">
                        <i class="fas fa-paper-plane"></i>
                        Kirim Pendaftaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
