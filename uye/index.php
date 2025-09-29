<?php
$page = "home";
include("inc/header.php"); ?>
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title ">
									Hoş Geldiniz, <?php echo $_SESSION["muhName"]; ?>
								</h3>
							</div>
						</div>
					</div>
					<!-- END: Subheader -->
                    <div class="m-content">
                        <div class="">
                            <?php
                            $sorgu = $baglanti->prepare("SELECT aktif FROM muhtarlar WHERE id =:id");
                            $sorgu->execute(['id' => $_SESSION["muhId"]]);
                            $sonuc = $sorgu->fetch();

                            if($sonuc["aktif"] != 1){

?>
                                <div class="alert alert-brand m-alert m-alert--icon m-alert--air m-alert--square m--margin-bottom-30" role="alert">
                                    <div class="m-alert__icon">
                                        <i class="flaticon-exclamation-1"></i>
                                    </div>
                                    <div class="m-alert__text">
                                        Uyarı! Ödeme yapılmadığı için hesabınız aktif değildir. Ödeme yaptıysanız bu mesajı dikkate almayınız.
                                        <a href="https://mahalleninmuhtarlari.com/iletisim" class="m-link m-link--warning m--font-bold" target="_blank">
                                            İletişim için tıklayın.
                                        </a>
                                    </div>
                                </div>

                            <?php
                            }

                            ?>
                        </div>
                        <div class="col-lg-6">
                            <div class="m-portlet">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title" style="float:left;">
                                            <h3 class="m-portlet__head-text">
                                                Ana Menü
                                            </h3>
                                        </div>
                                        <?php
                                        $sorgu3 = $baglanti->prepare("SELECT shows FROM muhtarlar WHERE id =:muhID ");
                                        $sorgu3->execute(['muhID' => $_SESSION["muhId"]]);
                                        $sonuc3 = $sorgu3->fetch();
                                        if($sonuc3["shows"] == "1"){
                                            echo '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#m_modal_2"  style="float:right;transform: translateY(-50%);top: 50%;position: relative;">Yayından Kaldır</button>';
                                        }
                                        else{
                                            echo '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#m_modal_1"  style="float:right;transform: translateY(-50%);top: 50%;position: relative;">Yayına Al</button>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="m-portlet__body">
                                    <!--begin::Section-->
                                    <div class="m-section m-section--last">
                                        <div class="m-section__content">
                                            <!--begin::Preview-->
                                            <div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
                                                <div class="m-demo__preview">
                                                    <ul class="m-nav">
                                                        <li class="m-nav__item">
                                                            <a href="slogan" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-layers"></i>
                                                                <span class="m-nav__link-text">
																		Slogan Güncelle
																	</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="image_update" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-share"></i>
                                                                <span class="m-nav__link-title">
																		<span class="m-nav__link-wrap">
																			<span class="m-nav__link-text">
																				Fotoğraf Güncelle
																			</span>
																			<!--<span class="m-nav__link-badge">
																				<span class="m-badge m-badge--danger m-badge--wide m-badge--rounded">
																					new
																				</span>
																			</span>-->
																		</span>
																	</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="kisaicerik" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-multimedia-1"></i>
                                                                <span class="m-nav__link-text">
																		Kısa İçerik Güncelle
																	</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="tumicerik" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-interface-7"></i>
                                                                <span class="m-nav__link-text">
																		Tüm İçerik Güncelle
																	</span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="profile" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                <span class="m-nav__link-title">
																		<span class="m-nav__link-wrap">
																			<span class="m-nav__link-text">
																				Profilim
																			</span>
																		</span>
																	</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--end::Preview-->
                                        </div>
                                    </div>
                                    <!--end::Section-->
                                </div>
                            </div>
                        </div>
                    </div>
				</div>

<div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Dikkat!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Profiliniz aktif hale gelecektir. Devam etmek istiyor musunuz?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    İptal
                </button>
                <a href="yayinla" class="btn btn-primary" >Devam</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="m_modal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Dikkat!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">
												×
											</span>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Profiliniz pasif hale gelecektir. Devam etmek istiyor musunuz?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    İptal
                </button>
                <a href="yayinkaldir" class="btn btn-primary" >Devam</a>
            </div>
        </div>
    </div>
</div>
<?php include("inc/footer.php"); ?>
