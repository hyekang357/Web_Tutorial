<?php
	$address = AddressHelper::getAddress($_SESSION["userId"]);
?>

<section class="row sm-margin-top">
	<div class="small-12 medium-12 large-12 columns">
		<table>
			<thead>
				<tr>
					<th><i class="fa fa-map-marker"></i> Address</th>
					<th>
						<div class="text-right show-for-small-only">
							<button type="button" class="button round sm-margin-tb" onclick="showForm('address')"><i class="fa fa-pencil"></i></button>
						</div>
						<div class="text-right hide-for-small-only">
							<button type="button" class="button round sm-margin-tb" onclick="showForm('address')"><i class="fa fa-pencil"></i> Edit</button>
						</div>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Line 1:</td>
					<td><?php if(isset($address) && !empty($address)) echo $address->getLine1(); ?></td>
				</tr>
				<tr>
					<td>Line 2:</td>
					<td><?php if(isset($address) && !empty($address)) echo $address->getLine2(); ?></td>
				</tr>
				<tr>
					<td>City:</td>
					<td><?php if(isset($address) && !empty($address)) echo $address->getCity(); ?></td>
				</tr>
				<tr>
					<td>State:</td>
					<td><?php if(isset($address) && !empty($address)) echo $address->getState(); ?></td>
				</tr>
				<tr>
					<td>ZIP:</td>
					<td><?php if(isset($address) && !empty($address)) echo $address->getZip(); ?></td>
				</tr>
				<tr>
					<td>Country:</td>
					<td><?php if(isset($address) && !empty($address)) echo $address->getCountry(); ?></td>
				</tr>
			</tbody>
		</table>
	</div>
</section>