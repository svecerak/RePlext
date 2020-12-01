<?php

// include '../classes/Account.php';
// include '../layouts/db.php';

// $account = new Account($mysqli);

if(isset($_POST['loginButton'])) {
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];

    $result = $account->login($username, $password);

    if($result == true) {
        $_SESSION['userLoggedIn'] = $username;
        header("Location: ../layouts/main.blade.php");
    } else {
        echo "we have an error?";
    }

} else {
    echo "";
}

// if(isset($_GET['logoutButton'])) {
//     session_destroy();
//     unset($_SESSION['userLoggedIn']);
//     header("location: http://localhost/TailwindCSS/layouts/main.blade.php");
// }
?>

