<?php
// Logika Sederhana untuk menangani Form Submission (Opsional)
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role = $_POST['role'] ?? 'student';
    $username = $_POST['username'] ?? '';
    
    // Simulasi Login Berhasil
    $message = "Login berhasil sebagai " . ucfirst($role) . "! Selamat datang di SI-GAPP.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SI-GAPP - SMKN 1 Kota Sukabumi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-red-600 via-gray-900 to-black flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <div class="w-20 h-20 bg-white rounded-full mb-4 mx-auto flex items-center justify-center shadow-lg">
                <i data-lucide="graduation-cap" class="w-10 h-10 text-red-600"></i>
            </div>
            <h1 class="text-white text-2xl font-bold mb-2">APLIKASI SI-GAPP</h1>
            <p class="text-gray-300">Sistem Garda Penegakan Peraturan</p>
            <p class="text-gray-400 text-sm mt-1">SMK Negeri 1 Kota Sukabumi</p>
        </div>

        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <?php if ($message): ?>
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg text-sm text-center">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST" class="space-y-6" id="loginForm">
                <input type="hidden" name="role" id="selectedRole" value="student">

                <div class="grid grid-cols-3 gap-3">
                    <button type="button" onclick="setRole('student')" id="btn-student" 
                        class="role-btn p-3 rounded-xl border-2 transition-all border-red-600 bg-red-50 text-red-600">
                        <i data-lucide="user" class="w-6 h-6 mx-auto mb-1"></i>
                        <p class="text-xs font-semibold">Siswa</p>
                    </button>
                    
                    <button type="button" onclick="setRole('teacher')" id="btn-teacher" 
                        class="role-btn p-3 rounded-xl border-2 transition-all border-gray-200 text-gray-400 hover:border-gray-300">
                        <i data-lucide="graduation-cap" class="w-6 h-6 mx-auto mb-1"></i>
                        <p class="text-xs font-semibold">Guru</p>
                    </button>

                    <button type="button" onclick="setRole('osis')" id="btn-osis" 
                        class="role-btn p-3 rounded-xl border-2 transition-all border-gray-200 text-gray-400 hover:border-gray-300">
                        <i data-lucide="shield" class="w-6 h-6 mx-auto mb-1"></i>
                        <p class="text-xs font-semibold">OSIS</p>
                    </button>
                </div>

                <div class="space-y-2">
                    <label id="usernameLabel" class="text-sm font-medium text-gray-700">NIS / NISN</label>
                    <input 
                        type="text" 
                        name="username"
                        id="usernameInput"
                        placeholder="Masukkan NIS/NISN"
                        required
                        class="w-full h-12 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent transition-all"
                    >
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-700">Password</label>
                    <input 
                        type="password" 
                        name="password"
                        placeholder="Masukkan password"
                        required
                        class="w-full h-12 px-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent transition-all"
                    >
                </div>

                <button type="submit" class="w-full h-12 bg-red-600 hover:bg-red-700 text-white font-bold rounded-lg transition-colors shadow-lg active:scale-[0.98]">
                    Masuk
                </button>

                <div class="space-y-3 pt-2">
                    <p class="text-center text-sm text-gray-600">
                        Belum punya akun? 
                        <a href="register.php" class="text-red-600 font-semibold hover:underline">Daftar di sini</a>
                    </p>
                    <p class="text-center text-sm text-gray-600">
                        Lupa password? 
                        <a href="#" class="text-red-600 font-semibold hover:underline">Hubungi Admin</a>
                    </p>
                </div>
            </form>
        </div>

        <p class="text-center text-gray-400 text-sm mt-8">
            © 2025 SMK Negeri 1 Kota Sukabumi
        </p>
    </div>

    <script>
        // Inisialisasi Ikon Lucide
        lucide.createIcons();

        // Fungsi JavaScript untuk meniru perilaku State di React
        function setRole(role) {
            // Update hidden input
            document.getElementById('selectedRole').value = role;

            // Reset semua tombol ke gaya default
            const buttons = document.querySelectorAll('.role-btn');
            buttons.forEach(btn => {
                btn.classList.remove('border-red-600', 'bg-red-50', 'text-red-600');
                btn.classList.add('border-gray-200', 'text-gray-400');
            });

            // Aktifkan tombol yang dipilih
            const activeBtn = document.getElementById('btn-' + role);
            activeBtn.classList.add('border-red-600', 'bg-red-50', 'text-red-600');
            activeBtn.classList.remove('border-gray-200', 'text-gray-400');

            // Update Label dan Placeholder berdasarkan Role
            const label = document.getElementById('usernameLabel');
            const input = document.getElementById('usernameInput');

            if (role === 'student') {
                label.innerText = 'NIS / NISN';
                input.placeholder = 'Masukkan NIS/NISN';
            } else if (role === 'teacher') {
                label.innerText = 'NIP';
                input.placeholder = 'Masukkan NIP';
            } else {
                label.innerText = 'ID OSIS';
                input.placeholder = 'Masukkan ID OSIS';
            }
        }
    </script>
</body>
</html>