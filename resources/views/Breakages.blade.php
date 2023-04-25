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
        <link rel="stylesheet" href="{{asset('sweetalert2/dist/sweetalert2.min.css')}}">
        <script type="text/javascript" src="{{asset('sweetalert2/dist/sweetalert2.min.js')}}"></script>
    @endsection

    @section('content')
    <x-navbars.sidebar activePage='Breakages'></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
            <x-navbars.navs.auth titlePage="Breakages"></x-navbars.navs.auth>
            <div class = "container-fluid py-5">
                <div class = "row">
                    <div class = "me-3 my-3 text-end">
                        <a class="btn bg-gradient-dark mb-0" href=""data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Breakages</a>
                    </div>

                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">

                        </div>
                    </div>

                     <!-- DATA TABLE -->
                    <div class="col-lg-12 col-md-6 mb-md-1 mb-1">
                        <div class="card">
                            <div class="card-header pb-0">
                                <table id="data-table" class="table table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">id</th>
                                            <th class="text-secondary text-xxs font-weight-bolder opacity-7 ps-1">group_no</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">requisition_id</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">quantity</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">amount</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">datetime_added</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">datetime_update</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">statuscode</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
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
                            <h1 class="modal-title fs-4" id="exampleModalLabel">Breakages</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method='POST' action='{{ route('addBreakages')}}'>
                                    @csrf
                                    <div class="row">

                                        <div class="row">

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Group No</label>
                                                <input type="number" name="group_no" class="form-control border border-2 p-2" value='{{ old('group_no', auth()->user()->group_no) }}'>
                                                @error('group_no')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Requisition ID</label>
                                                <input type="number" name="requisition_id" class="form-control border border-2 p-2" value='{{ old('requisition_id', auth()->user()->requisition_id) }}'>
                                                @error('requisition_id')
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
                                                <label class="form-label">Amount</label>
                                                <input type="text" name="amount" class="form-control border border-2 p-2" value='{{ old('amount', auth()->user()->amount) }}'>
                                                @error('amount')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Date</label>
                                                <input type="date" name="datetime_added" class="form-control border border-2 p-2" value='{{ old('datetime_added', auth()->user()->datetime_added) }}'>
                                                @error('date')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Status Code</label>
                                                <input type="text" name="statuscode" class="form-control border border-2 p-2" value='{{ old('statuscode', auth()->user()->statuscode) }}'>
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
                                                    <input type="number" name="group_no" class="form-control border border-2 p-2"  id="group_no_edit">
                                                    @error('group_no')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Requisition ID</label>
                                                    <input type="number" name="requisition_id" class="form-control border border-2 p-2"  id="requisition_id_edit">
                                                    @error('requisition_id')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                    @enderror
                                                </div>


                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Quantity</label>
                                                    <input type="number" name="quantity" class="form-control border border-2 p-2"  id="quantity_edit">
                                                    @error('quantity')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Amount</label>
                                                    <input type="text" name="amount" class="form-control border border-2 p-2"  id="amount_edit">
                                                    @error('amount')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Date</label>
                                                    <input type="date" name="datetime_added" class="form-control border border-2 p-2"  id="datetime_added_edit">
                                                    @error('date')
                                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                                    @enderror
                                                </div>

                                                <div class="mb-3 col-md-6">
                                                    <label class="form-label">Status Code</label>
                                                    <input type="text" name="statuscode" class="form-control border border-2 p-2"  id="statuscode_edit">
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

            </main>
            </div>
        @endsection

        @section('body-script')
            <script type="text/javascript">
                $(function () {

                //  DATA TABLE
                    var table = $('#data-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('Breakages') }}",
                        columns: [
                            {data: 'id', name: 'id'},
                            {data: 'group_no', name: 'group_no'},
                            {data: 'requisition_id', name: 'requisition_id'},
                            {data: 'quantity', name: 'quantity'},
                            {data: 'amount', name: 'amount'},
                            {data: 'datetime_added', name: 'datetime_added'},
                            {data: 'datetime_update', name: 'datetime_update'},
                            {data: 'statuscode', name: 'statuscode'},
                            {data: 'action', name: 'action', orderable: false, searchable: false},
                        ]
                    });
                });
                function refereshTable () {
                    $('#data-table').DataTable().ajax.reload();
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                function saveBreakages(e) {
                    e.preventDefault();
                    const form = new FormData(e.target);

                    //  DATA TABLE
                    let data = {
                        'group_no': form.get('group_no') ?? null,
                        'requisition_id': form.get('requisition_id')  ?? null,
                        'quantity': form.get('quantity')  ?? null,
                        'amount': form.get('amount')  ?? null,
                        'datetime_added': form.get('datetime_added')  ?? null,
                        'datetime_update': form.get('datetime_update')  ?? null,
                        'statuscode': form.get('statuscode')  ?? null,
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
                                url: "{{ route('addBreakages') }}",
                                type: "POST",
                                data: data,
                                success: function(response) {
                                    if(response.success) {
                                        Swal.fire({
                                            title: "Breakages Added",
                                            text: response.message,
                                            icon: "success"
                                        }).then(function(value) {
                                            if(value){
                                                document.getElementById("addBreakagesForm").reset();
                                                // $('#addModal').modal('hide');
                                                refereshTable();
                                            }
                                        });
                                    }
                                }
                            })
                        } else if(result.isDismissed) {
                            document.getElementById("addBreakagesForm").reset();
                            // $('#addModal').modal('hide');
                            Swal.fire({
                                title: "Cancelled",
                                text: "Breakages was not added.",
                                icon: "info"
                            });
                        }
                    });
                }

                function updateBtn(breakages_id) {
                    const id = breakages_id;
                    const form = document.getElementById("updateBreakagesForm").getElementsByTagName('input');
                    console.log(form.length);
                    $.ajax({
                        url: "{{ url('/breakages/edit') }}" + '/' + id,
                        type: "GET",
                        success: function(response) {
                            console.log(response.data);
                            $('#id').val(id);
                            $('#group_no_edit').val(response.data.group_no);
                            $('#requisition_id_edit').val(response.data.requisition_id);
                            $('#quantity_edit').val(response.data.quantity);
                            $('#amount_edit').val(response.data.amount);
                            $('#datetime_added_edit').val(response.data.datetime_added);
                            $('#datetime_update_edit').val(response.data.datetime_update);
                            $('#statuscode_edit').val(response.data.statuscode);
                        }
                    });
                }

                $( "#updatebutton" ).click(function() {
                    // alert( "update" );
                    $.ajax({
                        url: "{{ url('/breakages/edit') }}" + '/' + id,
                        type: "GET",
                        success: function(response) {
                            console.log(response.data);
                            $('#group_no_edit').val(response.data.group_no);
                            $('#requisition_id_edit').val(response.data.requisition_id);
                            $('#quantity_edit').val(response.data.quantity);
                            $('#amount_edit').val(response.data.amount);
                            $('#datetime_added_edit').val(response.data.datetime_added);
                            $('#datetime_update_edit').val(response.data.datetime_update);
                            $('#statuscode_edit').val(response.data.statuscode);

                        }
                    });
                });
                function deleteBtn(breakages_id) {
                    const id = breakages_id;

                    // console.log(id);
                    $.ajax({
                        type: "POST",
                        url: "/breakages/delete",
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

