@extends('layouts.default')

    @section('head-script')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="{{asset('sweetalert2/dist/sweetalert2.min.css')}}">
    <script type="text/javascript" src="{{asset('sweetalert2/dist/sweetalert2.min.js')}}"></script> --}}

    <link href="{{ asset('twitter-bootstrap5/5.0.1/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('datatables/1.11.4/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
    <script src="{{ asset('jquery/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('jquery/jquery-validate/1.19.0/jquery.validate.js') }}"></script>
    <script src="{{ asset('datatables/1.11.4/js/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('bootstrap5/5.0.2/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('datatables/1.11.4/js/dataTables.bootstrap5.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('sweetalert2/dist/sweetalert2.min.css') }}">
    <script type="text/javascript" src="{{ asset('sweetalert2/dist/sweetalert2.min.js') }}"></script>
    @endsection

    @section('content')
    <x-navbars.sidebar activePage='chemicals'></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
            <x-navbars.navs.auth titlePage="Chemicals"></x-navbars.navs.auth>
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
                    <!-- DATA TABLE -->
                    <div class="col-lg-12 col-md-6 mb-md-0 mb-1">
                        <div class="card">
                            <div class="card-header pb-0">
                                <table id="data-table" class="table table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">id</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">date_requested</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">date_to_be_used</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">chemical_name</th>
                                            <th class="uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">quantity</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">requested_by</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">prepared_by</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Action</th>
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
                                            <input type="text" name="date_requested" class="form-control border border-2 p-2" value='{{ date("m/d/Y") }}' readonly required>
                                            @error('date_requested')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                        </div>


                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Date To Be Used</label>
                                                <input type="date" name="date_to_be_used" class="form-control border border-2 p-2" value='{{ old('date_to_be_used', auth()->user()->date_to_be_used) }}' required>
                                                @error('date_to_be_used')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                            <label class="form-label">Chemical Name </label>
                                            <input type="text" name="chemical" class="form-control border border-2 p-2" value='{{ old('chemical', auth()->user()->chemical) }}' required>
                                            @error('chemical')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Quantity</label>
                                                <input type="number" name="quantity" class="form-control border border-2 p-2" value='{{ old('quantity', auth()->user()->quantity) }}' required oninput="this.value = Math.abs(this.value)">
                                                @error('quantity')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Requested By</label>
                                                <input type="text" name="requested_by" class="form-control border border-2 p-2" value='{{ old('requested_by', auth()->user()->requested_by) }}' required>
                                                @error('requested_by')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Prepared By</label>
                                                <input type="text" name="prepared_by" class="form-control border border-2 p-2" value='{{ old('prepared_by', auth()->user()->name) }}' readonly required>
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


                <!-- EDIT Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            {{-- onsubmit="saveChemicals(event) --}}
                            <form action="{{ route('updateChemicals')}}" method="post"  id="updateChemicalsForm" >
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="row">
                                            <input type="hidden" name="id" class="form-control border border-2 p-2 " id="id">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Date Requested</label>
                                                <input type="date" name="date_requested" class="form-control border border-2 p-2 " id="date_requested_edit" required>
                                                @error('date_requested')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">date to be Used</label>
                                                <input type="date" name="date_to_be_used" class="form-control border border-2 p-2" id="date_to_be_used_edit" required>
                                                @error('date_to_be_used')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Chemical Name</label>
                                                <input type="text" name="chemical_name" class="form-control border border-2 p-2 " id="chemical_name_edit" required>
                                                @error('chemical_name')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Quantity</label>
                                                <input type="number" name="quantity" class="form-control border border-2 p-2" id="quantity_edit" required oninput="this.value = Math.abs(this.value)">
                                                @error('quantity')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Requested By</label>
                                                <input type="text" name="requested_by" class="form-control border border-2 p-2" id="requested_by_edit" required>
                                                @error('requested_by')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Prepared By</label>
                                                <input type="text" name="prepared_by" class="form-control border border-2 p-2" id="prepared_by_edit" required>
                                                @error('prepared_by')
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

    @endsection

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
                        ajax: "{{ route('chemicals') }}",
                        columns: [
                            {data: 'id', name: 'id'},
                            {data: 'date_requested', name: 'date_requested'},
                            {data: 'date_to_be_used', name: 'date_to_be_used'},
                            {data: 'chemical_name', name: 'chemical_name'},
                            {data: 'quantity', name: 'quantity'},
                            {data: 'requested_by', name: 'requested_by'},
                            {data: 'prepared_by', name: 'prepared_by'},
                            {data: 'action', name: 'action', orderable: false, searchable: false},
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

                function saveChemicals(e) {
                    e.preventDefault();
                    const form = new FormData(e.target);

                    //  DATA TABLE
                    let data = {
                        'date_requested': form.get('date_requested') ?? null,
                        'date_to_be_used': form.get('date_to_be_used')  ?? null,
                        'chemical_name': form.get('chemical_name')  ?? null,
                        'quantity': form.get('quantity')  ?? null,
                        'requested_by': form.get('requested_by')  ?? null,
                        'prepared_by': form.get('prepared_by')  ?? null,
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
                                url: "{{ route('addChemicals') }}",
                                type: "POST",
                                data: data,
                                success: function(response) {
                                    if(response.success) {
                                        Swal.fire({
                                            title: "Chemicals Added",
                                            text: response.message,
                                            icon: "success"
                                        }).then(function(value) {
                                            if(value){
                                                document.getElementById("addChemicalsForm").reset();
                                                // $('#addModal').modal('hide');
                                                refereshTable();
                                            }
                                        });
                                    }
                                }
                            })


                        } else if(result.isDismissed) {
                            document.getElementById("addChemicalsForm").reset();
                            // $('#addModal').modal('hide');
                            Swal.fire({
                                title: "Cancelled",
                                text: "Chemicals was not added.",
                                icon: "info"
                            });
                        }
                    });
                }
            // <!-- FOR UPDATE DATA BUTTON -->
                function updateBtn(chemicals_id) {
                    const id = chemicals_id;
                    const form = document.getElementById("updateChemicalsForm").getElementsByTagName('input');
                    console.log(form.length);
                    $.ajax({
                        url: "{{ url('/chemicals/edit') }}" + '/' + id,
                        type: "GET",
                        success: function(response) {
                            console.log(response.data);
                            $('#id').val(id);
                            $('#date_requested_edit').val(response.data.date_requested);
                            $('#date_to_be_used_edit').val(response.data.date_to_be_used);
                            $('#chemical_name_edit').val(response.data.chemical_name);
                            $('#quantity_edit').val(response.data.quantity);
                            $('#requested_by_edit').val(response.data.requested_by);
                            $('#prepared_by_edit').val(response.data.prepared_by);


                        }
                    });
                }

                $( "#updatebutton" ).click(function() {
                    // alert( "update" );
                    $.ajax({
                        url: "{{ url('/chemicals/edit') }}" + '/' + id,
                        type: "GET",
                        success: function(response) {
                            console.log(response.data);
                            $('#date_requested_edit').val(response.data.date_requested);
                            $('#date_to_be_used_edit').val(response.data.date_to_be_used);
                            $('#chemical_name_edit').val(response.data.chemical_name);
                            $('#quantity_edit').val(response.data.quantity);
                            $('#requested_by_edit').val(response.data.requested_by);
                            $('#prepared_by_edit').val(response.data.prepared_by);
                        }
                    });
                });

                function deleteBtn(chemicals_id) {
                    const id = chemicals_id;

                    // console.log(id);
                    $.ajax({
                        type: "POST",
                        url: "/chemicals/delete",
                        data: { id: id },
                        success: function(response) {
                            if(response.success) {
                                Swal.fire({
                                    title: "Deleted",
                                    text: response.message,
                                    icon: "success"
                                }).then(function(value) {
                                    if(value){
                                        refereshTable();
                                    }
                                });

                            }
                        }
                    })
                }
    </script>
    @endsection











