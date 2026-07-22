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
						    <li class="breadcrumb-item active" aria-current="page">Simular Financiamento</li>
						</ol>
						<h4 class="breadcrumb_title">Simular Financiamento</h4>
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
							<h4 class="mb20">Realize o sonho da casa própria</h4>
					    	<p class="mb20">O financiamento imobiliário é a linha de crédito mais utilizada para a compra de imóveis, permitindo que você adquira a sua casa, apartamento, terreno ou sala comercial com prazos de pagamento que cabem no seu bolso.</p>
					        <p>Entender o seu limite de crédito e o valor das parcelas é o primeiro passo antes de fechar negócio. Faça uma simulação rápida e sem compromisso nos principais bancos do país para descobrir a melhor taxa para o seu perfil financeiro.</p>
						</div>

                        <div class="grids mb30 mt40">
                            <h4 class="mb20 text-center">Simuladores Oficiais</h4>
                            <p class="text-center mb30">Acesse o simulador do seu banco de preferência através dos links abaixo:</p>
                            
                            <div class="row justify-content-center">
                                <div class="col-sm-6 col-md-4 col-lg-3 mb20">
                                    <a href="https://www8.caixa.gov.br/siopiinternet-web/simulaOperacaoInternet.do?method=inicializarCasoUso" target="_blank" class="btn btn-block btn-thm" style="background-color: #005CA9; color: #fff; padding: 15px;">Simulador CAIXA</a>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3 mb20">
                                    <a href="https://www42.bb.com.br/portalbb/imobiliario/creditoimobiliario/simular,802,2250,2250.bbx" target="_blank" class="btn btn-block btn-thm" style="background-color: #F8D117; color: #003da5; padding: 15px;">Simulador BB</a>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3 mb20">
                                    <a href="https://banco.bradesco/html/classic/produtos-servicos/emprestimo-e-financiamento/encontre-seu-credito/simuladores-imoveis.shtm" target="_blank" class="btn btn-block btn-thm" style="background-color: #CC092F; color: #fff; padding: 15px;">Simulador Bradesco</a>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3 mb20">
                                    <a href="https://www.itau.com.br/emprestimos-financiamentos/credito-imobiliario/simulador/" target="_blank" class="btn btn-block btn-thm" style="background-color: #EC7000; color: #fff; padding: 15px;">Simulador Itaú</a>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3 mb20">
                                    <a href="https://www.santander.com.br/creditos-e-financiamentos/para-sua-casa/credito-imobiliario" target="_blank" class="btn btn-block btn-thm" style="background-color: #EC0000; color: #fff; padding: 15px;">Simulador Santander</a>
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
