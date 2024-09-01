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
            <!--begin::Row-->
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">

                <!--begin::Criar nova regra-->
                <div class="col-md-4">
                    <!--begin::Card-->
                    <div class="card h-md-100">
                        @include('permissao.partials.notificacao')
                        <!--begin::Card body-->
                        <div class="card-body d-flex flex-center">
                            <!--begin::Button-->
                            @include('regras.partials.criar')
                            <!--begin::Button-->
                        </div>
                        <!--begin::Card body-->
                    </div>
                    <!--begin::Card-->
                </div>
                <!--begin::Criar nova regra-->
                @foreach ($roles as $role)
                    <div class="col-md-4">
                        <div class="card card-flush h-md-100">
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
                                <a href="{{route('regras.show', $role->id)}}"
                                    class="btn btn-light btn-active-primary my-1 me-2">Visualizar</a>
                                <button type="button" class="btn btn-primary edit-role-button" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_update_role" data-role-id="{{ $role->id }}"
                                    data-role-name="{{ $role->name }}"
                                    data-role-permissions="{{ json_encode($role->permissions->pluck('id')) }}">
                                    Editar
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--end::Row-->
            <!--begin::Modals-->
            @include('regras.partials.editar')
            <!--end::Modal - Atualizar-->

            <!--end::Modals-->
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
        
    @endpush
    <!--end::Scripts-->
</x-app-layout>
