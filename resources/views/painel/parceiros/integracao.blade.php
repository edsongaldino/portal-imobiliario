<!DOCTYPE html>
<html dir="ltr" lang="pt-br">
<head>
	@include('includes.painel.head')
	<style>
		.card-integ { background: #ffffff; border-radius: 12px; border: 1px solid #e2e8f0; padding: 24px; margin-bottom: 24px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); }
		.card-integ h5 { font-weight: 700; color: #1e293b; margin-bottom: 16px; border-bottom: 2px solid #f1f5f9; padding-bottom: 10px; }
		.status-dot { display: inline-block; width: 10px; height: 10px; border-radius: 50%; margin-right: 6px; }
		.dot-sucesso { background-color: #10b981; }
		.dot-alerta { background-color: #f59e0b; }
	</style>
</head>
<body>
<div class="wrapper">
	<div class="preloader"></div>

	@include('includes.painel.menu')

	<section class="our-dashbord dashbord bgc-f7 pb50">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
				<div class="col-sm-12 col-lg-8 col-xl-10 maxw100flex-992">
					<div class="row">

						<div class="col-lg-12 mb20 d-flex align-items-center justify-content-between">
							<div class="breadcrumb_content style2">
								<h2 class="breadcrumb_title">Verificação de Integração - {{ $parceiro->nome }}</h2>
								<p>Detalhes técnicos da sincronização via XML/CRM</p>
							</div>
							<a href="{{ route('painel.parceiros.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Voltar aos Parceiros</a>
						</div>

						<div class="col-lg-6">
							<div class="card-integ">
								<h5><i class="fa fa-building text-primary mr-2"></i> Dados da Imobiliária</h5>
								<p class="mb-2"><strong>Nome Fantasia:</strong> {{ $parceiro->nome }}</p>
								<p class="mb-2"><strong>Razão Social:</strong> {{ $parceiro->razao_social ?? 'N/A' }}</p>
								<p class="mb-2"><strong>CNPJ:</strong> {{ $parceiro->cnpj ?? 'N/A' }}</p>
								<p class="mb-2"><strong>E-mail:</strong> {{ $parceiro->email }}</p>
								<p class="mb-2"><strong>Telefone:</strong> {{ Helper::Phone($parceiro->telefone_comercial) }}</p>
								<p class="mb-0"><strong>Total de Imóveis no Portal:</strong> <span class="badge badge-success" style="font-size: 14px;">{{ $parceiro->anuncios_count }} imóveis</span></p>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="card-integ">
								<h5><i class="fa fa-rss text-success mr-2"></i> Configuração do Feed XML / CRM</h5>
								@forelse($integracoes as $integ)
									<p class="mb-2"><strong>Sistema CRM:</strong> {{ $integ->crm ?? 'XML Genérico' }}</p>
									<p class="mb-2"><strong>URL do Feed XML:</strong> <br/>
										@php $urlXml = $integ->url ?? ($integ->arquivo ?? null); @endphp
										@if($urlXml)
											<a href="{{ $urlXml }}" target="_blank" class="text-break text-primary font-weight-bold" style="font-size: 13px;">
												<i class="fa fa-external-link mr-1"></i> {{ $urlXml }}
											</a>
										@else
											<span class="text-muted">URL Não cadastrada</span>
										@endif
									</p>
									<p class="mb-0"><strong>Última Importação Solicitada:</strong> {{ $integ->updated_at ? $integ->updated_at->format('d/m/Y H:i:s') : 'N/A' }}</p>
								@empty
									<div class="alert alert-warning mb-0">
										<i class="fa fa-exclamation-triangle"></i> Nenhuma integração CRM cadastrada diretamente para este parceiro.
									</div>
								@endforelse
							</div>
						</div>

						<div class="col-lg-12">
							<div class="card-integ">
								<h5><i class="fa fa-history text-info mr-2"></i> Histórico Recente de Importação (Logs)</h5>
								@if($logIntegracao)
									<div class="p-3 bg-light rounded mb-3">
										<p class="mb-1"><strong>Data da ÚLTIMA Leitura:</strong> {{ $logIntegracao->created_at->format('d/m/Y H:i:s') }}</p>
										<p class="mb-0"><strong>Status Geral:</strong> <span class="badge badge-info">{{ $logIntegracao->status ?? 'Concluído' }}</span></p>
									</div>

									@if($logAnuncios && $logAnuncios->count() > 0)
										<div class="table-responsive">
											<table class="table table-sm table-striped">
												<thead>
													<tr>
														<th>ID Imóvel</th>
														<th>Título</th>
														<th>Operação / Log</th>
														<th>Data</th>
													</tr>
												</thead>
												<tbody>
													@foreach($logAnuncios as $logItem)
														<tr>
															<td><strong>{{ $logItem->id_externo }}</strong></td>
															<td>{{ $logItem->titulo }}</td>
															<td><span class="badge badge-secondary">{{ $logItem->tipo ?? 'Importado' }}</span></td>
															<td>{{ $logItem->created_at->format('d/m/Y H:i') }}</td>
														</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									@else
										<p class="text-muted mb-0">Nenhum detalhe de anúncio registrado no log recente.</p>
									@endif
								@else
									<p class="text-muted mb-0">Ainda não há registros de log de sincronização para este parceiro.</p>
								@endif
							</div>
						</div>

					</div>

					<div class="row mt10">
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
