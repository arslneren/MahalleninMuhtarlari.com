<?php
session_start();
if (!(isset($_SESSION["oturum"]) && $_SESSION["oturum"]=="6789")){
    header("location:login.php");
}
include ("inc/vt.php");
include 'inc/ImageResize.php';
$imgKontrol = $baglanti->prepare("SELECT mh.image, md.bigImg FROM muhtarlar mh INNER JOIN muhtar_detay md WHERE mh.id = md.muhtarId and mh.id =:muhID AND md.muhtarId =:muhID2");
$imgKontrol->execute(['muhID' => $_SESSION["muhId"],'muhID2' => $_SESSION["muhId"]]);
$imgSonuc = $imgKontrol->fetch();
$kucuk = $imgSonuc["image"];
$buyuk = $imgSonuc["bigImg"];


use \Gumlet\ImageResize;
$path = '../assets/img/muhtar_image/';
$path2 = '../assets/img/muhtar_image/min/';

$file = $_FILES['imgUp']['tmp_name'];
$new_image_name = SEOLink($_SESSION["muhName"]).'_UIMG'.date('Ymd').uniqid().'.jpg';
$new_image_name2 = SEOLink($_SESSION["muhName"]).'_MIN'.date('Ymd').uniqid().'.jpg';
$image2 = new ImageResize($file);
$image2->resizeToWidth(750);
if($image2->save($path.$new_image_name)){
    $image = new ImageResize($path.$new_image_name);
    $image->resizeToWidth(350);
    if($image->save($path2.$new_image_name2)){
        $sorgu=$baglanti->prepare("UPDATE muhtar_detay SET bigImg=:newimg WHERE muhtarId =:muhId");
        $sorgu->bindParam(':newimg', $new_image_name);
        $sorgu->bindParam(':muhId', $_SESSION["muhId"]);
        $sorgu2=$baglanti->prepare("UPDATE muhtarlar SET image=:newimg WHERE id =:muhId");
        $sorgu2->bindParam(':newimg', $new_image_name2);
        $sorgu2->bindParam(':muhId', $_SESSION["muhId"]);
        if($sorgu->execute() && $sorgu2->execute()){
            if($kucuk != "default.jpg" && $buyuk != "default.jpg") {
                unlink($path . DIRECTORY_SEPARATOR . $buyuk);
                unlink($path2 . DIRECTORY_SEPARATOR . $kucuk);
            }
            echo json_encode(['status'=>1, 'msg'=>'success', 'name'=>$new_image_name]);
        }
        else{
            echo json_encode(['status'=>0, 'msg'=>'failed']);
        }
    }
    else{
        echo json_encode(['status'=>0, 'msg'=>'failed']);
    }

}else{
    echo json_encode(['status'=>0, 'msg'=>'failed']);
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

?>
