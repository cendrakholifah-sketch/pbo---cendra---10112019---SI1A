<?php

class Belanja { // ini adalah class belanja


public string $namapembeli="cendra"; // ini adalah insteance variable, bertipe data string

public string $NamaBarang="snack"; // ini adalah insteance variable, bertipe data string

public int $JumlahBarang= 5; // ini adalah insteance variable, bertipe data intejer

public int $HargaBarang= 2000; // ini adalah insteance variable, bertipe data intejer

public float $totalbayar; // ini adalah insteance variable, bertipe data float/desimal

public float $diskon= 0.2; // ini adalah insteance variable, bertipe data float/desimal


public static float $pajak = 0.02; // ini adalah static variable, 



// public function __constructor ($namapembeli){
//     $this->namapembeli = $namapembeli; // ini adalah local variable
// }

public function hitungtotal(): float
{
    $subtotal = $this->HargaBarang * $this->JumlahBarang;

    return $subtotal;
}

public function totaldiskon(): float
{
    $subdiskon = $this->hitungtotal() * $this->diskon;

    return $subdiskon;
}

public function tampilkanRincian (){
    echo "Nama Pembeli : " . $this->namapembeli . "<br>";
    echo "Nama Barang : " . $this->NamaBarang . "<br>";
    echo "Jumlah Barang : " . $this->JumlahBarang . "<br>";
    echo "Harga Barang : " . $this->HargaBarang . "<br>";
    echo "Total Bayar : " . $this->hitungtotal() . "<br>";
    echo "Total Diskon : " . $this->totaldiskon() . "<br>";
    // cari diskon dan total bayar

}
}

$belanja1 = new Belanja();
$belanja1->tampilkanRincian();
?>
