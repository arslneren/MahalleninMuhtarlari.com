<?php
$page = 'home';
include("header.php");
?>
        <div class="homeSlide">
            <div class="mobSlide">
                <img src="assets/img/mobSlide.png" alt="Bir el var ve oy pusulasını sandığa atmakta">
            </div>
            <div class="content">
                <div class="bigText">
                    <h1>
                        Mahallenizin<br>muhtar adaylarını<br>
                        <span>tanıyor musunuz?</span>
                    </h1>
                    <div class="socials">
                        <a href="https://instagram.com/mahallemuhtarlarim" target="_blank"><img src="assets/img/instagram.png" alt="instagram logo"></a>
                        <a href="https://www.facebook.com/mahalleninmuhtarlari/" target="_blank"><img src="assets/img/facebook.png" alt="facebook logo"></a>
                        <a href="https://twitter.com/muhtaradayalari" target="_blank"><img src="assets/img/x.png" alt="x logo"></a>
                    </div>
                    <div class="mouseIcon">
                        <div class="icon-scroll"></div>
                        <span>Detaylı Bilgi İçin<br>Aşağı Kaydırın.</span>
                        <div class="clear"></div>
                    </div>

                </div>
                    <div class="clear"></div>
            </div>
            <div class="slideAnim">
                <div class="imgLayers">
                    <img src="assets/img/el.png" class="layer1">
                    <img src="assets/img/sandikLayer1.png" class="layer2 layerAnim">
                    <img src="assets/img/sandikLayer2.png" class="layer3 layerAnim">
                </div>
            </div>
        </div>
        <div class="mahSelector scrollby" id="mahSelector">
            <div class="content">
                <form id="selectorMah" action="#">
                    <span>Şehir seçiniz</span>
                    <select class="sehir" id="sehir" name="sehir">
                        <option value="">Şehir Seçiniz</option>
                        <option value="1">Adana</option>
                        <option value="2">Adıyaman</option>
                        <option value="3">Afyonkarahisar</option>
                        <option value="4">Ağrı</option>
                        <option value="68">Aksaray</option>
                        <option value="5">Amasya</option>
                        <option value="6">Ankara</option>
                        <option value="7">Antalya</option>
                        <option value="75">Ardahan</option>
                        <option value="8">Artvin</option>
                        <option value="9">Aydın</option>
                        <option value="10">Balıkesir</option>
                        <option value="74">Bartın</option>
                        <option value="72">Batman</option>
                        <option value="69">Bayburt</option>
                        <option value="11">Bilecik</option>
                        <option value="12">Bingöl</option>
                        <option value="13">Bitlis</option>
                        <option value="14">Bolu</option>
                        <option value="15">Burdur</option>
                        <option value="16">Bursa</option>
                        <option value="17">Çanakkale</option>
                        <option value="18">Çankırı</option>
                        <option value="19">Çorum</option>
                        <option value="20">Denizli</option>
                        <option value="21">Diyarbakır</option>
                        <option value="81">Düzce</option>
                        <option value="22">Edirne</option>
                        <option value="23">Elazığ</option>
                        <option value="24">Erzincan</option>
                        <option value="25">Erzurum</option>
                        <option value="26">Eskişehir</option>
                        <option value="27">Gaziantep</option>
                        <option value="28">Giresun</option>
                        <option value="29">Gümüşhane</option>
                        <option value="30">Hakkâri</option>
                        <option value="31">Hatay</option>
                        <option value="76">Iğdır</option>
                        <option value="32">Isparta</option>
                        <option value="34">İstanbul</option>
                        <option value="35">İzmir</option>
                        <option value="46">Kahramanmaraş</option>
                        <option value="78">Karabük</option>
                        <option value="70">Karaman</option>
                        <option value="36">Kars</option>
                        <option value="37">Kastamonu</option>
                        <option value="38">Kayseri</option>
                        <option value="71">Kırıkkale</option>
                        <option value="39">Kırklareli</option>
                        <option value="40">Kırşehir</option>
                        <option value="79">Kilis</option>
                        <option value="41">Kocaeli</option>
                        <option value="42">Konya</option>
                        <option value="43">Kütahya</option>
                        <option value="44">Malatya</option>
                        <option value="45">Manisa</option>
                        <option value="47">Mardin</option>
                        <option value="33">Mersin</option>
                        <option value="48">Muğla</option>
                        <option value="49">Muş</option>
                        <option value="50">Nevşehir</option>
                        <option value="51">Niğde</option>
                        <option value="52">Ordu</option>
                        <option value="80">Osmaniye</option>
                        <option value="53">Rize</option>
                        <option value="54">Sakarya</option>
                        <option value="55">Samsun</option>
                        <option value="56">Siirt</option>
                        <option value="57">Sinop</option>
                        <option value="58">Sivas</option>
                        <option value="63">Şanlıurfa</option>
                        <option value="73">Şırnak</option>
                        <option value="59">Tekirdağ</option>
                        <option value="60">Tokat</option>
                        <option value="61">Trabzon</option>
                        <option value="62">Tunceli</option>
                        <option value="64">Uşak</option>
                        <option value="65">Van</option>
                        <option value="77">Yalova</option>
                        <option value="66">Yozgat</option>
                        <option value="67">Zonguldak</option>
                        <!--<option value="1">Adana</option>
                        <option value="2">Adıyaman</option>
                        <option value="3">Afyonkarahisar</option>
                        <option value="4">Ağrı</option>
                        <option value="5">Amasya</option>
                        <option value="6">Ankara</option>
                        <option value="7">Antalya</option>
                        <option value="8">Artvin</option>
                        <option value="9">Aydın</option>
                        <option value="10">Balıkesir</option>
                        <option value="11">Bilecik</option>
                        <option value="12">Bingöl</option>
                        <option value="13">Bitlis</option>
                        <option value="14">Bolu</option>
                        <option value="15">Burdur</option>
                        <option value="16">Bursa</option>
                        <option value="17">Çanakkale</option>
                        <option value="18">Çankırı</option>
                        <option value="19">Çorum</option>
                        <option value="20">Denizli</option>
                        <option value="21">Diyarbakır</option>
                        <option value="22">Edirne</option>
                        <option value="23">Elazığ</option>
                        <option value="24">Erzincan</option>
                        <option value="25">Erzurum</option>
                        <option value="26">Eskişehir</option>
                        <option value="27">Gaziantep</option>
                        <option value="28">Giresun</option>
                        <option value="29">Gümüşhane</option>
                        <option value="30">Hakkâri</option>
                        <option value="31">Hatay</option>
                        <option value="32">Isparta</option>
                        <option value="33">Mersin</option>
                        <option value="34">İstanbul</option>
                        <option value="35">İzmir</option>
                        <option value="36">Kars</option>
                        <option value="37">Kastamonu</option>
                        <option value="38">Kayseri</option>
                        <option value="39">Kırklareli</option>
                        <option value="40">Kırşehir</option>
                        <option value="41">Kocaeli</option>
                        <option value="42">Konya</option>
                        <option value="43">Kütahya</option>
                        <option value="44">Malatya</option>
                        <option value="45">Manisa</option>
                        <option value="46">Kahramanmaraş</option>
                        <option value="47">Mardin</option>
                        <option value="48">Muğla</option>
                        <option value="49">Muş</option>
                        <option value="50">Nevşehir</option>
                        <option value="51">Niğde</option>
                        <option value="52">Ordu</option>
                        <option value="53">Rize</option>
                        <option value="54">Sakarya</option>
                        <option value="55">Samsun</option>
                        <option value="56">Siirt</option>
                        <option value="57">Sinop</option>
                        <option value="58">Sivas</option>
                        <option value="59">Tekirdağ</option>
                        <option value="60">Tokat</option>
                        <option value="61">Trabzon</option>
                        <option value="62">Tunceli</option>
                        <option value="63">Şanlıurfa</option>
                        <option value="64">Uşak</option>
                        <option value="65">Van</option>
                        <option value="66">Yozgat</option>
                        <option value="67">Zonguldak</option>
                        <option value="68">Aksaray</option>
                        <option value="69">Bayburt</option>
                        <option value="70">Karaman</option>
                        <option value="71">Kırıkkale</option>
                        <option value="72">Batman</option>
                        <option value="73">Şırnak</option>
                        <option value="74">Bartın</option>
                        <option value="75">Ardahan</option>
                        <option value="76">Iğdır</option>
                        <option value="77">Yalova</option>
                        <option value="78">Karabük</option>
                        <option value="79">Kilis</option>
                        <option value="80">Osmaniye</option>
                        <option value="81">Düzce</option>-->
                    </select>
                    <span>İlçe seçiniz</span>
                    <select name="ilce" id="ilce" class="ilce">
                        <option value="">İlçe Seçiniz</option>
                    </select>
                    <span>Mahalle seçiniz</span>
                    <select name="mahalle" id="mahalle" class="mahalle">
                        <option value="">Mahalle Seçiniz</option>
                    </select>
                    <input type="submit" value="Filtrele">
                </form>
                <div class="clear"></div>
            </div>
        </div>
        <div class="sliderArea">
            <div class="content">
                <h3>Muhitinizdeki Muhtar<br>Adaylarını Görüntüleyin.</h3>
                <div class="highlight">
                    <div>
                        <div class="persons">
                            <div class="personImg"><img src="assets/img/muhtar_image/min/eren-arslan_MIN20231018652fc3bd363c7.jpg"></div>
                            <span class="personName">Örnek Aday</span>
                            <p class="pDetails">Gaziosmanpaşa, Akşemseddin Mahallesi Muhtar Adayı</p>
                            <a href="muhtar/13/ornek-aday" class="detailsBtn">DETAYLI BİLGİ</a>
                        </div>
                    </div>
                    <div>
                        <div class="persons">
                            <div class="personImg"><img src="assets/img/muhtar_image/min/umit-dogan_MIN202401056597fc2c71fa4.jpg"></div>
                            <span class="personName">Ümit Doğan</span>
                            <p class="pDetails">Sultangazi, Gazi Mahallesi Muhtar Adayı</p>
                            <a href="muhtar/40/umit-dogan" class="detailsBtn">DETAYLI BİLGİ</a>
                        </div>
                    </div>
                    <div>
                        <div class="persons">
                            <div class="personImg"><img src="assets/img/slidePerson.jpg"></div>
                            <span class="personName">Serkan Beyatlı</span>
                            <p class="pDetails">Gaziosmanpaşa, Akşemseddin Mahallesi Muhtar Adayı</p>
                            <a href="#" class="detailsBtn">DETAYLI BİLGİ</a>
                        </div>
                    </div>
                    <div>
                        <div class="persons">
                            <div class="personImg"><img src="assets/img/muhtar_image/min/eren-arslan_MIN20231018652fc3bd363c7.jpg"></div>
                            <span class="personName">Örnek Aday</span>
                            <p class="pDetails">Gaziosmanpaşa, Akşemseddin Mahallesi Muhtar Adayı</p>
                            <a href="muhtar/13/ornek-aday" class="detailsBtn">DETAYLI BİLGİ</a>
                        </div>
                    </div>
                    <div>
                        <div class="persons">
                            <div class="personImg"><img src="assets/img/muhtar_image/min/umit-dogan_MIN202401056597fc2c71fa4.jpg"></div>
                            <span class="personName">Ümit Doğan</span>
                            <p class="pDetails">Sultangazi, Gazi Mahallesi Muhtar Adayı</p>
                            <a href="muhtar/40/umit-dogan" class="detailsBtn">DETAYLI BİLGİ</a>
                        </div>
                    </div>
                    <div>
                        <div class="persons">
                            <div class="personImg"><img src="assets/img/slidePerson.jpg"></div>
                            <span class="personName">Serkan Beyatlı</span>
                            <p class="pDetails">Gaziosmanpaşa, Akşemseddin Mahallesi Muhtar Adayı</p>
                            <a href="#" class="detailsBtn">DETAYLI BİLGİ</a>
                        </div>
                    </div>

                </div>
                <div class="slideAll">
                    <a href="muhtarlar">Tümünü Gör</a>
                </div>
            </div>
        </div>
        <div class="aboutSection">
            <div class="content">
                <div class="circle">
                    <div class="circleItem circleCocuk"><img src="assets/img/cocuk.png"></div>
                    <div class="circleItem circleAnne"><img src="assets/img/anne.png"></div>
                    <div class="circleItem circleDede"><img src="assets/img/dede.png"></div>
                    <div class="circleItem circleAdam"><img src="assets/img/adam.png"></div>
                    <div class="circleItem circleKadin"><img src="assets/img/kadin.png"></div>
                    <div class="innerCircle"></div>
                </div>
                <div class="aboutContent">
                    <h3>
                        <!--Muhtar adaylarının<br>
                        dijital mecralardaki<br>
                        sesi oluyoruz!-->
                        Muhtar Adaylarının Dijital Dünyadaki Güçlü Temsilcisiyiz!
                    </h3>
                    <p>
                        <!-- Adayların kendilerini tanıtıp, misyon ve
                        vizyonlarına dair halkı bilgilendirmesi için
                        aracı oluyoruz. -->
                        Mahallemizin temsilcileri olarak görev yapan muhtarlar, toplumumuzun günlük yaşamında kilit bir rol
                        oynarlar. "Mahallenin Muhtarları" aracığıyla, mahallenizdeki muhtarlarınızın kim olduklarını, neler başardıklarını ve
                        gelecekteki projelerini öğrenme fırsatınız olacak.
                    </p>
                    <a href="uyelik">Detaylı Bilgi</a>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="contact">
            <div class="content">
                <div class="formContent">
                    <h4>Bizimle<br>
                        İletişime Geçin!</h4>
                    <p>
                        İsteklerinizi, sorularınızı, görüşlerinizi ve önerilerinizi paylaşmak için bize her zaman ulaşabilirsiniz. Müşteri memnuniyeti bizim için önceliktir, geri bildiriminiz hizmet kalitemizi artırmamıza yardımcı olacaktır.
                    </p>
                    <div class="fcDetails"><span class="fcMail">iletisim@mahalleninmuhtarlari.com</span><div class="clear"></div></div>
                    <!--<div class="fcDetails"><span class="fcLoc">Güngören Mahallesi, Hürriyet Caddesi Muhtar Aday Ofisi</span><div class="clear"></div></div>-->
                    <div class="fcDetails"><span class="fcPhone">0552 179 14 63</span><div class="clear"></div></div>
                </div>
                <div class="formArea">
                    <form action="#" class="formAction">
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