<?php

include_once ('loggedIn.php');

$login_user = new loggedIn();
$login_user->login('submit');
/*
session_start();

if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $_SESSION['user_name'] = $user_name;
    $_SESSION['password'] = $password;


    $loginSql = "SELECT user_name, password from user_info where user_name ='" . $user_name . "' AND password ='" . $password . "'";
    $loginResult = $conn->query($loginSql);
    $error = "Invalid Username and password!";

    if (($loginResult == true) && ($loginResult->num_rows > 0)) {
        while ($row = $loginResult->fetch_assoc()) {
            $loginUsername = $row['user_name'];
            $loginPassword = $row['password'];
            if ($loginUsername == $user_name && $loginPassword == $password) {

                header("Location:index.php?notification=Login SuccessFull!");
            } 
    }
        }else {
        header("Location:welcome.php?error=" . $error);
    } 
}
  */

?>
