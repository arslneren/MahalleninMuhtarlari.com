<?php
$page = "is";
include "inc/header.php";
$isID = htmlspecialchars($_GET["id"]);
$sorgu = $baglanti->prepare("SELECT baslik, icerik FROM ishayati WHERE id =:isID AND muhID =:muhID ");
$sorgu->execute(['isID' => $isID, 'muhID' => $_SESSION["muhId"]]);
$sonuc = $sorgu->fetch();
if(!$sonuc){
    echo "hata";
    die;
}
?>
    <script>
        function ysYonlendir(ID, adres, saniye) {
            if (saniye == 0) {
                window.location.href = adres;
                return;
            }
            document.getElementById(ID).innerHTML = saniye + " saniye sonra yönlendiriliyorsunuz.";
            saniye--;
            setTimeout(function() {
                ysYonlendir(ID, adres, saniye);
            }, 1000);
        }
    </script>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        İş Hayatı
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
												İş Hayatı Düzenle
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
                                İş Hayatı Düzenle
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <?php
                if($_POST){
                    if($_POST["baslikTxt"] <> "" ){
                        $sorgu2=$baglanti->prepare("UPDATE ishayati SET baslik=:baslikTxt, icerik=:icerikTxt WHERE id=:id and muhID =:muhID");
                        $baslikTxt = htmlspecialchars($_POST["baslikTxt"]);
                        $icerikTxt = htmlspecialchars($_POST["icerikTxt"]);
                        $sorgu2->bindParam(':baslikTxt', $baslikTxt);
                        $sorgu2->bindParam(':icerikTxt', $icerikTxt);
                        $sorgu2->bindParam(':muhID', $_SESSION["muhId"]);
                        $sorgu2->bindParam(':id', $_GET["id"]);
                        $sonuc2 = $sorgu2->execute();
                        if ($sonuc2) {
                            $sorgu = $baglanti->prepare("SELECT baslik, icerik FROM ishayati WHERE id =:isID AND muhID =:muhID ");
                            $sorgu->execute(['isID' => $isID, 'muhID' => $_SESSION["muhId"]]);
                            $sonuc = $sorgu->fetch();
                            ?>

                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 20px 10px">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                <strong>
                                    İçerik Girişi Yapıldı.
                                </strong>
                                <span id="uyari"></span>
                                <script>
                                    ysYonlendir("uyari", "isHayati", 5);
                                </script>
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
                            İçerik boş bırakılamaz.
                        </div>
                        <?php
                    }

                }
                ?>
                <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">


                            <label class="col-form-label col-lg-3 col-sm-12">
                                İçerik
                            </label>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <input type="text" class="form-control m-input" id="baslikTxt" name="baslikTxt" placeholder="İçerik" value="<?php echo $sonuc["baslik"]; ?>">
                            </div>
                            <div class="space" style="padding: 10px;width: 100%;display:block;"></div>
                            <label class="col-form-label col-lg-3 col-sm-12">
                                İçerik Detay
                            </label>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <input type="text" class="form-control m-input" id="icerikTxt" name="icerikTxt" placeholder="İçerik Detay"  value="<?php echo $sonuc["icerik"]; ?>">
                            </div>
                        </div>

                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-9 ml-lg-auto">
                                    <input type="submit" class="btn btn-brand" value="Düzenle">
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