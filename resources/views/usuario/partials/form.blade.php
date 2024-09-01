<form id="kt_modal_add_user_form" class="form" method="POST" action="{{ route('usuarios.assign-role') }}">
    @csrf
    <!--begin::Scroll-->
    <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true"
        data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
        data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
        data-kt-scroll-offset="300px">
        <!--begin::Input group-->
        <div class="fv-row mb-7">
            <!--begin::Label-->
            <label class="required fw-semibold fs-6 mb-2">Full Name</label>
            <!--end::Label-->
            <!--begin::Input-->
            {{-- <input type="text" name="user_name" class="form-control form-control-solid mb-3 mb-lg-0" /> --}}
            <select id="user_id" name="user_id" class="form-control form-control-solid mb-3 mb-lg-0" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="mb-5">
            <!--begin::Label-->
            <label class="required fw-semibold fs-6 mb-5">Role</label>
            <!--end::Label-->
            <!--begin::Roles-->
            @foreach ($roles as $role)
                <!--begin::Input row-->
                <div class="d-flex fv-row">
                    <!--begin::Radio-->
                    <div class="form-check form-check-custom form-check-solid">
                        <!--begin::Input-->
                        <input class="form-check-input me-3" name="role_id" type="radio" value="{{ $role->id }}"
                            id="role_option_{{ $role->id }}" {{ $loop->first ? 'checked' : '' }} />
                        <!--end::Input-->
                        <!--begin::Label-->
                        <label class="form-check-label" for="role_option_{{ $role->id }}">
                            <div class="fw-bold text-gray-800">{{ $role->name }}</div>
                            <div class="text-gray-600">{{ $role->description ?? 'No description available' }}</div>
                        </label>
                        <!--end::Label-->
                    </div>
                    <!--end::Radio-->
                </div>
                <!--end::Input row-->
                @if (!$loop->last)
                    <div class='separator separator-dashed my-5'></div>
                @endif
            @endforeach
            <!--end::Roles-->
        </div>

        <!--end::Input group-->
    </div>
    <!--end::Scroll-->
    <!--begin::Actions-->
    <div class="text-center pt-10">
        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
            <span class="indicator-label">Submit</span>
            <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
        </button>
    </div>
    <!--end::Actions-->
</form>
