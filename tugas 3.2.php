<?php
class Angsuran {
    public $besaranPinjaman;
    public $bunga;
    public $lamaAngsuran;
    public $keterlambatan;

    public function __construct($besaranPinjaman, $bunga, $lamaAngsuran, $keterlambatan){
        $this->besaranPinjaman = $besaranPinjaman;
        $this->bunga = $bunga;
        $this->lamaAngsuran = $lamaAngsuran;
        $this->keterlambatan = $keterlambatan;
    }
    public function totalPinjaman(){
    $subtotal = $this->besaranPinjaman + 
    ($this->besaranPinjaman * $this->bunga / 100);

    return $subtotal;
    }
    public function besaranAngsuran(){
    $subAngsuran = $this->totalPinjaman() / $this->lamaAngsuran;
    
    return $subAngsuran;
    }
    public function totalKeterlambatan(){
    $subtelat = 0.15 / 100 * $this->besaranAngsuran();

    return $subtelat * $this->keterlambatan;
    }
    public function totalPembayaran(){
        $subpembayaran = $this->besaranAngsuran() + $this->totalKeterlambatan();

        return $subpembayaran;
    }

}
if (isset ($_POST['Hitung'])){
    $besaranPinjaman = $_POST['Angsuran'];
    $bunga = $_POST['Bunga'];
    $lamaAngsuran = $_POST['Lama'];
    $keterlambatan = $_POST['Telat'];

 $Angsuran1 = new Angsuran ($besaranPinjaman, $bunga, $lamaAngsuran, $keterlambatan);

 echo "Total Pinjaman : Rp. " . $Angsuran1->totalPinjaman() . "<br>";
 echo "Besaran Angsuran: Rp. " . $Angsuran1->besaranAngsuran() . "<br>";
 echo "Denda Keterlambatan : " . $Angsuran1->totalKeterlambatan() . "<br>";
 echo "Total Pembayaran : " . $Angsuran1->totalPembayaran() . "<br>";

}

?>