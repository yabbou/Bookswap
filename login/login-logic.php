<?php

include_once 'methods.php';

function checkIfValidUser($users, $email, $pwd)
{

    if (isset($users[$email])) {
        if ($users[$email] == $pwd) {
            $_SESSION['currentUser'] = array();
            $_SESSION['currentUser']['user'] = avoidSQLInjection(filter_input(INPUT_POST, 'email'));
            // setcookie("userCookie", $email, time() + 600); //deprecated
            $_SESSION['loggedIn'] = TRUE;
        } else {
            echo "The email and password do not match. Please try again.";
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

checkIfValidUser($_SESSION['users'],filter_input(INPUT_POST, 'email'), filter_input(INPUT_POST, 'pwd'));
