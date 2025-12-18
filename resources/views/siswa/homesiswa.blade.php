<?php
// Simulasi Session atau Role (Ganti 'student' dengan 'teacher' atau 'osis' untuk tes)
$userRole = 'student'; 

// Data Berdasarkan Role
if ($userRole === 'student') {
    $userName = 'Ahmad Fauzi';
    $userDetail = 'XII RPL 1 • NIS: 12345';
    $currentPoints = 85;
    $totalAttendance = 95;
    $menuItems = [
        [
    'icon'  => 'clipboard-check',
    'title' => 'Absensi',
    'desc'  => 'Check in & out',
    'color' => 'bg-red-600',
    'link'  => route('absen'),
],
[
    'icon'  => 'award',
    'title' => 'Poin Disiplin',
    'desc'  => "{{ $currentPoints }} poin",
    'color' => 'bg-gray-800',
    'link'  => route(name:'poinkedisiplinan'),
],
[
    'icon'  => 'book-open',
    'title' => 'Buku Kedisiplinan',
    'desc'  => 'Tata tertib sekolah',
    'color' => 'bg-gray-900',
    'link'  => route('bukukedisiplinan'),
],

    ];
} elseif ($userRole === 'teacher') {
    $userName = 'Ibu Siti Rahmawati';
    $userDetail = 'Guru BK • NIP: 198501012010012001';
    $menuItems = [
        ['icon' => 'clipboard-check', 'title' => 'Absensi Siswa', 'desc' => 'Lihat kehadiran', 'color' => 'bg-red-600', 'link' => 'attendance.php'],
        ['icon' => 'alert-triangle', 'title' => 'Catat Pelanggaran', 'desc' => 'Input data siswa', 'color' => 'bg-red-700', 'link' => 'violation.php'],
        ['icon' => 'book-open', 'title' => 'Buku Kedisiplinan', 'desc' => 'Tata tertib sekolah', 'color' => 'bg-gray-800', 'link' => 'discipline.php'],
        ['icon' => 'award', 'title' => 'Data Poin Siswa', 'desc' => 'Lihat poin siswa', 'color' => 'bg-gray-900', 'link' => 'points.php'],
        ['icon' => 'bar-chart-3', 'title' => 'Laporan Statistik', 'desc' => 'Data & prestasi', 'color' => 'bg-black', 'link' => 'statistics.php'],
    ];
} else {
    $userName = 'Farhan Maulana';
    $userDetail = 'Ketua OSIS • ID: OSIS2025001';
    $menuItems = [
        ['icon' => 'shield', 'title' => 'Dashboard OSIS', 'desc' => 'Monitor disiplin', 'color' => 'bg-red-600', 'link' => 'osis-dashboard.php'],
        ['icon' => 'check-circle', 'title' => 'Verifikasi Data', 'desc' => 'Validasi data', 'color' => 'bg-red-700', 'link' => 'osis-dashboard.php'],
        ['icon' => 'bar-chart-3', 'title' => 'Laporan Statistik', 'desc' => 'Data & prestasi', 'color' => 'bg-gray-800', 'link' => 'statistics.php'],
        ['icon' => 'users', 'title' => 'Data Siswa', 'desc' => 'Monitoring poin', 'color' => 'bg-gray-900', 'link' => 'points.php'],
    ];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda SI-GAPP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="bg-gray-50 pb-24">

    <div class="bg-gradient-to-br from-red-600 via-gray-900 to-black text-white p-6 pb-20">
        <div class="flex justify-between items-start mb-6">
            <div>
                <p class="text-gray-300 text-sm">Selamat Datang,</p>
                <h2 class="text-xl font-bold mt-1"><?= $userName ?></h2>
                <p class="text-gray-300 text-xs mt-1"><?= $userDetail ?></p>
            </div>
            <div class="flex gap-2">
                <button class="p-2 bg-white/10 rounded-full"><i data-lucide="bell" class="w-5 h-5"></i></button>
                <a href="profile.php" class="p-2 bg-white/10 rounded-full"><i data-lucide="user" class="w-5 h-5"></i></a>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <?php if ($userRole === 'student'): ?>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4">
                    <p class="text-gray-300 text-xs">Kehadiran</p>
                    <p class="text-lg font-bold mt-1"><?= $totalAttendance ?>%</p>
                    <p class="text-gray-300 text-[10px] mt-1">Bulan ini</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4">
                    <p class="text-gray-300 text-xs">Poin Disiplin</p>
                    <p class="text-lg font-bold mt-1"><?= $currentPoints ?></p>
                    <p class="text-[10px] mt-1 <?= $currentPoints >= 80 ? 'text-green-300' : 'text-yellow-300' ?>">
                        <?= $currentPoints >= 80 ? 'Sangat Baik' : 'Cukup Baik' ?>
                    </p>
                </div>
            <?php elseif ($userRole === 'osis'): ?>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4">
                    <p class="text-gray-300 text-xs">Pelanggaran</p>
                    <p class="text-lg font-bold mt-1">23</p>
                    <p class="text-gray-300 text-[10px] mt-1">Hari ini</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4">
                    <p class="text-gray-300 text-xs">Perlu Verifikasi</p>
                    <p class="text-lg font-bold mt-1">8</p>
                    <p class="text-yellow-300 text-[10px] mt-1">Menunggu</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="px-6 -mt-12">
        <div class="bg-white rounded-2xl shadow-lg p-4 mb-6">
            <div class="grid grid-cols-2 gap-3">
                <?php foreach ($menuItems as $item): ?>
                    <a href="<?= $item['link'] ?>" class="flex flex-col items-center justify-center p-4 rounded-xl hover:bg-gray-50 transition-all">
                        <div class="<?= $item['color'] ?> p-3 rounded-full mb-2 shadow-md">
                            <i data-lucide="<?= $item['icon'] ?>" class="w-6 h-6 text-white"></i>
                        </div>
                        <p class="text-xs font-semibold text-gray-900"><?= $item['title'] ?></p>
                        <p class="text-[10px] text-gray-500 mt-1"><?= $item['desc'] ?></p>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="space-y-4">
            <h3 class="font-bold text-gray-900">Aktivitas Terakhir</h3>
            
            <?php if ($userRole === 'student'): ?>
                <div class="bg-white p-4 rounded-xl shadow-sm border-l-4 border-green-500 flex justify-between items-center">
                    <div>
                        <p class="text-sm font-semibold">Check In Berhasil</p>
                        <p class="text-xs text-gray-500">Hari ini, 07:15 WIB</p>
                    </div>
                    <i data-lucide="clipboard-check" class="text-green-500 w-5 h-5"></i>
                </div>
                <div class="bg-white p-4 rounded-xl shadow-sm border-l-4 border-red-600 flex justify-between items-center">
                    <div>
                        <p class="text-sm font-semibold">Poin Ditambahkan</p>
                        <p class="text-xs text-gray-500">Kemarin • +5 poin - Prestasi</p>
                    </div>
                    <i data-lucide="award" class="text-red-600 w-5 h-5"></i>
                </div>
            <?php else: ?>
                <div class="bg-white p-4 rounded-xl shadow-sm border-l-4 border-yellow-500 flex justify-between items-center">
                    <div>
                        <p class="text-sm font-semibold">Data Perlu Verifikasi</p>
                        <p class="text-xs text-gray-500">8 laporan menunggu validasi</p>
                    </div>
                    <i data-lucide="shield" class="text-yellow-500 w-5 h-5"></i>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 px-6 py-3">
        <div class="flex justify-around items-center max-w-md mx-auto">
            <a href="home.php" class="flex flex-col items-center gap-1 text-red-600">
                <i data-lucide="home" class="w-6 h-6"></i>
                <span class="text-[10px]">Beranda</span>
            </a>
            <a href="{{ route('login') }}" class="flex flex-col items-center gap-1 text-gray-400">
                <i data-lucide="book-open" class="w-6 h-6"></i>
                <span class="text-[10px]">Tata Tertib</span>
            </a>
            <a href="#" class="flex flex-col items-center gap-1 text-gray-400">
                <i data-lucide="<?= $userRole === 'student' ? 'award' : 'shield' ?>" class="w-6 h-6"></i>
                <span class="text-[10px]"><?= $userRole === 'student' ? 'Poin' : 'Monitor' ?></span>
            </a>
            <a href="profile.php" class="flex flex-col items-center gap-1 text-gray-400">
                <i data-lucide="user" class="w-6 h-6"></i>
                <span class="text-[10px]">Profil</span>
            </a>
        </div>
    </div>

    <script> lucide.createIcons(); </script>
</body>
</html>