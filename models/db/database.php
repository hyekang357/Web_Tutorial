<?php
	// Database constants
	defined("DB_SERVER") ? null : define("DB_SERVER", "localhost");
	defined("DB_USER") ? null : define("DB_USER", "test_admin");
	defined("DB_PASS") ? null : define("DB_PASS", "test_password");
	defined("DB_NAME") ? null : define("DB_NAME", "test_resume");

	// Create database connection
	$db = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

	// Check if we have a working connection
	if($db->connect_error)
		die("Database connection failed: " . $db->connect_errno . " - " . $db->connect_error);
?>