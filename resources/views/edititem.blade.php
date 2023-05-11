<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script><script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h4>Update Chemicals
                    </h4>
                </div>
                <div class="card-body">
                <form action="{{ url('update-student/'.$chemicals->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

                    <div class="row">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Date Requested</label>
                                <input type="date" name="date_requested" class="form-control border border-2 p-2" value='{{ $chemicals->date_requested }}'>
                                @error('date_requested')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>
                            
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Date_to_be_Used</label>
                                <input type="date" name="date_to_be_used" class="form-control border border-2 p-2" value='{{ $chemicals->date_to_be_used }}'>
                                @error('date_to_be_used')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Chemical Name</label>
                                <input type="text" name="chemical_name" class="form-control border border-2 p-2" value='{{ $chemicals->chemical_name }}'>
                                @error('chemical_name')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Quantity</label>
                                <input type="number" name="quantity" class="form-control border border-2 p-2" value='{{ $chemicals->quantity }}'>
                                @error('quantity')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Requested By</label>
                                <input type="text" name="requested_by" class="form-control border border-2 p-2" value='{{ $chemicals->requested_by }}'>
                                @error('requested_by')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Prepared_By</label>
                                <input type="text" name="prepared_by" class="form-control border border-2 p-2" value='{{ $chemicals->prepared_by }}'>
                                @error('datetime_update')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="modal-footer" >
                            <div class="mb-4 col-md-12">
                                <button type="submit" class="btn btn-primary">Update Chemicals</button>

                                <a href="{{ url('add') }}" class="btn btn-danger float-end">BACK</a>
                            </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>




