<?php
// Simulasi Session untuk menggantikan useState
session_start();

// Inisialisasi status default
if (!isset($_SESSION['checkedIn'])) $_SESSION['checkedIn'] = false;
if (!isset($_SESSION['checkInTime'])) $_SESSION['checkInTime'] = null;

// Logika Handle Check In
if (isset($_POST['action']) && $_POST['action'] == 'checkin') {
    $_SESSION['checkedIn'] = true;
    $_SESSION['checkInTime'] = date('H:i');
    $message = "Check In Berhasil pada pukul " . $_SESSION['checkInTime'];
}

$userRole = 'student'; // Bisa diganti 'teacher'
$locationVerified = true;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-50 pb-20">

    <div class="bg-gradient-to-br from-red-600 via-gray-900 to-black text-white p-6 pb-8">
        <div class="mb-4">
            <i data-lucide="arrow-left" class="w-6 h-6"></i>
        </div>
        <h1 class="text-2xl font-bold mb-2">Absensi</h1>
        <p class="text-gray-300"><?php echo date('l, d M Y'); ?></p>
    </div>

    <div class="px-6 -mt-4 space-y-4">
        
        <div class="bg-white p-4 rounded-xl shadow-sm border flex items-center gap-3">
            <div class="p-2 rounded-full <?php echo $locationVerified ? 'bg-green-100' : 'bg-red-100'; ?>">
                <i data-lucide="map-pin" class="w-5 h-5 <?php echo $locationVerified ? 'text-green-600' : 'text-red-600'; ?>"></i>
            </div>
            <div>
                <p class="text-gray-900 font-medium">Status Lokasi</p>
                <p class="text-sm <?php echo $locationVerified ? 'text-green-600' : 'text-red-600'; ?>">
                    <?php echo $locationVerified ? 'Anda berada di area sekolah' : 'Anda di luar area sekolah'; ?>
                </p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="bg-white p-6 rounded-xl shadow-sm border text-center">
                <div class="w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center <?php echo $_SESSION['checkedIn'] ? 'bg-green-100' : 'bg-red-100'; ?>">
                    <i data-lucide="clock" class="w-8 h-8 <?php echo $_SESSION['checkedIn'] ? 'text-green-600' : 'text-red-600'; ?>"></i>
                </div>
                <p class="text-gray-900 font-medium mb-2">Check In</p>
                
                <?php if ($_SESSION['checkedIn']): ?>
                    <p class="text-sm text-green-600 font-bold"><?php echo $_SESSION['checkInTime']; ?></p>
                <?php else: ?>
                    <form method="POST">
                        <input type="hidden" name="action" value="checkin">
                        <button type="submit" class="w-full bg-red-600 text-white py-2 rounded-lg text-sm hover:bg-red-700 transition">
                            Masuk
                        </button>
                    </form>
                <?php endif; ?>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border text-center">
                <div class="w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center bg-gray-100">
                    <i data-lucide="clock" class="w-8 h-8 text-gray-400"></i>
                </div>
                <p class="text-gray-900 font-medium mb-2">Check Out</p>
                <button disabled class="w-full bg-gray-300 text-gray-500 py-2 rounded-lg text-sm cursor-not-allowed">
                    Keluar
                </button>
            </div>
        </div>

        <div class="pt-4">
            <h3 class="text-gray-900 font-bold mb-4">Riwayat Absensi</h3>
            <?php
            $history = [
                ['date' => 'Senin, 27 Okt 2025', 'in' => '07:15', 'out' => '15:30', 'status' => 'Hadir'],
                ['date' => 'Selasa, 28 Okt 2025', 'in' => '07:20', 'out' => '15:25', 'status' => 'Hadir']
            ];

            foreach ($history as $item): ?>
                <div class="bg-white p-4 rounded-xl border mb-3 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-red-100 rounded-lg">
                            <i data-lucide="calendar" class="w-5 h-5 text-red-600"></i>
                        </div>
                        <div>
                            <p class="text-gray-900 font-medium"><?php echo $item['date']; ?></p>
                            <p class="text-sm text-gray-600">Masuk: <?php echo $item['in']; ?> • Pulang: <?php echo $item['out']; ?></p>
                        </div>
                    </div>
                    <span class="text-xs px-2 py-1 rounded-full bg-green-100 text-green-700">
                        <?php echo $item['status']; ?>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        // Inisialisasi Ikon Lucide
        lucide.createIcons();
    </script>
</body>
</html>