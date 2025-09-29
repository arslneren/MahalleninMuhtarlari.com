<?php
$page = "socials";
include "inc/header.php";
$title = $_GET["title"];
if($title == "facebook" || $title == "instagram" || $title == "x"){

}
else{
    header("location:../socials");
}
?>
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        <?php echo $title; ?> Güncelle
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
												<?php echo $title; ?>
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
                                <?php echo $title; ?> Düzenle
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                <?php
                if($_POST){
                    if($_POST["sloganTxt"]){
                        if($title == "facebook"){
                            $sorgu2=$baglanti->prepare("UPDATE sociallinks SET facebook=:sloganTxt  WHERE muhId =:muhId");
                        }
                        if($title == "instagram"){
                            $sorgu2=$baglanti->prepare("UPDATE sociallinks SET instagram=:sloganTxt  WHERE muhId =:muhId");
                        }
                        if($title == "x"){
                            $sorgu2=$baglanti->prepare("UPDATE sociallinks SET x=:sloganTxt  WHERE muhId =:muhId");
                        }
                        $sorgu2->bindParam(':sloganTxt', $_POST["sloganTxt"]);
                        $sorgu2->bindParam(':muhId', $_SESSION["muhId"]);
                        $sonuc2 = $sorgu2->execute();
                        if ($sonuc2) {
                            header("location:socials");
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
                }
                ?>
                <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="">
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                                Link
                            </label>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <?php
                                if($title == "facebook"){
                                    $sorgu = $baglanti->prepare("SELECT facebook FROM sociallinks WHERE muhId =:id");
                                    $sorgu->execute(['id' => $_SESSION["muhId"]]);
                                    $sonuc = $sorgu->fetch();
                                    $link = $sonuc["facebook"];
                                }
                                if($title == "instagram"){
                                    $sorgu = $baglanti->prepare("SELECT instagram FROM sociallinks WHERE muhId =:id");
                                    $sorgu->execute(['id' => $_SESSION["muhId"]]);
                                    $sonuc = $sorgu->fetch();
                                    $link = $sonuc["instagram"];
                                }
                                if($title == "x"){
                                    $sorgu = $baglanti->prepare("SELECT x FROM sociallinks WHERE muhId =:id");
                                    $sorgu->execute(['id' => $_SESSION["muhId"]]);
                                    $sonuc = $sorgu->fetch();
                                    $link = $sonuc["x"];
                                }

                                if(isset($link) || $link != null){

                                ?>
                                <input type="text" class="form-control m-input" id="sloganTxt" name="sloganTxt" placeholder="Link girin." value="<?php echo $link;?>" >

                                <?php }else{  ?>
                                    <input type="text" class="form-control m-input" id="sloganTxt" name="sloganTxt" placeholder="Link girin.">
                                <?php } ?>
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