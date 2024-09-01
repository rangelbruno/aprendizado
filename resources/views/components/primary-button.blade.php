<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary', 'id' => 'kt_sign_in_submit']) }}>
    <span class="indicator-label">{{ $slot }}</span>

    <span class="indicator-progress">Aguarde...
        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
</button>
