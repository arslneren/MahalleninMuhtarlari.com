<?php
$page = "fotograf";
include "inc/header.php";
?>
<link rel="stylesheet" href="assets/ijaboCropTool.min.css">
<div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title m-subheader__title--separator">
                        Fotoğraf Güncelle
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
												Fotoğraf
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
                                Fotoğraf Düzenleyici
                            </h3>
                        </div>
                    </div>
                </div>
                <!--begin::Form-->
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 20px 10px; display: none">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                <strong>
                                    Başarılı!
                                </strong>
                                İçerik güncellemesi yapıldı.
                            </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group row">
                            <div class="col-lg-7 col-md-7 col-sm-12">
                            </div>
                        </div>
                        <div class="form-group m-form__group">
                            <label class="custom-file">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalSizeLg">
                                    Fotoğraf Değiştir
                                </button>
                            </label><br><br>
                            <label for="exampleInputEmail1">
                                Güncel Fotoğraf:
                            </label>
                            <div>
                                <?php
                                $sorgu = $baglanti->prepare("SELECT bigImg FROM muhtar_detay WHERE muhtarId =:id");
                                $sorgu->execute(['id' => $_SESSION["muhId"]]);
                                $sonuc = $sorgu->fetch();

                                ?>
                                <img id="change" src="../assets/img/muhtar_image/<?php echo $sonuc["bigImg"]; ?>" alt="" style="width: 500px">
                            </div>
                        </div>
                    </div>
                    <!--<div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="m-form__actions m-form__actions">
                            <div class="row">
                                <div class="col-lg-9 ml-lg-auto">
                                    <input type="submit" class="btn btn-brand" value="Güncelle">
                                </div>
                            </div>
                        </div>
                    </div> -->

                <!--end::Form-->
            </div>
            <!--end::Portlet-->
        </div>
    </div>

<div class="modal fade" id="exampleModalSizeLg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Fotoğraf Seç ve Düzenle
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">
                                                    ×
                                                </span>
                    </button>
                </div>
                <div class="modal-body">
                    <label>Dosya Seç
                        <input type="file" id="imgUp" name="imgUp" accept="image/png, image/gif, image/jpeg" />
                    </label>
                    <div class="imgArea">
                        <img class="target" src="" alt="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        İptal
                    </button>
                    <!-- <input type="submit" class="btn btn-primary" value="Kaydet"> -->
                </div></div>

    </div>
</div>


<?php
include "inc/footer.php";
?>

<script src="assets/ijaboCropTool.min.js"></script>
<script>
    $('#imgUp').ijaboCropTool({
        preview : '#change',
        setRatio:4/3.395,
        allowedExtensions: ['jpg', 'jpeg','png'],
        buttonsText:['KIRP ve Yükle','İPTAL ET'],
        buttonsColor:['#30bf7d','#ee5155', -15],
        processUrl:'croppie.php',
        onSuccess:function(message, element, status){
            $('#exampleModalSizeLg').modal('hide');
            $('.alert ').fadeIn();
        },
        onError:function(message, element, status){
            alert(message);
        }
    });
</script>
