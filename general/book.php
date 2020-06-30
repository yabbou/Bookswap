<?php
include 'header.php';
include_once 'methods.php';
include 'sqlMethods.php';

$conn = initDb();
exitIfErr($conn);

$bookByISBN;
echo "<div class='sidebar-and-content'>";
include 'sidebar.php';

if (isset($_GET['isbn']) && isInDb($_GET['isbn'])) {
    $sql = "SELECT * FROM book WHERE ISBN_10 = '{$_GET['isbn']}'";
    $bookByISBN = sqlToArray($sql);
    include 'book_detailed.php';
}
else {
echo "<div class='book-tiles'>
<h3>Sorry, that book is not in our system.<br>Consider adding it <a href='sell_book.php'>here.</a></h3>
</div></div>";
}
?>

<?php
include 'footer.php';
