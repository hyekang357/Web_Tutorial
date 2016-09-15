<?php
	require_once("../../config/init.php");

	if(Functions::isUserSet())
		$address = AddressHelper::getAddress($_SESSION["userId"]);
?>

<form method="post" action="scripts/process-address.php">
	<div class="row">
		<div class="small-12 columns text-center">
			<h3><i class="fa fa-map-marker"></i> Address</h3>
		</div>
		<div class="small-12 columns">
			<label>
				Line 1: <span class="red-text">*</span>
				<input name="line1" type="text" placeholder="123 Main street" required value="<?php if(isset($address) && !empty($address)) echo $address->getLine1(); ?>">
			</label>
		</div>
		<div class="small-12 columns">
			<label>
				Line 2:
				<input name="line2" type="text" placeholder="Apt. C" value="<?php if(isset($address) && !empty($address)) echo $address->getLine2(); ?>">
			</label>
		</div>
		<div class="small-12 columns">
			<label>
				City: <span class="red-text">*</span>
				<input name="city" type="text" placeholder="Los Angeles" required value="<?php if(isset($address) && !empty($address)) echo $address->getCity(); ?>">
			</label>
		</div>
		<div class="small-12 columns">
			<label>
				State: <span class="red-text">*</span>
				<input name="state" type="text" placeholder="CA" required value="<?php if(isset($address) && !empty($address)) echo $address->getState(); ?>">
			</label>
		</div>
		<div class="small-12 columns">
			<label>
				ZIP: <span class="red-text">*</span>
				<input name="zip" type="number" placeholder="12345" required value="<?php if(isset($address) && !empty($address)) echo $address->getZip(); ?>">
			</label>
		</div>
		<div class="small-12 columns">
			<label>
				Country:
				<input name="country" type="text" value="<?php if(isset($address) && !empty($address)) echo $address->getCountry(); else echo "United States"; ?>">
			</label>
		</div>
		<div class="small-12 columns text-center">
		<?php 
			if(isset($address) && !empty($address))
				echo '<input name="submit" type="submit" value="Update" class="button">';
			else
				echo '<input name="submit" type="submit" value="Submit" class="button">';
		?>			
		</div>
	</div>
</form>