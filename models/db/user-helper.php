<?php
	require_once(DB . "database.php");
	require_once(MODELS . "user.php");
	
	class UserHelper
	{
		/**
		 * Add a new user to the database.
		 * @param $user - The user object to add to the database
		 * @return the user_id for the new user, -1 otherwise
		 */
		public static function addUser($user)
		{
			global $db;
			$eFirstName = $db->real_escape_string($user->getFirstName());
			$eMiddleName = $db->real_escape_string($user->getMiddleName());
			$eLastName = $db->real_escape_string($user->getLastName());
			$eEmail = $db->real_escape_string($user->getEmail());
			$ePhoneNumber = $db->real_escape_string($user->getPhoneNumber());
			$eObjective = $db->real_escape_string($user->getObjective());
		
			$sql  = "INSERT INTO user ";
			$sql .= "(first_name, middle_name, last_name, email, phone_number, objective) ";
			$sql .= "VALUES (?, ?, ?, ?, ?, ?)";
		
			$stmt = $db->stmt_init();
			if(!$stmt->prepare($sql))
			{
				echo "Failed to prepare statement";
				return;
			}
			else
			{
				$stmt->bind_param("ssssss", $eFirstName, $eMiddleName, $eLastName, $eEmail, $ePhoneNumber, $eObjective);
				if($stmt->execute())
					return $db->insert_id;
				else
					return -1;
			}
		}
		
		/**
		 * Get a user's data from the database.
		 * @param $userId - The userId field of the user to find in the database
		 * @return A user object containing the data, or an empty user object if the userId isn't found
		 */
		public static function getUser($userId)
		{
			global $db;
			$eUserId = $db->real_escape_string($userId);
			
			$sql  = "SELECT * ";
			$sql .= "FROM user ";
			$sql .= "WHERE user_id = ? ";
			$sql .= "LIMIT 1";
			
			$stmt = $db->stmt_init();
			if(!$stmt->prepare($sql))
			{
				echo "Failed to prepare statement";
				return;
			}
			else
			{
				$stmt->bind_param("s", $eUserId);
	
			    $stmt->execute();
			    $stmt->bind_result($userId, $firstName, $middleName, $lastName, $email, $phoneNumber, $objective);
	
			    $user = "";
	
			    while ($stmt->fetch())
			        $user = new User($userId, $firstName, $middleName, $lastName, $email, $phoneNumber, $objective);
	
			    return $user;
			}
		}
		
		/**
		 * Get all users from the database.
		 * @return An array containing all the user objects
		 */
		public static function getAllUsers()
		{
			global $db;
	
			$sql  = "SELECT * ";
			$sql .= "FROM user";
	
			$resultList = $db->query($sql);
			$users = [];
	
			while($result = $resultList->fetch_assoc())
			{
				$user = new User($result["user_id"], $result["first_name"], $result["middle_name"], $result["last_name"], 
						$result["email"], $result["phone_number"], $result["objective"]);			
				$users[] = $user;
			}
	
			return $users;
		}
		
		/**
		 * Update the record for the given user in the database.
		 * @param $user - The user object to update in the database
		 * @return true if user updated successfully, false otherwise
		 */
		public static function updateUser($user)
		{
			global $db;
			$eUserId = $db->real_escape_string($user->getUserId());
			$eFirstName = $db->real_escape_string($user->getFirstName());
			$eMiddleName = $db->real_escape_string($user->getMiddleName());
			$eLastName = $db->real_escape_string($user->getLastName());
			$eEmail = $db->real_escape_string($user->getEmail());
			$ePhoneNumber = $db->real_escape_string($user->getPhoneNumber());
			$eObjective = $db->real_escape_string($user->getObjective());
			
			$sql  = "UPDATE user ";
			$sql .= "SET first_name = ?, middle_name = ?, last_name = ?, email = ?, phone_number = ?, objective = ? ";
			$sql .= "WHERE user_id = ?";
			
			$stmt = $db->stmt_init();
			if(!$stmt->prepare($sql))
			{
				echo "Failed to prepare statement";
				return;
			}
			else
			{
				$stmt->bind_param("sssssss", $eFirstName, $eMiddleName, $eLastName, $eEmail, $ePhoneNumber, $eObjective, $eUserId);
				
				if($stmt->execute())
					return true;
				else
					return false;
			}
		}
		
		/**
		 * Delete the given record from the database.
		 * @param $userId - The userId to delete from the database
		 * @return true if the user is deleted successfully, false otherwise
		 */
		public static function deleteUser($userId)
		{
			global $db;
			$eUserId = $db->real_escape_string($userId);
		
			$sql  = "DELETE FROM user ";
			$sql .= "WHERE user_id = ?";
		
			$stmt = $db->stmt_init();
			if(!$stmt->prepare($sql))
			{
				echo "Failed to prepare statement";
				return;
			}
			else
			{
				$stmt->bind_param("s", $eUserId);
				if($stmt->execute())
					return true;
				else
					return false;
			}
		}
	}
?>