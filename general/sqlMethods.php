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
    $sql = "INSERT INTO book (Title,Category,ISBN_10,ISBN_13,Professor,Image) 
    VALUES ('$title','$category',$isbn10,0000000000000,'$prof','$img')";
    return mysqli_query($conn, $sql) or exit(mysqli_error($conn));
}

function insertBookAvailable($conn, $email, $isbn10, $isWanted) //currentUser ALWAYS the email
{
    $sql = "INSERT INTO booksAvailable (userEmail,ISBN_10,isWanted) VALUES ('$email',$isbn10,$isWanted)";
    return mysqli_query($conn, $sql);
}

function insertMajor($conn, $category, $id)
{
    $sql = "INSERT INTO major (Category,ID) VALUES ('$category','$id')";
    return mysqli_query($conn, $sql) or exit(mysqli_error($conn));
}

function insertProf($conn, $prof, $email)
{
    $sql = "INSERT INTO professor (name, email) VALUES ('$prof','$email')";
    return mysqli_query($conn, $sql);
}

function avoidSQLInjection($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function displayTradingTable($isWanted, $head, $isbn, $saying, $short)
{
    $conn = initDb();
    exitIfErr($conn);

    $sql = "SELECT user.name, user.email
    FROM booksAvailable join user on booksAvailable.userEmail = user.email
    where booksAvailable.isbn_10 = ${isbn} and booksavailable.isWanted = $isWanted";
    $result = mysqli_query($conn, $sql);

    echo "<div class='selling-wanted'><div class='head-and-button flex'>
    <h4 class='head'>$head</h4>";
    echo isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true ? "<form method='POST'><input type='submit' name='${short}' value='${short}'></form>" : '';
    echo "</div>";

    if ($result->num_rows > 0) {
        echo "<table><tr><th>Name</th><th>Email</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td></tr>";
        }
        echo "</table></div>";
    } else {
        echo "<h4 class='table-msg'>Not yet ${saying}...</h4></div>";
    }

    mysqli_free_result($result);
    mysqli_close($conn);
}

function displayUserTable($isWanted, $head, $saying) //dry
{
    $conn = initDb();
    exitIfErr($conn);

    $email = $_COOKIE['userInfo'];
    $sql = "SELECT book.title, book.ISBN_10
    FROM booksAvailable join book on booksAvailable.ISBN_10 = book.ISBN_10
    where booksAvailable.userEmail = '$email' and booksavailable.isWanted = $isWanted";
    $result = mysqli_query($conn, $sql);

    echo "<div class='selling-wanted'><h4 class='head'>$head</h4>";
    if ($result->num_rows > 0){
        echo "<table><tr><th>Title</th><th>ISBN 10</th><th></th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . linkToBook($row["ISBN_10"], $row["title"])  . "</td>
            <td>" . $row["ISBN_10"] . "</td>
            
            <td><form method='POST'>
            <input type = 'hidden' name = 'isbn' value = '${row['ISBN_10']}' />
            <input type = 'hidden' name = 'isWanted' value = '${isWanted}' />
            <input id='remove' name='remove' type='submit' value='Remove' />
            </form></td></tr>";
        }
        echo "</table></div>";
    } else {
        echo "<h4>Not yet ${saying}...</h4></div>";
    }
    // if (!empty($result)) {
        mysqli_free_result($result);
    // }
    mysqli_close($conn);
}

function displayUserTable_All($isWanted, $head, $saying) //dry!!!
{
    $conn = initDb();
    exitIfErr($conn);

    $sql = "SELECT *
    FROM booksAvailable join book on booksAvailable.ISBN_10 = book.ISBN_10
    where booksavailable.isWanted = $isWanted";
    $result = mysqli_query($conn, $sql);

    echo "<div class='selling-wanted'><h4 class='head'>$head</h4>";
    if ($result->num_rows > 0) {
        echo "<table><tr><th>Title</th><th>ISBN 10</th><th>User</th><th></th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>" . linkToBook($row["ISBN_10"], $row["Title"])  . "</td>
            <td>" . $row["ISBN_10"] . "</td>
            <td>" . $row["userEmail"] . "</td>
            
            <td><form method='POST'>
            <input type = 'hidden' name = 'email' value = '${row['userEmail']}' />
            <input type = 'hidden' name = 'isbn' value = '${row['ISBN_10']}' />
            <input type = 'hidden' name = 'isWanted' value = '${isWanted}' />
            <input id='remove' name='remove' type='submit' value='Remove' />
            </form></td></tr>";
        }
        echo "</table></div>";
    } else {
        echo "<h4>Not yet ${saying}...</h4></div>";
    }
    mysqli_free_result($result);
    mysqli_close($conn);
}

function getNumAvailable($isbn10)
{
    return getRowCount('booksAvailable', 'ISBN_10', "$isbn10' and isWanted = '0");
}

function isNotYetInDatabase($table, $col, $val)
{
    return getRowCount($table, $col, $val) == 0;
}

function getRowCount($table, $col, $val)
{
    $conn = initDb();
    exitIfErr($conn);

    $sql = "SELECT * FROM $table where $col = '$val'";
    $result = mysqli_query($conn, $sql);
    return mysqli_num_rows($result);
}

function sqlToArray($sql) 
{
    $conn = initDb();
    exitIfErr($conn);
    $res = mysqli_query($conn, $sql);

    $arr = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $arr[] = $row;
    }
    return $arr;
}

function getTopBooks($qty)
{
    $sql = "SELECT book.Title, book.ISBN_10, book.Image, count(*) as c FROM booksAvailable join book on book.ISBN_10 = booksavailable.ISBN_10 WHERE isWanted = 0 GROUP BY ISBN_10 ORDER BY c DESC LIMIT $qty";
    return sqlToArray($sql);
}

function isInDb($isbn){
    $conn = initDb();
    exitIfErr($conn);

    $sql = "SELECT ISBN_10 FROM book WHERE ISBN_10 = '$isbn'";
    $res = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $res->num_rows > 0; 
}

function deleteBook($user)
{
    $conn = initDb();
    exitIfErr($conn);

    $sql = "DELETE FROM booksAvailable WHERE userEmail = '$user' AND ISBN_10 = {$_POST['isbn']} AND isWanted = {$_POST['isWanted']} LIMIT 1"; //for now limit one, until enable qty col
    mysqli_query($conn, $sql);
    mysqli_close($conn);
}

function isAdmin()
{
    $conn = initDb();
    exitIfErr($conn);

    $sql = "SELECT Admin_status FROM user WHERE Email = '{$_COOKIE['userInfo']}' AND Admin_status = 1";
    $res = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $res->num_rows > 0; //note: specified col, unlike "count(sqltoarray)" in displayBooks where actually need table data
}
