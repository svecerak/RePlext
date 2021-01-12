<?php

class Account {

	// Instance variables

	private $con;
	private $errorArray;


	/**
	 * Class constructor
	 */
	public function __construct($con) { // pass in $con vairable from register.php
		$this->con = $con; // assigning the con var from register.php to the private instance var in this class
		$this->errorArray = array();
	}


	/**
	 * Login function
	 * TODO: Poor security, change to bcrypt
	 */
	public function login($username, $password) {
		$pw = md5($password);
		$p_username = '';
		$p_pass = '';			

		// SQL Query

		$sql =  "SELECT * FROM users ";
		$sql .= "WHERE username = ? ";
		$sql .= "AND password = ?";

		// Prepare statement

		if ($stmt = $this->con->prepare($sql)) {
			$stmt->bind_param("ss", $p_username, $p_pass);
			$p_username = $username;
			$p_pass = $pw;

			if ($stmt->execute()) {
				$result = $stmt->get_result();

				if ($result->num_rows == 1) {
					return true;
				} else {
					$this->errorArray[] = Constants::$loginFailed;
					return false;
				}
			}
		} 

		// Close statement and connection

		$stmt->close();
		$this->con->close();
		}    
		

	/**
	 * Registration function
	 */
	public function register($un, $em, $em2, $pw, $pw2) {
		$this->validateUsername($un);
		$this->validateEmails($em, $em2);
		$this->validatePasswords($pw, $pw2);

		if(empty($this->errorArray)) {
			return $this->insertUserDetails($un, $em, $pw);
		} else {
			return false;
		}
	}


	/**
	 * Check for errors
	 */
	public function getError($error) {
		if(!in_array($error, $this->errorArray)) {
			$error = "";
		}
		return "<span class='errorMessage'>$error</span>";
	}
	
	
	/**
	 * Insert information into database
	 * TODO: Poor security hashing function, change to bcrypt
	 */
	private function insertUserDetails($un, $em, $pw) {
		$encryptedPw = md5($pw); 
		$profile_image = "../assets/images/profile-pics/head_emerald.png";
		$date = date("Y-m-d");

		// SQL Query

		$sql = 'INSERT INTO users (username, email, password, profile_image) ';
		$sql .= 'VALUES (?, ?, ?, ?)';

		// Prepare statement

		if($stmt = $this->con->prepare($sql)) {
			$stmt->bind_param("ssss", $un, $em, $encryptedPw, $profile_image);
			$stmt->execute();
		} else {
			$error = $this->con->errno;
			echo $error;
		}

		return $stmt;
	}
		

	/**
	 * Validate username and save errors to array
	 * 
	 */
	private function validateUsername($username) {
		if(strlen($username) > 25 || strlen($username) < 5) {
			$this->errorArray[] = Constants::$usernameCharacters;
			return;
		}

		// SQL query

		$sql  = "SELECT username ";
		$sql .= "FROM users ";
		$sql .= "WHERE username=?";

		// Prepared statement

		$stmt = $this->con->prepare($sql);
		$stmt->bind_param("s", $username);
		$stmt->execute();

		// Check whether username has already been taken

		$result = $stmt->get_result();

		if($result->num_rows != 0) {
			$this->errorArray[] = Constants::$usernameTaken;
			return;
		}
	}


	/**
	 * Validate emails, ensure they match
	 */
	private function validateEmails($em, $em2) {

		if($em != $em2) {
			$this->errorArray[] = Constants::$emailsDoNotMatch;
			return;
		}

		else if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
			$this->errorArray[] = Constants::$emailInvalid;
			return;
		}

		// SQL

		$sql  = "SELECT email ";
		$sql .= "FROM users ";
		$sql .= "WHERE email=?";

		// Prepared statement

		$stmt = $this->con->prepare($sql);
		$stmt->bind_param("s", $em);
		$stmt->execute();

		// Check whether email has already been taken

		$result = $stmt->get_result();
		
		if($result->num_rows != 0) {
			$this->errorArray[] = Constants::$emailTaken;
		}

		return;
	}


	/**
	 * Validate passwords, ensure matching entries
	 */
	private function validatePasswords($pw, $pw2) {
		
		if($pw != $pw2) 
			$this->errorArray[] = Constants::$passwordsDoNoMatch;
		
		else if(preg_match('/[^A-Za-z0-9]/', $pw)) 
			$this->errorArray[] = Constants::$passwordNotAlphanumeric;
		
		else if(strlen($pw) > 30 || strlen($pw) < 5) 
			$this->errorArray[] = Constants::$passwordCharacters;

		return;
	}
}
?>