<?php
$page = "is";
include "inc/header.php";

$sorgu1 = $baglanti->prepare("UPDATE muhtarlar SET shows=1 WHERE id =:muhID");
$sorgu1->execute(['muhID' => $_SESSION["muhId"]]);
header("location:home");
ob_end_flush();
?>