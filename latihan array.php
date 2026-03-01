<?php

class Mahasiswa {

    public $namaMahasiswa;
    public $kelas;
    public $mataKuliah;
    public $nilai;

    public function nilaiMahasiswa($nilai) {
        if ($nilai >= 60) {
            return "Lulus Kuis";
        } else {
            return "Tidak Lulus Kuis";
        }
    }

    public function tampilkanData() {
        for ($index = 0; $index < count($this->namaMahasiswa); $index = $index + 1) {

            echo "<h2 style='text-align:center;'>Nilai Mahasiswa</h2>";
            echo "Nama : " . $this->namaMahasiswa[$index] . "<br>";
            echo "Kelas : " . $this->kelas . "<br>";
            echo "Mata Kuliah : " . $this->mataKuliah . "<br>";
            echo "Nilai : " . $this->nilai[$index] . "<br>";
            echo "Status : " . $this->nilaiMahasiswa($this->nilai[$index]) . "<br>";
            echo "<hr>";
        }
    }
}

$data = [
    'namaMahasiswa' => ["Aditya", "Shinta", "Ineu"],
    'kelas' => "SI2A",
    'mataKuliah' => "Pemrograman Berorientasi Objek",
    'nilai' => [85, 75, 55]
];

$mahasiswa = new Mahasiswa();
$mahasiswa->namaMahasiswa = $data['namaMahasiswa'];
$mahasiswa->kelas = $data['kelas'];
$mahasiswa->mataKuliah = $data['mataKuliah'];
$mahasiswa->nilai = $data['nilai'];

$mahasiswa->tampilkanData();

?>