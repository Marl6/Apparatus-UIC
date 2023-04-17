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
    <x-navbars.sidebar activePage='apparatus'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-navbars.navs.auth titlePage="apparatus"></x-navbars.navs.auth>
        <div class = "container-fluid py-5">
            <div class = "row">
                <div class = "me-3 my-3 text-end">
                    <a class="btn bg-gradient-dark mb-0" href="" data-bs-toggle="modal" data-bs-target="#addModal">
                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Item</a>
                </div>

                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">

                    </div>
                </div>

                <div class="col-lg-12 col-md-6 mb-md-0 mb-1">
                    <div class="card">
                        <div class="card-header pb-1">
                            <table id="data-table" class="table table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">id</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">subject</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">course</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">year</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">section</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">date_to_be_used </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">group_no</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">teacher</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-0">experiment_no</th>
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
                    <div class="modal-body">
                        <form method='POST' action='{{ route('addApparatus')}}'>
                            @csrf
                            <div class="row">

                                <div class="row">

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Subject</label>
                                        <input type="text" name="subject" class="form-control border border-2 p-2" value='{{ old('subject', auth()->user()->subject) }}'>
                                        @error('subject')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Course</label>
                                        <input type="text" name="course" class="form-control border border-2 p-2" value='{{ old('course', auth()->user()->course) }}'>
                                        @error('course')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                    <label class="form-label">Year </label>
                                    <input type="text" name="year" class="form-control border border-2 p-2" value='{{ old('year', auth()->user()->year) }}'>
                                    @error('year')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Section</label>
                                        <input type="text" name="section" class="form-control border border-2 p-2" value='{{ old('section', auth()->user()->section) }}'>
                                        @error('section')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Date to be used</label>
                                        <input type="date" name="date_to_be_used" class="form-control border border-2 p-2" value='{{ old('date_to_be_used', auth()->user()->date_to_be_used) }}'>
                                        @error('date_to_be_used')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Group No</label>
                                        <input type="text" name="group_no" class="form-control border border-2 p-2" value='{{ old('group_no', auth()->user()->group_no) }}'>
                                        @error('group_no')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Teacher</label>
                                        <input type="text" name="teacher" class="form-control border border-2 p-2" value='{{ old('teacher', auth()->user()->teacher) }}'>
                                        @error('teacher')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Experiment No</label>
                                        <input type="number" name="experiment_no" class="form-control border border-2 p-2" value='{{ old('experiment_no', auth()->user()->experiment_no) }}'>
                                        @error('experiment_no')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Time</label>
                                        <input type="time" name="time" class="form-control border border-2 p-2" value='{{ old('time', auth()->user()->time) }}'>
                                        @error('time')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Items</label>
                                        <input type="text" name="items" class="form-control border border-2 p-2" value='{{ old('items', auth()->user()->items) }}'>
                                        @error('items')
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
                                        <label class="form-label">Remarks</label>
                                        <input type="text" name="remarks" class="form-control border border-2 p-2" value='{{ old('remarks', auth()->user()->remarks) }}'>
                                        @error('remarks')
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
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
                    ajax: "{{ route('apparatus') }}",
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'subject', name: 'subject'},
                        {data: 'course', name: 'course'},
                        {data: 'year', name: 'year'},
                        {data: 'section', name: 'section'},
                        {data: 'date_to_be_used', name: 'date_to_be_used'},
                        {data: 'group_no', name: 'group_no'},
                        {data: 'teacher', name: 'teacher'},
                        {data: 'experiment_no', name: 'experiment_no'},
                        {data: 'time', name: 'time'},
                        {data: 'items', name: 'items'},
                        {data: 'quantity', name: 'quantity'},
                        {data: 'remarks', name: 'remarks'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });

                $(document).on('click','.editBtn', function (e) {
                    e.preventDefault();
                    var id = $(this).data('id');
                    $('#editModal').modal('show');
                    console.log(id);

                    $.ajax({
                        url: '/apparatus/'+id,
                        type: "GET",
                        success: function (response) {

                        }

                     });

                 });
            });
        </script>
    @endsection


