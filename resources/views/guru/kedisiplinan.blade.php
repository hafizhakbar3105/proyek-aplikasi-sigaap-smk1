<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Kedisiplinan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-50 pb-20">

    <?php
    // Data Peraturan
    $disciplineRules = [
        [
            'category' => 'Kehadiran',
            'icon' => 'clock',
            'color' => 'bg-red-600',
            'rules' => [
                ['title' => 'Datang Tepat Waktu', 'desc' => 'Siswa hadir sebelum 07:00 WIB', 'points' => -5, 'severity' => 'Ringan'],
                ['title' => 'Bolos Tanpa Keterangan', 'desc' => 'Tidak masuk tanpa surat izin sah', 'points' => -20, 'severity' => 'Berat'],
            ]
        ],
        [
            'category' => 'Seragam & Penampilan',
            'icon' => 'shirt',
            'color' => 'bg-gray-800',
            'rules' => [
                ['title' => 'Seragam Tidak Lengkap', 'desc' => 'Tidak memakai atribut lengkap', 'points' => -5, 'severity' => 'Ringan'],
                ['title' => 'Rambut Tidak Rapi', 'desc' => 'Rambut panjang atau diwarnai', 'points' => -10, 'severity' => 'Sedang'],
            ]
        ]
    ];

    // Data Prestasi
    $achievements = [
        ['title' => 'Prestasi Akademik', 'desc' => 'Juara kelas atau olimpiade', 'points' => '+15', 'icon' => 'book'],
        ['title' => 'Kehadiran Sempurna', 'desc' => 'Tidak absen selama 1 bulan', 'points' => '+5', 'icon' => 'clock'],
    ];
    ?>

    <div class="bg-gradient-to-br from-red-600 via-gray-900 to-black text-white p-6 pb-8">
        <a href="home.php" class="inline-block mb-4">
            <i data-lucide="arrow-left" class="w-6 h-6"></i>
        </a>
        <h1 class="text-2xl font-bold mb-2">Buku Kedisiplinan</h1>
        <p class="text-gray-300">Tata tertib dan peraturan sekolah</p>
    </div>

    <div class="px-6 -mt-4 space-y-6">
        
        <div class="p-6 bg-gradient-to-br from-red-50 to-gray-50 border border-red-200 rounded-xl shadow-sm">
            <div class="flex items-start gap-4">
                <div class="p-3 bg-red-600 rounded-full">
                    <i data-lucide="shield" class="w-6 h-6 text-white"></i>
                </div>
                <div>
                    <h3 class="text-gray-900 font-bold mb-2">Sistem Poin Kedisiplinan</h3>
                    <p class="text-sm text-gray-700 leading-relaxed">
                        Setiap siswa memiliki poin awal 100. Pelanggaran mengurangi poin, prestasi menambah poin. 
                        Poin di bawah 60 akan mendapat teguran khusus.
                    </p>
                </div>
            </div>
        </div>

        <div>
            <h3 class="text-gray-900 font-bold mb-4 text-lg">Jenis Pelanggaran</h3>
            <div class="space-y-3">
                <?php foreach ($disciplineRules as $index => $cat): ?>
                    <div class="bg-white border rounded-xl overflow-hidden shadow-sm">
                        <button onclick="toggleAccordion(<?php echo $index; ?>)" class="w-full px-4 py-4 flex items-center justify-between hover:bg-gray-50 transition">
                            <div class="flex items-center gap-3">
                                <div class="<?php echo $cat['color']; ?> p-2 rounded-lg">
                                    <i data-lucide="<?php echo $cat['icon']; ?>" class="w-5 h-5 text-white"></i>
                                </div>
                                <div class="text-left">
                                    <p class="text-gray-900 font-medium"><?php echo $cat['category']; ?></p>
                                    <p class="text-xs text-gray-500"><?php echo count($cat['rules']); ?> jenis pelanggaran</p>
                                </div>
                            </div>
                            <i data-lucide="chevron-down" id="icon-<?php echo $index; ?>" class="w-5 h-5 text-gray-400 transition-transform"></i>
                        </button>
                        
                        <div id="content-<?php echo $index; ?>" class="hidden px-4 pb-4 space-y-3 bg-white">
                            <?php foreach ($cat['rules'] as $rule): ?>
                                <div class="p-3 bg-gray-50 rounded-lg border border-gray-100">
                                    <div class="flex justify-between items-start mb-1">
                                        <p class="text-gray-900 font-semibold text-sm"><?php echo $rule['title']; ?></p>
                                        <span class="text-[10px] px-2 py-0.5 rounded-full bg-orange-100 text-orange-700 font-bold">
                                            <?php echo $rule['severity']; ?>
                                        </span>
                                    </div>
                                    <p class="text-xs text-gray-600 mb-2"><?php echo $rule['desc']; ?></p>
                                    <p class="text-xs text-red-600 font-bold">Poin: <?php echo $rule['points']; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div>
            <h3 class="text-gray-900 font-bold mb-4 text-lg">Penambahan Poin (Prestasi)</h3>
            <div class="space-y-3">
                <?php foreach ($achievements as $ach): ?>
                    <div class="bg-white p-4 border-l-4 border-l-green-500 rounded-xl shadow-sm border flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="p-2 bg-green-100 rounded-lg text-green-600">
                                <i data-lucide="<?php echo $ach['icon']; ?>" class="w-5 h-5"></i>
                            </div>
                            <div>
                                <p class="text-gray-900 font-medium text-sm"><?php echo $ach['title']; ?></p>
                                <p class="text-xs text-gray-500"><?php echo $ach['desc']; ?></p>
                            </div>
                        </div>
                        <span class="text-green-600 font-bold"><?php echo $ach['points']; ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

    <script>
        // Inisialisasi Ikon
        lucide.createIcons();

        // Fungsi Accordion
        function toggleAccordion(id) {
            const content = document.getElementById(`content-${id}`);
            const icon = document.getElementById(`icon-${id}`);
            
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.style.transform = 'rotate(180deg)';
            } else {
                content.classList.add('hidden');
                icon.style.transform = 'rotate(0deg)';
            }
        }
    </script>
</body>
</html>