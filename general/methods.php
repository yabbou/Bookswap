<?php
if (session_status() != PHP_SESSION_ACTIVE) { //better, move sessoin to header.php?
    session_start();
}

function redirectTo($page)
{
    // echo "Redirecting...";
    echo "<meta http-equiv=\"refresh\" content=\".1;URL=$page\" />";
}

function refreshPage()
{
    echo "<meta http-equiv=\"refresh\" content=\"0.1\">";
}

function toHref($s)
{
    $s = strtolower($s);
    $s = str_replace(' ', '-',  $s);
    return $s;
}

function linkToBook($isbn, $title)
{
    return "<a href=book.php?isbn=${isbn}>${title}</a>";
}

function askSellButtonsForm($sell, $ask, $class) //unnecc as method
{
    echo "<div class='book-buttons'><form action='book'>
            <input class='$class' type='submit' name='sell-book' value='${sell}'>
            <input class='$class' type='submit' name='ask-book' value='${ask}'>
        </div>";
}

function isAddingBook(){
    return isset($_POST['title']);
    // return isset($_POST['sell-book']) || isset($_POST['ask-book']);
}
