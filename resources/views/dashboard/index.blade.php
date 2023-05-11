@extends('layouts.default')

@section('head-script')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('twitter-bootstrap5/5.0.1/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('datatables/1.11.4/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <script src="{{ asset('jquery/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('jquery/jquery-validate/1.19.0/jquery.validate.js') }}"></script>
    <script src="{{ asset('datatables/1.11.4/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bootstrap5/5.0.2/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('datatables/1.11.4/js/dataTables.bootstrap5.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('sweetalert2/dist/sweetalert2.min.css') }}">
    <script type="text/javascript" src="{{ asset('sweetalert2/dist/sweetalert2.min.js') }}"></script>
@endsection

@section('content')
    <x-navbars.sidebar activePage='dashboard'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Dashboard"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-6">
            <div class="row">
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="text-xl lg-0 text-capitalize">{{ $apparatus}}</i>

                            </div>
                            <div class="text-end pt-1">
                                <p class="text-lg mb-4 text-capitalize">Total of Apparatus Borrowing</p>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                <i class="text-xl mb-0 text-capitalize">{{ $breakages}}</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-lg mb-4 text-capitalize">Total of Breakages</p>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="text-xl mb-0 text-capitalize">{{$chemicals}}</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-lg mb-4 text-capitalize">Total of Chemicals Used</p>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">User-Lists</p>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                        </div>
                    </div>
                </div> --}}
            </div>
            {{-- <div class="row mt-4">
                <div class="col-lg-4 col-md-6 mt-4 mb-4">
                    <div class="card z-index-2 ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                                </div>
                            </div> --}}
                        </div>
                        {{-- <div class="card-body">
                            <h6 class="mb-0 ">Available Apparatus</h6>
                            <hr class="dark horizontal">
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mt-4 mb-4">
                    {{-- <div class="card z-index-2  ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                                </div>
                            </div> --}}
                        </div>
                        {{-- <div class="card-body">
                            <h6 class="mb-0 "> Available Chemicals</h6>
                            <hr class="dark horizontal">
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mb-3">
                    {{-- <div class="card z-index-2 ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                                </div>
                            </div> --}}
                        </div>
                        {{-- <div class="card-body">
                            <h6 class="mb-0 ">Breakages(Paid & Unpaid)</h6>
                            <hr class="dark horizontal">
                        </div> --}}
                    </div>
                </div>
            </div>
                  
            <div class="tab-pane fade" id="chemicals" role="tabpanel" aria-labelledby="chemicals-tab">
                <h3>Chemicals</h3>
                <table class="table table-chemicals">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">date_requested</th>
                        <th scope="col">date_to_be_used</th>
                        <th scope="col">chemical_name</th>
                        <th scope="col">quantity</th>
                      </tr>
                    </thead>
                </table>
            </div>
         
    <x-plugins></x-plugins>
@endsection

@section('body-script')
    {{-- <script src="{{ asset('materialUI/assets/js/plugins/chartjs.min.js') }}"></script> --}}



    {{--Apparatus Table  --}}
        <script type="text/javascript">
            $(function() {

                $('.table-apparatus').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('dashboard') }}",
                        columns: [
                            {data: 'id', name: 'id'},
                            {data: 'subject', name: 'subject'},
                            {data: 'course', name: 'course'},
                            {data: 'date_to_be_used', name: 'date_to_be_used'},
                            {data: 'group_no', name: 'group_no'},
                            {data: 'teacher', name: 'teacher'},
                            {data: 'experiment_no', name: 'expirement_no'},
                            {data: 'time', name: 'time'},
                            {data: 'items', name: 'items'},
                            {data: 'quantity', name: 'quantity'},
                            {data: 'remarks', name: 'remarks'}
                        ]
                });

            
            });
        </script>

            {{-- Breakages Table --}}
            <script type="text/javascript">
                $(function() {

                    $('.table-breakages').DataTable({
                            processing: true,
                            serverSide: true,
                            ajax: "{{ route('dashboard') }}",
                            columns: [
                                // {data: 'id', name: 'id'},
                                // {data: 'group_no', name: 'group_no'},
                                // // {data: 'requisition_id', name: 'requisition_id'},
                                // {data: 'quantity', name: 'quantity'},
                                // {data: 'datetime_paid', name: 'datetime_paid'},
                                // {data: 'statuscode', name: 'statuscode'}
                            ]
                    });

                
                });
            </script>
    @endsection
   
   
