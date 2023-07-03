<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "dwadv_k11c";

$connect = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);
if (!$connect) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
?>