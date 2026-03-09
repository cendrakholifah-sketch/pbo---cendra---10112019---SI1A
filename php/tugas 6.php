<?php

class bangunRuang{

public $namaBangun;
public $sisi;
public $jari;
public $tinggi;
public $volume;

public function hitungVolume(){
    if ($this->namaBangun == "Bola"){
        $volume = (4/3) * pi() * pow($this->jari, 3);
    }
    elseif ($this->namaBangun == "Kerucut"){
        $volume = (1/3) * pi() * pow($this->jari, 2) * $this->tinggi;
    } 
    elseif ($this->namaBangun == "Limas Segi Empat"){
        $volume = (1/3) * pow($this->sisi, 2) * $this->tinggi;
    }
    elseif ($this->namaBangun == "Kubus"){
        $volume = pow($this->sisi, 3);
    }
    elseif ($this->namaBangun == "Tabung"){
        $volume = pi() * pow($this->jari, 2) * $this->tinggi;
    }
    else{
        $volume = 0;
    }
    return $volume;
    }
   
}

$bangunRuang = [
    ["Bola", 0, 7, 0],
    ["Kerucut", 0, 14, 10],
    ["Limas Segi Empat", 8, 0, 24],
    ["Kubus", 30, 0, 0],
     ["Tabung", 0, 7, 10]
];

echo "<h2> Tabel Data Bangun Ruang </h2>";

echo "<table border='1' cellpadding='6'>";

echo "<tr>
<th>No</th>
<th>Nama Bangun Ruang</th>
<th>Sisi</th>
<th>Jari-Jari</th>
<th>Tinggi</th>
<th>Volume</th>
</tr>";

$no = 1;

foreach ($bangunRuang as $b){

$bangunRuang1 = new bangunRuang();

$bangunRuang1->namaBangun = $b[0];
$bangunRuang1->sisi = $b[1];
$bangunRuang1->jari = $b[2];
$bangunRuang1->tinggi = $b[3];

$volume = $bangunRuang1->hitungVolume();


echo "<tr>";

echo "<td>" .$no++."</td>";
echo "<td>" .$bangunRuang1->namaBangun. "</td>";
echo "<td>" .$bangunRuang1->sisi. "</td>";
echo "<td>" . $bangunRuang1->jari. "</td>";
echo "<td>" .$bangunRuang1->tinggi. "</td>";
echo "<td>" . $volume. "</td>";
echo "</tr>";
}
echo "</table>";


?>