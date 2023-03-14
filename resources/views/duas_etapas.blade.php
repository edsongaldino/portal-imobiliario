@extends('layouts.login')
@section('conteudo')
<!--begin::Body-->
<div class="d-flex flex-column flex-lg-row-fluid py-10">
	<!--begin::Content-->
	<div class="d-flex flex-center flex-column flex-column-fluid">
		<!--begin::Wrapper-->
		<div class="w-lg-600px p-10 p-lg-15 mx-auto">
			<!--begin::Form-->
			<form class="form w-100 mb-10" novalidate="novalidate" id="kt_sing_in_two_steps_form">
				<!--begin::Icon-->
				<div class="text-center mb-10">
					<img alt="Logo" class="mh-125px" src="{{ asset('assets/media/svg/misc/smartphone.svg') }}" />
				</div>
				<!--end::Icon-->
				<!--begin::Heading-->
				<div class="text-center mb-10">
					<!--begin::Title-->
					<h1 class="text-dark mb-3">Verificação em 2 etapas</h1>
					<!--end::Title-->
					<!--begin::Sub-title-->
					<div class="text-muted fw-bold fs-5 mb-5">Insira o código que enviamos no seu celular</div>
					<!--end::Sub-title-->
					<!--begin::Mobile no-->
					<div class="fw-bolder text-dark fs-3">******7859</div>
					<!--end::Mobile no-->
				</div>
				<!--end::Heading-->
				<!--begin::Section-->
				<div class="mb-10 px-md-10">
					<!--begin::Label-->
					<div class="fw-bolder text-start text-dark fs-6 mb-1 ms-1">Digite seu código de 6 dígitos</div>
					<!--end::Label-->
					<!--begin::Input group-->
					<div class="d-flex flex-wrap flex-stack">
						<input type="text" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="3" />
						<input type="text" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="0" />
						<input type="text" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="7" />
						<input type="text" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="" />
						<input type="text" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="" />
						<input type="text" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control form-control-solid h-60px w-60px fs-2qx text-center border-primary border-hover mx-1 my-2" value="" />
					</div>
					<!--begin::Input group-->
				</div>
				<!--end::Section-->
				<!--begin::Submit-->
				<div class="d-flex flex-center">
					<button type="button" id="kt_sing_in_two_steps_submit" class="btn btn-lg btn-primary fw-bolder">
						<span class="indicator-label">Submit</span>
						<span class="indicator-progress">Please wait...
						<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
					</button>
				</div>
				<!--end::Submit-->
			</form>
			<!--end::Form-->
			<!--begin::Notice-->
			<div class="text-center fw-bold fs-5">
				<span class="text-muted me-1">Didn’t get the code ?</span>
				<a href="#" class="link-primary fw-bolder fs-5 me-1">Resend</a>
				<span class="text-muted me-1">or</span>
				<a href="#" class="link-primary fw-bolder fs-5">Call Us</a>
			</div>
			<!--end::Notice-->
		</div>
		<!--end::Wrapper-->
	</div>
	<!--end::Content-->
	@include('includes/login/footer')
</div>
<!--end::Body-->
</div>
<!--end::Authentication - Two-stes-->
</div>
<!--end::Main-->
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('assets/js/custom/authentication/sign-in/two-steps.js') }}"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
@endsection			