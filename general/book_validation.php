<?php

$titleErr = $catErr = $isbnErr = $profErr = "";
$title = $cat = $isbn = $prof = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["title"])) {
        $titleErr = "Title is required";
    } else {
        $title = avoidSQLInjection($_POST["title"]);

        if (!preg_match("/^[a-zA-Z ]*$/", $title)) {
            $titleErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["isbn"])) {
        $isbnErr = "ISBN-10 is required";
    } else {
        $isbn = avoidSQLInjection($_POST["isbn"]);
    }

    if (empty($_POST["prof"])) {
        $profErr = "Professor is required";
    } else {
        $prof = avoidSQLInjection($_POST["prof"]);
    }
}

function avoidSQLInjection($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//    if (empty($_POST["email"])) {
//        $emailErr = "Email is required";
//    } else {
//        $email = avoidSQLInjection($_POST["email"]);
//        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//            $emailErr = "Invalid email format";
//        }
//    }
