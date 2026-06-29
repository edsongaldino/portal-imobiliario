<!DOCTYPE html>
<html dir="ltr" lang="pt-br">
<head>
	@include('includes.painel.head')
	<style>
		:root {
			--primary-green: #0d7a42;
			--primary-green-hover: #0a6335;
			--bg-light: #f8fafc;
			--text-main: #0f172a;
			--text-muted: #64748b;
			--border-color: #e2e8f0;
		}

		body {
			background-color: var(--bg-light);
			font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
		}

		.ui-card {
			background: #ffffff;
			border: 1px solid var(--border-color);
			border-radius: 14px;
			padding: 20px 24px;
			margin-bottom: 20px;
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
		}

		.form-control-custom {
			border: 1px solid var(--border-color);
			border-radius: 8px;
			height: 42px;
			padding: 8px 14px;
			font-size: 14px;
			color: var(--text-main);
			background-color: #fff;
			transition: all 0.2s ease;
		}
		.form-control-custom:focus {
			border-color: var(--primary-green);
			box-shadow: 0 0 0 3px rgba(13, 122, 66, 0.1);
			outline: none;
		}

		.btn-green {
			background-color: var(--primary-green);
			color: #ffffff;
			border-radius: 8px;
			height: 42px;
			padding: 0 20px;
			font-weight: 600;
			font-size: 14px;
			border: none;
			display: inline-flex;
			align-items: center;
			justify-content: center;
			gap: 8px;
			transition: background-color 0.2s;
		}
		.btn-green:hover {
			background-color: var(--primary-green-hover);
			color: #ffffff;
		}

		.btn-outline-custom {
			border: 1px solid var(--border-color);
			background: #ffffff;
			color: #475467;
			border-radius: 8px;
			height: 40px;
			padding: 0 16px;
			font-size: 13px;
			font-weight: 600;
			display: inline-flex;
			align-items: center;
			gap: 8px;
			transition: all 0.2s;
		}
		.btn-outline-custom:hover {
			background: #f8fafc;
			color: var(--text-main);
		}

		.btn-action-icon {
			width: 36px;
			height: 36px;
			border-radius: 8px;
			border: 1px solid var(--border-color);
			background: #ffffff;
			color: #64748b;
			display: inline-flex;
			align-items: center;
			justify-content: center;
			transition: all 0.2s;
			margin: 0 2px;
		}
		.btn-action-icon:hover {
			background: #f8fafc;
			color: var(--text-main);
			border-color: #cbd5e1;
		}

		/* Table custom */
		.table-custom {
			width: 100%;
			border-collapse: separate;
			border-spacing: 0;
		}
		.table-custom thead th {
			background: #ffffff;
			color: #475467;
			font-weight: 600;
			font-size: 13px;
			padding: 14px 16px;
			border-bottom: 1px solid var(--border-color);
			white-space: nowrap;
		}
		.table-custom tbody td {
			padding: 16px;
			border-bottom: 1px solid #f1f5f9;
			vertical-align: middle;
			font-size: 14px;
			color: #1e293b;
		}
		.table-custom tbody tr:hover td {
			background-color: #f8fafc;
		}

		/* Status Badges */
		.status-pill {
			font-size: 12px;
			font-weight: 600;
			padding: 4px 12px;
			border-radius: 16px;
			display: inline-block;
		}
		.status-liberado { background-color: #dcfce7; color: #166534; }
		.status-aguardando { background-color: #fef3c7; color: #9a3412; }
		.status-bloqueado { background-color: #ffebee; color: #dc2626; }

		.badge-transacao {
			position: absolute;
			top: 6px;
			left: 6px;
			background-color: #0d7a42;
			color: #fff;
			font-size: 10px;
			font-weight: 700;
			padding: 2px 8px;
			border-radius: 4px;
		}
	</style>
</head>
<body>
<div class="wrapper">
	<div class="preloader"></div>

	@include('includes.painel.menu')

	<!-- Dashboard content -->
	<section class="our-dashbord dashbord bgc-f7 pb50">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
				<div class="col-sm-12 col-lg-8 col-xl-10 maxw100flex-992">
					<div class="row">

						<!-- Top Header Area -->
						<div class="col-lg-12 mb20">
							<div>
								<h2 class="font-weight-bold text-dark mb-1" style="font-size: 26px;">Meus anúncios</h2>
								<p class="text-muted mb-0" style="font-size: 14px;">Gerencie e visualize todos os anúncios importados no portal.</p>
							</div>
						</div>

						<!-- Card Filtros -->
						<div class="col-lg-12">
							<div class="ui-card">
								<form method="GET" action="{{ route('painel.anuncios') }}" id="formFiltrosAnuncios">
									<div class="row align-items-end">
										<div class="col-md-4 mb-2">
											<label class="small font-weight-600 text-muted">Buscar por código, título ou referência</label>
											<div class="position-relative">
												<input type="text" name="busca" value="{{ request('busca') }}" class="form-control-custom w-100 pl-4" placeholder="Buscar por código, título...">
												<i class="fa fa-search position-absolute text-muted" style="left: 12px; top: 13px;"></i>
											</div>
										</div>
										<div class="col-md-2 mb-2">
											<label class="small font-weight-600 text-muted">Tipo de negócio</label>
											<select name="tipo_negocio" class="form-control-custom w-100">
												<option value="">Todos</option>
												<option value="Venda" {{ request('tipo_negocio') == 'Venda' ? 'selected' : '' }}>Venda</option>
												<option value="Locação" {{ request('tipo_negocio') == 'Locação' ? 'selected' : '' }}>Locação</option>
											</select>
										</div>
										<div class="col-md-2 mb-2">
											<label class="small font-weight-600 text-muted">Status</label>
											<select name="status" class="form-control-custom w-100">
												<option value="">Todos</option>
												<option value="Liberado" {{ request('status') == 'Liberado' ? 'selected' : '' }}>Liberado</option>
												<option value="Aguardando" {{ request('status') == 'Aguardando' ? 'selected' : '' }}>Aguardando</option>
												<option value="Bloqueado" {{ request('status') == 'Bloqueado' ? 'selected' : '' }}>Bloqueado</option>
											</select>
										</div>
										<div class="col-md-3 mb-2">
											<label class="small font-weight-600 text-muted">Data de publicação</label>
											<div class="d-flex align-items-center" style="gap: 5px;">
												<input type="date" name="data_inicio" value="{{ request('data_inicio') }}" class="form-control-custom w-50 px-2" style="font-size: 12px;">
												<span class="text-muted">-</span>
												<input type="date" name="data_fim" value="{{ request('data_fim') }}" class="form-control-custom w-50 px-2" style="font-size: 12px;">
											</div>
										</div>
										<div class="col-md-1 mb-2 d-flex style-gap" style="gap: 6px;">
											<button type="submit" class="btn-green w-100 p-0" title="Filtrar"><i class="fa fa-filter"></i></button>
											@if($filtrosAtivos > 0)
												<a href="{{ route('painel.anuncios') }}" class="btn btn-light border d-flex align-items-center justify-content-center" title="Limpar" style="height: 42px; width: 42px;"><i class="fa fa-refresh"></i></a>
											@endif
										</div>
									</div>
								</form>
							</div>
						</div>

						<!-- Banner Card Métricas dos Anúncios -->
						<div class="col-lg-12">
							<div class="ui-card p-4 position-relative overflow-hidden">
								<div class="row align-items-center">
									<div class="col-md-10 d-flex flex-wrap align-items-center" style="gap: 35px;">
										
										<div class="d-flex align-items-center" style="gap: 14px;">
											<div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #e6f4ea; color: #0d7a42; font-size: 18px;">
												<i class="fa fa-bullhorn"></i>
											</div>
											<div>
												<div class="text-muted small">Total de anúncios</div>
												<span class="font-weight-bold text-dark" style="font-size: 22px; line-height: 1.1;">{{ number_format($totalAnuncios, 0, ',', '.') }}</span>
												<div class="text-muted" style="font-size: 11px;">ativos no portal</div>
											</div>
										</div>

										<div class="d-flex align-items-center" style="gap: 14px;">
											<div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #dcfce7; color: #166534; font-size: 18px;">
												<i class="fa fa-check"></i>
											</div>
											<div>
												<div class="text-muted small">Liberados</div>
												<span class="font-weight-bold text-dark" style="font-size: 22px; line-height: 1.1;">{{ number_format($totalLiberados, 0, ',', '.') }}</span>
												<div class="text-success font-weight-600" style="font-size: 11px;">{{ $totalAnuncios > 0 ? number_format(($totalLiberados / $totalAnuncios)*100, 1, ',', '.') : 0 }}% do total</div>
											</div>
										</div>

										<div class="d-flex align-items-center" style="gap: 14px;">
											<div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #fef3c7; color: #d97706; font-size: 18px;">
												<i class="fa fa-clock-o"></i>
											</div>
											<div>
												<div class="text-muted small">Aguardando</div>
												<span class="font-weight-bold text-dark" style="font-size: 22px; line-height: 1.1;">{{ number_format($totalAguardando, 0, ',', '.') }}</span>
												<div class="text-warning font-weight-600" style="font-size: 11px;">{{ $totalAnuncios > 0 ? number_format(($totalAguardando / $totalAnuncios)*100, 1, ',', '.') : 0 }}% do total</div>
											</div>
										</div>

										<div class="d-flex align-items-center" style="gap: 14px;">
											<div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 44px; height: 44px; background: #ffebee; color: #dc2626; font-size: 18px;">
												<i class="fa fa-ban"></i>
											</div>
											<div>
												<div class="text-muted small">Bloqueados</div>
												<span class="font-weight-bold text-dark" style="font-size: 22px; line-height: 1.1;">{{ number_format($totalBloqueados, 0, ',', '.') }}</span>
												<div class="text-danger font-weight-600" style="font-size: 11px;">{{ $totalAnuncios > 0 ? number_format(($totalBloqueados / $totalAnuncios)*100, 1, ',', '.') : 0 }}% do total</div>
											</div>
										</div>

									</div>

									<!-- Graphic Illustration -->
									<div class="col-md-2 text-right d-none d-md-block">
										<svg width="100" height="55" viewBox="0 0 120 60" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="10" y="20" width="18" height="40" rx="2" fill="#e2e8f0"/>
											<rect x="32" y="10" width="22" height="50" rx="2" fill="#cbd5e1"/>
											<rect x="58" y="25" width="16" height="35" rx="2" fill="#e2e8f0"/>
											<rect x="78" y="5" width="26" height="55" rx="2" fill="#94a3b8"/>
										</svg>
									</div>
								</div>
							</div>
						</div>

						<!-- Card Tabela de Anúncios -->
						<div class="col-lg-12">
							<div class="ui-card p-0 overflow-hidden">
								
								<!-- Subheader da Tabela -->
								<div class="d-flex flex-wrap align-items-center justify-content-between p-3 border-bottom" style="background-color: #ffffff;">
									<div class="font-weight-600 text-dark" style="font-size: 15px;">
										<strong>{{ number_format($anuncios->total(), 0, ',', '.') }}</strong> anúncios encontrados
									</div>
									<div class="d-flex align-items-center" style="gap: 12px;">
										<a href="{{ route('painel.anuncios.exportar', request()->query()) }}" class="btn-outline-custom">
											<i class="fa fa-download"></i> Exportar
										</a>
										<form method="GET" action="{{ route('painel.anuncios') }}" id="formPerPage" class="m-0">
											@foreach(request()->except('per_page', 'page') as $key => $val)
												<input type="hidden" name="{{ $key }}" value="{{ $val }}">
											@endforeach
											<select name="per_page" class="form-control-custom px-2" style="height: 38px; font-size: 13px;" onchange="this.form.submit()">
												<option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10 por página</option>
												<option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25 por página</option>
												<option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50 por página</option>
											</select>
										</form>
										<div class="btn-group" role="group">
											<button type="button" class="btn btn-light border btn-sm active" style="height: 38px; width: 38px;"><i class="fa fa-th-large"></i></button>
											<button type="button" class="btn btn-light border btn-sm" style="height: 38px; width: 38px;"><i class="fa fa-bars"></i></button>
										</div>
									</div>
								</div>

								<div class="table-responsive">
									<table class="table-custom">
										<thead>
											<tr>
												<th style="width: 45%;">Anúncio</th>
												<th class="text-center">Tipo</th>
												<th class="text-center">Data de publicação <i class="fa fa-sort text-muted ml-1"></i></th>
												<th class="text-center">Status</th>
												<th class="text-center">Visualizações</th>
												<th class="text-right">Ações</th>
											</tr>
										</thead>
										<tbody>
											@forelse ($anuncios as $anuncio)
											@php
												$fotoCapa = $anuncio->fotos->first()->arquivo ?? asset('assets/portal/images/property/fp1.jpg');
												$situacaoStr = $anuncio->situacao ?? 'Liberado';
												$statusClass = match($situacaoStr) {
													'Liberado', 'Ativo' => 'status-liberado',
													'Aguardando' => 'status-aguardando',
													default => 'status-bloqueado'
												};
												$linkPublico = "/imoveis/{$anuncio->id}/" . Helper::url_amigavel(($anuncio->tipo->nome ?? 'imovel') .'-'. $anuncio->transacao) . "/" . Helper::url_amigavel(($anuncio->endereco->cidade->nome_cidade ?? 'cuiaba') .'-'. ($anuncio->endereco->cidade->estado->uf_estado ?? 'mt'));
											@endphp
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<!-- Thumbnail Photo with Badge -->
														<div class="position-relative mr-3 flex-shrink-0" style="width: 110px; height: 75px; border-radius: 8px; overflow: hidden; background: #f1f5f9;">
															<img src="{{ $fotoCapa }}" alt="foto" style="width: 100%; height: 100%; object-fit: cover;">
															<span class="badge-transacao">{{ $anuncio->transacao ?? 'Venda' }}</span>
														</div>
														<div>
															<a href="{{ $linkPublico }}" target="_blank" class="font-weight-bold text-dark d-block mb-1" style="font-size: 14px; line-height: 1.3;">
																{{ $anuncio->titulo }}
															</a>
															<small class="text-muted d-block mb-1" style="font-size: 12px;">
																<i class="fa fa-map-marker text-muted mr-1"></i>
																{{ $anuncio->endereco->logradouro_endereco ?? '' }} {{ $anuncio->endereco->bairro_endereco ? '- '.$anuncio->endereco->bairro_endereco : '' }}, {{ $anuncio->endereco->cidade->nome_cidade ?? 'Cuiabá' }} / {{ $anuncio->endereco->cidade->estado->uf_estado ?? 'MT' }}
																@if($anuncio->id_externo || $anuncio->id)
																	- AP{{ $anuncio->id_externo ?? $anuncio->id }}
																@endif
															</small>
															<strong class="text-success" style="font-size: 14px;">
																R$ {{ Helper::converte_valor_real($anuncio->transacao == 'Locação' ? $anuncio->valor_locacao : $anuncio->valor_venda) }}
															</strong>
														</div>
													</div>
												</td>
												<td class="text-center">
													<div class="d-inline-flex flex-column align-items-center justify-content-center p-2 rounded" style="background-color: #e6f4ea; min-width: 55px;">
														<i class="fa {{ $anuncio->transacao == 'Locação' ? 'fa-key' : 'fa-home' }} text-success" style="font-size: 16px;"></i>
														<span class="text-success font-weight-600 mt-1" style="font-size: 11px;">{{ $anuncio->transacao ?? 'Venda' }}</span>
													</div>
												</td>
												<td class="text-center">
													<div style="font-size: 13px; font-weight: 500;">{{ $anuncio->created_at ? $anuncio->created_at->format('d/m/Y') : 'N/A' }}</div>
													<small class="text-muted" style="font-size: 11px;">{{ $anuncio->created_at ? $anuncio->created_at->format('H:i') : '' }}</small>
												</td>
												<td class="text-center">
													<span class="status-pill {{ $statusClass }}">{{ $situacaoStr }}</span>
												</td>
												<td class="text-center font-weight-600 text-dark">
													{{ Helper::GetTotalViewsByAnuncio($anuncio->id, null) }}
												</td>
												<td class="text-right d-flex align-items-center justify-content-end" style="gap: 10px; border-top: none;">
													<a href="{{ $linkPublico }}" target="_blank" class="btn-action-icon text-success m-0" title="Visualizar no Portal">
														<i class="fa fa-eye"></i>
													</a>
													<select class="form-control-custom py-0 px-2 select-alterar-status" data-id="{{ $anuncio->id }}" style="height: 36px; width: 110px; font-size: 12px; display: inline-block;">
														<option value="Liberado" {{ ($anuncio->situacao == 'Liberado' || $anuncio->situacao == 'Ativo' || is_null($anuncio->situacao)) ? 'selected' : '' }}>Liberado</option>
														<option value="Bloqueado" {{ $anuncio->situacao == 'Bloqueado' ? 'selected' : '' }}>Bloqueado</option>
													</select>
												</td>
											</tr>
											@empty
											<tr>
												<td colspan="6" class="text-center py-5 text-muted">
													Nenhum anúncio encontrado.
												</td>
											</tr>
											@endforelse
										</tbody>
									</table>
								</div>

								<div class="d-flex flex-wrap align-items-center justify-content-between p-3 border-top" style="background-color: #ffffff;">
									<div class="pagination-custom">
										{{ $anuncios->appends(request()->query())->links() }}
									</div>
									<div class="text-muted small">
										Mostrando {{ $anuncios->firstItem() ?? 0 }} a {{ $anuncios->lastItem() ?? 0 }} de {{ $anuncios->total() }} anúncios
									</div>
								</div>

							</div>
						</div>

					</div>

					<div class="row mt20">
						<div class="col-lg-12">
							<div class="copyright-widget text-center">
								<p>&copy; @php echo date('Y'); @endphp. Rede Imóveis MT</p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

	<a class="scrollToHome" href="#"><i class="flaticon-arrows"></i></a>
</div>

<script type="text/javascript" src="{{ asset('assets/portal/js/jquery-3.3.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/dashboard-script.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/script.js') }}"></script>

<script>
$(document).ready(function() {
	$(document).on('change', '.select-alterar-status', function() {
		var anuncioId = $(this).data('id');
		var novoStatus = $(this).val();
		var selectElement = $(this);

		selectElement.prop('disabled', true);

		$.ajax({
			url: '{{ url("painel/anuncios") }}/' + anuncioId + '/status',
			type: 'POST',
			data: {
				_token: '{{ csrf_token() }}',
				status: novoStatus
			},
			success: function(response) {
				selectElement.prop('disabled', false);
				// Reload page to update metric breakdowns dynamically
				location.reload();
			},
			error: function() {
				selectElement.prop('disabled', false);
				alert('Erro ao alterar o status do anúncio. Tente novamente.');
			}
		});
	});
});
</script>
</body>
</html>
