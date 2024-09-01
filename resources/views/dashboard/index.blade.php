<x-app-layout>
    <!--begin::Styles-->
    @push('styles')
    @endpush
    <!--end::Styles-->

    <!--begin::Dados-->
    <div class="row g-5 g-xl-8">
        <!--begin::Col-->
        <div class="col-xl-4">
            <!--begin::Pacientes-->
            @include('dashboard.partials.qtd-pacientes')
            <!--end::Pacientes-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-4">
            <!--begin::Consultas-->
           @include('dashboard.partials.qtd-consultas')
            <!--end::Consultas-->
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-4">
            <!--begin::Agendamentos-->
            @include('dashboard.partials.qtd-agendamentos')
            <!--end::Agendamentos-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Dados-->


    <!--begin::Scripts-->
    @push('scripts')
    @endpush
    <!--end::Scripts-->
</x-app-layout>
