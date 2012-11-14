<?php
	class InputValidator {
		public function InputValidator() { }

		public function ValidateName($name) {
            return preg_match("#^[a-zA-Z1-9]{1}[a-zA-z0-9]{4,29}$#", $name);
        }
        
        public function ValidateUsername($userName) {
            return preg_match("#^[a-zA-Z1-9]{1}[a-zA-z0-9]{5,19}$#", $userName);
        }

        public function ValidatePassword($password) {
            return preg_match("#^[a-zA-Z0-9~!@\#\$\%\^\&\*\(\)\|\.\,]{5,30}$#", $password);
        }
	}
?>