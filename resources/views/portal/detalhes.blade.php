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

	<!-- Listing Single Property -->
	<section class="listing-title-area p0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 p0">
					<div class="listing_single_property_slider">
                        @foreach ($anuncio->fotos as $foto)
                        <div class="item">
							<a class="popup-img" href="{{ $foto->arquivo }}"><img class="img-fluid" src="{{ $foto->arquivo }}" alt="{{ $foto->titulo }}"></a>
						</div>
                        @endforeach
					</div>
				</div>
			</div>
		</div>
	</section>

    <!-- Agent Single Grid View -->
	<section class="our-agent-single pb30-991">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-8">
					<div class="row">
						<div class="col-lg-12">
							<div class="listing_single_description">

								<div class="single_property_title mt30-767">
									<h2>{{ $anuncio->titulo }}</h2>
									<p>{{ $anuncio->endereco->logradouro_endereco }} - {{ $anuncio->endereco->bairro_endereco }}, {{ $anuncio->endereco->cidade->nome_cidade }} - {{ $anuncio->endereco->cidade->estado->uf_estado }}</p>
								</div>

								<div class="spss float-right fn-400">
									<ul class="mb0">
										<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
										<li class="list-inline-item"><a href="#"><span class="flaticon-share"></span></a></li>
									</ul>
								</div>

								<div class="lsd_list">
									<ul class="mb0">
										<li class="list-inline-item"><span><i class="fa-solid fa-building"></i> {{ $anuncio->tipo->nome }}</span></li>
										<li class="list-inline-item"><span><i class="fa-solid fa-bed"></i> {{ Helper::GetInformacaoByChave($anuncio->id,'Quartos') }}</span></li>
										<li class="list-inline-item"><span><i class="fa-solid fa-shower"></i> {{ Helper::GetInformacaoByChave($anuncio->id,'Banheiros') }}</span></li>
										<li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> {{ Helper::GetInformacaoByChave($anuncio->id,'Área Útil') }}m²</span></li>
									</ul>
								</div>
								<h4 class="mb30">Descrição</h4>
						    	<p class="mb25">{{ $anuncio->descricao_resumida ?? '' }}</p>
								<div class="collapse" id="collapseExample">
								  	<div class="card card-body">
								    	<p class="mt10 mb10">{{ $anuncio->descricao }}</p>
								  	</div>
								</div>
								<p class="overlay_close">
									<a class="text-thm fz14" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
								   	 + Ver mais <span class="flaticon-download-1 fz12"></span>
								  	</a>
								</p>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="additional_details">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb15">Informações do Anúncio</h4>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-4">
										<ul class="list-inline-item">
											<li><p>ID Imóvel :</p></li>
											<li><p>Valor :</p></li>
											<li><p>Condomínio :</p></li>
											<li><p>IPTU :</p></li>
										</ul>
										<ul class="list-inline-item">
											<li><p><span>{{ $anuncio->id_externo }}</span></p></li>
											<li><p><span>R$ {{ Helper::converte_valor_real($anuncio->valor_venda) }}</span></p></li>
											<li><p><span>R$ {{ Helper::converte_valor_real($anuncio->valor_condominio) }}</span></p></li>
											<li><p><span>R$ {{ Helper::converte_valor_real(Helper::GetInformacaoByChave($anuncio->id,'IPTU')) }}</span></p></li>
										</ul>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-4">
										<ul class="list-inline-item">
											<li><p>Quartos :</p></li>
											<li><p>Banheiros :</p></li>
											<li><p>Suítes :</p></li>
											<li><p>Vagas de Garagem :</p></li>
										</ul>
										<ul class="list-inline-item">
											<li><p><span>{{ Helper::GetInformacaoByChave($anuncio->id,'Quartos') }}</span></p></li>
											<li><p><span>{{ Helper::GetInformacaoByChave($anuncio->id,'Banheiros') }}</span></p></li>
											<li><p><span>{{ Helper::GetInformacaoByChave($anuncio->id,'Suites') }}</span></p></li>
											<li><p><span>{{ Helper::GetInformacaoByChave($anuncio->id,'Vagas') }}</span></p></li>
										</ul>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-4">
										<ul class="list-inline-item">
											<li><p>Tipo :</p></li>
											<li><p>Transação :</p></li>
										</ul>
										<ul class="list-inline-item">
											<li><p><span>{{ $anuncio->tipo->nome }}</span></p></li>
											<li><p><span>{{ $anuncio->transacao }}</span></p></li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-12">
							<div class="application_statics mt30">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb10">Características</h4>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-4">
										<ul class="order_list list-inline-item">
											<li><a href="#"><span class="flaticon-tick"></span>Academia</a></li>
											<li><a href="#"><span class="flaticon-tick"></span>Quadra de Tênis</a></li>
											<li><a href="#"><span class="flaticon-tick"></span>Piscina</a></li>
											<li><a href="#"><span class="flaticon-tick"></span>Pista de Caminhada</a></li>
											<li><a href="#"><span class="flaticon-tick"></span>Salão de Festas</a></li>
										</ul>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-4">
										<ul class="order_list list-inline-item">
											<li><a href="#"><span class="flaticon-tick"></span>Sauna</a></li>
											<li><a href="#"><span class="flaticon-tick"></span>Aceita Pets</a></li>
											<li><a href="#"><span class="flaticon-tick"></span>Chuveiro</a></li>
											<li><a href="#"><span class="flaticon-tick"></span>Churrasqueira</a></li>
											<li><a href="#"><span class="flaticon-tick"></span>Sauna</a></li>
										</ul>
									</div>
									<div class="col-sm-6 col-md-6 col-lg-4">
										<ul class="order_list list-inline-item">
											<li><a href="#"><span class="flaticon-tick"></span>Academia</a></li>
											<li><a href="#"><span class="flaticon-tick"></span>Quadra de Tênis</a></li>
											<li><a href="#"><span class="flaticon-tick"></span>Piscina</a></li>
											<li><a href="#"><span class="flaticon-tick"></span>Pista de Caminhada</a></li>
											<li><a href="#"><span class="flaticon-tick"></span>Salão de Festas</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="application_statics mt30">
								<h4 class="mb30">Localização <small class="float-right">{{ $anuncio->endereco->logradouro_endereco }} - {{ $anuncio->endereco->bairro_endereco }}, {{ $anuncio->endereco->cidade->nome_cidade }} - {{ $anuncio->endereco->cidade->estado->uf_estado }}</small></h4>
								<div class="property_video p0">
									<div class="thumb">
										<div class="h400" id="map-canvas"></div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-12">
							<div class="shop_single_tab_content style2 bdr1 mt30">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
									    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Vídeo do Imóvel</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent2">
									<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
										<div class="property_video">
											<div class="thumb">
												<div class="embed-responsive embed-responsive-16by9">
                                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/2akHQqfGNMI" allowfullscreen></iframe>
                                                </div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-xl-4">


					<div class="sidebar_listing_list detalhes-valor">

                        @if($anuncio->transacao == 'Venda' || $anuncio->transacao == 'Locação/Venda')
						<div class="item-valor">
							<div class="label-price">Venda (R$):</div>
							<div class="price text-right">
								{{ Helper::converte_valor_real($anuncio->valor_venda) }}
							</div>
						</div>
                        @endif

                        @if($anuncio->transacao == 'Locação' || $anuncio->transacao == 'Locação/Venda')
						<div class="item-valor">
							<div class="label-price">Aluguel (R$):</div>
							<div class="price text-right">
								{{ Helper::converte_valor_real($anuncio->valor_locacao) }}
							</div>
						</div>
                        @endif

						<div class="item-valor cond">
							<div class="label-condominio">Condomínio (R$):</div>
							<div class="text-right condominio">
								{{ Helper::converte_valor_real($anuncio->valor_condominio) }}
							</div>
						</div>

						<div class="item-valor cond">
							<div class="label-condominio">IPTU (R$):</div>
							<div class="text-right condominio">
								-
							</div>
						</div>
					</div>

					<div class="sidebar_listing_list form-contato">
						<div class="sidebar_advanced_search_widget">
							<div class="sl_creator">
								<h4 class="mb25">Anunciante</h4>
								<div class="media">
									<img class="mr-3" src="{{ url('anunciante/'.$anuncio->anunciante->id.'/logo') }}" alt="lc1.png" width="100">
									<div class="media-body">
								    	<h5 class="mt-0 mb0">{{ $anuncio->anunciante->nome }}</h5>
								    	<a class="text-thm" href="#">{{ $anuncio->anunciante->telefone_comercial }}</a>
								  	</div>
								</div>
							</div>

                            <div class="btn-whatsapp"><i class="fa-brands fa-whatsapp"></i> Contato por Whatsapp</div>
                            <div class="btn-visita"><i class="fa-solid fa-calendar"></i> Agendar uma visita</div>

							<ul class="sasw_list mb0">
								<li class="search_area">
								    <div class="form-group">
								    	<input type="text" class="form-control" id="exampleInputName1" placeholder="Seu nome completo">
								    </div>
								</li>
								<li class="search_area">
								    <div class="form-group">
								    	<input type="number" class="form-control" id="exampleInputName2" placeholder="Telefone">
								    </div>
								</li>
								<li class="search_area">
								    <div class="form-group">
								    	<input type="email" class="form-control" id="exampleInputEmail" placeholder="Email">
								    </div>
								</li>
								<li class="search_area">
		                            <div class="form-group">
		                                <textarea id="form_message" name="form_message" class="form-control required" rows="5" required="required" placeholder="">Olá, tenho interesse neste imóvel: Apartamento, 76m², 2 quartos, Rua dos Xavantes, 457 - Santa Helena, Cuiabá - MT, Aluguel, R$ 1900/Mês. Aguardo o contato. Obrigado.</textarea>
		                            </div>
								</li>
								<li>
									<div class="search_option_button">
									    <button type="submit" class="btn btn-block btn-thm btn-enviar">Enviar</button>
									</div>
								</li>
							</ul>
						</div>
					</div>

					<div class="terms_condition_widget">
					<h4 class="title">Imóveis destacados</h4>
						<div class="sidebar_feature_property_slider">


                            @foreach ($destaques as $destaque)
                            <div class="item">
                                <div class="feat_property home7">
                                    <a href="/imoveis/{{ $destaque->id }}/{{ Helper::url_amigavel($destaque->tipo->nome .'-'. $destaque->transacao) }}/{{ Helper::url_amigavel($destaque->endereco->cidade->nome_cidade .'-'. $destaque->endereco->cidade->estado->uf_estado)}}">
                                    <div class="thumb">
                                        <img class="img-whp" src="{{ $destaque->fotos->first()->arquivo ?? '' }}" alt="fp1.jpg">
                                        <div class="thmb_cntnt">
                                            <ul class="tag mb0">
                                                <li class="list-inline-item"><span>{{ $destaque->transacao }}</span></li>
                                            </ul>
                                            <span class="fp_price">R$ {{ Helper::converte_valor_real($destaque->valor_venda) }}</span>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLZYFMbNKXu2gyC_yxbdEDGxA6G0LSNu8&callback=initMap"type="text/javascript"></script>

<!-- Custom script for all pages -->
<script src="https://kit.fontawesome.com/952ef81d56.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/script.js') }}"></script>

<script>
    var MY_MAPTYPE_ID = 'style_KINESB';

function initialize() {
  var featureOpts = [
    {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#666666"
            }
        ]
    },
    {
    "featureType": 'all',
    "elementType": 'labels',
    "stylers": [
            { visibility: 'simplified' }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#e2e2e2"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": 45
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#aadaff"
            },
            {
                "visibility": "on"
            }
        ]
    }
];
  var myGent = new google.maps.LatLng({{ $latLong["lat"] }},{{ $latLong["lng"] }});
  var Kine = new google.maps.LatLng({{ $latLong["lat"] }},{{ $latLong["lng"] }});
  var mapOptions = {
    zoom: 11,
    mapTypeControl: true,
    zoomControl: true,
    zoomControlOptions: {
        style: google.maps.ZoomControlStyle.SMALL,
        position: google.maps.ControlPosition.LEFT_TOP,
        mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
    },
    mapTypeId: MY_MAPTYPE_ID,
    scaleControl: false,
    streetViewControl: false,
    center: myGent
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  var styledMapOptions = {
    name: 'style_KINESB'
  };

var image = "{{ asset('assets/portal/images/resource/mapmarker.png') }}";
  var marker = new google.maps.Marker({
        position: Kine,
        map: map,
        animation: google.maps.Animation.DROP,
        title: "{{ $anuncio->endereco->logradouro_endereco.', '.$anuncio->endereco->bairro_endereco.', '.$anuncio->endereco->cidade->nome_cidade.'-'.$anuncio->endereco->cidade->estado->uf_estado }}",
        icon: image
  });

  var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);
  map.mapTypes.set(MY_MAPTYPE_ID, customMapType);

}
google.maps.event.addDomListener(window, 'load', initialize);

</script>



</body>
</html>
