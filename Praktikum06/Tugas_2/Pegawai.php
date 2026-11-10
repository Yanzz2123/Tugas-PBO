<?php

/**
 * Class Induk Pegawai
 * Berisi properti dan method dasar yang dimiliki oleh semua jenis pegawai.
 */
class Pegawai {
    protected $id;
    protected $nama;

    public function __construct($id, $nama) {
        // Validasi sederhana untuk ID
        if (!is_numeric($id) || $id <= 0) {
            throw new Exception("ID Pegawai harus berupa angka positif.");
        }
        $this->id = $id;
        $this->nama = $nama;
    }

    public function getNama() {
        return $this->nama;
    }
}

/**
 * Class Anak PegawaiTetap
 * Mewarisi dari Pegawai dan memiliki gaji pokok bulanan.
 */
class PegawaiTetap extends Pegawai {
    private $gajiPokok;

    public function __construct($id, $nama, $gajiPokok) {
        // Memanggil konstruktor dari class induk (Pegawai)
        parent::__construct($id, $nama);

        // Validasi gaji pokok tidak boleh negatif
        if (!is_numeric($gajiPokok) || $gajiPokok < 0) {
            throw new Exception("Gaji pokok tidak boleh bernilai negatif.");
        }
        $this->gajiPokok = $gajiPokok;
    }

    /**
     * Implementasi hitungGaji() untuk Pegawai Tetap.
     * Gaji yang dihitung adalah gaji pokok bulanan.
     */
    public function hitungGaji() {
        return $this->gajiPokok;
    }

    public function getInfo() {
        return "<b>Pegawai Tetap:</b> " . $this->getNama() . "<br>" .
               "Gaji Bulanan: Rp " . number_format($this->hitungGaji(), 0, ',', '.');
    }
}

/**
 * Class Anak PegawaiKontrak
 * Mewarisi dari Pegawai dan memiliki upah per jam.
 */
class PegawaiKontrak extends Pegawai {
    private $upahPerJam;
    private $jumlahJamKerja;

    public function __construct($id, $nama, $upahPerJam, $jumlahJamKerja) {
        // Memanggil konstruktor dari class induk (Pegawai)
        parent::__construct($id, $nama);

        // Validasi upah dan jam kerja tidak boleh negatif
        if (!is_numeric($upahPerJam) || $upahPerJam < 0) {
            throw new Exception("Upah per jam tidak boleh bernilai negatif.");
        }
        if (!is_numeric($jumlahJamKerja) || $jumlahJamKerja < 0) {
            throw new Exception("Jumlah jam kerja tidak boleh bernilai negatif.");
        }
        $this->upahPerJam = $upahPerJam;
        $this->jumlahJamKerja = $jumlahJamKerja;
    }

    /**
     * Implementasi hitungGaji() untuk Pegawai Kontrak.
     * Gaji dihitung berdasarkan: upah per jam * jumlah jam kerja.
     */
    public function hitungGaji() {
        return $this->upahPerJam * $this->jumlahJamKerja;
    }

    public function getInfo() {
        return "<b>Pegawai Kontrak:</b> " . $this->getNama() . "<br>" .
               "Total Upah (" . $this->jumlahJamKerja . " jam): Rp " . number_format($this->hitungGaji(), 0, ',', '.');
    }
}

// --- Bagian Eksekusi ---

echo "<h1>Informasi Gaji Pegawai </h1>";
echo "<hr>";

try {
    // 1. Membuat objek PegawaiTetap
    $pegawaiTetap = new PegawaiTetap(101, "Dewi Lestari", 6200000);
    echo $pegawaiTetap->getInfo() . "<br><br>";

    // 2. Membuat objek PegawaiKontrak (misal bekerja 100 jam)
    $pegawaiKontrak = new PegawaiKontrak(202, "Rian Ardianto", 125000, 100);
    echo $pegawaiKontrak->getInfo();

} catch (Exception $e) {
    // Menampilkan pesan error jika validasi gagal
    echo '<p style="color: red;">Error: ' . $e->getMessage() . '</p>';
}

?>