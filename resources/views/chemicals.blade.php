@extends('layouts.default')

    @section('head-script')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    @endsection

    @section('content')
    <x-navbars.sidebar activePage='chemicals'></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
            <x-navbars.navs.auth titlePage="chemicals"></x-navbars.navs.auth>
            <div class = "container-fluid py-5">
                <div class = "row">
                    <div class = "me-3 my-3 text-end">
                        <a class="btn bg-gradient-dark mb-0" href="" data-bs-toggle="modal" data-bs-target="#addModal">
                            <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Chemicals</a>
                    </div>

                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">

                        </div>
                    </div>

                    <div class="col-lg-12 col-md-6 mb-md-0 mb-1">
                        <div class="card">
                            <div class="card-header pb-0">
                                <table id="data-table" class="table table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">date_requested</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">date_to_be_used</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">chemical_name</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">quantity</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">requested_by</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">prepared_by</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- ADD Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-4" id="exampleModalLabel">Chemicals</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method='POST' action='{{ route('addChemicals')}}'>
                                @csrf
                                <div class="row">

                                    <div class="row">

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Date Requested</label>
                                            <input type="date" name="date_requested" class="form-control border border-2 p-2" value='{{ old('date_requested', auth()->user()->date_requested) }}'>
                                            @error('date_requested')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">date To Be Used</label>
                                            <input type="date" name="date_to_be_used" class="form-control border border-2 p-2" value='{{ old('date_to_be_used', auth()->user()->date_to_be_used) }}'>
                                            @error('date_to_be_used')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                        </div>

                                        <div class="mb-3 col-md-6">
                                        <label class="form-label">Chemical Name </label>
                                        <input type="text" name="chemical" class="form-control border border-2 p-2" value='{{ old('chemical', auth()->user()->chemical) }}'>
                                        @error('chemical')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Quantity</label>
                                            <input type="number" name="quantity" class="form-control border border-2 p-2" value='{{ old('quantity', auth()->user()->quantity) }}'>
                                            @error('quantity')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Requested By</label>
                                            <input type="text" name="requested_by" class="form-control border border-2 p-2" value='{{ old('requested_by', auth()->user()->requested_by) }}'>
                                            @error('requested_by')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Prepared By</label>
                                            <input type="text" name="prepared_by" class="form-control border border-2 p-2" value='{{ old('prepared_by', auth()->user()->prepared_by) }}'>
                                            @error('prepared_by')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                        </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Item</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>

            </div>

            <!--EDIT Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="row">

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Date Requested</label>
                            <input type="date" name="date_requested" class="form-control border border-2 p-2" value='{{ old('date_requested', auth()->user()->date_requested) }}'>
                            @error('date_requested')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Date_To_Be_Used</label>
                            <input type="date" name="date_requested" class="form-control border border-2 p-2" value='{{ old('date_requested', auth()->user()->date_requested) }}'>
                            @error('date_requested')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Chemical Name</label>
                            <input type="text" name="date_requested" class="form-control border border-2 p-2" value='{{ old('date_requested', auth()->user()->date_requested) }}'>
                            @error('date_requested')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Quantity</label>
                            <input type="number" name="date_requested" class="form-control border border-2 p-2" value='{{ old('date_requested', auth()->user()->date_requested) }}'>
                            @error('date_requested')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Requested_By</label>
                            <input type="text" name="date_requested" class="form-control border border-2 p-2" value='{{ old('date_requested', auth()->user()->date_requested) }}'>
                            @error('date_requested')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Prepared By</label>
                            <input type="text" name="date_requested" class="form-control border border-2 p-2" value='{{ old('date_requested', auth()->user()->date_requested) }}'>
                            @error('date_requested')
                        <p class='text-danger inputerror'>{{ $message }} </p>
                        @enderror

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>

        </main>
        </div>
    @endsection

    @section('body-script')
        <script type="text/javascript">
            $(function () {

                var table = $('#data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('chemicals') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'date_requested', name: 'date_requested'},
                        {data: 'date_to_be_used', name: 'date_to_be_used'},
                        {data: 'chemical_name', name: 'chemical_name'},
                        {data: 'quantity', name: 'quantity'},
                        {data: 'requested_by', name: 'requested'},
                        {data: 'prepared_by', name: 'prepared_by'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });

                $(document).on('click','.editBtn', function (e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    $('#editModal').modal('show');
                    console.log(id);

                    $.ajax({
                        url: '/chemicals/'+id,
                        type: "GET",
                        success: function (response) {

                            }

                    });

                });
            });
        </script>
    @endsection











