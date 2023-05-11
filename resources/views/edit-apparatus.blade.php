<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script><script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
 



<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h4>Update Apparatus
                    </h4>

<form action="{{ url('update-apparatus/'.$apparatus->id) }}" method="POST">
    @csrf
    @method('PUT')
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

<div class="mb-3 col-md-6">
    <label class="form-label">Subject</label>
    <input type="text" name="subject" class="form-control border border-2 p-2" value='{{ $apparatus->subject }}'>
    @error('Subject')
    <p class='text-danger inputerror'>{{ $message }} </p>
    @enderror
</div>
<div class="mb-3 col-md-6">
    <label class="form-label">Course</label>
    <input type="text" name="course" class="form-control border border-2 p-2" value='{{ $apparatus->course }}'>
    @error('Course')
    <p class='text-danger inputerror'>{{ $message }} </p>
    @enderror
</div>

<div class="mb-3 col-md-6">
    <label class="form-label">Year</label>
    <input type="text" name="year" class="form-control border border-2 p-2" value='{{ $apparatus->year }}'>
    @error('Year')
    <p class='text-danger inputerror'>{{ $message }} </p>
    @enderror
</div>

<div class="mb-3 col-md-6">
    <label class="form-label">Section</label>
    <input type="text" name="section" class="form-control border border-2 p-2" value='{{ $apparatus->section }}'>
    @error('Section')
    <p class='text-danger inputerror'>{{ $message }} </p>
    @enderror
</div>

<div class="mb-3 col-md-6">
    <label class="form-label">date_to_be_used</label>
    <input type="date" name="date_to_be_used" class="form-control border border-2 p-2" value='{{ $apparatus->requested_by }}'>
    @error('date_to_be_used')
    <p class='text-danger inputerror'>{{ $message }} </p>
    @enderror
</div>

<div class="mb-3 col-md-6">
    <label class="form-label">group_no</label>
    <input type="number" name="group_no" class="form-control border border-2 p-2" value='{{ $apparatus->group_no }}'>
    @error('Group_No')
    <p class='text-danger inputerror'>{{ $message }} </p>
    @enderror
</div>
<div class="mb-3 col-md-6">
    <label class="form-label">teacher</label>
    <input type="text" name="teacher" class="form-control border border-2 p-2" value='{{ $apparatus->teacher }}'>
    @error('Teacher')
    <p class='text-danger inputerror'>{{ $message }} </p>
    @enderror
</div>

<div class="mb-3 col-md-6">
    <label class="form-label">experiment_no</label>
    <input type="text" name="experiment_no" class="form-control border border-2 p-2" value='{{ $apparatus->experiment_no }}'>
    @error('Experiment_No')
    <p class='text-danger inputerror'>{{ $message }} </p>
    @enderror
</div>

<div class="mb-3 col-md-6">
    <label class="form-label">time</label>
    <input type="time" name="time" class="form-control border border-2 p-2" value='{{ $apparatus->time }}'>
    @error('Time')
    <p class='text-danger inputerror'>{{ $message }} </p>
    @enderror
</div>

<div class="mb-3 col-md-6">
    <label class="form-label">items</label>
    <input type="number" name="item" class="form-control border border-2 p-2" value='{{ $apparatus->items }}'>
    @error('Items')
    <p class='text-danger inputerror'>{{ $message }} </p>
    @enderror
</div>

<div class="mb-3 col-md-6">
    <label class="form-label">quantity</label>
    <input type="number" name="quantity" class="form-control border border-2 p-2" value='{{ $apparatus->quantity }}'>
    @error('Quantity')
    <p class='text-danger inputerror'>{{ $message }} </p>
    @enderror
</div>

<div class="mb-3 col-md-6">
    <label class="form-label">remarks</label>
    <input type="text" name="remarks" class="form-control border border-2 p-2" value='{{ $apparatus->remarks }}'>
    @error('Remarks')
    <p class='text-danger inputerror'>{{ $message }} </p>
    @enderror
</div>



<div class="modal-footer" >
<div class="mb-4 col-md-12">
    <button type="submit" class="btn btn-primary">Update Apparatus</button>

    <a href="{{ url('add') }}" class="btn btn-danger float-end">BACK</a>
</div>

</form>

</div>
</div>
</div>
</div>
</div>
</div>
           


