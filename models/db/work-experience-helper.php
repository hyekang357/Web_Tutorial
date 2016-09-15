<?php
	require_once(DB . "database.php");
	require_once(MODELS . "work-experience.php");
	
	class WorkExpHelper
	{
		/**
		 * Add a new work experience to the database.
		 * @param $workExp - The work experience object to add to the database
		 * @return true if work experience added successfully, false otherwise
		 */
		public static function addWorkExp($workExp)
		{
			global $db;
			$eCompany = $db->real_escape_string($workExp->getCompany());
			$eLocation = $db->real_escape_string($workExp->getLocation());
			$eJobTitle = $db->real_escape_string($workExp->getJobTitle());
			$eStartDate = $db->real_escape_string($workExp->getStartDate());
			$eEndDate = $db->real_escape_string($workExp->getEndDate());
			$eUserId = $db->real_escape_string($workExp->getUserId());
		
			$sql  = "INSERT INTO work_experience ";
			$sql .= "(company, location, job_title, start_date, end_date, user_id) ";
			$sql .= "VALUES (?, ?, ?, ?, ?, ?)";
		
			$stmt = $db->stmt_init();
			if(!$stmt->prepare($sql))
			{
				echo "Failed to prepare statement";
				return;
			}
			else
			{
				$stmt->bind_param("ssssss", $eCompany, $eLocation, $eJobTitle, $eStartDate, $eEndDate, $eUserId);
				if($stmt->execute())
					return true;
				else
					return false;
			}
		}
		
		/**
		 * Get all work experience for the given userId from the database.
		 * @param $userId - The userId associated with work experience records
		 * @return An array of work experience objects containing the data, 
		 * 		or an empty array if no records are found
		 */
		public static function getWorkExp($userId)
		{
			global $db;
			$eUserId = $db->real_escape_string($userId);
		
			$sql  = "SELECT * ";
			$sql .= "FROM work_experience ";
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
				
				$stmt->execute();
				$stmt->bind_result($workExpId, $company, $location, $jobTitle, $startDate, $endDate, $userId);
				
				$workExpList = [];
				
				while($stmt->fetch())
				{
					$workExp = new WorkExperience($workExpId, $company, $location, $jobTitle, $startDate, 
							$endDate, $userId);
					$workExpList[] = $workExp;
				}
				
				return $workExpList;
			}
		}
		
		/**
		 * Update the record for the given work experience in the database.
		 * @param $workExp - The work experience object to update in the database
		 * @return true if work experience updated successfully, false otherwise
		 */
		public static function updateWorkExp($workExp)
		{
			global $db;
			$eWorkExpId = $db->real_escape_string($workExp->getWorkExpId());
			$eCompany = $db->real_escape_string($workExp->getCompany());
			$eLocation = $db->real_escape_string($workExp->getLocation());
			$eJobTitle = $db->real_escape_string($workExp->getJobTitle());
			$eStartDate = $db->real_escape_string($workExp->getStartDate());
			$eEndDate = $db->real_escape_string($workExp->getEndDate());
		
			$sql  = "UPDATE work_experience ";
			$sql .= "SET company = ?, location = ?, job_title = ?, start_date = ?, end_date = ? ";
			$sql .= "WHERE work_exp_id = ?";
		
			$stmt = $db->stmt_init();
			if(!$stmt->prepare($sql))
			{
				echo "Failed to prepare statement";
				return;
			}
			else
			{
				$stmt->bind_param("ssssss", $eCompany, $eLocation, $eJobTitle, $eStartDate, $eEndDate, $eWorkExpId);
					
				if($stmt->execute())
					return true;
				else
					return false;
			}
		}
		
		/**
		 * Delete the given record from the database.
		 * @param $workExpId - The workExpId associated with the record to delete from the database
		 * @return true if the work experience is deleted successfully, false otherwise
		 */
		public static function deleteWorkExp($workExpId)
		{
			global $db;
			$eWorkExpId = $db->real_escape_string($workExpId);
		
			$sql  = "DELETE FROM work_experience ";
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
				if($stmt->execute())
					return true;
				else
					return false;
			}
		}
	}
?>