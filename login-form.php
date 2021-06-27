<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Log-in</title>
</head>
<body>
	<h1>Log-in Form</h1>
	
	<?php

	if ($_SERVER['REQUEST_METHOD'] === "POST")
	{

		$data = file_get_contents("data.txt");
		$dataOK = json_decode($data);
		$failed = "";

        $userId = $dataOK->Username;
		$pass = $dataOK->Password;


        if($userId === $_POST['Username'] and $pass === $_POST['Password'])
		{
			

			header('Location: welcome.html');
		}
		else
		{
			$failed = "Log-in failed";


		}
	}

		
	?>
	
	<form action="<?php echo htmlspecialchars(($_SERVER['PHP_SELF'])); ?>" method = "POST">
		
		
		<label for="Username">Username:</label>
		<input type="text" id="Username" name="Username" required><br>

		<label for="Password">Password:</label>
		<input type="Password" id="Password" name="Password" required><br>

		<br>
		<input type="submit" value="Log-in">
		

		
	</form>
</body>
</html>