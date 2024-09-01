<table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_roles_view_table">
    <thead>
        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
            <th class="w-10px pe-2">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                        data-kt-check-target="#kt_roles_view_table .form-check-input" value="1" />
                </div>
            </th>
            <th class="min-w-50px">ID</th>
            <th class="min-w-150px">Usuário</th>
            <th class="min-w-125px">Associado</th>
            <th class="text-end min-w-100px">Ações</th>
        </tr>
    </thead>
    <tbody class="fw-semibold text-gray-600">
        @foreach($role->users as $user)
        <tr>
            <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" value="{{ $user->id }}" />
                </div>
            </td>
            <td>{{ $user->id }}</td>
            <td class="d-flex align-items-center">
                <div class="d-flex flex-column">
                    <a href="#" class="text-gray-800 text-hover-primary mb-1">{{ $user->name }}</a>
                    <span>{{ $user->email }}</span>
                </div>
            </td>
            <td>{{ $user->created_at->format('d M Y, h:i a') }}</td>
            <td class="text-end">
                <!-- Aqui você pode incluir as ações específicas para cada usuário, como editar ou remover -->
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click"
                    data-kt-menu-placement="bottom-end">Actions
                    <i class="ki-duotone ki-down fs-5 m-0"></i></a>
                <!-- Menu de ações pode ser adicionado aqui -->
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Garantir que o DataTable só seja inicializado uma vez
        if (!$.fn.DataTable.isDataTable('#kt_roles_view_table')) {
            var table = $('#kt_roles_view_table').DataTable({
                info: false,
                order: [],
                pageLength: 5,
                lengthChange: false,
                columnDefs: [{
                    orderable: false,
                    targets: [0,
                        4
                    ] // Desabilita ordenação para colunas específicas (checkboxes e ações)
                }]
            });

            // Adiciona funcionalidade de busca
            document.querySelector('[data-kt-roles-table-filter="search"]').addEventListener('keyup',
                function() {
                    table.search(this.value).draw();
                });

            // Selecione/Deselecione todos os checkboxes
            const selectAllCheckbox = document.querySelector('#kt_roles_view_table thead .form-check-input');
            selectAllCheckbox.addEventListener('change', function() {
                var allCheckboxes = document.querySelectorAll(
                    '#kt_roles_view_table tbody .form-check-input');
                allCheckboxes.forEach(function(checkbox) {
                    checkbox.checked = selectAllCheckbox.checked;
                });
            });

            // Excluir linhas selecionadas
            document.querySelector('[data-kt-view-roles-table-select="delete_selected"]').addEventListener(
                'click',
                function() {
                    var selectedCheckboxes = document.querySelectorAll(
                        '#kt_roles_view_table tbody .form-check-input:checked');
                    if (selectedCheckboxes.length) {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, delete them!',
                            cancelButtonText: 'No, cancel'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                selectedCheckboxes.forEach(function(checkbox) {
                                    table.row($(checkbox).closest('tr')).remove().draw();
                                });
                                Swal.fire('Deleted!', 'The selected rows have been deleted.',
                                    'success');
                            }
                        });
                    } else {
                        Swal.fire('No selection', 'Please select at least one row.', 'info');
                    }
                });

            // Excluir linha individual
            document.querySelectorAll('[data-kt-roles-table-filter="delete_row"]').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    var row = table.row($(this).parents('tr'));
                    var rowData = row.data();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: `Are you sure you want to delete ${rowData ? rowData[1] : 'this item'}?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            row.remove().draw();
                            Swal.fire('Deleted!',
                                `${rowData ? rowData[1] : 'The item'} has been deleted.`,
                                'success');
                        }
                    });
                });
            });
        }
    });
</script>
