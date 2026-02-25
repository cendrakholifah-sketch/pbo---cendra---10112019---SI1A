<?php

class Mahasiswa{

public $namaMahasiswa;
public $kelas;
public $mataKuliah;
public $nilai;

public function nilaiMahasiswa(){
   if ($this->nilai > 60 ){
    echo "Lulus Kuis";
   }else {
      echo "Tidak Lulus Kuis";

    } 
}
}

$data = [
'namaMahasiswa' => ["Aditya", "Shinta", "Ineu"],
'kelas' => "SI2A",
'mataKuliah' => "Pemogaraman Berorientasi Objek",
'nilai' => [85, 75, 55]

];

$mahasiswa = new Mahasiswa();
$mahasiswa->namaMahasiswa = $data["namaMahasiswa"];
$mahasiswa->kelas = $data["kelas"];
$mahasiswa->mataKuliah = $data["mataKuliah"];
$mahasiswa->nilai = $data["nilai"];
$mahasiswa->namaMahasiswa = $data["namaMahasiswa"];

echo "<h2> Latihan Array </h2>";
echo "Nama Mahasiswa : " . $mahasiswa->namaMahasiswa . 

?>