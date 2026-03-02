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
}
}
if ($subtotal > 500000 && $kartu = true){
$totalBayar = $subTotal - 50000;

} elseif ($subTotal > 100000 && $kartu = true){
$totalBayar = $subTotal - 15000;
} else {
    $diskon = 0;
}


















?>