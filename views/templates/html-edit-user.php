<?php
	$user = UserHelper::getUser($_SESSION["userId"]);
?>

<section class="row sm-margin-top">
	<div class="small-12 medium-12 large-12 columns">
		<table>
			<thead>
				<tr>
					<th><i class="fa fa-user"></i> User</th>
					<th>
						<div class="text-right show-for-small-only">
							<button type="button" class="button round sm-margin-tb" onclick="showForm('user')"><i class="fa fa-pencil"></i></button>
						</div>
						<div class="text-right hide-for-small-only">
							<button type="button" class="button round sm-margin-tb" onclick="showForm('user')"><i class="fa fa-pencil"></i> Edit</button>
						</div>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>First Name:</td>
					<td><?php if(isset($user) && !empty($user)) echo $user->getFirstName(); ?></td>
				</tr>
				<tr>
					<td>Middle Name:</td>
					<td><?php if(isset($user) && !empty($user)) echo $user->getMiddleName(); ?></td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td><?php if(isset($user) && !empty($user)) echo $user->getLastName(); ?></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><?php if(isset($user) && !empty($user)) echo $user->getEmail(); ?></td>
				</tr>
				<tr>
					<td>Phone Number:</td>
					<td><?php if(isset($user) && !empty($user)) echo $user->getPhoneNumber(); ?></td>
				</tr>
				<tr>
					<td>Objective:</td>
					<td><?php if(isset($user) && !empty($user)) echo $user->getObjective(); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</section>