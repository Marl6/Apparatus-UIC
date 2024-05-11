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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                                <p class="text-lg mb-3 text-capitalize">Total Apparatus Borrowed</p>
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
                                <p class="text-lg mb-4 text-capitalize">Total Breakages</p>
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
                                <p class="text-lg mb-4 text-capitalize">Chemicals Used</p>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
                        </div>
                    </div>
                </div>
            </div>


            {{-- CHARTs --}}
            <!-- Spacer -->
            <hr class="my-4">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <h3 class="card-title mb-0">Borrowings per Program</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="borrowingsChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            {{-- TABLE --}}
            <hr class="my-4">
            <div class="row">
                <div class="mt-4">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="apparatus-tab" data-bs-toggle="tab" data-bs-target="#apparatus" type="button" role="tab" aria-controls="apparatus" aria-selected="true">Apparatus</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="breakages-tab" data-bs-toggle="tab" data-bs-target="#breakages" type="button" role="tab" aria-controls="breakages" aria-selected="false">Breakages</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="chemicals-tab" data-bs-toggle="tab" data-bs-target="#chemicals" type="button" role="tab" aria-controls="chemicals" aria-selected="false">Chemicals</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="apparatus" role="tabpanel" aria-labelledby="apparatus-tab">
                    <div class="card-header pb-0">
                        <h3 class="card-title mb-0">Apparatus</h3>
                    </div>
                    {{-- <table class="table table-apparatus" id="table-apparatus">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Course</th>
                            <th scope="col">Date to be used</th>
                            <th scope="col">Group No</th>
                            <th scope="col">Teacher</th>
                            <th scope="col">Experiment No</th>
                            <th scope="col">Time</th>
                            <th scope="col">Items</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Remarks</th>
                          </tr>
                        </thead>         
                    </table> --}}
                    <div class="col-lg-25 col-md-30 mb-md-5 mb-1">
                        <div class="card">
                            <div class="card-header pb-0">
                                <table id="table-apparatus" class="table table-responsive align-items-center mb-1">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">id</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">subject</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">course</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">date_to_be_used</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">teacher</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">time</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">items</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">quantity</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">remarks</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="breakages" role="tabpanel" aria-labelledby="breakages-tab">
                    <div class="card-header pb-0">
                        <h3 class="card-title mb-0">Breakages</h3>
                    </div>
                    <div class="col-lg-25 col-md-30 mb-md-5 mb-1">
                        <div class="card">
                            <div class="card-header pb-0">
                            <table id="table-breakages" class="table table-chemicals align-items-center mb-1">
                                <thead>
                                    <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">id</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">group_no</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">group_leader</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">requisition_id</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">quantity</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">amount</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">datetime_paid</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">status</th>
                                    </tr>
                                </thead>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="chemicals" role="tabpanel" aria-labelledby="chemicals-tab">
                    <div class="card-header pb-0">
                        <h3 class="card-title mb-0">Chemicals</h3>
                    </div>
                    <div class="col-lg-25 col-md-30 mb-md-5 mb-1">
                        <div class="card">
                            <div class="card-header pb-0">
                                <table id="table-chemicals" class="table table-chemicals align-items-center mb-1">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">id</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">date_requested</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">date_to_be_used</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">chemical_name</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">quantity</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <x-plugins></x-plugins>
@endsection

@section('body-script')
    {{-- <script src="{{ asset('materialUI/assets/js/plugins/chartjs.min.js') }}"></script> --}}

    {{--Apparatus Table  --}}
    <script type="text/javascript">
        $(function() {
            $('#table-apparatus').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('apparatus') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'subject', name: 'subject'},
                    {data: 'course', name: 'course'},
                    {data: 'date_to_be_used', name: 'date_to_be_used'},
                    {data: 'teacher', name: 'teacher'},
                    {data: 'time', name: 'time'},
                    {data: 'items', name: 'items'},
                    {data: 'quantity', name: 'quantity'},
                    {data: 'remarks', name: 'remarks'},
                    // {data: 'action', name: 'action', orderable: false, searchable: false},

                ]
            });

            $('#table-breakages').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('Breakages') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'group_no', name: 'group_no'},
                        {data: 'group_leader', name: 'group_leader'},
                        {data: 'requisition_id', name: 'requisition_id'},
                        {data: 'quantity', name: 'quantity'},
                        {data: 'amount', name: 'amount'},
                        {data: 'datetime_paid', name: 'datetime_paid'},
                        {data: 'statuscode', name: 'statuscode'}
                    ]
            });
            $('#table-chemicals').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('chemicals') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'date_requested', name: 'date_requested'},
                    {data: 'date_to_be_used', name: 'date_to_be_used'},
                    {data: 'chemical_name', name: 'chemical_name'},
                    {data: 'quantity', name: 'quantity'},
                    // {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        
        });
    </script>
@endsection
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script defer>
   document.onreadystatechange = function () {
    if (document.readyState == "interactive") {
    console.log("{{ route('dashboard') }}");
    axios.get("{{ route('dashboardSum') }}")
        .then(response => {
            console.log('Response:', response);
            const data = response.data;
            console.log(data);
            // Extract data
            const labels = Object.keys(data.borrowingsData);
            const dataValues = Object.values(data.borrowingsData);
            console.log('Labels:', labels);
            console.log('Data Values:', dataValues);

            // Define an array of colors
        const colors = ['rgba(255, 99, 132, 0.7)', 'rgba(54, 162, 235, 0.7)', 'rgba(255, 206, 86, 0.7)', 'rgba(75, 192, 192, 0.7)', 'rgba(153, 102, 255, 0.7)']; // Add more colors as needed

        // Create Chart
        console.log('asdf')
        console.log(document.getElementById('borrowingsChart'));
        const ctx = document.getElementById('borrowingsChart');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Borrowings',
                    data: dataValues,
                    backgroundColor: colors, // Use the colors array here
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    
        })
        .catch(error => {
            console.error('Error fetching dashboard data:', error);
        });
    } 
}
</script>