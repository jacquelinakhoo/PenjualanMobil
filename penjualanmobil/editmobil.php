<?php
include "Koneksi.php";

$kodemobil = $_POST['kode_mobil'] ?? '';
$merk = $_POST['merk'] ?? '';
$type = $_POST['type'] ?? '';
$warna = $_POST['warna'] ?? '';
$harga = $_POST['harga'] ?? '';

$response = ['status' => 0, 'message' => 'Data tidak lengkap.'];

if ($kodemobil && $merk && $type && $warna && $harga) {
    $sql= "UPDATE mobil 
            SET merk='$merk', type='$type', warna='$warna', harga='$harga' 
            WHERE kodemobil='$kodemobil'";
        if (mysqli_query($conn, $sql)) {
            $response=['status'=>1, 'message'=>'Update berhasil.']; 
        } else {
    $response = ['status' => 0, 'message' => "Data tidak lengkap. kodemobil=$kodemobil, merk=$merk, type=$type, warna=$warna, harga=$harga"];
}
}
echo json_encode($response);