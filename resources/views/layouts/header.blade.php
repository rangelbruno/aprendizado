<div id="kt_header" class="header">
    <!--begin::Header top-->
    <div class="header-top d-flex align-items-stretch flex-grow-1">
        <!--begin::Container-->
        <div class="d-flex container-xxl align-items-stretch">
            <!--begin::Brand-->
            <div class="d-flex align-items-center align-items-lg-stretch me-5 flex-row-fluid">
                <!--begin::Heaeder navs toggle-->
                <button
                    class="d-lg-none btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-35px h-35px h-md-40px w-md-40px ms-n3 me-2"
                    id="kt_header_navs_toggle">
                    <i class="ki-duotone ki-abstract-14 fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </button>
                <!--end::Heaeder navs toggle-->
                <!--begin::Logo-->
                <a href="index.html" class="d-flex align-items-center">
                    <img alt="Logo" src="{{ asset('assets/media/logos/demo20.svg') }}" class="h-25px h-lg-30px" />

                </a>
                <!--end::Logo-->
                <!--begin::Tabs wrapper-->
                <div class="align-self-end overflow-auto" id="kt_brand_tabs">
                    <div class="header-tabs overflow-auto mx-4 ms-lg-10 mb-5 mb-lg-0" id="kt_header_tabs"
                        data-kt-swapper="true" data-kt-swapper-mode="prepend"
                        data-kt-swapper-parent="{default: '#kt_header_navs_wrapper', lg: '#kt_brand_tabs'}">
                        <ul class="nav flex-nowrap text-nowrap">
                            <li class="nav-item">
                                <a class="nav-link {{ is_routes_active(['dashboard']) }}" data-bs-toggle="tab"
                                    href="#kt_header_navs_tab_1">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ is_routes_active(['usuarios.index', 'regras.index', 'permissao.index']) }}"
                                    data-bs-toggle="tab" href="#kt_header_navs_tab_2">Cadastros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ is_routes_active(['app.*']) }}" data-bs-toggle="tab"
                                    href="#kt_header_navs_tab_3">Agendamento</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ is_routes_active(['reports.*']) }}" data-bs-toggle="tab"
                                    href="#kt_header_navs_tab_4">Prontuário Eletrônico</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ is_routes_active(['help.*']) }}" data-bs-toggle="tab"
                                    href="#kt_header_navs_tab_5">Financeiro</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!--end::Tabs wrapper-->
            </div>
            <!--end::Brand-->
            <!--begin::Topbar-->
            <div class="d-flex align-items-center flex-row-auto">
                <!--begin::Atalhos-->
                @include('layouts.atalhos')
                <!--begin::Atalhos-->
                <!--begin::Theme mode-->
                @include('layouts.themeMode')
                <!--end::Theme mode-->
                <!--begin::User-->
                @include('layouts.user')
                <!--end::User -->
            </div>
            <!--end::Topbar-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Header top-->
    <!--begin::Nav-->
    @include('layouts.nav')
    <!--end::Nav-->
</div>
