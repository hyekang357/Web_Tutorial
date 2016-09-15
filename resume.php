<?php
	require_once("config/init.php");
	
	echo Functions::htmlHeader("Resume");	
	require_once(TEMPLATES . "form-container.php");
	
	if(isset($_SESSION["userId"]) && !empty($_SESSION["userId"]))
	{
		$user = UserHelper::getUser($_SESSION["userId"]);
		
		if(!empty($user))
		{
			// TODO show form with user data
			echo $user->toString();
		}
		else
		{
			echo "<h1>User wasn't found in DB.</h1>";
		}
	}
	else
	{
		echo "<h1>No userId in session.</h1>";
		// TODO proceed to show blank form modal
	}
	
	echo Functions::htmlFooter();
?>