<!DOCTYPE html>
<html dir="ltr" lang="pt-br">
<head>
    @include('includes.portal.head')
</head>
<body>
<div class="wrapper">
	<!--<div class="preloader"></div>-->
    @php $menu = "style2"; $logo = "logo2"; @endphp
	@include('includes.portal.menu')

    <!-- Listing Grid View -->
	<section class="our-listing bgc-f7 pb30-991 busca-lista mobile">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="listing_sidebar dn db-991">
						<div class="sidebar_content_details style3">
							<!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
							<div class="sidebar_listing_list style2 mobile_sytle_sidebar mb0">
								<div class="sidebar_advanced_search_widget">
									<h4 class="mb25">Busca avançada <a class="filter_closed_btn float-right" href="#"><small>Ocultar filtro</small> <span class="flaticon-close"></span></a></h4>
									<ul class="sasw_list style2 mb0">
										<li class="search_area">
										    <div class="form-group">
												<select class="selectpicker" name="localizacao" id="localizacao" data-live-search="true" data-width="100%">
                                                    @foreach ($cidades as $cidade)
                                                        @if($request->localizacao)
                                                        <option data-tokens="{{ $cidade->nome_cidade }}" value="{{ $cidade->id }}" @if($request->localizacao == $cidade->id) selected @endif>{{ $cidade->nome_cidade }} ({{ $cidade->estado->uf_estado }})</option>
                                                        @else
                                                        <option data-tokens="{{ $cidade->nome_cidade }}" value="{{ $cidade->id }}">{{ $cidade->nome_cidade }} ({{ $cidade->estado->uf_estado }})</option>
                                                        @endif
                                                    @endforeach
                                                </select>
										    	<label for="exampleInputEmail"><span class="flaticon-maps-and-flags"></span></label>
										    </div>
										</li>
										<li class="search_area" style="display:none;">
										    <div class="form-group">
										    	<input type="text" class="form-control" id="exampleInputEmail" placeholder="Location">
										    	<label for="exampleInputEmail"><span class="flaticon-maps-and-flags"></span></label>
										    </div>
										</li>
										<li>
											<div class="search_option_two">
												<select name="tipo_imovel[]" class="selectpicker w100 show-tick" multiple>
													<option>Tipo do Imóvel</option>
													@foreach ($tipos as $tipo)
													<option value="{{ $tipo->id }}">{{ $tipo->nome }} ({{ $tipo->finalidade }})</option>
													@endforeach
												</select>
											</div>
										</li>
										<li style="display:none;">
											<div class="search_option_two">
												<div class="candidate_revew_select">
													<select class="selectpicker w100 show-tick">
														<option>Property Type</option>
														<option>Apartment</option>
														<option>Bungalow</option>
														<option>Condo</option>
														<option>House</option>
														<option>Land</option>
														<option>Single Family</option>
													</select>
												</div>
											</div>
										</li>
										<li style="display:none;">
											<div class="small_dropdown2">
											    <div id="prncgs" class="btn dd_btn">
											    	<span>Price</span>
											    	<label for="exampleInputEmail2"><span class="fa fa-angle-down"></span></label>
											    </div>
											  	<div class="dd_content2">
												    <div class="pricing_acontent">
												    	<span id="slider-range-value1"></span>
														<span class="mt0" id="slider-range-value2"></span>
													    <div id="slider"></div>
														<!-- <input type="text" class="amount" placeholder="$52,239"> 
														<input type="text" class="amount2" placeholder="$985,14">
														<div class="slider-range"></div> -->
												    </div>
											  	</div>
											</div>
										</li>
										<li style="display:none;">
											<div class="search_option_two">
												<div class="candidate_revew_select">
													<select class="selectpicker w100 show-tick">
														<option>Bathrooms</option>
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
														<option>6</option>
													</select>
												</div>
											</div>
										</li>
										<li>
											<div class="search_option_two">
												<div class="candidate_revew_select">
													<select name="quartos[]" class="selectpicker w100 show-tick" multiple>
														<option>Quartos</option>
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
														<option>6</option>
													</select>
												</div>
											</div>
										</li>
										<li>
											<div class="search_option_two">
												<div class="candidate_revew_select">
													<select name="banheiros[]" class="selectpicker w100 show-tick" multiple>
														<option>Banheiros</option>
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
														<option>6</option>
													</select>
												</div>
											</div>
										</li>
										<li>
											<div class="search_option_two">
												<div class="candidate_revew_select">
													<select name="garagem[]" class="selectpicker w100 show-tick" multiple>
														<option>Garagens (Vagas)</option>
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
														<option>6</option>
													</select>
												</div>
											</div>
										</li>
										<li class="min_area style2 list-inline-item">
                                            <div class="form-group">
                                                <input type="text" name="valor_minimo" class="form-control moeda" id="exampleInputName2" placeholder="Valor Min">
                                            </div>
                                        </li>
                                        <li class="max_area list-inline-item">
                                            <div class="form-group">
                                                <input type="text" name="valor_maximo" class="form-control moeda" id="exampleInputName3" placeholder="Valor Max">
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
												    <div id="panelBodyRating" class="panel-collapse collapse">
												        <div class="panel-body row">
												      		<div class="col-lg-12">
												                <ul class="ui_kit_checkbox selectable-list float-left fn-400">
												                	<li>
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input" id="customCheck1">
																			<label class="custom-control-label" for="customCheck1">Air Conditioning</label>
																		</div>
												                	</li>
												                	<li>
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input" id="customCheck4">
																			<label class="custom-control-label" for="customCheck4">Barbeque</label>
																		</div>
												                	</li>
												                	<li>
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input" id="customCheck10">
																			<label class="custom-control-label" for="customCheck10">Gym</label>
																		</div>
												                	</li>
												                	<li>
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input" id="customCheck5">
																			<label class="custom-control-label" for="customCheck5">Microwave</label>
																		</div>
												                	</li>
												                	<li>
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input" id="customCheck6">
																			<label class="custom-control-label" for="customCheck6">TV Cable</label>
																		</div>
												                	</li>
												                	<li>
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input" id="customCheck2">
																			<label class="custom-control-label" for="customCheck2">Lawn</label>
																		</div>
												                	</li>
												                	<li>
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input" id="customCheck11">
																			<label class="custom-control-label" for="customCheck11">Refrigerator</label>
																		</div>
												                	</li>
												                	<li>
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input" id="customCheck3">
																			<label class="custom-control-label" for="customCheck3">Swimming Pool</label>
																		</div>
												                	</li>
												                </ul>
												                <ul class="ui_kit_checkbox selectable-list float-right fn-400">
												                	<li>
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input" id="customCheck12">
																			<label class="custom-control-label" for="customCheck12">WiFi</label>
																		</div>
												                	</li>
												                	<li>
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input" id="customCheck14">
																			<label class="custom-control-label" for="customCheck14">Sauna</label>
																		</div>
												                	</li>
												                	<li>
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input" id="customCheck7">
																			<label class="custom-control-label" for="customCheck7">Dryer</label>
																		</div>
												                	</li>
												                	<li>
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input" id="customCheck9">
																			<label class="custom-control-label" for="customCheck9">Washer</label>
																		</div>
												                	</li>
												                	<li>
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input" id="customCheck13">
																			<label class="custom-control-label" for="customCheck13">Laundry</label>
																		</div>
												                	</li>
												                	<li>
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input" id="customCheck8">
																			<label class="custom-control-label" for="customCheck8">Outdoor Shower</label>
																		</div>
												                	</li>
												                	<li>
																		<div class="custom-control custom-checkbox">
																			<input type="checkbox" class="custom-control-input" id="customCheck15">
																			<label class="custom-control-label" for="customCheck15">Window Coverings</label>
																		</div>
												                	</li>
												                </ul>
													        </div>
												        </div>
												    </div>
											    </div>
											</div>
										</li>
										<li>
											<div class="search_option_button">
											    <button type="submit" class="btn btn-block btn-thm">Filtrar</button>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="breadcrumb_content style2 mb0-991">
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="#">Início</a></li>
						    <li class="breadcrumb-item active text-thm" aria-current="page">Lista</li>
						</ol>
						<h2 class="breadcrumb_title titulo-mobile">{{ $total }} imóveis encontrados em sua busca</h2>
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
							<span id="open2" class="flaticon-filter-results-button filter_open_btn style2 mobile-btn"> Mostrar filtro</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-xl-4">
					<div class="sidebar_listing_grid1 dn-991">
						<div class="sidebar_listing_list">
							<div class="sidebar_advanced_search_widget">
                                <form action="{{ url('imoveis-buscar') }}" method="POST" name="FormBusca" id="FormBusca">
                                @csrf
								<ul class="sasw_list mb0">
									<li class="search_area">
									    <div class="form-group">
									    	<select class="selectpicker" name="localizacao" id="localizacao" data-live-search="true" data-width="100%">
                                                @foreach ($cidades as $cidade)
                                                    @if($request->localizacao)
                                                    <option data-tokens="{{ $cidade->nome_cidade }}" value="{{ $cidade->id }}" @if($request->localizacao == $cidade->id) selected @endif>{{ $cidade->nome_cidade }} - {{ $cidade->estado->uf_estado }} ({{ Helper::GetTotalAnunciosByCidade($cidade->id, 1)}})</option>
                                                    @else
                                                    <option data-tokens="{{ $cidade->nome_cidade }}" value="{{ $cidade->id }}">{{ $cidade->nome_cidade }} - {{ $cidade->estado->uf_estado }} ({{ Helper::GetTotalAnunciosByCidade($cidade->id, 1)}})</option>
                                                    @endif
                                                @endforeach
                                            </select>
									    	<label for="exampleInputEmail"><span class="flaticon-maps-and-flags"></span></label>
									    </div>
									</li>
									<li>
										<div class="search_option_two">
											<div class="candidate_revew_select">
												<select name="tipo_imovel[]" class="selectpicker w100 show-tick" multiple>
													<option>Tipo do Imóvel</option>
													@foreach ($tipos as $tipo)
                                                    <option value="{{ $tipo->id }}">{{ $tipo->nome }} ({{ $tipo->finalidade }})</option>
                                                    @endforeach
												</select>
											</div>
										</div>
									</li>
									<li class="min_area style2 list-inline-item">
										<div class="form-group">
											<input type="text" name="valor_minimo" class="form-control moeda" id="exampleInputName2" placeholder="Valor Min">
										</div>
									</li>
									<li class="max_area list-inline-item">
										<div class="form-group">
											<input type="text" name="valor_maximo" class="form-control moeda" id="exampleInputName3" placeholder="Valor Max">
										</div>
									</li>
									<li>
										<div class="search_option_two">
											<div class="candidate_revew_select">
												<select name="quartos[]" class="selectpicker w100 show-tick" multiple>
													<option>Quartos</option>
													<option>1</option>
													<option>2</option>
													<option>3</option>
													<option>4</option>
													<option>5</option>
													<option>6</option>
												</select>
											</div>
										</div>
									</li>
									<li>
										<div class="search_option_two">
											<div class="candidate_revew_select">
												<select name="banheiros[]" class="selectpicker w100 show-tick" multiple>
													<option>Banheiros</option>
													<option>1</option>
													<option>2</option>
													<option>3</option>
													<option>4</option>
													<option>5</option>
													<option>6</option>
												</select>
											</div>
										</div>
									</li>
									<li>
										<div class="search_option_two">
											<div class="candidate_revew_select">
												<select name="garagem[]" class="selectpicker w100 show-tick" multiple>
													<option>Garagem (Vagas)</option>
													<option>1</option>
													<option>2</option>
													<option>3</option>
													<option>4</option>
													<option>5</option>
													<option>6</option>
												</select>
											</div>
										</div>
									</li>

									<li class="min_area list-inline-item">
									    <div class="form-group">
									    	<input type="text" name="area_minima" class="form-control moeda" id="exampleInputName2" placeholder="Min Area">
									    </div>
									</li>
									<li class="max_area list-inline-item">
									    <div class="form-group">
									    	<input type="text" name="area_maxima" class="form-control moeda" id="exampleInputName3" placeholder="Max Area">
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
											    <div id="panelBodyRating" class="panel-collapse collapse">
											        <div class="panel-body row">
											      		<div class="col-lg-12">
											                <ul class="ui_kit_checkbox selectable-list float-left fn-400">
											                	<li>
																	<div class="custom-control custom-checkbox">
																		<input type="checkbox" class="custom-control-input" id="customCheck16">
																		<label class="custom-control-label" for="customCheck16">Mobiliado</label>
																	</div>
											                	</li>
											                	<li>
																	<div class="custom-control custom-checkbox">
																		<input type="checkbox" class="custom-control-input" id="customCheck17">
																		<label class="custom-control-label" for="customCheck17">Piscina</label>
																	</div>
											                	</li>
											                	<li>
																	<div class="custom-control custom-checkbox">
																		<input type="checkbox" class="custom-control-input" id="customCheck18">
																		<label class="custom-control-label" for="customCheck18">Sacada</label>
																	</div>
											                	</li>
											                	<li>
																	<div class="custom-control custom-checkbox">
																		<input type="checkbox" class="custom-control-input" id="customCheck19">
																		<label class="custom-control-label" for="customCheck19">Andar alto</label>
																	</div>
											                	</li>
											                	<li>
																	<div class="custom-control custom-checkbox">
																		<input type="checkbox" class="custom-control-input" id="customCheck20">
																		<label class="custom-control-label" for="customCheck20">Sol/Manhã</label>
																	</div>
											                	</li>
											                	<li>
																	<div class="custom-control custom-checkbox">
																		<input type="checkbox" class="custom-control-input" id="customCheck21">
																		<label class="custom-control-label" for="customCheck21">Sol/Tarde</label>
																	</div>
											                	</li>
											                	<li>
																	<div class="custom-control custom-checkbox">
																		<input type="checkbox" class="custom-control-input" id="customCheck22">
																		<label class="custom-control-label" for="customCheck22">Academia</label>
																	</div>
											                	</li>
											                	<li>
																	<div class="custom-control custom-checkbox">
																		<input type="checkbox" class="custom-control-input" id="customCheck23">
																		<label class="custom-control-label" for="customCheck23">Churrasqueira</label>
																	</div>
											                	</li>
											                </ul>
											                <ul class="ui_kit_checkbox selectable-list float-right fn-400">
											                	<li>
																	<div class="custom-control custom-checkbox">
																		<input type="checkbox" class="custom-control-input" id="customCheck24">
																		<label class="custom-control-label" for="customCheck24">Piscina</label>
																	</div>
											                	</li>
											                	<li>
																	<div class="custom-control custom-checkbox">
																		<input type="checkbox" class="custom-control-input" id="customCheck25">
																		<label class="custom-control-label" for="customCheck25">Playground</label>
																	</div>
											                	</li>
											                	<li>
																	<div class="custom-control custom-checkbox">
																		<input type="checkbox" class="custom-control-input" id="customCheck26">
																		<label class="custom-control-label" for="customCheck26">Quadra de tênis</label>
																	</div>
											                	</li>
											                	<li>
																	<div class="custom-control custom-checkbox">
																		<input type="checkbox" class="custom-control-input" id="customCheck27">
																		<label class="custom-control-label" for="customCheck27">Aceita animais</label>
																	</div>
											                	</li>
											                	<li>
																	<div class="custom-control custom-checkbox">
																		<input type="checkbox" class="custom-control-input" id="customCheck28">
																		<label class="custom-control-label" for="customCheck28">Salão de festas</label>
																	</div>
											                	</li>
											                	<li>
																	<div class="custom-control custom-checkbox">
																		<input type="checkbox" class="custom-control-input" id="customCheck29">
																		<label class="custom-control-label" for="customCheck29">Sala de jogos</label>
																	</div>
											                	</li>

											                </ul>
												        </div>
											        </div>
											    </div>
										    </div>
										</div>
									</li>
									<li>
										<div class="search_option_button">
										    <button type="submit" class="btn btn-block btn-thm">Filtrar</button>
										</div>
									</li>
								</ul>
                                </form>
							</div>
						</div>
						<div class="terms_condition_widget">
							<h4 class="title">Imóveis destacados</h4>
							<div class="sidebar_feature_property_slider">

                                @foreach ($destaques as $destaque)
                                <div class="item">
									<div class="feat_property home7">
                                        <a href="/imoveis/{{ $destaque->id }}/{{ Helper::url_amigavel($destaque->tipo->nome .'-'. $destaque->transacao) }}/{{ Helper::url_amigavel($destaque->endereco->cidade->nome_cidade .'-'. $destaque->endereco->cidade->estado->uf_estado)}}" target="_blank">
										<div class="thumb">
											@if (isset($destaque->fotos->first()->arquivo))
                                            <img class="img-whp" src="{{ $destaque->fotos->first()->arquivo }}" alt="fp1.jpg">
                                            @else
                                            <img class="img-whp" src="{{ asset('assets/portal/images/property/sem-foto.jpg') }}" alt="sem-foto.jpg">
                                            @endif
											<div class="thmb_cntnt">
												<ul class="tag mb0">
												    <li class="list-inline-item"><span>{{ $destaque->transacao }}</span></li>
												</ul>

                                                @if($destaque->transacao == 'Venda' || $destaque->transacao == 'Locação/Venda')
                                                <span class="fp_price">R$ 

													@if($destaque->valor_venda == '0.00')
													Consulte
													@else
													{{ Helper::converte_valor_real($destaque->valor_venda) }}
													@endif
												
												</span>
                                                @endif

                                                @if($destaque->transacao == 'Locação')
                                                <span class="fp_price">R$ 

													@if($destaque->valor_locacao == '0.00')
													Consulte
													@else
													{{ Helper::converte_valor_real($destaque->valor_locacao) }}
													@endif

                                                @endif

												<h4 class="posr color-white">{{ $destaque->tipo->nome }}</h4>
											</div>
										</div>
                                        </a>
									</div>
								</div>
                                @endforeach

							</div>
						</div>


					</div>
				</div>
				<div class="col-md-12 col-lg-8">
					<div class="row">
						<div class="col-lg-12">
							<div class="grid_list_search_result mobile">
								<div class="col-sm-12 col-md-4 col-lg-4 col-xl-5">
									<div class="left_area tac-xsd">
										<p>Mostrando <strong>{{ $anuncios->count() }}</strong> de <strong>{{ $total }}</strong> resultados</p>
									</div>
								</div>
								<div class="col-sm-12 col-md-8 col-lg-8 col-xl-7">
									<div class="right_area text-right tac-xsd">
										<ul>
											<li class="list-inline-item"><span class="shrtby">Ordenar por:</span>
												<select class="selectpicker show-tick">
													<option>Menor valor</option>
													<option>+ Preço</option>
												</select>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
                        @foreach ($anuncios as $anuncio)
                        <div class="col-lg-12">
							<div class="feat_property list">
								<div class="thumb">
									@if (isset($anuncio->fotos->first()->arquivo))
                                    <img class="img-whp" src="{{ $anuncio->fotos->first()->arquivo }}" alt="fp1.jpg">
                                    @else
                                    <img class="img-whp" src="{{ asset('assets/portal/images/property/sem-foto.jpg') }}" alt="sem-foto.jpg">
                                    @endif
                                    <a href="/imoveis/{{ $anuncio->id }}/{{ Helper::url_amigavel($anuncio->tipo->nome .'-'. $anuncio->transacao) }}/{{ Helper::url_amigavel($anuncio->endereco->cidade->nome_cidade .'-'. $anuncio->endereco->cidade->estado->uf_estado)}}" target="_blank">
									<div class="thmb_cntnt">
										<ul class="icon mb0">
											<!--<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>-->
										</ul>
									</div>
                                    </a>
								</div>
								<div class="details">
									<div class="tc_content">
										<div class="dtls_headr">
											<ul class="tag">
												<li class="list-inline-item"><a href="#">{{ $anuncio->transacao }}</a></li>
                                                @if ($anuncio->lancamento == 'S')
                                                <li class="list-inline-item"><a href="#">Lançamento</a></li>
                                                @endif
											</ul>
											@if($anuncio->transacao == 'Venda' || $anuncio->transacao == 'Locação/Venda')
                                            <a class="fp_price">R$ 
												@if($anuncio->valor_venda == '0.00')
												Consulte
												@else
												{{ Helper::converte_valor_real($anuncio->valor_venda) }}
												@endif
											</a>
                                            @endif

                                            @if($anuncio->transacao == 'Locação')
                                            <a class="fp_price">R$ 
												
												@if($anuncio->valor_locacao == '0.00')
												Consulte
												@else
												{{ Helper::converte_valor_real($anuncio->valor_locacao) }}
												@endif
											
											</a>
                                            @endif
										</div>
										<p class="text-thm">{{ $anuncio->tipo->nome }}</p>
										<h4>{{ $anuncio->titulo }}</h4>
										<p><span class="flaticon-placeholder"></span>{{ $anuncio->endereco->logradouro_endereco }} - {{ $anuncio->endereco->bairro_endereco }}, {{ $anuncio->endereco->cidade->nome_cidade }} - {{ $anuncio->endereco->cidade->estado->uf_estado }}</p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> {{ Helper::GetInformacaoByChave($anuncio->id,'Quartos') }}</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> {{ Helper::GetInformacaoByChave($anuncio->id,'Banheiros') }}</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> {{ Helper::GetInformacaoByChave($anuncio->id,'Área Útil') }}m²</span></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><span href="#"><img src="{{ url('anunciante/'.$anuncio->anunciante->id.'/logo') }}" alt="pposter1.png" width="40"></span></li>
										    <li class="list-inline-item"><span href="#">{{ $anuncio->anunciante->nome }}</span></li>
										</ul>
                                        <a href="/imoveis/{{ $anuncio->id }}/{{ Helper::url_amigavel($anuncio->tipo->nome .'-'. $anuncio->transacao) }}/{{ Helper::url_amigavel($anuncio->endereco->cidade->nome_cidade .'-'. $anuncio->endereco->cidade->estado->uf_estado)}}" target="_blank"><div class="fp_pdate float-right btn-detalhes">+ Detalhes</div></a>
									</div>
								</div>
							</div>
						</div>
                        @endforeach

                        {{ $anuncios->links() }}

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
<script type="text/javascript" src="{{ asset('assets/portal/js/pricing-slider.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/timepicker.js') }}"></script>
<!-- Custom script for all pages -->
<script src="https://kit.fontawesome.com/952ef81d56.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/script.js') }}"></script>
</body>
</html>
