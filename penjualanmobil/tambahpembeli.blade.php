<?php
ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
    include 'koneksi.php';
    header('Content-Type: application/json');

    $response=['success'=>false,'message'=>''];

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $KTP = $_POST['KTP'] ?? '';
        $NamaPembeli = $_POST['NamaPembeli'] ?? '';
        $AlamatPembeli = $_POST['AlamatPembeli'] ?? '';
        $TelpPembeli = $_POST['TelpPembeli'] ?? '';
        if($KTP && $NamaPembeli && $AlamatPembeli && $TelpPembeli){
            
                $stmt = $conn->prepare("INSERT INTO pembeli (KTP, NamaPembeli, AlamatPembeli, TelpPembeli) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $KTP, $NamaPembeli, $AlamatPembeli, $TelpPembeli);
                $response['success'] = $stmt->execute();
                $response['message'] = $response['success'] ? 'Data berhasil disimpan.' : 'Gagal menyimpan data: ' . $stmt->error;
                $stmt->close();
        } 
        else {
            $response['message'] = 'Semua data wajib diisi.';
        }
    } else {
        $response['message'] = 'Metode request tidak valid.';
    }
    ob_end_clean();
    echo json_encode($response);
    ?>