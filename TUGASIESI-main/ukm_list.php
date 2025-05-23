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
?>

<main class="min-h-screen bg-gray-50 p-6">
    <div class="max-w-7xl mx-auto">
        <!-- Back Button -->
        <a href="home.php" class="inline-flex items-center text-gray-600 hover:text-gray-800 mb-6 group">
            <i class="fas fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform"></i>
            Kembali ke Beranda
        </a>

        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">Daftar UKM</h1>
                    <p class="text-gray-600">Temukan dan bergabung dengan UKM yang sesuai dengan minatmu</p>
                </div>
                <button class="bg-[#00A651] hover:bg-[#008741] text-white px-6 py-3 rounded-lg flex items-center gap-2 transition-all hover:shadow-lg">
                    <i class="fas fa-plus"></i>
                    Tambah UKM
                </button>
            </div>

            <!-- Search and Filter -->
            <div class="flex flex-col md:flex-row gap-4 mb-8">
                <div class="flex-1">
                    <div class="relative">
                        <input type="text" 
                               placeholder="Cari UKM..." 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00A651] focus:border-transparent pl-11"
                        >
                        <i class="fas fa-search absolute left-4 top-3.5 text-gray-400"></i>
                    </div>
                </div>
                <select class="px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#00A651] focus:border-transparent min-w-[200px]">
                    <option value="">Semua Kategori</option>
                    <option value="olahraga">Olahraga</option>
                    <option value="seni">Seni</option>
                    <option value="akademik">Akademik</option>
                </select>
            </div>

            <!-- UKM Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                // Example data - replace with actual database query later
                $ukm_list = [
                    [
                        'id' => 1, 
                        'nama' => 'UKM Basket', 
                        'kategori' => 'Olahraga', 
                        'anggota' => 25, 
                        'status' => 'Aktif',
                        'deskripsi' => 'Unit Kegiatan Mahasiswa Basket untuk pengembangan bakat dalam olahraga basket.',
                        'icon' => 'fas fa-basketball-ball'
                    ],
                    [
                        'id' => 2, 
                        'nama' => 'UKM Teater', 
                        'kategori' => 'Seni', 
                        'anggota' => 30, 
                        'status' => 'Aktif',
                        'deskripsi' => 'Wadah kreativitas mahasiswa dalam seni peran dan drama.',
                        'icon' => 'fas fa-theater-masks'
                    ],
                    [
                        'id' => 3, 
                        'nama' => 'UKM Robotika', 
                        'kategori' => 'Akademik', 
                        'anggota' => 20, 
                        'status' => 'Tidak Aktif',
                        'deskripsi' => 'Pengembangan teknologi robotika dan sistem otomasi.',
                        'icon' => 'fas fa-robot'
                    ],
                    [
                        'id' => 4, 
                        'nama' => 'UKM Fotografi', 
                        'kategori' => 'Seni', 
                        'anggota' => 28, 
                        'status' => 'Aktif',
                        'deskripsi' => 'Eksplorasi seni fotografi dan videografi.',
                        'icon' => 'fas fa-camera-retro'
                    ],
                    [
                        'id' => 5, 
                        'nama' => 'UKM Pencak Silat', 
                        'kategori' => 'Olahraga', 
                        'anggota' => 35, 
                        'status' => 'Aktif',
                        'deskripsi' => 'Pengembangan bela diri tradisional Indonesia.',
                        'icon' => 'fas fa-fist-raised'
                    ],
                    [
                        'id' => 6, 
                        'nama' => 'UKM Programming', 
                        'kategori' => 'Akademik', 
                        'anggota' => 40, 
                        'status' => 'Aktif',
                        'deskripsi' => 'Pengembangan skill pemrograman dan software development.',
                        'icon' => 'fas fa-code'
                    ]
                ];

                foreach ($ukm_list as $ukm) {
                    $statusClass = $ukm['status'] === 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800';
                    $iconBgClass = $ukm['status'] === 'Aktif' ? 'bg-gradient-to-br from-green-400 to-green-600' : 'bg-gradient-to-br from-red-400 to-red-600';
                ?>
                    <div class="relative bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <!-- Clickable area for the entire card -->
                        <a href="ukm_detail.php?id=<?php echo $ukm['id']; ?>" class="block">
                            <!-- Icon Header -->
                            <div class="<?php echo $iconBgClass; ?> p-8 flex justify-center items-center group-hover:scale-105 transition-transform duration-300">
                                <i class="<?php echo $ukm['icon']; ?> text-white text-6xl"></i>
                            </div>
                            
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-green-600 transition-colors"><?php echo $ukm['nama']; ?></h3>
                                    <span class="px-3 py-1 text-xs font-semibold rounded-full <?php echo $statusClass; ?>">
                                        <?php echo $ukm['status']; ?>
                                    </span>
                                </div>
                                
                                <div class="mb-4 text-sm text-gray-600">
                                    <?php echo $ukm['deskripsi']; ?>
                                </div>
                                
                                <div class="flex justify-between items-center text-sm text-gray-500">
                                    <span class="flex items-center gap-2">
                                        <i class="fas fa-users"></i>
                                        <?php echo $ukm['anggota']; ?> Anggota
                                    </span>
                                    <span class="flex items-center gap-2">
                                        <i class="fas fa-tag"></i>
                                        <?php echo $ukm['kategori']; ?>
                                    </span>
                                </div>
                            </div>
                        </a>
                        
                        <!-- Admin actions (outside of clickable area) -->
                        <div class="absolute bottom-4 right-4 flex gap-2">
                            <button onclick="event.stopPropagation();" class="text-blue-600 hover:text-blue-900 p-2 hover:bg-blue-50 rounded-full transition-colors">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="event.stopPropagation();" class="text-red-600 hover:text-red-900 p-2 hover:bg-red-50 rounded-full transition-colors">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- Pagination -->
            <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200">
                <div class="text-sm text-gray-700">
                    Showing <span class="font-medium">1</span> to <span class="font-medium">6</span> of <span class="font-medium">6</span> results
                </div>
                <div class="flex gap-2">
                    <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 disabled:opacity-50 transition-colors" disabled>
                        Previous
                    </button>
                    <button class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 disabled:opacity-50 transition-colors" disabled>
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
