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
						    <li class="breadcrumb-item active" aria-current="page">Indicativos Imobiliários</li>
						</ol>
						<h4 class="breadcrumb_title">Pesquisa de Mercado</h4>
					</div>
				</div>
			</div>
		</div>
	</section>

    <section class="our-faq bgc-f7">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						<h2 class="mt0">Indicativos Imobiliários</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="faq_content">
						<div class="faq_according">
							<div class="accordion" id="accordionExample">
							  	<div class="card">
								    <div class="card-header" id="headingOne">
								    	<h2 class="mb-0">
								        	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">2026</button>
								   		</h2>
								    </div>
								    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
									    <div class="card-body">
							        		
											<div class="ui_kit_table">
												<table class="table">
													<thead class="thead-light">
														<tr>
															<th scope="col">Data de Publicação</th>
															<th scope="col">Mês</th>
															<th scope="col">Ano</th>
															<th scope="col">Tipo</th>
															<th scope="col">Arquivo</th>
														</tr>
													</thead>
													<tbody>
														

													</tbody>
												</table>
											</div>


									    </div>
								    </div>
							    </div>

								<div class="card">
								    <div class="card-header active" id="headingOne">
								    	<h2 class="mb-0">
								        	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">2025</button>
								   		</h2>
								    </div>
								    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
									    <div class="card-body">
							        		
											<div class="ui_kit_table">
												<table class="table">
													<thead class="thead-light">
														<tr>
															<th scope="col">Data de Publicação</th>
															<th scope="col">Mês</th>
															<th scope="col">Ano</th>
															<th scope="col">Tipo</th>
															<th scope="col">Arquivo</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>30/10/2025</td>
															<td>Outubro</td>
															<td>2025</td>
															<td><div class="residencial"><i class="bi bi-house-door"></i> Residencial</div></td>
															<td><a href="uploads/indicativos/Secovi-MT_-_IND_MOB_RESIDENCIAL.pdf" target="_blank"><button type="button" class="btn btn-lg btn-info btn-download"><i class="bi bi-box-arrow-down"></i> Download</button></a></td>
														</tr>

														<tr>
															<td>30/10/2025</td>
															<td>Outubro</td>
															<td>2025</td>
															<td><div class="comercial"><i class="bi bi-bag"></i> Comercial</div></td>
															<td><a href="uploads/indicativos/Secovi-MT_-_IND_MOB_COMERCIAL.pdf" target="_blank"><button type="button" class="btn btn-lg btn-info btn-download"><i class="bi bi-box-arrow-down"></i> Download</button></a></td>
														</tr>

														<tr>
															<td>30/08/2025</td>
															<td>Agosto</td>
															<td>2025</td>
															<td><div class="residencial"><i class="bi bi-house-door"></i> Residencial</div></td>
															<td><a href="uploads/indicativos/08 2025 Secovi-MT_-_IND_MOB_RESIDENCIAL.pdf" target="_blank"><button type="button" class="btn btn-lg btn-info btn-download"><i class="bi bi-box-arrow-down"></i> Download</button></a></td>
														</tr>

														<tr>
															<td>25/11/2025</td>
															<td>Novembro</td>
															<td>2025</td>
															<td><div class="comercial"><i class="bi bi-bag"></i> Comercial</div></td>
															<td><a href="uploads/indicativos/08 2025 Secovi-MT_-_IND_MOB_COMERCIAL.pdf" target="_blank"><button type="button" class="btn btn-lg btn-info btn-download"><i class="bi bi-box-arrow-down"></i> Download</button></a></td>
														</tr>

													</tbody>
												</table>
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
