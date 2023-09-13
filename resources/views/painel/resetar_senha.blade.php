@extends('layouts.login')
@section('conteudo')
<!--begin::Body-->
<div class="d-flex flex-column flex-lg-row-fluid py-10">
	<!--begin::Content-->
	<div class="d-flex flex-center flex-column flex-column-fluid">
		<!--begin::Wrapper-->
		<div class="w-lg-550px p-10 p-lg-15 mx-auto">
			<!--begin::Form-->
			<form class="form w-100" novalidate="novalidate" id="kt_new_password_form" method="POST" action="{{ url('/alterar-senha') }}">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ base64_encode($user->id) }}">
				<!--begin::Heading-->
				<div class="text-center mb-10">
					<!--begin::Title-->
					<h1 class="text-dark mb-3">Olá, {{ $user->name }}</h1>
					<!--end::Title-->
					<!--begin::Link-->
					<div class="text-gray-400 fw-bold fs-4">Vamos alterar sua senha?
					<a href="#" class="link-primary fw-bolder">Insira abaixo sua senha nova</a></div>
					<!--end::Link-->
				</div>
				<!--begin::Heading-->
				<!--begin::Input group-->
				<div class="mb-10 fv-row" data-kt-password-meter="true">
					<!--begin::Wrapper-->
					<div class="mb-1">
						<!--begin::Label-->
						<label class="form-label fw-bolder text-dark fs-6">Senha</label>
						<!--end::Label-->
						<!--begin::Input wrapper-->
						<div class="position-relative mb-3">
							<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
							<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
								<i class="bi bi-eye-slash fs-2"></i>
								<i class="bi bi-eye fs-2 d-none"></i>
							</span>
						</div>
						<!--end::Input wrapper-->
						<!--begin::Meter-->
						<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
							<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
							<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
							<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
							<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
						</div>
						<!--end::Meter-->
					</div>
					<!--end::Wrapper-->
					<!--begin::Hint-->
					<div class="text-muted">Até 8 caracteres com letras, números &amp; símbolos.</div>
					<!--end::Hint-->
				</div>
				<!--end::Input group=-->
				<!--begin::Input group=-->
				<div class="fv-row mb-10">
					<label class="form-label fw-bolder text-dark fs-6">Confirme sua nova senha</label>
					<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm-password" autocomplete="off" />
				</div>
				<!--end::Input group=-->
				<!--begin::Action-->
				<div class="text-center">
					<button type="button" id="kt_new_password_submit" class="btn btn-lg btn-primary fw-bolder">
						<span class="indicator-label">Alterar</span>
						<span class="indicator-progress">Por favor, aguarde...
						<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
					</button>
				</div>
				<!--end::Action-->
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
<!--end::Authentication - New password-->
</div>
<!--end::Main-->
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('assets/js/custom/authentication/password-reset/new-password.js') }}"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
@endsection
