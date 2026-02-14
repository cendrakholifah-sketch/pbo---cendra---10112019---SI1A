<?php
class suhu{ // ini adalah Kelas suhu

private $nilai; // ini adalah inheritance variabel

public function __construct($nilai) {
    $this->nilai = $nilai;

}
// ini adalah konversi dari celcius <-> fahreinhet
public function celciusKefahreinhet(){ 
   return ($this->nilai * 9/5) + 32;
}
Public function fahreinhetKecelcius(){
   return ($this->nilai - 32) * 9/5;
}

// ini adalah konversi celcius <-> reamur
public function celciusKereamur(){
    return $this->nilai * 4/5;
}
public function reamurKecelcius(){
    return $this->nilai * 5/4;
}

// ini adalah konversi celcius <-> kelvin
public function celciusKekelvin(){
    return $this->nilai + 273.15;
}
public function kelvinKecelcius(){
    return $this->nilai - 273.15;
}

}


?>
<?php
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Suhu</title>
</head>

<body>

<h2>Kalkulator Suhu </h2>

<form method="post">

    <p>
        Masukkan Suhu (Celcius):
        <input type="number" name="suhu" required>
    </p>

    <p>
        Pilih Konversi:
        <select name="pilih">
            <option value="f">Fahrenheit</option>
            <option value="k">Kelvin</option>
            <option value="r">Reamur</option>
        </select>
    </p>

    <p>
        <button type="submit" name="hitung">Hitung</button>
    </p>

</form>

<?php
if (isset($_POST['hitung'])) {

    $angka = $_POST['suhu'];
    $pilih = $_POST['pilih'];

    $suhu = new Suhu($angka);

    if ($pilih == "f") {
        echo "<p>Hasil: " . $suhu->celciusKefahreinhet() . " °F</p>";
    }

    if ($pilih == "k") {
        echo "<p>Hasil: " . $suhu->celciusKekelvin() . " K</p>";
    }

    if ($pilih == "r") {
        echo "<p>Hasil: " . $suhu->celciusKereamur() . " °R</p>";
    }
}
?>

</body>
</html>
