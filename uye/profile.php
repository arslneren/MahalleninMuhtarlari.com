<?php include("inc/header.php"); ?>
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title ">
									Profilim
								</h3>
							</div>
						</div>
					</div>
					<!-- END: Subheader -->
					<div class="m-content">
						<div class="row">
							<div class="col-lg-3">
								<div class="m-portlet m-portlet--full-height  ">
									<div class="m-portlet__body">
										<div class="m-card-profile">
											<div class="m-card-profile__title m--hide">
												Your Profile
											</div>
											<div class="m-card-profile__pic">
												<div class="m-card-profile__pic-wrapper">
													<img src="../assets/img/muhtar_image/min/<?php echo $imgSonuc["image"]?>" alt=""/>
												</div>
											</div>
											<div class="m-card-profile__details">
												<span class="m-card-profile__name">
													<?php echo $_SESSION["muhName"] ?>
												</span>
												<a href="" class="m-card-profile__email m-link">
                                                    <?php echo $_SESSION["email"] ?>
												</a>
											</div>
										</div>
										<ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
											<li class="m-nav__separator m-nav__separator--fit"></li>
											<li class="m-nav__section m--hide">
												<span class="m-nav__section-text">
													Section
												</span>
											</li>
											<li class="m-nav__item">
												<a href="../header/profile&amp;demo=default.html" class="m-nav__link">
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
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-9">
								<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
									<div class="m-portlet__head">
										<div class="m-portlet__head-tools">
											<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
														<i class="flaticon-share m--hide"></i>
														Profil Güncelle
													</a>
												</li>
												<li class="nav-item m-tabs__item">
													<a class="nav-link m-tabs__link" href="image_update">
														Fotoğraf Güncelle
													</a>
												</li>
											</ul>
										</div>
									</div>
									<div class="tab-content">
										<div class="tab-pane active" id="m_user_profile_tab_1">
											<form class="m-form m-form--fit m-form--label-align-right">
												<div class="m-portlet__body">
													<div class="form-group m-form__group m--margin-top-10 m--hide">
														<div class="alert m-alert m-alert--default" role="alert">
															The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
														</div>
													</div>
                                                    <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-brand alert-dismissible fade show" role="alert" style="margin-left: 10px;margin-right: 10px;">
                                                        <div class="m-alert__icon">
                                                            <i class="flaticon-exclamation-1"></i>
                                                            <span></span>
                                                        </div>
                                                        <div class="m-alert__text">
                                                            <strong>
                                                                Dikkat!
                                                            </strong>
                                                            Profil güncelleme en yakın zamanda aktif olacaktır. Fotoğraf güncellemek için "Fotoğraf Güncelle" bölümüne gidiniz.
                                                        </div>
                                                        <div class="m-alert__close">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                                        </div>
                                                    </div>
													<div class="form-group m-form__group row">
														<div class="col-10 ml-auto">
															<h3 class="m-form__section">
																1. Kişisel Bilgiler
															</h3>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Ad
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="<?php echo $_SESSION["muhName"] ?>" disabled>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															E-posta
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="<?php echo $_SESSION["email"] ?>" disabled>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Şifre
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" placeholder="****" value="" disabled>
														</div>
													</div>
													<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                                    <!-- <div class="form-group m-form__group row">
                                                        <div class="col-10 ml-auto">
                                                            <h3 class="m-form__section">
                                                                2. Address
                                                            </h3>
                                                        </div>
                                                    </div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Address
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="L-12-20 Vertex, Cybersquare">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															City
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="San Francisco">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															State
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="California">
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Postcode
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="45000">
														</div>
													</div>
													<div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>-->
													<div class="form-group m-form__group row">
														<div class="col-10 ml-auto">
															<h3 class="m-form__section">
																2. Sosyal Medya
															</h3>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Facebook
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="www.linkedin.com/" disabled>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															İnstagram
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="www.facebook.com/" disabled>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Twitter
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="www.twitter.com/" disabled>
														</div>
													</div>
													<div class="form-group m-form__group row">
														<label for="example-text-input" class="col-2 col-form-label">
															Youtube
														</label>
														<div class="col-7">
															<input class="form-control m-input" type="text" value="www.instagram.com/" disabled>
														</div>
													</div>
												</div>
												<div class="m-portlet__foot m-portlet__foot--fit">
													<div class="m-form__actions">
														<div class="row">
															<div class="col-2"></div>
															<div class="col-7">
																<button type="reset" class="btn btn-accent m-btn m-btn--air m-btn--custom">
																	Kaydet
																</button>
																&nbsp;&nbsp;
																<button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
																	İptal
																</button>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
										<div class="tab-pane active" id="m_user_profile_tab_2"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
<?php include("inc/footer.php"); ?>