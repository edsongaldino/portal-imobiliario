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

		/* Cards UI */
		.ui-card {
			background: #ffffff;
			border: 1px solid var(--border-color);
			border-radius: 12px;
			padding: 20px 24px;
			margin-bottom: 20px;
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
		}

		/* Form Inputs & Selects */
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

		/* Badges */
		.badge-parceiro {
			background-color: #ecfdf5;
			color: #047857;
			font-size: 11px;
			font-weight: 600;
			padding: 2px 8px;
			border-radius: 12px;
			display: inline-block;
			margin-left: 6px;
		}
		.badge-tipo {
			background-color: #f0fdf4;
			color: #166534;
			font-size: 13px;
			font-weight: 500;
			padding: 4px 12px;
			border-radius: 16px;
		}
		.badge-imoveis {
			background-color: #f0f9ff;
			color: #0284c7;
			font-size: 13px;
			font-weight: 600;
			padding: 4px 12px;
			border-radius: 16px;
		}
		.status-dot-text {
			font-weight: 600;
			font-size: 13px;
			display: inline-flex;
			align-items: center;
			gap: 6px;
		}
		.dot-ativo { color: #16a34a; }
		.dot-aguardando { color: #d97706; }
		.dot-bloqueado { color: #dc2626; }

		/* Table Action Buttons */
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

		/* Custom Table */
		.table-parceiros {
			width: 100%;
			border-collapse: separate;
			border-spacing: 0;
		}
		.table-parceiros thead th {
			background: #ffffff;
			color: #475467;
			font-weight: 600;
			font-size: 13px;
			padding: 14px 16px;
			border-bottom: 1px solid var(--border-color);
			white-space: nowrap;
		}
		.table-parceiros tbody td {
			padding: 16px;
			border-bottom: 1px solid #f1f5f9;
			vertical-align: middle;
			font-size: 14px;
			color: #1e293b;
		}
		.table-parceiros tbody tr:hover td {
			background-color: #f8fafc;
		}

		.pagination-custom .page-item .page-link {
			border-radius: 8px;
			margin: 0 2px;
			border: 1px solid var(--border-color);
			color: #475467;
			font-weight: 500;
		}
		.pagination-custom .page-item.active .page-link {
			background-color: var(--primary-green);
			border-color: var(--primary-green);
			color: #ffffff;
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
									<h2 class="font-weight-bold text-dark mb-1" style="font-size: 26px;">Gestão de Parceiros</h2>
									<p class="text-muted mb-0" style="font-size: 14px;">Gerencie imobiliárias e corretores cadastrados no portal.</p>
								</div>
								<div class="d-flex align-items-center" style="gap: 15px;">
									<a href="#" class="text-muted font-weight-500 ml-2" style="font-size: 14px;"><i class="fa fa-question-circle-o"></i> Ajuda</a>
								</div>
							</div>
						</div>

						@if(session('success'))
							<div class="col-lg-12">
								<div class="alert alert-success alert-dismissible fade show rounded-lg" role="alert">
									<strong>Sucesso!</strong> {{ session('success') }}
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							</div>
						@endif

						<!-- Card Filtros Avançados -->
						<div class="col-lg-12">
							<div class="ui-card">
								<div class="d-flex align-items-center justify-content-between mb-3 cursor-pointer" data-toggle="collapse" data-target="#collapseFiltros">
									<h6 class="font-weight-bold mb-0 text-dark d-flex align-items-center" style="font-size: 15px;">
										<i class="fa fa-filter text-success mr-2"></i> Filtros avançados
									</h6>
									<span class="text-muted small font-weight-500" id="btnToggleFiltros">
										{{ $filtrosAtivos > 0 ? 'Mais filtros' : 'Menos filtros' }} <i class="fa {{ $filtrosAtivos > 0 ? 'fa-chevron-down' : 'fa-chevron-up' }}"></i>
									</span>
								</div>

								<div class="collapse {{ $filtrosAtivos > 0 ? 'show' : 'show' }}" id="collapseFiltros">
									<form method="GET" action="{{ route('painel.parceiros.index') }}" id="formFiltrosAvançados">
										@if(request('busca')) <input type="hidden" name="busca" value="{{ request('busca') }}"> @endif
										<div class="row">
											<div class="col-md-3 mb-3">
												<label class="small font-weight-600 text-muted">Cidade</label>
												<select name="cidade_id" class="form-control-custom w-100">
													<option value="">Selecione a cidade</option>
													@foreach($cidades as $cidade)
														<option value="{{ $cidade->id }}" {{ request('cidade_id') == $cidade->id ? 'selected' : '' }}>{{ $cidade->nome_cidade }}</option>
													@endforeach
												</select>
											</div>
											<div class="col-md-3 mb-3">
												<label class="small font-weight-600 text-muted">Tipo de parceiro</label>
												<select name="tipo" class="form-control-custom w-100">
													<option value="">Todos os tipos</option>
													<option value="Imobiliaria" {{ request('tipo') == 'Imobiliaria' ? 'selected' : '' }}>Imobiliária</option>
													<option value="Corretor" {{ request('tipo') == 'Corretor' ? 'selected' : '' }}>Corretor</option>
												</select>
											</div>
											<div class="col-md-3 mb-3">
												<label class="small font-weight-600 text-muted">Situação</label>
												<select name="situacao" class="form-control-custom w-100">
													<option value="">Todas as situações</option>
													<option value="Ativo" {{ request('situacao') == 'Ativo' ? 'selected' : '' }}>Ativo</option>
													<option value="Aguardando" {{ request('situacao') == 'Aguardando' ? 'selected' : '' }}>Aguardando</option>
													<option value="Bloqueado" {{ request('situacao') == 'Bloqueado' ? 'selected' : '' }}>Bloqueado</option>
												</select>
											</div>
											<div class="col-md-3 mb-3">
												<label class="small font-weight-600 text-muted">Total de imóveis</label>
												<div class="d-flex align-items-center" style="gap: 6px;">
													<input type="number" name="imoveis_min" value="{{ request('imoveis_min') }}" class="form-control-custom text-center w-50" placeholder="Mínimo">
													<span class="text-muted small">até</span>
													<input type="number" name="imoveis_max" value="{{ request('imoveis_max') }}" class="form-control-custom text-center w-50" placeholder="Máximo">
												</div>
											</div>

											<div class="col-md-3 mb-3">
												<label class="small font-weight-600 text-muted">Data de cadastro</label>
												<input type="date" name="data_cadastro" value="{{ request('data_cadastro') }}" class="form-control-custom w-100">
											</div>
											<div class="col-md-3 mb-3">
												<label class="small font-weight-600 text-muted">CRECI</label>
												<input type="text" name="creci" value="{{ request('creci') }}" class="form-control-custom w-100" placeholder="Digite o CRECI">
											</div>
											<div class="col-md-3 mb-3">
												<label class="small font-weight-600 text-muted">CNPJ</label>
												<input type="text" name="cnpj" value="{{ request('cnpj') }}" class="form-control-custom w-100" placeholder="Digite o CNPJ">
											</div>
											<div class="col-md-3 mb-3">
												<label class="small font-weight-600 text-muted">Tags</label>
												<select name="tag" class="form-control-custom w-100">
													<option value="">Selecione uma tag</option>
												</select>
											</div>
										</div>

										<div class="d-flex align-items-center justify-content-between pt-2 border-top mt-1">
											<a href="{{ route('painel.parceiros.index') }}" class="text-success small font-weight-600"><i class="fa fa-refresh"></i> Limpar filtros</a>
											<span class="text-muted small">Filtros ativos: <strong>{{ $filtrosAtivos }}</strong></span>
											<button type="submit" class="btn btn-sm btn-success px-3" style="border-radius: 6px; background-color: var(--primary-green);">Aplicar Filtros</button>
										</div>
									</form>
								</div>
							</div>
						</div>

						<!-- Card Tabela de Parceiros -->
						<div class="col-lg-12">
							<div class="ui-card p-0 overflow-hidden">
								
								<!-- Subheader da Tabela -->
								<div class="d-flex flex-wrap align-items-center justify-content-between p-3 border-bottom" style="background-color: #ffffff;">
									<div class="font-weight-600 text-dark" style="font-size: 15px;">
										Parceiros encontrados: <strong>{{ $parceiros->total() }}</strong>
									</div>
									<div class="d-flex align-items-center" style="gap: 10px;">
										<a href="{{ route('painel.parceiros.exportar', request()->query()) }}" class="btn-outline-custom"><i class="fa fa-download"></i> Exportar</a>
										<div class="btn-group" role="group">
											<button type="button" class="btn btn-light border btn-sm active"><i class="fa fa-bars"></i></button>
											<button type="button" class="btn btn-light border btn-sm"><i class="fa fa-th-large"></i></button>
										</div>
										<form method="GET" action="{{ route('painel.parceiros.index') }}" id="formPerPage" class="m-0">
											@foreach(request()->except('per_page', 'page') as $key => $val)
												<input type="hidden" name="{{ $key }}" value="{{ $val }}">
											@endforeach
											<select name="per_page" class="form-control-custom" style="height: 38px; padding-top: 4px; padding-bottom: 4px;" onchange="this.form.submit()">
												<option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>10 por página</option>
												<option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20 por página</option>
												<option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50 por página</option>
											</select>
										</form>
									</div>
								</div>

								<!-- Tabela -->
								<div class="table-responsive">
									<table class="table-parceiros">
										<thead>
											<tr>
												<th>Parceiro / Anunciante</th>
												<th>Contato & Cidade</th>
												<th>Tipo</th>
												<th>Total Imóveis</th>
												<th>Situação</th>
												<th>Cadastro</th>
												<th class="text-right">Ações</th>
											</tr>
										</thead>
										<tbody>
											@forelse ($parceiros as $parceiro)
											<tr>
												<td>
													<div class="d-flex align-items-center">
														@if($parceiro->logo)
															<img src="{{ url('anunciante/'.$parceiro->id.'/logo') }}" alt="logo" width="40" height="40" class="rounded-circle mr-3" style="object-fit: cover; border: 1px solid #e2e8f0;">
														@else
															<div class="rounded-circle mr-3 d-flex align-items-center justify-content-center bg-light font-weight-bold text-secondary" style="width: 40px; height: 40px; border: 1px solid #cbd5e1; font-size: 14px;">
																{{ strtoupper(substr($parceiro->nome, 0, 2)) }}
															</div>
														@endif
														<div>
															<div class="d-flex align-items-center">
																<strong class="text-dark">{{ $parceiro->nome }}</strong>
																<span class="badge-parceiro">Parceiro</span>
															</div>
															<small class="text-muted" style="font-size: 12px;">
																CRECI: {{ $parceiro->creci ?? 'N/A' }} | CNPJ: {{ $parceiro->cnpj ?? 'N/A' }}
															</small>
														</div>
													</div>
												</td>
												<td>
													<div style="font-size: 13px;">{{ $parceiro->email }}</div>
													<small class="text-muted" style="font-size: 12px;">
														<i class="fa fa-phone text-muted mr-1"></i> {{ Helper::Phone($parceiro->telefone_comercial) }}<br/>
														<i class="fa fa-map-marker text-muted mr-1"></i> {{ $parceiro->endereco->cidade->nome_cidade ?? 'Cuiabá' }}-MT
													</small>
												</td>
												<td>
													<span class="badge-tipo">{{ $parceiro->tipo_anunciante ?? 'Imobiliária' }}</span>
												</td>
												<td>
													<span class="badge-imoveis">{{ $parceiro->anuncios_count }} imóveis</span>
												</td>
												<td>
													@if($parceiro->situacao_cadastro == 'Ativo')
														<span class="status-dot-text dot-ativo">● Ativo</span>
													@elseif($parceiro->situacao_cadastro == 'Bloqueado')
														<span class="status-dot-text dot-bloqueado">● Bloqueado</span>
													@else
														<span class="status-dot-text dot-aguardando">● Aguardando</span>
													@endif
												</td>
												<td>
													<div style="font-size: 13px;">{{ $parceiro->created_at ? $parceiro->created_at->format('d/m/Y') : 'N/A' }}</div>
													<small class="text-muted" style="font-size: 12px;">
														{{ $parceiro->created_at ? $parceiro->created_at->diffForHumans() : '' }}
													</small>
												</td>
												<td class="text-right">
													<a href="{{ route('painel.parceiros.integracao', $parceiro->id) }}" class="btn-action-icon" title="Ver Detalhes / Integração">
														<i class="fa fa-search"></i>
													</a>
													<button type="button" class="btn-action-icon" data-toggle="modal" data-target="#modalStatus{{ $parceiro->id }}" title="Gerenciar Situação">
														<i class="fa fa-ellipsis-v"></i>
													</button>

													<!-- Modal Alterar Status -->
													<div class="modal fade text-left" id="modalStatus{{ $parceiro->id }}" tabindex="-1" role="dialog" aria-hidden="true">
														<div class="modal-dialog modal-dialog-centered" role="document">
															<div class="modal-content style2" style="border-radius: 12px;">
																<form method="POST" action="{{ route('painel.parceiros.status', $parceiro->id) }}">
																	@csrf
																	<div class="modal-header">
																		<h5 class="modal-title font-weight-bold">Gerenciar Acesso: {{ $parceiro->nome }}</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<div class="modal-body">
																		<p class="mb-3 text-muted">Defina a situação de cadastro deste parceiro no sistema:</p>
																		<div class="form-group">
																			<label class="font-weight-bold">Situação de Cadastro:</label>
																			<select name="situacao_cadastro" class="form-control-custom w-100">
																				<option value="Ativo" {{ $parceiro->situacao_cadastro == 'Ativo' ? 'selected' : '' }}>🟢 Liberar Acesso (Ativo)</option>
																				<option value="Aguardando" {{ $parceiro->situacao_cadastro == 'Aguardando' ? 'selected' : '' }}>🟡 Em Análise (Aguardando)</option>
																				<option value="Bloqueado" {{ $parceiro->situacao_cadastro == 'Bloqueado' ? 'selected' : '' }}>🔴 Bloquear Acesso (Bloqueado)</option>
																			</select>
																		</div>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
																		<button type="submit" class="btn-green">Salvar Alterações</button>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</td>
											</tr>
											@empty
											<tr>
												<td colspan="7" class="text-center py-5 text-muted">
													<i class="fa fa-info-circle fa-2x mb-2 d-block text-muted"></i>
													Nenhum parceiro encontrado com os filtros aplicados.
												</td>
											</tr>
											@endforelse
										</tbody>
									</table>
								</div>

								<!-- Footer da Tabela & Paginação -->
								<div class="d-flex flex-wrap align-items-center justify-content-between p-3 border-top" style="background-color: #ffffff;">
									<div class="pagination-custom">
										{{ $parceiros->appends(request()->query())->links() }}
									</div>
									<div class="text-muted small font-weight-500">
										Mostrando {{ $parceiros->firstItem() ?? 0 }} a {{ $parceiros->lastItem() ?? 0 }} de {{ $parceiros->total() }} parceiros
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
</body>
</html>
