<x-guest-layout>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Esqueceu sua senha? Não tem problema. Basta nos informar seu endereço de e-mail e enviaremos um link de redefinição de senha que permitirá que você escolha uma nova.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form"
        data-kt-redirect-url="{{ route('password.email') }}" method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Link para redefinição de senha de e-mail') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
