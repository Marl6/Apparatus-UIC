@extends('layouts.default')

    @section('content')

    <x-navbars.sidebar activePage='apparatus'></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
            <x-navbars.navs.auth titlePage="apparatus"></x-navbars.navs.auth>
            <div class = "container-fluid py-5">
                <div class = "row">
                    <div class = "me-3 my-3 text-end">
                        <a class="btn bg-gradient-dark mb-0" href=""data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add new Item
                        </a>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <label class="form-label">Year</label>
                                        <input type="text" name="Year" class="form-control border border-2 p-2" value='{{ old('Year', auth()->user()->Year) }}'>
                                        @error('Year')
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
                                            <label class="form-label">Group No.</label>
                                            <input type="number" name="GroupNo" class="form-control border border-2 p-2" value='{{ old('GroupNo', auth()->user()->GroupNo) }}'>
                                            @error('GroupNo')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Date to be used</label>
                                            <input type="date" name="Datetobeused" class="form-control border border-2 p-2" value='{{ old('Datetobeused', auth()->user()->Datetobeused) }}'>
                                            @error('Datetobeused')
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
                                            <label class="form-label">Experiment No.</label>
                                            <input type="number" name="ExperimentNo" class="form-control border border-2 p-2" value='{{ old('ExperimentNo', auth()->user()->ExperimentNo) }}'>
                                            @error('ExperimentNo')
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
                                            <input type="text" name="item" class="form-control border border-2 p-2" value='{{ old('item', auth()->user()->item) }}'>
                                            @error('item')
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
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
        </main>
    @endsection

