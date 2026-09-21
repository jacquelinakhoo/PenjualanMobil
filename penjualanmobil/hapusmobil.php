<?php
include "koneksi.php";
$kodemobil = $_POST['kodemobil'] ?? '';
$response = ['status' => 0, 'message' => 'Data tidak lengkap.'];

if(!empty($kodemobil)){
    $query = "DELETE FROM mobil WHERE kodemobil='$kodemobil'";
    if(mysqli_query($conn, $query)){
        $response['status'] = 1;
        $response['message'] = 'Data berhasil dihapus.';
}
}

echo json_encode($response);