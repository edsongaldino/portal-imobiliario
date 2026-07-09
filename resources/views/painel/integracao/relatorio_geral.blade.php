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

		/* Dark Backdrop overlay for modal */
		.modal-backdrop.show {
			opacity: 0.75 !important;
			background-color: #0f172a !important;
		}
		.modal {
			z-index: 1060 !important;
		}
		.modal-backdrop {
			z-index: 1050 !important;
		}

		.ui-card {
			background: #ffffff;
			border: 1px solid var(--border-color);
			border-radius: 14px;
			padding: 24px;
			margin-bottom: 24px;
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
			cursor: pointer;
		}
		.btn-outline-custom:hover {
			background: #f8fafc;
			color: var(--text-main);
		}

		.btn-outline-green {
			border: 1px solid #16a34a;
			background: #ffffff;
			color: #16a34a;
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
		.btn-outline-green:hover {
			background: #f0fdf4;
			color: #15803d;
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
			cursor: pointer;
		}
		.btn-action-icon:hover {
			background: #f8fafc;
			color: var(--text-main);
			border-color: #cbd5e1;
		}

		/* Mini Metric Box inside card */
		.mini-metric-box {
			background: #ffffff;
			border: 1px solid var(--border-color);
			border-radius: 12px;
			padding: 16px;
			display: flex;
			align-items: center;
			gap: 14px;
		}

		.table-dark-header {
			width: 100%;
			border-collapse: separate;
			border-spacing: 0;
		}
		.table-dark-header thead th {
			background-color: #1e293b;
			color: #ffffff;
			font-weight: 600;
			font-size: 13px;
			padding: 14px 16px;
			border: none;
			white-space: nowrap;
		}
		.table-dark-header tbody td {
			padding: 16px;
			border-bottom: 1px solid #f1f5f9;
			vertical-align: middle;
			font-size: 14px;
			color: #1e293b;
		}
		.table-dark-header tbody tr:hover td {
			background-color: #f8fafc;
		}

		/* Modal specific styles */
		.modal-custom-content {
			border-radius: 16px;
			border: none;
			box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
		}
		.modal-custom-header {
			padding: 20px 24px;
			border-bottom: 1px solid var(--border-color);
			display: flex;
			align-items: center;
			justify-content: space-between;
		}
		.modal-metric-card {
			background: #ffffff;
			border: 1px solid var(--border-color);
			border-radius: 12px;
			padding: 16px;
			text-align: center;
		}
		.modal-table {
			width: 100%;
			border-collapse: separate;
			border-spacing: 0;
		}
		.modal-table thead th {
			background-color: #f8fafc;
			color: #475467;
			font-weight: 600;
			font-size: 12px;
			padding: 12px 16px;
			border-bottom: 1px solid var(--border-color);
		}
		.modal-table tbody td {
			padding: 14px 16px;
			border-bottom: 1px solid #f1f5f9;
			vertical-align: middle;
			font-size: 13px;
		}
		.modal-table tbody tr:hover td {
			background-color: #f8fafc;
		}
	</style>
</head>
<body>
<div id="carregando"></div>
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
									<div class="text-muted small mb-1">Integrações &rsaquo; Visão Geral</div>
									<h2 class="font-weight-bold text-dark mb-1" style="font-size: 26px;">Integrações</h2>
									<p class="text-muted mb-0" style="font-size: 14px;">Configure as integrações com portais e acompanhe o histórico de importações.</p>
								</div>
								<div class="d-flex align-items-center" style="gap: 12px;">
									<button type="button" class="btn-outline-custom" id="btnToggleConfig">
										<i class="fa fa-cog"></i> Configurações da integração
									</button>
									<button type="button" class="btn-outline-custom" id="btnAbrirDoc"><i class="fa fa-file-text-o"></i> Documentação</button>
									<button type="button" class="btn-green" id="ProcessarAtualizacaoXML" data-id="{{ $usuario->anunciante->id ?? '' }}" data-token="{{ csrf_token() }}">
										<i class="fa fa-refresh"></i> Processar Atualização Manual
									</button>
								</div>
							</div>
						</div>

						@if(session('success'))
							<div class="col-lg-12">
								<div class="alert alert-success alert-dismissible fade show rounded-lg" role="alert">
									<strong>Sucesso!</strong> {{ session('success') }}
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
								</div>
							</div>
						@endif

						@if(session('warning'))
							<div class="col-lg-12">
								<div class="alert alert-warning alert-dismissible fade show rounded-lg" role="alert">
									<strong>Atenção!</strong> {{ session('warning') }}
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
								</div>
							</div>
						@endif

						@if(isset($integracao) && $integracao->bloqueado)
							<div class="col-lg-12">
								<div class="alert alert-danger rounded-lg p-4 mb-4" role="alert" style="border-left: 5px solid #dc2626;">
									<h5 class="alert-heading font-weight-bold text-danger mb-2"><i class="fa fa-exclamation-triangle mr-2"></i> Integração Bloqueada!</h5>
									<p class="mb-2">A importação automática de seus anúncios foi suspensa temporariamente porque ocorreu um erro no processamento do seu arquivo XML. Verifique a URL abaixo e salve para reativar.</p>
								</div>
							</div>
						@endif

						<!-- SECTION 1: Configuração da integração (Oculto por padrão) -->
						<div class="col-lg-12" id="boxConfiguracao" style="{{ (isset($integracao) && $integracao->bloqueado) || session('success') || session('warning') ? '' : 'display: none;' }}">
							<div class="ui-card">
								<div class="d-flex align-items-center justify-content-between mb-3">
									<div class="d-flex align-items-center" style="gap: 12px;">
										<div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px; background: #e6f4ea; color: #0d7a42; font-size: 16px;">
											<i class="fa fa-cog"></i>
										</div>
										<div>
											<h5 class="font-weight-bold text-dark mb-0" style="font-size: 16px;">1. Configuração da integração</h5>
											<p class="text-muted mb-0 small">Defina as opções de integração e o comportamento da importação automática.</p>
										</div>
									</div>
									<button type="button" class="btn-outline-custom btn-sm" id="btnFecharConfig"><i class="fa fa-times"></i> Ocultar</button>
								</div>

								<form method="POST" action="/painel/integracao-salvar" enctype="multipart/form-data">
									@csrf
									<input type="hidden" name="id" value="{{ $integracao->id ?? '' }}">

									<div class="row align-items-end">
										<div class="col-md-4 mb-3">
											<label class="small font-weight-600 text-muted">Tipo de integração</label>
											<select name="tipo" class="form-control-custom w-100" required>
												<option value="XML" {{ ($integracao->integracao_id ?? '') == 1 ? 'selected' : '' }}>XML</option>
												<option value="Json">Json</option>
												<option value="Api">Api</option>
											</select>
										</div>
										<div class="col-md-4 mb-3">
											<label class="small font-weight-600 text-muted">Tempo para atualização (automática)</label>
											<select name="periodicidade_atualizacao" class="form-control-custom w-100" required>
												<option value="12" {{ ($integracao->periodicidade_atualizacao ?? '') == 12 ? 'selected' : '' }}>A cada 12h</option>
												<option value="24" {{ ($integracao->periodicidade_atualizacao ?? '24') == 24 ? 'selected' : '' }}>24h (Padrão)</option>
												<option value="48" {{ ($integracao->periodicidade_atualizacao ?? '') == 48 ? 'selected' : '' }}>A cada 48h</option>
											</select>
										</div>
										<div class="col-md-4 mb-3">
											<label class="small font-weight-600 text-muted">Notificar erros?</label>
											<select name="notificar" class="form-control-custom w-100" required>
												<option value="Sim" {{ ($integracao->notificar ?? 'Sim') == 'Sim' ? 'selected' : '' }}>Sim</option>
												<option value="Não" {{ ($integracao->notificar ?? '') == 'Não' ? 'selected' : '' }}>Não</option>
											</select>
											<small class="text-muted d-block mt-1" style="font-size: 11px;">Receba notificações caso ocorram erros na importação.</small>
										</div>

										<div class="col-md-12 mb-3">
											<label class="small font-weight-600 text-muted">Link (arquivo XML)</label>
											<input type="text" name="url" value="{{ $integracao->url ?? $integracao->arquivo ?? '' }}" class="form-control-custom w-100" placeholder="https://exemplo.com.br/xml/imoveis.xml" required>
											<small class="text-muted d-block mt-1" style="font-size: 11px;">Informe a URL de integração fornecida pelo portal.</small>
										</div>

										<div class="col-md-12 text-right">
											<button type="submit" class="btn-green">
												<i class="fa fa-save"></i> Salvar configurações
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>

						<!-- SECTION 2: Relatório geral de importações -->
						<div class="col-lg-12">
							<div class="ui-card p-0 overflow-hidden">
								<!-- Header of Section 2 -->
								<div class="d-flex flex-wrap align-items-center justify-content-between p-4 border-bottom" style="background-color: #ffffff;">
									<div class="d-flex align-items-center" style="gap: 12px;">
										<div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 38px; height: 38px; background: #e6f4ea; color: #0d7a42; font-size: 16px;">
											<i class="fa fa-list-alt"></i>
										</div>
										<div>
											<h5 class="font-weight-bold text-dark mb-0" style="font-size: 16px;">2. Relatório geral de importações</h5>
											<p class="text-muted mb-0 small">Acompanhe o histórico das últimas importações realizadas.</p>
										</div>
									</div>
									<div class="d-flex align-items-center" style="gap: 10px;">
										<button type="button" class="btn-outline-custom" id="btnTogglePeriodo"><i class="fa fa-calendar"></i> Selecionar período</button>
										<a href="{{ route('painel.integracoes.relatorio-geral') }}" class="btn-outline-custom"><i class="fa fa-refresh"></i> Atualizar lista</a>
									</div>
								</div>

								<!-- Painel Ocultável Selecionar Período -->
								<div id="boxFiltroPeriodo" class="p-3 bg-light border-bottom" style="{{ request('data_inicio') || request('data_fim') ? '' : 'display: none;' }}">
									<form method="GET" action="{{ route('painel.integracoes.relatorio-geral') }}" class="row align-items-end m-0">
										<div class="col-md-4 mb-2 mb-md-0">
											<label class="small font-weight-600 text-muted">Data início</label>
											<input type="date" name="data_inicio" value="{{ request('data_inicio') }}" class="form-control-custom w-100">
										</div>
										<div class="col-md-4 mb-2 mb-md-0">
											<label class="small font-weight-600 text-muted">Data fim</label>
											<input type="date" name="data_fim" value="{{ request('data_fim') }}" class="form-control-custom w-100">
										</div>
										<div class="col-md-4 d-flex align-items-center" style="gap: 10px;">
											<button type="submit" class="btn-green h-auto py-2 flex-grow-1"><i class="fa fa-filter"></i> Filtrar período</button>
											@if(request('data_inicio') || request('data_fim'))
												<a href="{{ route('painel.integracoes.relatorio-geral') }}" class="btn-outline-custom h-auto py-2"><i class="fa fa-times"></i> Limpar</a>
											@endif
										</div>
									</form>
								</div>

								<!-- 4 Mini Metrics Row inside Section 2 -->
								<div class="p-4 bg-light border-bottom">
									<div class="row">
										<div class="col-sm-6 col-md-3 mb-2 mb-md-0">
											<div class="mini-metric-box">
												<div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px; background: #e6f4ea; color: #0d7a42; font-size: 18px;">
													<i class="fa fa-cloud-upload"></i>
												</div>
												<div>
													<span class="font-weight-bold text-dark" style="font-size: 20px; line-height: 1.1;">{{ $logs->total() > 0 ? 1 : 0 }}</span>
													<div class="text-muted small">Importação realizada</div>
													<div class="text-muted" style="font-size: 10px;">Última: {{ $ultimoLog ? $ultimoLog->created_at->format('d/m/Y \à\s H:i') : 'N/A' }}</div>
												</div>
											</div>
										</div>

										<div class="col-sm-6 col-md-3 mb-2 mb-md-0">
											<div class="mini-metric-box">
												<div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px; background: #f3e8ff; color: #9333ea; font-size: 18px;">
													<i class="fa fa-home"></i>
												</div>
												<div>
													<span class="font-weight-bold text-dark" style="font-size: 20px; line-height: 1.1;">{{ $ultimoLog ? ($ultimoLog->total_incluidos + $ultimoLog->total_alterados) : 0 }}</span>
													<div class="text-muted small">Total de imóveis</div>
													<div class="text-muted" style="font-size: 10px;">Importados nesta execução</div>
												</div>
											</div>
										</div>

										<div class="col-sm-6 col-md-3 mb-2 mb-md-0">
											<div class="mini-metric-box">
												<div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px; background: #fef3c7; color: #d97706; font-size: 18px;">
													<i class="fa fa-check-circle-o"></i>
												</div>
												<div>
													<span class="font-weight-bold text-dark" style="font-size: 20px; line-height: 1.1;">{{ $ultimoLog ? $ultimoLog->total_alertas : 0 }}</span>
													<div class="text-muted small">Erros encontrados</div>
													<div class="text-muted" style="font-size: 10px;">Durante a importação</div>
												</div>
											</div>
										</div>

										<div class="col-sm-6 col-md-3 mb-2 mb-md-0">
											<div class="mini-metric-box">
												<div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 40px; height: 40px; background: #ffebee; color: #e11d48; font-size: 18px;">
													<i class="fa fa-clock-o"></i>
												</div>
												<div>
													<span class="font-weight-bold text-dark" style="font-size: 20px; line-height: 1.1;">00:01:23</span>
													<div class="text-muted small">Tempo de execução</div>
													<div class="text-muted" style="font-size: 10px;">Duração da importação</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- Table with Dark Header -->
								<div class="table-responsive">
									<table class="table-dark-header">
										<thead>
											<tr>
												<th style="width: 12%;">Código</th>
												<th style="width: 20%;">Data da Importação <i class="fa fa-sort text-muted ml-1"></i></th>
												<th style="width: 15%;">Hora <i class="fa fa-sort text-muted ml-1"></i></th>
												<th class="text-center" style="width: 18%;">Total de Imóveis</th>
												<th class="text-center" style="width: 12%;">Erros</th>
												<th class="text-center" style="width: 13%;">Situação</th>
												<th class="text-right" style="width: 10%;">Ações</th>
											</tr>
										</thead>
										<tbody>
											@forelse ($logs as $log)
											<tr>
												<td class="font-weight-600 text-dark">{{ $log->id }}</td>
												<td>{{ $log->created_at ? $log->created_at->format('d/m/Y') : '' }}</td>
												<td>{{ $log->created_at ? $log->created_at->format('H:i:s') : '' }}</td>
												<td class="text-center font-weight-600">{{ $log->total_incluidos + $log->total_alterados }}</td>
												<td class="text-center font-weight-600 text-warning">{{ $log->total_alertas }}</td>
												<td class="text-center">
													<span class="badge font-weight-500 px-3 py-1" style="background-color: #dcfce7; color: #166534; border-radius: 12px;">✓ Concluída</span>
												</td>
												<td class="text-right">
													<button type="button" class="btn-action-icon btn-abrir-modal" data-id="{{ $log->id }}" title="Relatório Completo">
														<i class="fa fa-eye"></i>
													</button>
												</td>
											</tr>
											@empty
											<tr>
												<td colspan="7" class="text-center py-5 text-muted">
													Nenhum histórico de importação encontrado.
												</td>
											</tr>
											@endforelse
										</tbody>
									</table>
								</div>

								<!-- Footer Pagination -->
								<div class="d-flex flex-wrap align-items-center justify-content-between p-3 border-top" style="background-color: #ffffff;">
									<div class="text-muted small">
										Mostrando {{ $logs->firstItem() ?? 0 }} a {{ $logs->lastItem() ?? 0 }} de {{ $logs->total() }} importações
									</div>
									<div class="d-flex align-items-center" style="gap: 15px;">
										<div class="pagination-custom">
											{{ $logs->appends(request()->query())->links() }}
										</div>
										<form method="GET" action="{{ route('painel.integracoes.relatorio-geral') }}" id="formPerPageIntegracoes" class="m-0">
											<select name="per_page" class="form-control-custom px-2" style="height: 36px; font-size: 12px;" onchange="this.form.submit()">
												<option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10 por página</option>
												<option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25 por página</option>
												<option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50 por página</option>
											</select>
										</form>
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

<!-- MODAL ANÚNCIOS INTEGRADOS -->
<div class="modal fade" id="modalAnunciosIntegrados" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered" role="document" style="max-width: 1050px;">
		<div class="modal-content modal-custom-content">
			<!-- Header -->
			<div class="modal-custom-header">
				<h4 class="modal-title font-weight-bold text-dark" style="font-size: 20px;">Anúncios integrados</h4>
				<button type="button" class="close text-muted" data-dismiss="modal" aria-label="Close" style="font-size: 24px; outline: none;">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body p-4" style="background-color: #ffffff;">
				<!-- Top Bar Info inside Modal -->
				<div class="d-flex flex-wrap align-items-center justify-content-between p-3 rounded-lg mb-4" style="background-color: #f8fafc; border: 1px solid #e2e8f0; gap: 15px;">
					<div class="d-flex align-items-center" style="gap: 14px;">
						<div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #ffffff; border: 1px solid #e2e8f0; color: #64748b;">
							<i class="fa fa-calendar"></i>
						</div>
						<div>
							<strong class="text-dark d-block" style="font-size: 15px;">Importação #<span id="mLogId">--</span></strong>
							<small class="text-muted" id="mLogData">--</small>
						</div>
					</div>

					<div class="d-flex align-items-center" style="gap: 15px;">
						<span class="badge font-weight-600 px-3 py-2" style="background-color: #dcfce7; color: #166534; border-radius: 20px; font-size: 13px;">✓ Concluída</span>
						<span class="text-muted small"><strong class="text-dark" id="mLogTotalImoveis">0</strong> imóveis importados &bull; <strong class="text-dark" id="mLogTotalErros">0</strong> erros</span>
					</div>

					<div>
						<button type="button" class="btn-outline-green"><i class="fa fa-download"></i> Exportar relatório</button>
					</div>
				</div>

				<!-- 4 Cards Breakdown -->
				<div class="row mb-4">
					<div class="col-sm-6 col-md-3 mb-2 mb-md-0">
						<div class="modal-metric-card">
							<div class="rounded-circle mx-auto mb-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #e6f4ea; color: #16a34a; font-size: 18px;">
								<i class="fa fa-home"></i>
							</div>
							<div class="font-weight-bold text-dark" style="font-size: 22px;" id="mMetricIncluidos">0</div>
							<div class="font-weight-600 text-dark small">Incluídos</div>
							<div class="text-muted" style="font-size: 11px;">100% do total</div>
						</div>
					</div>

					<div class="col-sm-6 col-md-3 mb-2 mb-md-0">
						<div class="modal-metric-card">
							<div class="rounded-circle mx-auto mb-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #f3e8ff; color: #9333ea; font-size: 18px;">
								<i class="fa fa-home"></i>
							</div>
							<div class="font-weight-bold text-dark" style="font-size: 22px;" id="mMetricAlterados">0</div>
							<div class="font-weight-600 text-dark small">Alterados</div>
							<div class="text-muted" style="font-size: 11px;">0% do total</div>
						</div>
					</div>

					<div class="col-sm-6 col-md-3 mb-2 mb-md-0">
						<div class="modal-metric-card">
							<div class="rounded-circle mx-auto mb-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #ffebee; color: #dc2626; font-size: 18px;">
								<i class="fa fa-times-circle"></i>
							</div>
							<div class="font-weight-bold text-dark" style="font-size: 22px;" id="mMetricRemovidos">0</div>
							<div class="font-weight-600 text-dark small">Removidos</div>
							<div class="text-muted" style="font-size: 11px;">0% do total</div>
						</div>
					</div>

					<div class="col-sm-6 col-md-3 mb-2 mb-md-0">
						<div class="modal-metric-card">
							<div class="rounded-circle mx-auto mb-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background: #fef3c7; color: #d97706; font-size: 18px;">
								<i class="fa fa-exclamation-triangle"></i>
							</div>
							<div class="font-weight-bold text-dark" style="font-size: 22px;" id="mMetricAlertas">0</div>
							<div class="font-weight-600 text-dark small">Alertas</div>
							<div class="text-muted" style="font-size: 11px;">0% do total</div>
						</div>
					</div>
				</div>

				<!-- Search and Filter Bar -->
				<div class="row align-items-center mb-3">
					<div class="col-md-6 mb-2 mb-md-0">
						<div class="position-relative">
							<input type="text" id="mSearchInput" class="form-control-custom w-100 pl-4" placeholder="Buscar por código, título, cidade ou bairro...">
							<i class="fa fa-search position-absolute text-muted" style="left: 12px; top: 13px;"></i>
						</div>
					</div>
					<div class="col-md-4 mb-2 mb-md-0">
						<div class="d-flex align-items-center" style="gap: 10px;">
							<span class="small font-weight-600 text-muted flex-shrink-0">Situação</span>
							<select id="mSituacaoSelect" class="form-control-custom w-100">
								<option value="Todos">Todos</option>
								<option value="Incluido">Incluídos</option>
								<option value="Alterado">Alterados</option>
								<option value="Alerta">Alertas</option>
							</select>
						</div>
					</div>
					<div class="col-md-2 text-right">
						<button type="button" id="mBtnFiltrar" class="btn-outline-custom w-100 justify-content-center"><i class="fa fa-sliders"></i> Filtros</button>
					</div>
				</div>

				<!-- Table inside Modal -->
				<div class="table-responsive rounded-lg border" style="max-height: 420px; overflow-y: auto;">
					<table class="modal-table">
						<thead>
							<tr>
								<th style="width: 12%;">Código <i class="fa fa-sort text-muted ml-1"></i></th>
								<th style="width: 38%;">Anúncio</th>
								<th style="width: 18%;">Tipo</th>
								<th style="width: 18%;">Cidade / Bairro</th>
								<th style="width: 14%;">Status</th>
							</tr>
						</thead>
						<tbody id="mTableBody">
							<tr><td colspan="5" class="text-center py-4 text-muted">Carregando dados...</td></tr>
						</tbody>
					</table>
				</div>

				<!-- Modal Footer Pagination -->
				<div class="d-flex flex-wrap align-items-center justify-content-between pt-3 mt-2" style="font-size: 13px;">
					<div class="text-muted" id="mPaginationInfo">
						Mostrando 0 a 0 de 0 anúncios
					</div>
					<div class="d-flex align-items-center" style="gap: 15px;">
						<div id="mPaginationButtons" class="d-flex align-items-center" style="gap: 5px;"></div>
						<select id="mPerPageSelect" class="form-control-custom px-2" style="height: 34px; font-size: 12px;">
							<option value="10">10 por página</option>
							<option value="25">25 por página</option>
							<option value="50">50 por página</option>
						</select>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<!-- MODAL DOCUMENTAÇÃO XML -->
<div class="modal fade" id="modalDocumentacaoXML" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered" role="document" style="max-width: 1050px;">
		<div class="modal-content modal-custom-content">
			<!-- Header -->
			<div class="modal-custom-header">
				<h4 class="modal-title font-weight-bold text-dark" style="font-size: 20px;"><i class="fa fa-file-text-o mr-2 text-success"></i> Documentação de Integração XML (Padrão VivaReal/ZAP)</h4>
				<button type="button" class="close text-muted" data-dismiss="modal" aria-label="Close" style="font-size: 24px; outline: none;">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body p-4" style="background-color: #ffffff; max-height: 75vh; overflow-y: auto;">
				
				<!-- Visão Geral -->
				<div class="mb-4">
					<h5 class="font-weight-bold text-dark mb-2">Visão Geral</h5>
					<p class="text-muted">A integração por arquivo XML permite a importação automatizada de anúncios da imobiliária para o portal <strong>Rede Imóveis MT</strong>. O formato suportado é o padrão <strong>VivaReal VRSync XML v1.0</strong>.</p>
					<div class="alert alert-info rounded-lg mb-0" role="alert" style="background-color: #f0fdf4; border-color: #bbf7d0; color: #166534; font-size: 14px;">
						<i class="fa fa-info-circle mr-2"></i><strong>Funcionamento:</strong> O sistema realiza a leitura automática do XML conforme a periodicidade configurada (12h, 24h ou 48h). Atualizações manuais também podem ser feitas a qualquer momento pelo botão <strong>"Processar Atualização Manual"</strong>. Se ocorrer algum erro estrutural ou falha de acesso ao arquivo XML, a integração é temporariamente bloqueada para segurança de dados, e notificações de erro são enviadas ao administrador.
					</div>
				</div>

				<hr class="my-4">

				<!-- Mapeamento de Tags -->
				<div class="mb-4">
					<h5 class="font-weight-bold text-dark mb-3">Mapeamento de Campos e Tags</h5>
					<p class="text-muted">Certifique-se de que seu arquivo XML de anúncios contém as tags descritas abaixo organizadas em um elemento principal <code>&lt;ListingDataFeed&gt;</code> que possui um <code>&lt;Header&gt;</code> e uma lista <code>&lt;Listings&gt;</code> contendo elementos <code>&lt;Listing&gt;</code>.</p>
					
					<div class="table-responsive rounded-lg border">
						<table class="modal-table">
							<thead>
								<tr>
									<th style="width: 25%;">Tag / Elemento</th>
									<th style="width: 15%;">Tipo</th>
									<th style="width: 15%;">Obrigatoriedade</th>
									<th style="width: 45%;">Descrição / Mapeamento / Valores Aceitos</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="font-weight-600"><code>&lt;ListingID&gt;</code></td>
									<td>Texto</td>
									<td><span class="badge badge-danger" style="background-color: #fee2e2; color: #991b1b;">Obrigatório</span></td>
									<td>ID de identificação do imóvel na imobiliária (único). Ex: <code>340437</code></td>
								</tr>
								<tr>
									<td class="font-weight-600"><code>&lt;Title&gt;</code></td>
									<td>Texto</td>
									<td><span class="badge badge-secondary" style="background-color: #f3f4f6; color: #374151;">Opcional</span></td>
									<td>Título curto do anúncio (máx. 100 caracteres).</td>
								</tr>
								<tr>
									<td class="font-weight-600"><code>&lt;TransactionType&gt;</code></td>
									<td>Texto</td>
									<td><span class="badge badge-danger" style="background-color: #fee2e2; color: #991b1b;">Obrigatório</span></td>
									<td>Tipo de transação. Valores aceitos: <code>For Sale</code> (Venda), <code>For Rent</code> (Locação), ou <code>Sale/Rent</code> (Venda e Locação).</td>
								</tr>
								<tr>
									<td class="font-weight-600"><code>&lt;PublicationType&gt;</code></td>
									<td>Texto</td>
									<td><span class="badge badge-secondary" style="background-color: #f3f4f6; color: #374151;">Opcional</span></td>
									<td>Tipo de publicação. Valores: <code>STANDARD</code> ou <code>PREMIUM</code> / <code>SUPER_PREMIUM</code>.</td>
								</tr>
								<tr>
									<td class="font-weight-600"><code>&lt;Details&gt;&lt;PropertyType&gt;</code></td>
									<td>Texto</td>
									<td><span class="badge badge-danger" style="background-color: #fee2e2; color: #991b1b;">Obrigatório</span></td>
									<td>Tipo do imóvel. Ex: <code>Residential / Home</code>, <code>Residential / Condo</code>, <code>Residential / Apartment</code>, <code>Commercial / Edificio Comercial</code>.</td>
								</tr>
								<tr>
									<td class="font-weight-600"><code>&lt;Details&gt;&lt;Description&gt;</code></td>
									<td>Texto</td>
									<td><span class="badge badge-danger" style="background-color: #fee2e2; color: #991b1b;">Obrigatório</span></td>
									<td>Descrição detalhada do imóvel. Recomenda-se envelopar com <code>&lt;![CDATA[ ... ]]&gt;</code>.</td>
								</tr>
								<tr>
									<td class="font-weight-600"><code>&lt;Details&gt;&lt;ListPrice&gt;</code></td>
									<td>Numérico</td>
									<td>Condicional</td>
									<td>Preço de venda do imóvel. Obrigatório se <code>TransactionType</code> for <code>For Sale</code> ou <code>Sale/Rent</code>. Ex: <code>340000</code></td>
								</tr>
								<tr>
									<td class="font-weight-600"><code>&lt;Details&gt;&lt;RentalPrice&gt;</code></td>
									<td>Numérico</td>
									<td>Condicional</td>
									<td>Preço de locação mensal do imóvel. Obrigatório se <code>TransactionType</code> for <code>For Rent</code> ou <code>Sale/Rent</code>. Ex: <code>3500</code></td>
								</tr>
								<tr>
									<td class="font-weight-600"><code>&lt;Details&gt;&lt;LivingArea&gt;</code></td>
									<td>Inteiro</td>
									<td><span class="badge badge-secondary" style="background-color: #f3f4f6; color: #374151;">Opcional</span></td>
									<td>Área útil do imóvel em metros quadrados. Ex: <code>166</code></td>
								</tr>
								<tr>
									<td class="font-weight-600"><code>&lt;Details&gt;&lt;LotArea&gt;</code></td>
									<td>Inteiro</td>
									<td><span class="badge badge-secondary" style="background-color: #f3f4f6; color: #374151;">Opcional</span></td>
									<td>Área do lote/terreno em metros quadrados.</td>
								</tr>
								<tr>
									<td class="font-weight-600"><code>&lt;Details&gt;&lt;Bedrooms&gt;</code></td>
									<td>Inteiro</td>
									<td><span class="badge badge-secondary" style="background-color: #f3f4f6; color: #374151;">Opcional</span></td>
									<td>Quantidade de quartos.</td>
								</tr>
								<tr>
									<td class="font-weight-600"><code>&lt;Details&gt;&lt;Bathrooms&gt;</code></td>
									<td>Inteiro</td>
									<td><span class="badge badge-secondary" style="background-color: #f3f4f6; color: #374151;">Opcional</span></td>
									<td>Quantidade de banheiros.</td>
								</tr>
								<tr>
									<td class="font-weight-600"><code>&lt;Details&gt;&lt;Suites&gt;</code></td>
									<td>Inteiro</td>
									<td><span class="badge badge-secondary" style="background-color: #f3f4f6; color: #374151;">Opcional</span></td>
									<td>Quantidade de suítes.</td>
								</tr>
								<tr>
									<td class="font-weight-600"><code>&lt;Details&gt;&lt;Garage&gt;</code></td>
									<td>Inteiro</td>
									<td><span class="badge badge-secondary" style="background-color: #f3f4f6; color: #374151;">Opcional</span></td>
									<td>Quantidade de vagas de garagem.</td>
								</tr>
								<tr>
									<td class="font-weight-600"><code>&lt;Details&gt;&lt;PropertyAdministrationFee&gt;</code></td>
									<td>Numérico</td>
									<td><span class="badge badge-secondary" style="background-color: #f3f4f6; color: #374151;">Opcional</span></td>
									<td>Valor mensal da taxa de condomínio. Ex: <code>359</code></td>
								</tr>
								<tr>
									<td class="font-weight-600"><code>&lt;Details&gt;&lt;YearlyTax&gt;</code></td>
									<td>Numérico</td>
									<td><span class="badge badge-secondary" style="background-color: #f3f4f6; color: #374151;">Opcional</span></td>
									<td>Valor anual do IPTU. Ex: <code>1603</code></td>
								</tr>
								<tr>
									<td class="font-weight-600"><code>&lt;Location&gt;</code></td>
									<td>Estrutura</td>
									<td><span class="badge badge-danger" style="background-color: #fee2e2; color: #991b1b;">Obrigatório</span></td>
									<td>Contém sub-tags: <code>&lt;Country&gt;</code> (abbreviation="BR"), <code>&lt;State&gt;</code> (abbreviation="MT"), <code>&lt;City&gt;</code> (Ex: Cuiabá), <code>&lt;Neighborhood&gt;</code> (Bairro), <code>&lt;Address&gt;</code> (Rua), <code>&lt;StreetNumber&gt;</code>, <code>&lt;PostalCode&gt;</code> (CEP numérico).</td>
								</tr>
								<tr>
									<td class="font-weight-600"><code>&lt;Media&gt;&lt;Item&gt;</code></td>
									<td>URL</td>
									<td><span class="badge badge-danger" style="background-color: #fee2e2; color: #991b1b;">Obrigatório</span></td>
									<td>Imagens ou vídeos do imóvel. Atributos: <code>medium="image"</code> (ou <code>"video"</code>), <code>caption="Legenda"</code>, <code>primary="true"</code> (para a foto principal de capa). É necessário ao menos 1 item de imagem para a integração ser concluída com sucesso.</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<hr class="my-4">

				<!-- Características (Features) -->
				<div class="mb-4">
					<h5 class="font-weight-bold text-dark mb-2">Mapeamento de Características (Tag <code>&lt;Feature&gt;</code>)</h5>
					<p class="text-muted">Abaixo estão os valores aceitos na sub-tag <code>&lt;Feature&gt;</code> e a respectiva característica traduzida no painel:</p>
					
					<div class="row">
						<div class="col-md-6">
							<ul class="list-group list-group-flush border rounded-lg p-2" style="font-size: 13px;">
								<li class="list-group-item d-flex justify-content-between"><span><code>Gym</code></span><span class="text-muted">Academia</span></li>
								<li class="list-group-item d-flex justify-content-between"><span><code>BBQ</code></span><span class="text-muted">Churrasqueira</span></li>
								<li class="list-group-item d-flex justify-content-between"><span><code>Elevator</code></span><span class="text-muted">Elevador</span></li>
								<li class="list-group-item d-flex justify-content-between"><span><code>Pool</code></span><span class="text-muted">Piscina</span></li>
								<li class="list-group-item d-flex justify-content-between"><span><code>Playground</code></span><span class="text-muted">Playground</span></li>
								<li class="list-group-item d-flex justify-content-between"><span><code>Party Room</code></span><span class="text-muted">Salão de festas</span></li>
								<li class="list-group-item d-flex justify-content-between"><span><code>Kitchen</code></span><span class="text-muted">Cozinha</span></li>
							</ul>
						</div>
						<div class="col-md-6">
							<ul class="list-group list-group-flush border rounded-lg p-2" style="font-size: 13px;">
								<li class="list-group-item d-flex justify-content-between"><span><code>Edicule</code></span><span class="text-muted">Edícula</span></li>
								<li class="list-group-item d-flex justify-content-between"><span><code>Parking Garage</code></span><span class="text-muted">Estacionamento</span></li>
								<li class="list-group-item d-flex justify-content-between"><span><code>Dinner Room</code></span><span class="text-muted">Sala de jantar</span></li>
								<li class="list-group-item d-flex justify-content-between"><span><code>Internet Connection</code></span><span class="text-muted">Internet</span></li>
								<li class="list-group-item d-flex justify-content-between"><span><code>Sports Court</code></span><span class="text-muted">Quadra de esportes</span></li>
								<li class="list-group-item d-flex justify-content-between"><span><code>Garden</code></span><span class="text-muted">Jardim</span></li>
							</ul>
						</div>
					</div>
				</div>

				<hr class="my-4">

				<!-- Exemplo de XML Completo -->
				<div class="mb-2">
					<div class="d-flex align-items-center justify-content-between mb-2">
						<h5 class="font-weight-bold text-dark mb-0">Exemplo de XML Completo (VivaReal VRSync)</h5>
						<button type="button" class="btn btn-sm btn-outline-success btn-copiar-xml" onclick="copiarExemploXML()"><i class="fa fa-copy mr-1"></i> Copiar XML</button>
					</div>
					<pre class="bg-light p-3 border rounded-lg overflow-auto text-dark" style="max-height: 400px; font-size: 12px; font-family: 'Courier New', Courier, monospace;"><code id="exemploXmlContent">&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;ListingDataFeed xmlns="http://www.vivareal.com/schemas/1.0/VRSync" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.vivareal.com/schemas/1.0/VRSync http://xml.vivareal.com/vrsync.xsd"&gt;
  &lt;Header&gt;
    &lt;Provider&gt;Nome da Imobiliaria&lt;/Provider&gt;
    &lt;Email&gt;comercial@suaimobiliaria.com.br&lt;/Email&gt;
    &lt;ContactName&gt;Responsavel Integracao&lt;/ContactName&gt;
    &lt;Telephone&gt;6599999999&lt;/Telephone&gt;
    &lt;PublishDate&gt;2026-07-08T18:39:55&lt;/PublishDate&gt;
    &lt;Logo/&gt;
  &lt;/Header&gt;
  &lt;Listings&gt;
    &lt;Listing&gt;
      &lt;ListingID&gt;340437&lt;/ListingID&gt;
      &lt;Title&gt;&lt;![CDATA[EXCELENTE CASA RESIDENCIAL MOBILIADA LOCALIZADA NO BAIRRO PASCOAL RAMOS]]&gt;&lt;/Title&gt;
      &lt;TransactionType&gt;For Rent&lt;/TransactionType&gt;
      &lt;PublicationType&gt;SUPER_PREMIUM&lt;/PublicationType&gt;
      &lt;Featured&gt;false&lt;/Featured&gt;
      &lt;DetailViewUrl/&gt;
      &lt;Media&gt;
        &lt;Item medium="image" caption="Foto 1" primary="true"&gt;https://suaimobiliaria.com.br/fotos/imovel-1.jpg&lt;/Item&gt;
        &lt;Item medium="image" caption="Foto 2" primary="false"&gt;https://suaimobiliaria.com.br/fotos/imovel-2.jpg&lt;/Item&gt;
      &lt;/Media&gt;
      &lt;Details&gt;
        &lt;PropertyType&gt;Residential / Home&lt;/PropertyType&gt;
        &lt;Description&gt;&lt;![CDATA[Excelente casa residencial mobiliada medindo aproximadamente 165,70m² com as seguintes características: Sala mobiliada, Cozinha Gourmet, 2 Quartos...]]&gt;&lt;/Description&gt;
        &lt;RentalPrice currency="BRL"&gt;3500&lt;/RentalPrice&gt;
        &lt;YearlyTax currency="BRL"&gt;1603&lt;/YearlyTax&gt;
        &lt;PropertyAdministrationFee currency="BRL"&gt;359&lt;/PropertyAdministrationFee&gt;
        &lt;LivingArea unit="square metres"&gt;166&lt;/LivingArea&gt;
        &lt;Bedrooms&gt;2&lt;/Bedrooms&gt;
        &lt;Bathrooms&gt;2&lt;/Bathrooms&gt;
        &lt;Garage type="Parking Space"&gt;1&lt;/Garage&gt;
        &lt;Features&gt;
          &lt;Feature&gt;Parking Garage&lt;/Feature&gt;
          &lt;Feature&gt;BBQ&lt;/Feature&gt;
          &lt;Feature&gt;Pool&lt;/Feature&gt;
        &lt;/Features&gt;
      &lt;/Details&gt;
      &lt;Location displayAddress="All"&gt;
        &lt;Country abbreviation="BR"&gt;Brasil&lt;/Country&gt;
        &lt;State abbreviation="MT"&gt;Mato Grosso&lt;/State&gt;
        &lt;City&gt;Cuiabá&lt;/City&gt;
        &lt;Neighborhood&gt;Pascoal Ramos&lt;/Neighborhood&gt;
        &lt;Address&gt;Rua Principal&lt;/Address&gt;
        &lt;StreetNumber&gt;123&lt;/StreetNumber&gt;
        &lt;Complement&gt;Residencial Águas Claras&lt;/Complement&gt;
        &lt;PostalCode&gt;78098199&lt;/PostalCode&gt;
      &lt;/Location&gt;
    &lt;/Listing&gt;
  &lt;/Listings&gt;
&lt;/ListingDataFeed&gt;</code></pre>
				</div>

			</div>
			
			<div class="modal-footer border-top p-3" style="background-color: #f8fafc;">
				<button type="button" class="btn btn-secondary px-4 font-weight-600" data-dismiss="modal" style="border-radius: 8px; font-size: 13px;">Fechar</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="{{ asset('assets/portal/js/jquery-3.3.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/dashboard-script.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/script.js') }}"></script>

<script>
$(document).ready(function() {
	// Toggle Configuração form
	$('#btnToggleConfig, #btnFecharConfig').on('click', function() {
		$('#boxConfiguracao').slideToggle(200, function() {
			if ($('#boxConfiguracao').is(':visible')) {
				$('#btnToggleConfig').html('<i class="fa fa-times"></i> Ocultar configurações');
			} else {
				$('#btnToggleConfig').html('<i class="fa fa-cog"></i> Configurações da integração');
			}
		});
	});

	// Toggle Selecionar período
	$('#btnTogglePeriodo').on('click', function() {
		$('#boxFiltroPeriodo').slideToggle(200);
	});

	var currentLogId = null;
	var currentPage = 1;

	function carregarDetalhesModal(logId, page = 1) {
		currentLogId = logId;
		currentPage = page;

		var busca = $('#mSearchInput').val();
		var tipoLog = $('#mSituacaoSelect').val();
		var perPage = $('#mPerPageSelect').val();

		$('#mTableBody').html('<tr><td colspan="5" class="text-center py-4 text-muted"><i class="fa fa-spinner fa-spin mr-2"></i> Carregando anúncios integrados...</td></tr>');

		$.ajax({
			url: '{{ url("painel/integracoes") }}/' + logId + '/detalhes-ajax',
			type: 'GET',
			data: {
				page: page,
				busca: busca,
				tipo_log: tipoLog,
				per_page: perPage
			},
			success: function(response) {
				var logGeral = response.logGeral;
				var pagination = response.pagination;
				var data = response.data;

				$('#mLogId').text(logGeral.id);
				$('#mLogData').text(logGeral.created_at);
				$('#mLogTotalImoveis').text(logGeral.total_imoveis);
				$('#mLogTotalErros').text(logGeral.total_alertas);

				$('#mMetricIncluidos').text(logGeral.total_incluidos);
				$('#mMetricAlterados').text(logGeral.total_alterados);
				$('#mMetricRemovidos').text(logGeral.total_removidos);
				$('#mMetricAlertas').text(logGeral.total_alertas);

				var htmlRows = '';
				if (data.length > 0) {
					$.each(data, function(index, item) {
						var codigo = item.id_externo || 'N/A';
						var titulo = item.titulo_anuncio || 'Imóvel #' + codigo;
						var foto = item.foto;
						var tipoNome = item.tipo_nome || 'Imóvel';
						var area = item.area_util ? item.area_util + ' m²' : '';
						var cidade = item.nome_cidade || 'Cuiabá';
						var bairro = item.bairro_endereco || '';

						htmlRows += '<tr>';
						htmlRows += '<td><span class="badge badge-light border font-weight-600 px-2 py-1" style="font-size: 12px; color: #475467;">' + codigo + '</span></td>';
						htmlRows += '<td>';
						htmlRows += '  <div class="d-flex align-items-center">';
						htmlRows += '    <img src="' + foto + '" class="rounded mr-2" style="width: 45px; height: 35px; object-fit: cover;">';
						htmlRows += '    <div>';
						htmlRows += '      <strong class="text-dark d-block text-truncate" style="max-width: 250px; font-size: 12px;">' + titulo + '</strong>';
						htmlRows += '      <small class="text-muted" style="font-size: 11px;">' + codigo + '</small>';
						htmlRows += '    </div>';
						htmlRows += '  </div>';
						htmlRows += '</td>';
						htmlRows += '<td><div class="font-weight-500 text-dark">' + tipoNome + '</div><small class="text-muted">' + area + '</small></td>';
						htmlRows += '<td><div class="font-weight-500 text-dark">' + cidade + ' / MT</div><small class="text-muted">' + bairro + '</small></td>';
						htmlRows += '<td><span class="badge font-weight-500 px-3 py-1" style="background-color: #dcfce7; color: #166534; border-radius: 12px;"><i class="fa fa-check mr-1"></i> Sucesso</span></td>';
						htmlRows += '</tr>';
					});
				} else {
					htmlRows = '<tr><td colspan="5" class="text-center py-4 text-muted">Nenhum anúncio encontrado nesta importação.</td></tr>';
				}

				$('#mTableBody').html(htmlRows);
				$('#mPaginationInfo').text('Mostrando ' + pagination.from + ' a ' + pagination.to + ' de ' + pagination.total + ' anúncios');

				// Build pagination buttons
				var pagHtml = '';
				if (pagination.last_page > 1) {
					for (var i = 1; i <= pagination.last_page; i++) {
						if (i === pagination.current_page) {
							pagHtml += '<button type="button" class="btn btn-sm btn-success px-3 m-0" style="background-color:#0d7a42; border-color:#0d7a42;">' + i + '</button>';
						} else {
							pagHtml += '<button type="button" class="btn btn-sm btn-light border px-3 m-0 mPagBtn" data-page="' + i + '">' + i + '</button>';
						}
					}
				}
				$('#mPaginationButtons').html(pagHtml);
			},
			error: function(xhr) {
				var msg = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : 'Erro ao carregar os detalhes da integração.';
				$('#mTableBody').html('<tr><td colspan="5" class="text-center py-4 text-danger"><i class="fa fa-exclamation-triangle mr-2"></i> ' + msg + '</td></tr>');
			}
		});
	}

	$(document).on('click', '.btn-abrir-modal', function() {
		var logId = $(this).data('id');
		$('#modalAnunciosIntegrados').modal({backdrop: 'static', keyboard: true});
		$('#modalAnunciosIntegrados').modal('show');
		carregarDetalhesModal(logId, 1);
	});

	$(document).on('keyup', '#mSearchInput', function(e) {
		if (e.keyCode === 13 && currentLogId) {
			carregarDetalhesModal(currentLogId, 1);
		}
	});

	$(document).on('click', '#mBtnFiltrar', function() {
		if (currentLogId) carregarDetalhesModal(currentLogId, 1);
	});

	$(document).on('change', '#mSituacaoSelect, #mPerPageSelect', function() {
		if (currentLogId) carregarDetalhesModal(currentLogId, 1);
	});

	$(document).on('click', '.mPagBtn', function() {
		var page = $(this).data('page');
		if (currentLogId) carregarDetalhesModal(currentLogId, page);
	});

	// Trigger Modal Documentação
	$('#btnAbrirDoc').on('click', function() {
		$('#modalDocumentacaoXML').modal({backdrop: 'static', keyboard: true});
		$('#modalDocumentacaoXML').modal('show');
	});
});

// Copiar XML Exemplo
function copiarExemploXML() {
	var copyText = document.getElementById("exemploXmlContent").innerText;
	var tempInput = document.createElement("textarea");
	tempInput.value = copyText;
	document.body.appendChild(tempInput);
	tempInput.select();
	document.execCommand("copy");
	document.body.removeChild(tempInput);
	
	var btn = document.querySelector(".btn-copiar-xml");
	var originalHtml = btn.innerHTML;
	btn.innerHTML = '<i class="fa fa-check mr-1"></i> Copiado!';
	btn.classList.remove("btn-outline-success");
	btn.classList.add("btn-success");
	setTimeout(function() {
		btn.innerHTML = originalHtml;
		btn.classList.remove("btn-success");
		btn.classList.add("btn-outline-success");
	}, 2000);
}
</script>
</body>
</html>
