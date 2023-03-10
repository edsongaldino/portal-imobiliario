@extends('layouts.login')
@section('conteudo')
<!--begin::Body-->
<div class="d-flex flex-column flex-lg-row-fluid py-10">
	<!--begin::Content-->
	<div class="d-flex flex-center flex-column flex-column-fluid">
		<!--begin::Wrapper-->
		<div class="w-lg-500px p-10 p-lg-15 mx-auto">
			<!--begin::Form-->
			<form class="form w-100" novalidate="novalidate" id="kt_password_reset_form">
				<!--begin::Heading-->
				<div class="text-center mb-10">
					<!--begin::Title-->
					<h1 class="text-dark mb-3">Forgot Password ?</h1>
					<!--end::Title-->
					<!--begin::Link-->
					<div class="text-gray-400 fw-bold fs-4">Enter your email to reset your password.</div>
					<!--end::Link-->
				</div>
				<!--begin::Heading-->
				<!--begin::Input group-->
				<div class="fv-row mb-10">
					<label class="form-label fw-bolder text-gray-900 fs-6">Email</label>
					<input class="form-control form-control-solid" type="email" placeholder="" name="email" autocomplete="off" />
				</div>
				<!--end::Input group-->
				<!--begin::Actions-->
				<div class="d-flex flex-wrap justify-content-center pb-lg-0">
					<button type="button" id="kt_password_reset_submit" class="btn btn-lg btn-primary fw-bolder me-4">
						<span class="indicator-label">Submit</span>
						<span class="indicator-progress">Please wait...
						<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
					</button>
					<a href="{{ url('login') }}" class="btn btn-lg btn-light-primary fw-bolder">Cancel</a>
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
<script src="assets/plugins/global/plugins.bundle.js"></script>
<script src="assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="assets/js/custom/authentication/password-reset/password-reset.js"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
@endsection			