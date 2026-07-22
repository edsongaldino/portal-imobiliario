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
            width: 100%;
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
									<h2 class="font-weight-bold text-dark mb-1" style="font-size: 26px;">Novo Indicativo</h2>
									<p class="text-muted mb-0" style="font-size: 14px;">Cadastre um novo relatório de indicadores de mercado.</p>
								</div>
								<div class="d-flex align-items-center" style="gap: 15px;">
                                    <a href="{{ route('painel.indicativos.index') }}" class="btn-outline-custom"><i class="fa fa-arrow-left"></i> Voltar</a>
								</div>
							</div>
						</div>

                        <div class="col-lg-12">
                            <div class="ui-card">
                                <form action="{{ route('painel.indicativos.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label class="small font-weight-600 text-muted">Data de Publicação *</label>
                                            <input type="date" name="data_publicacao" class="form-control-custom" required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="small font-weight-600 text-muted">Mês (Nome) *</label>
                                            <input type="text" name="mes" class="form-control-custom" placeholder="Ex: Janeiro, Fevereiro" required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="small font-weight-600 text-muted">Ano *</label>
                                            <input type="number" name="ano" class="form-control-custom" placeholder="Ex: 2026" required min="2000" max="2100">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="small font-weight-600 text-muted">Tipo *</label>
                                            <select name="tipo" class="form-control-custom" required>
                                                <option value="">Selecione</option>
                                                <option value="Residencial">Residencial</option>
                                                <option value="Comercial">Comercial</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="small font-weight-600 text-muted">Arquivo (PDF) *</label>
                                            <input type="file" name="arquivo" class="form-control-custom" accept=".pdf" style="padding-top: 5px;" required>
                                            <small class="text-muted mt-1 d-block">Apenas arquivos PDF (Max 10MB).</small>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <button type="submit" class="btn-green">Salvar Indicativo</button>
                                        </div>
                                    </div>
                                </form>
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
