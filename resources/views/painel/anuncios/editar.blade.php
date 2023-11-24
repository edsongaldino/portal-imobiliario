@extends('layouts.painel')
@section('conteudo')
<div class="row">

	<div class="col-lg-12 mb10">
		<div class="breadcrumb_content style2">
			<h2 class="breadcrumb_title">Editar anúncio</h2>
			<p>Preencha as informações abaixo:</p>
		</div>
	</div>

	<form class="form w-100" method="POST" id="formEditarAnuncio" action="{{ url('/editar-anuncio') }}">
     @csrf
		<div class="col-lg-12">

			<input type="hidden" name="id" value="{{ $anuncio->id }}">

			@include('painel.anuncios.form')

			<div class="col-xl-12">
				<div class="my_profile_setting_input">
					<button class="btn btn2 float-right" id="SalvarAnuncio">SALVAR ANÚNCIO</button>
				</div>
			</div>

		</div>
	</form>
</div>
@endsection
