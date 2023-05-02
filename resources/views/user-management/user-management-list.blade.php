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
        <x-navbars.sidebar activePage='user-management'></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
            <x-navbars.navs.auth titlePage="user-management"></x-navbars.navs.auth>
            <div class = "container-fluid py-5">
                <div class = "row">
                    <div class = "me-3 my-3 text-end">
                        <a class="btn bg-gradient-dark mb-0" href=""data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add User</a>
                    </div>

                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">

                        </div>
                    </div>

                     <!-- DATA TABLE -->
                    <div class="col-lg-12 col-md-6 mb-md-1 mb-1">
                        <div class="card">
                            <div class="card-header pb-0">
                                <table id="data-table" class="tables table align-items-center mb-0 data_tables">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">id</th>
                                            <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-3">name</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-5">email</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-5">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- ADD Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-4" id="exampleModalLabel">User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method='POST' action='{{ route('addUser')}}'>
                                @csrf
                                <div class="row">

                                    <div class="row">

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Group No</label>
                                            <input type="number" name="group_no" class="form-control border border-2 p-2" value='{{ old('group_no', auth()->user()->group_no) }}' required>
                                            @error('group_no')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Requisition ID</label>
                                            <input type="number" name="requisition_id" class="form-control border border-2 p-2" value='{{ old('requisition_id', auth()->user()->requisition_id) }}' required>
                                            @error('requisition_id')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                        </div>


                                        <div class="mb-3 col-md-6">
                                        <label class="form-label">Quantity</label>
                                        <input type="number" name="quantity" class="form-control border border-2 p-2" value='{{ old('quantity', auth()->user()->quantity) }}' required>
                                        @error('quantity')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Amount</label>
                                            <input type="text" name="amount" class="form-control border border-2 p-2" value='{{ old('amount', auth()->user()->amount) }}' required>
                                            @error('amount')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Date</label>
                                            <input type="date" name="datetime_added" class="form-control border border-2 p-2" value='{{ old('datetime_added', auth()->user()->datetime_added) }}' required>
                                            @error('date')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Status Code</label>
                                            <input type="text" name="statuscode" class="form-control border border-2 p-2" value='{{ old('statuscode', auth()->user()->statuscode) }}' required>
                                            @error('statuscode')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                        </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
                </div>

                <!-- EDIT Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            {{-- onsubmit="saveBreakages(event) --}}
                            <form action="{{ route('updateBreakages')}}" method="post"  id="updateBreakagesForm" >
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="row">
                                            <input type="hidden" name="id" class="form-control border border-2 p-2 " id="id">

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Group No</label>
                                                <input type="number" name="group_no" class="form-control border border-2 p-2"  id="group_no_edit" required>
                                                @error('group_no')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Requisition ID</label>
                                                <input type="number" name="requisition_id" class="form-control border border-2 p-2"  id="requisition_id_edit" required>
                                                @error('requisition_id')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>


                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Quantity</label>
                                                <input type="number" name="quantity" class="form-control border border-2 p-2"  id="quantity_edit" required>
                                                @error('quantity')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Amount</label>
                                                <input type="text" name="amount" class="form-control border border-2 p-2"  id="amount_edit" required>
                                                @error('amount')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Date</label>
                                                <input type="date" name="datetime_added" class="form-control border border-2 p-2"  id="datetime_added_edit" required>
                                                @error('date')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Status Code</label>
                                                <input type="text" name="statuscode" class="form-control border border-2 p-2"  id="statuscode_edit" required>
                                                @error('statuscode')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="updatebutton">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </main>

    @endsection

    @section('body-script')
        <script type="text/javascript">
            $(function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var table = $('.data_tables').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('user_management') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });


                function refereshTable () {
                    $('#data-table').DataTable().ajax.reload();
                }
            });
        </script>
    @endsection

