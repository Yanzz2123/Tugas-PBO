<?php

class Produk {
    // Properti public: dapat diakses dari mana saja
    public $nama;

    // Properti protected: dapat diakses oleh kelas ini dan kelas turunannya
    protected $kategori;

    // Properti private: hanya dapat diakses di dalam kelas ini saja
    private $harga;

    public function __construct($nama, $kategori, $harga) {
        $this->nama = $nama;
        $this->kategori = $kategori;
        $this->harga = $harga;
    }

    // Method untuk menampilkan informasi produk dari dalam class
    public function infoProduk() {
        echo "--- Info Produk (di dalam class Produk) ---\n";
        echo "Nama: " . $this->nama . "\n";
        echo "Kategori: " . $this->kategori . "\n";
        echo "Harga: " . $this->harga . "\n"; // Akses private valid di dalam kelasnya
        echo "-------------------------------------------\n";
    }

    // Getter untuk harga agar bisa diakses dari luar secara terkontrol
    public function getHarga() {
        return $this->harga;
    }
}
