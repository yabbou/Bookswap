<?php

function checkIfValidUser($users, $email, $pwd)
{
    //todo: prevent sql injection here!!!

    if (isset($users[$email])) {
        if ($users[$email] == $pwd) { //fix: works only after second login...
            setcookie("userCookie", $email, time() + 600); //change to session var
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

checkIfValidUser(
    $_SESSION['users'],
    filter_input(INPUT_POST, 'email'),
    filter_input(INPUT_POST, 'pwd')
);
