<?php
include "setLocalDBTables.php";
$titleErr = "";
$profErr = "";
?>

<!-- fix pattern mathcing... -->
<div class="inner-body">
    <h2>Trade Book</h2>
    <form id="book-form" action="sell_book_confim.php" method="post">

        <!-- err='Only letters, numbers, and white space allowed.' -->
        <div><input list="books" type="text" name="title" placeholder="Title" pattern="[\w\d\s]+" onblur="validateName(this.name,this.name,'/[\w\d\s]+/')" onchange="validateName(this.name,'[\w\d\s]+')" required>
            <span class="error">Only letters, numbers, and white space allowed.</span></div>

        <div><input list="cats" type="text" name="cat" placeholder="Category" minlength="4" maxlength="4" pattern="[A-Z]+" onblur="validateName(this.name,'/[A-Z]+/')" onchange="validateName(this.name,'[A-Z]+')" required>
            <datalist id="cats">
                <?php
                foreach ($_SESSION['majors'] as $major) {
                    echo '<option value="' . $major['ID'] . '">';
                }
                ?>
            </datalist>
            <span class="error books">Only capital letters allowed.</span></div>


        <!-- <div> -->
        <input type="number" name="isbn" placeholder="ISBN-10" min="1000000000" max="9999999999" required>
        <!-- <span class="error">Only letters, numbers, and white space allowed.</span></div> -->
        <!-- should really also check if not taken by other book... live -->

        <div><input list="profs" type="text" name="prof" placeholder="Professor" pattern="[\w\s]+" onblur="validateName(this.name,'/[\w\s]+/')" onchange="validateName(this.name,'[\w\s]+')" required>
            <datalist id="profs">
                <?php
                foreach ($_SESSION['professors'] as $prof) {
                    echo '<option value="' . $prof['name'] . '">';
                }
                ?>
            </datalist>
            <span class="error prof">Only letters and white space allowed.</span>
        </div>
        
        <div class='book-buttons'>
            <input class='btn-add-book' type='submit' name='sell-book' value='Sell Book'>
            <input class='btn-add-book' type='submit' name='ask-book' value='Book Wanted'>
        </div>
    </form>

    <script type="text/javascript">
        //how to find index?
        function validateName(name, pattern) {
            var errors;
            if (name == "" || pattern.test(name)) {
                $('.error.' + name).show()
                // $('#mySpan').css('display', 'block');

                // errors = document.getElementsByClassName("error");
                // errors[0].innerHTML.style.visibility = "visible";
            } else {
                errors = document.getElementsByClassName("error");
                errors[0].innerHTML.style.visibility = "hidden";
            }
            return true;
        }
    </script>

</div>