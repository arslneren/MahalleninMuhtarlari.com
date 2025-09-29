<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
$page = "socials";
include "inc/header.php";
?>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        Sosyal Medya
                    </h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="#" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                            </a>
                        </li>
                        <li class="m-nav__separator">
                            -
                        </li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
											<span class="m-nav__link-text">
												Actions
											</span>
                            </a>
                        </li>
                        <li class="m-nav__separator">
                            -
                        </li>
                        <li class="m-nav__item">
                            <a href="" class="m-nav__link">
											<span class="m-nav__link-text">
												Sosyal Medya
											</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END: Subheader -->
        <div class="m-content">
            <!--begin::Portlet-->
            <div class="m-portlet">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title" style="float:left;">
                            <h3 class="m-portlet__head-text">
                                Sosyal Medya Düzenleyici
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <div class="m-portlet__body">
                    <!--begin::Section-->
                    <div class="m-section">
                        <div class="m-section__content">
                            <table class="table m-table m-table--head-bg-success">
                                <thead>
                                <tr>
                                    <th>Başlık</th>
                                    <th>Link</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sorgu1 = $baglanti->prepare("SELECT * FROM sociallinks WHERE muhId =:muhId");
                                $sorgu1->execute(['muhId' => $_SESSION["muhId"]]);
                                $sonuc1 = $sorgu1->fetch();
                                if($sonuc1 == null){
                                    $sorgu2=$baglanti->prepare("INSERT INTO sociallinks (muhId) VALUES (:muhID)");
                                    $sorgu2->bindParam(':muhID', $_SESSION["muhId"]);
                                    if($sorgu2->execute()){
                                        header("Refresh:0");
                                    }
                                    else{
                                        echo "Bir hata oluştu. Lütfen biizmle iletişime geçin.";
                                    }
                                }

                                $face = $sonuc1["facebook"];
                                $ig = $sonuc1["instagram"];
                                $x = $sonuc1["x"];
                                ?>
                                    <tr>
                                        <td>Facebook</td>
                                        <td><?php  if(!$face){echo "link yok";}else{echo $face;} ?></td>
                                        <td><a href="social/facebook" class="btn btn-warning">Düzenle</a></td>
                                    </tr>
                                    <tr>
                                        <td>Instagram</td>
                                        <td><?php  if(!$ig){echo "link yok";}else{echo $ig;} ?></td>
                                        <td><a href="social/instagram" class="btn btn-warning">Düzenle</a></td>
                                    </tr>
                                    <tr>
                                        <td>X(Twitter)</td>
                                        <td><?php  if(!$x){echo "link yok";}else{echo $x;} ?></td>
                                        <td><a href="social/x" class="btn btn-warning">Düzenle</a></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!--end::Section-->
                </div>
                <!--end::Form-->
            </div>
            <!--end::Portlet-->
        </div>
    </div>
<?php

include "inc/footer.php";
?>