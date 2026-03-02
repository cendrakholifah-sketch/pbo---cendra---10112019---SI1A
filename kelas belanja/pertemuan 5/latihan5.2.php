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
 public function hitungDiskon($subtotal){
   if ($subtotal > 100000){
    return $subtotal * 0.1;
   }
   return 0;
}

public function hitungTotal() {
    $subtotal = $this->hitungSubTotal();
    $diskon = $this->hitungDiskon($subtotal);
    return $subtotal - $diskon;
}
}
$dataBelanja = [
[
    'namaPembeli' => "Budi",
    'namaBarang' => "Gula 1 Kg",
    'hargaBarang' => 6500,
    'jumlahBeli' => 2
],

[
    'namaPemebeli' => "Shinta",
    'namaBarang' => "Minyak 1 L",
    'hargaBarang' => 14000,
    'jumlahBeli' => 2
]
];

echo "<h2> STRUK BELANJA TOKO AKU </h2>";

$error1 = [];

$nama = $dataBelanja[0]['namaPembeli'];
$barang = $dataBelanja[0]['namaBarang'];
$harga = $dataBelanja[0]['hargaBarang'];
$jumlah = $dataBelanja[0]['jumlahBeli'];

if (empty($nama)) {
    $error1[] = "Nama Tidak Boleh Kosong!";
}

if ($harga <= 0) {
    $error1[] = "Harga Harus Lebih Dari 0!";
}

if ($jumlah <= 0) {
    $error1[] = "Jumlah Harus Lebih Dari 0";
}

if (!empty($error1)){
    foreach ($error1 as $error){
    echo $error . "<br>";    
    }
}else{
    $belanja1 = new Belanja();
    $belanja1->namaPembeli = $nama;
    $belanja1->namaBarang = $barang;
    $belanja1->hargaBarang = $harga;
    $belanja1->jumlahBeli = $jumlah;

    $subtotal = $belanja1->hitungSubTotal();
    $diskon = $belanja1->hitungDiskon($subtotal);
    $total = $belanja1->hitungTotal();
    
    echo "Pembeli : $belanja1->namaPembeli<br>";
    echo "Barang : $belanja1->namaBarang<br>";
    echo "SubTotal : " . formatRupiah($subtotal). "<br>";
    echo "Jumlah : " . formatRupiah($diskon) "<br>";
}





$belanja = new Belanja();
$belanja->namaPembeli = $data["namaPembeli"];
$belanja->namaBarang = $data["namaBarang"];
$belanja->hargaBarang = $data["hargaBarang"];
$belanja->jumlahBeli = $data["jumlahBeli"];


echo "Nama Pemebeli : " . $belanja->namaPembeli . "<br>";
echo "Nama Barang : " . $belanja->namaBarang . "<br>";
echo "Sub Total : " . formatRupiah($belanja->hitungSubTotal()) . "<br>";
echo "Total (Diskon 20%) : " . formatRupiah($belanja->hitungDiskon(10)) . "<br>";
echo "Total Belanja : " . formatRupiah()













?>