<?php
	require_once(DB . "database.php");
	require_once(MODELS . "education.php");
	
	class EducationHelper
	{
		/**
		 * Add a new education to the database.
		 * @param $education - The education object to add to the database
		 * @return true if education added successfully, false otherwise
		 */
		public static function addEducation($education)
		{
			global $db;
			$eSchool = $db->real_escape_string($education->getSchool());
			$eLocation = $db->real_escape_string($education->getLocation());
			$eDegree = $db->real_escape_string($education->getDegree());
			$eGraduationDate = $db->real_escape_string($education->getGraduationDate());
			$eUserId = $db->real_escape_string($education->getUserId());
		
			$sql  = "INSERT INTO education ";
			$sql .= "(school, location, degree, graduation_date, user_id) ";
			$sql .= "VALUES (?, ?, ?, ?, ?)";
		
			$stmt = $db->stmt_init();
			if(!$stmt->prepare($sql))
			{
				echo "Failed to prepare statement";
				return;
			}
			else
			{
				$stmt->bind_param("sssss", $eSchool, $eLocation, $eDegree, $eGraduationDate, $eUserId);
				if($stmt->execute())
					return true;
				else
					return false;
			}
		}
		
		/**
		 * Get all education for the given userId from the database.
		 * @param $userId - The userId associated with education records
		 * @return An array of education objects containing the data, 
		 * 		or an empty array no records are found
		 */
		public static function getEducation($userId)
		{
			global $db;
			$eUserId = $db->real_escape_string($userId);
		
			$sql  = "SELECT * ";
			$sql .= "FROM education ";
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
				$stmt->bind_result($educationId, $school, $location, $degree, $graduationDate, $userId);
				
				$educationList = [];
				
				while($stmt->fetch())
				{
					$education = new Education($educationId, $school, $location, $degree, $graduationDate, $userId);
					$educationList[] = $education;
				}
				
				return $educationList;
			}
		}
		
		/**
		 * Update the record for the given education in the database.
		 * @param $education - The education object to update in the database
		 * @return true if education updated successfully, false otherwise
		 */
		public static function updateEducation($education)
		{
			global $db;
			$eEducationId = $db->real_escape_string($education->getEducationId());
			$eSchool = $db->real_escape_string($education->getSchool());
			$eLocation = $db->real_escape_string($education->getLocation());
			$eDegree = $db->real_escape_string($education->getDegree());
			$eGraduationDate = $db->real_escape_string($education->getGraduationDate());
		
			$sql  = "UPDATE education ";
			$sql .= "SET school = ?, location = ?, degree = ?, graduation_date = ? ";
			$sql .= "WHERE education_id = ?";
		
			$stmt = $db->stmt_init();
			if(!$stmt->prepare($sql))
			{
				echo "Failed to prepare statement";
				return;
			}
			else
			{
				$stmt->bind_param("sssss", $eSchool, $eLocation, $eDegree, $eGraduationDate, $eEducationId);
					
				if($stmt->execute())
					return true;
				else
					return false;
			}
		}
		
		/**
		 * Delete the given record from the database.
		 * @param $educationId - The educationId associated with the record to delete from the database
		 * @return true if the education is deleted successfully, false otherwise
		 */
		public static function deleteEducation($educationId)
		{
			global $db;
			$eEducationId = $db->real_escape_string($educationId);
		
			$sql  = "DELETE FROM education ";
			$sql .= "WHERE education_id = ?";
		
			$stmt = $db->stmt_init();
			if(!$stmt->prepare($sql))
			{
				echo "Failed to prepare statement";
				return;
			}
			else
			{
				$stmt->bind_param("s", $eEducationId);
				if($stmt->execute())
					return true;
				else
					return false;
			}
		}
	}
?>