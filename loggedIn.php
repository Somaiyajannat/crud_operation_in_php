<?php
include_once 'configuration.php';
session_start();


class LoggedIn {

    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function login($submit) {
        if (isset($_POST[$submit])) {
            $user_name = $_POST['user_name'];
            $password = $_POST['password'];
            $_SESSION['user_name'] = $user_name;
            $_SESSION['password'] = $password;
//            $loginSql = "SELECT user_name, password from user_info where user_name ='" . $user_name . "' AND password ='" . $password . "'";
            $table = " user_info ";
            $column = "user_name, password ";
            $searchQuery = "user_name ='" . $user_name . "' AND password ='" . $password . "'";
            $loginResult = $this->db->select($table, $column, null, $searchQuery, null, null);
            $error = "Invalid Username and password!";

            if (($loginResult == true) && ($loginResult->num_rows > 0)) {
                while ($row = $loginResult->fetch_assoc()) {
                    $loginUsername = $row['user_name'];
                    $loginPassword = $row['password'];
                    if ($loginUsername == $user_name && $loginPassword == $password) {

                        header("Location:index.php?notification=Login SuccessFull!");
                    }
                }
            } else {
                header("Location:welcome.php?error=" . $error);
            }
        }
    }

}

?>