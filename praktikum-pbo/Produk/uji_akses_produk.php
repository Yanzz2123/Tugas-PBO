<?php
require_once 'produk_digital.php';

// Membuat objek dari class Produk
$produk1 = new Produk("Laptop Gaming", "Elektronik", 15000000);

echo "--- Menguji Akses dari Luar Class ---\n";

// 1. Mengakses properti 'public' (nama)
// HASIL: Berhasil.
echo "Akses public 'nama': " . $produk1->nama . "\n";

// 2. Mengakses properti 'protected' (kategori)
// HASIL: Gagal (Fatal Error). Properti protected tidak bisa diakses dari luar scope class.
// echo "Akses protected 'kategori': " . $produk1->kategori . "\n";
echo "Akses protected 'kategori': Tidak bisa diakses langsung! (Menyebabkan Fatal Error)\n";

// 3. Mengakses properti 'private' (harga)
// HASIL: Gagal (Fatal Error). Properti private hanya bisa diakses di dalam class itu sendiri.
// echo "Akses private 'harga': " . $produk1->harga . "\n";
echo "Akses private 'harga': Tidak bisa diakses langsung! (Menyebabkan Fatal Error)\n";

// Cara yang benar untuk mendapatkan nilai private adalah melalui getter
echo "Akses harga melalui getHarga(): " . $produk1->getHarga() . "\n";

echo "---------------------------------------\n\n";

// --- Menguji akses 'protected' dari subclass ---
$produkDigital1 = new ProdukDigital("Lisensi Software", "Digital", 750000);
// Method di bawah ini berhasil karena dieksekusi dari dalam subclass,
// yang memiliki hak akses ke properti protected induknya.
$produkDigital1->cekKategori();