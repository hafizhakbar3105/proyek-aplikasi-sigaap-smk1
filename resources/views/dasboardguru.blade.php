<?php
// Mock data untuk statistik
$stats = [
    'totalViolations' => 156,
    'pendingVerification' => 8,
    'verified' => 148,
    'rejected' => 12,
    'totalStudents' => 540,
    'averagePoints' => 82.5
];

// Data pelanggaran per kelas
$violationsByClass = [
    ['class' => 'X RPL 1', 'violations' => 12, 'students' => 36],
    ['class' => 'X RPL 2', 'violations' => 8, 'students' => 34],
    ['class' => 'XI RPL 1', 'violations' => 18, 'students' => 35],
    ['class' => 'XI RPL 2', 'violations' => 14, 'students' => 33],
    ['class' => 'XII RPL 1', 'violations' => 23, 'students' => 32],
    ['class' => 'XII RPL 2', 'violations' => 19, 'students' => 34]
];

// Data pelanggaran menunggu verifikasi
$pendingViolations = [
    [
        'id' => 1,
        'studentName' => 'Ahmad Rizki',
        'class' => 'XII RPL 1',
        'violation' => 'Terlambat masuk kelas',
        'reporter' => 'Ibu Siti',
        'time' => '08:30 WIB',
        'points' => -5,
        'date' => '17 Des 2025'
    ],
    [
        'id' => 2,
        'studentName' => 'Siti Nurhaliza',
        'class' => 'XI RPL 2',
        'violation' => 'Tidak memakai atribut lengkap',
        'reporter' => 'Pak Budi',
        'time' => '07:45 WIB',
        'points' => -3,
        'date' => '17 Des 2025'
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard OSIS - SI-GAPP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .tab-active { border-bottom: 2px solid #dc2626; color: #dc2626; }
    </style>
</head>
<body class="bg-gray-50 pb-24">

    <div class="bg-gradient-to-br from-red-600 via-gray-900 to-black text-white p-6">
        <div class="flex items-center gap-4 mb-6">
            <a href="home.php" class="p-2 bg-white/10 rounded-full hover:bg-white/20 transition-colors">
                <i data-lucide="arrow-left" class="w-5 h-5"></i>
            </a>
            <div class="flex-1">
                <h1 class="text-xl font-bold">Dashboard OSIS</h1>
                <p class="text-gray-300 text-sm">Monitoring Kedisiplinan Siswa</p>
            </div>
            <i data-lucide="shield" class="w-8 h-8"></i>
        </div>

        <div class="grid grid-cols-3 gap-3">
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3 text-center">
                <div class="flex items-center justify-center gap-1 mb-1 text-red-300">
                    <i data-lucide="alert-triangle" class="w-3 h-3"></i>
                    <span class="text-[10px]">Pelanggaran</span>
                </div>
                <p class="text-lg font-bold"><?= $stats['totalViolations'] ?></p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3 text-center">
                <div class="flex items-center justify-center gap-1 mb-1 text-yellow-300">
                    <i data-lucide="clock" class="w-3 h-3"></i>
                    <span class="text-[10px]">Verifikasi</span>
                </div>
                <p class="text-lg font-bold"><?= $stats['pendingVerification'] ?></p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3 text-center">
                <div class="flex items-center justify-center gap-1 mb-1 text-green-300">
                    <i data-lucide="users" class="w-3 h-3"></i>
                    <span class="text-[10px]">Rata-rata</span>
                </div>
                <p class="text-lg font-bold"><?= $stats['averagePoints'] ?></p>
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="flex bg-white rounded-lg shadow-sm mb-6 p-1 overflow-hidden">
            <button onclick="switchTab('overview')" id="tab-overview" class="flex-1 py-2 text-sm font-medium tab-active">Overview</button>
            <button onclick="switchTab('verification')" id="tab-verification" class="flex-1 py-2 text-sm font-medium">Verifikasi</button>
            <button onclick="switchTab('reports')" id="tab-reports" class="flex-1 py-2 text-sm font-medium">Laporan</button>
        </div>

        <div id="content-overview" class="tab-content space-y-4">
            <div class="bg-white p-4 rounded-xl shadow-sm">
                <h3 class="text-sm font-semibold mb-4 text-gray-800">Tren Pelanggaran Minggu Ini</h3>
                <canvas id="weeklyChart" height="200"></canvas>
            </div>

            <div class="bg-white p-4 rounded-xl shadow-sm">
                <h3 class="text-sm font-semibold mb-4 text-gray-800">Pelanggaran per Kelas</h3>
                <canvas id="classChart" height="250"></canvas>
            </div>
        </div>

        <div id="content-verification" class="tab-content hidden space-y-4">
            <?php foreach ($pendingViolations as $v): ?>
            <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <h4 class="font-bold text-gray-900"><?= $v['studentName'] ?></h4>
                        <p class="text-xs text-gray-500"><?= $v['class'] ?></p>
                    </div>
                    <span class="px-2 py-1 bg-yellow-50 text-yellow-700 border border-yellow-200 rounded text-[10px] font-bold">Pending</span>
                </div>
                <div class="flex gap-2 mb-4">
                    <i data-lucide="alert-triangle" class="w-4 h-4 text-red-500"></i>
                    <div class="text-xs text-gray-700">
                        <p class="font-medium"><?= $v['violation'] ?></p>
                        <p class="text-gray-500 mt-1">Dilaporkan oleh <?= $v['reporter'] ?> • <?= $v['time'] ?></p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <button class="flex-1 bg-green-600 text-white py-2 rounded-lg text-xs font-bold flex items-center justify-center gap-1">
                        <i data-lucide="check-circle" class="w-3 h-3"></i> Setujui
                    </button>
                    <button class="flex-1 border border-red-600 text-red-600 py-2 rounded-lg text-xs font-bold flex items-center justify-center gap-1">
                        <i data-lucide="x-circle" class="w-3 h-3"></i> Tolak
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div id="content-reports" class="tab-content hidden space-y-4">
            <div class="bg-white p-4 rounded-xl shadow-sm">
                <h3 class="font-bold text-gray-800 mb-4">Performa Kelas</h3>
                <div class="space-y-4">
                    <?php foreach ($violationsByClass as $item): 
                        $rate = ($item['violations'] / $item['students']) * 100;
                        $color = ($rate < 30) ? 'bg-green-500' : (($rate < 50) ? 'bg-yellow-500' : 'bg-red-500');
                    ?>
                    <div class="space-y-1">
                        <div class="flex justify-between text-xs">
                            <span class="font-medium"><?= $item['class'] ?></span>
                            <span class="text-gray-500"><?= $item['violations'] ?> Pelanggaran</span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-1.5">
                            <div class="<?= $color ?> h-1.5 rounded-full" style="width: <?= min($rate, 100) ?>%"></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <button class="w-full bg-red-600 text-white py-3 rounded-xl font-bold flex items-center justify-center gap-2 shadow-lg shadow-red-200">
                <i data-lucide="file-text" class="w-4 h-4"></i> Export PDF
            </button>
        </div>
    </div>

    <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 px-6 py-3">
        <div class="flex justify-around items-center max-w-md mx-auto">
            <div class="flex flex-col items-center gap-1 text-gray-400">
                <i data-lucide="home" class="w-6 h-6"></i>
                <span class="text-[10px]">Beranda</span>
            </div>
            <div class="flex flex-col items-center gap-1 text-red-600">
                <i data-lucide="shield" class="w-6 h-6"></i>
                <span class="text-[10px]">Monitor</span>
            </div>
            <div class="flex flex-col items-center gap-1 text-gray-400">
                <i data-lucide="user" class="w-6 h-6"></i>
                <span class="text-[10px]">Profil</span>
            </div>
        </div>
    </div>

    <script>
        // Inisialisasi Lucide Icons
        lucide.createIcons();

        // Logika Perpindahan Tab
        function switchTab(tabName) {
            document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));
            document.querySelectorAll('button[id^="tab-"]').forEach(btn => btn.classList.remove('tab-active'));
            
            document.getElementById('content-' + tabName).classList.remove('hidden');
            document.getElementById('tab-' + tabName).classList.add('tab-active');
        }

        // Visualisasi Chart menggunakan Chart.js
        const ctxWeekly = document.getElementById('weeklyChart');
        new Chart(ctxWeekly, {
            type: 'line',
            data: {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                datasets: [{
                    label: 'Pelanggaran',
                    data: [12, 8, 15, 10, 18, 6],
                    borderColor: '#ef4444',
                    tension: 0.3,
                    fill: false
                }, {
                    label: 'Prestasi',
                    data: [5, 3, 7, 4, 6, 2],
                    borderColor: '#22c55e',
                    tension: 0.3,
                    fill: false
                }]
            },
            options: { responsive: true, plugins: { legend: { display: false } } }
        });

        const ctxClass = document.getElementById('classChart');
        new Chart(ctxClass, {
            type: 'bar',
            data: {
                labels: <?= json_encode(array_column($violationsByClass, 'class')) ?>,
                datasets: [{
                    label: 'Pelanggaran',
                    data: <?= json_encode(array_column($violationsByClass, 'violations')) ?>,
                    backgroundColor: '#ef4444',
                    borderRadius: 5
                }]
            }
        });
    </script>
</body>
</html>