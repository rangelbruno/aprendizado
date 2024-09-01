    <!--begin::Contacts-->
    <div class="card card-flush h-lg-100" id="kt_contacts_main">
        <!--begin::Card header-->
        <div class="card-header pt-7" id="kt_chat_contacts_header">
            <!--begin::Card title-->
            <div class="card-title">
                <i class="ki-duotone ki-lock fs-1 me-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                </i>

                <h2>{{ __('Atualize sua senha') }}</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-5">
            <!--begin::Form-->
            <form id="kt_ecommerce_settings_general_form" class="form" method="post"
                action="{{ route('password.update') }}">
                @csrf
                @method('put')
                <!--begin::Current Password-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <x-input-label for="update_password_current_password" :value="__('Senha Atual')" />
                        <span class="ms-1" data-bs-toggle="tooltip"
                            title="Use 8 ou mais caracteres com uma mistura de letras, números e símbolos.">
                            <i class="ki-duotone ki-information fs-7">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <x-text-input id="update_password_current_password" name="current_password" type="password"
                        class="form-control form-control-solid" autocomplete="current-password" />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                    <!--end::Input-->
                </div>
                <!--end::Current Password-->
                <!--begin::New Password-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <x-input-label for="update_password_password" :value="__('Nova Senha')" />
                        <span class="ms-1" data-bs-toggle="tooltip"
                            title="Use 8 ou mais caracteres com uma mistura de letras, números e símbolos.">
                            <i class="ki-duotone ki-information fs-7">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <x-text-input id="update_password_password" name="password" type="password"
                        class="form-control form-control-solid" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                    <!--end::Input-->
                </div>
                <!--end::New Password-->

                <!--begin::Confirm Password-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="fs-6 fw-semibold form-label mt-3">
                        <x-input-label for="update_password_password_confirmation" :value="__('Confirme a Nova Senha')" />
                        <span class="ms-1" data-bs-toggle="tooltip"
                            title="Use 8 ou mais caracteres com uma mistura de letras, números e símbolos.">
                            <i class="ki-duotone ki-information fs-7">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span>
                    </label>
                    <!--end::Label-->
                    <!--begin::Input-->
                    <x-text-input id="update_password_password_confirmation" name="password_confirmation"
                        type="password" class="form-control form-control-solid" autocomplete="new-password" />
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                    <!--end::Input-->
                </div>
                <!--end::Confirm Password-->

                <!--begin::Separator-->
                <div class="separator mb-6"></div>
                <!--end::Separator-->
                <!--begin::Action buttons-->
                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                    <x-primary-button data-kt-contacts-type="submit" class="btn btn-primary">
                        <span class="indicator-label">{{ __('Salvar') }}</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </x-primary-button>
                    <!--end::Button-->
                </div>
                <!--end::Action buttons-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Contacts-->
