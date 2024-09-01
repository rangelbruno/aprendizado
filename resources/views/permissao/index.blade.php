<x-app-layout pageTitle='Pacientes'>
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
            <!--begin::Card-->
            <div class="card card-flush">
                <!--begin::Card header-->
                <!--begin::Notificação-->
                @include('permissao.partials.notificacao')
                <!--end::Notificação-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1 me-5">
                            <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <input type="text" data-kt-permissions-table-filter="search"
                                class="form-control form-control-solid w-250px ps-13"
                                placeholder="Buscar" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Button-->
                        @include('permissao.partials.criar')
                        <!--end::Button-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    @include('permissao.partials.tabela')
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
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
        <script src="{{ asset('assets/js/custom/apps/user-management/permissions/list.js') }}"></script>
    @endpush
    <!--end::Scripts-->
</x-app-layout>
