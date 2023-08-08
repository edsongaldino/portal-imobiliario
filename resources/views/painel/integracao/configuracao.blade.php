@extends('layouts.painel')
@section('conteudo')
<div class="row">

	<div class="col-lg-12 mb10">
		<div class="breadcrumb_content style2">
			<h2 class="breadcrumb_title">Integrações / Configuração Geral</h2>
			<p>Configure as integrações disponíveis no portal</p>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="my_dashboard_review">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="mb30">Captação dos empreendimentos</h4>
				</div>
                <form class="form" id="FormIntegracao" name="FormIntegracao" method="POST" action="/painel/integracao-salvar" enctype="multipart/form-data">
                @csrf
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
                </form>
			</div>
		</div>

	</div>
</div>
@endsection
