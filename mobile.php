<?php
require_once('db_connect.php');
if (isset($_POST['ampere'])) {
    
    //getting name from the request 
    
    $ampere = $_POST['ampere'];
    $volt   = $_POST['volt'];
    $suhu   = $_POST['suhu'];
    $a2   = $_POST['a2'];
    $a3   = $_POST['a3'];
    $a6   = $_POST['a6'];
    $a7   = $_POST['a7'];
    $x   = $_POST['x'];
    $y   = $_POST['y'];
    $v_bat  = $_POST['v_bat'];
    if (isset($_POST['status'])) {
        $status = $_POST['status'];
    } else {
        $status = 0;
    }
    
    // ini untuk update bahwa sudah ada orang yang ambil
    
    $query2 = "INSERT INTO `mobile`(`ampere`,`suhu`,`volt`,`v_bat`,`status`,`a3`,`a2`,`a7`,`a6`,`x`,`y`) VALUES ($ampere,$suhu,$volt,$v_bat,$status,$a3,$a2,$a7,$a6,$x,$y) ";
    $result = mysqli_query($con, $query2) or die("Error: " . mysqli_error($con));
    
}
echo "Berhasil1";
?>