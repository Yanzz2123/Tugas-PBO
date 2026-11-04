<?php
declare(strict_types=1);
require_once __DIR__ . '/Buku.php';

// Helper untuk menampilkan output
function cetak_header(string $teks): void
{
    echo "\n<hr><h3>" . htmlspecialchars($teks) . "</h3>";
}

function cetak_info(string $label, string $nilai): void
{
    echo "<b>" . htmlspecialchars($label) . ":</b> " . htmlspecialchars($nilai) . "<br>";
}

function coba(string $deskripsi, callable $fungsi): void
{
    echo "<p><i>" . htmlspecialchars($deskripsi) . "</i></p>";
    try {
        $fungsi();
        echo "<b style='color:green;'>BERHASIL</b><br>";
    } catch (Exception $e) {
        echo "<b style='color:red;'>GAGAL:</b> " . htmlspecialchars($e->getMessage()) . "<br>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Uji Coba Class Buku</title>
    <meta charset="UTF-8">
    <style>body{font-family: sans-serif; line-height: 1.6;}</style>
</head>
<body>
    <h1>Uji Coba Class Buku</h1>

    <?php
    cetak_header("Skenario Valid");

    // 1. Input Valid: Membuat buku baru
    coba("1. Membuat buku 'PHP Unlocked' dengan stok 10", function () {
        $buku = new Buku('BK001', 'PHP Unlocked', 10);
        cetak_info('Judul', $buku->getJudul());
        cetak_info('Stok', (string)$buku->getStok());
    });

    // 2. Input Valid: Menambah dan mengurangi stok
    coba("2. Menambah stok 5, lalu mengurangi 3", function () {
        $buku = new Buku('BK002', 'Belajar OOP', 20);
        cetak_info('Stok Awal', (string)$buku->getStok());
        $buku->tambahStok(5);
        cetak_info('Setelah ditambah 5', (string)$buku->getStok());
        $buku->kurangiStok(3);
        cetak_info('Setelah dikurangi 3', (string)$buku->getStok());
    });

    cetak_header("Skenario Tidak Valid");

    // 1. Input Tidak Valid: Judul kosong
    coba("1. Membuat buku dengan judul kosong", function () {
        new Buku('BK003', '  ', 5);
    });

    // 2. Input Tidak Valid: Stok awal negatif
    coba("2. Membuat buku dengan stok awal -5", function () {
        new Buku('BK004', 'Buku Minus', -5);
    });

    // 3. Input Tidak Valid: Mengurangi stok lebih dari yang tersedia
    coba("3. Mengurangi stok 15 dari buku yang hanya punya stok 10", function () {
        $buku = new Buku('BK005', 'Stok Terbatas', 10);
        cetak_info('Stok Awal', (string)$buku->getStok());
        $buku->kurangiStok(15);
    });
    ?>
</body>
</html>