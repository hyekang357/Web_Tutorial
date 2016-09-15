<?php
	if (session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}

	class Functions
	{
		public static function htmlHeader($title)
		{
			return '
				<!doctype html>
				<html class="no-js" lang="en">
				    <head>
				        <meta charset="utf-8" />
				        <meta http-equiv="x-ua-compatible" content="ie=edge">
				        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
				        <title>' . $title . '</title>
				        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.3/foundation.min.css" />
				        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.8.0/css/alertify.min.css" />
				        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" />
				        <link rel="stylesheet" href="views/css/app.css" />
				    </head>
				    <body>
			';
		}
		
		public static function htmlFooter()
		{
			return '
						<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
				        <script src="https://cdnjs.cloudflare.com/ajax/libs/what-input/2.1.1/what-input.min.js"></script>
				        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.3/foundation.min.js"></script>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.8.0/alertify.min.js"></script>
				        <script src="views/js/app.js"></script>
				        <script>
				            $(document).foundation();
				        </script>
				    </body>
				</html>		
			';
		}
		
		public static function htmlTopBar()
		{
			return '
					<header class="top-bar text-center">
						<a href="index.php"><h1><i class="fa fa-home"></i> Resume Template</h1></a>
					</header>
			';
		}
		
		public static function isUserSet()
		{
			if(isset($_SESSION["userId"]) && !empty($_SESSION["userId"]))
				return true;
			else
				return false;
		}
		
		public static function redirectTo($location)
		{
			header("Location: " . $location);
			exit();
		}
	}
?>