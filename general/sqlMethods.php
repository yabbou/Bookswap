<?php

function initDb()
{
    return mysqli_connect("localhost", "root", "", "bookswap");
}

function exitIfErr($conn)
{
    if ($conn->connect_errno) {
        exit();
    }
}

function insertBook($conn, $title, $category, $isbn10, $prof, $img)
{
    $sql = "INSERT INTO book (TITLE,CATEGORY,`ISBN_10`,`ISBN_13`, PROFESSOR, Image) 
    VALUES ('$title','$category',$isbn10,0000000000000,'$prof', '$img')";
    return mysqli_query($conn, $sql) or exit(mysqli_error($conn));
}

function insertBookAvailable($conn, $email, $isbn10, $isWanted)
{
    $sql = "INSERT INTO booksAvailable (userEmail,`ISBN_10`, isWanted) VALUES ($email,$isbn10,$isWanted)";
    return mysqli_query($conn, $sql) or exit(mysqli_error($conn));
}

function insertMajor($conn, $category, $id)
{
    $sql = "INSERT INTO major (CATEGORY,ID) VALUES ($category,$id)";
    return mysqli_query($conn, $sql) or exit(mysqli_error($conn));
}

function insertProf($conn, $prof, $email)
{
    $sql = "INSERT INTO professor (name, email) VALUES ($prof,$email)";
    return mysqli_query($conn, $sql) or exit(mysqli_error($conn));
}

function avoidSQLInjection($data)
{ //integrate into login and sellbook forms
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function displayTradingTable($isWanted, $head, $isbn, $saying){
    $conn = initDb(); //here?
    exitIfErr($conn);

    //dry?
    $sql = "SELECT user.name, user.email
    FROM booksAvailable join user on booksAvailable.userEmail = user.email
    where booksAvailable.isbn_10 = ${isbn} and booksavailable.isWanted = $isWanted";
    $result = mysqli_query($conn, $sql);

    echo "<div class='selling-wanted'><h4 class='head'>$head</h4>";
    if ($result->num_rows > 0) {
        echo"<table><tr><th>Name</th><th>Email</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td></tr>";
        }
        echo "</table></div>";
    } else{
        echo "<h4>Not yet ${saying}...</h4></div>";
    }
    mysqli_free_result($result);
    mysqli_close($conn);
}
