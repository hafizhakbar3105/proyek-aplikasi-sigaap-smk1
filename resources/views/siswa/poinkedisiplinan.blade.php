<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poin Disiplin - SIGAAP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-50 pb-20">

    <?php
    // Data Dinamis
    $currentPoints = 85;
    $maxPoints = 100;
    $percentage = ($currentPoints / $maxPoints) * 100;

    // Logika Status
    if ($currentPoints >= 80) {
        $status = ['bg' => 'bg-green-500', 'text' => 'text-green-600', 'label' => 'Sangat Baik'];
    } elseif ($currentPoints >= 60) {
        $status = ['bg' => 'bg-yellow-500', 'text' => 'text-yellow-600', 'label' => 'Cukup Baik'];
    } else {
        $status = ['bg' => 'bg-red-500', 'text' => 'text-red-600', 'label' => 'Perlu Perbaikan'];
    }

    // Data History
    $history = [
        ['type' => 'violation', 'title' => 'Terlambat', 'points' => -5, 'date' => '28 Okt 2025'],
        ['type' => 'achievement', 'title' => 'Juara Lomba Web Design', 'points' => 15, 'date' => '25 Okt 2025'],
        ['type' => 'violation', 'title' => 'Tidak Memakai Badge', 'points' => -5, 'date' => '23 Okt 2025'],
    ];
    ?>

    <div class="bg-gradient-to-br from-red-600 via-gray-900 to-black text-white p-6 pb-8">
        <a href="home.php" class="inline-block mb-4">
            <i data-lucide="arrow-left" class="w-6 h-6"></i>
        </a>
        <h1 class="text-2xl font-bold mb-2">Poin Disiplin</h1>
        <p class="text-gray-300">Ahmad Fauzi • XII RPL 1</p>
    </div>

    <div class="px-6 -mt-4 space-y-6">
        <div class="bg-white p-6 rounded-2xl shadow-sm border text-center">
            <div class="w-20 h-20 <?php echo $status['bg']; ?> rounded-full flex items-center justify-center mx-auto mb-4">
                <i data-lucide="award" class="w-10 h-10 text-white"></i>
            </div>
            <p class="text-gray-500 text-sm">Total Poin Saat Ini</p>
            <h1 class="text-4xl font-black <?php echo $status['text']; ?>"><?php echo $currentPoints; ?></h1>
            <p class="text-sm font-bold <?php echo $status['text']; ?> mt-1"><?php echo $status['label']; ?></p>
            
            <div class="mt-6 space-y-2">
                <div class="flex justify-between text-xs text-gray-500">
                    <span>Progress Kedisiplinan</span>
                    <span><?php echo $currentPoints; ?>/100</span>
                </div>
                <div class="w-full bg-gray-100 rounded-full h-2">
                    <div class="<?php echo $status['bg']; ?> h-2 rounded-full" style="width: <?php echo $percentage; ?>%"></div>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border">
            <h3 class="text-gray-900 font-bold mb-4">Tren Poin Bulanan</h3>
            <canvas id="barChart" height="200"></canvas>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border">
            <h3 class="text-gray-900 font-bold mb-4">Distribusi Pelanggaran</h3>
            <div class="w-48 h-48 mx-auto">
                <canvas id="pieChart"></canvas>
            </div>
            <div class="grid grid-cols-2 gap-2 mt-4">
                <div class="flex items-center gap-2 text-xs text-gray-600">
                    <span class="w-3 h-3 rounded-full bg-red-600"></span> Kehadiran (2)
                </div>
                <div class="flex items-center gap-2 text-xs text-gray-600">
                    <span class="w-3 h-3 rounded-full bg-red-400"></span> Seragam (1)
                </div>
            </div>
        </div>

        <div>
            <h3 class="text-gray-900 font-bold mb-4">Riwayat Poin</h3>
            <div class="space-y-3">
                <?php foreach ($history as $item): ?>
                    <div class="bg-white p-4 border-l-4 <?php echo ($item['type'] == 'achievement') ? 'border-l-green-500' : 'border-l-red-500'; ?> rounded-xl shadow-sm border flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="p-2 rounded-lg <?php echo ($item['type'] == 'achievement') ? 'bg-green-100' : 'bg-red-100'; ?>">
                                <i data-lucide="<?php echo ($item['type'] == 'achievement') ? 'trending-up' : 'trending-down'; ?>" 
                                   class="w-5 h-5 <?php echo ($item['type'] == 'achievement') ? 'text-green-600' : 'text-red-600'; ?>"></i>
                            </div>
                            <div>
                                <p class="text-gray-900 font-medium text-sm"><?php echo $item['title']; ?></p>
                                <p class="text-[10px] text-gray-400"><?php echo $item['date']; ?></p>
                            </div>
                        </div>
                        <span class="font-bold <?php echo ($item['type'] == 'achievement') ? 'text-green-600' : 'text-red-600'; ?>">
                            <?php echo ($item['points'] > 0 ? '+' : '') . $item['points']; ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script>
        // Render Ikon
        lucide.createIcons();

        // Konfigurasi Bar Chart (Tren Bulanan)
        const ctxBar = document.getElementById('barChart').getContext('2d');
        new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: ['Jun', 'Jul', 'Agt', 'Sep', 'Okt'],
                datasets: [{
                    label: 'Poin',
                    data: [95, 92, 88, 90, 85],
                    backgroundColor: '#dc2626',
                    borderRadius: 8
                }]
            },
            options: { responsive: true, plugins: { legend: { display: false } } }
        });

        // Konfigurasi Pie Chart (Distribusi)
        const ctxPie = document.getElementById('pieChart').getContext('2d');
        new Chart(ctxPie, {
            type: 'doughnut',
            data: {
                labels: ['Kehadiran', 'Seragam', 'Fasilitas'],
                datasets: [{
                    data: [2, 1, 1],
                    backgroundColor: ['#dc2626', '#ef4444', '#525252'],
                    borderWidth: 0
                }]
            },
            options: { cutout: '70%', plugins: { legend: { display: false } } }
        });
    </script>
</body>
</html>