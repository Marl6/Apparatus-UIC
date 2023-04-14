@extends('layouts.default')

@section('head-script')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">  
@endsection

@section('content')
    <x-navbars.sidebar activePage='user-management'></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="user-management"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                <div class="row">
                    <div class=" me-3 my-3 text-end">
                        <a class="btn bg-gradient-dark mb-0" href=" " data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New User</a>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method='POST' action='{{ route('addUser')}}'>
                                @csrf
                                <div class="row">
                                    
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control border border-2 p-2" value=''>
                                        @error('name')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Email address</label>
                                        <input type="email" name="email" class="form-control border border-2 p-2" value=''>
                                        @error('email')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control border border-2 p-2" value=''>
                                        @error('password')
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

                {{-- table --}}
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 data-table">
                            <thead>
                                <tr>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        NAME</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        EMAIL</th>
                                    
                                    <th class="text-secondary opacity-7">ACTION</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>


                {{-- Edit modal --}}
                
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method='' action=''>
                                @csrf
                                <div class="row">
                                    
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control border border-2 p-2" value=''>
                                        @error('name')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Email address</label>
                                        <input type="email" name="email" class="form-control border border-2 p-2" value=''>
                                        @error('email')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control border border-2 p-2" value=''>
                                        @error('password')
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
                {{-- testing --}}

            



            </div>
    </main>
    <x-plugins></x-plugins>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js" integrity="sha512-6DC1eE3AWg1bgitkoaRM1lhY98PxbMIbhgYCGV107aZlyzzvaWCW1nJW2vDuYQm06hXrW0As6OGKcIaAVWnHJw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    

    <script>
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('user-management')}}",
                columns:[
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'}
                    // {data: 'action', name: 'action'},
                ]
            });

        });

    </script>

@endsection
