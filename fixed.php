<?php
require_once('db_connect.php');
if (isset($_POST['ampere'])) {
    
    //getting name from the request 
    
    $ampere = $_POST['ampere'];
    $volt   = $_POST['volt'];
    $suhu   = $_POST['suhu'];
    $v_bat  = $_POST['v_bat'];
    if (isset($_POST['status'])) {
        $status = $_POST['status'];
    } else {
        $status = 0;
    }
    
    // ini untuk update bahwa sudah ada orang yang ambil
    
    $query2 = "INSERT INTO `fixed`(`ampere`,`suhu`,`volt`,`v_bat`,`status`) VALUES ($ampere,$suhu,$volt,$v_bat,$status) ";
    $result = mysqli_query($con, $query2) or die("Error: " . mysqli_error($con));
    
}
echo "Berhasil1";
?>