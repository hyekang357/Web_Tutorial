<?php
	class Address
	{
		private $addressId;
		private $line1;
		private $line2;
		private $city;
		private $state;
		private $zip;
		private $country;
		private $userId;
		
		public function Address($addressId, $line1, $line2, $city, $state, $zip, $country, $userId)
		{
			$this->addressId = $addressId;
			$this->line1 = $line1;
			$this->line2 = $line2;
			$this->city = $city;
			$this->state = $state;
			$this->zip = $zip;
			$this->country = $country;
			$this->userId = $userId;
		}
		
		public function getAddressId()
		{
			return $this->addressId;
		}
		
		public function getLine1()
		{
			return $this->line1;
		}
		
		public function setLine1($line1)
		{
			$this->line1 = $line1;
		}
		
		public function getLine2()
		{
			return $this->line2;
		}
		
		public function setLine2($line2)
		{
			$this->line2 = $line2;
		}
		
		public function getCity()
		{
			return $this->city;
		}
		
		public function setCity($city)
		{
			$this->city = $city;
		}
		
		public function getState()
		{
			return $this->state;
		}
		
		public function setState($state)
		{
			$this->state = $state;
		}
		
		public function getZip()
		{
			return $this->zip;
		}
		
		public function setZip($zip)
		{
			$this->zip = $zip;
		}
		
		public function getCountry()
		{
			return $this->country;
		}
		
		public function setCountry($country)
		{
			$this->country = $country;
		}
		
		public function getUserId()
		{
			return $this->userId;
		}
		
		public function toString()
		{
			return 
			"<div>Address Object</div>" .
			"<div>(</div>" .
				"<div class='sm-padding-left'>[ addressId ] => [ " . $this->addressId . " ],</div>" .
				"<div class='sm-padding-left'>[ line1 ] => [ " . $this->line1 . " ],</div>" .
				"<div class='sm-padding-left'>[ line2 ] => [ " . $this->line2 . " ],</div>" .
				"<div class='sm-padding-left'>[ city ] => [ " . $this->city . " ],</div>" .
				"<div class='sm-padding-left'>[ state ] => [ " . $this->state . " ],</div>" .
				"<div class='sm-padding-left'>[ zip ] => [ " . $this->zip . " ],</div>" .
				"<div class='sm-padding-left'>[ country ] => [ " . $this->country . " ],</div>" .
				"<div class='sm-padding-left'>[ userId ] => [ " . $this->userId . " ]</div>" .
			"<div>)</div>";
		}
	}
?>