@extends('layouts.painel')
@section('conteudo')
<div class="row">

	<div class="col-lg-12 mb10">
		<div class="breadcrumb_content style2">
			<h2 class="breadcrumb_title">Incluir novo anúncio</h2>
			<p>Preencha as informações abaixo:</p>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="my_dashboard_review">
			<div class="row">
                <div class="col-lg-4 col-xl-4">
					<div class="my_profile_setting_input ui_kit_select_search form-group">
						<label>Finalidade</label>
						<select class="selectpicker" data-live-search="true" data-width="100%">
							<option data-tokens="type1">Residencial</option>
							<option data-tokens="Type2">Comercial</option>
							<option data-tokens="Type3">Residencial/Comercial</option>
						</select>
					</div>
				</div>
				<div class="col-lg-4 col-xl-4">
					<div class="my_profile_setting_input ui_kit_select_search form-group">
						<label>Tipo</label>
						<select class="selectpicker" data-live-search="true" data-width="100%">
							<option data-tokens="Status1">Status1</option>
							<option data-tokens="Status2">Status2</option>
							<option data-tokens="Status3">Status3</option>
							<option data-tokens="Status4">Status4</option>
							<option data-tokens="Status5">Status5</option>
						</select>
					</div>
				</div>
                <div class="col-lg-4 col-xl-4">
					<div class="my_profile_setting_input ui_kit_select_search form-group">
						<label>Transação</label>
						<select class="selectpicker" data-live-search="true" data-width="100%">
							<option data-tokens="Status1">Venda</option>
							<option data-tokens="Status2">Locação</option>
							<option data-tokens="Status3">Venda/Locação</option>
						</select>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="my_profile_setting_input form-group">
						<label for="propertyTitle">Título</label>
						<input type="text" class="form-control" id="propertyTitle">
					</div>
				</div>
				<div class="col-lg-12">
					<div class="my_profile_setting_textarea">
						<label for="propertyDescription">Descrição</label>
						<textarea class="form-control" id="propertyDescription" rows="7"></textarea>
					</div>
				</div>
				<div class="col-lg-4 col-xl-4">
					<div class="my_profile_setting_input form-group">
						<label for="formGroupExamplePrice">Valor (Venda)</label>
						<input type="text" class="form-control" id="formGroupExamplePrice">
					</div>
				</div>
                <div class="col-lg-4 col-xl-4">
					<div class="my_profile_setting_input form-group">
						<label for="formGroupExamplePrice">Valor (Locação)</label>
						<input type="text" class="form-control" id="formGroupExamplePrice">
					</div>
				</div>
                <div class="col-lg-4 col-xl-4">
					<div class="my_profile_setting_input form-group">
						<label for="formGroupExamplePrice">Valor (Condomínio)</label>
						<input type="text" class="form-control" id="formGroupExamplePrice">
					</div>
				</div>
                <div class="col-lg-4 col-xl-4">
					<div class="my_profile_setting_input form-group">
						<label for="formGroupExamplePrice">Valor (IPTU)</label>
						<input type="text" class="form-control" id="formGroupExamplePrice">
					</div>
				</div>
				<div class="col-lg-4 col-xl-4">
					<div class="my_profile_setting_input form-group">
						<label for="formGroupExampleArea">Área Útil (M²)</label>
						<input type="text" class="form-control" id="formGroupExampleArea">
					</div>
				</div>
                <div class="col-lg-4 col-xl-4">
					<div class="my_profile_setting_input form-group">
						<label for="formGroupExampleArea">Área Total (M²)</label>
						<input type="text" class="form-control" id="formGroupExampleArea">
					</div>
				</div>

			</div>
		</div>
		<div class="my_dashboard_review mt30">
			<div class="row">
                <div class="col-lg-2 col-xl-2">
					<div class="my_profile_setting_input form-group">
						<label for="zipCode">CEP</label>
						<input type="text" class="form-control" id="zipCode">
					</div>
				</div>
				<div class="col-lg-8">
					<div class="my_profile_setting_input form-group">
						<label for="propertyAddress">Logradouro</label>
						<input type="text" class="form-control" id="propertyAddress">
					</div>
				</div>
                <div class="col-lg-2 col-xl-2">
					<div class="my_profile_setting_input form-group">
						<label for="neighborHood">Número</label>
						<input type="text" class="form-control" id="neighborHood">
					</div>
				</div>
                <div class="col-lg-4 col-xl-4">
					<div class="my_profile_setting_input form-group">
						<label for="neighborHood">Complemento</label>
						<input type="text" class="form-control" id="neighborHood">
					</div>
				</div>
				<div class="col-lg-4 col-xl-4">
					<div class="my_profile_setting_input form-group">
						<label for="propertyState">Bairro</label>
						<input type="text" class="form-control" id="propertyState">
					</div>
				</div>
				<div class="col-lg-4 col-xl-4">
					<div class="my_profile_setting_input ui_kit_select_search form-group">
						<label>Estado</label>
						<select class="selectpicker" data-live-search="true" data-width="100%">
							<option data-tokens="Turkey">Turkey</option>
							<option data-tokens="Iran">Iran</option>
							<option data-tokens="Iraq">Iraq</option>
							<option data-tokens="Spain">Spain</option>
							<option data-tokens="Greece">Greece</option>
							<option data-tokens="Portugal">Portugal</option>
						</select>
					</div>
				</div>
				<div class="col-lg-4 col-xl-4">
					<div class="my_profile_setting_input ui_kit_select_search form-group">
						<label>Cidade</label>
						<select class="selectpicker" data-live-search="true" data-width="100%">
							<option data-tokens="Turkey">Turkey</option>
							<option data-tokens="Iran">Iran</option>
							<option data-tokens="Iraq">Iraq</option>
							<option data-tokens="Spain">Spain</option>
							<option data-tokens="Greece">Greece</option>
							<option data-tokens="Portugal">Portugal</option>
						</select>
					</div>
				</div>
                <div class="col-lg-4 col-xl-4">
					<div class="my_profile_setting_input form-group">
						<label for="googleMapLat">Latitude (Google Maps)</label>
						<input type="text" class="form-control" id="googleMapLat">
					</div>
				</div>
				<div class="col-lg-4 col-xl-4">
					<div class="my_profile_setting_input form-group">
						<label for="googleMapLong">Longitude (Google Maps)</label>
						<input type="text" class="form-control" id="googleMapLong">
					</div>
				</div>
				<div class="col-lg-12">
					<div class="my_profile_setting_input form-group">
						<div class="h400 bdrs8" id="map-canvas"></div>
					</div>
				</div>

			</div>
		</div>
		<div class="my_dashboard_review mt30">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="mb30">Detalhes</h4>
				</div>
				<div class="col-lg-6 col-xl-4">
					<div class="my_profile_setting_input form-group">
						<label for="propertyId">ID Externo</label>
						<input type="text" class="form-control" id="propertyId">
					</div>
				</div>
				<div class="col-lg-6 col-xl-4">
					<div class="my_profile_setting_input form-group">
						<label for="propertyASize">Quartos</label>
						<input type="text" class="form-control" id="propertyASize">
					</div>
				</div>
				<div class="col-lg-6 col-xl-4">
					<div class="my_profile_setting_input form-group">
						<label for="sizePrefix">Suítes</label>
						<input type="text" class="form-control" id="sizePrefix">
					</div>
				</div>
				<div class="col-lg-6 col-xl-4">
					<div class="my_profile_setting_input form-group">
						<label for="landArea">Banheiros</label>
						<input type="text" class="form-control" id="landArea">
					</div>
				</div>
				<div class="col-lg-6 col-xl-4">
					<div class="my_profile_setting_input form-group">
						<label for="LASPostfix">Vagas de Garagem</label>
						<input type="text" class="form-control" id="LASPostfix">
					</div>
				</div>
				<div class="col-lg-6 col-xl-4">
					<div class="my_profile_setting_input form-group">
						<label for="bedRooms">Ano de Construção</label>
						<input type="text" class="form-control" id="bedRooms">
					</div>
				</div>
				<div class="col-lg-6 col-xl-4">
					<div class="my_profile_setting_input form-group">
						<label for="bathRooms">Quantidade de Torres</label>
						<input type="text" class="form-control" id="bathRooms">
					</div>
				</div>
				<div class="col-lg-6 col-xl-4">
					<div class="my_profile_setting_input form-group">
						<label for="garages">Possui Elevador?</label>
						<input type="text" class="form-control" id="garages">
					</div>
				</div>
				<div class="col-lg-6 col-xl-4">
					<div class="my_profile_setting_input form-group">
						<label for="garagesSize">Andar</label>
						<input type="text" class="form-control" id="garagesSize">
					</div>
				</div>
				<div class="col-lg-6 col-xl-4">
					<div class="my_profile_setting_input form-group">
						<label for="videoUrl">Video URL</label>
						<input type="text" class="form-control" id="videoUrl">
					</div>
				</div>
				<div class="col-lg-6 col-xl-4">
					<div class="my_profile_setting_input form-group">
						<label for="virtualTour">Tour Virtual 360° </label>
						<input type="text" class="form-control" id="virtualTour">
					</div>
				</div>
				<div class="col-xl-12">
					<h4>Características</h4>
				</div>
				<div class="col-sm-4 col-md-4 col-lg-4 col-xl-2">
					<ul class="ui_kit_checkbox selectable-list">
						<li>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck1">
								<label class="custom-control-label" for="customCheck1">Air Conditioning</label>
							</div>
						</li>
						<li>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck2">
								<label class="custom-control-label" for="customCheck2">Lawn</label>
							</div>
						</li>
						<li>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck3">
								<label class="custom-control-label" for="customCheck3">Swimming Pool</label>
							</div>
						</li>
						<li>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck4">
								<label class="custom-control-label" for="customCheck4">Barbeque</label>
							</div>
						</li>
						<li>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck5">
								<label class="custom-control-label" for="customCheck5">Microwave</label>
							</div>
						</li>
					</ul>
				</div>
				<div class="col-sm-4 col-md-4 col-lg-4 col-xl-2">
					<ul class="ui_kit_checkbox selectable-list">
						<li>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck6">
								<label class="custom-control-label" for="customCheck6">TV Cable</label>
							</div>
						</li>
						<li>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck7">
								<label class="custom-control-label" for="customCheck7">Dryer</label>
							</div>
						</li>
						<li>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck8">
								<label class="custom-control-label" for="customCheck8">Outdoor Shower</label>
							</div>
						</li>
						<li>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck9">
								<label class="custom-control-label" for="customCheck9">Washer</label>
							</div>
						</li>
						<li>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck10">
								<label class="custom-control-label" for="customCheck10">Gym</label>
							</div>
						</li>
					</ul>
				</div>
				<div class="col-sm-4 col-md-4 col-lg-4 col-xl-2">
					<ul class="ui_kit_checkbox selectable-list">
						<li>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck11">
								<label class="custom-control-label" for="customCheck11">Refrigerator</label>
							</div>
						</li>
						<li>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck12">
								<label class="custom-control-label" for="customCheck12">WiFi</label>
							</div>
						</li>
						<li>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck13">
								<label class="custom-control-label" for="customCheck13">Laundry</label>
							</div>
						</li>
						<li>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck14">
								<label class="custom-control-label" for="customCheck14">Sauna</label>
							</div>
						</li>
						<li>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck15">
								<label class="custom-control-label" for="customCheck15">Window Coverings</label>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="my_dashboard_review mt30">
			<div class="row">
				<div class="col-lg-12">
					<h4 class="mb30">Fotos</h4>
				</div>
				<div class="col-lg-12">
					<ul class="mb0">
						<li class="list-inline-item">
							<div class="portfolio_item">
								<img class="img-fluid" src="images/property/fp1.jpg" alt="fp1.jpg">
								<div class="edu_stats_list" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><a href="#"><span class="flaticon-garbage"></span></a></div>
							</div>
						</li>
						<li class="list-inline-item">
							<div class="portfolio_item">
								<img class="img-fluid" src="images/property/fp2.jpg" alt="fp2.jpg">
								<div class="edu_stats_list" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><a href="#"><span class="flaticon-garbage"></span></a></div>
							</div>
						</li>
						<li class="list-inline-item">
							<div class="portfolio_item">
								<img class="img-fluid" src="images/property/fp3.jpg" alt="fp3.jpg">
								<div class="edu_stats_list" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><a href="#"><span class="flaticon-garbage"></span></a></div>
							</div>
						</li>
					</ul>
				</div>
				<div class="col-lg-12">
					<div class="portfolio_upload">
						<input type="file" name="myfile" />
						<div class="icon"><span class="flaticon-download"></span></div>
						<p>Drag and drop images here</p>
					</div>
				</div>
				<div class="col-xl-12">
					<div class="my_profile_setting_input">
						<button class="btn btn2 float-right">SALVAR ANÚNCIO</button>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection
