<?php
	class Responsibility
	{
		private $responsibilityId;
		private $description;
		private $workExpId;
		
		public function Responsibility($responsibilityId, $description, $workExpId)
		{
			$this->responsibilityId = $responsibilityId;
			$this->description = $description;
			$this->workExpId = $workExpId;
		}
		
		public function getResponsibilityId()
		{
			return $this->responsibilityId;
		}
		
		public function getDescription()
		{
			return $this->description;
		}
		
		public function setDescription($description)
		{
			$this->description = $description;
		}
		
		public function getWorkExpId()
		{
			return $this->workExpId;
		}
		
		public function toString()
		{
			return
			"<div>Responsibility Object</div>" .
			"<div>(</div>" .
				"<div class='sm-padding-left'>[ responsibilityId ] => [ " . $this->responsibilityId . " ],</div>" .
				"<div class='sm-padding-left'>[ description ] => [ " . $this->description . " ],</div>" .
				"<div class='sm-padding-left'>[ workExpId ] => [ " . $this->workExpId . " ]</div>" .
			"<div>)</div>";
		}
	}
?>