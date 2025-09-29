<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
$page = 'iletisim';
include("header.php");
?>
    <div class="homeSlide sloganSlide">
        <div class="content">
            <div class="bigText">
                <h1>
                    İstek, öneri ve <br>aklınıza takılan her şey için<br>
                    <span>bize ulaşın!</span>
                </h1>
                <div class="mouseIcon">
                    <div class="icon-scroll"></div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="contact scrollby">
        <div class="content">
            <div class="formContent">
                <h4>Bizimle<br>
                    İletişime Geçin!</h4>
                <p>
                    <!--İstek, soru, görüş ve önerilerinizi
                    bildirmek için lütfen bize ulaşın. -->
                    Sizi dinlemek bizim için değerli! İsteklerinizi, sorularınızı, görüşlerinizi ve önerilerinizi bizimle paylaşabilirsiniz. Size ulaşmak ve iş birliği yapmak için sabırsızlanıyoruz.
                </p>
                <div class="fcDetails"><span class="fcMail">iletisim@mahalleninmuhtarlari.com</span><div class="clear"></div></div>
                <!--<div class="fcDetails"><span class="fcLoc">Güngören Mahallesi, Hürriyet Caddesi Muhtar Aday Ofisi</span><div class="clear"></div></div>-->
                <div class="fcDetails"><span class="fcPhone">0552 179 14 63</span><div class="clear"></div></div>
            </div>
            <div class="formArea">
                <form action="mail_post/mail.php" class="formAction">
                    <input type="text" name="names" id="names" placeholder="İsim ve Soyisim">
                    <input type="text" name="mails" id="mails" placeholder="E-Mail">
                    <textarea name="messages" id="messages" placeholder="Mesaj"></textarea>
                    <span class="errorShow">Lütfen gerekli alanları doldurun.</span>
                    <span class="errorShowImp">Bir hata oluştu.</span>
                    <span class="sucShow">Form başarıyla gönderildi.</span>
                    <input class="formBtn" type="submit" value="GÖNDER">
                </form>
            </div>
            <div class="clear"></div>
        </div>
    </div>

<?php
include("footer.php");
?>