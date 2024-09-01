@if ($errors->any())
    <div class="card-title">
        <div class="alert-notice notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
            <!--begin::Icon-->
            <i class="ki-duotone ki-information fs-2tx text-warning me-4">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            <!--end::Icon-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-grow-1">
                <!--begin::Content-->
                <div class="fw-semibold">
                    <div class="fs-6 text-gray-700">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                </div>
                <!--end::Content-->
                <!--begin::Close Button-->
                <button type="button" class="btn-close" onclick="closeAlert(this)" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </button>

                <!--end::Close Button-->
            </div>
            <!--end::Wrapper-->
        </div>
    </div>
@endif

@if (session('success'))
    <div class="card-title">
        <div class="alert-notice notice d-flex bg-light-success rounded border-success border border-dashed mb-9 p-6">
            <!--begin::Icon-->
            <i class="ki-duotone ki-check fs-2tx text-success me-4">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            <!--end::Icon-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-grow-1">
                <!--begin::Content-->
                <div class="fw-semibold">
                    <div class="fs-6 text-gray-700">
                        {{ session('success') }}
                    </div>
                </div>
                <!--end::Content-->
                <!--begin::Close Button-->
                <button type="button" class="btn-close" onclick="closeAlert(this)" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span the="path2"></span>
                    </i>
                </button>
                <!--end::Close Button-->
            </div>
            <!--end::Wrapper-->
        </div>
    </div>
@endif
