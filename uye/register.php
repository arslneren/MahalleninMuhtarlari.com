<?php
include ("../vt.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../mail_post/src/Exception.php';
require '../mail_post/src/PHPMailer.php';
require '../mail_post/src/SMTP.php';

if(isset($_POST)){
    $ad = $_POST["fullname"];
    $email = $_POST["email"];
    $sehir = $_POST["sehir"];
    $ilce = $_POST["ilce"];
    $mahalle = $_POST["mahalle"];
    $password = $_POST["password"];
    $agree = $_POST["agree"];
    if(isset($_POST["chkMevcut"])){
        $mevcut = 1;
    }
    else{
        $mevcut = 0;
    }

    if ($ad <> "" && $email <> "" && $sehir <> "" && $ilce <> "" && $mahalle <> "" && $password <> "" && $agree <> "") {

        $mailval = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';

        if (preg_match($mailval, $email) === 1) {
            $sorgu=$baglanti->prepare("SELECT id FROM muhtarlar where email =:mail");
            $sorgu->execute(['mail'=>htmlspecialchars($email)]);
            if ($sorgu->rowCount()  == 0) {
                $sorgu2=$baglanti->prepare("INSERT INTO muhtarlar (muhName, email, passw, mahalle_key, ilce_key, il_key, image, status) VALUES (:ad, :mail, :sifre, :mahalleId, :ilceId, :ilId, 'default.jpg', :stats)");
                $sorgu2->bindParam(':ad', $ad);
                $sorgu2->bindParam(':mail', $email);
                $sorgu2->bindParam(':sifre', $password);
                $sorgu2->bindParam(':mahalleId', $mahalle);
                $sorgu2->bindParam(':ilceId', $ilce);
                $sorgu2->bindParam(':ilId', $sehir);
                $sorgu2->bindParam(':stats', $mevcut);
                $sonuc2 = $sorgu2->execute();
                if ($sonuc2) {
                    $sorgu3 = $baglanti->prepare("SELECT id, email FROM muhtarlar WHERE email=:mail");
                    $sorgu3->execute(['mail' => $email]);
                    $sonuc3 = $sorgu3->fetch();
                    $getId = $sonuc3["id"];
                    if($sonuc3){
                        $sorgu4=$baglanti->prepare("INSERT INTO muhtar_detay (muhtarId, bigImg) VALUES (:gtId, 'default.jpg')");
                        $sorgu4->bindParam(':gtId', $getId);
                        $sonuc4 = $sorgu4->execute();
                        if($sonuc4){
                            echo "ok";
                            $cases = 'register';
                            $browser = $_SERVER['HTTP_USER_AGENT'];
                            $getIp = $_SERVER['REMOTE_ADDR'];
                            $sorgu5=$baglanti->prepare("INSERT INTO records (muhId, cases, ip, user_agent) VALUES (:gtId, :cases, :ip, :browser)");
                            $sorgu5->bindParam(':gtId', $getId);
                            $sorgu5->bindParam(':cases', $cases);
                            $sorgu5->bindParam(':ip', $getIp);
                            $sorgu5->bindParam(':browser', $browser);
                            $sonuc5 = $sorgu5->execute();
                            mailsender($ad, $email);
                        }
                        else{
                        }
                    }
                    else{
                    }
                } else {
                    echo "Hata oluştu";
                }
            } else {
                echo "1";
            }
        }
    }


}
else{
    echo "Hata oluştu.";
}

function mailsender($mad, $mmail){


    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = 0; // debug on - off
        $mail->isSMTP();
        $mail->Host = 'mail.mahalleninmuhtarlari.com'; // SMTP sunucusu örnek : mail.alanadi.com
        $mail->SMTPAuth = true; // SMTP Doğrulama
        $mail->Username = 'no-reply@mahalleninmuhtarlari.com'; // Mail kullanıcı adı
        $mail->Password = 'G_QGQe&nsR?c'; // Mail şifresi
        $mail->SMTPSecure = 'tls'; // Şifreleme
        $mail->Port = 587; // SMTP Port
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        //Alıcılar
        $mail->setfrom('no-reply@mahalleninmuhtarlari.com', 'Mahallenin Muhtarları Destek');
        $mail->addAddress("iletisim@mahalleninmuhtarlari.com");
        //$mail->addReplyTo($_POST['mail'], $_POST['name']);
        //İçerik
        $mail->isHTML(true);
        $mail->Subject = 'Yeni Üye '. $mad;
        $mail->Body = "Yeni üyemiz var.<br>İsim: ".$mad."<br>Mail Adresi:".$mmail;
        if($mail->send()){}
    } catch (Exception $e) {
        echo 'Mesajınız İletilemedi. Hata: ', $mail->ErrorInfo;
    }
}
