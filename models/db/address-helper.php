<?php
	require_once(DB . "database.php");
	require_once(MODELS . "address.php");
	
	class AddressHelper
	{
		/**
		 * Add a new address to the database.
		 * @param $address - The address object to add to the database
		 * @return true if address added successfully, false otherwise
		 */
		public static function addAddress($address)
		{
			global $db;
			$eLine1 = $db->real_escape_string($address->getLine1());
			$eLine2 = $db->real_escape_string($address->getLine2());
			$eCity = $db->real_escape_string($address->getCity());
			$eState = $db->real_escape_string($address->getState());
			$eZip = $db->real_escape_string($address->getZip());
			$eCountry = $db->real_escape_string($address->getCountry());
			$eUserId = $db->real_escape_string($address->getUserId());
		
			$sql  = "INSERT INTO address ";
			$sql .= "(line_1, line_2, city, state, zip, country, user_id) ";
			$sql .= "VALUES (?, ?, ?, ?, ?, ?, ?)";
		
			$stmt = $db->stmt_init();
			if(!$stmt->prepare($sql))
			{
				echo "Failed to prepare statement";
				return;
			}
			else
			{
				$stmt->bind_param("sssssss", $eLine1, $eLine2, $eCity, $eState, $eZip, $eCountry, $eUserId);
				if($stmt->execute())
					return true;
				else
					return false;
			}
		}
		
		/**
		 * Get an address record from the database.
		 * @param $userId - The userId associated with an address record in the database
		 * @return An address object containing the data, or an empty address object if the userId isn't found
		 */
		public static function getAddress($userId)
		{
			global $db;
			$eUserId = $db->real_escape_string($userId);
		
			$sql  = "SELECT * ";
			$sql .= "FROM address ";
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
				$stmt->bind_result($addressId, $line1, $line2, $city, $state, $zip, $country, $userId);
		
				$address = "";
		
				while ($stmt->fetch())
					$address = new Address($addressId, $line1, $line2, $city, $state, $zip, $country, $userId);
		
				return $address;
			}
		}
		
		/**
		 * Update the record for the given address in the database.
		 * @param $address - The address object to update in the database
		 * @return true if address updated successfully, false otherwise
		 */
		public static function updateAddress($address)
		{
			global $db;
			$eLine1 = $db->real_escape_string($address->getLine1());
			$eLine2 = $db->real_escape_string($address->getLine2());
			$eCity = $db->real_escape_string($address->getCity());
			$eState = $db->real_escape_string($address->getState());
			$eZip = $db->real_escape_string($address->getZip());
			$eCountry = $db->real_escape_string($address->getCountry());
			$eUserId = $db->real_escape_string($address->getUserId());
		
			$sql  = "UPDATE address ";
			$sql .= "SET line_1 = ?, line_2 = ?, city = ?, state = ?, zip = ?, country = ? ";
			$sql .= "WHERE user_id = ?";
		
			$stmt = $db->stmt_init();
			if(!$stmt->prepare($sql))
			{
				echo "Failed to prepare statement";
				return;
			}
			else
			{
				$stmt->bind_param("sssssss", $eLine1, $eLine2, $eCity, $eState, $eZip, $eCountry, $eUserId);
					
				if($stmt->execute())
					return true;
				else
					return false;
			}
		}
		
		/**
		 * Delete the given record from the database.
		 * @param $userId - The userId associated with the address record to delete from the database
		 * @return true if the address is deleted successfully, false otherwise
		 */
		public static function deleteAddress($userId)
		{
			global $db;
			$eUserId = $db->real_escape_string($userId);
		
			$sql  = "DELETE FROM address ";
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