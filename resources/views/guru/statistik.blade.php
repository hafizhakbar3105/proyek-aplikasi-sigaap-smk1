<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik SI-GAPP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .chart-container { position: relative; height: 300px; width: 100%; }
    </style>
</head>
<body class="bg-gray-50 pb-20">

    <div class="bg-gradient-to-br from-red-700 via-gray-900 to-black text-white p-8">
        <div class="max-w-7xl mx-auto">
            <a href="javascript:history.back()" class="inline-block mb-4 hover:opacity-80">
                <i data-lucide="arrow-left" class="w-6 h-6"></i>
            </a>
            <h1 class="text-2xl font-bold">Laporan Statistik Data</h1>
            <p class="text-gray-400 text-sm mt-1">SMK Negeri 1 Kota Sukabumi</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 -mt-6">
        <div class="bg-white rounded-xl shadow-sm p-4 mb-6 grid grid-cols-1 md:grid-cols-2 gap-4 border border-gray-100">
            <div>
                <label class="text-xs text-gray-500 font-semibold uppercase mb-1 block">Periode</label>
                <select class="w-full border border-gray-200 rounded-lg p-2 text-sm focus:ring-2 focus:ring-red-500 outline-none">
                    <option>Bulanan</option>
                    <option>Mingguan</option>
                    <option>Tahunan</option>
                </select>
            </div>
            <div>
                <label class="text-xs text-gray-500 font-semibold uppercase mb-1 block">Kelas</label>
                <select class="w-full border border-gray-200 rounded-lg p-2 text-sm focus:ring-2 focus:ring-red-500 outline-none">
                    <option>Semua Kelas</option>
                    <option>XII RPL 1</option>
                    <option>XII RPL 2</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-xs font-medium">Total Pelanggaran</p>
                    <h3 class="text-2xl font-bold text-red-600 mt-1">122</h3>
                    <p class="text-[10px] text-green-600 mt-1 flex items-center">
                        <i data-lucide="trending-down" class="w-3 h-3 mr-1"></i> -12% vs bulan lalu
                    </p>
                </div>
                <div class="bg-red-50 p-3 rounded-lg"><i data-lucide="alert-triangle" class="text-red-500 w-6 h-6"></i></div>
            </div>
            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-xs font-medium">Total Prestasi</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">28</h3>
                    <p class="text-[10px] text-green-600 mt-1 flex items-center">
                        <i data-lucide="trending-up" class="w-3 h-3 mr-1"></i> +8% vs bulan lalu
                    </p>
                </div>
                <div class="bg-gray-50 p-3 rounded-lg"><i data-lucide="award" class="text-gray-400 w-6 h-6"></i></div>
            </div>
            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-xs font-medium">Rata-rata Poin</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">82.5</h3>
                    <p class="text-[10px] text-green-600 mt-1 font-semibold">Kategori: Baik</p>
                </div>
                <div class="bg-gray-50 p-3 rounded-lg"><i data-lucide="line-chart" class="text-gray-400 w-6 h-6"></i></div>
            </div>
            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-xs font-medium">Siswa Disiplin</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-1">195/215</h3>
                    <p class="text-[10px] text-gray-400 mt-1">91% dari total siswa</p>
                </div>
                <div class="bg-gray-50 p-3 rounded-lg"><i data-lucide="users" class="text-gray-400 w-6 h-6"></i></div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-sm font-bold text-gray-800 mb-6 uppercase tracking-wider">Tren Pelanggaran</h3>
                <div class="chart-container">
                    <canvas id="trendChart"></canvas>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-sm font-bold text-gray-800 mb-6 uppercase tracking-wider">Pelanggaran Berdasarkan Jenis</h3>
                <div class="chart-container">
                    <canvas id="typeChart"></canvas>
                </div>
            </div>
        </div>

        <div class="mt-8">
            <button class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl font-bold text-sm flex items-center shadow-lg shadow-red-200 transition-all">
                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Unduh Laporan PDF
            </button>
        </div>
    </div>

    <script>
        // Inisialisasi Icon
        lucide.createIcons();

        // 1. Chart Tren Pelanggaran (Line Chart)
        const ctxTrend = document.getElementById('trendChart').getContext('2d');
        new Chart(ctxTrend, {
            type: 'line',
            data: {
                labels: ['Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Jumlah Pelanggaran',
                    data: [42, 55, 48, 62, 38, 45],
                    borderColor: '#dc2626',
                    backgroundColor: 'rgba(220, 38, 38, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointRadius: 4,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#dc2626'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, grid: { drawBorder: false, color: '#f3f4f6' } },
                    x: { grid: { display: false } }
                }
            }
        });

        // 2. Chart Jenis Pelanggaran (Doughnut/Pie Chart)
        const ctxType = document.getElementById('typeChart').getContext('2d');
        new Chart(ctxType, {
            type: 'doughnut',
            data: {
                labels: ['Terlambat', 'Seragam', 'Rambut', 'Lainnya'],
                datasets: [{
                    data: [45, 30, 15, 10],
                    backgroundColor: ['#dc2626', '#111827', '#4b5563', '#9ca3af'],
                    borderWidth: 0,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom', labels: { usePointStyle: true, padding: 20 } }
                },
                cutout: '70%'
            }
        });
    </script>
</body>
</html>