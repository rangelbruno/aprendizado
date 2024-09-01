<div class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-750px">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="fw-bold">Atualizar regra</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-roles-modal-action="close">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 my-7">
                <form id="kt_modal_update_role_form" class="form" action="{{ route('regras.update', $role->id) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="">
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll">
                        <div class="fv-row mb-10">
                            <label class="fs-5 fw-bold form-label mb-2">
                                <span class="required">Regra</span>
                            </label>
                            <input class="form-control form-control-solid" placeholder="Enter a role name"
                                name="name" required />
                        </div>
                        <div class="fv-row">
                            <label class="fs-5 fw-bold form-label mb-2">Permissões</label>
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <tbody id="permissions-body" class="text-gray-600 fw-semibold">
                                        <!-- Conteúdo gerado dinamicamente -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="text-center pt-15 d-flex justify-content-between">
                        <button type="button" class="btn btn-danger" data-kt-roles-modal-action="delete">
                            Excluir
                        </button>
                        <div>
                            <button type="reset" class="btn btn-light me-3 mr-5"
                                data-kt-roles-modal-action="cancel">Cancelar</button>
                            <button type="submit" class="btn btn-primary ml-5" data-kt-roles-modal-action="submit">
                                <span class="indicator-label">Enviar</span>
                                <span class="indicator-progress">Aguarde...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modalElement = document.getElementById("kt_modal_update_role"),
            formElement = modalElement.querySelector("#kt_modal_update_role_form"),
            permissionsBody = document.getElementById('permissions-body'),
            modalInstance = new bootstrap.Modal(modalElement),
            allPermissions = @json($permissions);

        document.querySelectorAll('.edit-role-button').forEach(button => {
            button.addEventListener('click', function() {
                const roleId = this.getAttribute('data-role-id');
                const roleName = this.getAttribute('data-role-name');
                const rolePermissions = JSON.parse(this.getAttribute('data-role-permissions'));

                formElement.action = `/regras/${roleId}`;
                document.querySelector('#kt_modal_update_role_form [name="name"]').value =
                    roleName;
                document.querySelector('#kt_modal_update_role_form [name="id"]').value = roleId;

                permissionsBody.innerHTML = '';
                allPermissions.forEach(permission => {
                    const isChecked = rolePermissions.includes(permission.id) ?
                        'checked' : '';
                    const row = `
                                            <tr>
                                                <td class="text-gray-800">${permission.name}</td>
                                                <td>
                                                    <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input permission-checkbox" type="checkbox" value="${permission.id}" name="permissions[]" ${isChecked}>
                                                    </label>
                                                </td>
                                            </tr>
                                        `;
                    permissionsBody.innerHTML += row;
                });
            });
        });

        modalElement.querySelector('[data-kt-roles-modal-action="cancel"]').addEventListener("click", event => {
            event.preventDefault();
            Swal.fire({
                title: 'Você tem certeza?',
                text: "Você deseja descartar as alterações?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sim, descartar!',
                cancelButtonText: 'Não, cancelar',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-light'
                }
            }).then(result => {
                if (result.isConfirmed) {
                    formElement.reset();
                    modalInstance.hide();
                }
            });
        });

        modalElement.querySelector('[data-kt-roles-modal-action="delete"]').addEventListener("click", event => {
            event.preventDefault();
            Swal.fire({
                title: 'Você tem certeza?',
                text: "Esta ação não pode ser revertida!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Não, cancelar',
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-light'
                }
            }).then(result => {
                if (result.isConfirmed) {
                    const deleteForm = document.createElement('form');
                    deleteForm.method = 'POST';
                    deleteForm.action = `/regras/${document.querySelector('#id').value}`;
                    deleteForm.innerHTML = `
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').getAttribute('content')}">
                `;
                    document.body.appendChild(deleteForm);
                    deleteForm.submit();
                }
            });
        });

        modalElement.querySelector('[data-kt-roles-modal-action="close"]').addEventListener("click", event => {
            event.preventDefault();
            Swal.fire({
                title: 'Você tem certeza?',
                text: "Você deseja fechar este modal?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sim, fechar!',
                cancelButtonText: 'Não, cancelar',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-light'
                }
            }).then(result => {
                if (result.isConfirmed) {
                    modalInstance.hide();
                }
            });
        });
    });
</script>
