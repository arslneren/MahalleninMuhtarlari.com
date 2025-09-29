<?php
include("../vt.php");
header('Content-type: text/html; charset=utf-8');
$il = $_POST["il"];
$ilce = $_POST["ilce"];
$mahalle = $_POST["mahalle"];
$status = $_POST["status"];
if($il != "" || $ilce != "" || $mahalle != "" ) {
    if($status = "aday"){
        $sorgu = $baglanti->prepare("SELECT  m.id, m.muhName, m.mahalle_key, m.image, mh.mahalle_title, mh.mahalle_ilcekey, m.aktif  FROM muhtarlar m INNER JOIN mahalle mh WHERE m.mahalle_key =:mahkey AND mh.mahalle_key  =:mahkey2 and m.aktif = 1  and (m.status = 0 or m.status = 2) and m.shows = 1 order by m.id DESC");
    }
    else if($status = "mevcut"){
        $sorgu = $baglanti->prepare("SELECT  m.id, m.muhName, m.mahalle_key, m.image, mh.mahalle_title, mh.mahalle_ilcekey, m.aktif  FROM muhtarlar m INNER JOIN mahalle mh WHERE m.mahalle_key =:mahkey AND mh.mahalle_key  =:mahkey2 and m.aktif = 1  and (m.status = 1 or m.status = 2) and m.shows = 1 order by m.id DESC");
    }
    $sorgu->execute([
        'mahkey' => htmlspecialchars($mahalle),
        'mahkey2' => htmlspecialchars($mahalle),
    ]);
    $counter = 0;
    while ($sonuc = $sorgu->fetch()) {
        (int)$ilcekey = $sonuc["mahalle_ilcekey"];
        $sorgu2 = $baglanti->prepare("SELECT * FROM ilce WHERE ilce_key =:id");
        $sorgu2->execute(['id' => (int)$ilcekey]);
        $sonuc2 = $sorgu2->fetch();
        echo '<div class="persons">
                        <div class="personImg"><img src="assets/img/muhtar_image/min/'.$sonuc["image"].'"></div>
                        <span class="personName">'.$sonuc["muhName"].'</span>
                        <p class="pDetails">'.strtoupper_tr($sonuc2["ilce_title"]).', '.strtoupper_tr($sonuc["mahalle_title"]).' Mahallesi Muhtar Adayı</p>
                        <a href="./muhtar/'.$sonuc["id"].'/'.SEOLink($sonuc["muhName"]).'" class="detailsBtn">DETAYLI BİLGİ</a>
                    </div>';
        $counter++;
    }
    if($counter==0){
        echo "<center>içerik bulunamadı</center>";
    }
}

function SEOLink($baslik)
{
    $metin_aranan = array("ş", "Ş", "ı", "ü", "Ü", "ö", "Ö", "ç", "Ç", "ş", "Ş", "ı", "ğ", "Ğ", "İ", "ö", "Ö", "Ç", "ç", "ü", "Ü");
    $metin_yerine_gelecek = array("s", "S", "i", "u", "U", "o", "O", "c", "C", "s", "S", "i", "g", "G", "I", "o", "O", "C", "c", "u", "U");
    $baslik = str_replace($metin_aranan, $metin_yerine_gelecek, $baslik);
    $baslik = preg_replace("@[^a-z0-9\-_şıüğçİŞĞÜÇ]+@i", "-", $baslik);
    $baslik = strtolower($baslik);
    $baslik = preg_replace('/&.+?;/', '', $baslik);
    $baslik = preg_replace('|-+|', '-', $baslik);
    $baslik = preg_replace('/#/', '', $baslik);
    $baslik = str_replace('.', '', $baslik);
    $baslik = trim($baslik, '-');
    return $baslik;
}

function strtoupper_tr($data) {
    $k=array('ı','i','ş','ö','ğ','ç','ü');
    $b=array('I','İ','Ş','Ö','Ğ','Ç','Ü');
    $data=str_replace($b,$k,$data);
    $data = strtolower($data);
    return $data;
}

?>