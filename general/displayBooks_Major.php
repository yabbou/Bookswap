<?php include 'header.php';
include_once 'methods.php';

if (empty($_SESSION['bookResults'])) {
    sqlToArray_Books('bookResults', mysqli_query(initDb(), "SELECT * FROM book")); //rename 
}

echo '<div class="inner-body"></div>';


// echo '<form style="" id="browse-form" action="browse_results.php" method="post">
//         <div class="browse-text">
//             <h3>Browse</h3>
//             <input type="text" name="browse" required>
//         </div>

//         <!--make this option be chosen and input for browse-->
//         <div class="browse-link"><a href="displayBooks_Major.php">By topic </a></div>
//         <div class="browse-link"><a href="displayBooks_Professor.php">By professor </a></div>
//         <div class="browse-link"><a href="displayBooks.php">All books </a></div>

//     </form>';


    
// echo "<ul>";
// foreach ($_SESSION['bookResults'] as $i => $row) { //should make interm var?

//<div class="left" style="width: 25%">
// <a class="gr-hyperlink" href="/genres/art">Art</a><br>

//     echo '<li class="list-group">';
//     echo '<h4><a href="">' . $row['title'] . '</a></h4>';
//     echo '<p>ISBN-10: ' . $row['isbn-10'] . '</p>';
//     echo '<p>Prof: ' . $row['prof'] . '</p>'; //tab
//     echo '<p>Major: ' . $row['cat'] . '</p>';
//     echo '<p>Available: <strong>' . 1 . '</strong></p>'; //make live updated
//     echo '</li>';
// }
// echo "</ul>";

include 'footer.php';
