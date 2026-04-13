<?php

class Employee{

public $nama;
public $gaji;
public $lamaKerja;

public function __construct($nama, $gaji, $lamaKerja){
    $this->nama = $nama;
    $this->gaji = $gaji;
    $this->lamaKerja = $lamaKerja;
}

public function hitungBonus(){
    return 0;
}

public function hitungGaji(){
    return $this->gaji + $this->hitungBonus();
}
public function getInfo(){
   return "Employee: $this->nama | Lama Kerja: $this->lamaKerja tahun | Bonus: Rp" . number_format($this->hitungBonus(),0, ",", ".") .
   "| Total Gaji: Rp". number_format($this->hitungGaji(), 0, ",", ".");
}
}

class Programmer extends Employee{

    public function hitungBonus(){
        if ($this->lamaKerja < 1){
            return 0;
        }elseif ($this->lamaKerja <= 10){
            return 0.01 * $this->lamaKerja * $this->gaji;
        }else{
            return 0.02 * $this->lamaKerja * $this->gaji;
        }
    }

    
    public function getInfo(){
        return "Programmer: $this->nama | Lama Kerja: $this->lamaKerja tahun | Bonus: Rp" . number_format($this->hitungBonus(),0, ",", ".") .
   "| Total Gaji: Rp". number_format($this->hitungGaji(), 0, ",", ".");
}
}

class Direktur extends Employee{

public $tunjangan;
public $bonus;

public function __construct($nama, $lamaKerja, $gaji, $bonus = 0.5, $tunjangan = 0.1){
    parent:: __construct($nama, $lamaKerja, $gaji);
    $this->bonus = $bonus;
    $this->tunjangan = $tunjangan;
}
    public function hitungBonus(){
    $Tunjangan = $this->tunjangan * $this->lamaKerja * $this->gaji;
    $Bonus = $this->bonus * $this->lamaKerja * $this->gaji;
    return $Tunjangan + $Bonus;
    }

    public function getInfo(){
        return "Direktur: $this->nama | Lama Kerja: $this->lamaKerja tahun | Bonus: Rp" . number_format($this->hitungBonus(),0, ",", ".") .
   "| Total Gaji: Rp". number_format($this->hitungGaji(), 0, ",", ".");
}
}

class pegawaiMingguan extends Employee{

public $hargaBarang;
public $stok;
public $terjual;

public function __construct($nama, $lamaKerja, $gaji, $hargaBarang, $stok, $terjual){
    parent:: __construct($nama, $lamaKerja, $gaji);
    $this->hargaBarang = $hargaBarang;
    $this->stok = $stok;
    $this->terjual = $terjual;
}

public function hitungBonus(){
    $persen = ($this->terjual / $this->stok) * 100;

    if ($persen < 70){
        return 0.10 * $this->hargaBarang * $this->terjual;
    }else {
        return 0.03 * $this->hargaBarang * $this->terjual;
    }
}

public function getInfo(){
        return "Pegawai Mingguan: $this->nama | Lama Kerja: $this->lamaKerja tahun | Bonus: Rp" . number_format($this->hitungBonus(),0, ",", ".") .
   "| Total Gaji: Rp". number_format($this->hitungGaji(), 0, ",", ".");
}
}

$data = [];

$data[] = new Programmer("Budi", 5000000, 5);
$data[] = new Direktur("Cendra", 10000000, 8);
$data[] = new PegawaiMingguan("Asep", 3000000, 2, 50000, 100, 80);

foreach($data as $karyawan){
    echo $karyawan->getInfo() . "<br>";
}
?>