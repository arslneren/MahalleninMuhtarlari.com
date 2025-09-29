<?php
session_start();
include("inc/vt.php");

if (isset($_SESSION["oturum"]) && $_SESSION["oturum"]=="6789"){
    header("location:home");
}
else if(isset($_COOKIE["çerez"])){
    $sorgu=$baglanti->prepare("SELECT email, muhName, id FROM muhtarlar");
    $sorgu->execute();
    while ( $sonuc=$sorgu->fetch()){
        $email = $sonuc["email"];
        if($_COOKIE["çerez"] == md5("aa".$email."bb")){
            $_SESSION["oturum"] ="6789";
            $_SESSION["email"] = $sonuc["email"];
            $_SESSION["muhName"] = $sonuc["muhName"];
            $_SESSION["muhId"] = $sonuc["id"];
            header("location:home");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="tr" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			Mahallenin Muhtarları | Üye Girişi
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
		<!--begin::Base Styles -->
		<link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
        <style>
            select, option{
                text-transform: capitalize;
            }
            .modal-body h3{
                font-size: 16px;
                text-decoration: underline;
                padding: 10px 0;
            }

            .modal-body p{
                font-size: 14px;
                line-height: 30px;
            }
        </style>
	</head>
	<!-- end::Head -->
	<!-- end::Body -->
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile 		m-login m-login--1 m-login--singin" id="m_login">
				<div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
					<div class="m-stack m-stack--hor m-stack--desktop">
						<div class="m-stack__item m-stack__item--fluid">
							<div class="m-login__wrapper">
								<div class="m-login__logo">
									<a href="#">
										<img src="assets/app/media/img//logos/logo.png" width="100%">
									</a>
								</div>
								<div class="m-login__signin">
									<div class="m-login__head">
										<h3 class="m-login__title">
											Üye Girişi
										</h3>
									</div>
									<form class="m-login__form m-form" action="">
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="text" placeholder="E-posta" name="email" autocomplete="off">
										</div>
										<div class="form-group m-form__group">
											<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Şifre" name="password">
										</div>
										<div class="row m-login__form-sub">
											<div class="col m--align-left">
												<label class="m-checkbox m-checkbox--focus">
													<input type="checkbox" name="remember">
													Beni hatırla
													<span></span>
												</label>
											</div>
											<div class="col m--align-right">
												<a href="javascript:;" id="m_login_forget_password" class="m-link">
													Şifreni mi unuttun?
												</a>
											</div>
										</div>
										<div class="m-login__form-action">
											<button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air 	btn-danger">
												Giriş Yap
											</button>
										</div>
									</form>
								</div>
								<div class="m-login__signup">
									<div class="m-login__head">
										<h3 class="m-login__title">
											Kayıt Ol
										</h3>
										<div class="m-login__desc">
                                            Hesabınızı oluşturmak için bilgilerinizi girin:
										</div>
									</div>
									<form class="m-login__form m-form" action="">
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="text" placeholder="Ad Soyad" name="fullname">
										</div>
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="text" placeholder="E-posta" name="email" autocomplete="off">
										</div>
                                        <div class="form-group m-form__group">
                                            <select class="form-control m-input sehir" id="sehir" name="sehir" style="height: auto;">
                                                <option value="">Şehir Seçiniz</option>
                                                <option value="1">Adana</option>
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
                                                <option value="81">Düzce</option>
                                            </select>
                                        </div>
                                        <div class="form-group m-form__group">
                                            <select class="form-control m-input ilce" id="ilce" name="ilce" style="height: auto;">
                                                <option value="">İlçe Seçiniz</option>
                                            </select>
                                        </div>
                                        <div class="form-group m-form__group">
                                            <select class="form-control m-input mahalle" id="mahalle" name="mahalle" style="height: auto;">
                                                <option value="">Mahalle Seçiniz</option>
                                            </select>
                                        </div>
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="password" placeholder="Şifre" name="password">
										</div>
										<div class="form-group m-form__group">
											<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Şifre doğrulayın" name="rpassword">
										</div>
                                        <div class="form-group m-form__group">
                                            <div class="m--align-left">
                                                <label class="m-checkbox m-checkbox--focus">
                                                    <input type="checkbox" name="chkMevcut">
                                                    Mevcut bir muhtar mısınız?
                                                    <span></span>
                                                </label>
                                                <span class="m-form__help"></span>
                                            </div>
                                        </div>
										<div class="row form-group m-form__group m-login__form-sub">
											<div class="col m--align-left">
												<label class="m-checkbox m-checkbox--focus">
													<input type="checkbox" name="agree">
													<a href="#" class="m-link m-link--focus sartLink" data-target="#m_modal_2">
														Şartları ve koşulları
													</a>
													kabul ediyorum.
													<span></span>
												</label>
												<span class="m-form__help"></span>
											</div>
										</div>
										<div class="m-login__form-action">
											<button id="m_login_signup_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air 	btn-danger">
												Kayıt ol
											</button>
											<button id="m_login_signup_cancel" class="btn btn-outline-focus  m-btn m-btn--pill m-btn--custom">
												İptal
											</button>
										</div>
									</form>
								</div>
								<div class="m-login__forget-password">
									<div class="m-login__head">
										<h3 class="m-login__title">
											Şifreni mi unuttun ?
										</h3>
										<div class="m-login__desc">
											Lütfen bizimle iletişime geç
										</div>
									</div>
									<form class="m-login__form m-form" action="" style="display: none">
										<div class="form-group m-form__group">
											<input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
										</div>
										<div class="m-login__form-action">
											<button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
												Request
											</button>
											<button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom">
												Cancel
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="m-stack__item m-stack__item--center">
							<div class="m-login__account">
								<span class="m-login__account-msg">
									Henüz bir hesabınız yok mu?
								</span>
								&nbsp;&nbsp;
								<a href="javascript:;" id="m_login_signup" class="m-link m-link--focus m-login__account-link m--font-danger">
									Kayıt Ol
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content" style="background-image: url(assets/app/media/img//bg/bg-4.jpg)">
					<div class="m-grid__item m-grid__item--middle">
						<h3 class="m-login__welcome">
                            Aramıza Katılın
						</h3>
						<p class="m-login__msg">
                            Mahallenin Lideri Olmak İçin İlk Adımı At!<br>Kaydını Yap, Değişimin Yönünü Sen Belirle!
						</p>
					</div>
				</div>
			</div>
		</div>
        <div class="modal fade" id="m_modal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">
                            Şartlar Ve Koşullar
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>1-Web sitesi sahibi, Sunulan ürünler ve Hizmetler, ve Şartların bağlayıcılığı </h3>
                        <p>Bu web sitesi, aynı zamanda sitenin sahibi olan [web sitenizin işleticisinin adı] tarafından işletilmektedir. Bu Şartlar, tarafımızca sunulan web sitemizin ve hizmetlerimizin kullanımına dair şartları ve koşulları belirler. Bu web sitesi ziyaretçilere [web sitenizde sunulanların açıklaması] sunar. Web sitemize erişim sağlayarak veya kullanarak bu Şartları okuduğunuzu, anladığınızı ve bunlara bağlı kalmayı kabul ettiğinizi onaylamış olursunuz. </p>
                        <h3>2-Web sitemizi kimler kullanabilir; kullanıcı hesabı oluşturmak için neler gerekir? </h3>
                        <p>Web sitemizi kullanmak ve/veya hizmetlerimizden yararlanmak için en az [sayı ekleyin] veya bulunduğunuz yönetim bölgesindeki yasal reşit olma yaşında olmanız ve bağlayıcı bir sözleşme olan bu Şartların tarafı olabilecek yasal yetki, hak ve özgürlüğe sahip olmanız gerekir. Bu web sitesini kullanmanız ve/veya hizmet almanız ülkenizde yasaklanmışsa veya yürürlükteki herhangi bir yasal düzenleme size bu izni vermiyorsa, web sitenizi kullanamaz ve/veya hizmet alamazsınız</p>
                        <h3>3-Müşterilere sunulan temel ticari Şartlar </h3>
                        <p>Bir ürün/hizmet satın alırken şunları kabul edersiniz: satın alma taahhüdünde bulunmadan önce tüm ürün/hizmet listesini okumakla yükümlüsünüz; bir ürünü/hizmeti satın almayı taahhüt ettiğinizde ve ödeme sürecini tamamladığınızda, ürün/hizmet satışına dair yasal olarak bağlayıcı bir sözleşmeye tabi olursunuz. Ürünlerimiz/hizmetlerimiz için talep ettiğimiz fiyatlar web sitesinde listelenmiştir. Sergilenen ürünler/hizmetler için fiyatlarımızı herhangi bir zamanda değiştirme ve sehven oluşabilecek fiyat hatalarını düzeltme hakkımız saklıdır. Fiyatlar ve satış vergileri hakkında ek bilgi ödemeler sayfasında mevcuttur. Hizmetler ve hizmet kullanımınızla bağlantılı olarak karşılaşabileceğiniz vergiler ve olası işlem ücretleri gibi diğer ücretler, ödeme yönteminizden aylık bazda tahsil edilecektir. </p>
                        <h3>4-Ürün ve para iade politikası</h3>
                        <p> Herhangi bir kullanım sağlanmamış reklam yapılmamış, satın alma tarihinden itibaren 14 gün içinde, ne zaman üyelik oluşturduğunuza dair belgeyi ibraz ederek iade etmeniz yeterlidir; ürünü değiştiririz veya satın alırken kullanıldığınız ödeme yöntemiyle para iadesi teklif ederiz. Bununla birlikte, Ürünler yalnızca satın alındıkları ülkede iade edilebilir. </p>
                        <h3>5-Sunulan ürünlerde / hizmetlerde değişiklik yapma hakkının saklı olması </h3>
                        <p>Hizmetleri veya hizmetlerin herhangi bir özelliğini sunmayı bırakma veya hizmetler için kısıtlamalar getirme dahil olmak üzere sunduğumuz hizmetlerde herhangi bir zamanda değişiklik yapma hakkımız saklıdır. Hizmetlere erişimi, herhangi bir sebeple veya sebep göstermeksizin, önceden bildirimde bulunmadan ve sorumluluk üstlenmeksizin kalıcı veya geçici olarak sonlandırabilir veya askıya alabiliriz. </p>
                        <h3>6-Hizmetler ve ürünler için verilen garantiler ve sorumluluk </h3>
                        <p>Bizden satın alınan bir ürünle ilgili olarak garanti süresi dahilinde bir kusur bildirimi geldiğinde, kusurlu olduğu iddia edilen ürünü kendi tercihimize bağlı olarak onarmak ve değiştirmek bizim sorumluluğumuzdadır. Ürünü makul bir süre içinde onarmamız ve değiştirmemiz mümkün olmazsa, müşteri ürünü iade etmek şartıyla satın alma bedelini geri alma hakkına sahip olur. tarafımızca karşılanır, ancak ürün iadelerinde gönderim ücreti müşteriye aittir. </p>
                        <h3>7-Fikri mülkiyet, telif hakları ve logolar </h3>
                        <p>Siteye (her türlü tasarım, resim, animasyon, video, ses dosyası, yazı tipi, logo, illüstrasyon, kompozisyon, çizim, arayüz ve yazılı eser dahil ancak bunlarla sınırlı olmamak üzere) herhangi bir içerik yükleyerek, bu içeriği yüklemek/aktarmak/göndermek için gerekli olan tüm haklara veya gerekli lisanslara sahip olduğunuzu ve yüklenen/aktarılan içeriğin web sitesinde herkese açık olarak sergilenebileceğini beyan ve kabul etmiş oluyorsunuz. </p>
                        <h3>8-Kullanıcı hesabını askıya alma veya feshetme hakkı </h3>
                        <p>Bu Şartların herhangi bir hükmünü veya yürürlükteki herhangi bir yasayı veya düzenlemeyi ihlal ettiğine hükmetmemiz dahil olmak üzere herhangi bir nedenle, bildirimde bulunmadan ve her türlü sorumluluktan muaf olarak hizmete erişiminizi kalıcı veya geçici olarak sonlandırabilir veya askıya alabiliriz. İstediğiniz zaman hesabınızı ve/veya herhangi bir hizmeti kullanmayı bırakabilir ve iptal talebinde bulunabilirsiniz. Otomatik yenilenen ücretli hizmet abonelikleriyle ilgili olarak, yukarıda belirtilenlerin aksine bir durum hariç olmak kaydıyla, bu tür abonelikler yalnızca halihazırda ödeme yapmış olduğunuz ilgili abonelik süresinin sona ermesi üzerine sonlandırılır. </p>
                        <h3>9-Tazminat </h3>
                        <p>[web sitesi sahibini]; web sitesini veya web sitesinde sunulan hizmetlerden herhangi birini kullanımızdan kaynaklanan veya kullanımızla bağlantılı nedenlerle üçüncü şahıslar lehine sonuçlanan her türlü talep, kayıp, yükümlülük, hak iddiası veya masraftan (avukatlık ücretleri dahil) masun tutmayı ve zararını tazmin etmeyi kabul etmektesiniz. </p>
                        <h3>10-Sorumluluğun sınırlandırılması </h3>
                        <p>[Web sitesi sahibi], hiçbir şart altında ve yürürlükteki yasaların izin verdiği azami ölçüde, hizmetin kullanımından veya kullanılamamasından kaynaklanan kar, iyi niyet, kullanım ve veri kaybı dahil ancak bunlarla sınırlı olmamak üzere herhangi bir dolaylı, cezai, arızi, özel, sonuç olarak ortaya çıkan veya örnek niteliğindeki zararlardan veya bunlarla ilgili diğer maddi olmayan kayıplardan sorumlu tutulamaz. [Web sitesi sahibi], yürürlükteki yasaların izin verdiği azami ölçüde, herhangi bir; a-İçerik hatası, kusuru veya yanlışı; b-Hizmetimize erişiminizden veya hizmetimizi kullanmanızdan kaynaklanan herhangi bir nitelikle kişisel yaralanma veya maddi hasar ve güvenli sunucularımıza ve/veya burada saklanan tüm kişisel bilgilere yetkisiz bir şekilde erişim sağlanması ve kullanılması ile ilgili olarak hiçbir sorumluluk ve yükümlülük kabul etmez. </p>
                        <h3>11-Şartları değiştirme ve güncelleme hakkı </h3>
                        <p>Bu şartları herhangi bir zamanda kendi takdirimize bağlı olarak değiştirme hakkını saklı tutarız. Bu nedenle, bu sayfayı düzenli olarak gözden geçirmelisiniz. Şartlarda maddi değişiklikler yaptığımızda bu konuda sizi bilgilendiririz. Bu tür değişikliklerden sonra Web Sitesini veya hizmetimizi kullanmaya devam etmeniz, yeni Şartları kabul ettiğiniz anlamına gelir. Bu şartlardan herhangi birini veya Şartların gelecekteki herhangi bir versiyonunu kabul etmiyorsanız, web sitesini veya hizmeti kullanmayın veya bunlara erişim sağlamayın (veya erişim sağlamaya devam etmeyin). </p>
                        <h3>12-Tanıtıcı e-posta ve içerik </h3>
                        <p>Bizden zaman zaman posta, e-posta veya bize sağladığınız diğer herhangi bir iletişim yöntemi (telefon numaranız üzerinden yapılan aramalar ve gönderilen kısa mesajlar dahil) yoluyla tanıtıcı materyal veya bildirim almayı kabul etmiş oluyorsunuz. Bu tür materyal veya bildirimler almak istemiyorsanız lütfen bize bildirin. </p>
                        <h3>13-Yetkili mahkeme ve uyuşmazlık çözümü tercihi </h3>
                        <p>Burada sağlanan Şartlar, haklar, çözümler ve bu Şartlarla ve/veya hizmetlerle ilgili tüm hak iddiaları ve anlaşmazlıklar, yasalar arası ihtilaflara bakılmaksızın, sadece ve münhasıran [Ülke / Eyalet Adı] yasalarına tabi olacak, bu yasalar kapsamında yorumlanacak ve bu yasalara uygun olarak çözülecektir. Bu tür hak iddiaları ve anlaşmazlıklar gündeme geldiğinde, işbu belgeyle, bunların münhasıran [Mahkemelerin bulunduğu şehrin adı] sınırları içinde bulunan yetkili bir mahkeme tarafından karara bağlanmasına rıza göstermiş oluyorsunuz. Uluslararası Mal Satışına ilişkin Birleşmiş Milletler Sözleşmesi'nin uygulanması işbu belgede açıkça hariç tutulmuştur. </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Kapat
                        </button>
                    </div>
                </div>
            </div>
        </div>
		<!-- end:: Page -->
		<!--begin::Base Scripts -->
		<script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->
		<!--begin::Page Snippets -->
		<script src="assets/snippets/pages/user/login.js" type="text/javascript"></script>
        <script>
            function filtre(){
                $('#sehir').on('change',function (e){
                    e.preventDefault();
                    console.log($('#sehir').val());
                    $.ajax({
                        type: "GET",
                        url: "../adres/index.php",
                        data: {"durum": "ilce", "plakakodu": $('#sehir').val()},
                        success: function (data) {
                            $('.ilce option').remove();
                            $('.mahalle option').remove();
                            $('.ilce').append("<option value=''>İlçe Seçiniz</option>");
                            $('.mahalle').append("<option value=''>Mahalle Seçiniz</option>");
                            $('.ilce').append(data);

                        }
                    });
                    return false;
                });
                $('#ilce').on('change',function (e){
                    e.preventDefault();
                    $.ajax({
                        type: "GET",
                        url: "../adres/index.php",
                        data: {"durum": "mahalle", "ilcekodu": $('#ilce').val()},
                        success: function (data) {
                            $('.mahalle option').remove();
                            $('.mahalle').append("<option value=''>Mahalle Seçiniz</option>");
                            $('.mahalle').append(data);

                        }
                    });
                    return false;
                });
            }
            $(document).ready(function(){
                filtre();
                $('.sartLink').on('click', function (e){
                    e.preventDefault();
                    $('#m_modal_2').modal('show');
                });
            });

        </script>
		<!--end::Page Snippets -->
	</body>
	<!-- end::Body -->
</html>
