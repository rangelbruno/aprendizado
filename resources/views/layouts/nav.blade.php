<div class="header-navs d-flex align-items-stretch flex-stack h-lg-70px w-100 py-5 py-lg-0 overflow-hidden overflow-lg-visible"
    id="kt_header_navs" data-kt-drawer="true" data-kt-drawer-name="header-menu"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_header_navs_toggle" data-kt-swapper="true" data-kt-swapper-mode="append"
    data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header'}">
    <!--begin::Container-->
    <div class="d-lg-flex container-xxl w-100">
        <!--begin::Wrapper-->
        <div class="d-lg-flex flex-column justify-content-lg-center w-100" id="kt_header_navs_wrapper">
            <!--begin::Header tab content-->
            <div class="tab-content" data-kt-scroll="true" data-kt-scroll-activate="{default: true, lg: false}"
                data-kt-scroll-height="auto" data-kt-scroll-offset="70px">
                <!--begin::Tab panel-->
                <div class="tab-pane fade {{ is_route_active('dashboard') }}" id="kt_header_navs_tab_1">
                    <!--begin::Menu wrapper-->
                    <div class="header-menu flex-column align-items-stretch flex-lg-row">
                        <!--begin::Menu-->
                        <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-500 fw-semibold align-items-stretch flex-grow-1 px-2 px-lg-0"
                            id="#kt_header_menu" data-kt-menu="true">
                            <!--begin:Menu item-->
                            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                data-kt-menu-placement="bottom-start"
                                class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
                                <div class="d-flex flex-column flex-lg-row gap-2">
                                    <a class="btn btn-sm btn-light-success fw-bold {{ is_route_active('dashboard') }}"
                                        href="{{ route('dashboard') }}">Dashboard</a>

                                </div>

                            </div>
                            <!--end:Menu item-->
                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::Menu wrapper-->
                </div>
                <!--end::Tab panel-->
                <!--begin::Tab panel-->
                <div class="tab-pane fade {{ is_route_active('usuarios.index') }} {{ is_route_active('regras.index') }} {{ is_route_active('permissao.index') }}"
                    id="kt_header_navs_tab_2">
                    <div class="header-menu flex-column align-items-stretch flex-lg-row">
                        <!--begin::Menu-->
                        <div class="menu menu-rounded menu-column menu-lg-row menu-root-here-bg-desktop menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-500 fw-semibold align-items-stretch flex-grow-1 px-2 px-lg-0"
                            id="#kt_header_menu" data-kt-menu="true">
                            <!--begin:Menu item-->
                            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                data-kt-menu-placement="bottom-start"
                                class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
                                <!--begin:Menu link-->
                                <span class="menu-link py-3">
                                    <span
                                        class=" btn btn-sm btn-light-success fw-bold {{ is_route_active('usuarios.index') }} {{ is_route_active('regras.index') }} {{ is_route_active('permissao.index') }}">Cadastro
                                        de Usuários</span>
                                    <span class="menu-arrow d-lg-none"></span>
                                </span>
                                <!--end:Menu link-->
                                <!--begin:Menu sub-->
                                <div
                                    class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px">
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link py-3" href="{{ route('usuarios.index') }}"
                                            title="Adicionar regras e permissões para usuários do sistema"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                            data-bs-placement="right">
                                            <span class="menu-icon">
                                                <i class="ki-duotone ki-user-tick fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                </i>
                                            </span>
                                            <span class="menu-title">Usuários</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--end:Menu item-->
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link py-3" href="{{ route('regras.index') }}"
                                            title="Criar regras para o sistema" data-bs-toggle="tooltip"
                                            data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                            <span class="menu-icon">
                                                <i class="ki-duotone ki-abstract-26 fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                            <span class="menu-title">Regras de acesso</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--end:Menu item-->
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link py-3" href="{{ route('permissao.index') }}"
                                            title="Criar permissões para o sistema"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click"
                                            data-bs-placement="right">
                                            <span class="menu-icon">
                                                <i class="ki-duotone ki-switch fs-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>
                                            </span>
                                            <span class="menu-title">Permissões</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--end:Menu item-->
                                </div>
                                <!--end:Menu sub-->
                            </div>
                            <!--end:Menu item-->
                        </div>
                        <!--end::Menu-->
                    </div>
                </div>

                <!--end::Tab panel-->
                <!--begin::Tab panel-->
                <div class="tab-pane fade" id="kt_header_navs_tab_3">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-lg-row flex-lg-stack flex-wrap gap-2 px-4 px-lg-0">
                        <div class="d-flex flex-column flex-lg-row gap-2">
                            <a class="btn btn-sm btn-light-primary fw-bold"
                                href="apps/user-management/users/list.html">User Management</a>
                            <a class="btn btn-sm btn-light-success fw-bold" href="apps/inbox/listing.html">Inbox</a>
                            <a class="btn btn-sm btn-light-danger fw-bold" href="apps/file-manager/folders.html">File
                                Manager</a>
                        </div>
                        <div class="d-flex flex-column flex-lg-row gap-2">
                            <a class="btn btn-sm btn-light-info fw-bold" href="apps/subscriptions/view.html">More
                                Apps</a>
                        </div>
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Tab panel-->
                <!--begin::Tab panel-->
                <div class="tab-pane fade" id="kt_header_navs_tab_4">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-lg-row flex-lg-stack flex-wrap gap-2 px-4 px-lg-0">
                        <div class="d-flex flex-column flex-lg-row gap-2">
                            <a class="btn btn-sm btn-light-primary fw-bold"
                                href="apps/ecommerce/catalog/products.html">eCommerce</a>
                            <a class="btn btn-sm btn-light-danger fw-bold" href="apps/file-manager/folders.html">File
                                Manager</a>
                        </div>
                        <div class="d-flex flex-column flex-lg-row gap-2">
                            <a class="btn btn-sm btn-light-info fw-bold" href="apps/subscriptions/view.html">More
                                Apps</a>
                        </div>
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Tab panel-->
                <!--begin::Tab panel-->
                <div class="tab-pane fade" id="kt_header_navs_tab_5">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-lg-row flex-lg-stack flex-wrap gap-2 px-4 px-lg-0">
                        <div class="d-flex flex-column flex-lg-row gap-2">
                            <a class="btn btn-sm btn-light-primary fw-bold"
                                href="https://preview.keenthemes.com/html/metronic/docs">Documentation</a>
                            <a class="btn btn-sm btn-light-success fw-bold"
                                href="documentation/getting-started/video-tutorials.html">Video
                                Tutorials</a>
                            <a class="btn btn-sm btn-light-danger fw-bold"
                                href="https://preview.keenthemes.com/metronic8/demo20/layout-builder.html">Layout
                                Builder</a>
                        </div>
                        <div class="d-flex flex-column flex-lg-row gap-2">
                            <a class="btn btn-sm btn-light-info fw-bold"
                                href="documentation/getting-started/changelog.html">Changelog</a>
                        </div>
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Tab panel-->
            </div>
            <!--end::Header tab content-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>
