<?php

function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

class BelanjaBulanan {

    public $pembeli;
    public $harga;
    public $jumlah;
    public $kartu;

    public function subTotal() {
        return $this->harga * $this->jumlah;
    }

    public function hitungDiskon() {
        $subTotal = $this->subTotal();
        $diskon = 0;

        if ($this->kartu) {
            if ($subTotal > 500000) {
                $diskon = 50000;
            } elseif ($subTotal > 100000) {
                $diskon = 15000;
            }
        } else {
            if ($subTotal > 100000) {
                $diskon = 5000;
            }
        }

        return $diskon;
    }

    public function totalBayar() {
        return $this->subTotal() - $this->hitungDiskon();
    }
}

$dataBelanja = [
    ["Pembeli 1", 200000, 1, true],
    ["Pembeli 2", 570000, 1, true],
    ["Pembeli 3", 120000, 1, false],
    ["Pembeli 4", 90000, 1, false],
];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Belanja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
        }

        th {
            background-color: #f1c40f;
            color: black;
            padding: 10px;
            border: 1px solid #ccc;
        }

        td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ccc;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .member {
            color: green;
            font-weight: bold;
        }

        .non-member {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>Data Belanja Pembeli</h2>

<table>
    <tr>
        <th>No</th>
        <th>Nama Pembeli</th>
        <th>Status Member</th>
        <th>Total Belanja</th>
        <th>Diskon</th>
        <th>Total Bayar</th>
    </tr>

<?php
$no = 1;
foreach ($dataBelanja as $data) {

    $belanja = new BelanjaBulanan();
    $belanja->pembeli = $data[0];
    $belanja->harga = $data[1];
    $belanja->jumlah = $data[2];
    $belanja->kartu = $data[3];

    echo "<tr>";
    echo "<td>".$no++."</td>";
    echo "<td>".$belanja->pembeli."</td>";

    if ($belanja->kartu) {
        echo "<td class='member'>Memiliki</td>";
    } else {
        echo "<td class='non-member'>Tidak Memiliki</td>";
    }

    echo "<td>".formatRupiah($belanja->subTotal())."</td>";
    echo "<td>".formatRupiah($belanja->hitungDiskon())."</td>";
    echo "<td>".formatRupiah($belanja->totalBayar())."</td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>