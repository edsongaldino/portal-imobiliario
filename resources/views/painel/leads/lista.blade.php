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
			border-radius: 12px;
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
			background: #ffffff;
			border: 1px solid var(--border-color);
			border-radius: 8px;
			height: 42px;
			padding: 0 16px;
			color: #334155;
			font-weight: 500;
			font-size: 14px;
			display: inline-flex;
			align-items: center;
			gap: 6px;
			transition: all 0.2s;
		}
		.btn-outline-custom:hover {
			background: #f1f5f9;
			color: var(--text-main);
		}

		/* Status Badges */
		.badge-status {
			font-size: 12px;
			font-weight: 600;
			padding: 4px 12px;
			border-radius: 16px;
			display: inline-block;
		}
		.badge-novo { background-color: #e0f2fe; color: #0284c7; }
		.badge-contato { background-color: #fef3c7; color: #d97706; }
		.badge-qualificado { background-color: #dcfce7; color: #15803d; }
		.badge-negociacao { background-color: #f3e8ff; color: #9333ea; }
		.badge-fechado { background-color: #f1f5f9; color: #475467; }

		/* Action Icons */
		.btn-action-eye {
			width: 36px;
			height: 36px;
			border-radius: 8px;
			border: 1px solid #d1fae5;
			background: #ecfdf5;
			color: var(--primary-green);
			display: inline-flex;
			align-items: center;
			justify-content: center;
			transition: all 0.2s;
			cursor: pointer;
		}
		.btn-action-eye:hover {
			background: var(--primary-green);
			color: #ffffff;
		}

		/* Table Custom */
		.table-leads {
			width: 100%;
			border-collapse: separate;
			border-spacing: 0;
		}
		.table-leads thead th {
			background: #ffffff;
			color: #475467;
			font-weight: 600;
			font-size: 13px;
			padding: 14px 16px;
			border-bottom: 1px solid var(--border-color);
			white-space: nowrap;
		}
		.table-leads tbody td {
			padding: 16px;
			border-bottom: 1px solid #f1f5f9;
			vertical-align: middle;
			font-size: 14px;
			color: #1e293b;
		}
		.table-leads tbody tr:hover td {
			background-color: #f8fafc;
		}
		.table-leads tbody tr.selected td {
			background-color: #f0fdf4;
		}

		/* Right Side Drawer Panel */
		.lead-details-panel {
			background: #ffffff;
			border: 1px solid var(--border-color);
			border-radius: 12px;
			padding: 24px;
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
			position: sticky;
			top: 20px;
		}
		.timeline-item {
			position: relative;
			padding-left: 20px;
			margin-bottom: 12px;
		}
		.timeline-item::before {
			content: '';
			position: absolute;
			left: 0;
			top: 6px;
			width: 8px;
			height: 8px;
			border-radius: 50%;
			background: var(--primary-green);
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
							<div class="d-flex flex-wrap align-items-center justify-content-between" style="gap: 15px;">
								<div>
									<h2 class="font-weight-bold text-dark mb-1" style="font-size: 26px;">Últimos leads recebidos</h2>
									<p class="text-muted mb-0" style="font-size: 14px;">Aqui você tem a lista de todos os leads gerados para sua empresa.</p>
								</div>
								<div class="d-flex align-items-center" style="gap: 12px;">
									<a href="{{ route('painel.leads.exportar', request()->query()) }}" class="btn-outline-custom"><i class="fa fa-download"></i> Exportar</a>
								</div>
							</div>
						</div>

						<!-- Card Filtros -->
						<div class="col-lg-12">
							<div class="ui-card">
								<div class="d-flex align-items-center justify-content-between mb-3 cursor-pointer" data-toggle="collapse" data-target="#collapseFiltrosLeads">
									<h6 class="font-weight-bold mb-0 text-dark d-flex align-items-center" style="font-size: 15px;">
										<i class="fa fa-filter text-success mr-2"></i> Filtros
									</h6>
									<span class="text-muted small font-weight-500">
										{{ $filtrosAtivos > 0 ? 'Mais filtros' : 'Filtros' }} <i class="fa fa-chevron-down"></i>
									</span>
								</div>

								<div class="collapse show" id="collapseFiltrosLeads">
									<form method="GET" action="{{ route('painel.leads.index') }}">
										@if(request('busca')) <input type="hidden" name="busca" value="{{ request('busca') }}"> @endif
										<div class="row">
											<div class="col-md-3 mb-3">
												<label class="small font-weight-600 text-muted">Período de criação</label>
												<div class="d-flex align-items-center" style="gap: 4px;">
													<input type="date" name="data_inicio" value="{{ request('data_inicio') }}" class="form-control-custom w-50" style="font-size: 12px;">
													<input type="date" name="data_fim" value="{{ request('data_fim') }}" class="form-control-custom w-50" style="font-size: 12px;">
												</div>
											</div>
											<div class="col-md-2 mb-3">
												<label class="small font-weight-600 text-muted">Tipo de imóvel</label>
												<select name="tipo_imovel" class="form-control-custom w-100">
													<option value="">Todos</option>
													@foreach($tipos as $tipo)
														<option value="{{ $tipo->id }}" {{ request('tipo_imovel') == $tipo->id ? 'selected' : '' }}>{{ $tipo->nome }}</option>
													@endforeach
												</select>
											</div>
											<div class="col-md-2 mb-3">
												<label class="small font-weight-600 text-muted">Cidade</label>
												<select name="cidade_id" class="form-control-custom w-100">
													<option value="">Todas as cidades</option>
													@foreach($cidades as $cidade)
														<option value="{{ $cidade->id }}" {{ request('cidade_id') == $cidade->id ? 'selected' : '' }}>{{ $cidade->nome_cidade }}</option>
													@endforeach
												</select>
											</div>
											<div class="col-md-3 mb-3">
												<label class="small font-weight-600 text-muted">Situação</label>
												<select name="situacao" class="form-control-custom w-100">
													<option value="">Todas as situações</option>
													<option value="Novo" {{ request('situacao') == 'Novo' ? 'selected' : '' }}>Novo</option>
													<option value="Em contato" {{ request('situacao') == 'Em contato' ? 'selected' : '' }}>Em contato</option>
													<option value="Qualificado" {{ request('situacao') == 'Qualificado' ? 'selected' : '' }}>Qualificado</option>
													<option value="Em negociacao" {{ request('situacao') == 'Em negociacao' ? 'selected' : '' }}>Em negociação</option>
													<option value="Fechado" {{ request('situacao') == 'Fechado' ? 'selected' : '' }}>Fechado</option>
												</select>
											</div>
											<div class="col-md-2 mb-3">
												<label class="small font-weight-600 text-muted">Origem</label>
												<select name="origem" class="form-control-custom w-100">
													<option value="">Todas as origens</option>
													<option value="Site" {{ request('origem') == 'Site' ? 'selected' : '' }}>Site</option>
													<option value="Portal" {{ request('origem') == 'Portal' ? 'selected' : '' }}>Portal</option>
													<option value="Indicacao" {{ request('origem') == 'Indicacao' ? 'selected' : '' }}>Indicação</option>
												</select>
											</div>
										</div>

										<div class="d-flex align-items-center justify-content-between pt-2 border-top mt-1">
											<button type="button" class="btn btn-link text-muted small p-0 font-weight-500" data-toggle="collapse" data-target="#maisFiltrosLeads">
												<i class="fa fa-sliders"></i> Mais filtros <i class="fa fa-chevron-down"></i>
											</button>
											<div class="d-flex align-items-center" style="gap: 15px;">
												<a href="{{ route('painel.leads.index') }}" class="text-success small font-weight-600"><i class="fa fa-refresh"></i> Limpar filtros</a>
												<button type="submit" class="btn btn-sm btn-success px-3" style="border-radius: 6px; background-color: var(--primary-green);">Filtrar</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>

						<!-- Main Area (Table + Details Drawer) -->
						<div class="col-lg-8 col-xl-8" id="areaTabelaLeads">
							<div class="ui-card p-0 overflow-hidden">
								
								<div class="d-flex align-items-center justify-content-between p-3 border-bottom" style="background-color: #ffffff;">
									<div class="font-weight-600 text-dark" style="font-size: 15px;">
										<strong>{{ $leads->total() }}</strong> leads encontrados
									</div>
								</div>

								<div class="table-responsive">
									<table class="table-leads">
										<thead>
											<tr>
												<th>Nome</th>
												<th>Contato</th>
												<th>Interesse</th>
												<th>Origem</th>
												<th>Situação</th>
												<th>Data de criação</th>
												<th class="text-center">Ações</th>
											</tr>
										</thead>
										<tbody>
											@forelse ($leads as $index => $lead)
											@php
												$iniciais = strtoupper(substr($lead->nome, 0, 2));
												$situacaoClass = match($lead->situacao ?? 'Novo') {
													'Em contato' => 'badge-contato',
													'Qualificado' => 'badge-qualificado',
													'Em negociacao' => 'badge-negociacao',
													'Fechado' => 'badge-fechado',
													default => 'badge-novo'
												};
											@endphp
											<tr id="tr-lead-{{ $lead->id }}" class="{{ $index === 0 ? 'selected' : '' }}">
												<td>
													<div class="d-flex align-items-center">
														<div class="rounded-circle mr-3 d-flex align-items-center justify-content-center bg-light font-weight-bold text-secondary flex-shrink-0" style="width: 38px; height: 38px; border: 1px solid #cbd5e1; font-size: 13px;">
															{{ $iniciais }}
														</div>
														<div>
															<strong class="text-dark d-block">{{ $lead->nome }}</strong>
															<small class="text-muted d-block text-truncate" style="max-width: 180px; font-size: 12px;">
																{{ $lead->mensagem ?? 'Tenho interesse neste imóvel' }}
															</small>
														</div>
													</div>
												</td>
												<td>
													<div style="font-size: 13px;">{{ $lead->email }}</div>
													<small class="text-muted" style="font-size: 12px;">{{ Helper::Phone($lead->telefone) }}</small>
												</td>
												<td>
													<div class="font-weight-600" style="font-size: 13px;">{{ $lead->anuncio->tipo->nome ?? 'Apartamento' }}</div>
													<small class="text-muted" style="font-size: 12px;">{{ $lead->anuncio->titulo ?? 'Imóvel' }}</small>
												</td>
												<td>
													<div style="font-size: 13px;">{{ $lead->origem ?? 'Site' }}</div>
													<small class="text-muted" style="font-size: 12px;">Formulário</small>
												</td>
												<td>
													<span class="badge-status {{ $situacaoClass }}">{{ $lead->situacao ?? 'Novo' }}</span>
												</td>
												<td>
													<div style="font-size: 13px;">{{ $lead->created_at->format('d/m/Y') }}</div>
													<small class="text-muted" style="font-size: 12px;">{{ $lead->created_at->format('H:i') }}</small>
												</td>
												<td class="text-center">
													<button type="button" class="btn-action-eye" onclick="carregarDetalhesLead({{ json_encode($lead) }}, '{{ $iniciais }}', '{{ $situacaoClass }}')" title="Ver Detalhes do Lead">
														<i class="fa fa-eye"></i>
													</button>
												</td>
											</tr>
											@empty
											<tr>
												<td colspan="7" class="text-center py-5 text-muted">
													<i class="fa fa-info-circle fa-2x mb-2 d-block text-muted"></i>
													Nenhum lead encontrado com os filtros aplicados.
												</td>
											</tr>
											@endforelse
										</tbody>
									</table>
								</div>

								<div class="d-flex flex-wrap align-items-center justify-content-between p-3 border-top" style="background-color: #ffffff;">
									<div class="pagination-custom">
										{{ $leads->appends(request()->query())->links() }}
									</div>
									<form method="GET" action="{{ route('painel.leads.index') }}" class="m-0">
										@foreach(request()->except('per_page', 'page') as $key => $val)
											<input type="hidden" name="{{ $key }}" value="{{ $val }}">
										@endforeach
										<select name="per_page" class="form-control-custom" style="height: 36px; padding-top: 4px; padding-bottom: 4px; font-size: 13px;" onchange="this.form.submit()">
											<option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10 por página</option>
											<option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20 por página</option>
											<option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50 por página</option>
										</select>
									</form>
								</div>

							</div>
						</div>

						<!-- Right Side Panel: Detalhes do Lead -->
						<div class="col-lg-4 col-xl-4" id="painelDetalhesLead">
							<div class="lead-details-panel">
								@if($leads->count() > 0)
									@php
										$primeiroLead = $leads->first();
										$primeiroIniciais = strtoupper(substr($primeiroLead->nome, 0, 2));
										$primeiroSituacaoClass = match($primeiroLead->situacao ?? 'Novo') {
											'Em contato' => 'badge-contato',
											'Qualificado' => 'badge-qualificado',
											'Em negociacao' => 'badge-negociacao',
											'Fechado' => 'badge-fechado',
											default => 'badge-novo'
										};
									@endphp
									<div class="d-flex align-items-center justify-content-between pb-3 border-bottom mb-3">
										<h6 class="font-weight-bold mb-0 text-dark" style="font-size: 16px;">Detalhes do lead</h6>
										<button type="button" class="close text-muted" onclick="$('#painelDetalhesLead').hide(); $('#areaTabelaLeads').removeClass('col-lg-8 col-xl-8').addClass('col-lg-12 col-xl-12');">&times;</button>
									</div>

									<!-- Profile Header -->
									<div class="d-flex align-items-center mb-4">
										<div class="rounded-circle mr-3 d-flex align-items-center justify-content-center bg-light font-weight-bold text-secondary flex-shrink-0" id="det-iniciais" style="width: 48px; height: 48px; border: 1px solid #cbd5e1; font-size: 16px;">
											{{ $primeiroIniciais }}
										</div>
										<div>
											<div class="d-flex align-items-center" style="gap: 6px;">
												<strong class="text-dark" id="det-nome" style="font-size: 15px;">{{ $primeiroLead->nome }}</strong>
												<span class="badge-status {{ $primeiroSituacaoClass }}" id="det-badge-situacao">{{ $primeiroLead->situacao ?? 'Novo' }}</span>
											</div>
											<small class="text-muted d-block" id="det-data-criado">Criado em {{ $primeiroLead->created_at->format('d/m/Y às H:i') }}</small>
										</div>
									</div>

									<!-- Contato Section -->
									<div class="mb-4">
										<h6 class="font-weight-600 text-muted small text-uppercase mb-2">Contato</h6>
										<div class="mb-2" style="font-size: 13px;">
											<i class="fa fa-envelope-o text-muted mr-2"></i> <a href="mailto:{{ $primeiroLead->email }}" id="det-email" class="text-dark">{{ $primeiroLead->email }}</a>
										</div>
										<div class="mb-2" style="font-size: 13px;">
											<i class="fa fa-phone text-muted mr-2"></i> <span id="det-telefone">{{ Helper::Phone($primeiroLead->telefone) }}</span>
										</div>
										<div class="mb-2" style="font-size: 13px;">
											<i class="fa fa-whatsapp text-success mr-2"></i> <a href="https://api.whatsapp.com/send?phone=55{{ preg_replace('/[^0-9]/', '', $primeiroLead->telefone) }}" target="_blank" id="det-whatsapp" class="text-success font-weight-500">{{ Helper::Phone($primeiroLead->telefone) }}</a>
										</div>
										<div style="font-size: 13px;">
											<i class="fa fa-map-marker text-muted mr-2"></i> <span id="det-cidade">{{ $primeiroLead->anuncio->endereco->cidade->nome_cidade ?? 'Cuiabá' }} - MT</span>
										</div>
									</div>

									<!-- Interesse Section -->
									<div class="mb-4">
										<h6 class="font-weight-600 text-muted small text-uppercase mb-2">Interesse</h6>
										<div class="row mb-2" style="font-size: 13px;">
											<div class="col-5 text-muted">Tipo de imóvel</div>
											<div class="col-7 font-weight-500" id="det-tipo-imovel">{{ $primeiroLead->anuncio->tipo->nome ?? 'Apartamento' }}</div>
										</div>
										<div class="row mb-2" style="font-size: 13px;">
											<div class="col-5 text-muted">Empreendimento</div>
											<div class="col-7 font-weight-500" id="det-empreendimento">{{ $primeiroLead->anuncio->titulo ?? 'Imóvel' }}</div>
										</div>
										<div class="row mb-2" style="font-size: 13px;">
											<div class="col-5 text-muted">Faixa de preço</div>
											<div class="col-7 font-weight-500" id="det-preco">R$ {{ number_format($primeiroLead->anuncio->valor_venda ?? 0, 2, ',', '.') }}</div>
										</div>
										<div class="row mb-2" style="font-size: 13px;">
											<div class="col-5 text-muted">Observação</div>
											<div class="col-7 text-muted" id="det-mensagem" style="font-size: 12px;">{{ $primeiroLead->mensagem ?? 'Interessado no imóvel.' }}</div>
										</div>
									</div>

									<!-- Origem Section -->
									<div class="mb-4">
										<h6 class="font-weight-600 text-muted small text-uppercase mb-2">Origem</h6>
										<div class="font-weight-500 mb-1" style="font-size: 13px;" id="det-origem-tipo">Site - Formulário de contato</div>
										<small class="text-muted d-block" style="font-size: 12px;" id="det-pagina">Página: /imoveis/detalhes/{{ $primeiroLead->anuncio_id }}</small>
									</div>

									<!-- Histórico Timeline Section -->
									<div class="mb-4">
										<h6 class="font-weight-600 text-muted small text-uppercase mb-2">Histórico</h6>
										<div class="timeline-item">
											<div class="small text-muted font-weight-500" id="det-hist-data">{{ $primeiroLead->created_at->format('d/m/Y às H:i') }}</div>
											<div class="small text-dark">Lead recebido no sistema</div>
										</div>
									</div>

									<!-- Footer Buttons -->
									<div class="d-flex align-items-center justify-content-between pt-3 border-top" style="gap: 10px;">
										<button type="button" class="btn-outline-custom w-50 justify-content-center">Editar lead</button>
										<button type="button" class="btn-green w-50 justify-content-center" onclick="$('#painelDetalhesLead').hide(); $('#areaTabelaLeads').removeClass('col-lg-8 col-xl-8').addClass('col-lg-12 col-xl-12');">Fechar</button>
									</div>
								@else
									<div class="text-center py-4 text-muted">
										Selecione um lead para ver os detalhes.
									</div>
								@endif
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
function carregarDetalhesLead(lead, iniciais, situacaoClass) {
	// Show drawer panel if hidden
	$('#areaTabelaLeads').removeClass('col-lg-12 col-xl-12').addClass('col-lg-8 col-xl-8');
	$('#painelDetalhesLead').show();

	// Highlight row
	$('.table-leads tbody tr').removeClass('selected');
	$('#tr-lead-' + lead.id).addClass('selected');

	// Populate panel fields
	$('#det-iniciais').text(iniciais);
	$('#det-nome').text(lead.nome);
	$('#det-badge-situacao').attr('class', 'badge-status ' + situacaoClass).text(lead.situacao || 'Novo');
	
	var dt = new Date(lead.created_at);
	var dataFormatada = dt.toLocaleDateString('pt-BR') + ' às ' + dt.toLocaleTimeString('pt-BR', {hour: '2-digit', minute:'2-digit'});
	$('#det-data-criado').text('Criado em ' + dataFormatada);
	$('#det-hist-data').text(dataFormatada);

	$('#det-email').attr('href', 'mailto:' + lead.email).text(lead.email);
	$('#det-telefone').text(lead.telefone);
	var telLimo = lead.telefone ? lead.telefone.replace(/[^0-9]/g, '') : '';
	$('#det-whatsapp').attr('href', 'https://api.whatsapp.com/send?phone=55' + telLimo).text(lead.telefone);

	if(lead.anuncio && lead.anuncio.tipo) {
		$('#det-tipo-imovel').text(lead.anuncio.tipo.nome);
	}
	if(lead.anuncio) {
		$('#det-empreendimento').text(lead.anuncio.titulo || 'Imóvel');
		$('#det-preco').text('R$ ' + parseFloat(lead.anuncio.valor_venda || 0).toLocaleString('pt-BR', {minimumFractionDigits: 2}));
		$('#det-pagina').text('Página: /imoveis/detalhes/' + lead.anuncio_id);
	}
	if(lead.anuncio && lead.anuncio.endereco && lead.anuncio.endereco.cidade) {
		$('#det-cidade').text(lead.anuncio.endereco.cidade.nome_cidade + ' - MT');
	}

	$('#det-mensagem').text(lead.mensagem || 'Interessado no imóvel.');
}
</script>
</body>
</html>
