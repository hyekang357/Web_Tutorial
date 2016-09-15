<?php
	class WorkExperience
	{
		private $workExpId;
		private $company;
		private $location;
		private $jobTitle;
		private $startDate;
		private $endDate;
		private $userId;
		
		public function WorkExperience($workExpId, $company, $location, $jobTitle, $startDate, $endDate, $userId)
		{
			$this->workExpId = $workExpId;
			$this->company = $company;
			$this->location = $location;
			$this->jobTitle = $jobTitle;
			$this->startDate = $startDate;
			$this->endDate = $endDate;
			$this->userId = $userId;
		}
		
		public function getWorkExpId()
		{
			return $this->workExpId;
		}
		
		public function getCompany()
		{
			return $this->company;
		}
		
		public function setCompany($company)
		{
			$this->company = $company;
		}
		
		public function getLocation()
		{
			return $this->location;
		}
		
		public function setLocation($location)
		{
			$this->location = $location;
		}
		
		public function getJobTitle()
		{
			return $this->jobTitle;
		}
		
		public function setJobTitle($jobTitle)
		{
			$this->jobTitle = $jobTitle;
		}
		
		public function getStartDate()
		{
			return $this->startDate;
		}
		
		public function setStartDate($startDate)
		{
			$this->startDate = $startDate;
		}
		
		public function getEndDate()
		{
			return $this->endDate;
		}
		
		public function setEndDate($endDate)
		{
			$this->endDate = $endDate;
		}
		
		public function getUserId()
		{
			return $this->userId;
		}
		
		public function toString()
		{
			return
			"<div>Work Experience Object</div>" .
			"<div>(</div>" .
				"<div class='sm-padding-left'>[ workExpId ] => [ " . $this->workExpId . " ],</div>" .
				"<div class='sm-padding-left'>[ company ] => [ " . $this->company . " ],</div>" .
				"<div class='sm-padding-left'>[ location ] => [ " . $this->location . " ],</div>" .
				"<div class='sm-padding-left'>[ jobTitle ] => [ " . $this->jobTitle . " ],</div>" .
				"<div class='sm-padding-left'>[ startDate ] => [ " . $this->startDate . " ],</div>" .
				"<div class='sm-padding-left'>[ endDate ] => [ " . $this->endDate . " ],</div>" .
				"<div class='sm-padding-left'>[ userId ] => [ " . $this->userId . " ]</div>" .
			"<div>)</div>";
		}
	}
?>