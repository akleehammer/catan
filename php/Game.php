<?php
    require_once 'boardLayout.php';
    require_once 'player.php';
    require_once 'InputValidator.php';
    
    // Each game has a creator, two participants, and a board layout
    class Game {
        // Name of the game creator as entered when creating the game
        private $creatorName;
        
        // Name of the game
        private $gameName;
        
        // Names of participants who join the game
        private $participant1;
        private $participant2;
        
        // Board layout for the game
        private $boardLayout;
        
        // InputValidator object
        private $validator;
        
        public function Game($creatorName, $gameName) {
            $this->validator = new InputValidator();
            if ($this->validator->ValidateName($creatorName) !== 1) {
                //echo "invalid player name";
                throw new Exception("Invalid player name.");
            }
            
            if ($this->validator->ValidateName($gameName) !== 1) {
                //echo "invalid game name";
                throw new Exception("Invalid game name.");
            }
            
            $this->creatorName = new Player($creatorName);
            $this->participant1 = "";
            $this->participant2 = "";
            //$this->boardLayout = new BoardLayout("gameFile.xml");
            
            if ($gameName != "") {
                $this->SetGameName($gameName);
            }
        }
        
        private function SetGameName($gameName) {
            $this->gameName = $gameName;
        }
    }
?>