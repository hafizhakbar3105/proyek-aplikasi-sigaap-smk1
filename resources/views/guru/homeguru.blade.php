<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru - SI-GAPP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .bg-gradient-header {
            background: linear-gradient(to bottom, #b91c1c, #111827);
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">

    <div class="bg-gradient-header p-6 pt-10 pb-20 text-white">
        <div class="flex justify-between items-start max-w-6xl mx-auto">
            <div>
                <p class="text-sm opacity-80">Selamat Datang,</p>
                <h2 class="text-xl font-semibold mt-1">Ibu Siti Rahmawati</h2>
                <p class="text-xs opacity-70 mt-1">Guru BK • NIP: 198501012010012001</p>
            </div>
            <div class="flex gap-3">
                <button class="p-2 bg-white/10 rounded-full hover:bg-white/20 transition-colors">
                    <i data-lucide="bell" class="w-5 h-5"></i>
                </button>
                <a href="{{ route('profile') }}" class="p-2 bg-white/10 rounded-full hover:bg-white/20 transition-colors">
                    <i data-lucide="user" class="w-5 h-5"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="px-6 -mt-12 max-w-6xl mx-auto">
        <div class="bg-white rounded-3xl shadow-xl p-8 grid grid-cols-2 gap-y-12 gap-x-6 border border-gray-100">
            
            <a href="{{ route('dataabsen') }}" class="flex flex-col items-center text-center group transition-transform hover:scale-105">
                <div class="p-4 bg-red-600 rounded-full shadow-lg mb-3">
                    <i data-lucide="clipboard-check" class="w-6 h-6 text-white"></i>
                </div>
                <h3 class="text-sm font-semibold text-gray-800">Absensi Siswa</h3>
                <p class="text-[10px] text-gray-400 mt-1">Lihat kehadiran siswa</p>
            </a>

            <a href="{{ route('pelanggaran') }}" class="flex flex-col items-center text-center group transition-transform hover:scale-105">
                <div class="p-4 bg-red-700 rounded-full shadow-lg mb-3">
                    <i data-lucide="alert-triangle" class="w-6 h-6 text-white"></i>
                </div>
                <h3 class="text-sm font-semibold text-gray-800">Catat Pelanggaran</h3>
                <p class="text-[10px] text-gray-400 mt-1">Input pelanggaran siswa</p>
            </a>

            <a href="{{ route('kedisiplinan') }}" class="flex flex-col items-center text-center group transition-transform hover:scale-105">
                <div class="p-4 bg-slate-800 rounded-full shadow-lg mb-3">
                    <i data-lucide="book-open" class="w-6 h-6 text-white"></i>
                </div>
                <h3 class="text-sm font-semibold text-gray-800">Buku Kedisiplinan</h3>
                <p class="text-[10px] text-gray-400 mt-1">Tata tertib sekolah</p>
            </a>

            <a href="{{ route('poin') }}" class="flex flex-col items-center text-center group transition-transform hover:scale-105">
                <div class="p-4 bg-slate-800 rounded-full shadow-lg mb-3">
                    <i data-lucide="award" class="w-6 h-6 text-white"></i>
                </div>
                <h3 class="text-sm font-semibold text-gray-800">Data Poin Siswa</h3>
                <p class="text-[10px] text-gray-400 mt-1">Lihat poin siswa</p>
            </a>

            <a href="{{ route('statistik') }}" class="flex flex-col items-center text-center col-span-2 group transition-transform hover:scale-105">
                <div class="p-4 bg-black rounded-full shadow-lg mb-3">
                    <i data-lucide="bar-chart-3" class="w-6 h-6 text-white"></i>
                </div>
                <h3 class="text-sm font-semibold text-gray-800">Laporan Statistik</h3>
                <p class="text-[10px] text-gray-400 mt-1">Data pelanggaran & prestasi</p>
            </a>
        </div>
    </div>

    <div class="px-6 mt-10 max-w-6xl mx-auto pb-32">
        <h3 class="text-sm font-bold text-gray-800 mb-4 px-1">Aktivitas Terakhir</h3>
        <div class="space-y-3">
            <div class="bg-white p-5 rounded-2xl shadow-sm border-l-4 border-red-600 flex justify-between items-center">
                <div>
                    <p class="text-sm font-semibold text-gray-900">Absensi Kelas XII RPL 1</p>
                    <p class="text-xs text-gray-500 mt-1">Hari ini • 32 hadir, 2 izin</p>
                </div>
                <div class="text-red-600">
                    <i data-lucide="check-square" class="w-5 h-5"></i>
                </div>
            </div>
        </div>
    </div>

    <nav class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-100 px-6 py-4 flex justify-around items-center shadow-lg">
        <a href="{{ route('homeguru') }}" class="flex flex-col items-center gap-1 text-red-600">
            <i data-lucide="home" class="w-6 h-6"></i>
            <span class="text-[10px] font-bold">Beranda</span>
        </a>
        <a href="{{ route('kedisiplinan') }}" class="flex flex-col items-center gap-1 text-gray-400">
            <i data-lucide="book-open" class="w-6 h-6"></i>
            <span class="text-[10px]">Tata Tertib</span>
        </a>
        <a href="{{ route('pelanggaran') }}" class="flex flex-col items-center gap-1 text-gray-400">
            <i data-lucide="alert-circle" class="w-6 h-6"></i>
            <span class="text-[10px]">Pelanggaran</span>
        </a>
        <a href="{{ route('profile') }}" class="flex flex-col items-center gap-1 text-gray-400">
            <i data-lucide="user-circle" class="w-6 h-6"></i>
            <span class="text-[10px]">Profil</span>
        </a>
    </nav>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>