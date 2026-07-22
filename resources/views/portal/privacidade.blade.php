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
						    <li class="breadcrumb-item active" aria-current="page">Política de Privacidade</li>
						</ol>
						<h4 class="breadcrumb_title">Política de Privacidade</h4>
					</div>
				</div>
			</div>
		</div>
	</section>

    <!-- Our Privacy Policy -->
	<section class="our-terms bgc-f7">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xl-12">
					<div class="terms_condition_grid">
						<div class="grids mb30">
							<h4 class="mb20">1. Coleta de Dados Pessoais</h4>
					    	<p class="mb20">Em conformidade com a Lei Geral de Proteção de Dados (LGPD), a <strong>Rede Imóveis MT</strong> coleta e armazena apenas as informações estritamente necessárias para prestação de nossos serviços, como nome, e-mail e telefone de contato quando você preenche nossos formulários de interesse, simulação ou cadastro de parceiro.</p>
						</div>
						<div class="grids mb30">
							<h4 class="mb20">2. Uso e Compartilhamento de Dados</h4>
					    	<p class="mb20">Os seus dados serão utilizados única e exclusivamente para facilitar o contato entre você e o anunciante ou parceiro responsável pelo imóvel de seu interesse. A Rede Imóveis MT possui uma política rígida contra a venda ou compartilhamento indevido de suas informações para terceiros alheios às nossas transações comerciais.</p>
						</div>
						<div class="grids mb30">
							<h4 class="mb20">3. Direitos do Titular (LGPD)</h4>
					    	<p class="mb20">Você tem o direito de solicitar a qualquer momento a visualização, alteração ou exclusão completa de seus dados de nossa base. Para isso, basta entrar em contato através dos nossos canais de atendimento oficiais.</p>
						</div>
						<div class="grids mb30">
							<h4 class="mb20">4. Cookies e Tecnologias de Rastreamento</h4>
					    	<p class="mb20">Nosso portal pode utilizar cookies para melhorar a sua experiência de navegação e coletar dados analíticos anônimos. Ao continuar navegando, você concorda com o uso de cookies para esses fins estatísticos e de melhoria contínua da plataforma.</p>
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
