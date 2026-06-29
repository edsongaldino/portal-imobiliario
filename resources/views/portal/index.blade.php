<!DOCTYPE html>
<html dir="ltr" lang="pt-br">
<head>
    @include('includes.portal.head')
</head>
<body>
<div class="wrapper">
	<div class="preloader"></div>
    @php
        $menu = "";
        $logo = "logo-index";
        $bgs = [
            'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=2000&q=90',
            'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=2000&q=90',
            'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=2000&q=90',
            'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=2000&q=90',
            'https://images.unsplash.com/photo-1600566753376-12c8ab7fb75b?auto=format&fit=crop&w=2000&q=90',
            'https://images.unsplash.com/photo-1613977257363-707ba9348227?auto=format&fit=crop&w=2000&q=90',
            'https://images.unsplash.com/photo-1567767292278-a4f21aa2d36e?auto=format&fit=crop&w=2000&q=90',
            'https://images.unsplash.com/photo-1600585152220-90363fe7e115?auto=format&fit=crop&w=2000&q=90',
            'https://images.unsplash.com/photo-1600573472591-ee6c563aaec9?auto=format&fit=crop&w=2000&q=90',
            'https://images.unsplash.com/photo-1616594039964-ae9021a400a0?auto=format&fit=crop&w=2000&q=90'
        ];
        $randBg = $bgs[array_rand($bgs)];
    @endphp
	@include('includes.portal.menu')

	<!-- ===================== HERO ===================== -->
	<section class="hp-hero home1-overlay" style="background: url('{{ $randBg }}') center center / cover no-repeat; position:relative;">
		<div class="container" style="position:relative; z-index:2;">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-10 text-center mx-auto">
					<div class="hp-hero-content">
						<h1 class="hp-hero-title">Encontre o imóvel<br><span class="hp-green">ideal</span> para você</h1>
						<p class="hp-hero-sub">Os melhores imóveis para comprar ou alugar<br class="d-none d-md-block"> em Cuiabá e região.</p>
						<div class="hp-tabs">
							<button type="button" class="hp-tab active btnTransacao" data-transacao="Venda" id="tab-venda">
								<i class="fa-solid fa-house"></i> Venda
							</button>
							<button type="button" class="hp-tab btnTransacao" data-transacao="Locação" id="tab-locacao">
								<i class="fa-solid fa-key"></i> Locação
							</button>
							<button type="button" class="hp-tab btnTransacao" data-transacao="Lançamentos" id="tab-novos">
								<i class="fa-solid fa-building-columns"></i> Novos
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Search Card — overlapping hero bottom -->
	<div class="hp-search-wrap">
		<div class="container">
			<div class="hp-search-card">
				<form action="{{ url('imoveis-buscar') }}" id="BuscaImoveis" name="BuscaImoveis" method="POST">
				@csrf
				<input type="hidden" name="transacao" id="transacao" value="Venda">
				<div class="hp-search-row">
					<!-- Campo Localização -->
					<div class="hp-search-field">
						<div class="hp-field-icon"><i class="fa-solid fa-location-dot"></i></div>
						<div class="hp-field-body">
							<label class="hp-field-label">Onde você quer morar?</label>
							<select class="selectpicker" name="localizacao" id="localizacao" data-live-search="true" data-width="100%">
								@foreach ($cidades as $cidade)
									<option value="{{ $cidade->id }}">{{ $cidade->nome_cidade }} - {{ $cidade->estado->uf_estado }} ({{ Helper::GetTotalAnunciosByCidade($cidade->id, 1)}})</option>
								@endforeach
							</select>
						</div>
					</div>
					<!-- Divider -->
					<div class="hp-field-divider"></div>
					<!-- Campo Tipo -->
					<div class="hp-search-field">
						<div class="hp-field-icon"><i class="fa-solid fa-building"></i></div>
						<div class="hp-field-body">
							<label class="hp-field-label">Tipo do imóvel</label>
							<select name="tipo_imovel[]" id="tipo_imovel" class="selectpicker w100 show-tick" multiple title="Tipo do imóvel">
								@foreach ($tipos as $tipo)
								<option value="{{ $tipo->id }}">{{ $tipo->nome }} ({{ $tipo->finalidade }})</option>
								@endforeach
							</select>
						</div>
					</div>
					<!-- Botão -->
					<button type="submit" class="hp-search-btn">
						<i class="fa-solid fa-magnifying-glass"></i> Buscar imóveis
					</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	<!-- ===================== STATS BAR ===================== -->
	<section class="hp-stats-bar">
		<div class="container">
			<div class="hp-stats-row">
				<div class="hp-stat-item">
					<div class="hp-stat-icon"><i class="fa-solid fa-building"></i></div>
					<div class="hp-stat-text">
						<strong>{{ number_format($totalAnuncios ?? 0, 0, ',', '.') }}</strong>
						<span>Imóveis disponíveis</span>
					</div>
				</div>
				<div class="hp-stat-divider"></div>
				<div class="hp-stat-item">
					<div class="hp-stat-icon"><i class="fa-solid fa-handshake"></i></div>
					<div class="hp-stat-text">
						<strong>{{ number_format($totalAnunciantes ?? 0, 0, ',', '.') }}</strong>
						<span>Imobiliárias parceiras</span>
					</div>
				</div>
				<div class="hp-stat-divider"></div>
				<div class="hp-stat-item">
					<div class="hp-stat-icon"><i class="fa-solid fa-chart-line"></i></div>
					<div class="hp-stat-text">
						<strong>{{ number_format($totalViews ?? 0, 0, ',', '.') }}</strong>
						<span>Visualizações de imóveis</span>
					</div>
				</div>
				<div class="hp-stat-divider"></div>
				<div class="hp-stat-item">
					<div class="hp-stat-icon"><i class="fa-solid fa-headset"></i></div>
					<div class="hp-stat-text">
						<strong>Atendimento</strong>
						<span>7 dias por semana</span>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ===================== CATEGORIAS ===================== -->
	<section class="hp-section hp-categories-section">
		<div class="container">
			<div class="hp-section-header">
				<h2 class="hp-section-title">Navegue por categoria</h2>
				<a href="{{ url('lista-imoveis/todas') }}" class="hp-section-link">Ver todas as categorias <i class="fa-solid fa-arrow-right"></i></a>
			</div>
			<div class="hp-categories-grid">
				<a href="{{ url('lista-imoveis/venda?tipo=apartamento') }}" class="hp-category-card">
					<div class="hp-cat-icon"><i class="fa-solid fa-building"></i></div>
					<div class="hp-cat-name">Apartamentos</div>
					<div class="hp-cat-count">{{ Helper::GetTotalAnunciosByTipoNome('Apartamento') ?? '' }} imóveis</div>
				</a>
				<a href="{{ url('lista-imoveis/venda?tipo=casa') }}" class="hp-category-card">
					<div class="hp-cat-icon"><i class="fa-solid fa-house"></i></div>
					<div class="hp-cat-name">Casas</div>
					<div class="hp-cat-count">{{ Helper::GetTotalAnunciosByTipoNome('Casa') ?? '' }} imóveis</div>
				</a>
				<a href="{{ url('lista-imoveis/venda?tipo=condominio') }}" class="hp-category-card">
					<div class="hp-cat-icon"><i class="fa-solid fa-city"></i></div>
					<div class="hp-cat-name">Condomínios</div>
					<div class="hp-cat-count">{{ Helper::GetTotalAnunciosByTipoNome('Condomínio') ?? '' }} imóveis</div>
				</a>
				<a href="{{ url('lista-imoveis/venda?tipo=comercial') }}" class="hp-category-card">
					<div class="hp-cat-icon"><i class="fa-solid fa-store"></i></div>
					<div class="hp-cat-name">Comerciais</div>
					<div class="hp-cat-count">{{ Helper::GetTotalAnunciosByTipoNome('Sala Comercial') ?? '' }} imóveis</div>
				</a>
				<a href="{{ url('lista-imoveis/novos') }}" class="hp-category-card">
					<div class="hp-cat-icon"><i class="fa-solid fa-rocket"></i></div>
					<div class="hp-cat-name">Lançamentos</div>
					<div class="hp-cat-count">326 imóveis</div>
				</a>
				<a href="{{ url('lista-imoveis/venda?tipo=chacara') }}" class="hp-category-card">
					<div class="hp-cat-icon"><i class="fa-solid fa-tree"></i></div>
					<div class="hp-cat-name">Chácaras & Sítios</div>
					<div class="hp-cat-count">{{ Helper::GetTotalAnunciosByTipoNome('Chácara') ?? '' }} imóveis</div>
				</a>
			</div>
		</div>
	</section>

	<!-- ===================== IMÓVEIS EM DESTAQUE ===================== -->
	<section class="hp-section hp-destaque-section">
		<div class="container">
			<div class="hp-section-header">
				<h2 class="hp-section-title">Imóveis em destaque</h2>
				<a href="{{ url('imoveis-buscar') }}" class="hp-section-link">Ver todos os imóveis <i class="fa-solid fa-arrow-right"></i></a>
			</div>
			<div class="hp-property-slider owl-carousel">
				@foreach ($destaques as $destaque)
				<div class="hp-property-card">
					<a href="/imoveis/{{ $destaque->id }}/{{ Helper::url_amigavel($destaque->tipo->nome .'-'. $destaque->transacao) }}/{{ Helper::url_amigavel($destaque->endereco->cidade->nome_cidade .'-'. $destaque->endereco->cidade->estado->uf_estado)}}" target="_blank">
						<div class="hp-prop-thumb">
							@if (isset($destaque->fotos->first()->arquivo))
							<img src="{{ $destaque->fotos->first()->arquivo }}" alt="{{ $destaque->nome }}">
							@else
							<img src="{{ asset('assets/portal/images/property/sem-foto.jpg') }}" alt="sem-foto">
							@endif
							<span class="hp-prop-badge">Destaque</span>
						</div>
						<div class="hp-prop-body">
							<p class="hp-prop-tipo">{{ $destaque->tipo->nome }} à {{ strtolower($destaque->transacao) }}</p>
							<p class="hp-prop-local"><i class="fa-solid fa-location-dot"></i> {{ $destaque->endereco->bairro_endereco }}, {{ $destaque->endereco->cidade->nome_cidade }}</p>
							<div class="hp-prop-price">
								@if($destaque->transacao == 'Venda' || $destaque->transacao == 'Locação/Venda')
								R$ {{ Helper::converte_valor_real($destaque->valor_venda) }}
								@elseif($destaque->transacao == 'Locação')
								R$ {{ Helper::converte_valor_real($destaque->valor_locacao) }}/mês
								@endif
							</div>
							<ul class="hp-prop-details">
								<li><i class="fa-solid fa-ruler-combined"></i> {{ Helper::GetInformacaoByChave($destaque->id,'Área Útil') }}m²</li>
								<li><i class="fa-solid fa-bed"></i> {{ Helper::GetInformacaoByChave($destaque->id,'Quartos') }} quartos</li>
								<li><i class="fa-solid fa-car"></i> {{ Helper::GetInformacaoByChave($destaque->id,'Vagas') }} vagas</li>
								<li><i class="fa-solid fa-shower"></i> {{ Helper::GetInformacaoByChave($destaque->id,'Banheiros') }} banheiros</li>
							</ul>
						</div>
					</a>
					<div class="hp-prop-footer">
						<a href="/imoveis/{{ $destaque->id }}/{{ Helper::url_amigavel($destaque->tipo->nome .'-'. $destaque->transacao) }}/{{ Helper::url_amigavel($destaque->endereco->cidade->nome_cidade .'-'. $destaque->endereco->cidade->estado->uf_estado)}}" class="hp-btn-detalhes" target="_blank">Ver detalhes</a>
						<a href="https://wa.me/{{ preg_replace('/\D/', '', $destaque->anunciante->whatsapp ?? '') }}?text=Olá! Vi o imóvel {{ $destaque->nome }} no portal e tenho interesse." class="hp-btn-whatsapp" target="_blank"><i class="fa-brands fa-whatsapp"></i> WhatsApp</a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>

	<!-- ===================== PARCEIROS ===================== -->
	<section class="hp-section hp-partners-section">
		<div class="container">
			<div class="hp-section-header">
				<h2 class="hp-section-title">Imobiliárias parceiras</h2>
				<a href="{{ url('lista-imoveis/venda') }}" class="hp-section-link">Ver todas <i class="fa-solid fa-arrow-right"></i></a>
			</div>
			<div class="hp-partners-slider owl-carousel">
				@foreach ($anunciantes as $anunciante)
				<div class="hp-partner-item">
					<a href="/lista-imoveis/{{ $anunciante->id }}/{{ Helper::url_amigavel($anunciante->nome) }}" target="_blank">
						<img src="{{ url('anunciante/'.$anunciante->id.'/logo') }}" alt="{{ $anunciante->nome }}" class="hp-partner-logo">
					</a>
				</div>
				@endforeach
			</div>
		</div>
	</section>

	@include('includes.portal.footer')

</div>

<link rel="stylesheet" href="{{ asset('assets/portal/css/responsive.css') }}">
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
<script src="https://kit.fontawesome.com/952ef81d56.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/script.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/custom.js') }}"></script>
<script>
$(document).ready(function(){
    // Owl Carousel - Imóveis em destaque
    if($('.hp-property-slider').length){
        $('.hp-property-slider').owlCarousel({
            loop: true,
            margin: 24,
            nav: true,
            dots: false,
            navText: ['<i class="fa-solid fa-chevron-left"></i>','<i class="fa-solid fa-chevron-right"></i>'],
            responsive: { 0:{items:1}, 768:{items:2}, 1024:{items:3} }
        });
    }
    // Owl Carousel - Parceiros
    if($('.hp-partners-slider').length){
        $('.hp-partners-slider').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            navText: ['<i class="fa-solid fa-chevron-left"></i>','<i class="fa-solid fa-chevron-right"></i>'],
            responsive: { 0:{items:2}, 576:{items:3}, 768:{items:4}, 1024:{items:5} }
        });
    }
    // Tab switching
    $(document).on('click', '.hp-tab', function(){
        $('.hp-tab').removeClass('active');
        $(this).addClass('active');
        $('#transacao').val($(this).data('transacao'));
    });
});
</script>
@if(session('error'))
<script>
$(document).ready(function() {
	alert("{{ session('error') }}");
});
</script>
@endif
</body>
</html>
