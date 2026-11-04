<?php
require_once 'Produk.php';

class ProdukDigital extends Produk {

    public function __construct($nama, $kategori, $harga) {
        // Memanggil constructor dari parent class (Produk)
        parent::__construct($nama, $kategori, $harga);
    }

    public function cekKategori() {
        // Mengakses properti 'kategori' yang berstatus protected dari parent class
        // Ini diizinkan karena ProdukDigital adalah turunan (subclass) dari Produk.
        echo "--- Info dari Subclass ProdukDigital ---\n";
        echo "Mengakses kategori produk dari subclass: " . $this->kategori . "\n";
        echo "----------------------------------------\n";
    }
}