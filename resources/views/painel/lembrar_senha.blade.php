@extends('layouts.login')
@section('conteudo')
<!--begin::Body-->
<div class="d-flex flex-column flex-lg-row-fluid py-10">
	<!--begin::Content-->
	<div class="d-flex flex-center flex-column flex-column-fluid">
		<!--begin::Wrapper-->
		<div class="w-lg-500px p-10 p-lg-15 mx-auto">
			<!--begin::Form-->
			<form class="form w-100" novalidate="novalidate" method="POST" id="kt_password_reset_form" action="{{ url('/reenviar-senha') }}">
                @csrf
				<!--begin::Heading-->
				<div class="text-center mb-10">
					<!--begin::Title-->
					<h1 class="text-dark mb-3">Esqueceu sua senha?</h1>
					<!--end::Title-->
					<!--begin::Link-->
					<div class="text-gray-400 fw-bold fs-4">Informe seu e-mail de cadastro para receber o link de redefinição.</div>
					<!--end::Link-->
				</div>
				<!--begin::Heading-->
				<!--begin::Input group-->
				<div class="fv-row mb-10">
					<label class="form-label fw-bolder text-gray-900 fs-6">Email</label>
					<input class="form-control form-control-solid" type="email" placeholder="" id="email" name="email" autocomplete="off" />
				</div>
				<!--end::Input group-->
				<!--begin::Actions-->
				<div class="d-flex flex-wrap justify-content-center pb-lg-0">
					<button type="button" id="kt_password_reset_submit" class="btn btn-lg btn-primary fw-bolder me-4">
						<span class="indicator-label">Redefinir senha</span>
						<span class="indicator-progress">Por favor, aguarde...
						<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
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
