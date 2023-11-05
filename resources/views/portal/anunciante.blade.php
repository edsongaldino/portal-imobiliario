<!DOCTYPE html>
<html dir="ltr" lang="pt-br">
<head>
    @include('includes.portal.head')
</head>
<body>
<div class="wrapper">
	<div class="preloader"></div>
    @php $menu = "style2"; $logo = "logo2"; @endphp
	@include('includes.portal.menu')

    <!-- Inner Page Breadcrumb -->
	<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xl-6">
					<div class="breadcrumb_content">
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="#">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Rede de Imóveis do Mato Grosso</li>
						</ol>
						<h4 class="breadcrumb_title">Rede Imóveis MT</h4>
					</div>
				</div>
			</div>
		</div>
	</section>

    <!-- Agent Single Grid View -->
	<section class="our-agent-single bgc-f7 pb30-991">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="row">
						<div class="col-lg-12">
							<div class="breadcrumb_content style2 mt30-767 mb30-767">
								<ol class="breadcrumb">
								    <li class="breadcrumb-item"><a href="#">Home</a></li>
								    <li class="breadcrumb-item active text-thm" aria-current="page">Agent Single</li>
								</ol>
								<h2 class="breadcrumb_title">Christopher Pakulla</h2>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="feat_property list style2 agent">
								<div class="thumb">
									<img class="img-whp" src="images/team/11.jpg" alt="11.jpg">
									<div class="thmb_cntnt">
										<ul class="tag mb0">
											<li class="list-inline-item dn"></li>
											<li class="list-inline-item"><a href="#">2 Listings</a></li>
										</ul>
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<h4>Christopher Pakulla</h4>
										<p class="text-thm">Agent</p>
										<ul class="prop_details mb0">
											<li><a href="#">Office: 134 456 3210</a></li>
											<li><a href="#">Mobile: 891 456 9874</a></li>
											<li><a href="#">Fax: 342 654 1258</a></li>
											<li><a href="#">Email: pakulla@findhouse.com</a></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
										</ul>
										<div class="fp_pdate float-right text-thm">Ver todos os anúncios <i class="fa fa-angle-right"></i></div>
									</div>
								</div>
							</div>
							<div class="shop_single_tab_content style2 mt30">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
									    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Descrição</a>
									</li>
									<li class="nav-item">
									    <a class="nav-link" id="listing-tab" data-toggle="tab" href="#listing" role="tab" aria-controls="listing" aria-selected="false">Anúncios</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent2">
									<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
										<div class="product_single_content">
											<div class="mbp_pagination_comments">
												<div class="mbp_first media">
													<div class="media-body">
												    	<p class="mb25">Evans Tower very high demand corner junior one bedroom plus a large balcony boasting full open NYC views. You need to see the views to believe them. Mint condition with new hardwood floors. Lots of closets plus washer and dryer.</p>
												    	<p class="mt10 mb0">Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space.</p>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade row pl15 pl0-1199 pr15 pr0-1199" id="listing" role="tabpanel" aria-labelledby="listing-tab">
										<div class="col-lg-12">
											<div class="feat_property list style2 hvr-bxshd bdrrn mb10 mt20">
												<div class="thumb">
													<img class="img-whp" src="images/property/fp1.jpg" alt="fp1.jpg">
													<div class="thmb_cntnt">
														<ul class="icon mb0">
															<li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
															<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
														</ul>
													</div>
												</div>
												<div class="details">
													<div class="tc_content">
														<div class="dtls_headr">
															<ul class="tag">
																<li class="list-inline-item"><a href="#">For Rent</a></li>
																<li class="list-inline-item"><a href="#">Featured</a></li>
															</ul>
															<a class="fp_price" href="#">$13,000<small>/mo</small></a>
														</div>
														<p class="text-thm">Apartment</p>
														<h4>Renovated Apartment</h4>
														<p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los Angeles, CA 90015</p>
														<ul class="prop_details mb0">
															<li class="list-inline-item"><a href="#">Beds: 4</a></li>
															<li class="list-inline-item"><a href="#">Baths: 2</a></li>
															<li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
														</ul>
													</div>
													<div class="fp_footer">
														<ul class="fp_meta float-left mb0">
															<li class="list-inline-item"><a href="#"><img src="images/property/pposter1.png" alt="pposter1.png"></a></li>
															<li class="list-inline-item"><a href="#">Ali Tufan</a></li>
														</ul>
														<div class="fp_pdate float-right">4 years ago</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="feat_property list style2 hvr-bxshd bdrrn mb10">
												<div class="thumb">
													<img class="img-whp" src="images/property/fp3.jpg" alt="fp3.jpg">
													<div class="thmb_cntnt">
														<ul class="icon mb0">
															<li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
															<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
														</ul>
													</div>
												</div>
												<div class="details">
													<div class="tc_content">
														<div class="dtls_headr">
															<ul class="tag">
																<li class="list-inline-item"><a href="#">For Rent</a></li>
																<li class="list-inline-item"><a href="#">Featured</a></li>
															</ul>
															<a class="fp_price" href="#">$13,000<small>/mo</small></a>
														</div>
														<p class="text-thm">Apartment</p>
														<h4>Luxury Family Home</h4>
														<p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los Angeles, CA 90015</p>
														<ul class="prop_details mb0">
															<li class="list-inline-item"><a href="#">Beds: 4</a></li>
															<li class="list-inline-item"><a href="#">Baths: 2</a></li>
															<li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
														</ul>
													</div>
													<div class="fp_footer">
														<ul class="fp_meta float-left mb0">
															<li class="list-inline-item"><a href="#"><img src="images/property/pposter1.png" alt="pposter1.png"></a></li>
															<li class="list-inline-item"><a href="#">Ali Tufan</a></li>
														</ul>
														<div class="fp_pdate float-right">4 years ago</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="feat_property list style2 hvr-bxshd bdrrn">
												<div class="thumb">
													<img class="img-whp" src="images/property/fp2.jpg" alt="fp2.jpg">
													<div class="thmb_cntnt">
														<ul class="icon mb0">
															<li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
															<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
														</ul>
													</div>
												</div>
												<div class="details">
													<div class="tc_content">
														<div class="dtls_headr">
															<ul class="tag">
																<li class="list-inline-item"><a href="#">For Rent</a></li>
																<li class="list-inline-item"><a href="#">Featured</a></li>
															</ul>
															<a class="fp_price" href="#">$13,000<small>/mo</small></a>
														</div>
														<p class="text-thm">Apartment</p>
														<h4>Gorgeous Villa Bay View</h4>
														<p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los Angeles, CA 90015</p>
														<ul class="prop_details mb0">
															<li class="list-inline-item"><a href="#">Beds: 4</a></li>
															<li class="list-inline-item"><a href="#">Baths: 2</a></li>
															<li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
														</ul>
													</div>
													<div class="fp_footer">
														<ul class="fp_meta float-left mb0">
															<li class="list-inline-item"><a href="#"><img src="images/property/pposter1.png" alt="pposter1.png"></a></li>
															<li class="list-inline-item"><a href="#">Ali Tufan</a></li>
														</ul>
														<div class="fp_pdate float-right">4 years ago</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	@include('includes.portal.footer')

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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLZYFMbNKXu2gyC_yxbdEDGxA6G0LSNu8&callback=initMap"type="text/javascript"></script>

<!-- Custom script for all pages -->
<script src="https://kit.fontawesome.com/952ef81d56.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/script.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/custom.js') }}"></script>

</body>
</html>
