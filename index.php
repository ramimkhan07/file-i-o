<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>File I/O</title>

</head>

<body>

	<h1>File I/O</h1>

	<?php
		

	if ($_SERVER['REQUEST_METHOD'] === "POST")
	{
		

		$array = array( "Firstname"=>basic_validation($_POST['Firstname']),"Lastname"=>basic_validation($_POST['Lastname']),
			"Gender"=>basic_validation($_POST['Gender']),"DOB"=>basic_validation($_POST['DOB']),
			"Religion"=>basic_validation($_POST['Religion']),"Presentaddress"=>basic_validation($_POST['Presentaddress']),
			"Permanentaddress"=>basic_validation($_POST['Permanentaddress']),"Phone"=>basic_validation($_POST['Phone']),
			"Email"=>basic_validation($_POST['Email']),
			"Username"=>basic_validation($_POST['Username']),"Password"=>basic_validation($_POST['Password']),
		);

		

	
		$array = json_encode($array);
		write($array);
	}

	
	function basic_validation($data)
	{
		$data = trim($data);
		$data = htmlspecialchars($data);
		$data = stripcslashes($data);
		return $data;
	}

	function write($content)
	{
		$filePointer = fopen("data.txt", "w");	
		fwrite($filePointer, $content."\n");
		fclose($filePointer);
	}



	


	?>
	<form action="<?php echo htmlspecialchars(($_SERVER['PHP_SELF'])); ?>" method = "POST">

			<fieldset>
				<legend>Basic Information:</legend>

				<label for="fname">First Name:</label>
				<input type="text" id="fname" name="Firstname" required><br><br>

				<label for="lname">Last name: </label>
				<input type="text" id="lname" name="Lastname" required><br><br>


				Select Gender:<br><br>
				<input type="radio" id="Male" name="Gender" value="Male" required>
				<label for="Male">Male</label> <br><br>

				<input type="radio" id="Female" name="Gender" value="Female">
				<label for="Female">Female</label> <br><br>
				<input type="radio" id="Other" name="Gender" value="Other">
				<label for="Other">Other</label><br><br>


				<label for="DOB">DOB:</label>
				<input type="date" id="DOB" name="DOB" required><br><br>

				Religion:<br>
				<select name="Religion" required > 
					<option value="" name="" ></option>
					<option value="Islam" name="Religion" >Islam</option> 
					<option value="Hindu" name="Religion" >Hindu</option> 
					<option value="Christian" name="Religion" >Christian</option> 
				</select>
			</fieldset>
			<br><br><br>




			<fieldset>
				<legend>Contact Information:</legend>


				<label for="Presentaddress">Present Address:</label>
				<textarea id="Presentaddress" name="Presentaddress" rows="3" cols="30"></textarea><br><br>

				<label for="Permanentaddress">Permanent Address:</label>
				<textarea id="Permanentaddress" name="Permanentaddress" rows="3" cols="30"></textarea><br><br>


				<label for="Phone">Phone: </label>
				<input type="tel" id="Phone" name="Phone"><br><br>

				<label for="Email">Email: </label>
				<input type="Email" id="Email" name="Email" required><br><br>



			</fieldset>
			<br><br>


			<fieldset>
				<legend>Account Information:</legend>

				<label for="Username">Username:</label>
				<input type="text" id="Username" name="Username" required><br>

				<label for="Password">Password:</label>
				<input type="Password" id="Password" name="Password" required><br>

			</fieldset>
			<br>
			<input type="Submit" value="Submit">
        </form>

    </body>
	</html>
