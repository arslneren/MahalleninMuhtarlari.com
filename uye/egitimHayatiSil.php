<?php
$page = "is";
include "inc/header.php";

$id = htmlspecialchars($_GET["id"]);

$sorgu1 = $baglanti->prepare("DELETE FROM egitimhayati WHERE id=:id AND muhID =:muhId;");
$sorgu1->execute(['id' => $id, 'muhId' => $_SESSION["muhId"]]);
header("location:../egitimHayati");
ob_end_flush();
?>