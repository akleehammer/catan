<?php

class BoardCorner	{
	
	private static $RESOURCE_TYPES = array("brick", "desert", "lumber", "ore", "wheat", "wool");
	
	private $topRoad = "empty";
	private $bottomRoad = "empty";
	private $rightRoad = "empty";
	private $leftRoad = "empty";
	
	// Occupation has 2 variables. Type (Empty, Settlement, or City) and By (empty or PlayerID).
	private $occupationType = "empty";
	private $occupiedBy = "empty";
	
	private $resourceType = "desert";
	private $rollNumber = 0;
	
	public function setResourceType($type)
	{
		if (! in_array($type, self::$RESOURCE_TYPES))
				throw new Exception("Invalid Resource Type");
		
		$this->resourceType = $type;
	}
	
	public function setRollNumber($number)	{
		if ($number < 2 || $number > 12)
			throw new Exception("Invalid Chit Number");
		
		$this->rollNumber = $number;
	}
}

class BoardLayout	{
	
	private $xmlFile = "";
	private $boardLayout;
	
	public function __construct($xmlFile) {
		$this->xmlFile = $xmlFile;
		
		$dieArray = array(2,3,4,5,6,8,9,10,11,12);
		$extraDie = array(3,4,5,6,8,9,10,11);
		$resourceArray = array("desert", "brick", "brick", "brick", "lumber", "lumber", "lumber", "ore", "ore", "ore", "wheat", "wheat", "wheat", "wool", "wool", "wool");
		
		for ($i=0; $i < 5; $i++)
		{
			$index = rand(0, count($extraDie)-1);
			$dieArray[] = $extraDie[$index];
			unset($extraDie[$index]);			
		}
		
		for ($i=0; $i < 3; $i++)
		{
			shuffle($dieArray);
			shuffle($resourceArray);
		}
		
		$this->generateGameBoard($resourceArray, $dieArray);
	}
	
	private function generateGameBoard($resourceLayout, $dieLayout)	{
		// Board is 4x4 with 16 resource tiles. Only 15 die rolls because the single desert tile must be 7. 
		if (count($resourceLayout) < 16 || count($dieLayout) < 15)
			throw new Exception("Incorrect resource/die layout.");
		
		$this->boardLayout = array();
		$resourceIndex = 0;
		$dieIndex = 0;
		
		for ($row=0; $row < 6; $row++)
		{
			for($column=0; $column < 6; $column++)
			{
				$corner = new BoardCorner();
				
				// Row/Column 5 are the far edges, only used for tracking right/down road, respectively.
				if ($column != 5 || $row == 5)
				{
					$rollNumber = 7;
					$resType = $resourceLayout[$resourceIndex];
					$resourceIndex++;
					if ($resType != "desert")
					{
						$rollNumber = $dieLayout[$dieIndex];
						$dieIndex++;
					}

					$corner->setResourceType($resType);
					$corner->setRollNumber($rollNumber);
				}
				$this->boardArray[$row][$column] = $corner;
			}
		}
	}
}
?>
