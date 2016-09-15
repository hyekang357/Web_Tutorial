<?php
	require_once("../../config/init.php");
	
	if(Functions::isUserSet())
		$user = UserHelper::getUser($_SESSION["userId"]);
?>

<form method="post" action="scripts/process-user.php">
	<div class="row">
		<div class="small-12 columns text-center">
			<h3><i class="fa fa-user"></i> User</h3>
		</div>
		<div class="small-12 columns">
			<label>
				First Name: <span class="red-text">*</span>
				<input name="firstName" type="text" placeholder="first name" required value="<?php if(isset($user) && !empty($user)) echo $user->getFirstName(); ?>">
			</label>
		</div>
		<div class="small-12 columns">
			<label>
				Middle Name:
				<input name="middleName" type="text" placeholder="middle name" value="<?php if(isset($user) && !empty($user)) echo $user->getMiddleName(); ?>">
			</label>
		</div>
		<div class="small-12 columns">
			<label>
				Last Name: <span class="red-text">*</span>
				<input name="lastName" type="text" placeholder="last name" required value="<?php if(isset($user) && !empty($user)) echo $user->getLastName(); ?>">
			</label>
		</div>
		<div class="small-12 columns">
			<label>
				Email: <span class="red-text">*</span>
				<input name="email" type="email" placeholder="email" required value="<?php if(isset($user) && !empty($user)) echo $user->getEmail(); ?>">
			</label>
		</div>
		<div class="small-12 columns">
			<label>
				Phone Number: <span class="red-text">*</span>
				<input name="phoneNumber" type="tel" placeholder="phone number" required value="<?php if(isset($user) && !empty($user)) echo $user->getPhoneNumber(); ?>">
			</label>
		</div>
		<div class="small-12 columns">
			<label>
				Objective:
				<textarea name="objective" placeholder="objective"><?php if(isset($user) && !empty($user)) echo $user->getObjective(); ?></textarea>
			</label>
		</div>
		<div class="small-12 columns text-center">
		<?php 
			if(isset($user) && !empty($user))
				echo '<input name="submit" type="submit" value="Update" class="button">';
			else
				echo '<input name="submit" type="submit" value="Submit" class="button">';
		?>			
		</div>
	</div>
</form>