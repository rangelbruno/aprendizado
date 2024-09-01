<div class="card card-xl-stretch mb-xl-8 theme-dark-bg-body" style="background-color: #F7D9E3">
    <!--begin::Body-->
    <div class="card-body d-flex flex-column">
        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-grow-1">
            <!--begin::Title-->
            <a href="#" class="text-gray-900 text-hover-primary fw-bold fs-3">Pacientes</a>
            <!--end::Title-->
            <!--begin::Chart-->
            <div class="pacientes" style="height: 100px"></div>
            <!--end::Chart-->
        </div>
        <!--end::Wrapper-->
        <!--begin::Stats-->
        <div class="pt-5">
            <!--begin::Number-->
            <span class="text-gray-900 fw-bold fs-3x me-2 lh-0">{{ $totalPacientes }}</span>
            <!--end::Number-->
        </div>
        <!--end::Stats-->
    </div>
    <!--end::Body-->
</div>

<script>
    var KTWidgetsPacientes  = {
        init: function() {
            this.initCharts();
        },
        initCharts: function() {
            var e,
                t = document.querySelectorAll(".pacientes");
                var monthNames = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"];
            [].slice.call(t).forEach(function(t) {
                if ((e = parseInt(KTUtil.css(t, "height")), t)) {
                    var a = KTUtil.getCssVariableValue("--bs-gray-800"),
                        o = KTUtil.getCssVariableValue("--bs-gray-300");
                    new ApexCharts(t, {
                        series: [{
                            name: "Cadastrado",
                            data: @json(array_values($pacientesPorMes -> toArray())),
                        }],
                        grid: {
                            show: false,
                            padding: {
                                top: 0,
                                bottom: 0,
                                left: 0,
                                right: 0,
                            },
                        },
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
                        plotOptions: {},
                        legend: {
                            show: false
                        },
                        dataLabels: {
                            enabled: false
                        },
                        fill: {
                            type: "gradient",
                            gradient: {
                                opacityFrom: 0.4,
                                opacityTo: 0,
                                stops: [20, 120, 120, 120],
                            },
                        },
                        stroke: {
                            curve: "smooth",
                            show: true,
                            width: 3,
                            colors: ["#FFFFFF"],
                        },
                        xaxis: {
                            categories: @json(array_keys($pacientesPorMes->toArray())).map(month => monthNames[month - 1]),
                            axisBorder: {
                                show: false
                            },
                            axisTicks: {
                                show: false
                            },
                            labels: {
                                show: false,
                                style: {
                                    colors: a,
                                    fontSize: "12px"
                                },
                            },
                            crosshairs: {
                                show: false,
                                position: "front",
                                stroke: {
                                    color: o,
                                    width: 1,
                                    dashArray: 3,
                                },
                            },
                            tooltip: {
                                enabled: true,
                                offsetY: 0,
                                style: {
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
                        states: {
                            normal: {
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            },
                            hover: {
                                filter: {
                                    type: "none",
                                    value: 0
                                }
                            },
                            active: {
                                allowMultipleDataPointsSelection: false,
                                filter: {
                                    type: "none",
                                    value: 0
                                },
                            },
                        },
                        tooltip: {
                            style: {
                                fontSize: "12px"
                            },
                            y: {
                                formatter: function(e) {
                                    return "" + e + " pacientes";
                                },
                            },
                        },
                        colors: ["#ffffff"],
                        markers: {
                            colors: [a],
                            strokeColor: [o],
                            strokeWidth: 3,
                        },
                    }).render();
                }
            });
        }
    };

    // Agora chamamos a função init para inicializar os widgets
    document.addEventListener('DOMContentLoaded', function() {
        KTWidgetsPacientes .init();
    });
</script>
