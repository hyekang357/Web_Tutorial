<?php
	require_once(DB . "database.php");
	require_once(MODELS . "responsibility.php");
	
	class ResponsibilityHelper
	{
		/**
		 * Add a new responsibility to the database.
		 * @param $responsibility - The responsibility object to add to the database
		 * @return true if education added successfully, false otherwise
		 */
		public static function addResponsibility($responsibility)
		{
			global $db;
			$eDescription = $db->real_escape_string($responsibility->getDescription());
			$eWorkExpId = $db->real_escape_string($responsibility->getWorkExpId());
		
			$sql  = "INSERT INTO responsibility ";
			$sql .= "(description, work_exp_id) ";
			$sql .= "VALUES (?, ?)";
		
			$stmt = $db->stmt_init();
			if(!$stmt->prepare($sql))
			{
				echo "Failed to prepare statement";
				return;
			}
			else
			{
				$stmt->bind_param("ss", $eDescription, $eWorkExpId);
				if($stmt->execute())
					return true;
				else
					return false;
			}
		}
		
		/**
		 * Get all responsibility for the given workExpId from the database.
		 * @param $workExpId - The workExpId associated with responsibility records
		 * @return An array of responsibility objects containing the data, 
		 * 		or an empty array if no records are found
		 */
		public static function getResponsibility($workExpId)
		{
			global $db;
			$eWorkExpId = $db->real_escape_string($workExpId);
		
			$sql  = "SELECT * ";
			$sql .= "FROM responsibility ";
			$sql .= "WHERE work_exp_id = ?";
			
			$stmt = $db->stmt_init();
			if(!$stmt->prepare($sql))
			{
				echo "Failed to prepare statement";
				return;
			}
			else
			{					
				$stmt->bind_param("s", $eWorkExpId);
				
				$stmt->execute();
				$stmt->bind_result($responsibilityId, $description, $workExpId);
				
				$responsibilityList = [];
				
				while($stmt->fetch())
				{
					$responsibility = new Responsibility($responsibilityId, $description, $workExpId);
					$responsibilityList[] = $responsibility;
				}
				
				return $responsibilityList;
			}
		}
		
		/**
		 * Update the record for the given responsibility in the database.
		 * @param $responsibility - The responsibility object to update in the database
		 * @return true if responsibility updated successfully, false otherwise
		 */
		public static function updateResponsibility($responsibility)
		{
			global $db;
			$eResponsibilityId = $db->real_escape_string($responsibility->getResponsibilityId());
			$eDescription = $db->real_escape_string($responsibility->getDescription());
		
			$sql  = "UPDATE responsibility ";
			$sql .= "SET description = ? ";
			$sql .= "WHERE responsibility_id = ?";
		
			$stmt = $db->stmt_init();
			if(!$stmt->prepare($sql))
			{
				echo "Failed to prepare statement";
				return;
			}
			else
			{
				$stmt->bind_param("ss", $eDescription, $eResponsibilityId);
					
				if($stmt->execute())
					return true;
				else
					return false;
			}
		}
		
		/**
		 * Delete the given record from the database.
		 * @param $responsibilityId - The responsibilityId associated with the record to delete from the database
		 * @return true if the responsibility is deleted successfully, false otherwise
		 */
		public static function deleteResponsibility($responsibilityId)
		{
			global $db;
			$eResponsibilityId = $db->real_escape_string($responsibilityId);
		
			$sql  = "DELETE FROM responsibility ";
			$sql .= "WHERE responsibility_id = ?";
		
			$stmt = $db->stmt_init();
			if(!$stmt->prepare($sql))
			{
				echo "Failed to prepare statement";
				return;
			}
			else
			{
				$stmt->bind_param("s", $eResponsibilityId);
				if($stmt->execute())
					return true;
				else
					return false;
			}
		}
	}
?>