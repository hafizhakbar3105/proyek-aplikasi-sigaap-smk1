<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Poin Siswa - SI-GAPP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8fafc; }
        .bg-gradient-header {
            background: linear-gradient(to bottom, #b91c1c, #111827);
        }
    </style>
</head>
<body class="pb-10">

    <div class="bg-gradient-header p-8 pb-16 text-white relative">
        <a href="javascript:history.back()" class="absolute left-6 top-8 bg-white/10 p-2 rounded-lg hover:bg-white/20 transition-all">
            <i data-lucide="arrow-left" class="w-5 h-5"></i>
        </a>
        <div class="text-center">
            <h1 class="text-2xl font-bold">Data Poin Siswa</h1>
            <p class="text-sm opacity-70 mt-1">Pantau perkembangan kedisiplinan siswa</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 -mt-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center">
                <div class="bg-green-100 w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i data-lucide="trophy" class="w-5 h-5 text-green-600"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800">245</h3>
                <p class="text-[10px] text-gray-400 mt-1 uppercase tracking-wider font-semibold">Poin ≥ 80</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center">
                <div class="bg-yellow-100 w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i data-lucide="alert-triangle" class="w-5 h-5 text-yellow-600"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800">32</h3>
                <p class="text-[10px] text-gray-400 mt-1 uppercase tracking-wider font-semibold">Poin 60-79</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 text-center">
                <div class="bg-red-100 w-10 h-10 rounded-full flex items-center justify-center mx-auto mb-3">
                    <i data-lucide="trending-down" class="w-5 h-5 text-red-600"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800">8</h3>
                <p class="text-[10px] text-gray-400 mt-1 uppercase tracking-wider font-semibold">Poin < 60</p>
            </div>
        </div>

        <div class="mb-8">
            <h2 class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-4">Siswa Berprestasi</h2>
            <div class="space-y-3">
                <div class="bg-white p-4 rounded-xl shadow-sm border-l-4 border-green-500 flex justify-between items-center transition-transform hover:scale-[1.01]">
                    <div class="flex items-center gap-4">
                        <div class="bg-yellow-400 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm shadow-sm">1</div>
                        <div>
                            <p class="text-sm font-bold text-gray-800">Siti Nurhaliza</p>
                            <p class="text-[10px] text-gray-400 font-medium">XII RPL 1</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-green-600">98</p>
                        <p class="text-[9px] text-gray-400 uppercase font-bold">poin</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-sm border-l-4 border-green-500 flex justify-between items-center transition-transform hover:scale-[1.01]">
                    <div class="flex items-center gap-4">
                        <div class="bg-gray-300 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm shadow-sm">2</div>
                        <div>
                            <p class="text-sm font-bold text-gray-800">Ahmad Fauzi</p>
                            <p class="text-[10px] text-gray-400 font-medium">XII RPL 1</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-green-600">95</p>
                        <p class="text-[9px] text-gray-400 uppercase font-bold">poin</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-sm border-l-4 border-green-500 flex justify-between items-center transition-transform hover:scale-[1.01]">
                    <div class="flex items-center gap-4">
                        <div class="bg-orange-400 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm shadow-sm">3</div>
                        <div>
                            <p class="text-sm font-bold text-gray-800">Dewi Lestari</p>
                            <p class="text-[10px] text-gray-400 font-medium">XI RPL 2</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-green-600">92</p>
                        <p class="text-[9px] text-gray-400 uppercase font-bold">poin</p>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h2 class="text-xs font-bold text-gray-500 uppercase tracking-widest mb-4">Perlu Perhatian Khusus</h2>
            <div class="space-y-3">
                <div class="bg-white p-4 rounded-xl shadow-sm border-l-4 border-red-500 flex justify-between items-center transition-transform hover:scale-[1.01]">
                    <div class="flex items-center gap-4">
                        <div class="bg-red-50 p-2 rounded-lg">
                            <i data-lucide="alert-triangle" class="w-5 h-5 text-red-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-800">Budi Santoso</p>
                            <p class="text-[10px] text-gray-400 font-medium">X RPL 1</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-red-600">55</p>
                        <p class="text-[9px] text-gray-400 uppercase font-bold">poin</p>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-sm border-l-4 border-red-500 flex justify-between items-center transition-transform hover:scale-[1.01]">
                    <div class="flex items-center gap-4">
                        <div class="bg-red-50 p-2 rounded-lg">
                            <i data-lucide="alert-triangle" class="w-5 h-5 text-red-600"></i>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-800">Rina Wati</p>
                            <p class="text-[10px] text-gray-400 font-medium">XI RPL 1</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm font-bold text-red-600">62</p>
                        <p class="text-[9px] text-gray-400 uppercase font-bold">poin</p>
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