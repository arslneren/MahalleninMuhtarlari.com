<?php
$page = "is";
include "inc/header.php";

$sorgu1 = $baglanti->prepare("UPDATE muhtar_detay SET isHayati=1 WHERE muhtarId =:muhID");
$sorgu1->execute(['muhID' => $_SESSION["muhId"]]);
header("location:isHayati");
ob_end_flush();
?>