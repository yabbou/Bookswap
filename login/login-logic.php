<div class='inner-body'><h2>Login</h2>

<?php

include_once 'methods.php';

function checkIfValidUser($users, $email, $pwd)
{

    if (isset($users[$email])) {
        if ($users[$email] == $pwd) {
            $_SESSION['currentUser'] = array();
            // $_SESSION['currentUser']['user'] = avoidSQLInjection(filter_input(INPUT_POST, 'email'));
            setcookie("userEmail", $email, time() + (60 * 60 * 3)); // hour (60sec*60) * 3
            $_SESSION['loggedIn'] = TRUE;
        } else {
            echo "<h3>The email and password do not match. Please try again.</h3>";
        }
    }

    /* todo: implement adding new users to db */
    /*    else {
      echo "Adding user to database.";
      $users[$email] = $pwd;
      $_SESSION['users'] = $users; //necc?
      } */
}

$_SESSION['users'] = initSessionArray('users');

$e = avoidSQLInjection(filter_input(INPUT_POST, 'email'));
$p = avoidSQLInjection(filter_input(INPUT_POST, 'pwd'));
checkIfValidUser($_SESSION['users'], $e, $p);
