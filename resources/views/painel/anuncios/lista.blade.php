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
				<div class="col-sm-12 col-lg-8 col-xl-10 maxw100flex-992">
					<div class="row">

						<div class="col-lg-4 col-xl-4 mb10">
							<div class="breadcrumb_content style2 mb30-991">
								<h2 class="breadcrumb_title">Meus anúncios</h2>
								<p>Lista de anúncios cadastrados no portal</p>
							</div>
						</div>
						<div class="col-lg-8 col-xl-8">
							<div class="candidate_revew_select style2 text-right mb30-991">
								<ul class="mb0">
									<li class="list-inline-item">
										<div class="candidate_revew_search_box course fn-520">
											<form class="form-inline my-2">
										    	<input class="form-control mr-sm-2" type="search" placeholder="Buscar por código" aria-label="Search">
										    	<button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass"></span></button>
										    </form>
										</div>
									</li>
                                    <li class="list-inline-item">
										<div class="candidate_revew_search_box course fn-520">
											<form class="form-inline my-2">
										    	<input class="form-control mr-sm-2" type="search" placeholder="Buscar por palavra chave" aria-label="Search">
										    	<button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass"></span></button>
										    </form>
										</div>
									</li>
									<li class="list-inline-item">
										<select class="selectpicker show-tick">
											<option>Ordenar por:</option>
											<option>Mais Recentes</option>
											<option>Mais Antigos</option>
										</select>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="my_dashboard_review mb40">
								<div class="property_table">
									<div class="table-responsive mt0">
										<table class="table">
											<thead class="thead-light">
										    	<tr>
										    		<th scope="col">Título do Anúncio / Informações</th>
										    		<th scope="col">Data de Publicação</th>
										    		<th scope="col">Status</th>
										    		<th scope="col">Visualizações</th>
										    		<th scope="col">Ações</th>
										    	</tr>
											</thead>
											<tbody>

                                                @foreach ($anuncios as $anuncio)

										    	<tr>
										    		<th scope="row">
														<div class="feat_property list favorite_page style2">
															<div class="thumb">
																<img class="img-whp" src="{{ $anuncio->fotos->first()->arquivo ?? '' }}" alt="fp1.jpg">
																<div class="thmb_cntnt">
																	<ul class="tag mb0">
																		<li class="list-inline-item dn">{{ $anuncio->tipo->nome }}</li>
																		<li class="list-inline-item"><a href="#">{{ $anuncio->transacao }}</a></li>
																	</ul>
																</div>
															</div>
															<div class="details">
																<div class="tc_content">
																	<h4>{{ $anuncio->titulo }}</h4>
																	<p><span class="flaticon-placeholder"></span> {{ $anuncio->endereco->logradouro_endereco }} - {{ $anuncio->endereco->bairro_endereco }}, {{ $anuncio->endereco->cidade->nome_cidade }} - {{ $anuncio->endereco->cidade->estado->uf_estado }}</p>
																	<a class="fp_price text-thm" href="#">R$ {{ Helper::converte_valor_real($anuncio->valor_venda) }}</a>
																</div>
															</div>
														</div>
										    		</th>
										    		<td>{{ $anuncio->updated_at }}</td>
										    		<td><span class="status_tag badge">{{ $anuncio->situacao }}</span></td>
										    		<td>2.345</td>
										    		<td>
										    			<ul class="view_edit_delete_list mb0">
                                                            <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Visualizar"><a href="#"><span class="flaticon-view"></span></a></li>
										    				<li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Edit"><a href="/painel/anuncios/{{ $anuncio->id }}/editar"><span class="flaticon-edit"></span></a></li>
										    				<li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Delete"><a href="#"><span class="flaticon-garbage"></span></a></li>
										    			</ul>
										    		</td>
										    	</tr>

										    	@endforeach
											</tbody>
										</table>
									</div>

                                    {{ $anuncios->links() }}

                                    <!--
									<div class="mbp_pagination">
										<ul class="page_navigation">
										    <li class="page-item disabled">
										    	<a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Prev</a>
										    </li>
										    <li class="page-item"><a class="page-link" href="#">1</a></li>
										    <li class="page-item active" aria-current="page">
										    	<a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
										    </li>
										    <li class="page-item"><a class="page-link" href="#">3</a></li>
										    <li class="page-item"><a class="page-link" href="#">...</a></li>
										    <li class="page-item"><a class="page-link" href="#">29</a></li>
										    <li class="page-item">
										    	<a class="page-link" href="#"><span class="flaticon-right-arrow"></span></a>
										    </li>
										</ul>
									</div>
                                    -->
								</div>
							</div>
						</div>
					</div>

					<div class="row mt10">
						<div class="col-lg-12">
							<div class="copyright-widget text-center">
								<p>© 2020 Find House. Made with love.</p>
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
