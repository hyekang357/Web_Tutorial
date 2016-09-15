<?php
	defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
	defined("ROOT") ? null : define("ROOT", dirname(__DIR__) . DS);
	defined("MODELS") ? null : define("MODELS", ROOT . "models" . DS);
	defined("VIEWS") ? null : define("VIEWS", ROOT . "views" . DS);
	defined("SCRIPTS") ? null : define("SCRIPTS", ROOT . "scripts" . DS);
	defined("DB") ? null : define("DB", MODELS . "db" . DS);
	defined("TEMPLATES") ? null : define("TEMPLATES", VIEWS . "templates" . DS);
	
	require_once(SCRIPTS . "functions.php");
	require_once(DB . "user-helper.php");
	require_once(DB . "address-helper.php");
	require_once(DB . "education-helper.php");
	require_once(DB . "work-experience-helper.php");
	require_once(DB . "responsibility-helper.php");
	require_once(DB . "skill-helper.php");
	
	if (session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}
?>