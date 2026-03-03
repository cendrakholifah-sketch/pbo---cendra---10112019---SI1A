<?php

function formatRupiah($angka) {
  return "Rp." . number_format($angka, 0, ",", ".");
}

class belanjaBulanan{

public $pembeli;
public $harga;
public $jumlah;
public $kartu;


public function subTotal(){
    return $this->harga * $this->jumlah;
}

public function hitungDiskon(){
    $subTotal = $this->subTotal();
    $diskon = 0;

if ($this->kartu){
   if ($subTotal > 500000){
    $diskon = 50000;
   }elseif($subTotal > 100000){
    $diskon = 15000;
   }else{
    if ($subTotal > 50000){
        $diskon = 5000;
    }
   }
return $diskon;
}
}

public function totalBayar(){
    return $this->subTotal() - $this->hitungDiskon();
}
}

$dataBelanja = [
    ["Pembeli 1", 200000, 1, true],
    ["Pembeli 2", 570000, 1, true],
    ["Pembeli 3", 190000, 1, false],
    ["Pembeli 4", 90000, 1, false]  
];


foreach ($dataBelanja as $data){

$belanja1 = new belanjaBulanan();
$belanja1->pembeli = $data[0];
$belanja1->harga = $data[1];
$belanja1->jumlah = $data[2];
$belanja1->kartu = $data[3];


echo "<h2> DAFTAR BELANJA SAYA</h2>";

echo "<b>Nama Pembeli </b>: " . $belanja1->pembeli . "<br>";
if ($belanja1->kartu){
        echo "<b>Status Member</b> : Memiliki Kartu Member<br>";
      } else {
        echo "<b>Status Member</b> : Tidak Memiliki Kartu Member<br>";
      }
echo "<b>Total Belanja</b> : " . formatRupiah($belanja1->subTotal()) . "<br>";
echo "<b>Diskon</b> : " . formatRupiah($belanja1->hitungDiskon()) . "<br>";
echo "<b>Total Bayar</b> : " . formatRupiah($belanja1->totalBayar()) . "<br>";






}
//  echo "<b>Nama Pembeli:</b> " . $belanja->pembeli . "<br>";

//     // Keterangan status member
//     if ($belanja->kartu) {
//         echo "Status Member: Memiliki Kartu Member<br>";
//     } else {
//         echo "Status Member: Tidak Memiliki Kartu Member<br>";
//     }

//     echo "Total Belanja: " . formatRupiah($belanja->subTotal()) . "<br>";
//     echo "Diskon: " . formatRupiah($belanja->hitungDiskon()) . "<br>";
//     echo "Total Bayar: " . formatRupiah($belanja->totalBayar()) . "<br>";




?>