<?php
include 'koneksi.php';

$result=$conn->query("select * from mobil");
$mobil=array();
while($row=$result->fetch_assoc()){
    $mobil[]=$row;
}
echo json_encode($mobil);
?>