<?php
	require_once("../config/init.php");
	
	if($_POST["submit"])
	{
		$firstName = $_POST["firstName"];
		$middleName = $_POST["middleName"];
		$lastName = $_POST["lastName"];
		$email = $_POST["email"];
		$phoneNumber = $_POST["phoneNumber"];
		$objective = $_POST["objective"];
		
		try
		{
			if(Functions::isUserSet())
			{
				$user = new User($_SESSION["userId"], $firstName, $middleName, $lastName, $email, $phoneNumber, $objective);
				UserHelper::updateUser($user);
			}
			else
			{
				$user = new User(null, $firstName, $middleName, $lastName, $email, $phoneNumber, $objective);
				$_SESSION["userId"] = UserHelper::addUser($user);
			}
			
			echo '
				<script>
					window.location.href = "../edit.php";
				</script>
			';
		}
		catch(Exception $e)
		{
			echo '<h1>Error: ' . $e->getMessage() . '</h1>';
		}
	}
?>