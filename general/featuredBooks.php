<?php
include_once 'methods.php';

echo "<div class='carousel-and-title'><h3 class='featured'>Featured</h3><div class='jcarousel'>";
$topBooks = getTopBooks(10);
foreach ($topBooks as $book) {
    $isbn = $book['ISBN_10'];

    echo  "<div>";
    echo linkToBook($isbn, "<img src='${book['Image']}' alt='${book['Title']}'>"); //class='book-tile-img' 
    echo "<h4>" . linkToBook($isbn, $book['Title']) . "</h4>";
    echo "</div>";
}
echo "</div></div>";

// <div><img src="img/bio.jpg" alt=""></div>
// <div><img src="img/psych.jpg" alt=""></div>
// <div><img src="img/frank.jpg" alt=""></div>

?>

<script type="text/javascript">
    $(document).ready(function() {
        $('.jcarousel').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
        });
    });
</script>