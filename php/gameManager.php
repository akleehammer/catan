<?php

	require_once 'Game.php';

class GameManager	{
	
	private $currentGameList;
	private $waitingGameList;
	private $gameFolder = "/games/";
	
	public function __construct() {
		$this->gameList = array();
		foreach(glob($this->gameFolder . "/*.xml") as $filename){
			$this->gameList[] = $filename;
		}
		$this->waitingGameList = array();
		foreach(glob($this->gameFolder . "/*.wait") as $filename) {
			$this->waitingGameList[] = $filename;
		}
		
		sort($this->gameList);		
		sort($this->waitingGameList);
	}
	
	public function getGameList()	{
		return $this->gameList;
	}
	
	public function getOpenGames()	{
		return $this->waitingGameList;
	}
	
	public function createEmptyGame($creator)	{
		do
		{
			#Create random game number and then pad so all game numbers are a full 10 digits.
			$gameNum = rand(1, 9999999999);
			$gameNumStr = str_pad($gameNum, 10, "0", STR_PAD_LEFT);
		}
		while ($this->isGameIDAvailable($gameNumStr));
		
		## NEED something to check to make sure file was created properly (dir permissions)
		$gfFP = fopen("./" . $gameNumStr . ".wait", "w");
		
		fwrite($gfFP, $creator . "\n");
		fclose($gfFP);
		$this->waitingGameList[] = $gameNumStr;
		return $gameNumStr;
	}
	
	public function joinGame($gameID)	{
		if (!in_array($gameID, $this->waitingGameList))
		{
			throw new Exception("Game ID doesn't exist");
		}
		$fileContent = file("./" . $gameID . ".wait");
		$creator = $fileContent[0];
		## NEED to pass XML file or assume Game.php will create it.
		$game = Game::Game($creator, $gameID);
		unlink("./" . $gameID . ".wait");
		if(($key = array_search($gameID, $this->waitingGameList)) !== false) {
			unset($this->waitingGameList[$key]);
		}
		
		return $game;
	}
		
	public function isGameIDAvailable($gameID)
	{
		return ! (in_array($gameID, $this->gameList) || in_array($gameID, $this->waitingGameList));
        
        // return ! (in_array($gameID, $this->currentGameList) || in_array($gameID, $this->waitingGameList));
	}
	
	public function isGame($gameID)
	{
		return in_array($gameID . ".xml", $this->gameList);
	}
	
	
	
}

?>
