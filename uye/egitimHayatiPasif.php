<?php
$page = "is";
include "inc/header.php";

$sorgu1 = $baglanti->prepare("UPDATE muhtar_detay SET egitimHayati=0 WHERE muhtarId =:muhID");
$sorgu1->execute(['muhID' => $_SESSION["muhId"]]);
header("location:egitimHayati");
ob_end_flush();
?>