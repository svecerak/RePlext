<?php

	class Account {

        private $con;
		private $errorArray;

		public function __construct($con) { // pass in $con vairable from register.php
            $this->con = $con; // assigning the con var from register.php to the private instance var in this class
			$this->errorArray = array();
		}
 
        public function login($un, $pw) {
            $pw = md5($pw);
			$p_username = '';
			$p_pass = '';

			// $sql =  "SELECT * FROM users WHERE username='$un' AND password='$pw'";
			

			$sql =  "SELECT * FROM users ";
			$sql .= "WHERE username = ? ";
			$sql .= "AND password = ?";

			// Prepare statement
			if ($stmt = $this->con->prepare($sql)) {

				$stmt->bind_param("ss", $p_username, $p_pass);

				$p_username = $un;
				$p_pass = $pw;

				if ($stmt->execute()) {
					$result = $stmt->get_result();

					if ($result->num_rows == 1) {
						return true;
					} else {
						array_push($this->errorArray, Constants::$loginFailed);
						return false;
					}
				}
			} 
			// Close statement
			$stmt->close();
			// Close connection
			$this->con->close();
         }    
			



            // $query = mysqli_query($this->con, $sql);

            // if(mysqli_num_rows($query) == 1){
            //     return true;
            // } else {
            //     array_push($this->errorArray, Constants::$loginFailed);
            //     return false;
            // }
       

		public function register($un, $em, $em2, $pw, $pw2) {
			$this->validateUsername($un);
			$this->validateEmails($em, $em2);
			$this->validatePasswords($pw, $pw2);

			if(empty($this->errorArray) == true) {
                //Insert into db
                return $this->insertUserDetails($un, $em, $pw);
			} else {
				return false;
			}

		}

		public function getError($error) {
			if(!in_array($error, $this->errorArray)) {
				$error = "";
			}
			return "<span class='errorMessage'>$error</span>";
        }
        

        private function insertUserDetails($un, $em, $pw) {
            $encryptedPw = md5($pw); // OUTDATED TODO: Fix
            $profile_image = "assets/images/profile-pics/head_emerald.png";
			$date = date("Y-m-d");
			$id = '';

			$sql = "INSERT INTO users ";
			$sql .= "VALUES (?, ?, ?, ?, ?, ?)";

			$stmt = $this->con->prepare($sql);
			$stmt->bind_param("ssssss", $id, $un, $em, $encryptedPw, $profile_image, $date);
			$stmt->execute();

			return $stmt;
		}
			
			
			// $result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPw', '$date', '$profilePic')");
			


			// return $result;
            // return $stmt;
        






		private function validateUsername($un) {
			if(strlen($un) > 25 || strlen($un) < 5) {
				array_push($this->errorArray, "Your username must be between 5 and 25 characters");
				return;
			}

            $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$un'");
            if(mysqli_num_rows($checkUsernameQuery) != 0) {
                array_push($this->errorArray, Constants::$usernameTaken);
                return;
            }
		}

		// private function validateFirstName($fn) {
		// 	if(strlen($fn) > 25 || strlen($fn) < 2) {
		// 		array_push($this->errorArray, "Your first name must be between 2 and 25 characters");
		// 		return;
		// 	}
		// }

		// private function validateLastName($ln) {
		// 	if(strlen($ln) > 25 || strlen($ln) < 2) {
		// 		array_push($this->errorArray, "Your last name must be between 2 and 25 characters");
		// 		return;
		// 	}
		// }

		private function validateEmails($em, $em2) {
			if($em != $em2) {
				array_push($this->errorArray, "Your emails don't match");
				return;
			}

			if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
				array_push($this->errorArray, "Email is invalid");
				return;
			}

            $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$em'");
            if(mysqli_num_rows($checkEmailQuery) != 0) {
                array_push($this->errorArray, Constants::$emailTaken);
                return;
            }

		}

		private function validatePasswords($pw, $pw2) {
			
			if($pw != $pw2) {
				array_push($this->errorArray, "Your passwords don't match");
				return;
			}

			if(preg_match('/[^A-Za-z0-9]/', $pw)) {
				array_push($this->errorArray, "Your password can only contain numbers and letters");
				return;
			}

			if(strlen($pw) > 30 || strlen($pw) < 5) {
				array_push($this->errorArray, "Your password must be between 5 and 30 characters");
				return;
			}

		}


	}
?>