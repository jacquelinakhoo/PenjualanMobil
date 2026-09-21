<?php
ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
    include 'koneksi.php';
    header('Content-Type: application/json');

    $response=['success'=>false,'message'=>''];

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $kodepaket = $_POST['kodepaket'] ?? '';
        $uangmuka = $_POST['uangmuka'] ?? '';
        $tenor = $_POST['tenor'] ?? '';
        $bungacicilan = $_POST['bungacicilan'] ?? '';
        if($kodepaket && $uangmuka && $tenor && $bungacicilan){
            
                $stmt = $conn->prepare("INSERT INTO paket (KodePaket, UangMuka, Tenor, BungaCicilan) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $kodepaket, $uangmuka, $tenor, $bungacicilan);
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