<?php
include 'Koneksi.php';

$result = $conn->query("select * from paket");
$paket = array();
while($row = $result->fetch_assoc()){
    $paket[] = $row;
}
echo json_encode($paket);
?>