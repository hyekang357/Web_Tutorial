<?php
	class Skill
	{
		private $skillId;
		private $category;
		private $description;
		private $userId;
		
		public function Skill($skillId, $category, $description, $userId)
		{
			$this->skillId = $skillId;
			$this->category = $category;
			$this->description = $description;
			$this->userId = $userId;
		}
		
		public function getSkillId()
		{
			return $this->skillId;
		}
		
		public function getCategory()
		{
			return $this->category;
		}
		
		public function setCategory($category)
		{
			$this->category = $category;
		}
		
		public function getDescription()
		{
			return $this->description;
		}
		
		public function setDescription($description)
		{
			$this->description = $description;
		}
		
		public function getUserId()
		{
			return $this->userId;
		}
		
		public function toString()
		{
			return
			"<div>Skill Object</div>" .
			"<div>(</div>" .
				"<div class='sm-padding-left'>[ skillId ] => [ " . $this->skillId . " ],</div>" .
				"<div class='sm-padding-left'>[ category ] => [ " . $this->category . " ],</div>" .
				"<div class='sm-padding-left'>[ description ] => [ " . $this->description . " ],</div>" .
				"<div class='sm-padding-left'>[ userId ] => [ " . $this->userId . " ]</div>" .
			"<div>)</div>";
		}
	}
?>