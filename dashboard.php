<?php
session_start();

// Cek apa anda sudah login 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Toko Sepatu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="min-h-screen flex flex-col items-center justify-center p-6">
        <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-2xl">
            <h1 class="text-2xl font-bold mb-4">Selamat Datang, <?= htmlspecialchars($username) ?>!</h1>
            <p class="mb-4">Anda login sebagai: <span class="font-semibold text-blue-600"><?= htmlspecialchars($role) ?></span></p>

            <?php if ($role == 'admin'): ?>
                <div class="bg-blue-100 p-4 rounded mb-4">
                    <h2 class="text-lg font-semibold mb-2">Panel Admin</h2>
                    <ul class="list-disc pl-5">
                        <li>Kelola Produk Sepatu</li>
                        <li>Kelola Pengguna</li>
                        <li>Lihat Semua Transaksi</li>
                    </ul>
                </div>
            <?php else: ?>
                <div class="bg-green-100 p-4 rounded mb-4">
                    <h2 class="text-lg font-semibold mb-2">Panel User</h2>
                    <ul class="list-disc pl-5">
                        <li>Lihat Daftar Sepatu</li>
                        <li>Beli Sepatu</li>
                        <li>Lihat Riwayat Transaksi</li>
                    </ul>
                </div>
            <?php endif; ?>

            <a href="logout.php" class="inline-block mt-4 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">Logout</a>
        </div>
    </div>

</body>
</html>
