<?php

function formatRupiah($angka) {
  return "Rp" . number_format($angka, 0);
}

class Belanja{
public $namaPembeli;
public $namaBarang;
public $hargaBarang;
public $jumlahBeli;

public function hitungSubTotal(){
   return $this->hargaBarang * $this->jumlahBeli;
}
 public function hitungTotalDenganDiskon($persendiskon){
    $subtotal = $this->hitungSubTotal();
    $diskon = ($persendiskon/100) * $subtotal;
    return $subtotal - $diskon;
 }
}

$data = [
    'namaPembeli' => "Ivan",
    'namaBarang' => "Sepatu",
    'hargaBarang' => 1000000,
    'jumlahBeli' => 2
];

$belanja = new Belanja();
$belanja->namaPembeli = $data["namaPembeli"];
$belanja->namaBarang = $data["namaBarang"];
$belanja->hargaBarang = $data["hargaBarang"];
$belanja->jumlahBeli = $data["jumlahBeli"];

echo "<h2> STRUK BELANJA TOKO AKU </h2>";
echo "Nama Pemebeli : " . $belanja->namaPembeli . "<br>";
echo "Nama Barang : " . $belanja->namaBarang . "<br>";
echo "Sub Total : " . formatRupiah($belanja->hitungSubTotal()) . "<br>";
echo "Total (Diskon 20%) : " . formatRupiah($belanja->hitungTotalDenganDiskon(20)) . "<br>";
?>