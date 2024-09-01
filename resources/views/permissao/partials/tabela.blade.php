<table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_permissions_table">
    <thead>
        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-125px">Nome</th>
            <th class="min-w-250px">Atribuído a</th>
            <th class="min-w-125px">Criado em</th>
            <th class="text-end min-w-100px">Ações</th>
        </tr>
    </thead>
    <tbody class="fw-semibold text-gray-600">
        @forelse ($permissoes as $permissao)
            <tr>
                <td>{{ $permissao->name }}</td>
                <td>
                    <span class="badge badge-light-primary fs-7 m-1">{{ $permissao->guard_name }}</span>
                </td>
                <td>{{ $permissao->created_at }}</td>
                <td class="text-end">
                    
                    <form method="POST" action="{{ route('permissao.destroy', $permissao) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-icon btn-active-light-danger w-30px h-30px"
                            onclick="confirmDeletion(this.form)">
                            <i class="ki-duotone ki-trash fs-3">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                            </i>
                        </button>
                    </form>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Nenhuma permissão encontrada.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- Modal para Atualizar Permissão -->
<div class="modal fade" id="kt_modal_update_permission" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Atualizar Permissão</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1"></i>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                    <i class="ki-duotone ki-information fs-2tx text-warning me-4"></i>
                    <div class="d-flex flex-stack flex-grow-1">
                        <div class="fw-semibold">
                            <div class="fs-6 text-gray-700">
                                <strong class="me-1">Atenção!</strong> Ao editar o nome da permissão, você poderá
                                interromper a funcionalidade de permissões do sistema. Certifique-se de ter certeza
                                antes de continuar.
                            </div>
                        </div>
                    </div>
                </div>
                <form id="kt_modal_update_permission_form" class="form" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id">
                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-semibold form-label mb-2">
                            <span class="required">Nome da Permissão</span>
                        </label>
                        <input class="form-control form-control-solid" placeholder="Insira o nome da permissão"
                            name="name" required />
                    </div>
                    <div class="fv-row mb-7">
                        <input class="form-control form-control-solid" name="guard_name" hidden />
                    </div>
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Atualizar</span>
                            <span class="indicator-progress">Aguarde...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--end::Modal - Update permissions-->

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modalElement = document.getElementById("kt_modal_update_permission");
        const formElement = modalElement.querySelector("#kt_modal_update_permission_form");
        const modalInstance = new bootstrap.Modal(modalElement);

        function setupFormValidation() {
            var validation = FormValidation.formValidation(formElement, {
                fields: {
                    name: { // O nome do campo deve corresponder ao esperado pelo seu backend
                        validators: {
                            notEmpty: {
                                message: "O nome da permissão é obrigatório"
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

            formElement.addEventListener("submit", function(event) {
                event.preventDefault();
                validation.validate().then(function(status) {
                    if (status === 'Valid') {
                        formElement.submit(); // Submete o formulário se for válido
                    } else {
                        showErrorAlert();
                    }
                });
            });
        }

        modalElement.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');
            const name = button.getAttribute('data-name');
            const guardName = button.getAttribute('data-guard_name');

            // Update form action and input fields
            formElement.action = '/permissao/' + id; // Adjust as necessary for your actual routing
            formElement.querySelector('input[name="id"]').value = id;
            formElement.querySelector('input[name="name"]').value = name;
            formElement.querySelector('input[name="guard_name"]').value = guardName;
        });

        function submitForm() {
            Swal.fire({
                text: "Permissão atualizada com sucesso!",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Ok, entendi!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            }).then(function(result) {
                if (result.isConfirmed) {
                    modalInstance.hide();
                }
            });
        }

        function showErrorAlert() {
            Swal.fire({
                text: "Desculpe, parece que há alguns erros detectados, por favor tente novamente.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, entendi!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        }

        setupFormValidation();

    });
</script>

<script>
    function confirmDeletion(form) {
        Swal.fire({
            title: 'Tem certeza?',
            text: "Você não poderá reverter isso!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, delete isso!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>
