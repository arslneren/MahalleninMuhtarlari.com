<?php
$page = "tum";
include "inc/header.php";

$status=$baglanti->prepare("SELECT status FROM muhtarlar where id=:muhId");
$status->execute(['muhId'=>$_SESSION["muhId"]]);
$statsSonuc=$status->fetch();

if($statsSonuc["status"] == 1){
    header("location:home");
    ob_end_flush();
}

?>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        Tüm İçerik Güncelle
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
												Tüm İçerik
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
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Tüm İçerik Düzenleyici
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <?php

                if($_POST){
                    if($_POST["baslikTxt"] <> "" &&  $_POST["tamIcerikTxt"] <> "" ){
                        $sorgu2=$baglanti->prepare("UPDATE muhtar_detay SET baslik2=:baslikTxt, tamIcerik=:tamIcerikTxt  WHERE muhtarId =:muhId");
                        $sorgu2->bindParam(':baslikTxt', $_POST["baslikTxt"]);
                        $sorgu2->bindParam(':tamIcerikTxt', $_POST["tamIcerikTxt"]);
                        $sorgu2->bindParam(':muhId', $_SESSION["muhId"]);
                        $sonuc2 = $sorgu2->execute();
                        if ($sonuc2) {
                            ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 20px 10px">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                <strong>
                                    Başarılı!
                                </strong>
                                İçerik güncellemesi yapıldı.
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--air" role="alert" style="margin: 20px 10px">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                <strong>
                                    Hata!
                                </strong>
                                Bir hata oluştu.
                            </div>
                            <?php
                        }
                    }
                    else{
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--air" role="alert" style="margin: 20px 10px">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                            <strong>
                                Hata!
                            </strong>
                            Boş içerik bırakılamaz.
                        </div>
                        <?php
                    }

                }
                ?>
                <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Slogan
                            </label>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <?php
                                $sorgu = $baglanti->prepare("SELECT baslik2, tamIcerik FROM muhtar_detay WHERE muhtarId =:id");
                                $sorgu->execute(['id' => $_SESSION["muhId"]]);
                                $sonuc = $sorgu->fetch();

                                ?>
                                <input type="text" class="form-control m-input" id="baslikTxt" name="baslikTxt" placeholder="Kısa başlık girin." value="<?php echo $sonuc["baslik2"]?>" >
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Content
                            </label>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <textarea id="tamIcerikTxt" class="summernote" style="display:none;" name="tamIcerikTxt"><?php echo $sonuc["tamIcerik"]?></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-9 ml-lg-auto">
                                    <input type="submit" class="btn btn-brand" value="Güncelle">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Portlet-->
        </div>
    </div>
<?php

include "inc/footer.php";
?>