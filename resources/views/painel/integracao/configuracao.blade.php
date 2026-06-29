@extends('layouts.painel')
@section('conteudo')
<div class="row">

	<div class="col-lg-12 mb10">
		<div class="breadcrumb_content style2">
			<h2 class="breadcrumb_title">Integrações / Configuração Geral</h2>
			<p>Configure as integrações disponíveis no portal</p>
		</div>
	</div>
    <form class="form" id="FormIntegracao" name="FormIntegracao" method="POST" action="/painel/integracao-salvar" enctype="multipart/form-data">
    @csrf
	<div class="col-lg-12">
		<div class="my_dashboard_review">
			<div class="row">
				@if(isset($integracao) && $integracao->bloqueado)
				<div class="col-lg-12">
					<div class="alert alert-danger" role="alert" style="border-left: 5px solid #d9534f; background-color: #fdf7f7; color: #b94a48; padding: 20px; margin-bottom: 25px; border-radius: 4px;">
						<h4 class="alert-heading" style="color: #d9534f; font-weight: bold; margin-bottom: 10px;"><i class="fa fa-warning"></i> Integração Bloqueada!</h4>
						<p style="margin-bottom: 10px;">A importação automática de seus anúncios foi suspensa temporariamente porque ocorreu um erro no processamento do seu arquivo XML (ex: link inacessível ou formato inválido). Você pode verificar os detalhes nos relatórios de integração.</p>
						<hr style="border-top: 1px solid #ebccd1; margin: 15px 0;">
						<p class="mb0" style="margin-bottom: 0;"><strong>Como reativar:</strong> Corrija o link XML abaixo ou certifique-se de que ele está funcionando, e clique em <strong>Salvar Configurações</strong> para reativar as atualizações automáticas.</p>
					</div>
				</div>
				@endif
				<div class="col-lg-12">
					<h4 class="mb30">Captação dos empreendimentos</h4>
				</div>
                <input type="hidden" name="id" id="id" value="{{ $integracao->id ?? ''}}">
                <div class="col-lg-6 col-xl-6">
					<div class="my_profile_setting_input ui_kit_select_search form-group">
						<label>Tipo</label>
						<select id="tipo" name="tipo" class="selectpicker" data-live-search="true" data-width="100%" required>
							<option value="XML" selected>XML</option>
                            <option value="Json">Json</option>
                            <option value="Api">Api</option>
						</select>
					</div>
				</div>

                <div class="col-lg-6 col-xl-6">
					<div class="my_profile_setting_input ui_kit_select_search form-group">
						<label>Tempo para Atualização (Automática)</label>
						<select id="periodicidade_atualizacao" name="periodicidade_atualizacao" class="selectpicker" data-live-search="true" data-width="100%" required>
							<option value="12">A cada 12h</option>
							<option value="24" selected>24h (Padrão)</option>
                            <option value="48">A cada 48h</option>
						</select>
					</div>
				</div>

				<div class="col-lg-8">
					<div class="my_profile_setting_textarea">
						<label for="propertyDescription">Link (Arquivo XML)</label>
						<input type="text" class="form-control" id="url" name="url" value="{{ $integracao->url ?? ''}}" required>
					</div>
				</div>


				<div class="col-lg-4 col-xl-4">
					<div class="my_profile_setting_input ui_kit_select_search form-group">
						<label>Notificar Erros?</label>
						<select id="notificar" name="notificar" class="selectpicker" data-live-search="true" data-width="100%" required>
							<option value="Sim" selected>Sim</option>
							<option value="Não">Não</option>
						</select>
					</div>
				</div>


                <div class="col-xl-12 text-right">
                    <div class="my_profile_setting_input">
                        <button type="submit" class="btn btn2">Salvar Configurações</button>
                    </div>
                </div>

			</div>
		</div>
	</div>
    </form>
</div>
@endsection
