<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page SI-GAPP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .bg-custom-gradient {
            background: linear-gradient(135deg, #b91c1c 0%, #111827 50%, #000000 100%);
        }
    </style>
</head>
<body class="bg-custom-gradient min-h-screen flex flex-col items-center justify-center text-white p-6">

    <div class="text-center mb-8">
        <div class="bg-white p-4 rounded-lg inline-block mb-4 shadow-lg">
            <i data-lucide="graduation-cap" class="w-12 h-12 text-red-600"></i>
        </div>
        <h1 class="text-sm font-semibold tracking-widest uppercase mb-1">Aplikasi SI-GAPP</h1>
        <p class="text-lg font-medium mb-1">Sistem Garda Penegakan Peraturan</p>
        <p class="text-xs text-gray-400">SMK Negeri 1 Kota Sukabumi</p>
    </div>

    <div class="w-full max-w-md space-y-3 mb-10">
        
        <div class="bg-white/10 backdrop-blur-md border border-white/10 p-4 rounded-xl flex items-center gap-4 hover:bg-white/20 transition-all cursor-pointer">
            <div class="p-2 bg-red-600 rounded-lg">
                <i data-lucide="shield-check" class="w-6 h-6 text-white"></i>
            </div>
            <div>
                <h3 class="text-sm font-semibold">Pantau Kedisiplinan</h3>
                <p class="text-[11px] text-gray-300 leading-tight">Monitor poin dan pelanggaran siswa secara real-time</p>
            </div>
        </div>

        <div class="bg-white/10 backdrop-blur-md border border-white/10 p-4 rounded-xl flex items-center gap-4 hover:bg-white/20 transition-all cursor-pointer">
            <div class="p-2 bg-slate-700 rounded-lg">
                <i data-lucide="award" class="w-6 h-6 text-white"></i>
            </div>
            <div>
                <h3 class="text-sm font-semibold">Catat Prestasi</h3>
                <p class="text-[11px] text-gray-300 leading-tight">Dokumentasi prestasi akademik dan non-akademik</p>
            </div>
        </div>

        <div class="bg-white/10 backdrop-blur-md border border-white/10 p-4 rounded-xl flex items-center gap-4 hover:bg-white/20 transition-all cursor-pointer">
            <div class="p-2 bg-slate-800 rounded-lg">
                <i data-lucide="users" class="w-6 h-6 text-white"></i>
            </div>
            <div>
                <h3 class="text-sm font-semibold">Kolaborasi Tim</h3>
                <p class="text-[11px] text-gray-300 leading-tight">Guru BK, Kesiswaan, dan OSIS bekerja bersama</p>
            </div>
        </div>

    </div>

    <div class="w-full max-w-md mb-12">
    <a href="{{ route('login') }}" class="block w-full bg-white text-red-600 font-bold py-4 rounded-xl shadow-xl hover:bg-gray-100 transition-colors active:scale-95 duration-150 text-center">
        Mulai Sekarang
    </a>
</div>

    <div class="text-center">
        <p class="text-[10px] text-gray-500 font-light tracking-wide">
            © 2025 SMK Negeri 1 Kota Sukabumi
        </p>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>