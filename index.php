<?php 
	require_once("config/init.php");
	
	echo Functions::htmlHeader("Home");
	require_once(TEMPLATES . "form-container.php");
	
	echo Functions::htmlTopBar();
	require_once(TEMPLATES . "html-index.php");

	echo Functions::htmlFooter();
?>