<?php

include 'methods.php';

$profsList = initSessionArray('profs');
$booksList = initSessionArray('books');
$offset = isset($_SESSION['offset']) ? $_SESSION['offset'] + 5 : 5; //move to methods.php

//if (empty($_SESSION['books'])) {

$conn = mysqli_connect("localhost", "root", "", "bookswap");
if ($conn->connect_errno) {
    exit();
}

$result = getQueryResults($conn, $offset, 'book');
$_SESSION['books'] = arr_push('books', 'title', $result); //if-else inside method...

$result = getQueryResults($conn, $offset, 'profs'); 
$_SESSION['profs'] = arr_push('profs', 'name', $result);

mysqli_free_result($result);
mysqli_close($conn);
//}
