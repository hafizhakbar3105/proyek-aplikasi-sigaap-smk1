<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencatatan Pelanggaran - SI-GAPP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .bg-gradient-header { background: linear-gradient(to bottom, #b91c1c, #111827); }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">

    <div class="bg-gradient-header p-6 pt-10 pb-16 text-white relative">
        <div class="max-w-6xl mx-auto flex items-center gap-4">
            <a href="dashboard_guru.php" class="p-2 hover:bg-white/10 rounded-full transition-colors">
                <i data-lucide="arrow-left" class="w-6 h-6"></i>
            </a>
            <div>
                <h1 class="text-xl font-semibold">Pencatatan Pelanggaran</h1>
                <p class="text-xs opacity-70 mt-1 uppercase tracking-wider font-light">Catat dan pantau pelanggaran siswa</p>
            </div>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-6 -mt-8 relative z-10 space-y-6 pb-12">
        
        <button class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 rounded-lg shadow-lg flex items-center justify-center gap-2 transition-all">
            <i data-lucide="alert-triangle" class="w-5 h-5"></i>
            Catat Pelanggaran Baru
        </button>

        <div class="relative">
            <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                <i data-lucide="search" class="w-5 h-5 text-gray-400"></i>
            </div>
            <input type="text" placeholder="Cari nama siswa atau NIS..." class="w-full pl-12 pr-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-600/20 focus:border-red-600 transition-all shadow-sm">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center">
                <p class="text-2xl font-bold text-gray-800">12</p>
                <p class="text-[10px] text-gray-400 mt-1 uppercase font-bold tracking-widest">Hari Ini</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center">
                <p class="text-2xl font-bold text-gray-800">78</p>
                <p class="text-[10px] text-gray-400 mt-1 uppercase font-bold tracking-widest">Minggu Ini</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 text-center">
                <p class="text-2xl font-bold text-gray-800">245</p>
                <p class="text-[10px] text-gray-400 mt-1 uppercase font-bold tracking-widest">Bulan Ini</p>
            </div>
        </div>

        <div>
            <h3 class="text-sm font-bold text-gray-800 mb-4 px-1 uppercase tracking-widest opacity-60">Pelanggaran Terbaru</h3>
            
            <div class="space-y-4">
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col space-y-4 transition-hover hover:shadow-md">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="text-sm font-bold text-gray-800">Ahmad Fauzi</h4>
                            <p class="text-[10px] text-gray-500 uppercase tracking-wider mt-0.5">XII RPL 1</p>
                        </div>
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-[9px] font-bold uppercase tracking-wide">Ringan</span>
                    </div>
                    <div class="flex items-center gap-3 text-gray-700">
                        <i data-lucide="alert-triangle" class="w-4 h-4 text-gray-400"></i>
                        <p class="text-xs">Terlambat</p>
                    </div>
                    <div class="flex justify-between items-center pt-2 border-t border-gray-50">
                        <p class="text-[9px] text-gray-400 font-medium">29 Okt 2025 • 07:15</p>
                        <p class="text-xs font-bold text-red-600">-5 poin</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col space-y-4 transition-hover hover:shadow-md">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="text-sm font-bold text-gray-800">Siti Nurhaliza</h4>
                            <p class="text-[10px] text-gray-500 uppercase tracking-wider mt-0.5">XI RPL 2</p>
                        </div>
                        <span class="px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-[9px] font-bold uppercase tracking-wide">Ringan</span>
                    </div>
                    <div class="flex items-center gap-3 text-gray-700">
                        <i data-lucide="alert-triangle" class="w-4 h-4 text-gray-400"></i>
                        <p class="text-xs">Tidak Memakai Seragam Lengkap</p>
                    </div>
                    <div class="flex justify-between items-center pt-2 border-t border-gray-50">
                        <p class="text-[9px] text-gray-400 font-medium">29 Okt 2025 • 07:30</p>
                        <p class="text-xs font-bold text-red-600">-5 poin</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 flex flex-col space-y-4 transition-hover hover:shadow-md">
                    <div class="flex justify-between items-start">
                        <div>
                            <h4 class="text-sm font-bold text-gray-800">Budi Santoso</h4>
                            <p class="text-[10px] text-gray-500 uppercase tracking-wider mt-0.5">X RPL 1</p>
                        </div>
                        <span class="px-3 py-1 bg-orange-100 text-orange-600 rounded-full text-[9px] font-bold uppercase tracking-wide">Sedang</span>
                    </div>
                    <div class="flex items-center gap-3 text-gray-700">
                        <i data-lucide="alert-triangle" class="w-4 h-4 text-gray-400"></i>
                        <p class="text-xs">Menggunakan HP saat Belajar</p>
                    </div>
                    <div class="flex justify-between items-center pt-2 border-t border-gray-50">
                        <p class="text-[9px] text-gray-400 font-medium">28 Okt 2025 • 09:45</p>
                        <p class="text-xs font-bold text-red-600">-10 poin</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>