<!DOCTYPE html>
<html dir="ltr" lang="pt-br">
<head>
    @include('includes.portal.head')
    <style>
        .nav-tabs .nav-link {
            border: none;
            color: #666;
            font-size: 16px;
            font-weight: bold;
            padding: 15px 25px;
        }
        .nav-tabs .nav-link.active {
            border-bottom: 3px solid #ff5a5f;
            color: #ff5a5f;
            background: transparent;
        }
        .feat_property {
            background: #ffffff;
            border-radius: 6px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            transition: all 0.3s ease;
            overflow: hidden;
        }
        .feat_property:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        .empty-state {
            padding: 60px 20px;
            text-align: center;
            background: #ffffff;
            border-radius: 6px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .empty-state i {
            font-size: 50px;
            color: #ccc;
            margin-bottom: 15px;
        }
    </style>
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
						    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Minha Conta</li>
						</ol>
						<h4 class="breadcrumb_title">Olá, {{ explode(' ', $usuario->name)[0] }}!</h4>
					</div>
				</div>
			</div>
		</div>
	</section>

    <!-- Client Dashboard -->
	<section class="our-terms bgc-f7">
		<div class="container">
			<div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs mb30" id="myTab" role="tablist" style="border-bottom: 1px solid #dee2e6;">
                        <li class="nav-item">
                            <a class="nav-link active" id="favorites-tab" data-toggle="tab" href="#favorites" role="tab" aria-controls="favorites" aria-selected="true">
                                <i class="fa fa-heart"></i> Meus Favoritos ({{ $favorites->count() }})
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">
                                <i class="fa fa-history"></i> Histórico de Navegação ({{ $history->count() }})
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        
                        <!-- TAB: FAVORITES -->
                        <div class="tab-pane fade show active" id="favorites" role="tabpanel" aria-labelledby="favorites-tab">
                            @if($favorites->isEmpty())
                                <div class="empty-state">
                                    <i class="fa fa-heart-o"></i>
                                    <h4>Nenhum imóvel favoritado</h4>
                                    <p class="text-muted">Você ainda não salvou nenhum imóvel nos favoritos. Explore nossos anúncios e favorite-os clicando no coração!</p>
                                    <a href="{{ url('/imoveis-buscar') }}" class="btn btn-thm mt15">Buscar Imóveis</a>
                                </div>
                            @else
                                <div class="row">
                                    @foreach($favorites as $fav)
                                        @php $anuncio = $fav->anuncio; @endphp
                                        @if($anuncio)
                                        <div class="col-md-6 col-lg-4">
                                            <div class="feat_property">
                                                <a href="/imoveis/{{ $anuncio->id }}/{{ Helper::url_amigavel($anuncio->tipo->nome .'-'. $anuncio->transacao) }}/{{ Helper::url_amigavel($anuncio->endereco->cidade->nome_cidade .'-'. $anuncio->endereco->cidade->estado->uf_estado)}}">
                                                    <div class="thumb">
                                                        @if (isset($anuncio->fotos->first()->arquivo))
                                                            <img class="img-whp" src="{{ $anuncio->fotos->first()->arquivo }}" alt="" style="height: 220px; object-fit: cover;">
                                                        @else
                                                            <img class="img-whp" src="{{ asset('assets/portal/images/property/sem-foto.jpg') }}" alt="" style="height: 220px; object-fit: cover;">
                                                        @endif
                                                        <div class="thmb_cntnt">
                                                            <ul class="tag mb0">
                                                                <li class="list-inline-item"><span>{{ $anuncio->transacao }}</span></li>
                                                            </ul>
                                                            @if($anuncio->transacao == 'Venda' || $anuncio->transacao == 'Locação/Venda')
                                                                <span class="fp_price">R$ {{ Helper::converte_valor_real($anuncio->valor_venda) }}</span>
                                                            @elseif($anuncio->transacao == 'Locação')
                                                                <span class="fp_price">R$ {{ Helper::converte_valor_real($anuncio->valor_locacao) }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="details">
                                                        <div class="tc_content">
                                                            <p class="text-thm">{{ $anuncio->tipo->nome }}</p>
                                                            <h4 style="font-size: 16px; font-weight: bold; margin-bottom: 5px; height: 22px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $anuncio->titulo }}</h4>
                                                            <p style="font-size: 13px; color: #777; margin-bottom: 10px;"><span class="flaticon-placeholder"></span> {{ $anuncio->endereco->bairro_endereco }}, {{ $anuncio->endereco->cidade->nome_cidade }} - {{ $anuncio->endereco->cidade->estado->uf_estado }}</p>
                                                            <ul class="prop_details mb0" style="font-size: 12px; color: #555;">
                                                                <li class="list-inline-item" style="margin-right: 15px;"><span><i class="fa-solid fa-bed"></i> {{ Helper::GetInformacaoByChave($anuncio,'Quartos') }} Qts</span></li>
                                                                <li class="list-inline-item" style="margin-right: 15px;"><span><i class="fa-solid fa-shower"></i> {{ Helper::GetInformacaoByChave($anuncio,'Banheiros') }} Banh</span></li>
                                                                <li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> {{ Helper::GetInformacaoByChave($anuncio,'Área Útil') }}m²</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <!-- TAB: NAVIGATION HISTORY -->
                        <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                            @if($history->isEmpty())
                                <div class="empty-state">
                                    <i class="fa fa-history"></i>
                                    <h4>Histórico de navegação vazio</h4>
                                    <p class="text-muted">Você ainda não visualizou os detalhes de nenhum imóvel.</p>
                                    <a href="{{ url('/imoveis-buscar') }}" class="btn btn-thm mt15">Buscar Imóveis</a>
                                </div>
                            @else
                                <div class="row">
                                    @foreach($history as $hist)
                                        @php $anuncio = $hist->anuncio; @endphp
                                        @if($anuncio)
                                        <div class="col-md-6 col-lg-4">
                                            <div class="feat_property">
                                                <a href="/imoveis/{{ $anuncio->id }}/{{ Helper::url_amigavel($anuncio->tipo->nome .'-'. $anuncio->transacao) }}/{{ Helper::url_amigavel($anuncio->endereco->cidade->nome_cidade .'-'. $anuncio->endereco->cidade->estado->uf_estado)}}">
                                                    <div class="thumb">
                                                        @if (isset($anuncio->fotos->first()->arquivo))
                                                            <img class="img-whp" src="{{ $anuncio->fotos->first()->arquivo }}" alt="" style="height: 220px; object-fit: cover;">
                                                        @else
                                                            <img class="img-whp" src="{{ asset('assets/portal/images/property/sem-foto.jpg') }}" alt="" style="height: 220px; object-fit: cover;">
                                                        @endif
                                                        <div class="thmb_cntnt">
                                                            <ul class="tag mb0">
                                                                <li class="list-inline-item"><span>{{ $anuncio->transacao }}</span></li>
                                                            </ul>
                                                            @if($anuncio->transacao == 'Venda' || $anuncio->transacao == 'Locação/Venda')
                                                                <span class="fp_price">R$ {{ Helper::converte_valor_real($anuncio->valor_venda) }}</span>
                                                            @elseif($anuncio->transacao == 'Locação')
                                                                <span class="fp_price">R$ {{ Helper::converte_valor_real($anuncio->valor_locacao) }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="details">
                                                        <div class="tc_content">
                                                            <p class="text-thm">{{ $anuncio->tipo->nome }}</p>
                                                            <h4 style="font-size: 16px; font-weight: bold; margin-bottom: 5px; height: 22px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $anuncio->titulo }}</h4>
                                                            <p style="font-size: 13px; color: #777; margin-bottom: 10px;"><span class="flaticon-placeholder"></span> {{ $anuncio->endereco->bairro_endereco }}, {{ $anuncio->endereco->cidade->nome_cidade }} - {{ $anuncio->endereco->cidade->estado->uf_estado }}</p>
                                                            <ul class="prop_details mb0" style="font-size: 12px; color: #555;">
                                                                <li class="list-inline-item" style="margin-right: 15px;"><span><i class="fa-solid fa-bed"></i> {{ Helper::GetInformacaoByChave($anuncio,'Quartos') }} Qts</span></li>
                                                                <li class="list-inline-item" style="margin-right: 15px;"><span><i class="fa-solid fa-shower"></i> {{ Helper::GetInformacaoByChave($anuncio,'Banheiros') }} Banh</span></li>
                                                                <li class="list-inline-item"><span><i class="fa-solid fa-ruler-combined"></i> {{ Helper::GetInformacaoByChave($anuncio,'Área Útil') }}m²</span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
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

<!-- Custom script for all pages -->
<script src="https://kit.fontawesome.com/952ef81d56.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/script.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/custom.js') }}"></script>

</body>
</html>
