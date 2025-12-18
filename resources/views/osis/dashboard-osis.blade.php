<?php
/**
 * Logika PHP tetap di bagian atas untuk memisahkan proses data dengan tampilan.
 */
$stats = [
    'totalViolations' => 156,
    'pendingVerification' => 8,
    'verified' => 148,
    'rejected' => 12,
    'totalStudents' => 540,
    'averagePoints' => 82.5
];

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

$chartData = [
    'labels' => ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
    'violations' => [12, 8, 15, 10, 18, 6],
    'achievements' => [5, 3, 7, 4, 6, 2]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#ef4444">
    <meta name="description" content="Dashboard OSIS Monitoring Kedisiplinan Siswa">
    
    <title>Dashboard OSIS - Monitoring Siswa</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        
        :root {
            --primary-red: #ef4444;
        }

        body { 
            font-family: 'Inter', sans-serif; 
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* State Tab Aktif */
        .tab-active { 
            border-bottom: 2px solid var(--primary-red); 
            color: var(--primary-red); 
            background-color: #ffffff; 
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }

        /* Transisi Halus */
        .tab-content {
            transition: opacity 0.3s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-50 pb-24 text-gray-900">

    <header class="bg-gradient-to-br from-red-600 via-gray-900 to-black text-white p-6 shadow-xl sticky top-0 z-10">
        <div class="flex items-center gap-4 mb-6">
            <button type="button" aria-label="Kembali" class="p-2 bg-white/10 rounded-full hover:bg-white/20 transition-all active:scale-90">
                <i data-lucide="arrow-left" class="w-5 h-5"></i>
            </button>
            <div class="flex-1">
                <h1 class="text-xl font-bold tracking-tight">Monitor OSIS</h1>
                <p class="text-gray-300 text-xs mt-0.5">Sistem Kedisiplinan Terpadu</p>
            </div>
            <div class="relative">
                <i data-lucide="shield" class="w-8 h-8 opacity-90 text-red-400"></i>
                <span class="absolute -top-1 -right-1 flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                </span>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-3">
            <article class="bg-white/10 backdrop-blur-md rounded-2xl p-3 border border-white/10 text-center">
                <h2 class="text-[10px] text-gray-300 uppercase font-bold mb-1">Pelanggaran</h2>
                <data class="text-lg font-bold" value="<?= $stats['totalViolations'] ?>"><?= $stats['totalViolations'] ?></data>
            </article>
            <article class="bg-white/10 backdrop-blur-md rounded-2xl p-3 border border-white/10 text-center">
                <h2 class="text-[10px] text-gray-300 uppercase font-bold mb-1">Pending</h2>
                <data class="text-lg font-bold text-yellow-400" value="<?= $stats['pendingVerification'] ?>"><?= $stats['pendingVerification'] ?></data>
            </article>
            <article class="bg-white/10 backdrop-blur-md rounded-2xl p-3 border border-white/10 text-center">
                <h2 class="text-[10px] text-gray-300 uppercase font-bold mb-1">Poin Rata²</h2>
                <data class="text-lg font-bold text-green-400" value="<?= $stats['averagePoints'] ?>"><?= $stats['averagePoints'] ?></data>
            </article>
        </div>
    </header>

    <main class="p-4 max-w-2xl mx-auto">
        
        <nav role="tablist" class="flex bg-gray-200/50 p-1 rounded-xl mb-6 shadow-inner">
            <button role="tab" onclick="switchTab('overview')" id="btn-overview" class="flex-1 py-2.5 text-sm font-semibold rounded-lg transition-all tab-active">Overview</button>
            <button role="tab" onclick="switchTab('verification')" id="btn-verification" class="flex-1 py-2.5 text-sm font-semibold rounded-lg transition-all text-gray-500 hover:text-gray-700">Verifikasi</button>
            <button role="tab" onclick="switchTab('reports')" id="btn-reports" class="flex-1 py-2.5 text-sm font-semibold rounded-lg transition-all text-gray-500 hover:text-gray-700">Laporan</button>
        </nav>

        <section id="content-overview" class="tab-content space-y-4">
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-sm font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <i data-lucide="trending-up" class="w-4 h-4 text-red-500"></i> Tren Kedisiplinan
                </h3>
                <div class="relative h-[200px]">
                    <canvas id="weeklyChart"></canvas>
                </div>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-sm font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <i data-lucide="award" class="w-4 h-4 text-yellow-500"></i> Peringkat Kelas
                </h3>
                <div class="space-y-3">
                    <?php 
                    $ranking = [['X RPL 2', 88], ['XI RPL 2', 85]];
                    foreach($ranking as $idx => $r): 
                    ?>
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                        <span class="text-sm font-medium"><?= ($idx+1) . ". " . $r[0] ?></span>
                        <div class="flex items-center gap-2 text-green-600 font-bold">
                            <?= $r[1] ?> <i data-lucide="chevron-up" class="w-4 h-4"></i>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section id="content-verification" class="tab-content hidden space-y-4">
            <form class="relative mb-4" onsubmit="event.preventDefault();">
                <i data-lucide="search" class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                <input type="search" placeholder="Cari nama atau kelas..." 
                       class="w-full pl-10 pr-4 py-3 bg-white border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-red-500 focus:border-transparent outline-none shadow-sm transition-all">
            </form>

            <?php foreach ($pendingViolations as $v): ?>
            <article class="bg-white p-4 rounded-2xl shadow-sm border border-gray-100 space-y-3">
                <header class="flex justify-between items-start">
                    <div>
                        <h4 class="font-bold text-gray-900"><?= htmlspecialchars($v['studentName']) ?></h4>
                        <p class="text-xs text-gray-500"><?= htmlspecialchars($v['class']) ?></p>
                    </div>
                    <span class="px-2.5 py-1 bg-yellow-50 text-yellow-700 border border-yellow-200 text-[10px] font-bold rounded-full uppercase tracking-wider">Menunggu</span>
                </header>
                
                <div class="flex gap-3 text-sm text-gray-700 bg-red-50/50 p-3 rounded-xl border border-red-100/50">
                    <i data-lucide="alert-circle" class="w-4 h-4 text-red-500 shrink-0 mt-0.5"></i>
                    <p class="leading-relaxed"><?= htmlspecialchars($v['violation']) ?></p>
                </div>

                <footer class="flex justify-between items-center text-[11px] text-gray-500 border-b border-gray-50 pb-3 italic">
                    <span>Pelapor: <?= htmlspecialchars($v['reporter']) ?></span>
                    <span class="font-bold text-red-600 not-italic"><?= $v['points'] ?> Poin</span>
                </footer>

                <div class="flex gap-2 pt-1">
                    <button type="button" class="flex-1 bg-green-600 text-white py-2.5 rounded-xl text-xs font-bold hover:bg-green-700 active:scale-95 transition-all">Setujui</button>
                    <button type="button" class="flex-1 border border-red-200 text-red-600 py-2.5 rounded-xl text-xs font-bold hover:bg-red-50 active:scale-95 transition-all">Tolak</button>
                </div>
            </article>
            <?php endforeach; ?>
        </section>

        <section id="content-reports" class="tab-content hidden space-y-6 text-center py-8">
            <div class="bg-white p-8 rounded-3xl border border-dashed border-gray-300">
                <i data-lucide="file-text" class="w-16 h-16 text-gray-200 mx-auto mb-4"></i>
                <h3 class="font-bold text-gray-800 text-lg">Rekap Laporan Bulanan</h3>
                <p class="text-sm text-gray-500 mb-6 px-4 leading-relaxed">Sistem akan menggenerasi dokumen PDF berisi seluruh riwayat pelanggaran dan prestasi kelas.</p>
                <button type="button" class="w-full bg-black text-white py-4 rounded-2xl font-bold shadow-xl flex items-center justify-center gap-3 hover:bg-gray-800 active:scale-95 transition-all">
                    <i data-lucide="download-cloud" class="w-5 h-5"></i> Unduh Laporan (.PDF)
                </button>
            </div>
        </section>
    </main>

    <footer class="fixed bottom-0 left-0 right-0 bg-white/80 backdrop-blur-lg border-t border-gray-100 px-6 py-3 z-20">
        <nav class="flex justify-around items-center max-w-lg mx-auto">
            <a href="#" class="flex flex-col items-center gap-1 text-gray-400 hover:text-gray-600">
                <i data-lucide="layout-grid" class="w-6 h-6"></i>
                <span class="text-[10px] font-medium">Home</span>
            </a>
            <a href="#" class="flex flex-col items-center gap-1 text-red-600 scale-110">
                <div class="bg-red-50 p-2 rounded-xl">
                    <i data-lucide="shield-check" class="w-6 h-6"></i>
                </div>
                <span class="text-[10px] font-bold">Monitor</span>
            </a>
            <a href="#" class="flex flex-col items-center gap-1 text-gray-400 hover:text-gray-600">
                <i data-lucide="user-circle" class="w-6 h-6"></i>
                <span class="text-[10px] font-medium">Profil</span>
            </a>
        </nav>
    </footer>

    <script>
        // Initialize Lucide Icons
        lucide.createIcons();

        // Standard HTML5 Tab Switcher
        function switchTab(tabName) {
            const tabs = ['overview', 'verification', 'reports'];
            tabs.forEach(t => {
                const content = document.getElementById('content-' + t);
                const btn = document.getElementById('btn-' + t);
                
                content.classList.add('hidden');
                content.style.opacity = '0';
                
                btn.classList.remove('tab-active');
                btn.classList.add('text-gray-500');
                btn.setAttribute('aria-selected', 'false');
            });

            const activeContent = document.getElementById('content-' + tabName);
            activeContent.classList.remove('hidden');
            setTimeout(() => { activeContent.style.opacity = '1'; }, 10);
            
            const activeBtn = document.getElementById('btn-' + tabName);
            activeBtn.classList.add('tab-active');
            activeBtn.classList.remove('text-gray-500');
            activeBtn.setAttribute('aria-selected', 'true');
        }

        // Chart.js - Weekly Trend
        const ctx = document.getElementById('weeklyChart');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?= json_encode($chartData['labels']) ?>,
                datasets: [
                    {
                        label: 'Pelanggaran',
                        data: <?= json_encode($chartData['violations']) ?>,
                        borderColor: '#ef4444',
                        backgroundColor: 'rgba(239, 68, 68, 0.1)',
                        fill: true,
                        tension: 0.4,
                        borderWidth: 3,
                        pointRadius: 4,
                        pointBackgroundColor: '#fff',
                        pointBorderColor: '#ef4444'
                    },
                    {
                        label: 'Prestasi',
                        data: <?= json_encode($chartData['achievements']) ?>,
                        borderColor: '#22c55e',
                        backgroundColor: 'transparent',
                        tension: 0.4,
                        borderWidth: 2,
                        borderDash: [5, 5],
                        pointRadius: 0
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { 
                        position: 'top',
                        align: 'end',
                        labels: { 
                            usePointStyle: true, 
                            boxWidth: 8,
                            font: { size: 11, weight: '600' }
                        }
                    }
                },
                scales: {
                    y: { 
                        beginAtZero: true, 
                        grid: { color: '#f3f4f6' },
                        ticks: { font: { size: 10 } }
                    },
                    x: { 
                        grid: { display: false },
                        ticks: { font: { size: 10 } }
                    }
                }
            }
        });
    </script>
</body>
</html>