<x-app-layout pageTitle='Pacientes'>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--begin::Styles-->
    @push('styles')
        <style>
            .btn-close::before,
            .btn-close::after {
                content: none;
                /* Isso removerá qualquer conteúdo adicionado via CSS que possa estar duplicando o "X" */
            }

            .btn-close {
                background: transparent;
                /* Faz o botão ser apenas o "X" sem fundo */
                border: none;
                /* Remove qualquer borda padrão */
                cursor: pointer;
                /* Cursor como ponteiro para indicar clicabilidade */
                font-size: 20px;
                /* Tamanho do texto, ajuste conforme necessário */
            }
        </style>
    @endpush
    <!--end::Styles-->

    <!--begin::Dados-->
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-100 w-lg-200px w-xl-300px mb-10">
                    <!--begin::Card-->
                    <div class="card card-flush">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>{{ $role->name }}</h2>
                            </div>
                        </div>
                        <div class="card-body pt-1">
                            <div class="fw-bold text-gray-600 mb-5">Total de usuários com essa função:
                                {{ $role->users_count }}</div>
                            <div class="d-flex flex-column text-gray-600">
                                @foreach ($role->permissions->take(7) as $permission)
                                    <div class="d-flex align-items-center py-2">
                                        <span class="bullet bg-primary me-3"></span>{{ $permission->name }}
                                    </div>
                                @endforeach
                                @if ($role->permissions->count() > 7)
                                    <div class='d-flex align-items-center py-2'>
                                        <span class='bullet bg-primary me-3'></span>
                                        <em>and {{ $role->permissions->count() - 7 }} more...</em>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer flex-wrap pt-0 d-flex justify-content-between">
                            <button type="button" class="btn btn-primary edit-role-button" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_update_role" data-role-id="{{ $role->id }}"
                                data-role-name="{{ $role->name }}"
                                data-role-permissions="{{ json_encode($role->permissions->pluck('id')) }}">
                                Editar
                            </button>
                        </div>
                    </div>
                    <!--end::Card-->
                    <!--begin::Modal-->
                    <!--begin::Modal - Update role-->
                    @include('regras.partials.editar')
                    <!--end::Modal - Update role-->
                    <!--end::Modal-->
                </div>
                <!--end::Sidebar-->

                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-10">
                    <!--begin::Card-->

                    <div class="card card-flush mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-6">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="text" data-kt-user-table-filter="search"
                                        class="form-control form-control-solid w-250px ps-13" placeholder="Buscar" />
                                </div>
                                <!--end::Search-->
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                    <!--begin::Exportar-->
                                    @include('regras.partials.exportar')
                                    <!--end::Exportar-->
                                </div>
                                <!--end::Toolbar-->
                                <!--begin::Group actions-->
                                <div class="d-flex justify-content-end align-items-center d-none"
                                    data-kt-user-table-toolbar="selected">
                                    <div class="fw-bold me-5">
                                        <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                                    </div>
                                    <button type="button" class="btn btn-danger"
                                        data-kt-user-table-select="delete_selected">Delete Selected</button>
                                </div>
                                <!--end::Group actions-->
                                <!--begin::Modal - Exportar -->
                                @include('regras.partials.modalExportarUsuario')
                                <!--end::Modal - Exportar-->
                                <!--begin::Modal - Adicionar Usuário-->
                                <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    @include('regras.partials.modalAddUsuario')
                                    <!--end::Modal dialog-->
                                </div>
                                <!--end::Modal - Adicionar Usuário-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->

                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            @include('regras.partials.tabela')
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>

                    <!--end::Card-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Layout-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Dados-->

    <!--begin::Scripts-->
    @push('scripts')
        <script>
            function closeAlert(element) {
                var alertBox = element.closest('.alert-notice');
                if (alertBox) {
                    alertBox.setAttribute('style', 'display: none !important;');
                }
            }
        </script>
        <!--begin::Vendors Javascript(used for this page only)-->
        <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
        <!--end::Vendors Javascript-->
        {{-- <script src="{{ asset('assets/js/custom/apps/user-management/roles/view/view.js') }}"></script> --}}
        {{-- <script src="{{ asset('assets/js/custom/apps/user-management/users/list/add.js') }}"></script> --}}
    @endpush
    <!--end::Scripts-->
</x-app-layout>
