<!DOCTYPE html>
<html dir="ltr" lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="advanced custom search, agency, agent, business, clean, corporate, directory, google maps, homes, idx agent, listing properties, membership packages, property, real broker, real estate, real estate agent, real estate agency, realtor">
<meta name="description" content="Rede Imóveis - Encontre aqui o imóvel dos seus sonhos">
<meta name="CreativeLayers" content="ATFN">
<!-- css file -->
<link rel="stylesheet" href="{{ asset('assets/portal/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/portal/css/style.css') }}">
<!-- Responsive stylesheet -->
<link rel="stylesheet" href="{{ asset('assets/portal/css/responsive.css') }}">
<!-- Title -->
<title>Rede Imóveis - Encontre aqui o imóvel dos seus sonhos</title>
<!-- Favicon -->
<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/portal/images/favicon.ico') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="{{ asset('assets/portal/images/favicon.ico') }}" sizes="128x128" rel="shortcut icon" />

</head>
<body>
<div class="wrapper">
	<div class="preloader"></div>

	@include('portal.menu')

	<!-- Home Design -->
	<section class="home-one home1-overlay home1_bgi1">
		<div class="container">
			<div class="row posr">
				<div class="col-lg-12">
					<div class="home_content">
						<div class="home-text text-center">
							<h2 class="fz55">Rede Imóveis</h2>
							<p class="fz18 color-white">Encontre aqui o imóvel dos seus sonhos</p>
						</div>
						<div class="home_adv_srch_opt">
							<ul class="nav nav-pills" id="pills-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Venda</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Locação</a>
								</li>
							</ul>
							<div class="tab-content home1_adsrchfrm" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
									<div class="home1-advnc-search">
										<ul class="h1ads_1st_list mb0">
											<li class="list-inline-item" style="display: none;">
											    <div class="form-group">
											    	<input type="text" class="form-control" id="exampleInputName1" placeholder="Enter keyword...">
											    </div>
											</li>
											<li class="list-inline-item">
												<div class="search_option_two">
													<div class="candidate_revew_select">
														<select class="selectpicker w100 show-tick" multiple>
															<option>Tipo do Imóvel</option>
															<option>Apartmento</option>
															<option>Casa</option>
															<option>Condomínio</option>
															<option>Lote</option>
															<option>Sala Comercial</option>
															<option>Flat</option>
														</select>
													</div>
												</div>
											</li>
											<li class="list-inline-item">
											    <div class="form-group">
											    	<input type="text" class="form-control" id="exampleInputEmail" placeholder="Localização">
											    	<label for="exampleInputEmail"><span class="flaticon-maps-and-flags"></span></label>
											    </div>
											</li>
											<li class="list-inline-item" style="display: none;">
												<div class="small_dropdown2">
												    <div id="prncgs" class="btn dd_btn">
												    	<span>Price</span>
												    	<label for="exampleInputEmail2"><span class="fa fa-angle-down"></span></label>
												    </div>
												  	<div class="dd_content2">
													    <div class="pricing_acontent">
															<!-- <input type="text" class="amount" placeholder="$52,239">
															<input type="text" class="amount2" placeholder="$985,14">
															<div class="slider-range"></div> -->
													    	<span id="slider-range-value1"></span>
															<span id="slider-range-value2"></span>
														    <div id="slider"></div>
													    </div>
												  	</div>
												</div>
											</li>

											<li class="list-inline-item">
												<div class="search_option_button">
												    <button type="submit" class="btn btn-thm">Search</button>
												</div>
											</li>
										</ul>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Feature Properties -->
	<section id="feature-property" class="feature-property bgc-f7">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<a href="#feature-property">
			    	<div class="mouse_scroll">
	        		<div class="icon">
			    		<h4>Role para baixo</h4>
			    		<p>para descobrir muito mais</p>
	        		</div>
	        		<div class="thumb">
	        			<img src="{{ asset('assets/portal/images/resource/mouse.png') }}" alt="mouse.png">
	        		</div>
			    	</div>
			    </a>
				</div>
			</div>
		</div>
		<div class="container ovh">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center mb40">
						<h2>Imóveis Destacados</h2>
						<p>Conheça os imóveis mais procurados do portal</p>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="feature_property_slider">

						<div class="item">
							<a href="page-listing-single-v1.html">
								<div class="feat_property">
									<div class="thumb">
										<img class="img-whp" src="{{ asset('assets/portal/images/property/fp1.jpg') }}" alt="fp1.jpg">
										<div class="thmb_cntnt">
											<ul class="tag mb0">
												<li class="list-inline-item"><span>Aluguel</span></li>
												<li class="list-inline-item"><span>Venda</span></li>
											</ul>
											<ul class="icon mb0">
												<li class="list-inline-item"><span class="flaticon-heart text-white"></span></li>
											</ul>
											<span class="fp_price">R$ 187.000<small>,00</small></span>
										</div>
									</div>
									<div class="details">
										<div class="tc_content">
											<p class="text-thm">Apartmento</p>
											<h4>Cittá Splendore</h4>
											<p><span class="flaticon-placeholder"></span> Rua D, 155 - Despraiado, Cuiabá - MT</p>
											<ul class="prop_details mb0">
												<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> 4</span></li>
												<li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> 2</span></li>
												<li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> 58m²</span></li>
											</ul>
										</div>

										<div class="fp_footer">
											<ul class="fp_meta float-left mb0">
												<li class="list-inline-item"><span href="#"><img src="{{ asset('assets/portal/images/property/pposter1.png') }}" alt="pposter1.png"></span></li>
												<li class="list-inline-item"><span href="#">Rosa Imóveis</span></li>
											</ul>
										</div>
									</div>
								</div>
							</a>
						</div>

                        <div class="item">
							<a href="page-listing-single-v1.html">
								<div class="feat_property">
									<div class="thumb">
										<img class="img-whp" src="{{ asset('assets/portal/images/property/fp1.jpg') }}" alt="fp1.jpg">
										<div class="thmb_cntnt">
											<ul class="tag mb0">
												<li class="list-inline-item"><span>Aluguel</span></li>
												<li class="list-inline-item"><span>Venda</span></li>
											</ul>
											<ul class="icon mb0">
												<li class="list-inline-item"><span class="flaticon-heart text-white"></span></li>
											</ul>
											<span class="fp_price">R$ 187.000<small>,00</small></span>
										</div>
									</div>
									<div class="details">
										<div class="tc_content">
											<p class="text-thm">Apartmento</p>
											<h4>Cittá Splendore</h4>
											<p><span class="flaticon-placeholder"></span> Rua D, 155 - Despraiado, Cuiabá - MT</p>
											<ul class="prop_details mb0">
												<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> 4</span></li>
												<li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> 2</span></li>
												<li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> 58m²</span></li>
											</ul>
										</div>

										<div class="fp_footer">
											<ul class="fp_meta float-left mb0">
												<li class="list-inline-item"><span href="#"><img src="{{ asset('assets/portal/images/property/pposter1.png') }}" alt="pposter1.png"></span></li>
												<li class="list-inline-item"><span href="#">Rosa Imóveis</span></li>
											</ul>
										</div>
									</div>
								</div>
							</a>
						</div>

                        <div class="item">
							<a href="page-listing-single-v1.html">
								<div class="feat_property">
									<div class="thumb">
										<img class="img-whp" src="{{ asset('assets/portal/images/property/fp1.jpg') }}" alt="fp1.jpg">
										<div class="thmb_cntnt">
											<ul class="tag mb0">
												<li class="list-inline-item"><span>Aluguel</span></li>
												<li class="list-inline-item"><span>Venda</span></li>
											</ul>
											<ul class="icon mb0">
												<li class="list-inline-item"><span class="flaticon-heart text-white"></span></li>
											</ul>
											<span class="fp_price">R$ 187.000<small>,00</small></span>
										</div>
									</div>
									<div class="details">
										<div class="tc_content">
											<p class="text-thm">Apartmento</p>
											<h4>Cittá Splendore</h4>
											<p><span class="flaticon-placeholder"></span> Rua D, 155 - Despraiado, Cuiabá - MT</p>
											<ul class="prop_details mb0">
												<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> 4</span></li>
												<li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> 2</span></li>
												<li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> 58m²</span></li>
											</ul>
										</div>

										<div class="fp_footer">
											<ul class="fp_meta float-left mb0">
												<li class="list-inline-item"><span href="#"><img src="{{ asset('assets/portal/images/property/pposter1.png') }}" alt="pposter1.png"></span></li>
												<li class="list-inline-item"><span href="#">Rosa Imóveis</span></li>
											</ul>
										</div>
									</div>
								</div>
							</a>
						</div>

                        <div class="item">
							<a href="page-listing-single-v1.html">
								<div class="feat_property">
									<div class="thumb">
										<img class="img-whp" src="{{ asset('assets/portal/images/property/fp1.jpg') }}" alt="fp1.jpg">
										<div class="thmb_cntnt">
											<ul class="tag mb0">
												<li class="list-inline-item"><span>Aluguel</span></li>
												<li class="list-inline-item"><span>Venda</span></li>
											</ul>
											<ul class="icon mb0">
												<li class="list-inline-item"><span class="flaticon-heart text-white"></span></li>
											</ul>
											<span class="fp_price">R$ 187.000<small>,00</small></span>
										</div>
									</div>
									<div class="details">
										<div class="tc_content">
											<p class="text-thm">Apartmento</p>
											<h4>Cittá Splendore</h4>
											<p><span class="flaticon-placeholder"></span> Rua D, 155 - Despraiado, Cuiabá - MT</p>
											<ul class="prop_details mb0">
												<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> 4</span></li>
												<li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> 2</span></li>
												<li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> 58m²</span></li>
											</ul>
										</div>

										<div class="fp_footer">
											<ul class="fp_meta float-left mb0">
												<li class="list-inline-item"><span href="#"><img src="{{ asset('assets/portal/images/property/pposter1.png') }}" alt="pposter1.png"></span></li>
												<li class="list-inline-item"><span href="#">Rosa Imóveis</span></li>
											</ul>
										</div>
									</div>
								</div>
							</a>
						</div>

                        <div class="item">
							<a href="page-listing-single-v1.html">
								<div class="feat_property">
									<div class="thumb">
										<img class="img-whp" src="{{ asset('assets/portal/images/property/fp1.jpg') }}" alt="fp1.jpg">
										<div class="thmb_cntnt">
											<ul class="tag mb0">
												<li class="list-inline-item"><span>Aluguel</span></li>
												<li class="list-inline-item"><span>Venda</span></li>
											</ul>
											<ul class="icon mb0">
												<li class="list-inline-item"><span class="flaticon-heart text-white"></span></li>
											</ul>
											<span class="fp_price">R$ 187.000<small>,00</small></span>
										</div>
									</div>
									<div class="details">
										<div class="tc_content">
											<p class="text-thm">Apartmento</p>
											<h4>Cittá Splendore</h4>
											<p><span class="flaticon-placeholder"></span> Rua D, 155 - Despraiado, Cuiabá - MT</p>
											<ul class="prop_details mb0">
												<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> 4</span></li>
												<li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> 2</span></li>
												<li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> 58m²</span></li>
											</ul>
										</div>

										<div class="fp_footer">
											<ul class="fp_meta float-left mb0">
												<li class="list-inline-item"><span href="#"><img src="{{ asset('assets/portal/images/property/pposter1.png') }}" alt="pposter1.png"></span></li>
												<li class="list-inline-item"><span href="#">Rosa Imóveis</span></li>
											</ul>
										</div>
									</div>
								</div>
							</a>
						</div>

                        <div class="item">
							<a href="page-listing-single-v1.html">
								<div class="feat_property">
									<div class="thumb">
										<img class="img-whp" src="{{ asset('assets/portal/images/property/fp1.jpg') }}" alt="fp1.jpg">
										<div class="thmb_cntnt">
											<ul class="tag mb0">
												<li class="list-inline-item"><span>Aluguel</span></li>
												<li class="list-inline-item"><span>Venda</span></li>
											</ul>
											<ul class="icon mb0">
												<li class="list-inline-item"><span class="flaticon-heart text-white"></span></li>
											</ul>
											<span class="fp_price">R$ 187.000<small>,00</small></span>
										</div>
									</div>
									<div class="details">
										<div class="tc_content">
											<p class="text-thm">Apartmento</p>
											<h4>Cittá Splendore</h4>
											<p><span class="flaticon-placeholder"></span> Rua D, 155 - Despraiado, Cuiabá - MT</p>
											<ul class="prop_details mb0">
												<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> 4</span></li>
												<li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> 2</span></li>
												<li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> 58m²</span></li>
											</ul>
										</div>

										<div class="fp_footer">
											<ul class="fp_meta float-left mb0">
												<li class="list-inline-item"><span href="#"><img src="{{ asset('assets/portal/images/property/pposter1.png') }}" alt="pposter1.png"></span></li>
												<li class="list-inline-item"><span href="#">Rosa Imóveis</span></li>
											</ul>
										</div>
									</div>
								</div>
							</a>
						</div>

                        <div class="item">
							<a href="page-listing-single-v1.html">
								<div class="feat_property">
									<div class="thumb">
										<img class="img-whp" src="{{ asset('assets/portal/images/property/fp1.jpg') }}" alt="fp1.jpg">
										<div class="thmb_cntnt">
											<ul class="tag mb0">
												<li class="list-inline-item"><span>Aluguel</span></li>
												<li class="list-inline-item"><span>Venda</span></li>
											</ul>
											<ul class="icon mb0">
												<li class="list-inline-item"><span class="flaticon-heart text-white"></span></li>
											</ul>
											<span class="fp_price">R$ 187.000<small>,00</small></span>
										</div>
									</div>
									<div class="details">
										<div class="tc_content">
											<p class="text-thm">Apartmento</p>
											<h4>Cittá Splendore</h4>
											<p><span class="flaticon-placeholder"></span> Rua D, 155 - Despraiado, Cuiabá - MT</p>
											<ul class="prop_details mb0">
												<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> 4</span></li>
												<li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> 2</span></li>
												<li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> 58m²</span></li>
											</ul>
										</div>

										<div class="fp_footer">
											<ul class="fp_meta float-left mb0">
												<li class="list-inline-item"><span href="#"><img src="{{ asset('assets/portal/images/property/pposter1.png') }}" alt="pposter1.png"></span></li>
												<li class="list-inline-item"><span href="#">Rosa Imóveis</span></li>
											</ul>
										</div>
									</div>
								</div>
							</a>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Why Chose Us -->
	<section id="why-chose" class="whychose_us bgc-f7 pb30">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						<h2>Categorias</h2>
						<p>A gente te ajuda a transformar grandes sonhos em realidade</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-lg-4 col-xl-4">
					<div class="why_chose_us">
						<div class="icon">
							<span class="flaticon-home-1"></span>
						</div>
						<div class="details">
							<h4>Aceita Pets </h4>
							<p>Sabemos que cada dia mais os pets estão presentes nos lares</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xl-4">
					<div class="why_chose_us">
						<div class="icon">
							<span class="flaticon-high-five"></span>
						</div>
						<div class="details">
							<h4>Famílias pequenas</h4>
							<p>Imóveis práticos e adaptados à realidade de cada família</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xl-4">
					<div class="why_chose_us">
						<div class="icon">
							<span class="flaticon-profit"></span>
						</div>
						<div class="details">
							<h4>Menor valor</h4>
							<p>A busca pelo imóvel perfeito para você não precisa ser difícil</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <!--
	<section id="our-partners" class="our-partners">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						<h2>Nossos Parceiros</h2>
						<p>We only work with the best companies around the globe</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg">
					<div class="our_partner">
						<img class="img-fluid" src="images/partners/1.png" alt="1.png">
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg">
					<div class="our_partner">
						<img class="img-fluid" src="images/partners/2.png" alt="2.png">
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg">
					<div class="our_partner">
						<img class="img-fluid" src="images/partners/3.png" alt="3.png">
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg">
					<div class="our_partner">
						<img class="img-fluid" src="images/partners/4.png" alt="4.png">
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg">
					<div class="our_partner">
						<img class="img-fluid" src="images/partners/5.png" alt="5.png">
					</div>
				</div>
			</div>
		</div>
	</section>
    -->

	<!-- Start Partners -->
	<section class="start-partners bgc-thm pt50 pb50">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="start_partner tac-smd">
						<h2>Seja Parceiro</h2>
						<p>Receba mais contatos divulgando os seus imóveis na Rede</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="parner_reg_btn text-right tac-smd">
						<a class="btn btn-thm2" href="#">Quero me Cadastrar</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Footer -->
	<section class="footer_one">
		<div class="container">
			<div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<div class="footer_qlink_widget">
						<h4>Institucional</h4>
						<ul class="list-unstyled">
							<li><a href="#">A Rede</a></li>
							<li><a href="#">Como anunciar</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<div class="footer_qlink_widget">
						<h4>Busca Rápida</h4>
						<ul class="list-unstyled">
							<li><a href="#">Comprar</a></li>
							<li><a href="#">Alugar</a></li>
							<li><a href="#">Imóveis novos</a></li>
							<li><a href="#">Mapa do site</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<div class="footer_contact_widget">
						<h4>Ferramentas</h4>
						<ul class="list-unstyled">
							<li><a href="#">Simulador de Financiamento</a></li>
							<li><a href="#">Imóveis favoritos</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<div class="footer_social_widget">
						<h4>Acompanhe nossas redes</h4>
						<ul class="mb30">
							<li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
						</ul>
						<h4>Inscreva-se</h4>
						<form class="footer_mailchimp_form">
						 	<div class="form-row align-items-center">
							    <div class="col-auto">
							    	<input type="email" class="form-control mb-2" id="inlineFormInput" placeholder="Your email">
							    </div>
							    <div class="col-auto">
							    	<button type="submit" class="btn btn-primary mb-2"><i class="fa fa-angle-right"></i></button>
							    </div>
						  	</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Footer Bottom Area -->
	<section class="footer_middle_area pt40 pb40">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-xl-6">
					<div class="footer_menu_widget">
						<ul>
							<li class="list-inline-item"><a href="#">Home</a></li>
							<li class="list-inline-item"><a href="#">Comprar</a></li>
							<li class="list-inline-item"><a href="#">Alugar</a></li>
							<li class="list-inline-item"><a href="#">Lançamentos</a></li>
							<li class="list-inline-item"><a href="#">Financiamento</a></li>
							<li class="list-inline-item"><a href="#">Anunciar</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6 col-xl-6">
					<div class="copyright-widget text-right">
						<p>© 2023 Rede Imóveis - Encontre aqui o imóvel dos seus sonhos</p>
					</div>
				</div>
			</div>
		</div>
	</section>
<a class="scrollToHome" href="#"><i class="flaticon-arrows"></i></a>
</div>

<link rel="stylesheet" href="{{ asset('assets/portal/css/responsive.css') }}">
<!-- Wrapper End -->
<script type="text/javascript" src="{{ asset('assets/portal/js/jquery-3.3.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/jquery-migrate-3.0.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/jquery.mmenu.all.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/ace-responsive-menu.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/isotop.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/snackbar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/simplebar.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/parallax.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/scrollto.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/jquery-scrolltofixed-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/jquery.counterup.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/slider.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/pricing-slider.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/timepicker.js') }}"></script>
<!-- Custom script for all pages -->
<script src="https://kit.fontawesome.com/952ef81d56.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/script.js') }}"></script>
</body>
</html>
