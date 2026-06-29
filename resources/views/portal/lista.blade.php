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

    	<!-- Listing Grid View -->
	<section class="our-listing bgc-f7 pb30-991">
		<div class="container" style="max-width: 85% !important;">
			<div class="row">
				<div class="col-lg-6">
					<div class="breadcrumb_content style2 mb0-991">
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="#">Início</a></li>
						    <li class="breadcrumb-item active text-thm" aria-current="page">Lista</li>
						</ol>
						<h2 class="breadcrumb_title">{{ $total }} imóveis encontrados em sua busca</h2>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="listing_list_style mb20-xsd tal-991">
						<ul class="mb0" style="display:none;">
							<li class="list-inline-item"><a href="#"><span class="fa fa-th-large"></span></a></li>
							<li class="list-inline-item"><a href="#"><span class="fa fa-th-list"></span></a></li>
						</ul>
					</div>
					<div class="dn db-991 mt30 mb0">
						<div id="main2">
							<span id="open2" class="flaticon-filter-results-button filter_open_btn style2"> Mostrar filtro</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-3 col-xl-3">
					<form action="{{ url('imoveis-buscar') }}" method="GET" name="FormBusca" id="FormBuscaCompleta">
						<input type="hidden" name="transacao" value="{{ $request->transacao }}">
						<input type="hidden" name="ordenacao" id="inputOrdenacao" value="{{ $request->ordenacao ?? 'relevantes' }}">
						<input type="hidden" name="por_pagina" id="inputPorPagina" value="{{ $request->por_pagina ?? '24' }}">
						<div class="sidebar_listing_grid1 dn-991">
							<div class="sidebar_listing_list busca-rapida">
								<div class="sidebar_advanced_search_widget">
									<h4 class="title"><span class="flaticon-magnifying-glass"></span> Busca rápida</h4>
									<ul class="sasw_list mb0">
										<li class="search_area">
										    <div class="form-group">
										    	<input type="text" name="palavra_chave" class="form-control" placeholder="Palavra chave" value="{{ $request->palavra_chave }}">
										    </div>
										</li>

										<li class="search_area">
										    <div class="form-group">
										    	<select class="selectpicker" name="localizacao" id="localizacao" data-live-search="true" data-width="100%">
                                                    <option value="">Todas as Cidades</option>
                                                    @foreach ($cidades as $cidade)
                                                        <option data-tokens="{{ $cidade->nome_cidade }}" value="{{ $cidade->id }}" @if($request->localizacao == $cidade->id) selected @endif>{{ $cidade->nome_cidade }} - {{ $cidade->estado->uf_estado }} ({{ Helper::GetTotalAnunciosByCidade($cidade->id, null, $request->transacao ?? 'Venda')}})</option>
                                                    @endforeach
                                                </select>
										    </div>
										</li>

										<li class="select-tipo">
											<div class="search_option_two">
												<div class="ui_kit_select_search">
													<select name="tipo_imovel[]" id="tipo_imovel" class="selectpicker" multiple data-live-search="true" title="Tipo do Imóvel">
														@foreach ($tipos as $tipo)
														<option value="{{ $tipo->id }}" @if(is_array($request->tipo_imovel) && in_array($tipo->id, $request->tipo_imovel)) selected @endif>{{ $tipo->nome }} ({{ $tipo->finalidade }})</option>
														@endforeach
													</select>
												</div>
											</div>
										</li>
										
										<li>
											<div class="search_option_button">
											    <button type="submit" id="btnSubmitFiltrosTopo" class="btn btn-block btn-thm font-weight-bold" style="border-radius: 10px; padding: 12px 15px; font-size: 15px;">Buscar {{ $total }} imóveis</button>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						
						<div class="sidebar_listing_grid1 dn-991">
							<div class="sidebar_listing_list">
								<div class="sidebar_advanced_search_widget">
									<h4 class="title"><span class="flaticon-magnifying-glass"></span> Filtros adicionais</h4>
									<ul class="sasw_list mb0">
										<li class="min_area style2 list-inline-item">
											<div class="form-group">
												<input type="text" name="valor_minimo" class="form-control moeda" placeholder="Valor Min" value="{{ $request->valor_minimo }}">
											</div>
										</li>
										<li class="max_area list-inline-item">
											<div class="form-group">
												<input type="text" name="valor_maximo" class="form-control moeda" placeholder="Valor Max" value="{{ $request->valor_maximo }}">
											</div>
										</li>
										<li>
											<div class="search_option_two">
												<div class="candidate_revew_select">
													<select name="quartos[]" class="selectpicker w100 show-tick" multiple title="Quartos">
														@for($i=1; $i<=6; $i++)
														<option value="{{ $i }}" @if(is_array($request->quartos) && in_array($i, $request->quartos)) selected @endif>{{ $i }} @if($i==6)+ @endif Quartos</option>
														@endfor
													</select>
												</div>
											</div>
										</li>
										<li>
											<div class="search_option_two">
												<div class="candidate_revew_select">
													<select name="banheiros[]" class="selectpicker w100 show-tick" multiple title="Banheiros">
														@for($i=1; $i<=6; $i++)
														<option value="{{ $i }}" @if(is_array($request->banheiros) && in_array($i, $request->banheiros)) selected @endif>{{ $i }} @if($i==6)+ @endif Banheiros</option>
														@endfor
													</select>
												</div>
											</div>
										</li>
										<li>
											<div class="search_option_two">
												<div class="candidate_revew_select">
													<select name="garagem[]" class="selectpicker w100 show-tick" multiple title="Garagem (Vagas)">
														@for($i=1; $i<=6; $i++)
														<option value="{{ $i }}" @if(is_array($request->garagem) && in_array($i, $request->garagem)) selected @endif>{{ $i }} @if($i==6)+ @endif Vagas</option>
														@endfor
													</select>
												</div>
											</div>
										</li>

										<li class="min_area list-inline-item">
										    <div class="form-group">
										    	<input type="text" name="area_minima" class="form-control moeda" placeholder="Min Area" value="{{ $request->area_minima }}">
										    </div>
										</li>
										<li class="max_area list-inline-item">
										    <div class="form-group">
										    	<input type="text" name="area_maxima" class="form-control moeda" placeholder="Max Area" value="{{ $request->area_maxima }}">
										    </div>
										</li>
										<li>
										  	<div id="accordion" class="panel-group">
											    <div class="panel">
											      	<div class="panel-heading">
												      	<h4 class="panel-title">
												        	<a href="#panelBodyRating" class="accordion-toggle link" data-toggle="collapse" data-parent="#accordion"><i class="flaticon-more"></i> Características</a>
												        </h4>
											      	</div>
												    <div id="panelBodyRating" class="panel-collapse collapse show">
												        <div class="panel-body row">
												      		<div class="col-lg-12">
												                <ul class="ui_kit_checkbox selectable-list float-left fn-400">
												                	@php $caracts1 = ['Mobiliado', 'Piscina', 'Sacada', 'Andar alto', 'Sol/Manhã', 'Sol/Tarde', 'Academia', 'Churrasqueira']; @endphp
												                	@foreach($caracts1 as $key => $c)
												                	<li>
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" name="caracteristicas[]" value="{{ $c }}" class="custom-control-input" id="customCheckC1_{{ $key }}" @if(is_array($request->caracteristicas) && in_array($c, $request->caracteristicas)) checked @endif>
																			<label class="custom-control-label" for="customCheckC1_{{ $key }}">{{ $c }}</label>
																		</div>
												                	</li>
												                	@endforeach
												                </ul>
												                <ul class="ui_kit_checkbox selectable-list float-right fn-400">
												                	@php $caracts2 = ['Playground', 'Quadra de tênis', 'Aceita animais', 'Salão de festas', 'Sala de jogos']; @endphp
												                	@foreach($caracts2 as $key => $c)
												                	<li>
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" name="caracteristicas[]" value="{{ $c }}" class="custom-control-input" id="customCheckC2_{{ $key }}" @if(is_array($request->caracteristicas) && in_array($c, $request->caracteristicas)) checked @endif>
																			<label class="custom-control-label" for="customCheckC2_{{ $key }}">{{ $c }}</label>
																		</div>
												                	</li>
												                	@endforeach
												                </ul>
													        </div>
												        </div>
											        </div>
											    </div>
											</div>
										</li>
										<li>
											<div class="search_option_button d-flex align-items-center justify-content-between pt10" style="gap: 15px;">
												<a href="{{ url('imoveis-buscar') }}?transacao={{ $request->transacao }}" class="btn-limpar-filtros font-weight-bold text-muted" style="text-decoration: underline; font-size: 15px; cursor: pointer;">Limpar</a>
											    <button type="submit" id="btnSubmitFiltros" class="btn btn-thm font-weight-bold flex-grow-1" style="border-radius: 10px; padding: 12px 15px; font-size: 15px;">Buscar {{ $total }} imóveis</button>
											</div>
										</li>
									</ul>
								</div>
							</div>

							<div class="banner-lateral mt20"><img src="{{ asset('assets/portal/images/publicidade/banner-lateral-500x600.jpg') }}" width="100%" alt=""></div>
							<div class="banner-lateral"><img src="{{ asset('assets/portal/images/publicidade/banner-lateral-500x250.jpg') }}" width="100%" alt=""></div>
						</div>
					</form>
				</div>
				<div class="col-md-12 col-lg-9 col-xl-9">
					<div class="row">
						<div class="grid_list_search_result d-flex align-items-center justify-content-between w-100">
							<div class="left_area">
								<p class="mb-0">Mostrando <strong>{{ $anuncios->count() }}</strong> de <strong>{{ $total }}</strong> resultados</p>
							</div>
							<div class="right_area">
								<ul class="d-flex align-items-center mb-0">
									<li class="list-inline-item mr20"><span class="shrtby">Exibir:</span>
										<select id="selectPorPagina" class="selectpicker show-tick" onchange="document.getElementById('inputPorPagina').value=this.value; document.getElementById('FormBuscaCompleta').submit();">
											<option value="24" @if($request->por_pagina == '24' || !$request->por_pagina) selected @endif>24 imóveis</option>
											<option value="36" @if($request->por_pagina == '36') selected @endif>36 imóveis</option>
											<option value="48" @if($request->por_pagina == '48') selected @endif>48 imóveis</option>
											<option value="60" @if($request->por_pagina == '60') selected @endif>60 imóveis</option>
										</select>
									</li>
									<li class="list-inline-item"><span class="shrtby">Ordenar por:</span>
										<select id="selectOrdenacao" class="selectpicker show-tick" onchange="document.getElementById('inputOrdenacao').value=this.value; document.getElementById('FormBuscaCompleta').submit();">
											<option value="relevantes" @if($request->ordenacao == 'relevantes' || !$request->ordenacao) selected @endif>Mais relevantes</option>
											<option value="recentes" @if($request->ordenacao == 'recentes' || $request->ordenacao == 'Mais recente') selected @endif>Mais recente</option>
											<option value="menor_preco" @if($request->ordenacao == 'menor_preco' || $request->ordenacao == 'Menor valor' || $request->ordenacao == 'Menor preço') selected @endif>Menor preço</option>
											<option value="maior_preco" @if($request->ordenacao == 'maior_preco' || $request->ordenacao == '+ Preço' || $request->ordenacao == 'Maior preço') selected @endif>Maior preço</option>
											<option value="maior_area" @if($request->ordenacao == 'maior_area' || $request->ordenacao == 'Maior área') selected @endif>Maior área</option>
										</select>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="row">

						<div class="col-12 mb20"><div class="banner-busca"><img src="{{ asset('assets/portal/images/publicidade/banner-960x140.jpg') }}" width="100%" alt=""></div></div>

                        @foreach ($anuncios as $anuncio)
                        <div class="col-md-6 col-lg-4 col-xl-4 mb30">
							<div class="feat_property home7 style4" style="border-radius: 12px; overflow: hidden; background: #fff; box-shadow: 0px 4px 15px rgba(0,0,0,0.06); height: 100%; display: flex; flex-direction: column;">
								<div class="thumb" style="position: relative;">
									<div class="fp_single_item_slider">
										@if (isset($anuncio->fotos) && $anuncio->fotos->count() > 0)
                                            @foreach($anuncio->fotos->take(5) as $foto)
                                            <div class="item">
                                                <a href="/imoveis/{{ $anuncio->id }}/{{ Helper::url_amigavel($anuncio->tipo->nome .'-'. $anuncio->transacao) }}/{{ Helper::url_amigavel($anuncio->endereco->cidade->nome_cidade .'-'. $anuncio->endereco->cidade->estado->uf_estado)}}" target="_blank">
                                                    <img class="img-whp" src="{{ $foto->arquivo }}" alt="{{ $anuncio->titulo }}" style="height: 240px; object-fit: cover; width: 100%;">
                                                </a>
                                            </div>
                                            @endforeach
                                        @else
                                            <div class="item">
                                                <a href="/imoveis/{{ $anuncio->id }}/{{ Helper::url_amigavel($anuncio->tipo->nome .'-'. $anuncio->transacao) }}/{{ Helper::url_amigavel($anuncio->endereco->cidade->nome_cidade .'-'. $anuncio->endereco->cidade->estado->uf_estado)}}" target="_blank">
                                                    <img class="img-whp" src="{{ asset('assets/portal/images/property/sem-foto.jpg') }}" alt="sem-foto.jpg" style="height: 240px; object-fit: cover; width: 100%;">
                                                </a>
                                            </div>
                                        @endif
									</div>
								</div>
								<div class="details" style="padding: 16px; flex-grow: 1; display: flex; flex-direction: column;">
									<div class="tc_content" style="flex-grow: 1;">
										<p style="font-size: 12px; color: #717171; font-weight: 600; margin-bottom: 3px; text-transform: capitalize;">
											{{ $anuncio->tipo->nome }} para {{ strtolower($anuncio->transacao) }}
										</p>
										<h4 style="font-size: 16px; font-weight: 700; line-height: 1.3; margin-bottom: 3px; text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                            <a href="/imoveis/{{ $anuncio->id }}/{{ Helper::url_amigavel($anuncio->tipo->nome .'-'. $anuncio->transacao) }}/{{ Helper::url_amigavel($anuncio->endereco->cidade->nome_cidade .'-'. $anuncio->endereco->cidade->estado->uf_estado)}}" target="_blank" style="color: #222;">{{ $anuncio->endereco->bairro_endereco }}, {{ $anuncio->endereco->cidade->nome_cidade }}</a>
                                        </h4>
										<p style="font-size: 12px; color: #666; margin-bottom: 10px; text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                            {{ $anuncio->titulo }}
                                        </p>

										@php
											$area = Helper::GetInformacaoByChave($anuncio, 'Área Útil');
											$quartos = Helper::GetInformacaoByChave($anuncio, 'Quartos');
											$suites = Helper::GetInformacaoByChave($anuncio, 'Suites');
											$banheiros = Helper::GetInformacaoByChave($anuncio, 'Banheiros');
											$garagem = Helper::GetInformacaoByChave($anuncio, 'Garagem');
										@endphp
										<ul class="prop_details mb0" style="padding: 10px 0; border-top: 1px solid #f0f0f0; border-bottom: 1px solid #f0f0f0; display: flex; flex-wrap: nowrap; gap: 8px; justify-content: space-between; align-items: center; font-size: 14px; color: #222; font-weight: 700; white-space: nowrap; overflow: hidden;">
											@if($area && $area > 0)
											<li class="list-inline-item m-0" title="Área Útil"><span><i class="fa-solid fa-ruler-combined" style="color:#02a353; font-size:14px;"></i> {{ $area }} m²</span></li>
											@endif
											@if($quartos && $quartos > 0)
											<li class="list-inline-item m-0" title="Quartos"><span><i class="fa-solid fa-bed" style="color:#02a353; font-size:14px;"></i> {{ $quartos }} @if($suites && $suites > 0)<small style="font-size:11px; color:#666; font-weight: normal;">({{ $suites }}s)</small>@endif</span></li>
											@endif
											@if($banheiros && $banheiros > 0)
											<li class="list-inline-item m-0" title="Banheiros"><span><i class="fa-solid fa-shower" style="color:#02a353; font-size:14px;"></i> {{ $banheiros }}</span></li>
											@endif
											@if($garagem && $garagem > 0)
											<li class="list-inline-item m-0" title="Garagem"><span><i class="fa-solid fa-car" style="color:#02a353; font-size:14px;"></i> {{ $garagem }}</span></li>
											@endif
										</ul>

										<div style="margin-top: 10px;">
											@if($anuncio->transacao == 'Venda' || $anuncio->transacao == 'Locação/Venda')
											<div style="font-size: 20px; font-weight: 800; color: #1a1a1a; line-height: 1.2;">
												R$ @if($anuncio->valor_venda == '0.00') Consulte @else {{ Helper::converte_valor_real($anuncio->valor_venda) }} @endif
											</div>
											@endif

											@if($anuncio->transacao == 'Locação')
											<div style="font-size: 20px; font-weight: 800; color: #1a1a1a; line-height: 1.2;">
												R$ @if($anuncio->valor_locacao == '0.00') Consulte @else {{ Helper::converte_valor_real($anuncio->valor_locacao) }} @endif
											</div>
											@endif

											@php
												$cond = Helper::GetInformacaoByChave($anuncio, 'Condomínio') ?: ($anuncio->valor_condominio ?: 0);
												$iptu = Helper::GetInformacaoByChave($anuncio, 'IPTU') ?: ($anuncio->valor_iptu ?: 0);
											@endphp
											@if(($cond && $cond > 0) || ($iptu && $iptu > 0))
											<div style="font-size: 12px; color: #717171; font-weight: 500; margin-top: 2px;">
												@if($cond && $cond > 0) Cond. R$ {{ Helper::converte_valor_real($cond) }} @endif
												@if(($cond && $cond > 0) && ($iptu && $iptu > 0)) • @endif
												@if($iptu && $iptu > 0) IPTU R$ {{ Helper::converte_valor_real($iptu) }} @endif
											</div>
											@endif
										</div>
									</div>
									<div class="fp_footer mt12 pt10" style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid #f0f0f0; margin-top: auto;">
										<ul class="fp_meta float-left mb0" style="display: flex; align-items: center;">
											<li class="list-inline-item mr8"><img src="{{ url('anunciante/'.$anuncio->anunciante->id.'/logo') }}" alt="logo" width="26" height="26" style="border-radius: 50%; object-fit: cover;"></li>
										    <li class="list-inline-item"><span style="font-size: 11px; font-weight: 600; color: #666;">{{ Str::limit($anuncio->anunciante->nome, 13) }}</span></li>
										</ul>
                                        <a href="/imoveis/{{ $anuncio->id }}/{{ Helper::url_amigavel($anuncio->tipo->nome .'-'. $anuncio->transacao) }}/{{ Helper::url_amigavel($anuncio->endereco->cidade->nome_cidade .'-'. $anuncio->endereco->cidade->estado->uf_estado)}}" target="_blank" class="btn btn-thm btn-xs" style="border-radius: 6px; font-size: 12px; padding: 5px 10px; font-weight: 700;">Ver Detalhes</a>
									</div>
								</div>
							</div>
						</div>
                        @endforeach

                        <div class="col-12 mt30 mb20 text-center d-flex justify-content-center">
						    {{ $anuncios->appends(Request::except('page'))->links() }}
                        </div>

					</div>
				</div>
			</div>
		</div>
	</section>

	@include('includes.portal.footer')

    @include('includes.portal.modals.modal-login')

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
<script type="text/javascript" src="{{ asset('assets/portal/js/timepicker.js') }}"></script>
<!-- Custom script for all pages -->
<script src="https://kit.fontawesome.com/952ef81d56.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/script.js') }}"></script>

<script>
	$(document).ready(function(){
		$('select').selectpicker();

		// Contagem dinâmica no botão ao alterar filtros
		function atualizarContagemFiltros() {
			const formData = $('#FormBuscaCompleta').serialize();
			$.ajax({
				url: "{{ route('api.imoveis.contagem') }}",
				type: "GET",
				data: formData,
				success: function(response) {
					if (response && typeof response.total !== 'undefined') {
						$('#btnSubmitFiltros, #btnSubmitFiltrosTopo').text('Buscar ' + response.total + ' imóveis');
					}
				}
			});
		}

		$('#FormBuscaCompleta').on('change input', 'input, select', function() {
			atualizarContagemFiltros();
		});
	});
</script>
</body>
</html>
