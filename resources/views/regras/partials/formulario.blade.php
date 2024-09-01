<form id="kt_modal_add_role_form" class="form" action="{{ route('regras.store') }}" method="POST">
    @csrf
    <!--begin::Scroll-->
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll" data-kt-scroll="true"
        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
        data-kt-scroll-dependencies="#kt_modal_add_role_header" data-kt-scroll-wrappers="#kt_modal_add_role_scroll"
        data-kt-scroll-offset="300px">
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Label-->
            <label class="fs-5 fw-bold form-label mb-2">
                <span class="required">Regra</span>
            </label>
            <!--end::Label-->
            <!--begin::Input-->
            <input class="form-control form-control-solid" placeholder="Entre com o nome para regra" name="name"
                required />
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Permissions-->
        <div class="fv-row">
            <!--begin::Label-->
            <label class="fs-5 fw-bold form-label mb-2">Adicionar Permissões</label>
            <!--end::Label-->
            <!--begin::Table wrapper-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5">
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-semibold">
                        <!--begin::Table row for select all-->
                        <tr>
                            <td class="text-gray-800">Selecionar Todos</td>
                            <td>
                                <label class="form-check form-check-custom form-check-solid me-9">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="kt_roles_select_all" />
                                    <span class="form-check-label" for="kt_roles_select_all">
                                        Selecionar todos
                                    </span>
                                </label>
                            </td>
                        </tr>
                        <!-- Dynamic Rows -->
                        @foreach ($permissions as $permission)
                            <!--begin::Table row-->
                            <tr>
                                <td class="text-gray-800">{{ $permission->name }}</td>
                                <td>
                                    <!--begin::Checkbox-->
                                    <label
                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                        <input class="form-check-input permission-checkbox" type="checkbox"
                                            value="{{ $permission->id }}" name="permissions[]">

                                    </label>
                                    <!--end::Checkbox-->
                                </td>
                            </tr>
                            <!--end::Table row-->
                        @endforeach
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Table wrapper-->
        </div>
        <!--end::Permissions-->
    </div>
    <!--end::Scroll-->
    <!--begin::Actions-->
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-kt-roles-modal-action="cancel">Descartar</button>
        <button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
            <span class="indicator-label">Salvar</span>
            <span class="indicator-progress">Por favor, aguarde...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
    <!--end::Actions-->
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectAllCheckbox = document.getElementById('kt_roles_select_all');
        selectAllCheckbox.addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.permission-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });
    });
</script>
