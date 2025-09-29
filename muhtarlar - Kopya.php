<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$page = 'muhtarlar';
include("header.php");
include("adres/vt.php");

if($_GET){
    $il = $_GET["il"];
    $ilce = $_GET["ilce"];
    $mahalle = $_GET["mahalle"];
}
?>
    <div class="homeSlide sloganSlide">
        <div class="content">
            <div class="bigText">
                <h1>
                    Muhitinizdeki<br>adayları görmek için<br>
                    <span>mahallenizi seçin.</span>
                </h1>
                <div class="mouseIcon">
                    <div class="icon-scroll"></div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="mahSelector scrollby" id="mahSelector">
        <div class="content">
            <form id="selectorMuh">
                <span>Şehir seçiniz</span>
                <select class="sehir" id="sehir" name="sehir">
                    <option value="">Şehir Seçiniz</option>
                    <?php
                    $sorgu3=$baglanti->prepare("SELECT sehir_title, sehir_key FROM sehir");
                    $sorgu3->execute();
                    while($sonuc3=$sorgu3->fetch()){
                        if($_GET){
                            if($sonuc3['sehir_key'] == $il){
                                echo "<option value='{$sonuc3['sehir_key']}' selected>".strtoupper_tr($sonuc3['sehir_title'])."</option>";
                            }
                            else{
                                echo "<option value='{$sonuc3['sehir_key']}'>".strtoupper_tr($sonuc3['sehir_title'])."</option>";
                            }
                        }
                        else{
                            echo "<option value='{$sonuc3['sehir_key']}'>".strtoupper_tr($sonuc3['sehir_title'])."</option>";
                        }
                    }

                    ?>
                </select>
                <span>İlçe seçiniz</span>
                <select name="ilce" id="ilce" class="ilce">
                    <option>İlçe Seçiniz</option>
                    <?php if($_GET){
                        $sorgu=$baglanti->prepare("SELECT ilce_title, ilce_key FROM ilce where ilce_sehirkey =:plakakodu");
                        $sorgu->execute(['plakakodu'=>htmlspecialchars($il)]);
                        while($sonuc=$sorgu->fetch()){
                            if($sonuc['ilce_key'] == $ilce){
                                echo "<option value='{$sonuc['ilce_key']}' selected>".strtoupper_tr($sonuc['ilce_title'])."</option>";
                            }
                            else{
                                echo "<option value='{$sonuc['ilce_key']}'>".strtoupper_tr($sonuc['ilce_title'])."</option>";
                            }
                        }
                    }

                    ?>
                </select>
                <span>Mahalle seçiniz</span>
                <select name="mahalle" id="mahalle" class="mahalle">
                    <option>Mahalle Seçiniz</option>
                    <?php if($_GET) {
                        $sorgu2 = $baglanti->prepare("SELECT mahalle_title, mahalle_key FROM mahalle WHERE mahalle_ilcekey =:ilcekodu");
                        $sorgu2->execute(['ilcekodu' => htmlspecialchars($ilce)]);
                        while ($sonuc2 = $sorgu2->fetch()) {
                            if ($sonuc2['mahalle_key'] == $mahalle) {
                                echo "<option value='{$sonuc2['mahalle_key']}' selected>".strtoupper_tr($sonuc2['mahalle_title'])."</option>";
                            } else {
                                echo "<option value='{$sonuc2['mahalle_key']}'>".strtoupper_tr($sonuc2['mahalle_title'])."</option>";
                            }
                        }
                    }
                    ?>
                </select>
                <input type="submit" value="Filtrele">
            </form>
            <div class="clear"></div>
        </div>
    </div>

    <div class="allMuhtar">
        <div class="content">
            <div class="loading">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;display:block;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                    <circle cx="50" cy="50" fill="none" stroke="#e15b64" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                    </circle>
                </svg>
            </div>
            <h3>Filtreleme sonrası<br>
                adaylar aşağıda yer almaktadır.</h3>
            <div class="muhtarArea">
                <?php
                if($il != "" || $ilce != "" || $mahalle != "" ) {
                    $sorgu4 = $baglanti->prepare("SELECT  m.id, m.muhName, m.mahalle_key, m.image, mh.mahalle_title, mh.mahalle_ilcekey, m.aktif  FROM muhtarlar m INNER JOIN mahalle mh WHERE m.mahalle_key =:mahkey AND mh.mahalle_key =:mahkey2 and m.aktif =1 ORDER BY m.id DESC");
                    $sorgu4->execute([
                        'mahkey' => htmlspecialchars($mahalle),
                        'mahkey2' => htmlspecialchars($mahalle),
                        ]);
                    $counter = 0;

                    while ($sonuc4 = $sorgu4->fetch()) {
                        $sorgu5 = $baglanti->prepare("SELECT * FROM ilce WHERE ilce_key =:ilcekod");
                        $sorgu5->execute(['ilcekod' => htmlspecialchars($sonuc4["mahalle_ilcekey"])]);
                        $sonuc5 = $sorgu5->fetch()
                        ?>
                        <div class="persons">
                            <div class="personImg"><img src="assets/img/muhtar_image/min/<?php echo $sonuc4["image"]; ?>"></div>
                            <span class="personName"><?php echo $sonuc4["muhName"]; ?></span>
                            <p class="pDetails"><?php echo strtoupper_tr($sonuc5["ilce_title"]) ?>, <?php echo strtoupper_tr($sonuc4["mahalle_title"]) ?> Mahallesi Muhtar Adayı</p>
                            <a href="./muhtar/<?php echo $sonuc4["id"]."/".SEOLink($sonuc4["muhName"]); ?>" class="detailsBtn">DETAYLI BİLGİ</a>
                        </div>
                        <?php
                        $counter++;
                    }
                    if($counter==0){
                        echo "<center>Filtreleme sonrası içerik bulunamadı</center>";
                    }
                } /* SELECT mh.name, mh.image, mh.mahalle_key, m.mahalle_ilcekey FROM muhtarlar mh INNER join mahalle m WHERE mh.mahalle_key = m.mahalle_key*/
                else{
                    $sorgu5 = $baglanti->prepare("SELECT m.id, m.muhName, m.image, mh.mahalle_title, mh.mahalle_ilcekey FROM muhtarlar m INNER JOIN mahalle mh WHERE m.mahalle_key = mh.mahalle_key AND m.aktif = 1 ORDER BY m.id DESC");
                    $sorgu5->execute();
                    while ($sonuc5 = $sorgu5->fetch()) {
                        $sorgu6 = $baglanti->prepare("SELECT ilce_title FROM ilce WHERE ilce_key =:ilcekod");
                        $sorgu6->execute(['ilcekod' => htmlspecialchars($sonuc5["mahalle_ilcekey"])]);
                        $sonuc6 = $sorgu6->fetch()
                        ?>
                        <div class="persons">
                            <div class="personImg"><img src="assets/img/muhtar_image/min/<?php echo $sonuc5["image"]; ?>"></div>
                            <span class="personName"><?php echo $sonuc5["muhName"]; ?></span>
                            <p class="pDetails"><?php echo strtoupper_tr($sonuc6["ilce_title"]); ?>, <?php echo strtoupper_tr($sonuc5["mahalle_title"]); ?> Mahallesi Muhtar Adayı</p>
                            <a href="./muhtar/<?php echo $sonuc5["id"]."/".SEOLink($sonuc5["muhName"]); ?>" class="detailsBtn">DETAYLI BİLGİ</a>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
<?php
include("footer.php");
?>

<?php
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

?>