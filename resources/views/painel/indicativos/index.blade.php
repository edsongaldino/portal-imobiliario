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

        .badge-residencial {
            background-color: #f0fdf4;
            color: #166534;
            font-size: 13px;
            font-weight: 500;
            padding: 4px 12px;
            border-radius: 16px;
        }

        .badge-comercial {
            background-color: #e0f2fe;
            color: #0369a1;
            font-size: 13px;
            font-weight: 500;
            padding: 4px 12px;
            border-radius: 16px;
        }

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

						<div class="col-lg-12 mb20">
							<div class="d-flex flex-wrap align-items-center justify-content-between" style="gap: 15px;">
								<div>
									<h2 class="font-weight-bold text-dark mb-1" style="font-size: 26px;">Gestão de Indicativos</h2>
									<p class="text-muted mb-0" style="font-size: 14px;">Gerencie os indicativos imobiliários exibidos no portal.</p>
								</div>
								<div class="d-flex align-items-center" style="gap: 15px;">
                                    <a href="{{ route('painel.indicativos.create') }}" class="btn-green"><i class="fa fa-plus"></i> Novo Indicativo</a>
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

						<div class="col-lg-12">
							<div class="ui-card p-0 overflow-hidden">
								<div class="table-responsive">
									<table class="table-custom">
										<thead>
											<tr>
												<th>Data de Publicação</th>
												<th>Mês</th>
												<th>Ano</th>
												<th>Tipo</th>
                                                <th>Arquivo</th>
												<th class="text-right">Ações</th>
											</tr>
										</thead>
										<tbody>
											@forelse ($indicativos as $indicativo)
											<tr>
												<td>{{ date('d/m/Y', strtotime($indicativo->data_publicacao)) }}</td>
												<td>{{ $indicativo->mes }}</td>
												<td>{{ $indicativo->ano }}</td>
												<td>
                                                    @if($indicativo->tipo == 'Residencial')
                                                        <span class="badge-residencial"><i class="fa fa-home"></i> Residencial</span>
                                                    @else
                                                        <span class="badge-comercial"><i class="fa fa-building"></i> Comercial</span>
                                                    @endif
												</td>
                                                <td>
                                                    <a href="{{ asset($indicativo->arquivo) }}" target="_blank" class="text-primary"><i class="fa fa-file-pdf-o"></i> Baixar PDF</a>
                                                </td>
												<td class="text-right">
													<button type="button" class="btn-action-icon" data-toggle="modal" data-target="#modalDelete{{ $indicativo->id }}" title="Excluir">
														<i class="fa fa-trash text-danger"></i>
													</button>

													<!-- Modal Excluir -->
													<div class="modal fade text-left" id="modalDelete{{ $indicativo->id }}" tabindex="-1" role="dialog" aria-hidden="true">
														<div class="modal-dialog modal-dialog-centered" role="document">
															<div class="modal-content style2" style="border-radius: 12px;">
																<div class="modal-header">
                                                                    <h5 class="modal-title font-weight-bold">Confirmar Exclusão</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Tem certeza que deseja excluir este indicativo? Esta ação não pode ser desfeita e removerá o arquivo PDF do servidor.</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                                                    <a href="{{ route('painel.indicativos.destroy', $indicativo->id) }}" class="btn btn-danger">Sim, Excluir</a>
                                                                </div>
															</div>
														</div>
													</div>
												</td>
											</tr>
											@empty
											<tr>
												<td colspan="6" class="text-center py-5 text-muted">
													<i class="fa fa-info-circle fa-2x mb-2 d-block text-muted"></i>
													Nenhum indicativo cadastrado.
												</td>
											</tr>
											@endforelse
										</tbody>
									</table>
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
</div>

<script type="text/javascript" src="{{ asset('assets/portal/js/jquery-3.3.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/dashboard-script.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/script.js') }}"></script>
</body>
</html>
