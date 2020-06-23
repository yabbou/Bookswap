<?php

function getAllBooks()
{
    $sql = "SELECT * FROM book";
    return sqlToArray($sql);
}

function getSpecificBooks()
{
    $browse = avoidSQLInjection(filter_input(INPUT_GET, 'browse'));

    $sql = "SELECT * FROM book WHERE title LIKE '%$browse%'"; //or professor LIKE %$browse% or major LIKE %$browse% //add with radio buttons on homepage
    return sqlToArray($sql);
}

function getBooksByProf()
{
    $browse = avoidSQLInjection(filter_input(INPUT_GET, 'prof'));
    $browse = toCol($browse);

    $sql = "SELECT * FROM Professor join book on book.Professor = Professor.Name where book.Professor LIKE '%$browse%'";
    return sqlToArray($sql);
}

function getBooksByMajor()
{
    $browse = avoidSQLInjection(filter_input(INPUT_GET, 'major'));
    $browse = toCol($browse);

    $sql = "SELECT * FROM major join book on book.Category = Major.ID where Major.ID LIKE '%$browse%'";
    return sqlToArray($sql);
}

function toCol($s)
{
    return str_replace('-', ' ',  $s);
}
