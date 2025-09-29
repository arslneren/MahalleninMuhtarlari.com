<?php
ob_start();
session_start();
if (!(isset($_SESSION["oturum"]) && $_SESSION["oturum"]=="6789")){
    header("location:login");
    ob_end_flush();
}

include ("vt.php");
?>

<!DOCTYPE html>
<html lang="tr" >
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>
        Mahallenin Muhtarları | Dashboard
    </title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <base href="https://mahalleninmuhtarlari.com/uye/"> -->
    <base href="http://localhost/31mart/uye/">

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
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <!-- BEGIN: Header -->
    <header class="m-grid__item    m-header "  data-minimize-offset="200" data-minimize-mobile-offset="200" >
        <div class="m-container m-container--fluid m-container--full-height">
            <div class="m-stack m-stack--ver m-stack--desktop">
                <!-- BEGIN: Brand -->
                <div class="m-stack__item m-brand  m-brand--skin-dark ">
                    <div class="m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-stack__item--middle m-brand__logo">
                            <a href="home" class="m-brand__logo-wrapper">
                                <img alt="" src="assets/demo/default/media/img/logo/logo_default_dark.png">
                                <style>
                                    .m-brand__logo-wrapper img{
                                        width: 100%;
                                    }
                                    @media screen and (max-width: 992px) {
                                        .m-brand__logo-wrapper img{
                                            width: 40%;
                                        }
                                    }
                                    @media screen and (max-width: 500px) {
                                        .m-brand__logo-wrapper img{
                                            width: 70%;
                                        }
                                    }
                                </style>
                            </a>
                        </div>
                        <div class="m-stack__item m-stack__item--middle m-brand__tools">
                            <!-- BEGIN: Left Aside Minimize Toggle -->
                            <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block
					 ">
                                <span></span>
                            </a>
                            <!-- END -->
                            <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                            <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>
                            <!-- END -->
                            <!-- BEGIN: Responsive Header Menu Toggler -->
                            <!-- END -->
                            <!-- BEGIN: Topbar Toggler -->
                            <!-- BEGIN: Topbar Toggler -->
                        </div>
                    </div>
                </div>
                <!-- END: Brand -->
                <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                    <!-- BEGIN: Horizontal Menu -->
                    <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
                        <i class="la la-close"></i>
                    </button>
                    <!-- END: Horizontal Menu -->
                    <!-- BEGIN: Topbar -->
                    <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-topbar__nav-wrapper">
                            <ul class="m-topbar__nav m-nav m-nav--inline">
                                <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
                                    <a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
                                                    <?php
                                                    $imgSorgu=$baglanti->prepare("SELECT image FROM muhtarlar where id=:muhId");
                                                    $imgSorgu->execute(['muhId'=>$_SESSION["muhId"]]);
                                                    $imgSonuc=$imgSorgu->fetch();
                                                    ?>
													<img src="../assets/img/muhtar_image/min/<?php echo $imgSonuc["image"]?>" class="m--img-rounded m--marginless m--img-centered" alt=""/>
												</span>
                                        <span class="m-topbar__username m--hide">
													Nick
												</span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__header m--align-center" style="background: url(../assets/img/muhtar_image/min/<?php echo $imgSonuc["image"]?>); background-size: cover;">
                                                <div class="m-card-user m-card-user--skin-dark">
                                                    <div class="m-card-user__pic">

                                                        <img src="../assets/img/muhtar_image/min/<?php echo $imgSonuc["image"]?>" class="m--img-rounded m--marginless" alt=""/>
                                                    </div>
                                                    <div class="m-card-user__details">
																<span class="m-card-user__name m--font-weight-500">
																	<?php echo $_SESSION["muhName"] ?>
																</span>
                                                        <a href="profile" class="m-card-user__email m--font-weight-300 m-link">
                                                            <?php echo $_SESSION["email"] ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <ul class="m-nav m-nav--skin-light">
                                                        <li class="m-nav__section m--hide">
																	<span class="m-nav__section-text">
																		Section
																	</span>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="profile" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                                <span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">
																					Profilim
																				</span>
																				<span class="m-nav__link-badge">
																					<span class="m-badge m-badge--success">

																					</span>
																				</span>
																			</span>
																		</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__separator m-nav__separator--fit"></li>
                                                        <li class="m-nav__item">
                                                            <a href="logout" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                                Çıkış Yap
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END: Topbar -->
                </div>
            </div>
        </div>
    </header>
    <!-- END: Header -->
    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
        <!-- BEGIN: Left Aside -->
        <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
            <i class="la la-close"></i>
        </button>
        <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
            <!-- BEGIN: Aside Menu -->
            <div
                id="m_ver_menu"
                class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
                data-menu-vertical="true"
                data-menu-scrollable="false" data-menu-dropdown-timeout="500"
            >
                <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                    <li class="m-menu__item   <?php if($page=="home"){ echo "m-menu__item--active";} ?>" aria-haspopup="true" >
                        <a  href="home" class="m-menu__link ">
                            <i class="m-menu__link-icon flaticon-line-graph"></i>
                            <span class="m-menu__link-title">
										<span class="m-menu__link-wrap">
											<span class="m-menu__link-text">
												Ana Sayfa
											</span>
											<span class="m-menu__link-badge">
												<span class="m-badge m-badge--danger">

												</span>
											</span>
										</span>
									</span>
                        </a>
                    </li>
                    <li class="m-menu__section">
                        <h4 class="m-menu__section-text">
                            İçerik Güncelleme
                        </h4>
                        <i class="m-menu__section-icon flaticon-more-v3"></i>
                    </li>
                    <li class="m-menu__item m-menu__item--submenu m-menu__item--open <?php if($page=="slogan"){ echo "m-menu__item--active";} ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                        <a  href="slogan" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon flaticon-layers"></i>
                            <span class="m-menu__link-text">
										Slogan Güncelle
									</span>
                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                        </a>
                    </li>
                    <li class="m-menu__item  m-menu__item--submenu  <?php if($page=="fotograf"){ echo "m-menu__item--active";} ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                        <a  href="image_update" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon flaticon-share"></i>
                            <span class="m-menu__link-text">
										Fotoğraf güncelle
									</span>
                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                        </a>
                    </li>
                    <li class="m-menu__item  m-menu__item--submenu  <?php if($page=="kisa"){ echo "m-menu__item--active";} ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                        <a  href="kisaicerik" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon flaticon-multimedia-1"></i>
                            <span class="m-menu__link-text">
										Kısa İçerik Güncelle
									</span>
                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                        </a>
                    </li>
                    <?php
                    $status=$baglanti->prepare("SELECT status FROM muhtarlar where id=:muhId");
                    $status->execute(['muhId'=>$_SESSION["muhId"]]);
                    $statsSonuc=$status->fetch();

                    if($statsSonuc["status"] != 1){
                    ?>
                    <li class="m-menu__item  m-menu__item--submenu  <?php if($page=="tum"){ echo "m-menu__item--active";} ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                        <a  href="tumicerik" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon flaticon-interface-7"></i>
                            <span class="m-menu__link-text">
										Tüm İçerik Güncelle
									</span>
                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                        </a>
                    </li>
                    <?php } ?>
                    <li class="m-menu__item  m-menu__item--submenu  <?php if($page=="is"){ echo "m-menu__item--active";} ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                        <a  href="isHayati" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon flaticon-suitcase"></i>
                            <span class="m-menu__link-text">
										İş Hayatı
									</span>
                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                        </a>
                    </li>
                    <li class="m-menu__item  m-menu__item--submenu  <?php if($page=="egitim"){ echo "m-menu__item--active";} ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                        <a  href="egitimHayati" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon la la-mortar-board"></i>
                            <span class="m-menu__link-text">
										Eğitim Hayatı
									</span>
                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                        </a>
                    </li>
                    <li class="m-menu__item  m-menu__item--submenu  <?php if($page=="iletisim"){ echo "m-menu__item--active";} ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                        <a  href="iletisimBilgileri" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon flaticon-chat-1"></i>
                            <span class="m-menu__link-text">
										İletişim Bilgileri
									</span>
                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                        </a>
                    </li>
                    <li class="m-menu__item  m-menu__item--submenu  <?php if($page=="socials"){ echo "m-menu__item--active";} ?>" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                        <a  href="socials" class="m-menu__link m-menu__toggle">
                            <i class="m-menu__link-icon flaticon-network"></i>
                            <span class="m-menu__link-text">
										Sosyal Medya
									</span>
                            <i class="m-menu__ver-arrow la la-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END: Aside Menu -->
        </div>
        <!-- END: Left Aside -->
