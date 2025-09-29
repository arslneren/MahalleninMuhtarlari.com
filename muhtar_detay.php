<?php
$id = $_GET["id"];
$linkName = $_GET["title"];
if ( filter_var($id, FILTER_VALIDATE_INT) === false ) {
    header('Location: ../../muhtarlar');
}
if(!$id || !$_GET || !$linkName){
    header('Location: ../../muhtarlar');
}
$page = 'detail';
include("vt.php");

$sorguKontrol = $baglanti->prepare("SELECT muhName, shows FROM muhtarlar WHERE id =:muhId");
$sorguKontrol->execute(['muhId' => htmlspecialchars($id)]);
$sonucKontrol = $sorguKontrol->fetch();

$seoNameCheck = SEOLink($sonucKontrol["muhName"]);

if($seoNameCheck != $linkName || $sonucKontrol["shows"] != 1){
    header('Location: ../../');
}



$sorgu = $baglanti->prepare("SELECT muh.muhName, muh.image, md.bigImg, md.slogan, md.baslik1, md.kisaIcerik, md.baslik2, md.tamIcerik, muh.mahalle_key, muh.status FROM muhtarlar muh INNER JOIN	muhtar_detay md WHERE muh.id =:muhId AND md.muhtarId =:mdId");
$sorgu->execute(['muhId' => htmlspecialchars($id),'mdId' => htmlspecialchars($id)]);
$sonuc = $sorgu->fetch();

$mahkey = $sonuc["mahalle_key"];
$sorgu2 = $baglanti->prepare("SELECT mahalle_title FROM mahalle WHERE mahalle_key=:mahkey");
$sorgu2->execute(['mahkey' => $mahkey]);
$sonuc2 = $sorgu2->fetch();



$urlId = $id;
$urlKey = SEOLink($sonuc["muhName"]);
$title = "<title>".$sonuc["muhName"]." | Mahallenin Muhtarları</title><link rel='canonical' href='https://mahalleninmuhtarlari.com/muhtar/".$id."/".$urlKey."'/><meta property='og:image' content='https://mahalleninmuhtarlari.com/assets/img/muhtar_image/min/".$sonuc["image"]."'><meta name='description' content=\"".$sonuc["slogan"].". ".strtoupper_tr($sonuc2["mahalle_title"])." Muhtar Adayı\"><meta name='og:description' content='".$sonuc["slogan"].". ".strtoupper_tr($sonuc2["mahalle_title"])." Muhtar Adayı'><meta property='og:title' content='".$sonuc["muhName"]." | Mahallenin Muhtarları'>";
include("header.php");


?>
    <div class="homeSlide sloganSlide">
        <div class="content">
            <div class="bigText">
                <h1>
                    <?php echo $sonuc["slogan"]; ?><br>
                    <span>-<?php echo $sonuc["muhName"]; ?></span>
                </h1>
                <div class="mouseIcon">
                    <div class="icon-scroll"></div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="muhtarDetail scrollby">
        <div class="content">
            <div class="shortBlog">
                <div class="imgArea">
                    <img src="assets/img/muhtar_image/<?php echo $sonuc["bigImg"]; ?>" alt="<?php echo $sonuc["muhName"]; ?> Fotoğrafı">
                </div>
                <div class="shortContent">
                    <h2><?php echo $sonuc["baslik1"]; ?></h2>
                    <?php echo $sonuc["kisaIcerik"]; ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>

<?php
$sorguSocials = $baglanti->prepare("SELECT facebook, instagram, x FROM sociallinks WHERE muhId =:muhId");
$sorguSocials->execute(['muhId' => htmlspecialchars($id)]);
$sonucSocials = $sorguSocials->fetch();
if((isset($sonucSocials["facebook"]) && $sonucSocials["facebook"] != NULL ) || (isset($sonucSocials["instagram"]) && $sonucSocials["instagram"] != NULL ) || (isset($sonucSocials["x"]) && $sonucSocials["x"] != NULL )){
?>

    <div class="personSocials">
        <?php if($sonucSocials["facebook"] != NULL){?><a href="<?php echo $sonucSocials["facebook"]?>" target="_blank"><img src="assets/img/personFB.png" alt="Facebook"></a><?php } ?>
        <?php if($sonucSocials["instagram"] != NULL){?><a href="<?php echo $sonucSocials["instagram"]?>" target="_blank"><img src="assets/img/personIG.png" alt="Instagram"></a><?php } ?>
        <?php if($sonucSocials["x"] != NULL){?><a href="<?php echo $sonucSocials["x"]?>" target="_blank"><img src="assets/img/personX.png" alt="X"></a><?php } ?>
    </div>
<?php
}
$sorgu7 = $baglanti->prepare("SELECT isHayati, egitimHayati, iletisimBilgileri FROM muhtar_detay WHERE muhtarId =:muhId");
$sorgu7->execute(['muhId' => htmlspecialchars($id)]);
$sonuc7 = $sorgu7->fetch();
if($sonuc7["isHayati"] == 1 || $sonuc7["egitimHayati"] == 1 || $sonuc7["iletisimBilgileri"] == 1){
?>
    <div class="personDetailsSection">
        <div class="content">
            <?php
            $sorgu2 = $baglanti->prepare("SELECT egitimHayati FROM muhtar_detay WHERE egitimHayati = 1 AND muhtarID =:muhId");
            $sorgu2->execute(['muhId' => htmlspecialchars($id)]);
            $sonuc2 = $sorgu2->fetch();
            if($sonuc2["egitimHayati"] == 1){
            ?>
            <div class="personEducation">
                <h3><img src="assets/img/sertifika.svg" alt="Sertifika">Eğitim Hayatı <div class="clear"></div></h3>
                <ul>
                    <?php
                    $sorgu3 = $baglanti->prepare("SELECT baslik, icerik FROM egitimhayati WHERE muhID =:muhId");
                    $sorgu3->execute(['muhId' => htmlspecialchars($id)]);
                    while ($sonuc3 = $sorgu3->fetch()){
                    ?>
                    <li><?php echo $sonuc3["baslik"]; if($sonuc3["icerik"]){ ?> <span>/ <?php echo $sonuc3["icerik"]; ?></span><?php } ?></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <?php
            }
            ?>
            <?php
            $sorgu4 = $baglanti->prepare("SELECT isHayati FROM muhtar_detay WHERE ishayati = 1 AND muhtarID =:muhId");
            $sorgu4->execute(['muhId' => htmlspecialchars($id)]);
            $sonuc4 = $sorgu4->fetch();
            if($sonuc4["isHayati"] == 1){
                ?>
                <div class="personEducation">
                    <h3><img src="assets/img/is-hayati.svg" alt="İş Hayatı">İş Tecrübeleri <div class="clear"></div></h3>
                    <ul>
                        <?php
                        $sorgu5 = $baglanti->prepare("SELECT baslik, icerik FROM ishayati WHERE muhID =:muhId");
                        $sorgu5->execute(['muhId' => htmlspecialchars($id)]);
                        while ($sonuc5 = $sorgu5->fetch()){
                            ?>
                            <li><?php echo $sonuc5["baslik"]; if($sonuc5["icerik"]){ ?> <span>/ <?php echo $sonuc5["icerik"]; ?></span><?php } ?></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <?php
            }
            ?>
            <?php
            $sorgu6 = $baglanti->prepare("SELECT iletisimBilgileri FROM muhtar_detay WHERE iletisimBilgileri = 1 AND muhtarID =:muhId");
            $sorgu6->execute(['muhId' => htmlspecialchars($id)]);
            $sonuc6 = $sorgu6->fetch();
            if($sonuc6["iletisimBilgileri"] == 1){
                ?>
                <div class="personEducation">
                    <h3><img src="assets/img/iletisim.svg" alt="Sertifika">İletişim Bilgileri <div class="clear"></div></h3>
                    <ul>
                        <?php
                        $sorgu6 = $baglanti->prepare("SELECT baslik, icerik FROM iletisimbilgileri WHERE muhID =:muhId");
                        $sorgu6->execute(['muhId' => htmlspecialchars($id)]);
                        while ($sonuc6 = $sorgu6->fetch()){
                            ?>
                            <li><?php echo $sonuc6["baslik"]; if($sonuc6["icerik"]){ ?> <span> <?php echo $sonuc6["icerik"]; ?></span><?php } ?></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
<?php
    }
if($sonuc["status"] != 1){
?>
    <div class="muhtarDetail">
        <div class="content">
            <div class="bigBlog">
                <h3><?php echo $sonuc["baslik2"]; ?></h3>
                <?php echo $sonuc["tamIcerik"]; ?>
            </div>
        </div>
    </div>
<?php
}
include("footer.php");
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