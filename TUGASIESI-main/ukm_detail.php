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

// Simulate getting UKM detail from database
$ukm_id = isset($_GET['id']) ? $_GET['id'] : 1;

$ukm_details = [
    1 => [
        'nama' => 'UKM Basket',
        'kategori' => 'Olahraga',
        'anggota' => 25,
        'status' => 'Aktif',
        'deskripsi' => 'Unit Kegiatan Mahasiswa Basket untuk pengembangan bakat dalam olahraga basket.',
        'icon' => 'fas fa-basketball-ball',
        'ketua' => 'John Doe',
        'wakil_ketua' => 'Jane Smith',
        'jadwal_latihan' => 'Setiap Selasa dan Jumat, 16:00 - 18:00',
        'lokasi' => 'Lapangan Basket Kampus',
        'prestasi' => [
            'Juara 1 Kompetisi Basket Antar Universitas 2023',
            'Juara 2 Liga Mahasiswa Regional 2022',
            'Juara 3 Tournament Nasional 2021'
        ],
        'kegiatan' => [
            'Latihan rutin 2x seminggu',
            'Sparing dengan tim basket universitas lain',
            'Workshop teknik basket',
            'Kompetisi internal dan eksternal'
        ],
        'persyaratan' => [
            'Mahasiswa aktif',
            'Memiliki minat di bidang basket',
            'Berkomitmen mengikuti latihan rutin',
            'Dapat bekerja dalam tim'
        ]
    ],
    2 => [
        'nama' => 'UKM Teater',
        'kategori' => 'Seni',
        'anggota' => 30,
        'status' => 'Aktif',
        'deskripsi' => 'Wadah kreativitas mahasiswa dalam seni peran dan drama.',
        'icon' => 'fas fa-theater-masks',
        'ketua' => 'Sarah Johnson',
        'wakil_ketua' => 'Michael Brown',
        'jadwal_latihan' => 'Setiap Rabu dan Sabtu, 15:00 - 18:00',
        'lokasi' => 'Aula Seni Kampus',
        'prestasi' => [
            'Best Performance Award Festival Teater Nasional 2023',
            'Juara 1 Drama Festival Regional 2022',
            'Best Script Writing Competition 2021'
        ],
        'kegiatan' => [
            'Latihan akting rutin',
            'Workshop penulisan naskah',
            'Produksi pertunjukan teater',
            'Kolaborasi dengan komunitas teater lain'
        ],
        'persyaratan' => [
            'Mahasiswa aktif',
            'Memiliki minat di bidang seni peran',
            'Kreatif dan inovatif',
            'Siap berkomitmen untuk latihan rutin'
        ]
    ],
    3 => [
        'nama' => 'UKM Robotika',
        'kategori' => 'Akademik',
        'anggota' => 20,
        'status' => 'Tidak Aktif',
        'deskripsi' => 'Pengembangan teknologi robotika dan sistem otomasi.',
        'icon' => 'fas fa-robot',
        'ketua' => 'David Wilson',
        'wakil_ketua' => 'Emily Chen',
        'jadwal_latihan' => 'Setiap Senin dan Kamis, 14:00 - 17:00',
        'lokasi' => 'Laboratorium Robotika',
        'prestasi' => [
            'Juara 1 Kontes Robot Indonesia 2023',
            'Best Innovation Award Tech Expo 2022',
            'Runner Up International Robotics Competition 2021'
        ],
        'kegiatan' => [
            'Praktikum robotika',
            'Pengembangan proyek robot',
            'Workshop programming robot',
            'Kompetisi robotika'
        ],
        'persyaratan' => [
            'Mahasiswa aktif',
            'Memiliki dasar programming',
            'Tertarik dengan teknologi robotika',
            'Siap belajar hal baru'
        ]
    ],
    4 => [
        'nama' => 'UKM Fotografi',
        'kategori' => 'Seni',
        'anggota' => 28,
        'status' => 'Aktif',
        'deskripsi' => 'Eksplorasi seni fotografi dan videografi.',
        'icon' => 'fas fa-camera-retro',
        'ketua' => 'Alex Turner',
        'wakil_ketua' => 'Lisa Park',
        'jadwal_latihan' => 'Setiap Jumat dan Minggu, 09:00 - 12:00',
        'lokasi' => 'Studio Foto Kampus',
        'prestasi' => [
            'Best Photography Exhibition 2023',
            'Juara 1 National Photography Competition 2022',
            'Best Documentary Award 2021'
        ],
        'kegiatan' => [
            'Workshop fotografi',
            'Hunting foto bersama',
            'Pameran karya fotografi',
            'Proyek dokumentasi event kampus'
        ],
        'persyaratan' => [
            'Mahasiswa aktif',
            'Memiliki kamera (DSLR/Mirrorless)',
            'Tertarik dengan dunia fotografi',
            'Kreatif dan memiliki jiwa seni'
        ]
    ],
    5 => [
        'nama' => 'UKM Pencak Silat',
        'kategori' => 'Olahraga',
        'anggota' => 35,
        'status' => 'Aktif',
        'deskripsi' => 'Pengembangan bela diri tradisional Indonesia.',
        'icon' => 'fas fa-fist-raised',
        'ketua' => 'Budi Santoso',
        'wakil_ketua' => 'Rina Wijaya',
        'jadwal_latihan' => 'Setiap Selasa dan Jumat, 15:30 - 17:30',
        'lokasi' => 'Arena Bela Diri Kampus',
        'prestasi' => [
            'Juara Umum Kejuaraan Pencak Silat Nasional 2023',
            'Medali Emas POMNAS 2022',
            'Juara 1 Festival Seni Bela Diri 2021'
        ],
        'kegiatan' => [
            'Latihan rutin teknik dasar',
            'Latihan jurus dan tanding',
            'Seminar bela diri',
            'Pertandingan antar perguruan tinggi'
        ],
        'persyaratan' => [
            'Mahasiswa aktif',
            'Sehat jasmani dan rohani',
            'Disiplin dan tekun',
            'Siap berlatih keras'
        ]
    ],
    6 => [
        'nama' => 'UKM Programming',
        'kategori' => 'Akademik',
        'anggota' => 40,
        'status' => 'Aktif',
        'deskripsi' => 'Pengembangan skill pemrograman dan software development.',
        'icon' => 'fas fa-code',
        'ketua' => 'Kevin Lee',
        'wakil_ketua' => 'Amanda White',
        'jadwal_latihan' => 'Setiap Rabu dan Sabtu, 13:00 - 16:00',
        'lokasi' => 'Laboratorium Komputer',
        'prestasi' => [
            'Juara 1 Hackathon Nasional 2023',
            'Best Innovation Award Tech Festival 2022',
            'Winner of Code Competition 2021'
        ],
        'kegiatan' => [
            'Coding bootcamp',
            'Project development',
            'Workshop teknologi terbaru',
            'Competitive programming'
        ],
        'persyaratan' => [
            'Mahasiswa aktif',
            'Memiliki laptop pribadi',
            'Tertarik dengan programming',
            'Siap belajar teknologi baru'
        ]
    ]
];

$ukm = isset($ukm_details[$ukm_id]) ? $ukm_details[$ukm_id] : null;
if (!$ukm) {
    header('Location: ukm_list.php');
    exit;
}

$statusClass = $ukm['status'] === 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800';
$iconBgClass = $ukm['status'] === 'Aktif' ? 'bg-gradient-to-br from-green-400 to-green-600' : 'bg-gradient-to-br from-red-400 to-red-600';
?>

<main class="min-h-screen bg-gray-50 p-6">
    <div class="max-w-7xl mx-auto">
        <!-- Back Button -->
        <a href="ukm_list.php" class="inline-flex items-center text-gray-600 hover:text-gray-800 mb-6 group">
            <i class="fas fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform"></i>
            Kembali ke Daftar UKM
        </a>

        <!-- Main Content -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Header Section -->
            <div class="<?php echo $iconBgClass; ?> p-12 flex items-center justify-center relative">
                <i class="<?php echo $ukm['icon']; ?> text-white text-8xl"></i>
            </div>

            <!-- Content Section -->
            <div class="p-8">
                <!-- Title and Status -->
                <div class="flex justify-between items-start mb-6">
                    <h1 class="text-4xl font-bold text-gray-900"><?php echo $ukm['nama']; ?></h1>
                    <span class="px-4 py-2 rounded-full text-sm font-semibold <?php echo $statusClass; ?>">
                        <?php echo $ukm['status']; ?>
                    </span>
                </div>

                <!-- Quick Info -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                    <div class="flex items-center gap-3 text-gray-600">
                        <i class="fas fa-users text-xl"></i>
                        <span><?php echo $ukm['anggota']; ?> Anggota</span>
                    </div>
                    <div class="flex items-center gap-3 text-gray-600">
                        <i class="fas fa-tag text-xl"></i>
                        <span><?php echo $ukm['kategori']; ?></span>
                    </div>
                    <div class="flex items-center gap-3 text-gray-600">
                        <i class="fas fa-map-marker-alt text-xl"></i>
                        <span><?php echo $ukm['lokasi']; ?></span>
                    </div>
                </div>

                <!-- Join Button -->
                <div class="mb-8">
                    <a href="ukm_join.php?id=<?php echo $ukm_id; ?>" class="inline-block bg-[#00A651] hover:bg-[#008741] text-white px-8 py-3 rounded-lg text-lg font-semibold transition-all hover:shadow-lg">
                        <i class="fas fa-user-plus mr-2"></i>
                        Gabung UKM
                    </a>
                </div>

                <!-- Description -->
                <div class="prose max-w-none mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Tentang UKM</h2>
                    <p class="text-gray-600"><?php echo $ukm['deskripsi']; ?></p>
                </div>

                <!-- Kepengurusan -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Kepengurusan</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-green-600"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Ketua UKM</div>
                                <div class="text-gray-600"><?php echo $ukm['ketua']; ?></div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-user text-green-600"></i>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900">Wakil Ketua</div>
                                <div class="text-gray-600"><?php echo $ukm['wakil_ketua']; ?></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Schedule -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Jadwal Latihan</h2>
                    <div class="p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-calendar text-green-600"></i>
                            <span class="text-gray-600"><?php echo $ukm['jadwal_latihan']; ?></span>
                        </div>
                    </div>
                </div>

                <!-- Achievements -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Prestasi</h2>
                    <div class="space-y-3">
                        <?php foreach ($ukm['prestasi'] as $prestasi) { ?>
                            <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                                <i class="fas fa-trophy text-yellow-500"></i>
                                <span class="text-gray-600"><?php echo $prestasi; ?></span>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- Activities -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Kegiatan</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php foreach ($ukm['kegiatan'] as $kegiatan) { ?>
                            <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg">
                                <i class="fas fa-check-circle text-green-600"></i>
                                <span class="text-gray-600"><?php echo $kegiatan; ?></span>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <!-- Requirements -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Persyaratan</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <?php foreach ($ukm['persyaratan'] as $syarat) { ?>
                            <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg">
                                <i class="fas fa-clipboard-check text-green-600"></i>
                                <span class="text-gray-600"><?php echo $syarat; ?></span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
