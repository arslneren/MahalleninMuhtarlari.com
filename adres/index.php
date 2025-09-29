<?php
error_reporting(0);
include '../vt.php';
$durum = $_GET["durum"];

function ucfirst_turkish($str) {
    $tmp = preg_split("//u", $str, 2,
        PREG_SPLIT_NO_EMPTY);
    $k=array('ı','i','ş','ö','ğ','ç','ü');
    $b=array('I','İ','Ş','Ö','Ğ','Ç','Ü');
    return mb_convert_case(
            str_replace($k, $b, $tmp[0]),
            MB_CASE_TITLE, "UTF-8").
        $tmp[1];
}
function strtoupper_tr($data) {
    $k=array('ı','i','ş','ö','ğ','ç','ü');
    $b=array('I','İ','Ş','Ö','Ğ','Ç','Ü');
    $data=str_replace($b,$k,$data);
    $data = ucfirst_turkish((strtolower($data)));
    return $data;
}

if($durum == "ilce"){
    $plakakodu = $_GET["plakakodu"];
    $sorgu=$baglanti->prepare("SELECT ilce_title, ilce_key FROM ilce where ilce_sehirkey =:plakakodu ORDER BY ilce_title");
    $sorgu->execute(['plakakodu'=>htmlspecialchars($plakakodu)]);
    while($sonuc=$sorgu->fetch()){
        echo "<option value='".$sonuc['ilce_key']."'>".strtoupper_tr(strtolower($sonuc['ilce_title']))."</option>";
    }
}
else if($durum == "mahalle"){
    $ilcekodu = $_GET["ilcekodu"];
    $sorgu=$baglanti->prepare("SELECT mahalle_title, mahalle_key FROM mahalle WHERE mahalle_ilcekey =:ilcekodu GROUP BY mahalle_title ORDER BY mahalle_title");
    $sorgu->execute(['ilcekodu'=>htmlspecialchars($ilcekodu)]);
    while($sonuc=$sorgu->fetch()){
        echo "<option value='".$sonuc['mahalle_key']."'>".strtoupper_tr(strtolower($sonuc['mahalle_title']))."</option>";

    }
}
else{
    echo "yanlış yer";
}


?>