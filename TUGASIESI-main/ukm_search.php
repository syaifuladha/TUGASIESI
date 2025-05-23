<?php
session_start();
include 'header.php';
?>

<main class="min-h-screen bg-gray-50 p-6">
    <div class="max-w-2xl mx-auto">
        <!-- Back Button -->
        <a href="home.php" class="inline-flex items-center text-gray-600 hover:text-gray-800 mb-6 group">
            <i class="fas fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform"></i>
            Kembali ke Beranda
        </a>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-br from-green-400 to-green-600 p-8 text-white text-center">
                <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-search text-4xl"></i>
                </div>
                <h1 class="text-3xl font-bold mb-2">Cari UKM</h1>
                <p class="opacity-90">Temukan UKM yang sesuai dengan minatmu</p>
            </div>

            <!-- Search Form -->
            <form action="ukm_recommendation.php" method="POST" class="p-8 space-y-8">
                <!-- Interests -->
                <div>
                    <label class="block text-lg font-semibold text-gray-900 mb-4">Apa Minatmu?</label>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="flex items-center p-4 border rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="interest" value="olahraga" class="w-4 h-4 text-green-600 focus:ring-green-500">
                            <span class="ml-3 text-lg">Olahraga</span>
                        </label>
                        <label class="flex items-center p-4 border rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="interest" value="seni" class="w-4 h-4 text-green-600 focus:ring-green-500">
                            <span class="ml-3 text-lg">Seni</span>
                        </label>
                        <label class="flex items-center p-4 border rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="interest" value="akademik" class="w-4 h-4 text-green-600 focus:ring-green-500">
                            <span class="ml-3 text-lg">Akademik</span>
                        </label>
                        <label class="flex items-center p-4 border rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="interest" value="sosial" class="w-4 h-4 text-green-600 focus:ring-green-500">
                            <span class="ml-3 text-lg">Sosial</span>
                        </label>
                    </div>
                </div>

                <!-- Time Preference -->
                <div>
                    <label class="block text-lg font-semibold text-gray-900 mb-4">Kapan Kamu Bisa Ikut Kegiatan?</label>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="flex items-center p-4 border rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="time" value="weekday" class="w-4 h-4 text-green-600 focus:ring-green-500">
                            <span class="ml-3 text-lg">Hari Kerja</span>
                        </label>
                        <label class="flex items-center p-4 border rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="time" value="weekend" class="w-4 h-4 text-green-600 focus:ring-green-500">
                            <span class="ml-3 text-lg">Akhir Pekan</span>
                        </label>
                    </div>
                </div>

                <!-- Activity Type -->
                <div>
                    <label class="block text-lg font-semibold text-gray-900 mb-4">Jenis Kegiatan yang Disukai?</label>
                    <div class="grid grid-cols-2 gap-4">
                        <label class="flex items-center p-4 border rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="activity" value="indoor" class="w-4 h-4 text-green-600 focus:ring-green-500">
                            <span class="ml-3 text-lg">Indoor</span>
                        </label>
                        <label class="flex items-center p-4 border rounded-lg hover:bg-gray-50 cursor-pointer">
                            <input type="radio" name="activity" value="outdoor" class="w-4 h-4 text-green-600 focus:ring-green-500">
                            <span class="ml-3 text-lg">Outdoor</span>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center pt-4">
                    <button type="submit" class="bg-[#00A651] hover:bg-[#008741] text-white px-8 py-3 rounded-lg text-lg font-semibold transition-all hover:shadow-lg flex items-center gap-2">
                        <i class="fas fa-search"></i>
                        Cari UKM
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
    