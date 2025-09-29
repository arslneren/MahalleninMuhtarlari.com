<?php
$page = "egitim";
include "inc/header.php";
?>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        Eğitim Hayatı
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
												Eğitim Hayatı
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
                                Eğitim Hayatı Düzenleyici
                            </h3>
                        </div>

                        <?php
                            $sorgu3 = $baglanti->prepare("SELECT egitimHayati FROM muhtar_detay WHERE muhtarId =:muhID ");
                            $sorgu3->execute(['muhID' => $_SESSION["muhId"]]);
                            $sonuc3 = $sorgu3->fetch();
                            if($sonuc3["egitimHayati"] == "1"){
                                echo '<a href="egitimHayatiPasif" class="btn btn-danger" style="float:right;transform: translateY(-50%);top: 50%;position: relative;">Pasif Hale Getir</a>';
                            }
                            else{
                                echo '<a href="egitimHayatiAktif" class="btn btn-info" style="float:right;transform: translateY(-50%);top: 50%;position: relative;">Aktif Hale Getir</a>';
                            }
                        ?>
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
                                    <th>İçerik</th>
                                    <th>İçerik Detay</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sorgu1 = $baglanti->prepare("SELECT * FROM egitimhayati WHERE muhID =:muhId");
                                $sorgu1->execute(['muhId' => $_SESSION["muhId"]]);
                                while ($sonuc1 = $sorgu1->fetch()){
                                ?>
                                    <tr>
                                        <td><?php echo $sonuc1["baslik"]; ?></td>
                                        <td><?php echo $sonuc1["icerik"]; ?></td>
                                        <td><a href="egitimHayatiDuzenle/<?php echo $sonuc1["id"]; ?>" class="btn btn-warning">Düzenle</a></td>
                                        <td><a href="egitimHayatiSil/<?php echo $sonuc1["id"]; ?>" class="btn btn-danger">Sil</a></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="width: 100%;text-align: center;">
                        <a href="egitimHayatiEkle" class="btn btn-primary" style="display:inline-block;">Ekle</a>
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