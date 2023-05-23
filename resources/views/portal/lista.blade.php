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
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="listing_sidebar dn db-991">
						<div class="sidebar_content_details style3">
							<!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
							<div class="sidebar_listing_list style2 mobile_sytle_sidebar mb0">
								<div class="sidebar_advanced_search_widget">
									<h4 class="mb25">Busca avançada <a class="filter_closed_btn float-right" href="#"><small>Fechar filtro</small> <span class="flaticon-close"></span></a></h4>
									<ul class="sasw_list style2 mb0">
										<li class="search_area">
										    <div class="form-group">
										    	<input type="text" class="form-control" id="exampleInputEmail" placeholder="Localização">
										    	<label for="exampleInputEmail"><span class="flaticon-maps-and-flags"></span></label>
										    </div>
										</li>
										<li>
											<div class="search_option_two">
												<div class="candidate_revew_select">
													<select class="selectpicker w100 show-tick" multiple>
														<option>Tipo do Imóvel</option>
														<option>Apartmento</option>
														<option>Casa</option>
														<option>Condomínio</option>
														<option>Lote</option>
														<option>Sala Comercial</option>
														<option>Flat</option>
													</select>
												</div>
											</div>
										</li>
										<li>
											<div class="small_dropdown2">
											    <div id="prncgs" class="btn dd_btn">
											    	<span>Preço</span>
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
										<li>
											<div class="search_option_two">
												<div class="candidate_revew_select">
													<select class="selectpicker w100 show-tick">
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
													<select class="selectpicker w100 show-tick">
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
													<select class="selectpicker w100 show-tick">
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
										    	<input type="text" class="form-control" id="exampleInputName2" placeholder="Área Min">
										    </div>
										</li>
										<li class="max_area list-inline-item">
										    <div class="form-group">
										    	<input type="text" class="form-control" id="exampleInputName3" placeholder="Área Max">
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
						    <li class="breadcrumb-item active text-thm" aria-current="page">Venda</li>
						</ol>
						<h2 class="breadcrumb_title">19.931 Imóveis à venda em Cuiabá - MT</h2>
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
				<div class="col-lg-4 col-xl-4">
					<div class="sidebar_listing_grid1 dn-991">
						<div class="sidebar_listing_list">
							<div class="sidebar_advanced_search_widget">
								<ul class="sasw_list mb0">
									<li class="search_area">
									    <div class="form-group">
									    	<input type="text" class="form-control" id="exampleInputEmail" placeholder="Localização">
									    	<label for="exampleInputEmail"><span class="flaticon-maps-and-flags"></span></label>
									    </div>
									</li>
									<li>
										<div class="search_option_two">
											<div class="candidate_revew_select">
												<select class="selectpicker w100 show-tick" multiple>
													<option>Tipo do Imóvel</option>
													<option>Apartmento</option>
													<option>Casa</option>
													<option>Condomínio</option>
													<option>Lote</option>
													<option>Sala Comercial</option>
													<option>Flat</option>
												</select>
											</div>
										</div>
									</li>
									<li class="min_area style2 list-inline-item">
										<div class="form-group">
											<input type="text" class="form-control" id="exampleInputName2" placeholder="Valor Min">
										</div>
									</li>
									<li class="max_area list-inline-item">
										<div class="form-group">
											<input type="text" class="form-control" id="exampleInputName3" placeholder="Valor Max">
										</div>
									</li>
									<li>
										<div class="search_option_two">
											<div class="candidate_revew_select">
												<select class="selectpicker w100 show-tick">
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
												<select class="selectpicker w100 show-tick">
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
												<select class="selectpicker w100 show-tick">
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
									    	<input type="text" class="form-control" id="exampleInputName2" placeholder="Min Area">
									    </div>
									</li>
									<li class="max_area list-inline-item">
									    <div class="form-group">
									    	<input type="text" class="form-control" id="exampleInputName3" placeholder="Max Area">
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
							</div>
						</div>
						<div class="terms_condition_widget">
							<h4 class="title">Imóveis destacados</h4>
							<div class="sidebar_feature_property_slider">
								<div class="item">
									<a href="{{ url('/detalhes-imovel') }}">
									<div class="feat_property home7">
										<div class="thumb">
											<img class="img-whp" src="{{ asset('assets/portal/images/property/fp1.jpg') }}" alt="fp1.jpg">
											<div class="thmb_cntnt">
												<ul class="tag mb0">
													<li class="list-inline-item"><span>Aluguel</span></li>
												    <li class="list-inline-item"><span>Venda</span></li>
												</ul>
												<a class="fp_price" href="#">R$ 187.000<small>,00</small></a>
												<h4 class="posr color-white">Apartmento</h4>
											</div>
										</div>
									</div>
									</a>
								</div>
								<div class="item">
									<div class="feat_property home7">
										<div class="thumb">
											<img class="img-whp" src="{{ asset('assets/portal/images/property/fp2.jpg') }}" alt="fp2.jpg">
											<div class="thmb_cntnt">
												<ul class="tag mb0">
													<li class="list-inline-item"><span>Aluguel</span></li>
												    <li class="list-inline-item"><span>Venda</span></li>
												</ul>
												<a class="fp_price" href="#">R$ 187.000<small>,00</small></a>
												<h4 class="posr color-white">Apartmento</h4>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="feat_property home7">
										<div class="thumb">
											<img class="img-whp" src="{{ asset('assets/portal/images/property/fp3.jpg') }}" alt="fp3.jpg">
											<div class="thmb_cntnt">
												<ul class="tag mb0">
													<li class="list-inline-item"><span>Aluguel</span></li>
												</ul>
												<a class="fp_price" href="#">R$ 3.000<small>,00</small></a>
												<h4 class="posr color-white">Apartmento</h4>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>

						<div class="sidebar_feature_listing">
							<h4 class="title">Visitados recentemente</h4>
							<div class="media">
								<img class="align-self-start mr-3" src="{{ asset('assets/portal/images/property/fp1.jpg') }}" width="100" alt="fls1.jpg">
								<div class="media-body">
							    	<h5 class="mt-0 post_title">Cittá Splendore</h5>
							    	<a href="{{ url('/detalhes-imovel') }}">R$ 3.000<small>,00</small></a>
							    	<ul class="mb0">
							    		<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> 4</span></li>
										<li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> 2</span></li>
										<li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> 58m²</span></li>
							    	</ul>
								</div>
							</div>
							<div class="media">
								<img class="align-self-start mr-3" src="{{ asset('assets/portal/images/property/fp2.jpg') }}" width="100" alt="fls2.jpg">
								<div class="media-body">
							    	<h5 class="mt-0 post_title">Villa Gramado</h5>
							    	<a href="{{ url('/detalhes-imovel') }}">R$350.000<small>/mo</small></a>
							    	<ul class="mb0">
							    		<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> 4</span></li>
										<li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> 2</span></li>
										<li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> 58m²</span></li>
							    	</ul>
								</div>
							</div>
							<div class="media">
								<a href="{{ url('/detalhes-imovel') }}"><img class="align-self-start mr-3" src="{{ asset('assets/portal/images/property/fp3.jpg') }}" width="100" alt="fls3.jpg"></a>
								<div class="media-body">
							    	<h5 class="mt-0 post_title">Sunset Studio</h5>
							    	<a href="{{ url('/detalhes-imovel') }}">R$13.000<small>,00</small></a>
							    	<ul class="mb0">
							    		<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> 4</span></li>
										<li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> 2</span></li>
										<li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> 58m²</span></li>
							    	</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 col-lg-8">
					<div class="row">
						<div class="grid_list_search_result">
							<div class="col-sm-12 col-md-4 col-lg-4 col-xl-5">
								<div class="left_area tac-xsd">
									<p>Mostrando <strong>20</strong> de <strong>19.321</strong> resultados</p>
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
					<div class="row">
						<div class="col-lg-12">
							<div class="feat_property list">
								<div class="thumb">
									<a href="{{ url('/detalhes-imovel') }}"><img class="img-whp" src="{{ asset('assets/portal/images/property/fp1.jpg') }}" alt="fp1.jpg"></a>
									<div class="thmb_cntnt">
										<ul class="icon mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
										</ul>
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<div class="dtls_headr">
											<ul class="tag">
												<li class="list-inline-item"><a href="#">Venda</a></li>
												<li class="list-inline-item"><a href="#">Lançamento</a></li>
											</ul>
											<a class="fp_price" href="#">R$587.000<small>,00</small></a>
										</div>
										<p class="text-thm">Apartmento</p>
										<h4>Cittá Splendore</h4>
										<p><span class="flaticon-placeholder"></span>Rua D, 155 - Despraiado, Cuiabá - MT<</p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> 4</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> 2</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> 58m²</span></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><span href="#"><img src="{{ asset('assets/portal/images/property/pposter1.png') }}" alt="pposter1.png"></span></li>
										    <li class="list-inline-item"><span href="#">Rosa Imóveis</span></li>
										</ul>
                                        <a href="{{ url('/detalhes-imovel') }}"><div class="fp_pdate float-right btn-detalhes">+ Detalhes</div></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="feat_property list">
								<div class="thumb">
									<a href="{{ url('/detalhes-imovel') }}"><img class="img-whp" src="{{ asset('assets/portal/images/property/fp2.jpg') }}" alt="fp1.jpg"></a>
									<div class="thmb_cntnt">
										<ul class="icon mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
										</ul>
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<div class="dtls_headr">
											<ul class="tag">
												<li class="list-inline-item"><a href="#">Venda</a></li>
												<li class="list-inline-item"><a href="#">Lançamento</a></li>
											</ul>
											<a class="fp_price" href="#">R$587.000<small>,00</small></a>
										</div>
										<p class="text-thm">Apartmento</p>
										<h4>Cittá Splendore</h4>
										<p><span class="flaticon-placeholder"></span>Rua D, 155 - Despraiado, Cuiabá - MT<</p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> 4</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> 2</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> 58m²</span></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><span href="#"><img src="{{ asset('assets/portal/images/property/pposter1.png') }}" alt="pposter1.png"></span></li>
										    <li class="list-inline-item"><span href="#">Rosa Imóveis</span></li>
										</ul>
                                        <a href="{{ url('/detalhes-imovel') }}"><div class="fp_pdate float-right btn-detalhes">+ Detalhes</div></a>
									</div>
								</div>
							</div>
						</div>

                        <div class="col-lg-12">
							<div class="feat_property list">
								<div class="thumb">
									<a href="{{ url('/detalhes-imovel') }}"><img class="img-whp" src="{{ asset('assets/portal/images/property/fp3.jpg') }}" alt="fp1.jpg"></a>
									<div class="thmb_cntnt">
										<ul class="icon mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
										</ul>
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<div class="dtls_headr">
											<ul class="tag">
												<li class="list-inline-item"><a href="#">Venda</a></li>
												<li class="list-inline-item"><a href="#">Lançamento</a></li>
											</ul>
											<a class="fp_price" href="#">R$587.000<small>,00</small></a>
										</div>
										<p class="text-thm">Apartmento</p>
										<h4>Cittá Splendore</h4>
										<p><span class="flaticon-placeholder"></span>Rua D, 155 - Despraiado, Cuiabá - MT<</p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> 4</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> 2</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> 58m²</span></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><span href="#"><img src="{{ asset('assets/portal/images/property/pposter1.png') }}" alt="pposter1.png"></span></li>
										    <li class="list-inline-item"><span href="#">Rosa Imóveis</span></li>
										</ul>
                                        <a href="{{ url('/detalhes-imovel') }}"><div class="fp_pdate float-right btn-detalhes">+ Detalhes</div></a>
									</div>
								</div>
							</div>
						</div>

                        <div class="col-lg-12">
							<div class="feat_property list">
								<div class="thumb">
									<a href="{{ url('/detalhes-imovel') }}"><img class="img-whp" src="{{ asset('assets/portal/images/property/fp4.jpg') }}" alt="fp1.jpg"></a>
									<div class="thmb_cntnt">
										<ul class="icon mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
										</ul>
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<div class="dtls_headr">
											<ul class="tag">
												<li class="list-inline-item"><a href="#">Venda</a></li>
												<li class="list-inline-item"><a href="#">Lançamento</a></li>
											</ul>
											<a class="fp_price" href="#">R$587.000<small>,00</small></a>
										</div>
										<p class="text-thm">Apartmento</p>
										<h4>Cittá Splendore</h4>
										<p><span class="flaticon-placeholder"></span>Rua D, 155 - Despraiado, Cuiabá - MT<</p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> 4</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> 2</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> 58m²</span></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><span href="#"><img src="{{ asset('assets/portal/images/property/pposter1.png') }}" alt="pposter1.png"></span></li>
										    <li class="list-inline-item"><span href="#">Rosa Imóveis</span></li>
										</ul>
                                        <a href="{{ url('/detalhes-imovel') }}"><div class="fp_pdate float-right btn-detalhes">+ Detalhes</div></a>
									</div>
								</div>
							</div>
						</div>

                        <div class="col-lg-12">
							<div class="feat_property list">
								<div class="thumb">
									<img class="img-whp" src="{{ asset('assets/portal/images/property/fp5.jpg') }}" alt="fp1.jpg">
									<div class="thmb_cntnt">
										<ul class="icon mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
										</ul>
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<div class="dtls_headr">
											<ul class="tag">
												<li class="list-inline-item"><a href="#">Venda</a></li>
												<li class="list-inline-item"><a href="#">Lançamento</a></li>
											</ul>
											<a class="fp_price" href="#">R$587.000<small>,00</small></a>
										</div>
										<p class="text-thm">Apartmento</p>
										<h4>Cittá Splendore</h4>
										<p><span class="flaticon-placeholder"></span>Rua D, 155 - Despraiado, Cuiabá - MT<</p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> 4</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> 2</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> 58m²</span></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><span href="#"><img src="{{ asset('assets/portal/images/property/pposter1.png') }}" alt="pposter1.png"></span></li>
										    <li class="list-inline-item"><span href="#">Rosa Imóveis</span></li>
										</ul>
                                        <a href="{{ url('/detalhes-imovel') }}"><div class="fp_pdate float-right btn-detalhes">+ Detalhes</div></a>
									</div>
								</div>
							</div>
						</div>

                        <div class="col-lg-12">
							<div class="feat_property list">
								<div class="thumb">
									<img class="img-whp" src="{{ asset('assets/portal/images/property/fp6.jpg') }}" alt="fp1.jpg">
									<div class="thmb_cntnt">
										<ul class="icon mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
										</ul>
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<div class="dtls_headr">
											<ul class="tag">
												<li class="list-inline-item"><a href="#">Venda</a></li>
												<li class="list-inline-item"><a href="#">Lançamento</a></li>
											</ul>
											<a class="fp_price" href="#">R$587.000<small>,00</small></a>
										</div>
										<p class="text-thm">Apartmento</p>
										<h4>Cittá Splendore</h4>
										<p><span class="flaticon-placeholder"></span>Rua D, 155 - Despraiado, Cuiabá - MT<</p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> 4</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> 2</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> 58m²</span></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><span href="#"><img src="{{ asset('assets/portal/images/property/pposter1.png') }}" alt="pposter1.png"></span></li>
										    <li class="list-inline-item"><span href="#">Rosa Imóveis</span></li>
										</ul>
                                        <a href="{{ url('/detalhes-imovel') }}"><div class="fp_pdate float-right btn-detalhes">+ Detalhes</div></a>
									</div>
								</div>
							</div>
						</div>

                        <div class="col-lg-12">
							<div class="feat_property list">
								<div class="thumb">
									<a href="{{ url('/detalhes-imovel') }}"><img class="img-whp" src="{{ asset('assets/portal/images/property/fp1.jpg') }}" alt="fp1.jpg"></a>
									<div class="thmb_cntnt">
										<ul class="icon mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
										</ul>
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<div class="dtls_headr">
											<ul class="tag">
												<li class="list-inline-item"><a href="#">Venda</a></li>
												<li class="list-inline-item"><a href="#">Lançamento</a></li>
											</ul>
											<a class="fp_price" href="#">R$587.000<small>,00</small></a>
										</div>
										<p class="text-thm">Apartmento</p>
										<h4>Cittá Splendore</h4>
										<p><span class="flaticon-placeholder"></span>Rua D, 155 - Despraiado, Cuiabá - MT<</p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> 4</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> 2</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> 58m²</span></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><span href="#"><img src="{{ asset('assets/portal/images/property/pposter1.png') }}" alt="pposter1.png"></span></li>
										    <li class="list-inline-item"><span href="#">Rosa Imóveis</span></li>
										</ul>
                                        <div class="fp_pdate float-right btn-detalhes">+ Detalhes</div>
									</div>
								</div>
							</div>
						</div>

                        <div class="col-lg-12">
							<div class="feat_property list">
								<div class="thumb">
									<a href="{{ url('/detalhes-imovel') }}"><img class="img-whp" src="{{ asset('assets/portal/images/property/fp2.jpg') }}" alt="fp1.jpg"></a>
									<div class="thmb_cntnt">
										<ul class="icon mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
										</ul>
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<div class="dtls_headr">
											<ul class="tag">
												<li class="list-inline-item"><a href="#">Venda</a></li>
												<li class="list-inline-item"><a href="#">Lançamento</a></li>
											</ul>
											<a class="fp_price" href="#">R$587.000<small>,00</small></a>
										</div>
										<p class="text-thm">Apartmento</p>
										<h4>Cittá Splendore</h4>
										<p><span class="flaticon-placeholder"></span>Rua D, 155 - Despraiado, Cuiabá - MT<</p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> 4</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> 2</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> 58m²</span></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><span href="#"><img src="{{ asset('assets/portal/images/property/pposter1.png') }}" alt="pposter1.png"></span></li>
										    <li class="list-inline-item"><span href="#">Rosa Imóveis</span></li>
										</ul>
                                        <div class="fp_pdate float-right btn-detalhes">+ Detalhes</div>
									</div>
								</div>
							</div>
						</div>

                        <div class="col-lg-12">
							<div class="feat_property list">
								<div class="thumb">
									<a href="{{ url('/detalhes-imovel') }}"><img class="img-whp" src="{{ asset('assets/portal/images/property/fp3.jpg') }}" alt="fp1.jpg"></a>
									<div class="thmb_cntnt">
										<ul class="icon mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
										</ul>
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<div class="dtls_headr">
											<ul class="tag">
												<li class="list-inline-item"><a href="#">Venda</a></li>
												<li class="list-inline-item"><a href="#">Lançamento</a></li>
											</ul>
											<a class="fp_price" href="#">R$587.000<small>,00</small></a>
										</div>
										<p class="text-thm">Apartmento</p>
										<h4>Cittá Splendore</h4>
										<p><span class="flaticon-placeholder"></span>Rua D, 155 - Despraiado, Cuiabá - MT<</p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> 4</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> 2</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> 58m²</span></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><span href="#"><img src="{{ asset('assets/portal/images/property/pposter1.png') }}" alt="pposter1.png"></span></li>
										    <li class="list-inline-item"><span href="#">Rosa Imóveis</span></li>
										</ul>
                                        <div class="fp_pdate float-right btn-detalhes">+ Detalhes</div>
									</div>
								</div>
							</div>
						</div>

                        <div class="col-lg-12">
							<div class="feat_property list">
								<div class="thumb">
									<img class="img-whp" src="{{ asset('assets/portal/images/property/fp4.jpg') }}" alt="fp1.jpg">
									<div class="thmb_cntnt">
										<ul class="icon mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
										</ul>
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<div class="dtls_headr">
											<ul class="tag">
												<li class="list-inline-item"><a href="#">Venda</a></li>
												<li class="list-inline-item"><a href="#">Lançamento</a></li>
											</ul>
											<a class="fp_price" href="#">R$587.000<small>,00</small></a>
										</div>
										<p class="text-thm">Apartmento</p>
										<h4>Cittá Splendore</h4>
										<p><span class="flaticon-placeholder"></span>Rua D, 155 - Despraiado, Cuiabá - MT<</p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> 4</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> 2</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> 58m²</span></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><span href="#"><img src="{{ asset('assets/portal/images/property/pposter1.png') }}" alt="pposter1.png"></span></li>
										    <li class="list-inline-item"><span href="#">Rosa Imóveis</span></li>
										</ul>
                                        <div class="fp_pdate float-right btn-detalhes">+ Detalhes</div>
									</div>
								</div>
							</div>
						</div>

                        <div class="col-lg-12">
							<div class="feat_property list">
								<div class="thumb">
									<img class="img-whp" src="{{ asset('assets/portal/images/property/fp5.jpg') }}" alt="fp1.jpg">
									<div class="thmb_cntnt">
										<ul class="icon mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
										</ul>
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<div class="dtls_headr">
											<ul class="tag">
												<li class="list-inline-item"><a href="#">Venda</a></li>
												<li class="list-inline-item"><a href="#">Lançamento</a></li>
											</ul>
											<a class="fp_price" href="#">R$587.000<small>,00</small></a>
										</div>
										<p class="text-thm">Apartmento</p>
										<h4>Cittá Splendore</h4>
										<p><span class="flaticon-placeholder"></span>Rua D, 155 - Despraiado, Cuiabá - MT<</p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> 4</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> 2</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> 58m²</span></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><span href="#"><img src="{{ asset('assets/portal/images/property/pposter1.png') }}" alt="pposter1.png"></span></li>
										    <li class="list-inline-item"><span href="#">Rosa Imóveis</span></li>
										</ul>
                                        <div class="fp_pdate float-right btn-detalhes">+ Detalhes</div>
									</div>
								</div>
							</div>
						</div>

                        <div class="col-lg-12">
							<div class="feat_property list">
								<div class="thumb">
									<img class="img-whp" src="{{ asset('assets/portal/images/property/fp6.jpg') }}" alt="fp1.jpg">
									<div class="thmb_cntnt">
										<ul class="icon mb0">
											<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
										</ul>
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<div class="dtls_headr">
											<ul class="tag">
												<li class="list-inline-item"><a href="#">Venda</a></li>
												<li class="list-inline-item"><a href="#">Lançamento</a></li>
											</ul>
											<a class="fp_price" href="#">R$587.000<small>,00</small></a>
										</div>
										<p class="text-thm">Apartmento</p>
										<h4>Cittá Splendore</h4>
										<p><span class="flaticon-placeholder"></span>Rua D, 155 - Despraiado, Cuiabá - MT<</p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> 4</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> 2</span></li>
										    <li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> 58m²</span></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><span href="#"><img src="{{ asset('assets/portal/images/property/pposter1.png') }}" alt="pposter1.png"></span></li>
										    <li class="list-inline-item"><span href="#">Rosa Imóveis</span></li>
										</ul>
                                        <div class="fp_pdate float-right btn-detalhes">+ Detalhes</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-12 mt20">
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
<script type="text/javascript" src="{{ asset('assets/portal/js/pricing-slider.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/timepicker.js') }}"></script>
<!-- Custom script for all pages -->
<script src="https://kit.fontawesome.com/952ef81d56.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/script.js') }}"></script>
</body>
</html>
