<?php 

function sanitizeFormPassword($inputText) {
	$inputText = strip_tags($inputText);
	return $inputText;
}

function sanitizeFormUsername($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	return $inputText;
}

function sanitizeFormString($inputText) {
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ", "", $inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}

//Register button was pressed
if(isset($_POST['registerButton'])) {
	$username = sanitizeFormUsername($_POST['username']);
	$email = sanitizeFormString($_POST['email']);
	$email2 = sanitizeFormString($_POST['email2']);
	$password = sanitizeFormPassword($_POST['password']);
	$password2 = sanitizeFormPassword($_POST['password2']);

	$registrationValid = $account->register($username, $email, $email2, $password, $password2);

	if($registrationValid) {
		$_SESSION['userLoggedIn'] = $username;
		header("Location: ../layouts/index.php");
		echo "You are now logged in!";
	}

}


