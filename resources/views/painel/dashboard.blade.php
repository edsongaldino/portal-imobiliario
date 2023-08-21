<!DOCTYPE html>
<html dir="ltr" lang="pt-br">
<head>
	@include('includes.painel.head')
</head>
<body>
<div class="wrapper">
	<div class="preloader"></div>

	@include('includes.painel.menu')

	<!-- Our Dashbord -->
	<section class="our-dashbord dashbord bgc-f7 pb50">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
				<div class="col-lg-9 col-xl-10 maxw100flex-992">
					<div class="row">
						<div class="col-lg-12 mb10">
							<div class="breadcrumb_content style2">
								<h2 class="breadcrumb_title">Olá, {{ $usuario->name }}!</h2>
								<p>Que bom ver você por aqui novamente!</p>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one">
								<div class="icon"><span class="flaticon-home"></span></div>
								<div class="detais">
									<div class="timer">{{ $usuario->anunciante->anuncios->count() }}</div>
									<p>Anúncios</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one style2">
								<div class="icon"><span class="flaticon-view"></span></div>
								<div class="detais">
									<div class="timer">2458</div>
									<p>Visualizações</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one style3">
								<div class="icon"><span class="flaticon-chat"></span></div>
								<div class="detais">
									<div class="timer">{{ Helper::GetTotalLeadsAnunciante($usuario->anunciante->id) }}</div>
									<p>Leads</p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one style4">
								<div class="icon"><span class="flaticon-heart"></span></div>
								<div class="detais">
									<div class="timer">18</div>
									<p>Total Favoritos</p>
								</div>
							</div>
						</div>
						<div class="col-xl-7">
							<div class="application_statics">
								<h4>Estatísticas de Acesso</h4>
								<div class="c_container"></div>
							</div>
						</div>
						<div class="col-xl-5">
							<div class="recent_job_activity">
								<h4 class="title">Resumo (Últimas importações) </h4>
								<a href="#"><div class="btn-ver-resumo"><span class="flaticon-view"></span> Ver Todos</div></a>
                                @if (isset($loganuncios))
                                @foreach ($loganuncios as $log)
                                    <div class="grid {{ $log->tipo }}">
                                        <ul>
                                            <li class="list-inline-item"><div class="icon"><span class="flaticon-home"></span></div></li>
                                            <li class="list-inline-item"><p><strong>{{ $log->id_externo }} - {{ $log->titulo }}</strong></p></li>
                                        </ul>
                                    </div>
                                @endforeach
                                @endif



							</div>
						</div>
					</div>


					<div class="row mt50">
						<div class="col-lg-6 offset-lg-3">
							<div class="copyright-widget text-center">
								<p>© 2023 - Painel Administrativo.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<a class="scrollToHome" href="#"><i class="flaticon-arrows"></i></a>
</div>
<!-- Wrapper End -->
<script type="text/javascript" src="{{ asset('assets/portal/js/jquery-3.3.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/jquery-migrate-3.0.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/jquery.mmenu.all.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/ace-responsive-menu.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/chart.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/chart-custome.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/snackbar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/simplebar.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/parallax.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/scrollto.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/jquery-scrolltofixed-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/jquery.counterup.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/progressbar.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/slider.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/timepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/dashboard-script.js') }}"></script>
<!-- Custom script for all pages -->
<script type="text/javascript" src="{{ asset('assets/portal/js/script.js') }}"></script>
</body>
</html>
