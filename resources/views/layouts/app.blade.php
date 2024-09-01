<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Template</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <!-- ============================================================== -->
    <!-- Chamada para o STYLES da página -->
    <!-- ============================================================== -->
    @stack('styles')
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-extended header-fixed header-tablet-and-mobile-fixed">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                @include('layouts.header')
                <!--end::Header-->
                <!--begin::Toolbar-->
                @include('layouts.toolbar', [
                    'pageTitle' => $pageTitle ?? null,
                    'breadcrumbs' => $breadcrumbs ?? [],
                ])
                <!--end::Toolbar-->
                <!--begin::Container-->
                <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
                    <!--begin::Content-->
                    <div class="content flex-row-fluid" id="kt_content">
                        {{ $slot }}
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Container-->
                <!--begin::Footer-->
                @include('layouts.footer')
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
    <!--end::Scrolltop-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tabs = document.querySelectorAll('.nav-link');
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    let activeTabContent = document.querySelector(this.getAttribute('href'));
                    if (activeTabContent) {
                        let allTabContents = document.querySelectorAll('.tab-pane');
                        allTabContents.forEach(content => content.classList.remove('show',
                            'active'));
                        activeTabContent.classList.add('show', 'active');
                    }
                });
            });

            // Tentar forçar a ativação da aba inicial
            let initialActiveTab = document.querySelector('.nav-link.active');
            if (initialActiveTab) {
                initialActiveTab.click();
            }
        });
    </script>
    <!-- ============================================================== -->
    <!-- Chamada para o SCRIPTS da página -->
    <!-- ============================================================== -->
    @stack('scripts')
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
