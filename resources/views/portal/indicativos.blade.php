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
                                @forelse($indicativosPorAno as $ano => $indicativosAno)
							  	<div class="card">
								    <div class="card-header {{ $loop->first ? 'active' : '' }}" id="heading{{ $ano }}" data-toggle="collapse" data-target="#collapse{{ $ano }}" style="cursor: pointer;">
								    	<h2 class="mb-0">
								        	<button class="btn btn-link {{ $loop->first ? '' : 'collapsed' }}" type="button" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="collapse{{ $ano }}">{{ $ano }}</button>
								   		</h2>
								    </div>
								    <div id="collapse{{ $ano }}" class="collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="heading{{ $ano }}" data-parent="#accordionExample" style="">
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
                                                        @foreach($indicativosAno as $indicativo)
														<tr>
															<td>{{ date('d/m/Y', strtotime($indicativo->data_publicacao)) }}</td>
															<td>{{ $indicativo->mes }}</td>
															<td>{{ $indicativo->ano }}</td>
															<td>
                                                                @if($indicativo->tipo == 'Residencial')
                                                                <div class="residencial"><i class="bi bi-house-door"></i> Residencial</div>
                                                                @else
                                                                <div class="comercial"><i class="bi bi-bag"></i> Comercial</div>
                                                                @endif
                                                            </td>
															<td><a href="{{ asset($indicativo->arquivo) }}" target="_blank"><button type="button" class="btn btn-lg btn-info btn-download"><i class="bi bi-box-arrow-down"></i> Download</button></a></td>
														</tr>
                                                        @endforeach
													</tbody>
												</table>
											</div>
									    </div>
								    </div>
							    </div>
                                @empty
                                <div class="text-center py-5 text-muted">
                                    Nenhum indicativo cadastrado até o momento.
                                </div>
                                @endforelse
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
