<?php
	require_once("config/init.php");
	
	if(!Functions::isUserSet())
		Functions::redirectTo(ROOT . "index.php");
	else
	{
		echo Functions::htmlHeader("User Data");	
		require_once(TEMPLATES . "form-container.php");
		
		echo Functions::htmlTopBar();
		
		require_once(TEMPLATES . "html-edit-user.php");
		require_once(TEMPLATES . "html-hr.php");
		
		require_once(TEMPLATES . "html-edit-address.php");
		require_once(TEMPLATES . "html-hr.php");
		
		echo Functions::htmlFooter();
	}
?>