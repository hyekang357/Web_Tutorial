<?php
	require_once(DB . "database.php");
	require_once(MODELS . "skill.php");
	
	class SkillHelper
	{
		/**
		 * Add a new skill to the database.
		 * @param $skill - The skill object to add to the database
		 * @return true if skill added successfully, false otherwise
		 */
		public static function addSkill($skill)
		{
			global $db;
			$eCategory = $db->real_escape_string($skill->getCategory());
			$eDescription = $db->real_escape_string($skill->getDescription());
			$eUserId = $db->real_escape_string($skill->getUserId());
		
			$sql  = "INSERT INTO skill ";
			$sql .= "(category, description, user_id) ";
			$sql .= "VALUES (?, ?, ?)";
		
			$stmt = $db->stmt_init();
			if(!$stmt->prepare($sql))
			{
				echo "Failed to prepare statement";
				return;
			}
			else
			{
				$stmt->bind_param("sss", $eCategory, $eDescription, $eUserId);
				if($stmt->execute())
					return true;
				else
					return false;
			}
		}
		
		/**
		 * Get all skill for the given userId from the database.
		 * @param $userId - The userId associated with skill records
		 * @return An array of skill objects containing the data, 
		 * 		or an empty array if no records are found
		 */
		public static function getSkill($userId)
		{
			global $db;
			$eUserId = $db->real_escape_string($userId);
		
			$sql  = "SELECT * ";
			$sql .= "FROM skill ";
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
				$stmt->bind_result($skillId, $category, $description, $userId);
				
				$skillList = [];
				
				while($stmt->fetch())
				{
					$skill = new Skill($skillId, $category, $description, $userId);
					$skillList[] = $skill;
				}
				
				return $skillList;
			}
		}
		
		/**
		 * Update the record for the given skill in the database.
		 * @param $skill - The skill object to update in the database
		 * @return true if skill updated successfully, false otherwise
		 */
		public static function updateSkill($skill)
		{
			global $db;
			$eSkillId = $db->real_escape_string($skill->getSkillId());
			$eCategory = $db->real_escape_string($skill->getCategory());
			$eDescription = $db->real_escape_string($skill->getDescription());
		
			$sql  = "UPDATE skill ";
			$sql .= "SET category = ?, description = ? ";
			$sql .= "WHERE skill_id = ?";
		
			$stmt = $db->stmt_init();
			if(!$stmt->prepare($sql))
			{
				echo "Failed to prepare statement";
				return;
			}
			else
			{
				$stmt->bind_param("sss", $eCategory, $eDescription, $eSkillId);
					
				if($stmt->execute())
					return true;
				else
					return false;
			}
		}
		
		/**
		 * Delete the given record from the database.
		 * @param $skillId - The skillId associated with the record to delete from the database
		 * @return true if the skill is deleted successfully, false otherwise
		 */
		public static function deleteSkill($skillId)
		{
			global $db;
			$eSkillId = $db->real_escape_string($skillId);
		
			$sql  = "DELETE FROM skill ";
			$sql .= "WHERE skill_id = ?";
		
			$stmt = $db->stmt_init();
			if(!$stmt->prepare($sql))
			{
				echo "Failed to prepare statement";
				return;
			}
			else
			{
				$stmt->bind_param("s", $eSkillId);
				if($stmt->execute())
					return true;
				else
					return false;
			}
		}
	}
?>