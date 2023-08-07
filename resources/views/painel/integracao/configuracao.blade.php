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

                <div class="col-lg-6 col-xl-6">
					<div class="my_profile_setting_input ui_kit_select_search form-group">
						<label>Tipo</label>
						<select class="selectpicker" data-live-search="true" data-width="100%">
							<option data-tokens="XML" selected>XML</option>
						</select>
					</div>
				</div>

                <div class="col-lg-6 col-xl-6">
					<div class="my_profile_setting_input ui_kit_select_search form-group">
						<label>Tempo para Atualização (Automática)</label>
						<select class="selectpicker" data-live-search="true" data-width="100%">
							<option data-tokens="12">A cada 12h</option>
							<option data-tokens="24" selected>24h (Padrão)</option>
						</select>
					</div>
				</div>

				<div class="col-lg-8">
					<div class="my_profile_setting_textarea">
						<label for="propertyDescription">Link (Arquivo XML)</label>
						<input type="text" class="form-control" id="propertyTitle">
					</div>
				</div>


				<div class="col-lg-4 col-xl-4">
					<div class="my_profile_setting_input ui_kit_select_search form-group">
						<label>Notificar Erros?</label>
						<select class="selectpicker" data-live-search="true" data-width="100%">
							<option data-tokens="Sim">Sim</option>
							<option data-tokens="Não">Não</option>
						</select>
					</div>
				</div>


                <div class="col-xl-12 text-right">
                    <div class="my_profile_setting_input">
                        <button class="btn btn2">Salvar Configurações</button>
                    </div>
                </div>

			</div>
		</div>

	</div>
</div>
@endsection
