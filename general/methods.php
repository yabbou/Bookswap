<?php

//sql  

function getQueryResults($conn, $offset, $db) {
    return mysqli_query($conn,"SELECT * FROM $db "
                    . "OFFSET $offset ROWS FETCH NEXT 10 ROWS ONLY");
}

function arr_push($db, $name, $sql) {
    return array_push($_SESSION[$db], sqlToArray_Reg($sql, $name));
}

function sqlToArray_Reg($sql, $nameType) {
    $arr = array();

    while ($row = mysqli_fetch_array($sql)) { //error here 
        $arr[] = $row[$nameType];
    }
    return $arr;
}

function sqlToArray_Users($sql) { //dry 
    $users = array();

    while ($row = mysqli_fetch_assoc($sql)) {
        $users[$row['email']] = $row['password'];
    }
    return $users;
}


//general

function initSessionArray($arr) {
    return isset($_SESSION[$arr]) ? $_SESSION[$arr] : array();
}

function redirectToHomepage() {
    echo "<br>Redirecting...";
    echo "<meta http-equiv=\"refresh\" content=\"5;URL=index.php\" />";
}
