@extends('back.layouts.master')
@section('title', 'Dashboard')

@section('master')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row project-wrapper">
            <div class="col-xxl-12">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span
                                            class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                            <i class="ri-shopping-bag-line"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden ms-3">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                            Total Products</p>
                                        <div class="d-flex align-items-center mb-3">
                                            <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                    data-target="100">0</span></h4>
                                            {{-- <span class="badge badge-soft-danger fs-12"><i
                                                    class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>5.02
                                                %</span> --}}
                                        </div>
                                        {{-- <p class="text-muted text-truncate mb-0">Projects this month</p> --}}
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-3">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span
                                            class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                            <i class="ri-gallery-line"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <p class="text-uppercase fw-medium text-muted mb-3">Total Portfolios</p>
                                        <div class="d-flex align-items-center mb-3">
                                            <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                    data-target="1500">0</span></h4>
                                            {{-- <span class="badge badge-soft-success fs-12"><i
                                                    class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58
                                                %</span> --}}
                                        </div>
                                        {{-- <p class="text-muted mb-0">Leads this month</p> --}}
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-3">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-info text-info rounded-2 fs-2">
                                            <i class="ri-message-fill"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden ms-3">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                            Total Testimonials</p>
                                        <div class="d-flex align-items-center mb-3">
                                            <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                data-target="1200">0</span></h4>
                                            {{-- <span class="badge badge-soft-danger fs-12"><i
                                                    class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>10.35
                                                %</span> --}}
                                        </div>
                                        {{-- <p class="text-muted text-truncate mb-0">Work this month</p> --}}
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-3">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-soft-info text-info rounded-2 fs-2">
                                            <i class="ri-service-fill"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden ms-3">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                            Total Services</p>
                                        <div class="d-flex align-items-center mb-3">
                                            <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                data-target="10">0</span></h4>
                                            {{-- <span class="badge badge-soft-danger fs-12"><i
                                                    class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>10.35
                                                %</span> --}}
                                        </div>
                                        {{-- <p class="text-muted text-truncate mb-0">Work this month</p> --}}
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>
                    </div><!-- end col -->
                </div>
            </div>
        </div>

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection
