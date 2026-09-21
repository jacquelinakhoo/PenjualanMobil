<?php
ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

    include 'koneksi.php';
    header('Content-Type: application/json');

    $response=['success'=>false,'message'=>''];

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $kode = $_POST['kodemobil'] ?? '';
        $merk = $_POST['merk'] ?? '';
        $type = $_POST['type'] ?? '';
        $warna = $_POST['warna'] ?? '';
        $harga = $_POST['harga'] ?? '';
        if($kode && $merk && $type && $warna && $harga){
            if(!is_numeric($harga)){
                $response['message'] = 'Harga harus berupa angka.';
            } 
            else {
                $stmt = $conn->prepare("INSERT INTO mobil (kodemobil, merk, type, warna, harga) VALUES (?, ?, ?, ?, ?)");
                $stmt = $conn->prepare("INSERT INTO mobil (KodeMobil, Merk, Type, Warna, Harga) VALUES (?, ?, ?, ?, ?)");                $response['success'] = $stmt->execute();
                $response['message'] = $response['success'] ? 'Data berhasil disimpan.' : 'Gagal menyimpan data: ' . $stmt->error;
                $stmt->close();
            }
        } else {
            $response['message'] = 'Semua data wajib diisi.';
        }
    } else {
        $response['message'] = 'Metode request tidak valid.';
    }

    ob_end_clean();
    echo json_encode($response);
    ?>