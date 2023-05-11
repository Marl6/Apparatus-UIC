<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script><script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h4>Update Breakages
                    </h4>
                </div>
                <div class="card-body">
                <form action="{{ url('update-breakages/'.$Breakages->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

                    <div class="row">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Group No</label>
                                <input type="number" name="group_no" class="form-control border border-2 p-2" value='{{ $Breakages->group_no }}'>
                                @error('group_no')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>
                            
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Requisition ID</label>
                                <input type="number" name="requisition_id" class="form-control border border-2 p-2" value='{{ $Breakages->requisition_id }}'>
                                @error('requisition_id')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Quantity</label>
                                <input type="number" name="quantity" class="form-control border border-2 p-2" value='{{ $Breakages->quantity }}'>
                                @error('quantity')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Amount</label>
                                <input type="number" name="amount" class="form-control border border-2 p-2" value='{{ $Breakages->amount }}'>
                                @error('amount')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Datetime Added</label>
                                <input type="date" name="datetime_added" class="form-control border border-2 p-2" value='{{ $Breakages->datetime_added }}'>
                                @error('datetime_added')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Datetime Update</label>
                                <input type="date" name="datetime_update" class="form-control border border-2 p-2" value='{{ $Breakages->datetime_update }}'>
                                @error('datetime_update')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Status Code</label>
                                <input type="text" name="statuscode" class="form-control border border-2 p-2" value='{{ $Breakages->statuscode }}'>
                                @error('statuscode')
                                <p class='text-danger inputerror'>{{ $message }} </p>
                                @enderror
                            </div>

                            <div class="modal-footer" >
                            <div class="mb-4 col-md-12">
                                <button type="submit" class="btn btn-primary">Update Breakages</button>

                                <a href="{{ url('add') }}" class="btn btn-danger float-end">BACK</a>
                            </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>




