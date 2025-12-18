<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard OSIS - SI-GAPP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .bg-gradient-header { background: linear-gradient(to bottom, #b91c1c, #0f172a); }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">

    <div class="bg-gradient-header p-6 pt-10 pb-20 text-white">
        <div class="flex justify-between items-start max-w-6xl mx-auto">
            <div>
                <p class="text-sm opacity-80">Selamat Datang,</p>
                <h2 class="text-xl font-semibold mt-1">Farhan Maulana</h2>
                <p class="text-xs opacity-70 mt-1 uppercase tracking-wider font-light">Ketua OSIS • ID: OSIS2025001</p>
            </div>
            <div class="flex gap-3">
                <button class="p-2 bg-white/10 rounded-full"><i data-lucide="bell" class="w-5 h-5"></i></button>
                <button class="p-2 bg-white/10 rounded-full"><i data-lucide="user" class="w-5 h-5"></i></button>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mt-8 max-w-6xl mx-auto">
            <div class="bg-white/10 backdrop-blur-md border border-white/10 p-5 rounded-2xl">
                <p class="text-gray-300 text-xs font-medium">Pelanggaran</p>
                <p class="text-2xl font-bold mt-1 tracking-tight">23</p>
                <p class="text-[9px] text-gray-400 mt-1 italic">Hari ini</p>
            </div>
            <div class="bg-white/10 backdrop-blur-md border border-white/10 p-5 rounded-2xl">
                <p class="text-gray-300 text-xs font-medium">Perlu Verifikasi</p>
                <p class="text-2xl font-bold mt-1 tracking-tight">8</p>
                <p class="text-[9px] text-yellow-400 mt-1 font-bold">Menunggu</p>
            </div>
        </div>
    </div>

    <div class="px-6 -mt-12 max-w-6xl mx-auto pb-32">
        <div class="bg-white rounded-[2.5rem] shadow-xl p-10 grid grid-cols-2 gap-y-12 gap-x-8 border border-gray-100">
            
            <div class="flex flex-col items-center text-center group cursor-pointer">
                <div class="p-4 bg-red-600 rounded-full shadow-lg mb-3 group-hover:scale-110 transition-transform">
                    <i data-lucide="shield" class="w-6 h-6 text-white"></i>
                </div>
                <h3 class="text-xs font-bold text-gray-800 uppercase tracking-tighter">Dashboard OSIS</h3>
                <p class="text-[9px] text-gray-400 mt-1 font-medium">Monitor kedisiplinan</p>
            </div>

            <div class="flex flex-col items-center text-center group cursor-pointer">
                <div class="p-4 bg-red-700 rounded-full shadow-lg mb-3 group-hover:scale-110 transition-transform">
                    <i data-lucide="check-circle-2" class="w-6 h-6 text-white"></i>
                </div>
                <h3 class="text-xs font-bold text-gray-800 uppercase tracking-tighter">Verifikasi Data</h3>
                <p class="text-[9px] text-gray-400 mt-1 font-medium">Validasi pelanggaran</p>
            </div>

            <div class="flex flex-col items-center text-center group cursor-pointer">
                <div class="p-4 bg-slate-800 rounded-full shadow-lg mb-3 group-hover:scale-110 transition-transform">
                    <i data-lucide="bar-chart-3" class="w-6 h-6 text-white"></i>
                </div>
                <h3 class="text-xs font-bold text-gray-800 uppercase tracking-tighter">Laporan Statistik</h3>
                <p class="text-[9px] text-gray-400 mt-1 font-medium">Data pelanggaran & prestasi</p>
            </div>

            <div class="flex flex-col items-center text-center group cursor-pointer">
                <div class="p-4 bg-slate-900 rounded-full shadow-lg mb-3 group-hover:scale-110 transition-transform">
                    <i data-lucide="users" class="w-6 h-6 text-white"></i>
                </div>
                <h3 class="text-xs font-bold text-gray-800 uppercase tracking-tighter">Data Siswa</h3>
                <p class="text-[9px] text-gray-400 mt-1 font-medium">Monitoring poin siswa</p>
            </div>
        </div>
    </div>

    <nav class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-100 px-6 py-4 flex justify-around items-center shadow-lg">
        <div class="flex flex-col items-center gap-1.5 text-red-600 font-bold">
            <i data-lucide="home" class="w-6 h-6 fill-red-50"></i>
            <span class="text-[9px] uppercase tracking-tighter font-bold">Beranda</span>
        </div>
        <div class="flex flex-col items-center gap-1.5 text-gray-400">
            <i data-lucide="book" class="w-6 h-6"></i>
            <span class="text-[9px] uppercase tracking-tighter">Tata Tertib</span>
        </div>
        <div class="flex flex-col items-center gap-1.5 text-gray-400">
            <i data-lucide="shield" class="w-6 h-6"></i>
            <span class="text-[9px] uppercase tracking-tighter">Monitor</span>
        </div>
        <div class="flex flex-col items-center gap-1.5 text-gray-400">
            <i data-lucide="user-circle" class="w-6 h-6"></i>
            <span class="text-[9px] uppercase tracking-tighter">Profil</span>
        </div>
    </nav>

    <script>lucide.createIcons();</script>
</body>
</html>