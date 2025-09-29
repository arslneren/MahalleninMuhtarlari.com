<?php
$page = "is";
include "inc/header.php";

$id = htmlspecialchars($_GET["id"]);

$sorgu1 = $baglanti->prepare("DELETE FROM iletisimbilgileri WHERE id=:id AND muhID =:muhId;");
$sorgu1->execute(['id' => $id, 'muhId' => $_SESSION["muhId"]]);
header("location:../iletisimBilgileri");
ob_end_flush();
?>