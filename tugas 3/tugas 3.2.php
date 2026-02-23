<?php
class Angsuran {
    public $besaranPinjaman = 1000000;
    public $bunga = 0.10;
    public $lamaAngsuran = 5;
    public $denda = 0.15;
    public $keterlambatan = 30;

    public function totalPinjaman()
    $subtotal = $this->besaranPinjaman * $this->bunga;

    return $subtotal;

    public function besaranAngsuran()
    $subangsuran = $this->totalPinjaman / $this->lamaAngsuran;

    return $subangsuran;


}


?>