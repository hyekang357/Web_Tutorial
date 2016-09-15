<?php
	require_once("../config/init.php");
	
	if($_POST["submit"])
	{
		$line1 = $_POST["line1"];
		$line2 = $_POST["line2"];
		$city = $_POST["city"];
		$state = $_POST["state"];
		$zip = $_POST["zip"];
		$country = $_POST["country"];
		
		try
		{
			$address = AddressHelper::getAddress($_SESSION["userId"]);
			
			if(isset($address) && !empty($address))
			{
				$address->setLine1($line1);
				$address->setLine2($line2);
				$address->setCity($city);
				$address->setState($state);
				$address->setZip($zip);
				$address->setCountry($country);
				AddressHelper::updateAddress($address);
			}
			else
			{
				$address = new Address(null, $line1, $line2, $city, $state, $zip, $country, $_SESSION["userId"]);
				AddressHelper::addAddress($address);
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