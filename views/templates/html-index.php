<section class="row sm-margin-top">
	<div class="small-12 medium-12 large-12 columns">
		<table>
			<thead>
				<tr>
					<th><i class="fa fa-user"></i> Users</th>
					<th>
						<div class="text-right show-for-small-only">
							<button type="button" class="button round sm-margin-tb" onclick="addUser()"><i class="fa fa-user-plus"></i></button>
						</div>	
						<div class="text-right hide-for-small-only">
							<button type="button" class="button round sm-margin-tb" onclick="addUser()"><i class="fa fa-user-plus"></i> Add</button>
						</div>
					</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$users = UserHelper::getAllUsers();
				
				if(empty($users))
				{
					echo '
						<tr>
							<td colspan="2">No users found.</td>
						</tr>
					';
				}
				else
				{
					foreach ($users as $user)
					{
						echo '
							<tr>
								<td>' .
									$user->getFirstName() . ' ' . $user->getMiddleName() .  ' ' . $user->getLastName() .
								'</td>
								<td>
									<div class="text-right show-for-small-only">
										<button type="button" class="button round sm-margin-tb" onclick="viewResume(' . $user->getUserId() . ')"><i class="fa fa-eye"></i></button>
										<button type="button" class="button round sm-margin-tb" onclick="editUser(' . $user->getUserId() . ')"><i class="fa fa-pencil"></i></button>
										<button type="button" class="button round sm-margin-tb" onclick="deleteUser(' . $user->getUserId() . ')"><i class="fa fa-trash"></i></button>
									</div>
									<div class="text-right hide-for-small-only">
										<button type="button" class="button round sm-margin-tb" onclick="viewResume(' . $user->getUserId() . ')"><i class="fa fa-eye"></i> View</button>
										<button type="button" class="button round sm-margin-tb" onclick="editUser(' . $user->getUserId() . ')"><i class="fa fa-pencil"></i> Edit</button>
										<button type="button" class="button round sm-margin-tb" onclick="deleteUser(' . $user->getUserId() . ')"><i class="fa fa-trash"></i> Delete</button>
									</div>
								</td>
							</tr>
						';
					}
				}
			?>
			</tbody>
		</table>
	</div>
</section>