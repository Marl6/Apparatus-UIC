<!DOCTYPE html>
<html>
<head>
<title>Patient Management | Add</title>
</head>
<body>

<center>
<form action = "/create" method = "post">
	<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
	
	
	
	<label>Subject:</label>
	<input type='text' name='subject'  required/>
	<br>
	
	<label>Course:</label>
	<input type='text' name='course'  required/>
		<br>

		
	<label>year:</label>
	<input type='text' name='year'  required/>
		<br>


	<label>section:</label>
	<input type='text' name='section'  required/>
	<br>


	<label>date_to_be_used:</label>
	<input type='date' name='date_to_be_used'  required/>


	<br>
	<label>group_no:</label>
	<input type='number' name='group_no'  required/>
	<br>

	<label>teacher:</label>
	<select name="text" id="teacher">
<br>

<label>experiment_no</label>
<input type="text" name="experiment_no" required/>
<br>


<label>time</label>
<input type="text" name="time" required/>
<br>

	
<label>items</label>
<input type="text" name="items" required/>
<br>

<label>quantity</label>
<input type="number" name="quantity" required/>
<br>

<label>remarks</label>
<input type="text" name="remarks" required/>
<br>
	
	
	

	<input type = 'submit' value = "Add Patient"/>
    

</form>
</center>
</body>
</html>