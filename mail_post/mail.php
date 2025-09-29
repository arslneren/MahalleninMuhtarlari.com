<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$isim  = $_POST['names'];
$email = $_POST['mails'];
$mesaj = $_POST['messages'];
$durum = kontroller();
$mesaj = "İsim : ".$isim."<br>Mail : ".$email."<br>Mesaj : ".$mesaj;

if($durum =="ok"){
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = 0; // debug on - off
        $mail->isSMTP();
        $mail->Host = ''; // SMTP sunucusu örnek : mail.alanadi.com
        $mail->SMTPAuth = true; // SMTP Doğrulama
        $mail->Username = ''; // Mail kullanıcı adı
        $mail->Password = ''; // Mail şifresi
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
        //İçerik
        $mail->isHTML(true);
        $mail->Subject = 'Siteden Mesaj Var!';
        $mail->Body = $mesaj;

        $mail->send();
        echo "ok";
    } catch (Exception $e) {
        echo 'Mesajınız İletilemedi. Hata: ', $mail->ErrorInfo;
    }
}

function kontroller(){
    if (empty($_POST['names']) || empty($_POST['mails']) || empty($_POST['messages']))
    {
        return "Sanırım bir şeyleri unuttunuz!";
    }
    if (!filter_var($_POST['mails'], FILTER_VALIDATE_EMAIL)) {
        return "Lütfen Geçerli Bir Mail Adresi Giriniz";
    }
    return "ok";
}

?>
