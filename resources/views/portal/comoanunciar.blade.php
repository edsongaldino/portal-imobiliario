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
						    <li class="breadcrumb-item active" aria-current="page">Como Anunciar meu Imóvel</li>
						</ol>
						<h4 class="breadcrumb_title">Como Anunciar meu Imóvel</h4>
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
							<h4 class="mb20">Por que anunciar conosco?</h4>
					    	<p class="mb20">A <strong>Rede Imóveis MT</strong> é o portal imobiliário que mais cresce na região, oferecendo aos proprietários e corretores parceiros uma plataforma moderna e eficiente para divulgar seus imóveis.</p>
					        <p>Garantimos uma visibilidade diferenciada para o seu imóvel, atraindo milhares de visitantes diariamente que estão em busca de comprar ou alugar na região do Mato Grosso. Ao anunciar conosco, você coloca seu imóvel nas mãos de clientes reais e aumenta expressivamente suas chances de fechar negócio de maneira rápida e segura.</p>
						</div>

						<div class="grids mb30">
							<h4 class="mb20">Como funciona o nosso passo a passo</h4>
							<ol style="list-style-type: decimal; padding-left: 20px;">
								<li class="mb15"><strong>1. Cadastro do Imóvel:</strong> Você entra em contato conosco ou faz o pré-cadastro informando os dados do imóvel, incluindo fotos de qualidade, descrição detalhada e o valor desejado.</li>
								<li class="mb15"><strong>2. Análise da Nossa Equipe:</strong> Os dados são enviados para nossa equipe interna. Nós realizamos uma triagem rápida para validar as informações, e se tudo estiver nos conformes, o anúncio é aprovado.</li>
								<li class="mb15"><strong>3. Publicação e Divulgação:</strong> Seu imóvel é publicado em nosso portal e ganha visibilidade instantânea. Clientes interessados enviarão mensagens que chegarão diretamente para os nossos corretores credenciados que conduzirão o fechamento com excelência.</li>
							</ol>
						</div>

						<div class="grids mb30 text-center mt50">
							<h4 class="mb20">Pronto para fechar negócio?</h4>
							<p>Não perca mais tempo. Cadastre-se como parceiro ou entre em contato com nossa equipe agora mesmo.</p>
							<a href="#footer" class="btn btn-thm mt15">Quero me Cadastrar</a>
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
