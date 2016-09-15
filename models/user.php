<?php
	class User
	{
		private $userId;
		private $firstName;
		private $middleName;
		private $lastName;
		private $email;
		private $phoneNumber;
		private $objective;
		
		public function User($userId, $firstName, $middleName, $lastName, $email, $phoneNumber, $objective)
		{
			$this->userId = $userId;
			$this->firstName = $firstName;
			$this->middleName = $middleName;
			$this->lastName = $lastName;
			$this->email = $email;
			$this->phoneNumber = $phoneNumber;
			$this->objective = $objective;
		}
		
		public function getUserId()
		{
			return $this->userId;
		}
		
		public function getFirstName()
		{
			return $this->firstName;
		}
		
		public function setFirstName($firstName)
		{
			$this->firstName = $firstName;
		}
		
		public function getMiddleName()
		{
			return $this->middleName;
		}
		
		public function setMiddleName($middleName)
		{
			$this->middleName = $middleName;
		}
		
		public function getLastName()
		{
			return $this->lastName;
		}
		
		public function setLastName($lastName)
		{
			$this->lastName = $lastName;
		}
		
		public function getEmail()
		{
			return $this->email;
		}
		
		public function setEmail($email)
		{
			$this->email = $email;
		}
		
		public function getPhoneNumber()
		{
			return $this->phoneNumber;
		}
		
		public function setPhoneNumber($phoneNumber)
		{
			$this->phoneNumber = $phoneNumber;
		}
		
		public function getObjective()
		{
			return $this->objective;
		}
		
		public function setObjective($objective)
		{
			$this->objective = $objective;
		}
				
		public function toString()
		{
			return 
			"<div>User Object</div>" .
			"<div>(</div>" .
				"<div class='sm-padding-left'>[ userId ] => [ " . $this->userId . " ],</div>" .
				"<div class='sm-padding-left'>[ firstName ] => [ " . $this->firstName . " ],</div>" .
				"<div class='sm-padding-left'>[ middleName ] => [ " . $this->middleName . " ],</div>" .
				"<div class='sm-padding-left'>[ lastName ] => [ " . $this->lastName . " ],</div>" .
				"<div class='sm-padding-left'>[ email ] => [ " . $this->email . " ],</div>" .
				"<div class='sm-padding-left'>[ phoneNumber ] => [ " . $this->phoneNumber . " ],</div>" .
				"<div class='sm-padding-left'>[ objective ] => [ " . $this->objective . " ]</div>" .
			"<div>)</div>";
		}
	}
?>