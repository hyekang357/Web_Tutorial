<?php
	if (session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}
	
	/**
	 * Action handler
	 */
	if(isset($_POST["action"]) && !empty($_POST["action"]))
	{
		$action = $_POST["action"];
		
		switch($action)
		{
			case "setUserId":
				setUserId($_POST["userId"]);
				break;
			case "clearUserId":
				clearUserId();
				break;
		}
	}
	
	/**
	 * Set the given userId in this session
	 * @param $userId - The userId to set in the session
	 */
	function setUserId($userId)
	{
		$_SESSION["userId"] = $userId;
	}
	
	/**
	 * Remove the userId from the session
	 */
	function clearUserId()
	{
		unset($_SESSION["userId"]);
	}
?>