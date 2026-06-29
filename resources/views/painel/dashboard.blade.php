<!DOCTYPE html>
<html dir="ltr" lang="pt-br">
<head>
	@include('includes.painel.head')
	<style>
		:root {
			--primary-green: #0d7a42;
			--bg-light: #f8fafc;
			--text-main: #0f172a;
			--text-muted: #64748b;
			--border-color: #e2e8f0;
		}

		body {
			background-color: var(--bg-light);
			font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
		}

		.dash-card {
			background: #ffffff;
			border: 1px solid var(--border-color);
			border-radius: 14px;
			padding: 20px;
			margin-bottom: 20px;
			box-shadow: 0 1px 3px rgba(0, 0, 0, 0.02);
			transition: transform 0.2s, box-shadow 0.2s;
		}
		.dash-card:hover {
			box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
		}

		/* Metric Circle Icons */
		.metric-icon {
			width: 48px;
			height: 48px;
			border-radius: 12px;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 20px;
			flex-shrink: 0;
		}
		.icon-green { background-color: #e6f4ea; color: #0d7a42; }
		.icon-purple { background-color: #f3e8ff; color: #9333ea; }
		.icon-pink { background-color: #ffe4e6; color: #e11d48; }
		.icon-orange { background-color: #ffedd5; color: #ea580c; }

		.metric-number {
			font-size: 28px;
			font-weight: 700;
			color: var(--text-main);
			line-height: 1.1;
		}
		.metric-label {
			font-size: 13px;
			color: var(--text-muted);
			font-weight: 500;
		}
		.metric-growth {
			font-size: 12px;
			font-weight: 600;
			color: #16a34a;
			display: flex;
			align-items: center;
			gap: 4px;
			margin-top: 12px;
		}

		/* Table clean */
		.dash-table {
			width: 100%;
			border-collapse: separate;
			border-spacing: 0;
		}
		.dash-table thead th {
			background: #ffffff;
			color: #475467;
			font-weight: 600;
			font-size: 12px;
			padding: 12px 14px;
			border-bottom: 1px solid var(--border-color);
			white-space: nowrap;
		}
		.dash-table tbody td {
			padding: 12px 14px;
			border-bottom: 1px solid #f1f5f9;
			vertical-align: middle;
			font-size: 13px;
			color: #1e293b;
		}
		.dash-table tbody tr:last-child td {
			border-bottom: none;
		}
		.dash-table tbody tr:hover td {
			background-color: #f8fafc;
		}

		.badge-count {
			font-size: 12px;
			font-weight: 600;
			padding: 2px 10px;
			border-radius: 12px;
		}
		.badge-inc { background-color: #dcfce7; color: #166534; }
		.badge-alt { background-color: #e0f2fe; color: #075985; }
		.badge-ale { background-color: #fef3c7; color: #9a3412; }

		.btn-sm-outline {
			border: 1px solid var(--border-color);
			background: #ffffff;
			color: #475467;
			border-radius: 6px;
			padding: 4px 12px;
			font-size: 12px;
			font-weight: 500;
			transition: all 0.2s;
		}
		.btn-sm-outline:hover {
			background: #f8fafc;
			color: var(--text-main);
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
									<h2 class="font-weight-bold text-dark mb-1" style="font-size: 26px;">Olá, {{ strtoupper($usuario->anunciante->nome ?? $usuario->name) }}! 👋</h2>
									<p class="text-muted mb-0" style="font-size: 14px;">
										@if($usuario->perfil_id == 1)
											Que bom ver você por aqui novamente!
										@else
											Aqui está o resumo do desempenho da sua imobiliária.
										@endif
									</p>
								</div>
								<div class="d-flex align-items-center" style="gap: 20px;">
									<!-- Date Widget -->
									<div class="d-flex align-items-center" style="gap: 10px;">
										<i class="fa fa-calendar-o text-muted" style="font-size: 20px;"></i>
										<div>
											<div class="font-weight-600 text-dark small">{{ \Illuminate\Support\Carbon::now()->locale('pt_BR')->translatedFormat('d \d\e F, Y') }}</div>
											<div class="text-muted" style="font-size: 11px;">{{ ucfirst(\Illuminate\Support\Carbon::now()->locale('pt_BR')->translatedFormat('l')) }}</div>
										</div>
									</div>

									<!-- Notification Bell -->
									<div class="position-relative">
										<button type="button" class="btn btn-light border-0 rounded-circle p-2" style="width: 40px; height: 40px; background: #fff;">
											<i class="fa fa-bell-o text-muted" style="font-size: 18px;"></i>
										</button>
										<span class="badge badge-success position-absolute rounded-circle" style="top: -2px; right: -2px; font-size: 10px; padding: 3px 6px;">3</span>
									</div>

									<!-- User Profile Dropdown Widget -->
									<div class="d-flex align-items-center pl-3 border-left" style="gap: 10px;">
										<div class="rounded-circle bg-light d-flex align-items-center justify-content-center font-weight-bold text-secondary" style="width: 40px; height: 40px; border: 1px solid #cbd5e1;">
											{{ strtoupper(substr($usuario->name, 0, 2)) }}
										</div>
										<div>
											<div class="font-weight-600 text-dark small" style="line-height: 1.2;">{{ $usuario->name }}</div>
											<div class="text-muted" style="font-size: 11px;">{{ $usuario->perfil->nome ?? 'Administrador' }}</div>
										</div>
										<i class="fa fa-angle-down text-muted ml-1"></i>
									</div>
								</div>
							</div>
						</div>

						@if($usuario->perfil_id == 1)
						{{-- ===== ADMIN DASHBOARD ===== --}}

						<!-- 4 Metric Cards -->
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="dash-card">
								<div class="d-flex align-items-center" style="gap: 16px;">
									<div class="metric-icon icon-green"><i class="fa fa-home"></i></div>
									<div>
										<div class="metric-number">{{ number_format($totalAnuncios, 0, ',', '.') }}</div>
										<div class="metric-label">Anúncios Ativos</div>
									</div>
								</div>
								<div class="metric-growth">
									<i class="fa fa-arrow-up"></i> 12,5% <span class="text-muted font-weight-normal">vs. mês anterior</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="dash-card">
								<div class="d-flex align-items-center" style="gap: 16px;">
									<div class="metric-icon icon-purple"><i class="fa fa-eye"></i></div>
									<div>
										<div class="metric-number">{{ number_format($totalViews, 0, ',', '.') }}</div>
										<div class="metric-label">Visualizações</div>
									</div>
								</div>
								<div class="metric-growth">
									<i class="fa fa-arrow-up"></i> 18,3% <span class="text-muted font-weight-normal">vs. mês anterior</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="dash-card">
								<div class="d-flex align-items-center" style="gap: 16px;">
									<div class="metric-icon icon-pink"><i class="fa fa-commenting-o"></i></div>
									<div>
										<div class="metric-number">{{ $totalLeads }}</div>
										<div class="metric-label">Total Leads</div>
									</div>
								</div>
								<div class="metric-growth">
									<i class="fa fa-arrow-up"></i> 40% <span class="text-muted font-weight-normal">vs. mês anterior</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="dash-card">
								<div class="d-flex align-items-center" style="gap: 16px;">
									<div class="metric-icon icon-orange"><i class="fa fa-users"></i></div>
									<div>
										<div class="metric-number">{{ $totalParceiros }}</div>
										<div class="metric-label">Parceiros</div>
									</div>
								</div>
								<div class="metric-growth">
									<i class="fa fa-arrow-up"></i> 5,6% <span class="text-muted font-weight-normal">vs. mês anterior</span>
								</div>
							</div>
						</div>

						<!-- Parceiros Status Banner Card -->
						<div class="col-lg-12">
							<div class="dash-card p-4 position-relative overflow-hidden">
								<div class="row align-items-center">
									<div class="col-md-9 d-flex flex-wrap align-items-center" style="gap: 40px;">
										<div class="d-flex align-items-center" style="gap: 14px;">
											<div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; background: #e6f4ea; color: #16a34a; font-size: 18px;">
												<i class="fa fa-check"></i>
											</div>
											<div>
												<span class="font-weight-bold text-dark" style="font-size: 20px;">{{ $parceirosAtivos }}</span>
												<div class="text-muted small">Ativos</div>
											</div>
										</div>

										<div class="d-flex align-items-center" style="gap: 14px;">
											<div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; background: #fef3c7; color: #d97706; font-size: 18px;">
												<i class="fa fa-clock-o"></i>
											</div>
											<div>
												<span class="font-weight-bold text-dark" style="font-size: 20px;">{{ $parceirosAguardando }}</span>
												<div class="text-muted small">Aguardando</div>
											</div>
										</div>

										<div class="d-flex align-items-center" style="gap: 14px;">
											<div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px; background: #ffebee; color: #dc2626; font-size: 18px;">
												<i class="fa fa-ban"></i>
											</div>
											<div>
												<span class="font-weight-bold text-dark" style="font-size: 20px;">{{ $parceirosBloqueados }}</span>
												<div class="text-muted small">Bloqueados</div>
											</div>
										</div>
									</div>

									<!-- Decorative Graphic Illustration Right -->
									<div class="col-md-3 text-right d-none d-md-block">
										<svg width="120" height="60" viewBox="0 0 120 60" fill="none" xmlns="http://www.w3.org/2000/svg">
											<rect x="10" y="20" width="18" height="40" rx="2" fill="#e2e8f0"/>
											<rect x="32" y="10" width="22" height="50" rx="2" fill="#cbd5e1"/>
											<rect x="58" y="25" width="16" height="35" rx="2" fill="#e2e8f0"/>
											<rect x="78" y="5" width="26" height="55" rx="2" fill="#94a3b8"/>
										</svg>
									</div>
								</div>
							</div>
						</div>

						<!-- Two Tables Side by Side -->
						<div class="col-xl-6">
							<div class="dash-card p-0 overflow-hidden" style="min-height: 420px;">
								<div class="d-flex align-items-center justify-content-between p-3 border-bottom">
									<h6 class="font-weight-bold text-dark mb-0 d-flex align-items-center" style="font-size: 15px;">
										<i class="fa fa-refresh text-success mr-2"></i> Últimas Integrações
									</h6>
									<a href="{{ route('painel.integracoes.relatorio-geral') }}" class="btn-sm-outline">Ver todas</a>
								</div>
								<div class="table-responsive">
									<table class="dash-table">
										<thead>
											<tr>
												<th>Parceiro</th>
												<th class="text-center">Incluídos</th>
												<th class="text-center">Alterados</th>
												<th class="text-center">Alertas</th>
												<th>Última atualização</th>
											</tr>
										</thead>
										<tbody>
											@forelse($ultimasIntegracoes as $integ)
											<tr>
												<td><strong>{{ $integ->anunciante->nome ?? 'N/A' }}</strong></td>
												<td class="text-center"><span class="badge-count badge-inc">{{ $integ->total_incluidos ?? 0 }}</span></td>
												<td class="text-center"><span class="badge-count badge-alt">{{ $integ->total_alterados ?? 0 }}</span></td>
												<td class="text-center"><span class="badge-count badge-ale">{{ $integ->total_alertas ?? 0 }}</span></td>
												<td class="text-muted small">{{ $integ->created_at->format('d/m/Y H:i') }}</td>
											</tr>
											@empty
											<tr><td colspan="5" class="text-center py-4 text-muted">Nenhuma integração registrada.</td></tr>
											@endforelse
										</tbody>
									</table>
								</div>
								<div class="p-3 border-top text-center mt-auto" style="background-color: #fafafa;">
									<a href="{{ route('painel.integracoes.relatorio-geral') }}" class="text-success font-weight-600 small">Ver todas as integrações &rarr;</a>
								</div>
							</div>
						</div>

						<div class="col-xl-6">
							<div class="dash-card p-0 overflow-hidden" style="min-height: 420px;">
								<div class="d-flex align-items-center justify-content-between p-3 border-bottom">
									<h6 class="font-weight-bold text-dark mb-0 d-flex align-items-center" style="font-size: 15px;">
										<i class="fa fa-users text-success mr-2"></i> Últimos Leads Recebidos
									</h6>
									<a href="{{ route('painel.leads.index') }}" class="btn-sm-outline">Ver todos</a>
								</div>
								<div class="table-responsive">
									<table class="dash-table">
										<thead>
											<tr>
												<th>Nome</th>
												<th>E-mail</th>
												<th>Parceiro</th>
												<th>Data</th>
											</tr>
										</thead>
										<tbody>
											@forelse($ultimosLeads as $lead)
											<tr>
												<td><strong>{{ $lead->nome }}</strong></td>
												<td class="text-muted small">{{ $lead->email }}</td>
												<td class="text-muted small">{{ $lead->anunciante_nome }}</td>
												<td class="text-muted small">{{ $lead->created_at->format('d/m/Y H:i') }}</td>
											</tr>
											@empty
											<tr><td colspan="4" class="text-center py-4 text-muted">Nenhum lead recebido ainda.</td></tr>
											@endforelse
										</tbody>
									</table>
								</div>
								<div class="p-3 border-top text-center mt-auto" style="background-color: #fafafa;">
									<a href="{{ route('painel.leads.index') }}" class="text-success font-weight-600 small">Ver todos os leads &rarr;</a>
								</div>
							</div>
						</div>

						@else
						{{-- ===== ADVERTISER DASHBOARD ===== --}}

						<!-- 4 Metric Cards -->
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="dash-card">
								<div class="d-flex align-items-center justify-content-between">
									<div class="d-flex align-items-center" style="gap: 16px;">
										<div class="metric-icon icon-green"><i class="fa fa-home"></i></div>
										<div>
											<div class="metric-number">{{ number_format($totalAnunciosAdv, 0, ',', '.') }}</div>
											<div class="metric-label">Anúncios ativos</div>
										</div>
									</div>
									<svg width="60" height="30" viewBox="0 0 60 30" fill="none"><path d="M2 25L15 18L30 22L45 8L58 12" stroke="#16a34a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
								</div>
								<div class="metric-growth">
									<i class="fa fa-arrow-up"></i> 12,5% <span class="text-muted font-weight-normal">vs. mês anterior</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="dash-card">
								<div class="d-flex align-items-center justify-content-between">
									<div class="d-flex align-items-center" style="gap: 16px;">
										<div class="metric-icon icon-purple"><i class="fa fa-eye"></i></div>
										<div>
											<div class="metric-number">{{ number_format($totalViewsAdv, 0, ',', '.') }}</div>
											<div class="metric-label">Visualizações</div>
										</div>
									</div>
									<svg width="60" height="30" viewBox="0 0 60 30" fill="none"><path d="M2 22L15 12L30 18L45 5L58 15" stroke="#9333ea" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
								</div>
								<div class="metric-growth">
									<i class="fa fa-arrow-up"></i> 18,3% <span class="text-muted font-weight-normal">vs. mês anterior</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="dash-card">
								<div class="d-flex align-items-center justify-content-between">
									<div class="d-flex align-items-center" style="gap: 16px;">
										<div class="metric-icon icon-pink"><i class="fa fa-commenting-o"></i></div>
										<div>
											<div class="metric-number">{{ $totalLeadsAdv }}</div>
											<div class="metric-label">Leads</div>
										</div>
									</div>
									<svg width="60" height="30" viewBox="0 0 60 30" fill="none"><path d="M2 15L15 18L30 14L45 20L58 16" stroke="#e11d48" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
								</div>
								<div class="metric-growth text-muted">
									&ndash; 0% <span class="text-muted font-weight-normal">vs. mês anterior</span>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="dash-card">
								<div class="d-flex align-items-center justify-content-between">
									<div class="d-flex align-items-center" style="gap: 16px;">
										<div class="metric-icon icon-orange"><i class="fa fa-heart"></i></div>
										<div>
											<div class="metric-number">{{ $totalFavoritosAdv }}</div>
											<div class="metric-label">Favoritos</div>
										</div>
									</div>
									<svg width="60" height="30" viewBox="0 0 60 30" fill="none"><path d="M2 20L15 15L30 22L45 10L58 18" stroke="#ea580c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
								</div>
								<div class="metric-growth text-muted">
									&ndash; 0% <span class="text-muted font-weight-normal">vs. mês anterior</span>
								</div>
							</div>
						</div>

						<!-- Row 2: Desempenho, Origem, Estatísticas Rápida -->
						<div class="col-xl-5">
							<div class="dash-card" style="min-height: 340px;">
								<div class="d-flex align-items-center justify-content-between mb-3">
									<h6 class="font-weight-bold text-dark mb-0" style="font-size: 15px;">Desempenho dos anúncios</h6>
									<select id="selectFiltroDias" class="form-control-custom py-0 px-2" style="height: 32px; font-size: 12px;">
										<option value="7">Últimos 7 dias</option>
										<option value="30">Últimos 30 dias</option>
									</select>
								</div>
								<div class="d-flex align-items-center mb-3" style="gap: 15px; font-size: 12px;">
									<div><span style="display:inline-block; width:10px; height:10px; border-radius:50%; background:#16a34a;" class="mr-1"></span> Visualizações</div>
									<div><span style="display:inline-block; width:10px; height:10px; border-radius:50%; background:#3b82f6;" class="mr-1"></span> Contatos</div>
								</div>
								<!-- Chart Graphic mockup -->
								<div class="pt-2 position-relative text-center">
									<svg width="100%" height="180" viewBox="0 0 400 180" fill="none" preserveAspectRatio="none">
										<path id="chartPathViews" d="M0 120 Q50 90 100 110 T200 80 T300 120 T400 90" stroke="#16a34a" stroke-width="2.5" fill="none"/>
										<path id="chartPathLeads" d="M0 150 Q50 160 100 140 T200 155 T300 145 T400 150" stroke="#3b82f6" stroke-width="2.5" fill="none"/>
									</svg>
									<div id="chartDates" class="d-flex justify-content-between text-muted mt-2" style="font-size: 11px;">
										<span>23/06</span><span>24/06</span><span>25/06</span><span>26/06</span><span>27/06</span><span>28/06</span><span>29/06</span>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-4">
							<div class="dash-card" style="min-height: 340px;">
								<h6 class="font-weight-bold text-dark mb-3" style="font-size: 15px;">Origem das visualizações</h6>
								<div class="row align-items-center pt-3">
									<div class="col-6 text-center">
										<svg width="120" height="120" viewBox="0 0 36 36">
											<path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="#0d7a42" stroke-width="5" stroke-dasharray="62, 100" />
											<path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831" fill="none" stroke="#34d399" stroke-width="5" stroke-dasharray="24, 100" stroke-dashoffset="-62" />
											<path d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831" fill="none" stroke="#60a5fa" stroke-width="5" stroke-dasharray="10, 100" stroke-dashoffset="-86" />
										</svg>
									</div>
									<div class="col-6 pl-0" style="font-size: 12px;">
										<div class="d-flex align-items-center justify-content-between mb-2">
											<span><i class="fa fa-circle text-success mr-1"></i> Site</span>
											<strong>62% <span class="text-muted font-weight-normal">(303)</span></strong>
										</div>
										<div class="d-flex align-items-center justify-content-between mb-2">
											<span><i class="fa fa-circle mr-1" style="color: #34d399;"></i> Integrações</span>
											<strong>24% <span class="text-muted font-weight-normal">(117)</span></strong>
										</div>
										<div class="d-flex align-items-center justify-content-between mb-2">
											<span><i class="fa fa-circle mr-1" style="color: #60a5fa;"></i> Portais</span>
											<strong>10% <span class="text-muted font-weight-normal">(49)</span></strong>
										</div>
										<div class="d-flex align-items-center justify-content-between">
											<span><i class="fa fa-circle text-muted mr-1"></i> Outros</span>
											<strong>4% <span class="text-muted font-weight-normal">(19)</span></strong>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-3">
							<div class="dash-card" style="min-height: 340px;">
								<h6 class="font-weight-bold text-dark mb-3" style="font-size: 15px;">Estatísticas rápidas</h6>
								<div class="d-flex flex-column" style="gap: 16px;">
									<div class="d-flex align-items-center justify-content-between pb-2 border-bottom">
										<div class="d-flex align-items-center" style="gap: 10px;">
											<div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; background: #e6f4ea; color: #0d7a42; font-size: 14px;"><i class="fa fa-mouse-pointer"></i></div>
											<span class="text-muted small">Taxa de cliques (CTR)</span>
										</div>
										<div class="text-right">
											<strong class="text-dark d-block">3,2%</strong>
											<small class="text-success" style="font-size: 10px;"><i class="fa fa-arrow-up"></i> 0,8 p.p.</small>
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-between pb-2 border-bottom">
										<div class="d-flex align-items-center" style="gap: 10px;">
											<div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; background: #f3e8ff; color: #9333ea; font-size: 14px;"><i class="fa fa-clock-o"></i></div>
											<span class="text-muted small">Tempo médio no anúncio</span>
										</div>
										<div class="text-right">
											<strong class="text-dark d-block">02:47</strong>
											<small class="text-success" style="font-size: 10px;"><i class="fa fa-arrow-up"></i> 18s</small>
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-between pb-2 border-bottom">
										<div class="d-flex align-items-center" style="gap: 10px;">
											<div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; background: #e0f2fe; color: #0284c7; font-size: 14px;"><i class="fa fa-eye"></i></div>
											<span class="text-muted small">Anúncios mais vistos</span>
										</div>
										<div class="text-right">
											<strong class="text-dark d-block">8</strong>
											<a href="{{ route('painel.anuncios') }}" class="text-success font-weight-600" style="font-size: 10px;">Ver todos</a>
										</div>
									</div>
									<div class="d-flex align-items-center justify-content-between">
										<div class="d-flex align-items-center" style="gap: 10px;">
											<div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; background: #ffebee; color: #dc2626; font-size: 14px;"><i class="fa fa-commenting-o"></i></div>
											<span class="text-muted small">Leads aguardando</span>
										</div>
										<div class="text-right">
											<strong class="text-dark d-block">0</strong>
											<a href="{{ route('painel.leads.index') }}" class="text-success font-weight-600" style="font-size: 10px;">Ver todos</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Row 3: Anúncios Mais Visualizados, Leads Recentes, Status dos Anúncios -->
						<div class="col-xl-5">
							<div class="dash-card p-0 overflow-hidden" style="min-height: 380px;">
								<div class="d-flex align-items-center justify-content-between p-3 border-bottom">
									<h6 class="font-weight-bold text-dark mb-0" style="font-size: 15px;">Anúncios mais visualizados</h6>
									<a href="{{ route('painel.anuncios') }}" class="btn-sm-outline">Ver todos</a>
								</div>
								<div class="table-responsive">
									<table class="dash-table">
										<thead>
											<tr>
												<th>Anúncio</th>
												<th class="text-center">Visualizações</th>
												<th class="text-center">Contatos</th>
											</tr>
										</thead>
										<tbody>
											@forelse($anunciosMaisVisualizados as $anuncio)
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<img src="{{ $anuncio->fotos->first()->arquivo ?? asset('assets/portal/images/property/fp1.jpg') }}" class="rounded mr-2" style="width: 45px; height: 35px; object-fit: cover;">
														<div>
															<strong class="text-dark d-block text-truncate" style="max-width: 180px; font-size: 12px;">{{ $anuncio->titulo }}</strong>
															<small class="text-muted" style="font-size: 11px;">AP{{ $anuncio->id_externo ?? $anuncio->id }} &bull; {{ $anuncio->transacao }}</small>
														</div>
													</div>
												</td>
												<td class="text-center font-weight-600 text-success">{{ Helper::GetTotalViewsByAnuncio($anuncio->id, null) }}</td>
												<td class="text-center font-weight-600">{{ $anuncio->leads ? $anuncio->leads->count() : 0 }}</td>
											</tr>
											@empty
											<tr><td colspan="3" class="text-center py-4 text-muted">Nenhum anúncio cadastrado.</td></tr>
											@endforelse
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="col-xl-4">
							<div class="dash-card p-0 overflow-hidden" style="min-height: 380px;">
								<div class="d-flex align-items-center justify-content-between p-3 border-bottom">
									<h6 class="font-weight-bold text-dark mb-0" style="font-size: 15px;">Leads recentes</h6>
									<a href="{{ route('painel.leads.index') }}" class="btn-sm-outline">Ver todos</a>
								</div>
								<div class="table-responsive">
									<table class="dash-table">
										<thead>
											<tr>
												<th>Nome</th>
												<th>Imóvel</th>
												<th>Data</th>
											</tr>
										</thead>
										<tbody>
											@forelse($leadsRecentes as $lead)
											@php $iniciais = strtoupper(substr($lead->nome, 0, 2)); @endphp
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div class="rounded-circle mr-2 d-flex align-items-center justify-content-center bg-light text-secondary font-weight-bold" style="width: 28px; height: 28px; font-size: 10px; border: 1px solid #cbd5e1;">
															{{ $iniciais }}
														</div>
														<strong class="text-dark" style="font-size: 12px;">{{ $lead->nome }}</strong>
													</div>
												</td>
												<td><span class="badge badge-light border" style="font-size: 11px;">AP{{ $lead->id_externo ?? $lead->imovel_id }}</span></td>
												<td>
													<div style="font-size: 11px;">{{ $lead->created_at ? $lead->created_at->format('d/m/Y') : '' }}</div>
													<small class="text-muted" style="font-size: 10px;">{{ $lead->created_at ? $lead->created_at->format('H:i') : '' }}</small>
												</td>
											</tr>
											@empty
											<tr><td colspan="3" class="text-center py-4 text-muted">Nenhum lead recebido ainda.</td></tr>
											@endforelse
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="col-xl-3">
							<div class="dash-card p-3" style="min-height: 380px;">
								<div class="d-flex align-items-center justify-content-between mb-3">
									<h6 class="font-weight-bold text-dark mb-0" style="font-size: 15px;">Status dos anúncios</h6>
									<a href="{{ route('painel.anuncios') }}" class="btn-sm-outline">Ver todos</a>
								</div>
								<div class="d-flex flex-column" style="gap: 12px;">
									<div class="d-flex align-items-center justify-content-between p-2 rounded" style="background-color: #fafafa; border: 1px solid #f1f5f9;">
										<div class="d-flex align-items-center" style="gap: 10px;">
											<div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; background: #e6f4ea; color: #16a34a;"><i class="fa fa-home"></i></div>
											<div>
												<strong class="text-dark d-block" style="font-size: 13px;">Liberados</strong>
												<small class="text-muted d-block" style="font-size: 10px;">Publicados e visíveis</small>
											</div>
										</div>
										<span class="badge badge-success font-weight-bold px-2 py-1" style="font-size: 13px;">{{ $anunciosLiberados }}</span>
									</div>

									<div class="d-flex align-items-center justify-content-between p-2 rounded" style="background-color: #fafafa; border: 1px solid #f1f5f9;">
										<div class="d-flex align-items-center" style="gap: 10px;">
											<div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; background: #fef3c7; color: #d97706;"><i class="fa fa-clock-o"></i></div>
											<div>
												<strong class="text-dark d-block" style="font-size: 13px;">Em análise</strong>
												<small class="text-muted d-block" style="font-size: 10px;">Aguardando aprovação</small>
											</div>
										</div>
										<span class="badge badge-warning text-dark font-weight-bold px-2 py-1" style="font-size: 13px;">{{ $anunciosEmAnalise }}</span>
									</div>

									<div class="d-flex align-items-center justify-content-between p-2 rounded" style="background-color: #fafafa; border: 1px solid #f1f5f9;">
										<div class="d-flex align-items-center" style="gap: 10px;">
											<div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; background: #ffebee; color: #dc2626;"><i class="fa fa-ban"></i></div>
											<div>
												<strong class="text-dark d-block" style="font-size: 13px;">Rejeitados</strong>
												<small class="text-muted d-block" style="font-size: 10px;">Não aprovados</small>
											</div>
										</div>
										<span class="badge badge-danger font-weight-bold px-2 py-1" style="font-size: 13px;">{{ $anunciosRejeitados }}</span>
									</div>

									<div class="d-flex align-items-center justify-content-between p-2 rounded" style="background-color: #fafafa; border: 1px solid #f1f5f9;">
										<div class="d-flex align-items-center" style="gap: 10px;">
											<div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; background: #f1f5f9; color: #64748b;"><i class="fa fa-history"></i></div>
											<div>
												<strong class="text-dark d-block" style="font-size: 13px;">Expirados</strong>
												<small class="text-muted d-block" style="font-size: 10px;">Prazo expirado</small>
											</div>
										</div>
										<span class="badge badge-secondary font-weight-bold px-2 py-1" style="font-size: 13px;">{{ $anunciosExpirados }}</span>
									</div>
								</div>

								<a href="{{ route('painel.anuncios') }}" class="btn btn-block btn-light border font-weight-600 mt-3" style="border-radius: 8px; font-size: 13px;">
									Gerenciar meus anúncios &rarr;
								</a>
							</div>
						</div>

						@endif

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
	$(document).on('change', '#selectFiltroDias', function() {
		var dias = $(this).val();
		if (dias == '30') {
			$('#chartPathViews').attr('d', 'M0 130 Q50 40 100 90 T200 30 T300 80 T400 50');
			$('#chartPathLeads').attr('d', 'M0 160 Q50 130 100 145 T200 110 T300 135 T400 120');
			$('#chartDates').html('<span>01/06</span><span>06/06</span><span>12/06</span><span>18/06</span><span>24/06</span><span>29/06</span>');
		} else {
			$('#chartPathViews').attr('d', 'M0 120 Q50 90 100 110 T200 80 T300 120 T400 90');
			$('#chartPathLeads').attr('d', 'M0 150 Q50 160 100 140 T200 155 T300 145 T400 150');
			$('#chartDates').html('<span>23/06</span><span>24/06</span><span>25/06</span><span>26/06</span><span>27/06</span><span>28/06</span><span>29/06</span>');
		}
	});
});
</script>
</body>
</html>
