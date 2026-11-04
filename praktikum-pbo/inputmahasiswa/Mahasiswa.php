<?php
declare(strict_types=1);

class Mahasiswa
{
    private string $nim;
    private string $nama;
    private string $fakultas;
    private string $prodi;
    private string $asalSekolah;
    private int $semester;
    private string $hobi;
    private string $agama;
    private string $alamat;

    private static array $daftarAgama = [
        'Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'
    ];

    public function __construct(
        string $nim,
        string $nama,
        string $fakultas,
        string $prodi,
        string $asalSekolah,
        int $semester,
        string $hobi,
        string $agama,
        string $alamat
    ) {
        if (trim($nim) === '') {
            throw new InvalidArgumentException('NIM tidak boleh kosong.');
        }
        $this->nim = $nim;
        $this->setNama($nama);
        $this->setFakultas($fakultas);
        $this->setProdi($prodi);
        $this->setAsalSekolah($asalSekolah);
        $this->setSemester($semester);
        $this->setHobi($hobi);
        $this->setAgama($agama);
        $this->setAlamat($alamat);
    }

    // Getters
    public function getNim(): string { return $this->nim; }
    public function getNama(): string { return $this->nama; }
    public function getFakultas(): string { return $this->fakultas; }
    public function getProdi(): string { return $this->prodi; }
    public function getAsalSekolah(): string { return $this->asalSekolah; }
    public function getSemester(): int { return $this->semester; }
    public function getHobi(): string { return $this->hobi; }
    public function getAgama(): string { return $this->agama; }
    public function getAlamat(): string { return $this->alamat; }

    // Setters
    public function setNama(string $nama): void
    {
        if (trim($nama) === '') {
            throw new InvalidArgumentException('Nama tidak boleh kosong.');
        }
        $this->nama = $nama;
    }

    public function setFakultas(string $fakultas): void
    {
        if (trim($fakultas) === '') throw new InvalidArgumentException('Fakultas tidak boleh kosong.');
        $this->fakultas = $fakultas;
    }

    public function setProdi(string $prodi): void
    {
        if (trim($prodi) === '') throw new InvalidArgumentException('Program Studi tidak boleh kosong.');
        $this->prodi = $prodi;
    }

    public function setAsalSekolah(string $asalSekolah): void
    {
        if (trim($asalSekolah) === '') throw new InvalidArgumentException('Asal Sekolah tidak boleh kosong.');
        $this->asalSekolah = $asalSekolah;
    }

    public function setSemester(int $semester): void
    {
        if ($semester < 1 || $semester > 14) {
            throw new InvalidArgumentException('Semester harus antara 1 dan 14.');
        }
        $this->semester = $semester;
    }

    public function setHobi(string $hobi): void { $this->hobi = $hobi; }

    public function setAgama(string $agama): void
    {
        if (!in_array($agama, self::$daftarAgama, true)) {
            throw new InvalidArgumentException('Agama tidak valid.');
        }
        $this->agama = $agama;
    }

    public function setAlamat(string $alamat): void { $this->alamat = $alamat; }

    public function ringkasan(): string
    {
        return $this->nim . ' - ' . $this->nama;
    }
}