<?php
declare(strict_types=1);

class Buku
{
    private string $kodeBuku;
    private string $judul;
    private int $stok;

    public function __construct(string $kodeBuku, string $judul, int $stokAwal)
    {
        if (trim($kodeBuku) === '') {
            throw new InvalidArgumentException('Kode buku tidak boleh kosong.');
        }
        $this->kodeBuku = $kodeBuku;

        // Gunakan setter untuk validasi judul
        $this->setJudul($judul);

        // Validasi stok awal
        if ($stokAwal < 0) {
            throw new InvalidArgumentException('Stok awal tidak boleh negatif.');
        }
        $this->stok = $stokAwal;
    }

    // Getter untuk properti
    public function getKodeBuku(): string
    {
        return $this->kodeBuku;
    }

    public function getJudul(): string
    {
        return $this->judul;
    }

    public function getStok(): int
    {
        return $this->stok;
    }

    // Setter untuk judul dengan validasi
    public function setJudul(string $judul): void
    {
        if (trim($judul) === '') {
            throw new InvalidArgumentException('Judul tidak boleh kosong.');
        }
        $this->judul = $judul;
    }

    // Method untuk menambah stok
    public function tambahStok(int $jumlah): void
    {
        if ($jumlah < 1) {
            throw new InvalidArgumentException('Jumlah untuk ditambah harus positif.');
        }
        $this->stok += $jumlah;
    }

    // Method untuk mengurangi stok dengan validasi
    public function kurangiStok(int $jumlah): void
    {
        if ($jumlah < 1) {
            throw new InvalidArgumentException('Jumlah untuk dikurangi harus positif.');
        }
        if ($this->stok < $jumlah) {
            throw new RuntimeException('Stok tidak mencukupi untuk dikurangi.');
        }
        $this->stok -= $jumlah;
    }
}