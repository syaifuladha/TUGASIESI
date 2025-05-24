<?php
session_start();
include 'header.php';

// Get form data from simplified search form
$interest = isset($_POST['interest']) ? $_POST['interest'] : '';
$time = isset($_POST['time']) ? $_POST['time'] : '';
$activity = isset($_POST['activity']) ? $_POST['activity'] : '';

// Simulated UKM database
$ukm_database = [
    [
        'id' => 1,
        'nama' => 'UKM Basket',
        'kategori' => 'olahraga',
        'icon' => 'fas fa-basketball-ball',
        'deskripsi' => 'Unit Kegiatan Mahasiswa Basket untuk pengembangan bakat dalam olahraga basket.',
        'waktu_kegiatan' => 'weekday',
        'tipe_kegiatan' => 'outdoor',
    ],
    [
        'id' => 2,
        'nama' => 'UKM Teater',
        'kategori' => 'seni',
        'icon' => 'fas fa-theater-masks',
        'deskripsi' => 'Wadah kreativitas mahasiswa dalam seni peran dan drama.',
        'waktu_kegiatan' => 'weekend',
        'tipe_kegiatan' => 'indoor',
    ],
    [
        'id' => 3,
        'nama' => 'UKM Robotika',
        'kategori' => 'akademik',
        'icon' => 'fas fa-robot',
        'deskripsi' => 'Pengembangan teknologi robotika dan sistem otomasi.',
        'waktu_kegiatan' => 'weekday',
        'tipe_kegiatan' => 'indoor',
    ],
    [
        'id' => 4,
        'nama' => 'UKM Fotografi',
        'kategori' => 'seni',
        'icon' => 'fas fa-camera-retro',
        'deskripsi' => 'Eksplorasi seni fotografi dan videografi.',
        'waktu_kegiatan' => 'weekend',
        'tipe_kegiatan' => 'outdoor',
    ],
    [
        'id' => 5,
        'nama' => 'UKM Pencak Silat',
        'kategori' => 'olahraga',
        'icon' => 'fas fa-fist-raised',
        'deskripsi' => 'Pengembangan bela diri tradisional Indonesia.',
        'waktu_kegiatan' => 'weekday',
        'tipe_kegiatan' => 'indoor',
    ],
    [
        'id' => 6,
        'nama' => 'UKM Programming',
        'kategori' => 'akademik',
        'icon' => 'fas fa-code',
        'deskripsi' => 'Pengembangan skill pemrograman dan software development.',
        'waktu_kegiatan' => 'weekend',
        'tipe_kegiatan' => 'indoor',
    ],
];

// Filter UKMs based on simple matching
$recommendations = array_filter($ukm_database, function($ukm) use ($interest, $time, $activity) {
    $matchInterest = $interest === '' || strtolower($ukm['kategori']) === strtolower($interest);
    $matchTime = $time === '' || $ukm['waktu_kegiatan'] === $time;
    $matchActivity = $activity === '' || $ukm['tipe_kegiatan'] === $activity;
    return $matchInterest && $matchTime && $matchActivity;
});
?>

<main class="min-h-screen bg-gray-50 p-6">
    <div class="max-w-4xl mx-auto">
        <!-- Back Button -->
        <a href="ukm_search.php" class="inline-flex items-center text-gray-600 hover:text-gray-800 mb-6 group">
            <i class="fas fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform"></i>
            Kembali ke Pencarian
        </a>

        <div class="bg-white rounded-lg shadow-lg p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">UKM yang Cocok Untukmu</h1>
                <p class="text-gray-600">
                    <?php if (!empty($interest)): ?>
                        Berdasarkan minat di bidang <?php echo ucfirst($interest); ?>
                    <?php else: ?>
                        Semua UKM yang tersedia
                    <?php endif; ?>
                </p>
            </div>

            <!-- Results -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php if (empty($recommendations)): ?>
                    <div class="col-span-2 text-center py-12">
                        <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-search text-4xl text-gray-400"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Tidak Ada UKM yang Cocok</h3>
                        <p class="text-gray-600 mb-4">Coba sesuaikan preferensi pencarian Anda</p>
                        <a href="ukm_search.php" class="inline-flex items-center gap-2 text-[#00A651] hover:text-[#008741]">
                            <i class="fas fa-redo"></i>
                            Coba Lagi
                        </a>
                    </div>
                <?php else: ?>
                    <?php foreach ($recommendations as $ukm): ?>
                        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-all duration-300">
                            <div class="p-6">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-lg flex items-center justify-center text-white">
                                        <i class="<?php echo $ukm['icon']; ?> text-xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900"><?php echo $ukm['nama']; ?></h3>
                                        <p class="text-gray-600"><?php echo ucfirst($ukm['kategori']); ?></p>
                                    </div>
                                </div>

                                <p class="text-gray-600 mb-4"><?php echo $ukm['deskripsi']; ?></p>

                                <!-- Info Tags -->
                                <div class="flex flex-wrap gap-2 mb-4">
                                    <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-sm flex items-center gap-1">
                                        <i class="fas fa-clock"></i>
                                        <?php echo $ukm['waktu_kegiatan'] == 'weekday' ? 'Hari Kerja' : 'Akhir Pekan'; ?>
                                    </span>
                                    <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-sm flex items-center gap-1">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <?php echo ucfirst($ukm['tipe_kegiatan']); ?>
                                    </span>
                                </div>

                                <!-- Action Button -->
                                <a href="ukm_detail.php?id=<?php echo $ukm['id']; ?>" 
                                   class="w-full inline-flex items-center justify-center gap-2 bg-[#00A651] hover:bg-[#008741] text-white px-4 py-2 rounded-lg font-medium transition-all hover:shadow-lg">
                                    <i class="fas fa-info-circle"></i>
                                    Lihat Profil UKM
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
