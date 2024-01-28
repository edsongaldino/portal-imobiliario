<!DOCTYPE html>
<html dir="ltr" lang="pt-br">
<head>
	@include('includes.painel.head')
</head>
<body>
<div class="wrapper">
	<div class="preloader"></div>

	@include('includes.painel.menu')

	<!-- Our Dashbord -->
	<section class="our-dashbord dashbord bgc-f7 pb50">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
				<div class="col-lg-9 col-xl-10 maxw100flex-992">
					<div class="row">
                        <form class="form" id="FormPerfil" name="FormPerfil" method="POST" action="/painel/perfil-salvar" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $anunciante->id ?? '' }}">
						<div class="col-lg-12 mb10">
							<div class="breadcrumb_content style2">
								<h2 class="breadcrumb_title">Meu perfil</h2>
								<p>Gerencie as informações da sua empresa aqui</p>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="my_dashboard_review">
								<div class="row">
									<div class="col-xl-2">
										<h4>Informações da {{ $usuario->perfil->nome }}</h4>
									</div>
									<div class="col-xl-10">
										<div class="row">
											<div class="col-lg-12">
												<input type="hidden" name="logo_old" id="logo_old" value="{{ $anunciante->logo ?? '' }}" />
                                                <div class="logo-atual">
                                                    <img src="{{ url('anunciante/'.$anunciante->id.'/logo') }}" alt="">
                                                </div>
												<div class="wrap-custom-file" style="background-image: url(/assets/painel/images/logo-anunciante.jpg) !important;">
												    <input type="file" name="logo" id="logo" accept=".gif, .jpg, .png"/>
												    <label for="logo">
												      	<span><i class="flaticon-download"></i> Upload Logo</span>
												    </label>
												</div>
												<p>*Resolução Padrão 260px x 260px</p>
											</div>
											<div class="col-lg-4 col-xl-4">
												<div class="my_profile_setting_input form-group">
											    	<label for="formGroupExampleInput1">CNPJ</label>
											    	<input type="text" class="form-control cnpj" id="cnpj" name="cnpj" placeholder="alitfn" value="{{ $anunciante->cnpj ?? '' }}">
												</div>
											</div>
											<div class="col-lg-8 col-xl-8">
												<div class="my_profile_setting_input form-group">
											    	<label for="razao_social">Nome / Razão Social</label>
											    	<input type="text" class="form-control" name="razao_social" id="razao_social" placeholder="" value="{{ $anunciante->razao_social ?? '' }}">
												</div>
											</div>
											<div class="col-lg-9 col-xl-9">
												<div class="my_profile_setting_input form-group">
											    	<label for="nome">Nome Fantasia</label>
											    	<input type="text" class="form-control" name="nome" id="nome" value="{{ $anunciante->nome ?? '' }}">
												</div>
											</div>
											<div class="col-lg-3 col-xl-3">
												<div class="my_profile_setting_input form-group">
											    	<label for="creci">Creci</label>
											    	<input type="text" class="form-control" name="creci" id="creci" value="{{ $anunciante->creci ?? '' }}">
												</div>
											</div>
											<div class="col-lg-3 col-xl-3">
												<div class="my_profile_setting_input form-group">
											    	<label for="inscricao_estadual">Inscrição Estadual</label>
											    	<input type="text" class="form-control" name="inscricao_estadual" id="inscricao_estadual" value="{{ $anunciante->inscricao_estadual ?? '' }}">
												</div>
											</div>
											<div class="col-lg-3 col-xl-3">
												<div class="my_profile_setting_input form-group">
											    	<label for="inscricao_municipal">Inscrição Municipal</label>
											    	<input type="text" class="form-control" name="inscricao_municipal" id="inscricao_municipal" value="{{ $anunciante->inscricao_municipal ?? '' }}">
												</div>
											</div>
											<div class="col-lg-6 col-xl-6">
												<div class="my_profile_setting_input form-group">
											    	<label for="site">Site</label>
											    	<input type="text" class="form-control" name="site" id="site" value="{{ $anunciante->site ?? '' }}">
												</div>
											</div>
											<div class="col-lg-3 col-xl-3">
												<div class="my_profile_setting_input form-group">
											    	<label for="telefone_comercial">Telefone Comercial</label>
											    	<input type="text" class="form-control phone" name="telefone_comercial" id="telefone_comercial" value="{{ $anunciante->telefone_comercial ?? '' }}">
												</div>
											</div>
											<div class="col-lg-3 col-xl-3">
												<div class="my_profile_setting_input form-group">
											    	<label for="whatsapp">Whatsapp Comercial</label>
											    	<input type="text" class="form-control phone" name="whatsapp" id="whatsapp" value="{{ $anunciante->whatsapp ?? '' }}">
												</div>
											</div>
											<div class="col-lg-6 col-xl-6">
												<div class="my_profile_setting_input form-group">
											    	<label for="email">E-mail Comercial (Recebimento de Leads)</label>
											    	<input type="text" class="form-control" name="email" id="email" value="{{ $anunciante->email ?? '' }}">
												</div>
											</div>
                                            <input type="hidden" name="endereco_id" id="endereco_id" value="{{ $anunciante->endereco_id ?? '' }}">
											<div class="col-lg-3 col-xl-3">
												<div class="my_profile_setting_input form-group">
											    	<label for="cep">CEP</label>
											    	<input type="text" class="form-control cep" name="cep_endereco" id="cep_endereco" value="{{ $anunciante->endereco->cep_endereco ?? '' }}">
												</div>
											</div>
											<div class="col-lg-6 col-xl-6">
												<div class="my_profile_setting_input form-group">
											    	<label for="logradouro">Logradouro</label>
											    	<input type="text" class="form-control" name="logradouro_endereco" id="logradouro_endereco" value="{{ $anunciante->endereco->logradouro_endereco ?? '' }}">
												</div>
											</div>

                                            <div class="col-xl-3">
												<div class="my_profile_setting_input form-group">
											    	<label for="numero">Número</label>
											    	<input type="text" class="form-control" name="numero_endereco" id="numero_endereco" value="{{ $anunciante->endereco->numero_endereco ?? '' }}">
												</div>
											</div>

                                            <div class="col-xl-3">
												<div class="my_profile_setting_input form-group">
											    	<label for="complemento">Complemento</label>
											    	<input type="text" class="form-control" name="complemento_endereco" id="complemento_endereco" value="{{ $anunciante->endereco->complemento_endereco ?? '' }}">
												</div>
											</div>

                                            <div class="col-xl-4">
												<div class="my_profile_setting_input form-group">
											    	<label for="bairro">Bairro</label>
											    	<input type="text" class="form-control" name="bairro_endereco" id="bairro_endereco" value="{{ $anunciante->endereco->bairro_endereco ?? '' }}">
												</div>
											</div>

                                            <div class="col-lg-5 col-xl-5">
                                                <div class="my_profile_setting_input ui_kit_select_search form-group">
                                                    <label>Cidade / UF</label>
                                                    <input type="hidden" name="cidade_old" value="{{ $anunciante->endereco->cidade_id ?? '' }}">
                                                    <select class="selectpicker" name="cidade_endereco" id="cidade_endereco" data-live-search="true" data-width="100%">
                                                        <option label="Selecione a cidade"></option>
                                                        @foreach ($cidades as $cidade)
                                                        <option value="{{ $cidade->id }}" @if(($cidade->id ?? '') == ($anunciante->endereco->cidade_id ?? '')) selected @endif>{{ $cidade->nome_cidade }} - ({{ $cidade->estado->uf_estado }})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

											<div class="col-xl-12">
												<div class="my_profile_setting_textarea">
												    <label for="exampleFormControlTextarea1">Descrição</label>
												    <textarea class="form-control" name="descricao" id="exampleFormControlTextarea1" rows="7">{{ $anunciante->descricao ?? '' }}</textarea>
												</div>
											</div>

                                            <div class="col-xl-12 text-right">
												<div class="my_profile_setting_input">
													<button type="submit" id="EnviarFormPerfil" class="btn btn2">Salvar Informações da {{ Auth::user()->perfil->nome }}</button>
												</div>
											</div>

										</div>
									</div>
								</div>
                            </form>
							</div>

                            <form class="form" id="FormDadosAcesso" name="FormDadosAcesso" method="POST" action="{{ route('dados-acesso.salvar') }}" enctype="multipart/form-data">
                            @csrf
							<div class="my_dashboard_review mt30">
                                <input type="hidden" name="id" value="{{ $usuario->id ?? '' }}">
                                <input type="hidden" name="nome" value="{{ $usuario->name ?? '' }}">
                                <input type="hidden" name="perfil_id" value="{{ $usuario->perfil_id ?? '' }}">
                                <input type="hidden" name="senha_antiga" value="{{ $usuario->password ?? '' }}">
								<div class="row">
									<div class="col-xl-2">
										<h4>Dados de Acesso</h4>
									</div>
									<div class="col-xl-10">
										<div class="row">
                                            <div class="col-lg-6 col-xl-6">
												<div class="my_profile_setting_input form-group">
											    	<label for="email">E-mail</label>
											    	<input type="text" class="form-control" name="email" id="email" value="{{ $usuario->email ?? '' }}" readonly>
												</div>
											</div>
											<div class="col-xl-6">
												<div class="my_profile_setting_input form-group">
											    	<label for="senha_atual">Senha Atual</label>
											    	<input type="password" class="form-control" name="senha_atual" id="senha_atual">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6 col-xl-6">
												<div class="my_profile_setting_input form-group">
											    	<label for="password">Nova Senha</label>
											    	<input type="password" class="form-control" name="password" id="password">
												</div>
											</div>
											<div class="col-lg-6 col-xl-6">
												<div class="my_profile_setting_input form-group">
											    	<label for="password2">Confirme a Nova Senha</label>
											    	<input type="password" class="form-control" name="password2" id="password2">
												</div>
											</div>
											<div class="col-xl-12">
												<div class="my_profile_setting_input float-right fn-520">
													<button id="EnviarFormDados" type="submit" class="btn btn3 btn-dark">Salvar Informações de Acesso</button>
												</div>
											</div>
										</div>
									</div>
								</div>
                            </form>
							</div>
						</div>

					</div>
					<div class="row mt10">
						<div class="col-lg-12">
							<div class="copyright-widget text-center">
								<p>© @php echo date('Y'); @endphp. Rede Imóveis MT</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



	<a class="scrollToHome" href="#"><i class="flaticon-arrows"></i></a>
</div>
<!-- Wrapper End -->
<script type="text/javascript" src="{{ asset('assets/portal/js/jquery-3.3.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/jquery-migrate-3.0.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/jquery.mmenu.all.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/ace-responsive-menu.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/chart.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/chart-custome.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/snackbar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/simplebar.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/parallax.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/scrollto.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/jquery-scrolltofixed-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/jquery.counterup.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/progressbar.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/slider.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/timepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/portal/js/dashboard-script.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/painel/js/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/global/js/jquery.maskMoney.js') }}"></script>

<script type="text/javascript" src="{{ asset('vendor/sweetalert/dist/sweetalert.min.js') }}" ></script>
@include('sweetalert::alert')

<!-- Custom script for all pages -->
<script type="text/javascript" src="{{ asset('assets/portal/js/script.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/global/js/cep.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/global/js/mascaras.js') }}"></script>

</body>
</html>
