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
						    <li class="breadcrumb-item active" aria-current="page">Mapa do Site</li>
						</ol>
						<h4 class="breadcrumb_title">Mapa do Site</h4>
					</div>
				</div>
			</div>
		</div>
	</section>

    <!-- Our Terms & Conditions -->
	<section class="our-terms bgc-f7">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xl-12">
					<div class="terms_condition_grid">
						<div class="grids mb30">
							<h4 class="mb20">Páginas e Sessões</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Imóveis</h5>
                                    <ul class="list-unstyled mt10" style="line-height: 2.5;">
                                        <li><a href="{{ url('/lista-imoveis/venda') }}"><i class="fa fa-angle-right mr10"></i>Comprar</a></li>
                                        <li><a href="{{ url('/lista-imoveis/locacao') }}"><i class="fa fa-angle-right mr10"></i>Alugar</a></li>
                                        <li><a href="{{ url('/lista-imoveis/novos') }}"><i class="fa fa-angle-right mr10"></i>Lançamentos</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <h5>Institucional</h5>
                                    <ul class="list-unstyled mt10" style="line-height: 2.5;">
                                        <li><a href="{{ url('/rede-imoveis-mt') }}"><i class="fa fa-angle-right mr10"></i>A Rede</a></li>
                                        <li><a href="{{ url('/rede-imoveis-mt/como-anunciar') }}"><i class="fa fa-angle-right mr10"></i>Como Anunciar</a></li>
                                        <li><a href="{{ url('/rede-imoveis-mt/termos-de-uso') }}"><i class="fa fa-angle-right mr10"></i>Termos de Uso</a></li>
                                        <li><a href="{{ url('/rede-imoveis-mt/politica-de-privacidade') }}"><i class="fa fa-angle-right mr10"></i>Política de Privacidade</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <h5>Ferramentas e Contato</h5>
                                    <ul class="list-unstyled mt10" style="line-height: 2.5;">
                                        <li><a href="{{ url('/simular-financiamento-de-imoveis') }}"><i class="fa fa-angle-right mr10"></i>Simular Financiamento</a></li>
                                        <li><a href="{{ url('/indicativos-imobiliarios') }}"><i class="fa fa-angle-right mr10"></i>Indicativos Imobiliários</a></li>
                                        <li><a href="{{ url('/imoveis-favoritos') }}"><i class="fa fa-angle-right mr10"></i>Imóveis Favoritos</a></li>
                                        <li><a href="{{ url('/cadastro') }}"><i class="fa fa-angle-right mr10"></i>Seja Parceiro</a></li>
                                    </ul>
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
