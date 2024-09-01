<x-guest-layout>
    <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" data-kt-redirect-url="{{ route('register') }}"
        method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!--begin::Input group-->
        <div class="fv-row mb-8 mt-4" data-kt-password-meter="true">

            <x-input-label for="password" :value="__('Senha')" />
            <!--begin::Wrapper-->
            <div class="mb-1">
                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <x-text-input id="password" class="form-control bg-transparent" type="password" name="password"
                        required autocomplete="new-password" />
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                        data-kt-password-meter-control="visibility">
                        <i class="ki-duotone ki-eye-slash fs-2"></i>
                        <i class="ki-duotone ki-eye fs-2 d-none"></i>
                    </span>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <!--end::Input wrapper-->
                <!--begin::Meter-->
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                    </div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                    </div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                    </div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
                <!--end::Meter-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Hint-->
            <div class="text-muted">Use <b>8 ou mais caracteres</b> com uma mistura de <b>letras</b>, <b>números</b> e
                <b>símbolos</b>.
            </div>
            <!--end::Hint-->
        </div>
        <!--end::Input group=-->

        <!-- Confirm Password -->
        <div class="mt-4 mb-4">
            <x-input-label for="password_confirmation" :value="__('Confirme sua senha')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full form-control bg-transparent"
                type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!--begin::Submit button-->
        <div class="d-grid mb-10 mt-5">

            <x-primary-button class="ms-4 btn btn-primary">
                <!--begin::Indicator label-->
                <span class="indicator-label">Cadastrar</span>
                <!--end::Indicator label-->
                <!--begin::Indicator progress-->
                <span class="indicator-progress">Aguarde...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                <!--end::Indicator progress-->
            </x-primary-button>


        </div>
        <!--end::Submit button-->
        <!--begin::Sign up-->
        <div class="text-gray-500 text-center fw-semibold fs-6">Já possui uma conta?
            <a href="{{ route('login') }}" class="link-primary fw-semibold">Entrar</a>
        </div>
        <!--end::Sign up-->
    </form>
</x-guest-layout>
