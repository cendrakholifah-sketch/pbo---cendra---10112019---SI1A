<?php

class Karyawan{

public $nama;
public $golongan;
public $jamLembur;
public $totalGaji;

private $gajiPokok = [
    "Ib" => 1250000, "Ic" => 1300000, "Id" => 1350000,
    "IIa" => 2000000, "IIb" => 2100000, "IIc" => 2200000, "IId" => 2300000,
    "IIIa" => 2400000, "IIIb" => 2500000, "IIIc" => 2600000, "IIId" => 2700000,
    "IVa" => 2800000, "IVb" => 2900000, "IVc" => 3000000, "IVd" => 3100000
];

public function __construct($nama, $golongan, $jamLembur){
    $this->nama = $nama;
    $this->golongan = $golongan;
    $this->jamLembur = $jamLembur;

    $this->hitungGaji();
}

public function getGajiPokok(){
    return $this->gajiPokok[$this->golongan] ?? 0;
}

public function hitungGaji(){
    $gaji = $this->getGajiPokok();
    $lembur = $this->jamLembur * 15000;
    $this->totalGaji = $gaji + $lembur;
}

public function __destruct(){

}
}

// ===================================
// DATA ARRAY
// ===================================

$data = [];

$data[] = new Karyawan("Winny", "IIb", 30);
$data[] = new Karyawan("Stendy", "IIIc", 32);
$data[] = new Karyawan("Alfred", "IVb", 30);

// ===================================
// FUNCTION TAMPIL DATA
// ===================================

function tampilData($data){
    echo "\n==== DATA GAJI KARYAWAN ====\n";
    echo "No | Nama | Golongan | Jam Lembur | Total Gaji\n";

    foreach ($data as $i => $k){
        echo ($i+1) . " | $k->nama | $k->golongan | $k->jamLembur | Rp" . number_format($k->totalGaji,0, ",", ".") . "\n";

    }
}

// ===================================
// MENU PROGRAM
// ===================================

do {
    echo "\n==== MENU GAJI KARYAWAN ====\n";
    echo "1. Tampilkan Data\n";
    echo "2. Tambah Data\n";
    echo "3. Update Data\n";
    echo "4. hapus\n";
    echo  "5. Keluar\n";
    echo "Pilih menu: ";

    $menu = trim(fgets(STDIN));

    switch($menu){

        case 1:
            tampilData($data);
            break;

        case 2:
            echo "Nama: ";
            $nama = trim(fgets(STDIN));

            echo "Golongan: ";
            $gol = trim(fgets(STDIN));

            echo "Jam Lembur: ";
            $jam = trim(fgets(STDIN));

            if (!is_numeric($jam)){
                echo "Jam lembur tidak valid!\n";
                break;
            }

            $data[] = new Karyawan($nama, $gol, $jam);
            echo "Data berhasil ditambahkan. \n";
            break;

        case 3:
            tampilData($data);
            echo "Pilih nomor data yang diupdate: ";
            $no = trim(fgets(STDIN)) - 1;
            
            if (!isset($data[$no])){
                echo "Data tidak ditemukan!\n";
                break;
            }

            echo "Nama baru: ";
            $nama = trim(fgets(STDIN));

            echo "Golongan Baru: ";
            $gol = trim(fgets(STDIN));

            echo "Jam lembur baru: ";
            $jam = trim(fgets(STDIN));

            $data[$no] = new Karyawan($nama, $gol, $jam);
            echo "Data berhasil diupdate. \n";
            break;

        case 4:
            tampilData($data);
            echo "Pilih nomor data yang dihapus; ";
            $no = trim(fgets(STDIN)) - 1;

            if (isset($data[$no])){
                unset($data[$no]);
                $data = array_values($data);
                echo "Data berhasil dihapus. \n";
            } else {
                echo "Data tidak ditemukan!\n";
            }
            break;

        case 5:
            echo "Program selesai. \n";
            break;

        default:
             echo "Menu tidak valid!\n";

    }
} while ($menu != 5);

?>