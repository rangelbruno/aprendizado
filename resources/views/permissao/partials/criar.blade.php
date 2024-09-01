<button type="button" class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_permission">
    <i class="ki-duotone ki-plus-square fs-3">
        <span class="path1"></span>
        <span class="path2"></span>
        <span class="path3"></span>
    </i>Adicionar
</button>

<!--begin::Modal - Add permissions-->
<div class="modal fade" id="kt_modal_add_permission" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Adicionar Permissão</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-permissions-modal-action="close">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="kt_modal_add_permission_form" class="form" action="{{ route('permissao.store') }}"
                    method="post">
                    @csrf
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold form-label mb-2">
                            <span class="required">Nome da Permissão</span>
                            <span class="ms-2" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true"
                                data-bs-content="É necessário que os nomes das permissões sejam exclusivos.">
                                <i class="ki-duotone ki-information fs-7">
                                    <span class="path1"></span>
                                    <span the="path2"></span>
                                    <span the="path3"></span>
                                </i>
                            </span>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select class="form-select form-select-solid" name="name" required>
                            <option value="">Selecione uma rota</option>
                            @foreach ($routeNames as $routeName)
                                <option value="{{ $routeName }}">{{ $routeName }}</option>
                            @endforeach
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row">
                        <!--begin::Checkbox-->
                        <input class="form-control form-control-solid" value="web" name="guard_name" hidden />
                        <!--end::Checkbox-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3"
                            data-kt-permissions-modal-action="cancel">Cancelar</button>
                        <button type="submit" class="btn btn-primary" data-kt-permissions-modal-action="submit">
                            <span class="indicator-label">Enviar</span>
                            <span class="indicator-progress">Aguarde...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add permissions-->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var KTUsersAddPermission = (function() {
            const modalElement = document.getElementById("kt_modal_add_permission"),
                formElement = modalElement.querySelector("#kt_modal_add_permission_form"),
                modalInstance = new bootstrap.Modal(modalElement);

            function init() {
                setupFormValidation();
                setupEventListeners();
            }

            function setupFormValidation() {
                var validation = FormValidation.formValidation(formElement, {
                    fields: {
                        name: { // Corrigido de 'permission_name' para 'name'
                            validators: {
                                notEmpty: {
                                    message: "O nome da permissão é obrigatório."
                                }
                            }
                        },
                        guard_name: { // Validação para o campo 'guard_name' se necessário
                            validators: {
                                notEmpty: {
                                    message: "O campo guard_name é obrigatório."
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        })
                    }
                });

                formElement.querySelector('[data-kt-permissions-modal-action="submit"]')
                    .addEventListener(
                        "click",
                        function(event) {
                            event.preventDefault();
                            validation.validate().then(function(status) {
                                if (status === 'Valid') {
                                    formElement
                                .submit(); // Adicionado para submeter o formulário de verdade
                                } else {
                                    showErrorAlert();
                                }
                            });
                        });
            }

            function setupEventListeners() {
                modalElement.querySelector('[data-kt-permissions-modal-action="close"]')
                    .addEventListener(
                        "click",
                        function(event) {
                            event.preventDefault();
                            confirmClose();
                        });

                modalElement.querySelector('[data-kt-permissions-modal-action="cancel"]')
                    .addEventListener(
                        "click",
                        function(event) {
                            event.preventDefault();
                            confirmCancellation();
                        });
            }

            function showErrorAlert() {
                Swal.fire({
                    text: "Parece que há erros no formulário, por favor tente novamente.",
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, entendi",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            }

            function confirmClose() {
                Swal.fire({
                    text: "Tem certeza que deseja fechar?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Sim, fechar!",
                    cancelButtonText: "Não, retornar",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light"
                    }
                }).then(function(result) {
                    if (result.isConfirmed) {
                        modalInstance.hide();
                    }
                });
            }

            function confirmCancellation() {
                Swal.fire({
                    text: "Tem certeza que deseja cancelar?",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Sim, cancelar!",
                    cancelButtonText: "Não, retornar",
                    customClass: {
                        confirmButton: "btn btn-primary",
                        cancelButton: "btn btn-active-light"
                    }
                }).then(function(result) {
                    if (result.isConfirmed) {
                        formElement.reset();
                        modalInstance.hide();
                    }
                });
            }

            return {
                init: init
            };
        })();

        KTUsersAddPermission.init();
    });
</script>
