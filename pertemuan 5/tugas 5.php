<?php

function formatRupiah($angka) {
  return "Rp" . number_format($angka, 0);
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
    $diskon = $subTotal - 50000;
   }elseif($subTotal > 100000){
    $diskon = $subTotal - 15000;
   }else{
    if ($subTotal > 50000){
        $diskon = $subTotal - 5000;
    }
   }
return $diskon;

}


}

public function totalBayar(){
    return $this->subTotal() - $this->hitungDiskon();
}
}

$belanja1 = new belanjaBulanan();
$belanja1->pembeli = "Pembeli 1";
$belanja1->harga = 100000;
$belanja1->jumlah = 3;
$belanja1->kartu = true;

echo "Nama Pembeli: " . $belanja1->pembeli . "<br>";
echo "Subtotal: " . formatRupiah($belanja1->subTotal()) . "<br>";
echo "Diskon: " . formatRupiah($belanja1->hitungDiskon()) . "<br>";
echo "Total Bayar: " . formatRupiah($belanja1->totalBayar());












?>