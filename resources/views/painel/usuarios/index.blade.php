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

		.badge-perfil {
			font-size: 12px;
			font-weight: 600;
			padding: 4px 12px;
			border-radius: 16px;
			display: inline-block;
		}
		.badge-admin { background-color: #fef3c7; color: #d97706; }
		.badge-anunciante { background-color: #e0f2fe; color: #0284c7; }
		.badge-cliente { background-color: #f1f5f9; color: #475467; }
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
									<h2 class="font-weight-bold text-dark mb-1" style="font-size: 26px;">Gestão de Usuários</h2>
									<p class="text-muted mb-0" style="font-size: 14px;">Gerencie os acessos do sistema, altere senhas ou vincule usuários às imobiliárias.</p>
								</div>
								<div>
									<button type="button" class="btn-green" data-toggle="modal" data-target="#modalNovoUsuario">
										<i class="fa fa-plus-circle"></i> Novo Usuário
									</button>
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

						@if(session('warning'))
							<div class="col-lg-12">
								<div class="alert alert-warning alert-dismissible fade show rounded-lg" role="alert">
									<strong>Atenção!</strong> {{ session('warning') }}
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							</div>
						@endif

						<!-- Card Filtros -->
						<div class="col-lg-12">
							<div class="ui-card">
								<form method="GET" action="{{ route('painel.usuarios.index') }}">
									<div class="row align-items-end">
										<div class="col-md-4 mb-2">
											<label class="small font-weight-600 text-muted">Buscar Usuário</label>
											<input type="text" name="busca" value="{{ request('busca') }}" class="form-control-custom w-100" placeholder="Nome ou E-mail...">
										</div>
										<div class="col-md-3 mb-2">
											<label class="small font-weight-600 text-muted">Perfil de Acesso</label>
											<select name="perfil_id" class="form-control-custom w-100">
												<option value="">Todos os perfis</option>
												@foreach($perfis as $p)
													<option value="{{ $p->id }}" {{ request('perfil_id') == $p->id ? 'selected' : '' }}>{{ $p->nome }}</option>
												@endforeach
											</select>
										</div>
										<div class="col-md-3 mb-2">
											<label class="small font-weight-600 text-muted">Vínculo / Imobiliária</label>
											<select name="anunciante_id" class="form-control-custom w-100">
												<option value="">Todas as imobiliárias</option>
												@foreach($anunciantes as $anunciante)
													<option value="{{ $anunciante->id }}" {{ request('anunciante_id') == $anunciante->id ? 'selected' : '' }}>{{ $anunciante->nome }}</option>
												@endforeach
											</select>
										</div>
										<div class="col-md-2 mb-2 d-flex style-gap" style="gap: 8px;">
											<button type="submit" class="btn-green w-100"><i class="fa fa-filter"></i> Filtrar</button>
											<a href="{{ route('painel.usuarios.index') }}" class="btn btn-light border" title="Limpar"><i class="fa fa-refresh"></i></a>
										</div>
									</div>
								</form>
							</div>
						</div>

						<!-- Card Tabela -->
						<div class="col-lg-12">
							<div class="ui-card p-0 overflow-hidden">
								<div class="d-flex align-items-center justify-content-between p-3 border-bottom" style="background-color: #ffffff;">
									<div class="font-weight-600 text-dark" style="font-size: 15px;">
										Usuários cadastrados: <strong>{{ $usuarios->total() }}</strong>
									</div>
								</div>

								<div class="table-responsive">
									<table class="table-custom">
										<thead>
											<tr>
												<th>Usuário</th>
												<th>Perfil de Acesso</th>
												<th>Vínculo / Imobiliária</th>
												<th>Data de Cadastro</th>
												<th class="text-right">Ações</th>
											</tr>
										</thead>
										<tbody>
											@forelse ($usuarios as $user)
											@php
												$iniciais = strtoupper(substr($user->name, 0, 2));
												$badgePerfil = match($user->perfil_id) {
													1 => 'badge-admin',
													2, 3 => 'badge-anunciante',
													default => 'badge-cliente'
												};
											@endphp
											<tr>
												<td>
													<div class="d-flex align-items-center">
														<div class="rounded-circle mr-3 d-flex align-items-center justify-content-center bg-light font-weight-bold text-secondary flex-shrink-0" style="width: 40px; height: 40px; border: 1px solid #cbd5e1; font-size: 14px;">
															{{ $iniciais }}
														</div>
														<div>
															<strong class="text-dark d-block" style="font-size: 15px;">{{ $user->name }}</strong>
															<small class="text-muted d-block" style="font-size: 12px;">{{ $user->email }}</small>
														</div>
													</div>
												</td>
												<td>
													<span class="badge-perfil {{ $badgePerfil }}">{{ $user->perfil->nome ?? 'Usuário' }}</span>
												</td>
												<td>
													@if($user->anunciante)
														<span class="font-weight-500 text-dark" style="font-size: 13px;"><i class="fa fa-building text-muted mr-1"></i> {{ $user->anunciante->nome }}</span>
													@else
														<span class="text-muted small">Nenhum vínculo (Geral)</span>
													@endif
												</td>
												<td>
													<div style="font-size: 13px;">{{ $user->created_at ? $user->created_at->format('d/m/Y') : 'N/A' }}</div>
													<small class="text-muted" style="font-size: 12px;">{{ $user->created_at ? $user->created_at->format('H:i') : '' }}</small>
												</td>
												<td class="text-right">
													<button type="button" class="btn-action-icon text-warning" data-toggle="modal" data-target="#modalSenha{{ $user->id }}" title="Alterar Senha">
														<i class="fa fa-key"></i>
													</button>
													<button type="button" class="btn-action-icon text-primary" data-toggle="modal" data-target="#modalEditar{{ $user->id }}" title="Editar Usuário">
														<i class="fa fa-pencil"></i>
													</button>
													@if($user->id != Auth::id())
													<button type="button" class="btn-action-icon text-danger" data-toggle="modal" data-target="#modalExcluir{{ $user->id }}" title="Excluir Usuário">
														<i class="fa fa-trash"></i>
													</button>
													@endif

													<!-- Modal Alterar Senha -->
													<div class="modal fade text-left" id="modalSenha{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
														<div class="modal-dialog modal-dialog-centered" role="document">
															<div class="modal-content style2" style="border-radius: 12px;">
																<form method="POST" action="{{ route('painel.usuarios.senha', $user->id) }}">
																	@csrf
																	<div class="modal-header">
																		<h5 class="modal-title font-weight-bold"><i class="fa fa-key text-warning mr-2"></i> Alterar Senha: {{ $user->name }}</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
																	</div>
																	<div class="modal-body">
																		<p class="text-muted small mb-3">Defina a nova senha de acesso para este usuário:</p>
																		<div class="form-group mb-3">
																			<label class="font-weight-600 small">Nova Senha</label>
																			<input type="password" name="password" class="form-control-custom w-100" placeholder="Mínimo de 6 caracteres" required>
																		</div>
																		<div class="form-group mb-0">
																			<label class="font-weight-600 small">Confirmar Nova Senha</label>
																			<input type="password" name="password_confirmation" class="form-control-custom w-100" placeholder="Repita a nova senha" required>
																		</div>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
																		<button type="submit" class="btn-green">Salvar Nova Senha</button>
																	</div>
																</form>
															</div>
														</div>
													</div>

													<!-- Modal Editar Usuário -->
													<div class="modal fade text-left" id="modalEditar{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
														<div class="modal-dialog modal-dialog-centered" role="document">
															<div class="modal-content style2" style="border-radius: 12px;">
																<form method="POST" action="{{ route('painel.usuarios.salvar') }}">
																	@csrf
																	<input type="hidden" name="id" value="{{ $user->id }}">
																	<div class="modal-header">
																		<h5 class="modal-title font-weight-bold"><i class="fa fa-pencil text-primary mr-2"></i> Editar Usuário: {{ $user->name }}</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
																	</div>
																	<div class="modal-body">
																		<div class="form-group mb-3">
																			<label class="font-weight-600 small">Nome Completo</label>
																			<input type="text" name="name" value="{{ $user->name }}" class="form-control-custom w-100" required>
																		</div>
																		<div class="form-group mb-3">
																			<label class="font-weight-600 small">E-mail de Acesso</label>
																			<input type="email" name="email" value="{{ $user->email }}" class="form-control-custom w-100" required>
																		</div>
																		<div class="form-group mb-3">
																			<label class="font-weight-600 small">Perfil de Acesso</label>
																			<select name="perfil_id" class="form-control-custom w-100" required>
																				@foreach($perfis as $p)
																					<option value="{{ $p->id }}" {{ $user->perfil_id == $p->id ? 'selected' : '' }}>{{ $p->nome }}</option>
																				@endforeach
																			</select>
																		</div>
																		<div class="form-group mb-0">
																			<label class="font-weight-600 small">Vínculo / Imobiliária Anunciante <span class="text-danger">*</span></label>
																			<select name="anunciante_id" class="form-control-custom w-100">
																				<option value="">Selecione a imobiliária (ou Sem vínculo para Admin)</option>
																				@foreach($anunciantes as $anunciante)
																					<option value="{{ $anunciante->id }}" {{ $user->anunciante_id == $anunciante->id ? 'selected' : '' }}>{{ $anunciante->nome }}</option>
																				@endforeach
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

													<!-- Modal Excluir Usuário -->
													<div class="modal fade text-left" id="modalExcluir{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
														<div class="modal-dialog modal-dialog-centered" role="document">
															<div class="modal-content style2" style="border-radius: 12px;">
																<form method="POST" action="{{ route('painel.usuarios.excluir', $user->id) }}">
																	@csrf
																	@method('DELETE')
																	<div class="modal-header">
																		<h5 class="modal-title font-weight-bold text-danger"><i class="fa fa-exclamation-triangle mr-2"></i> Confirmar Exclusão</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
																	</div>
																	<div class="modal-body">
																		<p class="mb-0">Tem certeza que deseja excluir o usuário <strong>{{ $user->name }}</strong> ({{ $user->email }})?</p>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
																		<button type="submit" class="btn btn-danger font-weight-600 px-4" style="border-radius: 8px;">Excluir</button>
																	</div>
																</form>
															</div>
														</div>
													</div>

												</td>
											</tr>
											@empty
											<tr>
												<td colspan="5" class="text-center py-5 text-muted">
													Nenhum usuário encontrado.
												</td>
											</tr>
											@endforelse
										</tbody>
									</table>
								</div>

								<div class="d-flex flex-wrap align-items-center justify-content-between p-3 border-top" style="background-color: #ffffff;">
									<div class="pagination-custom">
										{{ $usuarios->appends(request()->query())->links() }}
									</div>
									<div class="text-muted small">
										Mostrando {{ $usuarios->firstItem() ?? 0 }} a {{ $usuarios->lastItem() ?? 0 }} de {{ $usuarios->total() }} usuários
									</div>
								</div>

							</div>
						</div>

					</div>

					<!-- Modal Novo Usuário -->
					<div class="modal fade text-left" id="modalNovoUsuario" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content style2" style="border-radius: 12px;">
																<form method="POST" action="{{ route('painel.usuarios.salvar') }}">
																	@csrf
																	<div class="modal-header">
																		<h5 class="modal-title font-weight-bold"><i class="fa fa-user-plus text-success mr-2"></i> Cadastrar Novo Usuário</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
																	</div>
																	<div class="modal-body">
																		<div class="form-group mb-3">
																			<label class="font-weight-600 small">Nome Completo</label>
																			<input type="text" name="name" class="form-control-custom w-100" placeholder="Ex: João da Silva" required>
																		</div>
																		<div class="form-group mb-3">
																			<label class="font-weight-600 small">E-mail de Acesso</label>
																			<input type="email" name="email" class="form-control-custom w-100" placeholder="exemplo@imobiliaria.com.br" required>
																		</div>
																		<div class="form-group mb-3">
																			<label class="font-weight-600 small">Senha Inicial</label>
																			<input type="password" name="password" class="form-control-custom w-100" placeholder="Mínimo de 6 caracteres" required>
																		</div>
																		<div class="form-group mb-3">
																			<label class="font-weight-600 small">Perfil de Acesso</label>
																			<select name="perfil_id" class="form-control-custom w-100" required>
																				@foreach($perfis as $p)
																					<option value="{{ $p->id }}" {{ $p->id == 2 ? 'selected' : '' }}>{{ $p->nome }}</option>
																				@endforeach
																			</select>
																		</div>
																		<div class="form-group mb-0">
																			<label class="font-weight-600 small">Vínculo / Imobiliária Anunciante <span class="text-danger">*</span></label>
																			<select name="anunciante_id" class="form-control-custom w-100">
																				<option value="">Selecione a imobiliária (ou Sem vínculo para Admin)</option>
																				@foreach($anunciantes as $anunciante)
																					<option value="{{ $anunciante->id }}">{{ $anunciante->nome }}</option>
																				@endforeach
																			</select>
																		</div>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
																		<button type="submit" class="btn-green">Cadastrar Usuário</button>
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

	<a class="scrollToHome" href="#"><i class="flaticon-arrows"></i></a>
</div>

<script type="text/javascript" src="{{ asset('assets/portal/js/jquery-3.3.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/dashboard-script.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/script.js') }}"></script>

<script>
function atualizarRequisitoImobiliaria(selectPerfil) {
	var modal = $(selectPerfil).closest('.modal');
	var selectAnunciante = modal.find('select[name="anunciante_id"]');
	var perfilId = $(selectPerfil).val();

	if (perfilId != 1) { // Imobiliária / Corretor
		selectAnunciante.attr('required', true);
		selectAnunciante.find('option[value=""]').prop('disabled', true);
		if (!selectAnunciante.val() || selectAnunciante.val() == '') {
			selectAnunciante.css('border-color', '#dc2626');
		} else {
			selectAnunciante.css('border-color', '#e2e8f0');
		}
	} else { // Administrador Geral
		selectAnunciante.removeAttr('required');
		selectAnunciante.find('option[value=""]').prop('disabled', false);
		selectAnunciante.css('border-color', '#e2e8f0');
	}
}

$(document).ready(function() {
	$(document).on('change', 'select[name="perfil_id"]', function() {
		atualizarRequisitoImobiliaria(this);
	});

	$(document).on('change', 'select[name="anunciante_id"]', function() {
		var modal = $(this).closest('.modal');
		var perfilId = modal.find('select[name="perfil_id"]').val();
		if (perfilId != 1 && $(this).val()) {
			$(this).css('border-color', '#e2e8f0');
		}
	});

	$('.modal').on('shown.bs.modal', function() {
		var selectPerfil = $(this).find('select[name="perfil_id"]');
		if (selectPerfil.length) {
			atualizarRequisitoImobiliaria(selectPerfil);
		}
	});
});
</script>
</body>
</html>
