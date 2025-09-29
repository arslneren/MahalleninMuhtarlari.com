<?php

include("class.phpmailer.php");
$isim          = $_POST['isim'];
$tel             = $_POST['tel'];
$email        = $_POST['email'];
$konu         = $_POST['konu'];
$mesaj1     = $_POST['mesaj'];
$durum      = kontroller();
$kime         = 'merhaba@lorn.com.tr';
$mesaj       = "İsim : ".$isim."\n"."Telefon : ".$tel."\n"."Mail : ".$email."\n"."konu : ".$konu."\n"."Mesaj : ".$mesaj1."\n";

function reCaptchaControl($captcha){
  $fields = [
          'secret' => 'GOOGLE_RECAPTCHA_SECRET_KEYINIZ',
          'response' => $captcha
        ];
        $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
        curl_setopt_array($ch,[
           CURLOPT_POST => true,
           CURLOPT_POSTFIELDS => http_build_query($fields),
            CURLOPT_RETURNTRANSFER => true
        ]);

        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result,true);
}

if($durum =="Gönderildi")
{
  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPDebug = 1; // Hata ayıklama değişkeni: 1 = hata ve mesaj gösterir, 2 = sadece mesaj gösterir
  $mail->SMTPAuth = true; //SMTP doğrulama olmalı ve bu değer değişmemeli
  $mail->SMTPSecure = 'tls'; // Normal bağlantı için boş bırakın veya tls yazın, güvenli bağlantı kullanmak için ssl yazın
  $mail->Host = "smtp.gmail.com"; // Mail sunucusunun adresi (IP de olabilir)
  $mail->Port = 587; // Normal bağlantı için 587, güvenli bağlantı için 465 yazın
  $mail->IsHTML(true);
  //$mail->SetLanguage("tr", "phpmailer/language");
  $mail->CharSet  ="utf-8";
  $mail->Username = "merhabalorn@gmail.com"; // Gönderici adresiniz (e-posta adresiniz)
  $mail->Password = "cuxpjnkavrujhuqt"; // Mail adresimizin sifresi
  $mail->addAddress('merhaba@lorn.com.tr');
  $mail->SetFrom("merhabalorn@gmail.com", "Lörn Destek"); // Mail atıldığında gorulecek isim ve email
  //$mail->AddAddress(""); // Mailin gönderileceği alıcı adres
  $mail->Subject = 'Siteden Mesaj Var!'; // Email konu başlığı
  $mail->Body =  $mesaj; // Mailin içeriği
  if(!$mail->Send()){
    echo "Formunuz Gönderilemedi!";
  } else {
    echo "1";
  }
}else{
  echo $durum;
}

function kontroller()
{
  if (empty($_POST['isim']) || empty($_POST['email']) || empty($_POST['konu']) || empty($_POST['mesaj']))
  {
    return "Sanırım bir şeyleri unuttunuz!";
  }
  $isim = test_input($isim);
  //$tel = test_input($isim);
  $email = test_input($email);
  $konu = test_input($konu);
  $mesaj1 = test_input($mesaj1);
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    return "Lütfen Geçerli Bir Mail Adresi Giriniz";
  }
  if (isset($_POST['g-recaptcha-response'])) {
    $captcha = $_POST['g-recaptcha-response'];
}
if (!$captcha) {
    echo 'Lütfen robot olmadığınızı doğrulayın.';
    exit;
}
  return "Gönderildi";
}

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


//ma_il("info@arnoma.com.tr" , "Siteden Gelen İletişim Mesajı", "deneme mesajı");
?>