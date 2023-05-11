{{-- @extends('layouts.default')
<x-navbars.sidebar activePage='apparatus'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

        <x-navbars.navs.auth titlePage="apparatus"></x-navbars.navs.auth>


        <div class = "container-fluid py-5">
            <div class = "row">
                <div class = "me-3 my-3 text-end">
                    <a class="btn bg-gradient-dark mb-0" href=""data-bs-toggle="modal" data-bs-target="#AddNewApparatusModal">
                        <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add new Item</a>
                </div>
            </div>
						<div class = "row">

							<table>
								<thead>
									<tr>
										<th>#</th>
										<th>Apparatus Description</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@if ($array_value['apparatus_list'])
										@if ($array_value['apparatus_list'][0]->apparatus_id > 0)
											@foreach ($array_value['apparatus_list'] as $result)
												<tr>
													<td class="align-center">{{ $result->row_num; }}</td>
													<td class="align-left">{{ $result->label; }}</td>
													<td class="align-center">{{ $result->statuscode_label; }}</td>
													<td class="align-center">
														Update | Delete
													</td>
												</tr>
											@endforeach

										@endif
									@endif
								</tbody>

							</table>
					</div>

					<div class="modal fade" id="AddNewApparatusModal" tabindex="-1" aria-labelledby="AddNewApparatusModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h1 class="modal-title fs-4" id="AddNewApparatusModalLabel">Apparatus</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<form method='POST' action='/save_new_apparatus'>
								@csrf
									<div class="modal-body">

											<div class="row">
												<div class="row">

													<div class="mb-3 col-md-12">
														<label class="form-label">Apparatus Name</label>
														<input type="text" id="apparatus_name" name="apparatus_name" class="form-control border border-2 p-2">
														@error('subject')
														<p class='text-danger inputerror'>{{ $message }} </p>
														@enderror
													</div>

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

            <!-- Modal -->
            {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                </div> --}}
            {{-- </div>
        </div>
    </main>
    <x-plugins></x-plugins>
    </div>
    @push('js')
    <script src="{{ asset('materialUI/assets/js/plugins/chartjs.min.js') }}"></script>
    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
            type: "bar",
            data: {
                labels: ["M", "T", "W", "T", "F", "S", "S"],
                datasets: [{
                    label: "Sales",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "rgba(255, 255, 255, .8)",
                    data: [50, 20, 10, 22, 50, 10, 40],
                    maxBarThickness: 3
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: 500,
                            beginAtZero: true,
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                            color: "#fff"
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });


        var ctx2 = document.getElementById("chart-line").getContext("2d");

        new Chart(ctx2, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

        var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

        new Chart(ctx3, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#f8f9fa',
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

    </script>
    @endpush

 --}}


 --}}
