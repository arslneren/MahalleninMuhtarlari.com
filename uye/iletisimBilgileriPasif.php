<?php
$page = "is";
include "inc/header.php";

$sorgu1 = $baglanti->prepare("UPDATE muhtar_detay SET iletisimBilgileri=0 WHERE muhtarId =:muhID");
$sorgu1->execute(['muhID' => $_SESSION["muhId"]]);
header("location:iletisimBilgileri");
ob_end_flush();
?>