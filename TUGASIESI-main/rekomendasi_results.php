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

// Simulate recommendation results
$recommendations = [
    [
        'id' => 1,
        'nama' => 'UKM Basket',
        'kategori' => 'Olahraga',
        'match_percentage' => 95,
        'icon' => 'fas fa-basketball-ball',
        'deskripsi' => 'Unit Kegiatan Mahasiswa Basket untuk pengembangan bakat dalam olahraga basket.',
        'alasan' => [
            'Sesuai dengan minat olahraga Anda',
            'Cocok dengan jadwal kuliah Anda',
            'Memiliki program pembinaan yang terstruktur'
        ]
    ],
    [
        'id' => 4,
        'nama' => 'UKM Fotografi',
        'kategori' => 'Seni',
        'match_percentage' => 88,
        'icon' => 'fas fa-camera-retro',
        'deskripsi' => 'Eksplorasi seni fotografi dan videografi.',
        'alasan' => [
            'Sesuai dengan hobi fotografi Anda',
            'Fleksibel dalam kegiatan',
            'Banyak project menarik'
        ]
    ],
    [
        'id' => 6,
        'nama' => 'UKM Programming',
        'kategori' => 'Akademik',
        'match_percentage' => 85,
        'icon' => 'fas fa-code',
        'deskripsi' => 'Pengembangan skill pemrograman dan software development.',
        'alasan' => [
            'Mendukung jurusan Anda',
            'Peluang pengembangan karir',
            'Proyek-proyek inovatif'
        ]
    ]
];
?>

<main class="min-h-screen bg-gray-50 p-6">
    <div class="max-w-7xl mx-auto">
        <!-- Back Button -->
        <a href="home.php" class="inline-flex items-center text-gray-600 hover:text-gray-800 mb-6 group">
            <i class="fas fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform"></i>
            Kembali ke Beranda
        </a>

        <div class="bg-white rounded-lg shadow-lg p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Rekomendasi UKM</h1>
                <p class="text-gray-600">Berdasarkan minat dan preferensi Anda, berikut adalah UKM yang kami rekomendasikan</p>
            </div>

            <!-- Recommendation Cards -->
            <div class="space-y-6">
                <?php foreach ($recommendations as $ukm) { 
                    $matchClass = $ukm['match_percentage'] >= 90 ? 'bg-green-100 text-green-800' : ($ukm['match_percentage'] >= 80 ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800');
                ?>
                    <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-all duration-300">
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-lg flex items-center justify-center text-white">
                                        <i class="<?php echo $ukm['icon']; ?> text-3xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold text-gray-900"><?php echo $ukm['nama']; ?></h3>
                                        <p class="text-gray-600"><?php echo $ukm['kategori']; ?></p>
                                    </div>
                                </div>
                                <span class="px-4 py-2 rounded-full text-sm font-semibold <?php echo $matchClass; ?>">
                                    <?php echo $ukm['match_percentage']; ?>% Match
                                </span>
                            </div>

                            <p class="text-gray-600 mb-4"><?php echo $ukm['deskripsi']; ?></p>

                            <!-- Reasons -->
                            <div class="mb-6">
                                <h4 class="text-sm font-semibold text-gray-900 mb-2">Mengapa UKM ini cocok untuk Anda:</h4>
                                <ul class="space-y-2">
                                    <?php foreach ($ukm['alasan'] as $alasan) { ?>
                                        <li class="flex items-center gap-2 text-gray-600">
                                            <i class="fas fa-check-circle text-green-500"></i>
                                            <?php echo $alasan; ?>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-wrap gap-3">
                                <a href="ukm_detail.php?id=<?php echo $ukm['id']; ?>" 
                                   class="inline-flex items-center gap-2 bg-[#00A651] hover:bg-[#008741] text-white px-6 py-2.5 rounded-lg font-medium transition-all hover:shadow-lg">
                                    <i class="fas fa-info-circle"></i>
                                    Lihat Profil UKM
                                </a>
                                <a href="ukm_join.php?id=<?php echo $ukm['id']; ?>" 
                                   class="inline-flex items-center gap-2 border-2 border-[#00A651] text-[#00A651] hover:bg-[#00A651] hover:text-white px-6 py-2.5 rounded-lg font-medium transition-all">
                                    <i class="fas fa-user-plus"></i>
                                    Gabung Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- Note -->
            <div class="mt-8 p-4 bg-blue-50 border border-blue-100 rounded-lg">
                <div class="flex items-start gap-3">
                    <i class="fas fa-info-circle text-blue-500 mt-1"></i>
                    <div>
                        <h4 class="font-medium text-blue-900 mb-1">Catatan</h4>
                        <p class="text-blue-700 text-sm">
                            Rekomendasi ini didasarkan pada minat, bakat, dan preferensi yang Anda masukkan. 
                            Anda tetap dapat menjelajahi dan bergabung dengan UKM lain yang tersedia.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
