<div class="card card-xl-stretch mb-xl-8 theme-dark-bg-body" style="background-color: #CBF0F4">
    <!--begin::Body-->
    <div class="card-body d-flex flex-column">
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-grow-1">
            <!--begin::Title-->
            <a href="#" class="text-gray-900 text-hover-primary fw-bold fs-3">Agendamentos</a>
            <!--end::Title-->
            <!--begin::Chart-->
            <div class="consultas" style="height: 100px"></div>
            <!--end::Chart-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Stats-->
        <div class="pt-5">
            <!--begin::Number-->
            <span class="text-gray-900 fw-bold fs-3x me-2 lh-0">{{ $totalAgendamentos  }}</span>
            <!--end::Number-->
        </div>
        <!--end::Stats-->
    </div>
    <!--end::Body-->
</div>

<script>
    var KTWidgetsAgendamentos      = {
        init: function() {
            this.initCharts();
        },
        initCharts: function() {
            var e,
                t = document.querySelectorAll(".agendamentos");
                var monthNames = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"];
            [].slice.call(t).forEach(function(t) {
                if ((e = parseInt(KTUtil.css(t, "height")), t)) {
                    var a = KTUtil.getCssVariableValue("--bs-gray-800"),
                        o = KTUtil.getCssVariableValue("--bs-gray-300");
                    new ApexCharts(t, {
                        series: [{
                            name: "Realizadas",
                            data: @json(array_values($agendamentosPorMes  -> toArray())),
                        }],
                        chart: {
                            fontFamily: "inherit",
                            type: "area",
                            height: e,
                            toolbar: {
                                show: false
                            },
                            zoom: {
                                enabled: false
                            },
                            sparkline: {
                                enabled: true
                            },
                        },
                        stroke: {
                            curve: "smooth",
                            show: true,
                            width: 3,
                            colors: ["#FFFFFF"],
                        },
                        xaxis: {
                            categories: @json(array_keys($agendamentosPorMes ->toArray())).map(month => monthNames[month - 1]),
                            labels: {
                                show: false,
                                style: {
                                    colors: a,
                                    fontSize: "12px"
                                },
                            },
                        },
                        yaxis: {
                            min: 0,
                            max: 60,
                            labels: {
                                show: false,
                                style: {
                                    colors: a,
                                    fontSize: "12px"
                                },
                            },
                        },
                        tooltip: {
                            style: {
                                fontSize: "12px"
                            },
                            y: {
                                formatter: function(e) {
                                    return "" + e + " consultas";
                                },
                            },
                        },
                    }).render();
                }
            });
        }
    };

    document.addEventListener('DOMContentLoaded', function() {
        KTWidgetsAgendamentos     .init();
    });
</script>
