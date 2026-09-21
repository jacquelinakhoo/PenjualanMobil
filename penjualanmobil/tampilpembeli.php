<?php
include 'Koneksi.php';

$result = $conn->query("select * from pembeli");
$pembeli = array();
while($row = $result->fetch_assoc()){
    $pembeli[] = $row;
}
echo json_encode($pembeli);
?>