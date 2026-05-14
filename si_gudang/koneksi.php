<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "si_gudang";

try {
    $koneksi = mysqli_connect($host, $user, $pass, $db);
    if (!$koneksi) {
        
        throw new Exception("Gagal terhubung ke database: " . mysqli_connect_error());
    }
} catch (Exception $e) {
    
    die("<div style='color:red; padding:20px; border:1px solid red;'>
            <strong>Waduh! Sepertinya ada masalah:</strong> " . $e->getMessage() . "
         </div>");
}
?>