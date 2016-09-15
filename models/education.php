<?php
	class Education
	{
		private $educationId;
		private $school;
		private $location;
		private $degree;
		private $graduationDate;
		private $userId;
		
		public function Education($educationId, $school, $location, $degree, $graduationDate, $userId)
		{
			$this->educationId = $educationId;
			$this->school = $school;
			$this->location = $location;
			$this->degree = $degree;
			$this->graduationDate = $graduationDate;
			$this->userId = $userId;
		}
		
		public function getEducationId()
		{
			return $this->educationId;
		}
		
		public function getSchool()
		{
			return $this->school;
		}
		
		public function setSchool($school)
		{
			$this->school = $school;
		}
		
		public function getLocation()
		{
			return $this->location;
		}
		
		public function setLocation($location)
		{
			$this->location = $location;
		}
		
		public function getDegree()
		{
			return $this->degree;
		}
		
		public function setDegree($degree)
		{
			$this->degree = $degree;
		}
		
		public function getGraduationDate()
		{
			return $this->graduationDate;
		}
		
		public function setGraduationDate($graduationDate)
		{
			$this->graduationDate = $graduationDate;
		}
		
		public function getUserId()
		{
			return $this->userId;
		}
		
		public function toString()
		{
			return
			"<div>Education Object</div>" .
			"<div>(</div>" .
				"<div class='sm-padding-left'>[ educationId ] => [ " . $this->educationId . " ],</div>" .
				"<div class='sm-padding-left'>[ school ] => [ " . $this->school . " ],</div>" .
				"<div class='sm-padding-left'>[ location ] => [ " . $this->location . " ],</div>" .
				"<div class='sm-padding-left'>[ degree ] => [ " . $this->degree . " ],</div>" .
				"<div class='sm-padding-left'>[ graduationDate ] => [ " . $this->graduationDate . " ],</div>" .
				"<div class='sm-padding-left'>[ userId ] => [ " . $this->userId . " ]</div>" .
			"<div>)</div>";
		}
	}
?>