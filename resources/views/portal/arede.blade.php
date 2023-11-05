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

				<div class="col-lg-12">
					<div class="breadcrumb_content style2 mt30-767 mb30-767">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Home</a></li>
							<li class="breadcrumb-item active text-thm" aria-current="page">Rede de Imóveis do Mato Grosso</li>
						</ol>
						<h2 class="breadcrumb_title">358 anunciantes ativos</h2>
					</div>
				</div>

				@foreach ($anunciantes as $anunciante)
				<div class="col-md-12 col-lg-6">
					<div class="row">
						<div class="col-lg-12">
							<div class="feat_property list style2 agent">
								<div class="thumb">
									<a href="/lista-imoveis/{{ $anunciante->id }}/{{ Helper::url_amigavel($anunciante->nome) }}" target="_blank"><img class="img-whp logo-anunciante" src="{{ url('anunciante/'.$anunciante->id.'/logo') }}" alt="{{ $anunciante->nome }}"></a>
									<div class="thmb_cntnt">
										<ul class="tag mb0">
											<li class="list-inline-item dn"></li>
											<li class="list-inline-item"><a href="#">{{ $anunciante->anuncios->count() }} anúncios</a></li>
										</ul>
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<h4>{{ $anunciante->nome }}</h4>
										<p class="text-thm">{{ $anunciante->tipo_anunciante }}</p>
										<ul class="prop_details mb0">
											<li><a href="#">Creci: {{ $anunciante->creci }}</a></li>
											<li><a href="#">Whatsapp: {{ $anunciante->whatsapp }}</a></li>
											<li><a href="#">Comercial: {{ $anunciante->telefone_comercial }}</a></li>
											<li><a href="#">Email: {{ $anunciante->email }}</a></li>
										</ul>
									</div>
									<div class="fp_footer">
									<a href="/lista-imoveis/{{ $anunciante->id }}/{{ Helper::url_amigavel($anunciante->nome) }}" target="_blank"><div class="fp_pdate float-right text-thm">Ver todos os anúncios <i class="fa fa-angle-right"></i></div></a>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
				@endforeach

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
