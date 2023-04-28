<div id="kt_aside" class="aside pb-5 pt-5 pt-lg-0" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'80px', '300px': '100px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Brand-->
    <div class="aside-logo py-8" id="kt_aside_logo">
        <!--begin::Logo-->
        <a href="{{url('/')}}" class="d-flex align-items-center">
            <img alt="Logo" src="{{ asset('assets/media/logos/logo.fw.png') }}" class="h-45px logo" />
        </a>
        <!--end::Logo-->
    </div>
    <!--end::Brand-->
    <!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid" id="kt_aside_menu">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-2 my-lg-5 pe-lg-n1" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="5px">
            <!--begin::Menu-->
            <div class="menu menu-column menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold" id="#kt_aside_menu" data-kt-menu="true">
                <div class="menu-item py-2">
                    <a class="menu-link menu-center" href="{{url('/')}}" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-house fs-2"></i>
                        </span>
                        <span class="menu-title">Home</span>
                    </a>
                </div>

                <div data-kt-menu-trigger="click" data-kt-menu-placement="right-start" class="menu-item py-2">
                    <span class="menu-link menu-center" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-people fs-2"></i>
                        </span>
                        <span class="menu-title">Perfil</span>
                    </span>
                    <div class="menu-sub menu-sub-dropdown w-225px px-1 py-4">
                        <div class="menu-item">
                            <div class="menu-content">
                                <span class="menu-section fs-5 fw-bolder ps-1 py-1">Minha conta</span>
                            </div>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{url('/')}}">
                                <span class="menu-bullet">
                                    <i class="bi bi-person-bounding-box"></i>
                                </span>
                                <span class="menu-title">Dados</span>
                            </a>
                            <a class="menu-link" href="{{url('/')}}">
                                <span class="menu-bullet">
                                    <i class="bi bi-rocket-takeoff"></i>
                                </span>
                                <span class="menu-title">Upgrade PRO</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item py-2">
                    <a class="menu-link menu-center" href="{{url('/')}}" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-chat-square-text fs-2"></i>
                        </span>
                        <span class="menu-title">Leads</span>
                    </a>
                </div>

                <div data-kt-menu-trigger="click" data-kt-menu-placement="right-start" class="menu-item here show py-2">
                    <span class="menu-link menu-center" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-house fs-2"></i>
                        </span>
                        <span class="menu-title">Imóveis</span>
                    </span>
                    <div class="menu-sub menu-sub-dropdown w-225px px-1 py-4">
                        <div class="menu-item">
                            <div class="menu-content">
                                <span class="menu-section fs-5 fw-bolder ps-1 py-1">Meus anúncios</span>
                            </div>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link active" href="{{url('/')}}">
                                <span class="menu-bullet">
                                    <i class="bi bi-building fs-3"></i>
                                </span>
                                <span class="menu-title">Listar anúncios</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{url('/')}}">
                                <span class="menu-bullet">
                                    <i class="bi bi-plus-square fs-3"></i>
                                </span>
                                <span class="menu-title">Incluir anúncio</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" data-kt-menu-placement="right-start" class="menu-item py-2">
                    <span class="menu-link menu-center" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-file-text fs-2"></i>
                        </span>
                        <span class="menu-title">Integrações</span>
                    </span>
                    <div class="menu-sub menu-sub-dropdown w-225px px-1 py-4">
                        <div class="menu-item">
                            <div class="menu-content">
                                <span class="menu-section fs-5 fw-bolder ps-1 py-1">API's Integradas</span>
                            </div>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{url('/')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Facilita</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{url('/')}}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Capys</span>
                            </a>
                        </div>
                        
                        
                    </div>
                </div>
                <div data-kt-menu-trigger="click" data-kt-menu-placement="right-start" class="menu-item py-2">
                    <span class="menu-link menu-center" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="bi bi-gear fs-2"></i>
                        </span>
                        <span class="menu-title">Ajustes</span>
                    </span>
                    <div class="menu-sub menu-sub-dropdown w-225px px-1 py-4">
                        <div class="menu-item">
                            <div class="menu-content">
                                <span class="menu-section fs-5 fw-bolder ps-1 py-1">Meu painel</span>
                            </div>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{url('/')}}" title="Caso queira incluir algum bairro ou cidade que não esteja no sistema" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                <span class="menu-icon">
                                    <i class="bi bi-grid fs-3"></i>
                                </span>
                                <span class="menu-title">Localidades</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{url('/')}}" title="Incluir tipos personalizados de imóveis" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                <span class="menu-icon">
                                    <i class="bi bi-box fs-3"></i>
                                </span>
                                <span class="menu-title">Tipos</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
    <!--begin::Footer-->
    <div class="aside-footer flex-column-auto" id="kt_aside_footer">
        <!--begin::Menu-->
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btm-sm btn-icon btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-start" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-dismiss="click" title="Ações Rápidas">
                <!--begin::Svg Icon | path: icons/duotune/general/gen008.svg-->
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z" fill="black" />
                        <path opacity="0.3" d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z" fill="black" />
                        <path opacity="0.3" d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z" fill="black" />
                        <path opacity="0.3" d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z" fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
            </button>
            <!--begin::Menu 2-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Ações Rápidas</div>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu separator-->
                <div class="separator mb-3 opacity-75"></div>
                <!--end::Menu separator-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">Abrir chamado</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">Tutoriais</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3">Documentação</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu separator-->
                <div class="separator mt-3 opacity-75"></div>
                <!--end::Menu separator-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <div class="menu-content px-3 py-3">
                        <a class="btn btn-primary btn-sm px-4" href="#">Suporte Online</a>
                    </div>
                </div>
                <!--end::Menu item-->
            </div>
            <!--end::Menu 2-->
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Footer-->
</div>