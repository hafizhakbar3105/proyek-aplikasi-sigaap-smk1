<?php
session_start();

// Simulasi Data Profil (Biasanya dari Database)
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = [
        'name' => 'Ahmad Fauzi',
        'nis' => '12345',
        'class' => 'XII RPL 1',
        'email' => 'ahmad.fauzi@smkn1jkt.sch.id',
        'phone' => '081234567890',
        'birthDate' => '15 Januari 2007',
        'address' => 'Jl. Pendidikan No. 123, Jakarta Selatan',
        'role' => 'student'
    ];
}

$isEditing = isset($_GET['edit']);

// Logika Simpan Data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
    $_SESSION['user']['name'] = $_POST['name'];
    $_SESSION['user']['email'] = $_POST['email'];
    $_SESSION['user']['phone'] = $_POST['phone'];
    $_SESSION['user']['address'] = $_POST['address'];
    
    header("Location: profile.php?success=1");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - SI-GAPP</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-50 pb-20">

    <div class="bg-gradient-to-br from-red-600 via-gray-900 to-black text-white p-6 pb-20">
        <div class="flex items-center justify-between mb-6">
            <a href="home.php"><i data-lucide="arrow-left" class="w-6 h-6"></i></a>
            <h2 class="text-lg font-bold">Profil Saya</h2>
            <a href="logout.php" class="p-2 bg-white/10 rounded-lg"><i data-lucide="log-out" class="w-5 h-5"></i></a>
        </div>

        <div class="flex flex-col items-center">
            <div class="relative">
                <div class="w-24 h-24 border-4 border-white rounded-full bg-red-600 flex items-center justify-center text-2xl font-bold">
                    <?php 
                    $words = explode(" ", $_SESSION['user']['name']);
                    echo strtoupper($words[0][0] . ($words[1][0] ?? ''));
                    ?>
                </div>
                <button class="absolute bottom-0 right-0 p-2 bg-red-600 rounded-full border-2 border-white">
                    <i data-lucide="camera" class="w-4 h-4 text-white"></i>
                </button>
            </div>
            <h3 class="mt-4 font-bold text-xl"><?php echo $_SESSION['user']['name']; ?></h3>
            <p class="text-gray-300 text-sm mt-1">
                <?php echo $_SESSION['user']['class']; ?> • NIS: <?php echo $_SESSION['user']['nis']; ?>
            </p>
        </div>
    </div>

    <div class="px-6 -mt-12 space-y-4">
        
        <div class="bg-white p-4 rounded-xl shadow-sm border border-red-100 bg-gradient-to-r from-red-50 to-gray-50">
            <div class="grid grid-cols-2 gap-4 divide-x">
                <div class="text-center">
                    <p class="text-gray-500 text-xs uppercase tracking-wider">Poin Disiplin</p>
                    <p class="text-red-600 font-bold text-lg">85</p>
                    <p class="text-green-600 text-[10px] font-bold">SANGAT BAIK</p>
                </div>
                <div class="text-center">
                    <p class="text-gray-500 text-xs uppercase tracking-wider">Kehadiran</p>
                    <p class="text-red-600 font-bold text-lg">95%</p>
                    <p class="text-gray-400 text-[10px]">BULAN INI</p>
                </div>
            </div>
        </div>

        <form action="" method="POST">
            <?php if (!$isEditing): ?>
                <a href="?edit=1" class="w-full flex items-center justify-center bg-red-600 text-white py-3 rounded-xl font-bold hover:bg-red-700 transition mb-4">
                    <i data-lucide="edit-2" class="w-4 h-4 mr-2"></i> Edit Profil
                </a>
            <?php endif; ?>

            <div class="bg-white p-6 rounded-2xl shadow-sm border space-y-5">
                <h3 class="text-gray-900 font-bold border-b pb-2">Informasi Pribadi</h3>
                
                <div class="space-y-1">
                    <label class="flex items-center gap-2 text-xs font-semibold text-gray-500">
                        <i data-lucide="user" class="w-3 h-3"></i> NAMA LENGKAP
                    </label>
                    <?php if ($isEditing): ?>
                        <input type="text" name="name" value="<?php echo $_SESSION['user']['name']; ?>" class="w-full border rounded-lg p-2 text-sm focus:ring-2 focus:ring-red-500 outline-none">
                    <?php else: ?>
                        <p class="text-gray-900 font-medium pl-5"><?php echo $_SESSION['user']['name']; ?></p>
                    <?php endif; ?>
                </div>

                <div class="space-y-1">
                    <label class="flex items-center gap-2 text-xs font-semibold text-gray-500">
                        <i data-lucide="mail" class="w-3 h-3"></i> EMAIL
                    </label>
                    <?php if ($isEditing): ?>
                        <input type="email" name="email" value="<?php echo $_SESSION['user']['email']; ?>" class="w-full border rounded-lg p-2 text-sm focus:ring-2 focus:ring-red-500 outline-none">
                    <?php else: ?>
                        <p class="text-gray-900 font-medium pl-5"><?php echo $_SESSION['user']['email']; ?></p>
                    <?php endif; ?>
                </div>

                <div class="space-y-1">
                    <label class="flex items-center gap-2 text-xs font-semibold text-gray-500">
                        <i data-lucide="phone" class="w-3 h-3"></i> NOMOR TELEPON
                    </label>
                    <?php if ($isEditing): ?>
                        <input type="text" name="phone" value="<?php echo $_SESSION['user']['phone']; ?>" class="w-full border rounded-lg p-2 text-sm focus:ring-2 focus:ring-red-500 outline-none">
                    <?php else: ?>
                        <p class="text-gray-900 font-medium pl-5"><?php echo $_SESSION['user']['phone']; ?></p>
                    <?php endif; ?>
                </div>

                <div class="space-y-1">
                    <label class="flex items-center gap-2 text-xs font-semibold text-gray-500">
                        <i data-lucide="map-pin" class="w-3 h-3"></i> ALAMAT
                    </label>
                    <?php if ($isEditing): ?>
                        <input type="text" name="address" value="<?php echo $_SESSION['user']['address']; ?>" class="w-full border rounded-lg p-2 text-sm focus:ring-2 focus:ring-red-500 outline-none">
                    <?php else: ?>
                        <p class="text-gray-900 font-medium pl-5"><?php echo $_SESSION['user']['address']; ?></p>
                    <?php endif; ?>
                </div>

                <?php if ($isEditing): ?>
                    <div class="flex gap-3 pt-4">
                        <a href="profile.php" class="flex-1 text-center py-2 border rounded-xl font-bold text-gray-600">Batal</a>
                        <button type="submit" name="save" class="flex-1 py-2 bg-red-600 text-white rounded-xl font-bold">Simpan</button>
                    </div>
                <?php endif; ?>
            </div>
        </form>

        <div class="bg-white p-4 rounded-2xl shadow-sm border">
            <h3 class="text-gray-900 font-bold mb-3">Keamanan Akun</h3>
            <button class="w-full p-3 bg-gray-50 rounded-xl text-left flex justify-between items-center">
                <div>
                    <p class="text-sm font-bold text-gray-800">Ubah Password</p>
                    <p class="text-[10px] text-gray-500">Terakhir diubah 30 hari yang lalu</p>
                </div>
                <i data-lucide="chevron-right" class="w-4 h-4 text-gray-400"></i>
            </button>
        </div>

        <a href="logout.php" class="w-full flex items-center justify-center border-2 border-red-600 text-red-600 py-3 rounded-xl font-bold hover:bg-red-50 transition">
            <i data-lucide="log-out" class="w-4 h-4 mr-2"></i> Keluar dari Akun
        </a>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>