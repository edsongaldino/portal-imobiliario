<!DOCTYPE html>
<html lang="pt-br">
	<!--begin::Head-->
	<head>
		@include('includes/sistema/head')
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				@include('includes/sistema/menu')
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					@include('includes/sistema/topo')
					<!--end::Header-->

					<!--begin::Toolbar-->
					<div class="toolbar py-2" id="kt_toolbar">
						<!--begin::Container-->
						<div id="kt_toolbar_container" class="container-fluid d-flex align-items-center">
							<!--begin::Page title-->
							<div class="flex-grow-1 flex-shrink-0 me-5">
								<!--begin::Page title-->
								<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
									<!--begin::Title-->
									<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Navegação</h1>
									<!--end::Title-->
									<!--begin::Separator-->
									<span class="h-20px border-gray-200 border-start mx-3"></span>
									<!--end::Separator-->
									<!--begin::Breadcrumb-->
									<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
										<!--begin::Item-->
										<li class="breadcrumb-item text-muted">
											<a href="{{url('dashboard')}}" class="text-muted text-hover-primary">Home</a>
										</li>
										<!--end::Item-->

									</ul>
									<!--end::Breadcrumb-->
								</div>
								<!--end::Page title-->
							</div>
							<!--end::Page title-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Toolbar-->

					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Container-->
						<div id="kt_content_container" class="container-xxl">
							<!--begin::Card-->
							<div class="card">
								<!--begin::Card body-->
								<div class="card-body p-0">
									<!--begin::Wrapper-->
									<div class="card-px text-center py-20 my-10">
										<!--begin::Title-->
										<h2 class="fs-2x fw-bolder mb-10">Seja bem vindo!</h2>
										<!--end::Title-->
										<!--begin::Description-->
										<p class="text-gray-400 fs-4 fw-bold mb-10">Este é seu primeiro acesso ao portal, por favor complete seu cadastro.</p>
										<!--end::Description-->
										<!--begin::Action-->
										<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_customer">Completar cadastro</a>
										<!--end::Action-->
									</div>
									<!--end::Wrapper-->
									<!--begin::Illustration-->
									<div class="text-center px-4">
										<img class="mw-100 mh-300px" alt="" src="{{ asset('assets/media/illustrations/sketchy-1/2.png') }}" />
									</div>
									<!--end::Illustration-->
								</div>
								<!--end::Card body-->
							</div>
							<!--end::Card-->

						</div>
						<!--end::Container-->
					</div>
					<!--end::Content-->

					<!--begin::Footer-->
					@include('includes/sistema/footer')
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->	

		<!--begin::Scrolltop-->
		@include('includes/sistema/global/scroll')
		<!--end::Scrolltop-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		@include('includes/sistema/global/js')
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{ asset('assets/js/custom/apps/customers/add.js') }}"></script>
		<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
		<script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
		<script src="{{ asset('assets/js/custom/modals/create-app.js') }}"></script>
		<script src="{{ asset('assets/js/custom/modals/upgrade-plan.js') }}"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>