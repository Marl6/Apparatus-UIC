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
    <x-navbars.sidebar activePage='returnHistory'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-navbars.navs.auth titlePage="Apparatus Return History"></x-navbars.navs.auth>
        <div class = "container-fluid py-5">
            <div class = "row">
                {{--<div class = "me-3 my-3 text-end">
                    <a class="btn bg-gradient-dark mb-0" href="" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Item</a>
                </div>

                {{-- <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">

                    </div>
                </div> --}}
                <!-- TABLE -->
                <div class="col-lg-25 col-md-30 mb-md-5 mb-1">
                    <div class="card">
                        <div class="card-header pb-0">
                            <table id="data-table" class="table table-responsive align-items-center mb-1">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">id</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">subject</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">program_&_section</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">date_to_be_used</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">teacher</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">time</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">items</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">quantity</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">status</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">remarks</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">prepared by</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

    <!-- DATA TABLE -->
    @section('body-script')
        <script type="text/javascript">
            // $(document).ready(function() {

                $(function () {
                    initTable();
                });

                function initTable () {
                    $('#data-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('returnHistory') }}",
                        columns: [
                            {data: 'id', name: 'id'},
                            {data: 'subject', name: 'subject'},
                            {data: 'course', name: 'course'},
                            {data: 'date_to_be_used', name: 'date_to_be_used'},
                            {data: 'teacher', name: 'teacher'},
                            {data: 'time', name: 'time'},
                            {data: 'items', name: 'items'},
                            {data: 'quantity', name: 'quantity'},
                            {data: 'borrow_status', name: 'borrow_status'},
                            {data: 'remarks', name: 'remarks'},
                            {data: 'prepared_by', name: 'prepared_by'},                            
                        ]
                    });
                }

                function refereshTable () {
                    $('#data-table').DataTable().ajax.reload();
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                function saveApparatus(e) {
                    e.preventDefault();
                    const form = new FormData(e.target);

                    //  DATA TABLE
                    let data = {
                        'subject': form.get('subject') ?? null,
                        'course': form.get('course')  ?? null,
                        'year': form.get('year')  ?? null,
                        'section': form.get('section')  ?? null,
                        'date_to_be_used': form.get('date_to_be_used')  ?? null,
                        'group_no': form.get('group_no')  ?? null,
                        'teacher': form.get('teacher')  ?? null,
                        'experiment_no': form.get('experiment_no')  ?? null,
                        'time': form.get('time')  ?? null,
                        'items': form.get('items')  ?? null,
                        'quantity': form.get('quantity')  ?? null,
                        'borrow_status': form.get('borrow_status')  ?? null,
                        'remarks': form.get('remarks') ?? null,
                        'prepared_by': form.get('prepared_by') ?? null
                    };

                    console.log(data.time);

                    Swal.fire({
                        title: 'Confirmation',
                        icon: 'info',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Add'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('addApparatus') }}",
                                type: "POST",
                                data: data,
                                success: function(response) {
                                    if(response.success) {
                                        Swal.fire({
                                            title: "Apparatus Added",
                                            text: response.message,
                                            icon: "success"
                                        }).then(function(value) {
                                            if(value){
                                                document.getElementById("addApparatusForm").reset();
                                                // $('#addModal').modal('hide');
                                                refereshTable();
                                            }
                                        });
                                    }
                                }
                            })
                        } else if(result.isDismissed) {
                            document.getElementById("addApparatusForm").reset();
                            // $('#addModal').modal('hide');
                            Swal.fire({
                                title: "Cancelled",
                                text: "Apparatus was not added.",
                                icon: "info"
                            });
                        }
                    });
                }
        </script>
    @endsection


