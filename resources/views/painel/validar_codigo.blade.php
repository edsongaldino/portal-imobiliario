@extends('layouts.login')
@section('conteudo')
<!--begin::Body-->
<div class="d-flex flex-column flex-lg-row-fluid py-10">
	<!--begin::Content-->
	<div class="d-flex flex-center flex-column flex-column-fluid">
		<!--begin::Wrapper-->
		<div class="w-lg-500px p-10 p-lg-15 mx-auto">
			<!--begin::Form-->
			<form class="form w-100" method="POST" id="kt_validar_codigo_form" action="{{ url('/validar-codigo') }}">
                @csrf
				<input type="hidden" name="email" value="{{ $email }}">
				<!--begin::Heading-->
				<div class="text-center mb-10">
					<!--begin::Title-->
					<h1 class="text-dark mb-3">Verificação de Segurança</h1>
					<!--end::Title-->
					<!--begin::Link-->
					<div class="text-gray-400 fw-bold fs-4">Insira o código de 6 dígitos enviado para o e-mail: <br> <strong>{{ $email_decoded }}</strong></div>
					<!--end::Link-->
				</div>
				<!--begin::Heading-->

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

				<!--begin::Input group-->
				<div class="fv-row mb-10">
					<label class="form-label fw-bolder text-gray-900 fs-6">Código de Confirmação</label>
					<input class="form-control form-control-solid text-center" style="font-size: 24px; letter-spacing: 5px;" type="text" placeholder="000000" id="codigo" name="codigo" autocomplete="off" maxlength="6" required />
				</div>
				<!--end::Input group-->
				<!--begin::Actions-->
				<div class="d-flex flex-wrap justify-content-center pb-lg-0">
					<button type="submit" id="kt_validar_codigo_submit" class="btn btn-lg btn-primary fw-bolder me-4">
						<span class="indicator-label">Validar Código</span>
					</button>
					<a href="{{ url('login') }}" class="btn btn-lg btn-light-primary fw-bolder">Cancelar</a>
				</div>
				<!--end::Actions-->
			</form>
			<!--end::Form-->
		</div>
		<!--end::Wrapper-->
	</div>
	<!--end::Content-->
	@include('includes/login/footer')
</div>
<!--end::Body-->
</div>
<!--end::Authentication - Password reset-->
</div>
<!--end::Main-->
<script>var hostUrl = "assets/";</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('assets/js/custom/authentication/password-reset/password-reset.js') }}"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
@endsection
