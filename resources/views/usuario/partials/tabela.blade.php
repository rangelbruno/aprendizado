<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
    <thead>
        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-125px">Usuário</th>
            <th class="min-w-125px">Regra</th>
            <th class="min-w-125px">Data de Cadastro</th>
            <th class="text-end min-w-100px">Ações</th>
        </tr>
    </thead>
    <tbody class="text-gray-600 fw-semibold">
        @foreach ($users as $user)
            <tr data-user-id="{{ $user->id }}">

                <td class="d-flex align-items-center">
                    <div class="d-flex flex-column">
                        <a href="#" class="text-gray-800 text-hover-primary mb-1">{{ $user->name }}</a>
                        <span>{{ $user->email }}</span>
                    </div>
                </td>
                <td>
                    @foreach ($user->roles as $role)
                        <span class="badge bg-primary" data-role-id="{{ $role->id }}">{{ $role->name }}</span>
                    @endforeach
                </td>
                <td>{{ $user->created_at->format('d M Y, h:i a') }}</td>
                <td class="text-end">
                    <button class="btn btn-primary btn-sm btn-active-light-primary" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_editar_user" data-user-id="{{ $user->id }}">Editar</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="modal fade" id="kt_modal_editar_user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_editar_user_header">
                <h2 class="fw-bold">Editar</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                <form id="kt_modal_editar_user_form" class="form" method="POST"
                    action="{{ route('usuarios.update') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="valor_aqui">

                    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_editar_user_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_editar_user_header"
                        data-kt-scroll-wrappers="#kt_modal_editar_user_scroll" data-kt-scroll-offset="300px">
                        <div class="fv-row mb-7">
                            <label class="required fw-semibold fs-6 mb-2">Usuário</label>
                            <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                readonly />
                        </div>
                        <div class="mb-5">
                            <label class="required fw-semibold fs-6 mb-5">Tipo de usuário</label>
                            @foreach ($roles as $role)
                                <div class="d-flex fv-row">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" name="role_id" type="radio"
                                            value="{{ $role->id }}" id="role_option_{{ $role->id }}"
                                            {{ $loop->first ? 'checked' : '' }} />
                                        <label class="form-check-label" for="role_option_{{ $role->id }}">
                                            <div class="fw-bold text-gray-800">{{ $role->name }}</div>
                                            <div class="text-gray-600">
                                                {{ $role->description ?? 'No description available' }}
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                @if (!$loop->last)
                                    <div class='separator separator-dashed my-5'></div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3"
                            data-kt-users-modal-action="cancel">Cancelar</button>
                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Enviar</span>
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modalElement = document.getElementById("kt_modal_editar_user");
        const formElement = document.getElementById("kt_modal_editar_user_form");
        const modalInstance = new bootstrap.Modal(modalElement);
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const searchInput = document.querySelector('[data-kt-user-table-filter="search"]');

        function bindEventListeners() {
            formElement.addEventListener("submit", async function(event) {
                event.preventDefault();
                await submitFormWithAjax();
            });

            document.querySelectorAll(
                '[data-kt-users-modal-action="cancel"], [data-kt-users-modal-action="close"]').forEach(
                button => {
                    button.addEventListener("click", function(event) {
                        event.preventDefault();
                        confirmCancellation();
                    });
                });

            document.querySelectorAll('[data-bs-target="#kt_modal_editar_user"]').forEach(button => {
                button.addEventListener('click', function() {
                    loadUserDataIntoForm(this.getAttribute('data-user-id'));
                });
            });

            if (searchInput) {
                searchInput.addEventListener("input", filterUsers);
            }
        }

        function filterUsers() {
            const searchText = searchInput.value.toLowerCase();
            document.querySelectorAll("#kt_table_users tbody tr").forEach(row => {
                const cells = row.querySelectorAll("td");
                const text = cells[0].textContent.toLowerCase() + ' ' + cells[1].textContent
                    .toLowerCase();
                row.style.display = text.includes(searchText) ? '' : 'none';
            });
        }

        function loadUserDataIntoForm(userId) {
            const userRow = document.querySelector(`tr[data-user-id="${userId}"]`);
            if (userRow) {
                const userNameElement = userRow.querySelector('a.text-gray-800');
                formElement.elements['name'].value = userNameElement ? userNameElement.textContent.trim() : '';
                formElement.elements['user_id'].value = userId;
                const roleInputs = formElement.querySelectorAll('input[name="role_id"]');
                roleInputs.forEach(input => {
                    input.checked = Array.from(userRow.querySelectorAll('span.badge')).some(
                        badge => badge.getAttribute('data-role-id') === input.value);
                });
            }
        }

        async function submitFormWithAjax() {
            try {
                const data = new FormData(formElement);
                const response = await fetch(formElement.action, {
                    method: 'POST',
                    body: data,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    }
                });

                const text = await response.text();
                try {
                    const resultData = JSON.parse(text);
                    if (!response.ok) {
                        throw new Error(
                            `HTTP error! status: ${response.status}, ${resultData.message || text}`);
                    }
                    handleServerResponse(resultData);
                } catch (error) {
                    throw new Error(`HTTP error! status: ${response.status}, Response not JSON: ${text}`);
                }
            } catch (error) {
                console.error('Fetch error:', error);
                Swal.fire({
                    text: "Erro ao enviar o formulário: " + error.message,
                    icon: "error",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, entendi!",
                    customClass: {
                        confirmButton: "btn btn-primary"
                    }
                });
            }
        }

        function handleServerResponse(data) {
            Swal.fire({
                text: data.message,
                icon: data.status === 'warning' ? "warning" : "success",
                confirmButtonText: "Ok, entendi!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            }).then(result => {
                if (result.isConfirmed && data.status === 'success') {
                    modalInstance.hide();
                    window.location.reload();
                }
            });
        }

        function confirmCancellation() {
            Swal.fire({
                text: "Você tem certeza que deseja cancelar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sim, cancelar!",
                cancelButtonText: "Não, voltar",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(result => {
                if (result.isConfirmed) {
                    formElement.reset();
                    modalInstance.hide();
                }
            });
        }

        bindEventListeners();
    });
</script>
