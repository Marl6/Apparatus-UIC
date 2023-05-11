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
    <x-navbars.sidebar activePage='apparatus'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-navbars.navs.auth titlePage="apparatus"></x-navbars.navs.auth>
        <div class = "container-fluid py-5">
            <div class = "row">
                <div class = "me-3 my-3 text-end">
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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">course</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">date_to_be_used</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">teacher</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">time</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">items</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">quantity</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">remarks</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">Action</th>
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
                                <h1 class="modal-title fs-4" id="exampleModalLabel">Apparatus</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            {{-- <form method='POST' action='{{ route('addApparatus')}}'> --}}
                            <form id="addApparatusForm" onsubmit="saveApparatus(event)">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Subject</label>
                                                <input type="text" name="subject" class="form-control border border-2 p-2" required>
                                                @error('subject')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Course</label>
                                                <input type="text" name="course" class="form-control border border-2 p-2"  required>
                                                @error('course')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Year </label>
                                                <input type="text" name="year" class="form-control border border-2 p-2"  required>
                                                @error('year')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Section</label>
                                                <input type="text" name="section" class="form-control border border-2 p-2"  required>
                                                @error('section')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Date to be used</label>
                                                <input type="date" name="date_to_be_used" class="form-control border border-2 p-2" required>
                                                @error('date_to_be_used')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Group No</label>
                                                <input type="text" name="group_no" class="form-control border border-2 p-2" required>
                                                @error('group_no')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Teacher</label>
                                                <input type="text" name="teacher" class="form-control border border-2 p-2"  required>
                                                @error('teacher')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Experiment No</label>
                                                <input type="number" name="experiment_no" class="form-control border border-2 p-2" required>
                                                @error('experiment_no')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Time</label>
                                                <input type="time" name="time" class="form-control border border-2 p-2" required>
                                                @error('time')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Items</label>
                                                <input type="text" name="items" class="form-control border border-2 p-2"  required>
                                                @error('items')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Quantity</label>
                                                <input type="number" name="quantity" class="form-control border border-2 p-2"  required>
                                                @error('quantity')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Remarks</label>
                                                <input type="text" name="remarks" class="form-control border border-2 p-2" required>
                                                @error('remarks')
                                                <p class='text-danger inputerror'>{{ $message }} </p>
                                                @enderror
                                            </div>
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
        <!--EDIT and Update Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                     {{-- onsubmit="saveApparatus(event) --}}
                     <form action="{{ route('updateApparatus')}}" method="post"  id="updateApparatusForm" >
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="row">
                                    <input type="hidden" name="id" class="form-control border border-2 p-2 " id="id" required>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Subject</label>
                                        <input type="text" name="subject" class="form-control border border-2 p-2"  id="subject_edit" required>
                                        @error('subject')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Course</label>
                                        <input type="text" name="course" class="form-control border border-2 p-2" id="course_edit" required>
                                        @error('course')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Year </label>
                                        <input type="text" name="year" class="form-control border border-2 p-2" id="year_edit" required>
                                        @error('year')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Section</label>
                                        <input type="text" name="section" class="form-control border border-2 p-2" id="section_edit" required>
                                        @error('section')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Date to be used</label>
                                        <input type="date" name="date_to_be_used" class="form-control border border-2 p-2" id="date_to_be_used_edit" required>
                                        @error('date_to_be_used')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Group No</label>
                                        <input type="text" name="group_no" class="form-control border border-2 p-2" id="group_no_edit" required>
                                        @error('group_no')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Teacher</label>
                                        <input type="text" name="teacher" class="form-control border border-2 p-2" id="teacher_edit" required>
                                        @error('teacher')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Experiment No</label>
                                        <input type="number" name="experiment_no" class="form-control border border-2 p-2" id="experiment_no_edit" required>
                                        @error('experiment_no')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Time</label>
                                        <input type="time" name="time" class="form-control border border-2 p-2" id="time_edit" required>
                                        @error('time')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Items</label>
                                        <input type="text" name="items" class="form-control border border-2 p-2" id="items_edit" required>
                                        @error('items')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Quantity</label>
                                        <input type="number" name="quantity" class="form-control border border-2 p-2" id="quantity_edit" required>
                                        @error('quantity')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Remarks</label>
                                        <input type="text" name="remarks" class="form-control border border-2 p-2" id="remarks_edit">
                                        @error('remarks')
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
                        'remarks': form.get('remarks') ?? null
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

                function updateBtn(apparatus_id) {
                    const id = apparatus_id;
                    const form = document.getElementById("updateApparatusForm").getElementsByTagName('input');

                    $.ajax({
                        url: "{{ url('/apparatus/edit') }}" + '/' + id,
                        type: "GET",
                        success: function(response) {
                            console.log(response.data);
                            $('#id').val(id);
                            $('#subject_edit').val(response.data.subject);
                            $('#course_edit').val(response.data.course);
                            $('#year_edit').val(response.data.year);
                            $('#section_edit').val(response.data.section);
                            $('#date_to_be_used_edit').val(response.data.date_to_be_used);
                            $('#group_no_edit').val(response.data.group_no);
                            $('#experiment_no_edit').val(response.data.experiment_no);
                            $('#time_edit').val(response.data.time);
                            $('#items_edit').val(response.data.items);
                            $('#quantity_edit').val(response.data.quantity);
                            $('#remarks_edit').val(response.data.remarks);
							$('#teacher_edit').val(response.data.teacher);
                          
                        }
                    });
                }
                $( "#updatebutton" ).click(function() {
                    // alert( "update" );
                    $.ajax({
                        url: "{{ url('/apparatus/edit') }}" + '/' + id,
                        type: "GET",
                        success: function(response) {
                            console.log(response.data);
                            $('#subject_edit').val(response.data.subject);
                            $('#course_edit').val(response.data.course);
                            $('#year_edit').val(response.data.year);
                            $('#section_edit').val(response.data.section);
                            $('#date_to_be_used_edit').val(response.data.date_to_be_used);
                            $('#group_no_edit').val(response.data.group_no);
                            $('#experiment_no_edit').val(response.data.experiment_no);
                            $('#time_edit').val(response.data.time);
                            $('#items_edit').val(response.data.items);
                            $('#quantity_edit').val(response.data.quantity);
                            $('#remarks_edit').val(response.data.remarks);
                            $('#teacher_edit').val(response.data.teacher);
                        }

                        });
                    });


                function deleteBtn(apparatus_id) {
                    const id = apparatus_id;

                    // console.log(id);
                    $.ajax({
                        type: "POST",
                        url: "/apparatus/delete",
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


